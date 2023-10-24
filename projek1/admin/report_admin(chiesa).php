<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
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
                    <table class="table table-light table-bordered border-primary mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID Pesanan</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Barang Pesanan</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Tanggal Pesanan</th>
                                <th scope="col">Status Pesanan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM laporan_pesanan");
                                while ($tampil = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>

                                <td><?php echo $tampil['nama_pelanggan']; ?></td>
                                <td><?php echo $tampil['barang_dipesan']; ?></td>
                                <td><?php echo $tampil['jumlah']; ?></td>
                                <td><?php echo $tampil['total_harga']; ?></td>
                                <td><?php echo $tampil['tanggal_pesanan']; ?></td>
                                <td><?php echo $tampil['status_pesanan']; ?></td>
                                <td scope="row">
                                    <a href="#" class="btn btn-warning ms-6">On Going</a>
                                    <a href="#" class="btn btn-success ms-6">Finish</a>
                                    <form class="d-inline" action="proses_edit_statut.php" method="post">
                                        <input type="hidden" name="id" value="Cancel">
                                        <button class="btn btn-danger" type>Cancel</button>
                                </td>
                            </tr>
                            <?php } ?>
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