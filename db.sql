-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.21 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pos_random_phone.mobile_number
DROP TABLE IF EXISTS `mobile_number`;
CREATE TABLE IF NOT EXISTS `mobile_number` (
  `mobie_id` int(5) NOT NULL AUTO_INCREMENT,
  `mobile_name` varchar(25) DEFAULT NULL,
  `status` tinytext,
  PRIMARY KEY (`mobie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pos_random_phone.mobile_number: 4 rows
DELETE FROM `mobile_number`;
/*!40000 ALTER TABLE `mobile_number` DISABLE KEYS */;
INSERT INTO `mobile_number` (`mobie_id`, `mobile_name`, `status`) VALUES
	(1, '011855610', '1'),
	(2, '096235469', '1'),
	(3, '0123848494', '1'),
	(4, '096253535', '1');
/*!40000 ALTER TABLE `mobile_number` ENABLE KEYS */;

-- Dumping structure for table pos_random_phone.select_phone
DROP TABLE IF EXISTS `select_phone`;
CREATE TABLE IF NOT EXISTS `select_phone` (
  `select_id` int(5) NOT NULL AUTO_INCREMENT,
  `mobile_id` int(5) DEFAULT NULL,
  `no` int(5) DEFAULT NULL,
  `status` text COMMENT '1=active,0=deactive,2=win',
  PRIMARY KEY (`select_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table pos_random_phone.select_phone: 0 rows
DELETE FROM `select_phone`;
/*!40000 ALTER TABLE `select_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `select_phone` ENABLE KEYS */;

-- Dumping structure for table pos_random_phone.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table pos_random_phone.user: 1 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_name`, `user_password`) VALUES
	(1, 'houng', '123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
