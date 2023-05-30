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
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `calle` varchar(100) NOT NULL,
  `numext` varchar(100) NOT NULL,
  `numint` varchar(100) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `iduser` int NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_direcciones_usuarios1_idx` (`iduser`),
  CONSTRAINT `fk_direcciones_usuarios1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES ('Juarez','330','F','Misión de Fundadores','Apodaca',13),('Juarez','330','21','Misión de Fundadores','Apodaca',17);
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus` (
  `idestatus` int NOT NULL,
  `descestatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idestatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Pedido'),(2,'En camino'),(3,'Entregado');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca` (
  `idmarca` int NOT NULL,
  `nomb_marca` varchar(100) NOT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'JAFRA'),(2,'Yves Rocher');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `menosvendidos`
--

DROP TABLE IF EXISTS `menosvendidos`;
/*!50001 DROP VIEW IF EXISTS `menosvendidos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `menosvendidos` AS SELECT 
 1 AS `ID`,
 1 AS `Nombre`,
 1 AS `Cantidad Vendida`*/;
SET character_set_client = @saved_cs_client;

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
  `idmarca` int NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int NOT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmarca_idx` (`idmarca`),
  CONSTRAINT `idmarca` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,'Labial','Labial rojo',2,48,23,'83970.jpg'),(3,'Crema','Crema para manos',1,150,10,'imagen3.jpeg'),(8,'Delineador','Delineador negro',2,80,6,'imagen8.jpeg'),(9,'Balsamo Labial Antiarrugas Nutri Regenerador ','Gracias a este Balsamo Labial Antiarrugas Nutri Regenerador de 7.5ml el contorno de los labios se nutre inmediatamente.',2,250,8,'64750.jpg'),(10,'Gel de ducha','Olor: Vainilla',2,129,20,'geldeduchavainilla.jpg'),(11,'Gel de ducha','Olor: Maracuya Y Jengibre',2,129,20,'geldeduchamaracuya.jpg'),(12,'Gel de ducha','Olor: Coco',2,129,12,'geldeduchacoco.jpg'),(13,'Gel de ducha','Olor: Lavanda y mora',2,129,20,'geldeduchalavanda.jpg'),(14,'Crema de manos','Olor: Argan y petalos de rosa',2,89,18,'cremamanosargan.jpg'),(15,'Crema de manos','Olor: Monoi',2,89,13,'cremamanosmonoi.jpg'),(16,'Aceite corporal','Esencia: Rosas',1,870,10,'aceitecorporalrosas.jpg'),(17,'Aceite corporal','Esencia: Jengibre y Magnolia',1,870,25,'aceitecorporaljengibre.jpg'),(18,'Aceite corporal','Esencia: Aceite de Oliva y Vitamina E',1,870,12,'aceitecorporaloliva.jpg'),(19,'Aceite corporal','Esencia: Almendra',1,870,10,'cremacorporalalmendra.png'),(20,'Locion Humectante para el Cuerpo','Esencia: agua de rosas',1,742,10,'cremacorporalrosas.jpg'),(21,'Locion Humectante para el Cuerpo','Esencia: Jengibre',1,742,16,'cremacorporaljengibre.jpg'),(22,'Locion Humectante para el Cuerpo','Esencia: Cereza',1,742,18,'cremacorporalcereza.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Temporary view structure for view `reportesventas`
--

DROP TABLE IF EXISTS `reportesventas`;
/*!50001 DROP VIEW IF EXISTS `reportesventas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `reportesventas` AS SELECT 
 1 AS `idventa`,
 1 AS `idcliente`,
 1 AS `idestatus`,
 1 AS `Total`,
 1 AS `fecha`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `roll`
--

