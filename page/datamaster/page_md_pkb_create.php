<?php
$norevisi = Getkode('norevisi', 'table_datapkb');
$header = $link = $description = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $norevisi = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datapkb WHERE norevisi='$norevisi'"));
    $header = $r['descriptions'];
    $link = $r['link'];
    $description = $r['text_descriptions'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">PKB - Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="norevisimdpkb" class="col-sm-3">No Revisi</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="norevisimdpkb" value="<?= $norevisi ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <div class="form-group row mb-1">
                        <label for="headermdpkb" class="col-sm-2">Header</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="headermdpkb" value="<?= $header ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="linkmdpkb" class="col-sm-2">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="linkmdpkb" value="<?= $link ?>">
                        </div>
                    </div>
                    <legend class="float-none w-auto px-2 fs-6">Title & Descriptions</legend>
                    <div id="editorpkbhead"><?= $description ?></div>
                </fieldset>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdpkb" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdpkb" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdpkb" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdpkb" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdpkb()"><img src="../assets/icon/save.png"> Submit</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorpkbhead'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>