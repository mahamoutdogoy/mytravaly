-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2019 at 11:05 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytravaly_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

DROP TABLE IF EXISTS `task_details`;
CREATE TABLE IF NOT EXISTS `task_details` (
  `ClientId` int(100) NOT NULL,
  `TaskId` int(100) NOT NULL AUTO_INCREMENT,
  `Task` varchar(100) NOT NULL,
  `Priority` varchar(25) NOT NULL,
  `AssignTo` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `DueDate` date NOT NULL,
  PRIMARY KEY (`TaskId`,`ClientId`),
  KEY `ClientId` (`ClientId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`ClientId`, `TaskId`, `Task`, `Priority`, `AssignTo`, `Status`, `Description`, `Remarks`, `DueDate`) VALUES
(11, 13, 'Product Demo', 'Cold', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-07'),
(1, 10, 'Call', 'Warm', 'Taha', 'COMPLETED', '     ', '', '2019-01-03'),
(1, 9, 'Call', 'Hot', 'Taha', 'COMPLETED', '     ', '', '2019-01-31'),
(9, 22, 'Call', 'Hot', 'Taha', 'NOT YET STARTED', '', '', '2019-02-05'),
(9, 11, 'Email', 'Hot', 'Taha', 'ONGOING', '               ', '', '2019-02-01'),
(12, 14, 'Email', 'Warm', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-03'),
(13, 15, 'Call', 'Hot', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-01'),
(14, 16, 'Message', 'Warm', 'prashanth', 'COMPLETED', '     ', '', '2019-02-03'),
(15, 17, 'Product Demo', 'Cold', 'Taha', 'NOT YET STARTED', '', '', '2019-02-07'),
(10, 19, 'Call', 'Hot', 'Taha', 'COMPLETED', '          zFx', 'zsfzd', '2019-02-02'),
(10, 20, 'Email', 'Warm', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-04'),
(16, 21, 'Message', 'Warm', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-07'),
(9, 23, 'Product Demo', 'Warm', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-07'),
(14, 24, 'Call', 'Warm', 'prashanth', 'NOT YET STARTED', '', '', '2019-02-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
