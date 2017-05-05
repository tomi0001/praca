-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: praca
-- ------------------------------------------------------
-- Server version	5.5.53-0+deb8u1

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
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_work` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply`
--

LOCK TABLES `apply` WRITE;
/*!40000 ALTER TABLE `apply` DISABLE KEYS */;
INSERT INTO `apply` VALUES (1,30,12,1492775691,'2017-04-21'),(2,30,12,1492775712,'2017-04-21'),(3,30,12,1492776218,'2017-04-21'),(4,30,12,1492776471,'2017-04-21'),(5,30,12,1492776477,'2017-04-21'),(6,30,12,1492776522,'2017-04-21'),(7,30,12,1492776598,'2017-04-21'),(8,29,12,1492776689,'2017-04-21'),(9,28,12,1492780757,'2017-04-21'),(10,26,12,1492784505,'2017-04-21');
/*!40000 ALTER TABLE `apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` float DEFAULT NULL,
  `y` float DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (26,51.2465,22.5684,'Lublin'),(27,52.2297,21.0122,'Warszawa'),(28,50.0647,19.945,'Krakow'),(29,54.352,18.6466,'Gdansk'),(30,52.4064,16.9252,'Poznan'),(31,49.2992,19.9496,'Zakopane'),(32,50.9841,23.1719,'Krasnystaw'),(33,50.7231,23.252,'Zamosc'),(34,54.6003,18.233,'Wejherowo'),(35,54.3783,18.1227,'Kartuzy'),(36,54.0919,18.7773,'Tczew'),(37,54.4641,17.0285,'SÅ‚upsk'),(38,53.6944,17.5569,'Chojnice'),(39,53.7264,18.9323,'Kwidzyn'),(40,54.718,18.4086,'Puck'),(41,54.1706,17.4916,'BytÃ³w'),(42,54.1222,17.9813,'KoÅ›cierzyna'),(43,54.5446,17.7533,'LÄ™bork'),(44,54.0361,19.038,'Malbork'),(45,53.6672,17.359,'CzÅ‚uchÃ³w'),(46,53.9209,19.0296,'Sztum'),(47,54.5708,18.3878,'Rumia'),(48,54.6054,18.3472,'Reda'),(49,54.5806,16.8619,'Ustka'),(50,53.7951,17.9764,'Czersk'),(54,54.208,19.1175,'Nowy_Dwor_gdanski');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_add` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_work` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'sds \ndsfsfsdfsdf',12344555,3,NULL,NULL,NULL,31),(2,'sdsdfs \n\ndsfsdf \nvsdfsf\n\nsdfs',234234,3,NULL,NULL,NULL,31),(3,'sdfsdfsdfsd dsfsd',1492800009,3,NULL,NULL,NULL,31),(4,'jacek był na wagarach.',1493304404,15,NULL,NULL,NULL,31),(5,'asdad',1493304438,15,NULL,NULL,NULL,31),(6,'asdad',1493304479,15,NULL,NULL,NULL,31),(7,'asdad',1493304482,15,NULL,NULL,NULL,31),(8,'asdad',1493304508,15,NULL,NULL,NULL,31),(9,'asdad',1493304516,15,NULL,NULL,NULL,31),(10,'asdad',1493304556,15,NULL,NULL,NULL,31),(11,'asdad',1493304588,15,NULL,NULL,NULL,31),(12,'asdad',1493304606,15,NULL,NULL,NULL,31),(13,'donos.',1493304740,15,NULL,NULL,NULL,31);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments2`
--

DROP TABLE IF EXISTS `comments2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_add` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comments` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kome` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments2`
--

LOCK TABLES `comments2` WRITE;
/*!40000 ALTER TABLE `comments2` DISABLE KEYS */;
INSERT INTO `comments2` VALUES (1,'sdcsd\n sdfsdfsf dsvfsd dsf dsfsdf',11232312,3,1,NULL,NULL,NULL,NULL),(4,'dsfsf \ndsfsdf sdfdsf',2323424,3,1,NULL,NULL,NULL,NULL),(5,'dsfsf dsfsdf sdfdsfdsfsf dsfsdf sdfdsfdsfsf dsfsdf sdfdsfdsfsf dsfsdf sdfdsf',11232312,3,1,NULL,NULL,NULL,NULL),(6,'dssad sd sdfs fsf sfes fsfddsf s dffsdfs fsd ',1111111,3,2,NULL,NULL,NULL,NULL),(7,'sdf linux asjdajsd adbsadshndf',1234444,3,2,NULL,NULL,NULL,NULL),(8,'asda asd asdąąźźćłłóóęłłęććąąśś',1493289982,15,1,NULL,NULL,NULL,NULL),(9,'',1493290115,15,2,NULL,NULL,NULL,NULL),(10,'',1493290202,15,2,NULL,NULL,NULL,NULL),(11,'',1493290393,15,3,NULL,NULL,NULL,NULL),(12,'',1493290453,15,2,NULL,NULL,NULL,NULL),(13,'jacke',1493291280,15,1,NULL,NULL,NULL,NULL),(14,'tomek był',1493291293,15,1,NULL,NULL,NULL,NULL),(15,'jan niezbędny',1493291315,15,1,NULL,NULL,NULL,NULL),(16,'asdad tomi',1493304225,15,1,NULL,NULL,NULL,NULL),(17,'alibaba.',1493304722,15,1,NULL,NULL,NULL,NULL),(18,'linux',1493304880,15,11,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `comments2` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_registration` int(11) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `education` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tomix','tomi@wp.pl','$2y$10$NdTtJlvBweaZNG.P58eo8.uu785rSIs9oklwBOb7Gc68eBd3QVkVy',NULL,'2017-04-04 11:58:00','2017-04-04 11:58:00',1491314280,NULL,NULL),(2,'tomix2','tomiee@wp.pl','$2y$10$CrR0LgudmGvoWl0ScHQj4uXvOsEvV2KMJjliu4sI6cjI4VI8XTRW6',NULL,'2017-04-04 11:58:40','2017-04-04 11:58:40',1491314320,NULL,NULL),(3,'tomeki','tomeki@wp.pl','$2y$10$1IOFTs1nw7uH.4VUVN1NnemT9NsFrwHv3WV6jjJr212LNklE6H9Dy',NULL,'2017-04-04 14:26:32','2017-04-04 14:26:32',1491323192,NULL,NULL),(4,'jacek','jacek@wp.pl','$2y$10$8gvGpM9W1mJzzcMlxNCLbeuUQaVHbq.S5NTECTkuDr76pcQ/AyOpm',NULL,'2017-04-04 15:13:03','2017-04-04 15:13:03',1491325983,NULL,NULL),(5,'tomixe','tomixe@wp.pl','$2y$10$NOGHFNXwdmMGqNTJPvecNuLDub3c3Xbh1jvjxhE.e9wV1eIRS3VwO',NULL,'2017-04-05 10:13:57','2017-04-05 10:13:57',1491394437,NULL,NULL),(6,'tomixee','to@wp.pl','$2y$10$qTPgL9UlEPc.9eiQmY14tO6TFc7jZ0rhM38mCfwwRTtssdlSi/O5G',NULL,'2017-04-05 10:14:20','2017-04-05 10:14:20',1491394460,NULL,NULL),(7,'demis','demis@wp.pl','$2y$10$H8.9ccZdH8SY09xIBTAf9eW2HP.oDl3bp.65wxWkPJsLl68S7OMHa',NULL,'2017-04-05 10:15:06','2017-04-05 10:15:06',1491394506,NULL,NULL),(8,'antoni','antoni@wp.pl','$2y$10$uUHjiQsUlEpdbN56M7wi7uD3jJezL5xqi.ocsC87ChPU51I3HknN2',NULL,'2017-04-05 10:25:45','2017-04-05 10:25:45',1491395145,NULL,NULL),(9,'antoni2','antoni2@wp.pl','$2y$10$JBsG/bzgdIGfTx6F9Dh89.UpfcrgNEPsKRvEp565bbLsH/98layjO',NULL,'2017-04-05 10:26:31','2017-04-05 10:26:31',1491395191,NULL,NULL),(10,'antoni22','antoni22@wp.pl','$2y$10$XDXznSoTMvWRUD9vKeTwJON3cIIDsW7M/a0B2XiHYVSJiFTorGOQW',NULL,'2017-04-05 11:10:25','2017-04-05 11:10:25',1491397825,NULL,NULL),(11,'ziomek','ziomek@onet.pl','$2y$10$w9AUomyzXTNjaCOf20ZUt.vtPg7LSeQmM7df3d8Jh.GsP594vSKfC',NULL,'2017-04-05 11:21:18','2017-04-05 11:21:18',1491398478,NULL,NULL),(12,'tomixu','tomixu@wp.pl','$2y$10$1V0AHLl.ER4jgiUzCsT7WO.j6suCFFU.w1sqyGksv.ZHxPHPREu9C','4o00pcSGaBJZxbGMkudv422GfLAwilGkWSGu6ALPJWJoAnRuGW6UQiFUj5cc','2017-04-06 09:05:44','2017-04-06 09:05:44',1491476744,27,'wyższe'),(13,'tomixyf','tomixuf@wp.pl','$2y$10$Zhylaa/Wiq3XWcWTT6zdNuJb9BzIsaUtry4G7U35Uf0oGuFo85qDm',NULL,'2017-04-07 07:47:53','2017-04-07 07:47:53',1491558473,NULL,NULL),(14,'mnich','mnich@wp.pl','$2y$10$MXRiC7XTJjWklvMUQEwrE.5ryMB1/rYWOy02vypZqQxzFV6MGpTF6',NULL,'2017-04-07 07:51:44','2017-04-07 07:51:44',1491558704,NULL,NULL),(15,'jacek222','jacek1@wp.pl','$2y$10$1zDoJ1T//VNL47kr8NQjLOg/PpwURs6sNs4oGo3SM3Ys0PLctUQDC',NULL,'2017-04-21 06:40:13','2017-04-21 06:40:13',1492764013,26,'wyższe');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_offers`
--

DROP TABLE IF EXISTS `work_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date_add` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `city` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_offers`
--

LOCK TABLES `work_offers` WRITE;
/*!40000 ALTER TABLE `work_offers` DISABLE KEYS */;
INSERT INTO `work_offers` VALUES (1,'s',3000,1491820362,'2017-04-10','s','wyższe',12,NULL,NULL,NULL,NULL),(14,'sssssssss',120,1491821339,'2017-04-10','sssssss','brak',12,NULL,NULL,NULL,NULL),(18,'ssss',3000,1491821398,'2017-04-10','sssssssss','niepełne wyższe',12,NULL,NULL,NULL,NULL),(19,'s',122,1491821455,'2017-04-10','s','brak',12,NULL,NULL,NULL,NULL),(20,'a',12,1491821705,'2017-04-10','as','brak',12,NULL,NULL,NULL,NULL),(21,'informatyk',4000,1491909239,'2017-04-11','chojnice','średnie',12,NULL,NULL,NULL,NULL),(22,'programista',6000,1491910838,'2017-04-11','Warszawa','niepełne wyższe',12,NULL,NULL,NULL,NULL),(23,'programista',6000,1491910841,'2017-04-11','Warszawa','niepełne wyższe',12,NULL,NULL,NULL,NULL),(24,'programista',6000,1491910846,'2017-04-11','Warszawa','niepełne wyższe',12,NULL,NULL,NULL,NULL),(25,'programista',7000,1491910875,'2017-04-11','chojnice','średnie',12,NULL,NULL,NULL,NULL),(26,'asda',5678,1492169908,'2017-04-14',NULL,'brak',12,NULL,NULL,NULL,26),(27,'asda',5678,1492169923,'2017-04-14',NULL,'wyższe',12,NULL,NULL,NULL,26),(28,'Informatyk',6000,1492170693,'2017-04-14',NULL,'średnie',12,NULL,NULL,NULL,37),(29,'ąążżźćęęłł',8000,1492170717,'2017-04-14',NULL,'brak',12,NULL,NULL,NULL,26),(30,'Bevölkerung',9000,1492353373,'2017-04-16',NULL,'brak',12,NULL,NULL,NULL,26),(31,'ineger',6000,1492774792,'2017-04-21',NULL,'niepełne wyższe',15,NULL,NULL,NULL,38),(32,'申請',9000,1492784318,'2017-04-21',NULL,'średnie',15,NULL,NULL,NULL,26);
/*!40000 ALTER TABLE `work_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'praca'
--

--
-- Dumping routines for database 'praca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-27 18:12:40
