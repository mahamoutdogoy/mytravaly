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
-- Table structure for table `policies`
--

CREATE TABLE IF NOT EXISTS `policies` (
  `property_id` int(11) NOT NULL,
  `cancel_policy` varchar(300) NOT NULL,
  `refund_policy` varchar(300) NOT NULL,
  `child_policy` varchar(300) NOT NULL,
  `damage_policy` varchar(300) NOT NULL,
  `property_restriction` varchar(500) NOT NULL,
  `pets_allowed` varchar(50) NOT NULL,
  `couple_friendly` varchar(50) NOT NULL,
  `suitable_for_children` varchar(50) NOT NULL,
  `bachulars_allowed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

