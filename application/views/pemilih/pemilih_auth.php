


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><small> Selamat Datang,</small> <?= $usernama ?></h1>
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
          <?php foreach($tema as $t) { ?>
          <div class="col-lg-6">

            <!-- Profile Image -->
            <div class="card card-cyan card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php 
                        $nilai = $t['tema_id'];
                        echo $nilai % 2 ? '' : '';
                    ?>
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('/assets/img/'.$t['tema_logo']) ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $t['tema_nama'] ?></h3>

                <p class="text-muted text-center">Surat Suara</p>

                <?php
                    $query = $this->db->get_where('tb_suara', ['pemilih_id' => $user, 'tema_id' => $t['tema_id']]);
                    $cek = $query->num_rows();
                    if($cek > 0) {
                        echo "<br>Sudah Memilih";
                    } else {
                    ?>

                

                <a href="<?= base_url('PemilihAuth/pemilihMemilih/'.$t['tema_id']) ?>"" class="btn bg-cyan btn-block"><b>Buka</b></a>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
           

            <!-- /.card -->
        </div>
        <?php } ?>
        </div>
        <?php if($hasilCount == $countTema) { ?>
            <div class="text-center">
                <a href="<?= base_url('PemilihAuth/logout') ?>" class="btn btn-md bg-teal">Selesai</a>
            </div>
         <?php } ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  