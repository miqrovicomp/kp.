<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';

        // Ambil data dari form
        $tgl_keluar = isset($_POST["tgl_keluar"]) ? $_POST["tgl_keluar"] : '';
        $id_poli = isset($_POST["id_poli"]) ? intval($_POST["id_poli"]) : 0;
        $nama_barang = isset($_POST["nama_barang"]) ? $_POST["nama_barang"] : '';
        $jumlah_barang = isset($_POST["jumlah_barang"]) ? intval($_POST["jumlah_barang"]) : 0;

        // Validasi data
        if ($tgl_keluar && $id_poli > 0 && $nama_barang && $jumlah_barang > 0) {
            // Insert data ke tabel barang
            $sql_barang = "INSERT INTO barang (id_barang, id_poli, nama_barang, jumlah_barang) VALUES (NULL, ?, ?, ?)";
            $stmt_barang = $conn->prepare($sql_barang);
            $stmt_barang->bind_param("isi", $id_poli, $nama_barang, $jumlah_barang);
            if ($stmt_barang->execute()) {
                $id_barang = $conn->insert_id; // Mendapatkan id_barang yang baru saja dimasukkan

            // Insert data ke tabel barang_keluar
            $sql_barang_keluar = "INSERT INTO barang_keluar (id_barang_keluar, tgl_keluar) VALUES (NULL, ?)";
            $stmt_barang_keluar = $conn->prepare($sql_barang_keluar);
            $stmt_barang_keluar->bind_param("s", $tgl_keluar);
            if ($stmt_barang_keluar->execute()) {
                $id_barang_keluar = $conn->insert_id; // Mendapatkan id_barang_keluar yang baru saja dimasukkan

            // Insert data ke tabel barang_keluar_detail
            $sql_barang_keluar_detail = "INSERT INTO barang_keluar_detail (id_barang_keluar_detail, id_barang_keluar, id_barang, jumlah) VALUES (NULL, ?, ?, ?)";
            $stmt_barang_keluar_detail = $conn->prepare($sql_barang_keluar_detail);
            $stmt_barang_keluar_detail->bind_param("iii", $id_barang_keluar, $id_barang, $jumlah_barang);

            if ($stmt_barang_keluar_detail->execute()) {
                echo "Data berhasil disimpan ke semua tabel.";
            } else {
                echo "Error: " . $stmt_barang_keluar_detail->error;
            }

            // Tutup statement barang_keluar_detail
            $stmt_barang_keluar_detail->close();
        } else {
            echo "Error: " . $stmt_barang_keluar->error;
        }

        // Tutup statement barang_keluar
        $stmt_barang_keluar->close();
    } else {
        echo "Error: " . $stmt_barang->error;
    }

    // Tutup statement barang
    $stmt_barang->close();
} else {
    echo "Data tidak valid. Pastikan semua data terisi dengan benar.";
}

// Tutup koneksi
$conn->close();
?>