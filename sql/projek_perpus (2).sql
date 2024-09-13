-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2023 pada 05.33
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
-- Database: `projek_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `Username` varchar(250) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Role` enum('Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_admin`, `Username`, `PASSWORD`, `Nama`, `Role`) VALUES
(6601, 'Eka', 'eka12345', 'Eka set', 'Admin'),
(6602, 'Jurta', 'jurta12345', 'Juli Budiarta', 'Admin'),
(6603, 'Endra', 'endra12345', 'Endra', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `penulis` varchar(250) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `jenis`, `tahun`, `penulis`, `stok`, `gambar`) VALUES
(2100, 'Cerita Rakyat', 'cerita', '1221-02-21', 'Oppa', 121, '../coverbuku/download (11).jpeg'),
(2101, 'Rumah Burung', 'cerita', '2112-02-21', 'Oppa', 1213, '../coverbuku/download (12).jpeg'),
(2102, 'Sang Pembelajar', 'cerita', '1212-12-12', 'Oppa', 121, '../coverbuku/download (14).jpeg'),
(2103, 'Setenang', 'cerita', '1211-02-21', 'Oppa', 121, '../coverbuku/download (13).jpeg'),
(2200, 'PHP', 'pelajaran', '1111-11-11', 'Tuk dalang', 30, '../coverbuku/download (8).jpeg'),
(2201, 'Python', 'pelajaran', '2122-02-21', 'Tuk dalang', 21, '../coverbuku/download (10).jpeg'),
(2202, 'JavaScript', 'pelajaran', '1212-02-12', 'Tuk dalang', 31, '../coverbuku/download (9).jpeg'),
(2203, 'Math Dictionary', 'pelajaran', '1221-02-21', 'Tuk dalang', 31, '../coverbuku/download.png'),
(2300, 'Kamus Bahasa Korea', 'kamus', '2010-02-22', 'uncle kim', 50, '../coverbuku/download (6).jpeg'),
(2301, 'Kamus Bahasa Inggris', 'kamus', '2010-02-22', 'Uncle Sam', 30, '../coverbuku/download (4).jpeg'),
(2302, 'Kamus Bahasa Jepang', 'kamus', '2010-02-22', 'ojisan jester', 30, '../coverbuku/download (5).jpeg'),
(2303, 'Kamus Bahasa Russia', 'kamus', '2010-02-22', 'uncle jordan', 30, '../coverbuku/download (7).jpeg'),
(2400, 'Bumi', 'novel', '1221-12-12', 'Uncle Mutu', 132, '../coverbuku/download.jpeg'),
(2401, 'Bulan', 'novel', '2121-02-21', 'Uncle Mutu', 212, '../coverbuku/download (1).jpeg'),
(2402, 'Matahari', 'novel', '1221-12-12', 'Uncle Mutu', 123, '../coverbuku/download (2).jpeg'),
(2403, 'Bintang', 'novel', '1211-12-12', 'Uncle Mutu', 12, '../coverbuku/download (3).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `status_up` varchar(255) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `Username` varchar(250) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Jk` enum('L','P') DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Role` enum('User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
