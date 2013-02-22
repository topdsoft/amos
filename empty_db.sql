-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: amos
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-02-22 15:51:33
