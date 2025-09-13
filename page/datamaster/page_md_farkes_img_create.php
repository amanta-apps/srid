<?php
$dir = Getdata('drtext', 'table_datadirections', 'directionsid', 8);
$imgid = Getkode('imgid', 'table_datafarkes_g');
$imgthemes = $imgaddress = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $imgid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datafarkes_g WHERE imgid='$imgid'"));
    $imgthemes = $r['imgthemes'];
    $imgaddress = $r['imgaddress'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Farkes - Galery</h3>
    <hr class="mb-5">
    <div class="row mb-0">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="imgidmdimgfarkes" class="col-sm-3">Image ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="imgidmdimgfarkes" value="<?= $imgid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="imgnamemdimgfarkes" class="col-sm-3">Image Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="imgnamemdimgfarkes" value="<?= $imgthemes ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="docaddrmdimgfarkes" class="col-sm-3">Link</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="file" class="form-control" id="docaddrmdimgfarkes" onchange="previewFile()">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="filenamemdimgfarkes" class="col-sm-3">File Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="filenamemdimgfarkes" value="<?= $imgaddress ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Preview</label>
                <div class="col-sm-9">
                    <img src="<?= $dir . $imgaddress ?>" width="100" id="previewimgimgfarkes" class="img-thumbnail border-3">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdimgfarkes()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdimgfarkes" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdimgfarkes" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdimgfarkes" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdimgfarkes" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("docaddrmdimgfarkes").addEventListener("change", function() {
        if (this.files.length > 0) {
            let filename = this.files[0].name;
            document.getElementById("filenamemdimgfarkes").value = filename;
        }
    });

    function previewFile() {
        const file = document.getElementById('docaddrmdimgfarkes').files[0];
        const preview = document.getElementById('previewimgimgfarkes');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>