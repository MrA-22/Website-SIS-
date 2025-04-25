<?php
include '../../../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $tanggal_upload = date("Y-m-d H:i:s"); // Tanggal otomatis saat simpan

    // Proses upload gambar
    $foto = $_FILES['foto']['name'];
    $target_dir = "../../uploads/Foto_artikel/";
    $target_file = $target_dir . basename($foto);
    $uploadOk = 1;

    // Cek apakah file adalah gambar
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File yang diunggah bukan gambar.";
        $uploadOk = 0;
    }

    // Cek jika file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Batasi jenis file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk adalah 0
    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak dapat diunggah.";
    } else {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Simpan data ke database
            $sql = "INSERT INTO artikel (judul, penulis, isi, foto_artikel, tanggal_upload) 
                    VALUES ('$judul', '$penulis', '$isi', '$foto', '$tanggal_upload')";

            if (mysqli_query($koneksi, $sql)) {
                echo "Data artikel berhasil disimpan.";
                header("Location: ../../pages/Artikel/Artikel.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
