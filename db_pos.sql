-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2024 pada 19.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datapegawai`
--

CREATE TABLE `tb_datapegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_datapegawai`
--

INSERT INTO `tb_datapegawai` (`id_pegawai`, `nama`, `email`, `nope`, `img`) VALUES
(1, 'PATRIK', 'Your Email', 'cellular phone', 'null.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerja`
--

CREATE TABLE `tb_pekerja` (
  `id_pegawai` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` text DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pekerja`
--

INSERT INTO `tb_pekerja` (`id_pegawai`, `username`, `password`, `session`) VALUES
(1, 'Admin', '$2y$10$lLCJ/FpPjhTHxN1MF8maw.VjfcA50hLi36KOWnlyBaaaQnqpsghJq', '68e3ff2b93e2ebbe58b54606e549d6a65ecaf2fbeee692d33311e7de8feba09d18a85d6a0fc5aec991351910f3e76a429e77b82ef743c7cd4e614201217d37e50514f67ebafb656b990ead851a3b9c7f62a17d6471686bbf7db985f3a38d65a4fa77dbc8be85810800456b1857dbf9e7c84f26e599c28368fb04638e73699c');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_datapegawai`
--
ALTER TABLE `tb_datapegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_pekerja`
--
ALTER TABLE `tb_pekerja`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_datapegawai`
--
ALTER TABLE `tb_datapegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pekerja`
--
ALTER TABLE `tb_pekerja`
  ADD CONSTRAINT `tb_pekerja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_datapegawai` (`id_pegawai`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
