<?php
session_start();
include_once __DIR__ . '/../config/config.php';

// Pastikan id_pengguna dikirim melalui GET request
if (isset($_GET['id_pengguna'])) {
    $id_pengguna = intval($_GET['id_pengguna']); // Konversi ke integer untuk keamanan

    // Persiapkan statement untuk menghindari SQL Injection
    if ($stmt = $conn->prepare("DELETE FROM pengguna WHERE id_pengguna = ?")) {
        // Bind parameter
        $stmt->bind_param("i", $id_pengguna);

        // Jalankan statement
        if ($stmt->execute()) {
            // Redirect ke halaman pengguna.php setelah berhasil menghapus data
            header('Location: cek_data.php?delete=delete');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Tutup koneksi
$conn->close();
?>
