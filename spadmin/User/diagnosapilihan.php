<?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>



 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Diagnosa</h1>
      <nav>
        <ol class="breadcrumb">
       
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            


             <?php

   if(isset($_POST['YA'])){

  
      $id_user         = $_SESSION['id_user'];
      $tgl_diagnosa    = $_POST['tgl_diagnosa'];
      $kd_gejala    = $_POST['kd_gejala'];
      $Hipertensi_Primer         = "0";
      $Hipertensi_Pulmonal         = "1";
      $Hipertensi_Maligna     = "0";
      $Hipertensi_Sekunder       = "0";
     
  
    
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM diagnosa WHERE id_user='$_SESSION[id_user]' AND kd_gejala='$kd_gejala' "));

    if ($cek > 0){
    echo "<script>window.alert(' Anda Sudah Melakukan Diagnosa ')
    window.location='hasil_diagnosa.php'</script>";
    }else {

    mysqli_query($koneksi, "INSERT INTO diagnosa (id_user, tgl_diagnosa,kd_gejala, Hipertensi_Primer,Hipertensi_Pulmonal,Hipertensi_Maligna,Hipertensi_Sekunder) VALUES
                  ('$id_user', '$tgl_diagnosa', '$kd_gejala', '$Hipertensi_Primer', '$Hipertensi_Pulmonal', '$Hipertensi_Maligna', '$Hipertensi_Sekunder')");

  
   echo "<script>window.alert('pertanyaan selanjutnya')
    window.location='diagnosa2.php'</script>";
}
  
    }
   
    ?>

     


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-16">
   <form id="select" method="POST" action="detail.php" >
          
              <div class="card info-card customers-card">

                <table id="zero_config" class="table">
                                          <thead>
                                              <tr>
                                                
                                                 <th>Pilih Gejala</th>
                                                <th><i class=""></i>Kode Gejala</th>
                                                <th><i class=""></i>Nama Gejala</th>
                                               
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "SELECT * from gejala ");
                                                    while($row = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>

                                            <tr class="table-white">
                                               <td><input type="checkbox" id="select" name="select[]" value="<?=$row['kd_gejala']?>"/> YA </td>
                                                <td><?php echo $row['kd_gejala']; ?></td>
                                                <td><?php echo $row['gejala']; ?></td>
                                                <td>
                                                  <div class="btn-group">
                                                
                                                  </div>
                                                </td>

                                            </tr>


            <!-- Edit Modal !-->
               
                         
                            

                                </form>
                            </div>
                            <?php
                                  }
                                  ?>
                                        </tbody>
                                       
                                    </table>

                  

                </div>

                   
                 
                 <button type="submit" name="submited" onclick="validasi()" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>


              </div>





            <!-- Recent Sales -->
            

           


          

         
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


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