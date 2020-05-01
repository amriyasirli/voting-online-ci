<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-cyan">
    <!-- Brand Logo -->
    <a href="<?= base_url('')?>" class="brand-link navbar-cyan">
      <img src="<?= base_url('assets/')?>img/favicon1.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>E </strong>-Voting</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/admin/'.$user['foto'])?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="d-block"> 
          <?php 
          if ($user['admin_nama'] == TRUE){
            echo $user['admin_nama'];
          }
          else {
            echo "offline";
          }
            ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($user['role_id'] == 1) { ?>
                  <li class="nav-header">ADMINISTRATOR</li>
               <?php } else {
                 echo '<li class="nav-header">PANITIA</li>';
               } ?>
          
          <li class="nav-item">
          <a href="<?= base_url('Auth_Admin/Beranda')?>" <?= $this->uri->segment(2) == 'Beranda' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Auth_Admin/Ketua')?>" <?= $this->uri->segment(2) == 'Ketua' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Calon
                <span class="badge bg-yellow right"><?= $this->db->get('tb_calon_ketua')->num_rows();?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Auth_Admin/Pemilih')?>" <?= $this->uri->segment(2) == 'Pemilih' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pemilih
                <span class="badge bg-yellow right"><?= $this->db->get('tb_pemilih')->num_rows();?></span>
              </p>
            </a>
          </li>
          <?php if($user['role_id'] == 1 || $user['role_id'] == 2) { ?>
          <li class="nav-item">
            <a href="<?= base_url('Auth_Admin/Suara')?>" <?= $this->uri->segment(2) == 'Suara' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
              Hasil Suara Pemilihan
              </p>
            </a>
          </li>
          <?php } if ($user['role_id'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('Auth_Admin/Tema')?>" <?= $this->uri->segment(2) == 'Tema' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-vote-yea"></i>
              <p>
              Tema Pemilihan
              </p>
            </a>
          </li>
          <?php } if ($user['role_id'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('Auth_Admin/UserAuth')?>" <?= $this->uri->segment(2) == 'UserAuth' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-cogs"></i>
              <p>
              User Management
              </p>
            </a>
          </li>
          <?php }?>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
              Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>