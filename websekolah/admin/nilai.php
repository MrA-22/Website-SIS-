<?php
// Pastikan username dikirim melalui URL
if (!isset($_GET['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_GET['username'];

// Simulasi data nilai siswa
$nilai_data = [
    "siswa1" => [
        "Semester 1" => "90",
        "Semester 2" => "85"
    ],
    "siswa2" => [
        "Semester 1" => "80",
        "Semester 2" => "88"
    ],
    // Tambahkan data nilai siswa lainnya sesuai kebutuhan
];

if (!isset($nilai_data[$username])) {
    echo "Data nilai tidak ditemukan.";
    exit();
}

$nilai = $nilai_data[$username];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
</head>
<body>
    <h2>Nilai Siswa: <?php echo $username; ?></h2>
    <table border="1">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilai as $semester => $nilai_semester): ?>
            <tr>
                <td><?php echo $semester; ?></td>
                <td><?php echo $nilai_semester; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
