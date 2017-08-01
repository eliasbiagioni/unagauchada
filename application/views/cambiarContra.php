<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
    </head>
   <body>
   <div>
   <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial">    
            <ul id="button">
                <li><a href="<?= base_url() ?>inicio">Volver a inicio</a></li>
            </ul>
    </div>
    <h1>Olvido de Contraseña</h1>
    <div>
          Se está recuperando la contraseña para el usuario con email <?= $email?>
          <br><br>
          ¡Código correcto! Por favor, ingrese su nueva contraseña y su confirmación para completar la restauración.
          <br><br>

          <form onsubmit="return contraValida()" method="post" name="nuevaPassword" action="<?= base_url()?>iniciosesion/cambiarLaPassword">
            Contraseña: <input type="password" name="contra1">
            Confirmación: <input type="password" name="contra2">
            <input type="submit" value="Cambiar contraseña">
            <input type="hidden" name="email" value="<?= $email?>">
          </form>
         
   </div>
</body>
</html>