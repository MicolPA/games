<?php

	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use yii\widgets\ActiveForm;
    use frontend\models\Requests;
    
    $this->title = 'Solicitar Juego | Desarrolladores de Ideas';

?>
<style>
    input, select{
        height: 50px !important;
        font-size: 14px !important;
    }
    .icon{
        font-size: 54px;
    }
</style>
<div class="container p-4 ">

    <div class="row" style="margin-top: 4rem;margin-bottom: 20px">
        <div class="col-md-12 col-lg-12">
            <h1 class="title display-3"><span class=" text-primary font-weight-bold">¿Quieres descargar un juego pero no lo ves en nuestra página?</span> </h1>
           <!--  <hr class="hr col-md-12 col-lg-12"></hr> -->
        </div>
    </div>

    <div class="row" style="margin-bottom: 8rem">
        <div class="col-md-12">
           <h1 class="display-4 text-danger font-weight-bold mb-4"></h1>
            <p class="font-weight-bold mt-5 h2 text-success">¡¡Animate y pídelo!!!</p>
            <p class="h1">Puedes enviarnos el nombre  del juego, la plataforma para el cual lo quieres (PC, PS2, PS3 o Wii) y tu email (para notificarte una vez que lo tengamos) e inmediatamente comenzaremos a buscar y subir el juego.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 mb-5">
            <h2 class="font-weight-bold display-4">Formulario de solicitud</h2>
        </div>
        <div class="col-md-12 col-lg-12">
            <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
                <?= $form->field($model, 'platform')->dropdownList([
                            1 => 'Computadora', 
                            2 => 'PlayStation 2', 
                            3 => 'PlayStation 3', 
                            4 => 'Nintendo Wii'
                        ],
                        ['prompt'=>'Seleccionar Plataforma', 'style' => 'font-size:14px']
                    );
                 ?>
                <?= $form->field($model, 'email')->input('email') ?>
                <?= $form->field($model, 'comment')->textarea(['rows' => 6, 'style' => 'font-size:14px']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Pedir Juego', ['class' => 'btn btn-success btn-lg big-btn']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-6 col-lg-6">
            
        </div>
    </div>
</div>
        

<?php if(Yii::$app->session->hasFlash('fail1')):?>
    <?php
        $msj = Yii::$app->session->getFlash('fail1');
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { swal('Solicitud enviada correctamente.','$msj','success');";
        echo '}, 1000);</script>';
    ?>
<?php endif; ?>  

