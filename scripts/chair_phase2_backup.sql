-- MySQL dump 10.13  Distrib 9.6.0, for macos15 (arm64)
--
-- Host: localhost    Database: chair
-- ------------------------------------------------------
-- Server version	9.6.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '1cfd9026-02e9-11f1-a6a7-b67b48f7fc0c:1-228';

--
-- Table structure for table `chair_types`
--

DROP TABLE IF EXISTS `chair_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chair_types` (
  `chair_type_id` int NOT NULL,
  `chair_type_code` varchar(255) NOT NULL,
  `chair_type_name` varchar(255) NOT NULL,
  `chair_aisle_number` int NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chair_type_id`),
  UNIQUE KEY `chair_type_code` (`chair_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chair_types`
--

LOCK TABLES `chair_types` WRITE;
/*!40000 ALTER TABLE `chair_types` DISABLE KEYS */;
INSERT INTO `chair_types` VALUES (1,'LNG','Lounge',10,'2026-02-27 05:23:02','2026-02-27 05:23:02'),(2,'REC','Recliner',12,'2026-02-27 05:23:02','2026-02-27 05:23:02'),(3,'OFF','Office',15,'2026-02-27 05:23:02','2026-02-27 05:23:02');
/*!40000 ALTER TABLE `chair_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chair_users`
--

DROP TABLE IF EXISTS `chair_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chair_users`
--

LOCK TABLES `chair_users` WRITE;
/*!40000 ALTER TABLE `chair_users` DISABLE KEYS */;
INSERT INTO `chair_users` VALUES (1,'taylor@chairs.com','ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f','She/Her','Taylor','Swift','555-1234','2026-02-13 20:05:33','2026-02-13 20:05:33'),(2,'mahi@chairs.com','ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f','She/Her','Mahi','Patel','555-5678','2026-02-13 20:05:33','2026-02-13 20:05:33'),(3,'admin@lounge.com','ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f','They/Them','Admin','User','555-0000','2026-02-13 20:05:33','2026-02-13 20:05:33');
/*!40000 ALTER TABLE `chair_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chairs`
--

DROP TABLE IF EXISTS `chairs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chairs` (
  `chair_id` int NOT NULL,
  `chair_code` varchar(10) NOT NULL,
  `chair_name` varchar(255) NOT NULL,
  `chair_description` text NOT NULL,
  `chair_material` varchar(50) NOT NULL,
  `chair_style` varchar(60) NOT NULL,
  `chair_type_id` int DEFAULT '0',
  `chair_buy_price` decimal(10,2) NOT NULL,
  `chair_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chair_id`),
  UNIQUE KEY `chair_code` (`chair_code`),
  KEY `chair_type_id` (`chair_type_id`),
  CONSTRAINT `chairs_ibfk_1` FOREIGN KEY (`chair_type_id`) REFERENCES `chair_types` (`chair_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chairs`
--

LOCK TABLES `chairs` WRITE;
/*!40000 ALTER TABLE `chairs` DISABLE KEYS */;
INSERT INTO `chairs` VALUES (1,'LNG-01','Eames Classic','This iconic lounge chair features premium top-grain leather and a molded walnut plywood shell. It offers unparalleled comfort and serves as a timeless centerpiece for any modern living room.','Leather','Modern',1,4500.00,5200.00,'2026-02-27 06:20:24','2026-02-27 06:20:24'),(2,'LNG-02','Velvet Swivel','Upholstered in plush velvet, this swivel chair provides a soft and inviting seating experience. The gold-finished base adds a touch of luxury while allowing for a full 360-degree rotation.','Velvet','Glam',1,320.00,480.00,'2026-02-27 06:24:00','2026-02-27 06:24:00'),(3,'LNG-03','Rattan Relaxer','This handcrafted rattan chair brings a natural bohemian aesthetic to your indoor or outdoor patio space. It includes a thick weather-resistant cushion designed for long-lasting relaxation and durability.','Rattan','Boho',1,150.00,225.00,'2026-02-27 06:25:26','2026-02-27 06:25:26'),(4,'LNG-04','Slipper Accent','The armless design of this slipper chair makes it an ideal fit for small reading corners or bedrooms. It features a high-density foam seat and elegant tapered wooden legs for stable support.','Fabric','Contemporary',1,110.00,195.00,'2026-02-27 06:29:22','2026-02-27 06:29:22'),(5,'LNG-05','Papasan Nest','Experience ultimate comfort in this oversized bowl-shaped chair that cradles your body perfectly. The sturdy steel frame is wrapped in resin wicker to ensure it lasts for years of use.','Wicker','Casual',1,95.00,160.00,'2026-02-27 06:30:20','2026-02-27 06:30:20'),(6,'REC-01','Power Lift Pro','This heavy-duty power recliner features a quiet motor that assists seniors in standing up safely. It also includes a built-in heating element and multiple vibration massage settings for therapeutic relief.','Faux Leather','Traditional',2,600.00,850.00,'2026-02-27 06:31:34','2026-02-27 06:34:30'),(7,'REC-02','Cloud Rocker','Designed with overstuffed armrests and a soft microfiber finish, this chair feels like sitting on a cloud. The rocking mechanism provides a gentle motion that is perfect for nurseries or relaxing after work.','Microfiber','Casual',2,200.00,420.00,'2026-02-27 06:35:52','2026-02-27 06:35:52'),(8,'REC-03','Manual Wall-Hugger','This space-saving recliner requires only four inches of clearance from the wall to fully extend the footrest. The lever-operated mechanism is smooth and easy to use for users of all ages.','Polyester','Modern',2,210.00,345.00,'2026-02-27 06:36:50','2026-02-27 06:36:50'),(9,'REC-04','Leather Theater','Upgrade your home cinema with this premium leather recliner featuring an integrated cup holder and USB charging port. The sleek black design matches any high-end entertainment room setup perfectly.','Leather','Modern',2,450.00,690.00,'2026-02-27 06:37:46','2026-02-27 06:37:46'),(10,'REC-05','Push-Back Tufted','This elegant push-back recliner disguises its comfort within a sophisticated tufted wingback silhouette. It does not require a bulky lever, allowing it to maintain a clean and formal appearance.','Linen','Transitional',2,190.00,310.00,'2026-02-27 06:39:13','2026-02-27 06:39:13'),(11,'OFF-01','ErgoMesh Task','The breathable mesh back on this task chair promotes airflow to keep you cool during long working hours. It features adjustable lumbar support and height-adjustable armrests for a personalized ergonomic fit.','Mesh','Professional',3,145.00,260.00,'2026-02-27 06:40:17','2026-02-27 06:40:17'),(12,'OFF-02','Executive Boss','Upholstered in rich bonded leather, this high-back executive chair exudes authority and professional style. The thick double-layered cushions provide exceptional support for your neck and lower back throughout the day.','Leather','Executive',3,220.00,385.00,'2026-02-27 06:41:14','2026-02-27 06:41:14'),(13,'OFF-03','Active Stool','This height-adjustable drafting stool encourages active sitting and better posture for those using standing desks. The heavy-duty chrome footring provides a comfortable place to rest your feet while you work.','Vinyl','Industrial',3,85.00,140.00,'2026-02-27 06:42:54','2026-02-27 06:42:54'),(14,'OFF-04','Mid-Back Ribbed','This stylish ribbed chair features a chrome-plated frame and a sleek white faux-leather seat. It is the perfect choice for modern conference rooms or home offices looking for a minimalist aesthetic.','Faux Leather','Modern',3,115.00,185.00,'2026-02-27 06:43:44','2026-02-27 06:43:44'),(15,'OFF-05','Orthopedic Guest','These stackable guest chairs feature an orthopedic design to ensure maximum comfort for clients in your waiting area. The reinforced steel frame supports up to 300 pounds while remaining lightweight and easy to move.','Fabric','Minimalist',3,65.00,110.00,'2026-02-27 06:44:47','2026-02-27 06:46:54');
/*!40000 ALTER TABLE `chairs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games_mp2375`
--

DROP TABLE IF EXISTS `games_mp2375`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `games_mp2375` (
  `gameid` int NOT NULL AUTO_INCREMENT,
  `bowlerid` int DEFAULT NULL,
  `score` int DEFAULT NULL,
  PRIMARY KEY (`gameid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games_mp2375`
--

LOCK TABLES `games_mp2375` WRITE;
/*!40000 ALTER TABLE `games_mp2375` DISABLE KEYS */;
INSERT INTO `games_mp2375` VALUES (1,100,110),(2,100,115),(3,100,105),(4,101,110),(5,101,112),(6,101,130),(7,102,145),(8,102,152),(9,102,138),(10,103,160),(11,103,160),(12,103,160),(13,103,160),(14,103,142),(15,103,155),(16,103,155),(17,103,142),(18,103,155),(19,103,160),(20,103,142),(21,103,155),(22,100,115),(23,100,105),(24,101,110),(25,101,112),(26,101,130),(27,102,145),(28,102,152),(29,102,138),(30,103,160),(31,103,142),(32,103,155);
/*!40000 ALTER TABLE `games_mp2375` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-27 11:05:25
