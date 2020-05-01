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
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/Beranda')?>">Beranda</a></li>
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
                <h3 class="card-title">Daftar user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <a href="<?= base_url('/Auth_Admin/UserAuth/tambahUser') ?>" class="btn btn-sm bg-cyan mb-3"><i class="fas fa-plus"></i> Tambah User</a>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($userdata as $u) { ?>
                                <tr>
                                    <td><?= $u['admin_nama'] ?></td>
                                    <td><?= $u['admin_username'] ?></td>
                                    <td><?= $u['role_name'] ?></td>
                                    <td>
                                        <a href="<?= base_url('/Auth_Admin/UserAuth/hapusUser/'.$u['admin_id']) ?>" class="btn btn-sm bg-maroon">Hapus</a>
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