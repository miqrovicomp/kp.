<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../layout/top_admin.php';


// Ambil data dari form
$tgl_barang_masuk = isset($_POST["tgl_barang_masuk"]) ? $_POST["tgl_barang_masuk"] : '';
$nama_barang = isset($_POST["nama_barang"]) ? $_POST["nama_barang"] : '';
$jumlah_barang = isset($_POST["jumlah_barang"]) ? intval($_POST["jumlah_barang"]) : 0;
$id_poli = isset($_POST["id_poli"]) ? intval($_POST["id_poli"]) : 0;

// Validasi data
if ($tgl_barang_masuk && $nama_barang && $jumlah_barang > 0 && $id_poli > 0) {
    // Insert data ke tabel barang
    $sql_barang = "INSERT INTO barang (id_barang, id_poli, nama_barang, jumlah_barang) VALUES (NULL, ?, ?, ?)";
    $stmt_barang = $conn->prepare($sql_barang);
    $stmt_barang->bind_param("isi", $id_poli, $nama_barang, $jumlah_barang);
    if ($stmt_barang->execute()) {
        $id_barang = $conn->insert_id; // Mendapatkan id_barang yang baru saja dimasukkan

        // Insert data ke tabel barang_masuk
        $sql_barang_masuk = "INSERT INTO barang_masuk (id_barang_masuk, tgl_barang_masuk) VALUES (NULL, ?)";
        $stmt_barang_masuk = $conn->prepare($sql_barang_masuk);
        $stmt_barang_masuk->bind_param("s", $tgl_barang_masuk);
        if ($stmt_barang_masuk->execute()) {
            $id_barang_masuk = $conn->insert_id; // Mendapatkan id_barang_masuk yang baru saja dimasukkan

            // Insert data ke tabel barang_masuk_detail
            $sql_barang_masuk_detail = "INSERT INTO barang_masuk_detail (id_barang_masuk_detail, id_barang_masuk, id_barang, jumlah) VALUES (NULL, ?, ?, ?)";
            $stmt_barang_masuk_detail = $conn->prepare($sql_barang_masuk_detail);
            $stmt_barang_masuk_detail->bind_param("iii", $id_barang_masuk, $id_barang, $jumlah_barang);

            if ($stmt_barang_masuk_detail->execute()) {
                echo "Data berhasil disimpan ke semua tabel.";
            } else {
                echo "Error: " . $stmt_barang_masuk_detail->error;
            }

            // Tutup statement barang_masuk_detail
            $stmt_barang_masuk_detail->close();
        } else {
            echo "Error: " . $stmt_barang_masuk->error;
        }

        // Tutup statement barang_masuk
        $stmt_barang_masuk->close();
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