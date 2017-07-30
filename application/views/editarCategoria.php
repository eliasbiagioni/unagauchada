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

        <p> <h3>
            Nombre anterior:</p> <p><?php echo $nombre?></p>
            </h3>
        </p>

        <p>
            
        <h3>
            
                <form action="<?= base_url()?>administrar/mandarModificada" name="ModificarCategoria" method="POST" onsubmit="return noVacio2()">
                    Nombre nuevo: <input type="text" name="nuevoNombre">
                    <input type="submit" value="Modificar Categoria">
                    <input type="hidden" name="id" value="<?= $id?>">
                </form>

        </h3>

        </p>
        
</body>
</html>