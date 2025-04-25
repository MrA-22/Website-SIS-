<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location:admin/dist/admin.php");
    } else {
        header("Location:login/login.php?error=1");
        exit();
    }
} else {
    header("Location: login/login.php?error=1");
    exit();
}

$stmt->close();
$koneksi->close();
