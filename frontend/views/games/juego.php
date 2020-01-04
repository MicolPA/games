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
				<h2 class="font-weight-normal">Descargar <?= $model->name ?> - <?php echo $model->resumen ?></h2>
				<ul class="list-unstyled p-0 h3 mt-5"  style="font-family: 'Quicksand', sans-serif;">
					<li><span class="font-weight-bold">Peso:</span> <?php echo $model->size ?></li>
					<li><span class="font-weight-bold">Categoria:</span> 
						<a href="http://localhost:8080/frontend/web/games/index?categoria=<?php echo $model->category->id ?>"><?php echo $model->category->name . ", "?></a>
						<a href="http://localhost:8080/frontend/web/games/index?categoria=<?php echo $model->category_id2 ?>"><?php echo $model->category_id2 . "."?></a>
					</li>
					<li><span class="font-weight-bold">Plataforma:</span> 
						<a href="http://localhost:8080/frontend/web/games/index?plataforma=<?php echo $model->platform->id ?>"><?php echo $model->platform->name . "."?></a>
					</li>
					<li><span class="font-weight-bold">Requisitos:</span> 
						<a href="http://localhost:8080/frontend/web/games/index?requisitos=<?php echo $model->requirementsType->id ?>"><?php echo $model->requirementsType->name . "."?></a>
					</li>
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

				<div class="card mt-5">
					<div class="card-header display-4 text-primary">
					    Reportar
					</div>
					<div class="card-body">
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					    <a href="#" onclick="javascript:reportarJuego(<?php echo $model->id; ?>)" class="btn btn-danger">Reportar Juego</a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- col-md-9 ends -->

		<div class="col-md-3" style="padding: 0px 0px 0px 4rem">
			<img src="<?php echo Yii::getAlias("@web");?>/images/banner1.png" class="d-block w-100"  width='100%'>
		</div>
	</div>
</div>

<input type="hidden" id="game_id" value="<?= $model->id ?>">
<input type="hidden" id="game_name" value="<?= $model->name ?>">
<input type="hidden" id="report_id">