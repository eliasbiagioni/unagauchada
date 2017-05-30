<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />  
        <title>Una gauchada</title>
    </head>
    <body onload="nobackbutton();">
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
<div class="pag_inicio">
    
    
</div>
    <div class="barraInicial longitud">
        <ul id="button">
            <?php if($mensaje == 'Registro exitoso') { ?>
                <li><a href="<?php echo base_url()?>registrousuario">Registrarse</a></li>
                <li><a href="<?php echo base_url()?>iniciosesion">Iniciar sesión</a></li>
                <li><a href="<?php echo base_url()?>inicio">Volver al inicio</a></li>
            <?php }else{ ?>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            <?php } ?>
        </ul>
    </div>
        <hr class="longitud">
        <h1 class="letra"><?= $mensaje ?></h1>
    </body>
</html>