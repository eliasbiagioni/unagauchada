<!DOCTYPE html>
<html>
    <head>
        <link href="http://localhost/unagauchada/css/imagen_principal.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/formulario_registro.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/sesionIniciada.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/unagauchada/css/detalleGauchada.css" rel="stylesheet" type="text/css" />  
        <script type="text/javascript" charset="utf-8" src="http://localhost/unagauchada/js/botonAtras.js"></script>
        <title>Una gauchada</title>
    </head>
    <body onload="nobackbutton()">
        <div>
        	<img src="http://localhost/unagauchada/images/unagauchada.png" class="size_image" alt=""/>
        </div>
        <div class="barraInicial">  
            <div class="bienvenido">
                Bienvenido/a, <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?>
            </div>
            <ul id="button">
                <li><a href="<?= base_url().'administrar/ganancias' ?>">Volver</a></li>
            </ul>
        </div>
        <h1 class="letra">Ganancias</h1>
        <h1 class="letra"><?= $mensaje ?></h1><br>
        <?php if($mensaje == 'Listado de compras entre las fechas dadas.') { $precioTotal = 0; ?>
        <div class="contenedorDetalleGauchada">
        <?php foreach ($compras as $compra) {?>
            <p class="letra"><strong>Cantidad de créditos: </strong><?= $compra->cantidad_creditos ?> - <strong>Precio de la compra: </strong><?= '$'.$compra->valor_total ?> - <strong>Fecha de la compra: </strong><?= $compra->fecha_compra ?></p>
        <hr>
        <?php $precioTotal = $precioTotal + $compra->valor_total; } ?>
        <p class="letra"><strong>Valor total de la ganancia: </strong><?= '$'.$precioTotal ?></p>
        </div>
        <?php } ?>
</body>
</html>