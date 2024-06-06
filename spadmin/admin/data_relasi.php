
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
                                                <th><i class=""></i>NO</th>
                                                <th><i class=""></i>Nama penyakit</th>
                                                <th><i class=""></i>Nama gejala</th>

                                                 <th><i class=""></i>Bobot bayes</th>

                                                
                                              
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'../koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "select * FROM relasi INNER JOIN  gejala ON relasi.kd_gejala = gejala.kd_gejala INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit ");
                                                    while($data = mysqli_fetch_array($sql)){
                                                  

                                                  
                                                ?>

          

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                                
                       <td ><left>(<?php echo $data['kd_penyakit'];?>) -<?php echo $data['penyakit'];?></left></td>
                       <td><left>(<?php echo $data['kd_gejala'];?>) -<?php echo $data['gejala'];?></left></td>

                        <td><left><?php echo $data['nilai'];?></left></td>

                      
                         
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
                            
                            <h4 class="modal-title">Edit Data penyakit</h4>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $ID = $data['ID']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM relasi WHERE ID='$ID'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>


                                  
                                   
                                      <input type="hidden" name="ID" class="form-control" id="ID" value="<?php echo $data['ID'] ?>" required="" readonly="">
                                 

                                    <div class="form-group">
                                      <label class="control-label" for="kd_penyakit">penyakit</label>
                                      <input type="text" name="kd_penyakit" class="form-control" id="kd_penyakit" value="<?php echo $data['kd_penyakit'] ?>" required="" readonly="">
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="kd_gejala">gejala</label>
                                      <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" value="<?php echo $data['kd_gejala'] ?>" required="">
                                    </div>
                                    
                                     <div class="form-group">
                                      <label class="control-label" for="nilai">bobot</label>
                                      <input type="text" name="nilai" class="form-control" id="nilai" value="<?php echo $data['nilai'] ?>" required="">
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

                                            $ID = $_POST['ID'];
                                            $kd_penyakit = $_POST['kd_penyakit'];
                                            $kd_gejala = $_POST['kd_gejala'];
                                          
                                            $nilai = $_POST['nilai'];

                                            
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE relasi SET kd_penyakit='$kd_penyakit', kd_gejala='$kd_gejala', nilai='$nilai' WHERE ID='$ID' "); 
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
                                      <label class="control-label" for="nilai">bobot bayes</label>
                                      <input type="text" name="nilai" class="form-control" id="nilai" value="" required="">
                                    </div>



                                   


                                   
                                     <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>
                                  

                                  </div>
                                </form>



                                   <?php
                                

if(isset($_POST['simpan'])){
                                  $kd_penyakit  = $_POST['kd_penyakit'];
                                   $kd_gejala = $_POST['kd_gejala'];
                                   
                                    $nilai = $_POST['nilai'];

                                    

   
//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM relasi WHERE kd_penyakit='$kd_penyakit' AND kd_gejala='$kd_gejala'"));

    if ($cek > 0){
    echo "<script>window.alert('Relasi sudah ada silahkan cek ulang')
    window.location='data_relasi.php'</script>";
    }else {
    mysqli_query($koneksi,"INSERT INTO relasi (kd_penyakit, kd_gejala,nilai) VALUES ('$kd_penyakit', '$kd_gejala','$nilai')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='data_relasi.php'</script>";
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