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
                                    <h3 class="card-title">Jadwal Sekolah</h3>
                                    <a href="Kelas.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                                        <i class="ti-pencil-alt btn-icon-prepend" style="margin-right: 5px;"></i> Tambah Kelas
                                    </a>
                                    <a href="Mapel.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                                        <i class="ti-pencil-alt btn-icon-prepend" style="margin-right: 5px;"></i> Tambah Mapel
                                    </a>
                                    <a href="add_jadwal.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                                        <i class="ti-pencil-alt btn-icon-prepend" style="margin-right: 5px;"></i> Tambah Jadwal
                                    </a>
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
                                                        $selected = (isset($_GET['kelas']) && $_GET['kelas'] == $kelas['id_kelas']) ? 'selected' : '';
                                                        echo "<option value='{$kelas['id_kelas']}' $selected>{$kelas['nama_kelas']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tampilkan Jadwal</button>
                                            <button type="button" class="btn btn-danger" id="exportButton"><i class="ti-pencil-alt btn-icon-prepend"></i> Export</button>

                                        </form>

                                        <div class="mt-4">
                                            <?php
                                            if (isset($_GET['kelas']) && !empty($_GET['kelas'])) {
                                                $kelasId = $_GET['kelas'];
                                                $queryJadwal = "SELECT j.*, k.nama_kelas 
                                                FROM jadwal j
                                                JOIN kelas k ON j.kelas_id = k.id_kelas
                                                WHERE j.kelas_id = '$kelasId'
                                                ORDER BY j.hari, j.jam_mulai, j.jam_mulai1";
                                                $resultJadwal = mysqli_query($koneksi, $queryJadwal);

                                                if (mysqli_num_rows($resultJadwal) > 0) {
                                                    echo "<table class='table table-bordered'>
                                                    <thead>
                                                        <tr>
                                                            <th>Hari</th>
                                                            <th>Jam</th>
                                                            <th>Mata Pelajaran 1</th>
                                                            <th>Istirahat</th>
                                                            <th>Jam</th>
                                                            <th>Mata Pelajaran 2</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                                    while ($row = mysqli_fetch_assoc($resultJadwal)) {
                                                        // Format waktu jam_mulai, jam_selesai, istirahat, dan istirahat2 ke format 12 jam dengan AM/PM
                                                        $jamMulai = date("h:i A", strtotime($row['jam_mulai']));
                                                        $jamSelesai = date("h:i A", strtotime($row['jam_selesai']));
                                                        $jamMulai1 = date("h:i A", strtotime($row['jam_mulai1']));
                                                        $jamSelesai1 = date("h:i A", strtotime($row['jam_selesai1']));
                                                        $istirahat = date("h:i A", strtotime($row['istirahat']));

                                                        echo "<tr>
                                                                <td>" . htmlspecialchars($row['hari']) . "</td>
                                                                <td>" . htmlspecialchars($jamMulai) . " - " . htmlspecialchars($jamSelesai) . "</td>
                                                                <td>" . htmlspecialchars($row['mata_pelajaran1']) . "</td>
                                                                <td>" . htmlspecialchars($istirahat) . "</td>
                                                                <td>" . htmlspecialchars($jamMulai1) . " - " . htmlspecialchars($jamSelesai1) . "</td>
                                                                <td>" . htmlspecialchars($row['mata_pelajaran2']) . "</td>
                                                                <td>
                                                                    <a href='../php/Jadwal/djadwal.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>Hapus</a>
                                                                </td>
                                                            </tr>";
                                                    }
                                                    echo "</tbody></table>";
                                                } else {
                                                    echo "<p>Jadwal untuk kelas ini tidak ditemukan.</p>";
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