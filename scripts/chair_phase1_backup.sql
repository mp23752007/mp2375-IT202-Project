-- Name: Mahi Patel 
-- Date: Feb 13, 2026
-- Course: IT-202
-- Section: 004
-- Assignment: Phase 1
-- Email: mp2375

-- MySQL dump 10.13  Distrib 9.6.0, for macos15 (arm64)
--
-- Host: localhost    Database: chair
-- ------------------------------------------------------
-- Server version	9.6.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;

SET @@SESSION.SQL_LOG_BIN = 0;

--
-- GTID state at the beginning of the backup
--

SET
    @@GLOBAL.GTID_PURGED = /*!80000 '+'*/ '1cfd9026-02e9-11f1-a6a7-b67b48f7fc0c:1-27';

--
-- Table structure for table `chair_users`
--

DROP TABLE IF EXISTS `chair_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `chair_users` (
    `chair_user_id` int NOT NULL AUTO_INCREMENT,
    `email_address` varchar(255) NOT NULL,
    `password` varchar(64) NOT NULL,
    `pronouns` varchar(60) NOT NULL,
    `first_name` varchar(60) NOT NULL,
    `last_name` varchar(60) NOT NULL,
    `phone_number` varchar(20) NOT NULL,
    `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`chair_user_id`),
    UNIQUE KEY `email_address` (`email_address`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `chair_users`
--

LOCK TABLES `chair_users` WRITE;
/*!40000 ALTER TABLE `chair_users` DISABLE KEYS */
;
INSERT INTO
    `chair_users`
VALUES (
        1,
        'taylor@chairs.com',
        'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f',
        'She/Her',
        'Taylor',
        'Swift',
        '555-1234',
        '2026-02-13 20:05:33',
        '2026-02-13 20:05:33'
    ),
    (
        2,
        'mahi@chairs.com',
        'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f',
        'She/Her',
        'Mahi',
        'Patel',
        '555-5678',
        '2026-02-13 20:05:33',
        '2026-02-13 20:05:33'
    ),
    (
        3,
        'admin@lounge.com',
        'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f',
        'They/Them',
        'Admin',
        'User',
        '555-0000',
        '2026-02-13 20:05:33',
        '2026-02-13 20:05:33'
    );
/*!40000 ALTER TABLE `chair_users` ENABLE KEYS */
;
UNLOCK TABLES;

SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2026-02-13 21:15:27