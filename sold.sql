-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 05:46 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sold`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `mail-id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`aid`, `qid`, `answer`, `mail-id`) VALUES
(1, 1, 'related to question 1', 'abc@gmail.com'),
(2, 1, 'again related to question 1\r\n', 'abc@gmail.com'),
(3, 2, 'i dont remember the question so i am just doing this XD', 'abc@gmail.com'),
(4, 1, 'this is answer to that 1st question which is totally irrelevent to context', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `question` varchar(767) COLLATE utf8_unicode_ci NOT NULL,
  `mail-id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`question`, `mail-id`, `qid`) VALUES
('how to install linux os in pendrive to make it portable os?', 'xyz@gmail.com', 1),
('how to be pro in php', 'xyz@gmail.com', 2),
('how to be pro in mysqli', 'xyz@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail-id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `mail-id`) VALUES
('abc', '202cb962ac59075b964b07152d234b70', 'abc@gmail.com'),
('xyz', 'abc', 'xyz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans`
--
ALTER TABLE `ans`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `fkey` (`qid`),
  ADD KEY `foreignone` (`mail-id`);

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `Foreign key` (`mail-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mail-id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans`
--
ALTER TABLE `ans`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ans`
--
ALTER TABLE `ans`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`qid`) REFERENCES `ques` (`qid`),
  ADD CONSTRAINT `foreignone` FOREIGN KEY (`mail-id`) REFERENCES `users` (`mail-id`);

--
-- Constraints for table `ques`
--
ALTER TABLE `ques`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`mail-id`) REFERENCES `users` (`mail-id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
