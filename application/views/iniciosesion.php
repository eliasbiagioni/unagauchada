<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
    </head>
   <body onload="nobackbutton();">
    <div>
       	<?php echo img($image_properties); ?>
    </div>
    <div class="barraInicial">    
            <ul id="button">
                <li><a href="<?= base_url() ?>inicio">Volver a inicio</a></li>
            </ul>
    </div>
       <h1 class="letra">Iniciar sesion</h1>
   <div class="contenedorRegistro letra"> 
        <?= form_open('/iniciosesion/validar_datos'); ?>
        <div>
            <div><?= form_label('Ingresa correo electrónico: '); ?></div>
            <div><?= form_input($mail_usuario);?></div>
            <span><?= form_error('mail_usuario')?></span>
        </div>
       <div>
            <div><?= form_label('Ingresa contraseña: ');?></div>
            <div><?= form_input($contrasenia);?></div>
            <span><?= form_error('contrasenia')?></span>
       </div>
       <div>
           <div><?= form_submit('','Iniciar sesión');?></div>
           <div><a class="olvidoContraseña" href="#">¿Olvidaste tu contraseña?</a></div>
       </div>
       <?= form_close();?>
   </div>
</body>
</html>