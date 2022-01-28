<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin - METROFEST 2021</title>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="/favicon.png">
	<link href="<?= base_url(); ?>/assets/css/index.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
	
	<section id="secRegister" class="sec-container-light">
		<div class="sec-content">
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg">Silahkan login terlebih dahulu.</p>

					<form action="<?php echo site_url('sysadmin/site/signin') ?>" id="login-form" method="POST" accept-charset="UTF-8">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="user_name" id="user_name" placeholder="NIP">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- /.col -->
							<div class="col-12">
								<button type="submit" id="btn-submit" class="btn btn-primary btn-block">LOGIN</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
				<!-- /.login-card-body -->
			</div>
		</section>
		<section id="secPattern">
			<div class="pattern-content">&nbsp;</div>
		</section>
		<footer>
			<div class="sec-content">
				<div class="footer-social">
					<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>/assets/images/social/twitter.png" alt="Twitter"></a>
					<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>/assets/images/social/facebook.png" alt="Facebook"></a>
					<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>/assets/images/social/instagram.png" alt="Instagram"></a>
					<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>/assets/images/social/youtube.png" alt="Youtube"></a>
				</div>
				<div class="footer-copyright">

				</div>
			</div>
		</footer>

		<script type="text/javascript"> var main_url = '<?= base_url(); ?>/' </script>
		<script type="text/javascript"> var base_url = '<?= base_url('sysadmin'); ?>/' </script>
		<script src="<?= base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>\
		<script src="<?= base_url(); ?>assets/vendor/jquery-form/jquery.form.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/sysadmin/login.js"></script>
	</body>
	</html>