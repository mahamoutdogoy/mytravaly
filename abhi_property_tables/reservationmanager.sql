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
-- Table structure for table `reservationmanager`
--

CREATE TABLE IF NOT EXISTS `reservationmanager` (
  `resid` int(100) NOT NULL AUTO_INCREMENT,
  `ownerid` varchar(100) NOT NULL,
  `resname` varchar(100) NOT NULL,
  `resemail` varchar(100) NOT NULL,
  `resphone` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  PRIMARY KEY (`resid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservationmanager`
--

