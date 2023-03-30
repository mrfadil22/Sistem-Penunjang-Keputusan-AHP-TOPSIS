-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2023 pada 09.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsispk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password_admin`) VALUES
('Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(30) NOT NULL,
  `kriteria1` varchar(30) NOT NULL,
  `kriteria2` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(1, '1', '2', 0),
(2, '1', '3', 0),
(3, '1', '4', 2),
(4, '2', '3', 3),
(5, '2', '4', 6),
(6, '3', '4', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(30) NOT NULL,
  `nilai` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(1, 0),
(2, 1),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` int(30) NOT NULL,
  `nama_alternatif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Ana'),
(2, 'Unu'),
(3, 'Ene'),
(4, 'Ono'),
(5, 'Anu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Umur', 0.070743),
(2, 'Pekerjaan', 0),
(3, 'Jumlah Tanggungan', 0),
(4, 'Jenis Penerangan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_poin`
--

CREATE TABLE `tab_poin` (
  `id_poin` int(30) NOT NULL,
  `poin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tab_poin`
--

INSERT INTO `tab_poin` (`id_poin`, `poin`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_rangking`
--

CREATE TABLE `tab_rangking` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(30) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tab_rangking`
--

INSERT INTO `tab_rangking` (`id_alternatif`, `nama_alternatif`, `nilai`) VALUES
(1, 'Ana', 0.98806),
(2, 'Unu', 0.983198),
(3, 'Ene', 0.0224284),
(4, 'Ono', 0.508652),
(5, 'Anu', 0.398454);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 5),
(1, 2, 4),
(1, 3, 2),
(1, 4, 3),
(2, 1, 5),
(2, 2, 4),
(2, 3, 5),
(2, 4, 1),
(3, 1, 2),
(3, 2, 5),
(3, 3, 3),
(3, 4, 3),
(4, 1, 5),
(4, 2, 5),
(4, 3, 3),
(4, 4, 3),
(5, 1, 4),
(5, 2, 2),
(5, 3, 1),
(5, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indeks untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tab_poin`
--
ALTER TABLE `tab_poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indeks untuk tabel `tab_rangking`
--
ALTER TABLE `tab_rangking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  MODIFY `id_kriteria` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  MODIFY `id_alternatif` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tab_poin`
--
ALTER TABLE `tab_poin`
  MODIFY `id_poin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tab_rangking`
--
ALTER TABLE `tab_rangking`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
