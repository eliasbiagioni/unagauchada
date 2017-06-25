<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" /> 
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />  
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido al sitio
        </div>
        <ul id="button">
            <li><a href="<?= base_url().'verGauchadaCompleta?num='.$idfavor ?>">Volver a la gauchada</a></li>
            <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
        </ul>
    </div>
    <hr class="longitud">
    <h1>Califación de usuario</h1>
    <div class="contenedorRegistroGauchada letra" >
        <?= form_open('calificaciones/enviarCalificacion?idfavor='.$idfavor.'&idusuariocalificar='.$idusuariocalificar) ?>
        <div><?= form_label('Calificación: ') ?></div>
        <div><select id="calificar" class="tamaño-campos" name="calificacion" >
            <option value="0" <?php if((isset($_POST['calificacion']))) { if ($_POST['calificacion'] == 0){echo "selected";} }?>></option>
            <option value="1" <?php if((isset($_POST['calificacion']))) { if ($_POST['calificacion'] == 1){echo "selected";} }?>>Positivo</option>
            <option value="2" <?php if((isset($_POST['calificacion']))) { if ($_POST['calificacion'] == 2){echo "selected";} }?>>Neutro</option>
            <option value="3" <?php if((isset($_POST['calificacion']))) { if ($_POST['calificacion'] == 3){echo "selected";} }?>>Negativo</option>
            </select></div>
        <span><?= form_error('calificacion') ?></span>
        <div><textarea name="comentario" cols="60" rows="10" maxlength="600" placeholder="Escribe el comentario" id="comentario" ><?php if (isset($_POST['comentario'])){ echo $_POST['comentario']; } ?></textarea></div>
        <span><?= form_error('comentario') ?></span>
        <?= form_submit('','Enviar calificación') ?>
        <?= form_close() ?>
    </div>
    </body>
</html>