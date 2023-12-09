-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: bdminimarket
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idCategoria` tinyint NOT NULL AUTO_INCREMENT,
  `categoria` varchar(40) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Abarrotes'),(2,'Bebidas Alcohólicas'),(3,'Bebidas sin Alcohol'),(4,'Galletas, Chocolates, Golosinas'),(6,'Limpieza'),(7,'Mascotas'),(5,'Piqueos, Snacks');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `dni` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `producto` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_unitario` decimal(10,0) NOT NULL,
  `cantidad` int NOT NULL,
  `precio_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'Juan Perez','78659261','Gaseosa',8,4,32),(2,'Maria Gomez','45826197','Galleta',5,3,15),(3,'Carlos Lopez','64825091','Leche',9,5,45),(4,'Alisson Curo','74823054','Queso',15,2,30),(5,'Rodrigo Cardenas','52613482','Pan',2,10,20),(6,'Christofer Pazo','62578099','Yogurt',6,13,78);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta` (
  `idCuenta` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(70) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `foto` varchar(100) DEFAULT 'usuarioDefecto.png',
  `idRol` tinyint NOT NULL,
  PRIMARY KEY (`idCuenta`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_cue_rol` (`idRol`),
  CONSTRAINT `fk_cue_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,'admin@gmail.com','202cb962ac59075b964b07152d234b70','usuarioDefecto.png',1),(2,'cliente@gmail.com','202cb962ac59075b964b07152d234b70','usuarioDefecto.png',2),(3,'axlflo@hotmail.com','202cb962ac59075b964b07152d234b70','usuarioDefecto.png',2),(4,'gab@gmail.com','202cb962ac59075b964b07152d234b70','usuarioDefecto.png',2);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleventa` (
  `idVenta` int NOT NULL,
  `idProducto` smallint NOT NULL,
  `cantidad` tinyint NOT NULL,
  `subtotal` float NOT NULL,
  KEY `fk_det_ven` (`idVenta`),
  KEY `fk_det_pro` (`idProducto`),
  CONSTRAINT `fk_det_pro` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  CONSTRAINT `fk_det_ven` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
INSERT INTO `detalleventa` VALUES (1,20,1,1),(1,31,1,2.5),(1,13,1,2),(2,33,1,10.5),(2,30,1,8.5),(2,32,2,5),(3,23,1,1.6),(3,19,1,1),(4,35,1,10),(4,36,1,8.5),(4,31,1,2.5);
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizarStock` AFTER INSERT ON `detalleventa` FOR EACH ROW begin
	set @idPro = new.idProducto;
    set @cant = new.cantidad;
    update producto set stock = stock - @cant where idProducto = @idPro;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `idCuenta` int NOT NULL,
  `dni` varchar(8) DEFAULT '-',
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `dni` (`dni`),
  KEY `fk_per_cue` (`idCuenta`),
  CONSTRAINT `fk_per_cue` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'12345678','Humberto Richard','García Toribio','123456789'),(2,'87654321','Miau','Flores Zevallos','852364179'),(4,'56329998','Gab','Zer','963874592'),(3,'76543987','Alexander','Solar','998123432');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `idProducto` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `idCategoria` tinyint NOT NULL,
  `idProveedor` smallint NOT NULL,
  `precio` float NOT NULL,
  `stock` tinyint NOT NULL,
  `oferta` float DEFAULT '0',
  `imagen` varchar(100) DEFAULT '-',
  PRIMARY KEY (`idProducto`),
  KEY `fk_pro_cat` (`idCategoria`),
  KEY `fk_pro_prov` (`idProveedor`),
  CONSTRAINT `fk_pro_cat` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  CONSTRAINT `fk_pro_prov` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Aceite de Arroz Costeño Botella 900ml',1,8,15,13,3.5,'aceiteCosteno.jpg'),(2,'Aceite de Girasol Ideal Botella 1L',1,7,13,3,0,'aceiteIdealGirasol.jpg'),(3,'Aceite de Ajonjolí Sesame Oil Frasco 108ml',1,8,7.5,6,0,'aceiteAjonjoliSesame.jpg'),(4,'Aceite de Oliva Extra Virgen El Olivar Vidrio 200ml',1,8,12,3,0,'aceiteOlivaExtraVirgen.jpg'),(5,'Aceite Vegetal Primor Clásico Botella 900ml',1,7,11.5,7,0,'aceiteVegetalPrimor.jpg'),(6,'Anisado Anís Najar Crema Especial Botella 750ml',2,7,37.9,2,0,'anisNajarCrema.jpg'),(7,'Bebida Alcohólica Preparada Four Loko Green Lata 473ml',2,5,10.7,3,0,'fourLokoVerde.jpg'),(8,'Bebida Alcohólica Preparada Four Loko Ponche de Frutas Lata 473ml',2,5,10.7,6,0,'fourLokoRojo.jpg'),(9,'Bebida Alcohólica Preparada Four Loko Purple Lata 473ml',2,5,10.7,0,0,'fourLokoMorado.jpg'),(10,'Cerveza Cristal Bicolor Botella 330ml [Six Pack]',2,7,21,10,0,'cervezaCristalSixPack.jpg'),(11,'Cerveza Heineken Botella 330ml',2,2,5,16,0,'cervezaHeineken.jpg'),(12,'Agua Cielo Sin Gas Botella 625ml',3,7,1.2,15,0,'aguaCielo625ml.jpg'),(13,'Agua Cielo Sin Gas Botella Tapa Sport 1L',3,7,2,5,0,'aguaCielo1l.jpg'),(14,'Gaseosa 7up Botella 500ml',3,8,2,3,0,'gaseosa7up.jpg'),(15,'Gaseosa Big Cola Botella 3.3L',3,8,6.5,3,0,'bigCola3l.jpg'),(16,'Gaseosa Coca Cola Original Botella 1.5L',3,8,6,10,0,'cocaCola15l.jpg'),(17,'Gaseosa Fanta Naranja Botella 3L',3,4,7.9,2,0,'fantaNaranja3l.jpg'),(18,'Gaseosa Inca Kola Original Botella 2.25L',3,4,7.5,11,0,'incaKola225l.jpg'),(19,'Bebida Cifrut Fruit Punch Botella 400ml',3,4,1,2,0,'cifrut400ml.jpg'),(20,'Caramelos Bubbaloo Sparkies Bolsa 25gr',4,1,1,0,0,'bubbalooSparkies25gr.jpg'),(21,'Chicles Trident Sabor Mora Azul Paquete [6 unidades]',4,1,1.2,5,0,'tridentMora.jpg'),(22,'Chocolate Lentejas en Grajeas Caja 30gr',4,1,1,6,0,'chocolateLentejas.jpg'),(23,'Chocolate Princesa Blanco Barra 30gr',4,1,1.6,9,0,'princesaBlanco30gr.jpg'),(24,'Chocolate Triángulo Barra 30gr',4,1,1.6,5,0,'chocolateTriangulo30gr.jpg'),(25,'Camotes Fritos Inka Chips 130gr',5,2,5.5,4,0,'comotesFritosInkaChips.jpeg'),(26,'Chifles Salados Karinto 42gr',5,2,1,6,0,'chiflesKarinto.jpg'),(27,'Doritos Queso Atrevido 40g',5,2,1.3,2,0,'doritos40g.jpg'),(28,'Papas Lays Clásicas 70gr',5,2,2,6,0,'papasLays70gr.jpg'),(29,'Los Cuates Picantes 69gr',5,2,1,1,0,'cuatesPicantes69gr.jpg'),(30,'Ambientador en Aerosol Glade Alegría Floral y Frutos Rojos 400ml',6,9,8.5,4,0,'aerosolGladeAlegria.jpg'),(31,'Betún Color Negro Sapolio',6,9,2.5,7,0,'betunSapolio.jpg'),(32,'Bolsas para Basura Tachitos 30 Litros Rollo [10 unidades]',6,9,2.5,4,0,'bolsasTachitos30l.jpg'),(33,'Comida para Perro Ricocan Adulto Raza Mediana y Grande Sabor a Cordero y Cereales 1kg',7,3,10.5,6,0,'ricocanAdulto1kg.jpg'),(34,'Comida para Gatitos Mimaskot Sabor a Pollo, Carne y Leche Bolsa 1kg',7,3,10.5,4,0,'gatitosMimaskot1kg.jpg'),(35,'Comida para Gato Mimaskot Adulto Sabor a Pollo, Carne y Salmón Bolsa 1kg',7,9,10,9,0,'gatosMimaskot1kg.jpg'),(36,'Comida para Perro Mimaskot Cachorros Carne y Cereales Bolsa 1kg',7,9,8.5,2,0,'cachorrosMimaskot1kg.jpg');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `idProveedor` smallint NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(30) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`idProveedor`),
  UNIQUE KEY `proveedor` (`proveedor`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'proveedor1','111111111','prov1@gmail.com','Av. dirProv.1'),(2,'proveedor2','222222222','prov2@gmail.com','Av. dirProv.2'),(3,'proveedor3','333333333','prov3@gmail.com','Av. dirProv.3'),(4,'proveedor4','444444444','prov4@gmail.com','Av. dirProv.4'),(5,'proveedor5','555555555','prov5@gmail.com','Av. dirProv.5'),(6,'proveedor6','666666666','prov6@gmail.com','Av. dirProv.6'),(7,'proveedor7','777777777','prov7@gmail.com','Av. dirProv.7'),(8,'proveedor8','888888888','prov8@gmail.com','Av. dirProv.8'),(9,'proveedor9','999999999','prov9@gmail.com','Av. dirProv.9');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamo`
--

DROP TABLE IF EXISTS `reclamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamo` (
  `idReclamo` int NOT NULL AUTO_INCREMENT,
  `idCuenta` int NOT NULL,
  `reclamo` text NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idReclamo`),
  KEY `fk_rec_cue` (`idCuenta`),
  CONSTRAINT `fk_rec_cue` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamo`
--

LOCK TABLES `reclamo` WRITE;
/*!40000 ALTER TABLE `reclamo` DISABLE KEYS */;
INSERT INTO `reclamo` VALUES (1,2,'Primer reclamo que he registrado pruebapruebapruebapruebapruebapruebapruebapruebapruebapruebaprueba','2023-12-09 03:52:10');
/*!40000 ALTER TABLE `reclamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idRol` tinyint NOT NULL AUTO_INCREMENT,
  `rol` varchar(40) NOT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador'),(2,'Cliente');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sugerencia`
