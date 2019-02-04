-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2019 at 12:39 PM
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
-- Database: `sb_database`
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
  `DueDate` text NOT NULL,
  PRIMARY KEY (`TaskId`,`ClientId`),
  KEY `ClientId` (`ClientId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`ClientId`, `TaskId`, `Task`, `Priority`, `AssignTo`, `Status`, `Description`, `Remarks`, `DueDate`) VALUES
(1, 1, 'Email', 'Hot', 'Taha', 'COMPLETED', '', '', '12/1/2019'),
(2, 2, 'Product Demo', 'Warm', 'Taha', 'ONGOING', 'call to prashanth ,he told to call back again after while ', 'conform booking', '13/1/2019'),
(3, 3, 'Message', 'Hot', 'Taha', 'COMPLETED', '', '', '14/1/2019'),
(4, 6, 'Message', 'Hot', 'prashanth  basava', 'ONGOING', 'conform booking soon ', '', '14/1/2019'),
(5, 7, 'Call', 'Hot', 'Taha', 'COMPLETED', 'test action ', 'Test action 11', '15/1/2019'),
(6, 8, 'Call', 'Hot', 'prashanth  basava', 'NOT_YET_STARTED', 'test action ', 'Test action 11', '15/1/2019'),
(7, 9, 'Message', 'Hot', 'Taha', 'COMPLETED', 'asdfghjk', 'conform booking', '15/1/2019'),
(8, 10, 'Call', 'Hot', 'Taha', 'COMPLETED', 'call answered ', 'conform booking', '15/1/2019'),
(9, 11, 'Email', 'Hot', 'Abhi  K T', 'NOT_YET_STARTED', '', '', '17/1/2019'),
(3, 16, 'Call', 'Warm', 'Taha', 'COMPLETED', '', '', '19/1/2019'),
(7, 17, 'Call', 'Warm', 'Abhi  K T', 'NOT_YET_STARTED', '', '', '19/1/2019'),
(1, 32, 'Call', 'Hot', 'Taha', 'COMPLETED', '', '', '17/1/2019'),
(3, 33, 'Email', 'Cold', 'Taha', 'NOT_YET_STARTED', '', '', '18/1/2019'),
(4, 34, 'Email', 'Hot', 'Taha', 'NOT_YET_STARTED', '', '', '18/1/2019'),
(8, 36, 'Message', 'Warm', 'Abhi', 'NOT_YET_STARTED', '', '', '20/1/2019'),
(2, 38, 'Call', 'Hot', 'prashanth  basava', 'NOT_YET_STARTED', '', '', '18/1/2019'),
(3, 39, 'Call', 'Hot', 'prashanth  basava', 'COMPLETED', '', '', '18/1/2019'),
(5, 40, 'Call', 'Warm', 'Prashanth  R Belkeri', 'NOT_YET_STARTED', '', '', '20/1/2019'),
(2, 42, 'Email', 'Hot', 'Taha', 'NOT_YET_STARTED', '', '', '19/1/2019'),
(3, 43, 'Message', 'Warm', 'Taha', 'NOT_YET_STARTED', '', '', '21/1/2019'),
(4, 44, 'Message', 'Warm', 'Taha', 'NOT_YET_STARTED', '', '', '21/1/2019'),
(1, 45, 'Call', 'Hot', 'Abhi  K T', 'ONGOING', '', '', '19/1/2019'),
(2, 46, 'Call', 'Hot', 'prashanth  basava', 'NOT_YET_STARTED', '', '', '19/1/2019'),
(2, 47, 'Call', 'Cold', 'Abhi', 'NOT_YET_STARTED', '', '', '25/1/2019'),
(4, 48, 'Call', 'Cold', 'Abhi', 'NOT_YET_STARTED', '', '', '25/1/2019'),
(1, 49, 'Email', 'Hot', 'Taha', 'NOT_YET_STARTED', '', '', '19/1/2019'),
(4, 50, 'Email', 'Hot', 'Taha', 'NOT_YET_STARTED', '', '', '19/1/2019');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task_details`
--
ALTER TABLE `task_details`
  ADD CONSTRAINT `task_details_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `client_details` (`ClientId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
