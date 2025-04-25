<?php
include 'koneksi.php';

// Pastikan ID diambil dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $hapus_query = $koneksi->prepare("DELETE FROM rekap_nilai WHERE id = ?");
    $hapus_query->bind_param("i", $id);  // Bind parameter dengan tipe data integer

    // Menjalankan query
    if ($hapus_query->execute()) {
        // Jika berhasil, redirect ke halaman nilai dengan pesan sukses
        header("Location: ../../Nilai/Nilai.php?status=success");
        exit();
    } else {
        // Jika gagal, redirect ke halaman nilai dengan pesan error
        header("Location: ../../Nilai/Nilai.php?status=error");
        exit();
    }
} else {
    // Jika ID tidak ditemukan di URL, redirect ke halaman nilai
    header("Location: ../../Nilai/Nilai.php");
    exit();
}
