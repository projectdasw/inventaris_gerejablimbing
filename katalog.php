<div class="container-fluid mt-3">
    <div class="d-flex flex-row flex-wrap justify-content-evenly">
        <?php
            $tampil_bangunan = "select * from bangunan";
            $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
            while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
            {
                $id = $tampil_bangunan_hasil['id_bangunan'];
                $nm = $tampil_bangunan_hasil['nama_bangunan'];
        ?>
            <div class="card mb-1" style="width: 20rem;">
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
</div>