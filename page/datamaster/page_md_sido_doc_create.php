<?php
$sidoid = Getkode('sidoid', 'table_datasido_e');
$pernr = $unit = $taskid = $catatan = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
$tglevent = date('Y-m-d');
if (isset($_GET['n'])) {
    $sidoid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasido_e WHERE sidoid='$sidoid'"));
    $taskid = $r['taskid'];
    $eventname = $r['eventname'];
    $tglfrom = $r['tgleventfrom'];
    $tglto = $r['tgleventto'];
    $catatan = $r['descriptions'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Event</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="sidoidmdsido" class="col-sm-2">Sido Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="sidoidmdsido" value="<?= $sidoid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="jeniskegiatanmdsido" class="col-sm-2">Jenis Kegiatan</label>
                <div class="col-sm-4">
                    <select class="select2 form-control form-control-sm" id="jeniskegiatanmdsido">
                        <option value="<?= $taskid ?>"><?= $taskid . ' - ' . $eventname ?></option>
                        <?php
                        if (!$taskid) {
                            $query = mysqli_query($conn, "SELECT taskid, descriptions FROM table_datatask");
                        } else {
                            $query = mysqli_query($conn, "SELECT taskid, descriptions FROM table_datatask WHERE taskid <> $taskid");
                        }
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['taskid'] ?>"><?= $r['taskid'] . ' - ' . $r['descriptions'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="namakegiatanmdsido" class="col-sm-2">Nama Kegiatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" id="namakegiatanmdsido" value="<?= $eventname ?>">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="tglfrommdsido" class="col-sm-2">Tgl Event</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-sm" id="tglfrommdsido" value="<?= $tglfrom ?>">
                </div>
                <label for="tgltomdsido" class="col-sm-1">To</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-sm" id="tgltomdsido" value="<?= $tglto ?>">
                </div>
            </div>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Catatan/Keterangan</legend>
                <div id="editor"><?= $catatan ?></div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                <input type="file" id="lampiransido" name="lampiransido[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                <ol id="filelistsido" class="mt-2"></ol>
                <input type="text" class="form-control form-control-sm" id="descimgsido" readonly hidden>
            </fieldset>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgsido,createdon,createdby FROM table_datasido_sd WHERE sidoid='$sidoid'");
            if (mysqli_num_rows($query)) { ?>
                <!-- <div class="form-group row mb-1"> -->
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Files</legend>
                    <table class="table table-borderless">
                        <tbody>
                            <?php
                            while ($r = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td>
                                        <a href="#" onclick="downloadlink(11,'<?= $r['imgsido'] ?>',2)"><?= $r['imgsido'] ?></a>
                                    </td>
                                    <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                    <td style="width: 10%;">
                                        <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgsido'] ?>',11,'table_datasido_sd','<?= $r['documenid'] ?>')">
                                        <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(11,'<?= $r['imgsido'] ?>',1)">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
                <!-- </div> -->
            <?php
            }
            ?>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdsido" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdsido" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdsido" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdsido" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdsidodoc()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById("lampiransido").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistsido");
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
        document.getElementById("descimgsido").value = fileNames.join(", ");
    });
</script>