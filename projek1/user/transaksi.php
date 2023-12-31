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
    <title><?php echo $judul_halaman; ?>Transaksi</title>
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
                            <li class="breadcrumb-item active"><a href="./transaksi.php">Transaksi</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';

                            $no = 1;
                            $query_transaksi = "SELECT id_transaksi, metode_pembayaran, SUM(total_harga) as total_harga
                        FROM transaksi
                        GROUP BY id_transaksi";
                            $result_transaksi = mysqli_query($koneksi, $query_transaksi);

                            if (mysqli_num_rows($result_transaksi) > 0) {
                                while ($row_transaksi = mysqli_fetch_assoc($result_transaksi)) {
                                    $total_harga = $row_transaksi['total_harga'];
                                    $total_harga_rupiah = "Rp " . number_format($total_harga, 0, ',', '.');
                                    $id_transaksi = $row_transaksi['id_transaksi'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $id_transaksi; ?></td>
                                        <td><?php echo $row_transaksi['metode_pembayaran']; ?></td>
                                        <td><?php echo $total_harga_rupiah; ?></td>
                                        <td>
                                            <a href="./detail_transaksi.php?id_transaksi=<?php echo $id_transaksi; ?>" class="btn btn-outline-primary">Detail</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>Data Transaksi tidak ditemukan.</td></tr>";
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-detail').on('click', function() {
                var id_transaksi = $(this).data('id_transaksi');
                $.ajax({
                    type: 'POST',
                    url: 'load_modal_content.php',
                    data: {
                        id_transaksi: id_transaksi
                    },
                    success: function(data) {
                        $('#modal-content').html(data);
                        $('#detailTransaksi_' + id_transaksi).modal('show');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat detail transaksi.');
                    }
                });
            });
        });
    </script>

    <!-- Circle progress -->

</body>

</html>