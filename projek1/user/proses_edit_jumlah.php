<?php
include '../koneksi.php';

$id_pesanan = $_POST['id_pesanan'];
$jumlah_baru = $_POST['jumlah'];

$query_update_jumlah = "UPDATE laporan_pesanan SET jumlah = $jumlah_baru WHERE id_pesanan = $id_pesanan";
mysqli_query($koneksi, $query_update_jumlah);

header("location:report.php");
// Redirect atau tindakan lanjutan setelah berhasil memperbarui jumlah
// ...
