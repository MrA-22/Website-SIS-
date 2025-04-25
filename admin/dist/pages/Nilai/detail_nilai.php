<?php

include '../../../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../index.php");
    exit();
}

$selected_mapel = 'Bahasa Indonesia'; // Mata pelajaran yang ingin ditampilkan

$nilai_query = $koneksi->prepare("SELECT s.nama_siswa, k.id AS kelas_id, k.nama_kelas, n.nilai
        FROM rekap_nilai n
        JOIN siswa s ON n.siswa_id = s.id
        JOIN kelas k ON s.kelas_id = k.id
        WHERE n.mapel = ?");
$nilai_query->bind_param("s", $selected_mapel);
$nilai_query->execute();
$nilai_result = $nilai_query->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Guru</title>
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../logo/admin.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Rekap Nilai - Mata Pelajaran: <?= htmlspecialchars($selected_mapel); ?></h3>
                                    <div class="table-responsive">
                                        <?php if ($nilai_result && $nilai_result->num_rows > 0): ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Kelas</th>
                                                        <th>Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    while ($row = $nilai_result->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= htmlspecialchars($row['nama_siswa'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?= htmlspecialchars($row['nama_kelas'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?= htmlspecialchars($row['nilai'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        <?php else: ?>
                                            <div class="alert alert-warning">Tidak ada data nilai untuk mata pelajaran ini.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>