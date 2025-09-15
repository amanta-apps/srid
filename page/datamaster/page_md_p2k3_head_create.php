<?php
$p2k3id = Getkode('p2k3id', 'table_datap2k3_h');
$p2k3descriptions = $p2k3header  = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $p2k3id = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datap2k3_h WHERE p2k3id='$p2k3id'"));
    $p2k3descriptions = $r['p2k3descriptions'];
    $p2k3header = $r['p2k3header'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Header</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="p2k3idmdp2k3" class="col-sm-3">P2K3 Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="p2k3idmdp2k3" value="<?= $p2k3id ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <div class="form-group row mb-1">
                        <label for="headmdp2k3" class="col-sm-2">Header</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="headmdp2k3" value="<?= $p2k3header ?>">
                        </div>
                    </div>
                    <legend class="float-none w-auto px-2 fs-6">Title & Descriptions</legend>
                    <div id="editorp2k3head"><?= $p2k3descriptions ?></div>
                </fieldset>
            </div>
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
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdp2k3()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorp2k3head'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>