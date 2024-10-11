<div class="d-flex flex-row justify-content-end">
    <a href="" class="btn btn-outline-danger me-2">
        <i class="fa-solid fa-file-pdf"></i>
        PDF
    </a>
    <a href="" class="btn btn-outline-success">
        <i class="fa-solid fa-file-excel"></i>
        Excel
    </a>
</div>
<div class="bg-light overflow-x-auto">
    <table id="" class="display table table-hover">
        <thead>
            <tr>
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
                $get_id = $_GET['detail_bangunan'];

                // GET DATA BANGUNAN w/ URL
                $query_get = "select * from bangunan where id_bangunan = '$get_id'";
                $sql_get = mysqli_query($connect, $query_get);
                $view_data = mysqli_fetch_assoc($sql_get);
                $nm_bgn = $view_data['nama_bangunan'];
                // GET DATA BANGUNAN w/ URL

                $query = "select * from barang_gereja where nama_bangunan = '$nm_bgn'";
                $sql = mysqli_query($connect, $query);

                while($get_data = mysqli_fetch_assoc($sql)){
                    $nm = $get_data['nama_barang'];
                    $jml = $get_data['jumlah'];
                    $knd = $get_data['kondisi'];
                    $ket_knd = $get_data['keterangan_kondisi'];
                    $bgn = $get_data['nama_bangunan'];
                    $loc = $get_data['nama_lokasi_utama'];
                    $los = $get_data['nama_lokasi_sekunder'];
            ?>
                <tr>
                    <td><?php echo $nm; ?></td>
                    <td><?php echo $jml; ?></td>
                    <td><?php echo $knd; ?></td>
                    <td><?php echo $ket_knd; ?></td>
                    <td><?php echo $bgn; ?></td>
                    <td><?php echo $loc; ?></td>
                    <td><?php echo $los; ?></td>
                </tr>
            <?php
                }
                mysqli_free_result($sql);
            ?>
        </tbody>
        <tfoot>
            <tr>
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