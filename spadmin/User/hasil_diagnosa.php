<?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>



 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Hasil diagnosa</h1>
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

if ( isset( $_POST[ 'simpan' ] ) ) {

    $penyakit = $_POST[ 'penyakit' ];
    $id_user  = $_SESSION[ 'id_user' ];
     $nama  = $_SESSION[ 'nama' ];
    $tgl_diagnosa = date( 'Y-m-d' );

    $query = mysqli_query( $koneksi, "INSERT INTO riwayat (penyakit, id_user,nama,tgl_diagnosa ) VALUES ('$penyakit', '$id_user', '$nama', '$tgl_diagnosa')" );

    $delete = mysqli_query( $koneksi, "DELETE FROM diagnosa WHERE id_user='$_SESSION[id_user]'" );

    if ( $query ) {
        echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'riwayat.php'</script>";
    } else {
        echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>";
    }
}

?>

     



            <!-- Customers Card -->
          

      
                      <div class="card card-primary">
             
              
                    <form class="forms-sample" action="hasil_diagnosa.php" method="post" >


<?php
include 'koneksi.php';
$no = 1;
$subtotal_Hiperemesis_Gravidarum = 0;
$subtotal_Preeklampsia  = 0;
$subtotal_Kehamilan_Ektopik = 0;
$subtotal_Molahidatidosa = 0;

$subtotal_Plasenta_Previa = 0;

$sql = mysqli_query( $koneksi, "SELECT * from diagnosa WHERE id_user='$_SESSION[id_user]' " );
while ( $data = mysqli_fetch_array( $sql ) ) {

    $total_Hiperemesis_Gravidarum = $data['Hiperemesis_Gravidarum'];

    $total_Preeklampsia   = $data['Preeklampsia'];

    $total_Kehamilan_Ektopik = $data['Kehamilan_Ektopik'];

    $total_Molahidatidosa = $data['Molahidatidosa'];

     $total_Plasenta_Previa = $data['Plasenta_Previa'];

   

    $subtotal_Hiperemesis_Gravidarum = $subtotal_Hiperemesis_Gravidarum + $total_Hiperemesis_Gravidarum;

    $subtotal_Preeklampsia  = $subtotal_Preeklampsia   + $total_Preeklampsia ;

    $subtotal_Kehamilan_Ektopik = $subtotal_Kehamilan_Ektopik + $total_Kehamilan_Ektopik;

    
    $subtotal_Molahidatidosa = $subtotal_Molahidatidosa + $total_Molahidatidosa;

      $subtotal_Plasenta_Previa = $subtotal_Plasenta_Previa + $total_Plasenta_Previa;

    ?>

 
    <?php
}
?>




             <table class = 'table'>

  <form class="forms-sample" action="hasil_diagnosa.php" method="post" >

<?php

$jumlah_Hiperemesis_Gravidarum = $subtotal_Hiperemesis_Gravidarum / 8 * 100;

$jumlah_Preeklampsia  = $subtotal_Preeklampsia   / 8 * 100;

$jumlah_Kehamilan_Ektopik = $subtotal_Kehamilan_Ektopik / 7 * 100;



$jumlah_Molahidatidosa = $subtotal_Molahidatidosa / 6 * 100;

$jumlah_Plasenta_Previa = $subtotal_Plasenta_Previa / 4 * 100;

 $max = max($jumlah_Hiperemesis_Gravidarum,$jumlah_Preeklampsia,$jumlah_Kehamilan_Ektopik,$jumlah_Molahidatidosa,$jumlah_Plasenta_Previa);

?>



<tr>
<td width = '20%'><b>Nama user </b></td>
<td width = '2%'><b>:</b></td>
<td width = '78%'><?PHP ECHO $_SESSION['username']; ?> </td>

</tr>

<tr>

<td width = ''><b>Alamat</b></td>
<td width = ''><b>:</b></td>
<td width = ''> <?PHP ECHO $_SESSION['alamat']; ?> </td>

</tr>







</tbody>

</table>


<table id = 'zero_config' class = 'table'>
<thead>
<tr>
<th>
<left>kd gejala </center>
</th>

<th>
<left> gejala yang di alami </center>
</th>

</tr>
</thead>
<tbody>

<?php
include 'koneksi.php';
$no = 1;
$subtotal_Hiperemesis_Gravidarum = 0;
$subtotal_Preeklampsia  = 0;
$subtotal_Kehamilan_Ektopik = 0;


$subtotal_Molahidatidosa = 0;

$subtotal_Plasenta_Previa = 0;


