<div class="container d-flex flex-column align-items-center text-bg-primary bg-gradient mt-3 mb-3 p-2 rounded-4">
    <div class="d-flex flex-row align-items-center">
        <i class="fa-solid fa-eye fs-4 rounded-circle p-2 text-bg-danger"></i>
        <span class="h4 mb-0 ms-2">Aktivitas Terakhir</span>
    </div>
    <span>
        [Nama User] telah
        melakukan aktivitas Add/Edit/Delete data
        pada tanggal [Tanggal Aktivitas] pukul
        [Waktu Aktivitas]
    </span>
</div>
<div class="container-fluid inven-carousel swiper">
    <div class="d-flex flex-row swiper-wrapper">
        <?php
            $tampil_bangunan = "select * from bangunan";
            $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
            while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
            {
                $id = $tampil_bangunan_hasil['id_bangunan'];
                $nm = $tampil_bangunan_hasil['nama_bangunan'];
        ?>
            <div class="card swiper-slide" style="width: 18rem;">
                <img src="img/data-gambar/fasilitas-ruangan.webp" class="card-img-top" alt="image">
                <div class="card-body">
                    <div class="card-title">
                        <h5><?php echo $nm; ?></h5>
                        <span>Gereja Katolik Paroki St. Albertus de Trapani</span>
                    </div>
                    <p class="height-custom card-text d-flex flex-row overflow-auto flex-wrap">
                        <?php
                            $badge_lokasi_utama = "select * from lokasi_utama
                                            where nama_bangunan='$nm'";
                            $badge_lokasi_utama_query = mysqli_query($connect,$badge_lokasi_utama);
                            while($badge_lokasi_utama_hasil = mysqli_fetch_assoc($badge_lokasi_utama_query))
                            {
                                $badge_loc = $badge_lokasi_utama_hasil['nama_lokasi_utama'];
                        ?>
                            <span class="badge bg-success me-1 mt-1 mb-1">
                                <?php echo $badge_loc; ?>
                            </span>
                        <?php } ?>
                        <?php
                            $badge_lokasi_sekunder = "select * from lokasi_sekunder
                                            where nama_bangunan='$nm'";
                            $badge_lokasi_sekunder_query = mysqli_query($connect,$badge_lokasi_sekunder);
                            while($badge_lokasi_sekunder_hasil = mysqli_fetch_assoc($badge_lokasi_sekunder_query))
                            {
                                $badge_los = $badge_lokasi_sekunder_hasil['nama_lokasi_sekunder'];
                        ?>
                            <span class="badge bg-success me-1 mt-1 mb-1">
                                <?php echo $badge_los; ?>
                            </span>
                        <?php } ?>
                    </p>
                    <a class="fs-custom btn bg-primary bg-gradient"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span>Buka Katalog - <?php echo $nm; ?></span>
                    </a>
                </div>
            </div>
        <?php
            }
            mysqli_free_result($tampil_bangunan_query);
            mysqli_free_result($badge_lokasi_utama_query);
            mysqli_free_result($badge_lokasi_sekunder_query);
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="container d-flex flex-column align-items-center text-bg-primary bg-gradient mt-3 mb-3 p-2 rounded-4">
    <div class="d-flex flex-row align-items-center">
        <i class="fa-solid fa-table-list fs-4 rounded-circle p-2 text-bg-danger"></i>
        <span class="h4 mb-0 ms-2">List Data Inventaris</span>
    </div>
    <span>Keseluruhan data Harta Benda Gereja</span>
</div>
<div class="container-fluid bg-dark bg-gradient text-white p-3 rounded-4">
    <table id="table-data" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID Barang</th>
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
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
            </tr>
        </tfoot>
    </table>
</div>