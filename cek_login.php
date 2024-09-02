<?php

session_start();

//panggil koneksi database
include "function.php";

$pass = ($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);

//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama'] = $user_valid['nama'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Pegawai") {
            header('location:petugas_gudang/index.php');
        } elseif ($level == "Admin") {
            header('location:index2.php');
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='login2.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='login2.php'</script>";
}
