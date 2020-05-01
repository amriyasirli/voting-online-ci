<!doctype html>
<html><head>
    </head><body>
    
        <img src="assets/img/img-pemilih/favicon.jpg" style="position: absolute; width: 110px; height: auto;">
        <br>
        <br>
        
        <h2 align="center" style="line-height: 1.6; font-weight: bold;">Daftar Pemilih E-Voting</h2>
        
        <hr>
    <table class="table table-bordered mt-3">
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>JK</th>
            <th>SEMESTER</th>
            <th>PRODI</th>
            <th>PRODI</th>
            <th>VERIFIKASI</th>
            <th>STATUS</th>
        </tr>
        <?php
        foreach ($pemilih as $pilih) : ?>
            <tr>

                <td><?php echo $pilih->pemilih_nim ?></td>
                <td><?php echo $pilih->pemilih_nama ?></td>
                <td align="center"><?php echo $pilih->pemilih_jk ?></td>
                <td align="center"><?php echo $pilih->pemilih_semester ?></td>
                <td><?php echo $pilih->pemilih_prodi ?></td>
                <td><?php echo $pilih->pemilih_fakultas ?></td>
                <!-- Untuk Verifikasi pdf -->
                <?php
                if($pilih->pemilih_verifikasi == 1){
                    echo '<td align="center">Diverifikasi</td>';
                }else{
                    echo '<td align="center">Belum Diverifikasi</td>';
                }
                ?>
                <!-- untuk status pdf -->
                <?php
                if($pilih->pemilih_status == 1){
                    echo '<td align="center">Sudah Memilih</td>';
                }else{
                    echo '<td align="center">Belum</td>';
                }
                ?>
            </tr>
        <?php endforeach; ?>
    </table>

</body></html>