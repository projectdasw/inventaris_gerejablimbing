<div class="report-heading">
    <div class="heading">
        <h1>Data Total Harta Benda Gereja</h1>
        <span>Gereja Katolik Paroki St. Albertus de Trapani</span>
    </div>
    <div class="count-all">
        <h3>Total Harta Benda Gereja</h3>
        <div class="row">
            <div class="count-items">
                Total Barang :
                <?php
                    $query = "select count(*) as total from barang_gereja";
                    $sql = mysqli_query($connect, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span>$countdata[total]</span>";
                ?>
            </div>
            <div class="sum-items">
                Total Keseluruhan Barang :
                <?php
                    $query = "select sum(jumlah) as total from barang_gereja";
                    $sql = mysqli_query($connect, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span>$countdata[total]</span>";
                ?>
            </div>
        </div>
    </div>
</div>
<div class="report-content">
    <table id="table_trans_barang" class="display" style="width:100%">
        <h1>Detail Transaksi Harta Benda</h1>
        <thead>
            <tr>
                <th>Hari/Tanggal</th>
                <th>No. Trans</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>Hari/Tanggal</th>
                <th>No. Trans</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
            </tr>
        </tfoot>
    </table>
    <table id="table_report_bangunan" class="display" style="width:100%">
        <h1>Data Laporan Bangunan</h1>
        <thead>
            <tr>
                <th>ID Bangunan</th>
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
                <th></th>
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
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nm;?></td>
                <td>
                    <?php
                        $query = "select count(*) as total from barang_gereja where nama_bangunan='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
                <td>
                    <?php
                        $query = "select sum(jumlah) as total from barang_gereja where nama_bangunan='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
                <td>
                    <a class="btn btn-success">
                        <span>Lihat detail data</span>
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
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <table id="table_report_lokasi_utama" class="display" style="width:100%">
        <h1>Data Laporan Lokasi Utama</h1>
        <thead>
            <tr>
                <th>ID Lokasi Utama</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tampil_lokasi_utama = "select * from lokasi_utama";
                $tampil_lokasi_utama_query = mysqli_query($connect,$tampil_lokasi_utama);
                while($tampil_lokasi_utama_hasil = mysqli_fetch_assoc($tampil_lokasi_utama_query))
                {
                    $id = $tampil_lokasi_utama_hasil['id_lokasi'];
                    $nm = $tampil_lokasi_utama_hasil['nama_lokasi_utama'];
                    $nm_bgn = $tampil_lokasi_utama_hasil['nama_bangunan'];
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nm;?></td>
                <td><?php echo $nm_bgn;?></td>
                <td>
                    <?php
                        $query = "select count(*) as total from barang_gereja where nama_lokasi_utama='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
                <td>
                    <?php
                        $query = "select sum(jumlah) as total from barang_gereja where nama_lokasi_utama='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
            </tr>
            <?php
                }
                mysqli_free_result($tampil_lokasi_utama_query);            
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID Lokasi Utama</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
            </tr>
        </tfoot>
    </table>
    <table id="table_report_lokasi_sekunder" class="display" style="width:100%">
        <h1>Data Laporan Lokasi Sekunder</h1>
        <thead>
            <tr>
                <th>ID Lokasi Sekunder</th>
                <th>Lokasi Sekunder</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
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
                    <?php
                        $query = "select count(*) as total from barang_gereja where nama_lokasi_sekunder='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
                <td>
                    <?php
                        $query = "select sum(jumlah) as total from barang_gereja where nama_lokasi_sekunder='$nm'";
                        $sql = mysqli_query($connect, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "$countdata[total]";
                    ?>
                </td>
            </tr>
            <?php
                }
                mysqli_free_result($tampil_lokasi_sekunder_query);            
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID Lokasi Sekunder</th>
                <th>Lokasi Sekunder</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Total Barang</th>
                <th>Total Jumlah Barang</th>
            </tr>
        </tfoot>
    </table>
</div>