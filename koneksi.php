<?php
function getConnection()
{
    $host = "localhost"; // Ganti jika diperlukan
    $username = "root"; // Ganti jika diperlukan
    $password = ""; // Ganti jika diperlukan
    $dbname = "db_kost";
    $ports = "3308";

    $conn = new mysqli($host, $username, $password, $dbname, $ports);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}


function register($username, $email, $password)
{
    $conn = getConnection();

    // Cek apakah email sudah ada di database
    $checkQuery = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        return "Email sudah terdaftar.";
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Simpan data pengguna ke tabel users
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        return "Registrasi berhasil!";
    } else {
        return "Registrasi gagal: " . $stmt->error;
    }
}




session_start();

function login($email, $password)
{
    $conn = getConnection();

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return "Email tidak ditemukan.";
    }

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        return "Login berhasil!";
    } else {
        return "Password salah.";
    }
}






function checkLogin()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
}


?>