<div class="bg-light overflow-x-auto">
    <table class="display table table-hover">
    <thead>
        <tr>
            <th>Waktu/Tanggal</th>
            <th>User/Akun</th>
            <th>Aktivitas</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $tampil_aktivitas = "select * from aktivitas order by no desc limit 100";
            $tampil_aktivitas_query = mysqli_query($connect,$tampil_aktivitas);
            while($tampil_aktivitas_hasil = mysqli_fetch_assoc($tampil_aktivitas_query))
            {
                $wkt = $tampil_aktivitas_hasil['waktu'];
                $akn = $tampil_aktivitas_hasil['user'];
                $akt = $tampil_aktivitas_hasil['aktivitas'];
        ?>
        <tr>
            <td><?php echo $wkt;?></td>
            <td><?php echo $akn;?></td>
            <td><?php echo $akt;?></td>
        </tr>
        <?php
            }
            mysqli_free_result($tampil_aktivitas_query);            
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Waktu/Tanggal</th>
            <th>User/Akun</th>
            <th>Aktivitas</th>
        </tr>
    </tfoot>
    </table>
