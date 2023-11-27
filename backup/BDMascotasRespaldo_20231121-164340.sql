-- MySQL dump 10.13  Distrib 8.0.35, for Win64 (x86_64)
--
-- Host: localhost    Database: BDMascotas
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adopciones`
--

DROP TABLE IF EXISTS `adopciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adopciones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUsuarioAdoptante` int(11) DEFAULT NULL,
  `IDMascota` int(11) DEFAULT NULL,
  `FechaAdopcion` date DEFAULT NULL,
  `EstadoAdopcion` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDUsuarioAdoptante` (`IDUsuarioAdoptante`),
  KEY `IDMascota` (`IDMascota`),
  CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`IDUsuarioAdoptante`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`IDMascota`) REFERENCES `mascotas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopciones`
--

LOCK TABLES `adopciones` WRITE;
/*!40000 ALTER TABLE `adopciones` DISABLE KEYS */;
INSERT INTO `adopciones` VALUES (1,1,1,'2023-10-15','Adoptado'),(2,2,2,'2023-10-20','Adoptado'),(3,3,3,'2023-10-25','En Proceso'),(4,9,7,'0000-00-00','En proceso');
/*!40000 ALTER TABLE `adopciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avisos`
--

DROP TABLE IF EXISTS `avisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avisos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUsuarioAnunciante` int(11) DEFAULT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDUsuarioAnunciante` (`IDUsuarioAnunciante`),
  CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`IDUsuarioAnunciante`) REFERENCES `usuarios` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avisos`
--

LOCK TABLES `avisos` WRITE;
/*!40000 ALTER TABLE `avisos` DISABLE KEYS */;
INSERT INTO `avisos` VALUES (1,1,'¡Torta busca un hogar!','Torta es un perro amigable que necesita...','2023-10-10'),(2,2,'Luna busca un compañero','Luna es una gata cariñosa que necesita...','2023-10-12'),(3,3,'Candy busca diversión','Candy es un perro activo que busca un...','2023-10-14'),(4,10,'Evento de adopciónes','asdsdfdb','2023-01-09'),(5,10,'Evento de adopciónes','Holaaa','2023-01-09');
/*!40000 ALTER TABLE `avisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDAdopcion` int(11) DEFAULT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `TerminosYCondiciones` text DEFAULT NULL,
  `FirmaDigital` varchar(255) DEFAULT NULL,
  `FechaFirma` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDAdopcion` (`IDAdopcion`),
  KEY `IDUsuario` (`IDUsuario`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`IDAdopcion`) REFERENCES `adopciones` (`ID`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (1,1,1,'Términos de adopción','Firma1','2023-10-16'),(2,2,2,'Términos de adopción','Firma2','2023-10-22'),(5,3,3,'Términos de adopción','Firma03','2023-11-10');
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historiadeexito`
--

DROP TABLE IF EXISTS `historiadeexito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiadeexito` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUsuario` int(11) DEFAULT NULL,
  `IDMascota` int(11) DEFAULT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Imagenes` varchar(255) DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDUsuario` (`IDUsuario`),
  KEY `IDMascota` (`IDMascota`),
  CONSTRAINT `historiadeexito_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `historiadeexito_ibfk_2` FOREIGN KEY (`IDMascota`) REFERENCES `mascotas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiadeexito`
--

LOCK TABLES `historiadeexito` WRITE;
/*!40000 ALTER TABLE `historiadeexito` DISABLE KEYS */;
INSERT INTO `historiadeexito` VALUES (1,2,2,'La historia de Luna','Luna encontró un hogar amoroso y ahora es feliz...','imagen_luna.jpg','2023-10-26'),(2,1,1,'La historia de Torta','Torta ha traído mucha alegría a nuestra familia...','imagen_torta.jpg','2023-10-27'),(3,3,3,'La historia de Candy','Candy encontró un hogar activo donde puede...','imagen_candy.jpg','2023-10-25');
/*!40000 ALTER TABLE `historiadeexito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascotas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Raza` varchar(255) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Genero` varchar(20) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Imagenes` varchar(255) DEFAULT NULL,
  `EstadoAdopcion` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (1,'Torta','No aplica',2,'H','Torta es una perra juguetona y cariñosa.','imagen1.jpg','Disponible'),(2,'Luna','Siamese',1,'H','Luna es una perra tranquila y le encanta...','imagen2.jpg','Adoptado'),(3,'Candy','Labrador',3,'H','Candy es activa y le encanta correr y...','imagen3.jpg','Disponible'),(4,'Torta','No aplica',2,'Hembra','Torta es una perra juguetona y cariñosa.','imagen1.jpg','Disponible'),(5,'Luna','Siamese',4,'Hembra','Luna es una perra tranquila y le encanta...','imagen2.jpg','Adoptado'),(7,'Teo','Mestizo',5,'Macho','asdsdfdb','imagen1.jpg','Disponible');
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento`
--

DROP TABLE IF EXISTS `seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguimiento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDAdopcion` int(11) DEFAULT NULL,
  `FechaSeguimiento` date DEFAULT NULL,
  `Comentario` text DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDAdopcion` (`IDAdopcion`),
  CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`IDAdopcion`) REFERENCES `adopciones` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento`
--

LOCK TABLES `seguimiento` WRITE;
/*!40000 ALTER TABLE `seguimiento` DISABLE KEYS */;
INSERT INTO `seguimiento` VALUES (1,1,'2023-10-17','Primera reunión con la familia adoptiva. Se ven felices.'),(2,2,'2023-10-23','Luna se está adaptando muy bien en su nuevo hogar.'),(3,3,'2023-10-25','Candy está respondiendo bien a la capacitación.');
/*!40000 ALTER TABLE `seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `CorreoElectronico` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `TipoDeUsuario` varchar(50) NOT NULL,
  `FechaDeNacimiento` date DEFAULT NULL,
  `Genero` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Alejandro','Martínez','mmao211516@upemor.edu.mx','contra123','777-123-4568','Privada Gladiola s/n','Administrador','2002-05-12','H'),(2,'Angel','Gómez','angel@gmail.com','pass123','739-987-6543','Avenida Central 456','Adoptante','2000-05-13','H'),(3,'Valeria','Sánchez','valeria@gmail.com','valeria12','777-789-1234','Jardin Juarez s/n','UsuarioComun','1997-05-14','M'),(9,'Pedro','Pedrin','pedropedrin@gmail.com','12345','7674678890','Privada Gladiola S/N','UsuarioComun','1997-02-13','H'),(10,'Jose','Reyes','jose@gmail.com','12345','739-345-6789','Avenida 6','Administrador','1999-03-09','H');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas`
--

DROP TABLE IF EXISTS `visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUsuarioVisitante` int(11) DEFAULT NULL,
  `IDMascota` int(11) DEFAULT NULL,
  `FechaVisita` date DEFAULT NULL,
  `Comentario` text DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDUsuarioVisitante` (`IDUsuarioVisitante`),
  KEY `IDMascota` (`IDMascota`),
  CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`IDUsuarioVisitante`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`IDMascota`) REFERENCES `mascotas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,1,1,'2023-10-16','Conocí a Torta, es muy amigable.'),(2,2,3,'2023-10-22','Candy es encantadora, la adopté.'),(3,3,1,'2023-10-23','Fui a ver a Torta de nuevo, quiero adoptarla...');
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-21  9:43:41
