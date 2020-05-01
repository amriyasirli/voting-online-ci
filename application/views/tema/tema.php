<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tema Pemilihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item active">Tema Pemilihan</li>
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
                <h3 class="card-title">Tema Pemilihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <a href="<?= base_url('/Auth_Admin/Tema/tambahTema') ?>" class="btn btn-sm bg-cyan"><i class="fas fa-plus"></i> Tambah Tema Pemilihan</a>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Nama Tema</th>
                            <th>Batas Pemilihan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tema as $t) { ?>
                            <tr>
                                <td><?= $t['tema_nama'] ?></td>
                                <td><?= date('d F Y h:i A', $t['tema_batas'])?></td>
                                <td>
                                    <?php
                                    if($t['tema_is_active'] == 0) {
                                        ?>
                                        <a href="<?= base_url('/Auth_Admin/Tema/activeTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-success">Aktifkan Tema</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?= base_url('/Auth_Admin/Tema/activeTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-danger">Non-Aktifkan Tema</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('/Auth_Admin/Tema/ubahTema/'.$t['tema_id']) ?>" class="btn btn-sm bg-teal">Ubah</a>
                                    <a href="<?= base_url('/Auth_Admin/Tema/hapusTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?> 
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