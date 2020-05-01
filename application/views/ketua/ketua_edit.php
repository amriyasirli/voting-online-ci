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
                <h3 class="card-title">Ubah Calon Ketua</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?= form_open_multipart('/Auth_Admin/Ketua/ubahKetua/'.$ketua->calon_ketua_id) ?>
                    <div class="form-group">
                        <label for="nama">Nama Calon Ketua</label>
                        <input type="text" name="nama" class="form-control" value="<?= $ketua->calon_ketua_nama ?>">
                        <div style="color: red"><?= form_error('nama') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="nourut">Nomor Urut Calon Ketua</label>
                        <input type="text" name="nourut" class="form-control" value="<?= $ketua->calon_ketua_nourut ?>">
                        <div style="color: red"><?= form_error('nourut') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="tema">Jenis Pemilihan</label>
                        <select name="jenis" id="" class="form-control">
                            <option value="<?= $ketua->tema_id ?>"><?= $ketua->tema_nama ?></option>
                            <?php
                            foreach($tema as $t) {
                                echo "<option value=".$t['tema_id'].">".$t['tema_nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Calon Ketua</label><br>
                        <img src="<?= base_url('/assets/img/'.$ketua->calon_ketua_foto) ?>" width="100" alt="" class="img-thumbnail"><br>
                    </div>
                    <div class="custom-file col-sm-4">
                      <input type="file" name="foto" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Pilih Foto</label>
                    </div>
                    <div class="form-group mt-2">
                        <label for="visimisi">Visi dan Misi</label>
                        <textarea name="visimisi" id="editordata"><?= $ketua->calon_ketua_visimisi ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-md bg-cyan btn-block" value="Simpan Perubahan" name="ubah_ketua">
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