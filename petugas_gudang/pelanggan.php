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
  <title>Data Supplier</title>
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
        <h1 class="mt-4">Data Pelanggan</h1>

        <?php
        if (isset($_SESSION['errorMessage'])) {
          echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage'] . '</div>';

          unset($_SESSION['errorMessage']);
        }
        ?>

        <div class="card mb-4">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Tambah Pelanggan
            </button>
            <a class="btn btn-primary" href="index.php">Back</a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ambilsemuadatastock = mysqli_query($koneksi, "select * from pelanggan");
                  while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                    $id_pelanggan = $data['id_pelanggan'];
                    $nama_pelanggan = $data['nama_pelanggan'];
                    $alamat = $data['alamat'];
                    $telepon = $data['telepon'];
                    $email = $data['email'];
                  ?>
                    <tr>
                      <td><?= $id_pelanggan; ?></td>
                      <td><?= $nama_pelanggan; ?></td>
                      <td><?= $alamat; ?></td>
                      <td><?= $telepon; ?></td>
                      <td><?= $email; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $id_pelanggan; ?>">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $id_pelanggan; ?>">
                          Delete
                        </button>

                      </td>
                    </tr>
                    <!-- edit Modal -->
                    <div class="modal fade" id="edit<?= $id_pelanggan; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Pelanggan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              <input type="text" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>" class="form-control" required>
                              </br>
                              <input type="text" name="alamat" value="<?= $alamat; ?>" class="form-control" required>
                              </br>
                              <input type="text" name="telepon" value="<?= $telepon; ?>" class="form-control" required>
                              </br>
                              <input type="text" name="email" value="<?= $email; ?>" class="form-control" required>
                              </br>
                              <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                              <button type="submit" class="btn btn-primary" name="updatepelanggan">Submit</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                    <!-- delete Modal -->
                    <div class="modal fade" id="delete<?= $id_pelanggan; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Pelanggan?</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus <?= $nama_pelanggan; ?>?
                              <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                              <br>
                              <br>
                              <button type="submit" class="btn btn-danger" name="hapuspelanggan">Hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
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
          <h4 class="modal-title">Tambah Pelanggan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal body -->
        <form method="post">
          <div class="modal-body">

            <br>
            <input type="number" name="id_pelanggan" class="form-control" placeholder="Id" required>
            <br>
            <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama" required>

            <br>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>

            <br>
            <input type="number" name="telepon" class="form-control" placeholder="Telepon" required>

            <br>
            <input type="text" name="email" class="form-control" placeholder="Email" required>
            </br>
            <button type="submit" class="btn btn-primary" name="addnewpelanggan">Submit</button>
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