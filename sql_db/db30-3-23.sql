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
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`),
  KEY `buddy_id` (`buddy_id`),
  KEY `buddies_allocations_ibfk_3_idx` (`request_id`),
  CONSTRAINT `buddies_allocations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `buddies_allocations_ibfk_2` FOREIGN KEY (`buddy_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=754178 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buddies_allocations`
--

LOCK TABLES `buddies_allocations` WRITE;
/*!40000 ALTER TABLE `buddies_allocations` DISABLE KEYS */;
/*!40000 ALTER TABLE `buddies_allocations` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `buddy_request` VALUES (80559,101618,'pending','2023-03-30 12:58:25');
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
INSERT INTO `extension_application` VALUES (22257,101618,'101618_PassportBioData_22257.png','101618_entryPage_22257.png','101618_CurrentVisa_22257.png','2023-03-19','2023-03-16 00:00:00','pending',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_details`
--

LOCK TABLES `student_details` WRITE;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` VALUES (16,101618,'0718744632','FIT','BBIT','Democratic Republic of the Congo','0P000012','2023-03-10','passport.jpg','Qwetu'),(17,90909,'0799766632','FIT','BBIT','Burundi','112345P','2023-03-10','passport.jpg','Qwetu');
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
  `status` enum('primary','secondary','other') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_guardian_ibfk_1` (`student_id`),
  CONSTRAINT `student_guardian_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_guardian`
--

LOCK TABLES `student_guardian` WRITE;
/*!40000 ALTER TABLE `student_guardian` DISABLE KEYS */;
INSERT INTO `student_guardian` VALUES (14,101618,'Parent1','givenparent@gmail.com','0718744632','primary'),(15,90909,'Parent1','ohnPaj@gmail.com','07187446443','primary');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,19991,'super_admin'),(20,101618,'student'),(21,3187,'admin'),(22,90909,'student');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verification`
--

LOCK TABLES `user_verification` WRITE;
/*!40000 ALTER TABLE `user_verification` DISABLE KEYS */;
INSERT INTO `user_verification` VALUES (13,101618,0,'2023-03-30 12:24:51','','2023-03-30 12:24:51','2023-03-30 12:24:52'),(14,90909,1,'2023-03-30 12:52:41','','2023-03-30 12:52:41','2023-03-30 12:52:42');
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
INSERT INTO `users` VALUES (3187,'Admin','Simple Admin','admin@admin.edu','$2y$10$1ZpdNPQauEEoBamYoIlXoeqxUNMakaOCoZG683YwTCfIyb9A6WWyS',NULL,1),(19991,'Diiii','Otttt','diiooot@e.e','$2y$10$53s2QBJIFdBPC4a/DrXDVeTyyIO67bbP77D9PCY8HFhjMmvTYfFb2',NULL,1),(90909,'John','Smith loas','johnsmith@gmail.com','$2y$10$W5ncCofmupPMKr8V3PLCl.44gk2TxNVsZwqms9s1D9rBCNtMkECXq',NULL,1),(101618,'Masheka','Ishara Given','givenshr8@gmail.com','$2y$10$x868LM2f21KpmzFjZjmL1uXEaEtXsRdIW6FaBHr/niOg2QpLzqyH.',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2023-03-31  0:20:37