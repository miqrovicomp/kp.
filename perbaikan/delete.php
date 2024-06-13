 

<?php
session_start();
include_once __DIR__ . '/../config/config.php';
 
$id_pengaduan_perbaikan = $_GET['id_pengaduan_perbaikan'];
$sql_delete_detail = "DELETE FROM pengaduan_perbaikan_detail WHERE id_pengaduan_perbaikan = $id_pengaduan_perbaikan";
    if ($conn->query($sql_delete_detail) === TRUE) {
        $sql_delete_main = "DELETE FROM pengaduan_perbaikan WHERE id_pengaduan_perbaikan = $id_pengaduan_perbaikan";
        if ($conn->query($sql_delete_main) === TRUE) {
            header('Location: ../perbaikan/pengaduan_perbaikan.php?delete=delete');
        }
}
 
?>