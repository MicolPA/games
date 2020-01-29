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
<body style="background: #fafafa">
<?php $this->beginBody() ?>

<div class="wrap">
  <?php if (Yii::$app->user->isGuest): ?>

  <?php endif ?>

  <?php if (!Yii::$app->user->isGuest): ?>
    
    
  <?php endif ?>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">


      <!-- <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?> -->
      <?= Alert::widget() ?>
      <?= $content ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

