
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data rule / relasi </h1>
      <nav>
        <ol class="breadcrumb">
      
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

       <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $ID = $_GET['ID'];
        $cek = mysqli_query($koneksi, "SELECT * FROM relasi WHERE ID='$ID'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM relasi WHERE ID='$ID'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_relasi.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>

         

          

         

         

       

         

          <div class="card">
            <div class="card-body">


               <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah
              </button>

                  
              </div>

          




                   <table id="zero_config" class="table">
                                 <thead>
                                              <tr>
                                                <th><i class=""></i> NO</th>
                                                <th><i class=""></i>Nama penyakit</th>
                                                <th><i class=""></i>Nama gejala</th>
                                                <th><i class=""></i>mb</th>
                                                 <th><i class=""></i>md</th>
                                              
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'../koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "select * FROM relasi INNER JOIN  gejala ON relasi.kd_gejala = gejala.kd_gejala INNER JOIN  penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit ");
                                                    while($data = mysqli_fetch_array($sql)){
                                                  

                                                  
                                                ?>

          

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                                
                       <td ><left>(<?php echo $data['kd_penyakit'];?>) -<?php echo $data['penyakit'];?></left></td>
                       <td><left>(<?php echo $data['kd_gejala'];?>) -<?php echo $data['gejala'];?></left></td>
                         

                         <td><left><?php echo $data['mb'];?></left></td>
                         <td><left><?php echo $data['md'];?></left></td>
                                                <td>
                                                  <div class="btn-group">
                                                   

                                                     <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['ID']; ?>"><i class="fa fa-edit">Edit</i></a> &nbsp;


                                                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="data_relasi.php?aksi=hapus&ID=<?php echo $data['ID']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>
                                                  </div>
                                                </td>
                                            </tr>
            <!-- Edit Modal !-->
                <div id="ubah<?php echo $data['ID']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit Data Aturan</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $ID = $data['ID']; 


                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM relasi WHERE ID='$ID'");
                                    while ($row = mysqli_fetch_array($query_edit)) { 


                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="penyakit">Nama penyakit</label>
                                   <input name="kd_penyakit" type="text" id="kd_penyakit" class="form-control" value="<?php echo $row['kd_penyakit']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_gejala">Kode gejala</label>
                                      
                                   
                              <input name="kd_gejala" type="text" id="kd_gejala" class="form-control" value="<?php echo $row['kd_gejala']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" />

                                    </div> 

                                     <div class="form-group">
                                      <label class="control-label" for="mb"> mb</label>
                                      
                                   
                              <input name="mb" type="text" id="mb" class="form-control" value="<?php echo $row['mb']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" />

                                    </div> 


                                     <div class="form-group">
                                      <label class="control-label" for="md"> md</label>
                                      
                                   
                              <input name="md" type="text" id="md" class="form-control" value="<?php echo $row['md']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" />

                                    </div> 

                                  
                                 

                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-success" name="ubah">Update</button>
                                    </div>
                                        <?php
                                      }
                                      ?>

                            </div>

                                </form>
                            </div>
                            <?php
                                  }
                                  ?>
                                        </tbody>
                                       
                                    </table>
                                        <?php
                                          if (isset($_POST['ubah'])){

                                             $kd_penyakit  = $_POST['kd_penyakit'];
                                             $kd_gejala = $_POST['kd_gejala'];
                                            
                                              $mb = $_POST['mb'];

                                               $md = $_POST['md'];
                                      
                                           
                                            
                                          
                                      

                                            $ubah = mysqli_query($koneksi, "UPDATE relasi SET kd_gejala='$kd_gejala', kd_penyakit='$kd_penyakit' , mb='$mb', md='$md' WHERE ID='$ID'") or die(mysqli_error());


                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_relasi.php";
                                               </script>
                                               <?php
                                              }else{
                                                echo"Gagal Mengedit Data";
                                              } 
                                            
                                          }
                                        ?> 
                                </div>
            <!--Tambah Modal -->
                  <div id="tambah" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data penyakit</h4>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">
                               

                                   <div class="form-group">
                                      <label class="control-label" for="kd_penyakit">Nama penyakit</label>
                                       <select name="kd_penyakit" id="kd_penyakit" class="form-control select2" required>
                              <option value="kd_penyakit"> --- Pilih penyakit --- </option>
                              <?php 
                    $query2="select * from penyakit order by kd_penyakit";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['kd_penyakit'];?>"><?php echo $data1['penyakit'];?> - <?php echo $data1['kd_penyakit'];?></option>
                <?php } ?>
                              
                              </select> 
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="penyakit">Nama Gejala</label>
                                      <select name="kd_gejala" id="kd_gejala" class="form-control select2" required>
                              <option value="kd_gejala"> --- Pilih Gejala --- </option>
                              <?php 
                    $query2="select * from gejala order by kd_gejala ";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['kd_gejala'];?>"><?php echo $data1['gejala'];?> - <?php echo $data1['kd_gejala'];?></option>
                <?php } ?>
                              
                              </select> 
                                    </div>



                                         <div class="form-group">
                                      <label class="control-label" for="mb"> mb</label>
                                      
                                   
                              <input name="mb" type="text" id="mb" class="form-control" value=""placeholder="Auto Number" autocomplete="off" autofocus="on" />

                                    </div> 


                                     <div class="form-group">
                                      <label class="control-label" for="md"> md</label>
                                      
                                   
                              <input name="md" type="text" id="md" class="form-control" value=""placeholder="Auto Number" autocomplete="off" autofocus="on" />

                                    </div> 
                                   
                                     <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>
                                  

                                  </div>
                                </form>

                                <?php
                                    if (isset($_POST['simpan'])){
                                   $kd_penyakit  = $_POST['kd_penyakit'];
                                   $kd_gejala = $_POST['kd_gejala'];
                                   
                                   $mb = $_POST['mb'];
                                   $md = $_POST['md']; 
                                      
                                    
                                      $tambah = mysqli_query($koneksi,"INSERT INTO relasi (kd_penyakit, kd_gejala,mb,md) VALUES ('$kd_penyakit', '$kd_gejala','$mb','$md')"); 
                                      if($tambah){
                                        ?>
                                        <script type="text/javascript">
                                        alert('Input Data Berhasil');
                                          document.location.href="data_relasi.php";
                                         </script>
                                         <?php
                                        }else{
                                          echo"Gagal Menginput Data";
                                        } 
                                    }
                                  ?>

                      </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                </tbody>
              </table>
              <!-- End Bordered Table -->

         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'template/footer.php'; ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>