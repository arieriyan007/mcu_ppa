<?php 
// aktifkan session
session_start();

// hilangkan error notifikasi
error_reporting(0);
$koneksi = mysqli_connect("localhost","root","root","mcu");

if (mysqli_connect_errno()) {
    echo "<div class='alert alert-danger text-center' role='alert'> Gagal koneksi ke database</div>"; 
}
?>