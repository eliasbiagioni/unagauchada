function mostrarOcultar(elemento){
	if((document.getElementById(elemento).className) == "oculto"){
		document.getElementById(elemento).className = "mostrar";
		}
	else{
		document.getElementById(elemento).className = "oculto";
	}
}