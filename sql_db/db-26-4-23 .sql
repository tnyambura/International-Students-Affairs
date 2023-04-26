-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: isa_db
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Temporary view structure for view `all_availability`
--

DROP TABLE IF EXISTS `all_availability`;
/*!50001 DROP VIEW IF EXISTS `all_availability`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_availability` AS SELECT 
 1 AS `user_id`,
 1 AS `surname`,
 1 AS `other_names`,
 1 AS `admin_id`,
 1 AS `my_schedule`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `all_bookings`
--

DROP TABLE IF EXISTS `all_bookings`;
/*!50001 DROP VIEW IF EXISTS `all_bookings`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_bookings` AS SELECT 
 1 AS `id`,
 1 AS `u_id`,
 1 AS `surname`,
 1 AS `other_names`,
 1 AS `booked_date_time`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bookingList`
--

DROP TABLE IF EXISTS `bookingList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookingList` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `booked_date_time` timestamp NULL DEFAULT NULL,
  `status` enum('pending','past','met') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `bookinglist_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingList`
--

LOCK TABLES `bookingList` WRITE;
/*!40000 ALTER TABLE `bookingList` DISABLE KEYS */;
INSERT INTO `bookingList` VALUES (4,11111,'2023-04-18 21:00:00','met'),(5,11111,'2023-04-27 21:00:00','pending'),(6,11111,'2023-04-19 09:00:00','past'),(7,66121,'2023-04-30 00:00:00','pending');
/*!40000 ALTER TABLE `bookingList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buddies_allocations`
--

DROP TABLE IF EXISTS `buddies_allocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buddies_allocations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `student_id` int NOT NULL,
  `buddy_id` int NOT NULL,
  `request_change` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`),
  KEY `buddy_id` (`buddy_id`),
  KEY `buddies_allocations_ibfk_3_idx` (`request_id`),
  CONSTRAINT `buddies_allocations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `buddies_allocations_ibfk_2` FOREIGN KEY (`buddy_id`) REFERENCES `users` (`id`),
  CONSTRAINT `buddies_allocations_ibfk_3` FOREIGN KEY (`request_id`) REFERENCES `buddy_request` (`buddy_request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=944155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buddies_allocations`
--

LOCK TABLES `buddies_allocations` WRITE;
/*!40000 ALTER TABLE `buddies_allocations` DISABLE KEYS */;
INSERT INTO `buddies_allocations` VALUES (105299,140410,11111,22122,NULL);
/*!40000 ALTER TABLE `buddies_allocations` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `Update_buddy_request` AFTER INSERT ON `buddies_allocations` FOR EACH ROW BEGIN
   UPDATE buddy_request
   set status = "approved"
   where buddy_request_id = new.request_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `buddy_request`
--

DROP TABLE IF EXISTS `buddy_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buddy_request` (
  `buddy_request_id` int NOT NULL,
  `student_id` int NOT NULL,
  `status` enum('pending','cancel','approved') NOT NULL,
  `request_date` timestamp NOT NULL,
  PRIMARY KEY (`buddy_request_id`),
  KEY `buddy_request_ibfk_1` (`student_id`),
  CONSTRAINT `buddy_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buddy_request`
--

LOCK TABLES `buddy_request` WRITE;
/*!40000 ALTER TABLE `buddy_request` DISABLE KEYS */;
INSERT INTO `buddy_request` VALUES (18849,66121,'cancel','2023-04-26 08:27:34'),(140410,11111,'approved','2023-04-16 13:52:33'),(564443,11111,'cancel','2023-03-02 21:00:00'),(605725,66121,'pending','2023-04-26 08:27:51');
/*!40000 ALTER TABLE `buddy_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extension_application`
--

DROP TABLE IF EXISTS `extension_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `extension_application` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `passport_biodata` text NOT NULL,
  `entry_visa` text,
  `current_visa` text NOT NULL,
  `date_of_entry` date NOT NULL,
  `application_date` datetime NOT NULL,
  `application_status` enum('pending','in progress','declined','approved') NOT NULL,
  `uploads` text,
  `expiry_date` date DEFAULT NULL,
  `first_open` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `extension_application_ibfk_1` (`student_id`),
  CONSTRAINT `extension_application_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extension_application`
--

LOCK TABLES `extension_application` WRITE;
/*!40000 ALTER TABLE `extension_application` DISABLE KEYS */;
INSERT INTO `extension_application` VALUES (149215,66121,'66121_PassportBioData_149215.png','66121_entryPage_149215.png','66121_CurrentVisa_149215.png','2023-03-19','2023-03-16 00:00:00','in progress',NULL,NULL,NULL),(868342,101618,'101618_PassportBioData_868342.png','101618_entryPage_868342.png','101618_CurrentVisa_868342.png','2023-03-19','2023-03-16 00:00:00','pending',NULL,NULL,NULL),(996322,11111,'11111_PassportBioData_996322.png','11111_entryPage_996322.pdf','11111_CurrentVisa_996322.png','2023-03-19','2023-04-16 00:00:00','approved','66753_ExtensionDoc996322.png','2023-05-02',NULL);
/*!40000 ALTER TABLE `extension_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kpps_application`
--

DROP TABLE IF EXISTS `kpps_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kpps_application` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `date_entry` date NOT NULL,
  `passport_picture` text,
  `passport_biodata` text NOT NULL,
  `current_visa` text NOT NULL,
  `guardian_biodata` text NOT NULL,
  `commitment_letter` text NOT NULL,
  `accademic_transcript` text NOT NULL,
  `police_clearance` text NOT NULL,
  `application_date` datetime NOT NULL,
  `application_status` enum('pending','declined','in progress','approved') NOT NULL,
  `uploads` text,
  `expiry_date` date DEFAULT NULL,
  `first_open` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kpps_application_ibfk_1` (`student_id`),
  CONSTRAINT `kpps_application_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kpps_application`
--

LOCK TABLES `kpps_application` WRITE;
/*!40000 ALTER TABLE `kpps_application` DISABLE KEYS */;
INSERT INTO `kpps_application` VALUES (100656,11111,'2023-05-02','11111_PassportPhoto.png','11111_PassportBioData.png','11111_CurrentVisa.png','11111_GuardianBio.png','11111_CommitmentLetter.png','11111_AcademicTranscript.png','11111_PoliceClearance.png','2023-04-06 12:29:08','approved',NULL,'2023-06-25',''),(217952,11111,'2023-05-02','11111_PassportPhoto.png','11111_PassportBioData.png','11111_CurrentVisa.png','11111_GuardianBio.png','11111_CommitmentLetter.png','11111_AcademicTranscript.png','11111_PoliceClearance.png','2023-03-05 21:44:16','declined',NULL,NULL,NULL),(258197,11111,'2023-05-02','11111_PassportPhoto.png','11111_PassportBioData.png','11111_CurrentVisa.png','11111_GuardianBio.png','11111_CommitmentLetter.png','11111_AcademicTranscript.png','11111_PoliceClearance.png','2023-02-04 00:29:48','approved','66753_StudentPassDoc258197.png',NULL,NULL),(262367,101618,'2023-05-02','101618_PassportPhoto.png','101618_PassportBioData.png','101618_CurrentVisa.png','101618_GuardianBio.png','101618_CommitmentLetter.png','101618_AcademicTranscript.png','101618_PoliceClearance.png','2023-01-19 14:26:36','pending',NULL,NULL,NULL),(805152,66121,'2023-05-02','66121_PassportPhoto.png','66121_PassportBioData.png','66121_CurrentVisa.png','66121_GuardianBio.png','66121_CommitmentLetter.png','66121_AcademicTranscript.png','66121_PoliceClearance.png','2023-04-26 11:46:56','pending',NULL,NULL,NULL);
/*!40000 ALTER TABLE `kpps_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `last_update` timestamp NOT NULL,
  `token` varchar(20) DEFAULT NULL,
  `current_pass` longtext NOT NULL,
  `status` enum('changing','saved') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_reset_ibfk_1` (`user_id`),
  CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset`
--

LOCK TABLES `password_reset` WRITE;
/*!40000 ALTER TABLE `password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheduleTime`
--

DROP TABLE IF EXISTS `scheduleTime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scheduleTime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `my_schedule` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `scheduletime_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheduleTime`
--

LOCK TABLES `scheduleTime` WRITE;
/*!40000 ALTER TABLE `scheduleTime` DISABLE KEYS */;
INSERT INTO `scheduleTime` VALUES (2,66753,'[[\"2023_Apr_19\",[\"12:00 pm\",\"10:00 am\",\"4:00 pm\"]],[\"2023_Apr_28\",[\"4:00 pm\",\"2:00 pm\",\"11:00 am\"]],[\"2023_Apr_30\",[\"11:00 am\",\"8:00 am\",\"3:00 pm\"]]]');
/*!40000 ALTER TABLE `scheduleTime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text,
  `payload` text,
  `last_activity` timestamp NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_ibfk_1` (`user_id`),
  CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `phone_number` text NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `passport_number` varchar(20) NOT NULL,
  `passport_expire_date` date NOT NULL,
  `passport_image` longtext NOT NULL,
  `residence` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passport_number_UNIQUE` (`passport_number`),
  KEY `student_details_ibfk_1` (`student_id`),
  CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_details`
--

LOCK TABLES `student_details` WRITE;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` VALUES (22,101618,'0718744632','FIT','BBIT','Democratic Republic of the Congo','OP0071855','2026-07-20','passport.jpg','Qwetu Willson View'),(23,11111,'0718744677','FIT','BBIT','Kenya','OP007185S','2025-07-28','passport.jpg','Qwetu'),(24,4444,'0718744699','FIT','BBIT','Kenya','OP0099855','2023-04-20','passport.jpg','Qwetu'),(25,45665,'0718884632','FIT','BBIT','Kenya','8765OI','2023-04-21','passport.jpg','Qwetu'),(27,22122,'0718744632','FIT','ijuhg','Kenya','P006WDS','2023-04-27','passport.jpg','Qwetu'),(28,987,'0768744639','FIT','BBIT','Kenya','678YYU','2023-04-21','passport.jpg','Qwetu'),(29,99871,'0718744632','FIT','BBIT','Kenya','P006W','2023-04-20','passport.jpg','Qwetu'),(30,11988,'0093877742123','FIT','BBIT','Australia','OSPP988','2024-04-29','passport.jpg','Qwetu'),(31,45654,'0718744635','FIT','BBIT','Iraq','OP0009332','2024-04-23','passport.jpg','Qwetu'),(32,66121,'0712746778','FIT','BBIT','Barbados','OOPI0009','2024-04-22','passport.jpg','Qwetu'),(33,201010,'0718755332','FIT','BCOM','Anguilla','OP007199L','2024-04-24','passport.jpg','Qwetu'),(34,778110,'0798733612','FIT','BCOM','Benin','P006W55G','2024-04-22','passport.jpg','Qwetu'),(35,34567,'0718744776889','FIT','BBIT','Kenya','P006W678YY','2024-04-25','passport.jpg','Qwetu'),(36,999999,'0718744999','FIT','BBIT','Ivory Coast','OP9971855','2024-04-30','passport.jpg','Qwetu'),(37,7777777,'07187777632','FIT','BBIT','Kenya','P006W777','2024-04-27','passport.jpg','Qwetu');
/*!40000 ALTER TABLE `student_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_guardian`
--

DROP TABLE IF EXISTS `student_guardian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_guardian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `status` enum('primary','secondary','other','notApplicable') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_guardian_ibfk_1` (`student_id`),
  CONSTRAINT `student_guardian_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_guardian`
--

LOCK TABLES `student_guardian` WRITE;
/*!40000 ALTER TABLE `student_guardian` DISABLE KEYS */;
INSERT INTO `student_guardian` VALUES (19,101618,'Parent1','givenshr8@gmail.com','0718744632','primary'),(20,11111,'Parent1','givenshr8@gmail.com','0718744632','primary'),(21,4444,'pnnn','givenshr8@gmail.com','0718744632','primary'),(22,45665,'Parent1','givenshr8@gmail.com','0718744632','primary'),(24,22122,'pnnnd','givenshr8@gmail.com','0718744632','primary'),(25,987,'dfghj','givenshr8@gmail.com','0718744632','primary'),(26,99871,'dfghj','givenshr8@gmail.com','0718744632','primary'),(27,11988,'ParentNew','parent@e.e','948763778','primary'),(28,45654,'pnnn','givenshr8@gmail.com','0718744632','primary'),(29,66121,'Parent Name','paaaarent@gmail.com','0718744632','primary'),(30,778110,'Not Applicable','Not Applicable','Not Applicable','notApplicable'),(31,34567,'Not Applicable','Not Applicable','Not Applicable','notApplicable'),(32,999999,'Not Applicable','Not Applicable','Not Applicable','notApplicable'),(33,7777777,'Not Applicable','Not Applicable','Not Applicable','notApplicable');
/*!40000 ALTER TABLE `student_guardian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `student_view_data`
--

DROP TABLE IF EXISTS `student_view_data`;
/*!50001 DROP VIEW IF EXISTS `student_view_data`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `student_view_data` AS SELECT 
 1 AS `student_id`,
 1 AS `surname`,
 1 AS `other_names`,
 1 AS `email`,
 1 AS `phone_number`,
 1 AS `faculty`,
 1 AS `course`,
 1 AS `nationality`,
 1 AS `passport_number`,
 1 AS `passport_expire_date`,
 1 AS `residence`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role` enum('admin','super_admin','student','buddy') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_ibfk_1` (`user_id`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (29,66753,'super_admin'),(30,101618,'student'),(31,11111,'student'),(33,45665,'student'),(37,44321,'admin'),(41,4444,'admin'),(42,22122,'student'),(43,22122,'buddy'),(44,987,'student'),(45,99871,'student'),(47,45665,'buddy'),(48,56709876,'admin'),(49,68983456,'admin'),(50,13456743,'admin'),(51,11988,'student'),(52,45654,'student'),(53,66121,'student'),(54,778110,'student'),(55,34567,'student'),(56,999999,'student'),(57,7777777,'student');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_verification`
--

DROP TABLE IF EXISTS `user_verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_verification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `verified_at` timestamp NOT NULL,
  `remember_token` longtext,
  `created_at` timestamp NOT NULL,
  `last_update` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_verification_ibfk_1` (`user_id`),
  CONSTRAINT `user_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verification`
--

LOCK TABLES `user_verification` WRITE;
/*!40000 ALTER TABLE `user_verification` DISABLE KEYS */;
INSERT INTO `user_verification` VALUES (17,101618,1,'2023-04-01 21:10:58','','2023-04-01 21:10:58','2023-04-01 21:10:58'),(18,11111,0,'2023-04-03 18:27:45','','2023-04-03 18:27:45','2023-04-03 18:27:45'),(19,4444,0,'2023-04-03 18:34:45','','2023-04-03 18:34:45','2023-04-03 18:34:45'),(20,45665,0,'2023-04-03 18:40:51','','2023-04-03 18:40:51','2023-04-03 18:40:51'),(22,22122,1,'2023-04-05 13:10:39','','2023-04-05 13:10:39','2023-04-05 13:10:39'),(23,987,1,'2023-04-12 12:24:20','','2023-04-12 12:24:20','2023-04-12 12:24:21'),(24,99871,1,'2023-04-12 12:27:28','','2023-04-12 12:27:28','2023-04-12 12:27:28'),(25,11988,1,'2023-04-18 13:15:41','','2023-04-18 13:15:41','2023-04-18 13:15:41'),(26,45654,0,'2023-04-20 07:41:41','','2023-04-20 07:41:41','2023-04-20 07:41:41'),(27,66121,0,'2023-04-20 07:58:47','','2023-04-20 07:58:47','2023-04-20 07:58:47'),(28,778110,0,'2023-04-20 08:24:08','','2023-04-20 08:24:08','2023-04-20 08:24:08'),(29,34567,1,'2023-04-20 19:09:12','','2023-04-20 19:09:12','2023-04-20 19:09:12'),(30,999999,1,'2023-04-26 06:56:41','','2023-04-26 06:56:41','2023-04-26 06:56:41'),(31,7777777,1,'2023-04-26 06:58:52','','2023-04-26 06:58:52','2023-04-26 06:58:52');
/*!40000 ALTER TABLE `user_verification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `surname` varchar(50) NOT NULL,
  `other_names` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (987,'Masheka','Given bbbb','oigivenshr8@gmail.com','$2y$10$I8aLteTqn1YzanDMY0hENeOD9ePLNngq5XBVwVPxY/ETm65tAZzde',NULL,1),(4444,'Masheka','Given Ishara','givenshr8ymii@gmail.com','$2y$10$Om9usdiYDYU/o2lkmHFyzeo5Ei7J9CpOCfqZzOZYgUzbgSWDvh4A6',NULL,0),(11111,'Sidney','Oyen Omin','ishapa.given@strathmore.edu','$2y$10$YoA6uNK5U78lCMWuYIml5uJBz0yuvA9oPXkOGK/VqiTq.vDq3RZ2C',NULL,1),(11988,'Smith','Timo Mash','givenmasheka@hotmail.fr','$2y$10$YHSBB3uh8bXTLH.z9xiugu1xJjkFrA4PUyLr212T3lELL7jqPZsT.',NULL,1),(22122,'Masheka','Given Ishara','stgivenmasheka@gmail.com','$2y$10$sb9Y6Lynbz2jj83qtpznKeucUdlCKnwlfVgL7PJmEXNN9WU0mOBFm',NULL,1),(34567,'Masheka','Given','givensyyhr8@gmail.com','$2y$10$z8UGn4cwNtfnAAyyl64c/e2nB.ZzH1Ifr7oxhvGBHoLeOhhtnANm6',NULL,1),(44321,'Neee','Given','givenshiu@gmail.com','$2y$10$o/Dq8QpviZ8nmvejrD4sWOqLPb8r/qfTTr.G1M15dF9GQkiDPC.k2',NULL,1),(45654,'Jane','Yoom','janeyoom@gmail.com','$2y$10$leDAskFObvhc3gkUQxbCfeJ2zBzTv1kR57.ipbmCH11ggHPqHJCIC',NULL,0),(45665,'Masheka','Given Ishara','gjjhivenshr8@gmail.com','$2y$10$CFtaKXJDXbqjscujMok2hel4rm6FZAjWNP/XxwC4dAH8FkEWF2bXG',NULL,1),(66121,'Tata','Oscar','tataoscar@gmail.com','$2y$10$D9hqyCjP6AcagCu8zQcMZOurE8Xq/wUl0GUfCPHBNc2ENhClE.EYa',NULL,1),(66753,'Neeel','Ottttr','neeee@gmail.com','$2y$10$EMfcP3omxlZgqKtq9w8B/ebE.nitADK8hYC0tANaZX/QEXezVRye.',NULL,1),(99871,'Masheka','Given loasO','givenuishr8@gmail.com','$2y$10$HZ6eOoT40szkW4dVVa3Zx.WXGzXbdCFxAGvsraeb6GAl7Hbm2uKbq',NULL,1),(101618,'Masheka','Ishara Given','givenshr8@gmail.com','$2y$10$ZXDa95yq2UzjPbfKncok/ODojZ4lXUMVU21WlA2QYlHTbVwzQjMkO',NULL,1),(201010,'Shame','Glad','shametod@gmail.com','$2y$10$kjoIs9OKP3rHAb2hLytwc.ssmFOWSI6iz2eZCJKl/HpSTZRvlnYoC',NULL,0),(778110,'Kaka','Junior','kakajunior@gmail.com','$2y$10$fA9iw9OPm5r7KERu.z1v2eYUgFOsiZLAjnoTAEq/WboHSpoWIYIYq',NULL,0),(999999,'Jojo','Otttt','givenshr99@gmail.com','$2y$10$afmiSmKYASo4vr7EkWycwupRjwOoWlikPPta1dwTpM50DueE2d4Kq',NULL,1),(7777777,'Mercy','Jiji','givenshr777@gmail.com','$2y$10$t.hUrtykz3h6lhWqzn7Bdu3G85ZXBpHn5b55.1HPkuGbUxQaThN1C',NULL,1),(13456743,'Midi','Simon','midisimon@examp.com','$2y$10$HGnNKBp12uN0wNFOCZtYT.R5LJSBbWHMy5ZYfe6MCcabH4kf9ZnEy',NULL,1),(56709876,'Kiiimi','Yoom','kimiiiyoom@exam.com','$2y$10$eXPwKMe2yUicbtQGkGe5/u8CD1NGqMCrKoxH4HzxuQKAgCbGpU.He',NULL,1),(68983456,'Jean','Joan','jeanj@examp.com','$2y$10$xKxCW2uC.Fd61nEqWOdLteCSUCa.8buEjf38p0EcvssfAry1/vTui',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'isa_db'
--

--
-- Dumping routines for database 'isa_db'
--

--
-- Final view structure for view `all_availability`
--

/*!50001 DROP VIEW IF EXISTS `all_availability`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_availability` AS select `users`.`id` AS `user_id`,`users`.`surname` AS `surname`,`users`.`other_names` AS `other_names`,`scheduletime`.`user_id` AS `admin_id`,`scheduletime`.`my_schedule` AS `my_schedule` from (`users` join `scheduletime`) where (`users`.`id` = `scheduletime`.`user_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `all_bookings`
--

/*!50001 DROP VIEW IF EXISTS `all_bookings`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_bookings` AS select `bookinglist`.`id` AS `id`,`users`.`id` AS `u_id`,`users`.`surname` AS `surname`,`users`.`other_names` AS `other_names`,`bookinglist`.`booked_date_time` AS `booked_date_time`,`bookinglist`.`status` AS `status` from (`users` join `bookinglist`) where (`users`.`id` = `bookinglist`.`student_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `student_view_data`
--

/*!50001 DROP VIEW IF EXISTS `student_view_data`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `student_view_data` AS select `users`.`id` AS `student_id`,`users`.`surname` AS `surname`,`users`.`other_names` AS `other_names`,`users`.`email` AS `email`,`student_details`.`phone_number` AS `phone_number`,`student_details`.`faculty` AS `faculty`,`student_details`.`course` AS `course`,`student_details`.`nationality` AS `nationality`,`student_details`.`passport_number` AS `passport_number`,`student_details`.`passport_expire_date` AS `passport_expire_date`,`student_details`.`residence` AS `residence` from ((`users` join `student_details`) join `user_roles`) where ((`student_details`.`student_id` = `users`.`id`) and (`user_roles`.`user_id` = `users`.`id`) and (`user_roles`.`role` = 'student')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-26 12:14:03
