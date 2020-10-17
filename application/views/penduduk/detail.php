<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail Penduduk</h1>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<?php echo "Data " .$penduduk['nama'] ?> 
			</h6>
		</div>

		<div class="card-body">
			<h6 class="m-0 font-weight-bold text-primary">NIK</h6>
			<?php echo $penduduk['nik'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Tempat dan Tanggal Lahir</h6>
			<?php echo $penduduk['tempat_lahir'].", ".$penduduk['tanggal_lahir'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
			<?php 
			if ($penduduk['jk'] == "L") {$tampil = "Laki - Laki";} 
			else {$tampil = "Perempuan";}
			?>
			<?php echo "$tampil"; ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Alamat</h6>
			<?php echo $penduduk['alamat'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">No. Handphone</h6>
			<?php echo $penduduk['nohp'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6><p></p>
			<div class="row">
				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengaduan Dalam Proses</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $belum ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-comments fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai Ditindak</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sudah ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

</div>

<?php $this->load->view('konfirmasi'); ?>