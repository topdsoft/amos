-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: amos
-- ------------------------------------------------------
-- Server version	5.1.66-0ubuntu0.10.04.3

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendees`
--

LOCK TABLES `attendees` WRITE;
/*!40000 ALTER TABLE `attendees` DISABLE KEYS */;
INSERT INTO `attendees` VALUES (1,'Lakin','Kurt',1,'','',''),(5,'Campbell','Jan',1,'','',''),(6,'Heles ','Bob',2,'b.heles@mchsi.com ','515-770-7871',''),(7,'Hessburg','Art',2,'ahessburg@live.com ','515-1218',''),(8,'Segura','Bobbi ',2,'b.segura@mchsi.com ','515-240-7883',''),(9,'Segura','Dan ',2,'','',''),(10,'Smith','Dan ',2,'mcsmith50311@gmail.com ','515-279-3384',''),(11,'Conover','Ann ',2,'','',''),(12,'Hoekman','Dixie ',1,'','',''),(13,'Miller','Barb ',1,'','',''),(14,'Parkinson','Jan ',1,'','',''),(15,'Stuit','Jean ',1,'','',''),(16,'Test','Person',1,'','',''),(17,'Thomas','Sheena',1,'','',''),(18,'Dorsey','George',1,'','',''),(19,'Kesco','Rick',1,'','',''),(20,'Kesco','Nancy',1,'','',''),(21,'Turner','Paul',3,'','',''),(22,'Hoss','Sue',1,'','',''),(23,'Wignall','Karin',1,'kwignall@mchsi.com','278-9986','Educator-high school chemistry'),(24,'Schwartz','Pat',2,'donaldcorp@qwest.net','277-3873',''),(25,'Schwartz','Buzz ',2,'donaldcorp@qwest.net','277-3873',''),(26,'Jennings','Janet',1,'janandboys@aol.com','222-0831/240-0920 ',''),(27,'Walker','Jean',1,'','',''),(28,'Johnson','Shana',1,'','','Plymouth youth leader'),(29,'Livolsi','Anthony',1,'','','Youth leader'),(30,'Walsh','Grace',1,'','225-2776','');
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
INSERT INTO `attendees_issues` VALUES (8,1,5,0),(9,1,6,0),(10,1,7,0),(11,1,8,0),(12,1,9,0),(13,1,10,0),(14,1,11,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendees_meetings`
--

LOCK TABLES `attendees_meetings` WRITE;
/*!40000 ALTER TABLE `attendees_meetings` DISABLE KEYS */;
INSERT INTO `attendees_meetings` VALUES (12,6,3),(13,7,3),(14,8,3),(15,9,3),(16,10,3),(17,11,4),(18,12,4),(19,13,4),(20,14,4),(21,15,4),(22,16,5),(26,5,7),(27,1,7),(28,17,7),(29,18,7),(30,19,7),(31,20,7),(32,21,7),(33,22,7),(34,23,8),(35,24,8),(36,28,9),(37,29,9),(38,30,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'PlymouthUCC'),(2,'unknown'),(3,'AMOS');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (5,'Healthy habits\r\n',4),(6,'Pre-existing conditions/lack of coverage\r\n',6),(7,'Chemical Treatment lack of parity\r\n',6),(8,'Bullying',7),(9,'Racial Stereotyping',10),(10,'Disrespect of teachers in the classroom',7),(11,'Test Issue under Nutrition',4),(12,'Data collection discussion for 1:1s and house meetings; data base beta testing; documentation housing (drive.google.com) for in-house AMOS communications',13),(13,'Bullying: no resolution or consequences for bullying situation. No administrative follow-though after incident is reported; admin doesn\'t respond',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues_meetings`
--

LOCK TABLES `issues_meetings` WRITE;
/*!40000 ALTER TABLE `issues_meetings` DISABLE KEYS */;
INSERT INTO `issues_meetings` VALUES (5,5,3),(6,6,3),(7,7,3),(8,8,5),(9,9,5),(10,10,5),(13,11,4),(14,11,3),(15,12,7),(16,8,9),(17,10,9),(18,9,9),(19,13,9);
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
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `facilitator` varchar(40) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (3,'none','2012-02-26','Jackie Seymour',''),(4,'unknown','2012-03-06','Jan Campbell',''),(5,'none','2012-02-23','Jackie Seymour','Hosted by Anthony Livolsi/Shana Johnson'),(7,'Sue\'s house, 1515 Germania Dr., DSM, IA ','2013-01-02','Kurt Lakin',''),(8,'Jean Walker','2006-10-17','Sheena Thomas',''),(9,'Anthony Livolsi\'s apt., East Village','2012-02-23','Jackie Seymour',''),(10,'Jean Boomershine at Plymouth','2009-10-12','Sheena Thomas','concerns: children 20-42 with no health insurance\r\nMedicare part D too complicated, drugs too expensive\r\nat local level-merge cities to reduce costs, patronize local banks that are trying to get people out of payday loans\r\nProblem with insurance companies and hospitals building palaces when they are nonprofit entities\r\nRestructure taxes to build middle class\r\nFinancial literacy');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (4,'Nutrition '),(6,'Healthcare'),(7,'Education'),(9,'Economic Justice'),(10,'Criminal Justice'),(11,'Immigration'),(12,'Transportation'),(13,'(other)');
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

-- Dump completed on 2013-01-03 14:37:33
