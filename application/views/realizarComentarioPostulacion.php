<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" /> 
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />  
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
    <div class="contenedorRegistroGauchada letra" >
        <?php 
            echo form_open('postulacion/postularCandidato?idfavor='.$id_favor.'&idpostulante='.$id_usuario_postulante);
            echo form_textarea($area_comentario);
            echo '<span>'.form_error('comentario').'</span>';
            echo br();
            echo form_submit('','Postularse');
            echo form_close();
        ?>
    </div>
    </body>
</html>