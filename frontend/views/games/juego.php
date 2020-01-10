<?php 
	$this->title = $model->name . ' | Desarolladores de Ideas';

?>
<style>
	.swal-modal{
		width: 70%;
		padding:0px !important;
	}
	
</style>

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
				<p class="display-4 mt-2 text-primary font-weight-b title" style="margin-top: 3rem !important">Descripción</p>
				<h2 class="font-weight-normal"><?php echo $model->resumen ?></h2>
				<ul class="list-unstyled p-0 h3 mt-5"  style="font-family: 'Quicksand', sans-serif;">
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Peso:</span> <?php echo $model->size ?></li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Categoria:</span> 
						<a class="btn-tag" href="/games/index?categoria=<?php echo $model->category->id ?>"><?php echo $model->category->name?></a>,
						<a  class="btn-tag" href="/games/index?categoria=<?php echo $model->category_id2 ?>"><?php echo $model->category2->name?></a>
					</li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Plataforma:</span> 
						<a class="btn-tag" href="/games/index?plataforma=<?php echo $model->platform->id ?>"><?php echo $model->platform->name;?></a>
					</li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Requisitos:</span> 
						<a class="btn-tag" href="/games/index?requisitos=<?php echo $model->requirementsType->id ?>"><?php echo $model->requirementsType->name; ?></a>
					</li>

					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Saga:</span><?php if ($collection): ?>
						<a class="btn-tag" href="/games/index?saga=<?php echo $collection->saga_id; ?>"><?php echo $collection->saga->name; ?></a>
					<?php endif ?>
					</li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Fecha de subida:</span> <?php echo substr(str_replace('-', '/', $model->date), 0,10) ?></li>

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
				<p class="display-4 mt-4 text-primary  title" style="margin-top: 5rem !important">Links de descarga <a href="#" onclick="javascript:reportarJuego(<?php echo $model->id; ?>)" class="btn btn-danger font-weight-bold" style='float: right;margin-top: 2rem'><i class="fas fa-exclamation-triangle" style="color:white"></i> Reportar Problema</a></p>

				<div class="links">
					<ul class="list-unstyled p-0 h3 mt-5 font-weight-normal">
						<?php if (count($links) == 1): ?>
						<li><i class="fas fa-caret-right text-green"></i> <a class='btn-tag' href="/<?php echo $links[0] ?>" target='_blank'>Parte Única</a></li>
						<?php else: ?>
						<?php $count = 0 ?>
						<?php for ($i=0;$i<count($links);$i++): ?>
							<?php $count++; ?>
						<li><i class="fas fa-caret-right text-green"></i> <a class='btn-tag' href="/<?php echo $links[$i] ?>" target='_blank'>Parte <?php echo $count ?></a></li>
						<?php endFor ?>	
						<?php endif ?>
						

					</ul>

				</div>
				<div>
					<h3 class="font-weight-bold">Comentario</h3><?php echo $model->requirements->otros ?>
				</div>

				<div class="row" style="margin-top: 4rem">
					<div class="col-md-4"><a id='1' href="javascript:imgBigger(1)"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->imagenes; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>
					<div class="col-md-4"><a href="javascript:imgBigger(2)" id="2"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_out; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>
					<div class="col-md-4"><a href="javascript:imgBigger(3)" id="3"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>

				</div>

			</div>
		</div>
		<!-- col-md-9 ends -->

		<div class="col-md-3" style="padding: 0px 0px 0px 4rem">
			<!-- Aside -->
			<?= $this->render('_aside', ['model' => $model]); ?>
		</div>
	</div>
</div>

<input type="hidden" id="game_id" value="<?= $model->id ?>">
<input type="hidden" id="game_name" value="<?= $model->name ?>">
<input type="hidden" id="report_id">