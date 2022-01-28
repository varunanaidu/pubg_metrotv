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
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/index.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
</head>
<body>
	
	<section id="secRegister" class="sec-container-light">
		<div class="sec-content">

			<div class="row m-t-25">
				<div class="col-sm-4 col-lg-4">
					<div class="overview-item overview-item--c1">
						<a href="<?= base_url('sysadmin/registran'); ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="fa fa-inbox" aria-hidden="true"></i>
									</div>
									<div class="text">
										<h2>Registran</h2>
									</div>
								</div>
								<div class="overview-chart">

								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4">
					<div class="overview-item overview-item--c1">
						<a href="<?= base_url('sysadmin/approved'); ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="fa fa-inbox" aria-hidden="true"></i>
									</div>
									<div class="text">
										<h2>Approved</h2>
									</div>
								</div>
								<div class="overview-chart">

								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4">
					<div class="overview-item overview-item--c1">
						<a href="<?= base_url('sysadmin/reject'); ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="fa fa-inbox" aria-hidden="true"></i>
									</div>
									<div class="text">
										<h2>Rejected</h2>
									</div>
								</div>
								<div class="overview-chart">

								</div>
							</div>
						</a>
					</div>
				</div>

			</div>

		</div>
	</section>
	<section id="secPattern">
		<div class="pattern-content">&nbsp;</div>
	</section>
	<footer>
		<div class="sec-content">
			<div class="footer-social">
				<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>assets/images/social/twitter.png" alt="Twitter"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>assets/images/social/facebook.png" alt="Facebook"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>assets/images/social/instagram.png" alt="Instagram"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?= base_url(); ?>assets/images/social/youtube.png" alt="Youtube"></a>
			</div>
			<div class="footer-copyright">

			</div>
		</div>
	</footer>

	<script src="<?= base_url(); ?>assets/js/validation.js"></script>
</body>
</html>