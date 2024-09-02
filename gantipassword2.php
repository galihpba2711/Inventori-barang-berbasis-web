<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

        <div class="card">
            <div class="card-header bg-primary text-white">
                Ganti Password (*abaikan jika tidak ingin ganti password)
            </div>
            <div class="card-body">
                <form method="post" action="cekgantipass2.php">
                    <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                    <div class="form-group">
                        <label>Masukkan Password Lama Anda!</label>
                        <input type="password" class="form-control" name="pass_lama" required>
                    </div>
                    <div class="form-group">
                        <label>Masukkan Password Baru Anda!</label>
                        <input type="password" class="form-control" name="pass_baru" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru Anda!</label>
                        <input type="password" class="form-control" name="konfirmasi_pass" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Proses</button>
                    <a class="btn btn-danger"  href="index2.php">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- Penutup container -->
</body>

</html>