<div class="dash-carousel swiper">
    <div class="d-flex flex-row swiper-wrapper">
        <div class="card text-bg-danger bg-gradient swiper-slide" style="width: 25%; height: 15rem;">
            <img src="../img/circle.svg" class="card-img" alt="svg">
            <div class="card-img-overlay">
                <h5 class="card-header fs-6">Harta Benda Gereja</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        Barang Gereja
                    </h5>
                    <p class="card-text">
                        <span class="fs-1">
                            <?php   
                                $query = "select count(*) as total from barang_gereja";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="index.php?list-data=list-data.php" class="btn btn-secondary">
                        <i class="fa-solid fa-database me-1"></i>
                        <span>Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card text-bg-primary bg-gradient swiper-slide" style="width: 25%; height: 15rem;">
            <img src="../img/circle.svg" class="card-img" alt="svg">
            <div class="card-img-overlay">
                <h5 class="card-header fs-6">Harta Benda Gereja</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        Bangunan / Gedung
                    </h5>
                    <p class="card-text">
                        <span class="fs-1">
                            <?php   
                                $query = "select count(*) as total from bangunan";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="index.php?bangunan=bangunan.php" class="btn btn-secondary">
                        <i class="fa-solid fa-database me-1"></i>
                        <span>Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card text-bg-success bg-gradient swiper-slide" style="width: 25%; height: 15rem;">
            <img src="../img/circle.svg" class="card-img" alt="svg">
            <div class="card-img-overlay">
                <h5 class="card-header fs-6">Harta Benda Gereja</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        Barang Gereja Baru
                    </h5>
                    <p class="card-text">
                        <span class="fs-1">
                            <?php   
                                $query = "select count(*) as total from barang_gereja";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="index.php?detail_baru=detail_baru.php" class="btn btn-secondary">
                        <i class="fa-solid fa-database me-1"></i>
                        <span>Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card text-bg-warning bg-gradient swiper-slide" style="width: 25%; height: 15rem;">
            <img src="../img/circle.svg" class="card-img" alt="svg">
            <div class="card-img-overlay">
                <h5 class="card-header fs-6">Harta Benda Gereja</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        Lokasi Utama
                    </h5>
                    <p class="card-text">
                        <span class="fs-1">
                            <?php   
                                $query = "select count(*) as total from lokasi_utama";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="index.php?lokasi-utama=lokasi-utama.php" class="btn btn-secondary">
                        <i class="fa-solid fa-database me-1"></i>
                        <span>Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card text-bg-info bg-gradient swiper-slide" style="width: 25%; height: 15rem;">
            <img src="../img/circle.svg" class="card-img" alt="svg">
            <div class="card-img-overlay">
                <h5 class="card-header fs-6">Harta Benda Gereja</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        Lokasi Sekunder
                    </h5>
                    <p class="card-text">
                        <span class="fs-1">
                            <?php   
                                $query = "select count(*) as total from lokasi_sekunder";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="index.php?lokasi-sekunder=lokasi-sekunder.php" class="btn btn-secondary">
                        <i class="fa-solid fa-database me-1"></i>
                        <span>Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="row mt-3">
    <div class="col-8">
        <div class="card border-primary">
            <div class="card-header border-primary">
                Log Aktivitas
            </div>
            <div class="card-body">
                <table class="table table-sm table-responsive m-0">
                    <tbody>
                        <?php
                            $tampil_aktivitas = "select * from aktivitas order by no desc limit 5";
                            $tampil_aktivitas_query = mysqli_query($connect,$tampil_aktivitas);

                            while($tampil_aktivitas_hasil = mysqli_fetch_assoc($tampil_aktivitas_query))
                            {
                                $wkt = $tampil_aktivitas_hasil['waktu'];
                                $akt = $tampil_aktivitas_hasil['aktivitas'];
                        ?>
                        <tr>
                            <td><?php echo $akt;?></td>
                        </tr>
                        <?php
                            }
                            mysqli_free_result($tampil_aktivitas_query);            
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer border-primary">
                <a class="btn btn-primary" href="">
                    <span>Lihat Aktivitas lebih banyak</span>
                    <i class="fa-solid fa-square-arrow-up-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card border-success">
            <div class="card-header border-success">
                Log Akun
            </div>
            <div class="card-body">
                <table class="table table-sm table-responsive m-0">
                    <tbody>
                        <?php
                            $tampil_akun = "select * from akun";
                            $tampil_akun_query = mysqli_query($connect,$tampil_akun);

                            while($tampil_akun_hasil = mysqli_fetch_assoc($tampil_akun_query))
                            {
                                $nm_akun = $tampil_akun_hasil['nama_akun'];
                                $lvl = $tampil_akun_hasil['level_akun'];
                        ?>
                        <tr>
                            <td><?php echo $nm_akun; ?></td>
                            <td><?php echo $lvl; ?></td>
                            <td>
                                <span class="badge p-0">
                                    <i class="fa-solid fa-circle text-success"></i>
                                    <strong class="text-dark">Online</strong>
                                </span>
                                <span class="badge p-0">
                                    <i class="fa-solid fa-circle text-danger"></i>
                                    <strong class="text-dark">4 menit yang lalu</strong>
                                </span>
                            </td>
                        </tr>
                        <?php
                            }
                            mysqli_free_result($tampil_akun_query);            
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer border-success">
                <a class="btn btn-primary" href="">
                    <span>Lihat Aktivitas lebih banyak</span>
                    <i class="fa-solid fa-square-arrow-up-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>