<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Jumlah Tindak Kekerasan Berdasarkan Jenis Kasus Tahun 2008-2016, Bandung </h1>
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
							<th>Jenis Kasus</th>
							<th>2008</th>
							<th>2009</th>
							<th>2010</th>
							<th>2011</th>
							<th>2012</th>
							<th>2013</th>
							<th>2014</th>
							<th>2015</th>
							<th>2016</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=0; foreach ($data as $row): $no++?>
						<tr>
							<td class="text-center">
								<?php echo $no ?>
							</td>
							<td>
								<?php echo $row['jenis_kasus'] ?>
							</td>
							<td>
								<?php echo $row['2008'] ?>
							</td>
							<td>
								<?php echo $row['2009'] ?>
							</td>
							<td>
								<?php echo $row['2010'] ?>
							</td>
							<td>
								<?php echo $row['2011'] ?>
							</td>
							<td>
								<?php echo $row['2012'] ?>
							</td>
							<td>
								<?php echo $row['2013'] ?>
							</td>
							<td>
								<?php echo $row['2014'] ?>
							</td>
							<td>
								<?php echo $row['2015'] ?>
							</td>
							<td>
								<?php echo $row['2016'] ?>
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