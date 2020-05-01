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
                <h3 class="card-title">Ubah Tema Pemilihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <?= form_open_multipart('/Auth_Admin/Tema/ubahTema/'.$tema['tema_id']) ?>
                    <div class="form-group">
                        <label for="">Nama Tema</label>
                        <input type="text" name="nama" class="form-control" value="<?= $tema['tema_nama']?>">
                        <div style="color: red"><?= form_error('nama') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="">Batas Pemilihan</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="date" value="<?= date('d F Y h:i A', $tema['tema_batas']) ?>" readonly/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div style="color: red"><?= form_error('date') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Logo</label><br>
                        <img src="<?= base_url('/assets/img/'.$tema['tema_logo']) ?>" width="100" alt="" class="img-thumbnail"><br>
                    </div>
                    <div class="custom-file col-sm-4 mb-3">
                      <input type="file" name="foto" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Pilih Logo</label>
                    </div>
                    <input type="submit" name="simpan-tema" class="btn btn-md bg-cyan btn-block" value="Simpan Perubahan">
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