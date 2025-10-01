<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();
include 'koneksi.php';
include_once 'getvalue.php';
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
try {
    mysqli_begin_transaction($conn);
    if ($typess == 'document_coc') {

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=1");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }

        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $cocid     = $_POST['cocid'] ?? '';
        $docname    = $_POST['docname'] ?? '';
        $catatan    = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampirandokumencoc']['name'][0])) {
            foreach ($_FILES['lampirandokumencoc']['name'] as $key => $name) {
                $tmpName = $_FILES['lampirandokumencoc']['tmp_name'][$key];
                $error   = $_FILES['lampirandokumencoc']['error'][$key];
                $ImageName = $_FILES['lampirandokumencoc']['name'];
                $ImageType  = $_FILES['lampirandokumencoc']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datacoc_dt (cocid,
                                                                            imgcoc,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$cocid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT cocid  
                                    FROM table_datacoc_d 
                                    WHERE cocid='$cocid'");
        if (mysqli_num_rows($sql) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datacoc_d SET documenname='$docname',
                                                                    catatan='$catatan',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE cocid ='$cocid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datacoc_d ( cocid,
                                                                documenname,
                                                                catatan,
                                                                createdOn,
                                                                createdBy)

                                VALUES( '$cocid',
                                        '$docname',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Documen: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $link = "md_coc_display";
        $return = true;
        $id = $cocid;
    } elseif ($typess == 'document_wlkp') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=2");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $wlkpid     = $_POST['wlkpid'] ?? '';
        $docname    = $_POST['docname'] ?? '';
        $catatan    = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampirandokumenwlkp']['name'][0])) {
            foreach ($_FILES['lampirandokumenwlkp']['name'] as $key => $name) {
                $tmpName = $_FILES['lampirandokumenwlkp']['tmp_name'][$key];
                $error   = $_FILES['lampirandokumenwlkp']['error'][$key];
                $ImageName = $_FILES['lampirandokumenwlkp']['name'];
                $ImageType  = $_FILES['lampirandokumenwlkp']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datawlkp_dt (wlkpid,
                                                                            imgwlkp,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$wlkpid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT wlkpid  
                                    FROM table_datawlkp_d 
                                    WHERE wlkpid='$wlkpid'");
        if (mysqli_num_rows($sql) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datawlkp_d SET documenname='$docname',
                                                                    catatan='$catatan',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE wlkpid ='$wlkpid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datawlkp_d ( wlkpid,
                                                                documenname,
                                                                catatan,
                                                                createdOn,
                                                                createdBy)

                                VALUES( '$wlkpid',
                                        '$docname',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Documen: " . mysqli_error($conn));
        }

        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = "md_wlkp_display";
        $id = $wlkpid;
    } elseif ($typess == 'document_pkwt') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=3");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $pkwtid     = $_POST['pkwtid'] ?? '';
        $docname    = $_POST['docname'] ?? '';
        $catatan    = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampirandokumenpkwt']['name'][0])) {
            foreach ($_FILES['lampirandokumenpkwt']['name'] as $key => $name) {
                $tmpName = $_FILES['lampirandokumenpkwt']['tmp_name'][$key];
                $error   = $_FILES['lampirandokumenpkwt']['error'][$key];
                $ImageName = $_FILES['lampirandokumenpkwt']['name'];
                $ImageType  = $_FILES['lampirandokumenpkwt']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datapkwt_dt (pkwtid,
                                                                            imgpkwt,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$pkwtid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT pkwtid  
                                    FROM table_datapkwt_d 
                                    WHERE pkwtid='$pkwtid'");
        if (mysqli_num_rows($sql) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datapkwt_d SET documenname='$docname',
                                                                    catatan='$catatan',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE pkwtid ='$pkwtid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datapkwt_d ( pkwtid,
                                                                documenname,
                                                                catatan,
                                                                createdOn,
                                                                createdBy)

                                VALUES( '$pkwtid',
                                        '$docname',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Documen: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = "md_pkwt_display";
        $id = $pkwtid;
    } elseif ($typess == 'document_lks') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=4");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $lksid     = $_POST['lksid'] ?? '';
        $docname    = $_POST['docname'] ?? '';
        $catatan    = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampirandokumenlks']['name'][0])) {
            foreach ($_FILES['lampirandokumenlks']['name'] as $key => $name) {
                $tmpName = $_FILES['lampirandokumenlks']['tmp_name'][$key];
                $error   = $_FILES['lampirandokumenlks']['error'][$key];
                $ImageName = $_FILES['lampirandokumenlks']['name'];
                $ImageType  = $_FILES['lampirandokumenlks']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datalks_dt (lksid,
                                                                            imglks,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$lksid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT lksid  
                                    FROM table_datalks_d 
                                    WHERE lksid='$lksid'");
        if (mysqli_num_rows($sql) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datalks_d SET documenname='$docname',
                                                                    catatan='$catatan',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE lksid ='$lksid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datalks_d ( lksid,
                                                                documenname,
                                                                catatan,
                                                                createdOn,
                                                                createdBy)

                                VALUES( '$lksid',
                                        '$docname',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Documen: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = "md_lks_display";
        $id = $lksid;
    } elseif ($typess == 'document_lks_img') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=5");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp))
            mkdir($temp, 0777, true);

        $imgid     = $_POST['imgid'] ?? '';
        $docname    = $_POST['docname'] ?? '';
        $catatan    = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampirandokumenimg']['name'][0])) {
            foreach ($_FILES['lampirandokumenimg']['name'] as $key => $name) {
                $tmpName = $_FILES['lampirandokumenimg']['tmp_name'][$key];
                $error   = $_FILES['lampirandokumenimg']['error'][$key];
                $ImageName = $_FILES['lampirandokumenimg']['name'];
                $ImageType  = $_FILES['lampirandokumenimg']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datalks_gt (imgid,
                                                                            imgimg,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$imgid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT imgid  
                                    FROM table_datalks_g 
                                    WHERE imgid='$imgid'");
        if (mysqli_num_rows($sql) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datalks_g SET documenname='$docname',
                                                                    catatan='$catatan',
                                                                    changedon='$changedon',
                                                                    changedby='$changedby'
                                                                WHERE imgid ='$imgid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datalks_g ( imgid,
                                                                documenname,
                                                                catatan,
                                                                createdOn,
                                                                createdBy)

                                VALUES( '$imgid',
                                        '$docname',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Documen: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = "md_lks_display";
        $id = $imgid;
    } elseif ($typess == 'document_sidak_p2k3') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=10");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }

        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $p2k3id       = $_POST['p2k3id'] ?? '';
        $catatan      = $_POST['catatan'] ?? '';
        $tgl          = $_POST['tgl'] ?? '';
        $pernr        = $_POST['pernr'] ?? '';
        $unitid       = $_POST['unitid'] ?? '';

        if (!empty($_FILES['lampiransidak']['name'][0])) {
            foreach ($_FILES['lampiransidak']['name'] as $key => $name) {
                $tmpName = $_FILES['lampiransidak']['tmp_name'][$key];
                $error   = $_FILES['lampiransidak']['error'][$key];
                $ImageName = $_FILES['lampiransidak']['name'];
                $ImageType  = $_FILES['lampiransidak']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datap2k3_sd (p2k3id,
                                                                            imgsidak,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$p2k3id',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $query = mysqli_query($conn, "SELECT p2k3id FROM table_datap2k3_s WHERE p2k3id ='$p2k3id'");
        if (mysqli_num_rows($query) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datap2k3_s SET tglsidak='$tgl',
                                                            pernr='$pernr',
                                                            unitid='$unitid',
                                                            catatan='$catatan',
                                                            changedon='$changedon',
                                                            changedby='$changedby'
                                                WHERE p2k3id='$p2k3id'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datap2k3_s ( p2k3id,
                                                        tglsidak,
                                                        pernr,
                                                        unitid,
                                                        catatan,
                                                        createdon,
                                                        createdby)
                        VALUES( '$p2k3id',
                                '$tgl',
                                '$pernr',
                                '$unitid',
                                '$catatan',
                                '$createdon',
                                '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Header: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = 'md_p2k3_display';
        $data = [
            "iconmsgs" => $iconmsgs,
            "link" => $link,
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
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $sidoid         = $_POST['sidoid'] ?? '';
        $tglfrom        = $_POST['tglfrom'] ?? '';
        $tglto          = $_POST['tglto'] ?? '';
        $catatan        = $_POST['catatan'] ?? '';
        $jeniskegiatan  = $_POST['jeniskegiatan'] ?? '';
        $namakegiatan   = $_POST['namakegiatan'] ?? '';



        if (!empty($_FILES['lampiransido']['name'][0])) {
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
                                                    VALUES ('$sidoid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $query = mysqli_query($conn, "SELECT sidoid FROM table_datasido_e WHERE sidoid ='$sidoid '");
        if (mysqli_num_rows($query) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datasido_e SET taskid='$jeniskegiatan',
                                                            eventname='$namakegiatan',
                                                            tgleventfrom='$tglfrom',
                                                            tgleventto='$tglto',
                                                            descriptions='$catatan',
                                                            changedon='$changedon',
                                                            changedby='$changedby'
                                        WHERE sidoid='$sidoid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datasido_e (taskid,
                                                        eventname,
                                                        tgleventfrom,
                                                        tgleventto,
                                                        descriptions,
                                                        createdon,
                                                        createdby)
                        VALUES( '$jeniskegiatan',
                                '$namakegiatan',
                                '$tglfrom',
                                '$tglto',
                                '$catatan',
                                '$createdon',
                                '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Simpan & Update Header: " . mysqli_error($conn));
        }

        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $link = 'md_sido_display';
        $id = $sidoid;
        $return = true;
    } elseif ($typess == 'document_notice') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=12");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $noticeid       = $_POST['noticeid'] ?? '';
        $header         = $_POST['header'] ?? '';
        $catatan        = $_POST['catatan'] ?? '';



        if (!empty($_FILES['lampirannoticehead']['name'][0])) {
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
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }
        $query = mysqli_query($conn, "INSERT INTO table_datanotice_h (noticeid,
                                                                header,
                                                                descriptions,
                                                                createdon,
                                                                createdby)
                                VALUES ('$noticeid',
                                        '$header',
                                        '$catatan',
                                        '$createdon',
                                        '$createdby')
                                ON DUPLICATE KEY UPDATE
                                header      = VALUES(header),
                                descriptions= VALUES(descriptions),
                                changedon   = '$changedon',
                                changedby   = '$changedby'");
        if (!$query) {
            throw new Exception("Error Insert & Update DATA Header: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = 'adm_notice_display';
        $id = $noticeid;
    } elseif ($typess == 'document_seragam') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=13");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $srgmid         = $_POST['srgmid'] ?? '';
        $s_unitid       = $_POST['unitid'] ?? '';
        $s_qty          = $_POST['qty'] ?? '';
        $tglfrom          = $_POST['tglfrom'] ?? '';
        $tglto          = $_POST['tglto'] ?? '';
        $total          = $_POST['total'] ?? '';
        $stats          = $_POST['status'] ?? '';
        $catatan        = $_POST['catatan'] ?? '';
        $unitid         = explode(",", $s_unitid);
        $qty            = explode(",", $s_qty);
        $lenght         = count($unitid);

        if (!empty($_FILES['lampiranseragamranc']['name'][0])) {
            foreach ($_FILES['lampiranseragamranc']['name'] as $key => $name) {
                $tmpName = $_FILES['lampiranseragamranc']['tmp_name'][$key];
                $error   = $_FILES['lampiranseragamranc']['error'][$key];
                $ImageName = $_FILES['lampiranseragamranc']['name'];
                $ImageType  = $_FILES['lampiranseragamranc']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datasrgm_d (srgmid,
                                                                            imgseragam,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$srgmid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan table_datasrgm_d: " . mysqli_error($conn));
                    }
                }
            }
        }

        $z = 0;
        for ($i = 0; $i < $lenght; $i++) {
            $query = mysqli_query($conn, "INSERT INTO table_datasrgm_dt (   srgmid,
                                                                            unitid,
                                                                            rancqty,
                                                                            realqty,
                                                                            createdon,
                                                                            createdby)
                        VALUES( '$srgmid',
                                '$unitid[$i]',
                                '$qty[$i]',
                                '$qty[$i]',
                                '$createdon',
                                '$createdby')");
        }

        $query = mysqli_query($conn, "INSERT INTO table_datasrgm_h (tglfrom,
                                                        tglto,
                                                        totalranc,
                                                        catatanranc,
                                                        rancangan,
                                                        statsx,
                                                        createdon,
                                                        createdby)
                        VALUES( '$tglfrom',
                                '$tglto',
                                '$total',
                                '$catatan',
                                'X',
                                '$stats',
                                '$createdon',
                                '$createdby')");
        if (!$query) {
            throw new Exception("Error Insert & Update DATA: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = 'adm_seragam_display';
        $id = $srgmid;
    } elseif ($typess == 'document_parcel') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=15");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        include_once 'getvalue.php';
        $parcelid         = getai('table_dataparcel_h');
        $s_unitid       = $_POST['unitid'] ?? '';
        $s_qty          = $_POST['qty'] ?? '';
        $tglfrom          = $_POST['tglfrom'] ?? '';
        $tglto          = $_POST['tglto'] ?? '';
        $total          = $_POST['total'] ?? '';
        $stats          = $_POST['status'] ?? '';
        $catatan        = $_POST['catatan'] ?? '';
        $unitid         = explode(",", $s_unitid);
        $qty            = explode(",", $s_qty);
        $lenght         = count($unitid);

        if (!empty($_FILES['lampiranparcelranc']['name'][0])) {
            foreach ($_FILES['lampiranparcelranc']['name'] as $key => $name) {
                $tmpName = $_FILES['lampiranparcelranc']['tmp_name'][$key];
                $error   = $_FILES['lampiranparcelranc']['error'][$key];
                $ImageName = $_FILES['lampiranparcelranc']['name'];
                $ImageType  = $_FILES['lampiranparcelranc']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_dataparcel_d (parcelid,
                                                                            imgparcel,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$parcelid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        if ($return) {
            $z = 0;
            for ($i = 0; $i < $lenght; $i++) {
                $query = mysqli_query($conn, "INSERT INTO table_dataparcel_dt ( parcelid,
                                                                            unitid,
                                                                            rancqty,
                                                                            realqty,
                                                                            createdon,
                                                                            createdby)
                        VALUES( '$parcelid',
                                '$unitid[$i]',
                                '$qty[$i]',
                                '$qty[$i]',
                                '$createdon',
                                '$createdby')");
            }

            $query = mysqli_query($conn, "INSERT INTO table_dataparcel_h (tglfrom,
                                                        tglto,
                                                        totalranc,
                                                        catatanranc,
                                                        rancangan,
                                                        statsx,
                                                        createdon,
                                                        createdby)
                        VALUES( '$tglfrom',
                                '$tglto',
                                '$total',
                                '$catatan',
                                'X',
                                '$stats',
                                '$createdon',
                                '$createdby')");
            if (!$query) {
                throw new Exception("Error Insert & Update DATA: " . mysqli_error($conn));
            }
            $link = 'adm_parcel_display';
            $id = $parcelid;
            $msgs = "Data Tersimpan";
            $iconmsgs = "success";
            $return = true;
        }
    } elseif ($typess == 'document_surat') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=16");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $suratid      = $_POST['suratid'] ?? '';
        $jenis        = $_POST['jenis'] ?? '';
        $kop          = $_POST['kop'] ?? '';
        $terbit       = $_POST['terbit'] ?? '';
        $pernr        = $_POST['pernr'] ?? '';
        $unitid       = $_POST['unitid'] ?? '';

        if (!empty($_FILES['lampiransuratcreate']['name'][0])) {
            foreach ($_FILES['lampiransuratcreate']['name'] as $key => $name) {
                $tmpName = $_FILES['lampiransuratcreate']['tmp_name'][$key];
                $error   = $_FILES['lampiransuratcreate']['error'][$key];
                $ImageName = $_FILES['lampiransuratcreate']['name'];
                $ImageType  = $_FILES['lampiransuratcreate']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datasurat_d (suratid,
                                                                            imgsurat,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$suratid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $query = mysqli_query($conn, "SELECT suratid FROM table_datasurat_h WHERE suratid='$suratid'");
        if (mysqli_num_rows($query) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datasurat_h SET srtid='$jenis',
                                                            kopheader='$kop',
                                                            terbit='$terbit',
                                                            pernr='$pernr',
                                                            unitid='$unitid',
                                                            changedon='$changedon',
                                                            changedby='$changedby'
                                        WHERE suratid='$suratid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datasurat_h (srtid,
                                                        kopheader,
                                                        terbit,
                                                        pernr,
                                                        unitid,
                                                        createdon,
                                                        createdby)
                        VALUES( '$jenis',
                                '$kop',
                                '$terbit',
                                '$pernr',
                                '$unitid',
                                '$createdon',
                                '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Simpan & Update Header: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $return = true;
        $link = 'adm_surat_display';
        $id = $suratid;
    } elseif ($typess == 'document_pkl') {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=17");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        } else {
            throw new Exception("Error Direction: " . mysqli_error($conn));
        }
        $temp = $dir;
        if (!file_exists($temp)) {
            mkdir($temp, 0777, true);
        }

        $pklid       = $_POST['pklid'] ?? '';
        $pkltype     = $_POST['pkltype'] ?? '';
        $nama        = $_POST['nama'] ?? '';
        $instansi    = $_POST['instansi'] ?? '';
        $tglfrom     = $_POST['tglfrom'] ?? '';
        $tglto       = $_POST['tglto'] ?? '';
        $unitid      = $_POST['unitid'] ?? '';
        $pic         = $_POST['pic'] ?? '';
        $status      = $_POST['status'] ?? '';
        $catatan     = $_POST['catatan'] ?? '';

        if (!empty($_FILES['lampiranpklcreate']['name'][0])) {
            foreach ($_FILES['lampiranpklcreate']['name'] as $key => $name) {
                $tmpName = $_FILES['lampiranpklcreate']['tmp_name'][$key];
                $error   = $_FILES['lampiranpklcreate']['error'][$key];
                $ImageName = $_FILES['lampiranpklcreate']['name'];
                $ImageType  = $_FILES['lampiranpklcreate']['type'];

                $NewImageName   = date('dmYHis')  . '^^' . $name;
                $targetFile = $temp . $NewImageName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $query = mysqli_query($conn, "INSERT INTO table_datapkl_d (pklid,
                                                                            imgpkl,
                                                                            createdby,
                                                                            createdon) 
                                                    VALUES ('$pklid',
                                                            '$NewImageName',
                                                            '$createdby',
                                                            '$createdon')");
                    if (!$query) {
                        if (file_exists($targetFile)) {
                            unlink($targetFile);
                        }
                        throw new Exception("Error Simpan Document: " . mysqli_error($conn));
                    }
                }
            }
        }

        $query = mysqli_query($conn, "SELECT pklid FROM table_datapkl_h WHERE pklid='$pklid'");
        if (mysqli_num_rows($query) <> 0) {
            $query = mysqli_query($conn, "UPDATE table_datapkl_h SET namaorg='$nama',
                                                            instansi='$instansi',
                                                            tglfrom='$tglfrom',
                                                            tglto='$tglto',
                                                            unitdest='$unitid',
                                                            picunit='$pic',
                                                            jenispkl='$pkltype',
                                                            catatan='$catatan',
                                                            statsx='$status',
                                                            changedon='$changedon',
                                                            changedby='$changedby'
                                        WHERE pklid='$pklid'");
        } else {
            $query = mysqli_query($conn, "INSERT INTO table_datapkl_h (pklid,
                                                        namaorg,
                                                        instansi,
                                                        tglfrom,
                                                        tglto,
                                                        unitdest,
                                                        picunit,
                                                        jenispkl,
                                                        catatan,
                                                        statsx,
                                                        createdon,
                                                        createdby)
                        VALUES( '$pklid',
                                '$nama',
                                '$instansi',
                                '$tglfrom',
                                '$tglto',
                                '$unitid',
                                '$pic',
                                '$pkltype',
                                '$catatan',
                                '$status',
                                '$createdon',
                                '$createdby')");
        }
        if (!$query) {
            throw new Exception("Error Insert & Update Header: " . mysqli_error($conn));
        }
        $msgs = "Data Tersimpan";
        $iconmsgs = "success";
        $link = "adm_pkl_display";
        $id = $pklid;
        $return = true;
    }
    mysqli_commit($conn);
} catch (Exception $e) {
    mysqli_rollback($conn);
    $msgs = $e->getMessage();
    datalog($e->getMessage());
}

$data = [
    "iconmsgs" => $iconmsgs,
    "link" => $link,
    "msgs" => $msgs,
    "time" => $time,
    "id" => $id,
    "return" => $return
];

echo json_encode($data);
