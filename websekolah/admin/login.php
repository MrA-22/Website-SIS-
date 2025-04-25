<?php
// Simulasi data siswa
$siswa_data = [
    "siswa1" => "12345", // username => NINS
    "siswa2" => "67890",
    // Tambahkan data siswa lainnya sesuai kebutuhan
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah data yang dimasukkan cocok
    if (isset($siswa_data[$username]) && $siswa_data[$username] == $password) {
        header('Location: nilai.php?username=' . $username);
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
</head>
<body>
    <h2>Login Siswa</h2>
    <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
    <form method="POST">
        <label for="username">Nama Siswa:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label for="password">NINS:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
