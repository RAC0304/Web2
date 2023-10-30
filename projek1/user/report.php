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
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item active"><a href="./report.php">Pemesanan</a></li>
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
                                <th scope="col" colspan="2">Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            //Dapatkan id dari table users berdasarkan username pengguna yang telah login
                            $username = $_SESSION['username'];
                            $query_get_id_users =
                                "SELECT users.id 
                                FROM login
                                INNER JOIN users ON login.id_user = users.roleId 
                                WHERE login.username = '$username'";
                            $result_id_users = mysqli_query($koneksi, $query_get_id_users);
                            $row_id_users = mysqli_fetch_assoc($result_id_users);
                            $id_users = $row_id_users['id'];


                            $data_barang = mysqli_query(
                                $koneksi,
                                "SELECT
                                users.nama,
                                barang.nama_barang,
                                barang.harga,
                                laporan_pesanan.jumlah,
                                laporan_pesanan.tanggal_pesanan,
                                laporan_pesanan.status_pesanan,
                                laporan_pesanan.id_pesanan,
                                (laporan_pesanan.jumlah * barang.harga) AS total_harga
                                FROM laporan_pesanan
                                INNER JOIN users
                                ON laporan_pesanan.id_users = users.id
                                INNER JOIN barang
                                ON laporan_pesanan.id_barang = barang.id_barang
                                WHERE laporan_pesanan.id_users = $id_users
                                AND laporan_pesanan.status_pesanan = 'On Going'"
                            );
                            while ($tampil = mysqli_fetch_array($data_barang)) {
                                $total_harga = $tampil['total_harga']; // Dapatkan hasil perkalian jumlah dan harga

                                // Konversi ke format rupiah
                                $total_harga_rupiah = "Rp " . number_format($total_harga, 0, ',', '.');
                            ?>
                                <tr>
                                    <td><?php echo "PSN " . $no++; ?></td>
                                    <td><?php echo $tampil['nama']; ?></td>
                                    <td><?php echo $tampil['nama_barang']; ?></td>
                                    <td>
                                        <form action="proses_edit_jumlah.php" method="post"> <!-- Ganti 'proses_edit_jumlah.php' dengan nama file yang sesuai -->
                                            <input type="hidden" name="id_pesanan" value="<?php echo $tampil['id_pesanan']; ?>">
                                            <input type="number" name="jumlah" value="<?php echo $tampil['jumlah']; ?>" style="width:60px;">
                                            <input type="submit" value="Simpan" class="btn btn-outline-primary btn-sm">
                                        </form>
                                    </td>
                                    <td><?php echo $total_harga_rupiah; ?></td>
                                    <td><?php echo $tampil['tanggal_pesanan']; ?></td>
                                    <td><?php echo $tampil['status_pesanan']; ?></td>
                                </tr>
                                <form action="proses_metode_pembayaran.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?php echo $tampil['id_pesanan']; ?>">

                                    <div class="form-group">
                                        <label for="metode_pembayaran" class="text-black">Metode Pembayaran</label>
                                        <select name="metode_pembayaran" class="form-control">
                                            <option selected disabled>Pilih Metode Pembayaran</option>
                                            <option value="VA">Kartu Kredit</option>
                                            <option value="Transfer">Transfer Bank</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Pesan</button>
                                </form>
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