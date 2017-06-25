<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una Gauchada - Editando Perfil</title>
    </head>
        
<body>
    <div>
       	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
        </div>
        
            <ul id="button">
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>

    <h1>Editando perfil</h1>

    <form action="<?= base_url()?>verPerfil/actualizarPerfil" method="POST" enctype="multipart/form-data">
        <p> Nombre: <input type="text" name="nombre" value="<?= $usuario->nombre_usuario?>"> </p>
        <p> Apellido: <input type="text" name="apellido" value="<?= $usuario->apellido_usuario?>"> </p>
        <p> Telefono: <input type="text" name="telefono" value="<?= $usuario->telefono_usuario?>"> </p>
        <p> Localidad: <select name="localidad"><?php
            foreach ($localidades as $localidad) {
                if ($localidad->id_localidad == $usuario->id_localidad){
                    $msj = "selected";
                }
                else $msj ="";
                ?>
                <option value="<?php echo "$localidad->id_localidad" ?>" <?= "$msj" ?> > <?php echo "$localidad->nombre_localidad"; ?></option>
                <?php
                }
        ?>
        </select></p>
        <p> Fecha de nacimiento (yyyy-mm-dd): <input type="text" name="nacimiento" value="<?= $usuario->fecha_nacimiento?>">
        <?php

        if($usuario->foto_usuario == NULL){
            $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
        }
        else {
            $encode = base64_encode($usuario->foto_usuario);
            $extension = $usuario->extension_foto;
            $source_imagen = "data: $extension; base64, $encode";
        } 
        ?>
        <p> Esta es tu imagen, si no la quiere cambiar no seleccione ningún archivo. Si la desea cambiar, elija una imagen. 
        <div class="imagen"><img src="<?= $source_imagen ?>" width="400px" height="350px" alt=""/></div> </p>
        <p> Imagen: <input type="file" name="imagen"></p>
        <p> <input type="submit" name="enviar" value="Actualizar Perfil"></p>
    </form>


    

</body>
</html>