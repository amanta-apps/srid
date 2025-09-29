<?php
function getrunningnumber()
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT documenid FROM table_datasp_doc ORDER BY documenid  DESC");
    $r = mysqli_fetch_array($sql);
    $urutan = (int) substr($r['documenid'], 3, 4);
    $urutan++;
    $huruf = "SP-";
    $documenid = $huruf . sprintf("%03s", $urutan);
    return $documenid;
}
function Getkode($value, $table, $p = 0)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value as kode FROM $table ORDER BY $value DESC");
    if ($p <> 0) {
        $sql = mysqli_query($conn, "SELECT $value as kode FROM $table WHERE $value <> $p ORDER BY $value DESC");
    }
    if (mysqli_num_rows($sql) <> 0) {
        $data = mysqli_fetch_array($sql);
        $result = $data['kode'] + 1;
        $return = $result;
    } else {
        $return = 1;
    }

    return $return;
}
// -----> Get a single data.
function Getdata($value, $table, $where, $valuewhere)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' ORDER BY $value DESC");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
// -----> END
function GetdataII($value, $table, $where, $valuewhere, $where2, $valuewhere2)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' AND $where2 ='$valuewhere2'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
function GetdataIII($value, $table, $where, $valuewhere, $where2, $valuewhere2, $where3, $valuewhere3)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' AND $where2 ='$valuewhere2' AND $where3 ='$valuewhere3'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
function GetdataIV($value, $table, $where, $valuewhere, $where2, $valuewhere2, $where3, $valuewhere3, $where4, $valuewhere4)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' AND $where2 ='$valuewhere2' AND $where3 ='$valuewhere3' AND $where4 ='$valuewhere4'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
function GetdataV($value, $table, $where, $valuewhere, $where2, $valuewhere2, $where3, $valuewhere3, $where4, $valuewhere4, $where5, $valuewhere5)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' AND $where2 ='$valuewhere2' AND $where3 ='$valuewhere3' AND $where4 ='$valuewhere4' AND $where5 ='$valuewhere5'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
function GetdataVI($value, $table, $where, $valuewhere, $where2, $valuewhere2, $where3, $valuewhere3, $where4, $valuewhere4, $where5, $valuewhere5, $where6, $valuewhere6)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT $value FROM $table WHERE $where ='$valuewhere' AND $where2 ='$valuewhere2' AND $where3 ='$valuewhere3' AND $where4 ='$valuewhere4' AND $where5 ='$valuewhere5' AND $where6 ='$valuewhere6'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q[$value];
    }
}
// ----> Get Nama Karyawan
function Getnamakaryawan($nameid)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT B.EmployeeName FROM usr02 AS A INNER JOIN pa001 AS B ON A.PersonnelNumber = B.PersonnelNumber
                                WHERE A.UserID='$nameid'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q['EmployeeName'];
    }
}

function Getpernr($nameid)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT PersonnelNumber FROM usr02 WHERE UserID='$nameid'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q['PersonnelNumber'];
    }
}
function Getpernrbyname($nameid)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT PersonnelNumber FROM pa001 WHERE EmployeeName='$nameid'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $q['PersonnelNumber'];
    }
}

// ------> Get Jumlah Litho Terpakai (Hasil Counter Mesin/Standard Roll)
function Getlithoused($productid, $countermesin)
{
    include 'koneksi.php';
    $litho = 0;
    $sql = mysqli_query($conn, "SELECT StandardRoll FROM mara_product WHERE ProductID='$productid'");
    $q = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        $litho =  $countermesin / $q['StandardRoll'];
    }
    return $litho;
}
function getengineset($noplan, $kodeproses)
{
    include 'koneksi.php';
    $sql = mysqli_query($conn, "SELECT B.NilaiSuhu, A.UnitOfMeasures FROM qc_characteristic AS A INNER JOIN machine_engine AS B
                                ON A.Proses=B.JenisPengecekan WHERE A.KodeProses='" . $kodeproses . "' AND B.PlanningNumber='" . $noplan . "'");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        return $row['NilaiSuhu'] . ' ' . $row['UnitOfMeasures'];
    }
}
function getrowtable($table, $where, $valuewhere)
{
    include 'koneksi.php';
    $plant = $_SESSION['plant'];
    $unitcode = $_SESSION['unitcode'];
    $rows = 0;
    if ($where != '') {
        $sql = mysqli_query($conn, "SELECT * FROM $table WHERE Plant='$plant' AND UnitCode='$unitcode' AND $where ='$valuewhere'");
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM $table");
    }
    if (mysqli_num_rows($sql) > 0) {
        $rows = mysqli_num_rows($sql);
    }
    return $rows;
}

