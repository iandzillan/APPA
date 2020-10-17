<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Data Penduduk</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit Data</h5>

			<form action="<?php echo site_url('Penduduk/edit_proses/'.$penduduk['nik']) ?>" method="post">
				
				<div class="form-group">
					<label>NIK</label>
					<input class="form-control" name="nik" rows="3" readonly value="<?php echo  $penduduk['nik'] ?>"></input>
					<?php echo form_error('nik'); ?>
				</div>

				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" name="nama" rows="3" value="<?php echo $penduduk['nama'] ?>"></input>
					<?php echo form_error('nama'); ?>
				</div>

				<div class="form-group">
					<label>Tempat Lahir</label>
					<input class="form-control" name="tempat_lahir" rows="3" value="<?php echo $penduduk['tempat_lahir'] ?>"></input>
					<?php echo form_error('tempat_lahir'); ?>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" id="datepicker" class="form-control" name="tanggal_lahir" rows="3" value="<?php echo $penduduk['tanggal_lahir'] ?>"></input>
					<?php echo form_error('tanggal_lahir'); ?>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jk" class="form-control" required="">
						<option selected>Pilih Jenis Kelamin</option>
						<option value="L"  <?php if($penduduk['jk'] == 'L'){echo "selected";} ?>>Laki-Laki</option>
						<option value="P" <?php if($penduduk['jk'] == 'P'){echo "selected";} ?>>Perempuan</option>
					</select>
					<?php echo form_error('jk'); ?>
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<input class="form-control" name="alamat" rows="3" value="<?php echo $penduduk['alamat'] ?>"></input>
					<?php echo form_error('alamat'); ?>
				</div>

				<div class="form-group">
					<label>No Handphone</label>
					<input class="form-control" name="nohp" rows="3" value="<?php echo $penduduk['nohp'] ?>"></input>
					<?php echo form_error('nohp'); ?>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-warning">Reset</button>

			</form>
		</div>
	</div>
</div>

<?php $this->load->view('konfirmasi'); ?>