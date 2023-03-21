-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 09:25 PM
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
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer_response`
--

CREATE TABLE `answer_response` (
  `response_ID` int(11) NOT NULL,
  `answer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_ID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `option_order`
--

CREATE TABLE `option_order` (
  `option_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `question_order`
--

CREATE TABLE `question_order` (
  `survey_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `response_ID` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`survey_ID`, `name`, `code`, `description`, `date_created`, `status`) VALUES
(1, 'This is the survey title', '', 'This is the desctriptiuon for hte surbvey and it containes information about the survey and what the purpose of conducting it is...', '2023-03-11 15:12:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_owner`
--

CREATE TABLE `survey_owner` (
  `user_ID` int(11) NOT NULL,
  `survey_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_response`
--

CREATE TABLE `survey_response` (
  `survey_ID` int(11) NOT NULL,
  `response_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Umar', 'Rajput', '2023-02-20', 'aaa@aaa.com', 'a', '2023-02-20 17:34:48', 0),
(2, 'test', 'test', '2023-02-26', 'test@test.com', '$2y$10$YHe/xRvpYkCZHRK4kzrUp.Xq/u1y34diEx9taWs3YRKmjhUxESQH.', '2023-02-26 16:49:52', 0),
(3, 'aaaaaa', 'aaaaa', '2023-02-27', 'umar.rajput@hotmail.co.uk', '$2y$10$DLj/LRMt.A/tEx/nSCIQBe1eWHmiXcZR0iq7geExrr.IMMWRoWZdO', '2023-02-27 14:32:58', 0);

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
  MODIFY `answer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
