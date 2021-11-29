-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 02:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelepon`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `merchant_ref` varchar(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_method_code` varchar(25) NOT NULL,
  `total_amount` int(8) NOT NULL,
  `fee_merchant` int(6) NOT NULL,
  `fee_customer` int(6) NOT NULL,
  `total_fee` int(6) NOT NULL,
  `amount_received` int(6) NOT NULL,
  `is_closed_payment` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `paid_at` int(25) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `reference`, `merchant_ref`, `payment_method`, `payment_method_code`, `total_amount`, `fee_merchant`, `fee_customer`, `total_fee`, `amount_received`, `is_closed_payment`, `status`, `paid_at`, `note`) VALUES
(2, 'Admin Kestari Prabu', 'znLaJlqiy', 'Offline sama Si POPON', 'KELEPON', 70000, 0, 0, 0, 70000, 1, '3', 1637495898, 'Terimakasih ????');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(16) NOT NULL,
  `id_user` varchar(9) NOT NULL,
  `id_lomba` int(11) NOT NULL,
  `identitas` varchar(25) NOT NULL,
  `karya` text NOT NULL,
  `peserta` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `id_user`, `id_lomba`, `identitas`, `karya`, `peserta`) VALUES
(1637478483, 'znLaJlqiy', 4737, '', '', 1),
(1637478484, 'znLaJlqiy', 2789, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id` int(11) NOT NULL,
  `id_golongan` int(10) NOT NULL,
  `matalomba` varchar(50) NOT NULL,
  `biaya` int(6) NOT NULL,
  `status` int(11) NOT NULL,
  `tim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id`, `id_golongan`, `matalomba`, `biaya`, `status`, `tim`) VALUES
(1547, 4, 'Essai', 30000, 1, 1),
(2789, 3, 'Syahril Qur\'an', 40000, 1, 2),
(4328, 1, 'Membaca Puisi', 25000, 1, 1),
(4737, 3, 'Fotografi', 30000, 1, 1),
(6791, 5, 'Essai', 30000, 1, 1),
(7542, 2, 'Tilawah', 30000, 1, 1),
(7745, 2, 'Video Edukasi Pramuka', 30000, 1, 1),
(8147, 1, 'Membaca Dongeng', 25000, 1, 1),
(8337, 3, 'Film Pendek', 40000, 1, 2),
(8359, 2, 'Olimpiade Pramuka Online', 30000, 1, 1),
(9182, 3, 'Stand Up Comedy', 30000, 1, 1),
(9647, 4, 'Video Pembelajaran Pramuka', 30000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(7) NOT NULL,
  `id_user` varchar(9) NOT NULL,
  `total` int(6) NOT NULL,
  `status_payment` int(1) NOT NULL,
  `kode_chanel` varchar(25) NOT NULL,
  `chanel` varchar(50) NOT NULL,
  `admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `id_user`, `total`, `status_payment`, `kode_chanel`, `chanel`, `admin`) VALUES
(9660680, 'znLaJlqiy', 70000, 3, 'OVO', 'OVO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(5) NOT NULL,
  `chane` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `chanel` varchar(50) NOT NULL,
  `admin` int(5) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `chane`, `kode`, `chanel`, `admin`, `gambar`) VALUES
(1, 0, 'MYBVA', 'Maybank Virtual Account', 4250, ''),
(2, 0, 'PERMATAVA', 'Permata Virtual Account', 4250, ''),
(3, 0, 'BNIVA', 'BNI Virtual Account', 4250, ''),
(4, 0, 'BRIVA', 'BRI Virtual Account', 4250, ''),
(5, 0, 'MANDIRIVA', 'Mandiri Virtual Account', 4250, ''),
(6, 0, 'BCAVA', 'BCA Virtual Account', 4250, ''),
(7, 0, 'SMSVA', 'Sinarmas Virtual Account', 4250, ''),
(8, 0, 'MUAMALATVA', 'Muamalat Virtual Account', 4250, ''),
(9, 0, 'CIMBVA', 'CIMB Virtual Account', 4250, ''),
(10, 0, 'SAMPOERNAVA', 'Sahabat Sampoerna Virtual Account', 4250, ''),
(11, 2, 'ALFAMART', 'Alfamart', 3500, ''),
(12, 2, 'INDOMARET', 'Indomaret', 3500, ''),
(13, 2, 'ALFAMIDI', 'Alfamidi', 3500, ''),
(14, 1, 'OVO', 'OVO', 2, ''),
(15, 1, 'QRIS', 'QRIS', 750, '');

-- --------------------------------------------------------

--
-- Table structure for table `paymenturl`
--

CREATE TABLE `paymenturl` (
  `id` int(11) NOT NULL,
  `id_user` varchar(9) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenturl`
--
ALTER TABLE `paymenturl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1637478485;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9648;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `paymenturl`
--
ALTER TABLE `paymenturl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
