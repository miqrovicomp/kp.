<?php
session_start();
include_once __DIR__ . '/../config/config.php';

 

// Ambil data pengguna yang sedang login dari sesi
$username = $_SESSION['username'];

// Ambil data karyawan berdasarkan username
$sql = "SELECT id_karyawan FROM karyawan WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $id_karyawan = $user['id_karyawan'];
} else {
    header("Location:  pengaduan_services.php?karyawan=karyawan");
    
    exit();
}

$stmt->close();

// Ambil data dari form
$tgl_pengaduan_perbaikan = isset($_POST["tgl_pengaduan_perbaikan"]) ? $_POST["tgl_pengaduan_perbaikan"] : '';
$id_barang = isset($_POST["id_barang"]) ? intval($_POST["id_barang"]) : 0;
$keterangan = isset($_POST["keterangan"]) ? $_POST["keterangan"] : '';
$jumlah = isset($_POST["jumlah"]) ? intval($_POST["jumlah"]) : 0;

// Validasi data
if ($tgl_pengaduan_perbaikan && $id_karyawan > 0 && $id_barang > 0 && $keterangan && $jumlah > 0) {
    // Insert data ke tabel pengaduan_perbaikan
    $sql_pengaduan_perbaikan = "INSERT INTO pengaduan_perbaikan (id_pengaduan_perbaikan, tgl_pengaduan_perbaikan, id_karyawan) VALUES (NULL, ?, ?)";
    $stmt_pengaduan_perbaikan = $conn->prepare($sql_pengaduan_perbaikan);
    $stmt_pengaduan_perbaikan->bind_param("si", $tgl_pengaduan_perbaikan, $id_karyawan);
    if ($stmt_pengaduan_perbaikan->execute()) {
        $id_pengaduan_perbaikan = $conn->insert_id; // Mendapatkan id_pengaduan_perbaikan yang baru saja dimasukkan

        // Insert data ke tabel pengaduan_perbaikan_detail
        $sql_pengaduan_perbaikan_detail = "INSERT INTO pengaduan_perbaikan_detail (id_pengaduan_perbaikan_detail, id_pengaduan_perbaikan, id_barang, keterangan, jumlah) VALUES (NULL, ?, ?, ?, ?)";
        $stmt_pengaduan_perbaikan_detail = $conn->prepare($sql_pengaduan_perbaikan_detail);
        $stmt_pengaduan_perbaikan_detail->bind_param("iisi", $id_pengaduan_perbaikan, $id_barang, $keterangan, $jumlah);

        if ($stmt_pengaduan_perbaikan_detail->execute()) {
          
            header("Location: status.php?Berhasil=Berhasil");
        }
        // Tutup statement pengaduan_perbaikan_detail
        $stmt_pengaduan_perbaikan_detail->close();
    } else {
        echo "Error: " . $stmt_pengaduan_perbaikan->error;
    }

    // Tutup statement pengaduan_perbaikan
    $stmt_pengaduan_perbaikan->close();
} else {
    echo "Data tidak valid. Pastikan semua data terisi dengan benar.";
}

// Tutup koneksi
$conn->close();
?>