function getconfigreviewer($prosestype, $where)
{
    include 'koneksi.php';
    $plant = $_SESSION['plant'];
    $unitcode = $_SESSION['unitcode'];
    $return = 'hidden';
    $sql = mysqli_query($conn, "SELECT $where FROM tb_configreviewer WHERE Plant='$plant' AND UnitCode='$unitcode' 
                                                                                            AND  ProcessType='$prosestype'
                                                                                            AND StatsX='X'");
    if (mysqli_num_rows($sql) != 0) {
        $rows = mysqli_fetch_array($sql);
        if ($rows[$where] == 'X') {
            $return = '';
        }
        if ($rows[$where] == null || $rows[$where] == '') {
            $return = 'hidden';
        }
    }
    return $return;
}
function getconfig($prosestype, $where)
{
    include 'koneksi.php';
    $plant = $_SESSION['plant'];
    $unitcode = $_SESSION['unitcode'];
    $return = 'checked';
    $sql = mysqli_query($conn, "SELECT $where FROM tb_configreviewer WHERE Plant='$plant' AND UnitCode='$unitcode' 
                                                                                            AND  ProcessType='$prosestype'");
    if (mysqli_num_rows($sql) != 0) {
        $rows = mysqli_fetch_array($sql);
        if ($rows[$where] != 'X') {
            $return = '';
        }
    }
    return $return;
}
function getconfig2($prosestype)
{
    include 'koneksi.php';
    $plant = $_SESSION['plant'];
    $unitcode = $_SESSION['unitcode'];
    $return = 'checked';
    $sql = mysqli_query($conn, "SELECT StatsX FROM tb_configweb WHERE Plant='$plant' AND UnitCode='$unitcode' 
                                                                                            AND  FormReviewer ='$prosestype'");
    if (mysqli_num_rows($sql) != 0) {
        $rows = mysqli_fetch_array($sql);
        if ($rows['StatsX'] != 'X') {
            $return = '';
        }
    }
    return $return;
}
function getdayformat($hari)
{

    switch ($hari) {
        case '0':
            $return_hari = "Minggu";
            break;
        case '1':
            $return_hari = "Senin";
            break;
        case '2':
            $return_hari = "Selasa";
            break;
        case '3':
            $return_hari = "Rabu";
            break;
        case '4':
            $return_hari = "Kamis";
            break;
        case '5':
            $return_hari = "Jumat";
            break;
        case '6':
            $return_hari = "Sabtu";
            break;
        default:
            $return_hari = "Tidak di ketahui";
            break;
    }
    return $return_hari;
}
function getbulanformat($bulan)
{

    switch ($bulan) {
        case '1':
            $return_bulan = "Januari";
            break;
        case '2':
            $return_bulan = "Febuari";
            break;
        case '3':
            $return_bulan = "Maret";
            break;
        case '4':
            $return_bulan = "April";
            break;
        case '5':
            $return_bulan = "Mei";
            break;
        case '6':
            $return_bulan = "Juni";
            break;
        case '7':
            $return_bulan = "Juli";
            break;
        case '8':
            $return_bulan = "Agustus";
            break;
        case '9':
            $return_bulan = "September";
            break;
        case '10':
            $return_bulan = "Oktober";
            break;
        case '11':
            $return_bulan = "November";
            break;
        case '12':
            $return_bulan = "Desember";
            break;
        default:
            $return_bulan = "Tidak di ketahui";
            break;
    }
    return $return_bulan;
}
function beautydate1($tanggal)
{
    if ($tanggal == '') {
        $tgl = '';
    } elseif ($tanggal == '0000-00-00 00:00:00') {
        $tgl = '';
    } else {
        $tgl = date('d.m.Y', strtotime($tanggal));
        if ($tgl == '01.01.1970 07:00:00' || $tgl == NULL) {
            $tgl = '';
        }
    }
    return $tgl;
}
function Rbeautydate1($tanggal)
{
    if ($tanggal == '') {
        $tgl = '';
    } else {
        $tgl = date('Y-m-d', strtotime($tanggal));
        if ($tgl == '1970.01.01 07:00:00' || $tgl == NULL) {
            $tgl = '';
        }
    }
    return $tgl;
}
function beautydate2($tanggal)
{
    if ($tanggal == '') {
        $tgl = '';
    } elseif ($tanggal == '0000-00-00 00:00:00') {
        $tgl = '';
    } else {
        $tgl = date('d.m.Y H:i', strtotime($tanggal));
        if ($tgl == '01.01.1970 07:00:00' || $tgl == NULL) {
            $tgl = '';
        }
    }
    return $tgl;
}
function Rbeautydate2($tanggal)
{
    $tgl =  date('Y-m-d H:i:s', strtotime($tanggal));
    if ($tgl == '1970.01.01 07:00:00') {
        $tgl = '';
    }
    return $tgl;
}
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
function getmappingharga($kodebarang, $qty)
{
    include 'koneksi.php';
    $plant = $_SESSION['plant'];
    $harga = false;
    $sql =  mysqli_query($conn, "SELECT Harga FROM dbo_datamappingharga WHERE Plant='$plant' 
                                                                            AND KodeBarang='$kodebarang'
                                                                            AND Used ='X'
                                                                            AND $qty >= UnitFrom
                                                                            AND $qty <= UnitTo");
    if (mysqli_num_rows($sql) <> 0) {
        $r = mysqli_fetch_array($sql);
        $harga = $r["Harga"];
    } else {
        $sql =  mysqli_query($conn, "SELECT Harga,UnitTo FROM dbo_datamappingharga WHERE Plant='$plant' 
                                                                                    AND KodeBarang='$kodebarang'
                                                                                    AND Used ='X'
                                                                                    ORDER BY UnitTo DESC
                                                                                    LIMIT 1");
        if (mysqli_num_rows($sql) <> 0) {
            $r = mysqli_fetch_array($sql);
            if ($qty > $r['UnitTo']) {
                $harga = $r['Harga'];
            } else {
                $sql =  mysqli_query($conn, "SELECT HargaJual FROM dbo_dataharga WHERE Plant='$plant' 
                                                                                AND KodeBarang='$kodebarang'
                                                                                AND Level='Retail'
                                                                                AND DeletionFlag <> 1");
                $r = mysqli_fetch_array($sql);
                $harga = $r["HargaJual"];
            }
        } else {
            $sql =  mysqli_query($conn, "SELECT HargaJual FROM dbo_dataharga WHERE Plant='$plant' 
                                                                                AND KodeBarang='$kodebarang'
                                                                                AND Level='Retail'
                                                                                AND DeletionFlag <> 1");
            $r = mysqli_fetch_array($sql);
            $harga = $r["HargaJual"];
        }
    }

    // if ($harga == false) {
    //     $sql =  mysqli_query($conn, "SELECT HargaJual FROM dbo_dataharga WHERE Plant='$plant' 
    //                                                                             AND KodeBarang='$kodebarang'
    //                                                                             AND Level='Retail'
    //                                                                             AND DeletionFlag <> 1");
    //     $r = mysqli_fetch_array($sql);
    //     $harga = $r["HargaJual"];
    // }
    return $harga;
}

function getsumtiket($project, $subproject, $stype = 0)
{
    include 'koneksi.php';
    if ($stype == 0) {
        $query = "SELECT TicketNo FROM dbo_dataticket WHERE Project='$project' AND SubProject='$subproject'";
    } else {
        $query = "SELECT TicketNo FROM dbo_dataticket WHERE Project='$project' AND Stype ='$stype' AND SubProject='$subproject'";
    }
    $sql = mysqli_query($conn, $query);
    return mysqli_num_rows($sql);
}
function Stgl($fromm, $too = 0)
{
    $selisih_hari = 0;
    if ($fromm <> 0) {
        $now = date('Y-m-d'); // hari ini, misalnya 2025-07-23
        $diff = strtotime($now) - strtotime($fromm);
        $selisih_hari = $diff / (60 * 60 * 24);
    }
    if ($too <> 0) {
        $diff = strtotime($too) - strtotime($fromm);
        $selisih_hari = $diff / (60 * 60 * 24);
    }
    $selisih = floor($selisih_hari);
    if ($selisih < 1) {
        $return = 'beberapa jam';
    } else {
        $return = $selisih . ' hari';
    }
    return $return;
}

function getai($table, $db = 'db_srid')
{
    include 'koneksi.php';
    $sql = "SELECT AUTO_INCREMENT 
            FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = '$db' 
            AND TABLE_NAME = '$table'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['AUTO_INCREMENT'] ?? null;
}

function datalog($logdesc)
{
    global $conn;
    $desc  =  mysqli_real_escape_string($conn, $logdesc);
    $createdon = date("Y-m-d H:i:s");
    $pernr = $_SESSION["pernr"] ?? 'system';
    mysqli_query($conn, "INSERT INTO table_datalog (logdesc,createdon,createdby)
                        VALUES ('$desc','$createdon','$pernr')");
}
