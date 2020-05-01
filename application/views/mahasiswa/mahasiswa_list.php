 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
    <body>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tabel Mahasiswa </h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 mt-2 ml-2">
                <?php echo anchor(site_url('mahasiswa/create'),'Create', 'class="btn bg-cyan"');
                 ?>
                 
            </div>
            <div class="col-md-3 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div> 
            <div class="col-md-3 text-right mt-2">
                <form action="<?php echo site_url('mahasiswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mahasiswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn bg-cyan" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Nim</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Jurusan</th>
		<th>Action</th>
            </tr><?php
            foreach ($mahasiswa_data as $mahasiswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mahasiswa->nama ?></td>
			<td><?php echo $mahasiswa->nim ?></td>
			<td><?php echo $mahasiswa->jenis_kelamin ?></td>
			<td><?php echo $mahasiswa->alamat ?></td>
			<td><?php echo $mahasiswa->jurusan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mahasiswa/read/'.$mahasiswa->id),'<button class="btn btn-info btn-xs">Read</button>'); 
				echo ' | '; 
				echo anchor(site_url('mahasiswa/update/'.$mahasiswa->id),'<button class="btn btn-warning btn-xs">Update</button>'); 
				echo ' | '; 
				echo anchor(site_url('mahasiswa/delete/'.$mahasiswa->id),'<button class="btn btn-danger btn-xs">Delete</button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6 mb-2 ml-2">
                <a href="#" class="btn bg-cyan">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('mahasiswa/excel'), '<i class="fas fa-file-excel"></i> Excel', 'class="btn bg-green"'); ?>
		<?php echo anchor(site_url('mahasiswa/word'), '<i class="fas fa-file-word"></i> Word', 'class="btn bg-blue"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

            <?php $this->load->view('template/footer');?>