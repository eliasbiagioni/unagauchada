<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
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
                <li><a href="#">Agregar Categoría</a></li>
                <li><a href="#">Eliminar Categoría</a></li>
                <li><a href="#">Modificar Categoría</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
        </ul>
    </div>
    <div class="centro">
        <p><h1>Categorías disponibles en el Sistema</h1></p>
    <?php
        foreach ($categorias as $categoria) {
            echo "<h2>$categoria->nombre_categorias</h2>";
        }
    ?>
    <div>
    <hr class="longitud">
    </div>
</body>
</html>