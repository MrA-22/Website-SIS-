<?php
// Pastikan form di-submit dengan metode POST

include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_sekolah = $_POST['nama_sekolah'];
    $namakp_sekolah = $_POST['namakp_sekolah'];
    $nipkp = $_POST['nipkp'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $email = $_POST['email'];
    $noponsel = $_POST['noponsel'];

    // Query untuk menyimpan data ke dalam tabel
    $query = "INSERT INTO identitas_sekolah (nama_sekolah, namakp_sekolah, nipkp, alamat_sekolah, email, noponsel)
                VALUES ('$nama_sekolah', '$namakp_sekolah', '$nipkp', '$alamat_sekolah', '$email', '$noponsel')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan!";
        header("Location: ../../Profil/simpan.php"); // Arahkan ke halaman ubah.php jika berhasil
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi
mysqli_close($koneksi);

