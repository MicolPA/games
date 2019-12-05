<?php 
$this->title = $model->name . ' | Desarolladores de Ideas';


?>

<div class="container">
	<div class="row">
		<div class="col-md-12 mb-4">
			<h1 class="mt-4 display-2 text-primary font-weight-bold title">Descargar <?php echo $model->name ?></h1>
			
		</div>
	</div>
	<div class="row">
		<!-- col-md-9 begins -->
		<div class="col-md-9">
			
			<img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'>
			<div class="mt-4">
				<h2 class="font-weight-normal"><?php echo $model->resumen ?></h2>
				<ul class="list-unstyled p-0 h3 mt-5"  style="font-family: 'Quicksand', sans-serif;">
					<li><span class="font-weight-bold">Peso:</span> 4GB</li>
					<li><span class="font-weight-bold">Plataforma:</span> <?php echo $model->platform->name ?></li>
					<li><span class="font-weight-bold">Fecha de subida:</span> <?php echo substr(str_replace('-', '/', $model->date), 0,10) ?></li>
				</ul>

				<p class="display-4 mt-4 text-primary font-weight-b title" style="margin-top: 5rem !important">Requisitos Recomendados</p>
				<table class="table table-responsive-lg h4">
				  <thead>
				    <tr>
				      <th scope="col"></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">Sistema Operativo</th>
				      <td><?php echo $model->requirements->sistemaOperativo ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Procesador</th>
				      <td><?php echo $model->requirements->procesador ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Memoria</th>
				      <td><?php echo $model->requirements->memoria ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Gráficos</th>
				      <td><?php echo $model->requirements->graficos ?></td>
				    </tr>
				    <tr>
				      <th scope="row">DirectX</th>
				      <td><?php echo $model->requirements->directX ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Disco Duro</th>
				      <td><?php echo $model->requirements->discoDuro ?></td>
				    </tr>
				  </tbody>
				</table>
				<!-- <ul class="list-unstyled p-0 h3 mt-5 font-weight-normal">
					<li><span class="font-weight-bold">Sistema Operativo: </span><?php //echo $model->requirements->sistemaOperativo ?></li>
					<li><span class="font-weight-bold">Procesador: </span><?php //echo $model->requirements->procesador ?></li>
					<li><span class="font-weight-bold">Memoria: </span><?php //echo $model->requirements->memoria ?></li>
					<li><span class="font-weight-bold">Gráficos: </span><?php //echo $model->requirements->graficos ?></li>
					<li><span class="font-weight-bold">DirectX: </span><?php //echo $model->requirements->directX ?></li>
					<li><span class="font-weight-bold">Disco Duro: </span><?php //echo $model->requirements->discoDuro ?></li>
				</ul> -->

				<p class="display-4 mt-4 text-primary  title" style="margin-top: 5rem !important">Links de descarga</p>

				<div class="links">
					<ul class="list-unstyled p-0 h3 mt-5 font-weight-normal">
						<?php $count = 0 ?>
						<?php for ($i=0;$i<count($links);$i++): ?>
							<?php $count++; ?>
						<li><a href="<?php echo $links[$i] ?>">Parte <?php echo $count ?></a></li>
						<?php endFor ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- col-md-9 ends -->

		<div class="col-md-3" style="padding: 0px 0px 0px 4rem">
			<img src="<?php echo Yii::getAlias("@web");?>/images/banner1.png" class="d-block w-100"  width='100%'>
		</div>
	</div>
</div>