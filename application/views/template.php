<!doctype html>
<html>
<head>
	<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/css/default_layout.css" rel="stylesheet" type="text/css"/>
	<script>
    	var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<?php echo $login; ?>
		</header>
		<div class="middle">
			<div class="container">
				<main class="content">
					<?php echo $contents; ?>
				</main>
			</div>
			<?php if(isset($enable_sidebar) && $enable_sidebar): ?>
				<aside class="left-sidebar">
					<?php echo $sidebar; ?>
				</aside>
			<?php endif; ?>
		</div>
		<footer class="footer">
			<strong>Footer</strong>
		</footer>
	</div>
</body>
</html>