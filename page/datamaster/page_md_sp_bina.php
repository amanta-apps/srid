<div class="container">
    <h3 class="fw-bold">Pembinaan Setelah SP</h3>
    <hr class="mb-5">

    <fieldset class="border rounded p-2 mb-5">
        <legend class="float-none w-auto px-2 fs-6">Cari Data</legend>
        <div class="row">
            <div class="form-group row mb-1">
                <label for="spiddatabina" class="col-sm-2 text-end">SP id & Doc No</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="spiddatabina" onchange="selectspdatabina(this.value)">
                        <option value="">SP id - Doc No</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT spid,
                                                            nodocumen 
                                                        FROM table_datasp_doc 
                                                        WHERE spstatus='NEW'");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['spid'] ?>">#<?= $r['spid'] . ' - ' . $r['nodocumen'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="col-sm-7 text-end" id="tombolsimpandatabina" hidden>
                    <input type="button" class="btn-sm btn-success" value="Simpan Data" onclick="simpandatabina()">
                    <input type="button" class="btn-sm btn-danger" value="Batal" onclick="location.reload()">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="border rounded p-2">
        <legend class="float-none w-auto px-2 fs-6">Information</legend>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item p-1" role="presentation">
                <button class="nav-link active" id="pembina-tab" data-bs-toggle="tab" data-bs-target="#pembina-tab-pane" type="button" role="tab" aria-controls="pembina-tab-pane" aria-selected="true">Pembina</button>
            </li>
            <li class="nav-item p-1" role="presentation">
                <button class="nav-link" id="karyawan-tab" data-bs-toggle="tab" data-bs-target="#karyawan-tab-pane" type="button" role="tab" aria-controls="karyawan-tab-pane" aria-selected="true">Karyawan</button>
            </li>
            <li class="nav-item p-1" role="presentation">
                <button class="nav-link" id="datasp-tab" data-bs-toggle="tab" data-bs-target="#datasp-tab-pane" type="button" role="tab" aria-controls="datasp-tab-pane" aria-selected="true">Data SP</button>
            </li>
            <li class="nav-item p-1" role="presentation">
                <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab" data-bs-target="#dokumen-tab-pane" type="button" role="tab" aria-controls="dokumen-tab-pane" aria-selected="true">Dokumen Pendukung</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mt-5 pb-3" id="pembina-tab-pane" role="tabpanel" aria-labelledby="pembina-tab" tabindex="0">
                <div class="row">
                    <div id="t_pembinadatabina">

                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-5" id="karyawan-tab-pane" role="tabpanel" aria-labelledby="karyawan-tab" tabindex="0">
                <div id="t_karyawandatabina">
                </div>
            </div>
            <div class="tab-pane fade p-5" id="datasp-tab-pane" role="tabpanel" aria-labelledby="datasp-tab" tabindex="0">
                <div id="t_dataspdatabina">
                </div>
            </div>
            <div class="tab-pane fade p-5" id="dokumen-tab-pane" role="tabpanel" aria-labelledby="dokumen-tab" tabindex="0">
                <div id="t_dokumendatabina">
                </div>
            </div>
        </div>
    </fieldset>
</div>