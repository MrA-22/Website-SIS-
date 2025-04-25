<?php
include '../../../../koneksi.php'; // Pastikan path koneksi database benar

// Tangkap parameter kelas dari URL
$kelas_id = isset($_GET['kelas']) ? intval($_GET['kelas']) : 0;

// Validasi apakah kelas sudah dipilih
if ($kelas_id <= 0) {
    die('Kelas tidak valid atau belum dipilih.');
}

// Query untuk mendapatkan nama kelas berdasarkan ID
$queryKelas = "SELECT nama_kelas FROM kelas WHERE id_kelas = $kelas_id";
$resultKelas = mysqli_query($koneksi, $queryKelas);

if (mysqli_num_rows($resultKelas) === 0) {
    die('Kelas tidak ditemukan.');
}

// Ambil nama kelas
$rowKelas = mysqli_fetch_assoc($resultKelas);
$nama_kelas = $rowKelas['nama_kelas'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <link rel="stylesheet" href="jadwal/styles.css">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Input tersembunyi untuk ID kelas -->
        <input type="hidden" id="kelasId" value="<?php echo htmlspecialchars($kelas_id); ?>">
        <input type="hidden" id="kelasId" value="<?php echo htmlspecialchars($_GET['kelas_id'] ?? ''); ?>">
        <button type="button" class="btn btn-primary" id="balik">Kembali ke Halaman Jadwal</button>
        <button type="button" class="btn btn-primary" id="exportPdf">Export PDF</button>
        <button type="button" class="btn btn-primary" id="download">Download GAMBAR</button>
        <div class="mt-4" id="jadwal">
            <!-- Form untuk memilih kelas -->
            <h2>DAFTAR JADWAL PELAJARAN</h2>
            <!-- Menampilkan nama kelas -->
            <p>Kelas: <strong><?php echo htmlspecialchars($nama_kelas); ?></strong></p>
            <?php
            // Cek apakah kelas dipilih
            if (isset($_GET['kelas']) && !empty($_GET['kelas'])) {
                $kelasId = $_GET['kelas']; // Ambil ID kelas dari parameter GET
                // Query untuk mengambil jadwal berdasarkan kelas
                $queryJadwal = "SELECT j.*, k.nama_kelas 
                        FROM jadwal j
                        JOIN kelas k ON j.kelas_id = k.id_kelas
                        WHERE j.kelas_id = '$kelasId'
                        ORDER BY j.hari, j.jam_mulai";
                $resultJadwal = mysqli_query($koneksi, $queryJadwal);
                // Tampilkan jadwal jika data ditemukan
                if (mysqli_num_rows($resultJadwal) > 0) {
                    echo "<table class='schedule-table table table-bordered'>
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Mata Pelajaran 1</th>
                                <th>Istirahat</th>
                                <th>Jam</th>
                                <th>Mata Pelajaran 2</th>
                            </tr>
                        </thead>
                        <tbody>";
                    while ($row = mysqli_fetch_assoc($resultJadwal)) {
                        // Pastikan semua nilai ada sebelum diformat
                        $jamMulai = isset($row['jam_mulai']) ? date("h:i A", strtotime($row['jam_mulai'])) : '-';
                        $jamSelesai = isset($row['jam_selesai']) ? date("h:i A", strtotime($row['jam_selesai'])) : '-';
                        $jamMulai1 = isset($row['jam_mulai1']) ? date("h:i A", strtotime($row['jam_mulai1'])) : '-';
                        $jamSelesai1 = isset($row['jam_selesai1']) ? date("h:i A", strtotime($row['jam_selesai1'])) : '-';
                        $istirahat = isset($row['istirahat']) ? date("h:i A", strtotime($row['istirahat'])) : '-';
                        echo "<tr>
                        <td>" . htmlspecialchars($row['hari']) . "</td>
                        <td>" . htmlspecialchars($jamMulai) . " - " . htmlspecialchars($jamSelesai) . "</td>
                        <td>" . htmlspecialchars($row['mata_pelajaran1']) . "</td>
                        <td>" . htmlspecialchars($istirahat) . "</td>
                        <td>" . htmlspecialchars($jamMulai1) . " - " . htmlspecialchars($jamSelesai1) . "</td>
                        <td>" . htmlspecialchars($row['mata_pelajaran2']) . "</td>
                    </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    // Tampilkan pesan jika jadwal tidak ditemukan
                    echo "<p class='no-schedule'>Jadwal untuk kelas ini tidak ditemukan.</p>";
                }
            } else {
                // Tampilkan pesan jika kelas belum dipilih
                echo "<p class='no-schedule'>Silakan pilih kelas untuk melihat jadwal.</p>";
            }
            ?>
        </div>
    </div>
    <script src="jadwal/jadwal.js"></script>
</body>

</html>