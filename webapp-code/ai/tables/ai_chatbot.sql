-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
(12, 'Flora', 'pexels-photo-674010.jpeg', 3),
(13, 'major2', 'img.jpg', 5),
(14, 'major3', 'photo-1503023345310-bd7c1de61c7d.jpg', 6),
(15, 'major4', 'img.jpg', 6),
(16, 'firsttrial', 'img.jpg', 6),
(17, 'secondtrial', 'img.jpg', 7),
(18, 'newchar', 'pexels-photo-674010.jpeg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(0, 'What is your name', 'My name is Chatbot'),
(0, 'I need help', 'How can I help You'),
(3, 'Hello', 'How can I help you');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `mid` int(11) NOT NULL,
  `model_link` varchar(255) NOT NULL,
  `charid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`mid`, `model_link`, `charid`, `created_at`) VALUES
(1, '', 14, '2023-03-27 10:04:12'),
(2, '', 14, '2023-03-27 10:04:13'),
(3, '', 14, '2023-03-27 10:04:13'),
(4, '', 14, '2023-03-27 10:04:14'),
(5, '', 14, '2023-03-27 10:04:18'),
(6, '', 14, '2023-03-27 10:04:19'),
(7, '', 0, '2023-03-29 12:11:26'),
(8, '', 0, '2023-03-29 12:11:26'),
(9, '', 0, '2023-03-29 12:11:26'),
(10, '', 0, '2023-03-29 12:11:26'),
(11, '', 15, '2023-03-29 12:19:31'),
(12, '', 15, '2023-03-29 12:19:58'),
(13, '', 15, '2023-03-29 12:19:58'),
(14, '', 15, '2023-03-29 12:19:58'),
(15, '', 15, '2023-03-29 12:19:58'),
(16, '', 15, '2023-03-29 12:19:58'),
(17, '', 15, '2023-03-29 12:26:24'),
(18, '', 15, '2023-03-29 12:26:24'),
(19, '', 15, '2023-03-29 12:26:24'),
(20, '', 15, '2023-03-29 12:26:24'),
(21, '', 15, '2023-03-29 12:26:24'),
(22, '', 15, '2023-03-29 12:26:24'),
(23, '', 15, '2023-03-29 12:29:13'),
(24, '', 15, '2023-03-29 12:29:13'),
(25, '', 15, '2023-03-29 12:29:13'),
(26, '', 15, '2023-03-29 12:29:13'),
(27, '', 15, '2023-03-29 12:29:13'),
(28, '', 15, '2023-03-29 12:29:13'),
(29, '', 15, '2023-03-29 12:29:13'),
(30, '', 15, '2023-03-29 12:29:13'),
(31, '', 15, '2023-03-29 12:29:13'),
(32, '', 15, '2023-03-29 12:29:13'),
(33, '', 15, '2023-03-29 12:29:13'),
(34, '', 15, '2023-03-29 12:29:13'),
(35, '', 0, '2023-03-29 12:36:06'),
(36, '', 0, '2023-03-29 12:36:06'),
(37, '', 0, '2023-03-29 12:36:06'),
(38, '', 0, '2023-03-29 12:36:06'),
(39, '', 16, '2023-03-29 13:23:48'),
(40, '', 16, '2023-03-29 13:23:48'),
(41, '', 16, '2023-03-29 13:23:48'),
(42, '', 16, '2023-03-29 13:23:48'),
(43, '', 16, '2023-03-29 13:23:48'),
(44, '', 16, '2023-03-29 13:23:48'),
(45, '', 16, '2023-03-29 13:23:48'),
(46, '', 16, '2023-03-29 13:23:48'),
(47, '', 16, '2023-03-29 13:23:48'),
(48, '', 16, '2023-03-29 13:23:48'),
(49, '', 16, '2023-03-29 13:23:48'),
(50, '', 16, '2023-03-29 13:23:48'),
(51, '', 16, '2023-03-29 13:23:48'),
(52, '', 16, '2023-03-29 13:23:48'),
(53, '', 16, '2023-03-29 13:23:48'),
(54, '', 16, '2023-03-29 13:23:48'),
(55, '', 16, '2023-03-29 13:23:48'),
(56, '', 16, '2023-03-29 13:23:48'),
(57, '', 16, '2023-03-29 13:23:48'),
(58, '', 16, '2023-03-29 13:23:48'),
(59, '', 16, '2023-03-29 13:23:48'),
(60, '', 17, '2023-03-29 14:37:15'),
(61, '', 17, '2023-03-29 14:45:04'),
(62, '', 17, '2023-03-29 14:45:38'),
(63, '', 17, '2023-03-29 14:47:17'),
(64, '', 17, '2023-03-29 14:48:27');

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
(1, 'someting1', 'comple1', 1, '2qmra3mqldn507i66eriflm7vl'),
(2, 'someting2', 'comple2', 1, '2qmra3mqldn507i66eriflm7vl'),
(3, 'someting3', 'comple3', 1, '2qmra3mqldn507i66eriflm7vl'),
(4, 'ffwf', 'wfwfwfwfwf', 1, '2qmra3mqldn507i66eriflm7vl'),
(5, 'prompt1', 'completion1', 1, '2qmra3mqldn507i66eriflm7vl'),
(6, 'prompts for user2', 'completions for user2', 2, 'g27d0tq3a6b5us6s4htqd5biou'),
(7, 'pr1', 'co1', 3, 'sehuvlpd4b1m2h04aa4fbmh8p5'),
(8, 'pr2', 'co2', 3, 'sehuvlpd4b1m2h04aa4fbmh8p5'),
(9, 'pr3', 'co3', 3, 'gc5vks4ckqq1i9619k8n6f300h'),
(10, 'pr4', 'co4', 3, 'gc5vks4ckqq1i9619k8n6f300h'),
(11, 'sample prompt1', 'sample completion1update', 13, '93ut9j6rualj73duvkt1v4mnsa'),
(12, 'sample prompt2', 'sample completion2', 13, '93ut9j6rualj73duvkt1v4mnsa'),
(13, 'sample prompt3', 'sample completion 3', 13, '93ut9j6rualj73duvkt1v4mnsa'),
(14, 'wafawf', 'afwawfawf', 14, 'ceunpk6kkn0f3a65v964slmeu2'),
(15, 'hello', 'awfwafaf', 14, 'ceunpk6kkn0f3a65v964slmeu2'),
(16, 'rgdrthtffff', 'yjgyjtgywafa', 14, 'ceunpk6kkn0f3a65v964slmeu2'),
(17, 'rthrth', 'hello', 14, 'ceunpk6kkn0f3a65v964slmeu2'),
(18, 'wafawf', 'afwawfawf', 0, ''),
(19, 'hello', 'awfwafaf', 0, ''),
(20, 'rgdrthtffff', 'yjgyjtgywafa', 0, ''),
(21, 'rthrth', 'hello', 0, ''),
(22, '', '', 15, ''),
(23, 'wafawf', 'awfawfawf', 15, ''),
(24, 'eogsogoghoigh', 'awfawfawf', 15, ''),
(25, 'awfawfwaf', 'awfawf', 15, ''),
(26, 'tybrtbrtyh', 'hyytj', 15, ''),
(27, 'erhrthrt', 'ioulu', 15, ''),
(28, 'grgrh', 'tjtyjyj', 15, ''),
(29, 'wafawf', 'awfawfawf', 15, ''),
(30, 'eogsogoghoigh', 'awfawfawf', 15, ''),
(31, 'awfawfwaf', 'awfawf', 15, ''),
(32, 'tybrtbrtyh', 'hyytj', 15, ''),
(33, 'erhrthrt', 'ioulu', 15, ''),
(34, 'bbbbbbbb', 'bbbbbbbb', 15, ''),
(35, 'bbbbbbbb', 'bbbbbbbbbb', 15, ''),
(36, 'bbbbbbbb', 'bbbb', 15, ''),
(37, 'bbbbbbbb', 'bbbb', 15, ''),
(38, 'bbbbbbbb', 'bbbbb', 15, ''),
(39, 'erhrthrt', 'ioulu', 15, ''),
(40, 'grgrh', 'tjtyjyj', 15, ''),
(41, 'wafawf', 'bbbbbbbb', 15, ''),
(42, 'eogsogoghoigh', 'bbbbbbbb', 15, ''),
(43, 'awfawfwaf', 'bbbbbbbb', 15, ''),
(44, 'tybrtbrtyh', 'bbbbbbbb', 15, ''),
(45, 'erhrthrt', 'bbbbbbbb', 15, ''),
(46, 'wafawf', 'afwawfawf', 0, ''),
(47, 'hello', 'awfwafaf', 0, ''),
(48, 'rgdrthtffff', 'yjgyjtgywafa', 0, ''),
(49, 'rthrth', 'hello', 0, ''),
(50, 'But remember how you went eighty-seven days without fish and then we caught big ones every day for three weeks.', 'I remember, I know you did not leave me because you doubted.', 16, ''),
(51, 'It was papa made me leave. I am a boy and I must obey him.', 'I know, It is quite normal.', 16, ''),
(52, 'Santiago, Can I go out to get sardines for you for tomorrow?', 'No. Go and play baseball. I can still row and Rogelio will throw the net.', 16, ''),
(53, 'I would like to go. If I cannot fish with you, I would like to serve in some way.', 'You bought me a beer, You are already a man.', 16, ''),
(54, 'How old was I when you first took me in a boat?', 'Five and you nearly were killed when I brought the fish in too green and he nearly tore the boat to pieces. Can you remember?', 16, ''),
(55, 'May I get the sardines? I know where I can get four baits too.', 'I have mine left from today. I put them in salt in the box.', 16, ''),
(56, 'No, But I will see something that he cannot see such as a bird working and get him to come out after dolphin.', 'Are your fathers eyes that bad?', 16, ''),
(57, 'He is almost blind.', 'It is strange, He never went turtle-ing. That is what kills the eyes.', 16, ''),
(58, 'But you went turtle-ing for years off the Mosquito Coast and your eyes are good.', 'I am a strange old man.', 16, ''),
(59, 'But are you strong enough now for a truly big fish?', 'I think so. And there are many tricks.', 16, ''),
(60, 'Let us take the stuff home, So I can get the cast net and go after the sardines. What do you have to eat?', 'A pot of yellow rice with fish. Do you want some?', 16, ''),
(61, 'No. I will eat at home. Do you want me to make the fire?', 'No. I will make it later on. Or I may eat the rice cold.', 16, ''),
(62, 'But I fear the Indians of Cleveland.', 'Have faith in the Yankees my son. Think of the great DiMaggio.', 16, ''),
(63, 'I fear both the Tigers of Detroit and the Indians of Cleveland.', 'Be careful or you will fear even the Reds of Cincinnati and the White Sox of Chicago.', 16, ''),
(64, 'mghmghm', 'kukhk', 17, ''),
(65, 'qw3rwv3', 'brbd', 17, ''),
(66, 'vbrvf', 'drnbtnym', 17, ''),
(67, 'mghmghm', 'kukhk', 17, ''),
(68, 'qw3rwv3', 'brbd', 17, ''),
(69, 'vbrvf', 'drnbtnym', 17, ''),
(70, 'mghmghm', 'kukhk', 17, ''),
(71, 'qw3rwv3', 'brbd', 17, ''),
(72, 'vbrvf', 'drnbtnym', 17, ''),
(73, 'mghmghm', 'kukhk', 17, ''),
(74, 'qw3rwv3', 'brbd', 17, ''),
(75, 'vbrvf', 'drnbtnym', 17, ''),
(76, 'mghmghm', 'kukhk', 17, ''),
(77, 'qw3rwv3', 'brbd', 17, ''),
(78, 'vbrvf', 'drnbtnym', 17, ''),
(79, 'mghmghm', 'kukhk', 17, ''),
(80, 'qw3rwv3', 'brbd', 17, ''),
(81, 'vbrvf', 'drnbtnym', 17, ''),
(82, 'mghmghm', 'kukhk', 17, ''),
(83, 'qw3rwv3', 'brbd', 17, ''),
(84, 'vbrvf', 'drnbtnym', 17, ''),
(85, 'mghmghm', 'kukhk', 17, ''),
(86, 'qw3rwv3', 'brbd', 17, ''),
(87, 'vbrvf', 'drnbtnym', 17, ''),
(88, 'mghmghm', 'kukhk', 17, ''),
(89, 'qw3rwv3', 'brbd', 17, ''),
(90, 'vbrvf', 'drnbtnym', 17, ''),
(91, 'mghmghm', 'kukhk', 17, ''),
(92, 'qw3rwv3', 'brbd', 17, ''),
(93, 'vbrvf', 'drnbtnym', 17, ''),
(94, 'mghmghm', 'kukhk', 17, ''),
(95, 'qw3rwv3', 'brbd', 17, ''),
(96, 'vbrvf', 'drnbtnym', 17, ''),
(97, 'mghmghm', 'kukhk', 17, ''),
(98, 'qw3rwv3', 'brbd', 17, ''),
(99, 'vbrvf', 'drnbtnym', 17, ''),
(100, 'mghmghm', 'kukhk', 17, ''),
(101, 'qw3rwv3', 'brbd', 17, ''),
(102, 'vbrvf', 'drnbtnym', 17, ''),
(103, 'mghmghm', 'kukhk', 17, ''),
(104, 'qw3rwv3', 'brbd', 17, ''),
(105, 'vbrvf', 'drnbtnym', 17, ''),
(106, 'mghmghm', 'kukhk', 17, ''),
(107, 'qw3rwv3', 'brbd', 17, ''),
(108, 'vbrvf', 'drnbtnym', 17, ''),
(109, 'mghmghm', 'kukhk', 17, ''),
(110, 'mghmghm', 'kukhk', 17, ''),
(111, 'mghmghm', 'kukhk', 17, ''),
(112, 'mghmghm', 'kukhk', 17, ''),
(113, 'mghmghm', 'kukhk', 17, ''),
(114, 'mghmghm', 'kukhk', 17, ''),
(115, 'qw3rwv3', 'brbd', 17, ''),
(116, 'vbrvf', 'drnbtnym', 17, ''),
(117, 'mghmghm', 'kukhk', 17, ''),
(118, 'qw3rwv3', 'brbd', 17, ''),
(119, 'vbrvf', 'drnbtnym', 17, ''),
(120, 'mghmghm', 'kukhk', 17, ''),
(121, 'qw3rwv3', 'brbd', 17, ''),
(122, 'vbrvf', 'drnbtnym', 17, ''),
(123, 'mghmghm', 'kukhk', 17, ''),
(124, 'qw3rwv3', 'brbd', 17, ''),
(125, 'vbrvf', 'drnbtnym', 17, ''),
(126, 'mghmghm', 'kukhk', 17, ''),
(127, 'qw3rwv3', 'brbd', 17, ''),
(128, 'vbrvf', 'drnbtnym', 17, ''),
(129, 'mghmghm', 'kukhk', 17, ''),
(130, 'qw3rwv3', 'brbd', 17, ''),
(131, 'vbrvf', 'drnbtnym', 17, ''),
(132, 'mghmghm', 'kukhk', 17, ''),
(133, 'qw3rwv3', 'brbd', 17, ''),
(134, 'vbrvf', 'drnbtnym', 17, ''),
(135, 'mghmghm', 'kukhk', 17, ''),
(136, 'qw3rwv3', 'brbd', 17, ''),
(137, 'vbrvf', 'drnbtnym', 17, ''),
(138, 'fwafafawgg', 'gg', 18, ''),
(139, 'awfawfgg', 'awfawfggg', 18, ''),
(140, 'awfafgg', 'awfawfgg', 18, ''),
(141, 'awfawffggg', 'wafawfawfgg', 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', 'pass1'),
(2, 'user2', 'pass2'),
(3, '1234', '1234'),
(4, 'heythere1', 'heythere1'),
(5, 'heythere2', 'heythere2'),
(6, 'heythere3', 'heythere3'),
(7, 'heythere4', 'heythere4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `char_model`
--
ALTER TABLE `char_model`
  ADD PRIMARY KEY (`charid`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `pr_and_co`
--
ALTER TABLE `pr_and_co`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `char_model`
--
ALTER TABLE `char_model`
  MODIFY `charid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pr_and_co`
--
ALTER TABLE `pr_and_co`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
