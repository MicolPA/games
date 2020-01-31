<?php

	use yii\helpers\Html;

	$this->title = 'JUEGOS';
?>
<div class="container">

	<div class="row  bg-white shadow">
		<div class="col-md-12 col-lg-12 p-4">
    
            <h1 class="title display-3"><span class=" text-primary font-weight-bold">Crear Juegos</span> </h1>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
		<div class="col-md-12 col-lg-12">
			<?= $this->render('_form_game', [
			    'model' => $model,
			    'requirements' => $requirements,
			    'requirementsType' => $requirements,
			]) ?>
		</div>
	</div>
</div>