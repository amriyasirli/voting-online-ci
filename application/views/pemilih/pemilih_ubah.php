
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
                <h3 class="card-title">Ubah Pemilih</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?= form_open_multipart('/Auth_Admin/Pemilih/ubahPemilih/'.$pemilih['pemilih_id']) ?>
                    <div class="form-group">
                        <label for="nimemilih">Nim Pemilih</label>
                        <input type="text" name="nimpemilih" class="form-control" value="<?= $pemilih['pemilih_nim'] ?>">
                        <div style="color:red"><?= form_error('nimpemilih') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="namapemilih">Nama Pemilih</label>
                        <input type="text" name="namapemilih" class="form-control" value="<?= $pemilih['pemilih_nama'] ?>">
                        <div style="color:red"><?= form_error('namapemilih') ?></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="text" class="form-control" name="semester" value="<?= $pemilih['pemilih_semester'] ?>">
                        <div style="color:red"><?= form_error('semester') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <input type="text" class="form-control" name="prodi" value="<?= $pemilih['pemilih_prodi'] ?>">
                        <div style="color:red"><?= form_error('prodi') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="">Fakultas</label>
                        <input type="text" class="form-control" name="fakultas" value="<?= $pemilih['pemilih_fakultas'] ?>">
                        <div style="color:red"><?= form_error('fakultas') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label><br>
                        <input type="radio" name="jkelamin" value="L" <?php if($pemilih['pemilih_jk'] == "L"){echo "checked";} ?>> <label for="">Laki-laki</label>
                        <input type="radio" name="jkelamin" value="P" <?php if($pemilih['pemilih_jk'] == "P"){echo "checked";} ?>> <label for="">Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label><br>
                        <img src="<?= base_url('assets/img/img-pemilih/'.$pemilih['pemilih_foto']) ?>" class="img-thumbnail mb-2" width="100" alt=""><br>
                    </div>
                    <div class="custom-file col-sm-4">
                      <input type="file" name="foto" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Pilih Foto</label>
                    </div>
                    <div class="form-group mt-2">
                        <label for="verifikasi">Status Verifikasi</label><br>
                        <input type="radio" name="verifikasi" value="0"<?php if($pemilih['pemilih_verifikasi'] == 0){echo "checked";} ?>> <label>Belum Verifikasi</label>
                        <input type="radio" name="verifikasi" value="1"<?php if($pemilih['pemilih_verifikasi'] == 1){echo "checked";} ?>> <label>Sudah Verifikasi</label>
                    </div>
                    <div class="form-group">
                        <label for="verifikasi">Status Memilih</label><br>
                        <input type="radio" name="memilih" value="0"<?php if($pemilih['pemilih_status'] == 0){echo "checked";} ?>> <label>Belum Memilih</label>
                        <input type="radio" name="memilih" value="1"<?php if($pemilih['pemilih_status'] == 1){echo "checked";} ?>> <label>Sudah Memilih</label>
                    </div>
                    <input type="submit" class="btn btn-md bg-cyan btn-block" value="Simpan Perubahan" name="ubah-pemilih">
                <?= form_close() ?>
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