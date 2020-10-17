<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Data Admin</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit Data</h5>

			<form action="<?php echo site_url('Admin/edit_proses/'.$admin['id_admin']) ?>" method="post">

				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" name="nama_admin" rows="3" value="<?php echo $admin['nama_admin'] ?>"></input>
					<?php echo form_error('nama_admin'); ?>
				</div>

				<div class="form-group">
					<label>Tempat Lahir</label>
					<input class="form-control" name="tempat_lahir" rows="3" value="<?php echo $admin['tempat_lahir'] ?>"></input>
					<?php echo form_error('tempat_lahir'); ?>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" id="datepicker" class="form-control" name="tanggal_lahir" rows="3" required value="<?php echo $admin['tanggal_lahir'] ?>">
					<?php echo form_error('tanggal_lahir'); ?>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jk" class="form-control" required="">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="L" <?php if($admin['jk'] == 'L'){echo "selected";} ?>>Laki-Laki</option>
						<option value="P" <?php if($admin['jk'] == 'P'){echo "selected";} ?>>Perempuan</option>
					</select>
					<?php echo form_error('jk') ?>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-warning">Reset</button>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('konfirmasi'); ?>