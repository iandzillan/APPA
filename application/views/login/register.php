<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!DOCTYPE html>
<html>
<head>
	<title>Buat Akun Baru</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Related styles of various icon packs and plugins -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins.css">

	<!-- Modernizr (browser feature detection library) -->
	<script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script>
</head>

<body class="bg-gradient-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="card o-hidden border-0 shadow-lg" style="margin-top: 200px">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h2 text-center push-top-bottom animation-slideDown" style="color: black">Buat Akun Baru</h1><br><br>
										<?php 
										if ($this->session->userdata('sukses_register') != "") {
											echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>SUKSES REGISTER!</strong> Silahkan Login.</div>';
										}
										if ($this->session->userdata('error_nik') != "") {
											echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>GAGAL!</strong> NIK Tidak Valid.</div>';
										}
										?>
										<form id="form-validation" action="<?php echo site_url('Login/register_proses') ?>" method="post" class="user">
											<div class="form-group">
												<input type="text" id="val-number" name="val-number" class="form-control" placeholder="Masukkan NIK" autofocus autocomplete="off">
												<span class="help-block">NB : NIK harus Sesuai dengan Data Asli</span>
												<?php echo form_error('val-number') ?>
											</div>
											<div class="form-group">
												<input type="text" id="val-username" name="val-username" class="form-control" placeholder="Username" autocomplete="off">
												<?php echo form_error('val-username') ?>
											</div>
											<div class="form-group">
												<input type="password" id="val-password" name="val-password" class="form-control" placeholder="Password" autocomplete="off">
												<?php echo form_error('val-password') ?>
											</div>
											<div class="form-group">
												<input type="password" id="val-confirm-password" name="val-confirm-password" class="form-control" placeholder="Verifikasi Password">
												<?php echo form_error('val-confirm-password') ?>
											</div>
											<button type="submit" class="btn btn-primary btn-user btn-block" name="daftar">Buat Akun</button>
											<div class="text-center">
												<a class="small" href="<?php echo site_url('Login') ?>">Kembali ke login</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>