<?php

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();
include "koneksi.php";
include_once 'getvalue.php';

$draw   = $_POST['draw'];
$start  = $_POST['start'];
$length = $_POST['length'];
$search = $_POST['search']['value'];

$table  = $_POST['table'] ?? '';
$data = [];

if ($table == "table_datapkl_h") {
    $totalQuery = $conn->query("SELECT COUNT(*) as T FROM $table");
    $totalData  = $totalQuery->fetch_assoc()['T'];

    if (!empty($searchValue)) {
        $searchValue = $conn->real_escape_string($searchValue);
        $where = "WHERE namaorg LIKE '%$searchValue%' OR instansi LIKE '%$searchValue%'";
    }

    $filterQuery = $conn->query("SELECT COUNT(*) AS F FROM $table");
    $totalFiltered = $filterQuery->fetch_assoc()['F'];

    $result = $conn->query("SELECT * FROM $table $where LIMIT $start, $length");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}else{
    $totalRecords = $conn->query("SELECT COUNT(*) as cnt FROM $table")->fetch_assoc()['cnt'];
    $sql = "SELECT * FROM $table";
    if (!empty($search)) {
        $cols = [];
        $resultCols = $conn->query("SHOW COLUMNS FROM $table");
        while ($col = $resultCols->fetch_assoc()) {
            $cols[] = $col['Field'] . " LIKE '%$search%'";
        }
        $sql .= " WHERE " . implode(" OR ", $cols);
    }
    $totalFiltered = $conn->query($sql)->num_rows;
    $sql .= " LIMIT $start, $length";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode([
        "draw" => intval($draw),
        "recordsTotal" => intval($totalRecords),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    ]);
