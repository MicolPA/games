<?php

    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ActiveForm;
    use frontend\models\Requests;
    use yii\grid\GridView;
    
    $this->title = 'Lista de Solicitudes';
    $solicitudes = \frontend\models\Requests::find()->all();;
    
?>

<div class="container p-4 ">

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3 class="title display-3"><span class=" font-weight-bold"><?= Html::encode($this->title) ?></span></h3>
            <hr class="hr col-md-12 col-lg-12"></hr>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Plataforma</th>
              <th scope="col">Fecha</th>
              <th scope="col">Estado</th>
              <th scope="col">Comentario</th>
            </tr>
          </thead>
          <tbody>
                <?php if ($solicitudes): ?>
                    <?php foreach ($solicitudes as $requests): ?>
                        <tr>
                            <td><?php echo $requests['name']; ?></td>
                            <td><?php echo $requests['platform']; ?></td>
                            <td><?php echo $requests['date']; ?></td>
                            <td><?php echo $requests['statusDescription']; ?></td>
                            <td><?php echo $requests['comment']; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
    
</div>

