<?php
	#Esto abre el formulario y especifica el action del mismo
	echo form_open("mandarDatos",'class="formulario"');

	#Estos son los arreglos con los datos que interesan para el input correspondiente
	$nombre = array(
		'name' => 'nombre'
	);

	$numeroTarjeta = array(
		'name' => 'numeroTarjeta'
	);

	$codigo = array(
		'name' => 'codigo' 
	);

	$meses = array(
		'1' => '01',
		'2' => '02',
		'3' => '03',
		'4' => '04',
		'5' => '05', 
		'6' => '06',
		'7' => '07',
		'8' => '08',
		'9' => '09',
		'10' => '10',
		'11' => '11',
		'12' => '12',
	);

	$anios = array(
		'1' => '2017',
		'2' => '2018',
		'3' => '2019',
		'4' => '2020',
		'5' => '2021', 
	);

?>
	<h1>Comprar créditos</h1>
<?php


	#Lables and inputs
	echo form_label('Nombre y apellido: ','nombre');
	echo form_input($nombre);
	echo "<br><br>";

	echo form_label('Número de la tarjeta: ','numeroTarjeta');
	echo form_input($numeroTarjeta);
	echo "<br><br>";

	echo form_label('Código de seguridad: ','codigo');
	echo form_input($codigo);
	echo "<br><br>";

	echo form_label('Mes de vencimiento: ','mes');
	echo form_dropdown('Mes de vencimiento',$meses);
	echo "<br><br>";

	echo form_label('Año de vencimiento: ','anio');
	echo form_dropdown('Año de vencimiento',$anios);
	echo "<br><br>";

	echo form_submit('enviar','Comprar creditos');
?>
<?= form_close()?>
</body>
</html>