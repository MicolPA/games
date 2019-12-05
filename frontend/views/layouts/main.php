<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <?php if (Yii::$app->user->isGuest): ?>

  <?php endif ?>

  <?php if (!Yii::$app->user->isGuest): ?>
    
    
  <?php endif ?>
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 0px">
      <div class="container">
        <?= Html::a('DESARROLLADORES DE IDEAS', ['/'], ['class' => 'navbar-brand pt-4 title-home text-primary font-weight-bold']) ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <?= Html::a('JUEGOS', ['/games'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <?php 
                  $Category = \frontend\models\Category::find()->orderBy(['name' => SORT_ASC])->all();
              ?>
              <div class="dropdown-menu" aria-labelledby="dropdown08">
                <?php foreach ($Category as $cat): ?>
                  <?= Html::a($cat->name,['/games/index', 'categoria'=>$cat->id], ['class' => 'dropdown-item']) ?>
                <?php endforeach ?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REQUISITOS</a>
              
              <div class="dropdown-menu" aria-labelledby="dropdown08">
                  <?= Html::a('Requisitos Bajos',['/games/index', 'requisitos'=>1], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Requisitos Medios',['/games/index', 'requisitos'=>2], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Requisitos Altos',['/games/index', 'requisitos'=>3], ['class' => 'dropdown-item']) ?>
              </div>
            </li>
            <li class="nav-item">
              <?= Html::a('CONTÁCTANOS', ['/site/contact'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
              <?= Html::a('SOLICITAR JUEGOS', ['/home/pedir-juegos'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="https://www.youtube.com/channel/UCkwlaKe50JTTaop2JLJCIbA">CÓMO DESCARGAR</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>


        <!-- <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?> -->
        <?= Alert::widget() ?>
        <?= $content ?>
</div>



<footer class="footer mt-5">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

