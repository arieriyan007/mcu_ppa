<?php 
include "../layouts/header.php";
?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <a
                href="export/export.php"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"
                ><i class="fas fa-download fa-sm text-white-50"></i> Eksport Data</a
              >
            </div>
            <div class="container-fluid">
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Data Karyawan PT.PPA</h6>

                            <!-- button tambah karyawan -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal" title="Tambah data karyawan">
                             <i class="fas fa-user"></i> Data karyawan
                            </button> 
                            <!-- membuat fitur pencarian -->
                            <form class="form-inline my-2 justify-content-center" >
                              <div class="form-group">
                                <select class="form-control" id="Kolom" name="Kolom" required="">
                                  <?php
                                    $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                                  ?>
                                  <option value="Nama" <?php if ($kolom=="nama") echo "selected"; ?>>Nama</option>
                                  <option value="jk" <?php if ($kolom=="jk") echo "selected";?>>Jenis Kelamin</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control ml-2" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci']; ?>">
                              </div>
                              <button type="submit" class="btn btn-outline-primary ml-2">Cari</button>
                              <a href="index.php" class="btn btn-outline-danger ml-1">Reset</a>
                            </form> 
                            <!-- akhir fitur pencarian -->

                            <!-- panggil modal -->
                            <div class="modal fade" id="myModal">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Data Karyawan Baru</h4>
                                    <!-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"></i></button> -->
                                  </div>

                                  <!-- body -->
                                  <div class="modal-body">
                                    <form action="addIndex.php" method="POST">
                                      <input type="text" name="nrp" id="nrp" class="form-control my-2" placeholder="NRP BIB" required>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap karyawan" required autofocus>
                                    <input type="date" name="tgllahir" class="form-control my-2">
                                    <input type="text" name="almt" class="form-control" placeholder="Alamat" required>
                                    <select name="jk" id="jk" class="form-control my-2">
                                      <option value="Laki-laki">Laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <input type="text" name="instansi" class="form-control" placeholder="Nama Instansi perusahaan" required>
                                    <select name="status" id="status" class="form-control my-2">
                                      <label for="Status">Status karyawan</label>
                                      <option value="Tetap">Tetap</option>
                                      <option value="Tidak">Tidak Tetap</option>
                                    </select>
                                  </div>

                                  <!-- footer -->
                                  <div class="modal-footer">
                                    <button type="submit" name="save" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                  </div>
                                  </form>

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
                                            <th>No</th>
                                            <th>NRP BIB</th>
                                            <th>Nama</th>
                                            <th>Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>Tgl Lahir</th>
                                            <th>Umur</th>
                                            <th>Jenis Kelamin</th>
                                            
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
                                      // memasukkan logika dalam pencarian (pagination)
                                      $page           =(isset($_GET['page']))? (int) $_GET['page'] : 1;
                                      $kolomCari      =(isset($_GET['Kolom']))? $_GET['Kolom'] : "";                                   
                                      $kolomKataKunci =(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

                                      // jumlah data perhalaman
                                      $limit = 10;
                                      $limitStart = ($page - 1) * $limit;

                                      // kondisi jika parameter kosong
                                      if ($kolomCari=="" && $kolomKataKunci=="") {
                                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM karyawan LIMIT ".$limitStart.",".$limit);
                                      } else {
                                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
                                      }
                                      $no = $limitStart + 1; 
                                      // $data = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                      while ($d = mysqli_fetch_array($SqlQuery)) {
                                        $idk    = $d['idkaryawan'];
                                        $nip    = $d['id'];
                                        $nama   = $d['nama'];
                                        $inst   = $d['instansi'];
                                        $alamat = $d['alamat'];
                                        $jk     = $d['jk'];
                                        $tgl    = $d['tgl_lahir'];
                                        $status = $d['status'];
                                      
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
                                            echo $umur->y;echo " Tahun, "; echo $umur->m; echo " Bulan, "; echo $umur->d; echo" Hari. ";
                                            ?>
                                            <!-- akhir hitung umur -->
                                            </td>
                                            <td><?= $jk; ?></td>
                                            
                                            <td>
                                              <!-- button edit -->
                                            <button type="button" class="btn btn-warning btn-sm my-2" data-bs-toggle="modal" data-bs-target="#myEdit<?= $idk; ?>" title="Edit data">
                                             <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <!-- button hapus -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myDelete<?= $idk; ?>" title="Delete data">
                                             <i class="fas fa-backspace"></i> Delete
                                            </button>
                                            </td>
                                            <!-- modal Edit -->
                                            <div class="modal fade" id="myEdit<?= $idk; ?>">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Edit data karyawan</h4>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                                  </div>

                                                  <!-- Modal body -->
                                                  <form action="editIndex.php" method="POST">
                                                  <div class="modal-body">
                                                    <input type="hidden" name="idk" id="idk" value="<?= $idk; ?>">
                                                    <input type="text" name="nama" class="form-control" value="<?= $nama; ?>" autofocus>
                                                    <input type="text" name="alamat" class="form-control my-2" value="<?= $alamat; ?>">
                                                    <input type="date" name="tgl" class="form-control my-2" value="<?= $tgl; ?>">
                                                    <select name="jk" id="jk" class="form-control my-2">
                                                      <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                                      <option value="Laki-laki">Laki-laki</option>
                                                      <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    <input type="text" name="instansi" class="form-control my-2" value="<?= $inst; ?>">
                                                    <select name="status" id="status" class="form-control my-2">
                                                      <option value=""><?= $status; ?></option>
                                                      <option value="Tetap">Tetap</option>
                                                      <option value="Tidak">Tidak Tetap</option>
                                                    </select>
                                                  </div>

                                                  <!-- Modal footer -->
                                                  <div class="modal-footer">
                                                    <button type="submit" name="updateEdit" class="btn btn-info" data-bs-dismiss="modal">Update</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- akhir modal edit -->

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
                                                    <form action="deleteIndex.php" method="POST">
                                                    Yakin ingin menghapus data <strong><?= $nama; ?></strong> ?
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
                                <!-- untuk pagination bisa tertampil berurut maka bisa dimasukkan data ini -->
                                <div class="d-flex justify-content-center">
                                  <ul class="pagination">
                                    <?php
                                      // Jika page = 1, maka LinkPrev disable
                                      if($page == 1){ 
                                    ?>        
                                      <!-- link Previous Page disable --> 
                                      <li class="disabled"><a href="#">Previous</a></li>
                                    <?php
                                      }
                                      else{ 
                                        $LinkPrev = ($page > 1)? $page - 1 : 1;  

                                        if($kolomCari=="" && $kolomKataKunci==""){
                                        ?>
                                          <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
                                    <?php     
                                        }else{
                                      ?> 
                                        <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
                                      <?php
                                        } 
                                      }
                                    ?>

                                    <?php
                                      //kondisi jika parameter pencarian kosong
                                      if($kolomCari=="" && $kolomKataKunci==""){
                                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                      }else{
                                        //kondisi jika parameter kolom pencarian diisi
                                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE $kolomCari LIKE '%$kolomKataKunci%'");
                                      }     
                                    
                                      //Hitung semua jumlah data yang berada pada tabel karyawan
                                      $JumlahData = mysqli_num_rows($SqlQuery);
                                      
                                      // Hitung jumlah halaman yang tersedia
                                      $jumlahPage = ceil($JumlahData / $limit); 
                                      
                                      // Jumlah link number 
                                      $jumlahNumber = 1; 

                                      // Untuk awal link number
                                      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
                                      
                                      // Untuk akhir link number
                                      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
                                      
                                      for($i = $startNumber; $i <= $endNumber; $i++){
                                        $linkActive = ($page == $i)? ' class="active"' : '';

                                        if($kolomCari=="" && $kolomKataKunci==""){
                                    ?>
                                        <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                    <?php
                                      }else{
                                        ?>
                                        <li<?php echo $linkActive; ?>><a href="index.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php
                                      }
                                    }
                                    ?>
                                    
                                    <!-- link Next Page -->
                                    <?php       
                                    if($page == $jumlahPage){ 
                                    ?>
                                      <li class="disabled"><a href="#">Next</a></li>
                                    <?php
                                    }
                                    else{
                                      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
                                    if($kolomCari=="" && $kolomKataKunci==""){
                                        ?>
                                          <li><a href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
                                    <?php     
                                        }else{
                                      ?> 
                                        <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
                                    <?php
                                      }
                                    }
                                    ?>
                                  </ul>
                                  <!-- akhir pagination -->
                                </div>
                            </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

<?php 
include "../layouts/footer.php";
?>
