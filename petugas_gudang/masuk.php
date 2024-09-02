<?php
session_start();

require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data Barang Masuk</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">

  <?php include './components/navbar.php' ?> 

  <main id="layoutSidenav">

    <?php include './components/sidebar.php' ?>

    <div id="layoutSidenav_content">
      <div class="container-fluid">
        <h1 class="mt-4">Data Barang Masuk</h1>

        <?php
        if (isset($_SESSION['errorMessage'])) {
          echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage'] . '</div>';

          unset($_SESSION['errorMessage']);
        }
        ?>
        
        <div class="card mb-4">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Tambah Barang Masuk
            </button>
            <a class="btn btn-primary" href="index.php">Back</a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Fakur Pembelian</th>
                    <th>Tanggal</th>
                    <th>Id Petugas</th>
                    <th>Harga Beli</th>
                    <th>Quantity</th>
                    <th>Satuan</th>
                    <th>Id Supplier</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <body>
                  <?php
                  $ambildata = mysqli_query($koneksi, "SELECT * FROM masuk, detail_masuk WHERE masuk.no_fak = detail_masuk.no_fak") or die(mysqli_error($koneksi));
                  while ($data = mysqli_fetch_array($ambildata)) {
                    $no = $data['no'];
                    $nama_barang = $data['nama_barang'];
                    $no_fak = $data['no_fak'];
                    $tgl = $data['tgl'];
                    $id_user = $data['id_user'];
                    $harga_beli = $data['harga_beli'];
                    $qty = $data['qty'];
                    $satuan = $data['satuan'];
                    $id_supplier = $data['id_supplier'];
                    $keterangan = $data['keterangan'];
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $nama_barang; ?></td>
                      <td><?= $no_fak; ?></td>
                      <td><?= $tgl; ?></td>
                      <td><?= $id_user; ?></td>
                      <td><?= $harga_beli; ?></td>
                      <td><?= $qty; ?></td>
                      <td><?= $satuan; ?></td>
                      <td><?= $id_supplier; ?></td>
                      <td><?= $keterangan; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $no_fak; ?>">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $no_fak; ?>">
                          Delete
                        </button>

                      </td>
                    </tr>
                    <!-- edit Modal -->
                    <div class="modal fade" id="edit<?= $no_fak; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Barang Masuk</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              <input type="text" name="nama_barang" value="<?= $nama_barang; ?>" class="form-control" required>
                              </br>
                              <input type="date" name="tgl" value="<?= $tgl; ?>" class="form-control" required>
                              </br>
                              <input type="number" name="id_user" value="<?= $id_user; ?>" class="form-control" required>
                              </br>
                              <input type="number" name="harga_beli" value="<?= $harga_beli; ?>" class="form-control" required>
                              </br>
                              <input type="number" name="qty" value="<?= $qty; ?>" class="form-control" min=0 required>
                              </br>
                              <input type="text" name="satuan" class="form-control" value="KG" readonly>
                              </br>
                              <input type="number" name="id_supplier" value="<?= $id_supplier; ?>" class="form-control" required>
                              </br>
                              <input type="text" name="keterangan" value="<?= $keterangan; ?>" class="form-control" required>
                              </br>
                              <input type="hidden" name="no_fak" value="<?= $no_fak; ?>">
                              <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                    <!-- delete Modal -->
                    <div class="modal fade" id="delete<?= $no_fak; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Barang?</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus <?= $nama_barang; ?>?
                              <input type="hidden" name="no_fak" value="<?= $no_fak; ?>">
                              <br>
                              <br>
                              <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
                  };
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include './components/footer.php' ?>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Masuk</h4>
          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="post">
          <div class="modal-body">

            <select name="nama_barang" class="form-control">
              <option value="">Pilih Barang</option>
              <?php
              $ambilsemuadatanya = mysqli_query($koneksi, "select * from barang");
              while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                $nama_barang = $fetcharray['nama_barang'];
                $id_barang = $fetcharray['id_barang'];
              ?>
                <option value="<?= $id_barang; ?>"><?= $nama_barang; ?></option>
              <?php

              }
              ?>
            </select>
            <br>
            <input type="number" name="no_fak" class="form-control" placeholder="Nomor Faktur Pembelian" required>
            <br>
            <input type="date" name="tgl" class="form-control" placeholder="Tanggal" required>
            <br>
            <input type="number" name="id_user" class="form-control" placeholder="Id Petugas" required>
            <br>
            <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" required>
            </br>
            <input type="number" name="qty" class="form-control" placeholder="Quantity" min=0 required>
            </br>
            <input type="text" name="satuan" class="form-control" value="KG" readonly>
            </br>
            <select name="id_supplier" id="id_supplier" class="form-control">
    <option value="">Pilih Supplier</option>
    <?php
    $ambilsemuadatanya = mysqli_query($koneksi, "SELECT * FROM supplier");
    while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
        $id_supplier = $fetcharray['id_supplier'];
        $nama_supplier = $fetcharray['nama_supplier'];
    ?>
        <option value="<?= $id_supplier; ?>" data-nama="<?= $nama_supplier; ?>">
            <?= $id_supplier; ?>
        </option>
    <?php
    }
    ?>
</select>
</br>
<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required>
</br>

<script>
    // JavaScript untuk mengisi otomatis keterangan berdasarkan pilihan supplier
    document.getElementById('id_supplier').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var namaSupplier = selectedOption.getAttribute('data-nama');
        if(namaSupplier) {
            document.getElementById('keterangan').value = "Pembelian Dari " + namaSupplier;
        } else {
            document.getElementById('keterangan').value = ""; // Kosongkan jika tidak ada pilihan
        }
    });
</script>
            <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
          </div>
        </form>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

  <script src="../js/scripts.js"></script>
</body>


</html>