<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contáctanos' . ' | Desarolladores de Ideas';
$this->params['breadcrumbs'][] = $this->title . ' | Desarolladores de Ideas';
?>
<style>
    input{
        height: 50px !important;
    }
    .icon{
        font-size: 54px;
    }
</style>
<div class="site-contact p-4 container">

    <div class="row mt-5 mb-5">
        <div class="col-md-12 col-lg-12">
    
            <h1 class="title display-3"><span class=" text-primary font-weight-bold">Contáctanos</span> </h1>
            <!-- <h3 class="title display-5"><span class=" font-weight-bold"><?//= Html::encode($this->title) ?></span></h3> -->
            <!-- <hr class="hr col-md-12 col-lg-12"></hr> -->
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['autocomplete' => 'off'],]); ?>

                <?= $form->field($model, 'name')->textInput([]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary btn-lg mt-5 h5', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6 col-lg-6 pl-5" style="padding-top: 2rem;padding-left: 2rem">
            <div class="row align-items-center h4 mb-5">
                <div class="col-md-2">
                    <i class="fas fa-envelope icon text-primary"></i>
                </div>
                <div class="col-md-10">
                   <p class="text-danger font-weight-bold"> Correo Electronico</p>   
                    desarrolladoresideas@gmail.com
                </div>
            </div>
            <div class="row align-items-center h4 mb-5 mt-5">
                <div class="col-md-2">
                    <i class="fab fa-youtube icon" style="color:red"></i>
                </div>
                <div class="col-md-10">
                   <p class="text-danger font-weight-bold"> Canal de Youtube</p>   
                    desarrolladoresideas@gmail.com
                </div>
            </div>
            <div class="row align-items-center h4 mb-5 mt-5">
                <div class="col-md-2" style="padding-left: 2rem">
                    <i class="fab fa-facebook-square icon" style="color:#3b5999"></i>
                </div>
                <div class="col-md-10">
                   <p class="text-danger font-weight-bold"> Facebook</p>   
                    @DesarrolladoresGame
                </div>
            </div>

        </div>
    </div>

    

</div>
