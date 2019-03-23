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
-- Table structure for table `change_bankdetails`
--

CREATE TABLE IF NOT EXISTS `change_bankdetails` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `beneficiaryname` varchar(100) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  `accnumber` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `swiftcode` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `cancelcheque` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_bankdetails`
--

