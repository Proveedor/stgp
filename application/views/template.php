<!doctype html>
<html>
<head>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/jquery-ui-1.10.4.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/default_layout.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<?php echo $login; ?>
		</header><!-- .header-->
		<div class="middle">
			<div class="container">
				<main class="content">
					<?php echo $contents; ?>
				</main><!-- .content -->
			</div><!-- .container-->
			<?php if(isset($enable_sidebar) && $enable_sidebar): ?>
				<aside class="left-sidebar">
					<strong>Left Sidebar</strong> 
				</aside><!-- .left-sidebar -->
			<?php endif; ?>
		</div><!-- .middle-->
		<footer class="footer">
			<strong>Footer</strong>
		</footer><!-- .footer -->
	</div><!-- .wrapper -->
</body>
</html>