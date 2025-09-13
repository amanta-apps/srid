<?php $project = base64_decode($_GET['n']);
$cc = base64_decode($_GET['c']); ?>
<div class="container">
    <div class="text-end"><button class="btn-sm btn-light zoom" onclick="redirectlink('createticket','<?= $project ?>')">✍️ Create Ticket</button></div>
    <div class="row">
        <div class="card p-3 mt-3">
            <div class="card border-gray-500 border-2 p-3">
                <h6 class="fw-bold mb-3">View Project</h6>
                <table class="table table-sm" style="vertical-align: bottom !important;" id="myTable2">
                    <thead class="bg-gray-300">
                        <tr>
                            <th>Project Name</th>
                            <?php
                            $query = mysqli_query($conn, "SELECT Stype FROM dbo_datatypeAssign WHERE Project=$project");
                            if (mysqli_num_rows($query) == 0) {
                                $query = mysqli_query($conn, "SELECT Stype FROM dbo_datatypeAssign WHERE Project=$project");
                            }
                            $Ltype = mysqli_num_rows($query);
                            while ($r = mysqli_fetch_array($query)) {
                                $data[] += $r['Stype'];
                            ?>
                                <th><?= Getdata('Ntype', 'dbo_datatype', 'Stype', $r['Stype'])  ?></th>
                            <?php
                            }
                            ?>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT SubProject,SubProjectName FROM dbo_datasubproject WHERE Project=$project");
                        while ($r = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?= $r['SubProjectName']  ?></td>
                                <?php
                                for ($i = 0; $i < $Ltype; $i++) { ?>
                                    <td style="width: 10%;"><a href="javascript:void(0);" onclick="redirectlink('listticket','<?= $project . '/' . $r['SubProjectName'] . '/' . $data[$i] ?>','<?= Getdata('ProjectName', 'dbo_dataproject', 'Project', $project)  ?>')"><?= getsumtiket($project, $r['SubProject'], $data[$i]) ?></a></td>
                                <?php }
                                ?>
                                <td><a href="javascript:void(0);" onclick="redirectlink('listticket','<?= $project . '/' . $r['SubProjectName'] . '/' . $data[$i] ?>','<?= Getdata('ProjectName', 'dbo_dataproject', 'Project', $project)  ?>')"><?= getsumtiket($project, $r['SubProject']) ?></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card border-gray-500 border-2 p-3 mt-3">
                <h6 class="fw-bold mb-3">Member</h6>
                <table class="table table-sm" id="myTable3">
                    <thead class="bg-gray-300">
                        <tr>
                            <th style="width: 20%;">Job Key</th>
                            <th>Person</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT Roles FROM dbo_datarole WHERE Project='$project'");
                        while ($r = mysqli_fetch_array($query)) {
                            $query2 = mysqli_query($conn, "SELECT * FROM dbo_dataassignrole WHERE Roles='$r[Roles]' ORDER BY KodeUser ASC");
                            while ($r = mysqli_fetch_array($query2)) {
                                $jobkey = Getdata('Jtype', 'dbo_dataassignjob', 'KodeUser', $r['KodeUser']);
                                $Jname = Getdata('JobName', 'dbo_datajob', 'Jtype', $jobkey);
                                $name = Getdata('FullName', 'dbo_datauser', 'KodeUser', $r['KodeUser']);
                        ?>
                                <tr>
                                    <td><?= $Jname ?></td>
                                    <td><?= $r['KodeUser'] . ' - ' . $name ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>