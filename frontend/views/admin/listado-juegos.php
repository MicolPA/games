<?php

    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ActiveForm;
    use frontend\models\Requests;
    use yii\grid\GridView;
    
    $this->title = 'Lista de Solicitudes';
    
?>

<style>
  .table-responsive{
    font-size: 14px;
  }
</style>

<div class="container p-4 ">

    <div class="row">
        <div class="col-md-12 col-lg-12 p-0" >
            <h3 class="title display-3"><span class=" font-weight-bold"><?= Html::encode($this->title) ?></span></h3>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 table-responsive bg-white">
          <?php echo $this->render('_search_juegos', ['model' => $model]); ?>
          <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                  'label' => 'Nombre',
                  'attribute' => 'name',
                ],
                [
                  'label' => 'Plafaforma',
                  'attribute' => 'platform.name',
                ],
                [
                  'label' => 'Categoria 1',
                  'attribute' => 'category.name',
                ],
                [
                  'label' => 'Categoria 2',
                  'attribute' => 'category2.name',
                ],
                [
                    'format'=>'html',
                    'label' => 'Links',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {

                      $links = explode(',', $data->links);

                      return count($links) . " Links";


                    },
                ],
                [
                  'label' => 'Requerimientos',
                  'attribute' => 'requirementsType.name',
                ],
                'date',
                [
                    'format'=>'html',
                    'label' => '',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                            return Html::a('Ver', ['/games/descargar', 'id'=> $data->id], ['class' => 'btn btn-success text-white btn-lg']);

                    },
                ],

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>
    
</div>

