<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <?php
    include 'css.php';
    ?>

</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    ?>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?php include 'nav_header.php'; ?>

        <?php include 'header.php'; ?>

        <?php include 'sidebar.php'; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="col-sm-6 p-md-0">
                            <?php
                            include '../welcome.php';
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Main Menu</li>
                            <li class="breadcrumb-item active"><a href="./transaksi.php">Detail Transaksi</a></li>
                        </ol>
                    </div>
                </div>
                <?php
                $username = $_SESSION['username'];
                $id_transaksi = $_GET['id_transaksi'];
                $query_get_id_users = "SELECT users.id 
                      FROM login
                      INNER JOIN users ON login.id_user = users.roleId 
                      WHERE login.username = ?";
                $stmt_get_id_users = mysqli_prepare($koneksi, $query_get_id_users);
                mysqli_stmt_bind_param($stmt_get_id_users, "s", $username);
                mysqli_stmt_execute($stmt_get_id_users);
                $result_id_users = mysqli_stmt_get_result($stmt_get_id_users);
                $row_id_users = mysqli_fetch_assoc($result_id_users);
                $id_users = $row_id_users['id'];

                $data_pesanan = array();

                $query_combined = "
                            SELECT
                                COALESCE(laporan_pesanan.id_pesanan) AS id_transaksi,
                                users.nama AS nama_users,
                                barang.nama_barang,
                                barang.harga,
                                COALESCE(laporan_pesanan.jumlah, 0) AS jumlah,
                                COALESCE(laporan_pesanan.tanggal_pesanan) AS tanggal_pesanan,
                                COALESCE(laporan_pesanan.status_pesanan, 'Sudah Dibayar') AS status_pesanan,
                                COALESCE((laporan_pesanan.jumlah * barang.harga), 0) AS total_harga
                            FROM
                                users
                                LEFT JOIN laporan_pesanan ON laporan_pesanan.id_users = users.id AND laporan_pesanan.status_pesanan = 'Sudah Dibayar'
                                LEFT JOIN barang ON COALESCE(laporan_pesanan.id_barang, 0) = barang.id_barang
                                LEFT JOIN transaksi ON laporan_pesanan.id_pesanan = transaksi.id_pesanan
                            WHERE
                                users.id = ? AND transaksi.id_transaksi = ?
                        ";

                $stmt_combined = mysqli_prepare($koneksi, $query_combined);
                mysqli_stmt_bind_param($stmt_combined, "is", $id_users, $id_transaksi);
                mysqli_stmt_execute($stmt_combined);
                $result_combined = mysqli_stmt_get_result($stmt_combined);
                ?>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            while ($row_combined = mysqli_fetch_assoc($result_combined)) {
                                $id_transaksi = $row_combined['id_transaksi'];
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $row_combined['nama_barang']; ?></td>
                                    <td><?php echo $row_combined['jumlah']; ?></td>
                                    <td><?php echo "Rp " . number_format($row_combined['total_harga'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <?php
    include 'js.php';
    ?>
    <!-- Circle progress -->

</body>

</html>