<?php 
include "../koneksi.php";

if (isset($_POST['updateEdit'])) {
    $idk = $_POST['idk'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl    = $_POST['tgl'];
    $jk     = $_POST['jk'];
    $inst   = $_POST['instansi'];
    $status = $_POST['status'];

    $update = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama', tgl_lahir='$tgl', alamat='$alamat', status='$status', jk='$jk', instansi='$inst' WHERE idkaryawan='$idk'");

    if ($update) {
        header("location:index.php?pesan=berhasildiupdate");
    } else {
        echo "<script>
        alert ('Update data karyawan gagal diubah !');
        window.location.href='index.php';
        </script>";
    }
}
?>