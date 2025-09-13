<?php
$newsid = Getkode('newsid', 'table_datap2k3_n');
$newseditor = $newscontent = $newstitle = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $newsid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datap2k3_n WHERE newsid='$newsid'"));
    $newseditor = $r['newseditor'];
    $newscontent = $r['newscontent'];
    $newstitle = $r['newstitle'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">P2K3 - News</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="newsidmdnewsp2k3" class="col-sm-3">News Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="newsidmdnewsp2k3" value="<?= $newsid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="editormdnewsp2k3" class="col-sm-3">Editor</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="editormdnewsp2k3" value="<?= $newseditor ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="titlemdnewsp2k3" class="col-sm-3">Title</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="titlemdnewsp2k3" value="<?= $newstitle ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="kontenmdnewsp2k3" class="col-sm-3">Konten</label>
                <div class="col-sm-8">
                    <textarea id="kontenmdnewsp2k3" class="form-control form-control-sm" rows="5"><?= $newscontent ?></textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-3"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdnewsp2k3()"><img src="../assets/icon/save.png"> Submit</button>
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
                </div>
            </div>
        </div>
    </div>

</div>