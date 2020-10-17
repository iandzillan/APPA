<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Jumlah Tindak Kekerasan Berdasarkan Jenis Kasus Tahun 2018, Bandung </h1>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Dinas Pemberdayaan Perempuan, Perlindungan Anak, dan Pemberdayaan Masyarakat</h6><p></p>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center" style="width: 100px;">#</th>
							<th>Tindak Kekerasan</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=0; foreach ($data as $row): $no++?>
						<tr>
							<td class="text-center">
								<?php echo $no ?>
							</td>
							<td>
								<?php echo $row['tindak_kekerasan'] ?>
							</td>
							<td>
								<?php echo $row['jumlah'] ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('konfirmasi'); ?>