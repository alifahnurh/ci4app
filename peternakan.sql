-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 15.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `damon`
--

CREATE TABLE `damon` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `suhu` varchar(8) NOT NULL,
  `kelembapan` varchar(8) NOT NULL,
  `amonia` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `damon`
--

INSERT INTO `damon` (`id`, `waktu`, `suhu`, `kelembapan`, `amonia`) VALUES
(1, '2021-06-15 06:07:21', '30', '12', '4'),
(2, '2021-06-16 07:08:38', '29', '9', '10'),
(3, '2021-06-16 07:08:38', '37.5', '6', '2'),
(4, '2021-06-16 07:10:12', '25', '2', '10'),
(5, '2021-06-16 07:10:12', '28', '11', '2'),
(6, '2021-06-16 08:03:54', '27', '8', '10'),
(7, '2021-06-16 13:15:48', '30', '12', '8'),
(8, '2021-06-16 13:42:01', '36.6', '10.5', '5.4'),
(9, '2021-06-17 04:36:36', '31', '5', '4'),
(10, '2021-06-17 04:36:36', '25', '17', '6'),
(17, '2021-06-17 14:13:46', '25', '2', '10'),
(18, '2021-06-18 02:18:13', '28', '12', '5.4'),
(19, '2021-06-18 02:18:13', '29', '5', '6'),
(20, '2021-06-18 02:59:29', '35', '5', '4.5'),
(21, '2021-06-18 03:21:32', '28', '9', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kambing`
--

CREATE TABLE `tbl_kambing` (
  `no` int(11) NOT NULL,
  `nama_kambing` varchar(100) NOT NULL,
  `jns_kelamin` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `panjang` varchar(8) NOT NULL,
  `tinggi` varchar(8) NOT NULL,
  `berat` varchar(8) NOT NULL,
  `lingkar_dada` varchar(8) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kambing`
--

INSERT INTO `tbl_kambing` (`no`, `nama_kambing`, `jns_kelamin`, `tgl_lahir`, `panjang`, `tinggi`, `berat`, `lingkar_dada`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Laki-Laki', '2021-06-15', '100', '100', '100', '60', '2021-06-15 01:18:40', '2021-06-15 01:20:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `no` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok_obat` varchar(8) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`no`, `nama_obat`, `stok_obat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Test', '1 Pack', '', '2021-06-15 01:21:10', '2021-06-15 01:21:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pakan`
--

CREATE TABLE `tbl_pakan` (
  `no` int(11) NOT NULL,
  `nama_pakan` varchar(100) NOT NULL,
  `stok` varchar(8) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pakan`
--

INSERT INTO `tbl_pakan` (`no`, `nama_pakan`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Test', '20Kg', '2021-06-15 01:20:48', '2021-06-15 01:20:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemerahan`
--

CREATE TABLE `tbl_pemerahan` (
  `no` int(11) NOT NULL,
  `nama_kambing` varchar(100) NOT NULL,
  `hsl_pemerahan` varchar(8) NOT NULL,
  `tgl_pemerahan` date NOT NULL,
  `wkt_pemerahan` time NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pemerahan`
--

INSERT INTO `tbl_pemerahan` (`no`, `nama_kambing`, `hsl_pemerahan`, `tgl_pemerahan`, `wkt_pemerahan`, `created_at`, `updated_at`) VALUES
(1, 'Test', '1 Liter', '2021-06-15', '13:21:00', '2021-06-15 01:21:48', '2021-06-15 01:21:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `no` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stok_produk` varchar(8) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`no`, `nama_produk`, `stok_produk`, `created_at`, `updated_at`) VALUES
(2, 'Susu', '500 mL', 2021, 2021);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `damon`
--
ALTER TABLE `damon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kambing`
--
ALTER TABLE `tbl_kambing`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_pakan`
--
ALTER TABLE `tbl_pakan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_pemerahan`
--
ALTER TABLE `tbl_pemerahan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `damon`
--
ALTER TABLE `damon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_kambing`
--
ALTER TABLE `tbl_kambing`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pakan`
--
ALTER TABLE `tbl_pakan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemerahan`
--
ALTER TABLE `tbl_pemerahan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
