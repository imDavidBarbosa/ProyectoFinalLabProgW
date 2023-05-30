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
-- Table structure for table `ventas_detalles`
--

DROP TABLE IF EXISTS `ventas_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_detalles` (
  `idventa` int NOT NULL,
  `idproducto` int NOT NULL,
  `nombre_prod` varchar(45) NOT NULL,
  `cantidad_prod` int NOT NULL,
  `total` varchar(45) NOT NULL,
  PRIMARY KEY (`idventa`,`idproducto`),
  KEY `fk_ventas_has_productos_productos1_idx` (`idproducto`),
  KEY `fk_ventas_has_productos_ventas1_idx` (`idventa`),
  CONSTRAINT `fk_ventas_has_productos_productos1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_ventas_has_productos_ventas1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalles`
--

LOCK TABLES `ventas_detalles` WRITE;
/*!40000 ALTER TABLE `ventas_detalles` DISABLE KEYS */;
INSERT INTO `ventas_detalles` VALUES (3,10,'Gel de ducha',2,'258'),(3,12,'Gel de ducha',3,'387'),(4,3,'Crema',1,'150'),(4,9,'Balsamo Labial Antiarrugas Nutri Regenerador ',2,'500'),(5,12,'Gel de ducha',2,'258'),(6,8,'Delineador',2,'160'),(7,21,'Locion Humectante para el Cuerpo',1,'742'),(8,3,'Crema',1,'150'),(9,2,'Labial',3,'144'),(9,3,'Crema',2,'300'),(9,22,'Locion Humectante para el Cuerpo',1,'742'),(10,9,'Balsamo Labial Antiarrugas Nutri Regenerador ',2,'500'),(10,12,'Gel de ducha',2,'258'),(10,13,'Gel de ducha',1,'129'),(11,10,'Gel de ducha',1,'129'),(12,18,'Aceite corporal',2,'1740'),(13,2,'Labial',1,'48'),(13,11,'Gel de ducha',1,'129'),(13,17,'Aceite corporal',1,'870'),(13,20,'Locion Humectante para el Cuerpo',1,'742'),(14,3,'Crema',1,'150'),(16,8,'Delineador',1,'80'),(17,3,'Crema',1,'150'),(18,3,'Crema',1,'150'),(19,3,'Crema',2,'300'),(20,3,'Crema',1,'150'),(21,3,'Crema',1,'150'),(22,3,'Crema',2,'300'),(23,15,'Crema de manos',1,'89'),(24,13,'Gel de ducha',1,'129'),(25,3,'Crema',2,'300'),(27,2,'Labial',1,'48'),(28,3,'Crema',1,'150'),(29,2,'Labial',1,'48'),(29,3,'Crema',1,'150'),(29,8,'Delineador',1,'80'),(29,10,'Gel de ducha',1,'129'),(29,11,'Gel de ducha',1,'129'),(29,19,'Aceite corporal',1,'870'),(32,3,'Crema',1,'150'),(33,3,'Crema',2,'300'),(34,3,'Crema',3,'450'),(35,3,'Crema',2,'300'),(36,3,'Crema',1,'150'),(37,3,'Crema',2,'300'),(39,3,'Crema',3,'450'),(40,3,'Crema',3,'450'),(41,2,'Labial',4,'192');
/*!40000 ALTER TABLE `ventas_detalles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 18:47:40
