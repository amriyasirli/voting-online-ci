


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><small><?= $tema['tema_nama'] ?></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Surat Suara Pemilihan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
        <?php foreach($calon as $c) { ?>
          <div class="col-lg-6">
          <a href="<?= base_url('PemilihAuth/memilih/'.$c['calon_ketua_id']) ?>" class="pilih" data="<?=$c['calon_ketua_nama'] ?>">
            <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch">
                <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                No. <b><?= $c['calon_ketua_nourut'] ?></b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h1 class="lead"><b><?=$c['calon_ketua_nama'] ?></b></h1>
                      <br>
                      <p class="text-muted text-sm"><b>Jurusan: </b> <?=$c['jurusan'] ?><br>
                      <b>Semester: </b><?=$c['semester'] ?><br> </p>
                      
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-map-marker"></i></span><?=$c['alamat'] ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url('/assets/img/'.$c['calon_ketua_foto']) ?>" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                </a>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-gray" data-toggle="modal" data-target="#visimisi<?=$c['calon_ketua_id'] ?>">
                      <i class="fas fa-comment"></i> Visi & Misi
                    </a>
                    
                      
                   
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          
          <!-- Modal Visi &dan Misi -->
          <div class="modal fade" id="visimisi<?=$c['calon_ketua_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?=$c['calon_ketua_nama'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <?=$c['calon_ketua_visimisi'] ?>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  