<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_array($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin/halaman_admin.php");

        // cek jika user login sebagai user
    } else if ($data['level'] == "user") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        // alihkan ke halaman dashboard pegawai
        header("location:user/halaman_user.php");
    } else if ($data['level'] == "karyawan") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "karyawan";
        // alihkan ke halaman dashboard pegawai
        header("location:karyawan/halaman_karyawan.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?login=gagal");
    }
} else {
    header("location:index.php?login=gagal");
}
