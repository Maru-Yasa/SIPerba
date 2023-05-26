-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 04:54 AM
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
-- Database: `calculator_lrfd`
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
  `status` enum('Menunggu','Ditolak','Terverifikasi','') NOT NULL,
  `hasil` varchar(128) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `b`, `d`, `as2`, `fy`, `fc`, `status`, `hasil`, `date`) VALUES
(3, 1, '10', '18', '4', '60000', '', 'Terverifikasi', '3642000', '2023-05-09'),
(5, 1, '18', '10', '4', '60000', '5000', 'Menunggu', '2023200', '2023-05-09'),
(7, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-16'),
(12, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-16'),
(14, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-17'),
(15, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-17'),
(21, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-17'),
(22, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-17'),
(23, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-17'),
(26, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-18'),
(29, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-18'),
(43, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-25'),
(45, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-25'),
(46, 1, '10', '18', '4', '60000', '9000', 'Terverifikasi', '3943200', '2023-05-25'),
(47, 1, '10', '18', '4', '60000', '9000', 'Ditolak', '3943200', '2023-05-25'),
(50, 1, '10', '18', '4', '60000', '9000', 'Menunggu', '3943200', '2023-05-26'),
(51, 4, '10', '18', '4', '60000', '3000', 'Menunggu', '-', '2023-05-26');

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
(1, 'Sopan Tech', 'Jalan Samas KM 20, Sumbermulyo, Bambanglipuro, Bantul, Yogyakarta 55764\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `role` enum('admin','atasan','user','','') NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `created`) VALUES
(1, 'admin3', '$2y$10$KQt/ILsAUIYGjtVKbYau/uieqpCN222uUMaIIVq9sCvuxkWxvGYDu', 'Heru Aja', 'admin', '2023-05-25'),
(4, 'admin11', '$2y$10$I9XsaqXylDNDwNUYfJjyw.lvNQ8L7.Dzpf6K94BxzDhZAI5GXaES6', 'Maruf Amin', 'admin', '2023-05-25'),
(5, 'admin1', '$2y$10$wIk1jl1RnSnq5zVtSOfjDuhXDZsBIBlnBhl5LCcHKs8P8Y42RiQCa', 'Heru', 'atasan', '2023-05-25'),
(6, 'atasan1', '$2y$10$ROtH4.sK2ObHpnbVf5ozeuIzJ7uA0x9Pi4HbKzTfUdTD.URF8tDDG', 'Pak Budi', 'atasan', '2023-05-25'),
(8, 'user1', '$2y$10$AU7iUZU.DZFF3ChtkG5tbO33yTpotEH6.pXuib.MCd6BS4uULJTUK', 'User', 'user', '2023-05-26'),
(9, 'atasan2', '$2y$10$j1UBCCNgT2hVuN77KTssOuBSUOK0Z4U8u187/XDAlp2GeDtUX4kda', 'Atasan2', 'atasan', '2023-05-26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
