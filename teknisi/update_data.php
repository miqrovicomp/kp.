<?php
include_once __DIR__ . '/../config/config.php';

// Ambil data dari form
$id_pengaduan_perbaikan = isset($_POST['id_pengaduan_perbaikan']) ? $_POST['id_pengaduan_perbaikan'] : '';
$tgl_pengaduan_perbaikan = isset($_POST['tgl_pengaduan_perbaikan']) ? $_POST['tgl_pengaduan_perbaikan'] : '';
$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
$tgl_pengerjaan = isset($_POST['tgl_pengerjaan']) ? $_POST['tgl_pengerjaan'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

 

// Prepare and execute the update statement
$sql = "UPDATE pengaduan_perbaikan_detail 
        SET keterangan = ?, jumlah = ?, tgl_pengerjaan = ?, status = ?
        WHERE id_pengaduan_perbaikan = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sissi", $keterangan, $jumlah, $tgl_pengerjaan, $status, $id_pengaduan_perbaikan);

if ($stmt->execute()) {
    header("Location: pengaduan_perbaikan.php?teknisi=teknisi");

 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

 
