<div class="container">
    <h3 class="fw-bold">Draft SP</h3>
    <hr class="mb-5">
    <div class="row">
        <fieldset class="border rounded p-2">
            <legend class="float-none w-auto px-2 fs-6">Basic Data</legend>
            <div class="form-group row mb-1">
                <label for="spiddraftsp" class="col-sm-2 text-end">SP id</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" id="spiddraftsp" value="#<?= Getkode('spid', 'table_datasp_doc') ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="doknodraftsp" class="col-sm-2 text-end">Dokumen No</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" id="doknodraftsp">
                </div>
                <label for="pernrdraftsp" class="col-sm-2 text-end">Pernr</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="pernrdraftsp">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT pernr,
                                                            namekar 
                                                        FROM table_databuruh 
                                                        WHERE statsactive=1");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['pernr'] ?>"><?= $r['pernr'] . ' - ' . $r['namekar'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="jadwaldraftsp" class="col-sm-2 text-end">Jadwal Rekonsiliasi</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control form-control-sm" id="jadwaldraftsp" value="<?= date('Y-m-d') ?>">
                </div>
                <label for="unitdraftsp" class="col-sm-2 text-end">Unit</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="unitdraftsp">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT unitid ,descriptions 
                                                    FROM table_dataunit");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['unitid'] ?>"><?= $r['unitid'] . ' - ' . $r['descriptions'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="rekonolehdraftsp" class="col-sm-2 text-end">Rekon. Oleh</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="rekonolehdraftsp">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT pernr,
                                                        namekar 
                                                    FROM table_databuruh 
                                                    WHERE statsactive=1");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['pernr'] ?>"><?= $r['pernr'] . ' - ' . $r['namekar'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <label for="bagiandraftsp" class="col-sm-2 text-end">Bagian</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" id="bagiandraftsp">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="statusdraftsp" class="col-sm-7 text-end">Status</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" id="statusdraftsp" value="<?= Getdata('stats', 'table_datastats', 'idstats', 0) ?>" readonly>
                </div>
            </div>
            <hr class="w-50">
            <div class="form-group row mb-1">
                <label for="pelanggarandraftsp" class="col-sm-2 text-end">Pelanggaran</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="pelanggarandraftsp">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT idviolation,descriptions 
                                                    FROM table_datasp_v");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['idviolation'] ?>"><?= $r['descriptions'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <label for="sangsidraftsp" class="col-sm-2 text-end">Sangsi</label>
                <div class="col-sm-3">
                    <select class="select2 form-control form-control-sm" id="sangsidraftsp">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT sancid,descriptions 
                                                    FROM table_datasp_s");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['sancid'] ?>"><?= $r['descriptions'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>

            </div>
            <div class="form-group row mb-5">
                <label for="tglpelanggarandraftsp" class="col-sm-2 text-end">Tgl Pelanggaran</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control form-control-sm" id="tglpelanggarandraftsp" value="<?= date('Y-m-d') ?>">
                </div>
            </div>
        </fieldset>
        <fieldset class="border rounded p-2 mb-3">
            <legend class="float-none w-auto px-2 fs-6">Catatan/Keterangan</legend>
            <div id="editor"></div>
        </fieldset>
        <fieldset class="border rounded p-2 mb-3">
            <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
            <input type="file" id="lampiran" name="lampiran[]" multiple class="form-control mb-2" accept=".pdf, image/*">
            <ol id="filelist" class="mt-2"></ol>
            <input type="text" class="form-control form-control-sm" id="descimgdraftsp" readonly hidden>
            <!-- <button type="submit" class="btn btn-success btn-sm">Submit</button> -->
            <div class=" form-group row mt-3">
                <!-- <label for="" class="col-sm-2"></label> -->
                <div class="col-sm-12 text-end">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmtdraftsp()"><img src="../assets/icon/save.png"> Submit</button>
                </div>
            </div>
        </fieldset>
    </div>



</div>
<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById("lampiran").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelist");
        fileList.innerHTML = ""; // reset list

        for (let file of files) {
            fileNames.push(file.name);

            // buat <a> link preview
            let li = document.createElement("li");
            let a = document.createElement("a");
            a.textContent = file.name;
            a.href = URL.createObjectURL(file);
            a.target = "_blank"; // biar buka di tab baru
            li.appendChild(a);

            fileList.appendChild(li);
        }

        // gabungkan semua nama file ke input text
        document.getElementById("descimgdraftsp").value = fileNames.join(", ");
    });
</script>