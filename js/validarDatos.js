function validarFormulario() {
    var codigo = document.forms["mandarDatos"]["codigo"].value;
    var numeroTarjeta = document.forms["mandarDatos"]["numeroTarjeta"].value;
    var nombre = document.forms["mandarDatos"]["nombre"].value;
    var cantidad = document.forms["mandarDatos"]["cantidad"].value;

    if ((codigo == "") || (numeroTarjeta == "") || (nombre == "") || (cantidad == "")){
    	alert("Alguno de los campos esta vacío");
    	return false;
    }
    if (codigo.length != 3){
    		alert("El código de seguridad debe tener 3 dígitos!");
		    return false;
    }

    if (numeroTarjeta.length != 16){
    		alert("El número de tarjeta debe tener 16 dígitos!");
		    return false;
    }
}