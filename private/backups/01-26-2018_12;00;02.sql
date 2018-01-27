-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: kgas_database
-- ------------------------------------------------------
-- Server version	5.6.39

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
  `intact_armor_plates` double DEFAULT NULL,
  `nanite_compound` double DEFAULT NULL,
  `interface_circuit` double DEFAULT NULL,
  `power_circuit` double DEFAULT NULL,
  `logic_circuit` double DEFAULT NULL,
  `enhanced_ward_console` double DEFAULT NULL,
  `shield_quant` int(11) DEFAULT NULL,
  `shield_price` double DEFAULT NULL,
  `armor_quant` int(11) DEFAULT NULL,
  `armor_price` double DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rig_log`
--

LOCK TABLES `rig_log` WRITE;
/*!40000 ALTER TABLE `rig_log` DISABLE KEYS */;
INSERT INTO `rig_log` VALUES (1,'2018-01-24 07:31:23',0,0,0,380377,703201,2850011,250,18899954,0,0,0.0055,1),(2,'2018-01-25 03:32:15',0,0,0,382002.01,710506.86,2700504.76,250,19094992.04,0,0,0.0072,1);
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

-- Dump completed on 2018-01-26 12:00:02
