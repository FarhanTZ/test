<?php
// Mengambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'cakrawala'; // Ganti dengan nama database Anda
$user = 'username_database'; // Ganti dengan username database Anda
$pass = 'password_database'; // Ganti dengan password database Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Memeriksa hasil query
    if ($stmt->rowCount() > 0) {
        // Login berhasil
        echo "Login berhasil!";
    } else {
        // Login gagal
        echo "Username atau password salah";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi database
$conn = null;
?>
