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
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `personid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(60) DEFAULT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `mname` varchar(60) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `active` bit(1) DEFAULT b'1',
  `deleted` bit(1) DEFAULT b'0',
  `datestarteffectivity` date DEFAULT NULL,
  `dateendeffectivity` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`personid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'Penaflor','Rommel','A','HOMEOWNER','','\0','2017-01-01','2017-12-31',NULL,'2017-06-06 22:16:05',NULL),(2,'Supnet','Erikson','Z','HOMEOWNER','','\0','2017-01-01','2017-12-31',NULL,'2017-06-06 22:16:40',NULL),(3,'Market','Puring','V.','OUTSIDE','','\0','2017-06-09','2017-06-09','2017-06-09 04:44:00','2017-06-09 04:44:00',1),(4,'Vinas','Jilrie','A','OUTSIDE','','\0','2017-06-15','2017-06-15','2017-06-15 07:19:10','2017-06-15 07:19:10',1),(5,'Lee','Mark','O','HOMEOWNER','','\0','2017-06-15','2017-06-15','2017-06-15 10:05:52','2017-06-15 10:05:52',1),(6,'Unidad','Bernie','A','HOMEOWNER','','\0','2017-06-15','2017-06-15','2017-06-15 10:36:08','2017-06-15 10:36:08',1),(10,'lname1','fname2','A.1','HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 04:43:24','2017-06-16 04:43:24',1),(20,'lname','fname','A.','HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 07:26:11','2017-06-16 07:26:11',1),(21,'test_lname','test_fname','test_mname','HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 20:06:12','2017-06-16 20:06:12',1),(22,'test_outside_lname','test_outside_fname',NULL,'OUTSIDE','','\0','2017-06-16','2099-12-31','2017-06-16 20:07:47','2017-06-16 20:07:47',1),(23,'test1','test2',NULL,'HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 20:09:19','2017-06-16 20:09:19',1),(24,'1','2',NULL,'HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 20:09:59','2017-06-16 20:09:59',1),(25,'3','4',NULL,'HOMEOWNER','','\0','2017-06-16','2099-12-31','2017-06-16 20:10:44','2017-06-16 20:10:44',1),(26,'sds','sds','sd','HOMEOWNER','','\0','2017-06-17','2099-12-31','2017-06-17 02:44:11','2017-06-17 02:44:11',1);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
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
