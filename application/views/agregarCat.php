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
                <li><a href="<?= base_url().'administrar/verCategorias' ?>">Volver a Categorias</a></li>
            </ul>
        </div>

        <div>
            <br><br><br>
            <form name="nuevaCat" method="POST" onsubmit="return noVacio()" action="<?= base_url().'administrar/mandarNuevaCategoria'?>">
                Nombre de la nueva Categoría: <input type="text" name="nombreCategoria">
                <input type="submit" name="Agregar" value="Agregar"> 
            </form>

        </div>
        
</body>
</html>