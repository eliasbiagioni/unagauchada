<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una Gauchada - Calificaciones</title>
    </head>
        
<body>
    <div>
       	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Calificaciones
        </div>
        
            <ul id="button">
                <li><a href="<?= base_url().'verPerfil/verMisGauchadas' ?>">Volver a mis gauchadas pedidas</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
    <hr class="longitud">
    <?= '<h2>'.$mensaje.'</h2>' ?>
     
        
        <?php if(($mensaje == 'Calificaciones dadas')||($mensaje == 'Calificaciones recibidas')) { foreach ($lista_calificaciones as $calificacion) { ?>
        <div class="contenedorDetalleGauchada">
            <p class="letra"><strong>Título de la gauchada: </strong><?= $calificacion->titulo_gauchada ?></p>
            <?php if($mensaje == 'Calificaciones dadas') { ?>
                <p class="letra"><strong>Usuario calificado: </strong><?= $calificacion->nombre_usuario_calificado ?></p>
            <?php }else{ ?>
                <p class="letra"><strong>Usuario calificador: </strong><?= $calificacion->nombre_usuario_calificador ?></p>
            <?php } ?>
            <p class="letra"><strong>Calificación: </strong><?= $calificacion->calificacion ?></p>
        </div><br>
        <?php }} ?>
</body>
</html>