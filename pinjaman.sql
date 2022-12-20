-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Des 2022 pada 11.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fintech`
--

CREATE TABLE `fintech` (
  `id_fintech` int(11) NOT NULL,
  `nama_fintech` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fintech`
--

INSERT INTO `fintech` (`id_fintech`, `nama_fintech`) VALUES
(2, 'FIntech A'),
(3, 'FIntech B'),
(4, 'Fintech C'),
(5, 'Fintech D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `nomor_nasabah` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `pinjaman_pokok` bigint(20) NOT NULL,
  `bunga` decimal(10,0) NOT NULL,
  `fintech` int(10) NOT NULL,
  `tanggal_cair` date NOT NULL,
  `jangka_waktu` int(10) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`nomor_nasabah`, `nama`, `alamat`, `pinjaman_pokok`, `bunga`, `fintech`, `tanggal_cair`, `jangka_waktu`, `timestamp`) VALUES
('ASLKJAS', 'SSIFULAN', 'Indonesia', 15000000, '3', 2, '2022-12-08', 2, '2022-12-12'),
('B1263', 'Tomo', 'Indonesia', 15000000, '5', 3, '2022-12-08', 2, '2022-12-12'),
('hgjhggj', 'hhfghfjhgjg', 'jhgjhgjhg', 17000000, '3', 3, '2022-12-13', 5, '2022-12-16'),
('jdoas', 'oasdalskj', 'lkajsda', 1000000, '5', 4, '2022-11-16', 5, '2022-12-16'),
('kahsdlkahsd', 'lakhsdasjh', 'kahsdklajshdal', 10000000, '5', 2, '2022-12-08', 5, '2022-12-16'),
('kjhkjhkj', 'jhgglj', 'khkjlkj', 14000000, '5', 3, '2022-12-15', 2, '2022-12-16'),
('KJHSD', 'AKDKALK', 'LKJADAS', 11000000, '3', 5, '2022-12-01', 5, '2022-12-16'),
('KLJDAKL', 'SKDJFS', 'IUWOIU', 1200000, '5', 4, '2022-12-03', 2, '2022-12-16'),
('laksd;ak', 'apodas', 'poaidas', 2000000, '4', 5, '2022-12-16', 5, '2022-12-16'),
('LKAJSD', 'HARTO', 'Indonesia', 2000000, '5', 4, '2022-12-07', 6, '2022-12-12'),
('sdjkasd', 'ksjdalsd', 'lksda;lskd', 5000000, '4', 2, '2022-11-15', 5, '2022-12-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fintech`
--
ALTER TABLE `fintech`
  ADD PRIMARY KEY (`id_fintech`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD UNIQUE KEY `nohp` (`nomor_nasabah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fintech`
--
ALTER TABLE `fintech`
  MODIFY `id_fintech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
