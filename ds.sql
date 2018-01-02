-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2017 at 12:52 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginattempts`
--

INSERT INTO `loginattempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('::1', 1, '2017-10-18 12:14:18', 'rony', 1),
('::1', 2, '2017-10-18 12:14:24', 'rony1', 2),
('10.47.150.143', 4, '2017-11-02 15:41:44', '', 3),
('10.47.150.143', 2, '2017-10-27 14:59:08', 'asdfas', 4),
('10.47.150.143', 1, '2017-10-27 16:52:36', 'rony', 5),
('10.47.150.143', 4, '2017-10-27 15:39:48', 'df', 6),
('10.47.150.143', 2, '2017-10-27 16:03:12', 'ro', 7),
('10.47.150.143', 1, '2017-11-06 23:56:52', 'adit', 8),
('10.47.150.143', 2, '2017-10-27 16:42:04', 'fs', 9),
('10.47.150.143', 3, '2017-10-27 16:44:05', 'saf', 10),
('10.47.150.143', 2, '2017-10-27 16:46:18', 'sfd', 11),
('10.47.150.143', 2, '2017-10-27 16:52:26', 'tes', 12),
('10.47.150.143', 2, '2017-10-27 18:38:20', 'tes123', 13),
('10.47.150.143', 1, '2017-10-27 18:57:20', 'addit', 14),
('10.47.150.143', 1, '2017-10-27 19:00:26', 'aditias', 15),
('10.47.150.143', 2, '2017-11-06 08:56:06', 'dsuser', 16);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `verified`, `mod_timestamp`) VALUES
('148490820559f31f645f861', 'adit', '$2y$10$ehwyL1yipyAwvN8yo4Y0KuQgg7JKVX/5IiKXRwFOCsGAfhTqcg86W', 1, '2017-10-27 11:58:28'),
('1673759e7154b59db9', 'rony', '$2y$10$61AFGU4zJNYLg.5..ZT7buKzgxmpcQ.PaC64ESsv63j1d6nFwxXm6', 1, '2017-10-18 08:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capacity`
--

CREATE TABLE `tbl_capacity` (
  `id` int(11) NOT NULL,
  `DCName` varchar(30) NOT NULL,
  `floor` varchar(5) NOT NULL,
  `power` int(11) NOT NULL,
  `cooling` int(11) NOT NULL,
  `space` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_capacity`
--

INSERT INTO `tbl_capacity` (`id`, `DCName`, `floor`, `power`, `cooling`, `space`) VALUES
(1, 'BRN', '2', 5000, 7000, 9000),
(2, 'BRN', '3', 6000, 8000, 10000),
(3, 'BRN', '4', 7000, 8000, 9000),
(4, 'BSD', '1', 6000, 3000, 2000),
(5, 'BSD', '3', 7000, 4000, 3000),
(6, 'TBS', '3', 8000, 5000, 4000),
(7, 'TBS', '4', 6000, 3000, 2000),
(8, 'TBS', '5', 7000, 4000, 3000),
(52, 'SBY', '1', 4000, 5000, 6000),
(53, 'SBY', 'M', 5000, 8000, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `DCName` varchar(30) NOT NULL,
  `floor` varchar(5) NOT NULL,
  `power` int(11) NOT NULL,
  `cooling` int(11) NOT NULL,
  `space` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `date`, `DCName`, `floor`, `power`, `cooling`, `space`) VALUES
(1, '2017-10-28', 'BRN', '2', 2000, 4000, 5000),
(2, '2017-10-28', 'BRN', '3', 4000, 800, 1000),
(3, '2017-10-28', 'BRN', '4', 400, 800, 1000),
(4, '2017-10-28', 'BSD', '1', 400, 800, 1000),
(5, '2017-10-28', 'BSD', '3', 400, 800, 1000),
(6, '2017-10-28', 'TBS', '3', 400, 800, 1000),
(7, '2017-10-28', 'TBS', '4', 400, 800, 1000),
(8, '2017-10-28', 'TBS', '5', 400, 800, 1000),
(9, '2017-10-29', 'BRN', '2', 1500, 2000, 1000),
(10, '2017-10-29', 'BRN', '3', 1000, 800, 1000),
(11, '2017-10-29', 'BRN', '4', 1500, 800, 1000),
(12, '2017-10-29', 'BSD', '1', 1000, 800, 1000),
(13, '2017-10-29', 'BSD', '3', 1000, 800, 1000),
(14, '2017-10-29', 'TBS', '3', 1000, 800, 1000),
(15, '2017-10-29', 'TBS', '4', 1000, 800, 1000),
(16, '2017-10-29', 'TBS', '5', 1000, 800, 1000),
(17, '2017-10-30', 'BRN', '2', 1500, 1800, 2000),
(18, '2017-10-30', 'BRN', '3', 2000, 800, 1000),
(19, '2017-10-30', 'BRN', '4', 2000, 800, 1000),
(20, '2017-10-30', 'BSD', '1', 2000, 800, 1000),
(21, '2017-10-30', 'BSD', '3', 2000, 800, 1000),
(22, '2017-10-30', 'TBS', '3', 2000, 800, 1200),
(23, '2017-10-30', 'TBS', '4', 2000, 800, 1200),
(24, '2017-10-30', 'TBS', '5', 2000, 800, 2000),
(25, '2017-10-31', 'BRN', '2', 400, 8000, 1000),
(26, '2017-10-31', 'BRN', '3', 2400, 800, 1500),
(27, '2017-10-31', 'BRN', '4', 3400, 800, 1500),
(28, '2017-10-31', 'BSD', '1', 2400, 1800, 2500),
(29, '2017-10-31', 'BSD', '3', 2400, 1800, 1500),
(30, '2017-10-31', 'TBS', '3', 2400, 1000, 1500),
(31, '2017-10-31', 'TBS', '4', 2400, 1000, 1500),
(32, '2017-10-31', 'TBS', '5', 2400, 1000, 5000),
(33, '2017-11-01', 'BRN', '2', 500, 600, 700),
(34, '2017-11-01', 'BRN', '3', 3400, 900, 1500),
(35, '2017-11-01', 'BRN', '4', 5400, 900, 1500),
(36, '2017-11-01', 'BSD', '1', 3400, 2900, 3500),
(37, '2017-11-01', 'BSD', '3', 3400, 2900, 1500),
(38, '2017-11-01', 'TBS', '3', 5400, 2000, 2000),
(39, '2017-11-01', 'TBS', '4', 3400, 1000, 2000),
(40, '2017-11-01', 'TBS', '5', 5400, 2000, 6000),
(41, '2017-11-02', 'BRN', '2', 1400, 1500, 500),
(42, '2017-11-02', 'BRN', '3', 1000, 1500, 500),
(43, '2017-11-02', 'BRN', '4', 500, 1500, 500),
(44, '2017-11-02', 'BSD', '1', 1000, 1500, 500),
(45, '2017-11-02', 'BSD', '3', 1000, 1500, 500),
(46, '2017-11-02', 'TBS', '3', 1000, 1500, 500),
(47, '2017-11-02', 'TBS', '4', 1000, 1500, 500),
(48, '2017-11-02', 'TBS', '5', 1000, 1500, 500),
(72, '2017-11-07', 'SBY', 'M', 1000, 1000, 2000),
(74, '2017-11-07', 'SBY', '1', 1000, 2000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dc`
--

CREATE TABLE `tbl_dc` (
  `DCName` varchar(30) NOT NULL,
  `DCAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dc`
--

INSERT INTO `tbl_dc` (`DCName`, `DCAddress`) VALUES
('BRN', 'Buaran Jkt'),
('BSD', 'BSD Serpong'),
('SBY', 'Surabaya, Jawa Timur'),
('Solo', 'Solo Data Center, Central Java Indonesia'),
('TBS', 'Jln. TB Simatupang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `tbl_capacity`
--
ALTER TABLE `tbl_capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dc`
--
ALTER TABLE `tbl_dc`
  ADD PRIMARY KEY (`DCName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_capacity`
--
ALTER TABLE `tbl_capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
