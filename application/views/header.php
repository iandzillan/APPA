<!DOCTYPE html>
<html>
<head>
	<title><?php echo $judul ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
          $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

  <style>
      #map-canvas {
        width: 100%;
        height: 500px;
      }
    </style>

  <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body id="page-top">
	<!-- Page Wrapper -->
    <div id="wrapper">
        <?php 
        $userdata = $this->session->userdata('penduduk');

        if ($userdata['akses'] == 'admin') {
            $this->load->view('sidebar'); 
        } elseif ($userdata['akses'] == 'user') {
            $this->load->view('sidebar_user'); 
        }
        ?>