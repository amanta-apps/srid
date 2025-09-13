<?php
$pkwtid = Getkode('pkwtid ', 'table_datapkwt_h');
$pkwtdescriptions = $pkwtheader = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $pkwtid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT pkwtdescriptions,
                                                        pkwtheader,
                                                        createdon,
                                                        createdby
                                                        FROM table_datapkwt_h WHERE pkwtid='$pkwtid'"));
    $pkwtdescriptions = $r['pkwtdescriptions'];
    $pkwtheader = $r['pkwtheader'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">PKWT - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="pkwtidmdpkwt" class="col-sm-3">PKWT ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="pkwtidmdpkwt" value="<?= $pkwtid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headermdpkwt" class="col-sm-3">WLKP Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headermdpkwt" value="<?= $pkwtheader ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdpkwt" class="col-sm-3">Long Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdpkwt" class="form-control form-control-sm" rows="5"><?= $pkwtdescriptions ?></textarea>
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
                        <label for="createdonmdpkwt" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdpkwt" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdpkwt" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdpkwt" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="" class="col-sm-2"></label>
        <div class="col-sm-2">
            <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdpkwt()"><img src="../assets/icon/save.png"> Submit</button>
        </div>
    </div>
</div>