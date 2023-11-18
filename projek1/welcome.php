<div class="welcome-text">
    <?php
    include '../koneksi.php';

    // Sesuaikan dengan kebutuhan, pastikan variabel $username sudah terdefinisi
    $username = $_SESSION['level'];

    // Mengambil data nama dari tabel users berdasarkan level karyawan dari tabel login
    $query = "SELECT users.nama FROM login INNER JOIN users ON users.roleId = login.id_user WHERE login.level = '$username'";

    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        $nama = mysqli_fetch_assoc($result);

        // Memeriksa apakah data nama ditemukan
        if ($nama) {
    ?>
            <h4>Hi, <?php echo $nama['nama']; ?></h4>
    <?php
        } else {
            // Handle jika data nama tidak ditemukan
            echo '<h4>Hi, Pengguna</h4>';
        }
    } else {
        // Handle jika query tidak berhasil dieksekusi
        echo '<h4>Hi, Pengguna</h4>';
    }
    ?>
    <p class="mb-0">Sebuah Toko Online yang menjual barang bekas</p>
</div>