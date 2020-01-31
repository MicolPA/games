<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create" style="margin-top: 6rem">

    <div class="row bg-white shadow m-auto admin-contenedor pb-4" style="max-width: 600px;padding-left: 4rem;padding-right: 4rem">

		<div class="col-md-12 col-lg-12 m-auto">

	            <h1 class="title display-3 mb-5 mt-5 text-dark">Crear Categoria</h1>
			 <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

			    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		        <?= $form->field($model, 'name') ?>
		        
		        <div class="form-group mb-2" style="margin-top: 5rem">
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
    echo "setTimeout(function () { swal('Categoria registrada','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>  
