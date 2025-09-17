<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();
include "koneksi.php";
include_once 'getvalue.php';
$pernr = $_SESSION['pernr'];
$createdon = date("Y-m-d H:i:s");
$createdby = $pernr;
$changedon = date("Y-m-d H:i:s");
$changedby = $pernr;
$deletedon = date("Y-m-d H:i:s");
$deletedby = $pernr;
$msgs = "Something Wrong";
$icon_msgs = "error";
$time = 3000;
$return = false;
$p = $_SESSION['p'];
$project = 'SRID';
$data = array();

$plant = $_SESSION['plant'];
if (isset($_GET['p'])) {
    $page = base64_decode($_GET['p']);
    // echo $page;
    switch ($page) {
        // -----> Dashboard Karyawan
        case 'dashboard':
            $_SESSION['p'] = 'Dashboard';
            include "internalpage/datapublic/page_dashboard.php";
            break;
        case 'information_pkb':
            $_SESSION['p'] = 'Information PKB';
            include "internalpage/datainformation/page_pkb.php";
            break;
        case 'information_coc':
            $_SESSION['p'] = 'internalpage/Information COC';
            include "internalpage/datainformation/page_coc.php";
            break;
        case 'information_wlkp':
            $_SESSION['p'] = 'Information WLKP';
            include "internalpage/datainformation/page_wlkp.php";
            break;
        case 'information_pkwt':
            $_SESSION['p'] = 'Information PKWT';
            include "internalpage/datainformation/page_pkwt.php";
            break;
        case 'information_lks':
            $_SESSION['p'] = 'Information LKS';
            include "internalpage/datainformation/page_lks.php";
            break;
        case 'information_seragam':
            $_SESSION['p'] = 'Information Seragam';
            include "internalpage/datainformation/page_seragam.php";
            break;

        // ------> END Dashboard Karyawan

        // -----> MD Administrator
        // ---> PKB
        case 'md_pkb_create':
            $_SESSION['p'] = 'Master Data PKB';
            include "datamaster/page_md_pkb_create.php";
            break;
        case 'md_pkb_display':
            $_SESSION['p'] = 'Master Data PKB';
            include "datamaster/page_md_pkb_display.php";
            break;
        // ---> COC
        case 'md_coc_display':
            $_SESSION['p'] = 'Master Data COC';
            include "datamaster/page_md_coc_display.php";
            break;
        case 'md_coc_head_create':
            $_SESSION['p'] = 'Master Data COC';
            include "datamaster/page_md_coc_head_create.php";
            break;
        case 'md_coc_doc_create':
            $_SESSION['p'] = 'Master Data COC';
            include "datamaster/page_md_coc_doc_create.php";
            break;
        case 'md_coc_event_create':
            $_SESSION['p'] = 'Master Data COC';
            include "datamaster/page_md_coc_event_create.php";
            break;
        case 'md_coc_event_create':
            $_SESSION['p'] = 'Master Data COC';
            include "datamaster/page_md_coc_event_create.php";
            break;
        // ---> WLKP
        case 'md_wlkp_display':
            $_SESSION['p'] = 'Master Data WLKP';
            include "datamaster/page_md_wlkp_display.php";
            break;
        case 'md_wlkp_head_create':
            $_SESSION['p'] = 'Master Data WLKP';
            include "datamaster/page_md_wlkp_head_create.php";
            break;
        case 'md_wlkp_doc_create':
            $_SESSION['p'] = 'Master Data WLKP';
            include "datamaster/page_md_wlkp_doc_create.php";
            break;
        // ---> PKWT
        case 'md_pkwt_display':
            $_SESSION['p'] = 'Master Data PKWT';
            include "datamaster/page_md_pkwt_display.php";
            break;
        case 'md_pkwt_head_create':
            $_SESSION['p'] = 'Master Data PKWT';
            include "datamaster/page_md_pkwt_head_create.php";
            break;
        case 'md_pkwt_doc_create':
            $_SESSION['p'] = 'Master Data PKWT';
            include "datamaster/page_md_pkwt_doc_create.php";
            break;
        // ---> LKS
        case 'md_lks_display':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_lks_display.php";
            break;
        case 'md_lks_head_create':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_lks_head_create.php";
            break;
        case 'md_lks_doc_create':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_lks_doc_create.php";
            break;
        case 'md_lks_news_create':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_lks_news_create.php";
            break;
        case 'md_lks_img_create':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_lks_img_create.php";
            break;
        // ---> SP
        case 'md_sp_display':
            $_SESSION['p'] = 'Master Data LKS';
            include "datamaster/page_md_sp_display.php";
            break;
        case 'md_sp_draft_create':
            $_SESSION['p'] = 'Data SP';
            include "datamaster/page_md_sp_draft_create.php";
            break;
        case 'md_sp_bina':
            $_SESSION['p'] = 'Data SP';
            include "datamaster/page_md_sp_bina.php";
            break;
        // ---> Farkes
        case 'md_farkes_display':
            $_SESSION['p'] = 'Data Farkes';
            include "datamaster/page_md_farkes_display.php";
            break;
        case 'md_farkes_head_create':
            $_SESSION['p'] = 'Master Data FARKES';
            include "datamaster/page_md_farkes_head_create.php";
            break;
        case 'md_farkes_doc_create':
            $_SESSION['p'] = 'Master Data FARKES';
            include "datamaster/page_md_farkes_doc_create.php";
            break;
        case 'md_farkes_news_create':
            $_SESSION['p'] = 'Master Data FARKES';
            include "datamaster/page_md_farkes_news_create.php";
            break;
        case 'md_farkes_img_create':
            $_SESSION['p'] = 'Master Data FARKES';
            include "datamaster/page_md_farkes_img_create.php";
            break;
        // ---> P2K3
        case 'md_p2k3_display':
            $_SESSION['p'] = 'Data P2K3';
            include "datamaster/page_md_p2k3_display.php";
            break;
        case 'md_p2k3_head_create':
            $_SESSION['p'] = 'Master Data P2K3';
            include "datamaster/page_md_p2k3_head_create.php";
            break;
        case 'md_p2k3_doc_create':
            $_SESSION['p'] = 'Master Data P2K3';
            include "datamaster/page_md_p2k3_doc_create.php";
            break;
        case 'md_p2k3_news_create':
            $_SESSION['p'] = 'Master Data P2K3';
            include "datamaster/page_md_p2k3_news_create.php";
            break;
        case 'md_p2k3_sidak_create':
            $_SESSION['p'] = 'Master Data P2K3';
            include "datamaster/page_md_p2k3_sidak_create.php";
            break;
        // ---> Sido
        case 'md_sido_display':
            $_SESSION['p'] = 'Data P2K3';
            include "datamaster/page_md_sido_display.php";
            break;
        case 'md_sido_head_create':
            $_SESSION['p'] = 'Master Data sido';
            include "datamaster/page_md_sido_head_create.php";
            break;
        case 'md_sido_doc_create':
            $_SESSION['p'] = 'Master Data P2K3';
            include "datamaster/page_md_sido_doc_create.php";
            break;

        // ---> Notice
        case 'adm_notice_display':
            $_SESSION['p'] = 'Master Data Notice';
            include "datapersonal/page_adm_notice_display.php";
            break;
        case 'adm_notice_head_create':
            $_SESSION['p'] = 'Master Data Notice';
            include "datapersonal/page_adm_notice_head_create.php";
            break;


        // ---> PKL
        case 'adm_pkl_display':
            $_SESSION['p'] = 'Master Data PKL';
            include "datapersonal/page_adm_pkl_display.php";
            break;

        // ---> Seragam
        case 'adm_seragam_display':
            $_SESSION['p'] = 'Master Data Seragam';
            include "datapersonal/page_adm_seragam_display.php";
            break;
        case 'adm_seragam_ranc_create':
            $_SESSION['p'] = 'Rancangan Seragam';
            include "datapersonal/page_adm_seragam_ranc_create.php";
            break;
        case 'adm_srgm_detail':
            $_SESSION['p'] = 'Detail Rancangan Seragam';
            include "datapersonal/page_adm_srgm_detail.php";
            break;
        case 'adm_seragam_real_create':
            $_SESSION['p'] = 'Realisasi Seragam';
            include "datapersonal/page_adm_seragam_real_create.php";
            break;
        // ---> Parcel
        case 'adm_parcel_display':
            $_SESSION['p'] = 'Master Data Parcel';
            include "datapersonal/page_adm_parcel_display.php";
            break;
        case 'adm_parcel_ranc_create':
            $_SESSION['p'] = 'Rancangan parcel';
            include "datapersonal/page_adm_parcel_ranc_create.php";
            break;
        case 'adm_parcel_detail':
            $_SESSION['p'] = 'Detail Rancangan Parcel';
            include "datapersonal/page_adm_parcel_detail.php";
            break;
        case 'adm_parcel_real_create':
            $_SESSION['p'] = 'Realisasi parcel';
            include "datapersonal/page_adm_parcel_real_create.php";
            break;
        // ---> Surat Menyurat
        case 'adm_surat_display':
            $_SESSION['p'] = 'Master Data Surat';
            include "datapersonal/page_adm_surat_display.php";
            break;
        case 'adm_surat_create':
            $_SESSION['p'] = 'Master Data Surat';
            include "datapersonal/page_adm_surat_create.php";
            break;
        case 'adm_surat_detail':
            $_SESSION['p'] = 'Master Data Surat';
            include "datapersonal/page_adm_surat_detail.php";
            break;


        // -----> END MD Administrator
        case 'download':
            $_SESSION['p'] = 'Master Data LKS';
            include "datapublic/download.php";
            break;
        // -----> Database
        case 'database':
            $_SESSION['p'] = 'database';
            include "datapublic/page_database.php";
            break;
        // -----> End Database
        // -----> End Administrator


        default:
            $output = '<div class="container">';
            // $output .= '<div class="card shadow-lg border-0" id="cardcolor" style="min-height:100px !important">';
            $output .= '<center style="min-height:100px !important;margin-top:200px !important">';
            // $output .= '<img src="../asset/img/yaoming.png" class="img-fluid" style="background-color:transparant !important">';
            $output .= '<h4 class="fw-bold">Page Not Found</h4>';
            $output .= '<h4>ERROR 404</h4>';
            $output .= '</center>';
            $output .= '</div>';
            echo $output;
            break;
    }
}

