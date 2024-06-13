 

<?php
session_start();
include_once __DIR__ . '/../config/config.php';
 
if (isset($_GET['id_pengaduan_perawatan']) && isset($_GET['tgl_pengaduan_perawatan']))
$result = mysqli_query($conn, "DELETE d
FROM 
    `pengaduan_perawatan_detail` d
JOIN 
    `pengaduan_perawatan` p ON p.`id_pengaduan_perawatan` = d.`id_pengaduan_perawatan`
JOIN
    `karyawan` k ON p.`id_karyawan` = k.`id_karyawan`
WHERE
    p.`id_karyawan` = 101;
");
 
 
 
 
?>