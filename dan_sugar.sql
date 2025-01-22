-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 أبريل 2024 الساعة 23:00
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dan_sugar`
--

-- --------------------------------------------------------

--
-- بنية الجدول `sugar_data`
--

CREATE TABLE `sugar_data` (
  `sugar_id` int(100) NOT NULL,
  `sugar_name` varchar(255) NOT NULL,
  `sugar_type` varchar(255) NOT NULL,
  `health_impact` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sugar_data`
--

INSERT INTO `sugar_data` (`sugar_id`, `sugar_name`, `sugar_type`, `health_impact`) VALUES
(3, 'blood - 1', 'brown sugar', 'jnwekjde'),
(4, 'blood - 2', 'white sugar', 'jnwme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sugar_data`
--
ALTER TABLE `sugar_data`
  ADD PRIMARY KEY (`sugar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sugar_data`
--
ALTER TABLE `sugar_data`
  MODIFY `sugar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
