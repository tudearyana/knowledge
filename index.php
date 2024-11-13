<?php
require 'koneksi.php';

// Pastikan pengguna login sebelum melanjutkan ke konten halaman
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
</head>

<body>
    <h1>Selamat datang, <?= $_SESSION['username']; ?>!</h1>
    <p>Ini adalah halaman utama yang hanya bisa diakses setelah login.</p>
    <a href="logout.php">Logout</a>
</body>

</html>