
<?php
// memanggil library FPDF
require('../../library/fpdf/fpdf.php');
include '../../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA KARYAWAN MCU',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(15,7,'NRP' ,1,0,'C');
$pdf->Cell(50,7,'NAMA',1,0,'C');
$pdf->Cell(60,7,'INSTANSI',1,0,'C');
$pdf->Cell(55,7,'JENIS KELAMIN',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM karyawan k, sehat s WHERE k.idkaryawan = s.idkaryawan ORDER BY idsehat ASC");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(15,6, $d['id'],1,0);
  $pdf->Cell(50,6, $d['nama'],1,0);
  $pdf->Cell(60,6, $d['instansi'],1,0);
  $pdf->Cell(55,6, $d['jk'],1,1);  
  
  
  $pdf->SetFont('Times','',10);
  
}
 
$pdf->Output();
?>
