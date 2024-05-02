<div class="bg-light p-3 rounded-4">
    <table id="table-data" class="display">
    <thead>
        <tr>
            <th>Waktu/Tanggal</th>
            <th>User/Akun</th>
            <th>Aktivitas</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $tampil_aktivitas = "select * from aktivitas";
            $tampil_aktivitas_query = mysqli_query($connect,$tampil_aktivitas);
            while($tampil_aktivitas_hasil = mysqli_fetch_assoc($tampil_aktivitas_query))
            {
                $time = $tampil_aktivitas_hasil['waktu'];
                $user = $tampil_aktivitas_hasil['user'];
                $akt = $tampil_aktivitas_hasil['aktivitas'];
        ?>
        <tr>
            <td><?php echo $time;?></td>
            <td><?php echo $user;?></td>
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
