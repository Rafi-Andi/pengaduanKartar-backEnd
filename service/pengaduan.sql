-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 09:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_pengaduan`
--

CREATE TABLE `form_pengaduan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pengaduan`
--

INSERT INTO `form_pengaduan` (`id`, `username`, `email`, `pesan`, `waktu`) VALUES
(10, 'reyhan', 'reyhan@gmail', 'reyhan sakit hati', '2024-11-26 09:35:42'),
(11, 'randi', 'moch.rafi3289@smk.belajar.id', 'pesan\r\n', '2024-11-27 09:24:25'),
(12, 'rafiandi', 'rafiandi@gmail.com', 'ad asda d', '2024-11-27 09:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengaduan`
--

CREATE TABLE `riwayat_pengaduan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pesan_pengaduan` varchar(500) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pengaduan`
--

INSERT INTO `riwayat_pengaduan` (`id`, `user_id`, `pesan_pengaduan`, `waktu`) VALUES
(1, 45, 'jnknknzc xcmmzxmczmxc', '2024-11-27 11:59:54'),
(2, 46, 'aku ingin lapor bang', '2024-11-27 12:01:47'),
(3, 46, 'aku lapor lagi', '2024-11-27 12:01:55'),
(4, 45, 'szcxcczxczc', '2024-11-27 12:05:18'),
(5, 45, 'anjay\r\n', '2024-11-27 12:15:25'),
(6, 45, 'ppp', '2024-11-27 12:27:19'),
(7, 45, 'sxzx\r\n', '2024-11-27 12:27:36'),
(8, 45, 'sxzx\r\n', '2024-11-27 12:28:04'),
(9, 45, '', '2024-11-27 12:28:36'),
(10, 45, '', '2024-11-27 12:29:57'),
(11, 45, '\r\n', '2024-11-27 12:31:18'),
(12, 45, '\r\n', '2024-11-27 12:31:36'),
(13, 47, 'ajsndasdadmasd', '2024-11-27 12:35:11'),
(14, 47, 'cobalagi', '2024-11-27 12:36:12'),
(15, 47, 'lagi', '2024-11-27 12:36:19'),
(16, 47, 'lagi', '2024-11-27 12:36:25'),
(17, 47, 'dan lagi', '2024-11-27 12:36:33'),
(18, 48, 'aku bos', '2024-11-27 13:02:30'),
(19, 57, 'andi adalah aku', '2024-11-27 20:49:39'),
(20, 56, 'anjir', '2024-11-27 20:51:00'),
(21, 61, 'aku ingin mengadu', '2024-11-28 06:37:09'),
(22, 63, 'adu ucl', '2024-11-28 06:41:25'),
(32, 67, 'hai', '2024-11-30 10:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `waktu_buat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `waktu_buat`) VALUES
(34, 'reyhan', '123', '2024-11-26 09:35:11'),
(35, 'rafiandip', '99', '2024-11-27 09:03:03'),
(36, 'rafiandipp', '99', '2024-11-27 09:03:14'),
(39, 'rafiandi', 'pp', '2024-11-27 09:32:42'),
(40, 'rai', 'rai', '2024-11-27 09:57:57'),
(41, 'as', 'as', '2024-11-27 10:08:12'),
(42, 'akuorang', '1', '2024-11-27 11:25:11'),
(44, 'rafiaku', 'akurafi', '2024-11-27 11:27:00'),
(45, 'rafiakubos', 'bos', '2024-11-27 11:59:22'),
(46, 'rayhan', 'rayhan', '2024-11-27 12:01:24'),
(47, 'rafi99', 'rafi99', '2024-11-27 12:34:43'),
(48, 'akuadmin', 'admin', '2024-11-27 13:00:34'),
(51, 'asu', 'njr', '2024-11-27 13:18:49'),
(53, 'raficuy', 'cuy', '2024-11-27 13:25:51'),
(54, 'halo', 'halo', '2024-11-27 19:01:31'),
(55, 'oi', 'oi', '2024-11-27 19:54:38'),
(56, 'mrafiandi', 'rafi', '2024-11-27 20:42:55'),
(57, 'akuandi', 'aku', '2024-11-27 20:49:16'),
(59, 'moch', 'pp', '2024-11-28 06:36:21'),
(61, 'nabil', '11', '2024-11-28 06:36:53'),
(63, 'habl', '1', '2024-11-28 06:40:42'),
(66, 'akuanjg', 'aku', '2024-11-28 06:43:42'),
(67, 'rafi andi', '9999', '2024-11-30 08:27:52'),
(68, 'aku user', '000', '2024-11-30 10:33:33'),
(70, 'randi', '99', '2024-11-30 10:33:51'),
(71, 'user9', '9', '2024-11-30 18:00:31'),
(72, 'user1', 'user', '2024-11-30 18:16:37'),
(73, 'user2', 'user2', '2024-11-30 18:17:49'),
(74, 'dim', '9', '2024-11-30 21:11:47'),
(77, 'akulah', '9', '2024-12-01 08:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_pengaduan`
--
ALTER TABLE `form_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_pengaduan`
--
ALTER TABLE `form_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  ADD CONSTRAINT `riwayat_pengaduan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
