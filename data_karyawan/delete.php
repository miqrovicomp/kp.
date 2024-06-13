<?php
session_start();
include_once __DIR__ . '/../config/config.php';

// Periksa apakah parameter id_karyawan ada di URL
if (isset($_GET['id_karyawan'])) {
    $id_karyawan = intval($_GET['id_karyawan']);

    // Siapkan pernyataan SQL untuk menghapus data
    $sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameter
    $stmt->bind_param("i", $id_karyawan);

    // Eksekusi pernyataan
    if ($stmt->execute()) {
        header('Location: karyawan.php?delete=delete');

    }
    // Tutup statement
    $stmt->close();
} else {
    echo "ID Karyawan tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
