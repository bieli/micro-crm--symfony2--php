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
  `seller_id` int(11) NOT NULL,
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
  CONSTRAINT `FK_81398E098DE820D9` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  CONSTRAINT `FK_81398E09D991282D` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,1,1,'Janek','Kowalski','80090523142','qwqw@wew.pl','12312312312',NULL,NULL,NULL,NULL,NULL,'2014-06-05 00:01:00'),(2,2,2,'Juzek','Trzmiałek','77111212345','juzek.123@waw.pl','123234459',NULL,NULL,NULL,NULL,NULL,'2014-06-05 01:03:00');
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
  `description` tinytext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
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
INSERT INTO `event` VALUES (1,2,4,'złożyłem ofertę osobiście','2014-06-02 21:52:00'),(2,2,2,'sygnal od k. że zmienił pracę - czekam na nowe dane','2014-06-02 15:38:00'),(3,2,4,'przesylam poprawiona oferte','2014-06-04 21:55:00'),(4,1,6,'zainteresowanie zarabianiem na procentach z oszczednosci','2014-06-04 22:26:00'),(5,1,8,'w sprawie załącznika nr. 3 do umowy kredytowej','2014-06-04 23:05:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (12,'INFORMACJE DLA DOSTAWCY'),(11,'INFORMACJE OD DOSTAWCY'),(10,'INFORMACJE Z CENTRALI'),(9,'KONSULTACJA Z CENTRALĄ'),(2,'MONIT'),(1,'NOTKA'),(4,'OFERTA -> EMAIL'),(7,'PODPISANIE UMOWY'),(5,'SPOTKANIE'),(3,'SZKIC OFERTY'),(8,'TELEFON DO KLIENTA'),(6,'TELEFON OD KLIENTA');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_group_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `commission_for_granting` double DEFAULT NULL,
  `insurance_type_id` int(11) DEFAULT NULL,
  `insurance_amount` double DEFAULT NULL,
  `interest_base_rate` double DEFAULT NULL,
  `interest_kind_id` double DEFAULT NULL,
  `interest_amount` double DEFAULT NULL,
  `interest_margin` double DEFAULT NULL,
  `commission_for_early_repayment_amount` double DEFAULT NULL,
  `commission_for_early_repayment_to` date DEFAULT NULL,
  `url` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `tranches_count` int(11) DEFAULT NULL,
  `credit_amount` double DEFAULT NULL,
  `credit_agreement_date` date DEFAULT NULL,
  `credit_start_date` date DEFAULT NULL,
  `credit_period_in_months` int(11) DEFAULT NULL,
  `credit_end_date` date DEFAULT NULL,
  `grace_period_for_repayment_of_capital_in_months` int(11) DEFAULT NULL,
  `insurance_life_to` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D34A04AD5E237E06` (`name`),
  KEY `IDX_D34A04AD35E4B3D0` (`product_group_id`),
  KEY `IDX_D34A04ADA53A8AA` (`provider_id`),
  CONSTRAINT `FK_D34A04AD35E4B3D0` FOREIGN KEY (`product_group_id`) REFERENCES `product_group` (`id`),
  CONSTRAINT `FK_D34A04ADA53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,2,45,'test 1','t2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-09 22:20:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,53,'BNP TEST hipo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-09 23:24:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-18'),(3,3,51,'BGZ - firma 1','BGZ - firma 1111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-09 23:25:12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,4,71,'ING faktoring INGFFF','INGFFF',12,NULL,222,NULL,NULL,12,NULL,NULL,NULL,NULL,'2014-06-09 23:26:06',1,300000.09,NULL,NULL,NULL,NULL,NULL,NULL),(5,5,75,'mBank - ubezp AAA','mBank - ubezp AAA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-09 23:26:36',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_group`
--

DROP TABLE IF EXISTS `product_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `url` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CC9C3F995E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_group`
--

LOCK TABLES `product_group` WRITE;
/*!40000 ALTER TABLE `product_group` DISABLE KEYS */;
INSERT INTO `product_group` VALUES (1,'kredyty hipoteczne',NULL,NULL,'2014-06-07 21:37:00'),(2,'kredyty gotówkowe',NULL,NULL,'2014-06-07 21:37:00'),(3,'kredyty firmowe',NULL,NULL,'2014-06-07 21:37:00'),(4,'leasing / faktoring',NULL,NULL,'2014-06-07 21:38:00'),(5,'ubezpieczenia nieruchomości',NULL,NULL,'2014-06-07 21:38:00'),(6,'ubezpieczenia na życie',NULL,NULL,'2014-06-07 21:38:00'),(7,'produkty oszczędnościowe jednorazowe',NULL,NULL,'2014-06-07 21:38:00'),(8,'produkty oszczędnościowe regularne',NULL,NULL,'2014-06-07 21:39:00');
/*!40000 ALTER TABLE `product_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_92C4739C5E237E06` (`name`),
  UNIQUE KEY `UNIQ_92C4739CE7927C74` (`email`),
  UNIQUE KEY `UNIQ_92C4739C444F97DD` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` VALUES (45,'Alior Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(46,'AXA',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(47,'Axa Życie',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(48,'Bankowy Fundusz Leasingowy',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(49,'Bank Pekao SA',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(50,'Bank Pocztowy',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(51,'BGŻ',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(52,'Bibby Financial Service',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(53,'BNP Paribas',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(54,'BOŚ',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(55,'BPH',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(56,'BRE Leasing',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(57,'BZWBK',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(58,'Citibank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(59,'Credit Agricole',NULL,NULL,NULL,NULL,'2014-06-07 21:49:25'),(60,'Deutsche Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(61,'Eurobank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(62,'Europa',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(63,'FM Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(64,'Generali',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(65,'Getin Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(66,'Getin Noble Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(67,'Grenke Leasing',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(68,'Idea Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(69,'Idea Leasing',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(70,'ING',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(71,'ING Życie',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(72,'Inter-Polska',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(73,'Leasing Polski',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(74,'Macif',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(75,'mBank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(76,'Meritum Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(77,'Metlife',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(78,'Millennium Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(79,'Neo Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(80,'Pekao Bank Hipoteczny',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(81,'PKO BP',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(82,'Raiffeisen Leasing',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(83,'Raiffeisen Polbank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:26'),(84,'Santander Consumer Bank',NULL,NULL,NULL,NULL,'2014-06-07 21:49:27'),(85,'Signal Iduna',NULL,NULL,NULL,NULL,'2014-06-07 21:49:27'),(86,'Skandia',NULL,NULL,NULL,NULL,'2014-06-07 21:49:27'),(87,'TFI',NULL,NULL,NULL,NULL,'2014-06-07 21:49:27'),(88,'Uniqa',NULL,NULL,NULL,NULL,'2014-06-07 21:49:28');
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
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
  UNIQUE KEY `UNIQ_FB1AD3FCD27CB92A` (`activity_hash`),
  UNIQUE KEY `UNIQ_FB1AD3FC444F97DD` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'Marcin','Bielak','marcin.bieli@gmail.com','123456234','538f913ad46ba','e29aed2ea94ee9d938b3e9cac081665b',1,'2014-06-04 23:33:00'),(2,'Jan','Kowal','Jan.Kowal@wp.pl','234345454','538f91b35c6c4','7907b11c06053e9d3e4852f0145c7018',1,'2014-06-04 23:37:00');
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

-- Dump completed on 2014-06-09 23:29:34
