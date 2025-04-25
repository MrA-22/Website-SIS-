<?php

include '../../../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../index.php");
    exit();
}

// Proses input absensi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    // Ambil nama siswa berdasarkan ID siswa
    $querySiswa = "SELECT nama_siswa, id_siswa FROM siswa WHERE id = '$id_siswa'";
    $resultSiswa = $koneksi->query($querySiswa);
    $siswa = $resultSiswa->fetch_assoc();

    $nama_siswa = $siswa['nama_siswa'];
    $id_siswa = $siswa['id_siswa'];

    // Simpan data absensi
    $queryInsert = "INSERT INTO absensi (id_siswa, nama_siswa, id_siswa, tanggal, status, keterangan)
                    VALUES ('$id_siswa', '$nama_siswa', '$id_siswa', '$tanggal', '$status', '$keterangan')";
    if ($koneksi->query($queryInsert)) {
        echo "Data absensi berhasil disimpan.";
    } else {
        echo "Error: " . $koneksi->error;
    }
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
                                <li class="nav-item"> <a class="nav-link" href="../Jadwal/Jadwal.php">Jadwal</a></li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="../../../docs/documentation.html">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
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
                                    <h3 class="card-title">Absensi Perkelas</h3>
                                    <div class="table-responsive">
                                        <form method="GET" action="">
                                            <div class="form-group">
                                                <label for="kelas">Pilih Kelas:</label>
                                                <select name="kelas" id="kelas" class="form-control" required>
                                                    <option value="">-- Pilih Kelas --</option>
                                                    <?php
                                                    // Ambil data kelas dari database
                                                    $queryKelas = "SELECT * FROM kelas ORDER BY nama_kelas";
                                                    $resultKelas = mysqli_query($koneksi, $queryKelas);
                                                    while ($kelas = mysqli_fetch_assoc($resultKelas)) {
                                                        $selected = (isset($_GET['kelas']) && $_GET['kelas'] == $kelas['id']) ? 'selected' : '';
                                                        echo "<option value='{$kelas['id']}' $selected>{$kelas['nama_kelas']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tampilkan Absen</button>
                                        </form>
                                        <div class="mt-4"> 
                                        <?php
                                            if (isset($_GET['kelas']) && !empty($_GET['kelas'])) {
                                            $kelasId = $_GET['kelas'];
                                            $querySiswa = "SELECT * FROM siswa WHERE id_siswa = '$kelasId' ORDER BY nama_siswa";
                                            $resultSiswa = mysqli_query($koneksi, $querySiswa);
                                        if (mysqli_num_rows($resultSiswa) > 0) {
                                            echo "<form method='POST' action='proses_absen.php'>";
                                            echo "<table class='table table-striped'>
                                                <thead>
                                                    <tr>
                                                        <th>Nama Siswa</th>
                                                        <th>Hadir</th>
                                                        <th>Izin</th>
                                                        <th>Alpha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                            while ($siswa = mysqli_fetch_assoc($resultSiswa)) {
                                                    echo "<tr>"
                                                            . "<td>" . htmlspecialchars($siswa['nama_siswa']) . "</td>"
                                                            . "<td><input type='radio' name='absen[" . $siswa['id_siswa'] . "]' value='Hadir' required></td>"
                                                            . "<td><input type='radio' name='absen[" . $siswa['id_siswa'] . "]' value='Izin'></td>"
                                                            . "<td><input type='radio' name='absen[" . $siswa['id_siswa'] . "]' value='Alpha'></td>"
                                                        . "</tr>";
                                                    }
                                                echo "</tbody>
                                                </table>";
                                                echo "<button type='submit' class='btn btn-success'>Simpan Absensi</button>";
                                        echo "</form>";
                                                    } else {
                                                    echo "<p>Data siswa untuk kelas ini tidak ditemukan.</p>";
                                                    }
                                                }
                                            ?>
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
    <script>
        // Fungsi untuk konfirmasi penghapusan
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // Redirect ke halaman untuk menghapus data
                window.location.href = '../php/Jadwal/djadwal.php?id=' + id;
            }
        }
    </script>
    <script>
        document.getElementById('exportButton').addEventListener('click', function() {
            const selectedClass = document.getElementById('kelas').value;
            if (selectedClass) {
                // Redirect ke halaman export dengan parameter kelas
                window.location.href = `Jadwalprint.php?kelas=${selectedClass}`;
            } else {
                alert('Silakan pilih kelas terlebih dahulu!');
            }
        });
    </script>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>