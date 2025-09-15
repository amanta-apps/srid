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
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">News</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="newsidmdnewslks" class="col-sm-3">News Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="newsidmdnewslks" value="<?= $newsid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <div class="form-group row mb-1">
                        <label for="editormdnewslks" class="col-sm-2">Editor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="editormdnewslks" value="<?= $newseditor ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="titlemdnewslks" class="col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="titlemdnewslks" value="<?= $newstitle ?>">
                        </div>
                    </div>
                    <legend class="float-none w-auto px-2 fs-6">Title & Descriptions</legend>
                    <div id="editorlksnews"><?= $newscontent ?></div>
                </fieldset>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
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
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdnewslks()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorlksnews'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>