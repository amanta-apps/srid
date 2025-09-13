<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SRID</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="sido.ico" />
    <script data-search-pseudo-elements defer src="assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/feather.min.js" crossorigin="anonymous"></script>
</head>
<style>
    body {
        margin: 0;
        min-height: 100vh;
        /* minimal setinggi layar */
        display: flex;
        flex-direction: column;
        /* bikin layout kolom */
    }

    main {
        flex: 1;
        /* isi akan dorong footer ke bawah */
        padding: 20px;
    }

    footer {
        background: #000;
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    .section-title {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 20px 0;
    }

    .section-title::before,
    .section-title::after {
        content: "";
        flex: 1;
        border-bottom: 2px solid #8B4513;
        /* warna coklat */
    }

    .section-title:not(:empty)::before {
        margin-right: 1em;
    }

    .section-title:not(:empty)::after {
        margin-left: 1em;
    }

    .section-title span {
        font-size: 20px;
        font-weight: bold;
        color: #8B4513;
        /* warna teks */
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .more-link {
        text-decoration: none;
        font-size: 16px;
        color: #222;
        /* warna teks */
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .more-link:hover {
        color: #8B4513;
        /* ganti warna pas hover */
        margin-left: 5px;
        /* geser dikit biar ada efek */
    }
</style>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" onclick="location.href='?p=<?= base64_encode('dashboard') ?>'"><img src="assets/img/sm.png" width="10%" class="logo-navbar" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="location.href='index?p=<?= base64_encode('dashboard') ?>'">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Industrial Relation
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="location.href='?p=<?= base64_encode('information_pkb') ?>'">Perjanjian Kerja Bersama</a></li>
                            <li><a class="dropdown-item" href="#" onclick="location.href='?p=<?= base64_encode('information_coc') ?>'">Code of Conduct</a></li>
                            <li><a class="dropdown-item" href="#" onclick="location.href='?p=<?= base64_encode('information_wlkp') ?>'">Wajib Lapor Ketenagakerjaan Perusahaan</a></li>
                            <li><a class="dropdown-item" href="#" onclick="location.href='?p=<?= base64_encode('information_pkwt') ?>'">Perjanjian Kerja Waktu Tertentu</a></li>
                            <li><a class="dropdown-item" href="#" onclick="location.href='?p=<?= base64_encode('information_lks') ?>'">Lembaga Kerja Sama</a></li>
                            <li><a class="dropdown-item" href="#">SP</a></li>
                            <li><a class="dropdown-item" href="#">SP Farkes</a></li>
                            <li><a class="dropdown-item" href="#">P2K3</a></li>
                            <li><a class="dropdown-item" href="#">Sido Bungah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrasi Personal
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="#">PKL</a></li>
                            <li><a class="dropdown-item" href="#">Seragam</a></li>
                            <li><a class="dropdown-item" href="#">Surat Menyurat</a></li>
                            <li><a class="dropdown-item" href="#">Parsel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akun
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div class="container"> -->
    <main class="pb-5">
        <?php
        if (!isset($_GET['p'])) {
            include 'internalpage/datapublic/page_dashboard.php';
        } else {
            include 'function/getdata.php';
        }
        ?>
    </main>

    <!-- </div> -->
    <!-- <footer style="margin-top: 10rem;">
        <div class="row p-5 pb-0">
            <div class="col-sm-6">
                <img src="assets/img/logo-sidomuncul-white.png" style="object-fit: cover;" width="100px">
            </div>
            <div class="col-sm-6">
                Copyright © Sidomuncul 2025 - All Right Reserved
            </div>
        </div>
        <center>
            <hr class="w-100">
        </center>
        <div class="row p-5 pt-0">
            <div class="col-sm-6">
                Social Relation Information Dashboard
            </div>
            <div class="col-sm-6">
                <i data-feather="facebook" class="zoom" style="cursor: pointer;"></i>&nbsp;
                <i data-feather="instagram"></i>&nbsp;
                <i data-feather="linkedin"></i>&nbsp;
                <i data-feather="twitter"></i>&nbsp;
                <i data-feather="youtube"></i>&nbsp;
            </div>
        </div>
    </footer> -->
    <footer class="footer-admin mt-auto footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-2 small"><img src="assets/img/logo-sidomuncul-white.png" style="width: 100px;" alt=""></div>
                <div class="col-md-10 text-md-end small">
                    <a href="#!" class="text-decoration-underline">Social Relation Information Dashboard (SRID)</a>
                    &middot;
                    <a href="#!">Terms &amp; Conditions</a><br>
                    <!-- <hr> -->
                    <i data-feather="facebook" class="zoom" style="cursor: pointer;"></i>&nbsp;
                    <i data-feather="instagram" class="zoom" style="cursor: pointer;"></i>&nbsp;
                    <i data-feather="linkedin" class="zoom" style="cursor: pointer;"></i>&nbsp;
                    <i data-feather="twitter" class="zoom" style="cursor: pointer;"></i>&nbsp;
                    <i data-feather="youtube" class="zoom" style="cursor: pointer;"></i>&nbsp;
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/sweet/sweet.all.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="function/myjavascript.js"></script>
</body>

</html>