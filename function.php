<?php

$koneksi = mysqli_connect("localhost", "root", "", "inventori");
$config = 'https://palegreen-grasshopper-411174.hostingersite.com/';
// Menambah Data Supplier

if (isset($_POST['addnewsupplier'])) {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat']; 
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    try {
        $addtosupplier = mysqli_query($koneksi, "insert into supplier (id_supplier, nama_supplier, alamat, telepon, email) values ('$id_supplier', '$nama_supplier', '$alamat', '$telepon', '$email')");

        if ($addtosupplier) {
            header('location:supplier.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

// update Supplier

if (isset($_POST['updatesupplier'])) {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    try {
        $updatesupplier = mysqli_query($koneksi, "update supplier set nama_supplier = '$nama_supplier', alamat = '$alamat', telepon = '$telepon', email = '$email' where id_supplier = '$id_supplier'");

        if ($updatesupplier) {
            header('location:supplier.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//Hapus Supplier

if (isset($_POST['hapussupplier'])) {
    $id_supplier = $_POST['id_supplier'];

    try {
        $hapus = mysqli_query($koneksi, "delete from supplier where id_supplier = '$id_supplier'");
        if ($hapus) {
            header('location:supplier.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//menambah data pelanggan
if (isset($_POST['addnewpelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    try {
        $addtopelanggan = mysqli_query($koneksi, "insert into pelanggan (id_pelanggan, nama_pelanggan, alamat, telepon, email) values ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$telepon', '$email')");
        if ($addtopelanggan) {
            header('location:pelanggan.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//update pelanggan

if (isset($_POST['updatepelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    try {
        $updatepelanggan = mysqli_query($koneksi, "update pelanggan set nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', telepon = '$telepon', email = '$email' where id_pelanggan = '$id_pelanggan'");
        if ($updatepelanggan) {
            header('location:pelanggan.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//Hapus pelanggan

if (isset($_POST['hapuspelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    try {
        $hapus = mysqli_query($koneksi, "delete from pelanggan where id_pelanggan = '$id_pelanggan'");
        if ($hapus) {
            header('location:pelanggan.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//menambah data stok barang
if (isset($_POST['addnewbarang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $stok_beli = $_POST['stok_beli'];
    $stok_terjual = $_POST['stok_terjual'];

    try {
        $addtobarang = mysqli_query($koneksi, "insert into barang (id_barang, nama_barang, jumlah_stok, stok_beli, stok_terjual) values ('$id_barang', '$nama_barang', '$jumlah_stok', '$stok_beli', '$stok_terjual')");

        if ($addtobarang) {
            header('location:barang.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//update stok barang

if (isset($_POST['updatebarang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $stok_beli = $_POST['stok_beli'];
    $stok_terjual = $_POST['stok_terjual'];

    try {
        $updatebarang = mysqli_query($koneksi, "update barang set nama_barang = '$nama_barang', jumlah_stok = '$jumlah_stok', stok_beli = '$stok_beli', stok_terjual = '$stok_terjual' where id_barang = '$id_barang'");
        if ($updatebarang) {
            header('location:barang.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//Hapus stok barang

if (isset($_POST['hapusbarang'])) {
    $id_barang = $_POST['id_barang'];

    try {
        $hapus = mysqli_query($koneksi, "delete from barang where id_barang = '$id_barang'");
        if ($hapus) {
            header('location:barang.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}
//menambah data barang masuk
if (isset($_POST['barangmasuk'])) {
    $no = $_POST['no'];
    $id_barang = $_POST['nama_barang'];
    $no_fak= $_POST['no_fak'];
    $tgl = $_POST['tgl'];
    $id_user = $_POST['id_user'];
    $harga_beli = $_POST['harga_beli'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $id_supplier = $_POST['id_supplier'];
    $keterangan = $_POST['keterangan'];

    try {
        //hitung stok
        $cekstoksekarang = mysqli_query($koneksi, "select * from barang where id_barang='$id_barang'");
        $ambildatanya = mysqli_fetch_array($cekstoksekarang);
        $nama_barang = $ambildatanya['nama_barang'];

        $stoksekarang = $ambildatanya['stok_beli'];
        $tambahkanstoksekarangdenganquantity = $stoksekarang + $qty;

        $stoknow = $ambildatanya['jumlah_stok'];
        $tambahkanstoksekarangdenganquantitynow = $stoknow + $qty;

        $barangmasuk = mysqli_query($koneksi, "insert into masuk (no_fak, tgl, id_user, harga_beli, id_supplier, satuan) values ('$no_fak', '$tgl', '$id_user', '$harga_beli', '$id_supplier', '$satuan')");
        $barangmasuk .= mysqli_query($koneksi, "insert into detail_masuk (no_fak, nama_barang, harga_beli, qty, keterangan) values ('$no_fak', '$nama_barang', '$harga_beli', '$qty', '$keterangan')");

        $updatestokmasuk = mysqli_query($koneksi, "update barang set stok_beli = '$tambahkanstoksekarangdenganquantity' where id_barang='$id_barang'");
        $updatestokmasuk = mysqli_query($koneksi, "update barang set jumlah_stok = '$tambahkanstoksekarangdenganquantitynow' where id_barang='$id_barang'");

        if ($barangmasuk && $updatestokmasuk) {
            header('location:masuk.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//update barang masuk

if (isset($_POST['updatebarangmasuk'])) {
    $no = $_POST['no'];
    $nama_barang = $_POST['nama_barang'];
    $no_fak = $_POST['no_fak'];
    $tgl = $_POST['tgl'];
    $id_user = $_POST['id_user'];
    $harga_beli = $_POST['harga_beli'];
    $qty = $_POST['qty'];
    $id_supplier = $_POST['id_supplier'];
    $keterangan = $_POST['keterangan'];

    try {
        $updatebarangmasuk = mysqli_query($koneksi, "update masuk set id_user = '$id_user', harga_beli = '$harga_beli', id_supplier = '$id_supplier', satuan = '$satuan' where no_fak = '$no_fak'");
        $updatebarangmasuk .= mysqli_query($koneksi, "update detail_masuk set nama_barang = '$nama_barang', harga_beli = '$harga_beli', qty = '$qty', keterangan = '$keterangan' where no_fak = '$no_fak'");

        if ($updatebarangmasuk) {
            header('location:masuk.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//Hapus barang masuk

if (isset($_POST['hapusbarangmasuk'])) {
    $no_fak = $_POST['no_fak'];

    try {
        $hapus = mysqli_query($koneksi, "delete from masuk where no_fak = '$no_fak'");
        $hapus = mysqli_query($koneksi, "delete from detail_masuk where no_fak = '$no_fak'");

        if ($hapus) {
            header('location:masuk.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}


//menambah data barang keluar
if (isset($_POST['barangkeluar'])) {
    $id_barang = $_POST['nama_barang'];
    $no_fak = $_POST['no_fak'];
    $tgl = $_POST['tgl'];
    $id_user = $_POST['id_user'];
    $harga_jual = $_POST['harga_jual'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $keterangan = $_POST['keterangan'];

    try {
        //hitung stok
        $cekstocksekarang = mysqli_query($koneksi, "select * from barang where id_barang='$id_barang'");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

        $nama_barang = $ambildatanya['nama_barang'];

        $stockBeli = $ambildatanya['jumlah_stok'] - $qty;
        $stockTerjual = $ambildatanya['stok_terjual'] + $qty;

        
    
        $barangkeluar = mysqli_query($koneksi, "insert into keluar (no_fak, tgl, id_user, harga_jual, id_pelanggan, satuan) values ('$no_fak', '$tgl', '$id_user', '$harga_jual', '$id_pelanggan', '$satuan')");
        $barangkeluar .= mysqli_query($koneksi, "insert into detail_keluar (no_fak, nama_barang, harga_jual, qty, keterangan) values ('$no_fak', '$nama_barang', '$harga_jual', '$qty', '$keterangan')");

        $updateStok = mysqli_query($koneksi, "update barang set  jumlah_stok = '$stockBeli', stok_terjual = '$stockTerjual' where id_barang='$id_barang'");

        if ($updateStok) {
            header('location:keluar.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//update barang keluar

if (isset($_POST['updatebarangkeluar'])) {
    $no = $_POST['no'];
    $nama_barang = $_POST['nama_barang'];
    $no_fak = $_POST['no_fak'];
    $tgl = $_POST['tgl'];
    $id_user = $_POST['id_user'];
    $harga_jual = $_POST['harga_jual'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $keterangan = $_POST['keterangan'];

    try {
        $updatebarangkeluar = mysqli_query($koneksi, "update keluar set id_user = '$id_user', no_fak = '$no_fak', harga_jual = '$harga_jual', id_pelanggan = '$id_pelanggan', satuan = '$satuan' where no_fak = '$no_fak'");
        $updatebarangkeluar .= mysqli_query($koneksi, "update detail_keluar set nama_barang = '$nama_barang', no_fak = '$no_fak', harga_jual = '$harga_jual', qty = '$qty', keterangan = '$keterangan' where no_fak = '$no_fak'");

        if ($updatebarangkeluar) {
            header('location:keluar.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}

//Hapus barang keluar

if (isset($_POST['hapusbarangkeluar'])) {
    $no_fak = $_POST['no_fak'];

    try {
        $hapus = mysqli_query($koneksi, "delete from keluar where no_fak = '$no_fak'");
        $hapus = mysqli_query($koneksi, "delete from detail_keluar where no_fak = '$no_fak'");

        if ($hapus) {
            header('location:keluar.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}
