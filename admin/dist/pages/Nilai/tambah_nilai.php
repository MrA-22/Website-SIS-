<?php
include '../../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kelasId = $_POST['kelas_id'];
    $mataPelajaran = $_POST['mata_pelajaran'];
    $nilai = $_POST['nilai'];

    foreach ($mataPelajaran as $siswaId => $mapel) {
        $nilaiSiswa = $nilai[$siswaId];

        // Simpan ke database
        $query = "INSERT INTO rekap_nilai (kelas_id, nama_siswa, mata_pelajaran, nilai) 
                SELECT '$kelasId', nama_siswa, '$mapel', '$nilaiSiswa'
                FROM siswa WHERE id_siswa = '$siswaId'";
        mysqli_query($koneksi, $query);
    }

    // Redirect kembali ke halaman input nilai
    header("Location: ../../nilai/tambah_nilai.php?kelas=$kelasId&success=1");
}
?>
