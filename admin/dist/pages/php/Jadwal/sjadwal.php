<?php
include 'koneksi.php';

// Debugging: Print all POST data
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();

// Ambil data dari form
$kelas_id = $_POST['kelas_id'] ?? null;
$hari = $_POST['hari'] ?? null;
$jam_mulai = $_POST['jam_mulai'] ?? null;
$jam_selesai = $_POST['jam_selesai'] ?? null;
$mata_pelajaran1 = $_POST['mata_pelajaran1'] ?? null;
$guru1 = $_POST['guru1'] ?? null;
$istirahat = $_POST['istirahat'] ?? null;
$jam_mulai1 = $_POST['jam_mulai1'] ?? null;
$jam_selesai1 = $_POST['jam_selesai1'] ?? null;
$mata_pelajaran2 = $_POST['mata_pelajaran2'] ?? null;
$guru2 = $_POST['guru2'] ?? null;

// Validasi: Pastikan semua field tidak kosong
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        die("Data wajib tidak lengkap! Harap lengkapi semua data. (Field: $key)");
    }
}

// Masukkan data ke database
$sql = "
    INSERT INTO jadwal 
    (kelas_id, hari, jam_mulai, jam_selesai, mata_pelajaran1, guru1, istirahat, jam_mulai1, jam_selesai1, mata_pelajaran2, guru2) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param(
    "issssssssss",
    $kelas_id,
    $hari,
    $jam_mulai,
    $jam_selesai,
    $mata_pelajaran1,
    $guru1,
    $istirahat,
    $jam_mulai1,
    $jam_selesai1,
    $mata_pelajaran2,
    $guru2
);

if ($stmt->execute()) {
    header("Location: ../../Jadwal/Jadwal.php?status=success");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
