<?php
    $id_los = $_GET['detaillaporan_lokasisekunder'];

    $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
    $sql = mysqli_query($connect, $query);
    $get_data = mysqli_fetch_assoc($sql);
    
    $nm_los = $get_data['nama_lokasi_sekunder'];

    $query = "select count(*) as total from barang_gereja where nama_lokasi_sekunder='$nm_los'";
    $sql = mysqli_query($connect, $query);
    $countdata = mysqli_fetch_assoc($sql);

    $query2 = "select sum(jumlah) as total from barang_gereja where nama_lokasi_sekunder='$nm_los'";
    $sql2 = mysqli_query($connect, $query2);
    $countdata2 = mysqli_fetch_assoc($sql2);
?>
<div class='d-flex flex-row justify-content-between align-items-center'>
    <div class="row">
        <span>
            Total inventaris <?php echo $nm_los; ?> : <?php echo $countdata['total'];?>
        </span>
        <span>
            Total Jumlah barang <?php echo $nm_los; ?> : <?php echo $countdata2['total'];?>
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
                $id_los = $_GET['detaillaporan_lokasisekunder'];

                $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
                $sql = mysqli_query($connect, $query);
                $get_data = mysqli_fetch_assoc($sql);
                    
                $nm_los = $get_data['nama_lokasi_sekunder'];

                $tampil_barang_gereja = "select * from barang_gereja where nama_lokasi_sekunder='$nm_los'";
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