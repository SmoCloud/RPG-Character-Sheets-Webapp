-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2024 at 03:13 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `characters`
--

-- --------------------------------------------------------

--
-- Table structure for table `char_sheets`
--

CREATE TABLE `char_sheets` (
  `id` int UNSIGNED NOT NULL,
  `cname` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int UNSIGNED NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `race` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `level` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `char_sheets`
--

INSERT INTO `char_sheets` (`id`, `cname`, `age`, `gender`, `race`, `class`, `level`) VALUES
(1, 'Dreon', 2000, 'male', 'undead', 'cleric', 10),
(2, 'Conan', 37, 'male', 'human', 'barbarian', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `char_sheets`
--
ALTER TABLE `char_sheets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `char_sheets`
--
ALTER TABLE `char_sheets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
