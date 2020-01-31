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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title></title>
    <?php $this->head() ?>
</head>
<body style="background: #fafafa">
<?php $this->beginBody() ?>

<div class="wrap">
  <?php if (Yii::$app->user->isGuest): ?>

  <?php endif ?>

  <?php if (!Yii::$app->user->isGuest): ?>
    
  <?php endif ?>
      <div class=" navbar-dark bg-dark box-shadow">
        <div class="container p-0">
          <a href="/frontend/web/admin" class="navbar-brand d-flex align-items-center" style="font-size: 26px !important">
            <i class="fas fa-users-cog mr-4"></i>
            <strong>Admin</strong>
          </a>
          <?php if (!isset($no_show)): ?>
            <div class="text-right">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Atras',Yii::$app->request->referrer, ['class' => 'btn btn-lg btn-success text-white mt-3']) ?>
          </div>
          <?php endif ?>
          </button>
        </div>
      </div>

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

