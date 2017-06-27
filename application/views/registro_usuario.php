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
                <div><input name="nombre_usuario" type="text" placeholder="Escribe tu nombre" class="tamaño-campos" id="nombre_usuario" value="<?php if (isset($_POST['nombre_usuario'])){ echo $_POST['nombre_usuario']; } ?>"/> </div>
                <span><?= form_error('nombre_usuario')?></span>
            </div>
            <div>
                <div><?= form_label('Apellido*: ')?></div>
                <div><input name="apellido_usuario" type="text" placeholder="Escribe tu apellido" class="tamaño-campos" id="apellido_usuario" value="<?php if (isset($_POST['apellido_usuario'])){ echo $_POST['apellido_usuario']; } ?>"/></div>
                <span><?= form_error('apellido_usuario') ?></span>
            </div>
            <div>
                <div><?= form_label('Localidad*: ') ?></div>
                <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
                <div><select id="localidades" class="tamaño-campos" name="ciudades" required>
                    <option value="0"></option>
                    <?php if(isset($_POST['ciudades'])){$seleccionado=$_POST['ciudades'];}else{$seleccionado=0;}
                    foreach ($localidades as $localidad){
                        if($localidad->id_localidad==$seleccionado){
                            echo "<option value='".$localidad->id_localidad."' selected>".$localidad->nombre_localidad."</option>";
                            }else{echo "<option value='".$localidad->id_localidad."'>".$localidad->nombre_localidad."</option>";}
                    }?>
                    </select></div>
                <span><?= form_error('ciudades')?></span>
            </div>
            <div>
                <div><?= form_label("Fecha de nacimiento*: ") ?></div>
                <div><input name="fecha" type="text" placeholder="dd/mm/yyyy" class="tamaño-campos" id="fecha" value="<?php if (isset($_POST['fecha'])){ echo $_POST['fecha']; } ?>"/></div>
                <span><?= form_error('fecha')?></span>
            </div>
            <div>
                <div><?= form_label("Correo electrónico*: ") ?></div>
                <div><input name="mail_usuario" type="text" placeholder="Escribe tu cuenta de mail" class="tamaño-campos" id="mail_usuario" value="<?php if (isset($_POST['mail_usuario'])){ echo $_POST['mail_usuario']; } ?>"/></div>
                <span><?= form_error('mail_usuario')?></span>
            </div>
            <div>
                <div><?= form_label("Telefono*: ") ?></div>
                <div><input name="telefono_usuario" type="text" placeholder="Escribe tu numero de telefono" class="tamaño-campos" id="telefono_usuario" value="<?php if (isset($_POST['telefono_usuario'])){ echo $_POST['telefono_usuario']; } ?>"/></div>
                <span><?= form_error('telefono_usuario')?></span>
            </div>
            <div>
                <div><?= form_label("Contraseña*: ") ?></div>
                <div><input name="contrasenia_primera" type="password" placeholder="Escribe tu contraseña" class="tamaño-campos" id="contrasenia_primera" value="<?php if (isset($_POST['contrasenia_primera'])){ echo $_POST['contrasenia_primera']; } ?>"/></div>
                <span><?= form_error('contrasenia_primera')?></span>
            </div>
            <div>
                <div><?= form_label("Repetir contraseña*: ") ?></div>
                <div><input name="contrasenia_repetida" type="password" placeholder="Repite tu contraseña" class="tamaño-campos" id="contrasenia_repetida" value="<?php if (isset($_POST['contrasenia_repetida'])){ echo $_POST['contrasenia_repetida']; } ?>"/></div>
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