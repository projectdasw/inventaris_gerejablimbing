<div class="container-fluid dash-carousel swiper">
    <div class="d-flex flex-row swiper-wrapper">
        <div class="card text-bg-danger bg-gradient swiper-slide" style="width: 18rem; height: 18rem;">
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
                    <small class="d-flex flex-column text-body-danger">
                        <span>Update Terakhir</span>
                        <span>
                            <?php
                                echo strftime("%A, %d %B %Y");
                            ?>
                        </span>
                    </small>
                </div>
            </div>
        </div>
        <div class="card text-bg-primary bg-gradient swiper-slide" style="width: 18rem; height: 18rem;">
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
                    <div class="card-footer">
                        <small class="d-flex flex-column text-body-primary">
                            <span>Update Terakhir</span>
                            <span>
                                <?php
                                    echo strftime("%A, %d %B %Y");
                                ?>
                            </span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-bg-success bg-gradient swiper-slide" style="width: 18rem; height: 18rem;">
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
                    <div class="card-footer">
                        <small class="d-flex flex-column text-body-success">
                            <span>Update Terakhir</span>
                            <span>
                                <?php
                                    echo strftime("%A, %d %B %Y");
                                ?>
                            </span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-bg-warning bg-gradient swiper-slide" style="width: 18rem; height: 18rem;">
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
                    <div class="card-footer">
                        <small class="d-flex flex-column text-body-warning">
                            <span>Update Terakhir</span>
                            <span>
                                <?php
                                    echo strftime("%A, %d %B %Y");
                                ?>
                            </span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-bg-info bg-gradient swiper-slide" style="width: 18rem; height: 18rem;">
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
                    <div class="card-footer">
                        <small class="d-flex flex-column text-body-info">
                            <span>Update Terakhir</span>
                            <span>
                                <?php
                                    echo strftime("%A, %d %B %Y");
                                ?>
                            </span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col">
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_trans_barang" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Transaksi Barang
                    </h2>
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
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_track" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Track Aktivitas
                    </h2>
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
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_acc" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Akun Pengelola Inventaris
                    </h2>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama User</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tampil_akun = "select * from akun";
                        $tampil_akun_query = mysqli_query($connect,$tampil_akun);
                        while($tampil_akun_hasil = mysqli_fetch_assoc($tampil_akun_query))
                        {
                            $id = $tampil_akun_hasil['id_akun'];
                            $nm = $tampil_akun_hasil['nama_akun'];
                            $user = $tampil_akun_hasil['username'];
                            $pass = $tampil_akun_hasil['password'];
                            $lvl = $tampil_akun_hasil['level_akun'];
                            $no_hp = $tampil_akun_hasil['no_hp'];
                    ?>
                    <tr>
                        <td><?php echo $user;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $lvl;?></td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($tampil_akun_query);            
                    ?>
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
        </div>
        <div class="col">
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_bangunan" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Harta Gereja - Bangunan
                    </h2>
                    <thead>
                        <tr>
                            <th>Nama Bangunan</th>
                            <th>Total Barang</th>
                            <th>Total Jumlah Barang</th>
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
                            <th>Total Jumlah Barang</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_lokasi_utama" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Harta Gereja - Lokasi Utama
                    </h2>
                    <thead>
                        <tr>
                            <th>Nama Lokasi</th>
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
                        ?>
                        <tr>
                            <td><?php echo $nm;?></td>
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
                            <th>Nama Lokasi</th>
                            <th>Total Barang</th>
                            <th>Total Jumlah Barang</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="bg-light mt-4 p-3 rounded-4">
                <table id="table_lokasi_sekunder" class="display">
                    <h2 class="fs-4 border-bottom mb-3 py-2">
                        Harta Gereja - Lokasi Sekunder
                    </h2>
                    <thead>
                        <tr>
                            <th>Nama Lokasi</th>
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
                        ?>
                        <tr>
                            <td><?php echo $nm;?></td>
                            <td>
                                <?php
                                    $query = "select count(*) as total from barang_gereja
                                                where nama_lokasi_sekunder='$nm'";
                                    $sql = mysqli_query($connect, $query);
                                    $countdata = mysqli_fetch_assoc($sql);
                                    echo "$countdata[total]";
                                ?>
                            </td>
                            <td>
                                <?php
                                    $query = "select sum(jumlah) as total from barang_gereja
                                                where nama_lokasi_sekunder='$nm'";
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
                            <th>Nama Lokasi</th>
                            <th>Total Barang</th>
                            <th>Total Jumlah Barang</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card-info-dash">
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
                <?php
                    $tampil_akun = "select * from akun";
                    $tampil_akun_query = mysqli_query($connect,$tampil_akun);
                    while($tampil_akun_hasil = mysqli_fetch_assoc($tampil_akun_query))
                    {
                        $id = $tampil_akun_hasil['id_akun'];
                        $nm = $tampil_akun_hasil['nama_akun'];
                        $user = $tampil_akun_hasil['username'];
                        $pass = $tampil_akun_hasil['password'];
                        $lvl = $tampil_akun_hasil['level_akun'];
                        $no_hp = $tampil_akun_hasil['no_hp'];
                ?>
                <tr>
                    <td><?php echo $user;?></td>
                    <td><?php echo $nm;?></td>
                    <td><?php echo $lvl;?></td>
                </tr>
                <?php
                    }
                    mysqli_free_result($tampil_akun_query);            
                ?>
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
                        <th>Total Jumlah Barang</th>
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
                        <th>Total Jumlah Barang</th>
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
                    ?>
                    <tr>
                        <td><?php echo $nm;?></td>
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
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
                        <th>Total Jumlah Barang</th>
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
                    ?>
                    <tr>
                        <td><?php echo $nm;?></td>
                        <td>
                            <?php
                                $query = "select count(*) as total from barang_gereja
                                            where nama_lokasi_sekunder='$nm'";
                                $sql = mysqli_query($connect, $query);
                                $countdata = mysqli_fetch_assoc($sql);
                                echo "$countdata[total]";
                            ?>
                        </td>
                        <td>
                            <?php
                                $query = "select sum(jumlah) as total from barang_gereja
                                            where nama_lokasi_sekunder='$nm'";
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
                        <th>Nama Lokasi</th>
                        <th>Total Barang</th>
                        <th>Total Jumlah Barang</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> -->