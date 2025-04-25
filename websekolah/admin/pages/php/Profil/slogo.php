<?php
include 'koneksi.php';
// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['gambar'])) {
    // Direktori tempat menyimpan file
    $targetDir = "../../uploads/Profil_sekolah/";

    // Nama file yang aman untuk disimpan
    $fileName = time() . "_" . basename($_FILES['gambar']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Cek ekstensi file
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowedTypes)) {
        // Pindahkan file ke direktori target
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFilePath)) {
            // Simpan path logo di database
            $query = "INSERT INTO latar_sekolah (gambar) VALUES ('$fileName')";

            if (mysqli_query($koneksi, $query)) {
                // Jika berhasil, redirect ke halaman simpan.php
                header("Location: ../../Profil/simpan.php");
                exit(); // Hentikan eksekusi script setelah redirect
            } else {
                echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF.";
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
