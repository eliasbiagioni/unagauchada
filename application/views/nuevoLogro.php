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
                <li><a href="<?= base_url().'administrar/listadoDeLogros' ?>">Volver</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <h1 class="letra"><?= $mensaje ?> logro</h1>
    <div  class="contenedorRegistro letra">
            <?php if($mensaje == 'Agregar nuevo ') { echo form_open_multipart('administrar/validarDatos?tipo=1'); } else { echo form_open_multipart('administrar/validarDatos?tipo=0&id='.$id.'&nombre_rep='.$nombre_rep.'&puntaje_rep='.$puntaje_rep); }?>
            <div>
                <div><?= form_label('Nombre del logro: ')?></div>
                <div><input name="nombre_logro" type="text" placeholder="Escribe el nombre del logro" class="tamaño-campos" id="nombre_logro" value="<?php if ($mensaje == 'Agregar nuevo ') { if(isset($_POST['nombre_logro'])) { echo $_POST['nombre_logro']; } } else { echo $nombre_rep; }?>"/> </div>
                <span><?= form_error('nombre_logro')?></span>
            </div>
            <div>
                <div><?= form_label('Puntaje mínimo para el logro: ')?></div>
                <div><input name="puntaje_logro" type="text" placeholder="Escribe el puntaje mínimo para el logro" class="tamaño-campos" id="puntaje_logro" value="<?php if ($mensaje == 'Agregar nuevo ') { if(isset($_POST['puntaje_logro'])) { echo $_POST['puntaje_logro']; } } else { echo $puntaje_rep; }?>"/></div>
                <span><?= form_error('puntaje_logro') ?></span>
            </div>
            <div>
                <div><?php if($mensaje == 'Agregar nuevo ') { echo form_submit('','Crear logro'); } else { echo form_submit('','Modificar logro'); } ?></div>
            </div>
            <?= form_close() ?>
    </div>
</body>
</html>