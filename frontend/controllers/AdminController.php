<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Games;
use frontend\models\Category;
use frontend\models\Platform;
use frontend\models\Requests;
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
        			break;

        		case 4:
        			$juegos['wii']++;
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

    public function convertGameLinks($model){

        $links = explode(',', $model->links);
        $links_acortados = array();
        $n = 0;

        foreach ($links as $link) {
            echo $link . "<br>";
            $n++;
            $alias = str_replace(' ', '_', $model->name) . "_parte_$n";
            $long_url = urlencode($link);
            $api_token = '5f0e9dfdfb570f1efe01fa52c3b974c04dcc29e8';
            $api_url = "https://uii.io/api?api={$api_token}&url={$long_url}&format=text";
            $result = @file_get_contents($api_url);
            echo $api_url . "<br>";

            if($result){
                array_push($links_acortados, $result);
            }

            print_r($result);

        }

        return implode(',', $links_acortados);


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

            $path = $this->getGamePath($model, $name);
            $model->links = $this->convertGameLinks($model);

            $model->portada_out = UploadedFile::getInstance($model, 'portada_out');
            $imagen = $path . $name . '-portada-out-desarrolladores-de-Ideas.' . $model->portada_out->extension;
            $model->portada_out->saveAs($imagen);
            $model->portada_out = $imagen;

            $model->portada_in = UploadedFile::getInstance($model, 'portada_in');
            $imagen = $path . $name . '-portada-desarrolladores-de-Ideas.' . $model->portada_in->extension;
            $model->portada_in->saveAs($imagen);
            $model->portada_in = $imagen;


            $model->imagenes = UploadedFile::getInstance($model, 'imagenes');
            $imagen = $path . '-portada.-desarrolladores-de-Ideas' . $model->imagenes->extension;
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

        return $this->render('create-game', [
            'model' => $model,
            'requirements' => $requirements,
        ]);
    }

    public function getGamePath($model, $name){

        $plataforma = Platform::findOne($model->platform_id);
        $consola = str_replace(' ', '-', strtolower($plataforma->name));

        $path = "images/$consola";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $path = "$path/$name/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return $path;
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
                return $this->redirect(['create-collection']);
            }else{
                print_r($model->errors);
            }
        }

        return $this->render('create-collection', [
            'model' => $model,
        ]);
    }

    public function actionAddGameSaga(){

        $game_saga = null;
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if ($post) {
                $game = Games::findOne($post['juego_id']);

                if ($game) {
                    $game_saga = new CollectionsGames();
                    $game_saga->game_id = $game->id;
                    $game_saga->game_name = $game->name;
                    $game_saga->saga_id = $post['saga'];
                    $game_saga->orden = $post['orden'];
                    $game_saga->date = date("Y-m-d H:i:s");

                    $game_saga->save();
                    $game->in_collection = 1;
                    $game->save();
                }

            }
        }
        return \yii\helpers\Json::encode($game_saga);
    }

    public function actionAddCollectionGame(){

        $this->checkLogin();
    	$sagas = Collections::find()->all();
        if (Yii::$app->request->post()) {

            $data = Yii::$app->request->post();
            $juegos = explode(',', $data['juegos']);
            $orden = explode(',', $data['orden']);
            $name = explode(',', $data['juego']);

            for ($i=1; $i < count($juegos); $i++) { 
                $modelGames = new CollectionsGames();
                $model = Games::find()
                ->where(['id' => "$juegos[$i]"])
                ->all();

                $modelGames->game_id = $juegos[$i];
                $modelGames->game_name = 
                $modelGames->orden = $orden[$i];
                $modelGames->saga_id = $data['saga_id'];
                $modelGames->date = new \yii\db\Expression('NOW()');
            }
               
            if ($modelGames->save() && $model->save()) {
                Yii::$app->session->setFlash('success', "Lista registrada correctamente");
                return $this->redirect(['add-collection-game']);
            }else{
                print_r($modelGames->errors);
                print_r($model->errors);
            }
        }
    	return $this->render('add-collection-game', [
            'sagas' => $sagas,
        ]);

    }

    public function actionVerSolicitudesAdmin()
    {

        $query = Requests::find();
        $model = new Requests();

        $get = Yii::$app->request->get();

        if ($get) {
            
            $model->load($get);
           

            $query->andFilterWhere(['status' => $model['status']])
              ->andFilterWhere(['platform' => $model['platform']])
              //->andFilterWhere(['like', 'name', $model['name']])
              ->andFilterWhere(['like', 'name', $model['name']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => 'ASC']],
            'pagination'=>['pageSize' => '60'],
        ]);

        return $this->render('lista-solicitudes-admin', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionCambiarStatusSolicitud($id){

        $model = Requests::findOne($id);
        $model->status = $model->status==1?2:1;
        $model->statusDescription = $model->statusDescription=='Pendiente'?'Subido':'Pendiente';
        $model->save();
        Yii::$app->session->setFlash('sucess', "Status actualizado correctamente");
        return $this->redirect(Yii::$app->request->referrer); 

    }

    public function actionListadoJuegos(){

        $query = Games::find();
        $model = new Games();

        $get = Yii::$app->request->get();

        if ($get) {
            
            $model->load($get);
            $query->andFilterWhere(['category' => $model['category']])
              ->andFilterWhere(['platform_id' => $model['platform_id']])
              ->andFilterWhere(['requirementsType_id' => $model['requirementsType_id']])
              //->andFilterWhere(['like', 'name', $model['name']])
              ->andFilterWhere(['like', 'name', $model['name']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => 'ASC']],
            'pagination'=>['pageSize' => '60'],
        ]);

        return $this->render('listado-juegos', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);

    }

    public function actionCreateCategory()
    {
        $model = new Category();

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $model->load($data);
            $model->date = new \yii\db\Expression('NOW()');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Categoria registrada correctamente");
                return $this->redirect(['create-category']);
            }else{
                print_r($model->errors);
            }
        }

        return $this->render('create-category', [
            'model' => $model,
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
