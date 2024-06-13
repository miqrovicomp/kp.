
<?php
$jumlah_barang = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_barang FROM barang");
$jumlah_barang_masuk = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_barang_masuk FROM barang_masuk");
$jumlah_barang_keluar = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_barang_keluar FROM barang_keluar");
$jumlah_pengaduan_perawatan = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_pengaduan_perawatan FROM pengaduan_perawatan");
$jumlah_pengaduan_perbaikan = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_pengaduan_perbaikan FROM pengaduan_perbaikan");
$teknisi = mysqli_query ($conn, "SELECT COUNT(*) AS total_teknisi FROM teknisi");
$poli = mysqli_query ($conn, "SELECT COUNT(*) AS jumlah_poli FROM poli");
$karyawan = mysqli_query ($conn, "SELECT COUNT(*) AS total_karyawan FROM karyawan");



$jumlah_barang = mysqli_fetch_array($jumlah_barang)[0];
$jumlah_barang_masuk = mysqli_fetch_array($jumlah_barang_masuk)[0];
$jumlah_barang_keluar = mysqli_fetch_array($jumlah_barang_keluar)[0];
$jumlah_pengaduan_perawatan = mysqli_fetch_array($jumlah_pengaduan_perawatan)[0];
$jumlah_pengaduan_perbaikan = mysqli_fetch_array($jumlah_pengaduan_perbaikan)[0];
$total_teknisi = mysqli_fetch_array($teknisi)[0];
$jumlah_poli = mysqli_fetch_array($poli)[0];
$total_karyawan = mysqli_fetch_array($karyawan)[0];

?>