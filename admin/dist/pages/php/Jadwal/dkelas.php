<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter ID diberikan
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Query untuk menghapus Kelas berdasarkan ID
  $query = "DELETE FROM kelas WHERE id = ?";
  $stmt = $koneksi->prepare($query);

  if ($stmt) {
    $stmt->bind_param("i", $id); // Mengikat parameter ID
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      // Jika data berhasil dihapus, arahkan kembali ke halaman Kelas
      echo "<script>
                    alert('Jadwal berhasil dihapus.');
                    window.location.href = '../../Jadwal/Kelas.php';
                  </script>";
    } else {
      // Jika ID tidak ditemukan
      echo "<script>
                    alert('Gagal menghapus Kelas. ID tidak ditemukan.');
                    window.location.href = '../../Jadwal/add_kelas.php';
                  </script>";
    }

    $stmt->close();
  } else {
    // Jika query gagal dipersiapkan
    echo "<script>
                alert('Terjadi kesalahan pada server.');
                window.location.href = '../../Jadwal/add_kelas.php';
              </script>";
  }
} else {
  // Jika parameter ID tidak diberikan
  echo "<script>
            alert('ID tidak valid.');
            window.location.href = '../../Jadwal/add_kelas.php';
          </script>";
}

// Tutup koneksi
$koneksi->close();
