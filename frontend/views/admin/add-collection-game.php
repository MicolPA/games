<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Sagas';
?>

<style>
	.admin-contenedor{
		min-height: 400px
	}
    select, input{
    	font-size: 18px !important;
    }
    .number{
    	width: 10px !important;
	    height: 10px !important;
	    background: black;
	    padding: 0 1rem;
	    font-size: 14px !important;
	    color: white !important;
	    margin-right: 1rem;
	}	
    }
</style>
<div class="container p-4">

	<div class="row m-auto" style="max-width: 600px">
		<div class="col-md-12 text-right p-0" style="margin-bottom: 4rem"> 
    		<?= Html::a('<i class="fas fa-arrow-left"></i> Atras',Yii::$app->request->referrer, ['class' => 'btn btn-lg btn-dark']) ?>
    	</div>
	</div>

    <div class="row bg-white shadow m-auto admin-contenedor" style="max-width: 600px">
    	
        

		<div class="col-md-12 col-lg-12">
			
			<div class=" mb-5 mt-5">
				<h1 class="title display-3">Agregar Juegos</h1>
			</div>
	        
			<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
			<select class="form-control" name="saga_id" id="saga_id">
				<option value="">Seleccionar...</option>
				<?php foreach ($sagas as $s): ?>
					<option value="<?= $s->id ?>"><?= $s->name ?></option>
				<?php endforeach ?>
			</select>
			
			<div class="mt-4 pt-4 more" style="display: none">
				<p class="font-weight-bold h2 title mb-3">Seleccionar Juegos</p>
				
			</div>
			<div id="juegos" class=" mt-4">
				
			</div>
			<div class="more" style="display: none">
				<div class="row">
					<div class="col-md-8">
						<select name="juego" id="juego_id" class="form-control">
							<option value="">Seleccionar Juego...</option>
						</select>
					</div>
					<div class="col-md-2">
						<input name="" id="orden" class="form-control" placeholder="Orden">
					</div>
					<div class="col-md-2">
						<a href="javascript:agregarJuego()" class="btn btn-success btn-lg">Añadir</a>
					</div>
				</div>
			</div>
		    

		    <input type="hidden" name="juegos" id="juegos_all">	
		    <input type="hidden" name="orden" id="orden_all">	
		    <input type="hidden" name="name" id="name_all">	
	        <div class="form-group" style="margin-top: 5rem;">
	            <?= Html::submitButton('Crear', ['class' => 'btn big-btn btn-success btn-block btn-lg']) ?>
	        </div>
		    <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
<?php if(Yii::$app->session->hasFlash('success1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('success1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Correcto','$msj','success1');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>    

<script>

	function obtenerJuegos(){

        $.ajax({
            url: "obtener-juegos",
            type: 'post',
            dataType: 'json',
            data: {
                _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
            },
            success: function (data) {
            	console.log(data);
                $.each(data, function (key, value) {
                    $('#juego_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    
                });
            }
        });
	}

	function agregarJuego(){

		juego_id = $('#juego_id').val();
		orden = $('#orden').val();
		name = $('select[name="juego"] option:selected').val();


		$("#juegos_all").val($("#juegos_all").val()+juego_id+",");
		$("#orden_all").val($("#orden_all").val()+orden+",");
		$("#name_all").val($("#name_all").val()+name+",");

		console.log($("#orden_all").val());
		console.log($("#juegos_all").val());
		console.log($("#name_all").val());


		nombre = document.createElement('p');
		$(nombre).attr('class', 'h4');
		span = "<small class='number'>" + orden + "</small>";
		$(nombre).html(span + name);
		$("#juegos").append(nombre);

		$('#juego_id').empty();
        $('#juego_id').append('<option value="">Seleccionar...</option>');
		$("#name").append(name);

        obtenerJuegos();
	}

	setTimeout(function(){

		$("#saga_id").on('change', function(){

		saga = $("#saga_id").val();
			if (saga != '') {
				$(".more").show();
				obtenerJuegos();
			}else{
				$(".more").hide();
			}
		});

		
	},500);
	
</script>
