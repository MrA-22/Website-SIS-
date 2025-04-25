<?php
include 'koneksi.php';
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data gambar dari tabel sekolah
$query = "SELECT gambar FROM latar_sekolah"; // Sesuaikan nama kolom dan tabel
$result = mysqli_query($koneksi, $query);

// Cek apakah data gambar ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $logoPath = "admin/dist/pages/uploads/Profil_sekolah/" . $row['gambar']; // Ggkan path folder dengan nama file gambar
} else {
    $logoPath = "../../logo/default.jpg"; // Gambar default jika tidak ada data
}

// Query untuk mengambil artikel
$queryArtikel = "SELECT * FROM artikel ORDER BY tanggal_upload DESC LIMIT 5"; // Ambil 5 artikel terbaru
$resultArtikel = mysqli_query($koneksi, $queryArtikel);
// Tutup koneksi
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi SD Negeri 22 Parepare</title>
    <style>
        .top-section {
            display: grid;
            align-items: center;
            min-height: 690px;
            background-image: url('<?php echo $logoPath; ?>');
            background-size: cover;
            background-repeat: round;
            background-position: top;
            position: relative;
        }
    </style>
    <!-- Include SwiperJS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="icon" href="utama/img/tutwuri.png" type="image/x-icon">
    <link rel="stylesheet" href="utama/css/styles.css">
</head>

