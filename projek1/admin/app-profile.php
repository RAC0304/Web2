<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <?php
    include 'css.php';
    ?>
</head>

<body>
    <?php
    session_start();
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Main Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <?php
                $id_karyawan = $_GET['id_karyawan'];
                $username = $_SESSION['username'];
                include '../koneksi.php';
                $no = 1;
                $query = "SELECT * FROM karyawan where id_karyawan='$id_karyawan'";
                $data = mysqli_query($koneksi, $query);
                while ($tampil = mysqli_fetch_array($data)) {
                ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo"></div>
                                        <div class="profile-photo">
                                            <img src="../images/profile/<?php echo $tampil['foto']; ?>" class="img-fluid rounded-circle" alt="">
                                        </div>
                                    </div>

                                    <div class="profile-info">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                        <div class="profile-name">
                                                            <h4 class="text-primary"><?php echo $tampil['nama']; ?></h4>
                                                            <h5><?php echo $tampil['jabatan']; ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                        <div class="profile-email">
                                                            <h4 class="text-muted"><?php echo $tampil['email']; ?></h4>
                                                            <p>Email</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 prf-col">
                                                        <div class="profile-call">
                                                            <h4 class="text-muted"><?php echo $tampil['mobile']; ?></h4>
                                                            <p>Phone No.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                        <div class="profile-name">
                                                            <h4 class="text-muted"><?php echo $tampil['alamat']; ?></h4>
                                                            <p>Alamat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                        <div class="profile-email">
                                                            <h4 class="text-muted"><?php echo $tampil['tgl_lahir']; ?></h4>
                                                            <p>Tanggal Lahir</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 prf-col">
                                                        <div class="profile-call">
                                                            <h4 class="text-muted"><?php echo $tampil['jk']; ?></h4>
                                                            <p>Jenis Kelamin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
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


</body>

</html>