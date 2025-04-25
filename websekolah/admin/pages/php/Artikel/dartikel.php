<?php
include '../../../../../koneksi.php';

if (isset($_GET['id_artikel'])) {
    $id = $_GET['id_artikel'];

    // Ambil nama file gambar sebelum menghapus data
    $query = "SELECT foto_artikel FROM artikel WHERE id_artikel = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); // "i" menunjukkan tipe data integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto = $row['foto_artikel'];

        // Hapus data artikel dari database
        $deleteQuery = "DELETE FROM artikel WHERE id_artikel = ?";
        $deleteStmt = $koneksi->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            // Jika data berhasil dihapus, hapus file gambar
            $filePath = "../../uploads/Foto_artikel/" . $foto;

            if (file_exists($filePath) && !empty($foto) && $foto != "default.jpg") {
                if (unlink($filePath)) {
                    echo "<script>
                            alert('Data dan file berhasil dihapus');
                            window.location.href = '../../Artikel/Artikel.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data berhasil dihapus, tetapi file tidak dapat dihapus');
                            window.location.href = '../../Artikel/Artikel.php';
                        </script>";
                }
            } else {
                echo "<script>
                        alert('Data berhasil dihapus. Tidak ada file terkait untuk dihapus.');
                        window.location.href = '../../Artikel/Artikel.php';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Gagal menghapus data. Error: " . $deleteStmt->error . "');
                    window.location.href = '../../Artikel/Artikel.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Data tidak ditemukan atau tidak ada file terkait');
                window.location.href = '../../Artikel/Artikel.php';
            </script>";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $deleteStmt->close();
    $koneksi->close();
} else {
    echo "<script>
            alert('ID tidak ditemukan');
            window.location.href = '../../Artikel/Artikel.php';
        </script>";
}
