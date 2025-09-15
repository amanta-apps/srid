<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();
include 'koneksi.php';
// include_once 'getvalue.php';
$createdon = date("Y-m-d H:i:s");
$createdby = $_SESSION['pernr'];
$changedon = date("Y-m-d H:i:s");
$changedby = $_SESSION['pernr'];
$lastupdate = date("Y-m-d H:i:s");
$typess = $_POST['typess'];
$return = false;
$time = 3000;
$iconmsgs = 'error';
$msgs = "Something Wrong";
$NewImageName = '';
$ImageName = '';

if ($typess == 'document_coc') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=1");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datacoc_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datacoc_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datacoc_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        // move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_coc_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_wlkp') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=2");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datawlkp_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datawlkp_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datawlkp_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        // move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_wlkp_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_pkwt') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=3");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datapkwt_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datapkwt_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datapkwt_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        // move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_pkwt_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_lks') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=4");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datalks_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datalks_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datalks_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        // move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_lks_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_lks_img') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=5");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $imgid = $_POST['imgid'];
    $docname = $_POST['docname'];
    $docaddr = $_POST['docaddr'];
    $sql = mysqli_query($conn, "SELECT imgaddress  
                                    FROM table_datalks_g 
                                    WHERE imgid='$imgid'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $imgaddress = $r['imgaddress'];
        $file = $dir . $imgaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datalks_g SET imgthemes='$docname',
                                                                    imgaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE imgid ='$imgid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datalks_g (imgthemes,
                                                                imgaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        // move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_lks_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_sp_draft') {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=6");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir;
    if (!file_exists($temp)) {
        mkdir($temp, 0777, true);
    }

    $spid           = ltrim($_POST['spid'], '#') ?? '';
    $catatan        = $_POST['catatan'] ?? '';
    $dokno          = $_POST['dokno'] ?? '';
    $pernr          = $_POST['pernr'] ?? '';
    $jadwal         = $_POST['jadwal'] ?? '';
    $unit           = $_POST['unit'] ?? '';
    $eksekutor      = $_POST['rekonoleh'] ?? '';
    $bagian         = $_POST['bagian'] ?? '';
    $pelanggaran    = $_POST['pelanggaran'] ?? '';
    $sangsi         = $_POST['sangsi'] ?? '';
    $tglpelanggaran = $_POST['tglpelanggaran'] ?? '';
    $status         = $_POST['status'] ?? '';
    $typess         = $_POST['typess'] ?? '';



    if (!empty($_FILES['lampiran']['name'][0])) {
        $uploadedFiles = [];
        foreach ($_FILES['lampiran']['name'] as $key => $name) {
            $tmpName = $_FILES['lampiran']['tmp_name'][$key];
            $error   = $_FILES['lampiran']['error'][$key];
            $ImageName = $_FILES['lampiran']['name'];
            $ImageType  = $_FILES['lampiran']['type'];

            // if ($error === UPLOAD_ERR_OK) {
            $NewImageName   = date('dmYHis')  . '^^' . $name;
            $targetFile = $temp . $NewImageName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $query = mysqli_query($conn, "INSERT INTO table_datasp_d (spid,
                                                                            documenname,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$spid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                $return = true;
                $uploaded[] = $NewImageName;
            }
        }
    }

    if ($return) {
        mysqli_query($conn, "INSERT INTO table_datasp_doc (nodocumen,
                                                        tglpelanggaran,
                                                        pernr,
                                                        unitid,
                                                        unitbagian,
                                                        idviolation,
                                                        sancid,
                                                        jadwalrekon,
                                                        eksekutor,
                                                        spstatus,
                                                        createdon_renc,
                                                        createdby_renc)
                        VALUES('$dokno',
                                '$tglpelanggaran',
                                '$pernr',
                                '$unit',
                                '$bagian',
                                '$pelanggaran',
                                '$sangsi',
                                '$jadwal',
                                '$eksekutor',
                                '$status',
                                '$createdon',
                                '$createdby')");
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_sp_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $spid,
        "return" => $return
    ];
} elseif ($typess == 'document_farkes') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=7");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datafarkes_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datafarkes_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datafarkes_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_farkes_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_farkes_img') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=8");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $imgid = $_POST['imgid'];
    $docname = $_POST['docname'];
    $docaddr = $_POST['docaddr'];
    $sql = mysqli_query($conn, "SELECT imgaddress  
                                    FROM table_datafarkes_g 
                                    WHERE imgid='$imgid'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $imgaddress = $r['imgaddress'];
        $file = $dir . $imgaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datafarkes_g SET imgthemes='$docname',
                                                                    imgaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE imgid ='$imgid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datafarkes_g (imgthemes,
                                                                imgaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_farkes_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_p2k3') {
    if (isset($_FILES['fileupload']['tmp_name']) && $_FILES['fileupload']['tmp_name'] <> '') {
        $fileupload      = $_FILES['fileupload']['tmp_name'];
        $ImageName       = $_FILES['fileupload']['name'];
        $ImageType       = $_FILES['fileupload']['type'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=9");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $NewImageName   = date('dmYHis')  . '^^' . $ImageName;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp . $NewImageName);
    }
    $doc_id = $_POST['dokumenid'];
    $docname = $_POST['docname'];
    $sql = mysqli_query($conn, "SELECT documenaddress  
                                    FROM table_datap2k3_d 
                                    WHERE documenid='$doc_id'");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $documenaddress = $r['documenaddress'];
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
        }
        $query = mysqli_query($conn, "UPDATE table_datap2k3_d SET documenname='$docname',
                                                                    documenaddress='$NewImageName',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE documenid ='$doc_id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datap2k3_d (documenname,
                                                                documenaddress,
                                                                createdOn,
                                                                createdBy)

                                VALUES('$docname',
                                        '$NewImageName',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query === true) {
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_p2k3_display',
        "msgs" => $msgs,
        "time" => $time,
        "imagename" => $NewImageName,
        "return" => $return
    ];
} elseif ($typess == 'document_sidak_p2k3') {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=10");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir;
    if (!file_exists($temp)) {
        mkdir($temp, 0777, true);
    }
    include_once 'getvalue.php';
    $id = getai('table_datap2k3_s');
    $p2k3id       = $_POST['p2k3id'] ?? '';
    $catatan      = $_POST['catatan'] ?? '';
    $tgl          = $_POST['tgl'] ?? '';
    $pernr        = $_POST['pernr'] ?? '';
    $unitid       = $_POST['unitid'] ?? '';



    if (!empty($_FILES['lampiransidak']['name'][0])) {
        $uploadedFiles = [];
        foreach ($_FILES['lampiransidak']['name'] as $key => $name) {
            $tmpName = $_FILES['lampiransidak']['tmp_name'][$key];
            $error   = $_FILES['lampiransidak']['error'][$key];
            $ImageName = $_FILES['lampiransidak']['name'];
            $ImageType  = $_FILES['lampiransidak']['type'];

            // if ($error === UPLOAD_ERR_OK) {
            $NewImageName   = date('dmYHis')  . '^^' . $name;
            $targetFile = $temp . $NewImageName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $query = mysqli_query($conn, "INSERT INTO table_datap2k3_sd (p2k3id,
                                                                            imgsidak,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$id',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                $return = true;
                $uploaded[] = $NewImageName;
            }
        }
    }

    if ($return) {
        $query = mysqli_query($conn, "INSERT INTO table_datap2k3_s (tglsidak,
                                                        pernr,
                                                        unitid,
                                                        catatan,
                                                        createdon,
                                                        createdby)
                        VALUES('$tgl',
                                '$pernr',
                                '$unitid',
                                '$catatan',
                                '$createdon',
                                '$createdby')");
        if ($query) {
            $msgs = "Data Tersimpan";
            $iconmsgs = "success";
            $return = true;
        }
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_p2k3_display',
        "msgs" => $msgs,
        "time" => $time,
        "id" => $p2k3id,
        "return" => $return
    ];
} elseif ($typess == 'document_sido') {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=11");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir;
    if (!file_exists($temp)) {
        mkdir($temp, 0777, true);
    }

    include_once 'getvalue.php';
    $id = getai('table_datasido_e');
    $sidoid         = $_POST['sidoid'] ?? '';
    $tglfrom        = $_POST['tglfrom'] ?? '';
    $tglto          = $_POST['tglto'] ?? '';
    $catatan        = $_POST['catatan'] ?? '';
    $jeniskegiatan  = $_POST['jeniskegiatan'] ?? '';
    $namakegiatan   = $_POST['namakegiatan'] ?? '';



    if (!empty($_FILES['lampiransido']['name'][0])) {
        $uploadedFiles = [];
        foreach ($_FILES['lampiransido']['name'] as $key => $name) {
            $tmpName = $_FILES['lampiransido']['tmp_name'][$key];
            $error   = $_FILES['lampiransido']['error'][$key];
            $ImageName = $_FILES['lampiransido']['name'];
            $ImageType  = $_FILES['lampiransido']['type'];

            $NewImageName   = date('dmYHis')  . '^^' . $name;
            $targetFile = $temp . $NewImageName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $query = mysqli_query($conn, "INSERT INTO table_datasido_sd (sidoid,
                                                                            imgsido,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$id',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                $return = true;
                $uploaded[] = $NewImageName;
            }
        }
    }

    if ($return) {
        $query = mysqli_query($conn, "INSERT INTO table_datasido_e (taskid,
                                                        eventname,
                                                        tgleventfrom,
                                                        tgleventto,
                                                        descriptions,
                                                        createdon,
                                                        createdby)
                        VALUES('$jeniskegiatan',
                                '$namakegiatan',
                                '$tglfrom',
                                '$tglto',
                                '$catatan',
                                '$createdon',
                                '$createdby')");
        if ($query) {
            $msgs = "Data Tersimpan";
            $iconmsgs = "success";
            $return = true;
        }
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'md_sido_display',
        "msgs" => $msgs,
        "time" => $time,
        "id" => $sidoid,
        "return" => $return
    ];
} elseif ($typess == 'document_notice') {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=12");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir;
    if (!file_exists($temp)) {
        mkdir($temp, 0777, true);
    }

    include_once 'getvalue.php';
    $noticeid       = getai('table_datasido_h');
    $header         = $_POST['header'] ?? '';
    $catatan        = $_POST['catatan'] ?? '';



    if (!empty($_FILES['lampirannoticehead']['name'][0])) {
        $uploadedFiles = [];
        foreach ($_FILES['lampirannoticehead']['name'] as $key => $name) {
            $tmpName = $_FILES['lampirannoticehead']['tmp_name'][$key];
            $error   = $_FILES['lampirannoticehead']['error'][$key];
            $ImageName = $_FILES['lampirannoticehead']['name'];
            $ImageType  = $_FILES['lampirannoticehead']['type'];

            $NewImageName   = date('dmYHis')  . '^^' . $name;
            $targetFile = $temp . $NewImageName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $query = mysqli_query($conn, "INSERT INTO table_datanotice_d (noticeid,
                                                                            imgnotice,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$noticeid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                $return = true;
                $uploaded[] = $NewImageName;
            }
        }
    }

    if ($return) {
        $query = mysqli_query($conn, "INSERT INTO table_datanotice_h (header,
                                                        descriptions,
                                                        createdon,
                                                        createdby)
                        VALUES('$header',
                                '$catatan',
                                '$createdon',
                                '$createdby')");
        if ($query) {
            $msgs = "Data Tersimpan";
            $iconmsgs = "success";
            $return = true;
        }
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'adm_notice_display',
        "msgs" => $msgs,
        "time" => $time,
        "id" => $noticeid,
        "return" => $return
    ];
} elseif ($typess == 'document_seragam') {
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=13");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $temp = $dir;
    if (!file_exists($temp)) {
        mkdir($temp, 0777, true);
    }

    include_once 'getvalue.php';
    $srgmid       = getai('table_datasrgm_h');
    $unitid       = $_POST['unitid'] ?? '';
    $qty          = $_POST['qty'] ?? '';
    $unitid = explode(",", $unitid);
    foreach ($unitid as $unitid) {
        echo $val . "<br>";
    }
    $total = 0;

    // if (!empty($_FILES['lampiranseragamranc']['name'][0])) {
    //     $uploadedFiles = [];
    //     foreach ($_FILES['lampiranseragamranc']['name'] as $key => $name) {
    //         $tmpName = $_FILES['lampiranseragamranc']['tmp_name'][$key];
    //         $error   = $_FILES['lampiranseragamranc']['error'][$key];
    //         $ImageName = $_FILES['lampiranseragamranc']['name'];
    //         $ImageType  = $_FILES['lampiranseragamranc']['type'];

    //         $NewImageName   = date('dmYHis')  . '^^' . $name;
    //         $targetFile = $temp . $NewImageName;

    //         if (move_uploaded_file($tmpName, $targetFile)) {
    //             $query = mysqli_query($conn, "INSERT INTO table_datasrgm_d (srgmid,
    //                                                                         imgseragam,
    //                                                                         createdby,
    //                                                                         createdon) 
    //                                                 VALUES ('$srgmid',
    //                                                         '$NewImageName',
    //                                                         '$createdby',
    //                                                         '$createdon')");
    //             $return = true;
    //             $uploaded[] = $NewImageName;
    //         }
    //     }
    // }

    if ($return) {
        // $query = mysqli_query($conn, "INSERT INTO table_datasrgm_h (total,
        //                                                 createdon,
        //                                                 createdby)
        //                 VALUES('$total',
        //                         '$createdon',
        //                         '$createdby')");
        $query = mysqli_query($conn, "INSERT INTO table_datasrgm_h (total,
                                                        createdon,
                                                        createdby)
                        VALUES('$total',
                                '$createdon',
                                '$createdby')");
        if ($query) {
            $msgs = "Data Tersimpan";
            $iconmsgs = "success";
            $return = true;
        }
    }
    $data = [
        "iconmsgs" => $iconmsgs,
        "link" => 'adm_notice_display',
        "msgs" => $msgs,
        "time" => $time,
        "id" => $unitid,
        "return" => $return
    ];
}

echo json_encode($data);