<body>
    <!-- Menu Samping untuk Mobile -->
    <nav id="sidebar" class="sidebar">
        <div class="hamburger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul>
            <li><button class="btn">Login Aparat</button></li>
            <li><button class="btn">Login Orang Tua</button></li>
            <li><button class=""> </button></li>
        </ul>
    </nav>

    <!-- Konten Utama -->
    <main id="main-content">
        <!-- Bagian Swiper (Bagian Atas) -->
        <section class="top-section">
            <div class="navbar">
                <div class="hamburger" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <div class="nav-items">
                    <button class="btn" onclick="window.location.href='login/login.php'">Login Aparat</button>
                    <button class="btn" onclick="window.location.href='login/perent.php'">Login Orang Tua</button>
                </div>

            </div>
            <!-- Teks Judul di atas Swiper -->
            <div class="title">
                <span>UPTD SD NEGERI 22 PAREPARE</span>
                <p>Lapadde, Kec. Ujung, Kota Parepare, Sulawesi Selatan.</p>
            </div>

            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="utama/img/1.jpg" alt="Gambar 1"></div>
                    <div class="swiper-slide"><img src="utama/img/2.jpg" alt="Gambar 2"></div>
                    <div class="swiper-slide"><img src="utama/img/3.jpg" alt="Gambar 3"></div>
                    <div class="swiper-slide"><img src="utama/img/4.jpg" alt="Gambar 4"></div>
                    <div class="swiper-slide"><img src="utamaimg/5.jpg" alt="Gambar 5"></div>
                </div>
            </div>

            <!-- Teks Bergerak di bawah Swiper -->
            <div class="moving-text">
                <marquee>Selamat datang di SD 22 - Pendidikan untuk Masa Depan yang Lebih Baik!</marquee>
            </div>
        </section>
        <section class="middle-section">
            <div class="menu">
                <!-- Menambahkan gambar logo home -->
                <div class="mn">
                    <a href="utama/index.html">
                        <img src="utama/img/home.png" alt="Home" class="logo-home">
                    </a>
                </div>
                <div class="mn">Home</div>
            </div>
        </section>

        <!-- Bagian Bawah -->
        <section class="bottom-section">
            <div class="left-part">
                <h2>Artikel Sekolah</h2>
                <?php
                if (mysqli_num_rows($resultArtikel) > 0) {
                    while ($artikel = mysqli_fetch_assoc($resultArtikel)) {
                        echo '<article>';
                        echo '<h3>' . htmlspecialchars($artikel['judul']) . '</h3>';
                        echo '<div class="artikel-content">';
                        if (!empty($artikel['foto_artikel'])) {
                            echo '<img src="admin/dist/pages/uploads/Foto_artikel/' . htmlspecialchars($artikel['foto_artikel']) . '" alt="' . htmlspecialchars($artikel['judul']) . '" class="artikel-image">';
                        }
                        echo '<p>' . htmlspecialchars(substr($artikel['isi'], 0, 80)) . '...</p>';
                        echo '<a href="artikel.php?id_artikel=' . $artikel['id_artikel'] . '">Baca selengkapnya</a>';
                        echo '</div>';
                        echo '</article>';
                        echo '<hr>';
                    }
                } else {
                    echo '<p>Belum ada artikel untuk ditampilkan.</p>';
                }
                ?>
            </div>

            <div class="right-part">
                <!-- Slider untuk biodata guru -->
                <div class="right-part">
                    <!-- Slider untuk biodata guru -->
                    <?php
                    // Koneksi ke database
                    include 'koneksi.php'; // Pastikan file ini ada dan berfungsi

                    // Query untuk mendapatkan data guru
                    $query = "SELECT * FROM guru";
                    $result = mysqli_query($koneksi, $query);

                    // Periksa apakah ada data
                    if ($result && mysqli_num_rows($result) > 0) {
                        echo '<div class="swiper-container guru-slider">';
                        echo '<h2>Aparat Sekolah</h2>';
                        echo '<div class="swiper-wrapper">';

                        while ($row = mysqli_fetch_assoc($result)) {
                            $nama = htmlspecialchars($row['nama_guru']);
                            $mengajar = htmlspecialchars($row['mengajar']);
                            $jabatan = htmlspecialchars($row['jabatan']);
                            $foto_guru = htmlspecialchars($row['foto_guru']); // Nama file foto_guru

                            echo '
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="admin/dist/pages/uploads/foto_guru/' . $foto_guru . '" alt="' . $nama . '" class="guru-image">
                                <h3>' . $nama . '</h3>
                                <p>Jabatan: ' . $jabatan . '</p>
                                <p>Mata Pelajaran: ' . $mengajar . '</p>
                            </div>
                        </div>';
                        }

                        echo '</div>'; // Close swiper-wrapper
                        echo '</div>'; // Close swiper-container
                    } else {
                        echo '<p>Tidak ada data guru yang tersedia.</p>';
                    }
                    ?>
                </div>
                <!-- Statistik Siswa dan Guru -->
                <div class="statistics">
                    <h2>Statistik</h2>
                    <div id="population-chart"></div>
                </div>
                <!-- Peta Sekolah -->
                <div class="map-card">
                    <h2>Peta Sekolah</h2>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.0762511326416!2d119.63940157586454!3d-4.004746995968975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bbcf01ddd995%3A0x46b5f0e4dfcafdd1!2sUPTD%20SD%20Negeri%2022%20Kota%20Parepare!5e0!3m2!1sid!2sid!4v1728608176840!5m2!1sid!2sid"
                            width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
        </section>
        <footer>
            <div class="footer-container">
                <div class="footer-left">
                    <h2>UTP SD NEGERI 22 PAREPARE</h2>
                    <p>
                        UPTD SD Negeri 22 Parepare merupakan sekolah dasar negeri
                        memiliki luas tanah 1.950 m² dan beroperasi dengan waktu penyelenggaraan pagi selama 6 hari.
                    </p>
                    <p>
                        Sebagai lembaga pendidikan yang berkomitmen terhadap kualitas, UPTD SD Negeri 22 Parepare telah
                        berhasil meraih akreditasi A dengan nomor SK 110/SK/BANP-SM/XII/2018, yang diterbitkan pada
                        tanggal 3 Desember 2018. Hal ini menunjukkan komitmen sekolah dalam menyediakan pendidikan
                        berkualitas tinggi bagi para siswanya.
                    </p>
                </div>
                <div class="footer-middle">
                    <h2>Menu Lainnya</h2>
                    <ul>
                        <li><a href="#">Visi dan Misi</a></li>
                        <li><a href="#">Jurusan</a></li>
                        <li><a href="#">Ekstrakurikuler</a></li>
                        <li><a href="#">Fasilitas</a></li>
                    </ul>
                </div>
                <div class="footer-right">
                    <h2>Alamat Kami</h2>
                    <p>Jalan Jend. Ahmad Yani No. 230, Kelurahan Lapadde, Kecamatan Ujung, Kota Parepare, Sulawesi
                        Selatan.</p>
                    <div class="socials">
                        <a href="#"><img src="utama/img/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="utama/img/instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="utama/img/twitter.png" alt="YouTube"></a>
                        <a href="#"><img src="utama/img/whatsapp.png" alt="WhatsApp"></a>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            <p>&copy; 2024 - UPTD SD Negeri 22 Parepare. All Rights</p>
        </div>

    </main>
    <!-- Sertakan JavaScript SwiperJS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="utama/js/script.js"></script>
</body>

</html>