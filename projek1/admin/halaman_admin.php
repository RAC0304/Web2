<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Admin </title>
    <!-- Favicon icon -->

    <?php
    include './css.php';
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

        <?php include 'navbar.php'; ?>

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
                            <li class="breadcrumb-item">Main Menu</li>
                            <li class="breadcrumb-item active"><a href="./halaman_admin.php">Dashboard</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-money text-success border-success"></i>
                                </div>
                                <?php
                                include '../koneksi.php';
                                $total_total_query = mysqli_query($koneksi, "SELECT SUM(total_harga) FROM transaksi");
                                $total_pendapatan = mysqli_fetch_assoc($total_total_query)['SUM(total_harga)'];
                                $pendapatan =
                                    "Rp " . number_format($total_pendapatan, 0, ',', '.');
                                ?>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Profit</div>
                                    <div class="stat-digit"><?php echo $pendapatan; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary border-primary"></i>
                                </div>
                                <?php
                                include '../koneksi.php';
                                $total_users_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM users");
                                $total_users = mysqli_fetch_assoc($total_users_query)['COUNT(*)'];
                                ?>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Customer</div>
                                    <div class="stat-digit"><?php echo $total_users; ?></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <?php
                                include '../koneksi.php';
                                $total_karyawan_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM karyawan");
                                $total_karyawan = mysqli_fetch_assoc($total_karyawan_query)['COUNT(*)'];
                                ?>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Karyawan</div>
                                    <div class="stat-digit"><?php echo $total_karyawan; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-link text-danger border-danger"></i>
                                </div>
                                <?php
                                include '../koneksi.php';
                                $total_barang_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM barang");
                                $total_barang = mysqli_fetch_assoc($total_barang_query)['COUNT(*)'];
                                ?>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Barang</div>
                                    <div class="stat-digit"><?= $total_barang; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    // Lakukan query SQL untuk mengambil total pesanan
                    $total_pesanan_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pesanan FROM laporan_pesanan");
                    $total_pesanan_belum = mysqli_query($koneksi, "SELECT COUNT(*) FROM laporan_pesanan WHERE status_pesanan='Belum Bayar'");
                    $total_pesanan_sudah = mysqli_query($koneksi, "SELECT COUNT(*) FROM laporan_pesanan WHERE status_pesanan='Sudah Dibayar'");
                    $total_pesanan_proses = mysqli_query($koneksi, "SELECT COUNT(*) FROM laporan_pesanan WHERE status_pesanan='proses'");

                    // Ambil nilai langsung dari hasil query tanpa perlu menyimpan variabel tambahan
                    $total_pesanan_belum = mysqli_fetch_assoc($total_pesanan_belum)['COUNT(*)'];
                    $total_pesanan_sudah = mysqli_fetch_assoc($total_pesanan_sudah)['COUNT(*)'];
                    $total_pesanan_proses = mysqli_fetch_assoc($total_pesanan_proses)['COUNT(*)'];

                    // Periksa apakah query berhasil dijalankan
                    if ($total_pesanan_query) {
                        $total_pesanan = mysqli_fetch_assoc($total_pesanan_query)['total_pesanan'];
                    } else {
                        $total_pesanan = 0; // Atur nilai default jika terjadi kesalahan
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="card">Total Pesanan</h5>
                            <p class="card-text">
                                <?= $total_pesanan; ?>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card">Total Pesanan Belum Bayar</h5>
                            <p class="card-text">
                                <?= $total_pesanan_belum; ?>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card">Total Pesanan Sudah Bayar</h5>
                            <p class="card-text">
                                <?= $total_pesanan_sudah; ?>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card">Total Pesanan Proses</h5>
                            <p class="card-text">
                                <?= $total_pesanan_proses; ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
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

    <script src=".././vendor/global/global.min.js"></script>
    <script src=".././js/quixnav-init.js"></script>
    <script src=".././js/custom.min.js"></script>

    <script src=".././vendor/chartist/js/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src=".././vendor/moment/moment.min.js"></script>
    <script src=".././vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src=".././js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>