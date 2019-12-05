<?php

	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use yii\widgets\ActiveForm;
    use frontend\models\Requests;

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1 class="">Formulario</h1>
            <h3 class="">Solicitud de Juego</h3>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($model, 'platform')->dropdownList([
                1 => 'Computadora', 
                2 => 'PlayStation 2', 
                3 => 'PlayStation 3', 
                4 => 'Nintendo Wii'
                
            ],
            ['prompt'=>'Seleccionar Plataforma']
        );
     ?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

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

