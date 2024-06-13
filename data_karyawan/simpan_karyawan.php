<?php
session_start();
include_once __DIR__ . '/../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $id_pengguna = $_POST['id_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashing password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $sql = "INSERT INTO karyawan (nik, nama, jenis_kelamin, alamat, id_pengguna, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssssiss", $nik, $nama, $jenis_kelamin, $alamat, $id_pengguna, $username, $hashed_password);

    if ($stmt->execute()) {
        header('Location: karyawan.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
