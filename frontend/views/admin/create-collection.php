<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Sagas';
?>

<style>
	.admin-contenedor{
		min-height: 400px
	}

	label{
        color:#000000;
    }
</style>
<div class="container p-4">

    <div class="row bg-white shadow m-auto admin-contenedor" style="max-width: 600px">

		<div class="col-md-12 col-lg-12">

	            <h1 class="title display-3 mb-5 mt-5 text-dark">Crear Sagas</h1>
			 <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

			    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		        <?= $form->field($model, 'name') ?>
		        
		     	<?= $form->field($model, 'portada')->fileInput() ?>
		    
		        <div class="form-group" style="margin-top: 5rem">
		            <?= Html::submitButton('Crear', ['class' => 'btn big-btn btn-success btn-block btn-lg']) ?>
		        </div>
		    <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
<?php if(Yii::$app->session->hasFlash('success')):?>
    <?php
    $msj = Yii::$app->session->getFlash('fail1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Saga registrada','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>    
