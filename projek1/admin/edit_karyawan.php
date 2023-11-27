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

    <form action="proses-edit.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="< $nama; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="< $email; ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Jenis Kelamin</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="< $alamat; ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Tanggal Lahir</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="< $alamat; ?>">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="< $no_hp; ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="< $alamat; ?>">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Umur</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="< $no_hp; ?>">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Jabatan</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="< $no_hp; ?>">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Foto</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="< $no_hp; ?>">
        </div>
        

        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
