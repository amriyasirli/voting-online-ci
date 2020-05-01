<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item active">User Management</li>
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
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <?= form_open('/Auth_Admin/UserAuth/tambahUser') ?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                        <div style="color: red"><?= form_error('nama') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
                        <div style="color: red"><?= form_error('username') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="">
                            <option value="">---</option>
                            <?php foreach($role as $r) {?>
                                <option value="<?= $r['role_id'] ?>"><?= $r['role_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div style="color: red"><?= form_error('role') ?></div>
                    </div>
                    <input type="submit" value="Simpan" name="simpan-user" class="btn btn-md bg-cyan btn-block">
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