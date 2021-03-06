function agregarImagen(valor) {
	div = document.getElementById('ListaImagenes');
	button = document.getElementById('btnAgregarImagen');

	input = document.createElement('input');
	input.setAttribute("type", "file");
	input.setAttribute('name', 'Imagenes['+valor+']');
	input.setAttribute('id', 'games-imagenes');
	input.setAttribute('aria-invalid', true);

	$(input).attr("required", true);
	
	valor = valor + 1;
	$(button).attr('onclick', 'agregarImagen('+valor+');');

	div.appendChild(input);
 
}

function reportarJuego(id) {

	report_id = saveReport();

	var contenedor = document.createElement("div");
	contenedor.setAttribute('id', 'contenedor');
	contenedor.setAttribute('class', 'form-group');

	var labelCorreo = document.createElement("Label");
	$(labelCorreo).text("Escriba su Correo aqui:" );

	var labelError = document.createElement("Label");
	$(labelError).text("Por favor, describa el error que presenta:");

	var inputCorreo = document.createElement("input");
	inputCorreo.setAttribute('type', 'text');
	inputCorreo.setAttribute('id', 'inputCorreo');
	inputCorreo.setAttribute('class', 'form-control');

	var inputError = document.createElement("textarea");
	inputError.setAttribute('type', 'text');
	inputError.setAttribute('id', 'inputError');
	inputError.setAttribute('class', 'form-control');
	inputError.setAttribute('rows', '6');

	contenedor.appendChild(labelCorreo);
	contenedor.appendChild(inputCorreo);
	contenedor.appendChild(labelError);
	contenedor.appendChild(inputError);

    swal({
    	title: "¿Sucedio algo?",
        content: contenedor,
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: true,
        
    })
    .then((EnviarReporte) => {
		if (EnviarReporte) {
			var correo = $("#inputCorreo").val();
			var error = $("#inputError").val();

			if (correo.length > 1 && error.length > 1) {
				completeReport(correo, error);
				swal('Juego Reportado', 'Se ha reportado el juego satisfactoriamente, le enviaremos un correo cuando se corrija la falla', 'success');
			}else{
				completeReport(correo, error);
				swal('Error', 'Debe completar todos los campos antes de enviar el reporte.', 'error');
			}

			console.log(correo);
			console.log(error);
		} else {
			console.log("La cagaste wey.");
		}
	});
}

function completeReport(correo, msg){
	report_id = $("#report_id").val();
	$.ajax({
        url: "frontend/web/games/complete-report",
        type: 'post',
        dataType: 'json',
        data: {
            report_id: report_id,
            correo: correo,
            msg: msg,
            _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
        },
        success: function (data) {
            console.log(data);
            if (data) {
            	return true;
            }else{
            	return false;
            }
        }
    });
}

function saveReport(){
	game = $("#game_id").val();
	game_name = $("#game_name").val();
	$.ajax({
        url: "frontend/web/games/save-report",
        type: 'post',
        dataType: 'json',
        data: {
            game_id: game,
            game_name: game_name,
            _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
        },
        success: function (data) {
            console.log(data);
            if (data) {
            	$("#report_id").val(data);
            	return data;
            }else{
            	return false;
            }
        }
    });
}

function imgBigger(id){
    img = $("#"+id);
    url = img.children().attr('src');
    swal({
        title: "",
        text: '',
        icon: url,
        buttons: false
      });

}
