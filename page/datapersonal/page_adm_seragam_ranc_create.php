<?php
$srgmid  = Getkode('srgmid ', 'table_datasrgm_h');
$imgsrgm = $total = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $srgmid  = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasrgm_h WHERE srgmid ='$srgmid '"));
    $imgsrgm = $r['imgsrgm'];
    $total = $r['total'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Rancangan Pembagian Seragam</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="srgmidmdseragamranc" class="col-sm-2">Srgm Id</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control form-control-sm" id="srgmidmdseragamranc" value="<?= $srgmid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                    <input type="file" id="lampiranseragamranc" name="lampiranseragamranc[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                    <ul id="filelistseragamranc" class="fileList mt-2"></ul>
                    <input type="text" class="form-control form-control-sm" id="descimgseragamranc" readonly hidden>
                </fieldset>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Unit SM</legend>
                    <table class="table table-sm w-50 mt-3 table-bordered px-3">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th>Unit</th>
                                <th style="width: 25%;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($conn, "SELECT unitid,descriptions FROM table_dataunit ORDER BY unitid ASC");
                            while ($r = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><input type="text" class="form-control form-control-sm bg-transparent" id="unitidseragamranc<?= $i ?>" value="<?= $r['unitid'] ?>" hidden>
                                        <input type="text" class="form-control form-control-sm bg-transparent" value="<?= $r['descriptions'] ?>" readonly>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm" id="qtymdseragamranc<?= $i ?>" min="0" value="0"></td>
                                </tr>
                            <?php
                                $i += 1;
                            }
                            ?>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" id="lenghtmdseragamranc" value="<?= $i ?>" hidden></td>
                                <td class="fw-bold">Total</td>
                                <td><input type="text" class="form-control form-control-sm" id="totalqtymdseragamranc" value="0" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row mb-1">
                        <div class="col-sm-1">

                        </div>
                    </div>
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
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdseragamranc()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</div>

<script>
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