<?php
include_once __DIR__ . '/../config/config.php';

$id_pengaduan_perbaikan = $_GET['id_pengaduan_perbaikan'];

$sql = "SELECT pp.id_pengaduan_perbaikan, 
        pp.tgl_pengaduan_perbaikan, 
        k.nama AS nama_karyawan, 
        b.nama_barang, 
        ppd.keterangan, 
        ppd.jumlah, 
        ppd.tgl_pengerjaan, 
        ppd.status 
        FROM pengaduan_perbaikan pp 
        INNER JOIN karyawan k ON pp.id_karyawan = k.id_karyawan 
        INNER JOIN pengaduan_perbaikan_detail ppd ON pp.id_pengaduan_perbaikan = ppd.id_pengaduan_perbaikan 
        INNER JOIN barang b ON ppd.id_barang = b.id_barang 
        WHERE pp.id_pengaduan_perbaikan = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pengaduan_perbaikan);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>
