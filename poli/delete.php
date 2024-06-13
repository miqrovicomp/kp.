<?php
session_start();
include_once __DIR__ . '/../config/config.php';

// Pastikan id_poli dikirim melalui GET request
if (isset($_GET['id_poli'])) {
    $id_poli = intval($_GET['id_poli']); // Konversi ke integer untuk keamanan

    // Persiapkan statement untuk menghindari SQL Injection
    if ($stmt = $conn->prepare("DELETE FROM poli WHERE id_poli = ?")) {
        // Bind parameter
        $stmt->bind_param("i", $id_poli);

        // Jalankan statement
        if ($stmt->execute()) {
            // Redirect ke halaman poli.php setelah berhasil menghapus data
            header('Location: poli.php?delete=delete');
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
