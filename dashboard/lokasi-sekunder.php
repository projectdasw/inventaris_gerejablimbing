<table id="table-data" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID Lokasi</th>
            <th>Nama Lokasi Sekunder</th>
            <th>Lokasi Utama</th>
            <th>Bangunan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $tampil_lokasi_sekunder = "select * from lokasi_sekunder";
            $tampil_lokasi_sekunder_query = mysqli_query($connect,$tampil_lokasi_sekunder);
            while($tampil_lokasi_sekunder_hasil = mysqli_fetch_assoc($tampil_lokasi_sekunder_query))
            {
                $id = $tampil_lokasi_sekunder_hasil['id_lokasi_sekunder'];
                $nm = $tampil_lokasi_sekunder_hasil['nama_lokasi_sekunder'];
                $nm_loc = $tampil_lokasi_sekunder_hasil['nama_lokasi_utama'];
                $nm_bgn = $tampil_lokasi_sekunder_hasil['nama_bangunan'];
        ?>
        <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $nm;?></td>
            <td><?php echo $nm_loc;?></td>
            <td><?php echo $nm_bgn;?></td>
            <td>
                <a class="edit-data-table btn-success" href="">
                    <i class="fa-solid fa-pencil"></i>
                    <span>Ubah</span>
                </a>
                <a class="delete-data-table btn-danger" href="">
                    <i class="fa-solid fa-trash-can"></i>
                    <span>Hapus</span>
                </a>
            </td>
        </tr>
        <?php
            }
            mysqli_free_result($tampil_lokasi_sekunder_query);            
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID Lokasi</th>
            <th>Nama Lokasi Sekunder</th>
            <th>Lokasi Utama</th>
            <th>Bangunan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>