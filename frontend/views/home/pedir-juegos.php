<?php

	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use yii\widgets\ActiveForm;
	use frontend\models\Requests;

?>

<div class="mt-5">

    <?php $form = ActiveForm::begin([], ['enctype' => 'multipart/form-data']); ?>

    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
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

