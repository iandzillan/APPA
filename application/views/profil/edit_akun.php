<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<?php 
if($this->session->flashdata('sukses_edit') != "") {
	echo '<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Sukses!</strong> Data Berhasil Diedit
	</div>';
}
?>
<?php 
if($this->session->flashdata('gagal_edit') != "") {
	echo '<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>GAGAL!</strong> Password Salah
	</div>';
}
?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Silahkan Ubah Password Anda</h5>

			<form action="<?php echo site_url('profil/edit_akun_proses/'.$profil['nik']) ?>" method="post">

				<div class="form-group">
					<label>Password Lama</label>
					<input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
					<?php echo form_error('password_lama'); ?>
				</div>

				<div class="form-group">
					<label>Password Baru</label>
					<input type="password" name="password" class="form-control" placeholder="Password Baru">
					<?php echo form_error('password'); ?>
				</div>

				<div class="form-group">
					<label>Konfirmasi Password Baru</label>
					<input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password Baru">
					<?php echo form_error('password2'); ?>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-warning">Reset</button>

			</form>
		</div>
	</div>
</div>

<?php $this->load->view('konfirmasi'); ?>