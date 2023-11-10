<?php 
include "../koneksi.php";

if (isset($_POST['deleteData'])) {
    $idk    = $_POST['idk']; //idkaryawan(idk)

    $deletedata = mysqli_query($koneksi, "DELETE FROM karyawan WHERE idkaryawan='$idk' ");
    if ($deletedata) {
        echo "<script>
            alert('Data karyawan berhasil di hapus');
            window.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data karyawan gagal di hapus');
            window.location.href='index.php';
        </script>";
    }
}
?>