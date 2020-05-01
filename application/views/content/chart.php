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
                <h3 class="card-title">Daftar Calon</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
              <canvas id="canvas" height="450" width="450"></canvas>

                <script>

                    var pieData = [
                            {
                                value: 30,
                                color:"#F38630"
                            },
                            {
                                value : 50,
                                color : "#E0E4CC"
                            },
                            {
                                value : 100,
                                color : "#69D2E7"
                            }
                        
                        ];

                var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);

                </script>

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