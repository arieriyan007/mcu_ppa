<?php
include "../koneksi.php";
$karyawan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM karyawan WHERE idkaryawan='$_GET[id]'"));
$data_karyawan = array(
                    'nama_karyawan'     =>  $karyawan['nama'],
                    'jk'     =>  $karyawan['jk'],
                    'alamat' =>  $karyawan['alamat'],
                    'tgl'   => $karyawan['tgl_lahir'],
                    );
                    
 echo json_encode($data_karyawan);