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
-- Table structure for table `client_details`
--

DROP TABLE IF EXISTS `client_details`;
CREATE TABLE IF NOT EXISTS `client_details` (
  `ClientId` int(100) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `LeadSource` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `Phone` bigint(50) NOT NULL,
  `DateOpened` varchar(50) NOT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`ClientId`, `FirstName`, `LastName`, `CompanyName`, `LeadSource`, `Email`, `DOB`, `Phone`, `DateOpened`) VALUES
(1, 'Hamlet', 'Roy', 'MyTravaly.com', 'Social Mdia', 'director@mytravaly.com', '', 8884448940, '30/01/2019'),
(9, 'Abhi ', 'Gowda', 'MyTravaly.com', 'Advertisement', 'abhigowda@gmail.com', '', 9731181780, '31/01/2019'),
(10, 'prashanth', 'basava', 'MyTravaly.com', 'Social Mdia', 'prashanththunder007@gmail.com', '', 8880910157, '31/01/2019'),
(11, 'aamir', 's', 'MyTravaly.com', 'Social Mdia', 'aamirs689@gmail.com', '', 8884442010, '31/01/2019'),
(12, 'moujhaid', 'A', 'TT&H', 'Social Mdia', 'moujhaid@mytravaly.com', '', 8884448940, '31/01/2019'),
(13, 'Ashima', 'S', 'MyTravaly.com', 'Social Mdia', 'ashima@mytravaly.com', '', 9731181788, '31/01/2019'),
(14, 'abib', 'a', 'MyTravaly.com', 'Social Mdia', 'abib@mytravaly.com', '', 8884448940, '31/01/2019'),
(15, 'hamid', 'Roy', 'MyTravaly.com', 'Social Mdia', 'hamid@mytravaly.com', '', 9731181780, '31/01/2019'),
(16, 'siddu', 'h s', 'MyTravaly.com', 'Advertisement', 'prashanththunder007@gmail.com', '', 8884448940, '04/02/2019');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
