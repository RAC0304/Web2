<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=".././images/favicon.png">
    <link href=".././vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../icons/font-awesome-old/css/font-awesome.min.css">
    <link href=".././vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href=".././css/style.css" rel="stylesheet">

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
                        <div class="welcome-text">
                            <h4>Hi, <?php echo $_SESSION['username']; ?></h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM barang");
                    while ($tampil = mysqli_fetch_array($data)) {
                    ?>
                        <div class="card m-4" style="width: 18rem;">
                            <img src="../images/barang/<?php echo $tampil['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $tampil['nama_barang']; ?></h5>
                                <p class="card-text"><?php echo $tampil['deskripsi_barang']; ?></p>
                                <p class="card-text text-primary"><?php echo $tampil['harga']; ?></p>
                                <form action="proses_pindah.php" method="post">
                                    <input type="hidden" name="barang_id" value="<?php echo $tampil['id']; ?>">
                                    <input type="submit" class="btn btn-primary" value="CheckOut">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
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
                <p>Copyright © Rendy Ganteng &amp; Developed by <a href="https://www.instagram.com/chiesadwtm/">Chiesa</a> 2023</p>
                <p>Distributed by <a href="https://google.com/" target="_blank">Google</a></p>
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

    <script src=".././vendor/moment/moment.min.js"></script>
    <script src=".././vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src=".././js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>