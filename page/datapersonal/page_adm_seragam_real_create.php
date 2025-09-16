<?php
if (isset($_GET['n'])) {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=13");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir ?? '';
    $srgmid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table_datasrgm_h WHERE srgmid='$srgmid'"));
    $tglfrom = beautydate1($r['tglfrom']);
    $tglto = beautydate1($r['tglto']);
    $catatan = strip_tags($r['catatanranc']);
    $total = $r['total'];
    $query = mysqli_query($conn, "SELECT imgseragam FROM table_datasrgm_d WHERE srgmid='$srgmid'");
}
?>
<div class="container">
    <h3 class="fw-bold">Realisasi Pembagian Seragam #<?= $srgmid ?></h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Data Rancangan</legend>
                <div class="form-group row mb-1" hidden>
                    <label for="spiddatabina" class="col-sm-2 text-end">Id Seragam</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-sm" id="" value="<?= $srgmid ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3 p-3">
                    <?php
                    while ($r = mysqli_fetch_array($query)) { ?>
                        <div class="col-sm-3">
                            <img src="<?= $temp . $r['imgseragam'] ?>" style="width: 200px; height: 200px;" class="img-thumbnail">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div>
                    <table class="table table-sm w-75 mt-3 table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 60%;">Unit</th>
                                <th>Rancangan</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($conn, "SELECT unitid,rancqty,realqty FROM table_datasrgm_dt WHERE srgmid='$srgmid' ORDER BY unitid ASC");
                            while ($r = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm bg-transparent" id="unitidseragamreal<?= $i ?>" value="<?= $r['unitid'] ?>" hidden>
                                        <input type="text" class="form-control form-control-sm bg-transparent" value="<?= Getdata('descriptions', 'table_dataunit', 'unitid', $r['unitid']) ?>" readonly>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm" min="0" value="<?= $r['rancqty'] ?>" readonly></td>
                                    <td><input type="number" class="form-control form-control-sm total-output" id="qtymdseragamreal<?= $i ?>" min="0" value="<?= $r['realqty'] ?>" onchange="gettotalseragamreal()"></td>
                                </tr>
                            <?php
                                $i += 1;
                            }
                            ?>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" id="lenghtmdseragamreal" value="<?= $i ?>" hidden></td>
                                <td class="fw-bold">Total</td>
                                <td><input type="text" class="form-control form-control-sm fw-bold fs-5" value="<?= $total ?>" readonly></td>
                                <td><input type="text" class="form-control form-control-sm fw-bold fs-5" id="totalqtymdseragamreal" value="<?= $total ?>" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <fieldset class="border rounded p-2">
                    <legend class="float-none w-auto px-2 fs-6">Catatan Realisasi</legend>
                    <div class="form-group row mb-3">
                        <label for="tglrancanganfrommdseragamreal" class="col-sm-2">Tgl Rancangan</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="tglrancanganfrommdseragamreal" value="<?= $tglfrom ?>" readonly>
                        </div>
                        <label for="tglrancangantomdseragamreal" class="col-sm-1 text-center">Sampai</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="tglrancangantomdseragamreal" value="<?= $tglto ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tglrealisaimdseragamreal" class="col-sm-2">Tgl Realisasi</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="tglrealisaimdseragamreal" value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div id="editorseragamreal"></div>
                </fieldset>
            </fieldset>
            <fieldset class="border rounded p-2 mb-5">
                <legend class="float-none w-auto px-2 fs-6">Catatan Rancangan</legend>
                <!-- <div class="form-floating mb-5 mt-3"> -->
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" readonly><?= $catatan ?></textarea>
                <!-- <label for="floatingTextarea2">Catatan Rancangan</label> -->
                <!-- </div> -->
            </fieldset>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdseragamreal" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdseragamreal" value="<?= beautydate1($createdon) ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdseragamreal" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdseragamreal" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdseragamreal()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</div>

<script>
    let editorInstance;
    ClassicEditor
        .create(document.getElementById('editorseragamreal'), {
            placeholder: 'Tulis sesuatu di sini...' // <-- kasih placeholder
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>