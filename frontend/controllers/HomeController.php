<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Games;


class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $games = Games::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();
        return $this->render('index',['games' => $games]);
    }

}
