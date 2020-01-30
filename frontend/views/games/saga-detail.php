<?php $this->title = "Descargar Saga de $model->name | Desarrolladores de Ideas" ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h1 class="h1 display-2">Saga <?php echo $model->name ?></h1>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-9">
			<img class="mb-5" src="<?php echo Yii::getAlias("@web") .'/'. $model->portada; ?>" class="d-block w-100" alt="<?php echo $model->name ?>" width='100%'>

			<div class="mt-4">
				<p class="display-3 text-warning mb-5">Listado de Juegos <span class="badge bg-success" style="font-size: 25px"><?php echo count($games) ?></span></p>
				
				
				<div class="">
					<?php foreach ($games as $g): ?>
						<div class="row bg-dark mb-5 p-3 align-items-center m-0">
							<div class="col-md-3">
								<img class="" src="<?php echo Yii::getAlias("@web") .'/'. $g->game->portada_out; ?>" class="d-block w-100" alt="<?php echo $g->game_name ?>" width='100%'>
							</div>
							<div class="col-md-4">
								<p class="h4 m-0"><?php echo $g->game_name ?></p>
							</div>
							<div class="col-md-3">
								<p class="h4 m-0 badge bg-success" style="font-size: 15px;"><?php echo $g->game->platform->name ?></p>
							</div>
							<div class="col-md-2 ">
								<a href="/frontend/web/games/descargar/?id=<?php echo $g->game_id ?>" class="btn btn-primary btn-lg btn-block mt-2">Descargar</a>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>

		<!-- Aside -->

		<div class="col-md-3">
			<?= $this->render('_aside', ['model' => $model]); ?>
		</div>
	</div>
</div>