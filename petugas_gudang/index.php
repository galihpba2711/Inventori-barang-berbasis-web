<?php

session_start();

require '../function.php';

$query1     = $koneksi->query("SELECT * FROM barang");
$query2     = $koneksi->query("SELECT * FROM masuk");
$query3     = $koneksi->query("SELECT * FROM keluar");
$query4     = $koneksi->query("SELECT sum(jumlah_stok) as total_stok FROM barang");
$query5     = $koneksi->query("SELECT masuk.tgl, sum(detail_masuk.qty) as qty FROM detail_masuk JOIN masuk ON masuk.no_fak = detail_masuk.no_fak GROUP BY masuk.no_fak ORDER BY masuk.tgl DESC LIMIT 7");
$query6     = $koneksi->query("SELECT * FROM detail_keluar ORDER BY no DESC LIMIT 7");

$jml_stokbarang = mysqli_num_rows($query1);
$jml_barangmasuk = mysqli_num_rows($query2);
$jml_barangkeluar = mysqli_num_rows($query3);
$jml_stok = $query4->fetch_assoc()['total_stok'] ?? 0;
$barangMasuk = [];
$barangKeluar = [];

while ($row = $query5->fetch_assoc()) {
    $barangMasuk[] = $row;
}

while ($row = $query6->fetch_assoc()) {
    $barangKeluar[] = $row;
}

// var_dump($barangMasuk);
// die();
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
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">

    <?php include './components/navbar.php' ?>

    <main id="layoutSidenav">

        <?php include './components/sidebar.php' ?>

        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="huge">Data Barang</div>
                                <div class="huge"><?php echo number_format($jml_stokbarang, 0, ",", "."); ?></div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="/petugas_gudang/barang">
                                    <a class="small text-white stretched-link" href="/inventori2/petugas_gudang/barang.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <div class="huge">Barang Masuk</div>
                                <div class="huge"><?php echo number_format($jml_barangmasuk, 0, ",", "."); ?></div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="/petugas_gudang/barangmasuk">
                                    <a class="small text-white stretched-link" href="/inventori2/petugas_gudang/masuk.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <div class="huge">Barang Keluar</div>
                                <div class="huge"><?php echo number_format($jml_barangkeluar, 0, ",", "."); ?></div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="/petugas_gudang/barangkeluar">
                                    <a class="small text-white stretched-link" href="/inventori2/petugas_gudang/keluar.php">View Details</a>
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
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Barang Masuk
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Barang Keluar
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="../js/scripts.js"></script>

    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    foreach ($barangMasuk as $value) {
                        echo "'{$value['tgl']}', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: "Jumlah Barang Masuk",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [
                        <?php
                        foreach ($barangMasuk as $value) {
                            echo "{$value['qty']}, ";
                        }
                        ?>
                    ],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    </script>

    <script>
        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    foreach ($barangKeluar as $value) {
                        echo "'{$value['nama_barang']}', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: "Jumlah Barang Keluar",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: [
                        <?php
                        foreach ($barangKeluar as $value) {
                            echo "{$value['qty']}, ";
                        }
                        ?>
                    ],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'day'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    </script>
</body>

</html>