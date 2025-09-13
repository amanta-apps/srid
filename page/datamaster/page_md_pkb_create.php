<?php
$norevisi = Getkode('norevisi', 'table_datapkb');
$name = $link = $description = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $norevisi = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datapkb WHERE norevisi='$norevisi'"));
    $name = $r['descriptions'];
    $link = $r['link'];
    $description = $r['text_descriptions'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
    // $changedon = $r['changedon'];
    // $changedby = $r['changedby'];
} ?>
<div class="container">
    <h3 class="fw-bold">PKB - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="namemdpkb" class="col-sm-3">No Revisi</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="norevisimdpkb" value="<?= $norevisi ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="namemdpkb" class="col-sm-3">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="namemdpkb" value="<?= $name ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="linkmdpkb" class="col-sm-3">Link</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="linkmdpkb" value="<?= $link ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdpkb" class="col-sm-3">Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdpkb" class="form-control form-control-sm" rows="5"><?= $description ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdpkb()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdpkb" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdpkb" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdpkb" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdpkb" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>