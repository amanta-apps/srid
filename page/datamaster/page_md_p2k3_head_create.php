<?php
$p2k3id = Getkode('p2k3id', 'table_datap2k3_h');
$name = $link = $description = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $p2k3id = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datap2k3_h WHERE p2k3id='$p2k3id'"));
    $p2k3descriptions = $r['p2k3descriptions'];
    $p2k3header = $r['p2k3header'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">P2K3 - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="p2k3idmdp2k3" class="col-sm-3">P2K3 Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="p2k3idmdp2k3" value="<?= $p2k3id ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headmdp2k3" class="col-sm-3">Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headmdp2k3" value="<?= $p2k3header ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdp2k3" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdp2k3" class="form-control form-control-sm" rows="5"><?= $p2k3descriptions ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdp2k3()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdp2k3" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdp2k3" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdp2k3" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdp2k3" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>