<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/compra_creditos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/validarDatos.js"></script>
        <title>Una gauchada</title>
    </head>
    <body>
        <div>
        	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>        </div>

<?php
	echo form_open("creditos/mandarDatos",'name="mandarDatos" class="formulario" onsubmit="return validarFormulario()""');
	#Lables and inputs

	echo "<h1>$mensaje</h1>";
	echo form_label('Nombre y apellido: ','nombre');
	echo form_input($form['nombre']);
	echo "<br><br>";

	echo form_label('Número de la tarjeta: ','numeroTarjeta');
	echo form_input($form['numeroTarjeta']);
	echo "<br><br>";

	echo form_label('Código de seguridad: ','codigo');
	echo form_input($form['codigo']);
	echo "<br><br>";

	echo form_label('Mes de vencimiento: ','mes');
	echo form_dropdown('Mes de vencimiento',$form['meses']);
	echo "<br><br>";

	echo form_label('Anio de vencimiento: ','anio');
	echo form_dropdown('Anio de vencimiento',$form['anios']);
	echo "<br><br>";

	echo form_label('Cantidad de créditos: ','creditos');
	echo form_input($form['cantidadCreditos']);
	echo "<br><br>";

	echo form_submit('enviar','Comprar creditos');

	echo "<br><br> * Este formulario tiene por defecto asignarle los creditos comprados al usuario con id 13 (Fernando Borgognoni)";
?>
<?= form_close()?>
</body>
</html>