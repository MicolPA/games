<?php

use yii\helpers\Html;
use frontend\models\Category;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$plataformas = \frontend\models\Platform::find()->all();;
$p_selected = isset($get['plataforma'])?$get['plataforma']:'';
echo $this->title ;
$this->title = 'Descargar Juegos Para PC, PS2, PS3 y Wii';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .btn-games{
        border:0.5px solid #ccc;
    }
    .seleccionado{
        background: #ccc;
    }
    .pagination{
        font-size: 20px ;
        vertical-align: middle;
    }
</style>
<div class="container">

    <h1 class="title display-2"><span class="text-primary font-weight-bold title ">JUEGOS</span> <span class="title"><?php echo $categoria?Category::findOne($categoria)['name']:''; ?></span> </h1>
    
    <div class="row">
        <div class="col-md-12 mt-5 mb-4">
            <p class="h2 font-weight-bold">Elegir Plataforma</p>
        </div>
        <div class="col-md-8 ">
        <?php foreach ($plataformas as $p): ?>
            <?php $disable = $p_selected==$p->id?'seleccionado':'' ?>
            <?php $icon = "<i class='$p->icon' style = 'color:$p->color'></i> " ?>
                <?= Html::a($icon.$p->name,['/games/index', 'plataforma' => $p->id], ['class' => "btn btn-lg btn-default btn-lg btn-games mr-5 $disable"]) ?>

        <?php endforeach ?>
         </div>
        <div class="col-md-4" style="float: right;">
            <?php $form = ActiveForm::begin(['method' => 'get'], ['class' => 'form-inline my-2 my-md-0']); ?>
              <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Búscar Juego" aria-label="Búscar Juego" aria-describedby="button-addon2" value="<?= isset($get['name'])?$get['name']:'' ?>">
                <div class="input-group-append">
                  <button class="btn btn-primary btn-lg" type="submit" id="button-addon2">Búscar</button>
                </div>
              </div>
              <?php ActiveForm::end(); ?>
        </div>
        
    </div>

    <div class="row mt-5">
        <?php if ($model): ?>
        
        <?php foreach ($model as $m): ?>
            <div class="col-md-4">
                <div class="card badge-item">

<<<<<<< Updated upstream
                  <a href="<?= Yii::getAlias("@web") ?>/games/descargar?id=<?= $m->id ?>">
                    <span class="notify-badge badge" style="background: <?php echo $m->platform['color'] ?>"><?php echo $m->platform['name'] ?></span>
                    <span class="notify-badge badge"><?php echo $m->platform['name'] ?></span>
=======
                  <a href="">
                    <span class="notify-badge badge"><?php echo $m->platform['name'] ?></span>
                    <!-- <span class="notify-badge badge" style="margin-top: 3rem"><?= $m->category->name ?></span> -->
>>>>>>> Stashed changes
                    <img src="<?php echo Yii::getAlias("@web") .'/'. $m['portada_in']; ?>?v=2" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title mind-title font-weight-bold"><?= Html::a($m['name'],['/games/descargar', 'id'=>$m['id'], ['class' => 'link-no']]) ?></h5>
                        <div class="row h4">
                            <div class="col-md-5"><span class="text-dark font-weight-bold">Peso:</span> <?= $m->size ?></div>
                            <div class="col-md-7"><span class="text-dark font-weight-bold"><?= $m->requirementsType->name ?></span></div>
                        </div>
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
