<?php

	use yii\helpers\Html;

	$this->title = 'JUEGOS';
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
			<?= $this->render('_form', [
			    'model' => $model,
			    'requirements' => $requirements,
			    'requirementsType' => $requirements,
			]) ?>
		</div>
	</div>
</div>