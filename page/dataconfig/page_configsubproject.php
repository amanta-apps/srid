<div class="container">
    <h6 class="fw-bold fs-4">Sub Project</h6>
    <hr class="w-50 mb-5">
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Project</label>
        <div class="col-sm-4">
            <select class="select2" style="width: 100%;" id="projectconfigsubproject">
                <option value=""></option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM dbo_dataproject");
                while ($r = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?= $r['Project'] ?>"><?= $r['Project'] . ' - ' . $r['ProjectName'] ?></option>
                <?php
                } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Sub Project Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="subprojectnameconfigsubproject">
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-sm-4 offset-2">
            <input type="button" class="btn btn-sm btn-success zoom-out" value="Simpan" onclick="simpandatasubproject()">
        </div>
    </div>
</div>