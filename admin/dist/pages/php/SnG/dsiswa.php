<?php
include 'koneksi.php';

if (isset($_GET['id_siswa'])) {
    $id = $_GET['id_siswa'];

    // Ambil nama file gambar sebelum menghapus data
    $query = "SELECT foto_siswa FROM siswa WHERE id_siswa = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); // "i" menunjukkan tipe data integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto = $row['foto_siswa'];

        // Hapus data siswa dari database
        $deleteQuery = "DELETE FROM siswa WHERE id_siswa = ?";
        $deleteStmt = $koneksi->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            // Jika data berhasil dihapus, hapus file gambar
            $filePath = "../../uploads/Foto_siswa/" . $foto;

            if (file_exists($filePath) && !empty($foto) && $foto != "default.jpg") {
                if (unlink($filePath)) {
                    echo "<script>
                            alert('Data dan file berhasil dihapus');
                            window.location.href = '../../SnG/Siswa.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data berhasil dihapus, tetapi file tidak dapat dihapus');
                            window.location.href = '../../SnG/Siswa.php';
                        </script>";
                }
            } else {
                echo "<script>
                        alert('Data berhasil dihapus. Tidak ada file terkait untuk dihapus.');
                        window.location.href = '../../SnG/Siswa.php';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Gagal menghapus data. Error: " . $deleteStmt->error . "');
                    window.location.href = '../../SnG/Siswa.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Data tidak ditemukan atau tidak ada file terkait');
                window.location.href = '../../SnG/Siswa.php';
            </script>";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $deleteStmt->close();
    $koneksi->close();
} else {
    echo "<script>
            alert('ID tidak ditemukan');
            window.location.href = '../../SnG/Siswa.php';
        </script>";
}
