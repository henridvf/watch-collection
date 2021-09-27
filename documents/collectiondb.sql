# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: collectiondb
# Generation Time: 2021-09-27 21:24:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`)
VALUES
	(1,'OMEGA'),
	(2,'TAG HEUER');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table watches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `watches`;

CREATE TABLE `watches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `brand` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watches_brands` (`brand`),
  CONSTRAINT `fk_watches_brands` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `watches` WRITE;
/*!40000 ALTER TABLE `watches` DISABLE KEYS */;

INSERT INTO `watches` (`id`, `name`, `purchase_date`, `notes`, `price`, `link`, `brand`)
VALUES
	(1,'DeVille Mens Co-Axial 39.5mm Automatic Watch','2015-08-20','Elegant, classic design. These timepieces are characterised by pure styling with luxury finishes, and exude a timeless design.',2870,'https://www.watches-of-switzerland.co.uk/Omega-De-Ville-Mens-Co+Axial-39.5mm-Automatic-Watch-O42413402002001/p/17330971?gclid=Cj0KCQjw18WKBhCUARIsAFiW7JwZcseNfabJYPpjdPOsh-fjU7_7_lFbrwN3_GV_wIFdS7HZp022P9AaAkvoEALw_wcB',1),
	(2,'Formula 1 Aston Martin Red Bull Racing Special Edition 2020','2018-03-29','The sleek design takes inspiration from the new Aston Martin Red Bull Racing Formula 1 car that was presented on February 19th, 2020 in Barcelona, Spain',1500,'https://www.watches-of-switzerland.co.uk/TAG-Heuer-Formula-1-Aston-Martin-Red-Bull-Racing-Special-Edition-2020-CAZ101AB.BA0842/p/17381908',2);

/*!40000 ALTER TABLE `watches` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
