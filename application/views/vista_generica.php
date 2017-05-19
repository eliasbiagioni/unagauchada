<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/inicio.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <div class="image">
        <?php echo img($image_properties); ?>
        </div>
        <h1><?= $mensaje ?></h1>
    </body>
</html>