<div class="landing-catalog-card">
    <div class="card-container">
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
        <div class="card">
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
</div>