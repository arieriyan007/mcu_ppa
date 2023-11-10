<?php 
include "koneksi.php";

if (isset($_POST['login'])) {
    // $email = $_POST['email'];
    $user = $_POST['username'];
    $pass  = md5($_POST['password']);

    $cekdata = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$user' AND password='$pass'");
    // hitung jumlah datanya jika ada maka 1 jika tidak maka 0
    $hitung = mysqli_num_rows($cekdata);
    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        $_SESSION['username'] = $user;
        header("location:pages/index.php");
    } else {
        header("location:index.php?status=gagal");
    }
}

// membuat lock saat sudah login maka tidak bisa kembali ke menu login
if (!isset($_SESSION['log'])) {
    
} else {
    header("location:pages/index.php");
}
?>