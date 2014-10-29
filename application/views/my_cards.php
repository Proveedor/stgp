<link href="<?php echo base_url() ?>assets/css/my_card_list.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/tooltip_image.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>assets/js/tooltip_image.js"></script>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#mycards" role="tab" data-toggle="tab">Mis Cartas</a></li>
  <li><a href="#publications" role="tab" data-toggle="tab">Publicaciones</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="mycards">
		<div class="panel panel-default">
			<!-- <div class="panel-heading">Mis Cartas</div> 
				<div id="add_card" class="input-group">
					<?php   
						$busqueda = array('name' => 'busqueda', 'placeholder' => 'Agregar', 'class' => 'form-control');
						$submit = array('name' => 'submit', 'value' => 'Enviar', 'title' => 'Enviar', 'class' => 'btn btn-default');
						echo form_open('#');
					?>
						<span class="input-group-btn">
					        <?php echo form_submit($submit)?>
				      	</span>
		                <?php echo form_input($busqueda)?>
	                
	                <?php echo form_close()?>
				</div> -->
				<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
			<div class="panel-heading">Mis Cartas</div>
			<table class="table">
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Cantidad</th>
			</tr>
			<?php if(count($card_list)):
				foreach($card_list as $array):?>
					<tr>
						<td>
							<div id='image'>
								<?php echo get_mtg_img($array['multiverseid'],'my_card_list_img preview'); ?>
							</div>
						</td>
						<td><?php echo $array['namecard']; ?></td>
						<td><?php echo $array['name']; ?></td>
						<td><?php echo $array['quantity']; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else:?>
				<tr>
					<td rowspan=4> <p>No hay nada para mostrar</p></td>
				</tr>
			<?php endif;?>
			</table>
		</div>
	</div>
<div class="tab-pane" id="publications">
	<div class="well well-sm"> mis publicaciones? </div>
</div>
</div>