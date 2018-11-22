-- MySQL dump 10.13  Distrib 5.6.41, for Win32 (AMD64)
--
-- Host: localhost    Database: burgers
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Current Database: `burgers`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `burgers` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `burgers`;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_address` text,
  `order_phone` text,
  PRIMARY KEY (`order_id`),
  KEY `orders_users_user_id_fk` (`user_id`),
  CONSTRAINT `orders_users_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,'Улица Чистяковой, дом , корпус , этаж, квартира Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(2,3,'Улица Чистяковой, дом не указан, корпус не указан, этажне указан, квартиране указана Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(3,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(4,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(5,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(6,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(7,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(8,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(9,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(10,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(11,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(12,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(13,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(14,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(15,3,'Улица Чистяковой, дом не указан, корпус не указан, этаж не указан, квартира не указана. Потребуется сдача. Оплата картой. Не перезванивать.','777 77 77'),(16,5,'Улица ul. Monastirskaya 123 - 47, дом 23, корпус 23, этаж 2, квартира 4. Потребуется сдача. Не перезванивать.','777 77 77'),(17,6,'Улица ul. Monastirskaya 123 - 47, дом 23, корпус 23, этаж 2, квартира 4. Потребуется сдача. Не перезванивать.','777 77 77'),(18,6,'Улица ul. Monastirskaya 123 - 47, дом 23, корпус 23, этаж 2, квартира 4. Потребуется сдача. Не перезванивать.','777 77 77'),(19,6,'Улица ul. Monastirskaya 123 - 47, дом 23, корпус 23, этаж 2, квартира 4. Потребуется сдача. Не перезванивать.','777 77 77');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` text NOT NULL,
  `user_name` text,
  `user_phone` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'email','name','777 77 77'),(2,'email1','name1','777 77 77'),(3,'mylovelymail@yandex.ru','САМИР ДЖАМАЛЕВИЧ АБАХРИ','777 77 77'),(5,'abakhri.sd@gmail.com','Samir Abakhri','777 77 77'),(6,'abakhri.sd@gmail.comf','Samir Abakhri','777 77 77');
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

-- Dump completed on 2018-11-22 21:48:37
