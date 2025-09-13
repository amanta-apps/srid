<?php
$query = mysqli_query($conn, "SELECT cocdescriptions,
                                        cochead
                                FROM table_datacoc_h");
$h = mysqli_fetch_array($query);
$query1 = mysqli_query($conn, "SELECT eventname,
                                        eventstart,
                                        eventfinish,
                                        eventfacilitor,
                                        eventorganizer,
                                        eventtopics,
                                        eventlocation 
                                FROM table_datacoc_e");
// $e = mysqli_fetch_array($query);
$query2 = mysqli_query($conn, "SELECT documenname,
                                        createdon,
                                        createdby 
                                FROM table_datacoc_d");
// $d = mysqli_fetch_array($query);
?>
<section>
    <h3 class="p-3" style="font-weight: bold;"><?= $h['cochead'] ?></h3>
    <hr class="w-50">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Code of Conduct</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Documents</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Calender of Event</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <p style="text-align: justify;"><?= $h['cocdescriptions'] ?></p>
        </div>
        <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table class="table table-sm">
                    <thead>
                        <th>#</th>
                        <th>Nama Dokumen</th>
                        <th>Dibuat Oleh</th>
                        <th>Diunggah Tanggal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($d = mysqli_fetch_array($query2)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $d['documenname'] ?></td>
                                <td><?= $d['createdby'] ?></td>
                                <td><?= beautydate1($d['createdon']) ?></td>
                                <td><a href="#" class="badge bg-primary">Download</a></td>
                            </tr>
                        <?php
                            $i += 1;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table class="table table-sm">
                    <thead>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Fasilitor</th>
                        <th>Organizer</th>
                        <th>Topics</th>
                        <th>Location</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($e = mysqli_fetch_array($query1)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $e['eventname'] ?></td>
                                <td><?= beautydate1($e['eventstart']) ?></td>
                                <td><?= beautydate1($e['eventfinish']) ?></td>
                                <td><?= $e['eventfacilitor'] ?></td>
                                <td><?= $e['eventorganizer'] ?></td>
                                <td><?= $e['eventtopics'] ?></td>
                                <td><?= $e['eventlocation'] ?></td>
                            </tr>
                        <?php
                            $i += 1;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>