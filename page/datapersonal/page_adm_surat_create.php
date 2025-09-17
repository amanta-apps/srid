<?php
$suratid = Getkode('suratid', 'table_datasurat_h');
$pernr = $unitid = $srtid = $hidden = null;
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
$terbit = date('Y-m-d');
if (isset($_GET['n'])) {
    $hidden = 'hidden';
    $suratid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasurat_h WHERE suratid='$suratid'"));
    $srtid = $r['srtid'];
    $desc_srtid = Getdata('descriptions', 'table_datasurat', 'srtid', $srtid);
    $kopheader = $r['kopheader'];
    $terbit = $r['terbit'];
    $pernr = $r['pernr'];
    $namekar = Getdata('namekar', 'table_databuruh', 'pernr', $pernr);
    $unitid = $r['unitid'];
    $desc_unit = Getdata('descriptions', 'table_dataunit', 'unitid', $unitid);
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Surat</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="suratidmdsuratcreate" class="col-sm-2">surat Id</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control form-control-sm" id="suratidmdsuratcreate" value="<?= $suratid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <fieldset class="border rounded p-2 mb-3">
                    <legend class="float-none w-auto px-2 fs-6">Informasi</legend>
                    <div class="form-group row mb-1">
                        <label for="jenissuratmdsuratcreate" class="col-sm-2">Jenis Surat</label>
                        <div class="col-sm-4">
                            <select class="select2 form-select form-select-sm" id="jenissuratmdsuratcreate">
                                <option value="<?= $srtid ?>"><?= $desc_srtid ?></option>
                                <?php
                                $query = mysqli_query($conn, "SELECT srtid,descriptions FROM table_datasurat WHERE srtid <> '$srtid'");
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['srtid'] ?>"><?= $r['descriptions'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="kopheadermdsuratcreate" class="col-sm-2">KOP Surat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="kopheadermdsuratcreate" maxlength="40" value="<?= $kopheader ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="tglterbitmdsuratcreate" class="col-sm-2">Tgl Terbit</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="tglterbitmdsuratcreate" value="<?= $terbit ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-1">
                        <label for="pernrmdsuratcreate" class="col-sm-2">Pernr</label>
                        <div class="col-sm-4">
                            <select class="select2 form-select form-select-sm" id="pernrmdsuratcreate">
                                <option value="<?= $pernr ?>"><?= $pernr . ' - ' . $namekar ?></option>
                                <?php
                                echo $pernr;
                                $query = mysqli_query($conn, "SELECT pernr,namekar FROM table_databuruh WHERE pernr <> '$pernr' AND statsactive=1 ");
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['pernr'] ?>"><?= $r['pernr'] . ' - ' . $r['namekar'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="unitidmdsuratcreate" class="col-sm-2">Unit</label>
                        <div class="col-sm-4">
                            <select class="select2 form-select form-select-sm" id="unitidmdsuratcreate">
                                <option value="<?= $unitid ?>"><?= $unitid . ' - ' . $desc_unit ?></option>
                                <?php
                                $query = mysqli_query($conn, "SELECT unitid,descriptions FROM table_dataunit");
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['unitid'] ?>"><?= $r['unitid'] . ' - ' . $r['descriptions'] ?></option>
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
                    <input type="file" id="lampiransuratcreate" name="lampiransuratcreate[]" multiple class="form-control mb-2" accept=".pdf, image/*">
                    <ul id="filelistsuratcreate" class="fileList mt-2"></ul>
                    <input type="text" class="form-control form-control-sm" id="descimgsuratcreate" readonly hidden>
                </fieldset>
            </div>
            <?php
            $query = mysqli_query($conn, "SELECT documenid,imgsurat,createdon,createdby FROM table_datasurat_d WHERE suratid='$suratid'");
            if (mysqli_num_rows($query)) { ?>
                <div class="form-group row mb-1">
                    <fieldset class="border rounded p-2 mb-3">
                        <legend class="float-none w-auto px-2 fs-6">Files</legend>
                        <table class="table table-borderless w-75">
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" onclick="downloadlink(16,'<?= $r['imgsurat'] ?>',2)"><?= $r['imgsurat'] ?></a>
                                        </td>
                                        <td class="text-end opacity-50 fs-7"><?= Getdata('namekar', 'table_databuruh', 'pernr', $r['createdby']) . ', ' . beautydate2($r['createdon']) ?></td>
                                        <td style="width: 10%;">
                                            <img src="../assets/icon/trash10.png" class="zoom opacity-50" style="cursor: pointer;" title="delete" onclick="deleteimg('<?= $r['imgsurat'] ?>',16,'table_datasurat_d','<?= $r['documenid'] ?>')">
                                            <img src="../assets/icon/download15.png" class="zoom opacity-50" style="cursor: pointer;" title="download" onclick="downloadlink(16,'<?= $r['imgsurat'] ?>',1)">
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
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdsuratcreate" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdsuratcreate" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdsuratcreate" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdsuratcreate" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdsuratcreate()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</div>

<script>
    document.getElementById("lampiransuratcreate").addEventListener("change", function() {
        let files = this.files;
        let fileNames = [];
        let fileList = document.getElementById("filelistsuratcreate");
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
        document.getElementById("descimgsuratcreate").value = fileNames.join(", ");
    });
</script>