<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Requests;


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

    	return $this->render('pedir-juegos', [
            'model' => $model,
        ]);
    }

}
