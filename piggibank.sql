/*
SQLyog Ultimate v9.20 
MySQL - 5.5.62-0ubuntu0.14.04.1 : Database - piggiBank
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`piggiBank` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `piggiBank`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `balance` float unsigned DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `type` tinyint(10) unsigned NOT NULL,
  `customerId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1106 DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`balance`,`isActive`,`created`,`type`,`customerId`) values (1101,40250.2,1,'2019-04-22 14:14:33',1,1),(1102,125430,1,'2019-04-22 14:15:06',1,2),(1103,24000,1,'2019-04-22 14:15:23',1,3),(1104,47890,1,'2019-04-22 14:15:51',1,4),(1105,1127.9,1,'2019-04-22 14:16:16',1,5);

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `mobile` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125702 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`fullname`,`mobile`) values (1,'admin','e6e061838856bf47e1de730719fb2609','Swarnjeet Singh',981796895);

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` bigint(250) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125706 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`id`,`firstname`,`lastname`,`email`,`mobile`,`password`) values (1,'Swarnjeet','Singh','swarnjeet7@gmail.com',9891796895,'827ccb0eea8a706c4c34a16891f84e7b'),(2,'Manjeet','Singh','manjeet10@gmail.com',9911991257,'827ccb0eea8a706c4c34a16891f84e7b'),(3,'Praveen','Kumar','praveen@yahoo.com',9817987666,'827ccb0eea8a706c4c34a16891f84e7b'),(4,'Rajesh','Pant','rajeshpant@gmail.com',9874123659,'827ccb0eea8a706c4c34a16891f84e7b'),(5,'Varun','Kumar','varun1984@yahoo.com',7546891239,'827ccb0eea8a706c4c34a16891f84e7b');

/*Table structure for table `locker` */

DROP TABLE IF EXISTS `locker`;

CREATE TABLE `locker` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `freeOperations` int(2) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

/*Data for the table `locker` */

insert  into `locker`(`id`,`freeOperations`,`isActive`) values (101,12,1),(102,12,0),(103,12,0);

/*Table structure for table `locker_customer_map` */

DROP TABLE IF EXISTS `locker_customer_map`;

CREATE TABLE `locker_customer_map` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lockerId` int(10) unsigned NOT NULL,
  `accountId` int(10) unsigned NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `locker_customer_map` */

insert  into `locker_customer_map`(`id`,`lockerId`,`accountId`,`startDate`,`endDate`,`isActive`) values (1,101,1101,'2019-04-18','2020-04-17',1);

/*Table structure for table `locker_request` */

DROP TABLE IF EXISTS `locker_request`;

CREATE TABLE `locker_request` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `accountId` int(10) unsigned NOT NULL,
  `sharedCustomerIds` varchar(255) DEFAULT NULL,
  `duration` tinyint(4) DEFAULT '1',
  `type` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `reqDate` date DEFAULT NULL,
  `lockerId` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `locker_request` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
