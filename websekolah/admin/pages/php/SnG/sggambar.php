<?php
include 'koneksi.php'; // Pastikan file koneksi benar

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    // Direktori tempat menyimpan file
    $targetDir = "../../uploads/Foto_guru/";

    // Pastikan direktori target ada, jika tidak buat direktori
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true) && !is_dir($targetDir)) {
            die("Gagal membuat direktori penyimpanan.");
        }
    }

    // Nama file yang aman untuk disimpan
    $fileName = time() . "_" . basename($_FILES['foto']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Cek ekstensi file
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        // Pindahkan file ke direktori target
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
            // Ambil data dari form
            $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
            $nama_guru = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);
            $tgll_guru = mysqli_real_escape_string($koneksi, $_POST['tgll_guru']);
            $mengajar = mysqli_real_escape_string($koneksi, $_POST['mengajar']);
            $alamat_guru = mysqli_real_escape_string($koneksi, $_POST['alamat_guru']);
            $nohp_guru = mysqli_real_escape_string($koneksi, $_POST['nohp_guru']);

            // Query untuk menyimpan data
            $query = "INSERT INTO guru (nisn, nama_guru, alamat_guru, mengajar, tgll_guru, nohp_guru, foto_guru) 
                    VALUES ('$nisn', '$nama_guru', '$alamat_guru', '$mengajar', '$tgll_guru', '$nohp_guru', '$fileName')";

            if (mysqli_query($koneksi, $query)) {
                echo "Data berhasil disimpan.";
                header("Location: ../../SnG/Guru.php"); // Redirect ke halaman Siswa.php
                exit();
            } else {
                echo "Gagal menyimpan data ke database: " . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah file. Periksa izin folder.";
        }
    } else {
        echo "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF.";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
}

// Tutup koneksi
mysqli_close($koneksi);
