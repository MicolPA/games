<?php

use yii\helpers\Html;
use frontend\models\Category;
use yii\grid\GridView;

$this->title = 'JUEGOS';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

</style>
<div class="container">

    <h1 class="title display-2"><span class="text-primary font-weight-bold"><?= Html::encode($this->title) ?></span> <span class="title"><?php echo $categoria?Category::findOne($categoria)['name']:''; ?></span> </h1>
    

    <div class="row mt-5">
        <?php foreach ($model as $m): ?>
            <div class="col-md-4">
                <div class="card badge-item">

                  <a href="">
                    <span class="notify-badge badge"><?php echo $m->platform->name ?></span>
                    <!-- <span class="notify-badge badge" style="margin-top: 3rem"><?= $m->category->name ?></span> -->
                    <img src="<?php echo Yii::getAlias("@web") .'/'. $m['portada_in']; ?>?v=2" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title mind-title"><?= Html::a($m['name'],['/games/descargar', 'id'=>$m['id'], ['class' => 'link-no']]) ?></h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                      </div>
                  </a>
                  
                </div>

                <img src="" width='100%'>
                <h3 class="text-primary display-4"></h3>
            </div>
        <?php endforeach ?>
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
