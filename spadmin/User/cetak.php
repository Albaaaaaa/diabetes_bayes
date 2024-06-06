<h1>Hasil Diagnosa</h1>


<?php

session_start();
  /*echo $_SESSION['level'];
  echo $_SESSION['nama'];*/
include 'koneksi.php';

?>

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


 
   

<html>
<head>
    <title>CETAK HASIL DIAGNOSA </title>
</head>
<body>
 

<h3>Hasil Analisa</h3>
   <table border="1"><?php

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

                                  
                                

                                <br>

<h3>Hasil Analisa</h3>
 
                                      <table border="1">
                                    
                 

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
<br>

<tr>
<td width = '2%'><b>Penyakit yang di derita</b></td>
<td width = '2%'><b>:</b></td>
<td width = '2%'> <?php echo $penyakit_terbesar;
?> <?= ceil($max) ?> % </td>
</tr>
<br>
<tr>

<td width = '2%'><b>Solusi</b></td>
<td width = '2%'><b>:</b></td>
<td width = '2%'> <?php echo $nama_solusi;
?> </td>

</tr>
                            </div>
                        </div>
                    </div>
                </div>

         
                  



                  



                 


            </section>



                     
                 


                  


              




    <script>
        window.print();
    </script>
    
</body>
</html>
