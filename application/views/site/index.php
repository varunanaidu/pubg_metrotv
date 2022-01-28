<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>METROFEST 2021</title>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/index.css">
	<!--<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
	<script>var site_url = '<?php echo site_url() ?>';</script>
</head>
<body>
	<nav id="mainNav">
		<div class="nav-content">
			<ul>
				<li><a href="#secAbout" class="smooth_scroll">Persyaratan</a></li>
				
				<li><a href="#secVenue" class="smooth_scroll">Tempat</a></li>
				<li><a href="#secPrize" class="smooth_scroll">Hadiah</a></li>
				<!-- <li><a href="#secRegister" style="color: #ffc613;">Registration</a></li> -->
				
			</ul>
		</div>
	</nav>
	
	<section id="secHero">
		<div class="hero-content">
			<h1>METROFEST<br/> PUBG Mobile Competition 2021</h1>
			<h2 style="color: #fff;">Pendaftaran telah ditutup</h2>
			<!-- <a href="#secRegister"><button class="but-register">REGISTRATION</button></a> -->
		</div>
	</section>
	<section id="secAnnounce">
		<div class="announce-content">
			<div class="announce-head">Pengumuman</div>
			<div id="scroll_container">
				<div id="scroll-text" class="announce-text">METROFEST PUBG Mobile Competition 2021 registration open 14 Oct 2021 | Grand Final akan dilaksanakan di Grand Studio Metro TV dan diliput oleh media televisi nasional</div>
			</div>
		</div>
	</section>

	<section id="secAbout" class="sec-container-light">
		<div class="sec-content">
			<h2>PERSYARATAN KEIKUTSERTAAN PERTANDINGAN:</h2>
			<img id="imgAbout" src="<?php echo base_url();?>/assets/images/pubg_car.png" alt="PUBG Car">
			<p>
				<ol>
					<li>Turnamen ini berlaku untuk Media Cetak, Media Elektronik (TV & Radio), dan Online/Siber dari seluruh Indonesia.</li>
					<li>Setiap Media dapat mengirimkan maksimal satu tim perwakilan untuk bertanding di turnamen PUBG, Metrofest Cup 2021.</li>
					<li>Satu tim terdiri dari empat orang pemain PUBG non-professional, yang merupakan karyawan sah dari media yang terdaftar/terverifikasi dalam daftar dari dewan pers. Setiap tim boleh mendaftarkan pemain cadangan hingga maksimal 2 orang pemain cadangan.</li>
					<li>Pemain Non-Professional adalah pemain yang tidak/belum terdaftar dalam ajang turnamen professional resmi PUBG Mobile baik nasional maupun internasional.</li>
					<li>Media yang sudah terdaftar atau terverifikasi dapat dilihat melalui situs https://dewanpers.or.id/data/perusahaanpers</li>
					<li>Setiap tim wajib melampirkan ID Card media masing-masing pada saat pendaftaran sebagai tanda bukti identitas yang sah.</li>
					<li>Setiap tim harus menyertakan nama media masing-masing dalam ingame-name/nickname player (Misal: SniperKiller_MetroTV), termasuk untuk pemain cadangan.</li>
					<li>Tim yang mendaftar harus melampirkan: (1) Logo resmi & terbaru dari media masing-masing; (2) Foto tim menggunakan busana yang seragam dan merepresentasikan media masing-masing; (3) Foto medium shot perseorangan anggota tim menggunakan busana yang seragam dan merepresentasikan media masing-masing. Termasuk bagi pemain cadangan.</li>
					<li>Setiap tim wajib membuat & melampirkan video intro pemain dengan durasi maksimal 30 detik.</li>
					<li>Keseluruhan tim yang mendaftar akan dibagi & dipertandingkan berdasarkan Zona Waktu. (Tim dari Zona WIB, WITA, WIT).</li>
					<li>Tim yang mendaftar akan diverifikasi terlebih dahulu oleh Metro TV. Akan dipilih 20 tim dari setiap Zona Waktu, yang merupakan tim yang mendaftar paling cepat dan benar.</li>
					<li>Pendaftaran tim yang diterima oleh pihak Metro TV paling lambat pada tanggal 24 Oktober 2021.</li>
				</ol>
			</p>
		</div>
	</section>
	
	<section id="secVenue" class="sec-container-light">
		<div class="sec-content">
			<h2>Venue</h2>
			<p>The GRAND FINAL will be held at</p>
			<div id="venueName">Grand Studio Metro TV</div>
			<p>Jl. Pilar Mas Raya, Kav A-D 7, RT.7/RW.3, Kedoya Selatan, <br/>
			Kec. Kebon Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta, 11520</p>
		</div>
	</section>
	<section id="secPrize" class="sec-container-dark">
		<div class="sec-content">
			<img style="width: 100%; margin-top: 20px;" src="<?php echo base_url();?>/assets/images/prize.png" alt="Prize Pool">
		</div>
	</section>
