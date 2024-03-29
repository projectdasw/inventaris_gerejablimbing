<div class="landing-tracker">
    <div class="header-tracker">
        <i class="fa-solid fa-eye"></i>
        <h2>Aktivitas Terakhir</h2>
    </div>
    <p class="body-tracker">
        [Nama User] telah
        melakukan aktivitas Add/Edit/Delete data
        pada tanggal [Tanggal Aktivitas] pukul
        [Waktu Aktivitas]
    </p>
</div>
<div class="landing-content-card swiper">
    <div class="card-container swiper-wrapper">
        <?php
            $tampil_bangunan = "select * from bangunan";
            $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
            while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
            {
                $id = $tampil_bangunan_hasil['id_bangunan'];
                $nm = $tampil_bangunan_hasil['nama_bangunan'];
                $ft = $tampil_bangunan_hasil['foto_bangunan'];
                $link = $tampil_bangunan_hasil['hyperlink'];
        ?>
        <div class="card swiper-slide">
            <img src="img/data-gambar/fasilitas-ruangan.webp" alt="image">
            <div class="card-content">
                <div class="card-title">
                    <h2><?php echo $nm; ?></h2>
                    <span>Gereja Katolik Paroki St. Albertus de Trapani</span>
                </div>
                <div class="card-body">
                    <div class="card-tag">
                        <span>Ruang Sekretariat Paroki</span>
                        <span>Panti Imam</span>
                        <span>Perlengkapan Gereja</span>
                        <span>Sakristi</span>
                        <span>Aula Lantai 3</span>
                    </div>
                    <div class="card-button">
                        <a href="">
                            <i class="fa-solid fa-box-open"></i>
                            <span>Buka Katalog - <?php echo $nm; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            mysqli_free_result($tampil_bangunan_query);
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="landing-front-data">
    <div class="landing-front-data-heading">
        <div class="header-front-data">
            <i class="fa-solid fa-table-list"></i>
            <h2>List Data Inventaris Gereja</h2>
        </div>
        <p class="body-front-data">
            Keseluruhan data inventaris barang gereja
        </p>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
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
                    $desc = $tampil_barang_gereja_hasil['deskripsi'];
                    $jml = $tampil_barang_gereja_hasil['jumlah'];
                    $knd = $tampil_barang_gereja_hasil['kondisi'];
                    $ket = $tampil_barang_gereja_hasil['keterangan'];
                    $nm_bangunan = $tampil_barang_gereja_hasil['nama_bangunan'];
                    $nm_loc = $tampil_barang_gereja_hasil['nama_lokasi_utama'];
                    $nm_los = $tampil_barang_gereja_hasil['nama_lokasi_sekunder'];
            ?>
            <tr>
                <td><?php echo $nm;?></td>
                <td><?php echo $jml;?></td>
                <td><?php echo $knd;?></td>
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
            
        </tfoot>
    </table>
</div>