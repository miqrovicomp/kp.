<?php
// Include database connection
include_once __DIR__ . '/../config/config.php';
 

// Ambil data dari form
$id_perbaikan_detail = isset($_POST["id_perbaikan_detail"]) ? intval($_POST["id_perbaikan_detail"]) : 0;
$id_pengaduan_perbaikan_detail = isset($_POST["id_pengaduan_perbaikan_detail"]) ? intval($_POST["id_pengaduan_perbaikan_detail"]) : 0;
$tgl_proses = isset($_POST["tgl_proses"]) ? $_POST["tgl_proses"] : '';
$tgl_selesai = isset($_POST["tgl_selesai"]) ? $_POST["tgl_selesai"] : '';
$id_teknisi = isset($_POST["id_teknisi"]) ? intval($_POST["id_teknisi"]) : 0;
$analisa = isset($_POST["analisa"]) ? $_POST["analisa"] : '';
$id_rincian_biaya = isset($_POST["id_rincian_biaya"]) ? intval($_POST["id_rincian_biaya"]) : 0;
$total_biaya = isset($_POST["total_biaya"]) ? intval($_POST["total_biaya"]) : 0;
$status = isset($_POST["status"]) ? $_POST["status"] : '';

// Validasi data
if ($id_perbaikan_detail > 0 && $id_pengaduan_perbaikan_detail > 0 && $tgl_proses && $tgl_selesai && $id_teknisi > 0 && $analisa && $id_rincian_biaya > 0 && $total_biaya > 0 && $status) {
    // Insert data ke tabel perbaikan_detail
    $sql = "INSERT INTO perbaikan_detail (id_perbaikan_detail, id_pengaduan_perbaikan_detail, tgl_proses, tgl_selesai, id_teknisi, analisa, id_rincian_biaya, total_biaya, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssiiis", $id_perbaikan_detail, $id_pengaduan_perbaikan_detail, $tgl_proses, $tgl_selesai, $id_teknisi, $analisa, $id_rincian_biaya, $total_biaya, $status);
    
    if ($stmt->execute()) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Data tidak valid. Pastikan semua data terisi dengan benar.";
}

// Tutup koneksi
$conn->close();
?>
