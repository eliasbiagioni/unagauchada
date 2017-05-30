<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />  
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido al sitio
        </div>
        <ul id="button">
            <li><a href="<?php echo base_url()?>registrousuario">Registrarse</a></li>
            <li><a href="<?php echo base_url()?>iniciosesion">Iniciar sesión</a></li>
        </ul>
    </div>
<hr class="longitud">
    <?php for ($i = 1; $i <= 3; $i++){ ?>
    <div class="contenedorGauchadas">
        <div class="gauchada izquierda">
            <div class="imagen">Imagen Gauchada</div>
            <div class="nombre"><a href="<?= base_url().'gauchadas/verGauchadaCompleta' ?>">Nombre Gauchada</a></div>
            <div class="nombre">Dueño Gauchada</div>
            <div class="nombre">Localidad Gauchada</div>
        </div>
        <div class="gauchada centro">
            <div class="imagen">Imagen Gauchada</div>
            <div class="nombre"><a href="<?= base_url().'gauchadas/verGauchadaCompleta' ?>">Nombre Gauchada</a></div>
            <div class="nombre">Dueño Gauchada</div>
            <div class="nombre">Localidad Gauchada</div>
        </div>
        <div class="gauchada derecha">
            <div class="imagen">Imagen Gauchada</div>
            <div class="nombre"><a href="<?= base_url().'gauchadas/verGauchadaCompleta' ?>">Nombre Gauchada</a></div>
            <div class="nombre">Dueño Gauchada</div>
            <div class="nombre">Localidad Gauchada</div>
        </div>
    </div>
    <br>
    <?php }?>
</body>
</html>