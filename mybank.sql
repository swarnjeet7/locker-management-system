-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2019 at 07:25 AM
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
-- Database: `mybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customers_id` int(20) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `customers_id`, `firstname`, `lastname`, `password`) VALUES
(1, 125701, 'Swarnjeet', 'Singh', 'swarnjeet@701'),
(2, 125702, 'Manjeet', 'Singh', 'manjeet@702'),
(3, 125703, 'Praveen', 'Kumar', 'praveen@703'),
(4, 125704, 'Rajesh', 'Pant', 'rajesh@704'),
(5, 125705, 'Varun', 'Kumar', 'varun@705');

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
  `balance` int(100) UNSIGNED NOT NULL,
  `mobile` bigint(250) NOT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125706 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `balance`, `mobile`, `reg_date`) VALUES
(125701, 'Swarnjeet', 'Singh', 'swarnjeet7@gmail.com', 54100, 9891796895, '2019-04-14 07:28:53'),
(125702, 'Manjeet', 'Singh', 'manjeet10@gmail.com', 104100, 9911991257, '2019-04-14 07:35:53'),
(125703, 'Praveen', 'Kumar', 'praveen@yahoo.com', 304100, 9817987666, '2019-04-14 07:36:55'),
(125704, 'Rajesh', 'Pant', 'rajeshpant@gmail.com', 34100, 9874123659, '2019-04-14 07:37:52'),
(125705, 'Varun', 'Kumar', 'varun1984@yahoo.com', 95010, 7546891239, '2019-04-14 07:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

DROP TABLE IF EXISTS `locker`;
CREATE TABLE IF NOT EXISTS `locker` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `totalOperations` int(3) UNSIGNED DEFAULT NULL,
  `freeOperations` int(2) UNSIGNED DEFAULT NULL,
  `peroid` int(2) UNSIGNED NOT NULL,
  `jointType` int(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
