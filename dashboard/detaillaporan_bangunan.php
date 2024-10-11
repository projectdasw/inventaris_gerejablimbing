<?php
    $id_bgn = $_GET['detaillaporan_bangunan'];

    $query = "select * from bangunan where id_bangunan = '$id_bgn'";
    $sql = mysqli_query($connect, $query);
    $get_data = mysqli_fetch_assoc($sql);
    
    $nm_bgn = $get_data['nama_bangunan'];

    $query = "select count(*) as total from barang_gereja where nama_bangunan='$nm_bgn'";
    $sql = mysqli_query($connect, $query);
    $countdata = mysqli_fetch_assoc($sql);

    $query2 = "select sum(jumlah) as total from barang_gereja where nama_bangunan='$nm_bgn'";
    $sql2 = mysqli_query($connect, $query2);
    $countdata2 = mysqli_fetch_assoc($sql2);
?>
<div class='d-flex flex-row justify-content-between align-items-center'>
    <div class="row">
        <span>
            Total inventaris <?php echo $nm_bgn; ?> : <?php echo $countdata['total'];?>
        </span>
        <span>
            Total Jumlah barang <?php echo $nm_bgn; ?> : <?php echo $countdata2['total'];?>
        </span>
    </div>
    <div>
        <a href='' class='btn btn-danger'>
            <i class='fa-solid fa-file-pdf'></i>
            PDF
        </a>
        <a href='' class='btn btn-success'>
            <i class='fa-solid fa-file-excel'></i>
            Excel
        </a>
    </div>
</div>
<div class="bg-light overflow-x-auto">
    <table class="display table table-hover">
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
            </tr>
        </thead>
        <tbody>
            <?php
                $id_bgn = $_GET['detaillaporan_bangunan'];

                $query = "select * from bangunan where id_bangunan = '$id_bgn'";
                $sql = mysqli_query($connect, $query);
                $get_data = mysqli_fetch_assoc($sql);
                    
                $nm_bgn = $get_data['nama_bangunan'];

                $tampil_barang_gereja = "select * from barang_gereja where nama_bangunan='$nm_bgn'";
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
            </tr>
        </tfoot>
    </table>
</div>