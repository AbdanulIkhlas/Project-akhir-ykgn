-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 17.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ykgn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama`, `no_hp`, `alamat`, `jenis_kelamin`, `username`, `password`) VALUES
(9, 'Muhammad Abdanul Ikhlas', '082271583359', 'Tambak Bayan NO 5 4A', 'Laki-Laki', 'klaz', 'klaz123'),
(10, 'Muhammad Riyadhy', '082212345678', 'Tambangan Tonga', 'Laki-Laki', 'riyadhy', 'riyadhy123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diikuti`
--

CREATE TABLE `diikuti` (
  `id_diikuti` int(11) NOT NULL,
  `id_pertandingan` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diikuti`
--

INSERT INTO `diikuti` (`id_diikuti`, `id_pertandingan`, `id_biodata`) VALUES
(28, 187, 9),
(29, 189, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id` int(11) NOT NULL,
  `home` varchar(20) NOT NULL,
  `away` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` varchar(40) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id`, `home`, `away`, `tanggal`, `jam`, `tempat`, `lokasi`, `harga`, `status`, `id_biodata`, `provinsi`) VALUES
(187, 'KOREA', 'GHANA', '2022-11-28', '20:00:00', 'SPP', 'https://maps.app.goo.gl/CimCc1DARnqkNig9A', 0, 'SELESAI', 9, 'YOGYAKARTA '),
(189, 'WALES', 'INGGRIS', '2022-11-30', '02:00:00', 'Depan Mesjid Agung Nur Ala Nur', 'https://maps.app.goo.gl/USEcAjzTzRkqw99a9', 0, 'SEGERA', 10, 'SUMATRA UTARA'),
(190, 'TUNISIA', 'PERANCIS', '2022-11-30', '22:00:00', 'Mbak lis', 'https://maps.app.goo.gl/bKKQNi9G8qjcxt296', 5000, 'SEGERA', 9, 'YOGYAKARTA'),
(191, 'BRAZIL', 'SWISS', '2022-11-28', '23:00:00', 'Gedung Sor Laode Pandu', 'https://maps.app.goo.gl/8e5MvwymEPM8g1ba7', 5000, 'BATAL', 9, 'RAHA ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indeks untuk tabel `diikuti`
--
ALTER TABLE `diikuti`
  ADD PRIMARY KEY (`id_diikuti`),
  ADD KEY `id_pertandingan` (`id_pertandingan`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- Indeks untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `diikuti`
--
ALTER TABLE `diikuti`
  MODIFY `id_diikuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diikuti`
--
ALTER TABLE `diikuti`
  ADD CONSTRAINT `diikuti_ibfk_1` FOREIGN KEY (`id_pertandingan`) REFERENCES `pertandingan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diikuti_ibfk_2` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
