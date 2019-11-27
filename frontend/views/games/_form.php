<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Category;
use frontend\models\Platform

/* @var $this yii\web\View */
/* @var $model frontend\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mt-5">

    <?php $form = ActiveForm::begin([], ['enctype' => 'multipart/form-data']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Categoria'); ?>
   
    <?= $form->field($model, 'platform_id')->dropDownList(ArrayHelper::map(Platform::find()->orderBy(['name'=>SORT_ASC])->all(), 'platform_id', 'name'),['prompt'=>'Seleccionar...'])->label('Plataforma'); ?>

    <?= $form->field($model, 'portada_out')->fileInput() ?>

    <?= $form->field($model, 'portada_in')->fileInput() ?>
    
    <div id="ListaImagenes">
        <?= $form->field($model, 'imagenes')->fileInput() ?>
    </div>
 

    <div class="form-group">
        <?= Html::button('Agregar Imagen', ['class' => 'btn btn-primary', 'id' => 'btnAgregarImagen' , 'onclick'=>'javascript:agregarImagen(1);',]) ?>
    </div>

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

