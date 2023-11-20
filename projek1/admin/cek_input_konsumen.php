<?php
include '../koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['pass'];
$nama = $_POST['nama'];
$ibu = $_POST['ibu'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$tanggal_lahir = $_POST['tgl'];
$no_handphone = $_POST['hp'];
$level = $_POST['level'];

// cek apakah username sudah tersedia di database
$query = "SELECT * FROM login WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

// cek apakah ada data user yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // username sudah tersedia
    // alihkan ke halaman login kembali
    header("location:page_konsumen.php?pesan=gagal");
    exit;
} else {
    // menginput data ke database
    $result = mysqli_query($koneksi, "INSERT INTO login (`id_user`, `username`, `password`, `level`, `ibu`) VALUES (NULL, '$username', '$password', '$level', '$ibu')");

    if (!$result) {
        die('Error: ' . mysqli_error($koneksi));
    }

    // Mendapatkan id_user yang baru saja diinsert 
    $id_user = mysqli_insert_id($koneksi);

    if ($level == 'User') {
        // Jika level user, masukkan data ke tabel users
        mysqli_query($koneksi, "INSERT INTO users (`id`, `nama`, `email`, `jk`, `tgl_lahir`, `mobile`, `roleId`, `createAt`, `updateAt`) VALUES (NULL, '$nama', '$email', '$jk', '$tanggal_lahir', '$no_handphone', '$id_user', current_timestamp(), current_timestamp())");
    } elseif ($level == 'Karyawan') {
        mysqli_query($koneksi, "INSERT INTO karyawan ( `nama`, `email`, `jk`, `tgl_lahir`, `mobile`, `roleId`, `jabatan`) VALUES ('$nama', '$email', '$jk', '$tanggal_lahir', '$no_handphone', '$id_user', 'Pegawai')");
    }

    // alihkan ke halaman login kembali
    header("location:page_konsumen.php?pesan=sukses");
}
