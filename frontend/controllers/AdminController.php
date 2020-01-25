<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Games;
use frontend\models\Category;
use frontend\models\Platform;
use frontend\models\Collections;
use frontend\models\CollectionsGames;
use frontend\models\Requirements;
use frontend\models\RequirementsType;
use frontend\models\GamesSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;


class AdminController extends \yii\web\Controller
{

	public function behaviors()
    {
        $this->layout = '@app/views/layouts/admin';

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    private function checkLogin(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/home/index']);
        }
    }


    public function actionIndex()
    {
        $this->checkLogin();
        $this->layout = '@app/views/layouts/admin';

        $juegos = array();
        $juegos['colores'] = array();
        $pataformas = Platform::find()->all();

        $juegos['pc'] = 0;
        $juegos['ps2'] = 0;
        $juegos['ps3'] = 0;
        $juegos['wii'] = 0;

        $all_games = Games::find()->all();

        foreach ($all_games as $g) {
        	switch ($g->platform_id) {
        		case 1:
        			$juegos['pc']++;
        			break;
        		
        		case 2:
        			$juegos['ps2']++;
        			break;

        		case $g->platform_id == 3:
        			$juegos['ps3']++;
                    exit();
        			break;

        		case 4:
        			$juegos['ps4']++;
        			break;		
        	}
        }

        foreach ($pataformas as $p) {
        	array_push($juegos['colores'], "$p->color");
        }

        return $this->render('index', [
            'juegos' => $juegos,
        ]);
    }

    public function actionCreateGame()
    {
        $this->checkLogin();
        $model = new Games();
        $requirements = new Requirements();
        $requirementsType = new RequirementsType();


        if (Yii::$app->request->post()) {

            $data = Yii::$app->request->post();
            $model->load($data);
            $requirements->load($data);
            $model->date = new \yii\db\Expression('NOW()');

            $name = str_replace(' ', '-', $model->name);
            $name = preg_replace("/[^a-zA-Z0-9_-]+/", '', $name);
            $name = strtolower($name);

            $path = "images/$name/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->portada_out = UploadedFile::getInstance($model, 'portada_out');
            $imagen = $path . $name . '-portada-out - Desarrolladores de Ideas.' . $model->portada_out->extension;
            $model->portada_out->saveAs($imagen);
            $model->portada_out = $imagen;

            $model->portada_in = UploadedFile::getInstance($model, 'portada_in');
            $imagen = $path . $name . '-portada - Desarrolladores de Ideas.' . $model->portada_in->extension;
            $model->portada_in->saveAs($imagen);
            $model->portada_in = $imagen;


            $model->imagenes = UploadedFile::getInstance($model, 'imagenes');
            $imagen = $path . '-portada. - Desarrolladores de Ideas' . $model->imagenes->extension;
            $model->imagenes->saveAs($imagen);
            $model->imagenes = $imagen;
            
            if ($requirements->save()) {
                    $model->requirements_id = $requirements->id;
                if ($model->save()) {
                    Yii::$app->session->setFlash('fail1', "Juego registrado correctamente");
                    return $this->redirect(['create-game']);
                }
            }else{
                print_r($model->errors);
                print_r($requirements->errors);
            }
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create-game', [
            'model' => $model,
            'requirements' => $requirements,
        ]);
    }

    public function actionCreateCollection()
    {
        $this->checkLogin();
        $model = new Collections();

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $model->load($data);
            $model->date = new \yii\db\Expression('NOW()');

            $name = str_replace(' ', '-', $model->name);
            $name = preg_replace("/[^a-zA-Z0-9_-]+/", '', $name);
            $name = strtolower($name);

            $path = "images/$name/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->portada = UploadedFile::getInstance($model, 'portada');
            $imagen = $path . $name . '-portada-collection - Desarrolladores de Ideas.' . $model->portada->extension;
            $model->portada->saveAs($imagen);
            $model->portada = $imagen;


            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Saga registrada correctamente");
                return $this->redirect(['collection']);
            }else{
                print_r($model->errors);
            }
        }

        return $this->render('create-collection', [
            'model' => $model,
        ]);
    }

    public function actionAddCollectionGame(){

        $this->checkLogin();
    	$sagas = Collections::find()->all();
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $juegos = explode(',', $data['juegos']);
            $orden = explode(',', $data['orden']);
            $name = explode(',', $data['juego']);

            for ($i=0; $i < count($juegos); $i++) { 
                $modelGames = new CollectionsGames();
                $modelGames->game_id = $juegos[$i];
                $modelGames->game_name = $name[$i];
                $modelGames->orden = $orden[$i];
                $modelGames->saga_id = $data['saga_id'];
                $modelGames->date = new \yii\db\Expression('NOW()');
            }
               
            if ($modelGames->save()) {
                Yii::$app->session->setFlash('success', "Lista registrada correctamente");
                return $this->redirect(['add-collection-game']);
            }else{
                
            }
        }
    	return $this->render('add-collection-game', [
            'sagas' => $sagas,
        ]);

    }

    public function actionObtenerJuegos(){

        $datos = null;

        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if ($post) {
                $datos = Games::find()->where(['in_collection' => 0])->all();
            }
        }
        return \yii\helpers\Json::encode($datos);
    }


}
