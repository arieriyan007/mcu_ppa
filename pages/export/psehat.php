<?php 
include "../../koneksi.php";
include "../../cek.php";
// trigger untuk pembeda pemanggilan data
$idkaryawan = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan surat sehat</title>
<link rel="shortcut icon" href="../../logo/favicon.ico">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

<!-- css body -->
<style>
* {
    box-sizing: border-box;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.page-container {
    border: 2px solid #000;
    padding-top: -5px;
    padding-bottom: -5px;
    padding-left: 7px; /* Ganti nilai ini sesuai kebutuhan Anda */
    padding-right: 0px; /* Ganti nilai ini sesuai kebutuhan Anda */
    max-width: 25cm;
    margin: 0 auto;
    position: relative;
    z-index: -1;
}



.centered-content p {
    margin: 0;
    line-height: 1.2; /* Sesuaikan dengan kebutuhan Anda */
}

.centered-content table {
    margin-top: 8px;
    border-collapse: collapse; /* Tambahkan ini agar border di dalam tabel tidak memengaruhi ukuran */
}

.custom-carousel {
    max-width: 90%;
    margin: 0px;
}

.carousel-item {
    padding: 0px;
}

.slick-slider {
    max-width: 100%;
}

.carousel-title {
    font-family: 'Times New Roman', Times, serif;
    text-align: center;
}

.carousel-item img {
    filter: brightness(0.5);
    transition: filter 0.3s;
    width: 90px;
    height: 100px;
}

.carousel-item img:hover {
    filter: brightness(1);
}

.slick-dots {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    list-style: none;
}

.slick-prev, .slick-next {
    display: none;
}
@media print {
    .page-container {
        border: none; /* atau atur properti-border lainnya yang sesuai */
    }
}

</style>
<!-- akhir css -->

</head>

<body>

<div class="page-container">
    <!-- kop surat atas -->
<center>
    <table>
        <tr>
            <td><img src="../../img/kop1.png" alt="PT.PPA" width="780" height="180"></td>
        </tr>
    </table>
</center>

<?php 
$datasehat = mysqli_query($koneksi, "SELECT * FROM sehat WHERE idkaryawan='$idkaryawan' ");
while ($ds = mysqli_fetch_array($datasehat)) {
    
?>
<!-- isi surat ini masih menggunakan gabungan css didalam html -->
<div class="centered-content">
        <p class=MsoNormal align=center style='text-align:center;line-height:200%'><b><u>SURAT
</u></b><b><u><span lang=IN>KETERANGAN SEHAT</span></u></b></p>

<p class=MsoNormal style='line-height:150%'><span lang=IN>Yang bertanda tangan
dibawah ini :</span></p>

<p class=MsoNormal style='text-indent:.5in;line-height:150%'><span lang=IN>Nama               </span> 
  <span lang=IN>: </span> <?= $ds['dokter']; ?></p>

<p class=MsoNormal style='text-indent:.5in;line-height:150%'><span lang=IN>Instansi  
         </span>    <span lang=IN>: </span> <?= $ds['klinik']; ?></p>

<p class=MsoNormal style='text-indent:.5in;line-height:150%'><span lang=IN>No.
Izin Klinik</span>    <span lang=IN>: </span> <?= $ds['izin_klinik']; ?></p>
                <?php 
                $datakaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE idkaryawan='$idkaryawan'");
                while ($dk = mysqli_fetch_array($datakaryawan)) {

                ?>
                <p class=MsoNormal style='line-height:150%'><span lang=IN>Menerangkan bahwa</span> 
                     :</p>

                <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 align=left
                style='border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:
                6.75pt'>
                <tr>
                <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
                <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Nama</span> </p>
                </td>
                <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>:</p>
                </td>
                <td width=234 colspan=5 valign=top style='width:175.25pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><?= $dk['nama']; ?></p>
                </td>
                <td width=90 colspan=2 valign=top style='width:67.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                </tr>
                <tr>
                <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
                <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Tgl Lahir</span></p>
                </td>
                <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>:</p>
                </td>
                <td width=60 valign=top style='width:44.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p style="display: inliner;"> <?= $dk['tgl_lahir']; ?></p>
                </td>
                <!-- <td width=84 valign=top style='width:63.25pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>Tahun</p>
                </td> -->
                <td width=90 colspan=3 valign=top style='width:67.25pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                <td width=90 colspan=2 valign=top style='width:67.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                </tr>
                <tr>
                <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
                <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal><span lang=IN>Jenis Kelamin</span></p>
                </td>
                <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>:</p>
                </td>
                <td width=144 colspan=2 valign=top style='width:1.5in;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><?= $dk['jk']; ?></p>
                </td>
                <td width=90 colspan=3 valign=top style='width:67.25pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                <td width=66 valign=top style='width:49.75pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                </tr>
                <tr style='height:23.8pt'>
                <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
                <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt;
                height:23.8pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Alamat</span></p>
                </td>
                <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt;
                height:23.8pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>:</p>
                </td>
                <td width=234 colspan=5 valign=top style='width:175.25pt;padding:0in 5.4pt 0in 5.4pt;
                height:23.8pt'>
                <p class=MsoNormal style='line-height:150%;border:none'><?= $dk['alamat']; ?></p>
                </td>
                <td width=66 valign=top style='width:49.75pt;padding:0in 5.4pt 0in 5.4pt;
                height:23.8pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt;
                height:23.8pt'>
                <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
                </td>
                </tr>
                <?php 
                }
                ?>
 <tr>
  <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
  <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>BB</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=60 valign=top style='width:44.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['berat_badan']; ?></p>
  </td>
  <td width=84 valign=top style='width:63.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>Kg</p>
  </td>
  <td width=90 colspan=3 valign=top style='width:67.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=66 valign=top style='width:49.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
  <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>TB</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=60 valign=top style='width:44.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['tinggi_badan']; ?></p>
  </td>
  <td width=84 valign=top style='width:63.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>Cm</p>
  </td>
  <td width=90 colspan=3 valign=top style='width:67.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=66 valign=top style='width:49.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
  <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Keluhan</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=234 colspan=5 valign=top style='width:175.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['keluhan']; ?></p>
  </td>
  <td width=66 valign=top style='width:49.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
  <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>TD</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=60 valign=top style='width:44.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['tekanan_darah']; ?> /</p>
  </td>
  <td width=84 valign=top style='width:63.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>MmHg</span></p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>R</span></p>
  </td>
  <td width=18 valign=top style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=48 valign=top style='width:35.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['nafas']; ?></p>
  </td>
  <td width=90 colspan=2 valign=top style='width:67.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>x<span lang=IN>/menit</span></p>
  </td>
 </tr>
 <tr>
  <td style='border:none;padding:0in 0in 0in 0in' width=48><p class='MsoNormal'>&nbsp;</td>
  <td width=108 valign=top style='width:80.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>N</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=60 valign=top style='width:44.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
  <td width=84 valign=top style='width:63.25pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>x<span lang=IN>/menit</span></p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>T</span></p>
  </td>
  <td width=18 valign=top style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=48 valign=top style='width:35.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><?= $ds['suhu']; ?></p>
  </td>
  <td width=90 colspan=2 valign=top style='width:67.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>°C</p>
  </td>
 </tr>
 <tr>
  <td width=156 colspan=2 valign=top style='width:117.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Pemeriksaan
  Fisik</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=324 colspan=7 valign=top style='width:243.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td width=156 colspan=2 valign=top style='width:117.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'><span lang=IN>Buta
  Warna</span></p>
  </td>
  <td width=30 valign=top style='width:22.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>:</p>
  </td>
  <td width=324 colspan=7 valign=top style='width:243.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr height=0>
  <td width=48 style='border:none'></td>
  <td width=108 style='border:none'></td>
  <td width=30 style='border:none'></td>
  <td width=60 style='border:none'></td>
  <td width=84 style='border:none'></td>
  <td width=25 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=48 style='border:none'></td>
  <td width=66 style='border:none'></td>
  <td width=24 style='border:none'></td>
 </tr>
</table>

<p class=MsoNormal style='line-height:150%'><span lang=IN><br clear=all>
Berdasarkan pemeriksaan kami, yang bersangkutan dinyatakan </span><b><u><span
lang=IN style='font-size:11.0pt;line-height:150%'><?= $ds['syarat']; ?></span></u></b><b><span
style='font-size:11.0pt;line-height:150%'> :</span></b></p>

<p class=MsoNormal style='line-height:150%'>Untuk Syarat : <b>Pekerjaan ketinggian</b></p>

<p class=MsoNormal style='line-height:150%'><span lang=IN>Demikian surat
keterangan sehat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</span></p>

<p class=MsoNormal style='line-height:150%'><span lang=IN>&nbsp;</span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width=222
 style='margin-left:319.5pt;border-collapse:collapse;border:none'>
 <tr style='height:19.45pt'>
  <td width=222 valign=top style='width:166.25pt;padding:0in 5.4pt 0in 5.4pt;
  height:19.45pt'>
  <p class=MsoNormal align=center style='text-align:center;text-indent:-105.3pt;
  line-height:150%;border:none'>Hati’if<span lang=IN></span>, <?= $ds['tgl_daftar']; ?></p>
  </td>
 </tr>
 <tr style='height:67.45pt'>
  <td width=222 valign=top style='width:166.25pt;padding:0in 5.4pt 0in 5.4pt;
  height:67.45pt'>
  <p class=MsoNormal style='line-height:150%;border:none'>&nbsp;</p>
  </td>
 </tr>
 <tr style='height:38.9pt'>
  <td width=222 valign=top style='width:166.25pt;padding:0in 5.4pt 0in 5.4pt;
  height:38.9pt'>
  <p class=MsoNormal align=center style='text-align:center;border:none'><b><u><span
  lang=IN style='color:black'><?= $ds['dokter']; ?></span></u></b></p>
  <p class=MsoNormal align=center style='text-align:center;border:none'><b>Dokter
  Perusahaan</b></p>
  </td>
 </tr>
 <?php 
}
?>
</table>

<!-- akhir surat html -->

<!-- kop surat footer -->
<center>
    <table>
        <tr>
            <td><img src="../../img/kop2.png" alt="PT.PPA" width="780" height="180" class="mt-4"></td>
        </tr>
    </table>
</center>
</div>

<!-- js print -->
<script>
    window.print();
</script>
<!-- akhir js print -->

</body>
</html>