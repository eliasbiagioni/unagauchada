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
                Bienvenido, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
        </div>
        
            <ul id="button">
                <?php if($this->session->userdata('es_administrador') == 1){ ?>
                    <li><a href="<?= base_url().'iniciosesion/administrarPagina' ?>">Administrar</a></li>
                 <?php } ?>
                <li><a href="<?= base_url().'iniciosesion/verPerfilUsuario' ?>">Ver perfil</a></li>
                <li><a href="<?= base_url().'iniciosesion/validarPublicacionGauchada' ?>">Nueva gauchada</a></li>
                <li><a href="<?= base_url().'creditos' ?>">Comprar créditos</a></li>
                <li><a href="<?= base_url().'iniciosesion/cerrar_sesion' ?>">Cerrar sesión</a></li>
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