-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2021 at 12:39 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faraitfu_onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passWithoutMD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `gmail`, `username`, `password`, `passWithoutMD`, `type`) VALUES
(1, 'raysa', '01758633961', 'raysa@gmail.com', 'raysa@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Admin'),
(2, 'marchforward', '01844674202', 'info@marchforward.com', 'info@marchforward.com', '49df6a6f1f912d29ce04b40b63f10bdb', 'marchforwardaziz', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `action`, `date`) VALUES
(1, 'BCS 42', 'SHOW', '2020-12-19 07:38:51'),
(2, 'BCS 47', 'SHOW', '2020-12-23 12:18:20'),
(3, 'BCS 41', 'SHOW', '2020-12-27 03:55:59'),
(4, 'Bank Job', 'SHOW', '2020-12-27 12:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(100) NOT NULL,
  `courseID` int(100) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `examTime` int(10) NOT NULL,
  `examStatus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `scheduleDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scheduleTime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `examEndTime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passed_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minQuestionNum` int(100) NOT NULL,
  `maxQuestionNum` int(100) NOT NULL,
  `StartingAction` int(10) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `courseID`, `name`, `examTime`, `examStatus`, `scheduleDate`, `scheduleTime`, `examEndTime`, `total_mark`, `passed_mark`, `minQuestionNum`, `maxQuestionNum`, `StartingAction`, `action`, `date`) VALUES
