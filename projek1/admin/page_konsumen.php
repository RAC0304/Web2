<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Admin </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href=".././vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href=".././vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../icons/font-awesome-old/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                        <?php
                        include '../welcome.php';
                        ?>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active"><a href="./page_konsumen.php">Konsumen</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="welcome-text">
                        <h5 class="">Data Konsumen</h5>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Input Data Users atau Karyawan</button>
                    <table class="table table-striped">
                        <?php
                        if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
                            echo "<div class='alert alert-success' data-dismiss='alert' data-delay='2000'>Data User berhasil ditambahkan.</div>";
                        } else if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
                            echo "<div class='alert alert-danger' data-dismiss='alert' data-delay='2000'>Username sudah tersedia. Silakan gunakan username yang lain</div>";
                        } else if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapus') {
                            echo "<div class='alert alert-warning' data-dismiss='alert' data-delay='2000'>Data konsumen berhasil dihapus</div>";
                        }
                        ?>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">No Handphone</th>
                                <th scope="col" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT users.*, login.* FROM users INNER JOIN login ON users.roleId = login.id_user");
                        while ($tampil = mysqli_fetch_array($data)) {
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $tampil['nama']; ?></td>
                                    <td><?php echo $tampil['email']; ?></td>
                                    <td><?php echo $tampil['jk']; ?></td>
                                    <td><?php echo $tampil['tgl_lahir']; ?></td>
                                    <td><?php echo $tampil['mobile']; ?></td>
                                    <td>
                                        <a href="./edit_konsumen.php?id=<?= $tampil['id_user']; ?>" class="btn btn-outline-primary">Edit Konsumen</a>
                                        <a href="../delete.php?id=<?php echo $tampil['id_user']; ?>" class="btn btn-outline-danger">DELETE</a>
                                    </td>

                                </tr>
                            <?php } ?>
                            <!-- Tambahkan data konsumen lainnya di sini -->
                            </tbody>
                    </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src=".././js/custom.min.js"></script>


</body>

</html>