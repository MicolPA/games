<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $name;
$plataformas = \frontend\models\Platform::find()->all();
?>
<style>
    nav, footer{
        display: none !important;
    }
    .icon-content{
        text-align: center;
        font-size: 60px;
    }
    .card-2{
        min-height: 200px;
        background: transparent;
        font-size: 60px;
        color: white;
        padding-top: 2rem;
        border: 1px solid white
      }
       .card-2:hover{
        background: #1a191f;
        color:white !important;
       }
      .card-2 p{
        margin-top: 1rem
      }
</style>
<div class="site-error">

    <div class="row" style="width: 100%">
        <div class="col-md-8 text-center" style="margin:auto;margin-top: 6rem">
            <div class="icon-content">
                <i class="fas fa-dizzy"></i>
            </div>
            <h2 class="font-weight-bold text-danger">Página no encontrada</h2>
            <p style="font-size: 16px">Esta página no existe. Intenta nuevamente utilizando el buscador.</p>

            <div>
                <?php $form = ActiveForm::begin(['method' => 'get', 'action' => '/frontend/web/games/index'], ['class' => 'form-inline my-2 my-md-0']); ?>
              <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Búscar Juego" aria-label="Búscar Juego" aria-describedby="button-addon2" value="<?= isset($get['name'])?$get['name']:'' ?>">
                <div class="input-group-append">
                  <button class="btn btn-primary btn-lg" type="submit" id="button-addon2">Búscar</button>
                </div>
              </div>
              <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5 mt-5"> 
      <div class="row align-items-center">
        <div class="container">
          <div class="col-md-12">
            <p class="h2 text-center">Descarga juegos de diferentes plataformas</p>
          <div class="row mt-5 bg-black pb-4">

            <?php foreach ($plataformas as $p): ?>
              <?php $p->color = $p->id==1?"white":$p->color ?>
            <div class="col-md-3 mt-4">
              <a href="/frontend/web/games/index?plataforma=<?= $p->id ?>" class="no-link">
                <div class="card-2 text-center" style="color:white;border: 1px solid <?= $p->color ?>">
                <i class="<?= $p->icon ?> icon" style="font-size: 40px;color:<?= $p->color ?>"></i>
                <p class="h1"><?= $p->name ?></p>
              </div>
              </a>
            </div>
            <?php endforeach ?>
            
            
          </div>
        </div>
        </div>
      </div>
    </div>

</div>
