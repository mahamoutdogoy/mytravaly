-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2019 at 11:49 AM
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
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE IF NOT EXISTS `mail_template` (
  `HotelId` int(100) NOT NULL,
  `TemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(10000) NOT NULL DEFAULT 'Template Subject',
  `Body` varchar(50000) NOT NULL DEFAULT 'Template Body',
  PRIMARY KEY (`TemplateId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_template`
--

INSERT INTO `mail_template` (`HotelId`, `TemplateId`, `Subject`, `Body`) VALUES
(0, 1, 'Template Subject1', 'Template Body1'),
(0, 2, 'Template Subject2', 'Template Body2'),
(0, 3, 'Template Subject3', 'Template Body3'),
(0, 4, 'Template Subject4', 'Template Body4'),
(1, 5, 'this is my Subject', 'this is my mail Body'),
(1, 6, 'Template Subject6', 'Template Body6'),
(1, 14, 'Template Subject1', 'Template Body1 '),
(2, 8, 'Template Subject1', 'Template Body1 '),
(2, 9, 'hotel A template', 'hotel A template'),
(1, 15, 'Template Subject1', 'Template Body1  '),
(1, 16, 'edgfhj', 'ersdtfyguhijkl;');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
