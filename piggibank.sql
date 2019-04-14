-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2019 at 07:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piggibank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `balance` float UNSIGNED DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `type` tinyint(10) UNSIGNED NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `balance`, `isActive`, `created`, `type`, `customerId`) VALUES
(1101, 40250.2, 1, '2019-04-22 14:14:33', 1, 1),
(1102, 125430, 1, '2019-04-22 14:15:06', 1, 2),
(1103, 24000, 1, '2019-04-22 14:15:23', 1, 3),
(1104, 47890, 1, '2019-04-22 14:15:51', 1, 4),
(1105, 1127.9, 1, '2019-04-22 14:16:16', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` bigint(250) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125706 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`) VALUES
(1, 'Swarnjeet', 'Singh', 'swarnjeet7@gmail.com', 9891796895, 'a6b2a8d71879a3dd0b8e0719fb4ec5bb'),
(2, 'Manjeet', 'Singh', 'manjeet10@gmail.com', 9911991257, 'a6b2a8d71879a3dd0b8e0719fb4ec5bb'),
(3, 'Praveen', 'Kumar', 'praveen@yahoo.com', 9817987666, 'a6b2a8d71879a3dd0b8e0719fb4ec5bb'),
(4, 'Rajesh', 'Pant', 'rajeshpant@gmail.com', 9874123659, 'a6b2a8d71879a3dd0b8e0719fb4ec5bb'),
(5, 'Varun', 'Kumar', 'varun1984@yahoo.com', 7546891239, 'a6b2a8d71879a3dd0b8e0719fb4ec5bb');

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

DROP TABLE IF EXISTS `locker`;
CREATE TABLE IF NOT EXISTS `locker` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `freeOperations` int(2) UNSIGNED DEFAULT NULL,
  `peroid` int(2) UNSIGNED DEFAULT NULL,
  `jointType` int(1) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`id`, `freeOperations`, `peroid`, `jointType`) VALUES
(101, 12, NULL, NULL),
(102, 12, NULL, NULL),
(103, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locker_customer_map`
--

DROP TABLE IF EXISTS `locker_customer_map`;
CREATE TABLE IF NOT EXISTS `locker_customer_map` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lockerId` int(10) UNSIGNED NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locker_request`
--

DROP TABLE IF EXISTS `locker_request`;
CREATE TABLE IF NOT EXISTS `locker_request` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customerId` int(10) UNSIGNED NOT NULL,
  `sharedCustomerIds` varchar(255) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
