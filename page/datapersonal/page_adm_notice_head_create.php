<?php
$noticeid = Getkode('noticeid', 'table_datanotice_h');
$header = $descriptions = $hidden = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $hidden = 'hidden';
    $noticeid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datanotice_h WHERE noticeid='$noticeid'"));
    $header = $r['header'];
    $descriptions = $r['descriptions'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Pengumuman</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="noticeidmdnoticehead" class="col-sm-2">notice Id</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control form-control-sm" id="noticeidmdnoticehead" value="<?= $noticeid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <div class="form-group row mb-1">
                        <label for="headmdnoticehead" class="col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="headmdnoticehead" value="<?= $header ?>">
                        </div>
                    </div>
                    <legend class="float-none w-auto px-2 fs-6">Title & Descriptions</legend>
                    <div id="editornoticehead"><?= $descriptions ?></div>
                </fieldset>
            </div>
            <div class="form-group row mb-1" <?= $hidden ?>>
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                    <input type="file" id="lampirannoticehead" name="lampirannoticehead[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                    <ul id="filelistnoticehead" class="fileList mt-2"></ul>
                    <input type="text" class="form-control form-control-sm" id="descimgnoticehead" readonly hidden>
                </fieldset>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdnoticehead" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdnoticehead" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdnoticehead" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdnoticehead" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdnoticehead()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editornoticehead'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById("lampirannoticehead").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistnoticehead");
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
        document.getElementById("descimgnoticehead").value = fileNames.join(", ");
    });
</script>