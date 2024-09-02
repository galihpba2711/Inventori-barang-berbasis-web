<?php

require '../function.php';
$data = $koneksi->query("SELECT * FROM masuk");
$total = 0;
while ($tampil = $data->fetch_array()) {
    $total += $tampil["harga_beli"];
}

$data2 = $koneksi->query("SELECT * FROM keluar");
$total2 = 0;
while ($tampil2 = $data2->fetch_array()) {
    $total2 += $tampil2["harga_jual"];
}

$total3 = $total2-$total
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penghasilan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php include './components/navbar.php' ?>

    <main id="layoutSidenav">

        <?php include './components/sidebar.php' ?>

        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penghasilan</h1>
                <ol class="breadcrumb mb-4">
    
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="huge">Jumlah Pembelian</div>
                            <div class="huge">Rp.<?php echo number_format($total); ?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="?page=barang">
                                    <a class="small text-white stretched-link" href="masuk.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="huge">Jumlah Pendapatan</div>
                            <div class="huge">Rp.<?php echo number_format($total3); ?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="huge">Jumlah Penjualan</div>
                            <div class="huge">Rp.<?php echo number_format($total2); ?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="?page=barangkeluar">
                                    <a class="small text-white stretched-link" href="keluar.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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