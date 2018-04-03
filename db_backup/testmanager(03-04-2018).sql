-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 06:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`ID` int(150) NOT NULL,
  `ProjectName` varchar(250) COLLATE latin1_bin NOT NULL,
  `CreatedBy` varchar(250) COLLATE latin1_bin NOT NULL,
  `CreatedTime` varchar(250) COLLATE latin1_bin NOT NULL,
  `Description` varchar(250) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `ProjectName`, `CreatedBy`, `CreatedTime`, `Description`) VALUES
(70, 'john', 'ionut', '2018-03-23 15:12:07', 'john'),
(77, 'kjsdhskdfhsk', 'ionut', '2018-03-29 14:05:44', 'ksdfjhksdhfjkhd'),
(80, 'f', 'ionut', '2018-03-30 17:42:26', 'f'),
(81, '4444', 'ionut', '2018-04-03 13:48:46', '4444'),
(82, 'ttttttttt', 'ionut', '2018-04-03 17:17:51', 'ttttttttttttttttttttttttttttttttttttt'),
(83, 'uuuuuuuu', 'ionut', '2018-04-03 17:42:10', 'this is a description'),
(84, '4', 'ionut', '2018-04-03 17:55:34', '4'),
(85, 'uaiuai', 'ionut', '2018-04-03 18:32:20', 'mai mai '),
(86, 'www', 'ionut', '2018-04-03 18:53:37', 'www');

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE IF NOT EXISTS `testcase` (
`ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedTime` varchar(255) NOT NULL,
  `section` varchar(250) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`ID`, `Name`, `CreatedBy`, `CreatedTime`, `section`, `ProjectID`) VALUES
(11, 'ionut', 'ionut', '2018-04-03 14:26:34', '', 70),
(12, 'john', 'ionut', '2018-04-03 14:28:28', '', 70),
(13, 'ionut_pass', 'ionut', '2018-04-03 14:28:38', '', 70),
(14, 'id77_001', 'ionut', '2018-04-03 14:31:31', '', 77),
(15, 'id77_002', 'ionut', '2018-04-03 14:31:44', '', 77),
(16, 'id77_003', 'ionut', '2018-04-03 14:31:53', '', 77),
(17, 'eeee', 'ionut', '2018-04-03 14:48:24', '', 70),
(18, '123', 'ionut', '2018-04-03 18:32:42', '', NULL),
(19, 'ionut is testing this', 'ionut', '2018-04-03 18:35:34', '', 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(150) COLLATE latin1_bin NOT NULL,
  `password` varchar(250) COLLATE latin1_bin NOT NULL,
  `ip_address` varchar(40) COLLATE latin1_bin NOT NULL,
  `reg_time` varchar(40) COLLATE latin1_bin NOT NULL,
  `reg_date` varchar(40) COLLATE latin1_bin NOT NULL,
  `email` varchar(100) COLLATE latin1_bin NOT NULL,
  `user_status` varchar(20) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ip_address`, `reg_time`, `reg_date`, `email`, `user_status`) VALUES
(1, 'ionut', 'pass', '127.127.127.127', '12:00:05', '07-02-2018', 'ionut.apostu@mail.com', ''),
(4, 'Barry.GribbenBOI', 'pass', '127.0.0.1', '02:36:37', '2018-02-08', 'alex.alvarez70@mail.com', ''),
(5, 'john', 'ionut', '127.0.0.1', '03:05:39', '2018-02-08', 'john@john.com', ''),
(6, 'x', 'x', '127.0.0.1', '15:49:01', '2018-02-08', 'x@x.com', ''),
(7, 'n', 'n', '127.0.0.1', '16:33:57', '2018-02-08', 'n@n.com', ''),
(8, 'c', 'c', '127.0.0.1', '16:54:57', '2018-02-08', 'c@c.com', ''),
(9, 'john1', 'password', '127.0.0.1', '00:10:10', '2018-02-09', 'john1@gmail.com', ''),
(10, 'test', 'pass', '127.0.0.1', '00:12:49', '2018-02-09', 'pass', ''),
(11, 'Ionut.Apostu0011', 'password', '127.0.0.1', '23:25:13', '2018-02-08', 'ionut.apostu@banctec.ie', ''),
(12, 'johnny', 'password', '127.0.0.1', '15:54:03', '2018-02-09', 'ionut.n.apostu@gmail.com', ''),
(13, 'jjjjjjjjj', 'l3v75th5n', '::1', '10:58:03', '2018-03-15', 'ionut.n.apostu@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testcase`
--
ALTER TABLE `testcase`
 ADD PRIMARY KEY (`ID`), ADD KEY `FK_testcase_ProjectID` (`ProjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `ID` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `testcase`
--
ALTER TABLE `testcase`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `testcase`
--
ALTER TABLE `testcase`
ADD CONSTRAINT `FK_testcase_ProjectID` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
