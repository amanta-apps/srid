<?php
include_once '../function/session.php';
include '../function/getvalue.php';
include_once '../function/koneksi.php';
$person = $_SESSION['pernr'];
$project = 'S R I D';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $project ?></title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../assets/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/datatable/bootstrap.min.css">


    <link rel="icon" type="image/x-icon" href="../sido.ico" />
    <script data-search-pseudo-elements defer src="../assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/feather.min.js" crossorigin="anonymous"></script>

    <!-- DataTables core CSS -->
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <!-- Buttons extension CSS -->
    <link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/ckeditor.js"></script>

</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2 text-uppercase" href="javascript:void(0);" onclick="location.href= 'mainpage?p=<?= base64_encode('dashboard') ?>'"><?= $project ?></a>
        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ms-auto">
            <!-- User Dropdown-->
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="../assets/img/sm.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img img-thumbnail" src="../assets/img/sm.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?= $_SESSION['pernr'] ?></div>
                            <div class="dropdown-user-details-email"><?= $_SESSION['email'] ?></div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!" onclick="redirectlink('useraccount')">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="#" onclick="logoutsystem()">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Menu Heading (Account)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <div class="sidenav-menu-heading d-sm-none text-center fw-bold">S R I D <br>
                            <hr> Human Resource
                        </div>
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Menus</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed text-black fw-bold menus-navlink zoom" href="javascript:void(0);" onclick="location.href= 'mainpage?p=<?= base64_encode('dashboard') ?>'" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            HOME
                            <!-- <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <!-- <a class="nav-link" href="dashboard-1.html"></a> -->
                            </nav>
                        </div>
                        <!-- Sidenav Heading (Custom)-->
                        <!-- <div class="sidenav-menu-heading">Master Data</div> -->
                        <!-- Sidenav Accordion (Pages) -->
                        <a class="nav-link collapsed text-black fw-bold menus-navlink zoom" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#datamasteruser" aria-expanded="false" aria-controls="datamasteruser">
                            <div class="nav-link-icon"><i data-feather="hard-drive"></i></div>
                            MASTER DATA
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="datamasteruser" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                                <!-- location.href= 'mainpage?p=<?= base64_encode('md_pkb') ?>' -->

                                <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#IndustrialRelation" aria-expanded="false" aria-controls="IndustrialRelation">
                                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                                    Industrial Relation
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="IndustrialRelation" data-bs-parent="#accordionSidenavPagesMenu">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_pkb_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            PKB
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_coc_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            COC
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_wlkp_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            WLKP
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_pkwt_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            PKWT
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_lks_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            LKS
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_sp_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            SP
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_farkes_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            SP FARKES
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_p2k3_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            P2K3
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('md_sido_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            SIDO Bungah
                                        </a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#AdministrasiPersonal" aria-expanded="false" aria-controls="AdministrasiPersonal">
                                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                                    Adm. Personal
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="AdministrasiPersonal" data-bs-parent="#accordionSidenavPagesMenu">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('adm_notice_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            Pengumuman
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('adm_pkl_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            PKL
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('adm_seragam_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            Seragam
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('adm_surat_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            Surat Menyurat
                                        </a>
                                        <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('adm_parcel_display') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                            <div class="nav-link-icon"><i data-feather="minus"></i></div>
                                            Parsel
                                        </a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link collapsed text-black fw-bold menus-navlink zoom" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dataconfig" aria-expanded="false" aria-controls="dataconfig">
                            <div class="nav-link-icon"><i data-feather="settings"></i></div>
                            CONFIGURASI
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="dataconfig" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                                <a class="nav-link collapsed text-gray-600 menus-navlink zoom" href="#" onclick="location.href= 'mainpage?p=<?= base64_encode('roles') ?>'" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                                    Roles
                                    <!-- <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed text-black fw-bold menus-navlink zoom" href="javascript:void(0);" onclick="location.href= 'mainpage?p=<?= base64_encode('database') ?>'" data-bs-toggle="collapse" data-bs-target="#database" aria-expanded="false" aria-controls="rekapdatauser">
                            <div class="nav-link-icon"><i data-feather="database"></i></div>
                            DATABASE
                            <!-- <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                        </a>
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer justify-content-center">
                    <img src="../assets/img/sm.png" class="img-thumbnail rounded-3 border-2" width="25%">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle fw-bold text-center">&nbsp;<?= $project ?><br>
                            <!-- <p class="opacity-50 fw-normal"> by amanta group</p> -->
                        </div>
                        <!-- <div class="sidenav-footer-title text-center"></div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" class="border-5">
            <main>
                <!-- Main page content-->
                <div class="container mt-5">
                    <?php
                    include '../function/getdata.php';
                    ?>
                </div>
            </main>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/datatable/jquery-3.5.1.js"></script>
    <script src="../assets/datatable/mydatatables.js"></script>
    <script src="../assets/datatable/jquery.dataTables.min.js"></script>
    <script src="../assets/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/sweet/sweet.all.min.js"></script>
    <script src="../function/myjavascript.js"></script>
    <script src="../function/mydatatable.js"></script>

    <!-- jQuery -->
    <script src="../assets/js/jquery-3.7.0.min.js"></script>
    <!-- DataTables core JS -->
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <!-- Buttons extension JS -->
    <script src="../assets/js/dataTables.buttons.min.js"></script>
    <!-- JSZip (untuk Excel export) -->
    <script src="../assets/js/jszip.min.js"></script>
    <!-- PDFMake (untuk PDF export) -->
    <script src="../assets/js/pdfmake.min.js"></script>
    <script src="../assets/js/vfs_fonts.js"></script>
    <!-- Buttons HTML5 export -->
    <script src="../assets/js/buttons.html5.min.js"></script>
    <!-- Buttons print -->
    <script src="../assets/js/buttons.print.min.js"></script>
    <!-- Include Select2 -->
    <link href="../assets/css/select2.min.css" rel="stylesheet" />
    <script src="../assets/js/select2.min.js"></script>

</body>

</html>