<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">APPA</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('Home/dashboard') ?>" class="<?php if($aktif == 'home'){echo " active";} ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Pengaduan/tambah') ?>" class="<?php if($aktif == 'input'){echo " active";} ?>">
          <i class="fas fa-fw fa-ticket-alt"></i>
          <span>Masukkan Pengaduan</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Pengaduan/data') ?>" class="<?php if($aktif == 'data'){echo " active";} ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Pengaduan</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Data/index2') ?>" class="<?php if($aktif == 'data'){echo " active";} ?>">
          <i class="fas fa-fw fa-link"></i>
          <span>Data Pengaduan Bandung (2008 - 2016)</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Data/index') ?>" class="<?php if($aktif == 'data'){echo " active";} ?>">
          <i class="fas fa-fw fa-link"></i>
          <span>Data Pengaduan Bandung (2017)</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Data/index3') ?>" class="<?php if($aktif == 'data'){echo " active";} ?>">
          <i class="fas fa-fw fa-link"></i>
          <span>Data Pengaduan Bandung (2018)</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <?php 
            $user = $this->session->userdata('penduduk');
        ?>
        <a class="nav-link" href="<?php echo site_url('Profil/profil_user/'.$user['nik']) ?>" class="<?php if($aktif == 'profil'){echo " active";} ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Profil/edit_akun/'.$user['nik']) ?>" class="<?php if($aktif == 'akun'){echo " active";} ?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Ubah Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Rest_server/index/') ?>" class="<?php if($aktif == 'api'){echo " active";} ?>">
          <i class="fas fa-fw fa-link"></i>
          <span>Get Data API</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>