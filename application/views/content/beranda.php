  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Auth_admin/beranda')?>">Beranda</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Calon</span>
                <span class="info-box-number">
                <?= $this->db->get('tb_calon_ketua')->num_rows();?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pemilih</span>
                <span class="info-box-number"><?= $this->db->get('tb_pemilih')->num_rows();?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-vote-yea"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jenis Pemilihan</span>
                <span class="info-box-number"><?= $this->db->get('tb_tema_pemilihan')->num_rows();?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Admin</span>
                <span class="info-box-number"><?= $this->db->get('tb_admin')->num_rows();?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Perhitungan Status Pemilih</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>



              


              
              

           
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    

                      
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-md-8">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-teal">
                      <span class="info-box-icon"><i class="fas fa-vote-yea"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Pemilih Hadir</span>
                        <span class="info-box-number"><?= $hadir['hadir'] ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-gray">
                      <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Pemilih Belum hadir</span>
                        <span class="info-box-number"><?= $tdkhadir['tdkhadir'] ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">


                  <!-- Perhitungan Persentasi Total Suara -->
                <?php
                  $jml =$this->db->get('tb_pemilih')->num_rows();
                  $memilih =$hadir['hadir'];

                  $persen=round($memilih/$jml *100,1);
                ?>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Persentasi Suara Masuk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        
                        <!-- /.col -->
                        
                        <div class="col-lg-12 text-center mb-4">
                        <span class="float text-red">
                          <h1><strong><?= $persen?></strong> %</h1>
                          </span>
                        </div>
                        
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Surat Suara Pemilihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                <?php foreach($jenis as $j) { ?>
                  <div class="col-12 col-sm-12 col-md-6 d-flex align-items-stretch">
                    <div class="card bg-light">
                      <div class="card-header text-muted border-bottom-0">
                        Surat Suara
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b><?= $j['tema_nama'] ?></b></h2>
                            <p class="text-muted text-sm"><b>Batas Pemilihan : </b> <?= date('d F Y h:i A', $j['tema_batas']) ?> </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">

                            <?php 
                            $hasil = $this->db->query("SELECT SUM(calon_ketua_suara) AS suara FROM tb_calon_ketua WHERE tema_id=".$j['tema_id'])->row_array(); ?>
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-vote-yea"></i> </span> Suara Masuk : <?= $hasil['suara']?></li>
                            </ul>
                          </div>
                          <div class="col-6 text-center mt-3">
                            <img src="<?= base_url('/assets/img/'.$j['tema_logo']) ?>" alt="" class="img-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <a href="<?= base_url('Auth_Admin/Tema/')?>" class="btn btn-sm bg-teal">
                            <i class="fas fa-eye"></i> Detail Tema
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
              
              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Calon</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"><?= $this->db->get('tb_calon_ketua')->num_rows(); ?> Calon Ketua</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <?php foreach($ketua as $k) { ?>
                      <li>
                        <img src="<?= base_url('/assets/img/'.$k['calon_ketua_foto']) ?>" width="100" height="auto" alt="User Image">
                        <a class="users-list-name" href="<?= base_url('assets/AdminLTE/')?>#"><?= $k['calon_ketua_nama']?></a>
                        <span class="users-list-date"><?= $k['tema_nama']?></span>
                      </li>
                      <?php } ?>
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('Auth_Admin/Ketua')?>">Lihat Semua Calon</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.col -->

          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
