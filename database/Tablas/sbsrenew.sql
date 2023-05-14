CREATE DATABASE sbsrenew;
USE sbsrenew;

SET SQL_SAFE_UPDATES = 0;
INSERT INTO ventas (fecha, idcliente, idestatus) VALUES(curdate(), 9, 1);
SELECT idventa, fecha, idcliente, descestatus FROM ventas INNER JOIN estatus ON ventas.idestatus = estatus.idestatus WHERE idcliente = 12;

SELECT nombre_prod, nomb_marca, cantidad_prod, total, img FROM (ventas_detalles INNER JOIN productos ON ventas_detalles.idproducto = productos.id) INNER JOIN marca ON productos.idmarca = marca.idmarca WHERE idventa = 6;

INSERT INTO estatus VALUES (1, "Pedido"), (2, "En camino"), (3, "Entregado");

INSERT INTO roll VALUES (1,"Administrador"), (2,"Cliente");

INSERT INTO marca VALUES (1,"JAFRA"), (2,"Yves Rocher");

SELECT nombre_tag FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE id = 11;
SELECT idProductos, nombre_tag FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE id != 11 ORDER BY idProductos; #AND (nombre LIKE '%cuerpo%' OR descripcion LIKE '%cuerpo%' OR nombre_tag LIKE '%cuerpo%');
SELECT img FROM productos WHERE id=16productos ORDER BY id;
SELECT * FROM tags ORDER BY nombre_tag;
SELECT MAX(id) as lastid FROM productos;
INSERT INTO usuarios VALUES (1, "Administrador Cero", "Admin0", "admin0sbs@sbs.com", "62e4e39975d70f2cd2353cf3a0d3233a0c5f4301", 8123494565, 1);
SELECT id,descripcion,nomb_marca,precio,cantidad,img FROM productos INNER JOIN marca ON productos.idmarca = marca.idmarca;
SELECT * FROM (productos INNER JOIN marca ON productos.idmarca = marca.idmarca) WHERE id = 9;



CREATE VIEW ReportesVentas
AS
SELECT v.idventa, v.idcliente, v.idestatus, SUM(vd.total) as 'Total', v.fecha
FROM ventas v
INNER JOIN ventas_detalles vd on v.idventa = vd.idventa
GROUP BY v.idventa
ORDER BY v.fecha DESC, v.idventa DESC;

CREATE VIEW TopSellers
AS
SELECT vd.idproducto AS 'ID', vd.nombre_prod AS 'Nombre', SUM(vd.cantidad_prod) AS 'Cantidad Vendida'
FROM ventas_detalles vd
GROUP BY vd.idproducto, vd.nombre_prod
ORDER BY SUM(vd.cantidad_prod) DESC
LIMIT 10;

CREATE VIEW MenosVendidos
AS
SELECT vd.idproducto AS 'ID', vd.nombre_prod AS 'Nombre', SUM(vd.cantidad_prod) AS 'Cantidad Vendida'
FROM ventas_detalles vd
GROUP BY vd.idproducto, vd.nombre_prod
ORDER BY SUM(vd.cantidad_prod) ASC
LIMIT 10;
# 62e4e39975d70f2cd2353cf3a0d3233a0c5f4301 = Labial10 | Es la contraseña del admin

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
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `calle` varchar(100) NOT NULL,
  `numext` varchar(100) NOT NULL,
  `numint` varchar(100) DEFAULT NULL,
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
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `productos_tags` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
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

-- Dump completed on 2023-04-27 11:48:36
