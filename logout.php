<?php
session_start(); // Memulai session untuk mengakses data session

// Menghapus semua data session
session_unset();
session_destroy();

// Mengarahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>