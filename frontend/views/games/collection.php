<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Sagas';
?>
<div class="container p-4">

    <div class="row">
        <div class="col-md-12 col-lg-12">
    
            <h1 class="title display-3"><span class=" text-primary font-weight-bold">Formulario</span> </h1>
            <h3 class="title display-5"><span class=" font-weight-bold"><?= Html::encode($this->title) ?></span></h3>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12 col-lg-12">
			 <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

			    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		        <?= $form->field($model, 'name') ?>
		        
		     	<?= $form->field($model, 'portada')->fileInput() ?>
		    
		        <div class="form-group">
		            <?= Html::submitButton('Crear', ['class' => 'btn btn-primary']) ?>
		        </div>
		    <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>