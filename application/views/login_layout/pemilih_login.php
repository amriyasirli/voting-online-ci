
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Pemilih | E-Voting</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url() ?>/assets/img/favicon1.jpg"  type="image/svg+xml" sizes="any">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?= base_url('pemilihauth')?>"><b>E - </b>Voting</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Login Pemilih</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?= base_url('assets/')?>img/favicon1.jpg" alt="User Image" class="brand-image img-circle elevation-5" style="opacity: .8">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <?php
    $attr = array('class' => 'lockscreen-credentials');
    echo form_open('PemilihAuth', $attr);
    ?>
      <div class="input-group">
        <input type="text" name="nopemilih" class="form-control" placeholder="Masukkan Nim">
        <div class="input-group-append">
          <input type="submit" name="login-pemilih" class="btn bg-cyan btn-xs" value="Login">
        </div>
      </div>
    <?= form_close() ?>
    <span class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil') ?>"></span>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <?= $this->session->flashdata('message'); ?>
  <div class="text-center">
    <a href="login.html"><?= form_error("nopemilih", '<small class="text-danger">', '</small>')?>
</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?= date('F Y')?> <b><a href="#">E-Voting | HMPS</a>.</b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/')?>sweetalert2/dist/sweetalert2.all.min.js"></script>

<script>
    const flashData = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if(flashData) {
      Swal.fire(
        'Berhasil!',
        flashData,
        'success'
      )
    }
  </script>
</body>
</html>
