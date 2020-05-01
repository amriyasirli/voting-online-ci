
<!-- Modal Panduan -->
<div class="modal fade" id="panduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Petunjuk Pemilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Pilih salah satu tema pemilihan dengan mengklik tombol buka.</li>
          <li>Setelah anda mengklik tombol buka maka akan masuk kehalaman pemilihan calon yang menampilkan foto dan nama calon.</li>
          <li>Klik salah satu foto calon untuk melakukan pemilihan dan anda kembali dibawa kehalaman tema pemilihan.</li>
          <li>Apabila anda sudah menyelesaikan pemilihan maka akan muncul tombol selesai</li>
          <li>Klik tombol selesai jika anda telah selesai memilih</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda Yakin Ingin Keluar ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('AdminLogin/logout')?>">Okay</a>
        </div>
      </div>
    </div>
  </div>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; <?= date('F Y')?> <a href="<?= base_url('assets/AdminLTE/')?>http://adminlte.io">E-Voting | HMPS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-xs-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/')?>jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/')?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/AdminLTE/')?>dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/')?>chartjs/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->

<!-- WYSWYG -->


<script src="<?= base_url('assets/') ?>sweetalert2/dist/sweetalert2.all.min.js"></script>



<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/dataTables/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url();?>assets/dataTables/dataTables.bootstrap4.min.js"></script>          
<script src="<?php echo base_url();?>assets/summernote/summernote.js"></script>
<!-- <script type="text/javascript">
  
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nama', 'Perolehan Suara'],
          <?php foreach($suara as $s) {
            echo "['".$s['calon_ketua_nama']."', ".$s['calon_ketua_suara']."],";
          } ?>
        ]);

        var options = {
          title: 'Hasil Suara Pemilihan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

  </script> -->
  
  <script>
    
    //edtor summernote
    $('#editordata').summernote({
      height: 200,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert',['picture']]
      ],
            //set callback image tuk upload ke serverside
            callbacks: {
                    onImageUpload: function(files) {
                        uploadFile(files[0]);
                    }
                }

    });

    // sweetalert
    $('.pilih').on('click', function(e){
    e.preventDefault();
    console.log('ya');
    const href = $(this).attr('href');
    const name = $(this).attr('data');

    Swal.fire({
      title: name,
      text: 'Apakah Anda Yakin Dengan Pilihan ini?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
  })

  // Chart Area
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels  : ['May', 'June', 'July'],
    datasets: [
      {
        label               : 'Digital Goods',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : 'Electronics',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
  )

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  
  </script>
</body>
</html>