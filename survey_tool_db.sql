-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 08:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_tool_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_ID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `option_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_ID`, `type`, `text`, `option_ID`) VALUES
(5, 'TextBox', 'aaaaaaaaaa', 0),
(6, 'MultipleChoice', 'Carl', 42),
(7, 'TextBox', 'ben', 0),
(8, 'MultipleChoice', 'Daryl', 44),
(11, 'TextBox', 'ssssss', 0),
(12, 'MultipleChoice', 'Shane', 43),
(13, 'TextBox', 'test', 0),
(14, 'MultipleChoice', '', 42),
(15, 'TextBox', 'my answer to this question', 0),
(16, 'MultipleChoice', '', 43),
(17, 'TextBox', 'my answer to this question is....', 0),
(18, 'MultipleChoice', '', 41),
(19, 'TextBox', 'BMW', 0),
(20, 'MultipleChoice', '', 57),
(21, 'TextBox', 'Ford', 0),
(22, 'MultipleChoice', '', 59),
(23, 'TextBox', 'Mercedes', 0),
(24, 'MultipleChoice', '', 57),
(25, 'TextBox', 'Bently', 0),
(26, 'MultipleChoice', '', 60),
(27, 'TextBox', 'Audi', 0),
(28, 'MultipleChoice', '', 57),
(29, 'TextBox', 'BMW', 0),
(30, 'MultipleChoice', '', 58);

-- --------------------------------------------------------

--
-- Table structure for table `answer_response`
--

