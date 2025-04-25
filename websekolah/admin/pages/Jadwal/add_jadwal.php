<?php

include '../../../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../index.php");
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
                                <div class="container mt-5">
                                    <h3>Tambah Jadwal Kelas</h3>
                                    <form action="../php/Jadwal/sjadwal.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas:</label>
                                            <select name="kelas_id" class="form-control" required>
                                                <option value="">Pilih Kelas</option>
                                                <?php
                                                $result = $koneksi->query("SELECT * FROM kelas");
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['id_kelas']}'>{$row['nama_kelas']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="hari">Hari:</label>
                                            <select class="form-control" id="hari" name="hari" required>
                                                <option value="" disabled selected>Pilih Hari</option>
                                                <?php
                                                $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                                                foreach ($days as $day) {
                                                    echo "<option value='$day'>$day</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_mulai">Jam Mulai:</label>
                                            <input type="time" name="jam_mulai" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_selesai">Jam Selesai:</label>
                                            <input type="time" name="jam_selesai" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mata_pelajaran1">Mata Pelajaran 1:</label>
                                            <select class="form-control" name="mata_pelajaran1" required>
                                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                                <?php
                                                $result = $koneksi->query("SELECT * FROM mapel");
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['mapel']}'>{$row['mapel']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru1">Guru 1:</label>
                                            <select name="guru1" class="form-control" required>
                                                <option value="" disabled selected>Pilih Guru</option>
                                                <?php
                                                $result = $koneksi->query("SELECT * FROM guru");
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['nama_guru']}'>{$row['nama_guru']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="istirahat">Istirahat:</label>
                                            <input type="time" name="istirahat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mata_pelajaran2">Mata Pelajaran 2:</label>
                                            <select class="form-control" name="mata_pelajaran2" required>
                                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                                <?php
                                                $result = $koneksi->query("SELECT * FROM mapel");
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['mapel']}'>{$row['mapel']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_mulai1">Jam Mulai 2:</label>
                                            <input type="time" name="jam_mulai1" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_selesai1">Jam Selesai 2:</label>
                                            <input type="time" name="jam_selesai1" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru2">Guru 2:</label>
                                            <select name="guru2" class="form-control" required>
                                                <option value="" disabled selected>Pilih Guru</option>
                                                <?php
                                                $result = $koneksi->query("SELECT * FROM guru");
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['nama_guru']}'>{$row['nama_guru']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mt-4">
                                            <button type="button" class="btn btn-danger" onclick="location.href='Jadwal.php'">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page-body-wrapper ends -->
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
    <script src="uploadlogo.js"></script>
    <!-- endinject -->
</body>

</html>