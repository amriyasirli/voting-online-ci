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
                <h3 class="card-title">Verifikasi Pemilih</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              


                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?= base_url('assets/img/img-pemilih/'.$pemilih['pemilih_foto']) ?>" class="img-thumbnail rounded-circle mb-2" width="200" alt="">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                Nim Pemilih
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <?= $pemilih['pemilih_nim'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Nama Pemilih
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <?= $pemilih['pemilih_nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Semester
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <?= $pemilih['pemilih_semester'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Fakultas
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <?= $pemilih['pemilih_fakultas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Program Studi
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-5">
                                <?= $pemilih['pemilih_prodi'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Jenis Kelamin
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <?= $pemilih['pemilih_jk'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Status Pemilih
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <label for="">
                                    <?php
                                    if($pemilih['pemilih_status'] == 0) {
                                        echo "<span class='badge bg-teal badge-md'>Belum Memilih</span>";
                                    } else {
                                        echo "<span class='badge bg-gray badge-md'>Sudah Memilih</span>";
                                    }
                                    ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <?php
                if($pemilih['pemilih_verifikasi'] == 0) {
                ?>
                    <a href="<?= base_url('/Auth_Admin/Pemilih/verifikasi/'.$pemilih['pemilih_id']) ?>" class="btn btn-sm bg-cyan"><i class="fas fa-check"></i> Verifikasi</a>
                <?php
                } else {
                    echo "Sudah Diverifikasi";
                }
                ?>



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