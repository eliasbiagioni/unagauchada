<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
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
            <?php if ($propio == 1) {?>
                <li><a href="<?= base_url().'verPerfil/editarPerfil' ?>">Editar perfil</a></li>
                <li><a href="<?= base_url().'verPerfil/verMisGauchadas' ?>">Ver mis gauchadas pedidas</a></li>
                <li><a href="<?= base_url().'verPerfil/verGauchadasQueMePostule' ?>">Ver gauchadas a las que fui/soy candidato</a></li>
            <?php } ?>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
   
    <?php
        if ($propio ==1) {
            ?> <h1> Perfil propio </h1><?php
        }
        else {
            echo "<h1> Perfil de $usuario->nombre_usuario</h1>";
        }

        if($usuario->foto_usuario == NULL){
            $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
        }
        else {
            $encode = base64_encode($usuario->foto_usuario);
            $extension = $usuario->extension_foto;
            $source_imagen = "data: $extension; base64, $encode";
        } 
    ?>

    <div class="imagen"><img src="<?= $source_imagen ?>" width="400px" height="350px" alt=""/></div>
    <p> <h2>  Nombre: <?= $usuario->nombre_usuario ?> </p> </h2>
    <p> <h2>  Apellido: <?= $usuario->apellido_usuario ?> </p></h2>
<<<<<<< HEAD
=======
    <p> <h2>  Email:  <?= $usuario->mail_usuario ?> </p> </h2>
    <p> <h2>  Localidad: <?= $localidad->nombre_localidad?></h2></p>
>>>>>>> origin/master
    <p> <h2> Fecha de nacimiento: <?= $usuario->fecha_nacimiento?></h2> </p>
    <?php if ($propio == 1) { ?>
        <p> <h2>  Créditos disponibles: <?= $usuario->creditos_usuario ?> </p></h2> 
        <p> <h2> Telefono: <?= $usuario->telefono_usuario?></h2></p> 
        <p> <h2>  Email:  <?= $usuario->mail_usuario ?> </p> </h2>
    <?php } ?>
    <p> <h2> Puntos de usuario: <?= $usuario->puntos_usuario ?></h2> </p>

    

</body>
</html>