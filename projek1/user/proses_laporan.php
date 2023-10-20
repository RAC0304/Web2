<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barang_id = $_POST['barang_id'];

    // Ambil data dari Barang berdasarkan ID
    $query_select = "SELECT * FROM Barang WHERE id_barang = $barang_id";
    $result = mysqli_query($koneksi, $query_select);
    $data_barang = mysqli_fetch_assoc($result);

    // Simpan data ke Laporan_Pesanan
    $query_insert = "INSERT INTO Laporan_Pesanan (nama_barang, deskripsi_barang, harga, tanggal_barang, stok, gambar)
                     VALUES (
                        '{$data_barang['nama_barang']}',
                        '{$data_barang['deskripsi_barang']}',
                        '{$data_barang['harga']}',
                        '{$data_barang['tanggal_barang']}',
                        '{$data_barang['stok']}',
                        '{$data_barang['gambar']}'
                     )";

    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
        // Hapus data dari Barang setelah berhasil disalin
        $query_delete = "DELETE FROM Barang WHERE id_barang = $barang_id";
        mysqli_query($koneksi, $query_delete);

        echo "Data berhasil dipindahkan ke Laporan_Pesanan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
