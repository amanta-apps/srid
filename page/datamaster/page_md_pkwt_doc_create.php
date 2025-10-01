<?php
$pkwtid = Getkode('pkwtid', 'table_datapkwt_d');
$documenname = $catatan = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $pkwtid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datapkwt_d WHERE pkwtid='$pkwtid'"));
    $documenname = $r['documenname'];
    $catatan = $r['catatan'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Dokumen</h3>
    <hr class="mb-5">
    <div class="row mb-0">
        <div class="col-sm-8">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Informasi</legend>
                <div class="form-group row mb-1" hidden>
                    <label for="pkwtidmdpkwt" class="col-sm-3">PKWT ID</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm" id="pkwtidmdpkwt" value="<?= $pkwtid ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="docnamemdpkwt" class="col-sm-3">Document Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="docnamemdpkwt" value="<?= $documenname ?>">
                    </div>
                </div>
            </fieldset>
            <!-- <div class="form-group row mb-1"> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Catatan tambahan</legend>
                <div id="editordokumenpkwt"><?= $catatan ?></div>
            </fieldset>
            <!-- </div> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                <input type="file" id="lampirandokumenpkwt" name="lampirandokumenpkwt[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                <ul id="filelistdokumenpkwt" class="fileList mt-2"></ul>
                <input type="text" class="form-control form-control-sm" id="descimgdokumenpkwt" readonly hidden>
            </fieldset>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgpkwt,createdon,createdby FROM table_datapkwt_dt WHERE pkwtid='$pkwtid'");
            if (mysqli_num_rows($query)) { ?>
                <!-- <div class="form-group row mb-1"> -->
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Files</legend>
                    <table class="table table-borderless">
                        <tbody>
                            <?php
                            while ($r = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td>
                                        <a href="#" onclick="downloadlink(3,'<?= $r['imgpkwt'] ?>',2)"><?= $r['imgpkwt'] ?></a>
                                    </td>
                                    <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                    <td style="width: 10%;">
                                        <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgpkwt'] ?>',3,'table_datapkwt_dt','<?= $r['documenid'] ?>')">
                                        <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(3,'<?= $r['imgpkwt'] ?>',1)">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
                <!-- </div> -->
            <?php
            }
            ?>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdpkwt" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdpkwt" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdpkwt" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdpkwt" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitdocmdpkwt()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editordokumenpkwt'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
    document.getElementById("lampirandokumenpkwt").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistdokumenpkwt");
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
        document.getElementById("descimgdokumenpkwt").value = fileNames.join(", ");
    });
</script>