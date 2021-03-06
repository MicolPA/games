<?php

    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ActiveForm;
    use frontend\models\Category;
    use frontend\models\Platform;
    use frontend\models\Requirements;
    use frontend\models\RequirementsType;

?>

<div class="">

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Categoria'); ?>
    <?= $form->field($model, 'category_id2')->dropDownList(ArrayHelper::map(Category::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Categoria #2'); ?>
   
    <?= $form->field($model, 'platform_id')->dropDownList(ArrayHelper::map(Platform::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Plataforma'); ?>

    <?= $form->field($model, 'requirementsType_id')->dropDownList(ArrayHelper::map(RequirementsType::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Tipo de Requisitos'); ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <?= $form->field($requirements, 'sistemaOperativo')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'procesador')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'memoria')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'graficos')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'directX')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'discoDuro')->textInput(['maxlength' => true, 'id' => 'inp']) ?>
    <?= $form->field($requirements, 'otros')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

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
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
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

