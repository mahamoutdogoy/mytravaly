-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2019 at 04:21 PM
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
-- Table structure for table `rooms_detail`
--

CREATE TABLE IF NOT EXISTS `rooms_detail` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_r_id` varchar(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `min_occupancy` int(11) NOT NULL DEFAULT '1',
  `max_occupancy` int(11) NOT NULL,
  `max_occupancy_child` int(20) NOT NULL,
  `tariff` varchar(50) NOT NULL,
  `inventory` varchar(50) NOT NULL,
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_detail`
--

