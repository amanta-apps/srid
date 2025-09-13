<div class="container">
    <h6 class="fw-bold fs-4">Project</h6>
    <hr class="w-50 mb-5">
    <div class="row">
        <div class="col-sm-8 card p-3">
            <div class="row">
                <label class="col-sm-2 col-form-label text-end">Project ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="projectidconfigproject" value="<?= Getkode('Project', 'dbo_dataproject') ?>" readonly>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label text-end">Project Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="projectnameconfigproject">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-4 offset-2">
                    <input type="text" class="btn btn-sm btn-success zoom-out" value="Simpan" onclick="simpandataproject()">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h6 class="fw-bold">Type/Status</h6>
            <hr class="w-25">
            <?php
            $i = 0;
            $query = mysqli_query($conn, "SELECT Stype,Ntype FROM dbo_datatype WHERE Stype IN (100,999)");
            while ($r = mysqli_fetch_array($query)) {
                $disabled = '';
                $checked = '';
                if ($r['Stype'] == 100 | $r['Stype'] == 999) {
                    $checked = 'checked';
                    $disabled = 'disabled';
                }
            ?>
                <p class="mb-0">
                    <input type="checkbox" id="type<?= $i ?>" <?= $disabled ?> <?= $checked ?>> <?= $r['Ntype'] ?>
                </p>
            <?php
                $i += 1;
            }
            ?>
        </div>
    </div>
</div>