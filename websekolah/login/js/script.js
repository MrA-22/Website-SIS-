// script.js

function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.querySelector(".eye-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.add("show"); // Ganti ikon menjadi "mata tertutup"
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("show"); // Ganti ikon menjadi "mata terbuka"
    }
}
