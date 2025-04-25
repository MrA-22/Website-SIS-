<?php
// Koneksi ke database
include '../../../../../koneksi.php'; // Sesuaikan dengan path koneksi Anda

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $tgll_siswa = $_POST['tgll_siswa'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $nohp_ortu = $_POST['nohp_ortu'];

    // Debugging: Menampilkan data input
    echo "Data yang diterima:<br>";
    echo "NISN: $nisn<br>";
    echo "Nama: $nama_siswa<br>";
    echo "Tanggal Lahir: $tgll_siswa<br>";
    echo "Kelas: $kelas<br>";
    echo "Alamat: $alamat<br>";
    echo "Nomor HP Orang Tua: $nohp_ortu<br>";

    // Proses unggah foto jika ada
    $foto = $_FILES['foto']['name'];
    $targetDir = "../uploads/Foto_siswa/";
    $targetFile = $targetDir . basename($foto);
    $uploadOk = 1;

    if (!empty($foto)) {
        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check === false) {
            echo "File yang diunggah bukan gambar.<br>";
            $uploadOk = 0;
        }

        // Cek ukuran file
        if ($_FILES['foto']['size'] > 2000000) {
            echo "Ukuran file terlalu besar. Maksimal 2MB.<br>";
            $uploadOk = 0;
        }

        // Hanya izinkan format tertentu
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Hanya format JPG, JPEG, PNG, dan GIF yang diizinkan.<br>";
            $uploadOk = 0;
        }

        // Pindahkan file jika validasi berhasil
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                echo "Foto berhasil diunggah.<br>";
            } else {
                echo "Terjadi kesalahan saat mengunggah file.<br>";
                $uploadOk = 0;
            }
        }
    } else {
        // Jika tidak ada foto baru, ambil foto lama
        $query = "SELECT foto_siswa FROM siswa WHERE nisn = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "s", $nisn);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $foto = $row['foto_siswa'];
        } else {
            $foto = "default.jpg";
        }
    }

    // Update data siswa
    $query = "UPDATE siswa SET nama_siswa = ?, tgll_siswa = ?, kelas = ?, alamat = ?, nohp_ortu = ?, foto_siswa = ? WHERE nisn = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $nama_siswa, $tgll_siswa, $kelas, $alamat, $nohp_ortu, $foto, $nisn);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
        alert('Data berhasil di ubah');
        window.location.href = '../../SnG/Siswa.php';
        </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data. Error: " . $stmt->error . "');
                window.location.href = '../../SnG/Siswa.php';
            </script>";
    }

    // Tutup koneksi
    mysqli_close($koneksi);
} else {
    echo "Metode request tidak valid.<br>";
    exit;
}
