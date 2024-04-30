<?php
    include "inc/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/site.webmanifest">

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
        <!-- SWIPER JS -->

        <link rel="stylesheet" href="assets/style.css">
        <title>
            <?php
                if(isset($_GET['katalog'])){
                    echo "Katalog Barang - Inventaris Gereja";
                }
                elseif(isset($_GET['tentang'])){
                    echo "Tentang - Inventaris Gereja";
                }
                else{
                    echo "Inventaris Gereja";
                }
            ?>
        </title>
    </head>
    <body>
        <!-- HEADER -->
        <div class="sticky-top d-flex flex-column flex-wrap p-0">
            <div class="d-flex flex-row justify-content-evenly align-items-center p-1 text-bg-light">
                <div class="d-flex flex-row align-items-center">
                    <img class="nav-img" src="img/logo-paroki-new.webp" alt="image">
                    <div class="d-flex flex-column ms-2">
                        <span>Gereja Katolik Paroki St. Albertus de Trapani</span>
                        <a class="web-link badge bg-success text-start"
                            href="https://parokiblimbing.org" target="_blank">
                            parokiblimbing.org
                        </a>
                    </div>
                </div>
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fa-solid fa-house me-1"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="index.php?katalog=katalog.php">
                            <i class="fa-regular fa-folder-open me-1"></i>
                            <span>Katalog</span>
                        </a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="index.php?tentang=tentang.php">
                            <i class="fa-solid fa-people-group me-1"></i>
                            <span>Tentang</span>
                        </a>
                    </li>
                    <li class="nav-item ms-4">
                        <button type="button" class="btn btn-primary bg-gradient"
                            data-bs-toggle="modal" data-bs-target="#LoginModal">
                            <i class="fa-solid fa-right-to-bracket me-1"></i>
                            <span>Login</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- HEADER -->

        <!-- CONTENT -->
        <div class="container-fluid d-flex flex-column">
            <?php include "login.php"; ?>
            <?php include "popup_data.php"; ?>
            <?php
                if(isset($_GET['katalog'])){
                    require_once "katalog.php";
                }
                elseif(isset($_GET['tentang'])){
                    require_once "tentang.php";
                }
                elseif(isset($_GET['login'])){
                    require_once "login.php";
                }
                else{
                    require_once "home.php";
                }
            ?>
        </div>
        <!-- CONTENT -->
        <?php
            mysqli_close($connect);
        ?>
    </body>
    <!-- JavaScript -->
    <script src="assets/script.js"></script>
    <!-- JavaScript -->
</html>