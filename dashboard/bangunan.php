<table id="table-data" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID Bangunan</th>
            <th>Nama Bangunan</th>
            <th>Foto Bangunan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $tampil_bangunan = "select * from bangunan";
            $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
            while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
            {
                $id = $tampil_bangunan_hasil['id_bangunan'];
                $nm = $tampil_bangunan_hasil['nama_bangunan'];
                $ft = $tampil_bangunan_hasil['foto_bangunan'];
        ?>
        <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $nm;?></td>
            <td><?php echo $ft;?></td>
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
            mysqli_free_result($tampil_bangunan_query);            
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID Bangunan</th>
            <th>Nama Bangunan</th>
            <th>Foto Bangunan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>