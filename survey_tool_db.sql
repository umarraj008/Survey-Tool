-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 10:16 AM
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
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `participant_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_owner`
--

CREATE TABLE `poll_owner` (
  `user_ID` int(11) NOT NULL,
  `poll_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_response`
--

CREATE TABLE `poll_response` (
  `poll_response_ID` int(11) NOT NULL,
  `poll_ID` int(11) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
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
-- Table structure for table `question_response`
--

CREATE TABLE `question_response` (
  `survey_response_ID` int(11) NOT NULL,
  `question_ID` int(11) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `survey_response_ID` int(11) NOT NULL,
  `survey_ID` int(11) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`, `date_created`, `account_verified`) VALUES
(1, 'Umar', 'Rajput', '2023-02-20', 'aaa@aaa.com', 'a', '2023-02-20 17:34:48', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`participant_ID`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_ID`);

--
-- Indexes for table `poll_owner`
--
ALTER TABLE `poll_owner`
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `poll_ID` (`poll_ID`);

--
-- Indexes for table `poll_response`
--
ALTER TABLE `poll_response`
  ADD PRIMARY KEY (`poll_response_ID`),
  ADD KEY `poll_ID` (`poll_ID`,`participant_ID`),
  ADD KEY `participant_ID` (`participant_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_ID`);

--
-- Indexes for table `question_order`
--
ALTER TABLE `question_order`
  ADD KEY `question_ID` (`question_ID`),
  ADD KEY `survey_ID` (`survey_ID`);

--
-- Indexes for table `question_response`
--
ALTER TABLE `question_response`
  ADD KEY `survey_response_ID` (`survey_response_ID`,`question_ID`,`participant_ID`),
  ADD KEY `question_ID` (`question_ID`),
  ADD KEY `participant_ID` (`participant_ID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
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
  ADD PRIMARY KEY (`survey_response_ID`),
  ADD KEY `survey_ID` (`survey_ID`,`participant_ID`),
  ADD KEY `participant_ID` (`participant_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `participant_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_response`
--
ALTER TABLE `poll_response`
  MODIFY `poll_response_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_response`
--
ALTER TABLE `survey_response`
  MODIFY `survey_response_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poll_owner`
--
ALTER TABLE `poll_owner`
  ADD CONSTRAINT `poll_owner_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poll_owner_ibfk_2` FOREIGN KEY (`poll_ID`) REFERENCES `poll` (`poll_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_response`
--
ALTER TABLE `poll_response`
  ADD CONSTRAINT `poll_response_ibfk_1` FOREIGN KEY (`poll_ID`) REFERENCES `poll` (`poll_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poll_response_ibfk_2` FOREIGN KEY (`participant_ID`) REFERENCES `participant` (`participant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_order`
--
ALTER TABLE `question_order`
  ADD CONSTRAINT `question_ID` FOREIGN KEY (`question_ID`) REFERENCES `question` (`question_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_order_ibfk_1` FOREIGN KEY (`survey_ID`) REFERENCES `survey` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_response`
--
ALTER TABLE `question_response`
  ADD CONSTRAINT `question_response_ibfk_1` FOREIGN KEY (`question_ID`) REFERENCES `question` (`question_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_response_ibfk_2` FOREIGN KEY (`survey_response_ID`) REFERENCES `survey_response` (`survey_response_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_response_ibfk_3` FOREIGN KEY (`participant_ID`) REFERENCES `participant` (`participant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_owner`
--
ALTER TABLE `survey_owner`
  ADD CONSTRAINT `survey_ID` FOREIGN KEY (`survey_ID`) REFERENCES `survey` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_response`
--
ALTER TABLE `survey_response`
  ADD CONSTRAINT `survey_response_ibfk_1` FOREIGN KEY (`participant_ID`) REFERENCES `participant` (`participant_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_response_ibfk_2` FOREIGN KEY (`survey_ID`) REFERENCES `survey` (`survey_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
