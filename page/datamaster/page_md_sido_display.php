<div class="container">
    <h3 class="fw-bold">Sido Bungah</h3>
    <hr class="mb-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sido Bungah</button>
        </li>
        <li class="nav-item p-1" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Documents</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <table id="table_displaysido_head" class="table w-100">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>No Revisi</th>
                        <th>Deskripsi</th>
                        <th>Header Text</th>
                        <th>Created On</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="table-responsive-sm">
                <table id="table_displaysido_dokumen" class="table w-100">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>Task</th>
                            <th>Event</th>
                            <th>Tgl From</th>
                            <th>Tgl To</th>
                            <th>Desc</th>
                            <th>Created On</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>