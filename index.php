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

        <link rel="stylesheet" href="assets/style.css">
        <title>Inventaris Gereja</title>
    </head>
    <body>
        <section class="landing-header">
            <div class="header-logo">
                <img src="img/logo-paroki-new.webp" alt="image">
                <div class="header-logo-caption">
                    <h2>Gereja Katolik Paroki St. Albertus de Trapani</h2>
                    <a href="https://parokiblimbing.org/" target="_blank">
                        parokiblimbing.org
                    </a>
                </div>
            </div>
            <nav class="header-menu-nav">
                <ul>
                    <li>
                        <a href="index.php">
                            <i class="fa-solid fa-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?katalog=katalog.php">
                            <i class="fa-regular fa-folder-open"></i>
                            <span>Katalog Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?tentang=tentang.php">
                            <i class="fa-solid fa-people-group"></i>
                            <span>Tentang</span>
                        </a>
                    </li>
                    <li>
                        <a href="login.php">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>Login</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="landing-content">
            <div class="landing-content-heading">
                <?php
                    if(isset($_GET['katalog'])){
                        echo "<h2>Katalog Barang - Inventaris Gereja</h2>";
                    }
                    elseif(isset($_GET['tentang'])){
                        echo "<h2>Tentang - Inventaris Gereja</h2>";
                    }
                    else{
                        echo "<h2>Beranda - Inventaris Gereja</h2>";
                    }
                ?>
            </div>
            <div class="landing-content-body">
                <?php
                    if(isset($_GET['katalog'])){
                        require_once "katalog.php";
                    }
                    elseif(isset($_GET['tentang'])){
                        require_once "tentang.php";
                    }
                    else{
                        require_once "home.php";
                    }
                ?>
            </div>
        </section>
    </body>
    <?php
        mysqli_close($connect);
    ?>
    <!-- DATATABLES JS -->
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.2/datatables.min.js"></script>
    <!-- DATATABLES JS -->

    <!-- SWIPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- SWIPER JS -->

    <!-- JavaScript -->
    <script src="assets/script.js"></script>
    <!-- JavaScript -->
</html>