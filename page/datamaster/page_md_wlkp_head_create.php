<?php
$wlkpid = Getkode('wlkpid ', 'table_datawlkp_h');
$wlkpdescriptions = $wlkpheader = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $wlkpid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT wlkpdescriptions,
                                                        wlkpheader,
                                                        createdon,
                                                        createdby
                                                        FROM table_datawlkp_h WHERE wlkpid='$wlkpid'"));
    $wlkpdescriptions = $r['wlkpdescriptions'];
    $wlkpheader = $r['wlkpheader'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Create WLKP - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="wlkpidmdwlkp" class="col-sm-3">Wlkp ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="wlkpidmdwlkp" value="<?= $wlkpid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="headermdwlkp" class="col-sm-3">WLKP Header</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="headermdwlkp" value="<?= $wlkpheader ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="descriptionsmdwlkp" class="col-sm-3">Long Descriptions</label>
                <div class="col-sm-8">
                    <textarea id="descriptionsmdwlkp" class="form-control form-control-sm" rows="5"><?= $wlkpdescriptions ?></textarea>
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
                        <label for="createdonmdcocevent" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdcocevent" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdcocevent" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdcocevent" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="" class="col-sm-2"></label>
        <div class="col-sm-2">
            <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdwlkp()"><img src="../assets/icon/save.png"> Submit</button>
        </div>
    </div>
</div>