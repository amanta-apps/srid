<?php
$imgid = Getkode('imgid', 'table_datalks_g');
$imgthemes = $catatan = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $imgid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datalks_g WHERE imgid='$imgid'"));
    $imgthemes = $r['imgthemes'];
    $catatan = $r['catatan'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Galery</h3>
    <hr class="mb-5">
    <div class="row mb-0">
        <div class="col-sm-8">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Informasi</legend>
                <div class="form-group row mb-1">
                    <label for="imgidmdimg" class="col-sm-3" hidden>LKS ID</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm" id="imgidmdimg" value="<?= $lksid ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="docnamemdimg" class="col-sm-3">Document Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="docnamemdimg" value="<?= $documenname ?>">
                    </div>
                </div>
            </fieldset>
            <!-- <div class="form-group row mb-1"> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Catatan tambahan</legend>
                <div id="editordokumenimg"><?= $catatan ?></div>
            </fieldset>
            <!-- </div> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                <input type="file" id="lampirandokumenimg" name="lampirandokumenimg[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                <ul id="filelistdokumenimg" class="fileList mt-2"></ul>
                <input type="text" class="form-control form-control-sm" id="descimgdokumenimg" readonly hidden>
            </fieldset>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgimg,createdon,createdby FROM table_datalks_dt WHERE imgid='$imgid'");
            if (mysqli_num_rows($query)) { ?>
                <div class="form-group row mb-1">
                    <fieldset class="border rounded p-2 mb-3">
                        <legend class="float-none w-auto px-2 fs-6">Files</legend>
                        <table class="table table-borderless">
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" onclick="downloadlink(5,'<?= $r['imgimg'] ?>',2)"><?= $r['imgimg'] ?></a>
                                        </td>
                                        <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                        <td style="width: 10%;">
                                            <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgimg'] ?>',5,'table_datalks_gt','<?= $r['documenid'] ?>')">
                                            <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(5,'<?= $r['imgimg'] ?>',1)">
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdimglks" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdimglks" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdimglks" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdimglks" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdimglks()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editordokumenimg'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
    document.getElementById("lampirandokumenimg").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistdokumenimg");
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
        document.getElementById("descimgdokumenimg").value = fileNames.join(", ");
    });
</script>