<?php
// Include database connection
include_once __DIR__ . '/../config/config.php';

// Ambil data dari form
$nama_poli = isset($_POST["nama_poli"]) ? $_POST["nama_poli"] : '';

// Validasi data
if ($nama_poli) {
    // Insert data ke tabel poli
    $sql = "INSERT INTO poli (nama_poli) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_poli);
    
    if ($stmt->execute()) {
        // Jika data berhasil disimpan, arahkan pengguna ke halaman sukses
        header("Location: ../poli/poli.php");
      
        exit();
    }
}

// Tutup koneksi
$conn->close();
?>
