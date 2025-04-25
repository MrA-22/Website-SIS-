<?php
include 'koneksi.php';

// Pastikan parameter 'id_guru' dikirim
if (isset($_GET['id_guru'])) {
    $id = (int)$_GET['id_guru'];

    // Validasi ID Guru
    if ($id <= 0) {
        echo "<script>
                alert('ID Guru tidak valid');
                window.location.href = '../../SnG/Guru.php';
            </script>";
        exit;
    }

    // Ambil nama file gambar sebelum menghapus data
    $query = "SELECT foto_guru FROM guru WHERE id_guru = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto = $row['foto_guru'];

        // Hapus data guru dari database
        $deleteQuery = "DELETE FROM guru WHERE id_guru = ?";
        $deleteStmt = $koneksi->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            // Jika data berhasil dihapus, hapus file gambar
            $filePath = "../../uploads/Foto_Guru/" . $foto;

            if (file_exists($filePath) && !empty($foto) && $foto != "default.jpg") {
                if (unlink($filePath)) {
                    echo "<script>
                            alert('Data dan file berhasil dihapus');
                            window.location.href = '../../SnG/Guru.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data berhasil dihapus, tetapi file tidak dapat dihapus');
                            window.location.href = '../../SnG/Guru.php';
                        </script>";
                }
            } else {
                echo "<script>
                        alert('Data berhasil dihapus. Tidak ada file terkait untuk dihapus.');
                        window.location.href = '../../SnG/Guru.php';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Gagal menghapus data. Error: " . $deleteStmt->error . "');
                    window.location.href = '../../SnG/Guru.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Data tidak ditemukan atau tidak ada file terkait');
                window.location.href = '../../SnG/Guru.php';
            </script>";
    }

    $stmt->close();
    $deleteStmt->close();
    $koneksi->close();
} else {
    echo "<script>
            alert('Metode request tidak valid atau parameter ID tidak ditemukan');
            window.location.href = '../../SnG/Guru.php';
        </script>";
    exit;
}
