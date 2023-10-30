<?php
include '../koneksi.php';

function generateUniqueTransactionCode()
{
    $timestamp = date('YmdHis'); // Mendapatkan tanggal dan waktu dalam format YYYYMMDDHHIISS
    $random_chars = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 4); // Mengambil 4 karakter acak dari kumpulan karakter yang ditentukan

    $unique_code = "TRX{$timestamp}{$random_chars}"; // Gabungkan semua elemen untuk membentuk kode unik transaksi
    return $unique_code;
}

$unique_transaction_code = generateUniqueTransactionCode();

$metode_pembayaran = $_POST['metode_pembayaran']; // Ambil metode_pembayaran dari formulir

foreach ($_POST['id_pesanan'] as $id_pesanan) {
    // Cek apakah id_pesanan sudah ada di tabel transaksi
    $query_check_pesanan = "SELECT COUNT(*) as count FROM transaksi WHERE id_pesanan = $id_pesanan";
    $result_check_pesanan = mysqli_query($koneksi, $query_check_pesanan);
    $row_check_pesanan = mysqli_fetch_assoc($result_check_pesanan);

    if ($row_check_pesanan['count'] == 0) {
        // Hitung total harga berdasarkan id_pesanan
        $query_total_harga = "SELECT barang.harga, (laporan_pesanan.jumlah * barang.harga) AS total_harga 
                            FROM laporan_pesanan 
                            INNER JOIN barang ON laporan_pesanan.id_barang = barang.id_barang WHERE laporan_pesanan.id_pesanan = $id_pesanan";
        $result_total_harga = mysqli_query($koneksi, $query_total_harga);
        $row_total_harga = mysqli_fetch_assoc($result_total_harga);
        $total_harga = $row_total_harga['total_harga'];

        // Masukkan data ke tabel transaksi
        $query_insert_transaksi = "INSERT INTO transaksi (id_transaksi, id_pesanan, metode_pembayaran, total_harga) 
                                VALUES ('$unique_transaction_code', $id_pesanan, '$metode_pembayaran', $total_harga)";
        mysqli_query($koneksi, $query_insert_transaksi);

        // Update status pesanan
        $query_update_status = "UPDATE laporan_pesanan SET status_pesanan = 'Sudah Dibayar' WHERE id_pesanan = $id_pesanan";
        mysqli_query($koneksi, $query_update_status);
    }
}

header("location:transaksi.php");
