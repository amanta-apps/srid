<?php
$lksid = Getkode('lksid', 'table_datalks_h');
$name = $link = $description = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $lksid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datalks_h WHERE lksid='$lksid'"));
    $lksdescriptions = $r['lksdescriptions'];
    $lksheader = $r['lksheader'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">LKS - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="lksidmdlks" class="col-sm-3">LKS Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="lksidmdlks" value="<?= $lksid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headmdlks" class="col-sm-3">Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headmdlks" value="<?= $lksheader ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdlks" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdlks" class="form-control form-control-sm" rows="5"><?= $lksdescriptions ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdlks()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdlks" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdlks" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdlks" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdlks" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>