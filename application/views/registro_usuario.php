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
            <ul id="button">
                <li><a href="<?= base_url() ?>inicio">Volver a inicio</a></li>
            </ul>
        </div>
        <h1 class="letra">Formulario de registro de usuario</h1><br>
        <div  class="contenedorRegistro letra">
            <?= form_open_multipart('/registrousuario/validar_datos')?>
            <div>
                <div><?= form_label('Nombre*: ')?></div>
                <div><?= form_input($nombre_usuario) ?></div>
                <span><?= form_error('nombre_usuario')?></span>
            </div>
            <div>
                <div><?= form_label('Apellido*: ')?></div>
                <div><?= form_input($apellido_usuario) ?></div>
                <span><?= form_error('apellido_usuario') ?></span>
            </div>
            <div>
                <div><?= form_label('Localidad*: ') ?></div>
                <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
                <div><select id="localidades" class="tamaño-campos" name="ciudades" required>
                    <option value="0"></option>
                    <?php foreach ($localidades as $localidad) {?>
                    <option value="<?= $localidad->id_localidad ?>"> <?= $localidad->nombre_localidad ?></option>
                    <?php } ?>
                    </select></div>
                <span><?= form_error('ciudades')?></span>
            </div>
            <div>
                <div><?= form_label("Fecha de nacimiento*: ") ?></div>
                <div><?= form_input($fecha) ?></div>
                <span><?= form_error('fecha')?></span>
            </div>
            <div>
                <div><?= form_label("Correo electrónico*: ") ?></div>
                <div><?= form_input($mail_usuario) ?></div>
                <span><?= form_error('mail_usuario')?></span>
            </div>
            <div>
                <div><?= form_label("Telefono*: ") ?></div>
                <div><?= form_input($telefono_usuario) ?></div>
                <span><?= form_error('telefono_usuario')?></span>
            </div>
            <div>
                <div><?= form_label("Contraseña*: ") ?></div>
                <div><?= form_input($contrasenia_primera) ?></div>
                <span><?= form_error('contrasenia_primera')?></span>
            </div>
            <div>
                <div><?= form_label("Repetir contraseña*: ") ?></div>
                <div><?= form_input($contrasenia_repetida) ?></div>
                <span><?= form_error('contrasenia_repetida')?></span>
            </div>
            <div>
                <div><?= form_label('Foto de usuario: ') ?></div>
                <div> <?= form_upload($imagen_usuario)?></div>
                <span><?= form_error('pic')?></span>
            </div>
            <div>
                <div><?= form_submit('','Almacenar usuario') ?></div>
            </div>
            <div>
                <div><p class="aver">Los campos con * son obligatorios</p></div>
            </div>
            <?= form_close() ?>
        </div>
</body>
</html>