-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 09:44 PM
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
-- Database: `lrfd`
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
  `hasil` varchar(128) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `b`, `d`, `as2`, `fy`, `fc`, `is_verified_by_manager`, `is_verified_by_engineer`, `hasil`, `date`) VALUES
(3, 1, '10', '18', '4', '60000', '', NULL, NULL, '3642000', '2023-05-09 00:00:00'),
(5, 1, '18', '10', '4', '60000', '5000', NULL, NULL, '2023200', '2023-05-09 00:00:00'),
(7, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-16 00:00:00'),
(12, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-16 00:00:00'),
(14, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(15, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(21, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(22, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(23, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(26, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-18 00:00:00'),
(29, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-18 00:00:00'),
(43, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(45, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(46, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(47, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(50, 1, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-26 00:00:00'),
(51, 4, '10', '18', '4', '60000', '3000', NULL, NULL, '-', '2023-05-26 00:00:00'),
(52, 4, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-29 00:00:00'),
(53, 4, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-05-29 00:00:00'),
(54, 4, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-01 00:00:00'),
(55, 4, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-01 12:50:34'),
(56, 4, '10', '18', '4', '60000', '9000', 1, 1, '3943200', '2023-06-01 12:50:35'),
(57, 4, '10', '18', '4', '60000', '9000', 0, 0, '3943200', '2023-06-01 17:51:39'),
(58, 4, '10', '18', '4', '60000', '9000', 1, NULL, '3943200', '2023-06-14 01:12:43'),
(59, 10, '10', '18', '4', '60000', '9000', 1, NULL, '3943200', '2023-06-14 02:02:56'),
(60, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:03:10'),
(61, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:21:07'),
(62, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:23:56'),
(63, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:26:54'),
(64, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:27:22'),
(65, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:27:55'),
(66, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:28:17'),
(67, 10, '10', '18', '4', '60000', '9000', NULL, NULL, '3943200', '2023-06-14 02:37:30');

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
  `role` enum('engineer','manager','user','','') NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `created`) VALUES
(1, 'engineer3', '$2y$10$KQt/ILsAUIYGjtVKbYau/uieqpCN222uUMaIIVq9sCvuxkWxvGYDu', 'Heru Aja', 'engineer', '2023-05-25'),
(4, 'engineer', '$2y$10$GiitVOydXEgp.xYuwHsI6O/vQTxnWrwyXI40IoklczNgbbkd5iipm', 'Admin', 'engineer', '2023-05-25'),
(5, 'engineer1', '$2y$10$wIk1jl1RnSnq5zVtSOfjDuhXDZsBIBlnBhl5LCcHKs8P8Y42RiQCa', 'Heru', 'engineer', '2023-05-25'),
(6, 'manager', '$2y$10$UDHhCs4mQLBtsu3PRbF3kuLvUFzrsleMmxv0i0ZRrqqYkW0H4SCn6', 'atasan', 'manager', '2023-05-25'),
(8, 'user', '$2y$10$HXIP.ilNAbN1QVqnHpBPNex7kptWtMKBS8IupkgPiwHIjs6LkfWLS', 'User', 'user', '2023-05-26'),
(9, 'manager2', '$2y$10$j1UBCCNgT2hVuN77KTssOuBSUOK0Z4U8u187/XDAlp2GeDtUX4kda', 'Atasan2', 'manager', '2023-05-26'),
(10, 'sopan', '$2y$10$lLzPQUo7jdBNQpKe4JjA3eOmhLhpODfMS3S6zCrvLumi/oW5l9Hvy', 'Sopan', 'manager', '2023-06-13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
