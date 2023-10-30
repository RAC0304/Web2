<?php
session_start();
include '../koneksi.php';

if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
    exit(); // Pastikan untuk mengakhiri eksekusi skrip jika tidak ada sesi yang aktif
}

$username = $_SESSION['username']; // Dapatkan username pengguna yang login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barang_id = $_POST['barang_id'];

    // Ambil data dari Barang berdasarkan ID
    $query_select = "SELECT * FROM barang WHERE id_barang = $barang_id";
    $result = mysqli_query($koneksi, $query_select);
    $data_barang = mysqli_fetch_assoc($result);

    // Ambil data dari users roleID
    $query_id_users = "SELECT users.id FROM login INNER JOIN users ON login.id_user = users.roleId WHERE login.username='$username'";
    $result1 = mysqli_query($koneksi, $query_id_users);
    $data_users = mysqli_fetch_assoc($result1);

    // Simpan data ke Laporan_Pesanan
    $query_insert = "INSERT INTO Laporan_Pesanan (jumlah, tanggal_pesanan, status_pesanan, id_users, id_barang)
                     VALUES (
                        '10',
                        current_timestamp(),
                        'Belum Bayar',
                        '{$data_users['id']}',
                        '{$data_barang['id_barang']}'
                     )";

    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
        echo "Data berhasil dipindahkan ke Laporan_Pesanan.";
        header('location:report.php');
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
