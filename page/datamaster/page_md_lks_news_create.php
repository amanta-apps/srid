<?php
$newsid = Getkode('newsid', 'table_datalks_n');
$newseditor = $newscontent = $newstitle = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $newsid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datalks_n WHERE newsid='$newsid'"));
    $newseditor = $r['newseditor'];
    $newscontent = $r['newscontent'];
    $newstitle = $r['newstitle'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">LKS - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="newsidmdnewslks" class="col-sm-3">News Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="newsidmdnewslks" value="<?= $newsid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="editormdnewslks" class="col-sm-3">Editor</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="editormdnewslks" value="<?= $newseditor ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="titlemdnewslks" class="col-sm-3">Title</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="titlemdnewslks" value="<?= $newstitle ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="kontenmdnewslks" class="col-sm-3">Konten</label>
                <div class="col-sm-8">
                    <textarea id="kontenmdnewslks" class="form-control form-control-sm" rows="5"><?= $newscontent ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdnewslks()"><img src="../assets/icon/save.png"> Submit</button>
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
                        <label for="createdonmdlks" class="col-sm-6">Created On</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdonmdlks" value="<?= $createdon ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="createdbymdlks" class="col-sm-6">Created By</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="createdbymdlks" value="<?= $createdby ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>