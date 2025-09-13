<?php
if (isset($_SESSION['pernr'])) {
    header('Location: /page/mainpage?p=ZGFzaGJvYXJk');
}
?>
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
    <link rel="icon" type="image/x-icon" href="assets/sido.ico" />
    <script data-search-pseudo-elements defer src="assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/feather.min.js" crossorigin="anonymous"></script>
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg rounded-3 mt-5">
                                <div class="card-header justify-content-center pt-2 p-3">
                                    <h3 class="text-center fs-1 fw-bold"><img src="assets/img/sm.png" width="100%" alt="Logo Project"></h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-1">
                                            <!-- <label class="small mb-1" for="inputEmailAddress">Email</label> -->
                                            <input class="form-control form-control-sm" id="useriddatalogin" type="email" placeholder="Enter email address" value="90003560" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="input-group mb-2">
                                            <!-- <label class="small mb-1" for="inputPassword">Password</label> -->
                                            <input class="form-control form-control-sm" id="passwordiddatalogin" type="password" placeholder="Enter password" value="123" />
                                            <span class="input-group-text small p-0 justify-content-center" style="width: 15%; background-color: lightslategrey;"><img src="assets/icon/eye15.png" class="show-pass"></span>
                                        </div>

                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <!-- <a class="small text-decoration-none" href="#"><i data-feather="lock"></i>Lupa kata sandi</a> -->
                                            <a class="btn btn-dark fw-bold btn-sm w-100 zoom-out" href="javascript:void(0)" onclick="login()"><img src="assets/icon/login15.png">&nbsp;Masuk</a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-0">
                                            <a class="fs-7 lupa-sandi" href="#"><img src="assets/icon/lock15.png">&nbsp;Lupa kata sandi</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <p class=" opacity-75 fw-bold fs-7 text-center pt-3">Since 2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small"><img src="assets/img/logo-sidomuncul-white.png" style="width: 100px;" alt=""></div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Social Relation Information Dashboard (SRID)</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/sweet/sweet.all.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="function/myjavascript.js"></script>
</body>

</html>