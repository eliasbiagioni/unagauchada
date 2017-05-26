<!DOCTYPE html>
<html>
    <head>
        <?php if(isset($head)){foreach ($head as $key) {
            echo $key;}
        }?>
        <title>Una gauchada</title>
    </head>
    <body>
        <div>
        	<?php echo img($image_properties); ?>
        </div>