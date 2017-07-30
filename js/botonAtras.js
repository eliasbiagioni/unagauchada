function nobackbutton(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button";
   window.onhashchange=function(){window.location.hash="no-back-button";
   };
}

function noVacio(){
	var nombre = document.forms["nuevaCat"]["nombreCategoria"].value;
	var letras=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
	if (nombre == ""){
		alert('¡La nueva categoría no puede estar vacía!');
		return false;
	}
	if (! letras.test(nombre)) {
		alert("¡La nueva categoría sólo debe contener letras!");
		return false;
	}

	var cant = nombre.length;

	if (cant > 20){
		alert("¡La nueva categoría no puede tener más de 20 caracteres!");
		return false;
	}
	
}

function noVacio2(){
	var cat = document.forms['ModificarCategoria']['nuevoNombre'].value;
	var letras=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
	if (cat == ""){
		alert('¡La nueva categoría no puede estar vacía!');
		return false;
	}
	if (! letras.test(cat)) {
		alert("¡La nueva categoría sólo debe contener letras!");
		return false;
	}

	var cant = cat.length;

	if (cant > 20){
		alert("¡La nueva categoría no puede tener más de 20 caracteres!");
		return false;
	}
}