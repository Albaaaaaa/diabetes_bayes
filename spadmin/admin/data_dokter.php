
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Dokter </h1>
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
        $id_user = $_GET['id_user'];
        $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user='$id_user'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id_user='$id_user'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_dokter.php'</script>";



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

          

              <table class="table table-bordered">
             <thead>
                                              <tr>
                                                <th><i class=""></i> NO</th>
                                                 <th><center>id_user </center></th>
                        <th><center>nama</center></th>
                        <th><center>alamat </center></th>
                         <th><center>username </center></th>
                          <th><center>level </center></th>
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'../koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "select * from admin where level='Dokter'  ");
                                                    while($data = mysqli_fetch_array($sql)){
                                                  

                                                  
                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                             
                    <td><center><?php echo $data['id_user'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                     <td><center><?php echo $data['alamat'];?></center></td>
                      <td><center><?php echo $data['username'];?></center></td>
                      <td><center><?php echo $data['level'];?></center></td>
                                                <td>
                                                  <div class="btn-group">
                                            

                                                       <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['id_user']; ?>"><i class="fa fa-edit">Edit</i></a> &nbsp;

                                                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="data_dokter.php?aksi=hapus&id_user=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>



                                                  </div>
                                                </td>
                                            </tr>
            <!-- Edit Modal !-->
                <div id="ubah<?php echo $data['id_user']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit Data </h4>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $id_user = $data['id_user']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user='$id_user'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_kerusakan">Id user</label>
                                      <input name="id_user" type="text" id="id_user" class="form-control" value="<?php echo $row['id_user']; ?>" placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="kerusakan">Nama Admin</label>
                                      <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="Nama Admin" autocomplete="off" required />
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="solusi">alamat</label>
                                      <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" placeholder="Alamat" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">username</label>
                                 <input name="username" type="text" id="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="Username" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">password</label>
                                     <input name="password" type="text" id="password" class="form-control" value="<?php echo $row['password']; ?>"  placeholder="Password" autocomplete="off" required />
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


                                             $id_user        = $_POST['id_user'];
                                             $nama           = $_POST['nama'];
                                             $alamat         = $_POST['alamat'];
                                             $username       = $_POST['username'];
                             
                                             $password = $_POST['password'];
                                             $level          = 'Dokter';

                                           
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE admin SET nama='$nama', alamat='$alamat', username='$username', password='$password', level='$level' WHERE id_user='$id_user'"); 


                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_dokter.php";
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
                                    <h4 class="modal-title">Tambah Data </h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">
                                <?php
                           
                                  $query_edit1 = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user=(SELECT MAX(id_user) FROM admin)");
                                  while ($ok = mysqli_fetch_array($query_edit1)) { 
                                      $id_user= $ok['id_user']+1; 
                                  
                                  }
                                  ?>

                                   <div class="form-group">
                                      <label class="control-label" for="id_user">id_user</label>
                                      <input name="id_user" type="text" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="kerusakan">Nama pengguna</label>
                                      <input name="nama" type="text" id="nama" class="form-control" placeholder="nama" autocomplete="off" required />
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label" for="solusi">alamat</label>
                                       <input name="alamat" type="text" id="alamat" class="form-control" placeholder="alamat" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">username</label>
                                        <input name="username" type="text" id="username" class="form-control" placeholder="username" autocomplete="off" required /></div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">password</label>
                                       <input name="password" type="text" id="password" class="form-control" placeholder="Password" autocomplete="off" required />
                                    </div>


                                      <div class="form-group">
                                      <label class="control-label" for="solusi">level</label>
                                      <select name="level" id="level" class="form-control">
                
                                    <option value="Dokter">Dokter</option>
                                 
                
              </select>
                                    </div>


                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>

                                  </div>
                                </form>

                                <?php
                                    if (isset($_POST['simpan'])){

                                   

                                    $id_user        = $_POST['id_user'];
                                    $nama           = $_POST['nama'];
                                    $alamat         = $_POST['alamat'];
                                    $username       = $_POST['username'];
                                    $password = $_POST['password'];
                                     $level          = $_POST['level'];
                                    
                                      $tambah = mysqli_query($koneksi,"INSERT INTO admin (id_user, nama, alamat, username, password, level) VALUES ('$id_user', '$nama', '$alamat', '$username', '$password', '$level')"); 

                                      if($tambah){
                                        ?>
                                        <script type="text/javascript">
                                        alert('Input Data Berhasil');
                                          document.location.href="data_dokter.php";
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