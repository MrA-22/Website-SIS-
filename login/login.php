<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Web Sekolah</title>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="shortcut icon" href="../admin/dist/logo/user.png" />
</head>

<body>
	<div class="login-container">
		<div class="login-card">
			<img src="../utama/img/tutwuri.png" alt="Logo Sekolah" class="logo">
			<h2>UTP SDN 22 PAREPARE</h2>
			<p>Parepare, Sulawesi Selatan</p>
			<form action="../check_login.php" method="POST">
				<div class="form-group">
					<input type="text" placeholder="Nama pengguna" name="username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Kata sandi" required>
					<span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i>
					</span>
				</div>
				<div class="form-options">
					<div class="text-center">
						<h5 class="mb-2 text-center">
							<?php if (isset($_GET['error'])): ?>
								<p style="color: salmon;">Username atau password salah!</p>
							<?php endif; ?>
						</h5>
					</div>
				</div>
				<button type="submit" class="btn-login">Masuk</button>
			</form>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>

</html>