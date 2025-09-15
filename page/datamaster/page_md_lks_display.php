<div class="container">
    <h3 class="fw-bold">Display</h3>
    <hr class="mb-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">LKS</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Documents</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">News</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="galery-tab" data-bs-toggle="tab" data-bs-target="#galery-tab-pane" type="button" role="tab" aria-controls="galery-tab-pane" aria-selected="false">Galery</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <table id="table_displaylks_head" class="table w-100">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>LKS ID</th>
                        <th>Deskripsi</th>
                        <th>Header Text</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table id="table_displaylks_dokumen" class="table w-100">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>Nomor</th>
                            <th>Nama Dokumen</th>
                            <th>Link Dokumen</th>
                            <th>Created On</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table id="table_displaylks_news" class="table w-100">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>News ID</th>
                            <th>Editor</th>
                            <th>Nama Kegiatan</th>
                            <th>Descriptions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="galery-tab-pane" role="tabpanel" aria-labelledby="galery-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table id="table_displaylks_img" class="table w-100">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>Image ID</th>
                            <th>Image Name</th>
                            <th>Link Address</th>
                            <th>Created On</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>