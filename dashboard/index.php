<?php
    include "../inc/connect.php";
    date_default_timezone_set('Asia/Jakarta');
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

        <!-- SWIPER - CAROUSEL JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- SWIPER - CAROUSEL JS -->

        <!-- DATATABLES -->
        <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.2/datatables.min.css" rel="stylesheet">
        <!-- DATATABLES -->

        <link rel="stylesheet" href="../assets/style.css">
        <title>
            <?php
                if(isset($_GET['list-data'])){
                    echo "Data Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['bangunan'])){
                    echo "Data Bangunan - Inventaris Gereja";
                }
                elseif(isset($_GET['lokasi-utama'])){
                    echo "Data Lokasi Utama - Inventaris Gereja";
                }
                elseif(isset($_GET['lokasi-sekunder'])){
                    echo "Data Lokasi Sekunder - Inventaris Gereja";
                }
                elseif(isset($_GET['akun'])){
                    echo "Data Akun - Inventaris Gereja";
                }
                elseif(isset($_GET['aktivitas'])){
                    echo "Track Aktivitas - Inventaris Gereja";
                }
                elseif(isset($_GET['laporan'])){
                    echo "Laporan - Inventaris Gereja";
                }
                else{
                    echo "Dashboard - Inventaris Gereja";
                }
            ?>
        </title>
    </head>
    <body onload='startTime()'>
        <section class="dashboard-sidebar">
            <div class="sidebar-logo">
                <img src="../img/logo-paroki-new.webp" alt="image">
            </div>
            <nav class="sidebar-menu-nav">
                <ul>
                    <li>
                        <a href="index.php">
                            <i class="fa-solid fa-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?list-data=list-data.php">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span>Barang Gereja</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?bangunan=bangunan.php">
                            <i class="fa-solid fa-building"></i>
                            <span>Bangunan</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?lokasi-utama=lokasi-utama.php">
                            <i class="fa-solid fa-warehouse"></i>
                            <span>Lokasi Utama</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?lokasi-sekunder=lokasi-sekunder">
                            <i class="fa-solid fa-warehouse"></i>
                            <span>Lokasi Sekunder</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?akun=akun.php">
                            <i class="fa-solid fa-users"></i>
                            <span>Akun</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?aktivitas=aktivitas.php">
                            <i class="fa-solid fa-eye"></i>
                            <span>Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?laporan=laporan.php">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="dashboard-content">
            <div class="content-header">
                <?php
                    if(isset($_GET['list-data'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Data Barang - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Barang Baru</span>
                                </a>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Barang yang sudah ada</span>
                                </a>
                            </div>
                        ";
                    }
                    elseif(isset($_GET['bangunan'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Data Bangunan - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Bangunan Baru</span>
                                </a>
                            </div>
                        ";
                    }
                    elseif(isset($_GET['lokasi-utama'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Data Lokasi Utama - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Lokasi Utama Baru</span>
                                </a>
                            </div>
                        ";
                    }
                    elseif(isset($_GET['lokasi-sekunder'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Data Lokasi Sekunder - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Lokasi Sekunder Baru</span>
                                </a>
                            </div>
                        ";
                    }
                    elseif(isset($_GET['akun'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Data Akun - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-primary'>
                                    <i class='fa-solid fa-circle-plus'></i>
                                    <span>Tambah Akun Baru</span>
                                </a>
                            </div>
                        ";
                    }
                    elseif(isset($_GET['aktivitas'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Track Aktivitas - Inventaris Gereja</h2>
                            </div>
                            <div id='txt'></div>
                        ";
                    }
                    elseif(isset($_GET['laporan'])){
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-table-list'></i>
                                <h2>Laporan - Inventaris Gereja</h2>
                            </div>
                            <div class='button-group'>
                                <a href='' class='btn btn-small btn-success'>
                                    <i class='fa-solid fa-print'></i>
                                    <span>Cetak Laporan</span>
                                </a>
                            </div>
                        ";
                    }
                    else{
                        echo "
                            <div class='heading'>
                                <i class='fa-solid fa-chart-line'></i>
                                <h2>Dashboard - Inventaris Gereja</h2>
                            </div>
                            <div id='txt'></div>
                        ";
                    }
                ?>
            </div>
            <div class="main-content">
                <?php
                    if(isset($_GET['list-data'])){
                        require_once "list-data.php";
                    }
                    elseif(isset($_GET['bangunan'])){
                        require_once "bangunan.php";
                    }
                    elseif(isset($_GET['lokasi-utama'])){
                        require_once "lokasi-utama.php";
                    }
                    elseif(isset($_GET['lokasi-sekunder'])){
                        require_once "lokasi-sekunder.php";
                    }
                    elseif(isset($_GET['akun'])){
                        require_once "akun.php";
                    }
                    elseif(isset($_GET['aktivitas'])){
                        require_once "aktivitas.php";
                    }
                    elseif(isset($_GET['laporan'])){
                        require_once "laporan.php";
                    }
                    else{
                        require_once "main-menu.php";
                    }
                ?>
            </div>
        </section>
        <?php
            mysqli_close($connect);
        ?>
    </body>
    <!-- DATATABLES JS -->
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.2/datatables.min.js"></script>
    <!-- DATATABLES JS -->

    <!-- SWIPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- SWIPER JS -->

    <!-- JavaScript -->
    <script src="../assets/script.js"></script>
    <!-- JavaScript -->
</html>