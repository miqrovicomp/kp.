-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 17.10
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
(64, 7, 'Asus All in one', 1),
(65, 9, 'Laptop Asus', 1),
(66, 2, 'Pc Asus X47020', 1),
(67, 6, 'Printer Epson L121', 1),
(68, 1, 'Asus All in one', 1),
(69, 9, 'Laptop Asus', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(30) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `tgl_keluar`) VALUES
(12, '2024-04-30'),
(13, '2024-05-07');

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

--
-- Dumping data untuk tabel `barang_keluar_detail`
--

INSERT INTO `barang_keluar_detail` (`id_barang_keluar_detail`, `id_barang_keluar`, `id_barang`, `jumlah`) VALUES
(1, 12, 68, 1),
(2, 13, 69, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(10) NOT NULL,
  `tgl_barang_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tgl_barang_masuk`) VALUES
(58, '2024-05-31'),
(59, '2024-05-25'),
(60, '2024-05-10'),
(61, '2024-05-14');

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

--
-- Dumping data untuk tabel `barang_masuk_detail`
--

INSERT INTO `barang_masuk_detail` (`id_barang_masuk_detail`, `id_barang_masuk`, `id_barang`, `jumlah`) VALUES
(10, 58, 64, 1),
(11, 59, 65, 1),
(12, 60, 66, 1),
(13, 61, 67, 1);

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
  `id_pengguna` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `jenis_kelamin`, `alamat`, `id_pengguna`, `username`, `password`) VALUES
(1, '111111', 'Eka retnosari', 'Perempuan', 'sampang', 1, 'admin', '1'),
(2, '2021520018', 'safi', 'Laki-laki', 'sampang', 2, 'teknisi', '1'),
(3, '2021520018', 'Tatik', 'Perempuan', 'sampang', 3, 'karyawan', '1'),
(4, '2021520018', 'sukron', 'Laki-laki', 'sampang', 4, 'karyawan', '1'),
(5, '2021520018', 'mbak gita', 'Perempuan', 'sampang', 5, 'gita', '1'),
(24, '2021520018', 'diana', 'Perempuan', 'sampang', 24, 'diana', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perawatan`
--

CREATE TABLE `pengaduan_perawatan` (
  `id_pengaduan_perawatan` int(10) NOT NULL,
  `tgl_pengaduan_perawatan` date NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan_perawatan`
--

INSERT INTO `pengaduan_perawatan` (`id_pengaduan_perawatan`, `tgl_pengaduan_perawatan`, `id_karyawan`) VALUES
(1, '2024-05-01', 2),
(2, '2024-05-01', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_perawatan_detail`
--

CREATE TABLE `pengaduan_perawatan_detail` (
  `id_pengaduan_perawatan_detail` int(10) NOT NULL,
  `id_pengaduan_perawatan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan_perawatan_detail`
--

INSERT INTO `pengaduan_perawatan_detail` (`id_pengaduan_perawatan_detail`, `id_pengaduan_perawatan`, `id_barang`, `keterangan`, `jumlah`) VALUES
(1, 1, 1, 'Lemut mas safi', 1),
(2, 2, 4, 'habis tinta ya', 1);

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
(1, '2024-05-09', 3),
(3, '2024-05-21', 4),
(4, '2024-05-24', 2);

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
(1, 1, 64, 'Mati mat', 2),
(3, 3, 64, 'Pc lemut', 1),
(4, 4, 64, 'lemot mas safi pc ', 1);

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
(1, 'karyawan', '$2y$10$okWMEPl.im2ClRwPdYGmEOfJvb4ecUCbzlNDzQltgYH8UVXSnpYz2', 'karyawan'),
(2, 'admin', '$2y$10$g0RG3DgjIrTZyglm5dxwb.CkADaZfRMAWqVf93.QHX7IPwqdPLzJ2', 'admin'),
(3, 'teknisi', '$2y$10$fvWBuJeau1j7H8DT3jXI6.HCtVQSHhP4KcM7nnVUQ8hSey9L1Q5W6', 'teknisi'),
(4, 'pinpinan', '$2y$10$pT6K822LnlewfQjdYObFfuAM7/p5.eaKKtBzgztiiX/8QKRd4wkO6', 'pinpinan'),
(5, 'gita', '$2y$10$pT6K822LnlewfQjdYObFfuAM7/p5.eaKKtBzgztiiX/8QKRd4wkO6', 'karyawan'),
(24, 'diana', '$2y$10$HBv2dqbDkQnAOModLWix4.31JxjQt9x.c2inkwc3r8nTCc1.uBvk2', 'karyawan');

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
  ADD PRIMARY KEY (`id_pengaduan_perawatan_detail`),
  ADD KEY `id_pengaduan_perawatan` (`id_pengaduan_perawatan`);

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
  MODIFY `id_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id_barang_keluar_detail` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id_barang_masuk_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perbaikan`
--
ALTER TABLE `pengaduan_perbaikan`
  MODIFY `id_pengaduan_perbaikan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_perbaikan_detail`
--
ALTER TABLE `pengaduan_perbaikan_detail`
  MODIFY `id_pengaduan_perbaikan_detail` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan_perawatan_detail`
--
ALTER TABLE `pengaduan_perawatan_detail`
  ADD CONSTRAINT `pengaduan_perawatan_detail_ibfk_1` FOREIGN KEY (`id_pengaduan_perawatan`) REFERENCES `pengaduan_perawatan` (`id_pengaduan_perawatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
