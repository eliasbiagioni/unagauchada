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
          Por favor, ingrese su número de teléfono para recibir el código de restauración.
          <br><br>
          <form action="<?= base_url()?>iniciosesion/recibirCodigo" method="post" name="olvido" onsubmit="return codigoValido()">
            
            Número de Teléfono: <input type="text" name="telefono">
                                <input type="submit" value="Reestablecer">
          </form>
   </div>
</body>
</html>