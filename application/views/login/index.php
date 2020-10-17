<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>

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
										<h1 class="h2 text-center push-top-bottom animation-slideDown" style="color: black">Selamat Datang Admin</h1><br><br>
										<?php 
										if ($this->session->userdata('gagal_login') != "") {
											echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>GAGAL!</strong> Username dan Password tidak cocok.</div>';
										}
										if ($this->session->userdata('sukses_register') != "") {
											echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>SUKSES REGISTER!</strong> Silahkan Login.</div>';
										}
										?>
										<form id="form-login" action="<?php echo site_url('login/proses') ?>" method="post" class="user">
											<div class="form-group">
												<input type="text" name="username" class="form-control" placeholder="Masukkan Username.." autofocus required>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<input type="password" name="password" class="form-control" placeholder="Masukkan Password.." required>
												</div>
											</div>
											<button type="submit" class="btn btn-primary btn-user btn-block"> LOGIN</button>
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