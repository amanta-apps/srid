<?php

$p2k3id = Getkode('p2k3id', 'table_datap2k3_d');
$documenname  = $catatan = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $p2k3id = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datap2k3_d WHERE p2k3id='$p2k3id'"));
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
                <div class="form-group row mb-1">
                    <label for="p2k3idmdp2k3" class="col-sm-3">P2k3 ID</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm" id="p2k3idmdp2k3" value="<?= $p2k3id ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="docnamemdp2k3" class="col-sm-3">Document Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="docnamemdp2k3" value="<?= $documenname ?>">
                    </div>
                </div>
            </fieldset>
            <!-- <div class="form-group row mb-1"> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Catatan tambahan</legend>
                <div id="editordokumenp2k3"><?= $catatan ?></div>
            </fieldset>
            <!-- </div> -->
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                <input type="file" id="lampirandokumenp2k3" name="lampirandokumenp2k3[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                <ul id="filelistdokumenp2k3" class="fileList mt-2"></ul>
                <input type="text" class="form-control form-control-sm" id="descimgdokumenp2k3" readonly hidden>
            </fieldset>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgp2k3,createdon,createdby FROM table_datap2k3_dt WHERE p2k3id='$p2k3id'");
            if (mysqli_num_rows($query)) { ?>
                <div class="form-group row mb-1">
                    <fieldset class="border rounded p-2 mb-3">
                        <legend class="float-none w-auto px-2 fs-6">Files</legend>
                        <table class="table table-borderless w-75">
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" onclick="downloadlink(9,'<?= $r['imgp2k3'] ?>',2)"><?= $r['imgp2k3'] ?></a>
                                        </td>
                                        <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                        <td style="width: 10%;">
                                            <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgp2k3'] ?>',9,'table_datasurat_d','<?= $r['documenid'] ?>')">
                                            <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(9,'<?= $r['imgp2k3'] ?>',1)">
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
                    <label for="createdonmdp2k3" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdp2k3" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdp2k3" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdp2k3" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitdocmdp2k3()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editordokumenp2k3'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
    document.getElementById("lampirandokumenp2k3").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistdokumenp2k3");
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
        document.getElementById("descimgdokumenp2k3").value = fileNames.join(", ");
    });
</script>