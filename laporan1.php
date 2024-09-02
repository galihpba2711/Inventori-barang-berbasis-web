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
        <title>Data Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
<body>
    <div class="container"> 
        <h2>Stok Barang</h2>
        <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">
        <a class="btn btn-primary"  href="index2.php">Back</a>
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Id Supplier</th>
                                                <th>Nama Jenis</th>
                                                <th>Stok Beli</th>
                                                <th>Stok Terjual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ambilsemuadatastock = mysqli_query($koneksi, "select * from barang"); 
                                        while($data = mysqli_fetch_array($ambilsemuadatastock)){
                                            $id_barang = $data['id_barang'];
                                            $nama_barang = $data['nama_barang'];
                                            $nama_jenis = $data['nama_jenis'];
                                            $jumlah_stok = $data['jumlah_stok'];
                                            $stok_beli = $data['stok_beli'];
                                            $stok_terjual = $data['stok_terjual'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id_barang;?></td>
                                                <td><?php echo $nama_barang;?></td>
                                                <td><?php echo $nama_jenis;?></td>
                                                <td><?php echo $jumlah_stok;?></td>
                                                <td><?php echo $stok_beli;?></td>
                                                <td><?php echo $stok_terjual;?></td>
                                            
                                            </tr>
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


    