// ---------------->> Login
if (isset($_POST['proseslogin'])) {
    $userid = $_POST['proseslogin'][0];
    $pass = md5($_POST['proseslogin'][1]);
    $return = false;
    $icon = 'warning';

    $query = mysqli_query($conn, "SELECT * FROM table_datauser WHERE (pernr='$userid' OR emailuser='$userid') AND
                                                                    initialpassword = '$pass'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        if ($r['Locked'] <> 0) {
            $pesan = "Login Gagal";
        } else {
            $_SESSION['pernr'] = $r['pernr'];
            $_SESSION['personame'] = $r['personname'];
            $_SESSION['password'] = $r['initialpassword'];
            $_SESSION['email'] = $r['emailuser'];
            $_SESSION['project'] = $project;
            $pesan = "Login Sukses";
            $icon = 'success';
            $return = true;
        }
        $data = [
            "pernr" => $r['pernr'],
            "personame" => $r['personName'],
            "password" => $r['initialpassword'],
            "email" => $r['emailuser'],
        ];
    }
    $data = [
        "project" => $project,
        "icon" => $icon,
        "position" => 'top-end',
        "pesan" => $pesan,
        "return" => $return,
        "link" => base64_encode('dashboard')
    ];
    echo json_encode($data);
}
if (isset($_POST['proseslogoutsystem'])) {
    session_destroy();
    $data = [
        "return" => true,
        "link" => "http://19.0.2.244:8080/newsrids/"
    ];
    echo json_encode($data);
}
// ---------------->> Barang

