<?php
$sidoid = Getkode('sidoid', 'table_datasido_h');
$sidodescriptions = $sidoheader = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $sidoid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasido_h WHERE sidoid='$sidoid'"));
    $sidodescriptions = $r['sidodescriptions'];
    $sidoheader = $r['sidoheader'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Sido Bungah - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="sidomdsido" class="col-sm-3">Sido Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="sidomdsido" value="<?= $sidoid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headmdsido" class="col-sm-3">Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headmdsido" value="<?= $sidoheader ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdsido" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdsido" class="form-control form-control-sm" rows="5"><?= $sidodescriptions ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdsido()"><img src="../assets/icon/save.png"> Submit</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    System
                </div>
                <div class="card-body">
                    <div class="form-group row mb-1">
                        <label for="createdonmdsido" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdsido" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdsido" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdsido" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>