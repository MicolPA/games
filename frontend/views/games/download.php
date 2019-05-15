<?php 
$this->title = $model->name . ' | Desarolladores de Ideas';


?>

<div class="row">
	<div class="col-md-12">
		<h1><?php echo $model->name ?></h1>
		<img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'>
	</div>
</div>