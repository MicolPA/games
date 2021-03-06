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


Yii::$app->name = 'Desarrolladores de Ideas';
$default_imagen = "http://desarrolladoresideas.com/frontend/web/images/desarrolladores-ideas-logo.png";
$default_description = "Descargas Juegos para PC, PS2, PS3, Wii totalmente gratis.";

$description = isset($this->params['description'])?$this->params['description']:$default_description;
$imagen_url = isset($this->params['imagen_url'])?$this->params['imagen_url']:$default_imagen;
$url_actual =  $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

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
    <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web') ?>/images/desarrolladores-ideas-logo.png">
    
    <meta property="og:title" content="<?= $this->title ?>">
    <meta property="og:site_name" content="Desarrolladores de Ideas">
    <meta property="og:url" content="<?= $url_actual ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?= $imagen_url ?>">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@DesarrolladorG1">
    <meta name="twitter:title" content="<?= $this->title ?>" />
    <meta name="twitter:image" content="<?= $imagen_url ?>" />
    <meta name="twitter:url" content="<?= $url_actual ?>" />
    <meta name="twitter:description" content="<?= $description ?>" />

    <?php if (isset($this->params['juegos'])): ?>
      <?= $this->params['juegos'] ?>
    <?php endif ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84064273-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-84064273-2');
    </script>

    <script data-ad-client="ca-pub-9723976852944103" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>



    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<style>
  footer{
    background: #262626 !important;
    border: 0px !important;  
  }
</style>
<div class="wrap">
  <?php if (Yii::$app->user->isGuest): ?>

  <?php endif ?>

  <?php if (!Yii::$app->user->isGuest): ?>
    
    
  <?php endif ?>
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="border-radius: 0px">
      <div class="container">
          <a class="navbar-brand pt-3 title-home text-primary" href="/"style="font-size: 16px !important;margin-top: -0.2rem">DESARROLLADORES DE IDEAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

              <a href="/frontend/web/games" class="nav-link">JUEGOS</a>
              <!-- <?//= Html::a('JUEGOS', ['/frontend/web/games'], ['class' => 'nav-link']) ?> -->
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <?php 
                  $Category = \frontend\models\Category::find()->orderBy(['name' => SORT_ASC])->all();
              ?>
              <div class="dropdown-menu active" aria-labelledby="dropdown08">
                <?php foreach ($Category as $cat): ?>
                  <a href="/frontend/web/games/index?categoria=<?php echo $cat->id ?>" class='dropdown-item'><?php echo $cat->name ?></a>
                 <!--  <?//= Html::a($cat->name,['/frontend/web/games/index', 'categoria'=>], ['class' => '']) ?> -->
                <?php endforeach ?>
              </div>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REQUISITOS</a>
              
              <div class="dropdown-menu" aria-labelledby="dropdown08">
                <a href="/frontend/web/games/index/?requisitos=1" class="dropdown-item">Requisitos Bajos</a>
                <a href="/frontend/web/games/index/?requisitos=2" class="dropdown-item">Requisitos Medios</a>
                <a href="/frontend/web/games/index/?requisitos=3" class="dropdown-item">Requisitos Altos</a>
              </div>
            </li>
            <li class="nav-item active">
              <a href="/frontend/web/home/pedir-juegos" class="nav-link">SOLICITAR JUEGOS</a>
            </li>
            <!-- <li class="nav-item">
              <a href="/frontend/web/site/contact" class="nav-link">CONTÁCTANOS</a>
            </li> -->
            <li class="nav-item active">
              <a class="nav-link text-success font-weight-bold" href="http://bit.ly/desarrolladoresyoutube" target='_blank' >CÓMO DESCARGAR</a>
            </li>
            
          </ul>
        </div>
      </div>
  </nav>

  <div style="height: 70px"></div>


      <!-- <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?> -->
      <?= Alert::widget() ?>
      <?= $content ?>
</div>


<script id="dsq-count-scr" src="//desarrolladoresideas-com.disqus.com/count.js" async></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<footer class="footer mt-5">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

