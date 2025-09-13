<?php $project = base64_decode($_GET['n']); ?>
<div class="container">
    <h6 class="fw-bold fs-4">Assign Type</h6>
    <hr class="w-50 mb-5">
    <div class="row mb-1">
        <div class="col-sm-8 card p-3">
            <div class="row">
                <label class="col-sm-2 col-form-label text-end">Project</label>
                <div class="col-sm-4">
                    <select class="select2" style="width: 100%; cursor: pointer;" id="projectconfigassign" onchange="redirectlink('datatypeassign',this.value)">
                        <?php
                        if ($project <> '') { ?>
                            <option value="<?= $project ?>" selected><?= Getdata('ProjectName', 'dbo_dataproject', 'Project', $project) ?></option>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM dbo_dataproject WHERE Project <> $project");
                            while ($r = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $r['Project'] ?>"><?= $r['Project'] . ' - ' . $r['ProjectName'] ?></option>
                            <?php
                            }
                        } else { ?>
                            <option value=""></option>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM dbo_dataproject");
                            while ($r = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $r['Project'] ?>"><?= $r['Project'] . ' - ' . $r['ProjectName'] ?></option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h6 class="fw-bold">Type/Status</h6>
            <hr class="w-25">
            <?php
            $i = 0;
            $query = mysqli_query($conn, "SELECT Stype,Ntype FROM dbo_datatype");
            while ($r = mysqli_fetch_array($query)) {
                $disabled = '';
                $checked = '';
                $sql = mysqli_query($conn, "SELECT Stype FROM dbo_datatypeassign WHERE Project='$project' AND Stype='$r[Stype]'");
                if (mysqli_num_rows($sql) <> 0) {
                    $checked = 'checked';
                }
                if ($r['Stype'] == 100 | $r['Stype'] == 999) {
                    $disabled = 'disabled';
                }
            ?>
                <p class="mb-0">
                    <input type="checkbox" name="<?= $r['Stype'] ?>" id="type<?= $i ?>" value="<?= $r['Stype'] ?>" <?= $disabled ?> <?= $checked ?> onchange="updatedatatypeassign(this.value,this.checked)"> <?= Getdata('Ntype', 'dbo_datatype', 'Stype', $r['Stype']) ?>
                </p>
            <?php
                $i += 1;
            }
            ?>
            <input type="text" value="<?= $i ?>" id="lenghtconfigassign" hidden>
        </div>

    </div>