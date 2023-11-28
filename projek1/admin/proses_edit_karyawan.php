<?php
include "../koneksi.php"; // Hubungkan ke database


if (isset($_FILES['foto'])) {
    $foto_name = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto_path = "../images/avatar/$foto_name";  // Sesuaikan dengan lokasi penyimpanan yang diinginkan
    move_uploaded_file($foto_temp, $foto_path);

    // Tangkap data dari formulir pengeditan
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl'];

    // Menghitung umur
    $tanggal_lahir_obj = new DateTime($tgl_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($tanggal_lahir_obj)->y;
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];

    // Simpan nama file gambar ke database
    $query_update = "UPDATE `karyawan` SET `nama` = '$nama', `email` = '$email', `jk` = '$jk', `tgl_lahir` = '$tgl_lahir', `mobile` = '$no_hp', `alamat` = '$alamat', `umur` = '$umur', `jabatan` = 'Pegawai', `foto` = '$foto_name' WHERE `karyawan`.`id_karyawan` = '$id'";
    if (mysqli_query($koneksi, $query_update)) {
        // Jika pembaruan berhasil
        echo "Data berhasil diperbarui";
        header('location:halaman_karyawan.php');
    } else {
        // Jika terjadi kesalahan
        echo "Error: " . $query_update . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi); // Tutup koneksi database
}

// Query untuk melakukan pembaruan data
