<?php
include_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $hak_akses = $_POST['hak_akses'];

    $sql = "INSERT INTO pengguna (username, password, hak_akses) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $hak_akses);
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<form method="POST">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    Role:
    <select name="hak_akses" required>
        <option value="admin">Admin</option>
        <option value="pinpinan">Pinpinan</option>
        <option value="karyawan">Karyawan</option>
        <option value="teknisi">Teknisi</option>
    </select>
    <button type="submit">Register</button>
</form>
