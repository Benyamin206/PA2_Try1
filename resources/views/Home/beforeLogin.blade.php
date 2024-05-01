<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Jadwal Tersedia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        #covid-navbar {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
        }
        #navbar-bottom .navbar-brand img {
            max-width: 140px;
        }
        .footer-top, .footer-middel, .footer-buttom {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- navbar covid -->
    <div class="d-flex justify-content-center align-items-center" id="covid-navbar">
        <p class="m-0">
            Cek info terbaru Kapal Tomok Tour
            <a href="https://www.tiket.com/info/tiket-clean">tiket Kapal </a>dan
            <a href="jadwal.html">jadwal Keberangkatan kapal</a>
            Tomok Tour Ajibata.
        </p>
    </div>
    <!-- //navbar covid -->

    <!-- navbar top -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logoe.png" alt="" style="max-width: 140px;">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="booktiket.html">Booking Tiket Anda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promo</a>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-transparent btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/bendera.jpg" alt="" />
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item font-weight-bold" type="button">
                            <img src="assets/img/bendera.jpg" alt="" class="mr-2" />Bahasa Indonesia
                        </button>
                        <button class="dropdown-item" type="button">
                            <img src="assets/img/bendera amerika.png" alt="" class="mr-2" />English
                        </button>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-transparent btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        IDR
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item font-weight-bold" type="button">
                            IDR - Rupiah Indonesia
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- //navbar top -->

    <!-- navbar bottom -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-bottom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logoe.png" alt="" style="max-width: 140px;">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tiket Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Booking Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Informasi kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jadwal.html">Jadwal Keberangkatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
                <div class="navbar-nav d-flex align-items-baseline">
                    <a class="nav-item nav-link font-weight-bold text-dark" href="checkout.html">Cek Order</a>
                    <a class="nav-item nav-link font-weight-bold text-dark mr-3" href="views/login.blade.php">Login</a>
                    <a class="nav-item nav-link font-weight-bold text-dark mr-3" href="Daftar.html">Daftar</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- //navbar bottom -->

    <!-- Footer -->
    <div class="container">
        <!-- footer top -->
        <div class="footer-top d-flex justify-content-center mx-auto p-5 row">
            <div class="footer-content col-md-6">
                <div class="footer-content-items d-flex align-items-center mt-3">
                    <img src="assets/img/message.webp" alt="message" width="50" height="40" />
                    <div class="footer-text">
                        <span class="span-gray d-block ml-3">Whatsapp</span>
                        <span class="ml-3">082276588347</span>
                    </div>
                </div>
                <!-- other footer content-items here -->
            </div>
            <!-- other footer content here -->
        </div>
        <!--//footer top -->

        <!-- footer midle -->
        <div class="footer-middel d-flex justify-content-center align-items-start p-5 row mx-auto">
            <!-- middle footer content here -->
        </div>
        <!-- //footer midle -->

        <!-- footer bottom -->
        <div class="footer-buttom d-flex justify-content-center border-top pt-3">
            <p class="text-center"><img src="img/logoe.png" alt="" width="145"> © 2020-2024 Tomok Tour Trip Ajibata . All Rights Reserved</p>
        </div>
        <!-- //footer bottom -->
    </div>
    <!-- //footer -->

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>