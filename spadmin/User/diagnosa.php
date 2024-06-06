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

      $Hiperemesis_Gravidarum      = "1";
      $Preeklampsia         = "0";
      $Kehamilan_Ektopik         = "0";
      $Molahidatidosa     = "0";
      $Plasenta_Previa       = "0";
    


     
  
    
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM diagnosa WHERE id_user='$_SESSION[id_user]' AND kd_gejala='$kd_gejala' "));

    if ($cek > 0){
    echo "<script>window.alert(' anda sudah melakukan diagnosa ')
    window.location='hasil_diagnosa.php'</script>";
    }else {

  mysqli_query($koneksi, "INSERT INTO diagnosa (id_user, tgl_diagnosa,kd_gejala, Hiperemesis_Gravidarum,Preeklampsia,Kehamilan_Ektopik,Molahidatidosa,Plasenta_Previa) VALUES
                  ('$id_user', '$tgl_diagnosa', '$kd_gejala', '$Hiperemesis_Gravidarum', '$Preeklampsia', '$Kehamilan_Ektopik', '$Molahidatidosa', '$Plasenta_Previa')");


  
   echo "<script>window.alert('pertanyaan selanjutnya')
    window.location='diagnosa2.php'</script>";
}
  
    }
   
    ?>

     


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-16">
<form class="forms-sample" action="diagnosa.php" method="post" >
              <div class="card info-card customers-card">

                
                    <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "SELECT * from gejala WHERE Kd_gejala='G01' ");
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>

                 


                <div class="card-body">

                  <br>

 <label>(<?php echo $data['kd_gejala']; ?>) Apakah anda mengalami <?php echo $data['gejala']; ?> ? </label>


                          <input type='hidden' class="form-control" type="text" value="<?php echo date("Y-m-d"); ?>" name="tgl_diagnosa" ReadOnly required='required' />


                    <input name="kd_gejala" type="hidden" id="kd_gejala" class="form-control" value="<?php echo $data['kd_gejala']; ?>"placeholder="Nama penduduk" autocomplete="off" required />
               
                    <div class="ps-3">
                      <h6></h6>
                     

                    </div>

                     <?php
                                      }
                                      ?>
                  </div>
                  

                </div>

                   <button type="submit" name="YA" class="btn btn-primary">YA </button>
                 
                  <a class="btn btn-primary" href="diagnosa2.php"> Tidak</a>


              </div>



            </div><!-- End Customers Card -->



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