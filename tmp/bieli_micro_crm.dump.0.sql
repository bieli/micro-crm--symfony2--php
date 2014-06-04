-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: bieli_micro_crm
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type_id` int(11) NOT NULL,
  `seller_id` smallint(6) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `source` smallint(6) DEFAULT NULL,
  `source_type` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_81398E093931747B` (`pesel`),
  UNIQUE KEY `UNIQ_81398E09E7927C74` (`email`),
  UNIQUE KEY `UNIQ_81398E09444F97DD` (`phone`),
  UNIQUE KEY `UNIQ_81398E09E2F35FF3` (`phone2`),
  KEY `IDX_81398E09D991282D` (`customer_type_id`),
  KEY `IDX_81398E098DE820D9` (`seller_id`),
  CONSTRAINT `FK_81398E09D991282D` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,2,1,'Janek','Kowalski','771112','janek.kowalski123123@o2.pl','22997876232',NULL,NULL,NULL,NULL,NULL,'2014-06-04 21:19:40'),(2,1,1,'Juzek','Trzmiałek','80090523142','juzek.123@waw.pl','487765231',NULL,NULL,NULL,NULL,NULL,'2014-06-04 21:21:24');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_type`
--

DROP TABLE IF EXISTS `customer_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D84FF35E5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_type`
--

LOCK TABLES `customer_type` WRITE;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` VALUES (1,'PARTNER'),(3,'POLECENIE'),(4,'TARGI'),(2,'ZNAJOMY');
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_3BAE0AA79395C3F3` (`customer_id`),
  KEY `IDX_3BAE0AA7401B253C` (`event_type_id`),
  CONSTRAINT `FK_3BAE0AA7401B253C` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`),
  CONSTRAINT `FK_3BAE0AA79395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,2,4,'2014-06-02 21:52:00','złożyłem ofertę osobiście'),(2,2,2,'2014-06-02 15:38:00','sygnal od k. że zmienił pracę - czekam na nowe dane'),(3,2,4,'2014-06-04 21:55:00','przesylam poprawiona oferte'),(4,1,6,'2014-06-04 22:26:00','zainteresowanie zarabianiem na procentach z oszczednosci'),(5,1,6,'2014-06-04 23:05:00','w sprawie załącznika nr. 3 do umowy kredytowej');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_93151B825E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (2,'MONIT'),(1,'NOTKA'),(4,'OFERTA -> EMAIL'),(7,'PODPISANIE UMOWY'),(5,'SPOTKANIE'),(3,'SZKIC OFERTY'),(8,'TELEFON DO KLIENTA'),(6,'TELEFON OD KLIENTA');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `activity_hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FB1AD3FCE7927C74` (`email`),
  UNIQUE KEY `UNIQ_FB1AD3FC444F97DD` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'Marcin','Bielak','marcin.bieli@gmail.com','507447883','a','b',1,'2014-06-04 22:56:36'),(2,'Sargon','Abdalla','sargon.abdalla@wp.eu','','b','c',1,'2014-06-04 22:56:36');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transmission`
--

DROP TABLE IF EXISTS `transmission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transmission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transmission`
--

LOCK TABLES `transmission` WRITE;
/*!40000 ALTER TABLE `transmission` DISABLE KEYS */;
/*!40000 ALTER TABLE `transmission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-04 23:30:14
