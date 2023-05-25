-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:09 PM
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
  `b` varchar(32) NOT NULL,
  `d` varchar(32) NOT NULL,
  `as2` varchar(32) NOT NULL,
  `fy` varchar(32) NOT NULL,
  `fc` varchar(32) NOT NULL,
  `hasil` varchar(128) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `b`, `d`, `as2`, `fy`, `fc`, `hasil`, `date`) VALUES
(3, '10', '18', '4', '60000', '', '3642000', '2023-05-09'),
(4, '10', '18', '4', '60000', '', '-', '2023-05-09'),
(5, '18', '10', '4', '60000', '5000', '2023200', '2023-05-09'),
(6, '10', '18', '4', '60000', '3000', '-', '2023-05-09'),
(7, '10', '18', '4', '60000', '9000', '3943200', '2023-05-16'),
(8, '10', '18', '4', '60000', '3000', '-', '2023-05-16'),
(9, '12', '15', '3', '50000', '3000', '-', '2023-05-16'),
(10, '12', '15', '3.0', '50000', '3000', '-', '2023-05-16'),
(11, '12', '15', '3.0', '50000', '3000', '-', '2023-05-16'),
(12, '10', '18', '4', '60000', '9000', '3943200', '2023-05-16'),
(13, '10', '18', '4', '60000', '3000', '-', '2023-05-16'),
(14, '10', '18', '4', '60000', '9000', '3943200', '2023-05-17'),
(15, '10', '18', '4', '60000', '9000', '3943200', '2023-05-17'),
(16, '10', '18', '4', '60000', '5000', '-', '2023-05-17'),
(17, '10', '18', '4', '60000', '3000', '-', '2023-05-17'),
(18, '10', '18', '4', '60000', '3000', '-', '2023-05-17'),
(19, '10', '18', '4', '60000', '3000', '-', '2023-05-17'),
(20, '10', '18', '4', '60000', '3000', '-', '2023-05-17'),
(21, '10', '18', '4', '60000', '9000', '3943200', '2023-05-17'),
(22, '10', '18', '4', '60000', '9000', '3943200', '2023-05-17'),
(23, '10', '18', '4', '60000', '9000', '3943200', '2023-05-17'),
(24, '10', '18', '4', '60000', '3000', '-', '2023-05-18'),
(25, '10', '18', '4', '60000', '5000', '-', '2023-05-18'),
(26, '10', '18', '4', '60000', '9000', '3943200', '2023-05-18'),
(27, '10', '18', '4', '60000', '3000', '-', '2023-05-18'),
(28, '10', '18', '4', '60000', '5000', '-', '2023-05-18'),
(29, '10', '18', '4', '60000', '9000', '3943200', '2023-05-18'),
(30, '10', '18', '4', '60000', '3000', '-', '2023-05-18'),
(31, '10', '18', '4', '60000', '3000', '-', '2023-05-18'),
(32, '10', '18', '4', '60000', '5000', '-', '2023-05-18'),
(33, '10', '18', '4', '60000', '3000', '-', '2023-05-19'),
(34, '10', '18', '4', '60000', '3000', '-', '2023-05-19'),
(35, '10', '18', '4', '60000', '3000', '-', '2023-05-19'),
(36, '10', '18', '4', '60000', '3000', '-', '2023-05-19'),
(37, '10', '18', '4', '60000', '3000', '-', '2023-05-19'),
(38, '10', '18', '4', '60000', '5000', '-', '2023-05-19'),
(39, '10', '18', '4', '60000', '5000', '-', '2023-05-19'),
(40, '10', '18', '4', '60000', '5000', '-', '2023-05-19'),
(41, '10', '18', '4', '60000', '5000', '-', '2023-05-19'),
(42, '10', '18', '4', '60000', '5000', '-', '2023-05-25'),
(43, '10', '18', '4', '60000', '9000', '3943200', '2023-05-25'),
(44, '10', '18', '4', '60000', '5000', '-', '2023-05-25'),
(45, '10', '18', '4', '60000', '9000', '3943200', '2023-05-25'),
(46, '10', '18', '4', '60000', '9000', '3943200', '2023-05-25'),
(47, '10', '18', '4', '60000', '9000', '3943200', '2023-05-25'),
(48, '10', '18', '4', '60000', '5000', '-', '2023-05-25'),
(49, '10', '18', '4', '60000', '5000', '-', '2023-05-25');

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
(1, 'admin', '$2y$10$KQt/ILsAUIYGjtVKbYau/uieqpCN222uUMaIIVq9sCvuxkWxvGYDu', 'Heru', 'admin', '2023-05-25'),
(4, 'admin11', '$2y$10$I9XsaqXylDNDwNUYfJjyw.lvNQ8L7.Dzpf6K94BxzDhZAI5GXaES6', 'Maruf Amin', 'admin', '2023-05-25'),
(5, 'admin1', '$2y$10$wIk1jl1RnSnq5zVtSOfjDuhXDZsBIBlnBhl5LCcHKs8P8Y42RiQCa', 'Heru', 'admin', '2023-05-25'),
(6, 'atasan1', '$2y$10$ROtH4.sK2ObHpnbVf5ozeuIzJ7uA0x9Pi4HbKzTfUdTD.URF8tDDG', 'Pak Budi', 'atasan', '2023-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
