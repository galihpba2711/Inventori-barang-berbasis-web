<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Barang Keluar</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
<body>
    <div class="container"> 
        <h2>Barang Keluar</h2>
        <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">
        <a class="btn btn-primary"  href="index2.php">Back</a>
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Faktur</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal</th>
                                                <th>Harga Jual</th>
                                                <th>Quantity</th>
                                                <th>Satuan</th>
                                                <th>Id Pelanggan</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                     $ambildata = mysqli_query($koneksi, "SELECT * FROM keluar, detail_keluar WHERE keluar.no_fak = detail_keluar.no_fak") or die (mysqli_error($koneksi));
                                     while($data = mysqli_fetch_array($ambildata)) {
                                            $no = $data['no'];
                                            $no_fak = $data['no_fak'];
                                            $nama_barang = $data['nama_barang'];
                                            $tgl = $data['tgl'];
                                            $harga_jual = $data['harga_jual'];
                                            $qty = $data['qty'];
                                            $satuan = $data['satuan'];
                                            $id_pelanggan = $data['id_pelanggan'];
                                            $keterangan = $data['keterangan'];
                                        ?>
                                            <tr>
                                                <td><?=$no;?></td>
                                                <td><?=$no_fak;?></td>
                                                <td><?=$nama_barang;?></td>
                                                <td><?=$tgl;?></td>
                                                <td><?=$harga_jual;?></td>
                                                <td><?=$qty;?></td>
                                                <td><?=$satuan;?></td>
                                                <td><?=$id_pelanggan;?></td>
                                                <td><?=$keterangan;?></td>
                                               
                                            </tr>
                                            
                                                </div>
                                            </div>
                                            <?php
                                        };
                                        ?>
                                        </tbody>
                                    </table>
</div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
       
        <script src= "https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src= "https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src= "https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src= "https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src= "https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
      
        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                         'excel', 'pdf', 'print'
                    ]
                } );
            } );
            </script>







    </body>
    </html>


    




