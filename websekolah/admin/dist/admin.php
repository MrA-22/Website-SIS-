<?php
session_start();
include '../../koneksi.php';
if (!isset($_SESSION['username'])) {
  header("Location: ../../index.php");
  exit();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Guru</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dist/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dist/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dist/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../dist/assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/assets/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="../dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="../dist/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../dist/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="logo/admin.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="logo/Sd.png" class="me-5" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="logo/tutwuri.png" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
              data-bs-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted"> Private message </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted"> 2 days ago </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="assets/images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../../logout.php">
                <i class="ti-power-off text-primary"></i> Logout </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Profile sekolah</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Profil/Profile.php">Profile sekolah</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
              aria-controls="form-elements">
              <i class="mdi mdi-camera-front-variant menu-icon"></i>
              <span class="menu-title">Siswa dan Guru</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/SnG/Guru.php">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/SnG/Siswa.php">Siswa</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#absen" aria-expanded="false" aria-controls="absen">
              <i class="mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Absensi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="absen">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../dist/pages/Absen/Absen_guru.php">Absen Guru</a></li>
                <li class="nav-item"> <a class="nav-link" href="../dist/pages/Absen/Absen_siswa.php">Absen Siswa</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-calendar-text menu-icon"></i>
              <span class="menu-title ">Jadwal</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../dist/pages/Jadwal/Jadwal.php">Jadwal</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#nilai" aria-expanded="false" aria-controls="nilai">
              <i class="mdi mdi-pencil-lock menu-icon"></i>
              <span class="menu-title">Rekap Nilai</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="nilai">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Nilai/Nilai.php">Nilai</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="mdi mdi-account-key menu-icon"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Artikel/Artikel.php">Artikel</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Modul</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#perent" aria-expanded="false" aria-controls="perent">
              <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              <span class="menu-title">Orang Tua</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="perent">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Orangtua/perent.php">Daftar Akun</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-bell menu-icon"></i>
              <span class="menu-title">Notify</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Pemberitahuan</a></li>
              </ul>
            </div>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                  <h6 class="font-weight-normal mb-0">You are logged in as Admin <?php echo htmlspecialchars($_SESSION['username']); ?>.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="assets/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div id="weather">
                        <h2 class="mb-0 font-weight-normal">
                          <i class="icon-sun me-2"></i><span id="temperature">--</span>°<sup>C</sup>
                        </h2>
                      </div>
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Indonesia</h4>
                        <h6 class="font-weight-normal">Parepare</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent" onclick="window.location.href='../../admin/dist/pages/SnG/Siswa.php'">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-4">Siswa</p>
                      <?php
                      $query = "SELECT COUNT(*) AS jumlah_siswa FROM siswa";
                      $result = mysqli_query($koneksi, $query);
                      if ($result) {
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_siswa = $data['jumlah_siswa'];
                        echo "<p class='fs-30 mb-2'>$jumlah_siswa</p>";
                      } else {
                        echo "<p class='fs-30 mb-2'>0</p>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent" onclick="window.location.href='../../admin/dist/pages/SnG/Guru.php'">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="fs-30 mb-4">Guru</p>
                      <?php
                      $query = "SELECT COUNT(*) AS jumlah_guru FROM guru";
                      $result = mysqli_query($koneksi, $query);
                      if ($result) {
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_guru = $data['jumlah_guru'];
                        echo "<p class='fs-30 mb-2'>$jumlah_guru</p>";
                      } else {
                        echo "<p class='fs-30 mb-2'>0</p>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent" onclick="window.location.href='link_tujun'">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="fs-30 mb-4">Kelas</p>
                      <?php
                      $query = "SELECT COUNT(*) AS jumlah_kelas FROM kelas ";
                      $result = mysqli_query($koneksi, $query);
                      if ($result) {
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_kelas = $data['jumlah_kelas'];
                        echo "<p class='fs-30 mb-2'>$jumlah_kelas</p>";
                      } else {
                        echo "<p class='fs-30 mb-2'>0</p>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent" onclick="window.location.href='link_tujuan'">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Mata Pelajaran</p>
                      <?php
                      $query = "SELECT COUNT(*) AS jumlah_matapelajaran FROM mapel ";
                      $result = mysqli_query($koneksi, $query);
                      if ($result) {
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_matapelajaran = $data['jumlah_matapelajaran'];
                        echo "<p class='fs-30 mb-2'>$jumlah_matapelajaran</p>";
                      } else {
                        echo "<p class='fs-30 mb-2'>0</p>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                              <p class="card-title">Detail Kehadiran</p>
                              <h1 class="text-primary">220</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Daftar Kehadiran</h3>
                              <p class="mb-2 mb-xl-0">Total data kehadiran siswa perkelas</p>
                            </div>
                          </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Kelas 1</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 20%"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">100</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Kelas 2</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">583</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Kelas 3</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%"
                                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">924</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Kelas 4</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">664</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Kelas 5</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">560</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Kelas 6</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">793</h5>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Premium <a
                  href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.
                All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                  class="ti-heart text-danger ms-1"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <script>
      // API Key gratis dari OpenWeather
      const apiKey = '516c90fe1536c67b12cfb24a2d7a48aa'; // Ganti dengan API key Anda
      // Koordinat lokasi yang diinginkan, misalnya untuk Jakarta
      const lat = -4.012602;
      const lon = 119.631530;

      // Fungsi untuk mengambil data cuaca
      async function fetchWeather() {
        try {
          const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`);
          const data = await response.json();

          if (response.ok) {
            const temperature = data.main.temp;
            document.getElementById("temperature").textContent = Math.round(temperature);
          } else {
            console.error("Error:", data.message);
          }
        } catch (error) {
          console.error("Error fetching weather data:", error);
        }
      }

      // Panggil fungsi untuk mengambil data cuaca saat halaman dimuat
      fetchWeather();
    </script>
</body>

</html>