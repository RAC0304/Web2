<?php
include '../koneksi.php';

$query = "SELECT * FROM karyawan";
$result = mysqli_query($koneksi, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
