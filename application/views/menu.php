<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                $user = $this->session->userdata('penduduk');

                                if ($user['akses'] == 'admin') {
                                    $akses = 'ADMIN';
                                    $nama = $user['nama_admin'];
                                } else {
                                    $akses = 'USER';
                                    $nama = $user['nama'];
                                }
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama?> </span>
                                <i class="fas fa-fw fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#modal-stok" data-toggle="modal">
                                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Logout
                              </a>
                          </div>
                      </li>
                  </ul>
              </nav>