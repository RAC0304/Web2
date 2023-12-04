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
                            <li class="breadcrumb-item active"><a href="./halaman_karyawan.php">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <h1 class="">Biodata Karyawan</h1>

                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $query = "SELECT * FROM karyawan";
                            $result = mysqli_query($koneksi, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['umur']; ?></td>
                                        <td><?php echo $row['jabatan']; ?></td>
                                        <td>
                                            <a href="./app-profile.php?id_karyawan=<?php echo $row['id_karyawan']; ?>" class="btn btn-outline-success">Detail</a>
                                            <a href="./edit_karyawan.php?id_karyawan=<?php echo $row['id_karyawan']; ?>" class="btn btn-outline-primary">Edit</a>
                                            <a href="../delete.php?id_karyawan=<?php echo $row['id_karyawan']; ?>" class="btn btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="5">Tidak ada data karyawan.</td></tr>';
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
    <?php
    include 'js.php';
    ?>
    <!-- Circle progress -->

</body>

</html>