CREATE TABLE `answer_response` (
  `response_ID` int(11) NOT NULL,
  `answer_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer_response`
--

INSERT INTO `answer_response` (`response_ID`, `answer_ID`, `question_ID`) VALUES
(5, 5, 26),
(5, 6, 27),
(6, 7, 26),
(6, 8, 27),
(8, 11, 26),
(8, 12, 27),
(9, 13, 26),
(9, 14, 27),
(10, 15, 26),
(10, 16, 27),
(11, 17, 26),
(11, 18, 27),
(12, 19, 35),
(12, 20, 36),
(13, 21, 35),
(13, 22, 36),
(14, 23, 35),
(14, 24, 36),
(15, 25, 35),
(15, 26, 36),
(16, 27, 35),
(16, 28, 36),
(17, 29, 35),
(17, 30, 36);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_ID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_ID`, `type`, `text`) VALUES
(41, 'MultipleChoice', 'Rick'),
(42, 'MultipleChoice', 'Carl'),
(43, 'MultipleChoice', 'Shane'),
(44, 'MultipleChoice', 'Daryl'),
(45, 'MultipleChoice', 'op1'),
(46, 'MultipleChoice', 'op2'),
(47, 'MultipleChoice', 'op3'),
(48, 'MultipleChoice', 'op4'),
(49, 'MultipleChoice', 'a1'),
(50, 'MultipleChoice', 'a2'),
(51, 'MultipleChoice', 'a3'),
(52, 'MultipleChoice', 'a4'),
(53, 'MultipleChoice', '1'),
(54, 'MultipleChoice', '2'),
(55, 'MultipleChoice', '3'),
(56, 'MultipleChoice', '4'),
(57, 'MultipleChoice', 'Black'),
(58, 'MultipleChoice', 'White'),
(59, 'MultipleChoice', 'Red'),
(60, 'MultipleChoice', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `option_order`
--

CREATE TABLE `option_order` (
  `option_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL,
  `option_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `option_order`
--

INSERT INTO `option_order` (`option_ID`, `question_ID`, `option_index`) VALUES
(41, 27, 1),
(42, 27, 2),
(43, 27, 3),
(44, 27, 4),
(45, 29, 1),
(46, 29, 2),
(47, 29, 3),
(48, 29, 4),
(49, 30, 1),
(50, 30, 2),
(51, 30, 3),
(52, 30, 4),
(53, 32, 1),
(54, 32, 2),
(55, 32, 3),
(56, 32, 4),
(57, 36, 1),
(58, 36, 2),
(59, 36, 3),
(60, 36, 4);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_ID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_ID`, `type`, `text`, `options`) VALUES
(26, 'TextBox', 'First question is a text box question', ''),
(27, 'MultipleChoice', 'Who is your favourite walking dead character?', ''),
(28, 'TextBox', 'question 1', ''),
(29, 'MultipleChoice', 'question 2', ''),
(30, 'MultipleChoice', 'question 3', ''),
(31, 'TextBox', 'This survey should display a notification when created', ''),
(32, 'MultipleChoice', 'this survey will show a notification when created', ''),
(33, 'TextBox', 'this survey should be closed', ''),
(34, 'TextBox', 'agaegeag', ''),
(35, 'TextBox', 'In your opinion, what car brand is the best?', ''),
(36, 'MultipleChoice', 'What car colour is the best?', ''),
(37, 'TextBox', 'q1', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_order`
--

CREATE TABLE `question_order` (
  `survey_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL,
  `question_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_order`
--

INSERT INTO `question_order` (`survey_ID`, `question_ID`, `question_index`) VALUES
(31, 26, 1),
(31, 27, 2),
(32, 28, 1),
(32, 29, 2),
(32, 30, 3),
(33, 31, 1),
(33, 32, 2),
(34, 33, 1),
(36, 35, 1),
(36, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `response_ID` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`response_ID`, `date_created`) VALUES
(5, '2023-03-30 17:31:21'),
(6, '2023-03-30 23:21:24'),
(8, '2023-03-31 01:31:05'),
(9, '2023-03-31 02:14:02'),
(10, '2023-04-03 13:17:20'),
(11, '2023-04-04 22:54:51'),
(12, '2023-04-16 14:45:11'),
(13, '2023-04-16 14:46:51'),
(14, '2023-04-16 14:47:14'),
(15, '2023-04-16 14:47:23'),
(16, '2023-04-16 14:47:45'),
(17, '2023-04-16 14:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`survey_ID`, `name`, `code`, `description`, `number_of_questions`, `date_created`, `status`) VALUES
(31, 'test survey', 'iej2whok', 'this survey is to test if it works, there are 2 questions', 2, '2023-03-29 20:18:40', 1),
(32, 'test survey', 'v5qa4o33', 'test description', 3, '2023-03-31 22:18:13', 1),
(33, 'notification test', 'h0bgwadp', 'notification test', 2, '2023-04-03 15:07:45', 1),
(34, 'closed survey test', 'xr5hx3oj', 'this survey should be closed', 1, '2023-04-03 16:14:48', 0),
(36, 'Best car colour', 'ddinchka', 'This survey is to find out what people think the best car colour is.', 2, '2023-04-16 14:49:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey_owner`
--

CREATE TABLE `survey_owner` (
  `user_ID` int(11) NOT NULL,
  `survey_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_owner`
--

INSERT INTO `survey_owner` (`user_ID`, `survey_ID`) VALUES
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `survey_response`
--

CREATE TABLE `survey_response` (
  `survey_ID` int(11) NOT NULL,
  `response_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_response`
--

INSERT INTO `survey_response` (`survey_ID`, `response_ID`) VALUES
(31, 5),
(31, 6),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(36, 12),
(36, 13),
(36, 14),
(36, 15),
(36, 16),
(36, 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `account_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`, `date_created`, `account_verified`) VALUES
(2, 'test', 'test', '2023-02-26', 'test@test.com', '$2y$10$YHe/xRvpYkCZHRK4kzrUp.Xq/u1y34diEx9taWs3YRKmjhUxESQH.', '2023-02-26 16:49:52', 0),
(3, 'Umar', 'Rajput', '2023-02-27', 'umar.rajput@hotmail.co.uk', '$2y$10$DLj/LRMt.A/tEx/nSCIQBe1eWHmiXcZR0iq7geExrr.IMMWRoWZdO', '2023-02-27 14:32:58', 0),
(6, 'John', 'Smith', '2023-01-01', 'john.smith@gmail.com', '$2y$10$8iTtWYWDbF2e3ZFXj/6hTuQ1OW/ef2x7BToNdsQGV6SfZ1DEqh94a', '2023-04-03 15:47:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_ID`);

--
-- Indexes for table `answer_response`
--
ALTER TABLE `answer_response`
  ADD KEY `response_ID` (`response_ID`),
  ADD KEY `answer_ID` (`answer_ID`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_ID`);

--
-- Indexes for table `option_order`
--
ALTER TABLE `option_order`
  ADD KEY `option_ID` (`option_ID`),
  ADD KEY `question_ID` (`question_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_ID`);

--
-- Indexes for table `question_order`
--
ALTER TABLE `question_order`
  ADD KEY `question_ID` (`question_ID`),
  ADD KEY `survey_ID` (`survey_ID`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`response_ID`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_ID`);

--
-- Indexes for table `survey_owner`
--
ALTER TABLE `survey_owner`
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `survey_ID` (`survey_ID`);

--
-- Indexes for table `survey_response`
--
ALTER TABLE `survey_response`
  ADD KEY `survey_ID` (`survey_ID`),
  ADD KEY `response_ID` (`response_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_response`
--
ALTER TABLE `answer_response`
  ADD CONSTRAINT `answer_response_ibfk_1` FOREIGN KEY (`answer_ID`) REFERENCES `answers` (`answer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_response_ibfk_2` FOREIGN KEY (`response_ID`) REFERENCES `responses` (`response_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `option_order`
--
ALTER TABLE `option_order`
  ADD CONSTRAINT `option_order_ibfk_1` FOREIGN KEY (`option_ID`) REFERENCES `options` (`option_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `option_order_ibfk_2` FOREIGN KEY (`question_ID`) REFERENCES `questions` (`question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_order`
--
ALTER TABLE `question_order`
  ADD CONSTRAINT `question_ID` FOREIGN KEY (`question_ID`) REFERENCES `questions` (`question_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_order_ibfk_1` FOREIGN KEY (`survey_ID`) REFERENCES `surveys` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_owner`
--
ALTER TABLE `survey_owner`
  ADD CONSTRAINT `survey_ID` FOREIGN KEY (`survey_ID`) REFERENCES `surveys` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_response`
--
ALTER TABLE `survey_response`
  ADD CONSTRAINT `survey_response_ibfk_2` FOREIGN KEY (`response_ID`) REFERENCES `responses` (`response_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_response_ibfk_3` FOREIGN KEY (`survey_ID`) REFERENCES `surveys` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
