<?php 

//panggil koneksi 

require 'function.php'; 

session_start();

//enkripsi inputan pass lama 
$password_lama = ($_POST['pass_lama']); 

//panggil username 
$username = $_SESSION['username'];

//uji jika pass lama sesuai 
$tampil = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil); 

//jika data ditemukan, maka password sesuai 
if ($data) {
    //uji jika pssword baru dan konfirmasi password sama
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass']; 

    if ($password_baru == $konfirmasi_password) {
        //proses ganti pass
        //enkripsi pass baru 
        $pass_ok = ($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "UPDATE login set password = '$pass_ok' WHERE username = '$data[username]'");
        if ($ubah){
            echo "<script>alert('Password anda berhasil diubah, silahkan login untuk menguji password baru anda.!');document.location='login2.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='gantipassword2.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='gantipassword2.php'</script>";
}