(1, 1, 'Priliminary ', 30, 'Temporary', '2020-12-27', '14:17:03', '14:17:03', '80', '40', 1, 100, 1, 'SHOW', '2020-12-29 08:40:44'),
(2, 1, 'Test', 50, 'Permanent', '2020-12-22', '11:52:10', '', '80', '40', 1, 100, 0, 'SHOW', '2020-12-27 05:44:29'),
(3, 1, 'Permanent Exam Testing', 1, 'Permanent', '2020-12-13', '13:52:58', '', '20', '10', 23, 20, 0, 'SHOW', '2020-12-29 09:47:03'),
(4, 1, 'permanent  exam For All batch', 40, 'Permanent', '2020-12-23', '13:55:12', '02:55:00', '200', '100', 7, 200, 0, 'SHOW', '2020-12-27 05:26:53'),
(5, 1, 'Written Exam 200 Marks', 80, 'Temporary', '2020-12-31', '10:26:23', '10:27:23', '200', '100', 7, 200, 1, 'SHOW', '2020-12-27 06:54:11'),
(8, 2, 'Test_prili', 40, 'Temporary', '2020-12-27', '14:17:03', '14:17:03', '80', '40', 8, 100, 1, 'SHOW', '2020-12-29 09:04:29'),
(9, 2, 'Test Exam', 30, 'Permanent', '2020-12-31', '22:32:10', '22:34:18', '200', '100', 7, 200, 0, 'SHOW', '2020-12-27 05:56:03'),
(10, 4, 'Bank Job Exam 01', 30, 'Permanent', '2020-12-27', '18:15:00', '18:17', '200', '100', 5, 200, 0, 'SHOW', '2020-12-27 12:26:59'),
(11, 1, 'Test By paul', 40, 'Temporary', '2020-12-27', '13:58:00', '14:17:03', '200', '150', 1, 200, 1, 'SHOW', '2020-12-29 08:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `options` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `options`) VALUES
(1, 1, 0, 'personal Hypertext Prepocessor'),
(2, 1, 0, 'Personal Home page'),
(3, 1, 1, 'PHP(Hyper Text Preprocessor)'),
(4, 1, 0, 'PHP'),
(5, 2, 0, 'It is a modelling language'),
(6, 2, 0, 'It is a DTP language'),
(7, 2, 0, 'It is a partial programming language'),
(8, 2, 1, ' It is used to structure documents'),
(9, 3, 0, 'Blue, Green, Red'),
(10, 3, 0, 'Green, Blue, Red'),
(11, 3, 0, 'Green, Red, Blue'),
(12, 3, 1, 'Red, Green, Blue.'),
(13, 4, 0, ' JavaScript is a loosely typed language'),
(14, 4, 1, 'A JavaScript embedded in an HTML document is compiled and executed by the client browser'),
(15, 4, 0, 'JavaScript is event driven'),
(16, 4, 0, 'JavaScript can not run in stand-alone mode (without a browser).'),
(17, 5, 1, 'pass'),
(18, 5, 0, ' fail'),
(19, 5, 0, 'null'),
(20, 5, 0, '80');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) NOT NULL,
  `examID` int(100) NOT NULL,
  `questionName` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `question_number` int(11) NOT NULL,
  `firstOptn` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `secondOptn` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `thirdOptn` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `fourthOptn` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `rightAns` int(5) NOT NULL,
  `mark` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `negativeMark` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rightAnsDes` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `examID`, `questionName`, `question_number`, `firstOptn`, `secondOptn`, `thirdOptn`, `fourthOptn`, `rightAns`, `mark`, `negativeMark`, `rightAnsDes`, `date`) VALUES
(1, 8, 'Elegy Written in a Country\nChurchyard', 1, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-27 05:14:36'),
(2, 8, 'In English grammar,', 2, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-27 05:14:36'),
(3, 8, 'The idiom ', 3, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-27 05:14:36'),
(4, 8, 'The play ', 4, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-27 05:14:36'),
(5, 8, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 5, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-27 05:14:36'),
(6, 8, 'This could have worked if I ', 6, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-27 05:14:36'),
(7, 5, 'Elegy Written in a Country\nChurchyard', 1, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-27 05:17:40'),
(8, 5, 'In English grammar,', 2, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-27 05:17:40'),
(9, 5, 'The idiom ', 3, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-27 05:17:40'),
(10, 5, 'The play ', 4, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-27 05:17:40'),
(11, 5, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 5, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-27 05:17:40'),
(12, 5, 'This could have worked if I ', 6, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-27 05:17:40'),
(13, 9, 'Elegy Written in a Country\nChurchyard', 1, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-27 05:23:49'),
(14, 9, 'In English grammar,', 2, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-27 05:23:49'),
(15, 9, 'The idiom ', 3, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-27 05:23:49'),
(16, 9, 'The play ', 4, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-27 05:23:49'),
(17, 9, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 5, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-27 05:23:49'),
(18, 9, 'This could have worked if I ', 6, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-27 05:23:49'),
(19, 4, 'Elegy Written in a Country\nChurchyard', 1, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-27 05:26:53'),
(20, 4, 'In English grammar,', 2, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-27 05:26:53'),
(21, 4, 'The idiom ', 3, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-27 05:26:53'),
(22, 4, 'The play ', 4, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-27 05:26:53'),
(23, 4, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 5, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-27 05:26:53'),
(24, 4, 'This could have worked if I ', 6, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-27 05:26:53'),
(25, 3, 'Elegy Written in a Country\nChurchyard', 1, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-27 05:29:56'),
(26, 3, 'In English grammar,', 2, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-27 05:29:56'),
(27, 3, 'The idiom ', 3, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-27 05:29:56'),
(28, 3, 'The play ', 4, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-27 05:29:56'),
(29, 3, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 5, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-27 05:29:56'),
(30, 3, 'This could have worked if I ', 6, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-27 05:29:56'),
(31, 10, '1/5  of 30% of 0.60 ', 1, '80', '50', '40', '90', 1, '1', '-0.25', 'OK', '2020-12-27 12:23:00'),
(32, 10, 'If the price of an item is increased by 10% and then decreased by 10%, the net effect on the price of the item is-', 2, '80', '90', '100', '110', 2, '1', '-1', '', '2020-12-27 12:26:59'),
(33, 10, 'If the price of an item is increased by 10% and then decreased by 10%, the net effect on the price of the item is-', 3, '80', '90', '100', '110', 3, '1', '-1', 'Churchyard', '2020-12-27 12:26:59'),
(34, 10, 'If the price of an item is increased by 10% and then decreased by 10%, the net effect on the price of the item is-', 4, '80', '90', '100', '110', 3, '1', '-1', 'William Wordaworth', '2020-12-27 12:28:37'),
(35, 8, 'Elegy Written in a Country Churchyard', 7, 'hello java ', 'hello php', 'paul', 'hello python', 2, '1', '-1', 'dfjkkjhgf', '2020-12-29 09:04:29'),
(36, 3, 'Elegy Written in a Country\nChurchyard', 7, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-29 09:30:46'),
(37, 3, 'In English grammar,', 8, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-29 09:30:46'),
(38, 3, 'The idiom ', 9, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-29 09:30:46'),
(39, 3, 'The play ', 10, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-29 09:30:46'),
(40, 3, 'This could have worked if I ', 11, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-29 09:30:46'),
(41, 3, 'Elegy Written in a Country\nChurchyard', 12, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-29 09:33:17'),
(42, 3, 'In English grammar,', 13, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-29 09:33:17'),
(43, 3, 'The idiom ', 14, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-29 09:33:17'),
(44, 3, 'The play ', 15, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-29 09:33:17'),
(45, 3, 'This could have worked if I ', 16, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-29 09:33:17'),
(46, 3, 'Which of the following writers\nbelongs to the romantic period in\nEnglish literature?', 17, 'Tennyson', 'Alexander Pope', 'John Dryden', 'S. T. Coleridge', 2, '1', '-1', 'S. T. Coleridge S. T. ColeridgeS. T. ColeridgeS. T. ColeridgeS. T. Coleridge', '2020-12-29 09:34:58'),
(47, 3, 'Elegy Written in a Country\nChurchyard', 18, 'William Wordaworth', 'Thomas Gray', 'John Keats', 'W. B. Yeats', 2, '1', '-1', '', '2020-12-29 09:47:03'),
(48, 3, 'In English grammar,', 19, 'Morphology', 'Etymology', 'Syntax', 'Semantics', 3, '1', '-1', 'Churchyard', '2020-12-29 09:47:03'),
(49, 3, 'The idiom ', 20, 'saving lives', 'timely action', 'saving time', 'activity', 4, '1', '-1', 'The idiom ', '2020-12-29 09:47:03'),
(50, 3, 'The play ', 21, 'James Joyce', 'Shakespeare', 'G. B. Shaw', 'Arthur Miller', 3, '1', '-1', 'Arthur MillerArthur MillerArthur MillerArthur Miller', '2020-12-29 09:47:03'),
(51, 3, 'This could have worked if I ', 22, 'had', 'have', 'might', 'would', 4, '1', '-1', 'would would would would would would would', '2020-12-29 09:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(100) NOT NULL,
  `studentID` int(10) NOT NULL,
  `courseID` int(10) NOT NULL,
  `examID` int(10) NOT NULL,
  `totalMark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `obtainedMark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rightAns` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `wrongAns` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `studentID`, `courseID`, `examID`, `totalMark`, `obtainedMark`, `rightAns`, `wrongAns`, `date`) VALUES
