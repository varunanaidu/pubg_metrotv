<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin - METROFEST 2021</title>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="/favicon.png">
	<link href="css/index.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/fonts/icomoon/style.css">
</head>
<body>
	
	<section id="secRegister" class="sec-container-light">
		<div class="sec-content">
			<h2>List APPROVED TEAM</h2>
       <div style="float: right;">
        <h4><a href="admin_index.html">BACK TO ADMIN DASHBOARD</a></h4>
      </div>
			

			<div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">
                <label class="control control--checkbox">
                  <input type="checkbox"  class="js-check-all"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
              <th scope="col">ID Tim</th>
              <th scope="col">Perusahaan/ Instansi Asal</th>
              <th scope="col">Nama Tim</th>
              <th scope="col">Zona Waktu</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>
              1
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
					TV One
                </div>
              </td>
              <td>
                Tim TV One
              </td>
              <td>WIB</td>
              <td><a href="detail_team.html" class="more">Details</a></td>
            
            </tr>

            
            <button id="fm-submit" type="submit" onClick="">Export to Excel</button>
          </tbody>
        </table>
      </div>

		</div>
	</section>
	<section id="secPattern">
		<div class="pattern-content">&nbsp;</div>
	</section>
	<footer>
		<div class="sec-content">
			<div class="footer-social">
				<a href="javascript:void(0)" target="_blank"><img src="<?php echo base_url();?>/assets/images/social/twitter.png" alt="Twitter"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?php echo base_url();?>/assets/images/social/facebook.png" alt="Facebook"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?php echo base_url();?>/assets/images/social/instagram.png" alt="Instagram"></a>
				<a href="javascript:void(0)" target="_blank"><img src="<?php echo base_url();?>/assets/images/social/youtube.png" alt="Youtube"></a>
			</div>
			<div class="footer-copyright">
				
			</div>
		</div>
	</footer>
	
	<script src="<?php echo base_url();?>/assets/js/validation.js"></script>
</body>
</html>