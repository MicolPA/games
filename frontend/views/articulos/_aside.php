<?php 
    $games = \frontend\models\Games::find()->where(['<>', 'id', $model['id']])->select(['platform_id', 'requirements_id', 'requirementsType_id', 'id', 'name', 'portada_out'])->distinct()->orderBy(['date' => SORT_DESC])->limit(4)->all();

    $sagas = \frontend\models\Collections::find()->limit(4)->all();
?>

<style>
	.card{
        background: #262626;
    }
</style>

<div class="row mb-4">
  <div class="col-md-12">
    <p class="h1 mt-0 mb-3 font-weight-bold text-warning">Nuestras Sagas</p>
  </div>
  <?php foreach ($sagas as $saga): ?>
    <div class="col-md-12 mb-4">
      <div class="card badge-item">
        <a class='link-no' href="/frontend/web/games/saga?id=<?= $saga->id ?>">
          <img src="<?php echo Yii::getAlias("@web") .'/'. $saga['portada']; ?>?v=2" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 id="name" class="card-title mind-title text-white font-weight-bold link-no">Saga <?php echo $saga['name'] ?></h5>
            </div>
      </div>
    </div>
  <?php endforeach ?>
</div>

<div class="row">
	<div class="col-md-12">
		<p class="h2 mt-0 mb-3 font-weight-bold text-warning">Últimos Artículos</p>
	</div>
		<div class="col-md-12 mb-4">
			<div class="card badge-item">
          <a class='link-no' href="/frontend/web/articulos/activador-crack-camtasia-9">
            <span class="notify-badge badge shadow">Portable Crackeado</span>
           <!--  <span class="notify-badge badge" style="background: <?php //echo $m->platform['color'] ?> !important"><?php //echo $m->platform['name'] ?></span> -->
            <span class="notify-badge badge mt-5 bg-primary shadow"></span>
          <a class='link-no' href="/frontend/web/articulos/activador-crack-camtasia-9">
            <img src="<?php echo Yii::getAlias("@web") .'/images/articulos/camtasia-studio-9-full-activador-crack.png'?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 id="name" class="card-title mind-title text-white font-weight-bold link-no">Descargar Camtasia Studio 9 + Activador (CRACK) 2020</h5>
                <!-- <div class="row h4">
                    <div class="col-md-5"><span class=" font-weight-bold text-white">Peso:</span> <?//= $m->size ?></div>
                    <div class="col-md-7"><span class=" font-weight-bold text-white"><?//= $m->requirementsType->name ?></span></div>
                </div> -->
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              </div>
          </a>
          
        </div>
		</div>
    <div class="col-md-12 mb-4">
      <div class="card badge-item">
          <a class='link-no' href="/frontend/web/articulos/descargar-filmora-9-crack-activacion">
            <span class="notify-badge badge shadow"></span>
           <!--  <span class="notify-badge badge" style="background: <?php //echo $m->platform['color'] ?> !important"><?php //echo $m->platform['name'] ?></span> -->
            <span class="notify-badge badge mt-5 bg-primary shadow"></span>
          <a class='link-no' href="/frontend/web/articulos/descargar-filmora-9-crack-activacion">
            <img src="<?php echo Yii::getAlias("@web") .'/images/articulos/descargar-wondershare-filmora-9-crack-incluido-activador.jpg'?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 id="name" class="card-title mind-title text-white font-weight-bold link-no">Descargar Wondershare Filmora 9 Full Crack - Activador en Español</h5>
                <!-- <div class="row h4">
                    <div class="col-md-5"><span class=" font-weight-bold text-white">Peso:</span> <?//= $m->size ?></div>
                    <div class="col-md-7"><span class=" font-weight-bold text-white"><?//= $m->requirementsType->name ?></span></div>
                </div> -->
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              </div>
          </a>
          
        </div>
    </div>
</div>

<!-- <img class="mb-4" src="<?php echo Yii::getAlias("@web");?>/images/banner1.png" class="d-block w-100"  width='100%'> -->
