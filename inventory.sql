-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2022 pada 09.44
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `contents` text NOT NULL,
  `admin` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`id`, `contents`, `admin`, `status`) VALUES
(32, 'Berikut adalah tampilan portofolio saya', 'Wahyunurdian', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_keluar`
--

CREATE TABLE `sbrg_keluar` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `diserahkan` varchar(25) NOT NULL,
  `mengetahui` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbrg_keluar`
--

INSERT INTO `sbrg_keluar` (`id`, `idx`, `tgl`, `jumlah`, `penerima`, `keterangan`, `diserahkan`, `mengetahui`) VALUES
(52, 270, '2022-11-25', 1, 'LPKN Banda Aceh', 'Har Xray22', 'Putri', 'Daniel'),
(51, 268, '2022-11-21', 2, 'Lapas Narkotika Nusa Kambangan', 'Har Xray22', 'Putri', 'Daniel'),
(50, 274, '2022-11-22', 1, 'Rafid', 'Upgrade Ram Laptop Lemod', 'Liela', 'Antoni'),
(49, 276, '2022-11-25', 1, 'Wahyu', 'Penggantian Baru', 'Liela', 'Antoni'),
(48, 277, '2022-12-23', 5, 'Siber Bareskrim', 'Harcy22', 'Putri', 'Helmi'),
(53, 270, '2022-11-14', 1, 'Lapas Bontang', 'Har Xray22', 'Putri', 'Daniel'),
(54, 280, '2022-12-23', 20, 'KN Makassar', 'BDR22', 'Putri', 'Cerian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_masuk`
--

CREATE TABLE `sbrg_masuk` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `pemeriksa` varchar(50) NOT NULL,
  `mengetehui` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbrg_masuk`
--

INSERT INTO `sbrg_masuk` (`id`, `idx`, `tgl`, `jumlah`, `keterangan`, `pengirim`, `pemeriksa`, `mengetehui`) VALUES
(56, 274, '2022-11-27', 500, 'Samsung', 'Wahyu', 'Liela', ''),
(55, 279, '2022-11-26', 2, 'Bekas Staff IT ', 'Wahyu', 'Liela', ''),
(54, 276, '2022-11-25', 22, 'Untuk Stock Kantor', 'Dell', 'Liela', ''),
(53, 280, '2022-11-01', 50, 'BDR', 'Panduit', 'Putri', ''),
(51, 281, '2022-11-27', 20, 'Bekas Staff Finance ', 'Wahyu', 'Liela', ''),
(52, 282, '2022-11-27', 20, 'Project 2023', 'Kirisun', 'Liela', ''),
(50, 277, '2022-12-23', 500, 'Harcy22', 'Xiaomi', 'Liela', ''),
(57, 270, '2022-11-30', 59, 'OBVIT', 'Voti', 'Agus', ''),
(58, 275, '2022-12-21', 50, 'Untuk Stock Kantor', 'Samsung', 'Liela', ''),
(59, 268, '2022-11-26', 20, 'HARWAT', 'Voti', 'Putri', ''),
(60, 278, '2022-11-22', 500, 'Polri', 'Ukraina', 'Siska', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slogin`
--

CREATE TABLE `slogin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slogin`
--

INSERT INTO `slogin` (`id`, `username`, `password`, `role`, `nickname`) VALUES
(34, 'Superadmin', 'U3VwZXJhZG1pbg==', 'Manager', 'SUPER ADMIN'),
(35, 'Cerian', 'Q2VyaWFu', 'Manager', 'Cerian Yuwono'),
(36, 'Liela', 'TGllbGE=', 'Admin', 'Liela'),
(37, 'Wahyunurdian', 'V2FoeXVudXJkaWFu', 'Manager', 'Wahyunurdian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sstock_brg`
--

CREATE TABLE `sstock_brg` (
  `idx` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `stock` int(12) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `lokasi` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sstock_brg`
--

INSERT INTO `sstock_brg` (`idx`, `nama`, `jenis`, `merk`, `stock`, `satuan`, `lokasi`) VALUES
(267, 'SSD 128 GB', 'Non Project', 'Samsung', 144, 'Unit', 'Gudang S2'),
(268, 'Source Xray', 'Project', 'Voti', 151, 'Unit', 'Gudang Wijaya'),
(274, 'RAM 8 GB', 'Non Project', 'Samsung', 499, 'Unit', 'Gudang S2'),
(270, 'Xray', 'Project', 'Voti', 58, 'Unit', 'Gudang Wijaya'),
(275, 'SSD 256 GB', 'Non Project', 'Samsung', 50, 'Unit', 'Gudang S2'),
(276, 'Laptop ', 'Non Project', 'Dell', 41, 'Unit', 'Gudang S2'),
(277, 'CCTV', 'Project', 'Xiaomi Mi Home ', 505, 'Unit', 'Gudang Wijaya'),
(278, 'Senjata Api CZ', 'Project', 'CZ', 1000, 'Unit', 'Gudang Wijaya'),
(279, 'Monitor', 'Non Project', 'Dell', 102, 'Unit', 'Gudang S2'),
(280, 'Kabel UTP', 'Project', 'Panduit', 60, 'Meter', 'Gudang Wijaya'),
(281, 'CPU', 'Non Project', 'Asus', 40, 'Unit', 'Gudang S2'),
(282, 'HT', 'Project', 'Kirisun', 520, 'Unit', 'Gudang S2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slogin`
--
ALTER TABLE `slogin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `slogin`
--
ALTER TABLE `slogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
