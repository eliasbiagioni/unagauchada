<!DOCTYPE html>
<html>
    <head>
        <?=  link_tag('css/inicio.css') ?>
        <?=  link_tag('css/formulario_registro.css') ?>
        <title><?= $title ?></title>
    </head>
    <body>
        <div class="image"><?php echo img($image_properties); ?></div>
    <h1>Formulario de registro de usuario</h1>
    <div class="tabla">
        <?= form_open_multipart('/registrousuario/validar_datos')?>
        <!--INICIO TABLE DE FORMULARIO PARA REGISTRO!-->
        <table>
            <tr>
                <td><?= form_label('Nombre: ')?></td>
                <td><?= form_input($nombre_usuario) ?></td>
            </tr>
            <tr>
                <td><?= form_label('Apellido: ')?></td>
                <td><?= form_input($apellido_usuario) ?></td>
            </tr>
            <tr>
                <td><?= form_label('Localidad: ') ?></td>
                <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
                <td><select id="localidades" class="tamaño-campos" name="ciudades" required>
                    <option value="0"></option>
                    <?php foreach ($localidades as $localidad) {?>
                    <option value="<?= $localidad->id_localidad ?>"> <?= $localidad->nombre_localidad ?></option>
                    <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td><?= form_label("Fecha de nacimiento: ") ?></td>
                <td><?= form_input($fecha) ?></td>
            </tr>
            <tr>
                <td><?= form_label("Sexo*: ") ?></td>
                <td>Masculino: <?= form_input($sexo_hombre) ?>
                Femenino: <?= form_input($sexo_mujer) ?></td>
            </tr>
            <tr>
                <td><?= form_label("Mail: ") ?></td>
                <td><?= form_input($mail_usuario) ?></td>
            </tr>
            <tr>
                <td><?= form_label("Telefono: ") ?></td>
                <td><?= form_input($telefono_usuario) ?></td>
            </tr>
            <tr>
                <td><?= form_label("Contraseña: ") ?></td>
                <td><?= form_input($contrasenia_primera) ?></td>
            </tr>
            <tr>
                <td><?= form_label("Repetir contraseña: ") ?></td>
                <td><?= form_input($contrasenia_repetida) ?></td>
            </tr>
            <tr>
                <td><?= form_label('Foto de usuario*: ') ?></td>
                <td> <?= form_upload('pic')?></td>
            </tr>
            <tr>
                <td><?= form_submit('','Almacenar usuario') ?></td>
            </tr>
        </table>
        <?= form_close() ?>
        <div class="centrado"><?= validation_errors(); ?></div>
    </div>
</body>
</html>