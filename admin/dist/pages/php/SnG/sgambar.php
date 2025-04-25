<?php
include 'koneksi.php'; // Pastikan file koneksi benar

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    // Direktori tempat menyimpan file
    $targetDir = "../../uploads/Foto_siswa/";

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
            $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
            $tgll_siswa = mysqli_real_escape_string($koneksi, $_POST['tgll_siswa']);
            $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            $nohp_ortu = mysqli_real_escape_string($koneksi, $_POST['nohp_ortu']);

            // Query untuk menyimpan data
            $query = "INSERT INTO siswa (nisn, nama_siswa, tgll_siswa, kelas, alamat, nohp_ortu, foto_siswa) 
                    VALUES ('$nisn', '$nama_siswa', '$tgll_siswa', '$kelas', '$alamat', '$nohp_ortu', '$fileName')";

            if (mysqli_query($koneksi, $query)) {
                echo "Data berhasil disimpan.";
                header("Location: ../../SnG/Siswa.php"); // Redirect ke halaman Siswa.php
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
