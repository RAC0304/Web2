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

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "admin" && "user") {
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
                            <li class="breadcrumb-item">Main Menu</li>
                            <li class="breadcrumb-item active"><a href="./halaman_karyawan.php">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-header text-white">
                                <h3 class="card-title">Biodata Karyawan</h3>
                            </div>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $query = "SELECT * FROM karyawan";
                            $result = mysqli_query($koneksi, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsUysrs70O7Sxz1A1B518l_nTsUu-Aw32n6_ULhYFSuA&s" alt="Profile Picture" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-8">
                                                <h4><?php echo $row['nama']; ?></h4>
                                                <p>Jabatan: <strong><?php echo $row['jabatan']; ?></strong></p>
                                                <p>Alamat: <strong><?php echo $row['alamat']; ?></strong></p>
                                                <p>Email: <strong><?php echo $row['email']; ?></strong></p>
                                                <p>Nomor Telepon: <strong>+62 <?php echo $row['mobile']; ?></strong></p>
                                            </div>
                                    <?php
                                }
                            } else {
                                echo '<p>Tidak ada data karyawan.</p>';
                            }

                            mysqli_close($koneksi);
                                    ?>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>


                <?php
                // Pagination
                $per_page = 5; // Jumlah data per halaman
                include '../koneksi.php';
                $query = "SELECT * FROM karyawan";
                $result = mysqli_query($koneksi, $query);

                $total_data = mysqli_num_rows($result);
                $total_pages = ceil($total_data / $per_page);

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $per_page;

                $query_pagination = "SELECT * FROM karyawan LIMIT $offset, $per_page";
                $result_pagination = mysqli_query($koneksi, $query_pagination);

                // ...
                ?>

                <!-- Pagination -->
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if ($result_pagination && mysqli_num_rows($result_pagination) > 0) {
                                while ($row = mysqli_fetch_assoc($result_pagination)) {
                                    // Menampilkan data karyawan
                                    // ...
                                }
                            } else {
                                echo '<p>Tidak ada data karyawan.</p>';
                            }
                            ?>
                        </div>

                        <!-- Tambahkan bagian ini untuk paginasi -->
                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- ... -->


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