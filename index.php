
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISTEM PAKAR DIABETES</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/iconbumil.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Butterfly - v4.7.0
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo"><img src="" alt="" class="img-fluid">SP DIABETES</a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.php">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Informasi</a></li>
        
          <li><a class="" href="spadmin/index.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>SISTEM PAKAR DIAGNOSIS PENYAKIT DIABETES</h1>
          <h2>Gunakan sistem ini untuk melakukan diagnosis penyakit DIABETES</h2>
          <div><a href="spadmin/index.php" class="btn-get-started scrollto">Klik Untuk Mulai Konsultasi</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/diabetes2.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
            <a href="" class=""></a>
            </div>
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>INFORMASI</h3>
            <p>Sistem ini merupakan sistem pakar untuk mendiagnosis penyakit DIABETES berbasis web. Sistem ini bertujuan untuk memberikan informasi gejala penyakit yang biasanya dialami pada penyakit diabetes beserta langkah apa saja yang harus dilakukan penanganan serta solusi bagi yang mengidap penyakit tersebut sehingga pasien bisa menemukan solusi penanganan awal agar kondisi  tetap terjaga dengan baik.</p>

            <h5><b>Petunjuk Penggunaan Aplikasi</b></h5>
            <div class="icon-box">
              <div class="icon"><i class="bx bx-plus"></i></div>
              <h4 class="title"><a href="">Isi Data Diri atau Pendaftaran</a></h4>
              <p class="description">Sebelum melakukan proses diagnosis, pasien harus melakukan pendaftaran atau isi data diri</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-search"></i></div>
              <h4 class="title"><a href="">Mulai diagnosis</a></h4>
              <p class="description">Setelah melakukan pendaftaran atau isi data diri, pasien bisa langsung melakukan konsultasi</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Hasil diagnosis</a></h4>
              <p class="description">Setelah melakukan proses diagnosis gejala, akan didapatkan hasil diagnosis penyakit berdasarkan gejala yang di pilih</p>
          </div>
         
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Buku Tamu ======= -->
     <?php
     if(isset($_POST['simpan'])){
      $nama        = $_POST['nama'];
      $email       = $_POST['email'];
      $komentar    = $_POST['komentar'];
    mysqli_query($koneksi, "INSERT INTO buku_tamu (nama, email, komentar) VALUES
                  ('$nama', '$email', '$komentar')");

    echo "<script>window.alert('Data Komentar Sudah dikirim')
    window.location='index.php'</script>";
    }
   
    ?>

  </main><!-- End #main -->

  <!-- Form Buku Tamu -->

  


  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="container py-4">
      <div class="copyright col-sm-10">
        &copy; SISTEM PAKAR DIAGNOSIS PENYAKIT DIABETES NAIVE BAYES
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
         <a href=""></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>