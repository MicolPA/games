<?php

use yii\helpers\Html;
use frontend\models\Category;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$plataformas = \frontend\models\Platform::find()->all();;
$p_selected = isset($get['plataforma'])?$get['plataforma']:'';

$this->title = 'Descargar Juegos Para PC, PS2, PS3 y Wii';
if ($p_selected) {
    $platform_name = \frontend\models\Platform::findOne($p_selected)['name'];
    $this->title = "Descargar Juegos Para $platform_name | Desarrolladores de Ideas";
}



$this->params['breadcrumbs'][] = $this->title;

$cat_name = '';

if ($categoria) {
    $cat_name = Category::findOne($categoria)['name'];
    $this->title = "Descargar Juegos de $cat_name Para PC, PS2, PS3 y Wii | Desarrolladores de Ideas";
}
?>

<style>
    .btn-games{
        border:0.5px solid #ccc;
        font-size: 16px;
    }
    .seleccionado{
        background: #28a745 !important;
        color: white !important;
        border-color:#28a745;
    }
    .pagination{
        font-size: 20px ;
        vertical-align: middle;
    }
    .card{
        background: #262626;
        min-height: 250px;
        text-align: center;
    }
    .card:hover, .link-no:hover{
       /* background: #1a191f;*/
       background: #343a40;
        color:white !important;
    }
    #name{
        height: 43px;
    }
</style>
<div class="container">

    <h1 class="title display-2"><span class="text-primary font-weight-bold title ">DESCARGAR JUEGOS</span> <span class="title"><?php echo strtoupper($cat_name) ?></span> </h1>
    
    <div class="row">
        <div class="col-md-12 mt-5">
            <p class="h2 font-weight-bold">Elegir Plataforma</p>
        </div>
        <div class="col-md-8">
            <div class="row">
            <?php foreach ($plataformas as $p): ?>
                <?php $disable = $p_selected==$p->id?'seleccionado':'' ?>
                <?php $icon = "<i class='$p->icon' style = 'color:$p->color'></i> " ?>
                <div class="col-md-3">
                    <?= Html::a($icon.$p->name,['/games/index', 'plataforma' => $p->id], ['class' => "btn btn-lg text-dark bg-white btn-default btn-lg btn-games mt-3 mr-5 $disable", 'style' => 'min-width:100%']) ?>
                </div>

            <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 mt-3" style="float: right;">
            <?php $form = ActiveForm::begin(['method' => 'get'], ['class' => 'form-inline my-2 my-md-0']); ?>
              <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Búscar Juego" aria-label="Búscar Juego" aria-describedby="button-addon2" value="<?= isset($get['name'])?$get['name']:'' ?>">
                <div class="input-group-append">
                  <button class="btn btn-success btn-lg" type="submit" id="button-addon2">Búscar</button>
                </div>
              </div>
              <?php ActiveForm::end(); ?>
        </div>
        
    </div>

    <div class="row mt-5">
        <?php if ($model): ?>
        
        <?php foreach ($model as $m): ?>
            <div class="col-md-3">
                <div class="card badge-item">

                  <a class='link-no' href="/frontend/web/games/descargar?id=<?= $m->id ?>">
                    <span class="notify-badge badge shadow" style="background: <?php echo $m->platform['color'] ?>"><?php echo $m->platform->name ?></span>
                   <!--  <span class="notify-badge badge" style="background: <?php //echo $m->platform['color'] ?> !important"><?php //echo $m->platform['name'] ?></span> -->
                    <span class="notify-badge badge mt-5 bg-primary shadow"><?php echo $m->requirementsType->name ?></span>
                  <a class='link-no' href="/frontend/web/games/descargar?id=<?= $m->id ?>">
                    <!-- <span class="notify-badge badge" style="margin-top: 3rem"><?= $m->category->name ?></span> -->
                    <img src="<?php echo Yii::getAlias("@web") .'/'. $m['portada_out']; ?>?v=2" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 id="name" class="card-title mind-title text-white font-weight-bold link-no"><?php echo $m['name'] ?></h5>
                        <!-- <div class="row h4">
                            <div class="col-md-5"><span class=" font-weight-bold text-white">Peso:</span> <?//= $m->size ?></div>
                            <div class="col-md-7"><span class=" font-weight-bold text-white"><?//= $m->requirementsType->name ?></span></div>
                        </div> -->
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                      </div>
                  </a>
                  
                </div>

                <img src="" width='100%'>
                <h3 class="text-primary display-4"></h3>

            </div>
        <?php endforeach ?>    
    
        <?php else: ?>
        <div class="col-md-12">
            <p class="display-4">No se han encontrado juegos</p>  
        </div>  
        <?php endif ?>
    </div>
    <div class="col-md-12" style="text-align: center;">
			<?php 
			// display pagination
			echo \yii\widgets\LinkPager::widget([
			    'pagination' => $pages,
			]);
			?>

		</div>
</div>
