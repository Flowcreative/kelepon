-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 06:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klepon`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `password` text NOT NULL,
  `time_reg` varchar(20) NOT NULL,
  `tgl_reg` varchar(10) NOT NULL,
  `foto_profile` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `token` int(6) NOT NULL,
  `url` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telepon`, `password`, `time_reg`, `tgl_reg`, `foto_profile`, `status`, `token`, `url`, `role`) VALUES
('sZBhbcg1C', 'SI Popon', 'dev.rafin@gmail.com', '082377936674', '$2y$10$v.hh7a8OOLj8RCg9mYNrmekWdNwJtsQkfMRR0lwly4KD/g/BXJab2', '1635700712', '2021-10-31', 'popon.png', 1, 716701, 'B4baXCoeGdjeoKVEFqjCpLYKkG63EpfDr7A9Vn4VAuM=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_activation`
--

CREATE TABLE `user_activation` (
  `id` int(50) NOT NULL,
  `id_user` varchar(9) NOT NULL,
  `token` int(6) NOT NULL,
  `url` text NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_activation`
--

INSERT INTO `user_activation` (`id`, `id_user`, `token`, `url`, `date`, `time`) VALUES
(1, 'eHYDniKV5', 901493, '/E+Br1a6wKgMgJ7Watnvn4lSj1UOlE3HogSlvIcqbp8=', '2021-11-01', '04:54:49pm'),
(2, '5HCm84wqe', 622789, 'Frd4DzHJyDzqjvrWshjrQvyLdOes2WhqqroJtuAoI68=', '2021-11-01', '05:38:23pm'),
(3, 'Dcy7hw6ox', 179850, 'JeXRL90FyCzv9gsQzD1HEBABg64K3T2eZry4nEw/E6U=', '2021-11-01', '05:41:12pm'),
(4, 'wcRPH9zkv', 775976, '0jjBx4f4rAgcQ9gdZnzMBteGFYoguWR1Pynx6bTfLEA=', '2021-11-01', '05:46:28pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activation`
--
ALTER TABLE `user_activation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
