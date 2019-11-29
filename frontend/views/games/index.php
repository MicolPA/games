<?php

use yii\helpers\Html;
use frontend\models\Category;
use yii\grid\GridView;

$this->title = 'JUEGOS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-index">

    <h1 class="title display-3"><span class="text-primary font-weight-bold"><?= Html::encode($this->title) ?> <?php 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($id >= 1) {
                    echo Category::findOne($id)['name'];                    
                }
            }
     ?></span> </h1>

    <div class="row mt-5">
        <?php foreach ($model as $m): ?>
            <div class="col-md-4">
<<<<<<< HEAD
                <img src="<?php echo Yii::getAlias("@web") .'/'. $m['portada_in']; ?>" width='100%'>
                <h3 class="text-primary display-4"><?= Html::a($m['name'],['/games/download', 'id'=>$m['id'], ['class' => 'link-no']]) ?></h3>
=======
                <img src="<?php echo Yii::getAlias("@web") .'/'. $m->portada_in; ?>" width='100%'>
                <h3 class="text-primary display-4"><?= Html::a($m->name,['/games/juego', 'nombre' => $m->name, 'id'=>$m->id], ['class' => 'link-no']) ?></h3>
>>>>>>> master
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
