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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `nombre_com` varchar(100) NOT NULL,
  `nombre_user` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `roll` int NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `roll` (`roll`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`roll`) REFERENCES `roll` (`idroll`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador Cero','Admin0','admin0sbs@sbs.com','62e4e39975d70f2cd2353cf3a0d3233a0c5f4301','8123494565',1),(9,'Luis Fernando Aguirre PiÃ±Ã³n','aguirreluis03','aguirreluis640@gmail.com','35564285dc36df87b3607c53e389e89343996d1b','8123792453',2),(11,'Juliana LÃ³pez','jullop','julop@outlook.com','299cd8b2492296844ba5b696459f0b2e63036362','8745632164',2),(12,'Ximena','xime13','xime@gmail.com','9a589c8a359d0c93978f43d37d439d6fc16a74b8','8123157836',2),(13,'David Oswaldo Barbosa Valdez','DavidB','david@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','8112345678',2),(16,'Jorge Luis','JorgeL','jorge@gmail.com','87acec17cd9dcd20a716cc2cf67417b71c8a7016','8178945631',2),(17,'Luis Alberto','LuiAlb','LuiAlb@sbs.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','8174185296',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 18:47:15
