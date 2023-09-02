-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 139.180.155.170    Database: quiz2
-- ------------------------------------------------------
-- Server version	5.7.36-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attempts`
--

DROP TABLE IF EXISTS `attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_and_time` datetime DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `score` int(4) NOT NULL DEFAULT '0',
  `number_of_attempt` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attempts`
--

/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;
INSERT INTO `attempts` VALUES (1,'2022-05-22 13:05:48','David','Villa','12222221',100,1),(2,'2022-05-22 13:05:25','aaa','errr','12222221',100,1),(3,'2022-05-22 13:05:26','David','David','12222222',40,2),(4,'2022-05-22 13:05:48','David111','Villa111','12222227',10,1),(5,'2022-05-22 13:05:25','2222','6666','12222229',60,1),(7,'2022-05-22 16:05:00','aaa','wwq','12222222',50,2),(8,'2022-05-22 20:05:18','David','David','12345678',5,1),(9,'2022-05-22 20:05:48','Ho','Anh','0000999',90,5),(10,'2022-05-22 20:05:19','Ho','Anh','11112222',90,1),(11,'2022-05-22 20:05:59','Thu','Hoa','1234569',75,1),(12,'2022-05-22 20:05:00','AAA','BBB','00112233',85,1),(13,'2022-05-22 20:05:30','Given Name','Family Name','11222334',100,1);
/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;

--
-- Table structure for table `quizs`
--

DROP TABLE IF EXISTS `quizs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `answers` text NOT NULL,
  `correct_answer` text NOT NULL,
  `score` int(4) NOT NULL DEFAULT '0',
  `display_order` int(11) DEFAULT '0',
  `question_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizs`
--

/*!40000 ALTER TABLE `quizs` DISABLE KEYS */;
INSERT INTO `quizs` VALUES (1,'What is WebGL? __________','\"\"','\'[\"javascript api\"]\'',10,1,'4'),(2,'Whose 3D Canvas studies from which WebGL evolved from?','Vladimir Vukievi __________ Ken Russel __________ Aron Ain __________ Marc Benioff','\'[\"Vladimir Vukievi\"]\'',20,2,'1'),(3,'Who are the members of the Khronos group?','Apple __________ Google __________ Mozilla __________ Opera','\'[\"Apple\", \"Google\", \"Mozilla\", \"Opera\"]\'',30,3,'2'),(4,'What is the programming language of WebGL?','Python __________ Ruby __________ C++ __________ JavaScript','\'[\"JavaScript\"]\'',25,4,'3'),(5,'Rate the content on Topic page (between 1 and 10)?','0-3  __________  4-6  __________  7-9  __________ 10','\'[\"10\"]\'',15,5,'1');
/*!40000 ALTER TABLE `quizs` ENABLE KEYS */;

--
-- Table structure for table `supervisors`
--

DROP TABLE IF EXISTS `supervisors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisors`
--

/*!40000 ALTER TABLE `supervisors` DISABLE KEYS */;
INSERT INTO `supervisors` VALUES (1,'supervisor','supervisor');
/*!40000 ALTER TABLE `supervisors` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-22 20:32:17
