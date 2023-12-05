-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 15.17
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
-- Struktur dari tabel `destinations`
--

CREATE TABLE `destinations` (
  `id_destination` int(11) NOT NULL,
  `destination_name` varchar(50) DEFAULT NULL,
  `destination_coordinate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinations_category`
--

CREATE TABLE `destinations_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `id_district` int(11) NOT NULL,
  `district_name` varchar(30) DEFAULT NULL,
  `id_province` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `homestays`
--

CREATE TABLE `homestays` (
  `id_homestay` int(11) NOT NULL,
  `homestay_name` varchar(50) DEFAULT NULL,
  `homestay_class` enum('Luxury','Regular') DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id_province` int(11) NOT NULL,
  `province_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktur dari tabel `sub_district`
--

CREATE TABLE `sub_district` (
  `id_subdistrict` int(11) NOT NULL,
  `subdistrict_name` varchar(30) DEFAULT NULL,
  `coordinate` varchar(255) DEFAULT NULL,
  `id_province` int(11) DEFAULT NULL,
  `id_district` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportations`
--

CREATE TABLE `transportations` (
  `id_transportation` int(11) NOT NULL,
  `transportation_name` enum('Airline','Train','Vehicle') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `travels`
--

CREATE TABLE `travels` (
  `id_travel` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_subdistrict` int(11) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `id_homestay` int(11) DEFAULT NULL,
  `id_transportation` int(11) DEFAULT NULL,
  `current_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `travel_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Administrator','Visitor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id_visitor` int(11) NOT NULL,
  `visitor_firstname` varchar(50) DEFAULT NULL,
  `visitor_lastname` varchar(50) DEFAULT NULL,
  `visitor_lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_province` int(11) DEFAULT NULL,
  `id_district` int(11) DEFAULT NULL,
  `id_subdistrict` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id_destination`);

--
-- Indeks untuk tabel `destinations_category`
--
ALTER TABLE `destinations_category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_destination` (`id_destination`);

--
-- Indeks untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id_district`),
  ADD KEY `id_province` (`id_province`);

--
-- Indeks untuk tabel `homestays`
--
ALTER TABLE `homestays`
  ADD PRIMARY KEY (`id_homestay`),
  ADD KEY `id_destination` (`id_destination`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id_province`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Indeks untuk tabel `sub_district`
--
ALTER TABLE `sub_district`
  ADD PRIMARY KEY (`id_subdistrict`),
  ADD KEY `id_province` (`id_province`),
  ADD KEY `id_district` (`id_district`);

--
-- Indeks untuk tabel `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id_transportation`);

--
-- Indeks untuk tabel `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id_travel`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_subdistrict` (`id_subdistrict`),
  ADD KEY `id_destination` (`id_destination`),
  ADD KEY `id_homestay` (`id_homestay`),
  ADD KEY `id_transportation` (`id_transportation`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id_visitor`),
  ADD KEY `id_province` (`id_province`),
  ADD KEY `id_district` (`id_district`),
  ADD KEY `id_subdistrict` (`id_subdistrict`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `destinations_category`
--
ALTER TABLE `destinations_category`
  ADD CONSTRAINT `destinations_category_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `destinations` (`id_destination`);

--
-- Ketidakleluasaan untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`id_province`) REFERENCES `provinces` (`id_province`);

--
-- Ketidakleluasaan untuk tabel `homestays`
--
ALTER TABLE `homestays`
  ADD CONSTRAINT `homestays_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `destinations` (`id_destination`);

--
-- Ketidakleluasaan untuk tabel `sub_district`
--
ALTER TABLE `sub_district`
  ADD CONSTRAINT `sub_district_ibfk_1` FOREIGN KEY (`id_province`) REFERENCES `provinces` (`id_province`),
  ADD CONSTRAINT `sub_district_ibfk_2` FOREIGN KEY (`id_district`) REFERENCES `districts` (`id_district`);

--
-- Ketidakleluasaan untuk tabel `travels`
--
ALTER TABLE `travels`
  ADD CONSTRAINT `travels_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `travels_ibfk_2` FOREIGN KEY (`id_subdistrict`) REFERENCES `sub_district` (`id_subdistrict`),
  ADD CONSTRAINT `travels_ibfk_3` FOREIGN KEY (`id_destination`) REFERENCES `destinations` (`id_destination`),
  ADD CONSTRAINT `travels_ibfk_4` FOREIGN KEY (`id_homestay`) REFERENCES `homestays` (`id_homestay`),
  ADD CONSTRAINT `travels_ibfk_5` FOREIGN KEY (`id_transportation`) REFERENCES `transportations` (`id_transportation`);

--
-- Ketidakleluasaan untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`id_province`) REFERENCES `provinces` (`id_province`),
  ADD CONSTRAINT `visitors_ibfk_2` FOREIGN KEY (`id_district`) REFERENCES `districts` (`id_district`),
  ADD CONSTRAINT `visitors_ibfk_3` FOREIGN KEY (`id_subdistrict`) REFERENCES `sub_district` (`id_subdistrict`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
