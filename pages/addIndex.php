<?php 
include "../koneksi.php";

if (isset($_POST['save'])) {
    $nrp  = $_POST['nrp'];
    $nama = $_POST['nama'];
    $tglL = $_POST['tgllahir'];
    $alamat = $_POST['almt'];
    $jk = $_POST['jk'];
    $status = $_POST['status'];
    $inst = $_POST['instansi'];

    // insert kedalam database karyawan
    $data = mysqli_query($koneksi, "INSERT INTO karyawan (id, nama, tgl_lahir, alamat, status, jk, instansi) VALUES ('$nrp', '$nama', '$tglL', '$alamat', '$status', '$jk', '$inst')");

    if ($data) {
        header("location:index.php?pesan=berhasilditambah");
    } else {
        echo "<script>
        alert ('Data gagal disimpan !');
        window.location.href:'index.php';
        </script>";
    }
}
?>