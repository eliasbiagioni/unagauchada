<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una Gauchada</title>
    </head>
        
<body>
    <div>
       	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
    </div>
    <div class="barraInicial longitud">
        <div class="bienvenido">
                Bienvenido/a, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
        </div>
        
            <ul id="button">
                <li><a href="<?= base_url().'verPerfil?mail='.$this->session->userdata('email') ?>">Volver a tu Perfil</a></li>
                <li><a href="<?= base_url() ?>publicar_gauchada/volverAInicio">Volver a la pagina de inicio</a></li>
            </ul>
    </div>
    <?= '<h2>'.$mensaje.'</h2>' ?>
     
        
        <?php if($mensaje == 'Gauchadas en las que soy/fui candidato.') { foreach ($gauchadas as $gauchada) { ?>
        <div class="contenedorDetalleGauchada">
            <div><p class="letra"><strong>Título de la gauchada: </strong><?= $gauchada->titulo_gauchada ?></p></div>
            <div><p class="letra"><strong>Estado de la postulación: </strong><?= $gauchada->estado ?></p></div>
        </div><br>
        <?php } } ?>
</body>
</html>