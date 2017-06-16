<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" />  
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Detalle de gauchada
        </div>
        <ul id="button">
            <?php if(($this->session->userdata('login') == TRUE) && ($cantDias >0) && ($this->session->userdata('id') != $gauchada->id_usuario_dueño)) { ?>
                <li><a href="#">Postularse como candidato</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            <?php }else if($this->session->userdata('login') == TRUE) { ?>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
                <?php } else { ?>
                <li><a href="<?= base_url() ?>inicio">Volver a inicio</a></li>
                <?php } ?>
        </ul>
    </div>
    <hr class="longitud">
    <div class="contenedorDetalleGauchada">
        <?php if($gauchada->contenido_imagen == NULL){
                    $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
                }else {
                    $encode = base64_encode($gauchada->contenido_imagen);
                    $extension = $gauchada->extension_imagen;
                    $source_imagen = "data: $extension; base64, $encode";
                } ?>
        <div class="imagen"><img src="<?= $source_imagen ?>" width="190px" height="130px" alt=""/></div>
        <h1 class="titulo letra"><?= $gauchada->titulo_favor ?></h1>
        <h3 class="titulo letra">Descripcion: </h3>
        <div class="descripcion"><p class="letra"><?= $gauchada->contenido_favor ?></p></div><hr>
        <div class="localidad"><p class="letra">Dueño: <?= $gauchada->nombre_usuario." ".$gauchada->apellido_usuario ?></p></div><hr>
        <div class="localidad"><p class="letra">Localidad: <?= $gauchada->nombre_localidad ?></p></div><hr>
        <div class="localidad"><p class="letra">Categoría: <?= $gauchada->nombre_categorias ?></p></div><hr>
        <div class="localidad"><p class="letra"><?= $mensaje ?></h3></div><hr>
        <div class="localidad"><p class="letra">Cantidad de postulantes: 0</p></div>
    </div>
    </body>
</html>    