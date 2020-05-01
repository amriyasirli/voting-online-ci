<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calon Ketua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item active">Calon</li>
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
                <h3 class="card-title">Daftar Calon</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($user['role_id'] == 1) { ?>
              <a href="<?= base_url('/Auth_Admin/Ketua/tambahKetua') ?>" class="btn bg-cyan btn-sm mb-3"><i class="fas fa-plus"></i> Tambah Calon Ketua</a>
              <a href="<?= base_url('/Auth_Admin/Ketua/excel') ?>" class="btn btn-sm bg-green mb-3"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="<?= base_url('/Auth_Admin/Ketua/pdf') ?>" class="btn btn-sm bg-red mb-3"><i class="fas fa-file-pdf"></i> PDF </a>
              <?php } else {} ?>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Nama</th>
                      <th style="width: 10px">Urut</th>
                      <th>Jenis Pemilihan</th>
                      <th style="width: 100px">Foto</th>

                        <?php if($user['role_id'] == 1) { ?>
                      <th style="width: 105px">Aksi</th>
                        <?php } else {} ?>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($ketua as $k) {
                    ?>
                    <tr>
                      <td><?= $k['calon_ketua_nama'] ?></td>
                      <td><?= $k['calon_ketua_nourut'] ?></td>
                      <td><?= $k['tema_nama'] ?></td>
                      <td><img src="<?= base_url('/assets/img/'.$k['calon_ketua_foto']) ?>" alt="" width="100" class="img-thumbnail"></td>
                      <?php if($user['role_id'] == 1) { ?>
                      <td>
                        <a href="<?= base_url('/Auth_Admin/Ketua/detailKetua/'.$k['calon_ketua_id']) ?>" class="btn bg-green btn-xs"><i class="fas fa-eye"></i></a>
                        <a href="<?= base_url('/Auth_Admin/Ketua/ubahKetua/'.$k['calon_ketua_id']) ?>" class="btn bg-cyan btn-xs"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('/Auth_Admin/Ketua/hapusKetua/'.$k['calon_ketua_id']) ?>" class="btn bg-maroon btn-xs"><i class="fas fa-trash"></i></a>

                      </td>
                        <?php } else {} ?>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
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