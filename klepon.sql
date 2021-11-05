-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 05:41 PM
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
-- Table structure for table `datadiri`
--

CREATE TABLE `datadiri` (
  `id` int(11) NOT NULL,
  `id_pangkalan` int(10) NOT NULL,
  `id_golongan` int(10) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `kartu_identitas` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `suratmandat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `datapangkalan`
--

CREATE TABLE `datapangkalan` (
  `id` int(3) NOT NULL,
  `namapangkalan` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emailrequest`
--

CREATE TABLE `emailrequest` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(3) NOT NULL,
  `golongan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `golongan`) VALUES
(1, 'siaga'),
(2, 'penggalang'),
(5, 'penegak'),
(6, 'pandega'),
(7, 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_datadiri` int(11) NOT NULL,
  `id_lomba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id` int(11) NOT NULL,
  `id_golongan` int(10) NOT NULL,
  `matalomba` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('a5ePO9fhj', 'peserta', 'peserta@mail.com', '082375332212', '$2y$10$oYh2kD3ABdzI1o8kUOAxk.pBRXnFqtuZgLX9Oz3koMofPdCZilUYq', '04:19:01pm', '2021-11-03', 'default.png', 1, 557928, 'bcd4j9K4aPE0txI8D4ZX5j3eRckp1/U113ybYnF2kuc=', 2),
('C7B1DVtcE', 'Flow Creative', 'socia.rafin@gmail.com', '08123949294', '$2y$10$qRQwbPCkc.xaWvwCSAwzzucaBQKUIuDyNO2s8.d/wsMlw.M6.xS8W', '02:51:18pm', '2021-11-04', 'default.png', 2, 900259, '2AwE3GAn+CcX4rUYlCgZ0H1MeitB3KAzC2nECk+bP+E=', 2),
('sZBhbcg1C', 'SI Popon', 'dev.rafin@gmail.com', '082377936674', '$2y$10$gFoFAEvFk/d4Yw6SYamlgedI57JVDk3YKV3sXQjXbREnM0aZZ6X1K', '1635700712', '2021-10-31', 'popon.png', 1, 596216, '5DJ6uGKZc+cLsj9FZcNegucFahhFRo4Zu0Ws2Ss3Rvk=', 1),
('vAJE6dTMe', 'Rafin Annnnn', 'coba@mail.com', '082373889803', '$2y$10$rMxNpC9IP7dL/l8TKwL6U.cqkpc8MTJSOBPsU5VoHuCvZ2Vehpqcm', '04:04:43pm', '2021-11-04', 'default.png', 2, 993947, 'HVa8T/iT5oSFmJsztdgpFVfVZxehRFmq/mpuVtwyPMs=', 2);

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
(21, 'X2aivx3R1', 549181, 'ZpPB98f+TbK5FE8QXVPKXuRZMSXLf9oLnWw53FAgcw8=', '2021-11-03', '01:56:08pm'),
(23, '9VCxHqArP', 388170, 'tAQ1/4icnY5xW4tNIC+ChQtisxNes2ORvKIhoPeqyRU=', '2021-11-04', '10:44:19am'),
(24, 'C7B1DVtcE', 726216, 'j8DJKKzEOcbJMNtlhLP34aAPMQKEOJsWswOV1ys0ADg=', '2021-11-04', '02:51:18pm'),
(25, 'vAJE6dTMe', 287898, '2h7BDSZg7J2KBmqENyP2boxQKP13vPhhFcp+T88UFW8=', '2021-11-04', '04:04:43pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datadiri`
--
ALTER TABLE `datadiri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailrequest`
--
ALTER TABLE `emailrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `datadiri`
--
ALTER TABLE `datadiri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailrequest`
--
ALTER TABLE `emailrequest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
