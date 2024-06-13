<?php
include_once __DIR__ . '/../config/config.php';

$sql = "SELECT id_karyawan, nama, username FROM karyawan";
$result = $conn->query($sql);

$karyawan_list = array();
while ($row = $result->fetch_assoc()) {
    $karyawan_list[] = $row;
}

echo json_encode($karyawan_list);

$conn->close();
?>
