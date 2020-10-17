<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Masukkan Pengaduan</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Silahkan Masukkan Pengaduan</h5>

			<form action="<?php echo site_url('Pengaduan/tambah_proses') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="lokasi">Lokasi</label>
					<div align="center">
						<div id="map" style="height: 250px; width: auto; color:blue; "></div>
					</div>
				</div>

				<div class="form-group">
					<label for="lat" hidden>lat</label>
					<input  name="lat" id="lat" value="lat" hidden="" />
				</div>

				<div class="form-group">
					<label for="long" hidden>long</label>
					<input name="long" id="long" value="long" hidden="" />
				</div> 

				<div class="form-group">
					<label>Kategori</label>
					<select id="kategori" name="kategori" class="form-control" required="">
						<option selected>Pilih...</option>
						<option value="KDRT">KDRT</option>
						<option value="Pelecehan Seksual">Pelecehan Seksual</option>
						<option value="Penganiyayaan">Penganiyayaan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="deskripsi">Tulis Deskripsi Pengaduan</label>
					<textarea class="form-control" name="pengaduan" id="pengaduan" rows="3" required=""></textarea>
				</div>

				<div class="form-group">
					<label for="lokasi sekarang" hidden>Lokasi Sekarang</label>
					<input class="form-control" name="lokasi" id="user_position" rows="3" hidden=""></input>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">Foto</label>
					<div class="col-md-9">
						<input type="file" class="form-control" id="example-file-input" name="foto" required="">
					</div>
				</div>

				

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>

</div>

<?php $this->load->view('konfirmasi'); ?>