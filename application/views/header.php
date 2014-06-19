<link href="<?php echo base_url() ?>assets/css/card_search.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>assets/js/card_search.js"></script>
<link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>assets/js/login.js"></script>
<?php
	$search_field = array('id' => 'search_field', 'name' => 'search_field', 'placeholder' => 'Buscar', 'class' => 'search_field span2');
    $submit_search = array('type' => 'image', 'src' => base_url() . '/assets/img/search-icon.png', 'class' => 'input-search img-search');
    $username = array('id' => 'username', 'name' => 'username', 'placeholder' => 'Usuario', 'class' => 'span2');
    $password = array('id' => 'password','name' => 'password', 'placeholder' => 'Password', 'class' => 'span2');
    $submit = array('type' => 'image', 'src' => base_url() . '/assets/img/login-icon.png', 'class' => 'input-login img-login');
?>
<div class="pull-right login">
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
        <div name="usr_logued" class="usr_logued">
            <p>Hola <?php echo $name ?>! <p>
            <p>Perfil: <?php echo $perfil ?></p>
        </div>
    <?php endif ?>
</div>
<div id="form_search" class="form_search pull-right">
    <?php echo form_open('') ?>
        <div>
            <div class="input-search pull-left">
                <?php echo form_input($search_field)?>
            </div>
            <div class="btn-search pull-left">
                <?php echo form_submit($submit_search)?>
            </div>
        </div>
    <?php echo form_close()?>
</div>