<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una Gauchada - Usuarios sin calificar</title>
    </head>
        
<body>
    <div>
       	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Usuarios sin calificar
        </div>
        
            <ul id="button">
                <li><a href="<?= base_url().'verPerfil/verMisGauchadas' ?>">Volver a mis gauchadas pedidas</a></li>
                <li><a href="<?= base_url().'verPerfil?mail='.$this->session->userdata('email') ?>">Volver a tu Perfil</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
    <?= '<h2>'.$mensaje.'</h2>' ?>
     
        
        <?php foreach ($lista_usuarios as $usuario) { ?>
        <div class="contenedorDetalleGauchada">
            <div>Título de la gauchada: <a href="<?= base_url().'verGauchadaCompleta?num='.$usuario->id_favor ?>"><?= $usuario->titulo_favor ?></a></div>
            <div>Nombre de usuario: <?= $usuario->nombre_usuario." ".$usuario->apellido_usuario; ?></div>
            <div><div><a href="<?= base_url().'calificaciones/index?idfavor='.$usuario->id_favor.'&idusuariocalificar='.$usuario->id_usuario ?>">Calificar usuario</a></div></div>
        </div><br>
        <?php } ?>
</body>
</html>