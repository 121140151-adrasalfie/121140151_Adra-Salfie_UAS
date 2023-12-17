-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 12.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webadra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kpop_data`
--

CREATE TABLE `kpop_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `about` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `band` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kpop_data`
--

INSERT INTO `kpop_data` (`id`, `name`, `dob`, `about`, `genre`, `band`, `photo`, `status`, `user_agent`, `ip_address`) VALUES
(18, 'Na Jaemin', '2000-08-13', 'Na Jae-min merupakan seorang penyanyi idola dan aktor Korea Selatan yang berada di bawah kontrak SM Entertainment. Ia adalah anggota grup vokal laki-laki NCT dan sub-unit NCT Dream. Jaemin juga menjalani debutnya sebagai aktor dalam serial televisi \"Method To Hate You\" yang diadaptasi dari Webtoon yang sama sebagai pemeran utama, Han Dae-gang.', 'K-Pop', 'NCT Dream', '3f06c05036edfb927260cbaa24b89dde.jpg', 'active', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '::1'),
(19, 'Oh Sehun', '1994-04-12', 'Oh Se-hun lebih dikenal dengan mononim Sehun, adalah penyanyi, rapper, model, dan aktor asal Korea Selatan. Ia dikenal sebagai anggota dari boyband Korea Selatan-Tiongkok EXO dan sub kelompoknya EXO-K. Pada September 2017, Sehun menjadi anggota tetap dalam variety show orisinal Netflix, Busted!.', 'K-Pop', 'EXO', 'a149291823c63fba4763ff6faf6e8a72.jpg', 'active', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '::1'),
(20, 'Lee Taeyong', '1995-07-01', 'Lee Tae-yong dikenal dengan mononimnya Taeyong, adalah seorang rapper utama, penulis lagu, penari utama, koreografer, visual, produser, composer, model, editor, YouTuber, influencer, dan penyanyi asal Korea Selatan. Ia adalah pemimpin sekaligus anggota dari grup vokal pria asal Korea Selatan, NCT, dalam subunit NCT U dan merupakan pemimpin NCT 127.', 'K-Pop', 'NCT 127', '8bd31d23e17c50cf972d9db7d2120e58.jpg', 'active', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '::1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kpop_data`
--
ALTER TABLE `kpop_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kpop_data`
--
ALTER TABLE `kpop_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
