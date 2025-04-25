-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2025 pada 07.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Izin','Sakit','Alfa') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(220) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'arif', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(110) NOT NULL,
  `isi` text DEFAULT NULL,
  `foto_artikel` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `foto_guru` varchar(225) NOT NULL,
  `nisn` int(80) NOT NULL,
  `jabatan` varchar(180) NOT NULL,
  `nama_guru` varchar(80) NOT NULL,
  `tgll_guru` date NOT NULL,
  `mengajar` varchar(110) NOT NULL,
  `alamat_guru` text NOT NULL,
  `nohp_guru` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `foto_guru`, `nisn`, `jabatan`, `nama_guru`, `tgll_guru`, `mengajar`, `alamat_guru`, `nohp_guru`) VALUES
(5, '1733525044_WhatsApp Image 2024-11-14 at 18.48.05_a3c4bd23.jpg', 221280021, 'kepala sekolah\r\n', 'Arif Rasyid', '2002-07-02', 'IPS', 'jln.lukas dailon', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `namakp_sekolah` varchar(220) NOT NULL,
  `nipkp` int(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `noponsel` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id`, `nama_sekolah`, `namakp_sekolah`, `nipkp`, `alamat_sekolah`, `email`, `noponsel`) VALUES
(1, 'UTP SD NEGERI 22 PAREPARE', 'kkdakdak', 1233214124, 'km 3', 'ADASK@gmail.com', 1313123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `mata_pelajaran1` varchar(100) NOT NULL,
  `guru1` varchar(100) NOT NULL,
  `istirahat` time NOT NULL,
  `jam_mulai1` time NOT NULL,
  `jam_selesai1` time NOT NULL,
  `mata_pelajaran2` varchar(20) NOT NULL,
  `guru2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kelas_id`, `hari`, `jam_mulai`, `jam_selesai`, `mata_pelajaran1`, `guru1`, `istirahat`, `jam_mulai1`, `jam_selesai1`, `mata_pelajaran2`, `guru2`) VALUES
(1, 1, 'Senin', '05:14:00', '10:00:00', 'Bahasa Indonesia\r\n', 'weqeqwe', '01:13:00', '11:11:00', '11:11:00', 'Bahasa Jepang', 'Arif Rasyid'),
(2, 1, 'Selasa', '04:32:00', '00:31:00', 'Bahasa Jepang', '1qweqweq', '00:13:00', '00:31:00', '01:12:00', 'Bahasa Indonesia\r\n', '1qweqweq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '1A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `latar_sekolah`
--

CREATE TABLE `latar_sekolah` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `latar_sekolah`
--

INSERT INTO `latar_sekolah` (`id`, `gambar`) VALUES
(1, '1733325869_55.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Indonesia\r\n'),
(2, 'Bahasa Jepang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_nilai`
--

CREATE TABLE `rekap_nilai` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekap_nilai`
--

INSERT INTO `rekap_nilai` (`id`, `nama_siswa`, `kelas_id`, `mata_pelajaran`, `nilai`) VALUES
(1, 'Arif Rasyid', 1, 'Bahasa Indonesia\r\n', 1221),
(2, 'Arif Rasyid', 1, 'Bahasa Jepang', 2121),
(4, 'Arif Rasyid', 1, 'Bahasa Jepang', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `tgll_siswa` date DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp_ortu` varchar(15) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `tgll_siswa`, `kelas`, `alamat`, `nohp_ortu`, `foto_siswa`) VALUES
(16, '1212121213', 'Arif Rasyid', '2311-12-31', '1A', 'Jln. Lucas Dailon', '2313121212321', '1735333947_WhatsApp Image 2024-11-14 at 18.48.05_a3c4bd23.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `foto_guru` (`foto_guru`);

--
-- Indeks untuk tabel `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `latar_sekolah`
--
ALTER TABLE `latar_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `latar_sekolah`
--
ALTER TABLE `latar_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD CONSTRAINT `rekap_nilai_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
