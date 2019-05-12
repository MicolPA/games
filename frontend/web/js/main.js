function nuevaImagen() {
	obj = {};
	obj.Imagen = "";
	agregarFila(obj);
}

function agregarFila(obj) {
	tr = document.createElement('tr');
	cont = document.getElementById('plantillaImagenes').value;
	
	for (prop in obj) {
		cont = cont.replace('{'+prop+'}', obj[prop]);
	}

	tr.innerHTML = cont;

	document.getElementById('ListaImagenes').appendChild(tr);
}