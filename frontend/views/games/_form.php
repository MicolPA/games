<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Category

/* @var $this yii\web\View */
/* @var $model frontend\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mt-5">

    <?php $form = ActiveForm::begin([], ['enctype' => 'multipart/form-data']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'inp']) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Categoria'); ?>

   
    <?= $form->field($model, 'portada_out')->fileInput() ?>

    <?= $form->field($model, 'portada_in')->fileInput() ?>

    <table>
        <tbody id="ListaImagenes">
            <?= $form->field($model, 'imagenes')->fileInput(['id' => 'imagenes']) ?>
        </tbody>   
    </table>
 

    <div class="form-group">
        <?= Html::button('Agregar Imagen', ['class' => 'btn btn-primary', 'onclick'=>'nuevaImagen();',]) ?>
    </div>

    <?= $form->field($model, 'links')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<textarea id="plantillaImagenes" style="display: none;">
    <td>
        <?= $form->field($model, 'imagenes')->fileInput(['id' => 'imagenes']) ?>
    </td>
</textarea>

<?php if(Yii::$app->session->hasFlash('fail1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('fail1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Juego registrado','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>  

