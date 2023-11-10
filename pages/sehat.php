<?php 
include "../layouts/header.php";
?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Surat Sehat</h1>
              <a
                href="./export/printsehat.php"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"
                ><i class="fas fa-download fa-sm text-white-50"></i> Laporan surat sehat</a
              >
            </div>
            <div class="container-fluid">
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Data surat sehat karyawan</h6>

                            <!-- button tambah karyawan -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mySurat" title="Tambah data karyawan">
                            <i class="far fa-envelope-open"></i> Surat baru
                            </button> 
                            <!-- panggil modal -->
                            <div class="modal fade" id="mySurat">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Surat sehat karyawan</h4>
                                    <!-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"></i></button> -->
                                  </div>

                                  <!-- body -->
                                  <div class="modal-body">
                                  <form action="addSehat.php" method="POST">
                                      <input type="text" name="dokter" class="form-control" placeholder="Masukkan nama Dokter">
                                      <input type="text" name="klinik" class="form-control my-2" placeholder="Nama Klinik">
                                      <input type="text" name="noizin" class="form-control" placeholder="No izin klinik">

                                      <!-- Memasukkan select data karyawan -->
                                      <label for="karyawan" class="my-2">Pilih NRP karyawan:</label>
                                      <select name="idkaryawan" id="karyawan" class="form-control" onchange="getKaryawanData()">
                                      <option value="" selected>- pilih -</option>
                                          <?php 
                                          $db_karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                          while ($k = mysqli_fetch_array($db_karyawan)) {
                                              $idk = $k['idkaryawan'];
                                              $tgl = $k['tgl_lahir'];
                                          ?>
                                          <option value="<?= $idk; ?>"><?= $k['id']; ?></option>
                                          
                                          <?php 
                                          }
                                          ?>
                                          <!-- Ajax PHP untuk membuat select dan tertampil semua datanya-->
                                          <script type="text/javascript">
                                              function getKaryawanData() {
                                                  var id = $("#karyawan").val();
                                                  $.ajax({
                                                      url: 'ajax.php', // Ganti dengan alamat yang sesuai untuk mengambil data karyawan
                                                      data: "id=" + id,
                                                  }).done(function (data) {
                                                      var json = data,
                                                      obj = JSON.parse(json);
                                                      $('#nama_karyawan').val(obj.nama_karyawan);
                                                      $('#alamat').val(obj.alamat);
                                                      $('#jk').val(obj.jk);
                                                      $('#tgl').val(obj.tgl);
                                                  });
                                              }
                                          </script>
                                      </select>

                                      <!-- Alamat dan Jenis Kelamin -->
                                      <label for="nama_karyawan">Nama karyawan:</label>
                                      <input type="text" id="nama_karyawan" name="nama" class="form-control" readonly>
                                      <label for="alamat">Mess:</label>
                                      <!-- <input type="text" id="alamat" name="alamat" class="form-control" readonly> -->
                                      <textarea name="alamat" id="alamat" cols="12" rows="8" class="form-control" readonly></textarea>

                                      <label for="jk">Jenis Kelamin:</label>
                                      <input type="text" id="jk" name="jk" class="form-control" readonly>
                                      <label for="tgl">Tgl lahir :</label>
                                      <input type="text" class="form-control" name="tgl" id="tgl" disabled>
                                      
                                      <div class="input-group">
                                        <input type="number" name="bb" id="Bb" class="form-control my-2" placeholder="Berat badan">
                                        <span class="input-group-text my-2">Kg</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="number" name="tb" id="Tb" class="form-control my-2" placeholder="Tinggi badan">
                                        <span class="input-group-text my-2">cm</span>
                                      </div>
                                      <textarea name="keluhan" id="keluhan" cols="10" rows="5" class="form-control" placeholder="Keluhan pasien"></textarea>
                                      <div class="input-group">
                                        <input type="text" name="tekanan" id="tekanan" class="form-control my-2" placeholder="Tekanan darah">
                                        <span class="input-group-text my-2">MmHg</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="number" name="nafas" id="nafas" class="form-control my-2" placeholder="Pernafasan">
                                        <span class="input-group-text my-2">x/menit</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="number" name="nadi" id="nadi" class="form-control my-2" placeholder="Nadi">
                                        <span class="input-group-text my-2">x/menit</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="text" name="suhu" id="suhu" class="form-control my-2" placeholder="Suhu Tubuh">
                                        <span class="input-group-text my-2">C</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="text" name="saturasi" id="saturasi" class="form-control my-2" placeholder="Saturasi Oksigen">
                                        <span class="input-group-text my-2">%</span>
                                      </div>
                                      <div class="input-group">
                                        <input type="text" name="syarat" id="syarat" class="form-control my-2" placeholder="Persayaratan">
                                      </div>
                                      <label for="tgldaftar" class="mt-2">Tanggal Daftar :</label>
                                      <input type="date" class="form-control" name="tgldaftar" placeholder="tanggal dafar" >

                                      <!-- footer -->
                                      <div class="modal-footer">
                                          <button type="submit" name="simpan" class="btn btn-info" data-bs-dismiss="modal">Simpan</button>
                                      </div>
                                  </form>
                              </div>
                                </div>
                              </div>
                            </div>
                            <!-- akhir button tambah -->

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Alamat</th>
                                            <th>Umur</th>
                                            <th>Keluhan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
                                      // $no = 1; 
                                      $data = mysqli_query($koneksi, "SELECT * FROM sehat s, karyawan k WHERE k.idkaryawan = s.idkaryawan ORDER BY idsehat DESC");
                                      while ($s = mysqli_fetch_array($data)) {
                                        $idk    = $s['idkaryawan'];
                                        $id     = $s['id'];
                                        $nama   = $s['nama'];
                                        $inst   = $s['instansi'];
                                        $alamat = $s['alamat'];
                                        $jk     = $s['jk'];
                                        $tgl    = $s['tgl_lahir'];
                                        $keluhan = $s['keluhan']
                                        
                                      
                                      ?>
                                        <tr>
                                            
                                            <td><?= $id; ?></td>
                                            <td><?= $nama; ?></td>
                                            <td><?= $inst; ?></td>
                                            <td><?= $alamat; ?></td>
                                            <td>
                                              <!-- menghitung umur dari database -->
                                              <?php 
                                            $lahir = new DateTime($tgl);
                                            $today = new DateTime();
                                            $umur = $today->diff($lahir);
                                            echo $umur->y;echo " Tahun, "; echo $umur->m; echo " Bulan, "; echo $umur->d; echo" Hari. ";
                                            ?>
                                            <!-- akhir hitung umur -->
                                            </td>
                                            <td><?= $keluhan; ?></td>
                                            <td><?= $jk; ?></td>
                                            <td>
                                              <!-- button print -->
                                            <a href="export/psehat.php?id=<?= $idk; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i> print</a>
                                            <!-- button hapus -->
                                            <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#myDelete<?= $idk; ?>" title="Delete data">
                                             <i class="fas fa-backspace"></i> Delete
                                            </button>
                                            </td>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="myDelete<?= $idk; ?>">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Hapus data karyawan</h4>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                                  </div>

                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                    <form action="deleteSehat.php" method="POST">
                                                    Yakin ingin menghapus data <strong><?= $nama; ?></strong>, NRP <?= $id; ?> ?
                                                    <input type="hidden" name="idk" value="<?= $idk; ?>">
                                                  </div>

                                                  <!-- Modal footer -->
                                                  <div class="modal-footer">
                                                    <button type="submit" name="deleteData" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                                  </div>
                                                  </form>

                                                </div>
                                              </div>
                                            </div>

                                        </tr>
                                        <?php 
                                      }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
<?php 
include "../layouts/footer.php";
?>