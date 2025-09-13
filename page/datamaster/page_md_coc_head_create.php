<?php
$norevisi = Getkode('cocid', 'table_datacoc_h');
$cocdescription = $descriptions = $cochead = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $norevisi = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datacoc_h WHERE cocid='$norevisi'"));
    $cocdescription = $r['cocdescriptions'];
    $cochead = $r['cochead'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">COC - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="norevisimdcoc" class="col-sm-3">No Revisi</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="norevisimdcoc" value="<?= $norevisi ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headermdcoc" class="col-sm-3">Header of Text</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headermdcoc" value="<?= $cochead ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdcoc" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdcoc" class="form-control form-control-sm" rows="5"><?= $cocdescription ?></textarea>
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
                        <label for="createdonmdcoc" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdcoc" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdcoc" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdcoc" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="" class="col-sm-2"></label>
        <div class="col-sm-2">
            <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdcoc()"><img src="../assets/icon/save.png"> Submit</button>
        </div>
    </div>
</div>