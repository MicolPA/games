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
          <?php echo $this->render('_search_request', ['model' => $model]); ?>
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
                  'attribute' => 'platform',
                ],
                'comment',
                [
                    'format'=>'html',
                    'label' => 'Status',
                    'attribute' => 'status',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {

                      if ($data->status==2) {
                        return "<span class='text-success font-weight-bold'>$data->statusDescription</span>";
                      }else{
                      return "<span class='text-warning font-weight-bold'>$data->statusDescription</span>";

                      }


                    },
                ],
                [
                  'label' => 'Correo',
                  'attribute' => 'email',
                ],
                'date',
                [
                    'format'=>'html',
                    'label' => 'Cambiar status',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                            return Html::a('Cambiar Status', ['/admin/cambiar-status-solicitud', 'id'=> $data->id], ['class' => 'btn btn-warning text-white btn-lg']);

                    },
                ],

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>
    
</div>

