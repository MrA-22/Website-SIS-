<?php
// Sambungkan ke database
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $kelas = $_POST['kelas'];

    // Validasi data (pastikan tidak kosong)
    if (!empty($kelas)) {
        // Periksa apakah kelas sudah ada di database
        $query_check = "SELECT * FROM kelas WHERE nama_kelas = '$kelas'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Jika kelas sudah ada
            echo "<script>
                    alert('Kelas sudah ada di database');
                    window.location.href = '../../Jadwal/add_kelas.php'; // Ganti dengan halaman tujuan
                </script>";
        } else {
            // Jika kelas belum ada, tambahkan ke database
            $query = "INSERT INTO kelas (nama_kelas) VALUES ('$kelas')";

            // Eksekusi query
            if (mysqli_query($koneksi, $query)) {
                echo "<script>
                        alert('Data kelas berhasil disimpan');
                        window.location.href = '../../Jadwal/Jadwal.php'; // Ganti dengan halaman tujuan
                    </script>";
            } else {
                echo "<script>
                        alert('Gagal menyimpan data kelas');
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
