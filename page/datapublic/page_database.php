<?php
$values = explode('/', base64_decode($_GET['n']));
$table = $values[0];
$desc = Getdata('Descriptions', 'dbo_datatable', 'TableN', $table);
$hit = 100;
if ($_GET['n'] <> '') {
    $hit = $values[1];
} ?>
<div class="container mt-5">
    <h6 class="fw-bold fs-4">Database</h6>
    <hr class="w-50">
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Nama Table</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="namatabledatabase" onkeypress="redirectlink_pres(event)" autofocus>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Descriptions</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="jabatandatajabatan" value="<?= $desc ?>" readonly>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label text-end">Data maximum</label>
        <div class="col-sm-1">
            <input type="number" class="form-control form-control-sm" id="datamaximumdatabase" min="1" value="<?= $hit ?>">
        </div>
    </div>
    <div class="table-responsive">
        <!-- <div class="row">
            <label class="col-sm-2 col-form-label text-end">Search</label>
            <div class="col-sm-4">
                <input type="text" id="customSearch" class="form-control form-control-sm" placeholder="Cari...">
            </div>
        </div> -->
        <table class="table table-sm mt-5" id="myTable_database">
            <thead>
                <?php
                $query = mysqli_query($conn, "DESCRIBE $table");
                $i = 0;
                while ($r = mysqli_fetch_array($query)) {
                    $fields[] = $r['Field'];
                    $i += 1;
                }
                ?>
                <tr>
                    <?php
                    foreach ($fields as $f) {
                        echo "<th>$f</th>";
                    }
                    $lenght = count($fields);
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM $table LIMIT $hit");
                while ($r = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <?php
                        for ($i = 0; $i < $lenght; $i++) { ?>
                            <td><?= $r[$i] ?></td>
                        <?php
                        } ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>