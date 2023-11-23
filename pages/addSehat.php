<?php 
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $dokter = $_POST['dokter'];
    $klinik = $_POST['klinik'];
    $izin   = $_POST['noizin'];
    $karyawan = $_POST['idkaryawan'];
    $bb     = $_POST['bb'];
    $tb     = $_POST['tb'];
    $kel    = $_POST['keluhan'];
    $tekanan = $_POST['tekanan'];
    $bw      = $_POST['bw'];
    $fisik   = $_POST['fisik'];
    $nafas   = $_POST['nafas'];
    $nadi    = $_POST['nadi'];
    $suhu   = $_POST['suhu'];
    $saturasi = $_POST['saturasi'];
    $syarat = $_POST['syarat'];
    $syarat2 = $_POST['syarat2'];
    $tgldaftar = $_POST['tgldaftar'];

    $datasehat = mysqli_query($koneksi, "INSERT INTO sehat (idkaryawan, dokter, klinik, izin_klinik, berat_badan, tinggi_badan,
    keluhan, tekanan_darah, buta_warna, fisik, nafas, nadi, suhu, saturasi_o2, syarat, syarat2, tgl_daftar) values 
    ('$karyawan', '$dokter', '$klinik', '$izin', '$bb', '$tb', '$kel', '$tekanan', '$bw', '$fisik',
    '$nafas', '$nadi', '$suhu', '$satuari', '$syarat', '$syarat2', '$tgldaftar')");

    if ($datasehat) {
        header("location:sehat.php?pesan=berhasilditambahkan");
    } else {
        echo "<script>
        alert ('Gagal menambahkand data baru !');
        window.location.href='sehat.php';
        </script>";
    }
}
?> 