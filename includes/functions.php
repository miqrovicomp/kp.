<?php
session_start();
include_once __DIR__ . '/../config/config.php';

function login($username, $password) {
    global $conn;
    $sql = "SELECT * FROM pengguna WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result === false) {
        die("Execute failed: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['hak_akses'] = $user['hak_akses'];
            return true;
        }
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['id_pengguna']);
}

function get_user_hak_akses() {
    return $_SESSION['hak_akses'] ?? null;
}

function logout() {
    session_destroy();
}
?>
