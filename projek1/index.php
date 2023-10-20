<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <?php
    if (isset($_GET['login'])) {
        if ($_GET['login'] == "gagal") {
            echo "<div class='alert' data-dismiss='alert' data-delay='2000'>Username dan Password tidak sesuai !</div>";
        }
    }

    ?>

    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <!-- cek apakah register berhasil -->
                                    <?php
                                    // cek apakah register berhasil
                                    if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
                                        echo "<div class='alert alert-success' data-dismiss='alert' data-delay='2000'>Daftar berhasil. Silahkan login dengan username dan password Anda.</div>";
                                    } else if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
                                        echo "<div class='alert alert-danger' data-dismiss='alert' data-delay='2000'>Daftar gagal. Username sudah digunakan</div>";
                                    }

                                    if (isset($_GET['edit_user']) && $_GET['edit_user'] == 'sukses') {
                                        echo "<div class='alert alert-success' data-dismiss='alert' data-delay='2000'>Ubah data user berhasil.</div>";
                                    } else if (isset($_GET['edit_user']) && $_GET['edit_user'] == 'gagal') {
                                        echo "<div class='alert alert-danger' data-dismiss='alert' data-delay='2000'>Ubah User gagal</div>";
                                    }
                                    ?>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="cek_login.php" method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Isi Username disini" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Isi Password Di sini" required>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <a href="lupa_password.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.php">Sign up</a></p>
                                        <p><a class="text-primary" href="./edit_user.php">Edit User</a></p>
                                    </div>
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
    <script src="./js/custom.min.js"></script>

</body>

</html>