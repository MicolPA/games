<?php 
$this->title = $model->name . ' | Desarolladores de Ideas';


?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10">
			<h1 class="mt-4 display-2"><?php echo $model->name ?></h1>
			<div class="mt-4">
				<h2 class="display"><?php echo $model->resumen ?></h2>
			</div>
			<img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'>
		</div>
	</div>
</div>