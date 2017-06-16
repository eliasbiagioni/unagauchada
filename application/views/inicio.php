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
            <li>  <?= form_open_multipart("publicar_gauchada/busqueda")?><input type="search" name="buscar" placeholder="Título de la Gauchada" size="40">
                 <input type="submit" value="Buscar">
                 </form> </li>
            <li><a href="<?php echo base_url()?>registrousuario">Registrarse</a></li>
            <li><a href="<?php echo base_url()?>iniciosesion">Iniciar sesión</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <?php 
         if (isset($noresults)) {
            echo "$noresults";
        }
        else {  foreach($gauchadas as $gauchada){ ?>
            <div class="contenedorGauchadas">
            <div>
                <?php if($gauchada->contenido_imagen == NULL){
                    $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
                }else {
                    $encode = base64_encode($gauchada->contenido_imagen);
                    $extension = $gauchada->extension_imagen;
                    $source_imagen = "data: $extension; base64, $encode";
                } ?>
                <a href="<?= base_url().'verGauchadaCompleta?num='.$gauchada->id_favor ?>">
                <div class="imagenGauchada izquierda"><img src="<?= $source_imagen ?>" width="190px" height="130px" alt=""/></div>
                <div class="nombreGauchada derecha"><p> <?= $gauchada->titulo_favor?> </p></a></div>
                <div class="nombreGauchada derecha">Dueño: <?= $gauchada->nombre_usuario." ".$gauchada->apellido_usuario?></div>
                <div class="nombreGauchada derecha"><?= $gauchada->nombre_localidad ?></div>
                <div class="nombreGauchada derecha"><?= $gauchada->nombre_categorias ?></div>
            </div>
    </div>
    <br>
        <?php }}?>
</body>
</html>