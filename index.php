<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    session_start();
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

        <!-- SWEETALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
        <!-- SWEETALERT JS -->

        <link rel="stylesheet" href="assets/style.css">
        <title>Login - Inventaris Gereja</title>
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            require_once "inc/connect.php";
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
            {
        ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Silahkan Logout terlebih dahulu",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'dashboard/';
                    }
                });
            </script>
        <?php
            } else if(isset($_SESSION['invalid-acc'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Username / Password Anda Salah",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "Coba Lagi"
                })
            </script>
        <?php 
            unset($_SESSION['invalid-acc']);
            }
        ?>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center"
            style="height: 100vh;">
            <div class="container w-auto">
                <img src="img/logo-paroki-new.webp" class="login-img mb-2" alt="image">
                <h1 class="fs-4 mb-3 text-light">Login - Inventaris Gereja</h1>
                <form class="needs-validation" method="POST" action="inc/process.php" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-transparent text-light" id="username" name="username" required>
                        <label for="username">Username</label>
                        <div class="valid-feedback">
                            Username telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Username tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control bg-transparent text-light" id="password" name="password" required>
                        <label for="password">Password</label>
                        <div class="valid-feedback">
                            Password telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="login">
                        <i class="fa-solid fa-arrow-right-to-bracket me-1"></i>
                        <span>Login</span>
                    </button>
                </form>
            </div>
        </div>
    </body>
    <!-- JavaScript -->
    <script src="assets/script.js"></script>
    <!-- JavaScript -->
</html>