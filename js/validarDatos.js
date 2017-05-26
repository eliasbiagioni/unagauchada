function validarFormulario() {
    var codigo = document.forms["mandarDatos"]["codigo"].value;
    var numeroTarjeta = document.forms["mandarDatos"]["numeroTarjeta"].value;
    var nombre = document.forms["mandarDatos"]["nombre"].value;
    var cantidad = document.forms["mandarDatos"]["cantidad"].value;

    var letras=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
    var numeros = /^[0-9]+$/;
    if (! letras.test(nombre)){
        alert("El nombre del titular no debe tener numeros");
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
    	alert("El código de seguridad debe tener 3 dígitos!");
	    return false;
    }

    if ((numeroTarjeta.length != 16)   || (! numeros.test(numeroTarjeta))){
    	alert("El número de tarjeta debe tener 16 dígitos!");
	    return false;
    }
}

