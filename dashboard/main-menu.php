<div class="card-dash swiper">
    <div class="card swiper-wrapper">
        <?php
            $tampil_bangunan = "select * from bangunan";
            $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
            while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
            {
                $id = $tampil_bangunan_hasil['id_bangunan'];
                $nm = $tampil_bangunan_hasil['nama_bangunan'];
        ?>
            <div class="card-content swiper-slide">
                <div class="card-row">
                    <div class="title">
                        <h3><?php echo $nm; ?></h3>
                        <span>Gereja Katolik Paroki St. Albertus de Trapani</span>
                    </div>
                    <div class="count">
                        <span>9999</span>
                        <span>dari 9999</span>
                    </div>
                </div>
                <a class="btn btn-small" href="">
                    <i class="fa-solid fa-circle-right"></i>
                    <span>Lihat Data - <?php echo $nm; ?></span>
                </a>
            </div>
        <?php
            }
            mysqli_free_result($tampil_bangunan_query);            
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="card-info-dash">
    <div class="card-masonry">
        <div class="track-card">
            <h1>Track Aktivitas</h1>
            <table id="table_track" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Waktu/Tanggal</th>
                        <th>Nama User</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Waktu/Tanggal</th>
                        <th>Nama User</th>
                        <th>Aktivitas</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="acc-card">
            <h1>Data Akun Inventaris</h1>
            <table id="table_acc" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama User</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Nama User</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="build-card">
            <h1>Data Bangunan</h1>
            <table id="table_bangunan" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Bangunan</th>
                        <th>Total Barang</th>
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
                        <td><?php echo $nm;?></td>
                        <td>999</td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($tampil_bangunan_query);            
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Bangunan</th>
                        <th>Total Barang</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-masonry">
        <div class="trans-card">
            <h1>Data Transaksi Barang</h1>
            <table id="table_trans_barang" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="loc-card">
            <h1>Data Lokasi Utama</h1>
            <table id="table_lokasi_utama" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
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
                    ?>
                    <tr>
                        <td><?php echo $nm;?></td>
                        <td>999</td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($tampil_lokasi_utama_query);            
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="los-card">
            <h1>Data Lokasi Sekunder</h1>
            <table id="table_lokasi_sekunder" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
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
                    ?>
                    <tr>
                        <td><?php echo $nm;?></td>
                        <td>999</td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($tampil_lokasi_sekunder_query);            
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>