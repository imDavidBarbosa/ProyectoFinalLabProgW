-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sbs
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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int NOT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,'Labial','Labial rojo','rojo, labial','Yves Rocher',48,23,'83970.jpg'),(3,'Crema','Crema para manos','crema, manos','Jafra',150,10,'imagen3.jpeg'),(8,'Delineador','Delineador negro','negro, delineador, ojos, yves rocher','Yves Rocher',80,6,'imagen8.jpeg'),(9,'Bálsamo Labial Antiarrugas Nutri Regenerador ','Gracias a este Bálsamo Labial Antiarrugas Nutri Regenerador de 7.5ml el contorno de los labios se nutre inmediatamente.','balsamo, labial, antiarrugas, yves rocher','Yves Rocher',250,8,'64750.jpg'),(10,'Gel de ducha','Olor: Vainilla','gel, ducha, baño, vainilla, yves rocher','Yves Rocher',129,20,'geldeduchavainilla.jpg'),(11,'Gel de ducha','Olor: Maracuyá Y Jengibre','gel, ducha, maracuya, jengibre, yves rocher','Yves Rocher',129,20,'geldeduchamaracuya.jpg'),(12,'Gel de ducha','Olor: Coco','gel, ducha, coco, baño, yves rocher','Yves Rocher',129,12,'geldeduchacoco.jpg'),(13,'Gel de ducha','Olor: Lavanda y mora','gel, ducha, baño, lavanda, mora, yves rocher','Yves Rocher',129,20,'geldeduchalavanda.jpg'),(14,'Crema de manos','Olor: Argán y pétalos de rosa','crema, manos, argán, pétalos de rosa, yves rocher','Yves Rocher',89,18,'cremamanosargan.jpg'),(15,'Crema de manos','Olor: Monoi','crema, manos, monoi, yves rocher','Yves Rocher',89,13,'cremamanosmonoi.jpg'),(16,'Aceite corporal','Esencia: Rosas','aceite, cuerpo, corporal, rosas, esencia, jafra','JAFRA',870,10,'aceitecorporalrosas.jpg'),(17,'Aceite corporal','Esencia: Jengibre y Magnolia','aceite, cuerpo, corporal, jengibre, magnolia, esencia, jafra','JAFRA',870,25,'aceitecorporaljengibre.jpg'),(18,'Aceite corporal','Esencia: Aceite de Oliva y Vitamina E','aceite, cuerpo, corporal, oliva, vitamina e, esencia, jafra','JAFRA',870,12,'aceitecorporaloliva.jpg'),(19,'Aceite corporal','Esencia: Almendra','aceite, cuerpo, corporal, almendra, esencia, jafra','JAFRA',870,10,'cremacorporalalmendra.png'),(20,'Loción Humectante para el Cuerpo','Esencia: agua de rosas','loción, humectante, cuerpo, corporal, rosas, jafra','JAFRA',742,10,'cremacorporalrosas.jpg'),(21,'Loción Humectante para el Cuerpo','Esencia: Jengibre','loción, humectante, cuerpo, corporal, jengibre, jafra','JAFRA',742,16,'cremacorporaljengibre.jpg'),(22,'Loción Humectante para el Cuerpo','Esencia: Cereza','loción, humectante, cuerpo, corporal, cereza, jafra','JAFRA',742,18,'cremacorporalcereza.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-07 10:51:58
