<?php
    include "../inc/connect.php";
    include "../inc/function.php";

    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    session_start();
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

        <!-- BOOTSTRAP CSS & JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- BOOTSTRAP CSS & JS -->
        
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

        <!-- DATATABLES CSS & JS-->
        <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.2/datatables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.2/datatables.min.js"></script>
        <!-- DATATABLES CSS & JS -->

        <!-- SWIPER CSS & JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- SWIPER CSS & JS -->

        <!-- SWEETALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- SWEETALERT JS -->

        <!-- CHART JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- CHART JS -->

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
        <style>
            body{
                background: none;
                background-color: #f7ecd3;
            }
        </style>
    </head>
    <body>
        <?php include "../inc/modal_tambahbaru.php"; ?>
        <?php include "../inc/modal_tambahjumlah.php"; ?>
        <?php include "../inc/modal_kurangibarang.php"; ?>
        <!-- OFFCANVAS MENU -->
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                  I will not close if you click outside of me.
                </div>
            </div>
        </div>
        <!-- OFFCANVAS MENU -->

        <div class="d-flex container-fluid p-0">
            <!-- SIDEBAR -->
            <div class="container-fluid p-0 overflow-auto" id="sidebar-dash">
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/logo-paroki-new.webp" class="sidebar-img mb-1 mt-1" alt="image">
                    <span class="fs-6">
                        parokiblimbing.org
                    </span>
                </div>
                <ul class="sidebar-menu d-flex flex-column mt-3">
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
                        <div class="accordion accordion-flush" id="accor_bangunan">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a class="accordion-button collapsed d-flex flex-row justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#flush-bangunan" aria-expanded="false"
                                        aria-controls="flush-bangunan">
                                        <span>Bangunan</span>
                                    </a>
                                </h2>
                                <div id="flush-bangunan" class="accordion-collapse collapse" data-bs-parent="#accor_bangunan">
                                    <div class="accordion-body bg-dark bg-gradient p-0">
                                        <div class="d-flex flex-column">
                                            <?php
                                                $tampil_bangunan = "select * from bangunan";
                                                $tampil_bangunan_query = mysqli_query($connect,$tampil_bangunan);
                                                while($tampil_bangunan_hasil = mysqli_fetch_assoc($tampil_bangunan_query))
                                                {
                                                    $id = $tampil_bangunan_hasil['id_bangunan'];
                                                    $nm = $tampil_bangunan_hasil['nama_bangunan'];
                                            ?>
                                                <a class="sub-menu text-white" href="">
                                                    <?php echo $nm; ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="accordion accordion-flush" id="accor_lokasiutama">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a class="accordion-button collapsed d-flex flex-row justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#flush-lokasiutama" aria-expanded="false"
                                        aria-controls="flush-lokasiutama">
                                        <span>Lokasi Utama</span>
                                    </a>
                                </h2>
                                <div id="flush-lokasiutama" class="accordion-collapse collapse" data-bs-parent="#accor_lokasiutama">
                                    <div class="accordion-body bg-dark bg-gradient p-0">
                                        <div class="d-flex flex-column">
                                            <?php
                                                $tampil_lokasi_utama = "select * from lokasi_utama";
                                                $tampil_lokasi_utama_query = mysqli_query($connect,$tampil_lokasi_utama);
                                                while($tampil_lokasi_utama_hasil = mysqli_fetch_assoc($tampil_lokasi_utama_query))
                                                {
                                                    $id = $tampil_lokasi_utama_hasil['id_lokasi'];
                                                    $nm = $tampil_lokasi_utama_hasil['nama_lokasi_utama'];
                                            ?>
                                                <a class="sub-menu text-white" href="">
                                                    <?php echo $nm; ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="accordion accordion-flush" id="accor_lokasisekunder">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a class="accordion-button collapsed d-flex flex-row justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#flush-lokasisekunder" aria-expanded="false"
                                        aria-controls="flush-lokasisekunder">
                                        <span>Lokasi Sekunder</span>
                                    </a>
                                </h2>
                                <div id="flush-lokasisekunder" class="accordion-collapse collapse" data-bs-parent="#accor_lokasisekunder">
                                    <div class="accordion-body bg-dark bg-gradient p-0">
                                        <div class="d-flex flex-column">
                                            <?php
                                                $tampil_lokasi_sekunder = "select * from lokasi_sekunder";
                                                $tampil_lokasi_sekunder_query = mysqli_query($connect,$tampil_lokasi_sekunder);
                                                while($tampil_lokasi_sekunder_hasil = mysqli_fetch_assoc($tampil_lokasi_sekunder_query))
                                                {
                                                    $id = $tampil_lokasi_sekunder_hasil['id_lokasi_sekunder'];
                                                    $nm = $tampil_lokasi_sekunder_hasil['nama_lokasi_sekunder'];
                                            ?>
                                                <a class="sub-menu text-white" href="">
                                                    <?php echo $nm; ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                </ul>
            </div>
            <!-- SIDEBAR -->
            <!-- CONTENT -->
            <div class="container-fluid p-0" id="content-dash">
                <!-- NAVBAR -->
                <nav class="navbar sticky-top" style="background-color: #fff;">
                    <div class="col-6 d-flex flex-row justify-content-start align-items-center">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                            <i class="fa-solid fa-list me-1"></i>
                            <span>Menu</span>
                        </button>
                        <span>
                            Hari/Tanggal : <?php echo strftime("%A, %d %B %Y"); ?>
                        </span>
                    </div>
                    <div class="col-6 d-flex flex-row justify-content-end">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn text-dark dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                admin
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Action two</a></li>
                                <li><a class="dropdown-item" href="#">Action three</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- NAVBAR -->
                <div class="container-fluid mt-3">
                    <div class="d-flex flex-row align-items-center mb-3">
                        <i class="fa-solid fa-house text-bg-warning
                        bg-gradient shadow rounded-2 p-2 me-2"></i>
                        <span class="fs-5">
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
                                elseif(isset($_GET['form-akun'])){
                                    echo "Form Akun - Inventaris Gereja";
                                }
                                elseif(isset($_GET['form-bangunan'])){
                                    echo "Form Bangunan - Inventaris Gereja";
                                }
                                elseif(isset($_GET['form-barang-gereja'])){
                                    echo "Form Barang Gereja - Inventaris Gereja";
                                }
                                elseif(isset($_GET['form-lokasi-sekunder'])){
                                    echo "Form Lokasi Sekunder - Inventaris Gereja";
                                }
                                elseif(isset($_GET['form-lokasi-utama'])){
                                    echo "Form Lokasi Utama - Inventaris Gereja";
                                }
                                else{
                                    echo "Dashboard - Inventaris Gereja";
                                }
                            ?>
                        </span>
                    </div>
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
                        elseif(isset($_GET['form-akun'])){
                            require_once "form/form-akun.php";
                        }
                        elseif(isset($_GET['form-barang-gereja-sudah-ada'])){
                            require_once "form/form-barang-gereja-sudah-ada.php";
                        }
                        elseif(isset($_GET['form-barang-gereja'])){
                            require_once "form/form-barang-gereja.php";
                        }
                        elseif(isset($_GET['form-bangunan'])){
                            require_once "form/form-bangunan.php";
                        }
                        elseif(isset($_GET['form-lokasi-sekunder'])){
                            require_once "form/form-lokasi-sekunder.php";
                        }
                        elseif(isset($_GET['form-lokasi-utama'])){
                            require_once "form/form-lokasi-utama.php";
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
        <script src="../assets/script.js"></script>
        <!-- JavaScript -->
    </body>
</html>