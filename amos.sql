-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: amos
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

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
-- Table structure for table `attendees`
--

DROP TABLE IF EXISTS `attendees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendees`
--

LOCK TABLES `attendees` WRITE;
/*!40000 ALTER TABLE `attendees` DISABLE KEYS */;
INSERT INTO `attendees` VALUES (1,'Lakin','Kurt',1,'','',''),(5,'Campbell','Jan',1,'','',''),(6,'Heles ','Bob',2,'b.heles@mchsi.com ','515-770-7871',''),(7,'Hessburg','Art',2,'ahessburg@live.com ','515-1218',''),(8,'Segura','Bobbi ',2,'b.segura@mchsi.com ','515-240-7883',''),(9,'Segura','Dan ',2,'','',''),(10,'Smith','Dan ',2,'mcsmith50311@gmail.com ','515-279-3384',''),(11,'Conover','Ann ',2,'','',''),(12,'Hoekman','Dixie ',2,'','',''),(13,'Miller','Barb ',2,'','',''),(14,'Parkinson','Jan ',2,'','',''),(15,'Struit','Jean ',2,'','','');
/*!40000 ALTER TABLE `attendees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendees_issues`
--

DROP TABLE IF EXISTS `attendees_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendees_issues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attendee_id` int(10) unsigned NOT NULL,
  `issue_id` int(10) unsigned NOT NULL,
  `rank` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attendee_id` (`attendee_id`),
  KEY `issue_id` (`issue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendees_issues`
--

LOCK TABLES `attendees_issues` WRITE;
/*!40000 ALTER TABLE `attendees_issues` DISABLE KEYS */;
INSERT INTO `attendees_issues` VALUES (8,1,5,0),(9,1,6,0),(10,1,7,0),(11,1,8,0),(12,1,9,0),(13,1,10,0);
/*!40000 ALTER TABLE `attendees_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendees_meetings`
--

DROP TABLE IF EXISTS `attendees_meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendees_meetings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attendee_id` int(10) unsigned NOT NULL,
  `meeting_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attendee_id` (`attendee_id`),
  KEY `meeting_id` (`meeting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendees_meetings`
--

LOCK TABLES `attendees_meetings` WRITE;
/*!40000 ALTER TABLE `attendees_meetings` DISABLE KEYS */;
INSERT INTO `attendees_meetings` VALUES (12,6,3),(13,7,3),(14,8,3),(15,9,3),(16,10,3),(17,11,4),(18,12,4),(19,13,4),(20,14,4),(21,15,4);
/*!40000 ALTER TABLE `attendees_meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'PlymouthUCC'),(2,'unknown');
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (5,'Healthy habits\r\n',4),(6,'Pre-existing conditions/lack of coverage\r\n',5),(7,'Chemical Treatment lack of parity\r\n',6),(8,'Bullying',7),(9,'Racial Stereotyping',8),(10,'Disrespect of teachers in the classroom',7);
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues_meetings`
--

DROP TABLE IF EXISTS `issues_meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issues_meetings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_id` int(10) unsigned NOT NULL,
  `meeting_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_id` (`issue_id`),
  KEY `meeting_id` (`meeting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues_meetings`
--

LOCK TABLES `issues_meetings` WRITE;
/*!40000 ALTER TABLE `issues_meetings` DISABLE KEYS */;
INSERT INTO `issues_meetings` VALUES (5,5,3),(6,6,3),(7,7,3),(8,8,5),(9,9,5),(10,10,5);
/*!40000 ALTER TABLE `issues_meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `facilitator` varchar(40) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (3,'none','2012-02-26','Jackie Seymour',''),(4,'unknown','2012-03-06','Jan Campbell',''),(5,'none','2012-02-23','Jackie Seymour','Hosted by Anthony Livolsi/Shana Johnson');
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oneonones`
--

DROP TABLE IF EXISTS `oneonones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oneonones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attendee1_id` int(10) unsigned NOT NULL,
  `attendee2_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oneonones`
--

LOCK TABLES `oneonones` WRITE;
/*!40000 ALTER TABLE `oneonones` DISABLE KEYS */;
INSERT INTO `oneonones` VALUES (1,5,1,'2012-12-18','testing interface\r\nDELETE THIS');
/*!40000 ALTER TABLE `oneonones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (4,'Nutrition '),(5,'Health Insurance '),(6,'Healthcare'),(7,'Education'),(8,'Racial Stereotyping');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-18 13:31:16
