<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1>Edit Karyawan</h1>
        <?php
        session_start(); // Tambahkan session_start() di awal
        $id_karyawan = $_GET['id_karyawan'];
        include '../koneksi.php';
        $no = 1;
        $query = "SELECT * FROM karyawan where id_karyawan='$id_karyawan'";
        $data = mysqli_query($koneksi, $query);
        while ($tampil = mysqli_fetch_array($data)) {
        ?>
            <form action="proses_edit_karyawan.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id_karyawan; ?>"> <!-- Perbaiki variabel $id menjadi $id_karyawan -->
                <input type="hidden" name="id" value="<?= $tampil['id_karyawan']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $tampil['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $tampil['email']; ?>" required> <!-- Perbaiki value dari 'nama' menjadi 'email' -->
                </div>

                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="jk" required>
                        <option value="Laki-laki" <?= ($tampil['jk'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($tampil['jk'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl" class="form-control" id="tgl" value="<?= $tampil['tgl_lahir']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $tampil['mobile']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $tampil['alamat']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $tampil['jabatan']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto" required>
                </div>

                <!-- Tambahkan field Jenis Kelamin, Tanggal Lahir, No. HP, Alamat, Umur, Jabatan, dan Foto sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>