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
          Se está recuperando la contraseña para el usuario con email <?= $mail?>
          <br><br>
          Se ha enviado un código de restauración vía WhastApp a su teléfono. Por favor, ingrese el código para continuar.
          <br><br>
          <form  action="<?= base_url()?>iniciosesion/nuevaContrasenia" name="codigos" method="POST" onsubmit="return existeCodigo()">
            Código: <input type="text" name="codigo">
                  <input type="submit" value="Confirmar código">
                  <input type="hidden" name="email" value="<?= $mail?>">
          </form>
   </div>
</body>
</html>