<?php
session_start();
include_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validasi input tanggal
    if ($start_date && $end_date) {
        // Persiapkan statement SQL
        $sql = "SELECT * FROM pengaduan_perbaikan_detail WHERE tgl_pengerjaan BETWEEN ? AND ?";
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameter
            $stmt->bind_param("ss", $start_date, $end_date);

            // Jalankan statement
            if ($stmt->execute()) {
                // Ambil hasil pencarian
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    echo "<div class='container mt-4'><h2>Hasil Pencarian</h2><table class='table table-bordered'><thead><tr><th>ID</th><th>ID Pengaduan Perbaikan</th><th>ID Barang</th><th>Keterangan</th><th>Jumlah</th><th>Tanggal Pengerjaan</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['id_pengaduan_perbaikan_detail']}</td><td>{$row['id_pengaduan_perbaikan']}</td><td>{$row['id_barang']}</td><td>{$row['keterangan']}</td><td>{$row['jumlah']}</td><td>{$row['tgl_pengerjaan']}</td></tr>";
                    }
                    echo "</tbody></table></div>";
                } else {
                    echo "<div class='container mt-4'><p>Tidak ada data ditemukan.</p></div>";
                }
            } else {
                echo "Error: " . $stmt->error;
            }

            // Tutup statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Tanggal mulai dan tanggal akhir harus diisi.";
    }
}

// Tutup koneksi
$conn->close();
?>
