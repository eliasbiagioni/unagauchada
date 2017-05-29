<!DOCTYPE html>
<html>
<head>
	<title>Publicar Gauchada</title>
	<script type="text/javascript" src="js/validarDatos.js"></script>
	<link rel="stylesheet" href="css/publicar_gauchada.css">
</head>
<body>

 <div class="image"><?php echo img($image_properties); ?></div>
 <?php

 	#MODIFICAR ESTO!
 	echo form_open("Publicar_gauchada/mandarDatos",'name="mandarDatos" class="formulario" onsubmit="return validarFormulario()""');
	#Lables and inputs

	echo "<h1><p class='centrado'> $mensaje </p></h1>";

	echo form_label('<p>Título de la Gauchada: </p>','titulo');
	echo form_input($form['titulo']);
	echo "<br>";

	echo form_label('<p>Descripción: </p>','descripcion');
	echo form_textarea($form['descripcion']);
	echo "<br>";

            echo form_label('<p> Imagen: ','imagen');
            echo form_upload($form['imagen']);
            echo "</p>";

	?>
	<p> Localidad: 
	<select id="localidades" name="ciudades" required>
        <option value="0"> Ninguna </option>
        <?php foreach ($localidades as $localidad) {?>
        <option value="<?= $localidad->nombre_localidad ?>"> <?= $localidad->nombre_localidad ?></option>
        <?php } ?>
    </select></p>
    <p> Categoría: 
	<select id="categorias" name="categorias" required>
        <option value="0"> Ninguna </option>
        <?php foreach ($categorias as $categorias) {?>
        <option value="<?= $categorias->nombre_categorias ?>"> <?= $categorias->nombre_categorias ?></option>
        <?php } ?>
    </select></p>

    <?php
    
    		echo form_label('<p>Días hábiles: ','cantDias');
                echo form_input($form['cantDias']);
			echo "</p>";


    		echo form_submit('enviar','Publicar Gauchada');
    ?>

    <?= form_close()?>

</body>
</html>


