<?php
$calenderid = Getkode('calenderid ', 'table_datacoc_e');
$cocdescription = $descriptions = $cochead = null;
$eventstart = date('Y-m-d');
$eventfinish = date('Y-m-d');
$createdon = date('d.m.Y');
$createdby = $_SESSION['pernr'];
if (isset($_GET['n'])) {
    $calenderid = base64_decode($_GET['n']);
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT eventname,
                                                        eventstart,
                                                        eventfinish,
                                                        eventfacilitor,
                                                        eventorganizer,
                                                        eventtopics,
                                                        eventlocation,
                                                        createdon,
                                                        createdby FROM table_datacoc_e WHERE calenderid='$calenderid'"));
    $eventname = $r['eventname'];
    $eventstart = $r['eventstart'];
    $eventfinish = $r['eventfinish'];
    $eventfacilitor = $r['eventfacilitor'];
    $eventorganizer = $r['eventorganizer'];
    $eventtopics = $r['eventtopics'];
    $eventlocation = $r['eventlocation'];
    $createdon = beautydate1($r['createdon']);
    $createdby = $r['createdby'];
} ?>
<div class="container">
    <h3 class="fw-bold">Event</h3>
    <hr class="mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row mb-1" hidden>
                <label for="calenderidmdcocevent" class="col-sm-3">Calender ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="calenderidmdcocevent" value="<?= $calenderid ?>" readonly>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="mulaimdcocevent" class="col-sm-3">Mulai - Selesai</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control form-control-sm" id="mulaimdcocevent" value="<?= $eventstart ?>">
                </div>
                <label for="selesaimdcocevent" class="col-sm-1">To</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control form-control-sm" id="selesaimdcocevent" value="<?= $eventfinish ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="eventorgmdcocevent" class="col-sm-3">Event Org</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" id="eventorgmdcocevent" value="<?= $eventorganizer ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="eventnamemdcocevent" class="col-sm-3">Event Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" id="eventnamemdcocevent" value="<?= $eventname ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="fasilitormdcocevent" class="col-sm-3">Fasilitor</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" id="fasilitormdcocevent" value="<?= $eventfacilitor ?>">
                </div>
            </div>

            <div class="form-group row mb-1">
                <label for="topikmdcocevent" class="col-sm-3">Topik</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" id="topikmdcocevent" value="<?= $eventtopics ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="lokasimdcocevent" class="col-sm-3">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" id="lokasimdcocevent" value="<?= $eventlocation ?>">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Date</legend>
                <div class="form-group row mb-1">
                    <label for="createdonmdcocevent" class="col-sm-6">Created On</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdonmdcocevent" value="<?= $createdon ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="createdbymdcocevent" class="col-sm-6">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="createdbymdcocevent" value="<?= $createdby ?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border rounded p-2 mb-3">
                <legend class="float-none w-auto px-2 fs-6">Action</legend>
                <div class=" form-group row mt-3">
                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger zoom" onclick="location.reload()"><img src="../assets/icon/cancel16.png"> Batal</button>
                        <button type="button" class="btn btn-sm btn-success zoom" onclick="submitmdcocevent()"><img src="../assets/icon/save.png"> Simpan</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>