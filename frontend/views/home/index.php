<?php
 # code...
/* @var $this yii\web\View */

$this->title = 'Descargar Juegos Para PC, PS2, PS3 y Wii - Desarrolladores de Ideas';
?>

<style>
    /*.container{
        padding: 0px 15px 20px !important;
    }*/
    
</style>
<div class="site-index">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      	<div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[0]->portada_out ?>?v=2" alt="<?php echo $games[0]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-4"><?php echo $games[0]->name ?></h5>
            <p class="h3"><?php echo $games[0]->resumen ?></p>
          </div>
 
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[1]->portada_out ?>" alt="<?php echo $games[1]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-4"><?php echo $games[1]->name ?></h5>
            <p class="h3"><?php echo $games[1]->resumen ?></p>
          </div>
 
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo Yii::getAlias('@web') ?>/<?php echo $games[2]->portada_out ?>" alt="<?php echo $games[2]->name ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-4"><?php echo $games[2]->name ?></h5>
            <p class="h3"><?php echo $games[2]->resumen ?></p>
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
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
