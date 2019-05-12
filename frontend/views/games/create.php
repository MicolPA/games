<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Games */

$this->title = 'Registrar juegos';
?>
<div class="games-create">

    <h1 class="title display-3"><span class=" text-primary font-weight-bold"><?= Html::encode($this->title) ?></span> CREAR</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>