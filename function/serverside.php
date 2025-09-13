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

// Ambil parameter custom
$table  = $_POST['table']; // ?? 'table_datapkb'; // default ke users

// Hitung total records
$totalRecords = $conn->query("SELECT COUNT(*) as cnt FROM $table")->fetch_assoc()['cnt'];

// Query data dengan filter
$sql = "SELECT * FROM $table";
if (!empty($search)) {
    // cari di semua kolom (otomatis ambil nama kolom tabel)
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

// Ambil data
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Response JSON
$response = [
    "draw" => intval($draw),
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
];

echo json_encode($response);
