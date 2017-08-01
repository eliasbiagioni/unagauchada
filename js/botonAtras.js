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

function codigoValido(){
	var telefono = document.forms['olvido']['telefono'].value;
	var email = document.forms['olvido']['email'].value;
	var numeros = /^[0-9]+$/;
	var mailValido = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

	
	if (email == ""){
		alert('El email es obligatorio');
		return false;
	}

	if (! mailValido.test(email)){
		alert('El email ingresado no es valido');
		return false;
	}
	if (! numeros.test(telefono)){
		alert('El numero de telefono debe contener solo numeros');
		return false;
	}

	if (telefono.length < 8){
		alert('Cantidad de numeros incorrecta');
		return false;
	}
}

function existeCodigo(){
	var codigo = document.forms['codigos']['codigo'].value;

	if (codigo == 1234) return true;
	else
		if(codigo == 7070) return true;
	else
		if (codigo == 1212) return true;
	else{
		alert('Codigo incorrecto');
		return false;
	}
}

function contraValida(){
	var contra1 = document.forms['nuevaPassword']['contra1'].value;
	var contra2 = document.forms['nuevaPassword']['contra2'].value;

	if (!(contra1 == contra2)){
		alert('Las contraseñas no coinciden');
		return false;
	}
}