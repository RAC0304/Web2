<!-- proses_tambah_barang.php -->
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi_barang = $_POST['deskripsi_barang'];
    $harga = $_POST['harga_barang'];
    $stok = $_POST['stok_barang'];
    $gambar = $_FILES['gambar_barang']['name'];
    $gambar_tmp = $_FILES['gambar_barang']['tmp_name'];
    // Tentukan direktori tujuan untuk menyimpan gambar
    $target_dir = "../images/barang/";

    // Sesuaikan path gambar dengan direktori tujuan
    $target_file = $target_dir . basename($gambar);

    // Pindahkan gambar ke direktori tujuan
    move_uploaded_file($gambar_tmp, $target_file);

    $query = "INSERT INTO barang (nama_barang, deskripsi_barang, harga, tanggal_barang, stok, gambar) VALUES ('$nama_barang', '$deskripsi_barang', $harga, current_timestamp(), $stok, '$gambar')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data barang berhasil ditambahkan.";
        header('location:halaman_admin.php');
    } else {
        echo "Gagal menambahkan data barang. Error: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>