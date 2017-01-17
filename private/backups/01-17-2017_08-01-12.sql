-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: eve
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rig_log`
--

DROP TABLE IF EXISTS `rig_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rig_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_completed` datetime DEFAULT NULL,
  `intact_armor_plates` float DEFAULT NULL,
  `nanite_compound` float DEFAULT NULL,
  `interface_circuit` float DEFAULT NULL,
  `power_circuit` float DEFAULT NULL,
  `logic_circuit` float DEFAULT NULL,
  `enhanced_ward_console` float DEFAULT NULL,
  `shield_quant` int(11) DEFAULT NULL,
  `shield_price` float DEFAULT NULL,
  `armor_quant` int(11) DEFAULT NULL,
  `armor_price` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rig_log`
--

LOCK TABLES `rig_log` WRITE;
/*!40000 ALTER TABLE `rig_log` DISABLE KEYS */;
INSERT INTO `rig_log` VALUES (1,'2017-01-17 02:18:32',0,0,0,0,0,0,0,0,0,0,0),(2,'2017-01-17 02:18:33',0,0,0,0,0,0,0,0,0,0,0),(3,'2017-01-17 02:18:34',0,0,0,0,0,0,0,0,0,0,0),(4,'2017-01-17 02:18:35',0,0,0,0,0,0,0,0,0,0,0),(5,'2017-01-17 02:52:43',0.08,0,0,0,0,0,0,0,0,0,0),(6,'2017-01-17 02:52:52',0,0,0,0,0,0,6,0,0,0,0);
/*!40000 ALTER TABLE `rig_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-17  8:01:16
