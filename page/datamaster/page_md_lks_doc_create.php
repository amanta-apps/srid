<?php
$documentid = Getkode('documenid', 'table_datalks_d');
$documenname = $docaddr  = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
$imgsrc = '../assets/galery/noimg.png';
if (isset($_GET['n'])) {
    $documentid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datalks_d WHERE documenid='$documentid'"));
    $documenname = $r['documenname'];
    $docaddr = $r['documenaddress'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
    $dir = Getdata('drtext', 'table_datadirections', 'directionsid', 4);
    $imgsrc = $dir . $docaddr;
} ?>
<div class="container">
    <h3 class="fw-bold">Dokumen</h3>
    <hr class="mb-5">
    <div class="row mb-0">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="dokumenmdlks" class="col-sm-3">Dokumen ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="dokumenmdlks" value="<?= $documentid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="docnamemdlks" class="col-sm-3">Document Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="docnamemdlks" value="<?= $documenname ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="docaddrmdlks" class="col-sm-3">Link</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="file" class="form-control" id="docaddrmdlks" onchange="previewFile()">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="filenamemdlks" class="col-sm-3">File Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="filenamemdlks" value="<?= $docaddr ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Preview</label>
                <div class="col-sm-9">
                    <img src="<?= $imgsrc ?>" width="100" id="previewimglks">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdcoc" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdcoc" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdcoc" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdcoc" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitdocmdlks()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
    document.getElementById("docaddrmdlks").addEventListener("change", function() {
        if (this.files.length > 0) {
            let filename = this.files[0].name;
            document.getElementById("filenamemdlks").value = filename;
        }
    });

    function previewFile() {
        const file = document.getElementById('docaddrmdlks').files[0];
        const preview = document.getElementById('previewimglks');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>