-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: gamemagaz
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'AAA','blockbusters!',1,'2018-12-05 11:45:22','2018-12-05 11:45:22'),(2,'AA','decent',1,'2018-12-05 11:45:52','2018-12-05 11:47:31'),(3,'BB','blap!',1,'2018-12-05 11:50:15','2018-12-05 11:50:15'),(4,'RPG','rpg desc',1,'2018-12-09 07:53:05','2018-12-09 07:53:05');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_12_05_104914_create_products_table',2),(4,'2018_12_05_143552_create_categorys_table',3),(6,'2018_12_05_143552_create_categories_table',4),(8,'2018_12_08_112256_create_orders_table',5),(10,'2018_12_09_071743_create_settings_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_from_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'s ff','abakhri.sd@gmail.com',3,4,'2018-12-08 09:03:46','2018-12-08 09:03:46'),(2,'s ff','abakhri.sd@gmail.com',3,4,'2018-12-08 09:08:11','2018-12-08 09:08:11'),(3,'s ff','abakhri.sd@gmail.com',3,4,'2018-12-08 09:09:14','2018-12-08 09:09:14'),(4,'s ff','abakhri.sd@gmail.com',3,4,'2018-12-08 09:16:26','2018-12-08 09:16:26'),(5,'s ff','abakhri.sd@gmail.com',3,4,'2018-12-08 09:18:06','2018-12-08 09:18:06'),(6,'hoho!','abakhri.sd@gmail.com',4,4,'2018-12-08 09:18:44','2018-12-08 09:18:44'),(7,'Hopapap!','mylovelymail@yandex.ru',3,1,'2018-12-09 06:37:35','2018-12-09 06:37:35'),(8,'Hopapap!','mylovelymail@yandex.ru',3,1,'2018-12-09 06:38:30','2018-12-09 06:38:30'),(9,'САМИР ДЖАМАЛЕВИЧ АБАХРИ','mylovelymail@yandex.ru',3,1,'2018-12-09 06:40:49','2018-12-09 06:40:49'),(10,'САМИР ДЖАМАЛЕВИЧ АБАХРИ','mylovelymail@yandex.ru',3,1,'2018-12-09 06:42:59','2018-12-09 06:42:59'),(11,'САМИР ДЖАМАЛЕВИЧ АБАХРИ','mylovelymail@yandex.ru',4,1,'2018-12-09 06:43:42','2018-12-09 06:43:42'),(12,'САМИР ДЖАМАЛЕВИЧ АБАХРИ','mylovelymail@yandex.ru',3,4,'2018-12-09 10:29:40','2018-12-09 10:29:40');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Продукт 1_1','описание',NULL,NULL,'2018-12-05 10:58:46','2018-12-09 06:32:06',123,1),(4,'Продукт 2','Описане 2',NULL,NULL,'2018-12-05 11:00:30','2018-12-05 11:00:30',43,1),(5,'Хоп','хэй',NULL,NULL,'2018-12-05 11:19:31','2018-12-05 11:19:31',132,1),(6,'brand new','descsds',NULL,NULL,'2018-12-09 07:53:26','2018-12-09 07:53:26',999,1),(7,'Картинка','карта',NULL,NULL,'2018-12-09 11:11:54','2018-12-09 11:11:54',132,1),(8,'Картинка','кака','1_image1544365838.jpg',NULL,'2018-12-09 11:30:38','2018-12-09 11:30:38',45,1),(9,'Картинка 2','продукт с картинков','1_image1544366701.jpg',NULL,'2018-12-09 11:45:02','2018-12-09 11:45:02',456,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Email для сообщений','notifyEmail','abakhri.sd@gmail.com',1,NULL,'2018-12-09 06:43:26');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Samir','mylovelymail@yandex.ru',NULL,'$2y$10$iIhO6V1.90vfpTCGZhIHwO08LVmEb8CDSNPOH6Fu37eEu.2zjc1nu','pr7LCCoZ7I7wPZ7Sar6UrSGxFCQlAt4QishCWtOiZc0u5sa5WxNs0MYyKvp8','2018-12-05 07:45:33','2018-12-05 07:45:33',1),(3,'True admin','abakhrisd@psbank.ru',NULL,'$2y$10$g/Ad0gHkuNqlK3IW.6u1q.AH62t5bILOeliKS3j.Din8Y0MTkTJja','dNiLmfPUBeKv8NiPCVn3gBolbXsBRoaPzQycVWPBlgZiJ9LAKw07Y4kK4XK6','2018-12-06 05:05:55','2018-12-06 05:05:55',0),(4,'not admin','abakhri.sd@gmail.com',NULL,'$2y$10$Qptt1WcLQNLpEH1HpZMkE.CdAmXedyJaN6DgH43uZZwUdJe9T7/Zm','HkMf4wBcMUEHX7vu4IY7byTHg09O1LfB7w6AqC7v3LDrXrpATSXqjMd5tx31','2018-12-06 05:06:52','2018-12-06 05:06:52',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-09 17:51:15
