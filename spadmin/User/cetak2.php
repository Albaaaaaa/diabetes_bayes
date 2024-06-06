<h1>Hasil Diagnosa</h1>


<?php

session_start();
  /*echo $_SESSION['level'];
  echo $_SESSION['nama'];*/
include 'koneksi.php';


?>

<?php


 $selected = (array) $_GET['selected'];
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
    

 


   

?>



<html>
<head>
    <title>laporan</title>
</head>
<body>
 

<h3>Hasil Analisa</h3>
   <table border="1">
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

                                  
                                

                                <br>

<h3>Hasil Analisa</h3>
 
                                          


                               <table border="1">


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


                            </div>
                        </div>
                    </div>
                </div>

         
                  
                



                  



                 


            </section>
<h3>Kesimpulan</h3>


      <?php
                                          $no=1;
                                          $max = max($hasil_akhir_semua);
                                          foreach ($hasil_semua as $terbesar) {
                                            if($terbesar["hasil_akhir"] == $max){
                                        ?>

   <table border="1">

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
                     
                 


                  


              




    <script>
        window.print();
    </script>
    
</body>
</html>
