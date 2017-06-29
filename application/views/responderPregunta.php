<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" /> 
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/validarDatos.js"></script> 
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido al sitio
        </div>
        <ul id="button">
            <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <h1>Responder pregunta</h1>
    <div class="contenedorRegistroGauchada letra" >
        <?php
            echo "Pregunta: $pregunta <br><br>";
            echo form_open('verGauchadaCompleta/mandarRespuesta','name="formRespuesta" onsubmit="return noVacio()""'); 
            echo form_textarea($area_respuesta);
            echo '<span>'.form_error('respuesta').'</span>';
            echo br();
            ?>
            <input type="hidden" name="id_favor" value="<?php echo $id_favor ?>">
            <?php
            echo form_submit('','Enviar respuesta');
            echo form_close();
        ?>
    </div>
    </body>
</html>