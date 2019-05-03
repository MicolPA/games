<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\GamesSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'resumen') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'portada_out') ?>

    <?php // echo $form->field($model, 'portada_in') ?>

    <?php // echo $form->field($model, 'imagenes') ?>

    <?php // echo $form->field($model, 'links') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
