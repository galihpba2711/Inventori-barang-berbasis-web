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
  <title>Data Stok Barang</title>
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
        <h1 class="mt-4">Data Stok Barang</h1>

        <?php
        if (isset($_SESSION['errorMessage'])) {
          echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage'] . '</div>';

          unset($_SESSION['errorMessage']);
        }
        ?>

        <div class="card mb-4">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Tambah Stok Barang
            </button>
            <a class="btn btn-primary" href="index.php">Back</a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Jenis</th>
                    <th>Stok Barang</th>
                    <th>Stok Beli</th>
                    <th>Stok Terjual</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  $ambilsemuadatastock = mysqli_query($koneksi, "select * from barang");
                  while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                    // var_dump($data);
                    $id_barang = $data['id_barang'];
                    $nama_barang = $data['nama_barang'];
                    $nama_jenis = $data['nama_jenis'];
                    $jumlah_stok = $data['jumlah_stok'];
                    $stok_beli = $data['stok_beli'];
                    $stok_terjual = $data['stok_terjual'];
                  ?>
                    <tr>
                      <td><?= $id_barang; ?></td>
                      <td><?= $nama_barang; ?></td>
                      <td><?= $nama_jenis; ?></td>
                      <td><?= $jumlah_stok; ?></td>
                      <td><?= $stok_beli; ?></td>
                      <td><?= $stok_terjual; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $no++; ?>">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $no++; ?>">
                          Delete
                        </button>

                      </td>
                    </tr>
                  <?php
                  };
                  ?>
                </tbody>
              </table>

              <?php
                  $noModal = 0;

                  $ambilsemuadatastock = mysqli_query($koneksi, "select * from barang");
                  while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                    $id_barang = $data['id_barang'];
                    $nama_barang = $data['nama_barang'];
                    $nama_jenis = $data['nama_jenis'];
                    $jumlah_stok = $data['jumlah_stok'];
                    $stok_beli = $data['stok_beli'];
                    $stok_terjual = $data['stok_terjual'];
                  ?>
                  <!-- edit Modal -->
                  <div class="modal fade" id="edit<?= $noModal++; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Data Stok Barang</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              <input type="text" name="nama_barang" value="<?= $nama_barang; ?>" class="form-control" required>
                              </br>
                              <input type="text" name="nama_jenis" value="<?= $nama_jenis; ?>" class="form-control" required>
                              </br>
                              <input type="number" name="jumlah_stok" value="<?= $jumlah_stok; ?>" class="form-control" min=0 required>
                              </br>
                              <input type="number" name="stok_beli" value="<?= $stok_beli; ?>" class="form-control" min=0 required>
                              </br>
                              <input type="number" name="stok_terjual" value="<?= $stok_terjual; ?>" class="form-control" min=0 required>
                              </br>
                              <input type="hidden" name="id_barang" value="<?= $id_barang; ?>">
                              <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- delete Modal -->
                    <div class="modal fade" id="delete<?= $noModal++; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Stok Barang?</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus <?= $nama_barang; ?>?
                              <input type="hidden" name="id_barang" value="<?= $id_barang; ?>">
                              <br>
                              <br>
                              <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                <?php
                };
                ?>
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
          <h4 class="modal-title">Tambah Data Stok Barang</h4>
          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="post">
          <div class="modal-body">

            <br>
            <input type="text" name="id_barang" class="form-control" placeholder="Id Barang" required>
            <br>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama" required>
            <br>
            <input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis Barang" required>
            </br>
            <input type="text" name="jumlah_stok" class="form-control" placeholder="Jumlah Stok" required>
            </br>
            <input type="number" name="stok_beli" class="form-control" placeholder="Stok Beli" min=0 required>
            </br>
            <input type="number" name="stok_terjual" class="form-control" placeholder="Stok Terjual" min=0 required>
            </br>
            <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
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