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
	<link href="<?= base_url(); ?>assets/css/index.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
	
	<section id="secRegister" class="sec-container-light">
		<div class="sec-content">

      <h2>LIST REGISTERED TEAM</h2>
      <div style="float: right;">
        <h4><a href="<?= base_url('sysadmin'); ?>">BACK TO ADMIN DASHBOARD</a></h4>
      </div>

      <div class="table-responsive">
        <table class="table table-striped custom-table" id="table">
          <thead>
            <tr>
              <th scope="col">ID Tim</th>
              <th scope="col">Perusahaan/ Instansi Asal</th>
              <th scope="col">Nama Tim</th>
              <th scope="col">Zona Waktu</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

      <!-- DETAIL MODAL -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" style="overflow-y: scroll;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" id="memberContainer">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btn-approve" class="btn btn-success">Approve</button>
              <button type="button" id="btn-reject" class="btn btn-danger">Reject</button>
            </div>
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
<script type="text/javascript"> var main_url = '<?= base_url(); ?>/' </script>
<script type="text/javascript"> var base_url = '<?= base_url('sysadmin'); ?>/' </script>
<script src="<?= base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-form/jquery.form.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sysadmin/regist.js"></script>
</body>
</html>