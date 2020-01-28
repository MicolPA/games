<?php
 # code...
/* @var $this yii\web\View */

$this->title = 'Descargar Juegos Para PC, PS2, PS3 y Wii | Desarrolladores de Ideas';
?>

<style>
    /*.container{
        padding: 0px 15px 20px !important;
    }*/
    .text-shadow{
      text-shadow: 2px 2px 3px #000;
    }
    .carousel-item{
      max-height: 550px;
    }
</style>
<div class="">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      	<div class="carousel-item active" >
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[0]->portada_out ?>?v=2" alt="<?php echo $games[0]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-2 text-shadow"><?php echo $games[0]->name ?></h5>
          </div>
 
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[1]->portada_out ?>" alt="<?php echo $games[1]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-2 text-shadow"><?php echo $games[1]->name ?></h5>
            <!-- <p class="h3"><?php //echo $games[1]->resumen ?></p> -->
          </div>
 
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[2]->portada_out ?>" alt="<?php echo $games[2]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-2 text-shadow"><?php echo $games[2]->name ?></h5>
            <!-- <p class="h3"><?php //echo $games[2]->resumen ?></p> -->
          </div>
 
        </div>
      </div>
        
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container mt-5 pt-5">

      <div class="row mt-5">
        <div class="col-md-12">
          <h3 class="display-2 text-center">Últimos Juegos</h3>
          <hr class="bg-primary" style="height: 2px;">
        </div>
      </div>

        <div class="row mt-5">
            <?php foreach ($games as $g): ?>
              <div class="col-lg-3 mt-5 mb-5 ">
                <a class="no-link" href="/frontend/web/games/descargar/?id=<?= $g->id ?>" data-toggle="tooltip" data-placement="top" title="<?= $g->name ?>">
                  <div class="card-mine pt-4" style="height:300;min-height: 300px">
                    <p class="display-6 font-weight-bold text-success text-center" style="height: 25px"><?=  strlen($g->name)>22?substr($g->name, 0, 22)."...":$g->name; ?></p>
                    <img src="<?= Yii::getAlias('@web') . '/'. $g->portada_out ?>" alt="<?= $g->name ?>" width='100%'>
                    <p class="font-weight-bold text-center pt-3"><?= substr($g->resumen, 0,150) ?>...</p>
                  </div>
                </a>
              </div>
            <?php endforeach ?>
            
        </div>

    </div>
    <style>
      .card-2{
        min-height: 200px;
        background: transparent;
        font-size: 60px;
        color: white;
        padding-top: 2rem;
        border: 1px solid white
      }
       .card-2:hover{
        background: #000;
       }
      .card-2 p{
        margin-top: 1rem
      }
    </style>
    <div class="container-fluid mb-5 mt-5"> 
      <div class="row shadow align-items-center" style="background-image: url(<?php echo Yii::getAlias('@web') ?>/images/stock/stock-5.jpg);height: 500px;background-repeat: no-repeat;background-size: cover">
        <div class="container">
          <div class="col-md-12">
          <h3 class="text-white text-center mb-4 display display-3" style="text-shadow: 2px 2px 4px #000000;">Requerimientos</h3>
          <div class="row mt-5">
            <div class="col-md-4 mt-4">
              <a href="/frontend/web/games/index/?requisitos=1" class="no-link">
                <div class="card-2 text-center">
                <i class="fas fa-laptop"></i>
                <p class="h1">Requerimientos Bajos</p>
              </div>
              </a>
            </div>
            <div class="col-md-4 mt-4">
              <a href="/frontend/web/games/index/?requisitos=2" class="no-link">
                <div class="card-2 text-center">
                <i class="fas fa-laptop"></i>
                <p class="h1">Requerimientos Medios</p>
              </div>
              </a>
            </div>
            <div class="col-md-4 mt-4">
              <a href="/frontend/web/games/index/?requisitos=3" class="no-link">
                <div class="card-2 text-center">
                <i class="fas fa-laptop"></i>
                <p class="h1">Requerimientos Altos</p>
              </div>
              </a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="container mt-5 pt-5">

      <div class="row mt-5">
        <div class="col-md-12">
          <h3 class="display-2 text-center">Últimos Juegos</h3>
          <hr class="bg-primary" style="height: 2px;">
        </div>
      </div>

        <div class="row mt-5">
            <?php foreach ($games as $g): ?>
              <div class="col-lg-3 mt-5 mb-5 ">
                <a class="no-link" href="/frontend/web/games/descargar/?id=<?= $g->id ?>" data-toggle="tooltip" data-placement="top" title="<?= $g->name ?>">
                  <div class="card-mine pt-4" style="height:300;min-height: 300px">
                    <p class="display-6 font-weight-bold text-center" style="height: 25px"><?=  strlen($g->name)>22?substr($g->name, 0, 22)."...":$g->name; ?></p>
                    <img src="<?= Yii::getAlias('@web') . '/'. $g->portada_out ?>" alt="<?= $g->name ?>" width='100%'>
                    <p class="font-weight-bold text-center pt-3"><?= substr($g->resumen, 0,150) ?>...</p>
                  </div>
                </a>
              </div>
            <?php endforeach ?>
            
        </div>

    </div>

    <div class="container-fluid mb-5 mt-5"> 
      <div class="row shadow align-items-center" style="background-image: url(<?php echo Yii::getAlias('@web') ?>/images/stock/stock-2.jpg?v=5);height: 450px;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
          <div class="col-md-12">
          <h3 class="text-white text-center mb-4 display display-3" style="text-shadow: 2px 2px 4px #000000;">Aprende a Descargar</h3>
          <p class="text-white text-center display mb-4" style="text-shadow: 2px 2px 4px #000000;font-size: 22px">Entra a nuestro <span class="text-danger font-weight-bold">Canal de Youtube</span> y descubre diferentes tutoriales para aprender como descargar todos los juegos de esta página y <span class="text-danger font-weight-bold">más</span> !!</p>
          <p class="text-center mt-4" style="margin-top: 4rem !important"><a href="https://www.youtube.com/channel/UCkwlaKe50JTTaop2JLJCIbA" class="btn btn-danger btn-lg big-btn" target="_blank"><i class="fab fa-youtube mr-1"></i> Ir al Canal</a></p>
        </div>
        </div>
      </div>
    </div>
</div>
<style>


</style>

<script>
  setTimeout(function(){
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })
  },200);
</script>