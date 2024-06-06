 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data_pertanyaan.php">
              <i class="bi bi-circle"></i><span>Data gejala</span>
            </a>
          </li>
          <li>
            <a href="data_kesimpulan.php">
              <i class="bi bi-circle"></i><span>Data penyakit</span>
            </a>
          </li>

           <li>
            <a href="data_relasi.php">
              <i class="bi bi-circle"></i><span>Data rule  </span>
            </a>
          </li>

        
         
        </ul>
      </li><!-- End Components Nav -->

    

     

     
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="riwayat.php">
          <i class="bi bi-card-list"></i>
          <span>riwayat diagnosa</span>
        </a>
      </li><!-- End Blank Page Nav -->


         <li class="nav-item">
        <a class="nav-link collapsed" href="data_admin.php">
          <i class="bi bi-card-list"></i>
          <span>Data admin</span>
        </a>
      </li><!-- End Blank Page Nav -->

         


      <li class="nav-item">
        <a class="nav-link collapsed" href="data_pasien.php">
          <i class="bi bi-card-list"></i>
          <span>Data pasien</span>
        </a>
      </li><!-- End Blank Page Nav -->

          <li class="nav-item">
       

             <a href="../logout.php" onclick="return confirm ('Apakah Anda Akan Keluar.?');"class="nav-link collapsed">
              
          <i class="bi bi-card-list"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
