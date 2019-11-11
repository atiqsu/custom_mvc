/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - custom_mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`custom_mvc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `custom_mvc`;

/*Table structure for table `buy_product` */

DROP TABLE IF EXISTS `buy_product`;

CREATE TABLE `buy_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(10) DEFAULT NULL,
  `buyer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_at` date DEFAULT NULL,
  `entry_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_email_index` (`buyer_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
