<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data API</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar API APPA</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">#</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                API Data Penduduk
                            </td>
                            <td class="text-center">
                                <a href="<?php echo site_url('api/DataPenduduk'); ?>">Data Penduduk</a> - JSON
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                2
                            </td>
                            <td class="text-center">
                                API Data Pengaduan
                            </td>
                            <td class="text-center">
                                <a href="<?php echo site_url('api/DataPengaduan'); ?>">Data Pengaduan</a> - JSON
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('konfirmasi'); ?>
