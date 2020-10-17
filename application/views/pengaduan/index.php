<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Pengaduan</h1>
	</div>
	<div class="block-section">
		<?php 
		if($this->session->flashdata('sukses_tambah') != "") {
			echo '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Sukses!</strong> Data Berhasil Disimpan
			</div>';
		}
		?>

		<?php 
		if($this->session->flashdata('sukses_hapus') != "") {
			echo '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Sukses!</strong> Data Berhasil Dihapus
			</div>';
		}
		?>

		<?php 
		if($this->session->flashdata('sukses_edit') != "") {
			echo '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Sukses!</strong> Data Berhasil Diedit
			</div>';
		}
		?>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6><p></p>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center" style="width: 100px;">#</th>
							<th>Nama</th>
							<th>Deskripsi</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Lokasi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($pengaduan as $row) {?>
							<tr>
								<td class="text-center">
									<?php echo $no ?>
								</td>
								<td>
									<strong><?php echo $row->nama ?></strong>
								</td>
								<td>
									<?php echo $row->pengaduan ?>
								</td>
								<td>
									<?php echo $row->tanggal ?>
								</td>
								<td>
									<?php 
									if ($row->status == 1) {
										$label	= "btn btn-warning btn-icon-split";
										$text 	= "Process";
									} else {
										$label 	= "btn btn-success btn-icon-split";
										$text 	= "Done";
									}
									?>
									<span class="<?php echo $label; ?>">
										<?php echo $text; ?>
									</span>
								</td>
								<td>
									<?php echo $row->lokasi ?>
								</td>
								<?php 
								$user = $this->session->userdata('penduduk');
								if($user['akses'] == 'admin'){ 
									?>
									<td class="text-center">
										<a href="<?php echo site_url('Pengaduan/detail/'.$row->id_pengaduan) ?>" title="Detail Keluhan" class="btn btn-info btn-circle btn-sm">
											<i class="fas fa-info-circle"></i>
										</a>
										<a href="<?php echo site_url('Pengaduan/edit_proses/'.$row->id_pengaduan) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Status?')" data-toggle="tooltip" title="Ubah Status" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-check"></i>
										</a>
									</td>
								<?php } elseif($user['akses'] == 'user') { ?>
									<td class="text-center">
										<a href="<?php echo site_url('Pengaduan/detail/'.$row->id_pengaduan) ?>" title="Detail Keluhan" class="btn btn-info btn-circle btn-sm">
											<i class="fas fa-info-circle"></i>
										</a>
										<a href="<?php echo site_url('Pengaduan/edit/'.$row->id_pengaduan) ?>" data-toggle="tooltip" title="Edit Keluhan" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i>
										</a>
										<a href="<?php echo site_url('Pengaduan/hapus/'.$row->id_pengaduan) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" data-toggle="tooltip" title="Delete Keluhan" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-trash"></i>
										</a>
									</td>
								<?php } ?>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<?php $this->load->view('konfirmasi'); ?>

	<!-- Page level plugins -->
	<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>