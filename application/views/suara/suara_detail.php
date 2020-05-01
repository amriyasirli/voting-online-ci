<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Suara Pemilihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('auth_admin/beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item active">Suara Pemilihan</li>
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
                <h3 class="card-title">Hasil <?= $tema['tema_nama'] ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Jumlah Suara Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Hasil Suara Pemilihan</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <h3 class="text-center mt-4">Jumlah Suara Masuk</h3>
                                <h1 class="text-center mt-5 display-1"><?= $count ?></h1>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Foto Calon</th>
                                            <th>Nama Calon</th>
                                            <th>Suara diperoleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($suara as $s) { ?>
                                            <tr>
                                                <td><img src="<?= base_url('/assets/img/'.$s['calon_ketua_foto']) ?>" alt="" class="img-thumbnail" width="150"></td>
                                                <td><?= $s['calon_ketua_nourut'].". ".$s['calon_ketua_nama'] ?></td>
                                                <td><?= $s['calon_ketua_suara'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                            </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        </div>
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