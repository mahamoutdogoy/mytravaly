-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2019 at 04:22 PM
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
-- Table structure for table `rooms_tax`
--

CREATE TABLE IF NOT EXISTS `rooms_tax` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singletax` double NOT NULL DEFAULT '0',
  `doubletax` double NOT NULL DEFAULT '0',
  `tripletax` double NOT NULL DEFAULT '0',
  `person4tax` double NOT NULL DEFAULT '0',
  `person5tax` double NOT NULL DEFAULT '0',
  `person6tax` double NOT NULL DEFAULT '0',
  `person7tax` double NOT NULL DEFAULT '0',
  `person8tax` double NOT NULL DEFAULT '0',
  `person9tax` double NOT NULL DEFAULT '0',
  `person10tax` double NOT NULL DEFAULT '0',
  `person11tax` double NOT NULL DEFAULT '0',
  `person12tax` double NOT NULL DEFAULT '0',
  `person13tax` double NOT NULL DEFAULT '0',
  `person14tax` double NOT NULL DEFAULT '0',
  `person15tax` double NOT NULL DEFAULT '0',
  `extrapersontax` double NOT NULL DEFAULT '0',
  `extrachildtax` double NOT NULL DEFAULT '0',
  `infanttax` double NOT NULL DEFAULT '0',
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_tax`
--

