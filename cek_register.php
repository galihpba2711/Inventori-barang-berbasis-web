<?php

$koneksi = mysqli_connect("localhost", "root", "", "inventori");
// Menambah Data Supplier

if (isset($_POST['addregistrasi'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    try {
        $adduser = mysqli_query($koneksi, "insert into login (nama, username, password, level) values ('$nama', '$username', '$password', '$level')");

        if ($adduser) {
            header('location:login2.php');
        } else {
            $_SESSION['errorMessage'] = 'Gagal';
        }
    } catch (\Throwable $th) {
        $_SESSION['errorMessage'] = 'Gagal: ' . $th->getMessage();
    }
}