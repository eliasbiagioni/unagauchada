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
                <li><a href="<?= base_url()?>administrar/agregarCategoria">Agregar Categoría</a></li>
                <li><a href="<?= base_url().'administrar' ?>">Volver a Administrar</a></li>
        </ul>
    </div>
    <div class="centro">
        <p><h1>Categorías disponibles en el Sistema</h1></p>
        <br><hr>
    <?php
        foreach ($categorias as $categoria) {
            if ($categoria->nombre_categorias != "General"){
            echo"<div>";
                echo "<p><h2>$categoria->nombre_categorias<h2></p>";
                ?>

                <p><a onclick="return confirm('¿Está seguro que quiere eliiminar esta categoría?')" href='eliminarCategoria?id=<?=$categoria->id_categoria?>'> ELIMINAR  </a>

                <?php
                echo "  -  ";
                echo "<a href='editarCategoria?nombre=$categoria->nombre_categorias&id=$categoria->id_categoria'> MODIFICAR </a><h3></p>";
            echo"</div>";
            echo"<hr>";
            }
        }
    ?>
        <h2>General (no se puede eliminar ni modificar)</h2>
    <div>
    <hr class="longitud">
    </div>
</body>
</html>