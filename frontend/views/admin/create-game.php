<?php

	use yii\helpers\Html;

	$this->title = 'JUEGOS';
?>
<div class="container">

    <div class="row">
    	<div class="col-md-12 text-right p-0" style="margin-bottom: 4rem"> 
    		<?= Html::a('<i class="fas fa-arrow-left"></i> Atras',['/admin'], ['class' => 'btn btn-lg btn-dark']) ?>
    	</div>
        
    </div>

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