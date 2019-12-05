<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contactanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact p-4 container">

    <div class="row">
        <div class="col-md-12 col-lg-12">
    
            <h1 class="title display-3"><span class=" text-primary font-weight-bold">Formulario</span> </h1>
            <h3 class="title display-5"><span class=" font-weight-bold"><?= Html::encode($this->title) ?></span></h3>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['autocomplete' => 'off'],]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    <?= Html::resetButton('Limpiar', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <img src="http://localhost:8080/frontend/web/images/img/newslestter.jpg" width="100%;">
        </div>
    </div>

    

</div>