(1, 1, 0, 0, '', '', '', '', '2020-12-19 07:49:12'),
(2, 1, 0, 0, '', '', '', '', '2020-12-19 07:49:23'),
(3, 1, 1, 0, '', '', '', '', '2020-12-19 07:55:40'),
(4, 1, 1, 1, '', '', '', '', '2020-12-19 07:56:29'),
(5, 1, 1, 1, '', '', '', '', '2020-12-19 07:57:28'),
(6, 0, 1, 1, '', '', '', '', '2020-12-19 08:47:17'),
(7, 1, 1, 1, '', '', '', '', '2020-12-19 08:49:17'),
(8, 1, 1, 1, '', '', '', '', '2020-12-19 08:54:23'),
(9, 1, 1, 1, '', '', '', '', '2020-12-19 08:54:37'),
(10, 1, 1, 1, '', '', '', '', '2020-12-19 08:54:47'),
(11, 1, 1, 1, '', '', '', '', '2020-12-19 08:55:42'),
(12, 1, 1, 1, '', '', '', '', '2020-12-19 08:55:47'),
(13, 1, 1, 1, '', '', '', '', '2020-12-19 08:56:43'),
(14, 1, 1, 1, '', '', '', '', '2020-12-19 08:57:07'),
(15, 1, 1, 1, '', '', '', '', '2020-12-19 08:57:38'),
(16, 1, 1, 1, '', '', '', '', '2020-12-19 08:57:53'),
(17, 1, 1, 1, '', '', '', '', '2020-12-19 08:59:28'),
(18, 1, 1, 1, '', '', '', '', '2020-12-19 08:59:38'),
(19, 1, 1, 1, '', '', '', '', '2020-12-19 09:02:22'),
(20, 1, 1, 1, '', '', '', '', '2020-12-19 09:02:35'),
(21, 1, 1, 1, '', '', '', '', '2020-12-19 09:02:50'),
(22, 1, 1, 1, '', '', '', '', '2020-12-19 09:03:00'),
(23, 1, 1, 1, '', '', '', '', '2020-12-19 09:03:09'),
(24, 1, 1, 1, '', '', '', '', '2020-12-19 09:03:43'),
(25, 1, 1, 1, '', '', '', '', '2020-12-19 09:04:04'),
(26, 1, 1, 1, '', '', '', '', '2020-12-19 09:05:02'),
(27, 1, 1, 1, '', '', '', '', '2020-12-19 09:08:43'),
(28, 1, 1, 1, '', '', '', '', '2020-12-19 09:12:48'),
(29, 1, 1, 1, '', '', '', '', '2020-12-19 09:12:56'),
(30, 1, 1, 1, '', '', '', '', '2020-12-19 09:13:09'),
(31, 1, 1, 1, '', '', '', '', '2020-12-19 09:14:56'),
(32, 1, 1, 1, '', '', '', '', '2020-12-19 09:18:21'),
(33, 1, 1, 1, '', '', '', '', '2020-12-19 09:18:31'),
(34, 1, 1, 1, '', '', '', '', '2020-12-19 09:18:53'),
(35, 1, 1, 1, '', '', '', '', '2020-12-19 09:19:20'),
(36, 1, 1, 1, '', '', '', '', '2020-12-19 09:20:15'),
(37, 1, 1, 1, '', '', '', '', '2020-12-19 09:20:25'),
(38, 1, 1, 1, '', '', '', '', '2020-12-19 09:24:17'),
(39, 1, 1, 1, '', '', '', '', '2020-12-19 09:24:35'),
(40, 1, 1, 1, '', '', '', '', '2020-12-19 09:24:45'),
(41, 1, 1, 1, '', '', '', '', '2020-12-19 09:25:04'),
(42, 1, 1, 1, '', '', '', '', '2020-12-19 09:28:06'),
(43, 1, 1, 1, '', '', '', '', '2020-12-19 09:28:22'),
(44, 1, 1, 1, '', '', '', '', '2020-12-19 09:30:33'),
(45, 1, 1, 1, '', '', '', '', '2020-12-19 09:30:49'),
(46, 1, 1, 1, '', '', '', '', '2020-12-19 09:31:10'),
(47, 1, 1, 1, '', '', '', '', '2020-12-19 09:37:18'),
(48, 1, 1, 1, '', '', '', '', '2020-12-19 09:37:52'),
(49, 1, 1, 1, '', '', '', '', '2020-12-19 09:38:45'),
(50, 1, 1, 1, '', '', '', '', '2020-12-19 09:39:45'),
(51, 1, 1, 1, '', '', '', '', '2020-12-19 09:39:57'),
(52, 1, 1, 1, '', '', '', '', '2020-12-19 10:00:47'),
(53, 1, 1, 1, '', '', '', '', '2020-12-19 10:05:12'),
(54, 1, 1, 1, '', '', '', '', '2020-12-19 10:05:24'),
(55, 1, 1, 1, '', '', '', '', '2020-12-19 10:05:50'),
(56, 1, 1, 1, '', '', '', '', '2020-12-19 10:06:01'),
(57, 1, 1, 1, '', '', '', '', '2020-12-19 10:06:26'),
(58, 1, 1, 1, '', '', '', '', '2020-12-19 10:07:35'),
(59, 1, 1, 1, '', '', '', '', '2020-12-19 10:07:48'),
(60, 1, 1, 1, '', '', '', '', '2020-12-19 10:10:04'),
(61, 1, 1, 1, '', '', '', '', '2020-12-19 10:11:29'),
(62, 1, 1, 1, '', '', '', '', '2020-12-19 10:21:48'),
(63, 1, 1, 1, '', '', '', '', '2020-12-19 10:22:29'),
(64, 1, 1, 1, '', '', '', '', '2020-12-19 10:22:52'),
(65, 1, 1, 1, '', '', '', '', '2020-12-19 10:23:03'),
(66, 1, 1, 1, '', '', '', '', '2020-12-19 10:24:02'),
(67, 1, 1, 1, '', '', '', '', '2020-12-19 10:24:08'),
(68, 1, 1, 1, '', '', '', '', '2020-12-19 10:45:24'),
(69, 1, 1, 1, '', '', '', '', '2020-12-19 10:48:01'),
(70, 1, 1, 1, '', '', '', '', '2020-12-19 10:48:28'),
(71, 1, 1, 1, '', '', '', '', '2020-12-19 10:51:32'),
(72, 1, 1, 1, '', '', '', '', '2020-12-19 11:27:53'),
(73, 1, 1, 1, '', '', '', '', '2020-12-20 08:46:02'),
(74, 1, 1, 1, '', '', '', '', '2020-12-20 09:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `resultForPermanentExam`
--

CREATE TABLE `resultForPermanentExam` (
  `id` int(100) NOT NULL,
  `examID` int(100) NOT NULL,
  `studentID` int(100) NOT NULL,
  `questionID` int(100) NOT NULL,
  `selectedAns` int(10) NOT NULL,
  `questionNum` int(100) NOT NULL,
  `mark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `negativeMark` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rightAns` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resultForPermanentExam`
--

INSERT INTO `resultForPermanentExam` (`id`, `examID`, `studentID`, `questionID`, `selectedAns`, `questionNum`, `mark`, `negativeMark`, `rightAns`, `date`) VALUES
(1, 5, 1, 7, 0, 1, '1', '-1', 2, '2020-12-27 05:59:18'),
(2, 5, 1, 8, 0, 2, '1', '-1', 3, '2020-12-27 05:59:18'),
(3, 5, 1, 9, 0, 3, '1', '-1', 4, '2020-12-27 05:59:18'),
(4, 5, 1, 10, 0, 4, '1', '-1', 3, '2020-12-27 05:59:18'),
(5, 5, 1, 11, 0, 5, '1', '-1', 2, '2020-12-27 05:59:18'),
(6, 5, 1, 12, 0, 6, '1', '-1', 4, '2020-12-27 05:59:18'),
(7, 5, 1, 7, 0, 1, '1', '-1', 2, '2020-12-27 05:59:24'),
(8, 5, 1, 8, 0, 2, '1', '-1', 3, '2020-12-27 05:59:24'),
(9, 5, 1, 9, 0, 3, '1', '-1', 4, '2020-12-27 05:59:24'),
(10, 5, 1, 10, 0, 4, '1', '-1', 3, '2020-12-27 05:59:24'),
(11, 5, 1, 11, 0, 5, '1', '-1', 2, '2020-12-27 05:59:24'),
(12, 5, 1, 12, 0, 6, '1', '-1', 4, '2020-12-27 05:59:24'),
(13, 5, 1, 7, 0, 1, '1', '-1', 2, '2020-12-27 05:59:30'),
(14, 5, 1, 8, 0, 2, '1', '-1', 3, '2020-12-27 05:59:30'),
(15, 5, 1, 9, 0, 3, '1', '-1', 4, '2020-12-27 05:59:30'),
(16, 5, 1, 10, 0, 4, '1', '-1', 3, '2020-12-27 05:59:30'),
(17, 5, 1, 11, 0, 5, '1', '-1', 2, '2020-12-27 05:59:30'),
(18, 5, 1, 12, 0, 6, '1', '-1', 4, '2020-12-27 05:59:30'),
(19, 5, 1, 7, 0, 1, '1', '-1', 2, '2020-12-27 05:59:32'),
(20, 5, 1, 8, 0, 2, '1', '-1', 3, '2020-12-27 05:59:32'),
(21, 5, 1, 9, 0, 3, '1', '-1', 4, '2020-12-27 05:59:32'),
(22, 5, 1, 10, 0, 4, '1', '-1', 3, '2020-12-27 05:59:32'),
(23, 5, 1, 11, 0, 5, '1', '-1', 2, '2020-12-27 05:59:32'),
(24, 5, 1, 12, 0, 6, '1', '-1', 4, '2020-12-27 05:59:32'),
(25, 9, 1, 13, 1, 1, '1', '-1', 2, '2020-12-27 11:49:06'),
(26, 9, 1, 14, 1, 2, '1', '-1', 3, '2020-12-27 11:49:06'),
(27, 9, 1, 15, 2, 3, '1', '-1', 4, '2020-12-27 11:49:06'),
(28, 9, 1, 16, 2, 4, '1', '-1', 3, '2020-12-27 11:49:06'),
(29, 9, 1, 17, 2, 5, '1', '-1', 2, '2020-12-27 11:49:06'),
(30, 9, 1, 18, 1, 6, '1', '-1', 4, '2020-12-27 11:49:06'),
(31, 10, 1, 31, 2, 1, '1', '-0.25', 1, '2020-12-27 13:14:40'),
(32, 10, 1, 32, 1, 2, '1', '-1', 2, '2020-12-27 13:14:40'),
(33, 10, 1, 33, 3, 3, '1', '-1', 3, '2020-12-27 13:14:40'),
(34, 10, 1, 34, 1, 4, '1', '-1', 3, '2020-12-27 13:14:40'),
(35, 5, 6, 7, 0, 1, '1', '-1', 2, '2021-01-03 20:27:13'),
(36, 5, 6, 8, 0, 2, '1', '-1', 3, '2021-01-03 20:27:13'),
(37, 5, 6, 9, 0, 3, '1', '-1', 4, '2021-01-03 20:27:13'),
(38, 5, 6, 10, 0, 4, '1', '-1', 3, '2021-01-03 20:27:13'),
(39, 5, 6, 11, 0, 5, '1', '-1', 2, '2021-01-03 20:27:13'),
(40, 5, 6, 12, 0, 6, '1', '-1', 4, '2021-01-03 20:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `studentBatch`
--

CREATE TABLE `studentBatch` (
  `id` int(10) NOT NULL,
  `studentID` int(100) NOT NULL,
  `batchID` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentBatch`
--

INSERT INTO `studentBatch` (`id`, `studentID`, `batchID`, `date`) VALUES
(1, 1, 1, '2020-12-23 10:07:43'),
(2, 3, 1, '2020-12-23 10:09:34'),
(3, 1, 2, '2020-12-24 04:40:10'),
(4, 19, 1, '2020-12-27 04:02:13'),
(5, 19, 2, '2020-12-27 12:38:07'),
(6, 1, 3, '2020-12-27 13:14:11'),
(7, 1, 4, '2020-12-27 13:14:15'),
(8, 21, 1, '2020-12-29 07:57:03'),
(9, 6, 1, '2021-01-03 20:25:53'),
(10, 6, 2, '2021-01-03 20:25:57'),
(11, 6, 3, '2021-01-03 20:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `without_md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fathersName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mothersName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(10) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `without_md5`, `pass_md5`, `fathersName`, `mothersName`, `email`, `phone`, `address`, `course_id`, `status`, `date`) VALUES
(1, 'Raysa Jerin', '123', '202cb962ac59075b964b07152d234b70', '', '', 'rj@gmail.com', '01758633962', '', 0, 'Accepted', '2020-12-21 09:56:43'),
(2, 'Fahad', '123', '202cb962ac59075b964b07152d234b70', '', '', 'fahad@gmail.com', '01789635555', '', 0, 'Pending', '2020-12-23 06:35:11'),
(5, 'Ridoy Paul', '123', '202cb962ac59075b964b07152d234b70', '', '', 'cse.ridoypaul@gmail.com', '(+88)01758633961', '', 0, 'Accepted', '2020-12-24 14:22:20'),
(6, 'Raysa', '123', '202cb962ac59075b964b07152d234b70', '', '', 'rr@gmail.com', '(+88)01758633962', '', 0, 'Accepted', '2020-12-24 14:22:25'),
(7, 'Saifullah', '123', '202cb962ac59075b964b07152d234b70', '', '', 'ss@gmail.com', '(+88)01627382865', '', 0, 'Accepted', '2020-12-24 14:22:28'),
(8, 'Ridoy Paul', '123', '202cb962ac59075b964b07152d234b70', '', '', 'ridoypaul@gmail.com', '(+88)01758633961', '', 0, 'Accepted', '2020-12-24 14:22:33'),
(9, 'Ridoy Paul', '123', '202cb962ac59075b964b07152d234b70', '', '', 'rd@gmail.com', '(+88)01758633961', '', 0, 'Accepted', '2020-12-24 14:22:35'),
(10, 'Jahidul', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'jh@gmail.com', '(+88)01758633961', '', 0, 'Accepted', '2020-12-24 14:22:39'),
(13, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 0, 'Pending', '2020-12-24 14:28:03'),
(17, 'Sajjad Hossain', '456', '250cf8b51c773f3f8dc8b4be867a9a02', '', '', 'sajjad@gmail.com', '(+88)01758633961', '', 0, 'Accepted', '2020-12-24 14:50:06'),
(18, 'Jannatul Mawa', '789', '68053af2923e00204c3ca7c6a3150cf7', '', '', 'jj@gmail.com', '(+88)01758633962', '', 0, 'Accepted', '2020-12-24 14:50:06'),
(19, 'Liza', '100', 'f899139df5e1059396431415e770c6dd', '', '', 'liza@gmail.com', '(+88)01627382865', '', 0, 'Accepted', '2020-12-24 14:50:06'),
(20, 'Abdul Aziz', '123', '202cb962ac59075b964b07152d234b70', '', '', 'abdulaziz@gmail.com', '01871059689', '', 0, 'Pending', '2020-12-27 11:59:32'),
(21, 'Abdul Aziz', '123', '202cb962ac59075b964b07152d234b70', '', '', '123@gmail.com', '01871059689', '', 0, 'Accepted', '2020-12-27 13:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultForPermanentExam`
--
ALTER TABLE `resultForPermanentExam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentBatch`
--
ALTER TABLE `studentBatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `resultForPermanentExam`
--
ALTER TABLE `resultForPermanentExam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `studentBatch`
--
ALTER TABLE `studentBatch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
