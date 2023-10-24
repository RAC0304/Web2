<?php
session_start();
include '../koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pesanan_id = $_POST['pesanan_id'];
    $status_pesanan = $_POST['status'];

    // Simpan data ke Laporan_Pesanan
    $query_insert = "UPDATE `laporan_pesanan` SET `status_pesanan` = '$status_pesanan' WHERE `laporan_pesanan`.`id_pesanan` = $pesanan_id";

    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
        echo "Data berhasil dipindahkan ke Laporan_Pesanan.";
        header('location:report_admin.php');
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
