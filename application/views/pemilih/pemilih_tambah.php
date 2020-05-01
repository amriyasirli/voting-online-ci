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
                <h3 class="card-title">Tambah Pemilih</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= form_open_multipart('/Auth_Admin/Pemilih/tambahPemilih') ?>
                            <div class="form-group">
                                <label for="nimpemilih">Nim Pemilih</label>
                                <input type="text" name="nimpemilih" class="form-control" value="<?= set_value('nimpemilih') ?>">
                                <div style="color:red"><?= form_error('nimpemilih') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="namapemilih">Nama Pemilih</label>
                                <input type="text" name="namapemilih" class="form-control" value="<?= set_value('namapemilih') ?>">
                                <div style="color:red"><?= form_error('namapemilih') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="">Semester</label>
                                <input type="text" name="semester" class="form-control" value="<?= set_value('semester') ?>">
                                <div style="color:red"><?= form_error('semester') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="">Prodi</label>
                                <input type="text" name="prodi" class="form-control" value="<?= set_value('prodi') ?>">
                                <div style="color:red"><?= form_error('prodi') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" name="fakultas" class="form-control" value="<?= set_value('fakultas') ?>">
                                <div style="color:red"><?= form_error('fakultas') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label><br>
                                <input type="radio" name="jkelamin" value="L"> <label for="">Laki-laki</label>
                                <input type="radio" name="jkelamin" value="P"> <label for="">Perempuan</label>
                            </div>
                            <div class="custom-file mb-3">
                              <input type="file" name="foto" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            </div>
                            <input type="submit" class="btn btn-md bg-cyan btn-block" value="Simpan" name="simpan-pemilih">
                        <?= form_close() ?>
                    </div>
                    <div class="col-md-6 mt-3">
                        <a href="<?= base_url() ?>assets/template_excel/template.xlsx" class="btn btn-sm btn-success"> <i class="fas fa-file-excel"></i> Download Template Excel</a><br><br>
                        <form method="POST" action="<?php echo base_url() ?>Auth_Admin/Pemilih/upload" enctype="multipart/form-data">
                        <div class="custom-file col-sm-6 mb-3">
                          <input type="file" name="userfile" class="custom-file-input" id="userfile">
                          <label class="custom-file-label" for="userfile">Import File Excel</label>
                        </div>
                            <button type="submit" class="btn btn-md bg-green btn-block">Upload</button>
                        </form>
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