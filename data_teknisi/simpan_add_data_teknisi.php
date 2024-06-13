<?php
// Include database connection
include_once __DIR__ . '/../config/config.php';

// Ambil data dari form
$nama_teknisi = isset($_POST["nama_teknisi"]) ? $_POST["nama_teknisi"] : '';
$alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : '';
$no_telepon = isset($_POST["no_telepon"]) ? $_POST["no_telepon"] : '';

// Validasi data
if ($nama_teknisi && $alamat && $no_telepon) {
    // Insert data ke tabel teknisi
    $sql = "INSERT INTO teknisi (nama_teknisi, alamat, no_telepon) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama_teknisi, $alamat, $no_telepon);
    
    if ($stmt->execute()) {
        // Jika data berhasil disimpan, arahkan pengguna ke halaman sukses
        header("Location: ../data_teknisi/teknisi.php");
 
        exit();
    }
}

// Tutup koneksi
$conn->close();
?>