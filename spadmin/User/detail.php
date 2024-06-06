
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Diagnosa </h1>
      <nav>
        <ol class="breadcrumb">
      
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section">
      <div class="row">
        <div class="col-lg-12">


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

      <?php 
 

  if (isset($_POST['submited'])) {

    $selected = (array) $_POST['select'];
    $rowsa = mysqli_query($koneksi, "SELECT kd_gejala, gejala FROM gejala WHERE kd_gejala IN ('".implode("','", $selected)."')");
    $as = mysqli_fetch_assoc($rowsa);

    $sql_row = "SELECT COUNT(relasi.kd_gejala) as rowspan, relasi.kd_gejala, relasi.nilai ,penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN  ('".implode("','", $selected)."') GROUP BY relasi.kd_penyakit";
    // echo($sql_row);
    $data_row = mysqli_query($koneksi, $sql_row) ;

    $sql = "SELECT relasi.kd_gejala, relasi.nilai ,penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN  ('".implode("','", $selected)."')";
    // echo($sql);
    $data = mysqli_query($koneksi, $sql) ;

    $as = mysqli_fetch_assoc($data);


    



    $hasil_perkalian = [];
    foreach ($data_row as $data_a) {
        $bobot = $data_a['bobot'];
        $total = 0;
        foreach ($data as $data_b) {
            
            if($data_a['kd_penyakit'] == $data_b['kd_penyakit']){
                // if($data_a['kd_gejala'] == $data_b['kd_gejala']){
                    $nilai = $data_b["nilai"];
                    $total = $bobot * $nilai *10;
                    $bobot = $total;
                // }
            }
            
        }

                                        

        $hasil_perkalian[$data_a['kd_penyakit']] = $total;
    }

    $total_penjumlahan = array_sum($hasil_perkalian);
    

  }

   

?>

         
 
         

       

         

          <div class="card">
            <div class="card-body">


              <form id="select" method="POST" action="detail.php" >
          
                         <table id="" class="table">
                                          <thead>
                                            <tr>
                                                <th>No</th>

                                                <th>Kode Gejala</th>
                                                <th>Nama Gejala</th>

                                               
                                                        
                                            </tr>
                                        </thead>
                                        <?php 
                                          $i=1;
                                          foreach ($rowsa as $key) 



                                          {
                                            echo "<tr>";
                                            echo "<td>".$i++."</td>";
                                            echo "<td>".$key['kd_gejala']."</td>";
                                            echo "<td>".$key["gejala"]."</td>";

                                            echo "</tr>";
                                          }
                                        ?>

            
                                        </tbody>
                                       
                                    </table>
                                       
                                </div>
            <!--Tambah Modal -->
                 
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

               <div class="card">
            <div class="card-body">


              <form id="select" method="POST" action="detail.php" >

                <br>
             


                 


                              

                                 
                              <table id="" class="table">


                                         <thead>
                                                <td colspan='4'><b>Perhitungan bayes</b></td>
                                        <tr>

                                           
                                            <th  width="100" >
                                                <left>Penyakit</left>
                                            </th>
                                            
                                           
                                            <th  width="80" >
                                                <center>Hasil</center>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
    
                                          $hasil_semua = [];
                                          $hasil_akhir = 0;  
                                          $hasil_akhir_semua = [];
                                          $rowspan = 1;
                                          
                                          $total_penjumlahan = round($total_penjumlahan, 4);
                                          foreach ($data_row as $key_row) {



                                            $hasil_akhir_perkalian = round($hasil_perkalian[$key_row["kd_penyakit"]], 4);

                                             
                                          
                                                
                                           
                                                                                      
                                            $hasil_akhir = $hasil_perkalian[$key_row["kd_penyakit"]] / $total_penjumlahan * 100;
                                            

                                            $hasil_akhir = round($hasil_akhir, 4);
                                             
                                             if($hasil_akhir > 100)
                                            {
                                                 $hasil_akhir = 100;
                                            }
                                          

                                            $hasil_akhir_semua[] = round($hasil_akhir, 4);
                                         
                                            $hasil_semua[] = [
                                                'kd_penyakit' => $key_row["kd_penyakit"],
                                                'penyakit' => $key_row["penyakit"],
                                                'solusi' => $key_row["solusi"],
                                                
                                                
                                                'hasil_akhir' => $hasil_akhir
                                            ];

                                            foreach ($data as $key) {
                                            
                                              if($key_row['kd_penyakit'] == $key['kd_penyakit']){
                                        ?>
                                        <tr>

                                            <?php
                                              if($key_row['kd_gejala'] == $key['kd_gejala']){
                                            ?>
                                            
                                           
                                            <td rowspan="<?= $key_row["rowspan"] ?>">
                                                <left>
                                                    <?= $key['penyakit'];?>
                                                </left>
                                            </td>

                                             <td rowspan="<?=  $key_row["rowspan"] ?>">
                                                <center>
                                                    <?= $hasil_akhir ?> % </center>
                                            </td>
                                           
                                            <?php
                                                }
                                            ?>

                                           

                                           
                                              


                                           
                                            <?php
                                                
                                              }
                                            ?>
                                        </tr>
                                        <?php
                                                }
                                                
                                                $rowspan = $key_row["rowspan"];
                                            }
                                        
                                      
                                       
                                        ?>
                                    </tbody>
                                   
                                </table>
                                        </tbody>
                                       
                                    </table>


                                    <br>

                                   
                                        </tbody>
                                       
                                    </table>
   
   
                                       
                                </div>
            <!--Tambah Modal -->
                 
                    </div>


 <?php
                                          $no=1;
                                          $max = max($hasil_akhir_semua);
                                          foreach ($hasil_semua as $terbesar) {
                                            if($terbesar["hasil_akhir"] == $max){
                                        ?>

 <table id="" class="table">

    <td colspan='4'><b>Kesimpulan Akhir</b></td>
    
                                      <tr>
    <td width="20%"><b>Nama user</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"> <?PHP ECHO $_SESSION['username']; ?></td>
    
  </tr>


  <tr>

   

    <td width=""><b>Kode Penyakit </b></td>
    <td width=""><b>:</b></td>
    <td  width="">  <?= $terbesar['kd_penyakit'];?></td>

  </tr>

  <tr>

   

    <td width=""><b>Penyakit yang di derita </b></td>
    <td width=""><b>:</b></td>
    <td  width="">  <?= $terbesar['penyakit'];?></td>

  </tr>


   <tr>
    <td width="20%"><b>Presentase Bayes</b></td>
    <td width="2%"><b>:</b></td>
    
    <td width="78%"><?= $terbesar['hasil_akhir'] ?> %</td>
   
  </tr>

  


  <tr>
    <td width="20%"><b>Pengendalian / solusi </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"> <?= $terbesar['solusi'];?></td>

   
    

   
  </tr>

  
  <?php
                                                $no++;
                                            }
                                        }
                                        ?>


    </tbody>
                                </table>
                   


                   


            </div>
            <!-- /.card -->
          </div>
                </tbody>
              </table>
 <form class="forms-sample" action="detail.php" method="post" >

             

<input type="hidden" class="form-control" id="penyakit" name="penyakit" value="<?= $terbesar['penyakit'];?>">
              <input type = 'submit' name = 'simpan' value = 'Simpan diagnosa' class = 'btn btn-sm btn-primary' />&nbsp;

              <!-- End Bordered Table -->
   <a class="btn btn-sm btn-primary"  href="cetak2.php?<?=http_build_query(array('selected' => $selected))?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
         
 
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