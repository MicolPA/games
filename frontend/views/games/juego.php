<?php 
	$this->title = "Descargar " . $model->name . ' | Desarolladores de Ideas';

?>
<style>
	.swal-modal{
		width: 70%;
		padding:0px !important;
	}
	.card, .bg-dark{
        background: #262626 !important;
    }
    #disqus_thread{
    	width: 100%;
    }
</style>

<div class="container">
	<div class="row">
		<div class="col-md-9 mb-4">
			<h1 class="mt-4 display-3 text-white font-weight-bold title">Descargar <?php echo $model->name ?> para <?php echo $model->platform_id == 1? "PC":$model->platform->name ?></h1>
		</div>
	</div>
	<div class="row">
		<!-- col-md-9 begins -->
		<div class="col-md-9">
			
			<img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'>
			<div class="mt-4">
				<div class="pb-3 pt-3 pl-0">
					<span class="display-4 text-primary font-weight-b title" >Descripción</span>
					<hr>
					<h2 class="font-weight-normal"><?php echo $model->resumen ?></h2>
				</div>
				<div class="card pr-3 pl-3 mt-5">
					<span class="display-4 mt-3 text-warning font-weight-b title" >Información</span>
					<hr>
					<ul class="list-unstyled p-0 h3"  style="font-family: 'Quicksand', sans-serif;">
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Peso:</span> <?php echo $model->size ?></li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Categoria:</span> 
						<a class="btn-tag text-white" href="/frontend/web/games/index?categoria=<?php echo $model->category->id ?>"><?php echo $model->category->name?></a>,
						<a  class="btn-tag text-white" href="/frontend/web/games/index?categoria=<?php echo $model->category_id2 ?>"><?php echo $model->category2->name?></a>
					</li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Plataforma:</span> 
						<a class="btn-tag text-white" href="/frontend/web/games/index?plataforma=<?php echo $model->platform->id ?>"><?php echo $model->platform->name;?></a>
					</li>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Requisitos:</span> 
						<a class="btn-tag text-white" href="/frontend/web/games/index?requisitos=<?php echo $model->requirementsType->id ?>"><?php echo $model->requirementsType->name; ?></a>
					</li>

					<?php if ($collection): ?>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Saga:</span>
						<?php if ($collection): ?>
							<a class="btn-tag text-white" href="/frontend/web/games/saga?id=<?php echo $collection->saga_id; ?>"><?php echo $collection->saga->name; ?></a>
						<?php endif ?>
					</li>
					<?php endif ?>
					<li><i class="fas fa-caret-right text-green"></i> <span class="font-weight-bold">Fecha de subida:</span> <?php echo substr(str_replace('-', '/', $model->date), 0,10) ?></li>

				</ul>
				</div>

				<p class="display-4 mt-4 text-primary font-weight-b title" style="margin-top: 5rem !important">Requisitos Recomendados</p>
				<table class="table table-responsive-lg h4 text-white">
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
				<div class="row">
					<div class="col-md-12 mb-4">
						<a href="#" onclick="javascript:reportarJuego(<?php echo $model->id; ?>)" class="btn btn-danger btn-lg font-weight-bold" style='float: right;margin-top: 2rem'><i class="fas fa-exclamation-triangle" style="color:white"></i> Reportar Problema</a></p>
					</div>
				</div>
				<div class="card p-3 pb-4">
					<p class="display-4 text-warning title" style="">Links de descarga 
					<hr class="bg-white">
					<div class="links">
						<ul class="list-unstyled p-0 h3 font-weight-normal text-white">
							<?php if (count($links) == 1): ?>
							<li><i class="fas fa-caret-right text-green"></i> <a class='btn-tag text-white' href="/<?php echo $links[0] ?>" target='_blank'>Parte Única</a></li>
							<?php else: ?>
							<?php $count = 0 ?>
							<?php for ($i=0;$i<count($links);$i++): ?>
								<?php $count++; ?>
							<li><i class="fas fa-caret-right text-green"></i> <a class='btn-tag text-white' href="/<?php echo $links[$i] ?>" target='_blank'>Parte <?php echo $count ?></a></li>
							<?php endFor ?>	
							<?php endif ?>
						</ul>
					</div>
				</div>

				<?php if ($model->requirements->otros): ?>
				<div class="col-md-12 mt-5 mb-5 pt-3 pb-3 bg-dark" style="border:1px solid #d6a000">
					<p class="h2 m-0"><?php echo $model->requirements->otros ?></p>
				</div>
				<?php endif ?>

				<div class="row mb-4" style="margin-top: 4rem">
					<div class="col-md-4"><a id='1' href="javascript:imgBigger(1)"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->imagenes; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>
					<div class="col-md-4"><a href="javascript:imgBigger(2)" id="2"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_out; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>
					<div class="col-md-4"><a href="javascript:imgBigger(3)" id="3"><img src="<?php echo Yii::getAlias("@web") .'/'. $model->portada_in; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'></a></div>

				</div>

				<div class="row m-0 mt-5">
					<div class="col-md-12 bg-dark">
						<div id="disqus_thread" class="mt-4"></div>
						<script>

						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://desarrolladoresideas-com.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					</div>
					                            
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