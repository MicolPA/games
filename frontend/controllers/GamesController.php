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
        
        Yii::$app->view->params['juegos'] = "<link rel='canonical' href='http://www.desarrolladoresideas.com/frontend/web/games'/>";
        
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

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $query->offset($pages->offset)
        ->limit(28)
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

        Yii::$app->view->params['description'] = "✅ DESCARGAR $model->name totalmente gratis para ".$model->platform->name . " - Desarrolladores de Ideas";
        Yii::$app->view->params['imagen_url'] = $_SERVER['HTTP_HOST'] . "/frontend/web/$model->portada_out";

        $collection = \frontend\models\CollectionsGames::find()->where(['game_id' => $id])->one();
        $links = explode(',', $model->links);

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

    public function actionSaga($id){

      $model = Collections::findOne($id);
      $games = CollectionsGames::find()->where(['saga_id' => $id])->all();
      return $this->render('saga-detail', [
          'model' => $model,
          'games' => $games,
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
