-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table alfatravel.administrator
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table alfatravel.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
	(1, 'marijn', 'dakraam1', 'Marijn', 'Koel'),
	(2, 'remco', 'dakraam2', 'Remco', 'Meinen');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;


-- Dumping structure for table alfatravel.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `country` varchar(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_path` varchar(255) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Admin_to_Article_idx` (`administrator_id`),
  CONSTRAINT `Admin_to_Article` FOREIGN KEY (`administrator_id`) REFERENCES `administrator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table alfatravel.article: ~0 rows (approximately)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `title`, `subtitle`, `intro`, `content`, `country`, `created`, `image_path`, `administrator_id`) VALUES
	(1, 'title 1', 'subtitle 1', 'intro 1', 'content 1 ', 'nl', '2015-05-19 11:00:51', 'test/a.jpg', 1),
	(2, 'title 2', 'subtitle 2', 'intro 2', 'content 2', 'de', '2015-05-19 11:01:13', 'test/a.jpg', 2),
	(3, 'title 3', 'subtitle 3', 'intro 3', 'content 3', 'nl', '2015-05-19 11:01:41', 'test/b.jpg', 1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
