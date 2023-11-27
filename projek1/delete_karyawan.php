<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM login WHERE id_user='$id'") or die(mysqli_error($koneksi));

header("location:admin/page_konsumen.php?pesan=hapus");
