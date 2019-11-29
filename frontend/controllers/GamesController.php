<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Games;
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
    public function actionIndex($categoria = null)
    {
        //Es lo mismo que $get = $_GET;
        $get = Yii::$app->request->get();
        $query = Games::find();
        //$searchModel = new \frontend\models\GamesSeach();

        if ($categoria >= 1) {
            // $query = new \yii\db\Query();
            // $query->select('id, name, portada_in')
            //     ->from('games')
            //     ->where(['category_id' => $categoria]);
            // $rows = $query->all();

            $query->andWhere(['category_id' => $categoria]);

        }
        
        if ($get) {
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort'=> ['defaultOrder' => ['date' => 'DESC']],
                'pagination'=>['pageSize' => '10'],
            ]);

        }

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $query->offset($pages->offset)
        ->limit(21)
        ->all();


        return $this->render('index', [
            'categoria' => $categoria,
            'model' => $model,
            'pages' => $pages,
          //  'searchModel' => $searchModel,
        ]);

    }


    public function actionDescargar($id){

        $model = Games::findOne($id);

        return $this->render('juego', [
            'model' => $model,
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


        if (Yii::$app->request->post()) {

            $data = Yii::$app->request->post();
            $model->load($data);
            $model->date = date('Y-m-d H:i:s');

            $name = str_replace(' ', '-', $model->name);
            $name = preg_replace("/[^a-zA-Z0-9_-]+/", '', $name);
            $name = strtolower($name);

            $path = "images/$name/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->portada_out = UploadedFile::getInstance($model, 'portada_out');
            $imagen = $path . $name . '-portada-out.' . $model->portada_out->extension;
            $model->portada_out->saveAs($imagen);
            $model->portada_out = $imagen;

            $model->portada_in = UploadedFile::getInstance($model, 'portada_in');
            $imagen = $path . $name . '-portada.' . $model->portada_in->extension;
            $model->portada_in->saveAs($imagen);
            $model->portada_in = $imagen;


            $model->imagenes = UploadedFile::getInstance($model, 'imagenes');
            $imagen = $path . '-portada.' . $model->imagenes->extension;
            $model->imagenes->saveAs($imagen);
            $model->imagenes = $imagen;
            
            if ($model->save()) {
                Yii::$app->session->setFlash('fail1', "Juego registrado correctamente");
                return $this->redirect(['games/create']);
            }else{
                print_r($model->errors);
            }
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
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
