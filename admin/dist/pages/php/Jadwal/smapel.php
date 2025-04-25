<?php
// Sambungkan ke database
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $mapel = $_POST['mapel'];

    // Validasi data (pastikan tidak kosong)
    if (!empty($mapel)) {
        // Periksa apakah mapel sudah ada di database
        $query_check = "SELECT * FROM mapel WHERE mapel = '$mapel'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Jika mapel sudah ada
            echo "<script>
                    alert('Kelas sudah ada di database');
                    window.location.href = '../../Jadwal/add_kelas.php'; // Ganti dengan halaman tujuan
                </script>";
        } else {
            // Jika mapel belum ada, tambahkan ke database
            $query = "INSERT INTO mapel (mapel) VALUES ('$mapel')";

            // Eksekusi query
            if (mysqli_query($koneksi, $query)) {
                echo "<script>
                        alert('Data mapel berhasil disimpan');
                        window.location.href = '../../Jadwal/Jadwal.php'; // Ganti dengan halaman tujuan
                    </script>";
            } else {
                echo "<script>
                        alert('Gagal menyimpan data mapel');
                        window.location.href = '../../Jadwal/add_kelas.php'; // Ganti dengan halaman tujuan
                    </script>";
            }
        }
    } else {
        echo "<script>
                alert('Kelas tidak boleh kosong');
                window.location.href = '../../Jadwal/add_kelas.php'; // Ganti dengan halaman form
            </script>";
    }
} else {
    echo "<script>
            alert('Metode pengiriman tidak valid');
            window.location.href = '../../Jadwal/add_kelas.php'; // Ganti dengan halaman form
        </script>";
}
