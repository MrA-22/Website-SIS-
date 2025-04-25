<?php
require('../../fpdf/fpdf.php'); // Pastikan path ke file FPDF benar
include '../../../../koneksi.php'; // Koneksi ke database

// Tangkap ID kelas dari parameter GET (misalnya: ?kelas_id=1)
$kelas_id = isset($_GET['kelas']) ? intval($_GET['kelas']) : 0;

// Validasi ID kelas
if ($kelas_id <= 0) {
    die('ID kelas tidak valid.');
}

// Query untuk mendapatkan data jadwal berdasarkan kelas
$query = "SELECT j.*, k.nama_kelas 
        FROM jadwal j
        JOIN kelas k ON j.kelas_id = k.id
        WHERE k.id = $kelas_id
        ORDER BY j.hari, j.jam_mulai";
$result = mysqli_query($koneksi, $query);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) === 0) {
    die('Jadwal untuk kelas ini tidak ditemukan.');
}

// Ambil nama kelas dari hasil query
$row_kelas = mysqli_fetch_assoc($result);
$nama_kelas = $row_kelas['nama_kelas'];

// Buat objek FPDF dengan ukuran kertas A4 atau F4
$pdf = new FPDF('P', 'mm', 'A4'); // Ganti 'A4' dengan 'F4' jika menggunakan kertas F4
$pdf->SetMargins(5, 5, 5); // Atur margin lebih kecil
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8); // Mengurangi ukuran font agar tabel muat

// Judul
$pdf->Cell(0, 10, "JADWAL PELAJARAN KELAS $nama_kelas", 0, 1, 'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial', 'B', 8); // Ukuran font lebih kecil untuk header
$pdf->SetFillColor(200, 220, 255); // Warna latar belakang header
$header = ['Hari', 'Jam 1', 'Mata Pelajaran 1', 'Guru 1', 'Istirahat1', 'jam 2', 'Mata Pelajaran 2', 'Guru 2'];
$widths = [18, 25, 30, 30, 20, 30, 30, 20]; // Lebar kolom lebih kecil

foreach ($header as $i => $col) {
    $pdf->Cell($widths[$i], 8, $col, 1, 0, 'C', true);
}
$pdf->Ln();

// Isi tabel
$pdf->SetFont('Arial', '', 7); // Ukuran font lebih kecil untuk data
$pdf->SetFillColor(245, 245, 245); // Warna latar belakang baris
$fill = false; // Untuk bergantian warna

mysqli_data_seek($result, 0); // Reset pointer hasil query
while ($row = mysqli_fetch_assoc($result)) {
    $hari = htmlspecialchars($row['hari'] ?? '');
    $jam = htmlspecialchars($row['jam_mulai'] ?? '') . ' - ' . htmlspecialchars($row['jam_selesai'] ?? '');
    $mataPelajaran1 = htmlspecialchars($row['mata_pelajaran1'] ?? '');
    $guru1 = htmlspecialchars($row['guru1'] ?? '');
    $istirahat = htmlspecialchars($row['istirahat'] ?? '');
    $jam1 = htmlspecialchars($row['jam_mulai1'] ?? '') . ' - ' . htmlspecialchars($row['jam_selesai1'] ?? '');
    $mataPelajaran2 = htmlspecialchars($row['mata_pelajaran2'] ?? '');
    $guru2 = htmlspecialchars($row['guru2'] ?? '');

    $pdf->Cell($widths[0], 7, $hari, 1, 0, 'C', $fill);
    $pdf->Cell($widths[1], 7, $jam, 1, 0, 'C', $fill);
    $pdf->Cell($widths[2], 7, $mataPelajaran1, 1, 0, 'C', $fill);
    $pdf->Cell($widths[3], 7, $guru1, 1, 0, 'C', $fill);
    $pdf->Cell($widths[4], 7, $istirahat, 1, 0, 'C', $fill);
    $pdf->Cell($widths[5], 7, $jam1, 1, 0, 'C', $fill);
    $pdf->Cell($widths[6], 7, $mataPelajaran2, 1, 0, 'C', $fill);
    $pdf->Cell($widths[7], 7, $guru2, 1, 0, 'C', $fill);

    $fill = !$fill; // Ganti warna latar belakang
}

// Tutup koneksi database
mysqli_close($koneksi);

// Output PDF
ob_clean(); // Bersihkan buffer output sebelum memanggil Output()
$pdf->Output();
