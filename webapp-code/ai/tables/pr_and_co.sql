-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 11:06 AM
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
-- Table structure for table `pr_and_co`
--

CREATE TABLE `pr_and_co` (
  `id` int(11) NOT NULL,
  `prompts` varchar(255) NOT NULL,
  `completions` varchar(255) NOT NULL,
  `charid` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pr_and_co`
--

INSERT INTO `pr_and_co` (`id`, `prompts`, `completions`, `charid`, `session_id`) VALUES
(13, 'Hello', 'Hii, How are you?', 2, 'jpa0ts3g5dajtc5f2ii299afp0'),
(14, 'why', 'not', 9, 'mc20tbvqt5qu40tjbaue5sckhb'),
(15, 'ola,bro', 'ola', 9, 'mc20tbvqt5qu40tjbaue5sckhb'),
(16, 'sky diving', 'why not ! adventurous, yes or no', 9, 'mc20tbvqt5qu40tjbaue5sckhb'),
(17, 'hello you', 'hii,how are you?', 10, 'mc20tbvqt5qu40tjbaue5sckhb'),
(18, 'below average', 'average', 11, 'mc20tbvqt5qu40tjbaue5sckhb'),
(19, 'go away', 'far way', 11, 'mc20tbvqt5qu40tjbaue5sckhb'),
(20, 'see there', 'you pervert', 11, 'mc20tbvqt5qu40tjbaue5sckhb'),
(21, 'hello there', 'hii there', 12, 'p0vaflfu81ijtmbq3cvalg5uvh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pr_and_co`
--
ALTER TABLE `pr_and_co`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pr_and_co`
--
ALTER TABLE `pr_and_co`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
