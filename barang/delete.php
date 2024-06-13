 

<?php
session_start();
include_once __DIR__ . '/../config/config.php';
 
$id_barang = $_GET['id_barang'];
$result = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id_barang'");
if ($result) {
    header('Location: ../barang/barang.php');
}
 
 
?>