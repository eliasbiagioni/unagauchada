<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" />  
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
                <li><a href="<?= base_url().'administrar/nuevoLogro?tipo=1' ?>">Nuevo logro</a></li>
                <li><a href="<?= base_url().'administrar' ?>">Volver</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <h1 class="letra">Listado de logros</h1>
    <div class="contenedorDetalleGauchada">
    <?php foreach ($logros as $logro) {?>
        <p class="letra"><strong>Logro: </strong><?= $logro->nombre_reputacion ?> - <strong>Puntaje mínimo: </strong><?= $logro->puntaje_minimo ?></p>
        <?php if(($logro->nombre_reputacion != 'Observador')&($logro->nombre_reputacion != 'Irresponsable')) { ?>
        <p class="letra"><a href="<?= base_url().'administrar/nuevoLogro?tipo=0&id='.$logro->id_reputacion.'&nombre_rep='.$logro->nombre_reputacion.'&puntaje_rep='.$logro->puntaje_minimo ?>">Modificar logro</a></p>
        <p class="letra"><a OnClick="if (! confirm('¿Esta seguro que desea eliminar este logro?')) return false; "href="<?= base_url().'administrar/eliminarLogro?id='.$logro->id_reputacion ?>">Eliminar logro</a></p>
        <?php } ?>
        <hr>
    <?php } ?>
    </div>
</body>
</html>