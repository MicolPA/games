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

