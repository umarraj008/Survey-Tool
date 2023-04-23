-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 10:00 PM
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
(30, 'MultipleChoice', '', 58),
(31, 'MultipleChoice', '', 61),
(32, 'MultipleChoice', '', 65),
(33, 'MultipleChoice', '', 72),
(34, 'MultipleChoice', '', 73),
(35, 'MultipleChoice', '', 78),
(36, 'TextBox', 'The Walking Dead', 0),
(37, 'TextBox', 'Because it has a good storyline and it was a fun game.', 0),
(38, 'MultipleChoice', '', 62),
(39, 'MultipleChoice', '', 65),
(40, 'MultipleChoice', '', 70),
(41, 'MultipleChoice', '', 74),
(42, 'MultipleChoice', '', 78),
(44, 'MultipleChoice', '', 62),
(45, 'MultipleChoice', '', 65),
(46, 'MultipleChoice', '', 70),
(47, 'MultipleChoice', '', 74),
(48, 'MultipleChoice', '', 78),
(50, 'MultipleChoice', '', 62),
(51, 'MultipleChoice', '', 65),
(52, 'MultipleChoice', '', 70),
(53, 'MultipleChoice', '', 74),
(54, 'MultipleChoice', '', 78),
(55, 'TextBox', 'Capybara Rush', 0),
(56, 'TextBox', 'Its easy and fun to play whilst watching netflix!', 0),
(57, 'MultipleChoice', '', 62),
(58, 'MultipleChoice', '', 65),
(59, 'MultipleChoice', '', 69),
(60, 'MultipleChoice', '', 73),
(61, 'MultipleChoice', '', 79),
(62, 'TextBox', 'Hellblade', 0),
(63, 'TextBox', 'I like the visual art style, and i think the combat is pretty good.', 0),
(64, 'MultipleChoice', '', 81),
(65, 'MultipleChoice', '', 85),
(66, 'MultipleChoice', '', 92),
(67, 'MultipleChoice', '', 93),
(68, 'MultipleChoice', '', 98),
(69, 'TextBox', 'The walking dead', 0),
(70, 'TextBox', 'Because it has a good storyline and it was a fun game', 0),
(71, 'MultipleChoice', '', 82),
(72, 'MultipleChoice', '', 85),
(73, 'MultipleChoice', '', 90),
(74, 'MultipleChoice', '', 95),
(75, 'MultipleChoice', '', 98),
(76, 'TextBox', 'Capybara Rush', 0),
(77, 'TextBox', 'Its easy and fun to play whilst watching netflix!', 0),
(78, 'MultipleChoice', '', 82),
(79, 'MultipleChoice', '', 85),
(80, 'MultipleChoice', '', 89),
(81, 'MultipleChoice', '', 93),
(82, 'MultipleChoice', '', 100),
(83, 'TextBox', 'Osu', 0),
(84, 'TextBox', 'i like rhythm games, they are epic', 0),
(85, 'MultipleChoice', '', 82),
(86, 'MultipleChoice', '', 85),
(87, 'MultipleChoice', '', 90),
(88, 'MultipleChoice', '', 95),
(89, 'MultipleChoice', '', 97),
(90, 'TextBox', 'Csr racing', 0),
(91, 'TextBox', 'When i turn the phone it turns the steering wheel, it is totally epic !', 0),
(92, 'MultipleChoice', '', 82),
(93, 'MultipleChoice', '', 85),
(94, 'MultipleChoice', '', 89),
(95, 'MultipleChoice', '', 93),
(96, 'MultipleChoice', '', 99),
(97, 'TextBox', 'Valorant', 0),
(98, 'TextBox', 'im top 500', 0),
(99, 'MultipleChoice', '', 81),
(100, 'MultipleChoice', '', 85),
(101, 'MultipleChoice', '', 91),
(102, 'MultipleChoice', '', 94),
(103, 'MultipleChoice', '', 98),
(104, 'TextBox', 'Minecraft', 0),
(105, 'TextBox', 'building houses is fun', 0),
(106, 'MultipleChoice', '', 84),
(107, 'MultipleChoice', '', 85),
(108, 'MultipleChoice', '', 89),
(109, 'MultipleChoice', '', 93),
(110, 'MultipleChoice', '', 99),
(111, 'TextBox', 'valorant', 0),
(112, 'TextBox', 'i like the gunplay', 0),
(113, 'MultipleChoice', '', 83),
(114, 'MultipleChoice', '', 86),
(115, 'MultipleChoice', '', 90),
(116, 'MultipleChoice', '', 96),
(117, 'MultipleChoice', '', 97),
(118, 'TextBox', 'Asphalt 9', 0),
(119, 'TextBox', 'i like racing games', 0),
(120, 'MultipleChoice', '', 83),
(121, 'MultipleChoice', '', 85),
(122, 'MultipleChoice', '', 91),
(123, 'MultipleChoice', '', 94),
(124, 'MultipleChoice', '', 100),
(125, 'TextBox', 'Overwatch', 0),
(126, 'TextBox', 'i like that the game has so many characters', 0),
(127, 'MultipleChoice', '', 81),
(128, 'MultipleChoice', '', 85),
(129, 'MultipleChoice', '', 91),
(130, 'MultipleChoice', '', 96),
(131, 'MultipleChoice', '', 100),
(132, 'TextBox', 'Twister', 0),
(133, 'TextBox', 'i get to test my flexibility', 0),
(134, 'TextBox', 'test answer', 0),
(135, 'MultipleChoice', '', 101);

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
(17, 30, 36),
(18, 31, 38),
(18, 32, 39),
(18, 33, 40),
(18, 34, 41),
(18, 35, 42),
(18, 36, 43),
(18, 37, 44),
(21, 50, 38),
(21, 51, 39),
(21, 52, 40),
(21, 53, 41),
(21, 54, 42),
(21, 55, 43),
(21, 56, 44),
(22, 57, 38),
(22, 58, 39),
(22, 59, 40),
(22, 60, 41),
(22, 61, 42),
(22, 62, 43),
(22, 63, 44),
(23, 64, 45),
(23, 65, 46),
(23, 66, 47),
(23, 67, 48),
(23, 68, 49),
(23, 69, 50),
(23, 70, 51),
(24, 71, 45),
(24, 72, 46),
(24, 73, 47),
(24, 74, 48),
(24, 75, 49),
(24, 76, 50),
(24, 77, 51),
(25, 78, 45),
(25, 79, 46),
(25, 80, 47),
(25, 81, 48),
(25, 82, 49),
(25, 83, 50),
(25, 84, 51),
(26, 85, 45),
(26, 86, 46),
(26, 87, 47),
(26, 88, 48),
(26, 89, 49),
(26, 90, 50),
(26, 91, 51),
(27, 92, 45),
(27, 93, 46),
(27, 94, 47),
(27, 95, 48),
(27, 96, 49),
(27, 97, 50),
(27, 98, 51),
(28, 99, 45),
(28, 100, 46),
(28, 101, 47),
(28, 102, 48),
(28, 103, 49),
(28, 104, 50),
(28, 105, 51),
(29, 106, 45),
(29, 107, 46),
(29, 108, 47),
(29, 109, 48),
(29, 110, 49),
(29, 111, 50),
(29, 112, 51),
(30, 113, 45),
(30, 114, 46),
(30, 115, 47),
(30, 116, 48),
(30, 117, 49),
(30, 118, 50),
(30, 119, 51),
(31, 120, 45),
(31, 121, 46),
(31, 122, 47),
(31, 123, 48),
(31, 124, 49),
(31, 125, 50),
(31, 126, 51),
(32, 127, 45),
(32, 128, 46),
(32, 129, 47),
(32, 130, 48),
(32, 131, 49),
(32, 132, 50),
(32, 133, 51),
(33, 134, 52),
(33, 135, 53);

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
(60, 'MultipleChoice', 'Blue'),
(61, 'MultipleChoice', '11-17'),
(62, 'MultipleChoice', '18-24'),
(63, 'MultipleChoice', '25-34'),
(64, 'MultipleChoice', '35-44'),
(65, 'MultipleChoice', 'Yes'),
(66, 'MultipleChoice', 'No'),
(67, 'MultipleChoice', '#'),
(68, 'MultipleChoice', '#'),
(69, 'MultipleChoice', 'Everyday'),
(70, 'MultipleChoice', 'Few Times a week'),
(71, 'MultipleChoice', 'Few Times a month'),
(72, 'MultipleChoice', 'Rarely'),
(73, 'MultipleChoice', 'PC'),
(74, 'MultipleChoice', 'Mobile'),
(75, 'MultipleChoice', 'Console'),
(76, 'MultipleChoice', 'Other'),
(77, 'MultipleChoice', 'Racing / Driving'),
(78, 'MultipleChoice', 'Adventure'),
(79, 'MultipleChoice', 'First person shooter'),
(80, 'MultipleChoice', 'Rhythm'),
(81, 'MultipleChoice', '11-17'),
(82, 'MultipleChoice', '18-24'),
(83, 'MultipleChoice', '25-34'),
(84, 'MultipleChoice', '35-44'),
(85, 'MultipleChoice', 'Yes'),
(86, 'MultipleChoice', 'No'),
(87, 'MultipleChoice', '#'),
(88, 'MultipleChoice', '#'),
(89, 'MultipleChoice', 'Everyday'),
(90, 'MultipleChoice', 'Few Times a week'),
(91, 'MultipleChoice', 'Few Times a month'),
(92, 'MultipleChoice', 'Rarely'),
(93, 'MultipleChoice', 'PC'),
(94, 'MultipleChoice', 'Console'),
(95, 'MultipleChoice', 'Mobile'),
(96, 'MultipleChoice', 'Other'),
(97, 'MultipleChoice', 'Racing/Driving'),
(98, 'MultipleChoice', 'Adventure'),
(99, 'MultipleChoice', 'First Person Shooter'),
(100, 'MultipleChoice', 'Rhythm'),
(101, 'MultipleChoice', 'yes'),
(102, 'MultipleChoice', 'no'),
(103, 'MultipleChoice', 'maybe'),
(104, 'MultipleChoice', 'sometimes');

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
(60, 36, 4),
(61, 38, 1),
(62, 38, 2),
(63, 38, 3),
(64, 38, 4),
(65, 39, 1),
(66, 39, 2),
(67, 39, 3),
(68, 39, 4),
(69, 40, 1),
(70, 40, 2),
(71, 40, 3),
(72, 40, 4),
(73, 41, 1),
(74, 41, 2),
(75, 41, 3),
(76, 41, 4),
(77, 42, 1),
(78, 42, 2),
(79, 42, 3),
(80, 42, 4),
(81, 45, 1),
(82, 45, 2),
(83, 45, 3),
(84, 45, 4),
(85, 46, 1),
(86, 46, 2),
(87, 46, 3),
(88, 46, 4),
(89, 47, 1),
(90, 47, 2),
(91, 47, 3),
(92, 47, 4),
(93, 48, 1),
(94, 48, 2),
(95, 48, 3),
(96, 48, 4),
(97, 49, 1),
(98, 49, 2),
(99, 49, 3),
(100, 49, 4),
(101, 53, 1),
(102, 53, 2),
(103, 53, 3),
(104, 53, 4);

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
(37, 'TextBox', 'q1', ''),
(38, 'MultipleChoice', 'How old are you?', ''),
(39, 'MultipleChoice', 'Do you play games', ''),
(40, 'MultipleChoice', 'How often do you play games?', ''),
(41, 'MultipleChoice', 'What platform do you play games on?', ''),
(42, 'MultipleChoice', 'What is your favourite genre of games?', ''),
(43, 'TextBox', 'What is your favourite game/series?', ''),
(44, 'TextBox', 'Why is this your favourite game?', ''),
(45, 'MultipleChoice', 'How old are you', ''),
(46, 'MultipleChoice', 'Do you play games', ''),
(47, 'MultipleChoice', 'How often do you play games?', ''),
(48, 'MultipleChoice', 'What platform do you play games on?', ''),
(49, 'MultipleChoice', 'What is your favourite genre of games?', ''),
(50, 'TextBox', 'What is your favourite game/series?', ''),
(51, 'TextBox', 'Why is this your favourite game?', ''),
(52, 'TextBox', 'is this working?', ''),
(53, 'MultipleChoice', 'is this working?', '');

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
(36, 36, 2),
(39, 45, 1),
(39, 46, 2),
(39, 47, 3),
(39, 48, 4),
(39, 49, 5),
(39, 50, 6),
(39, 51, 7),
(40, 52, 1),
(40, 53, 2);

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
(17, '2023-04-16 14:47:52'),
(18, '2023-04-22 22:29:47'),
(21, '2023-04-22 22:36:56'),
(22, '2023-04-22 22:40:20'),
(23, '2023-04-22 22:59:25'),
(24, '2023-04-22 23:01:34'),
(25, '2023-04-22 23:30:55'),
(26, '2023-04-22 23:32:30'),
(27, '2023-04-22 23:33:19'),
(28, '2023-04-22 23:34:03'),
(29, '2023-04-22 23:34:51'),
(30, '2023-04-22 23:35:53'),
(31, '2023-04-22 23:36:36'),
(32, '2023-04-22 23:37:27'),
(33, '2023-04-23 19:59:17');

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
(36, 'Best car colour', 'ddinchka', 'This survey is to find out what people think the best car colour is.', 2, '2023-04-16 14:49:36', 0),
(39, 'Games Survey', 'z0psrphc', 'This survey will find out peoples gaming habits, and to see what the most popular game is.', 7, '2023-04-22 22:57:45', 1),
(40, 'my survey', 'rgke65l2', 'this survey is a test to see if a new account can make a survey', 2, '2023-04-23 19:59:26', 1);

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
(3, 36),
(3, 39),
(7, 40);

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
(36, 17),
(39, 23),
(39, 24),
(39, 25),
(39, 26),
(39, 27),
(39, 28),
(39, 29),
(39, 30),
(39, 31),
(39, 32),
(40, 33);

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
(6, 'John', 'Smith', '2023-01-01', 'john.smith@gmail.com', '$2y$10$8iTtWYWDbF2e3ZFXj/6hTuQ1OW/ef2x7BToNdsQGV6SfZ1DEqh94a', '2023-04-03 15:47:40', 0),
(7, 'Test', 'Test', '0000-00-00', 'tester@test.com', '$2y$10$grtTeKizcHUg1U80Ne5/JeoPAWvHBQ1uNF3jW.tB7JUX5NCDqIjqa', '2023-04-23 19:57:25', 0);

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
  MODIFY `answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
