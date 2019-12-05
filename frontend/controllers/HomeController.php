<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Requests;
use frontend\models\Platform;


class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $games = Games::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();
        $all_games = array();

        foreach ($games as $g) {
        	$all_games[] = $g;
        }
        return $this->render('index',['games' => $all_games]);
    }

    public function actionPedirJuegos ()
    {
        $model = new Requests();

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $model->load($data);
            $model->date = new \yii\db\Expression('NOW()');
            $model->status = 1;
            $model->statusDescription = "Pendiente";

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Solicitud registrada correctamente");
                return $this->redirect(['pedir-juegos']);
            }else{
                print_r($model->errors);
            }
        }

    	return $this->render('pedir-juegos', [
            'model' => $model,
        ]);
    }

}
