<link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>assets/js/login.js"></script>
<?php
    $username = array('id' => 'username', 'name' => 'username', 'placeholder' => 'Usuario', 'class' => 'span2');
    $password = array('id' => 'password','name' => 'password', 'placeholder' => 'Password', 'class' => 'span2');
    $submit = array('type' => 'image', 'src' => base_url() . '/assets/img/login-icon.png', 'class' => 'input-login img-login');
?>
<div>
    <div class="pull-right">
        <?php if(!$is_logued_in): ?>
            <div id="form_login" class="form_login">
                <?php echo form_open('') ?>
                    <div>
                        <div class="pull-left input-login">
                            <?php echo form_input($username)?><p><?php echo form_error('username') ?></p>
                        </div>
                        <div class="pull-left input-login">
                            <?php echo form_password($password)?><p><?php echo form_error('password') ?></p>
                        </div>
                        <div class="pull-left btn-login">
                            <?php echo form_submit($submit)?>
                        </div>
                    </div>
                <?php echo form_close()?>
            </div>
            <div id="register" class="pull-left"><?php echo anchor('register/index', 'Registro') ?></div>
        <?php else: ?>
            <p>Hola <?php echo $name ?>! <p>
            <p>Perfil: <?php echo $perfil ?></p>
        <?php endif ?>
    </div>
</div>