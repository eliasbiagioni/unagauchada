<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
    </head>
    <body onload="nobackbutton()">
        <div>
        	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
        </div>
        <div class="barraInicial">  
            <div class="bienvenido">
                Bienvenido/a, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
            </div>
            <ul id="button">
                <li><a href="<?= base_url().'administrar' ?>">Volver</a></li>
            </ul>
        </div>
        <h1 class="letra">Ganancias entre 2 fechas</h1><br>
        <div  class="contenedorRegistro letra">
            <?= form_open_multipart('/administrar/validarFechas')?>
            <div>
                <div><?= form_label("Primera fecha: ") ?></div>
                <div><input name="primera_fecha" type="text" placeholder="dd/mm/yyyy" class="tamaño-campos" id="primera_fecha" value="<?php if (isset($_POST['primera_fecha'])){ echo $_POST['primera_fecha']; } ?>"/></div>
                <span><?= form_error('primera_fecha')?></span>
            </div>
            <div>
                <div><?= form_label("Segunda fecha: ") ?></div>
                <div><input name="segunda_fecha" type="text" placeholder="dd/mm/yyyy" class="tamaño-campos" id="segunda_fecha" value="<?php if (isset($_POST['segunda_fecha'])){ echo $_POST['segunda_fecha']; } ?>"/></div>
                <span><?= form_error('segunda_fecha')?></span>
            </div>
            <div>
                <div><?= form_submit('','Ver ganancias') ?></div>
            </div>
            <?= form_close() ?>
        </div>
</body>
</html>