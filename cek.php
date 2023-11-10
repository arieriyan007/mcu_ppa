<?php 
// jika user belum login maka akan kembali ke halaman login
if (isset($_SESSION['log'])) {
    #kosongkan
} else {
    header("location:../index.php?status=silahkanlogin");
}
?>