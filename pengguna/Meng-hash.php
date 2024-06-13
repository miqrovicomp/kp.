<?php
// Include database connection
include_once __DIR__ . '/../config/config.php';
 
session_start();

// Assuming the username and hak_akses are stored in session
$username = $_SESSION['username'];
$hak_akses = $_SESSION['hak_akses'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';

    // Validasi data
    if ($current_password && $new_password) {
        // Ambil password lama dan hak akses dari database
        $sql = "SELECT password, hak_akses FROM pengguna WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashed_password, $user_hak_akses);
        $stmt->fetch();

        // Periksa hak akses
        if ($hak_akses === 'admin' || $hak_akses === $user_hak_akses) {
            // Verifikasi password lama
            if (password_verify($current_password, $hashed_password)) {
                // Hash password baru
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update password baru ke database
                $update_sql = "UPDATE pengguna SET password = ? WHERE username = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $new_hashed_password, $username);

                if ($update_stmt->execute()) {
                    echo "Password berhasil diubah.";
                } else {
                    echo "Terjadi kesalahan saat mengubah password.";
                }

                // Tutup statement
                $update_stmt->close();
            } else {
                echo "Password lama tidak sesuai.";
            }
        } else {
            echo "Anda tidak memiliki hak akses untuk mengubah password ini.";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Data tidak valid. Pastikan semua data terisi dengan benar.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
