-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 11:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `char_model`
--

CREATE TABLE `char_model` (
  `charid` int(11) NOT NULL,
  `char_name` varchar(255) NOT NULL,
  `char_image` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `char_model`
--

INSERT INTO `char_model` (`charid`, `char_name`, `char_image`, `uid`) VALUES
(9, 'whythough', 'photo-1503023345310-bd7c1de61c7d.jpg', 2),
(10, 'sweet', 'pexels-photo-674010.jpeg', 2),
(11, 'hola', 'chatbot.gif', 2),
(12, 'Flora', 'pexels-photo-674010.jpeg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `char_model`
--
ALTER TABLE `char_model`
  ADD PRIMARY KEY (`charid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `char_model`
--
ALTER TABLE `char_model`
  MODIFY `charid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
