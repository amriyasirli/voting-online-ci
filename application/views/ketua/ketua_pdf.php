<!doctype html>
<html><head>
    </head><body>
    
        <img src="assets/img/img-pemilih/favicon.jpg" style="position: absolute; width: 110px; height: auto;">
        <br>
        <br>
        
        <h2 align="center" style="line-height: 1.6; font-weight: bold;">Data Calon Ketua E-Voting</h2>
        
        <hr>
    <table align="center">
        <tr>
            
            <th>NAMA</th>
            <th>NO. URUT</th>
            <th>JURUSAN</th>
            <th>SEMESTER</th>
            <th>ALAMAT</th>
            <th>SUARA</th>
        </tr>
        <?php
        $no=1;
        foreach ($ketua as $ket) : ?>
            <tr>
                
                <td><?php echo $ket->calon_ketua_nama ?></td>
                <td align="center"><?php echo $ket->calon_ketua_nourut ?></td>
                <td align="center"><?php echo $ket->jurusan ?></td>
                <td align="center"><?php echo $ket->semester ?></td>
                <td><?php echo $ket->alamat ?></td>
                <td align="center"><?php echo $ket->calon_ketua_suara ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body></html>