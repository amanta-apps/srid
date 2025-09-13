<?php $project = base64_decode($_GET['n']); ?>
<div class="container">
    <h6 class="fw-bold fs-4">Roles</h6>
    <hr class="w-50 mb-5">
    <div class="row mb-1">
        <div class="col-sm-8 card p-3">
            <div class="row">
                <label class="col-sm-2 col-form-label">Roles <sup class="text-danger">*</sup></label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="namadepandatauser" value="Zrole_" readonly>
                        <input type="text" class="form-control form-control-sm" id="namabelakangdatauser">
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-4 offset-2">
                    <input type="button" class="btn btn-sm btn-success zoom-out" value="Simpan" onclick="simpandatasubproject()">
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <h6 class="fw-bold">Plant</h6>
            <hr class="w-25">
            <?php
            $i = 0;
            $query = mysqli_query($conn, "SELECT Project,ProjectName FROM dbo_dataproject");
            while ($r = mysqli_fetch_array($query)) {
            ?>
                <p class="mb-0">
                    <input type="checkbox" id="plant<?= $i ?>" value="<?= $r['Project'] ?>"> <?= $r['Project'] . ' - ' . $r['ProjectName'] ?>
                </p>
            <?php
                $i += 1;
            }
            ?>
        </div>
    </div>
    <div class="col-sm-8 mt-5">
        <div class="row">
            <?php
            $query = mysqli_query($conn, "SELECT Roles,Project FROM dbo_datarole");
            while ($r = mysqli_fetch_array($query)) { ?>
                <div class="col-sm-3 p-1">
                    <input type="checkbox" id="plant<?= $i ?>" value="<?= $r['Project'] ?>" checked disabled> <?= $r['Roles'] . ' - ' . $r['Project'] ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>