<!-- 	<section id="secRegister" class="sec-container-light">
		<div class="sec-content">
			<h2>Register</h2>
			<p>Semua data wajib diisi dengan benar</p><br/><br/>
			<p id="secRegisterPara">Tim</p>
			<form id="formRegister" class="form-content" enctype="multipart/form-data">
				<input type="hidden" id="fm-regist-code" name="fm-regist-code" value="<?=$code?>">
				<div class="form-row">
					<div class="form-group">
						<label>Perusahaan/ Instansi Asal*</label>
						<small>jika nama media tidak terdaftar, silahkan ketik <b>Media Lain</b> dan pilih sesuai zona wilayah</small>
						<select id="fm-company" name="fm-company" class="form-control select2" style="width: 100%;">
							<option value="">-- Pilih --</option>
							<?php foreach($media as $val) : ?>
								<option value="<?php echo $val['mediaid']; ?>"><?php echo $val['medianame']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Team*</label>
						<input type="text" id="fm-team-name" name="fm-team-name" required>
					</div>
					<div class="form-group">
						<label>Foto Full Team*</label>
						<input type="file" id="fm-photo-team" name="fm-photo-team" required>
					</div>
				</div><br/><br/><br/><br/>
				<p id="secRegisterPara">Anggota Tim</p><br/>

				<?php 
				for ($a = 0; $a < 5; $a++) { 
					if ( $a == 0 ) {
						?>
						<div class="form-row">
							<div class="form-group">
								<label>Nama Pemain* <?= ($a+1) ?> (IGL) </label>
								<input type="text" id="grid_fm-player-name_<?= $a ?>" name="anggota[<?=$a?>][grid_fm-player-name]" required>
							</div>
							<div class="form-group">
								<label>ID PUBG*</label>
								<input type="text" id="grid_fm-pubg-id_<?=$a?>" name="anggota[<?=$a?>][grid_fm-pubg-id]" required>
							</div>
							<div class="form-group">
								<label>NICK PUBG*</label>
								<input type="text" id="grid_fm-nick-pubg_<?=$a?>" name="anggota[<?=$a?>][grid_fm-nick-pubg]" required>
							</div>
							<div class="form-group">
								<label>NIK Kantor*</label>
								<input type="text" id="grid_fm-id-office_<?=$a?>" name="anggota[<?=$a?>][grid_fm-id-office]" required>
							</div>
						</div>

						<div class="form-row" style="margin-bottom: 80px;">
							<div class="form-group">
								<label>Email*</label>
								<input type="email" id="grid_fm-email_<?=$a?>" name="anggota[<?=$a?>][grid_fm-email]" required>
							</div>
							<div class="form-group">
								<label>Foto Memegang ID Card*</label>
								<input type="file" id="grid_fm-photo-id_<?=$a?>" name="anggota[<?=$a?>][grid_fm-photo-id]" required>
							</div>
							<div class="form-group">
								<label>Foto Sendiri Close Up*</label>
								<input type="file" id="grid_fm-close-up_<?=$a?>" name="anggota[<?=$a?>][grid_fm-close-up]" required>
							</div>
						</div>
						<?php 
					}else{
						?>
						<div class="form-row">
							<div class="form-group">
								<label>Nama Pemain* <?= ($a+1) ?> </label>
								<input type="text" id="grid_fm-player-name_<?= $a ?>" name="anggota[<?=$a?>][grid_fm-player-name]" required>
							</div>
							<div class="form-group">
								<label>ID PUBG*</label>
								<input type="text" id="grid_fm-pubg-id_<?=$a?>" name="anggota[<?=$a?>][grid_fm-pubg-id]" required>
							</div>
							<div class="form-group">
								<label>NICK PUBG*</label>
								<input type="text" id="grid_fm-nick-pubg_<?=$a?>" name="anggota[<?=$a?>][grid_fm-nick-pubg]" required>
							</div>
							<div class="form-group">
								<label>NIK Kantor*</label>
								<input type="text" id="grid_fm-id-office_<?=$a?>" name="anggota[<?=$a?>][grid_fm-id-office]" required>
							</div>
						</div>

						<div class="form-row" style="margin-bottom: 80px;">
							<div class="form-group">
								<label>Email*</label>
								<input type="email" id="grid_fm-email_<?=$a?>" name="anggota[<?=$a?>][grid_fm-email]" required>
							</div>
							<div class="form-group">
								<label>Foto Memegang ID Card*</label>
								<input type="file" id="grid_fm-photo-id_<?=$a?>" name="anggota[<?=$a?>][grid_fm-photo-id]" required>
							</div>
							<div class="form-group">
								<label>Foto Sendiri Close Up*</label>
								<input type="file" id="grid_fm-close-up_<?=$a?>" name="anggota[<?=$a?>][grid_fm-close-up]" required>
							</div>
						</div>
						<?php 
					}
				}
				?>
				<div class="form-row">
					<div class="form-group">
						<p id="validationInfo"></p>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<button id="fm-submit" type="submit">Konfirmasi</button>
					</div>
				</div>
			</form>
		</div>	
	</section> -->
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

	<!-- <script src="<#?php echo base_url();?>/assets/js/validation.js"></script> -->
		<script>
			$(document).ready(function() {
				$("form").attr('autocomplete', 'off');

				$("#fm-company").select2();

				$('#formRegister').submit(function(e){
					$.ajaxSetup({ cache: false });
					e.preventDefault(); 
					$.ajax({
						url: site_url + 'submit',
						type: 'post',
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function(data) {
							alert("Data Berhasil Disimpan.");
							 window.location.reload();
						}, error: function (jqXHR, textStatus, errorThrown)
						{
							alert("Telah terjadi sesuatu. Silahkan coba kembali.");
						}
					});
				});
			});
		</script>
	</body>
	</html>