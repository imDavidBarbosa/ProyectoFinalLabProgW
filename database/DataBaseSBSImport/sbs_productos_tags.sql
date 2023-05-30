-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sbsrenew
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `productos_tags`
--

DROP TABLE IF EXISTS `productos_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos_tags` (
  `idProductos` int NOT NULL,
  `idtags` int NOT NULL,
  PRIMARY KEY (`idProductos`,`idtags`),
  KEY `fk_productos_has_tags_tags1_idx` (`idtags`),
  KEY `fk_productos_has_tags_productos1_idx` (`idProductos`),
  CONSTRAINT `fk_productos_has_tags_productos1` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_productos_has_tags_tags1` FOREIGN KEY (`idtags`) REFERENCES `tags` (`idtags`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_tags`
--

LOCK TABLES `productos_tags` WRITE;
/*!40000 ALTER TABLE `productos_tags` DISABLE KEYS */;
INSERT INTO `productos_tags` VALUES (2,1),(2,2),(9,2),(3,3),(14,3),(15,3),(3,4),(14,4),(15,4),(8,5),(8,6),(8,7),(9,8),(9,9),(8,10),(9,10),(10,10),(11,10),(12,10),(13,10),(14,10),(15,10),(10,11),(11,11),(12,11),(13,11),(10,12),(11,12),(12,12),(13,12),(10,13),(11,13),(12,13),(13,13),(10,14),(11,15),(11,16),(17,16),(21,16),(12,17),(13,18),(13,19),(14,20),(14,21),(15,22),(16,23),(17,23),(18,23),(19,23),(16,24),(17,24),(18,24),(19,24),(20,24),(21,24),(22,24),(16,25),(17,25),(18,25),(19,25),(20,25),(21,25),(22,25),(16,26),(20,26),(16,27),(17,27),(18,27),(19,27),(17,28),(18,29),(18,30),(19,31),(20,32),(21,32),(22,32),(20,33),(21,33),(22,33),(22,34),(16,35),(17,35),(18,35),(19,35),(20,35),(21,35),(22,35);
/*!40000 ALTER TABLE `productos_tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 18:44:30
