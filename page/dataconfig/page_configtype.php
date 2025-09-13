<div class="container">
    <h6 class="fw-bold fs-4">Type</h6>
    <hr class="w-50 mb-5">
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Type</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="typeconfigtype" value="<?= Getkode('Stype', 'dbo_datatype', 999) ?>" readonly>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Descriptons</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="deskripsiconfigtype">
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-sm-4 offset-2">
            <input type="button" class="btn btn-sm btn-success zoom-out" value="Simpan" onclick="simpandatatype()">
        </div>
    </div>
</div>