<?php
// Konfigurasi database
$host = "localhost";      // Host database, biasanya "localhost"
$user = "root";           // Username database MySQL
$password = "";           // Password database MySQL
$database = "websekolah"; // Nama database yang ingin dihubungkan

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
