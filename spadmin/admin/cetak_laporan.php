
<?php 


include '../koneksi.php'; 


?>





<html>

<head>
  <title>Laporan Riwayat diagnosa pasien</title>







  <div class="box-body">
    <div class="form-panel">
      <table width="100%">



        <html lang="en">

        <head>


          <title><?php echo $pagetitle ?></title>

          <link href="foto/logo.png" rel="icon" type="images/x-icon">



        </head>

<body>
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table border">
        <tbody>


          <tr>
            <left>

            </left>



            <center>

              <b>Laporan Riwayat diagnosa </b> <br>
              sistem pakar diagnosa penyakit hipertensi<br>
             <br>

            </center>


            </td>
          </tr>
        </tbody>
      </table>


      </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Tanggal Cetak  :  <?php
 $tgl=date('d-m-Y');
 echo $tgl;
 ?></b><br> 
          <br>
           <br>

          <table width="20%">

                    
 
  


   


   
  



  </td>
   
  </tr>
 
</table>


      <hr class="line-top" />
    </div>
  </section>
  <section id="body-of-report">
    <div class="container-fluid">

   

      <table border style="width: 100%">
        <thead>
          <tr>




           <th><left>No </center></th>

                                                   <th><left>nama user</left></th>
                                              
                        <th><left>Tanggal Diagnosa</left></th>
                        <th><left> Kesimpulan </center></th>
                           <th><left> solusi </center></th>
                      

          </tr>
        </thead>
     <?php
                                                  include'../koneksi.php';
                                                  $no = 1;
  $sql = mysqli_query($koneksi, "SELECT * from riwayat INNER JOIN penyakit ON riwayat.penyakit = penyakit.penyakit   ");

   
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>
            <tr>

                <td><?php echo $no++;  ?></td>
                                                
                     <td><left><?php echo $data['nama'];?></left></td>
                     <td><left><?php echo $data['tgl_diagnosa'];?></left></td>
                      <td><left><?php echo $data['penyakit'];?></center></td>
                        <td><left><?php echo $data['solusi'];?></center></td>
                     

            <tr>












            <?php
          }
            ?>
          </tbody>



      </table>

    </div>
    </div>
    </div>
    </div>

    <script>
      window.print();
    </script>

</body>

</html>