<?php
$query = mysqli_query($conn, "SELECT lksdescriptions,
                                        lksheader
                                FROM table_datalks_h");
$h = mysqli_fetch_array($query);
$query1 = mysqli_query($conn, "SELECT documenname,
                                        createdon,
                                        createdby
                                FROM table_datalks_d");
$query2 = mysqli_query($conn, "SELECT newstitle
                                FROM table_datalks_n
                                ORDER BY createdon DESC");
$query3 = mysqli_query($conn, "SELECT imgthemes,
                                        imgaddress,
                                        createdon,
                                        createdby
                                FROM table_datalks_g");
?>
<section>
    <h3 class="p-3" style="font-weight: bold;"><?= $h['lksheader'] ?></h3>
    <hr class="w-50">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">LKS</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Documents</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="rumah-tab" data-bs-toggle="tab" data-bs-target="#rumah-tab-pane" type="button" role="tab" aria-controls="rumah-tab-pane" aria-selected="false">News</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="kantor-tab" data-bs-toggle="tab" data-bs-target="#kantor-tab-pane" type="button" role="tab" aria-controls="kantor-tab-pane" aria-selected="false">Galeri</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <p style="text-align: justify;"><?= $h['lksdescriptions'] ?></p>
        </div>
        <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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
                    while ($d = mysqli_fetch_array($query1)) { ?>
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
        <div class="tab-pane fade show p-3" id="rumah-tab-pane" role="tabpanel" aria-labelledby="rumah-tab" tabindex="0">
            <ol>
                <?php
                while ($n = mysqli_fetch_array($query2)) { ?>
                    <li><a href="#" target="_blank"><?= $n['newstitle'] ?></a></li>
                <?php
                } ?>
            </ol>
        </div>
        <div class="tab-pane fade show p-3" id="kantor-tab-pane" role="tabpanel" aria-labelledby="kantor-tab" tabindex="0">
            <div class="row">
                <?php
                while ($g = mysqli_fetch_array($query3)) { ?>
                    <div class="col-sm-2 mb-3">
                        <div class="card zoom" style="width: 18rem;">
                            <img src="assets/img/images/<?= $g['imgaddress'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-text" style="font-weight: bold;"><?= $g['imgthemes'] ?></h6>
                                <p class="card-text opacity-50">Oleh <?= $g['createdby'] ?><br><?= beautydate1($g['createdon']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>