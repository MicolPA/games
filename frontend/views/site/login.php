<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .wrap{
        background: black;
        background-image: url(<?= Yii::getAlias('@web'); ?>/images/stock/stock-5.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
    nav, footer{
        display: none !important;
    }
    input{
        height: 50px !important;
        font-size: 30px !important;
        text-align: center;
    }

    .icon-container{
        text-align: center;
        font-size: 120px;
        margin-bottom: 2rem;
    }
    .login{
        margin: auto;
        background:white;
        margin-top: 30px;
        border-radius: 15px;
        padding: 8rem 4rem;

    }
</style>
<div class="site-login" style="">
    <div class="row shadow align-items-center" style="width: 100% !important">
        <div class="col-md-4 shadow login">
            <div class="icon-container">
                <i class="fas fa-user-circle"></i>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['autocomplete' => 'off']]); ?>

                <?= $form->field($model, 'username')->textInput([])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput()->label(false) ?>


                <div style="color:#999;margin:1em 0;display: none">
                <?= $form->field($model, 'rememberMe')->checkbox(['style' => 'display:none']) ?>
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-block btn-lg big-btn', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
