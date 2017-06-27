<!DOCTYPE html>
<html>
<head>
	<title>Publicar Gauchada</title>
	
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
</head>
<body onload="nobackbutton();">
    <div>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial">    
            <ul id="button">
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
    <h1 class="letra"><?= $mensaje.' gauchada' ?></h1><br>
    
    <div  class="contenedorRegistroGauchada letra">
        <?php if($mensaje == 'Editar') {echo form_open_multipart("Publicar_gauchada/validar_datos?tipo=1&diasRestantes=".$diasRestantes.'&idfavor='.$idfavor);} else { echo form_open_multipart("Publicar_gauchada/validar_datos?tipo=0&idfavor=0");}?>
        <div>
            <div><?= form_label('<p>Título de la Gauchada: </p>','titulo');?></div>
            <div><input name="titulo" type="text" placeholder="Escribe el titulo" class="tamaño-campos" id="titulo" value="<?php if($mensaje == 'Editar') { echo $gauchada->titulo_favor; } else { if (isset($_POST['titulo'])){ echo $_POST['titulo']; } } ?>"/></div>
            <span><?= form_error('titulo') ?></span>
        </div>
        <div>
            <div><?= form_label('<p>Descripción: </p>','descripcion');?></div>
            <div><textarea name="descripcion" cols="60" rows="10" maxlength="600" placeholder="Escribe la descripcion" id="descripcion" ><?php if($mensaje == 'Editar') { echo $gauchada->contenido_favor; } else { if (isset($_POST['descripcion'])){ echo $_POST['descripcion']; }} ?></textarea></div>
            <span><?= form_error('descripcion') ?></span>
        </div>
        <div>
            <?php if($mensaje == 'Editar'){
                if($gauchada->contenido_imagen == NULL){
                    $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
                    }
                else {
                    $encode = base64_encode($gauchada->contenido_imagen);
                    $extension = $gauchada->extension_imagen;
                    $source_imagen = "data: $extension; base64, $encode";
                } ?>
                <p> Esta es tu imagen, si no la quiere cambiar no seleccione ningún archivo. Si la desea cambiar, elija una imagen. 
                <div class="imagen"><img src="<?= $source_imagen ?>" width="400px" height="350px" alt=""/></div> </p>
            <?php } ?>
            <div><?= form_label('Imagen: ');?></div>
            <div><input type="file" name="pic"></div>
            <span><?= form_error('pic') ?></span>
        </div>
        <div>
            <div><?= form_label('Localidad: ') ?></div>
            <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
            <div><select id="localidades" class="tamaño-campos" name="ciudades" required>
                <option value="0"></option>,
                    <?php if($mensaje == 'Editar') {$seleccionado = $gauchada->id_localidad;} else { if(isset($_POST['ciudades'])){$seleccionado=$_POST['ciudades'];}else{$seleccionado=0;}}
                    foreach ($localidades as $localidad){
                        if($localidad->id_localidad==$seleccionado){
                            echo "<option value='".$localidad->id_localidad."' selected>".$localidad->nombre_localidad."</option>";
                            }else{echo "<option value='".$localidad->id_localidad."'>".$localidad->nombre_localidad."</option>";}
                    }?>
            </select></div>
            <span><?= form_error('ciudades')?></span>
        </div>
        <div>
            <div><?= form_label('Categoría: ') ?></div>
            <!-- SE INGRESA EN EL SELECT, LAS CIUDADES QUE SE ENCUENTRAN DISPONIBLES EN LA BD !-->
            <div><select id="categorias" class="tamaño-campos" name="categorias" required>
                <option value="0"></option>
                    <?php if($mensaje == 'Editar') {$seleccionado = $gauchada->id_categoria;} else {  if(isset($_POST['categorias'])){$seleccionado=$_POST['categorias'];}else{$seleccionado=0;}}
                    foreach ($categorias as $categoria){
                        if($categoria->id_categoria==$seleccionado){
                            echo "<option value='".$categoria->id_categoria."' selected>".$categoria->nombre_categorias."</option>";
                            }else{echo "<option value='".$categoria->id_categoria."'>".$categoria->nombre_categorias."</option>";}
                    }?>
                
                
                </select></div>
            <span><?= form_error('categorias')?></span>
        </div>
        <div>
            <div><?= form_label('<p>Días hábiles: ','cantDias');?></div>
            <div><input name="cantDias" type="number" placeholder="Escribe la cantidad de dias" class="tamaño-campos" id="cantDias" value="<?php if($mensaje == 'Editar') {echo $diasRestantes;} else { if (isset($_POST['cantDias'])){ echo $_POST['cantDias']; }} ?>"/></div>
            <span><?= form_error('cantDias')?></span>
        </div>
        <div>
            <div><?php if($mensaje == 'Nueva') { echo form_submit('','Publicar Gauchada'); } else { echo form_submit('','Actualizar gauchada'); }?></div>
        </div>
        <?= form_close()?>
    </div>
</body>
</html>