--

DROP TABLE IF EXISTS `sugerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sugerencia` (
  `idSugerencia` int NOT NULL AUTO_INCREMENT,
  `idCuenta` int NOT NULL,
  `asunto` varchar(70) NOT NULL,
  `sugerencia` text NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idSugerencia`),
  KEY `fk_sug_cue` (`idCuenta`),
  CONSTRAINT `fk_sug_cue` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sugerencia`
--

LOCK TABLES `sugerencia` WRITE;
/*!40000 ALTER TABLE `sugerencia` DISABLE KEYS */;
INSERT INTO `sugerencia` VALUES (1,3,'SUGERENCIA1','he observado stalnadasbdaodbasdblajsdasdasd','2023-12-09 03:24:33');
/*!40000 ALTER TABLE `sugerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoentrega`
--

DROP TABLE IF EXISTS `tipoentrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoentrega` (
  `idTipoEntrega` tinyint NOT NULL AUTO_INCREMENT,
  `tipoEntrega` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoEntrega`),
  UNIQUE KEY `tipoEntrega` (`tipoEntrega`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoentrega`
--

LOCK TABLES `tipoentrega` WRITE;
/*!40000 ALTER TABLE `tipoentrega` DISABLE KEYS */;
INSERT INTO `tipoentrega` VALUES (2,'Delivery'),(1,'Recojo en tienda');
/*!40000 ALTER TABLE `tipoentrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipopago` (
  `idTipoPago` tinyint NOT NULL AUTO_INCREMENT,
  `tipoPago` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoPago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
INSERT INTO `tipopago` VALUES (1,'Tarjeta'),(2,'Yape');
/*!40000 ALTER TABLE `tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `idVenta` int NOT NULL AUTO_INCREMENT,
  `idCuenta` int NOT NULL,
  `fecha` datetime NOT NULL,
  `idTipoPago` tinyint NOT NULL,
  `idTipoEntrega` tinyint NOT NULL,
  `direccion` varchar(100) DEFAULT '-',
  `precioTotal` float NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_ven_cli` (`idCuenta`),
  KEY `fk_ven_pag` (`idTipoPago`),
  KEY `fk_ven_ent` (`idTipoEntrega`),
  CONSTRAINT `fk_ven_cli` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`),
  CONSTRAINT `fk_ven_ent` FOREIGN KEY (`idTipoEntrega`) REFERENCES `tipoentrega` (`idTipoEntrega`),
  CONSTRAINT `fk_ven_pag` FOREIGN KEY (`idTipoPago`) REFERENCES `tipopago` (`idTipoPago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,2,'2023-12-08 18:13:16',2,1,'-',5.5),(2,3,'2023-12-08 18:33:51',1,2,'UCV',24),(3,3,'2023-12-09 10:46:04',1,1,'-',2.6),(4,4,'2023-12-09 10:58:12',2,2,'Comas',21);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bdminimarket'
--

--
-- Dumping routines for database 'bdminimarket'
--
/*!50003 DROP PROCEDURE IF EXISTS `iniciarSesion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `iniciarSesion`(in cor varchar(70), in con varchar(32), out accion tinyint unsigned)
begin
	declare conTemp varchar(32);
    select contrasena into conTemp from cuenta where correo = cor;
    if conTemp is not null then
		if conTemp = con then
			set accion = 1;
		else
			set accion = 2;
		end if;
	else
		set accion = 3;
	end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarProducto`(in id smallint, in nom varchar(150), in cat varchar(40), in pro varchar(30), in pre float, in sto tinyint, in ofe float, in ima varchar(100))
begin
	declare idCat tinyint;
    declare idProv smallint;
    select idCategoria into idCat from categoria where categoria = cat;
    select idProveedor into idProv from proveedor where proveedor = pro;
    update producto set nombre = nom, idCategoria = idCat, idProveedor = idProv, precio = pre, stock = sto, oferta = ofe, imagen = ima where idProducto = id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarCuenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarCuenta`(in cor varchar(70), in con varchar(32), in rol tinyint, in dni varchar(8), in nom varchar(50), 
in ape varchar(50), in tel varchar(9))
begin
	insert into cuenta (correo, contrasena, idRol) values (cor, con, rol);
    set @idCue = LAST_INSERT_ID();
    insert into persona (idCuenta, dni, nombres, apellidos, telefono) values (@idCue, dni, nom, ape, tel);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarDetalleVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarDetalleVenta`(in idVen int, in idPro smallint, in can tinyint, sub float)
begin
	insert into detalleVenta (idVenta, idProducto, cantidad, subtotal) values (idVen, idPro, can, sub);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarProducto`(in nom varchar(150), in cat varchar(40), in pro varchar(30), in pre float, in sto tinyint, in ofe float, in ima varchar(100))
begin
	declare idCat tinyint;
    declare idProv smallint;
    select idCategoria into idCat from categoria where categoria = cat;
    select idProveedor into idProv from proveedor where proveedor = pro;
    insert into producto (nombre, idCategoria, idProveedor, precio, stock, oferta, imagen) values (nom, idCat, idProv, pre, sto, ofe, ima);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarReclamo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarReclamo`(in id int, in rec text, in fec datetime)
begin
	insert into reclamo (idCuenta, reclamo, fecha) values (id, rec, fec);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarSugerencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarSugerencia`(in id int, in asu varchar(70), in sug text, in fec datetime)
begin
	insert into sugerencia (idCuenta, asunto, sugerencia, fecha) values (id, asu, sug, fec);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarVenta`(in idCue int, in fec datetime, in tpa tinyint, in ten tinyint, in dir varchar(100), in pto float)
begin
	insert into venta (idCuenta, fecha, idTipoPago, idTipoEntrega, direccion, precioTotal) values (idCue, fec, tpa, ten, dir, pto);
    set @idUltimaVenta = LAST_INSERT_ID();
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-09 13:32:03
