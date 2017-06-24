<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
    </head>
        
<body onload="nobackbutton();">
    <div>
       	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido/a, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
        </div>
        
            <ul id="button">
                <?php if (isset($soloVolver)) { ?>
                    <li><a href="<?= base_url().'verPerfil?mail='.$this->session->userdata('email') ?>">Volver a tu Perfil</a></li>
                <?php } else { ?>
                <li>  <?= form_open_multipart("publicar_gauchada/busqueda")?><input type="search" name="buscar" placeholder="Título de la Gauchada" size="40">
                 <input type="submit" value="Buscar">
                 </form> </li>
                <?php if($this->session->userdata('es_administrador') == 1){ ?>
                    <li><a href="#' ?>">Administrar</a></li>
                 <?php } ?>
                <li><a href="<?= base_url().'verPerfil?mail='.$this->session->userdata('email') ?>">Ver perfil</a></li>
                <li><a href="<?= base_url().'iniciosesion/validarPublicacionGauchada' ?>">Nueva gauchada</a></li>
                <li><a href="<?= base_url().'creditos' ?>">Comprar créditos</a></li>
                <li><a href="<?= base_url().'iniciosesion/cerrar_sesion' ?>">Cerrar sesión</a></li>
                <?php } ?>
            </ul>
    </div>
    <hr class="longitud">
    <?php 
        if (isset($misGauchadas)){
            echo "<h1> $misGauchadas </h1>";
        }
         if (isset($noresults)) {
            echo "$noresults";
        }
        else {  foreach($gauchadas as $gauchada){ 

            $fecha2 = date('Y-m-d');
            $inicio = strtotime($gauchada->fecha_expiracion);
            $fin = strtotime($fecha2);
            $dif = $inicio - $fin;
            $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
            $totDias = ceil($diasFalt);
            if (($totDias > 0) or (isset($misGauchadas))) {

            ?>
            <div class="contenedorGauchadas">
            <div>
                <?php if($gauchada->contenido_imagen == NULL){
                    $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
                }else {
                    $encode = base64_encode($gauchada->contenido_imagen);
                    $extension = $gauchada->extension_imagen;
                    $source_imagen = "data: $extension; base64, $encode";
                } ?>
                <div class="imagenGauchada izquierda"><img src="<?= $source_imagen ?>" width="190px" height="130px" alt=""/></div>
                <div class="nombreGauchada derecha"><a href="<?= base_url().'verGauchadaCompleta?num='.$gauchada->id_favor ?>"><?= $gauchada->titulo_favor?></a></div>
                <div class="nombreGauchada derecha">Dueño: <?= $gauchada->nombre_usuario." ".$gauchada->apellido_usuario?></div>
                <div class="nombreGauchada derecha">Localidad: <?= $gauchada->nombre_localidad ?></div>
                <div class="nombreGauchada derecha">Categoría: <?= $gauchada->nombre_categorias ?></div>
            </div>
    </div>
    <br>
        <?php }}}?>
</body>
</html>