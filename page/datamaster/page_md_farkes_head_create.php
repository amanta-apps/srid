<?php
$farkesid = Getkode('farkesid', 'table_datafarkes_h');
$name = $link = $description = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $farkesid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datafarkes_h WHERE farkesid='$farkesid'"));
    $farkesdescriptions = $r['farkesdescriptions'];
    $farkesheader = $r['farkesheader'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Farkes - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="farkesidmdfarkes" class="col-sm-3">Farkes Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="farkesidmdfarkes" value="<?= $farkesid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headmdfarkes" class="col-sm-3">Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headmdfarkes" value="<?= $farkesheader ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdfarkes" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdfarkes" class="form-control form-control-sm" rows="5"><?= $farkesdescriptions ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdfarkes()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdfarkes" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdfarkes" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdfarkes" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdfarkes" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>