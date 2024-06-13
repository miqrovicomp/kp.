-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 13.07
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(30) NOT NULL,
  `id_poli` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_poli`, `nama_barang`, `jumlah_barang`) VALUES
(1, 1, 'Pc All in one', 2),
(2, 2, 'Asus  x433x', 2),
(3, 3, 'Lenovo All in one', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(30) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar_detail`
--

CREATE TABLE `barang_keluar_detail` (
  `id_barang_keluar_detail` int(30) NOT NULL,
  `id_barang_keluar` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(10) NOT NULL,
  `tgl_barang_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_detail`
--

CREATE TABLE `barang_masuk_detail` (
  `id_barang_masuk_detail` int(10) NOT NULL,
  `id_barang_masuk` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(30) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_poli` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `jenis_kelamin`, `alamat`, `id_poli`, `username`, `password`) VALUES
(2, '2', 'safi', 'Laki-laki', 'Sampang', 2, '', ''),
(3, '2021520018', 'Dr. Intan Retnosari', 'Laki-laki', 'Sumenep', 7, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perawatan`
--

CREATE TABLE `pengaduan_perawatan` (
  `id_pengaduan_perawatan` int(10) NOT NULL,
  `tgl_pengaduan perawatan` date NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perawatan_detail`
--

CREATE TABLE `pengaduan_perawatan_detail` (
  `id_pengaduan_perawatan_detail` int(10) NOT NULL,
  `id_pengaduan_perawatan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jummlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perbaikan`
--

CREATE TABLE `pengaduan_perbaikan` (
  `id_pengaduan_perbaikan` int(30) NOT NULL,
  `tgl_pengaduan_perbaikan` date NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan_perbaikan`
--

INSERT INTO `pengaduan_perbaikan` (`id_pengaduan_perbaikan`, `tgl_pengaduan_perbaikan`, `id_karyawan`) VALUES
(1, '2024-05-09', 1),
(2, '2024-05-02', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perbaikan_detail`
--

CREATE TABLE `pengaduan_perbaikan_detail` (
  `id_pengaduan_perbaikan_detail` int(30) NOT NULL,
  `id_pengaduan_perbaikan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan_perbaikan_detail`
--

INSERT INTO `pengaduan_perbaikan_detail` (`id_pengaduan_perbaikan_detail`, `id_pengaduan_perbaikan`, `id_barang`, `keterangan`, `jumlah`) VALUES
(1, 1, 1, 'Mati mat', 2),
(2, 2, 2, 'Hardisk Tidak ditek', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` enum('admin','karyawan','teknisi','pinpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `hak_akses`) VALUES
(2, 'karyawan', '$2y$10$okWMEPl.im2ClRwPdYGmEOfJvb4ecUCbzlNDzQltgYH8UVXSnpYz2', 'karyawan'),
(3, 'admin', '$2y$10$g0RG3DgjIrTZyglm5dxwb.CkADaZfRMAWqVf93.QHX7IPwqdPLzJ2', 'admin'),
(4, 'teknisi', '$2y$10$fvWBuJeau1j7H8DT3jXI6.HCtVQSHhP4KcM7nnVUQ8hSey9L1Q5W6', 'teknisi'),
(8, 'pinpinan', '$2y$10$pT6K822LnlewfQjdYObFfuAM7/p5.eaKKtBzgztiiX/8QKRd4wkO6', 'pinpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan_detail`
--

CREATE TABLE `perawatan_detail` (
  `id_perawatan_detail` int(30) NOT NULL,
  `id_pengaduan_perawatan_detail` int(10) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_teknisi` int(10) NOT NULL,
  `id_rincian_biaya` int(10) NOT NULL,
  `total_biaya` int(10) NOT NULL,
  `status` enum('Selesai','Pending','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_detail`
--

CREATE TABLE `perbaikan_detail` (
  `id_perbaikan_detail` int(30) NOT NULL,
  `id_pengaduan_perbaikan_detail` int(10) NOT NULL,
  `tgl_proses` date NOT NULL,
  `id_teknisi` int(10) NOT NULL,
  `analisa` text NOT NULL,
  `id_rincian_biaya` int(100) NOT NULL,
  `total_biaya` int(10) NOT NULL,
  `status` enum('Selesai','Pending','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'poli umum'),
(2, 'KIA'),
(3, 'P2m'),
(4, 'UGD'),
(5, 'Farmasi'),
(6, 'Rm'),
(7, 'TU'),
(8, 'Imunisasi'),
(9, 'Laborat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_biaya`
--

CREATE TABLE `rincian_biaya` (
  `id_rincian_biaya` int(30) NOT NULL,
  `jenis_tindakan` enum('Selesai','Cancel','','') NOT NULL,
  `keterangan` text NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(30) NOT NULL,
  `nama_teknisi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`, `alamat`, `no_telepon`) VALUES
(1, 'safiuddin', 'Jl. Raya Camplong', '0878044450051'),
(2, 'Feri Setiyono', 'Sampang', '08690600200');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  ADD PRIMARY KEY (`id_barang_keluar_detail`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD PRIMARY KEY (`id_barang_masuk_detail`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pengaduan_perawatan`
--
ALTER TABLE `pengaduan_perawatan`
  ADD PRIMARY KEY (`id_pengaduan_perawatan`);

--
-- Indeks untuk tabel `pengaduan_perawatan_detail`
--
ALTER TABLE `pengaduan_perawatan_detail`
  ADD PRIMARY KEY (`id_pengaduan_perawatan_detail`);

--
-- Indeks untuk tabel `pengaduan_perbaikan`
--
ALTER TABLE `pengaduan_perbaikan`
  ADD PRIMARY KEY (`id_pengaduan_perbaikan`);

--
-- Indeks untuk tabel `pengaduan_perbaikan_detail`
--
ALTER TABLE `pengaduan_perbaikan_detail`
  ADD PRIMARY KEY (`id_pengaduan_perbaikan_detail`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `perawatan_detail`
--
ALTER TABLE `perawatan_detail`
  ADD PRIMARY KEY (`id_perawatan_detail`);

--
-- Indeks untuk tabel `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  ADD PRIMARY KEY (`id_perbaikan_detail`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `rincian_biaya`
--
ALTER TABLE `rincian_biaya`
  ADD PRIMARY KEY (`id_rincian_biaya`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id_barang_keluar_detail` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id_barang_masuk_detail` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perawatan`
--
ALTER TABLE `pengaduan_perawatan`
  MODIFY `id_pengaduan_perawatan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perawatan_detail`
--
ALTER TABLE `pengaduan_perawatan_detail`
  MODIFY `id_pengaduan_perawatan_detail` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perbaikan`
--
ALTER TABLE `pengaduan_perbaikan`
  MODIFY `id_pengaduan_perbaikan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perbaikan_detail`
--
ALTER TABLE `pengaduan_perbaikan_detail`
  MODIFY `id_pengaduan_perbaikan_detail` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `perawatan_detail`
--
ALTER TABLE `perawatan_detail`
  MODIFY `id_perawatan_detail` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  MODIFY `id_perbaikan_detail` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rincian_biaya`
--
ALTER TABLE `rincian_biaya`
  MODIFY `id_rincian_biaya` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
