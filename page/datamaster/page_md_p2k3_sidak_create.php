<?php
$p2k3id = Getkode('p2k3id', 'table_datap2k3_s');
$pernr = $unit = $catatan = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $p2k3id = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datap2k3_s WHERE p2k3id='$p2k3id'"));
    $pernr = $r['pernr'];
    $unit = $r['unit'];
    $catatan = $r['catatan'];
    $tgl = $r['tglsidak'];
    $createdon = $r['createdon'];
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Temuan Sidak</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1">
                <label for="p2k3idmdsidakp2k3" class="col-sm-2">P2K3 Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="p2k3idmdsidakp2k3" value="<?= $p2k3id ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="tglmdsidakp2k3" class="col-sm-2">Tgl</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-sm" id="tglmdsidakp2k3" value="<?= $tgl ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="pernrmdsidakp2k3" class="col-sm-2">Pernr</label>
                <div class="col-sm-4">
                    <select class="select2 form-control form-control-sm" id="pernrmdsidakp2k3">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT pernr,
                                                            namekar 
                                                        FROM table_databuruh 
                                                        WHERE statsactive=1");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['pernr'] ?>"><?= $r['pernr'] . ' - ' . $r['namekar'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="unitmdsidakp2k3" class="col-sm-2">Unit</label>
                <div class="col-sm-4">
                    <select class="select2 form-control form-control-sm" id="unitmdsidakp2k3">
                        <option value=""></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT unitid ,descriptions 
                                                    FROM table_dataunit");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <option value="<?= $r['unitid'] ?>"><?= $r['unitid'] . ' - ' . $r['descriptions'] ?></option>
                        <?php }
                        ?>
                    </select>
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
        <fieldset class="border rounded p-2 mb-3">
            <legend class="float-none w-auto px-2 fs-6">Catatan/Keterangan</legend>
            <div id="editor"></div>
        </fieldset>
        <fieldset class="border rounded p-2 mb-3">
            <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
            <input type="file" id="lampiransidak" name="lampiransidak[]" multiple class="form-control mb-2" accept=".pdf, image/*">
            <ol id="filelistsidak" class="mt-2"></ol>
            <input type="text" class="form-control form-control-sm" id="descimgsidakp2k3" readonly hidden>
            <!-- <button type="submit" class="btn btn-success btn-sm">Submit</button> -->
            <div class=" form-group row mt-3">
                <!-- <label for="" class="col-sm-2"></label> -->
                <div class="col-sm-12 text-end">
                    <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdp2k3sidak()"><img src="../assets/icon/save.png"> Submit</button>
                </div>
            </div>
        </fieldset>
        <!-- <div class="form-group row mt-0">
            <label for="" class="col-sm-12"></label>
            <div class="col-sm-2">
                <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdsidakp2k3()"><img src="../assets/icon/save.png"> Submit</button>
            </div>
        </div> -->
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

    document.getElementById("lampiransidak").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistsidak");
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
        document.getElementById("descimgsidakp2k3").value = fileNames.join(", ");
    });
</script>