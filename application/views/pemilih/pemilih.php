<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemilih</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item active">Pemilih</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pemilih</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($user['role_id'] == 1) { ?>
                <a href="<?= base_url('/Auth_Admin/Pemilih/tambahPemilih') ?>" class="btn btn-sm bg-cyan"><i class="fas fa-plus"></i> Tambah Pemilih</a>
                <a href="<?= base_url('/Auth_Admin/Pemilih/resetPemilih') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-spinner"></i> Reset Pemilih</a>
                <a href="<?= base_url('/Auth_Admin/Pemilih/excel') ?>" class="btn btn-sm bg-green"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="<?= base_url('/Auth_Admin/Pemilih/pdf') ?>" class="btn btn-sm bg-red"><i class="fas fa-file-pdf"></i> PDF </a>
                <?php } else {} ?>
                <?php echo $this->session->flashdata('notif') ?>

                
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th style="width: 10px">Nim Pemilih</th>
                            <th>Nama Pemilih</th>
                            <th>Detail</th>
                            <?php if($user['role_id'] == 1 || $user['role_id'] == 2 ) { ?>
                            <th>Status</th>
                            <th>Status Memilih</th>
                            <?php } else {} ?>
                            <?php if($user['role_id'] == 1) { ?>
                            <th>Aksi</th>
                            <?php } else {} ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pemilih as $p) { ?>
                            <tr>
                                <td><?= $p['pemilih_nim'] ?></td>
                                <td><?= $p['pemilih_nama'] ?></td>
                                <?php if($user['role_id'] == 1 || $user['role_id'] == 2) { ?>
                                <td><a href="<?= base_url('/Auth_Admin/Pemilih/pemilihDetail/'.$p['pemilih_id']) ?>" class="btn btn-sm bg-cyan"><i class="fas fa-eye"></i></a></td>
                                <td>
                                    <?php
                                    if($p['pemilih_verifikasi'] == 0) {
                                    ?>
                                        <?php if($user['role_id'] == 3) {
                                            echo "Belum Diverifikasi";
                                        }  else { ?>
                                        <a href="<?= base_url('/Auth_Admin/Pemilih/verifikasi/'.$p['pemilih_id']) ?>" class="btn btn-sm bg-cyan">Verifikasi</a>
                                    <?php
                                        } 
                                    } else {
                                        echo "Sudah Diverifikasi";
                                    }
                                    ?>
                                <?php } else {} ?>
                                </td>
                                <td>
                                <?php
                                    if($p['pemilih_status'] == 0) {
                                        echo 'Belum memilih';
                                    } else {
                                        echo "Sudah memilih";
                                    }
                                    ?>
                                </td>
                                <?php if($user['role_id'] == 1) { ?>
                                <td>
                                    <a href="<?= base_url('/Auth_Admin/Pemilih/ubahPemilih/'.$p['pemilih_id']) ?>" class="btn btn-sm bg-teal">Ubah</a>
                                    <a href="<?= base_url('/Auth_Admin/Pemilih/hapusPemilih/'.$p['pemilih_id']) ?>" class="btn btn-sm bg-maroon tombol-hapus">Hapus</a>
                                </td>
                            </tr>
                                <?php } else {} ?>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-6">
                    <a href="#" class="btn btn-sm bg-cyan mt-2">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    <div class="col-md-6 text-right">


                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->