-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2019 at 04:18 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytravaly`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE IF NOT EXISTS `agreement` (
  `agreement_id` int(100) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `if_to_hotelName` varchar(100) NOT NULL,
  `if_to_address` varchar(100) NOT NULL,
  `individual_Name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `signature` longblob NOT NULL,
  PRIMARY KEY (`agreement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `agreement`
--

