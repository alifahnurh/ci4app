-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 18.00
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
(42, '2021-07-16 02:24:53', '35', '2', '5.4'),
(43, '2021-07-16 02:24:53', '28', '11', '6'),
(44, '2021-07-16 13:29:30', '28', '8', '4.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `suhu` varchar(8) NOT NULL,
  `kelembapan` varchar(8) NOT NULL,
  `amonia` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Test', 'Test@gmail.com', '1234', '2'),
(2, 'buncis', 'buncis@gmail.com', '678', 'Admin'),
(3, 'kacang', 'kacang@gmail.com', '567', 'User'),
(4, 'Alifah', 'alifahnurh.anh.anh@gmail.com', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `damon`
--
ALTER TABLE `damon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `email`
--
ALTER TABLE `email`
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `damon`
--
ALTER TABLE `damon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
