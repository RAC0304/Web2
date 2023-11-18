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
                            <li class="breadcrumb-item active">Main Menu</li>
                            <li class="breadcrumb-item active"><a href="./report_admin.php">Pemesanan</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover table-bordered border-primary mt-3">
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

                            $data_barang = mysqli_query(
                                $koneksi,
                                "SELECT users.nama, barang.nama_barang, barang.harga,laporan_pesanan.id_pesanan, laporan_pesanan.jumlah, laporan_pesanan.tanggal_pesanan, laporan_pesanan.status_pesanan FROM laporan_pesanan INNER JOIN users ON laporan_pesanan.id_users = users.id INNER JOIN barang ON laporan_pesanan.id_barang = barang.id_barang"
                            );
                            while ($tampil = mysqli_fetch_array($data_barang)) {
                            ?>
                                <tr>
                                    <td><?php echo "PSN " . $no++; ?></td>
                                    <td><?php echo $tampil['nama']; ?></td>
                                    <td><?php echo $tampil['nama_barang']; ?></td>
                                    <td><?php echo $tampil['jumlah']; ?></td>
                                    <td><?php echo $tampil['harga']; ?></td>
                                    <td><?php echo $tampil['tanggal_pesanan']; ?></td>
                                    <td>
                                        <?php
                                        $status_pesanan = $tampil['status_pesanan'];

                                        if ($status_pesanan === 'Sudah Dibayar') {
                                            echo '<span class="badge badge-primary">' . $status_pesanan . '</span>';
                                        } elseif ($status_pesanan === 'Belum Dibayar') {
                                            echo '<span class="badge badge-warning">' . $status_pesanan . '</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">' . $status_pesanan . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td scope="row">
                                        <form class="sm-d-inline" action="proses_edit_status.php" method="post">
                                            <select name="status" class="form-select">
                                                <option value="Sudah Dibayar">Sudah Dibayar</option>
                                                <option value="Belum Dibayar">Belum Dibayar</option>
                                                <option value="Cancel">Cancel</option>
                                                <input type="hidden" name="pesanan_id" value="<?php echo $tampil['id_pesanan']; ?>">
                                            </select> <button class="btn btn-success" type>Update</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
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