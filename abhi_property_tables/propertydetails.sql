-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2019 at 04:20 PM
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
-- Table structure for table `propertydetails`
--

CREATE TABLE IF NOT EXISTS `propertydetails` (
  `user_id` varchar(60) NOT NULL,
  `property_id` int(100) NOT NULL AUTO_INCREMENT,
  `ownerid` varchar(100) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `star` int(100) NOT NULL,
  `property_image` longblob NOT NULL,
  `propertytype` varchar(100) NOT NULL,
  `chainname` varchar(100) NOT NULL,
  `establishment` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL,
  `description` text NOT NULL,
  `Rating` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`property_id`),
  KEY `ownerid` (`ownerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `propertydetails`
--

