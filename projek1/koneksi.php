<?php
$koneksi = mysqli_connect("localhost", "brgbekas_projek1", "12345", "brgbekas_projek1");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
