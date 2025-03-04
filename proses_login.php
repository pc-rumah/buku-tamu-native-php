<?php
session_start();
include 'koneksi.php'; // Sertakan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari admin berdasarkan username
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = true; // Set session admin
            echo "berhasil";
        } else {
            echo "gagal"; // Password salah
        }
    } else {
        echo "gagal"; // Username tidak ditemukan
    }

    $stmt->close();
    $koneksi->close();
}
