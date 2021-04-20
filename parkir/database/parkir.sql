-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 05:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tempat_parkir`
--

CREATE TABLE `tempat_parkir` (
  `id_parkir` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tipe_parkir` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `blokir` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tempat_parkir`
--

INSERT INTO `tempat_parkir` (`id_parkir`, `tipe_parkir`, `blokir`) VALUES
('PKR001', 'Mobil', 'Y'),
('PKR002', 'Mobil', 'N'),
('PKR003', 'Mobil', 'N'),
('PKR004', 'Mobil', 'N'),
('PKR005', 'Mobil', 'Y'),
('PKR006', 'Mobil', 'N'),
('PKR007', 'Mobil', 'N'),
('PKR008', 'Motor', 'Y'),
('PKR009', 'Motor', 'Y'),
('PKR010', 'Motor', 'Y'),
('PKR012', 'Motor', 'Y'),
('PKR011', 'Motor', 'Y'),
('PKR013', 'Motor', 'Y'),
('PKR014', 'Motor', 'Y'),
('PKR015', 'Mobil', 'Y'),
('PKR016', 'Mobil', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tiket_parkir`
--

CREATE TABLE `tiket_parkir` (
  `id_tiket` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_parkir` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_keluar` datetime NOT NULL,
  `jenis_kendaraan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tarif` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tiket_parkir`
--

INSERT INTO `tiket_parkir` (`id_tiket`, `id_parkir`, `jam_masuk`, `jam_keluar`, `jenis_kendaraan`, `tarif`) VALUES
('TKP032', '', '2020-10-15 17:13:37', '2020-10-15 17:14:44', 'Motor', '2000'),
('TKP033', '', '2020-10-15 17:19:00', '2020-10-15 17:21:05', 'Mobil', '5000'),
('TKP034', '', '2020-10-15 17:25:56', '2020-10-15 17:26:35', 'Motor', '2000'),
('TKP035', '', '2020-12-26 11:49:39', '2020-12-26 11:52:29', 'Mobil', '5000'),
('TKP036', 'PKR001', '2020-12-26 14:01:22', '0000-00-00 00:00:00', 'Mobil', NULL),
('TKP037', 'PKR008', '2020-12-26 14:05:13', '0000-00-00 00:00:00', 'Motor', NULL),
('TKP012', '', '2020-10-12 20:18:17', '2020-10-14 09:20:41', '', '40000'),
('TKP013', '', '2020-10-12 20:19:12', '2020-10-15 13:47:49', '', '68000'),
('TKP014', '', '2020-10-12 20:20:00', '2020-10-15 16:10:32', 'Mobil', '72000'),
('TKP015', '', '2020-10-14 09:18:08', '2020-10-15 13:48:06', 'Motor', '31000'),
('TKP016', '', '2020-10-14 09:18:47', '2020-10-15 13:52:21', 'Mobil', '31000'),
('TKP017', '', '2020-10-14 19:08:27', '2020-10-15 13:48:41', 'Motor', '21000'),
('TKP018', '', '2020-10-14 19:11:47', '2020-10-14 19:52:17', 'Motor', '3000'),
('TKP019', '', '2020-10-14 19:12:27', '2020-10-15 13:47:26', 'Mobil', '21000'),
('TKP020', '', '2020-10-14 19:16:19', '2020-10-15 13:47:36', 'Motor', '21000'),
('TKP021', 'PKR014', '2020-10-14 20:17:54', '0000-00-00 00:00:00', 'Mobil', NULL),
('TKP022', 'PKR015', '2020-10-14 20:18:31', '0000-00-00 00:00:00', 'Motor', NULL),
('TKP023', '', '2020-10-14 20:27:24', '2020-10-14 20:27:58', 'Motor', '3000'),
('TKP024', '', '2020-10-14 20:30:17', '2020-10-14 20:31:46', 'Motor', '3000'),
('TKP025', '', '2020-10-14 20:33:09', '2020-10-14 20:37:10', 'Mobil', '3000'),
('TKP026', '', '2020-10-15 13:52:43', '2020-12-26 14:05:01', 'Mobil', '1733000'),
('TKP027', 'PKR009', '2020-10-15 15:25:11', '0000-00-00 00:00:00', 'Motor', NULL),
('TKP028', '', '2020-10-15 16:01:37', '2020-10-15 16:04:23', 'Mobil', '5000'),
('TKP029', '', '2020-10-15 16:02:05', '2020-10-15 16:03:03', 'Motor', '2000'),
('TKP030', 'PKR016', '2020-10-15 16:07:45', '0000-00-00 00:00:00', 'Mobil', NULL),
('TKP031', '', '2020-10-15 16:11:56', '2020-10-15 16:13:02', 'Mobil', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nip` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nip`, `blokir`) VALUES
('admin', 'admin', 'MNJ001', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tempat_parkir`
--
ALTER TABLE `tempat_parkir`
  ADD PRIMARY KEY (`id_parkir`);

--
-- Indexes for table `tiket_parkir`
--
ALTER TABLE `tiket_parkir`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