$sql = mysqli_query( $koneksi, "SELECT * from diagnosa INNER JOIN gejala ON diagnosa.kd_gejala = gejala.kd_gejala WHERE id_user='$_SESSION[id_user]' " );
while ( $data = mysqli_fetch_array( $sql ) ) {

    $total_Hiperemesis_Gravidarum = $data['Hiperemesis_Gravidarum'];

    $total_Preeklampsia   = $data['Preeklampsia'];

    $total_Kehamilan_Ektopik = $data['Kehamilan_Ektopik'];

   

    $total_Molahidatidosa = $data['Molahidatidosa'];

     $total_Plasenta_Previa= $data['Plasenta_Previa'];


    $subtotal_Hiperemesis_Gravidarum = $subtotal_Hiperemesis_Gravidarum + $total_Hiperemesis_Gravidarum;

    $subtotal_Preeklampsia  = $subtotal_Preeklampsia   + $total_Preeklampsia ;

    $subtotal_Kehamilan_Ektopik = $subtotal_Kehamilan_Ektopik + $total_Kehamilan_Ektopik;



    $subtotal_Molahidatidosa = $subtotal_Molahidatidosa + $total_Molahidatidosa;


     $subtotal_Plasenta_Previa = $subtotal_Plasenta_Previa + $total_Plasenta_Previa;

    ?>



    <tr class = 'table-white'>
    <td><?php echo $data[ 'kd_gejala' ];
    ?></td>

    <td><?php echo $data[ 'gejala' ];
    ?></td>
   

    </tr>
    <!-- Edit Modal !-->

    </form>
    </div>
    <?php
}
?>
</tbody>



</table>
<?php
include 'koneksi.php';
$no = 1;
$subtotal_Hiperemesis_Gravidarum = 0;
$subtotal_Preeklampsia  = 0;
$subtotal_Kehamilan_Ektopik = 0;


$subtotal_Molahidatidosa = 0;


$sql = mysqli_query($koneksi, "SELECT * FROM diagnosa WHERE id_user='$_SESSION[id_user]'");
while ($data = mysqli_fetch_array($sql)) {
    $total_Hiperemesis_Gravidarum = $data['Hiperemesis_Gravidarum'];
    $total_Preeklampsia   = $data['Preeklampsia'];
    $total_Kehamilan_Ektopik = $data['Kehamilan_Ektopik'];

    $total_Molahidatidosa = $data['Molahidatidosa'];

     $total_Plasenta_Previa = $data['Plasenta_Previa'];

    
  

    $subtotal_Hiperemesis_Gravidarum += $total_Hiperemesis_Gravidarum;
    $subtotal_Preeklampsia  += $total_Preeklampsia  ;
    $subtotal_Kehamilan_Ektopik += $total_Kehamilan_Ektopik;
 
    $subtotal_Molahidatidosa += $total_Molahidatidosa;

     $subtotal_Plasenta_Previa+= $total_Plasenta_Previa;
  
}

$penyakit = array(
    'Hiperemesis Gravidarum' => $subtotal_Hiperemesis_Gravidarum,
    'Preeklampsia' => $subtotal_Preeklampsia,
    'Kehamilan Ektopik' => $subtotal_Kehamilan_Ektopik,
    'Molahidatidosa (Hamil Anggur )' => $subtotal_Molahidatidosa,
    'Plasenta Previa' => $subtotal_Plasenta_Previa
);

arsort($penyakit); // Mengurutkan nilai penyakit dari yang terbesar

$penyakit_terbesar = key($penyakit); // Mengambil penyakit dengan nilai terbesar
$solusi = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE penyakit='$penyakit_terbesar'");
$data_solusi = mysqli_fetch_array($solusi);
$nama_solusi = $data_solusi['solusi'];

?>

<table id = 'zero_config' class = 'table'>




<tr>
<td width = '2%'><b>Penyakit yang di derita</b></td>
<td width = '2%'><b>:</b></td>
<td width = '2%'> <?php echo $penyakit_terbesar;
?>  



<?= ceil($max) ?> %
 </td>
</tr>

<tr>

<td width = '2%'><b>Solusi</b></td>
<td width = '2%'><b>:</b></td>
<td width = '2%'> <?php echo $nama_solusi;
?> </td>

</tr>







</tbody>

</table>
  <form class="forms-sample" action="hasil_diagnosa.php" method="post" >
 <input type = 'submit' name = 'simpan' value = 'kembali' class = 'btn btn-sm btn-primary' />&nbsp;


<input type = 'submit' name = 'simpan' value = 'Simpan diagnosa' class = 'btn btn-sm btn-primary' />&nbsp;
      <!-- form start -->

      <a class="btn btn-sm btn-primary"  href="cetak.php" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>

      <br>

          <br>

              
</div>

 <input type="hidden" class="form-control" id="penyakit" name="penyakit" value="<?php echo $penyakit_terbesar;
?>" placeholder="penyakit">

              <!-- /.card-header -->


                   
            
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
               



            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>                         



 </div>
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