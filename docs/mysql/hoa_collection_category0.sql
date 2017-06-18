-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: hoa
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `collection_category`
--

DROP TABLE IF EXISTS `collection_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_category` (
  `collection_categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `frequency` varchar(25) DEFAULT NULL,
  `isfixamount` bit(1) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  `datestarteffectivity` date DEFAULT NULL,
  `dateendeffectivity` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`collection_categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_category`
--

LOCK TABLES `collection_category` WRITE;
/*!40000 ALTER TABLE `collection_category` DISABLE KEYS */;
INSERT INTO `collection_category` VALUES (1,'MF','Membership Fee','','',1000.00,'','2017-06-01','2099-06-01',NULL,'2017-06-09 13:37:33',NULL),(2,'CARSTICKER','Car Sticker','','\0',1000.00,'','2017-06-01','2099-06-01',NULL,'2017-06-09 13:46:24',NULL),(3,'BBLIGHT','Basket Court Ilawan','','',1000.00,'\0','2017-06-01','2099-06-01',NULL,'2017-06-09 13:47:38',NULL),(4,'MONTHLYDUES','Monthly Dues','','',50.00,'','2017-01-01','2099-12-31',NULL,'2017-06-09 14:32:08',NULL),(5,'SAMPLE','sample',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:35:31','2017-06-16 19:35:31',NULL),(6,'sd','sds',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:37:20','2017-06-16 19:37:20',NULL),(7,'sample1','sds',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:41:43','2017-06-16 19:41:43',NULL),(8,'sample2','sample',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:42:39','2017-06-16 19:42:39',NULL),(9,'rom','rom',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:43:31','2017-06-16 19:43:31',NULL),(10,'rom1','rom1',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:44:24','2017-06-16 19:44:24',NULL),(11,'rom2','rom2',NULL,NULL,NULL,'',NULL,NULL,'2017-06-16 19:46:21','2017-06-16 19:46:21',NULL);
/*!40000 ALTER TABLE `collection_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-17 19:29:42
