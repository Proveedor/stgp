<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
    $username = array('name' => 'username', 'placeholder' => 'nombre de usuario');
    $password = array('name' => 'password',    'placeholder' => 'introduce tu password');
    $submit = array('name' => 'submit', 'value' => 'Iniciar sesion', 'title' => 'Iniciar sesion');
?>
    <div>
        <div id="login">
            <div id="form_login">
                    <?php echo form_open('/login/validate_user') ?>
                    <label for="email">Nombre de usuario:</label>
                    <?php echo form_input($username)?><p><?php echo form_error('username') ?></p>
                    <label for="password">Introduce tu password:</label>
                    <?php echo form_password($password)?><p><?php echo form_error('password') ?></p>
                    <?php echo form_submit($submit)?>
                    <?php echo form_close()?>                    
            </div>
        </div>
        <div id="register"><?php echo anchor('register/index', 'Registro') ?></div>
    </div>

</body>
</html>