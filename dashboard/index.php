<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    session_start();
    require_once "../inc/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
        <link rel="manifest" href="../favicon/site.webmanifest">
        
        <!-- CSS CORE -->
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <!-- BOOTSTRAP CSS -->
        
        <!-- FONT STYLE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
        <!-- FONT STYLE -->

        <!-- FONT AWESOME ICON -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"
            integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css"
            integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.css"
            integrity="sha512-o4nUMQptICEY+GgMk9oWsOOM8LV/Gvq+N/AJgZ2LIAR7r9wzTZ+MIJpPVjv4S0FVnpeBplQrxfIXKqVxHQzw8g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css"
            integrity="sha512-TzeemgHmrSO404wTLeBd76DmPp5TjWY/f2SyZC6/3LsutDYMVYfOx2uh894kr0j9UM6x39LFHKTeLn99iz378A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FONT AWESOME ICON -->

        <!-- DATATABLES CSS-->
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">
        <!-- DATATABLES CSS -->

        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- SWIPER CSS -->

        <!-- CSS CUSTOM -->
        <link rel="stylesheet" href="../assets/style.css">
        <!-- CSS CUSTOM -->
        <!-- CSS CORE -->

        <!-- JS CORE-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <!-- BOOTSTRAP JS -->

        <!-- DATATABLES JS -->
        <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script>
        <!-- DATATABLES JS -->

        <!-- SWIPER JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- SWIPER JS -->

        <!-- SWEETALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
        <!-- SWEETALERT JS -->
        <!-- JS CORE-->
        <title>
            <?php
                if(isset($_GET['list-data'])){
                    echo "Data Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['bangunan'])){
                    echo "Data Bangunan - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_bangunan'])){
                    $id_bgn = $_GET['detail_bangunan'];

                    $query = "select * from bangunan where id_bangunan = '$id_bgn'";
                    $sql = mysqli_query($connect, $query);
                    $view_edit = mysqli_fetch_assoc($sql);
                    
                    $nm_bgn = $view_edit['nama_bangunan'];
                    echo "$nm_bgn - Inventaris Gereja";
                }
                elseif(isset($_GET['lokasi-utama'])){
                    echo "Data Lokasi Utama - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_lokasi_utama'])){
                    $id_loc = $_GET['detail_lokasi_utama'];

                    $query = "select * from lokasi_utama where id_lokasi = '$id_loc'";
                    $sql = mysqli_query($connect, $query);
                    $get_data = mysqli_fetch_assoc($sql);
                    
                    $nm_loc = $get_data['nama_lokasi_utama'];
                    echo "$nm_loc - Inventaris Gereja";
                }
                elseif(isset($_GET['lokasi-sekunder'])){
                    echo "Data Lokasi Sekunder - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_lokasi_sekunder'])){
                    $id_los = $_GET['detail_lokasi_sekunder'];

                    $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
                    $sql = mysqli_query($connect, $query);
                    $get_data = mysqli_fetch_assoc($sql);
                    
                    $nm_los = $get_data['nama_lokasi_sekunder'];
                    echo "$nm_los - Inventaris Gereja";
                }
                elseif(isset($_GET['akun'])){
                    echo "Data Akun - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_baru'])){
                    echo "Data Barang Gereja Baru - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_tambah'])){
                    echo "Data Penambahan Jumlah Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['detail_kurang'])){
                    echo "Data Pengurangan Jumlah Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['ubah_barang'])){
                    echo "Edit Data Inventaris - Inventaris Gereja";
                }
                elseif(isset($_GET['ubah_bangunan'])){
                    echo "Edit Data Bangunan - Inventaris Gereja";
                }
                elseif(isset($_GET['ubah_lokasiutama'])){
                    echo "Edit Data Lokasi Utama - Inventaris Gereja";
                }
                elseif(isset($_GET['ubah_lokasisekunder'])){
                    echo "Edit Data Lokasi Sekunder - Inventaris Gereja";
                }
                elseif(isset($_GET['tambahjumlah_barang'])){
                    echo "Penambahan Jumlah Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['kurangjumlah_barang'])){
                    echo "Pengurangan Jumlah Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['aktivitas'])){
                    echo "Track Aktivitas - Inventaris Gereja";
                }
                elseif(isset($_GET['laporan'])){
                    echo "Laporan - Inventaris Gereja";
                }
                elseif(isset($_GET['laporan_bangunan'])){
                    echo "Laporan Data bangunan - Inventaris Gereja";
                }
                elseif(isset($_GET['detaillaporan_bangunan'])){
                    $id_bgn = $_GET['detaillaporan_bangunan'];

                    $query = "select * from bangunan where id_bangunan = '$id_bgn'";
                    $sql = mysqli_query($connect, $query);
                    $view_edit = mysqli_fetch_assoc($sql);
                    
                    $nm_bgn = $view_edit['nama_bangunan'];
                    echo "$nm_bgn - Inventaris Gereja";
                }
                elseif(isset($_GET['laporan_lokasiutama'])){
                    echo "Laporan Data Lokasi Utama - Inventaris Gereja";
                }
                elseif(isset($_GET['detaillaporan_lokasiutama'])){
                    $id_loc = $_GET['detaillaporan_lokasiutama'];

                    $query = "select * from lokasi_utama where id_lokasi = '$id_loc'";
                    $sql = mysqli_query($connect, $query);
                    $view_edit = mysqli_fetch_assoc($sql);
                    
                    $nm_loc = $view_edit['nama_lokasi_utama'];
                    echo "$nm_loc - Inventaris Gereja";
                }
                elseif(isset($_GET['laporan_lokasisekunder'])){
                    echo "Laporan Data Lokasi Sekunder - Inventaris Gereja";
                }
                elseif(isset($_GET['detaillaporan_lokasisekunder'])){
                    $id_los = $_GET['detaillaporan_lokasisekunder'];

                    $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
                    $sql = mysqli_query($connect, $query);
                    $view_edit = mysqli_fetch_assoc($sql);
                    
                    $nm_los = $view_edit['nama_lokasi_sekunder'];
                    echo "$nm_los - Inventaris Gereja";
                }
                elseif(isset($_GET['tentang'])){
                    echo "Tentang - Inventaris Gereja";
                }
                else{
                    echo "Dashboard - Inventaris Gereja";
                }
            ?>
        </title>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
            {
        ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Silahkan Login terlebih dahulu",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../';
                    }
                });
            </script>
        <?php
            }
        ?>

        <?php include "form/modal_forminven.php"; ?>
        <!-- OFFCANVAS MENU -->
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Menu Navigasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/logo-paroki-new.webp" class="w-50 mb-1 mt-1" alt="image">
                    <span class="fs-6">
                        parokiblimbing.org
                    </span>
                </div>
                <ul class="d-flex flex-column mt-3">
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php">
                            <span>Beranda</span>
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li>
                        <div class="accordion accordion-flush" id="accor_forminven">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a class="accordion-button collapsed d-flex flex-row justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#flush-forminven" aria-expanded="false"
                                        aria-controls="flush-forminven">
                                        <span>Form Inventaris</span>
                                    </a>
                                </h2>
                                <div id="flush-forminven" class="accordion-collapse collapse" data-bs-parent="#accor_barangmasukkeluar">
                                    <div class="accordion-body bg-dark bg-gradient p-0">
                                        <div class="d-flex flex-column">
                                            <a class="bg-success bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_baru">
                                                Tambah Barang Baru
                                            </a>
                                            <a class="bg-primary bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_jumlah">
                                                Tambah Barang sudah ada
                                            </a>
                                            <a class="bg-danger bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#kurangi_barang">
                                                Pengurangan Barang
                                            </a>
                                            <a class="bg-warning bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_bangunan">
                                                Tambah Bangunan
                                            </a>
                                            <a class="bg-info bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_lokasiutama">
                                                Tambah Lokasi Utama
                                            </a>
                                            <a class="bg-success bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_lokasisekunder">
                                                Tambah Lokasi Sekunder
                                            </a>
                                            <a class="bg-primary bg-gradient sub-menu text-white"
                                                data-bs-toggle="modal" data-bs-target="#tambah_akun">
                                                Tambah Akun
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?list-data=list-data.php">
                            <span>Barang Gereja</span>
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?bangunan=bangunan.php">
                            <span>Bangunan</span>
                            <i class="fa-solid fa-church"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?lokasi-utama=lokasi-utama.php">
                            <span>Lokasi Utama</span>
                            <i class="fa-solid fa-building-flag"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?lokasi-sekunder=lokasi-sekunder.php">
                            <span>Lokasi Sekunder</span>
                            <i class="fa-solid fa-building-flag"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?akun=akun.php">
                            <span>Akun</span>
                            <i class="fa-solid fa-users"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?aktivitas=aktivitas.php">
                            <span>Aktivitas</span>
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?laporan=laporan.php">
                            <span>Laporan</span>
                            <i class="fa-solid fa-clipboard-list"></i>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row justify-content-between align-items-center"
                            href="index.php?tentang=tentang.php">
                            <span>Tentang</span>
                            <i class="fa-solid fa-users-rectangle"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- OFFCANVAS MENU -->

        <div class="d-flex container-fluid p-0">
            <!-- SIDEBAR -->
            <div class="container-fluid p-0 overflow-auto bg-dark text-light" id="sidebar-dash">
                <div class="d-flex flex-row align-items-center p-2">
                    <?php
                        $nm_akun = $_SESSION['username'];
                        $query = "select * from akun where username = '$nm_akun'";
                        $sql = mysqli_query($connect, $query);
                        $view_akun = mysqli_fetch_assoc($sql);
                        
                        $akn = $view_akun['nama_akun'];
                    ?>
                    <img src="../favicon/it.png" class="w-25" alt="image">
                    <div class="d-flex flex-column ms-2">
                        <span><?php echo $akn; ?></span>
                        <span class="badge p-0">
                            <i class="fa-solid fa-circle text-success"></i>
                            Online
                        </span>
                    </div>
                </div>
                <div class="d-flex p-2 bg-secondary text-light">
                    MENU NAVIGASI
                </div>
                <ul class="sidebar-menu d-flex flex-column">
                    <li class="">
                        <a class="d-flex flex-row align-items-center"
                            href="index.php">
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?list-data=list-data.php">
                            Data Master Barang
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?detail_baru=detail_baru.php">
                            Data Barang Gereja Baru
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?detail_tambah=detail_tambah.php">
                            Data Penambahan Jumlah Barang
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?detail_kurang=detail_kurang.php">
                            Data Pengurangan Jumlah Barang
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?bangunan=bangunan.php">
                            <span>Bangunan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?lokasi-utama=lokasi-utama.php">
                            <span>Lokasi Utama</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?lokasi-sekunder=lokasi-sekunder.php">
                            <span>Lokasi Sekunder</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?akun=akun.php">
                            <span>Akun</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?aktivitas=aktivitas.php">
                            <span>Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?laporan=laporan.php">
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-row align-items-center"
                            href="index.php?tentang=tentang.php">
                            <span>Tentang</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SIDEBAR -->
            <!-- CONTENT -->
            <div class="container-fluid p-0" id="content-dash">
                <!-- NAVBAR -->
                <nav class="navbar sticky-top bg-primary text-light p-2">
                    <div class="col-6 d-flex flex-row justify-content-start align-items-center">
                        <button class="btn btn-primary d-xl-none me-2" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                            <i class="fa-solid fa-list me-1"></i>
                            <span>Menu</span>
                        </button>
                        <span class="d-none d-md-block">
                            Hari/Tanggal : <?php echo strftime("%A, %d %B %Y"); ?>
                        </span>
                    </div>
                    <div class="col-6 d-flex flex-row justify-content-end">
                        <form action="../inc/process.php" method="POST">
                            <button class="btn btn-danger" name="form_process" value="logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>
                <!-- NAVBAR -->
                <div class="container-fluid py-3">
                    <div class="d-flex flex-row justify-content-between align-items-center
                        border-bottom border-primary border-2 mb-2">
                        <?php
                            if(isset($_GET['list-data'])){
                                echo "
                                    <div>
                                        <h3>
                                            Barang<span class='fs-6'>Inventaris</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Data Master Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['bangunan'])){
                                echo "
                                    <div>
                                        <h3>
                                            Bangunan<span class='fs-6'>Gereja</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Bangunan</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_bangunan'])){
                                $id_bgn = $_GET['detail_bangunan'];

                                $query = "select * from bangunan where id_bangunan = '$id_bgn'";
                                $sql = mysqli_query($connect, $query);
                                $get_data = mysqli_fetch_assoc($sql);
                                
                                $nm_bgn = $get_data['nama_bangunan'];

                                echo "
                                    <div>
                                        <h3>
                                            $nm_bgn<span class='fs-6'>Bangunan</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark'
                                                        href='index.php?bangunan=bangunan.php'>
                                                        Bangunan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>$nm_bgn</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['lokasi-utama'])){
                                echo "
                                    <div>
                                        <h3>
                                            Lokasi<span class='fs-6'>Utama</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Lokasi Utama</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_lokasi_utama'])){
                                $id_loc = $_GET['detail_lokasi_utama'];

                                $query = "select * from lokasi_utama where id_lokasi = '$id_loc'";
                                $sql = mysqli_query($connect, $query);
                                $get_data = mysqli_fetch_assoc($sql);
                                
                                $nm_loc = $get_data['nama_lokasi_utama'];

                                echo "
                                    <div>
                                        <h3>
                                            $nm_loc<span class='fs-6'>Lokasi Utama</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?lokasi-utama=lokasi-utama.php'>
                                                        Lokasi Utama
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>$nm_loc</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['lokasi-sekunder'])){
                                echo "
                                    <div>
                                        <h3>
                                            Lokasi<span class='fs-6'>Sekunder</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Lokasi Sekunder</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_lokasi_sekunder'])){
                                $id_los = $_GET['detail_lokasi_sekunder'];

                                $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
                                $sql = mysqli_query($connect, $query);
                                $get_data = mysqli_fetch_assoc($sql);
                                
                                $nm_los = $get_data['nama_lokasi_sekunder'];

                                echo "
                                    <div>
                                        <h3>
                                            $nm_los<span class='fs-6'>Lokasi Sekunder</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?lokasi-sekunder=lokasi-sekunder.php'>
                                                        Lokasi Sekunder
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>$nm_los</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['akun'])){
                                echo "
                                    <div>
                                        <h3>
                                            Akun<span class='fs-6'>Inventaris</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Akun</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_baru'])){
                                echo "
                                    <div>
                                        <h3>
                                            Barang<span class='fs-6'>Baru</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Data Barang Gereja Baru</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_tambah'])){
                                echo "
                                    <div>
                                        <h3>
                                            Penambahan<span class='fs-6'>Barang</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Data Penambahan Jumlah Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detail_kurang'])){
                                echo "
                                    <div>
                                        <h3>
                                            Pengurangan<span class='fs-6'>Barang</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Data Pengurangan Jumlah Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['ubah_barang'])){
                                echo "
                                    <div>
                                        <h3>
                                            Edit<span class='fs-6'>Barang</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?list-data=list-data.php'>
                                                        Data Master Barang
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Edit Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['ubah_bangunan'])){
                                echo "
                                    <div>
                                        <h3>
                                            Edit<span class='fs-6'>Bangunan</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?bangunan=bangunan.php'>
                                                        Bangunan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Edit Bangunan</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['ubah_lokasiutama'])){
                                echo "
                                    <div>
                                        <h3>
                                            Edit<span class='fs-6'>Lokasi</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?lokasi-utama=lokasi-utama.php'>
                                                        Lokasi Utama
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Edit Lokasi</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['ubah_lokasisekunder'])){
                                echo "
                                    <div>
                                        <h3>
                                            Edit<span class='fs-6'>Lokasi</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?lokasi-sekunder=lokasi-sekunder.php'>
                                                        Lokasi Sekunder
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Edit Lokasi</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['tambahjumlah_barang'])){
                                echo "
                                    <div>
                                        <h3>
                                            Tambah Jumlah<span class='fs-6'>Barang</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?list-data=list-data.php'>
                                                        Data Master Barang
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Tambah Jumlah Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['kurangjumlah_barang'])){
                                echo "
                                    <div>
                                        <h3>
                                            Kurangi Jumlah<span class='fs-6'>Barang</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?list-data=list-data.php'>
                                                        Data Master Barang
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Kurangi Jumlah Barang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['aktivitas'])){
                                echo "
                                    <div>
                                        <h3>
                                            Lacak<span class='fs-6'>Aktivitas</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Aktivitas</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['laporan'])){
                                echo "
                                    <div>
                                        <h3>
                                            Laporan<span class='fs-6'>Inventaris</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Laporan</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['laporan_bangunan'])){
                                echo "
                                    <div>
                                        <h3>
                                            Laporan<span class='fs-6'>Bangunan</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Laporan Bangunan</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detaillaporan_bangunan'])){
                                $id_bgn = $_GET['detaillaporan_bangunan'];

                                $query = "select * from bangunan where id_bangunan = '$id_bgn'";
                                $sql = mysqli_query($connect, $query);
                                $get_data = mysqli_fetch_assoc($sql);
                                
                                $nm_bgn = $get_data['nama_bangunan'];
                                echo "
                                    <div>
                                        <h3>
                                            Detail Data<span class='fs-6'>$nm_bgn</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan_bangunan=laporan_bangunan.php'>
                                                        Laporan Bangunan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Detail Data</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['laporan_lokasiutama'])){
                                echo "
                                    <div>
                                        <h3>
                                            Laporan<span class='fs-6'>Lokasi Utama</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Laporan Lokasi Utama</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detaillaporan_lokasiutama'])){
                                $id_loc = $_GET['detaillaporan_lokasiutama'];

                                $query = "select * from lokasi_utama where id_lokasi = '$id_loc'";
                                $sql = mysqli_query($connect, $query);
                                $get_data = mysqli_fetch_assoc($sql);
                                
                                $nm_loc = $get_data['nama_lokasi_utama'];
                                echo "
                                    <div>
                                        <h3>
                                            Detail Data<span class='fs-6'>$nm_loc</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan_lokasiutama=laporan_lokasiutama.php'>
                                                        Laporan Lokasi Utama
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Detail Data</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['laporan_lokasisekunder'])){
                                echo "
                                    <div>
                                        <h3>
                                            Laporan<span class='fs-6'>Lokasi Sekunder</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Laporan Lokasi Sekunder</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['detaillaporan_lokasisekunder'])){
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

                                echo "
                                    <div>
                                        <h3>
                                            Detail Data<span class='fs-6'>$nm_los</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan=laporan.php'>
                                                        Laporan
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='index.php?laporan_lokasisekunder=laporan_lokasisekunder.php'>
                                                        Laporan Lokasi Sekunder
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Detail Data</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            elseif(isset($_GET['tentang'])){
                                echo "
                                    <div>
                                        <h3>
                                            Tentang<span class='fs-6'>Aplikasi</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                                <li class='breadcrumb-item active' aria-current='page'>Tentang</li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                            else{
                                echo "
                                    <div>
                                        <h3>
                                            Dashboard<span class='fs-6'>Control Panel</span>
                                        </h3>
                                    </div>
                                    <div>
                                        <nav aria-label='breadcrumb'>
                                            <ol class='breadcrumb m-0'>
                                                <li class='breadcrumb-item'>
                                                    <a class='text-decoration-none text-dark' href='/inventaris_gerejablimbing/dashboard/'>
                                                        <i class='fa-solid fa-igloo'></i>
                                                        <span>Beranda</span>
                                                    </a>
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                    <?php
                        if(isset($_GET['list-data'])){
                            require_once "list-data.php";
                        }
                        elseif(isset($_GET['bangunan'])){
                            require_once "bangunan.php";
                        }
                        elseif(isset($_GET['detail_bangunan'])){
                            require_once "detail_bangunan.php";
                        }
                        elseif(isset($_GET['lokasi-utama'])){
                            require_once "lokasi-utama.php";
                        }
                        elseif(isset($_GET['detail_lokasi_utama'])){
                            require_once "detail_lokasi_utama.php";
                        }
                        elseif(isset($_GET['lokasi-sekunder'])){
                            require_once "lokasi-sekunder.php";
                        }
                        elseif(isset($_GET['detail_lokasi_sekunder'])){
                            require_once "detail_lokasi_sekunder.php";
                        }
                        elseif(isset($_GET['akun'])){
                            require_once "akun.php";
                        }
                        elseif(isset($_GET['detail_baru'])){
                            require_once "detail_baru.php";
                        }
                        elseif(isset($_GET['detail_tambah'])){
                            require_once "detail_tambah.php";
                        }
                        elseif(isset($_GET['detail_kurang'])){
                            require_once "detail_kurang.php";
                        }
                        elseif(isset($_GET['ubah_barang'])){
                            require_once "form/form_editbarang.php";
                        }
                        elseif(isset($_GET['ubah_bangunan'])){
                            require_once "form/form_editbangunan.php";
                        }
                        elseif(isset($_GET['ubah_lokasiutama'])){
                            require_once "form/form_editloc.php";
                        }
                        elseif(isset($_GET['ubah_lokasisekunder'])){
                            require_once "form/form_editlos.php";
                        }
                        elseif(isset($_GET['tambahjumlah_barang'])){
                            require_once "form/form_tambahjumlah.php";
                        }
                        elseif(isset($_GET['kurangjumlah_barang'])){
                            require_once "form/form_kurangjumlah.php";
                        }
                        elseif(isset($_GET['aktivitas'])){
                            require_once "aktivitas.php";
                        }
                        elseif(isset($_GET['laporan'])){
                            require_once "laporan.php";
                        }
                        elseif(isset($_GET['laporan_bangunan'])){
                            require_once "laporan_bangunan.php";
                        }
                        elseif(isset($_GET['detaillaporan_bangunan'])){
                            require_once "detaillaporan_bangunan.php";
                        }
                        elseif(isset($_GET['laporan_lokasiutama'])){
                            require_once "laporan_lokasiutama.php";
                        }
                        elseif(isset($_GET['detaillaporan_lokasiutama'])){
                            require_once "detaillaporan_lokasiutama.php";
                        }
                        elseif(isset($_GET['laporan_lokasisekunder'])){
                            require_once "laporan_lokasisekunder.php";
                        }
                        elseif(isset($_GET['detaillaporan_lokasisekunder'])){
                            require_once "detaillaporan_lokasisekunder.php";
                        }
                        elseif(isset($_GET['tentang'])){
                            require_once "tentang.php";
                        }
                        else{
                            require_once "main-menu.php";
                        }
                    ?>
                </div>
            </div>
            <!-- CONTENT -->
        </div>
        <!-- JavaScript -->
        <script src="../assets/script.js" type="text/javascript"></script>
        <!-- JavaScript -->
    </body>
</html>