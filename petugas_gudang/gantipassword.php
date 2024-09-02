<?php

require '../function.php';
$query1     = $koneksi->query("SELECT * FROM barang");
$query2     = $koneksi->query("SELECT * FROM masuk");
$query3     = $koneksi->query("SELECT * FROM keluar");

$jml_stokbarang = mysqli_num_rows($query1);
$jml_barangmasuk = mysqli_num_rows($query2);
$jml_barangkeluar = mysqli_num_rows($query3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">

    <?php include './components/navbar.php' ?>

    <main id="layoutSidenav">

        <?php include './components/sidebar.php' ?>

        <div id="layoutSidenav_content">
            <div class="container p-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Ganti Password (*abaikan jika tidak ingin ganti password)
                    </div>
                    <div class="card-body">
                        <form method="post" action="cekgantipass.php">
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
                            <a class="btn btn-danger" href="index.php">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <script src="../js/scripts.js"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>