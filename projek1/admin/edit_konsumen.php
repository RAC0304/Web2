<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Focus - Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../icons/font-awesome-old/css/font-awesome.min.css">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Edit Data</h4>
                                    <?php
                                    include '../koneksi.php';
                                    $id_user = $_GET['id'];
                                    $data = mysqli_query($koneksi, "SELECT users.*, login.* FROM users INNER JOIN login ON users.roleId = login.id_user WHERE login.id_user=$id_user");
                                    while ($tampil = mysqli_fetch_array($data)) {
                                    ?>
                                        <form action="cek_edit_konsumen.php" method="post">
                                            <input type="hidden" value="<?= $tampil['id'] ?>" name="id">
                                            <div class="form-group">
                                                <label><strong>Username</strong></label>
                                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $tampil['username']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Nama Lengkap</strong></label>
                                                <input type="text" name="name" class="form-control" placeholder="nama" value="<?= $tampil['nama']; ?>" required />
                                            </div>
                                            <div class=" form-group">
                                                <label><strong>email</strong></label>
                                                <input type="email" name="email" class="form-control" placeholder="email@gmail.com" value="<?= $tampil['email']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-select" aria-label="Default select example" name="jk" required>
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="laki-laki" <?php if ($tampil['jk'] == "laki-laki") echo "selected"; ?>>Laki-laki</option>
                                                    <option value="perempuan" <?php if ($tampil['jk'] == "perempuan") echo "selected"; ?>>Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Password</strong></label>
                                                <input type="password" name="pass" class="form-control" placeholder="*****" id="pass" value="<?= $tampil['password']; ?>" required />
                                                <input type="checkbox" onclick="myFunction()"> Show Password
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Tanggal Lahir</strong></label>
                                                <input type="date" name="tgl" class="form-control" value="<?= $tampil['tgl_lahir']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label><strong>No Handphone</strong></label>
                                                <input type="text" name="no_handphone" class="form-control" placeholder="087xxxx" value="<?= $tampil['mobile']; ?>" ?> required />
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Nama Ibu Kandung</strong></label>
                                                <input type="text" name="ibu" class="form-control" placeholder="Ibu Kandung" value="<?= $tampil['ibu']; ?>" required />
                                            </div>
                                            <div class="text-center mt-4">
                                                <a href="page_konsumen.php" class="btn btn-success mx-2">Submit</a>
                                            </div>
                                        <?php } ?>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--endRemoveIf(production)-->
    <script>
        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>