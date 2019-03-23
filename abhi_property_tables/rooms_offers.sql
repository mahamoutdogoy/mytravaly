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
-- Table structure for table `rooms_offers`
--

CREATE TABLE IF NOT EXISTS `rooms_offers` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `p_r_id` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_offers`
--

