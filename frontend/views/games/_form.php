<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mt-5">

    <?php $form = ActiveForm::begin([], ['enctype' => 'multipart/form-data']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'portada_out')->fileInput() ?>

    <?= $form->field($model, 'portada_in')->fileInput() ?>

    <?= $form->field($model, 'imagenes')->fileInput() ?>

    <?= $form->field($model, 'links')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if(Yii::$app->session->hasFlash('fail1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('fail1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Juego registrado','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>    
