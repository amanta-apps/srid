<?php
$pklid  = Getkode('pklid ', 'table_datapkl_h');
$nama = $instansi = $unitdest = $unitdesc = $picunit = $picname = $catatan = $tglfrom = $tglto = null;
$tglfrom = date('Y-m-d');
$tglto = date('Y-m-d');
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $pklid  = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datapkl_h WHERE pklid ='$pklid '"));
    $nama = $r['namaorg'];
    $instansi = $r['instansi'];
    $unitdest = $r['unitdest'];
    $unitdesc = Getdata('descriptions', 'table_dataunit', 'unitid', $unitdest);
    $picunit = $r['picunit'];
    $picname = Getdata('namekar', 'table_databuruh', 'pernr', $picunit);
    $pkltype = $r['jenispkl'];
    $pkldesc = Getdata('descriptions', 'table_datapkl', 'pkltype ', $pkltype);
    $catatan = $r['catatan'];
    $tglfrom = $r['tglfrom'];
    $tglto = $r['tglto'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container mb-3">
    <h3 class="fw-bold">Praktek Kerja Lapangan</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="pklidmdpklcreate" class="col-sm-2">Pkl Id</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control form-control-sm" id="pklidmdpklcreate" value="<?= $pklid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Information</legend>
                    <div class="form-group row mb-1">
                        <label for="pkltypemdpklcreate" class="col-sm-2">Type</label>
                        <div class="col-sm-6">
                            <select class="select2 form-select form-select-sm" id="pkltypemdpklcreate">
                                <option value="<?= $pkltype ?>"><?= $pkltype . ' - ' . $pkldesc ?></option>
                                <?php
                                if (!$unit) {
                                    $query = mysqli_query($conn, "SELECT pkltype,descriptions FROM table_datapkl");
                                } else {
                                    $query = mysqli_query($conn, "SELECT pkltype,descriptions FROM table_datapkl WHERE pkltype <> $pkltype");
                                }
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['pkltype'] ?>"><?= $r['descriptions'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="namamdpklcreate" class="col-sm-2">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="namamdpklcreate" value="<?= $nama ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="instansimdpklcreate" class="col-sm-2">Instansi</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="instansimdpklcreate" value="<?= $instansi ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="tglfrommdpklcreate" class="col-sm-2">Tgl Pkl</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="tglfrommdpklcreate" value="<?= $tglfrom ?>">
                        </div>
                        <label for="tgltomdpklcreate" class="col-sm-2 text-center">sampai</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="tgltomdpklcreate" value="<?= $tglto ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="unitidmdpklcreate" class="col-sm-2">Unit</label>
                        <div class="col-sm-4">
                            <select class="select2 form-select form-select-sm" id="unitidmdpklcreate">
                                <option value="<?= $unitdest ?>"><?= $unitdest . ' - ' . $unitdesc ?></option>
                                <?php
                                if (!$unitdest) {
                                    $query = mysqli_query($conn, "SELECT unitid,descriptions FROM table_dataunit");
                                } else {
                                    $query = mysqli_query($conn, "SELECT unitid,descriptions FROM table_dataunit WHERE unitid <> $unitdest");
                                }
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['unitid'] ?>"><?= $r['unitid'] . ' - ' . $r['descriptions'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="picmdpklcreate" class="col-sm-2">Person in Charg</label>
                        <div class="col-sm-4">
                            <select class="select2 form-select form-select-sm" id="picmdpklcreate">
                                <option value="<?= $picunit ?>"><?= $picunit . ' - ' . $picname ?></option>
                                <?php
                                if (!$unitdest) {
                                    $query = mysqli_query($conn, "SELECT pernr,namekar FROM table_databuruh");
                                } else {
                                    $query = mysqli_query($conn, "SELECT pernr,namekar FROM table_databuruh WHERE pernr <> $picunit");
                                }
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['pernr'] ?>"><?= $r['pernr'] . ' - ' . $r['namekar'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Lampiran</legend>
                    <input type="file" id="lampiranpklcreate" name="lampiranpklcreate[]" multiple class="form-control mb-2" accept="image/*">
                    <ul id="filelistpklcreate" class="fileList mt-2"></ul>
                    <input type="text" class="form-control form-control-sm" id="descimgseragamranc" readonly hidden>
                </fieldset>
            </div>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgpkl,createdon,createdby FROM table_datapkl_d WHERE pklid='$pklid'");
            if (mysqli_num_rows($query)) { ?>
                <div class="form-group row mb-1">
                    <fieldset class="border rounded p-2 mb-3">
                        <legend class="float-none w-auto px-2 fs-6">Files</legend>
                        <table class="table table-borderless">
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" onclick="downloadlink(16,'<?= $r['imgpkl'] ?>',2)"><?= $r['imgpkl'] ?></a>
                                        </td>
                                        <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                        <td style="width: 10%;">
                                            <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgpkl'] ?>',17,'table_datapkl_d','<?= $r['documenid'] ?>')">
                                            <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(16,'<?= $r['imgpkl'] ?>',1)">
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            <?php
            }
            ?>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Catatan tambahan</legend>
                    <div id="editorpklcreate"><?= $catatan ?></div>
                </fieldset>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdpklcreate" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdpklcreate" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdpklcreate" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdpklcreate" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="statusmdpklcreate" class="col-sm-6">Status</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-sm" id="statusmdpklcreate" value="<?= Getdata('stats', 'table_datastats', 'idstats', 0) ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdpklcreate()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorpklcreate'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
    document.getElementById("lampiranpklcreate").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistpklcreate");
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
        document.getElementById("descimgseragamranc").value = fileNames.join(", ");
    });
</script>