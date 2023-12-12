-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 15.57
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
(1, 'Jakarta', 'Luxury', 'Kelapa Gading', 450000.00);

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
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transportations`
--

INSERT INTO `transportations` (`id_transportation`, `transportation_name`, `initial_goal`, `final_destination`, `price`) VALUES
(1, 'Train', 'Jakarta', 'Malang ', 350000.00),
(2, 'Train', 'Bandung', 'Jakarta', 200000.00);

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
(3, 'AHMAD RIAN SYAIFULLAH RITONGA 1', NULL, 'Visitor', 'ahmad.ritonga@mhs.unsoed.ac.id', '117121434478025538788', '2023-12-10 21:01:03', '2023-12-10 14:01:03'),
(4, 'Ahmad Rian', '7d30dd3e1bc962e890494ab50ab8c8a9', 'Visitor', 'ahmad@gmail.com', '', '2023-12-09 12:54:10', '2023-12-11 13:46:22'),
(5, 'soedirman technophoria', NULL, 'Visitor', 'soedirmantechnophoria2023@gmail.com', '117805581099493247556', '2023-12-10 12:09:57', '2023-12-10 05:09:57'),
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
  MODIFY `id_homestay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id_transportation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
