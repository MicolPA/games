<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Games;
use frontend\models\Category;
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
 
/**
 * GamesController implements the CRUD actions for Games model.
 */
class GamesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Games models.
     * @return mixed
     */
    public function actionIndex($categoria = null, $plataforma = null, $requisitos = null, $name = null, $saga = null)
    {
        $get = Yii::$app->request->get();
        $query = Games::find()->orderBy(['date' => SORT_DESC]);
        $collection = Collections::find()->where(['id' => "$saga"])->one();

        if ($categoria >= 1) {
            $query->andWhere(['category_id' => $categoria]);
            $query->orWhere(['category_id2' => $categoria]);
        }
        
        if ($name) {
            $query->andWhere(['like', 'name', $name]);
        }

        if ($plataforma >= 1) {
            $query->andWhere(['platform_id' => $get['plataforma']]);
        }

        if ($requisitos >= 1) {
            $query->andWhere(['requirementsType_id' => $get['requisitos']]);
        }

        if ($collection >= 1) {
            $query->andWhere(['id' => $get['saga']]);
        }


        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $query->offset($pages->offset)
        ->limit(21)
        ->all();

        return $this->render('index', [
            'categoria' => $categoria,
            'get' => $get,
            'model' => $model,
            'pages' => $pages,
          //  'searchModel' => $searchModel,
        ]);

    }

    public function actionRequests()
    {
      # code...
    }


    public function actionDescargar($id){

        $model = Games::findOne($id);
        $model2 = new Category();
        $collection = CollectionsGames::find()->where(['game_id' => "$id"])->one();

        $links = explode(',', $model->links);
        //$requisitos = Requirements::find()->where

        return $this->render('juego', [
            'model' => $model,
            'model2' => $model2,
            'collection' => $collection,
            'links' => $links,
        ]);
    }

    /**
     * Displays a single Games model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Games model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
                    return $this->redirect(['games/create']);
                }
            }else{
                print_r($model->errors);
                print_r($requirements->errors);
            }
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
            'requirements' => $requirements,
        ]);
    }


    public function actionSaveReport(){

        $datos = false;

        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if ($post) {
                $model = new \frontend\models\Reports();
                $model->game_id = $post['game_id'];
                $model->game_name = $post['game_name'];
                $model->date = new \yii\db\Expression('NOW()');

                if ($model->save(false)) {
                    $datos = $model->id;
                }else{
                    $datos = false;
                }
            }
        }
        return \yii\helpers\Json::encode($datos);
    }

    public function actionCompleteReport(){

        $datos = false;

        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if ($post) {
                $model = \frontend\models\Reports::findOne($post['report_id']);
                
                if ($model) {
                    $model->error = $post['msg'];
                    $model->email = $post['correo'];
                    $model->status = 0;
                    $model->date = new \yii\db\Expression('NOW()');

                    $datos = $model->save(false)?true:false;
                }
            }
        }
        return \yii\helpers\Json::encode($datos);
    }

    public function actionCollection()
    {
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

        return $this->render('collection', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Games model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Games model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Games model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Games the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Games::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
