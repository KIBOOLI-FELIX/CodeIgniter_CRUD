-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 08:04 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'felix Kibooli Melchizedek Esaiahs', 'kiboolifd@gmail.com', '0786644987', 'Masters In Theology7', NULL, '2023-03-17 04:12:50', NULL),
(2, 'wasukira Isaac', 'isaacwasukira@gmail.com', '078665456', 'CPPA', NULL, '2023-03-15 00:21:28', NULL),
(3, 'Nabuduwa Enid', 'enid@gmail.com', '0786644987', 'BLL2', NULL, '2023-03-15 00:41:40', NULL),
(4, 'Nakiganda Esther Joy', 'EstherJoy@gmail.com', '07889676567', 'LLB', '2023-03-14 09:17:55', '2023-05-02 03:01:10', NULL),
(5, 'Savio Murungi', 'xwall@gmail.com', '0786644987', 'WEb Master', '2023-03-14 09:23:02', '2023-03-14 17:21:06', NULL),
(6, 'Boniface Egwa', 'Boniface@gmail.com', '0788664567', 'Doctorate in Medicine', '2023-03-15 00:42:38', '2023-03-15 00:42:38', NULL),
(7, 'gg', 'ff', 'vv', 'bb', '2023-03-15 05:14:35', '2023-03-15 05:14:35', NULL),
(8, 'kibooli felix', 'kiboolifelix@gmail.com', '0786644987', 'bele', '2023-03-16 02:50:59', '2023-03-16 02:50:59', NULL),
(9, 'fff', 'fff', 'gggg', 'ggg', '2023-03-16 03:04:26', '2023-03-16 03:04:26', NULL),
(10, 'ddd', 'ggg', 'gggg', 'gggg', '2023-03-16 03:06:20', '2023-03-16 03:06:20', NULL),
(11, 'vbb', 'nnnn', 'nnn', 'bbnn', '2023-03-16 03:08:06', '2023-03-16 03:08:06', NULL),
(12, 'fff', 'fff', 'ff', 'ff', '2023-03-17 03:21:12', '2023-03-17 03:21:12', NULL),
(13, 'bb', 'nn', 'vvv', 'bbbb', '2023-03-17 04:19:26', '2023-03-17 04:19:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
