<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" />  
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/detalleGauchada.js"></script>
        <title>Una gauchada</title>
    </head>
    <body>
        <img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Detalle de gauchada
        </div>
        <ul id="button">
            <?php if(($cant_postulantes == 0)&&($this->session->userdata('login') == TRUE) && ($cantDias > 0) && ($this->session->userdata('id') == ($gauchada->id_usuario_dueño))&&($mensaje != 'Expiró')){ ?>
            <li><a href="<?= base_url().'publicar_gauchada?idfavor='.$idfavor.'&tipo=1'.'&diasRestantes='.$totDias ?>">Editar gauchada</a></li>
            <?php }?>
            <?php if(($this->session->userdata('login') == TRUE) && ($cantDias > 0) && ($this->session->userdata('id') != ($gauchada->id_usuario_dueño))&(!$existeCalificacion)&(!$existeAceptado)){ 
                if($se_postulo > 0) { ?>
                    <li><a OnClick="if (! confirm('¿Esta seguro que desea cancelar su candidatura a esta gauchada?')) return false;" href="<?= base_url().'postulacion/cancelarCandidatura?idfavor='.$id_favor.'&idpostulante='.$this->session->userdata('id') ?>">Cancelar candidatura</a></li>
                <?php } else { if ((!$existeCalificacion)&&(!$existeAceptado)){?>    
                <li><a OnClick="if (! confirm('¿Esta seguro que desea postularse como candidato a esta gauchada?')) return false;" href="<?= base_url().'postulacion/index?idfavor='.$id_favor.'&idpostulante='.$this->session->userdata('id') ?>">Postularse como candidato</a></li>
                <?php }  ?>
                <?php } ?>
                <li><a href="<?= base_url().'verGauchadaCompleta/realizarPregunta?idGauchada='.$id_favor.'&idUsuario='.$this->session->userdata('id')?>">Realizar una pregunta</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            <?php }else if($this->session->userdata('login') == TRUE) { ?>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
                <?php } else { ?>
                <li><a href="<?= base_url() ?>inicio">Volver a inicio</a></li>
                <?php } ?>
        </ul>
    </div>
    <hr class="longitud">
    <div class="contenedorDetalleGauchada">
        <?php if($gauchada->contenido_imagen == NULL){
                    $source_imagen = "http://localhost/unagauchada/images/imagen_por_defecto.png";
                }else {
                    $encode = base64_encode($gauchada->contenido_imagen);
                    $extension = $gauchada->extension_imagen;
                    $source_imagen = "data: $extension; base64, $encode";
                } ?>
        <div class="imagen"><img src="<?= $source_imagen ?>" width="190px" height="130px" alt=""/></div>
        <h1 class="titulo letra"><?= $gauchada->titulo_favor ?></h1>
        <h3 class="titulo letra">Descripcion: </h3>
        <div class="descripcion"><p class="letra"><?= $gauchada->contenido_favor ?></p></div><hr>
        <?php if ($this->session->userdata('login') == TRUE) { ?>
        <div class="localidad"><p class="letra">Dueño: <a href="<?= 'verPerfil?id='.$gauchada->id_usuario_dueño?>"> <?= $gauchada->nombre_usuario." ".$gauchada->apellido_usuario ?> </a></p></div><hr>
        <?php } else { ?>
            <div class="localidad"><p class="letra">Dueño: <?= $gauchada->nombre_usuario." ".$gauchada->apellido_usuario ?> </p></div><hr>
        <?php
        }
        ?>
        <div class="localidad"><p class="letra">Localidad: <?= $gauchada->nombre_localidad ?></p></div><hr>
        <div class="localidad"><p class="letra">Categoría: <?= $gauchada->nombre_categorias ?></p></div><hr>
        <div class="localidad"><p class="letra">Fecha de creación: <?= $gauchada->fecha_creacion ?></p></div><hr>
        <div class="localidad"><p class="letra"><?= $mensaje ?></h3></div><hr>
        <div class="localidad"><p class="letra">Cantidad de postulantes: <?= $cant_postulantes ?></p></div><hr>
        <div>
            <?php if(($this->session->userdata('login') == TRUE) && ($this->session->userdata('id') == ($gauchada->id_usuario_dueño))){ ?>
            <button type="button" class="desplegable" onclick="mostrarOcultar('postulantes')">Lista de postulantes</button>
            <div class="oculto" id="postulantes" >
            <?php if($cant_postulantes == 0){echo 'No hay postulantes';} else { foreach ($postulantes as $usuario) { if(($usuario->estado == 'Aceptado')||($usuario->estado == 'Pendiente')){ ?><hr>
                <div><p class="letra"><strong> Usuario: </strong><a href="<?= 'verPerfil?id='.$usuario->id_usuario?>"> <?= $usuario->nombre_usuario." ".$usuario->apellido_usuario ?></a></p></div>
                <div><p class="letra"><strong> Logro: </strong><?= $this->postulacion_model->nombre_logro($usuario->id_usuario)->nombre_reputacion?></p></div>
                <div><p class="letra"><strong> Comentario: </strong><?= $usuario->comentario ?></p></div>
                <div><p class="letra"><strong> Estado: </strong><?= $usuario->estado ?></p></div>
                <?php if ($usuario->estado == 'Aceptado'){ ?>
                    <div><p class="letra"><strong> Mail: </strong><?= $usuario->mail_usuario?></p></div>
                    <div><p class="letra"><strong> Teléfono: </strong><?= $usuario->telefono_usuario ?></p></div>
                    <?php if (!$existeCalificacion) { ?>
                    <div><a href="<?= base_url().'calificaciones/index?idfavor='.$idfavor.'&idusuariocalificar='.$usuario->id_usuario ?>">Calificar usuario</a></div>
                <?php } else { ?> 
                        <div><p class="letra">Usuario calificado</p></div>
                <?php } } ?>
                    
                <?php if($usuario->estado == 'Pendiente') { ?>
                    <div><a OnClick="if (! confirm('¿Esta seguro que desea seleccionar este postulante?')) return false;" href="<?= base_url().'postulacion/seleccionarPostulante?idfavor='.$idfavor.'&idpostulante='.$usuario->id_usuario ?>" >Seleccionar postulante</a></div>
                <?php } }  ?>
            <?php  } } ?>
            </div>
            <?php }?>
            <button type="button" class="desplegable" onclick="mostrarOcultar('preguntas')">Preguntas</button>
            <div class="oculto" id="preguntas">
            <br>
            <?php

                if ($cantPreguntas == 0){
                    echo "Todavía no hay preguntas!";
                }
                else {
                foreach ($preguntas as $pregunta) {

                    
                    ?>  <div class="pregunta">
                        
                            <p> El usuario <strong> <?php echo "$pregunta->nombre_usuario $pregunta->apellido_usuario"?></strong> escribió</p>

                            <p> <i> <?= $pregunta->contenido_pregunta ?> </i></p>

                            <p><strong>Respuesta: </strong></p>

                            <?php if ($pregunta->contenido_respuesta == NULL){
                                    echo "Todavia no hay respuesta";
                                    if (($this->session->userdata('id')) == ($gauchada->id_usuario_dueño)){
                                        ?> <p><a href="<?= base_url().'verGauchadaCompleta/responderPregunta?id='.$pregunta->id_pregunta.'&pregunta='.$pregunta->contenido_pregunta.'&idGauchada='.$id_favor.'&idUsuario='.$this->session->userdata('id')?>"> Responder </a></p><?php
                                    }
                            } 
                                 else {
                                    echo "<i> $pregunta->contenido_respuesta </i>";
                                 }
                            ?>
                        </div>
                        <br>
                        <?php

                }
            }
            ?>
        </div></div>
    </div>
    </body>
</html>    