DROP TABLE IF EXISTS `roll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roll` (
  `idroll` int NOT NULL AUTO_INCREMENT,
  `roll` varchar(20) NOT NULL,
  PRIMARY KEY (`idroll`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roll`
--

LOCK TABLES `roll` WRITE;
/*!40000 ALTER TABLE `roll` DISABLE KEYS */;
INSERT INTO `roll` VALUES (1,'Administrador'),(2,'Cliente');
/*!40000 ALTER TABLE `roll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `idtags` int NOT NULL,
  `nombre_tag` varchar(100) NOT NULL,
  PRIMARY KEY (`idtags`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'rojo'),(2,'labial'),(3,'crema'),(4,'manos'),(5,'negro'),(6,'delineador'),(7,'ojos'),(8,'balsamo'),(9,'antiarrugas'),(10,'yves rocher'),(11,'gel'),(12,'ducha'),(13,'baÃ±o'),(14,'vainilla'),(15,'maracuya'),(16,'jengibre'),(17,'coco'),(18,'lavanda'),(19,'mora'),(20,'argÃ¡n'),(21,'pÃ©talos de rosa'),(22,'monoi'),(23,'aceite'),(24,'cuerpo'),(25,'corporal'),(26,'rosas'),(27,'esencia'),(28,'magnolia'),(29,'oliva'),(30,'vitamina e'),(31,'almendra'),(32,'lociÃ³n'),(33,'humectante'),(34,'cereza'),(35,'jafra');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `topsellers`
--

DROP TABLE IF EXISTS `topsellers`;
/*!50001 DROP VIEW IF EXISTS `topsellers`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `topsellers` AS SELECT 
 1 AS `ID`,
 1 AS `Nombre`,
 1 AS `Cantidad Vendida`*/;
SET character_set_client = @saved_cs_client;

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

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `idventa` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idcliente` int NOT NULL,
  `idestatus` int NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `idcliente` (`idcliente`),
  KEY `ventas_ibfk_1_idx` (`idestatus`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `usuarios` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (3,'2023-05-24',12,1),(4,'2023-05-24',13,1),(5,'2023-05-24',13,1),(6,'2023-05-24',13,1),(7,'2023-05-24',13,1),(8,'2023-05-24',13,1),(9,'2023-05-24',13,1),(10,'2023-05-24',13,1),(11,'2023-05-24',13,1),(12,'2023-05-24',13,1),(13,'2023-05-24',13,1),(14,'2023-05-24',13,1),(15,'2023-05-24',13,1),(16,'2023-05-24',13,1),(17,'2023-05-25',13,1),(18,'2023-05-25',13,1),(19,'2023-05-25',13,1),(20,'2023-05-25',13,1),(21,'2023-05-25',13,1),(22,'2023-05-25',13,1),(23,'2023-05-25',13,1),(24,'2023-05-25',13,1),(25,'2023-05-25',13,1),(26,'2023-05-25',13,1),(27,'2023-05-25',13,1),(28,'2023-05-25',13,1),(29,'2023-05-25',13,1),(30,'2023-05-25',13,1),(31,'2023-05-25',13,1),(32,'2023-05-25',13,1),(33,'2023-05-25',17,1),(34,'2023-05-25',17,1),(35,'2023-05-25',13,1),(36,'2023-05-25',13,1),(37,'2023-05-25',13,1),(38,'2023-05-25',13,1),(39,'2023-05-25',13,1),(40,'2023-05-25',13,1),(41,'2023-05-25',17,1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Final view structure for view `menosvendidos`
--

/*!50001 DROP VIEW IF EXISTS `menosvendidos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`David Barbosa`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `menosvendidos` AS select `vd`.`idproducto` AS `ID`,`vd`.`nombre_prod` AS `Nombre`,sum(`vd`.`cantidad_prod`) AS `Cantidad Vendida` from `ventas_detalles` `vd` group by `vd`.`idproducto`,`vd`.`nombre_prod` order by sum(`vd`.`cantidad_prod`) limit 10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reportesventas`
--

/*!50001 DROP VIEW IF EXISTS `reportesventas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`David Barbosa`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reportesventas` AS select `v`.`idventa` AS `idventa`,`v`.`idcliente` AS `idcliente`,`v`.`idestatus` AS `idestatus`,sum(`vd`.`total`) AS `Total`,`v`.`fecha` AS `fecha` from (`ventas` `v` join `ventas_detalles` `vd` on((`v`.`idventa` = `vd`.`idventa`))) group by `v`.`idventa` order by `v`.`fecha` desc,`v`.`idventa` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `topsellers`
--

/*!50001 DROP VIEW IF EXISTS `topsellers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`David Barbosa`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `topsellers` AS select `vd`.`idproducto` AS `ID`,`vd`.`nombre_prod` AS `Nombre`,sum(`vd`.`cantidad_prod`) AS `Cantidad Vendida` from `ventas_detalles` `vd` group by `vd`.`idproducto`,`vd`.`nombre_prod` order by sum(`vd`.`cantidad_prod`) desc limit 10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 18:49:38
