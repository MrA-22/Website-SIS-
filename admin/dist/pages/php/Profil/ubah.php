<?php
// Pastikan sudah terhubung dengan database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mulai dengan query dasar
    $query = "UPDATE identitas_sekolah SET ";
    $updateFields = [];

    // Periksa dan tambahkan setiap kolom jika ada input baru
    if (!empty($_POST['nama_sekolah'])) {
        $updateFields[] = "nama_sekolah = '" . mysqli_real_escape_string($koneksi, $_POST['nama_sekolah']) . "'";
    }
    if (!empty($_POST['namakp_sekolah'])) {
        $updateFields[] = "namakp_sekolah = '" . mysqli_real_escape_string($koneksi, $_POST['namakp_sekolah']) . "'";
    }
    if (!empty($_POST['nipkp'])) {
        $updateFields[] = "nipkp = '" . mysqli_real_escape_string($koneksi, $_POST['nipkp']) . "'";
    }
    if (!empty($_POST['alamat_sekolah'])) {
        $updateFields[] = "alamat_sekolah = '" . mysqli_real_escape_string($koneksi, $_POST['alamat_sekolah']) . "'";
    }
    if (!empty($_POST['email'])) {
        $updateFields[] = "email = '" . mysqli_real_escape_string($koneksi, $_POST['email']) . "'";
    }
    if (!empty($_POST['noponsel'])) {
        $updateFields[] = "noponsel = '" . mysqli_real_escape_string($koneksi, $_POST['noponsel']) . "'";
    }

    // Tambahkan data lain jika diperlukan...

    // Gabungkan kolom yang akan diupdate
    if (!empty($updateFields)) {
        $query .= implode(", ", $updateFields) . " WHERE id=1"; // Sesuaikan kondisi WHERE
        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            echo "Data berhasil diubah";
            header("Location: ../../Profil/ubah.php"); // Redirect ke halaman profile setelah update
            exit();
        } else {
            echo "Gagal mengubah data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Tidak ada data yang diperbarui.";
    }
}

mysqli_close($koneksi);