// ---------------->> Direct Link
if (isset($_POST['prosesredirectlink'])) {
    $link = base64_encode($_POST['prosesredirectlink'][0]);
    $values = base64_encode($_POST['prosesredirectlink'][1]);
    $title = base64_encode($_POST['prosesredirectlink'][2]);
    $cc = base64_encode($_POST['prosesredirectlink'][3]);

    $linked = $link . '&n=' . $values . '&t=' . $title;
    if ($title == '' & $values <> '') {
        $linked = $link . '&n=' . $values;
    } elseif ($title <> '' & $values == '') {
        $linked = $link . '&t=' . $title;
    } elseif ($title == '' & $values == '') {
        $linked = $link;
    }
    if ($cc <> '') {
        $linked = $linked . '&c=' . $cc;
    }

    $data = [
        "link" => $linked,
        "title" => $title
    ];
    echo json_encode($data);
}
// ---------------->> Download

if (isset($_POST['prosesdownloadlink'])) {
    $jenis = $_POST['prosesdownloadlink'][0];
    $addr = $_POST['prosesdownloadlink'][1];

    $r = mysqli_fetch_array($query = mysqli_query($conn, "SELECT * FROM table_datadirections 
                                    WHERE directionsid='$jenis'"));
    // if ($query) {
    $return = true;
    // }
    $linked = $r['drtext'] . $addr;

    $data = [
        "link" => $linked,
        "return" => $return
    ];
    echo json_encode($data);
}

// ---------------->> Delete Img Lampiran

if (isset($_POST['prosesdeleteimg'])) {
    $imgaddress = $_POST['prosesdeleteimg'][0];
    $dir = $_POST['prosesdeleteimg'][1];
    $table = $_POST['prosesdeleteimg'][2];
    $keys = $_POST['prosesdeleteimg'][3];

    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=$dir");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $file = $dir . $imgaddress;
    if (file_exists($file)) {
        unlink($file);
    }
    $query = mysqli_query($conn, "DELETE FROM $table
                                    WHERE documenid = '$keys'");

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => null,
        "norevisi" => $id,
        "return" => $return,
    ];
    echo json_encode($data);
}

// ---------------->> Master Data
// -----> PKB
if (isset($_POST['prosessubmitmdpkb'])) {
    $norevisi = $_POST['prosessubmitmdpkb'][0];
    $header = $_POST['prosessubmitmdpkb'][1];
    $link = $_POST['prosessubmitmdpkb'][2];
    $descriptions = $_POST['prosessubmitmdpkb'][3];
    $return = false;
    $stasx = 1;
    $query = mysqli_query($conn, "SELECT norevisi FROM table_datapkb WHERE norevisi='$norevisi'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datapkb 
                                        SET descriptions='$header',
                                            link='$link',
                                            text_descriptions='$descriptions',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE norevisi='$norevisi'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datapkb (descriptions,
                                                            link,
                                                            text_descriptions,
                                                            statsactive,
                                                            createdon,
                                                            createdby)
                                VALUES ('$header',
                                        '$link',
                                        '$descriptions',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_pkb_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_pkb'])) {
    $norevisi = $_POST['prosesdelete_head_pkb'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datapkb 
                                    WHERE norevisi='$norevisi'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_pkb_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
// -----> COC
if (isset($_POST['prosessubmitmdcoc'])) {
    $norevisi = $_POST['prosessubmitmdcoc'][0];
    $header = $_POST['prosessubmitmdcoc'][1];
    $descriptions = $_POST['prosessubmitmdcoc'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT cocid FROM table_datacoc_h WHERE cocid='$norevisi'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datacoc_h 
                                        SET cocdescriptions='$descriptions',
                                            cochead='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE cocid='$norevisi'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datacoc_h (cocdescriptions,
                                                                    cochead,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_coc_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_coc'])) {
    $norevisi = $_POST['prosesdelete_head_coc'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datacoc_h 
                                    WHERE cocid='$norevisi'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_coc_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdcocevent'])) {
    $calenderid = $_POST['prosessubmitmdcocevent'][0];
    $eventname = $_POST['prosessubmitmdcocevent'][1];
    $mulai = $_POST['prosessubmitmdcocevent'][2];
    $selesai = $_POST['prosessubmitmdcocevent'][3];
    $eventorg = $_POST['prosessubmitmdcocevent'][4];
    $fasilitor = $_POST['prosessubmitmdcocevent'][5];
    $topik = $_POST['prosessubmitmdcocevent'][6];
    $lokasi = $_POST['prosessubmitmdcocevent'][7];

    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT calenderid FROM table_datacoc_e WHERE calenderid='$calenderid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datacoc_e 
                                        SET eventname='$eventname',
                                            eventstart='$mulai',
                                            eventfinish='$selesai',
                                            eventfacilitor='$fasilitor',
                                            eventorganizer='$eventorg',
                                            eventtopics='$topik',
                                            eventlocation='$lokasi',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE calenderid='$calenderid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datacoc_e (eventname,
                                                                    eventstart,
                                                                    eventfinish,
                                                                    eventfacilitor,
                                                                    eventorganizer,
                                                                    eventtopics,
                                                                    eventlocation,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$eventname',
                                        '$mulai',
                                        '$selesai',
                                        '$fasilitor',
                                        '$eventorg',
                                        '$topik',
                                        '$lokasi',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_coc_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_event_coc'])) {
    $calenderid = $_POST['prosesdelete_event_coc'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datacoc_e
                                    WHERE calenderid='$calenderid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_coc_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_coc'])) {
    $docid = $_POST['prosesdelete_doc_coc'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datacoc_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=1");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datacoc_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_coc_display",
        "id" => $documenid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> WLKP
if (isset($_POST['prosessubmitmdwlkp'])) {
    $wlkpid = $_POST['prosessubmitmdwlkp'][0];
    $header = $_POST['prosessubmitmdwlkp'][1];
    $descriptions = $_POST['prosessubmitmdwlkp'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT wlkpid FROM table_datawlkp_h WHERE wlkpid='$wlkpid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datawlkp_h 
                                        SET wlkpdescriptions='$descriptions',
                                            wlkpheader='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE wlkpid='$wlkpid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datawlkp_h (wlkpdescriptions,
                                                                    wlkpheader,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_wlkp_display",
        "norevisi" => $norevisi,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_wlkp'])) {
    $wlkpid = $_POST['prosesdelete_head_wlkp'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datawlkp_h 
                                    WHERE wlkpid='$wlkpid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_wlkp_display",
        "wlkpid" => $wlkpid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_wlkp'])) {
    $docid = $_POST['prosesdelete_doc_wlkp'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datawlkp_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=2");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datawlkp_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_wlkp_display",
        "id" => $documenid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> PKWT
if (isset($_POST['prosessubmitmdpkwt'])) {
    $pkwtid = $_POST['prosessubmitmdpkwt'][0];
    $header = $_POST['prosessubmitmdpkwt'][1];
    $descriptions = $_POST['prosessubmitmdpkwt'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT pkwtid FROM table_datapkwt_h WHERE pkwtid='$pkwtid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datapkwt_h 
                                        SET pkwtdescriptions='$descriptions',
                                            pkwtheader='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE pkwtid='$pkwtid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datapkwt_h (pkwtdescriptions,
                                                                    pkwtheader,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_pkwt_display",
        "pkwtid" => $pkwtid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_pkwt'])) {
    $pkwtid = $_POST['prosesdelete_head_pkwt'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datapkwt_h
                                    WHERE pkwtid='$pkwtid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_pkwt_display",
        "pkwtid" => $pkwtid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_pkwt'])) {
    $docid = $_POST['prosesdelete_doc_pkwt'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datapkwt_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=3");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datapkwt_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_pkwt_display",
        "id" => $docid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> LKS
if (isset($_POST['prosessubmitmdlks'])) {
    $lksid = $_POST['prosessubmitmdlks'][0];
    $header = $_POST['prosessubmitmdlks'][1];
    $descriptions = $_POST['prosessubmitmdlks'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT lksid FROM table_datalks_h WHERE lksid='$lksid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datalks_h 
                                        SET lksdescriptions='$descriptions',
                                            lksheader='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE lksid='$lksid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datalks_h (lksdescriptions,
                                                                    lksheader,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "pkwtid" => $pkwtid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_lks'])) {
    $lksid = $_POST['prosesdelete_head_lks'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datalks_h
                                    WHERE lksid='$lksid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "lksid" => $lksid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdnewslks'])) {
    $newsid = $_POST['prosessubmitmdnewslks'][0];
    $editor = $_POST['prosessubmitmdnewslks'][1];
    $kontent = $_POST['prosessubmitmdnewslks'][2];
    $title = $_POST['prosessubmitmdnewslks'][3];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT newsid FROM table_datalks_n WHERE newsid='$newsid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datalks_n 
                                        SET newseditor='$editor',
                                            newscontent='$kontent',
                                            newstitle='$title',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE newsid='$newsid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datalks_n (newseditor,
                                                                    newstitle,
                                                                    newscontent,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$editor',
                                        '$title',
                                        '$kontent',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "pkwtid" => $pkwtid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_news_lks'])) {
    $newsid = $_POST['prosesdelete_news_lks'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datalks_n
                                    WHERE newsid='$newsid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "newsid" => $newsid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_lks'])) {
    $docid = $_POST['prosesdelete_doc_lks'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datalks_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=4");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datalks_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "id" => $docid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_img_lks'])) {
    $imgid = $_POST['prosesdelete_img_lks'];
    $query = mysqli_query($conn, "SELECT imgaddress
                                     FROM table_datalks_g 
                                     WHERE imgid='$imgid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $imgaddress = $r['imgaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=5");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $imgaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datalks_g WHERE imgid='$imgid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_lks_display",
        "id" => $imgid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> SP
if (isset($_POST['prosesselectspdatabina'])) {
    $spid = $_POST['prosesselectspdatabina'];
    $return = false;
    $dokumen = '';
    $datakar = '';
    $datasp = '';
    $datapembina = '';
    $data = array();

    $query = mysqli_query($conn, "SELECT * FROM table_datasp_doc WHERE spid='$spid' AND spstatus='NEW'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $pernr_pembina = $r['eksekutor'];
        $pembina = $r['eksekutor'] . " - " . Getdata('namekar', 'table_databuruh', 'pernr', $r['eksekutor']);
        $datakar = '
                <table class="table table-sm w-100">
                    <thead>
                        <tr>
                            <th>Pernr</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Bagian</th>
                        </tr>
                    </thead>
                    <section id="t_karyawandatabina" hidden>
                        <tbody>
                            <tr>
                                <td>' . $r['pernr'] . '</td>
                                <td>' . $name = Getdata('namekar', 'table_databuruh', 'pernr', $r["pernr"]) . '</td>
                                <td>' . $r['unitid'] . '</td>
                                <td>' . $r['unitbagian'] . '</td>
                            </tr>
                        </tbody>
                    </section>
                </table>
        ';
        $datasp = '
                <table class="table table-sm w-50">
                    <thead>
                        <tr>
                            <th>Pelanggaran</th>
                            <th>Sangsi/Hukuman</th>
                        </tr>
                    </thead>
                    <section id="t_dataspdatabina" hidden>
                        <tbody>
                            <tr>
                                <td>' . Getdata('descriptions', 'table_datasp_v', 'idviolation', $r['idviolation'])  . '</td>
                                <td>' . Getdata('descriptions', 'table_datasp_s', 'sancid', $r['sancid'])  . '</td>
                            </tr>
                        </tbody>
                    </section>
                </table>
        ';
        $createat = $r['createdon_renc'];
    }
    $sql = mysqli_query($conn, "SELECT documenid,documenname FROM table_datasp_d WHERE spid='$spid'");
    if (mysqli_num_rows($sql) <> 0) {
        $dokumen = '
        <table class="table table-sm w-75">
            <thead>
                <tr>
                    <th style="width: 10%;">#</th>
                    <th>Dokumen</th>
                    <th style="width: 20%;">Created On</th>
                </tr>
            </thead>
            <tbody>';
        $i = 1;
        while ($r = mysqli_fetch_array($sql)) {
            $dokumen .= '
                <tr>
                    <td>' . $i . '</td>
                    <td><a href="' . Getdata('drtext', 'table_datadirections', 'directionsid', 6) . $r['documenname'] . '" target="_blank">' . $r['documenname'] . '</a></td>
                    <td>' . beautydate1($createat) . '</td>
                </tr>';
            $i += 1;
        }
        $dokumen .= '
            </tbody>
        </table>
        ';
    }

    $datapembina = '
            <div class="form-group row mb-1">
            <label for="tglpembinaandatabina" class="col-sm-2 text-end">Tgl Pembinaan</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control form-control-sm" id="tglpembinaandatabina" value="' . date('Y-m-d') . '">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="pembinadatabina" class="col-sm-2 text-end">Dibina Oleh</label>
                <div class="col-sm-3">
                <select class="select2 form-control form-control-sm" id="pembinadatabina">
                <option value=' . $pembina . '>' . $pembina . '</option>
            ';
    $query = mysqli_query($conn, "SELECT *
                                FROM table_databuruh 
                                WHERE pernr !='$pernr_pembina' AND statsactive=1");
    while ($r = mysqli_fetch_array($query)) {
        $datapembina .= '<option value=' . $r["pernr"] . '>' . $r["pernr"]  . " - " . $r["namekar"] . '</option>';
    }
    $datapembina .= '
                            </select>
                </div>
            </div>';
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "dokumen" => $dokumen,
        "karyawan" => $datakar,
        "datasp" => $datasp,
        "datapembina" => $datapembina,
        "link" => "mt_sp_bina",
        "id" => $spid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessimpandatabina'])) {
    $spid = $_POST['prosessimpandatabina'][0];
    $tgl = $_POST['prosessimpandatabina'][1];
    $bina = $_POST['prosessimpandatabina'][2];
    $return = false;

    $query = mysqli_query($conn, "UPDATE table_datasp_doc 
                                        SET eksekutor='$bina',
                                            spstatus='CLSD',
                                            postingdate_real='$tgl',
                                            postingby_real='$changedby'
                                        WHERE spid='$spid'");

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_sp_display",
        "id" => $spid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_sp'])) {
    $spid = $_POST['prosesdelete_head_sp'];
    $stasx = 0;
    $r = mysqli_fetch_array(mysqli_query($conn, "SELECT stats FROM table_datastats WHERE idstats=99"));
    $status = $r['stats'];
    $query = mysqli_query($conn, "DELETE FROM table_datasp_doc
                                    WHERE spid='$spid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_sp_display",
        "id" => $spid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> FARKES
if (isset($_POST['prosessubmitmdfarkes'])) {
    $farkesid = $_POST['prosessubmitmdfarkes'][0];
    $header = $_POST['prosessubmitmdfarkes'][1];
    $descriptions = $_POST['prosessubmitmdfarkes'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT farkesid FROM table_datafarkes_h WHERE farkesid='$farkesid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datafarkes_h 
                                        SET farkesdescriptions='$descriptions',
                                            farkesheader='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE farkesid='$farkesid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datafarkes_h (farkesdescriptions,
                                                                    farkesheader,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "id" => $farkesid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_farkes'])) {
    $farkesid = $_POST['prosesdelete_head_farkes'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datafarkes_h 
                                    WHERE farkesid='$farkesid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "id" => $farkesid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdnewsfarkes'])) {
    $newsid = $_POST['prosessubmitmdnewsfarkes'][0];
    $editor = $_POST['prosessubmitmdnewsfarkes'][1];
    $kontent = $_POST['prosessubmitmdnewsfarkes'][2];
    $title = $_POST['prosessubmitmdnewsfarkes'][3];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT newsid FROM table_datafarkes_n WHERE newsid='$newsid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datafarkes_n 
                                        SET newseditor='$editor',
                                            newscontent='$kontent',
                                            newstitle='$title',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE newsid='$newsid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datafarkes_n (newseditor,
                                                                    newscontent,
                                                                    newstitle,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$editor',
                                        '$kontent',
                                        '$title',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "id" => $newsid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_news_farkes'])) {
    $newsid = $_POST['prosesdelete_news_farkes'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datafarkes_n
                                    WHERE newsid='$newsid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "newsid" => $newsid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_farkes'])) {
    $docid = $_POST['prosesdelete_doc_farkes'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datafarkes_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=7");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datafarkes_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "id" => $docid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_img_farkes'])) {
    $imgid = $_POST['prosesdelete_img_farkes'];
    $query = mysqli_query($conn, "SELECT imgaddress
                                     FROM table_datafarkes_g 
                                     WHERE imgid='$imgid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $imgaddress = $r['imgaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=8");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $imgaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datafarkes_g WHERE imgid='$imgid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_farkes_display",
        "id" => $imgid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> P2K3
if (isset($_POST['prosessubmitmdp2k3'])) {
    $p2k3id = $_POST['prosessubmitmdp2k3'][0];
    $header = $_POST['prosessubmitmdp2k3'][1];
    $descriptions = $_POST['prosessubmitmdp2k3'][2];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT p2k3id FROM table_datap2k3_h WHERE p2k3id='$p2k3id'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datap2k3_h 
                                        SET p2k3descriptions='$descriptions',
                                            p2k3header='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE p2k3id='$p2k3id'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datap2k3_h (p2k3descriptions,
                                                                    p2k3header,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "id" => $p2k3id,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_p2k3'])) {
    $p2k3id = $_POST['prosesdelete_head_p2k3'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datap2k3_h
                                    WHERE p2k3id='$p2k3id'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "id" => $p2k3id,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdnewsp2k3'])) {
    $newsid = $_POST['prosessubmitmdnewsp2k3'][0];
    $editor = $_POST['prosessubmitmdnewsp2k3'][1];
    $kontent = $_POST['prosessubmitmdnewsp2k3'][2];
    $title = $_POST['prosessubmitmdnewsp2k3'][3];
    $return = false;
    $stasx = 1;

    $query = mysqli_query($conn, "SELECT newsid FROM table_datap2k3_n WHERE newsid='$newsid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datap2k3_n 
                                        SET newseditor='$editor',
                                            newscontent='$kontent',
                                            newstitle='$title',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE newsid='$newsid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datap2k3_n (newseditor,
                                                                    newscontent,
                                                                    newstitle,
                                                                    statsactive,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$editor',
                                        '$kontent',
                                        '$title',
                                        '$stasx',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "id" => $newsid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_news_p2k3'])) {
    $newsid = $_POST['prosesdelete_news_p2k3'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datap2k3_n
                                    WHERE newsid='$newsid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "newsid" => $newsid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_p2k3'])) {
    $docid = $_POST['prosesdelete_doc_p2k3'];
    $query = mysqli_query($conn, "SELECT documenaddress
                                     FROM table_datap2k3_d 
                                     WHERE documenid='$docid'");
    if (mysqli_num_rows($query) <> 0) {
        $r = mysqli_fetch_array($query);
        $documenaddress = $r['documenaddress'];

        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=9");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $file = $dir . $documenaddress;
        if (file_exists($file)) {
            unlink($file);
            $msgs =  "File terhapus.";
        } else {
            $msgs = "File tidak ditemukan.";
        }
    }

    $query = mysqli_query($conn, "DELETE FROM table_datap2k3_d WHERE documenid='$docid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "id" => $docid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_sidak_p2k3'])) {
    $p2k3id = $_POST['prosesdelete_sidak_p2k3'];
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=10");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $query = mysqli_query($conn, "SELECT imgsidak FROM table_datap2k3_sd WHERE p2k3id=$p2k3id");
    if (mysqli_num_rows($query) <> 0) {
        while ($r = mysqli_fetch_array($query)) {
            $documenaddress = $r['imgsidak'];
            $file = $dir . $documenaddress;
            if (file_exists($file)) {
                unlink($file);
            }
        }
        mysqli_query($conn, "DELETE FROM table_datap2k3_sd WHERE p2k3id='$p2k3id'");
    }

    $query = mysqli_query($conn, "DELETE FROM table_datap2k3_s WHERE p2k3id='$p2k3id'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_p2k3_display",
        "id" => $file,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> SIDO BUNGAH
if (isset($_POST['prosessubmitmdsido'])) {
    $sidoid = $_POST['prosessubmitmdsido'][0];
    $header = $_POST['prosessubmitmdsido'][1];
    $descriptions = $_POST['prosessubmitmdsido'][2];
    $return = false;

    $query = mysqli_query($conn, "SELECT sidoid FROM table_datasido_h WHERE sidoid='$sidoid'");
    if (mysqli_num_rows($query) <> 0) {
        $query = mysqli_query($conn, "UPDATE table_datasido_h 
                                        SET sidodescriptions='$descriptions',
                                            sidoheader='$header',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE sidoid='$sidoid'");
    } else {
        $query = mysqli_query($conn, "INSERT INTO table_datasido_h (sidodescriptions,
                                                                    sidoheader,
                                                                    createdon,
                                                                    createdby)
                                VALUES ('$descriptions',
                                        '$header',
                                        '$createdon',
                                        '$createdby')");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_sido_display",
        "id" => $sidoid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_head_sido'])) {
    $sidoid = $_POST['prosesdelete_head_sido'];
    $stasx = 0;
    $query = mysqli_query($conn, "DELETE FROM table_datasido_h 
                                    WHERE sidoid='$sidoid'");
    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_sido_display",
        "id" => $sidoid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosesdelete_doc_sido'])) {
    $sidoid = $_POST['prosesdelete_doc_sido'];
    $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=11");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $dir = $r['drtext'];
    }
    $query = mysqli_query($conn, "SELECT imgsido FROM table_datasido_sd WHERE sidoid=$sidoid");
    if (mysqli_num_rows($query) <> 0) {
        while ($r = mysqli_fetch_array($query)) {
            $documenaddress = $r['imgsido'];
            $file = $dir . $documenaddress;
            if (file_exists($file)) {
                unlink($file);
            }
        }
        mysqli_query($conn, "DELETE FROM table_datasido_sd WHERE sidoid='$sidoid'");
    }

    $query = mysqli_query($conn, "DELETE FROM table_datasido_e WHERE sidoid='$sidoid'");
    if ($query) {
        $return = true;
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_sido_display",
        "id" => $file,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> SERAGAM
if (isset($_POST['prosesdelete_head_srgm'])) {
    $srgmid = $_POST['prosesdelete_head_srgm'];
    $imgaddress = array();
    $query = mysqli_query($conn, "SELECT imgseragam FROM table_datasrgm_d WHERE srgmid='$srgmid'");
    while ($r = mysqli_fetch_array($query)) {
        $imgaddress[] = $r['imgseragam'];
    }
    $query = mysqli_query($conn, "DELETE t1, t2, t3
                                    FROM table_datasrgm_h AS t1
                                    LEFT JOIN table_datasrgm_dt AS t2 ON t1.srgmid = t2.srgmid
                                    LEFT JOIN table_datasrgm_d AS t3 ON t1.srgmid = t3.srgmid
                                    WHERE t1.srgmid = '$srgmid'");
    if ($query) {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=13");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $lenght = count($imgaddress);
        for ($i = 0; $i < $lenght; $i++) {
            $file = $dir . $imgaddress[$i];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_seragam_display",
        "id" => $srgmid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdseragamreal'])) {
    $srgmid = $_POST['prosessubmitmdseragamreal'][0];
    $tgl = $_POST['prosessubmitmdseragamreal'][1];
    $total = $_POST['prosessubmitmdseragamreal'][2];
    $catatan = $_POST['prosessubmitmdseragamreal'][3];
    $unitid = $_POST['prosessubmitmdseragamreal'][4];
    $qty = $_POST['prosessubmitmdseragamreal'][5];
    $status = $_POST['prosessubmitmdseragamreal'][6];
    $return = false;
    $lenght = count($qty);

    $query = mysqli_query($conn, "SELECT srgmid FROM table_datasrgm_h WHERE srgmid='$srgmid'");
    if (mysqli_num_rows($query) <> 0) {
        for ($i = 0; $i < $lenght; $i++) {
            mysqli_query($conn, "UPDATE table_datasrgm_dt 
                                        SET realqty='$qty[$i]',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE srgmid='$srgmid' AND
                                            unitid='$unitid[$i]'");
        }
        $query = mysqli_query($conn, "UPDATE table_datasrgm_h 
                                        SET catatanreal='$catatan',
                                            realisasi='X',
                                            tglreal='$tgl',
                                            statsx='$status',
                                            totalreal='$total',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE srgmid='$srgmid'");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "adm_seragam_display",
        "id" => $srgmid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> PARSEL
if (isset($_POST['prosesdelete_head_parcel'])) {
    $parcelid = $_POST['prosesdelete_head_parcel'];
    $imgaddress = array();
    $query = mysqli_query($conn, "SELECT imgparcel FROM table_dataparcel_d WHERE parcelid='$parcelid'");
    while ($r = mysqli_fetch_array($query)) {
        $imgaddress[] = $r['imgparcel'];
    }
    $query = mysqli_query($conn, "DELETE t1, t2, t3
                                    FROM table_dataparcel_h AS t1
                                    LEFT JOIN table_dataparcel_dt AS t2 ON t1.parcelid = t2.parcelid
                                    LEFT JOIN table_dataparcel_d AS t3 ON t1.parcelid = t3.parcelid
                                    WHERE t1.parcelid = '$parcelid'");
    if ($query) {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=15");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $lenght = count($imgaddress);
        for ($i = 0; $i < $lenght; $i++) {
            $file = $dir . $imgaddress[$i];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "md_parcel_display",
        "id" => $srgmid,
        "return" => $return,
    ];
    echo json_encode($data);
}
if (isset($_POST['prosessubmitmdparcelreal'])) {
    $parcelid = $_POST['prosessubmitmdparcelreal'][0];
    $tgl = $_POST['prosessubmitmdparcelreal'][1];
    $total = $_POST['prosessubmitmdparcelreal'][2];
    $catatan = $_POST['prosessubmitmdparcelreal'][3];
    $unitid = $_POST['prosessubmitmdparcelreal'][4];
    $qty = $_POST['prosessubmitmdparcelreal'][5];
    $status = $_POST['prosessubmitmdparcelreal'][6];
    $return = false;
    $lenght = count($qty);

    $query = mysqli_query($conn, "SELECT parcelid FROM table_dataparcel_h WHERE parcelid='$parcelid'");
    if (mysqli_num_rows($query) <> 0) {
        for ($i = 0; $i < $lenght; $i++) {
            mysqli_query($conn, "UPDATE table_dataparcel_dt 
                                        SET realqty='$qty[$i]',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE parcelid='$parcelid' AND
                                            unitid='$unitid[$i]'");
        }
        $query = mysqli_query($conn, "UPDATE table_dataparcel_h 
                                        SET catatanreal='$catatan',
                                            realisasi='X',
                                            tglreal='$tgl',
                                            statsx='$status',
                                            totalreal='$total',
                                            changedon='$changedon',
                                            changedby='$changedby'
                                        WHERE parcelid='$parcelid'");
    }

    if ($query) {
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "adm_parcel_display",
        "id" => $parcelid,
        "return" => $return,
    ];
    echo json_encode($data);
}

// -----> SURAT
if (isset($_POST['prosesdelete_head_surat'])) {
    $suratid = $_POST['prosesdelete_head_surat'];
    $imgaddress = array();
    $query = mysqli_query($conn, "SELECT imgsurat FROM table_datasurat_d WHERE suratid='$suratid'");
    while ($r = mysqli_fetch_array($query)) {
        $imgaddress[] = $r['imgsurat'];
    }
    $query = mysqli_query($conn, "DELETE t1, t2
                                    FROM table_datasurat_h AS t1
                                    LEFT JOIN table_datasurat_d AS t2 ON t1.suratid = t2.suratid
                                    WHERE t1.suratid = '$suratid'");
    if ($query) {
        $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections 
                                    WHERE directionsid=16");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            $dir = $r['drtext'];
        }
        $lenght = count($imgaddress);
        for ($i = 0; $i < $lenght; $i++) {
            $file = $dir . $imgaddress[$i];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $return = true;
        $msgs = "Data Tersimpan";
        $icon_msgs = "success";
    }
    $data = [
        "time" => $time,
        "msgs" => $msgs,
        "iconmsgs" => $icon_msgs,
        "link" => "adm_surat_display",
        "id" => $suratid,
        "return" => $return,
    ];
    echo json_encode($data);
}
