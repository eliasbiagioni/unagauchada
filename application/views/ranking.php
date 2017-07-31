<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" /> 
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/validarDatos.js"></script> 
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido al sitio
        </div>
        <ul id="button">
            <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <form method="get" action="<?= base_url()?>administrar/ranking">
        Cambiar el TOP a: <select name="cuantos">
            
            <option value="5" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 5) echo "selected";?>>5</option>
            <option value="10" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 10) echo "selected";?>>10</option>
            <option value="15" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 15) echo "selected";?>>15</option>
            <option value="20" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 20) echo "selected";?>>20</option>
            <option value="25" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 25) echo "selected";?>>25</option>
            <option value="30" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == 30) echo "selected";?>>30</option>
            <option value="-1" <?php if (isset($_GET['cuantos'])) if ($_GET['cuantos'] == -1) echo "selected";?>>Todos</option>

        </select>
        <input type="submit" value="Cambiar">
    </form>
    <?php

        if (isset($_GET['cuantos'])) $cuantos = $_GET['cuantos'];
        else $cuantos = 5;

        if ($cuantos == -1) $frase = "Todos los Usuarios";
        else $frase = "TOP ".$cuantos." de Usuarios";
    ?>
        <h1><?= $frase?></h1>
    <br>
    <hr>
    <?php
        $cant = 0;
        foreach ($usuarios as $usuario){
            $cant++;
            ?> 

            <div>
                
                <p> <h2><?php echo "$cant. $usuario->nombre_usuario $usuario->apellido_usuario $usuario->puntos_usuario puntos"?> </h2></p> 
                <hr>
            </div>

            <?php
        }
    ?>
    </body>
</html>