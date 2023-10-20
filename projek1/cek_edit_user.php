<?php
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$username = $_POST['username']; // Assuming you have a field for username in your form

// Cek apakah ada data user dengan username yang diberikan
$query = "SELECT * FROM login WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    // Username tidak ditemukan, mungkin tampilkan pesan error atau redirect ke halaman lain
    echo "User dengan username tersebut tidak ditemukan.";
    header("location:index.php?edit_user=gagal");
}

// Fetch the existing user data
$userData = mysqli_fetch_assoc($result);

// Retrieve other form data
$nama = $_POST['name'];
$ibu = $_POST['ibu'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$tanggal_lahir = $_POST['tgl'];
$no_handphone = $_POST['no_handphone'];

// Update user data
mysqli_query($koneksi, "UPDATE login SET username='$username', ibu='$ibu' WHERE username='$username'");
mysqli_query($koneksi, "UPDATE users SET nama='$nama', email='$email', jk='$jk', tgl_lahir='$tanggal_lahir', mobile='$no_handphone', updateAt=current_timestamp()) WHERE roleId='$userData[id_user]'");

// Alihkan ke halaman lain (misalnya halaman dashboard)
header("location:index.php?edit_user=sukses");
