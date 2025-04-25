<?php

include '../../../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../../../../index.php");
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
  <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../logo/admin.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="../../logo/Sd.png" class="me-5" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../logo/tutwuri.png" alt="logo" /></a>
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
              <img src="../../assets/images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../../../../logout.php">
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
            <a class="nav-link" href="../../admin.php">
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
                <li class="nav-item"> <a class="nav-link" href="../Profil/Profile.php">Profile sekolah</a></li>
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
                <li class="nav-item"><a class="nav-link" href="../../pages/SnG/Guru.php">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/SnG/Siswa.php">Siswa</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../Jadwal/Jadwal.php">jadwal</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../Nilai/Nilai.php">Nilai</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../Artikel/Artikel.php">Artikel</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Artikel/Modul.php">Modul</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-bell menu-icon"></i>
              <span class="menu-title">Notify</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Pemberitahuan</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Identitas Sekolah</h3>
                  <a href="simpan.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                    <i class="ti-pencil-alt btn-icon-prepend" style="margin-right: 5px;"></i> tambah data
                  </a>
                  <a href="ubah.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                    <i class="mdi mdi-account-off btn-icon-prepend" style="margin-right: 5px;"></i> Ubah
                  </a>
                  <!-- Gambar Utama dengan Tulisan di Dalamnya -->
                  <div class="position-relative text-center mb-3">
                    <?php
                    include '../../../../koneksi.php'; // Pastikan koneksi sudah sesuai

                    if (!$koneksi) {
                      die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Query untuk mengambil data gambar dari tabel latar_sekolah
                    $queryGambar = "SELECT gambar FROM latar_sekolah"; // Sesuaikan nama kolom dan tabel
                    $resultGambar = mysqli_query($koneksi, $queryGambar);

                    if (mysqli_num_rows($resultGambar) > 0) {
                      $rowGambar = mysqli_fetch_assoc($resultGambar);
                      $logoPath = "../uploads/Profil_sekolah/" . $rowGambar['gambar']; // Gabungkan path folder dengan nama file gambar
                    } else {
                      $logoPath = "../../logo/default.jpg"; // Gambar default jika tidak ada data
                    }

                    // Query untuk mengambil data nama sekolah dari tabel identitas_sekolah
                    $queryNamaSekolah = "SELECT nama_sekolah FROM identitas_sekolah"; // Sesuaikan nama kolom dan tabel
                    $resultNamaSekolah = mysqli_query($koneksi, $queryNamaSekolah);

                    if (mysqli_num_rows($resultNamaSekolah) > 0) {
                      $rowNamaSekolah = mysqli_fetch_assoc($resultNamaSekolah);
                      $namaSekolah = $rowNamaSekolah['nama_sekolah'];
                    } else {
                      $namaSekolah = "Nama Sekolah Tidak Tersedia"; // Teks default jika data tidak ada
                    }

                    // Tutup koneksi
                    mysqli_close($koneksi);
                    ?>
                    <!-- Card Gambar -->
                    <div class="card" style="width: 100%; max-width: 1200px; height: auto; margin: 0 auto;">
                      <img src="<?php echo $logoPath; ?>" alt="Identitas Sekolah" class="card-img-top" style="object-fit: cover; width: 100%; height: auto; aspect-ratio: 16/9;">
                    </div>
                    <!-- Tulisan di Dalam Gambar -->
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; padding: 10px; text-align: center; background-color: rgba(0, 0, 0, 0.5); border-radius: 5px;">
                      <h3 style="margin: 0; font-size: 1.5rem;"><?php echo $namaSekolah; ?></h3>
                      <p style="margin: 0; font-size: 1rem;">Parepare, Provinsi Sulawesi Selatan</p>
                    </div>
                  </div>


                  <!-- Informasi Desa -->
                  <div class="table-responsive">
                    <?php
                    include '../../../../koneksi.php';
                    // Query untuk mengambil data dari tabel sekolah
                    $query = "SELECT * FROM identitas_sekolah "; // Sesuaikan dengan tabel Anda
                    $result = mysqli_query($koneksi, $query);

                    // Cek apakah data ditemukan
                    if (mysqli_num_rows($result) > 0) {
                      $row = mysqli_fetch_assoc($result);
                    ?>

                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td><strong>Nama Sekolah :</strong></td>
                            <td><?php echo $row['nama_sekolah']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Nama Kepala Sekolah :</strong></td>
                            <td><?php echo $row['namakp_sekolah']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>NIP Kepala Sekolah :</strong></td>
                            <td><?php echo $row['nipkp']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Alamat Kantor Sekolah :</strong></td>
                            <td><?php echo $row['alamat_sekolah']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>E-Mail Sekolah :</strong></td>
                            <td><?php echo $row['email']; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Nomor Ponsel Sekolah :</strong></td>
                            <td><?php echo $row['noponsel']; ?></td>
                          </tr>
                        </tbody>
                      </table>

                    <?php
                    } else {
                      echo "<p>Data tidak ditemukan.</p>";
                    }

                    // Tutup koneksi
                    mysqli_close($koneksi);
                    ?>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>