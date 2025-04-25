<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter ID diberikan
if (isset($_GET['id_mapel'])) {
  $id_mapel = $_GET['id_mapel'];

  // Query untuk menghapus mapel berdasarkan ID
  $query = "DELETE FROM mapel WHERE id_mapel = ?";
  $stmt = $koneksi->prepare($query);

  if ($stmt) {
    $stmt->bind_param("i", $id_mapel); // Mengikat parameter ID
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      // Jika data berhasil dihapus, arahkan kembali ke halaman mapel
      echo "<script>
                    alert('Jadwal berhasil dihapus.');
                    window.location.href = '../../Jadwal/Mapel.php';
                  </script>";
    } else {
      // Jika ID tidak ditemukan
      echo "<script>
                    alert('Gagal menghapus mapel. ID tidak ditemukan.');
                    window.location.href = '../../Jadwal/add_mapel.php';
                  </script>";
    }

    $stmt->close();
  } else {
    // Jika query gagal dipersiapkan
    echo "<script>
                alert('Terjadi kesalahan pada server.');
                window.location.href = '../../Jadwal/add_mapel.php';
              </script>";
  }
} else {
  // Jika parameter ID tidak diberikan
  echo "<script>
            alert('ID tidak valid.');
            window.location.href = '../../Jadwal/add_mapel.php';
          </script>";
}

// Tutup koneksi
$koneksi->close();
