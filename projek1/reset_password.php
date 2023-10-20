<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projek1";

$conn = mysqli_connect($servername, $username, $password, $dbname);


//memeriksa apakah email dan jawaban matematika sudah diisi
if (isset($_POST['username']) && isset($_POST['math_question'])) {
    $username = $_POST['username'];
    $ibu = $_POST['ibu'];
    $password = $_POST['password'];
    $math_question = $_POST['math_question'];

    //memeriksa apakah jawaban matematika benar
    if ($math_question == 6) {
        //mengambil data pengguna dari database
        $sql = "SELECT * FROM login WHERE username='$username' AND ibu='$ibu'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            //memperbarui password pengguna di database
            $sql = "UPDATE login SET password='$password' WHERE username='$username' AND ibu='$ibu'";
            mysqli_query($conn, $sql);

            header("location:index.php");
        } else {
            echo "Username dan Nama Ibu Kandung tidak disesuai.";
        }
    } else {
        echo "Jawaban matematika salah.";
    }
}

mysqli_close($conn);
