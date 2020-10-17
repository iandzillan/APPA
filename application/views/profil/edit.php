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

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Silahkan Ubah Profile Anda</h5>

			<form action="<?php echo site_url('profil/edit_proses/'.$profil['nik']) ?>" method="post">

				<div class="form-group">
					<label for="lokasi sekarang">NIK</label>
					<input class="form-control" name="nik" rows="3" readonly value="<?php echo $profil['nik'] ?>"></input>
				</div>

				<div class="form-group">
					<label for="lokasi sekarang">Nama</label>
					<input class="form-control" name="nama" rows="3" value="<?php echo $profil['nama'] ?>"></input>
				</div>

				<div class="form-group">
					<label for="lokasi sekarang">Tempat Lahir</label>
					<input class="form-control" name="tempat_lahir" rows="3" value="<?php echo $profil['tempat_lahir'] ?>"></input>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" id="datepicker" class="form-control" name="tanggal_lahir" rows="3" value="<?php echo $profil['tanggal_lahir'] ?>"></input>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jk" class="form-control" required="">
						<option selected>Pilih Jenis Kelamin</option>
						<option value="L"  <?php if($profil['jk'] == 'L'){echo "selected";} ?>>Laki-Laki</option>
						<option value="P" <?php if($profil['jk'] == 'P'){echo "selected";} ?>>Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="lokasi sekarang">Alamat</label>
					<input class="form-control" name="alamat" rows="3" value="<?php echo $profil['alamat'] ?>"></input>
				</div>

				<div class="form-group">
					<label for="lokasi sekarang">No Handphone</label>
					<input class="form-control" name="nohp" rows="3" value="<?php echo $profil['nohp'] ?>"></input>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-warning">Reset</button>

			</form>
		</div>
	</div>
</div>

<?php $this->load->view('konfirmasi'); ?>