<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$plataformas = \frontend\models\Platform::find()->all();

?>

<style>
    input,select{
        height: 40px !important;
        font-size: 14px !important;
    }
    .summary{
        color: black;
    }
</style>

<?php $form = ActiveForm::begin([
    'enableClientValidation'=>false,
    'method' => 'get',
]); ?>

<div class="row text-dark mt-4">

    <div class="col-md-2">
        <?= $form->field($model, 'name')->label("Nombre del Juego") ?>
    </div>

    <div class="col-md-2">
       <?php  echo $form->field($model, 'status')->dropdownList(array(''=>'Seleccionar',1=>'Pendiente', 2=>'Subido'))->label('Status') ?>
    </div>

    <div class="col-md-2">
        <?php echo $form->field($model, 'platform')->label('Plataforma')->dropdownList( \yii\helpers\ArrayHelper::map($plataformas, 'id', 'name'),['prompt'=>'Seleccionar Plataforma']
                );?>
    </div>


    <div class="col-md-2 mt-5">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>


</div>
    <?php ActiveForm::end(); ?>
