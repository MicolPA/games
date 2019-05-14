function agregarImagen(valor) {
	div = document.getElementById('ListaImagenes');
	button = document.getElementById('btnAgregarImagen');

	input = document.createElement('input');
	input.setAttribute("type", "file");
	input.setAttribute('name', 'imagen['+valor+']');
	$(input).attr("required", true);
	
	valor = valor + 1;
	$(button).attr('onclick', 'agregarImagen('+valor+');');

	div.appendChild(input);

}