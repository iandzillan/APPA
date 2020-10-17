<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<?php echo " Pengaduan ".$pengaduan['nama']." Pada Tanggal " .$pengaduan['tanggal'] ?> 
			</h6>
		</div>
		<div class="card-body">
			<div align="center">
				<img width="800" height="480" class="responsive-img materialboxed" src="<?php echo base_url('upload/'.$pengaduan['file']) ?>"><br>
			</div>
			
			<h6 class="m-0 font-weight-bold text-primary">Status</h6>
			<?php 
			if ($pengaduan['status'] == 1) {
				$wd = '50%';
				$text = '50% (Menunggu Verifikasi)';
			} else {
				$wd = '100%';
				$text = '100% (Sudah Diverifikasi)';
			}
			?>
			<div class="progress">
				<div class="progress-bar" role="progressbar" style="width: <?php echo $wd ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $text ?></div>
			</div><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
			<?php echo $pengaduan['pengaduan'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Diverifikasi Oleh</h6>
			<?php 
			if ($pengaduan['status'] == 0) {
				echo $pengaduan['nama_admin'];
			} else {
				echo "Masih Menunggu";
			}
			?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Nomor Pengadu</h6>
			<?php echo $pengaduan['nohp'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
			<?php echo $pengaduan['kategori'] ?><p></p>

			<h6 class="m-0 font-weight-bold text-primary">Lokasi</h6>
			<?php echo $pengaduan['lokasi'] ?><p></p>
			<div align="center">
				<div id="map-canvas" style="height: 250px; width: auto; color:blue; ">
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('konfirmasi'); ?>

<script>

	var marker;
	var map, infoWindow;
	function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
        	mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        map = new google.maps.Map(document.getElementById('map-canvas'), {
        	zoom: 17
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(function(position) {
        		var pos = {
        			lat: <?php echo $pengaduan['lat'] ?>,
        			lng: <?php echo $pengaduan['long'] ?>
        		};

        		infoWindow.setPosition(pos);
        		infoWindow.setContent('Lokasi Pengadu');

        		get_detail(<?php echo $pengaduan['lat'] ?>, <?php echo $pengaduan['long'] ?>);
        		infoWindow.open(map);
        		map.setCenter(pos);
        	}, function() {
        		handleLocationError(true, infoWindow, map.getCenter());
        	});
        } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
  		}

        // Proses membuat marker 
        function addMarker(lat, lng, info) {
        	var lokasi = new google.maps.LatLng(lat, lng);
        	bounds.extend(lokasi);
        	var marker = new google.maps.Marker({
        		map: map,
        		position: lokasi
        	});       
        	map.fitBounds(bounds);
        	bindInfoWindow(marker, map, infoWindow, info);
        }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
        	google.maps.event.addListener(marker, 'click', function() {
        		infoWindow.setContent(html);
        		infoWindow.open(map, marker);
        	});
        }

    }
    google.maps.event.addDomListener(window, 'load', initialize);
    
</script>

