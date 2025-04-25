<?php
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
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="mdi mdi-account-key menu-icon"></i>
                            <span class="menu-title">Admin</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="Artikel.php">Artikel</a></li>
                                <li class="nav-item"> <a class="nav-link" href="Modul.php">Modul</a></li>
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
                                    <h3 class="card-title">Kelola Artikel</h3>
                                    <a href="add_artikel.php" class="btn btn-outline-primary btn-icon-text btn-fw" style="margin-bottom: 10px;">
                                        <i class="ti-pencil-alt btn-icon-prepend" style="margin-right: 5px;"></i> Artikel
                                    </a>
                                    <div class="table-responsive">
                                        <?php
                                        include '../../../../koneksi.php';

                                        // Query untuk mengambil data dari tabel siswa
                                        $query = "SELECT * FROM artikel"; // Sesuaikan dengan tabel Anda
                                        $result = mysqli_query($koneksi, $query);

                                        // Cek apakah data ditemukan
                                        if (mysqli_num_rows($result) > 0) {
                                        ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Foto</th>
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Tanggal</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Pastikan bahwa atribut foto_artikel memiliki data yang valid
                                                        $fotoPath = "../uploads/Foto_artikel/" . (!empty($row['foto_artikel']) ? $row['foto_artikel'] : 'default.jpg'); // Gunakan default.jpg jika foto tidak ditemukan
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <a href="../uploads/Foto_artikel/<?php echo htmlspecialchars($row['foto_artikel']); ?>" target="_blank">
                                                                    <img src="<?php echo htmlspecialchars($fotoPath); ?>"
                                                                        alt="Foto Artikel <?php echo htmlspecialchars($row['id_artikel']); ?>"
                                                                        style="width: 75px; height: 100px; object-fit: cover; border-radius: 5px;">
                                                                </a>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($row['foto_artikel']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['penulis']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['tanggal_upload']); ?></td>
                                                            <td>
                                                                <!-- Tombol Ubah -->
                                                                <a href="edit_artikel.php?id_artikel=<?php echo htmlspecialchars($row['id_artikel']); ?>"
                                                                    class="btn btn-warning btn-sm">Ubah</a>
                                                                <!-- Tombol Hapus -->
                                                                <button onclick="confirmDelete(<?php echo htmlspecialchars($row['id_artikel']); ?>)"
                                                                    class="btn btn-danger btn-sm">Hapus</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else {
                                            echo "<p>Data tidak ditemukan.</p>";
                                        }

                                        // Tutup koneksi
                                        mysqli_close($koneksi);
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = `../php/Artikel/dartikel.php?id_artikel=${id}`;
            }
        }
    </script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>