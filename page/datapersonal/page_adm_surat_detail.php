<?php
if (isset($_GET['n'])) {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=13");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir ?? '';
    $srgmid  = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasrgm_h WHERE srgmid ='$srgmid '"));
    $imgsrgm = $r['imgsrgm'];
    $totalranc = $r['totalranc'];
    $totalreal = $r['totalreal'];
    $catatanranc = strip_tags($r['catatanranc']);
    $catatanreal = strip_tags($r['catatanreal']);
    $status = $r['statsx'];
    $tglfrom = beautydate1($r['tglfrom']);
    $tglto = beautydate1($r['tglto']);
    $tglreal = beautydate1($r['tglreal']);
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
    $query = mysqli_query($conn, "SELECT imgseragam FROM table_datasrgm_d WHERE srgmid='$srgmid'");
} ?>
<div class="container mb-3">
    <h3 class="fw-bold">Detail Rancangan Seragam #<?= $srgmid ?></h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="srgmidmdseragamranc" class="col-sm-2">Srgm Id</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control form-control-sm" id="srgmidmdseragamranc" value="<?= $srgmid ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <?php
                while ($r = mysqli_fetch_array($query)) { ?>
                    <div class="col-sm-3">
                        <img src="<?= $temp . $r['imgseragam'] ?>" style="width: 200px; height: 200px;" class="img-thumbnail">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Information</legend>
                    <div class="form-group row mb-1">
                        <label for="tglfrommdseragamranc" class="col-sm-2">Tgl Rancangan</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="tglfrommdseragamranc" value="<?= $tglfrom ?>" readonly>
                        </div>
                        <label for="tgltomdseragamranc" class="col-sm-2 text-center">sampai</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="tgltomdseragamranc" value="<?= $tglto ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="tglfrommdseragamranc" class="col-sm-2">Tgl Realisasi</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="tglfrommdseragamranc" value="<?= $tglreal ?>" readonly>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Unit</legend>
                    <table class="table table-sm w-75 mt-3 table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 60%;">Unit</th>
                                <th>Rancangan</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($conn, "SELECT unitid,rancqty,realqty FROM table_datasrgm_dt WHERE srgmid='$srgmid' ORDER BY unitid ASC");
                            while ($r = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm bg-transparent" id="unitidseragamreal<?= $i ?>" value="<?= $r['unitid'] ?>" hidden>
                                        <input type="text" class="form-control form-control-sm bg-transparent" value="<?= Getdata('descriptions', 'table_dataunit', 'unitid', $r['unitid']) ?>" readonly>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm" min="0" value="<?= $r['rancqty'] ?>" readonly></td>
                                    <td><input type="number" class="form-control form-control-sm total-output" id="qtymdseragamreal<?= $i ?>" min="0" value="<?= $r['realqty'] ?>" readonly></td>
                                </tr>
                            <?php
                                $i += 1;
                            }
                            ?>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" id="lenghtmdseragamreal" value="<?= $i ?>" hidden></td>
                                <td class="fw-bold">Total</td>
                                <td><input type="text" class="form-control form-control-sm fw-bold fs-5" value="<?= $totalranc ?>" readonly></td>
                                <td><input type="text" class="form-control form-control-sm fw-bold fs-5" id="totalqtymdseragamreal" value="<?= $totalreal ?>" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-5">
                    <legend class="float-none w-auto px-2 fs-6">Catatan Rancangan</legend>
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" readonly><?= $catatanranc ?></textarea>
                </fieldset>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-5">
                    <legend class="float-none w-auto px-2 fs-6">Catatan Realisasi</legend>
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" readonly><?= $catatanreal ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdseragamranc" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdseragamranc" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdseragamranc" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdseragamranc" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="statusmdseragamreal" class="col-sm-6">Status</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-sm" id="statusmdseragamreal" value="<?= $status ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-primary zoom" onclick="redirectlink('adm_seragam_display')"><img src="../assets/icon/back.png"> kembali</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorseragamranc'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById("lampiranseragamranc").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistseragamranc");
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
        document.getElementById("descimgseragamranc").value = fileNames.join(", ");
    });
</script>