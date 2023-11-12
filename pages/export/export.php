<?php
include "../../koneksi.php";
include "../../cek.php";
?>

<html>
<head>
  <title>Data Karyawan PT.PPA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- menambahkan icon di halaman -->
  <link rel="shortcut icon" href="../../logo/favicon.ico">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="mauexport">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP BIB</th>
                                            <th>Nama</th>
                                            <th>Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>Tgl Lahir</th>
                                            <th>Umur</th>
                                            <th>Jenis Kelamin</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
                                      $datapegawai = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                      $no = 1;
                                      // $data = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                      while ($d = mysqli_fetch_array($datapegawai)) {
                                        $idk    = $d['idkaryawan'];
                                        $nip    = $d['id'];
                                        $nama   = $d['nama'];
                                        $inst   = $d['instansi'];
                                        $alamat = $d['alamat'];
                                        $jk     = $d['jk'];
                                        $tgl    = $d['tgl_lahir'];
                                      
                                      ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $nip; ?></td>
                                            <td><?= $nama; ?></td>
                                            <td><?= $inst; ?></td>
                                            <td><?= $alamat; ?></td>
                                            <td><?= $tgl; ?></td>
                                            <td>
                                              <!-- menghitung umur dari database -->
                                              <?php 
                                            $lahir = new DateTime($tgl);
                                            $today = new DateTime();
                                            $umur = $today->diff($lahir);
                                            echo $umur->y;echo " Tahun, "; echo $umur->m; echo " Bulan, ";
                                            ?>
                                            <!-- akhir hitung umur -->
                                            </td>
                                            <td><?= $jk; ?></td>
                                        </tr>
                                        <?php 
                                      }
                                        ?>
                                    </tbody>
                                </table>
                            </div>                  
          <!-- /.container-fluid -->
</div>
        <!-- End of Main Content -->
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>