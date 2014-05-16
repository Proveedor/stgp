<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
    $email = array('name' => 'email', 'placeholder' => 'Email');
    $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
    $password_conf = array('name' => 'password_conf', 'placeholder' => 'Confirmacion password');
    $name = array('name' => 'name', 'placeholder' => 'Nombre');
    $address = array('name' => 'address', 'placeholder' => 'Direccion');
    $city = array('name' => 'city', 'placeholder' => 'Ciudad');
    $country = array('name' => 'country', 'placeholder' => 'Pais');
    $submit = array('name' => 'submit', 'value' => 'Enviar', 'title' => 'Enviar');
?>
    <div>
        <div id="login">
            <div id="form_login">
                    <?php echo form_open('register') ?>

                        <label for="email">Email*</label>
                        <?php echo form_input($email,$v_email)?><p><?php echo form_error('email') ?></p>
                        <label for="password">Introduce tu password*:</label>
                        <?php echo form_input($password)?><p><?php echo form_error('password') ?></p>
                        <label for="password_conf">Vuelve a introducir tu password*:</label>
                        <?php echo form_input($password_conf)?><p><?php echo form_error('password_conf') ?></p>
                        <label for="country">Pais*</label>
                        <?php echo form_input($country,$v_country)?><p><?php echo form_error('country') ?></p>

                        <label for="name">Nombre</label>
                        <?php echo form_input($name,$v_name)?><p><?php echo form_error('name') ?></p>
                        <label for="city">Ciudad</label>
                        <?php echo form_input($city,$v_city)?><p><?php echo form_error('city') ?></p>

                        <?php echo form_submit($submit)?>
                    <?php echo form_close()?>                    
            </div>
        </div>
    </div>

</body>
</html>