-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 07.04
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
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `homestays`
--

CREATE TABLE `homestays` (
  `id_homestay` int(11) NOT NULL,
  `Lokasi` varchar(50) DEFAULT NULL,
  `homestay_class` enum('Luxury','Regular') DEFAULT NULL,
  `alamat` varchar(254) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `homestays`
--

INSERT INTO `homestays` (`id_homestay`, `Lokasi`, `homestay_class`, `alamat`, `price`) VALUES
(1, 'Jakarta', 'Luxury', 'Kelapa Gading', 1200000.00),
(2, 'Jakarta', 'Regular', 'pondok indah', 450000.00),
(3, 'Bandung', 'Luxury', 'setiabudi', 1200000.00),
(4, 'Bandung', 'Regular', 'jl.soekarno', 300000.00),
(5, 'Yogyakarta', 'Luxury', 'Jetis,yogya', 1080000.00),
(6, 'Yogyakarta', 'Regular', 'Pusat kota, Tugu', 400000.00),
(7, 'Malang', 'Luxury', 'Malang Pusat', 1200000.00),
(8, 'Malang', 'Regular', 'Malang Pusat', 400000.00),
(9, 'Magetan', 'Luxury', 'Sarangan', 450000.00),
(10, 'Magetan', 'Regular', 'Sarangan', 150000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportations`
--

CREATE TABLE `transportations` (
  `id_transportation` int(11) NOT NULL,
  `transportation_name` enum('Airline','Train','Vehicle') DEFAULT NULL,
  `initial_goal` varchar(255) NOT NULL,
  `final_destination` varchar(255) NOT NULL,
  `kategori` enum('Ekonomi','Eksekutif') DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transportations`
--

INSERT INTO `transportations` (`id_transportation`, `transportation_name`, `initial_goal`, `final_destination`, `kategori`, `price`) VALUES
(1, 'Train', 'Jakarta', 'Malang ', 'Ekonomi', 270000.00),
(2, 'Train', 'Jakarta', 'Malang', 'Eksekutif', 670000.00),
(3, 'Train', 'Jakarta', 'Bandung', 'Ekonomi', 150000.00),
(4, 'Train', 'Jakarta', 'Bandung', 'Eksekutif', 200000.00),
(5, 'Train', 'Jakarta', 'Yogyakarta', 'Ekonomi', 310000.00),
(6, 'Train', 'Jakarta', 'Yogyakarta', 'Eksekutif', 475000.00),
(7, 'Train', 'Jakarta', 'Magetan', 'Ekonomi', 250000.00),
(8, 'Train', 'Jakarta', 'Magetan', 'Eksekutif', 460000.00),
(9, 'Train', 'Bandung', 'Jakarta', 'Ekonomi', 150000.00),
(10, 'Train', 'Bandung', 'Jakarta', 'Eksekutif', 200000.00),
(11, 'Train', 'Bandung', 'Yogyakarta', 'Ekonomi', 250000.00),
(12, 'Train', 'Bandung', 'Yogyakarta', 'Eksekutif', 425000.00),
(13, 'Train', 'Bandung', 'Malang ', 'Ekonomi', 320000.00),
(14, 'Train', 'Bandung', 'Malang ', 'Eksekutif', 585000.00),
(15, 'Train', 'Bandung', 'Magetan', 'Ekonomi', 84000.00),
(16, 'Train', 'Bandung', 'Magetan', 'Eksekutif', 0.00),
(17, 'Train', 'Malang', 'Jakarta', 'Ekonomi', 270000.00),
(18, 'Train', 'Malang', 'Jakarta', 'Eksekutif', 565000.00),
(19, 'Train', 'Malang', 'Bandung', 'Ekonomi', 320000.00),
(20, 'Train', 'Malang', 'Bandung', 'Eksekutif', 585000.00),
(21, 'Train', 'Malang', 'Yogyakarta', 'Ekonomi', 245000.00),
(22, 'Train', 'Malang', 'Yogyakarta', 'Eksekutif', 410000.00),
(23, 'Train', 'Malang', 'Magetan', 'Ekonomi', 145000.00),
(24, 'Train', 'Malang', 'Magetan', 'Eksekutif', 0.00),
(25, 'Train', 'Yogyakarta', 'Jakarta', 'Ekonomi', 260000.00),
(26, 'Train', 'Yogyakarta', 'Jakarta', 'Eksekutif', 435000.00),
(27, 'Train', 'Yogyakarta', 'Bandung', 'Ekonomi', 230000.00),
(28, 'Train', 'Yogyakarta', 'Bandung', 'Eksekutif', 375000.00),
(29, 'Train', 'Yogyakarta', 'Malang', 'Ekonomi', 240000.00),
(30, 'Train', 'Yogyakarta', 'Malang ', 'Eksekutif', 440000.00),
(31, 'Train', 'Yogyakarta', 'Magetan', 'Ekonomi', 195000.00),
(32, 'Train', 'Yogyakarta', 'Magetan', 'Eksekutif', 275000.00),
(33, 'Train', 'Magetan', 'Jakarta', 'Ekonomi', 260000.00),
(34, 'Train', 'Magetan', 'Jakarta', 'Eksekutif', 460000.00),
(35, 'Train', 'Magetan', 'Bandung', 'Ekonomi', 84000.00),
(36, 'Train', 'Magetan', 'Bandung', 'Eksekutif', 0.00),
(37, 'Train', 'Magetan', 'Malang ', 'Ekonomi', 145000.00),
(38, 'Train', 'Magetan', 'Malang ', 'Eksekutif', 0.00),
(39, 'Train', 'Magetan', 'Yogyakarta', 'Ekonomi', 175000.00),
(40, 'Train', 'Magetan', 'Yogyakarta', 'Eksekutif', 270000.00),
(41, 'Airline', 'Jakarta', 'Malang ', 'Ekonomi', 1400000.00),
(42, 'Airline', 'Jakarta', 'Bandung', 'Ekonomi', 0.00),
(43, 'Airline', 'Jakarta', 'Yogyakarta', 'Ekonomi', 800000.00),
(44, 'Airline', 'Jakarta', 'Magetan', 'Ekonomi', 0.00),
(45, 'Airline', 'Bandung', 'Malang ', 'Ekonomi', 0.00),
(46, 'Airline', 'Bandung', 'Jakarta', 'Ekonomi', 0.00),
(47, 'Airline', 'Bandung', 'Yogyakarta', 'Ekonomi', 0.00),
(48, 'Airline', 'Bandung', 'Magetan', 'Ekonomi', 0.00),
(49, 'Airline', 'Malang', 'Yogyakarta', 'Ekonomi', 2316000.00),
(50, 'Airline', 'Malang', 'Jakarta', 'Ekonomi', 1200000.00),
(51, 'Airline', 'Malang', 'Bandung', 'Ekonomi', 0.00),
(52, 'Airline', 'Malang', 'Magetan', 'Ekonomi', 0.00),
(53, 'Airline', 'Yogyakarta', 'Jakarta', 'Ekonomi', 760000.00),
(54, 'Airline', 'Yogyakarta', 'Bandung', 'Ekonomi', 0.00),
(55, 'Airline', 'Yogyakarta', 'Magetan', 'Ekonomi', 0.00),
(56, 'Airline', 'Yogyakarta', 'Malang ', 'Ekonomi', 2350000.00),
(57, 'Airline', 'Magetan', 'Malang ', 'Ekonomi', 0.00),
(58, 'Airline', 'Magetan', 'Bandung', 'Ekonomi', 0.00),
(59, 'Airline', 'Magetan', 'Jakarta', 'Ekonomi', 0.00),
(60, 'Airline', 'Magetan', 'Yogyakarta', 'Ekonomi', 0.00),
(61, 'Vehicle', 'Jakarta', 'Bandung', 'Ekonomi', 100000.00),
(62, 'Vehicle', 'Jakarta', 'Malang ', 'Ekonomi', 430000.00),
(63, 'Vehicle', 'Jakarta', 'Yogyakarta', 'Ekonomi', 240000.00),
(64, 'Vehicle', 'Jakarta', 'Magetan', 'Ekonomi', 273000.00),
(65, 'Vehicle', 'Bandung', 'Jakarta', 'Ekonomi', 100000.00),
(66, 'Vehicle', 'Bandung', 'Yogyakarta', 'Ekonomi', 180000.00),
(67, 'Vehicle', 'Bandung', 'Malang ', 'Ekonomi', 350000.00),
(68, 'Vehicle', 'Bandung', 'Magetan', 'Ekonomi', 0.00),
(69, 'Vehicle', 'Yogyakarta', 'Jakarta', 'Ekonomi', 240000.00),
(70, 'Vehicle', 'Yogyakarta', 'Bandung', 'Ekonomi', 180000.00),
(71, 'Vehicle', 'Yogyakarta', 'Malang ', 'Ekonomi', 180000.00),
(72, 'Vehicle', 'Yogyakarta', 'Magetan', 'Ekonomi', 0.00),
(73, 'Vehicle', 'Malang', 'Jakarta', 'Ekonomi', 430000.00),
(74, 'Vehicle', 'Malang', 'Bandung', 'Ekonomi', 350000.00),
(75, 'Vehicle', 'Malang', 'Yogyakarta', 'Ekonomi', 180000.00),
(76, 'Vehicle', 'Malang', 'Magetan', 'Ekonomi', 140000.00),
(77, 'Vehicle', 'Magetan', 'Jakarta', 'Ekonomi', 273000.00),
(78, 'Vehicle', 'Magetan', 'Bandung', 'Ekonomi', 0.00),
(79, 'Vehicle', 'Magetan', 'Yogyakarta', 'Ekonomi', 0.00),
(80, 'Vehicle', 'Magetan', 'Malang ', 'Ekonomi', 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Administrator','Visitor') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `email`, `oauth_id`, `last_login`, `created_at`) VALUES
(3, 'AHMAD RIAN SYAIFULLAH RITONGA 1', NULL, 'Visitor', 'ahmad.ritonga@mhs.unsoed.ac.id', '117121434478025538788', '2023-12-12 12:37:53', '2023-12-12 05:37:53'),
(4, 'Ahmad Rian', '7d30dd3e1bc962e890494ab50ab8c8a9', 'Visitor', 'ahmad@gmail.com', '', '2023-12-09 12:54:10', '2023-12-11 13:46:22'),
(5, 'soedirman technophoria', NULL, 'Visitor', 'soedirmantechnophoria2023@gmail.com', '117805581099493247556', '2023-12-12 12:19:12', '2023-12-12 05:19:12'),
(6, 'paguyuban programming', NULL, 'Visitor', 'paguyubansinauprogramming@gmail.com', '118333435663996870532', '2023-12-10 12:10:36', '2023-12-10 05:10:36'),
(8, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', 'alriansr@gmail.com', '', '2023-12-11 20:34:41', '2023-12-11 13:49:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `homestays`
--
ALTER TABLE `homestays`
  ADD PRIMARY KEY (`id_homestay`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Indeks untuk tabel `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id_transportation`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `homestays`
--
ALTER TABLE `homestays`
  MODIFY `id_homestay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id_transportation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
