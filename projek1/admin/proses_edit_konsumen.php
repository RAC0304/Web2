<?php
include "../koneksi.php"; // Hubungkan ke database

// Tangkap data dari formulir pengeditan
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$tgl_lahir = $_POST['tgl'];
$mobile = $_POST['hp'];

// Query untuk melakukan pembaruan data
$query = "UPDATE users SET nama='$nama', email='$email', jk='$jk', tgl_lahir='$tgl_lahir', mobile='$mobile', update_at=current_timestamp()) WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    // Jika pembaruan berhasil
    echo "Data berhasil diperbarui";
} else {
    // Jika terjadi kesalahan
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi); // Tutup koneksi database
