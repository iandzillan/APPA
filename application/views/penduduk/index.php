<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Daftar Penduduk</h1>
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
			<h6 class="m-0 font-weight-bold text-primary">Daftar Penduduk</h6><p></p>
			<a href="#modal-fade" title="Tambah Penduduk" class="btn btn-primary" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Penduduk
			</a>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center" style="width: 100px;">#</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Tempat, Tanggal Lahir</th>
							<th>Action</th>
						</tr>
					</thead> 
					<tbody>
						<?php $no=0; foreach ($penduduk as $row): $no++?>
						<tr>
							<td class="text-center">
								<?php echo $no ?>
							</td>
							<td>
								<?php echo $row->nik ?>
							</td>
							<td>
								<?php echo $row->nama ?>
							</td>
							<td>
								<?php 
								if ($row->jk == "L") {$tampil = "Laki - Laki";} 
								else {$tampil = "Perempuan";}
								?>
								<?php echo "$tampil"; ?>
							</td>
							<td>
								<?php echo $row->tempat_lahir.", ".$row->tanggal_lahir ?>
							</td>
							<td>
								<a href="<?php echo site_url('Penduduk/detail/'.$row->nik) ?>" title="Detail Penduduk" class="btn btn-info btn-circle btn-sm">
									<i class="fas fa-info-circle"></i>
								</a>
								<a href="<?php echo site_url('Penduduk/edit/'.$row->nik) ?>" data-toggle="tooltip" title="Edit Penduduk" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo site_url('Penduduk/hapus/'.$row->nik) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" data-toggle="tooltip" title="Hapus Penduduk" class="btn btn-danger btn-circle btn-sm">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Penduduk</h6>
			</div>
			<div class="modal-body">
				<form id="form-validation" action="<?php echo site_url('Penduduk/tambah_proses') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>NIK</label>
						<input class="form-control" name="nik" rows="3" required>
						<?php echo form_error('nik'); ?>
					</div>

					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="nama" rows="3" required>
						<?php echo form_error('nama'); ?>
					</div>

					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" name="tempat_lahir" rows="3" required>
						<?php echo form_error('tempat_lahir'); ?>
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="text" id="datepicker" class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy" rows="3" required>
						<?php echo form_error('tanggal_lahir'); ?>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="jk" class="form-control" required="">
							<option value="">--Pilih Jenis Kelamin--</option>
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
						<?php echo form_error('tanggal_lahir'); ?>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" name="alamat" rows="3" required>
						<?php echo form_error('alamat'); ?>
					</div>

					<div class="form-group">
						<label>No Handphone</label>
						<input class="form-control" name="nohp" rows="3" required>
						<?php echo form_error('nohp'); ?>
					</div>	

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancel</button>				

				</form>
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