-- MySQL dump 10.13  Distrib 5.6.41, for Win32 (AMD64)
--
-- Host: localhost    Database: mvc
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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_path` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`),
  UNIQUE KEY `photos_photo_id_uindex` (`photo_id`),
  KEY `photos_users_user_id_fk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (14,'\\app\\images\\ДМ 250.png_1543493393',1),(15,'\\app\\images\\ДМ 126 кр.png_1543493709',1),(16,'\\app\\images\\ДМ 250 ж.png_1543514953',1);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password_hash` text NOT NULL,
  `user_name` text NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_description` text,
  `user_email` text NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_photos_photo_id_fk` (`photo_id`),
  CONSTRAINT `users_photos_photo_id_fk` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$pF6WaPOfCJWFQ1JvyRkCXuiZcrYJo5/KYX5RSZIfwPeiBiDj5973m','name44',7,'descfg','mylovelymail@yandex.ru',16),(2,'$2y$10$NsmGoOGeWRl/BHdqbSKWhezOuOn2JqQIjVs3stTdBtwzaU1DT5Izm','',0,NULL,'abakhrisd@psbank.ru',NULL),(3,'','Aliyah Funk Jr.',85,'Hic dolorem velit veritatis delectus. Vero nihil voluptate laborum facilis similique suscipit consequatur. Molestias ut atque officia inventore non iusto. Fugiat et ut sequi ad magni quaerat dolorem.','hwilkinson@ondricka.com',NULL),(4,'','Jolie McGlynn',86,'Qui et unde id. Ducimus facere omnis quod nihil accusamus qui culpa. A quia dolor voluptatem ea repellat enim.','iabbott@dare.biz',NULL),(5,'','Dr. Sydni Jast',77,'Minus necessitatibus quo est doloremque non. Veritatis id repudiandae temporibus quibusdam quae perferendis sapiente. Dolorem eum aut neque modi voluptatum. Dignissimos doloribus quod ipsam autem.','ukris@west.com',NULL),(6,'','Prof. Columbus Hartmann',53,'Vel ducimus unde dicta vel. Dicta nostrum voluptatem molestiae quos quisquam cum. Aut laborum non quis rerum magnam. Ipsam fugiat quis consequatur vel.','jonas35@feeney.info',NULL),(7,'','Mrs. Daphnee Walker V',14,'Assumenda autem voluptate illo et enim libero. Sint at quis minima. Sapiente nam odit voluptatibus minima aut et odio.','von.arvid@schamberger.net',NULL),(8,'','Drake Ratke',29,'Animi omnis et tempore amet ut modi. Eos fugiat rem dolor accusamus sequi. Quae eos est vel pariatur debitis.','towne.naomi@hotmail.com',NULL),(9,'','Danny Schultz',2,'Praesentium error aut officia eum corrupti voluptatibus nulla. Quia amet quas aut laboriosam. Ea consectetur dolores iure cupiditate aut pariatur magni.','clemmie99@rice.com',NULL),(10,'','Prof. Samir Brown',72,'Enim et accusantium aut placeat esse ad harum voluptatem. Asperiores est earum laudantium quae. Et aperiam possimus perferendis dolores exercitationem veniam temporibus.','sarai.cummerata@hotmail.com',NULL),(11,'','Candace Hansen',85,'Expedita commodi doloribus esse ex accusamus consectetur. Voluptatem perspiciatis quia cum vel est in totam modi. Aut odio officia et enim fugit ut qui numquam.','brice.ebert@yahoo.com',NULL),(12,'','Clement Osinski',76,'Assumenda et sed et et non. Tempora sequi magni totam architecto. Quo dolores et dolore minus. Veniam id eius eaque quasi nam quis.','vpurdy@yahoo.com',NULL),(13,'','Natalia Schinner',69,'Voluptatem consectetur quis voluptas officia reiciendis. Fugit quo tempora sed cupiditate. Deserunt quidem dolorem eum asperiores neque commodi quasi eligendi. Molestiae non eaque omnis ut.','friedrich04@bernhard.biz',NULL),(14,'','Noe DuBuque',73,'Ducimus fugiat vitae cupiditate nam. Enim ducimus sunt illo illum voluptatum ducimus saepe. Mollitia pariatur quia et vel voluptatem est. Sed deleniti et autem rerum rerum aut nesciunt.','xkiehn@larson.com',NULL),(15,'','Mr. Demetrius Koelpin',80,'Voluptas facere et dolorem magni veniam quaerat officiis vel. Veritatis vitae libero natus quos ut et placeat adipisci. Omnis est enim unde aut voluptatibus.','fhill@block.org',NULL),(16,'','Prof. Wilburn Roberts Sr.',93,'Beatae impedit sit eos. Et at placeat ullam quibusdam. Nemo voluptatum illo magnam. Et sit nisi vel.','nconsidine@nitzsche.com',NULL),(17,'','Mollie Glover',47,'Aut aliquam voluptatem voluptatem dignissimos maiores. Possimus suscipit eum qui. Veniam sunt harum et autem aut labore.','lelia07@ledner.com',NULL),(18,'','Hector Hirthe DDS',14,'Ex dolores libero harum nam rerum consequuntur saepe. Rerum ex accusamus ea neque minima et enim.','feeney.jeanie@hotmail.com',NULL),(19,'','Ms. Jada Kunde DDS',88,'Velit rerum odio ullam et. Explicabo consequatur doloribus laboriosam aut qui. Veniam qui illo perspiciatis eum. Voluptatem odit dolores et maxime perspiciatis.','bechtelar.general@maggio.com',NULL),(20,'','Antwan Nienow',25,'Ut minima soluta repellendus et rerum. Magni tempora ut sunt sed rem rerum aspernatur. Ex perspiciatis sed et pariatur ratione aliquam.','hagenes.burley@hotmail.com',NULL),(21,'','Mr. Dedrick Tremblay',6,'Autem non minus aut omnis. Non est cupiditate earum qui reprehenderit. Nihil quis recusandae cumque tempore.','wyman.grant@hotmail.com',NULL),(22,'','Roma Ziemann Sr.',95,'Modi cupiditate voluptatem consequatur qui omnis. Qui sit repellat iusto temporibus. Id eos sit velit odio sapiente soluta ea molestiae. Veritatis quas enim eligendi repellendus reiciendis.','windler.pink@dietrich.com',NULL),(23,'','Vergie Rosenbaum',30,'Consequatur laboriosam optio fugiat eos delectus. Est sit quo laborum. Nulla unde est nihil voluptatem eos quidem. Distinctio rerum id nulla vel ut. Perferendis voluptates vitae facere sit.','kacey06@gmail.com',NULL),(24,'','Prof. Juana D\'Amore PhD',63,'Blanditiis dolor qui aut aut consequuntur. Assumenda aut veniam fuga aut. Explicabo blanditiis provident quos.','scarlett.nader@jenkins.info',NULL),(25,'','Aglae Kirlin PhD',24,'Dolor inventore quaerat aut similique voluptas ex laborum. Rerum consectetur sed facilis quam recusandae laboriosam enim inventore. Eius sapiente distinctio minima omnis et minus.','kathleen.zieme@hotmail.com',NULL),(26,'','Dr. Margie Harber MD',99,'Porro debitis voluptatem sed aliquam quasi. Provident optio quidem aliquid. Autem quis aut eveniet qui consequatur. Doloremque sequi dolorum totam eos explicabo fuga.','beahan.roman@harvey.com',NULL),(27,'','Dr. Bertram Hermiston DVM',58,'Suscipit vitae itaque adipisci. Dolor est eius blanditiis quod. Nam vel ea explicabo eum quaerat amet illum. Rerum minima sed laudantium eligendi.','franecki.makenzie@gmail.com',NULL),(28,'','Keshaun Glover',2,'Dolor qui aut voluptatem dicta. Libero temporibus excepturi aut qui omnis. Sit debitis enim est ea molestiae iste.','gage.rogahn@yahoo.com',NULL),(29,'','Jacky Brekke',66,'Et expedita tempore error. Vero est laborum officiis qui provident molestiae et et. Eveniet cum expedita ducimus rerum vel. Illum suscipit vero ratione sed odit.','mervin.boehm@hotmail.com',NULL),(30,'','Dr. Delmer Hahn I',1,'Unde omnis qui nisi. Nisi eum et consectetur aut accusantium.','giovanna63@cummerata.net',NULL),(31,'','Hubert Kautzer',30,'Sit est officiis ut. Est quia sit iure consequatur expedita.','cartwright.kamron@stamm.com',NULL),(32,'','Ubaldo Borer Sr.',26,'Eaque excepturi non et consectetur modi perferendis. Repudiandae consequuntur officia repudiandae ut nam quasi iure qui. Consectetur a in quasi.','rolando27@hotmail.com',NULL);
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

-- Dump completed on 2018-11-29 21:16:53
