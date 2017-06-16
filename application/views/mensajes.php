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
            <?php switch ($mensaje){
                case "Registro exitoso": ?>
                        <li><a href="<?php echo base_url()?>iniciosesion">Iniciar sesión</a></li>
                        <li><a href="<?php echo base_url()?>inicio">Volver al inicio</a></li>
                        <?php break;
                case "La compra se ha realizado exitosamente": ?>
                        <li><a href="<?= base_url().'iniciosesion/validarPublicacionGauchada' ?>">Nueva gauchada</a></li>
                        <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
                        <?php break;
                case "No posee la cantidad de creditos suficiente para publicar una gauchada": ?>
                        <li><a href="<?= base_url().'creditos' ?>">Comprar créditos</a></li>
                        <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
                        <?php break;
                case "Gauchada publicada exitosamente.": ?>
                        <li><a href="<?= base_url().'iniciosesion/validarPublicacionGauchada' ?>">Nueva gauchada</a></li>
                        <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
                        <?php break;
                case "No existe usuario": ?>
                        <li><a href="<?php echo base_url()?>registrousuario">Registrarse</a></li>
                        <li><a href="<?php echo base_url()?>iniciosesion">Iniciar sesión</a></li>
                        <li><a href="<?php echo base_url()?>inicio">Volver al inicio</a></li>
                        <?php break;
                default:  } ?>
        </ul>
    </div>
        <hr class="longitud">
        <h1 class="letra"><?= $mensaje ?></h1>
        <?php if($mensaje == "Gauchada publicada exitosamente."){ echo 'Creditos ahora: '.$creditos; } ?>
    </body>
</html>