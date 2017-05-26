<div>
    <h1>Iniciar sesion</h1>
    <?php 
        echo form_open('/iniciosesion/iniciarsesion');
        echo form_label('Ingresa email: ');
        echo form_input();
        echo form_label('Ingresa contraseña: ');
        echo form_input();
        echo form_submit('','Iniciar sesión');
        echo form_close();
    ?>
</div>
</body>
</html>