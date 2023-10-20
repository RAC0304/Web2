<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lupa Password</title>
</head>

<body>

    <div class="container">
        <h4 class="text-center mb-4">Lupa Password</h4>
        <form method="post" action="reset_password.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="username" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="ibu">Nama Ibu Kandung:</label>
                <input type="text" id="ibu" name="ibu" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password Baru:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="math_question">Berapa hasil dari 2 + 2 x 2?</label>
                <input type="number" id="math_question" name="math_question" class="form-control" required>
            </div>
            <div class="text-center">
                <input type="submit" value="Reset Password" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>