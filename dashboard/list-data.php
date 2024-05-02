<?php
    if(isset($_SESSION['sukses-tambah-barang-baru'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil disimpan",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-tambah-barang-baru']);
    } elseif(isset($_SESSION['sukses-edit-barang-baru'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di ubah",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-edit-barang-baru']);
    } elseif(isset($_SESSION['sukses-hapus-barang-baru'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di hapus",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-hapus-barang-baru']);
    } 
?>
<div class="bg-light p-3 rounded-4">
    <table id="table-data" class="display">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tampil_barang_gereja = "select * from barang_gereja";
                $tampil_barang_gereja_query = mysqli_query($connect,$tampil_barang_gereja);
                while($tampil_barang_gereja_hasil = mysqli_fetch_assoc($tampil_barang_gereja_query))
                {
                    $id = $tampil_barang_gereja_hasil['id_barang'];
                    $nm = $tampil_barang_gereja_hasil['nama_barang'];
                    $jml = $tampil_barang_gereja_hasil['jumlah'];
                    $knd = $tampil_barang_gereja_hasil['kondisi'];
                    $ket = $tampil_barang_gereja_hasil['keterangan_kondisi'];
                    $nm_bangunan = $tampil_barang_gereja_hasil['nama_bangunan'];
                    $nm_loc = $tampil_barang_gereja_hasil['nama_lokasi_utama'];
                    $nm_los = $tampil_barang_gereja_hasil['nama_lokasi_sekunder'];
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nm;?></td>
                <td><?php echo $jml;?></td>
                <td><?php echo $knd;?></td>
                <td><?php echo $ket;?></td>
                <td><?php echo $nm_bangunan;?></td>
                <td><?php echo $nm_loc;?></td>
                <td><?php echo $nm_los;?></td>
                <td>
                    <a class="badge btn btn-success"
                        data-bs-toggle="modal" data-bs-target="#editdata<?php echo $id; ?>">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Ubah</span>
                    </a>
                    <?php include "../inc/modal_editbarang.php"; ?>
                    <a class="badge btn btn-danger"
                        href="../inc/process.php?hapus_barang_gereja=<?php echo $id; ?>"
                        onclick="confirmDelete(event)">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Hapus</span>
                    </a>
                </td>
            </tr>
            <?php
                }
                mysqli_free_result($tampil_barang_gereja_query);            
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>