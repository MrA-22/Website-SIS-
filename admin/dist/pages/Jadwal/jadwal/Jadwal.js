// Tombol Export PDF
document.getElementById('exportPdf').addEventListener('click', function () {
    const kelasId = document.getElementById('kelasId').value;

    if (kelasId) {
        // Redirect ke halaman export dengan parameter kelas
        window.location.href = `pdf.php?kelas=${kelasId}`;
    } else {
        alert('Kelas tidak ditemukan!');
    }
});

document.getElementById('download').addEventListener('click', function() {
    // Menggunakan html2canvas untuk merender elemen dengan id 'jadwal'
    html2canvas(document.getElementById('jadwal')).then(function(canvas) {
        // Pastikan canvas berhasil dibuat
        console.log(canvas);

        // Membuat elemen <a> untuk mengunduh gambar
        let link = document.createElement('a');
        link.download = 'jadwal.png'; // Nama file yang akan diunduh
        link.href = canvas.toDataURL(); // Mengonversi canvas ke gambar base64

        // Cek apakah canvas sudah valid
        if (link.href) {
            link.click(); // Simulasikan klik pada link untuk mengunduh
        } else {
            console.error("Canvas gagal dibuat.");
        }
    }).catch(function(error) {
        // Jika terjadi error, tampilkan pesan kesalahan
        console.error("Terjadi kesalahan saat memproses html2canvas: ", error);
    });
});

document.getElementById('balik').addEventListener('click', function () {
    window.location.href = `Jadwal.php`;
});