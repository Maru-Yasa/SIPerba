-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 08:49 PM
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
(3, 1, '10', '18', '4', '60000', '', NULL, NULL, NULL, '3642000', '2023-05-09 00:00:00'),
(5, 1, '18', '10', '4', '60000', '5000', NULL, NULL, NULL, '2023200', '2023-05-09 00:00:00'),
(7, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-16 00:00:00'),
(12, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-16 00:00:00'),
(14, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(15, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(21, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(22, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(23, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-17 00:00:00'),
(26, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-18 00:00:00'),
(29, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-18 00:00:00'),
(43, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(45, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(46, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(47, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-25 00:00:00'),
(50, 1, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-26 00:00:00'),
(51, 4, '10', '18', '4', '60000', '3000', NULL, 0, NULL, '-', '2023-05-26 00:00:00'),
(52, 4, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-29 00:00:00'),
(53, 4, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-05-29 00:00:00'),
(54, 4, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-01 00:00:00'),
(55, 4, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-01 12:50:34'),
(56, 4, '10', '18', '4', '60000', '9000', 1, 1, NULL, '3943200', '2023-06-01 12:50:35'),
(57, 4, '10', '18', '4', '60000', '9000', 0, 0, NULL, '3943200', '2023-06-01 17:51:39'),
(58, 4, '10', '18', '4', '60000', '9000', 1, NULL, NULL, '3943200', '2023-06-14 01:12:43'),
(59, 10, '10', '18', '4', '60000', '9000', 1, NULL, NULL, '3943200', '2023-06-14 02:02:56'),
(60, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:03:10'),
(61, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:21:07'),
(62, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:23:56'),
(63, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:26:54'),
(64, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:27:22'),
(65, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:27:55'),
(66, 10, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-14 02:28:17'),
(67, 10, '10', '18', '4', '60000', '9000', 1, 1, NULL, '3943200', '2023-06-14 02:37:30'),
(68, 8, '12', '16', '5', '70000', '7000', 0, 0, NULL, '-', '2023-06-14 11:17:54'),
(69, 12, '10', '18', '4', '60000', '9000', 1, 1, NULL, '3943200', '2023-06-14 12:46:12'),
(70, 8, '10', '18', '4', '50000', '1000', NULL, NULL, NULL, '-', '2023-06-14 14:42:35'),
(71, 8, '20', '14', '2', '60000', '4000', 1, 1, NULL, '1574400', '2023-06-14 14:44:00'),
(72, 6, '10', '18', '4', '60000', '3000', NULL, NULL, NULL, '-', '2023-06-14 15:07:29'),
(73, 4, '10', '18', '4', '60000', '9000', NULL, NULL, NULL, '3943200', '2023-06-20 22:14:37'),
(74, 8, '10', '18', '4', '60000', '6000', 1, 1, NULL, '3754800', '2023-06-27 09:10:16'),
(75, 8, '10', '18', '4', '60000', '5000', NULL, NULL, NULL, '-', '2023-06-27 09:10:49'),
(76, 8, '10', '18', '4', '60000', '6000', 1, 1, NULL, '3754800', '2023-07-01 09:42:19'),
(77, 8, '10', '18', '4', '60000', '5000', 0, 0, NULL, '-', '2023-07-01 09:43:00'),
(78, 8, '10', '18', '4', '60000', '6000', 0, 1, NULL, '3754800', '2023-07-01 12:11:42'),
(79, 8, '10', '18', '4', '50000', '3000', 0, 0, NULL, '-', '2023-07-01 12:11:58'),
(80, 8, '10', '18', '4', '50000', '3000', 0, 0, NULL, '-', '2023-07-01 12:18:41'),
(81, 8, '10', '18', '4', '20000', '4000', 0, 1, NULL, '1346000', '2023-07-01 12:18:53'),
(82, 8, '10', '18', '4', '5000', '1000', 1, 1, NULL, '336500', '2023-07-01 12:20:32'),
(83, 8, '10', '18', '4', '80000', '4000', 0, 0, NULL, '-', '2023-07-01 12:21:02'),
(84, 4, '10', '18', '4', '60000', '3000', NULL, 0, 1, '-', '2023-07-13 01:39:55'),
(85, 4, '13', '18', '4', '60000', '6000', NULL, NULL, 1, '3885600', '2023-07-13 01:31:30'),
(86, 4, '10', '18', '4', '60000', '3000', NULL, NULL, 1, '-', '2023-07-13 01:31:41'),
(87, 4, '15', '18', '4', '60000', '9000', NULL, NULL, 1, '4069200', '2023-07-13 01:22:17');

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
(4, 'nindymaysice', '$2y$10$j/VaRbor8/.F03XsXbFfTu66vRy2Y8QUmN4x6WQR9hH2.IgpzJbL.', 'Nindy Maysice Malendes', 'engineer', '2023-05-25'),
(5, 'engineer1', '$2y$10$wIk1jl1RnSnq5zVtSOfjDuhXDZsBIBlnBhl5LCcHKs8P8Y42RiQCa', 'Heru', 'engineer', '2023-05-25'),
(6, 'tasyagita', '$2y$10$ivI8vdWMR347X/4Dip0V7emnR18ncKiVHVHLPOOu3bgrn8D6xyYau', 'Tasya Gita', 'manager', '2023-05-25'),
(8, 'userradenajeng', '$2y$10$HXIP.ilNAbN1QVqnHpBPNex7kptWtMKBS8IupkgPiwHIjs6LkfWLS', 'Raden Ajeng Ratna ', 'user', '2023-05-26'),
(9, 'manager2', '$2y$10$j1UBCCNgT2hVuN77KTssOuBSUOK0Z4U8u187/XDAlp2GeDtUX4kda', 'Atasan2', 'manager', '2023-05-26'),
(10, 'sopan', '$2y$10$lLzPQUo7jdBNQpKe4JjA3eOmhLhpODfMS3S6zCrvLumi/oW5l9Hvy', 'Sopan', 'manager', '2023-06-13'),
(11, 'engineer2', '$2y$10$NelgjIfC7F.euTsWQK8rnOIZPxACNDhj4PYY6MMNc4Iedfe7WWhe6', 'Nindy Maysice Malendes', 'engineer', '2023-06-14'),
(12, 'radenajeng', '$2y$10$cz//Hcrx.b6HZ8O/RXxCZ.Cv9mVTjgc3pJn6fdwTDb0Li4QeS0rw2', 'Raden Ajeng Ratna ', 'user', '2023-06-14');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
