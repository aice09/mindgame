-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for umbramindgame
DROP DATABASE IF EXISTS `umbramindgame`;
CREATE DATABASE IF NOT EXISTS `umbramindgame` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `umbramindgame`;

-- Dumping structure for table umbramindgame.scores
DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `score_userid` varchar(50) DEFAULT NULL,
  `score_time` varchar(50) DEFAULT NULL,
  `score_flips` varchar(50) DEFAULT NULL,
  `score_dtcreated` varchar(50) DEFAULT NULL,
  `score_createdby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table umbramindgame.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `usersalt` text DEFAULT NULL,
  `userpass` text DEFAULT NULL,
  `userfirstname` varchar(255) DEFAULT NULL,
  `usermiddlename` varchar(255) DEFAULT NULL,
  `userlastname` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `usercategory` varchar(255) DEFAULT NULL,
  `userstatus` enum('activated','suspended','unactivated') DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
