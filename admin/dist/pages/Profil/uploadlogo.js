function uploadLogo() {
    // Pastikan ada file yang dipilih
    var fileInput = document.getElementById('logoInput');
    if (fileInput.files.length === 0) {
        alert("Pilih file logo terlebih dahulu.");
    } else {
        // Kirim form jika ada file yang dipilih
        document.getElementById('logoForm').submit();
    }
}
