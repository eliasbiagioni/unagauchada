<!DOCTYPE html>
<html>
<head>
	<title>Publicar Gauchada</title>
	
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
</head>
<body onload="nobackbutton();">
    <div>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial">    
            <ul id="button">
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
    <h1 class="letra">Nueva gauchada</h1><br>
    
    <div  class="contenedorRegistroGauchada letra">
        <?= 'Créditos disponibles: '.$creditos .'<br><br>'?>
        <?= form_open_multipart("Publicar_gauchada/validar_datos")?>
        <div>
            <div><?= form_label('<p>Título de la Gauchada: </p>','titulo');?></div>
            <div><?= form_input($form['titulo']);?></div>
            <span><?= form_error('titulo') ?></span>
        </div>
        <div>
            <div><?= form_label('<p>Descripción: </p>','descripcion');?></div>
            <div><?= form_textarea($form['descripcion']);?></div>
            <span><?= form_error('descripcion') ?></span>
        </div>
        <div>
            <div><?= form_label('Imagen: ');?></div>
            <div><?= form_upload($form['imagen']);?></div>
            <span><?= form_error('pic') ?></span>
        </div>
        <div>
            <div><?= form_label('Localidad: ') ?></div>
            <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
            <div><select id="localidades" class="tamaño-campos" name="ciudades" required>
                <option value="0"></option>
                <?php foreach ($localidades as $localidad) {?>
                <option value="<?= $localidad->id_localidad ?>"> <?= $localidad->nombre_localidad ?></option>
                <?php } ?>
            </select></div>
            <span><?= form_error('ciudades')?></span>
        </div>
        <div>
            <div><?= form_label('Categoría: ') ?></div>
            <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
            <div><select id="categorias" class="tamaño-campos" name="categorias" required>
                <option value="0"></option>
                <?php foreach ($categorias as $categorias) {?>
                <option value="<?= $categorias->id_categoria ?>"> <?= $categorias->nombre_categorias ?></option>
                <?php } ?>
                </select></div>
            <span><?= form_error('categorias')?></span>
        </div>
        <div>
            <div><?= form_label('<p>Días hábiles: ','cantDias');?></div>
            <div><?= form_input($form['cantDias']);?></div>
            <span><?= form_error('cantDias')?></span>
        </div>
        <div>
            <div><?= form_submit('','Publicar Gauchada');?></div>
        </div>
        <?= form_close()?>
    </div>
</body>
</html>


