-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 09:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrfd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `b` varchar(32) NOT NULL,
  `d` varchar(32) NOT NULL,
  `as2` varchar(32) NOT NULL,
  `fy` varchar(32) NOT NULL,
  `fc` varchar(32) NOT NULL,
  `is_verified_by_manager` int(1) DEFAULT NULL,
  `is_verified_by_engineer` int(1) DEFAULT NULL,
  `diedit` int(11) DEFAULT NULL,
  `hasil` varchar(128) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `b`, `d`, `as2`, `fy`, `fc`, `is_verified_by_manager`, `is_verified_by_engineer`, `diedit`, `hasil`, `date`) VALUES
(131, 4, '23', '50', '10', '60000', '2501', NULL, 1, NULL, '26319000', '2023-07-17 10:15:22'),
(134, 4, '10', '18', '2', '60000', '3500', NULL, NULL, 1, '1918200', '2023-07-17 10:52:48'),
(136, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:15:07'),
(137, 8, '10', '18', '20', '6000', '3000', NULL, NULL, NULL, '1877400', '2023-07-17 18:17:05'),
(140, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:18:08'),
(142, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:19:17'),
(144, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:20:43'),
(146, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:22:06'),
(147, 8, '10', '18', '10', '6000', '3000', NULL, NULL, NULL, '1009500', '2023-07-17 18:22:13'),
(148, 8, '10', '18', '10', '6000', '5000', NULL, NULL, NULL, '1037700', '2023-07-17 18:22:20'),
(149, 8, '10', '18', '10', '6000', '4000', NULL, NULL, NULL, '1027200', '2023-07-17 18:22:26'),
(150, 8, '10', '18', '10', '6000', '8000', NULL, NULL, NULL, '1053600', '2023-07-17 18:22:38'),
(151, 8, '10', '18', '10', '6000', '10000', NULL, NULL, NULL, '1058700', '2023-07-17 18:22:44'),
(155, 8, '10', '18', '10', '5000', '3000', NULL, NULL, NULL, '851000', '2023-07-17 18:39:07'),
(160, 8, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-07-17 18:51:20'),
(161, 8, '10', '18', '4', '60000', '10000', NULL, NULL, NULL, '3981600', '2023-07-17 18:51:53'),
(162, 8, '10', '18', '4', '50000', '10000', NULL, NULL, NULL, '3365000', '2023-07-17 18:52:04'),
(164, 8, '10', '18', '4', '60000', '10000', NULL, NULL, NULL, '3981600', '2023-07-17 18:52:15'),
(186, 8, '10', '18', '12', '5000', '9000', NULL, NULL, NULL, '1056600', '2023-07-18 10:13:29'),
(192, 8, '1000000', '1000000', '100000000000', '1000000', '1000000', NULL, NULL, NULL, '9.4117647e22', '2023-07-18 10:31:38'),
(193, 15, '10', '18', '4', '60000', '9000', NULL, 1, NULL, '3943200', '2023-07-19 01:42:52'),
(194, 15, '10', '18', '10', '5000', '5000', NULL, NULL, NULL, '870500', '2023-07-19 13:39:20'),
(195, 15, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-07-19 13:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_intansi` varchar(256) NOT NULL,
  `alamat_intansi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_intansi`, `alamat_intansi`) VALUES
(1, 'UNIVERSITAS WIJAYA KUSUMA SURABAYA', 'Jl.Dukuh Kupang XXV No.54, Dukuh Kupang, Kec.Dukuhpakis, Surabaya, Jawa Timur 60225');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `role` enum('engineer','manager','user','admin','') NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `nama`, `role`, `token`, `created`) VALUES
(1, 'engineer3', '', '$2y$10$KQt/ILsAUIYGjtVKbYau/uieqpCN222uUMaIIVq9sCvuxkWxvGYDu', 'coba1', 'engineer', NULL, '2023-05-25'),
(4, 'nindymaysice', '', '$2y$10$j/VaRbor8/.F03XsXbFfTu66vRy2Y8QUmN4x6WQR9hH2.IgpzJbL.', 'Nindy Maysice Malendes', 'engineer', NULL, '2023-05-25'),
(6, 'tasyagita', '', '$2y$10$ivI8vdWMR347X/4Dip0V7emnR18ncKiVHVHLPOOu3bgrn8D6xyYau', 'Tasya Gita', 'manager', NULL, '2023-05-25'),
(8, 'userradenajeng', '', '$2y$10$HXIP.ilNAbN1QVqnHpBPNex7kptWtMKBS8IupkgPiwHIjs6LkfWLS', 'Raden Ajeng Ratna ', 'user', NULL, '2023-05-26'),
(13, 'coba2', '', '$2y$10$i81DiH9djWEIgfeiFnOlV.EQZrn5Kq8CFz8panX4sYurEoLW5iym2', 'coba2', 'engineer', NULL, '2023-07-18'),
(14, 'coba1', '', '$2y$10$n2yFFwzvUGU31TLC95oRaONd/u0YFDEWmhANS4hXn8uUSUdDtuKRq', 'coba1', 'engineer', NULL, '2023-07-18'),
(15, 'sopan', 'sopan@mail.com', '$2y$10$jJ71GwXuHS4A6CLEeJP5IehNqWdjSvp/bMd5li7ZAGpXBtRI8TE2y', 'sopan', 'engineer', NULL, '2023-07-18'),
(16, 'admin', 'admin@perhitunganlrfd.site', '$2y$10$jJ71GwXuHS4A6CLEeJP5IehNqWdjSvp/bMd5li7ZAGpXBtRI8TE2y', 'admin', 'admin', NULL, '2023-07-19'),
(17, 'ujicoba', '', '$2y$10$7oDDMjuF81rVkmfiJs4DkuXRWOdKJNASa5fLUaKs5Ad0bAYBe2O5.', 'Engineer', 'engineer', NULL, '2023-07-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
