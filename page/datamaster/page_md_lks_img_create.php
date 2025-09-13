<?php
$dir = Getdata('drtext', 'table_datadirections', 'directionsid', 5);
$imgid = Getkode('imgid', 'table_datalks_g');
$cocdescription = $descriptions = $cochead = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $imgid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datalks_g WHERE imgid='$imgid'"));
    $imgthemes = $r['imgthemes'];
    $imgaddress = $r['imgaddress'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">LKS - Galery</h3>
    <hr class="mb-5">
    <div class="row mb-0">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="imgidmdimglks" class="col-sm-3">Image ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="imgidmdimglks" value="<?= $imgid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="imgnamemdimglks" class="col-sm-3">Image Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="imgnamemdimglks" value="<?= $imgthemes ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="docaddrmdimglks" class="col-sm-3">Link</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="file" class="form-control" id="docaddrmdimglks" onchange="previewFile()">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="filenamemdimglks" class="col-sm-3">File Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="filenamemdimglks" value="<?= $imgaddress ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Preview</label>
                <div class="col-sm-9">
                    <img src="<?= $dir . $imgaddress ?>" width="100" id="previewimgimglks" class="img-thumbnail border-3">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdimglks()"><img src="../assets/icon/save.png"> Submit</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    System
                </div>
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("docaddrmdimglks").addEventListener("change", function() {
        if (this.files.length > 0) {
            let filename = this.files[0].name;
            document.getElementById("filenamemdimglks").value = filename;
        }
    });

    function previewFile() {
        const file = document.getElementById('docaddrmdimglks').files[0];
        const preview = document.getElementById('previewimgimglks');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>