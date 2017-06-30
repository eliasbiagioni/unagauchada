function RespuestaNoVacia(){
    var respuesta = document.forms["formRespuesta"]["respuesta"].value;
    if (respuesta == ""){
        alert("La respuesta no puede estar vacia!");
        return false;
    }
}

 function perfilNoVacio(){
    var nombre = document.forms["perfil"]["nombre"].value;
    var apellido = document.forms["perfil"]["apellido"].value;
    var telefono = document.forms["perfil"]["telefono"].value;
    var localidad = document.forms["perfil"]["localidad"].value;
    var nacimiento = document.forms["perfil"]["nacimiento"].value;

    var letras=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
    var numeros = /^[0-9]+$/;

    if ((nombre == "") || (apellido == "") || (telefono == "") || (localidad == "") || (nacimiento == "")){
        alert("Alguno de los campos esta vacío");
        return false;
    }

    if (! letras.test(nombre)){
        alert("El nombre debe tener solo letras");
        return false;
    }
    if (! letras.test(apellido)){
        alert("El apellido debe tener solo letras");
        return false;
    }

    if (! numeros.test(telefono)){
        alert("El telefono debe tener solo numeros");
        return false;
    }

    
 }


function noVacio(){
    var pregunta = document.forms["formPreguntas"]["pregunta"].value;
    if (pregunta == ""){
        alert ("¡La pregunta no puede estar vacia!");
        return false;
    }
}

function validarFormulario() {
    var codigo = document.forms["mandarDatos"]["codigo"].value;
    var numeroTarjeta = document.forms["mandarDatos"]["numeroTarjeta"].value;
    var nombre = document.forms["mandarDatos"]["nombre"].value;
    var cantidad = document.forms["mandarDatos"]["cantidad"].value;
    var mesIngresado = document.forms["mandarDatos"]["Mes de vencimiento"].value;
    var anioIngresado = document.forms["mandarDatos"]["Anio de vencimiento"].value;

    var letras=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
    var numeros = /^[0-9]+$/;

    var fecha = new Date();
    var mesActual = (fecha.getMonth() + 1); 
    var anioActual = fecha.getFullYear();

 
    if (! letras.test(nombre)){
        alert("El nombre del titular no debe tener numeros ni estar vacío");
        return false;
    }
    if (!(numeros.test(cantidad) || !(numeros.test(numeroTarjeta)) || !(numeros.test(codigo)))){
        alert("El numero de tarjeta, el codigo de seguridad y la cantidad de creditos a comprar deben ser datos numericos");
        return false;
    }

    if ((codigo == "") || (numeroTarjeta == "") || (nombre == "") || (cantidad == "")){
    	alert("Alguno de los campos esta vacío");
    	return false;
    }
    if ( (codigo.length != 3)  || (! numeros.test(codigo)) ){
    	alert("El código de seguridad debe tener 3 dígitos numericos!");
	    return false;
    }

    if ((numeroTarjeta.length != 16)   || (! numeros.test(numeroTarjeta))){
    	alert("El número de tarjeta debe tener 16 dígitos!");
	    return false;
    }
    if (anioIngresado < anioActual) {
        alert("Tu tarjeta esta vencida");
        return false;
    }


    else {
        if (anioIngresado == anioActual){
            if (mesIngresado < mesActual){
                alert("Tu tarjeta esta vencida");
                return false;
            }
        }
    }
    var valor = (cantidad * 50);
    if (confirm('¿Está seguro que quiere comprar ' + cantidad + ' créditos a un valor de $' + valor + '?')){
       document.tuformulario.submit()
    }
    else {
        return false;
    }

}

