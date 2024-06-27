CREATE DATABASE  IF NOT EXISTS `pizza_treino` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pizza_treino`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pizza_treino
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `borda`
--

DROP TABLE IF EXISTS `borda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borda` (
  `idBorda` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idBorda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borda`
--

LOCK TABLES `borda` WRITE;
/*!40000 ALTER TABLE `borda` DISABLE KEYS */;
INSERT INTO `borda` VALUES (1,'Borda Comum'),(2,'Borda com Catupiry'),(3,'Borda com Chocolate');
/*!40000 ALTER TABLE `borda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massa`
--

DROP TABLE IF EXISTS `massa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `massa` (
  `idMassa` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMassa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massa`
--

LOCK TABLES `massa` WRITE;
/*!40000 ALTER TABLE `massa` DISABLE KEYS */;
INSERT INTO `massa` VALUES (1,'Massa Tradicional'),(2,'Massa com Manteiga'),(3,'Massa Fina');
/*!40000 ALTER TABLE `massa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `idPizza` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  PRIMARY KEY (`idPedidos`),
  KEY `idPizza` (`idPizza`),
  KEY `idStatus` (`idStatus`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idPizza`) REFERENCES `pizzas` (`idPizza`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (8,9,1),(9,10,2),(10,11,2),(11,12,3);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pizzas` (
  `idPizza` int(11) NOT NULL AUTO_INCREMENT,
  `idMassa` int(11) NOT NULL,
  `idBorda` int(11) NOT NULL,
  PRIMARY KEY (`idPizza`),
  KEY `idMassa` (`idMassa`),
  KEY `idBorda` (`idBorda`),
  CONSTRAINT `pizzas_ibfk_1` FOREIGN KEY (`idMassa`) REFERENCES `massa` (`idMassa`),
  CONSTRAINT `pizzas_ibfk_2` FOREIGN KEY (`idBorda`) REFERENCES `borda` (`idBorda`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizzas`
--

LOCK TABLES `pizzas` WRITE;
/*!40000 ALTER TABLE `pizzas` DISABLE KEYS */;
INSERT INTO `pizzas` VALUES (9,1,1),(10,3,3),(11,2,2),(12,1,2);
/*!40000 ALTER TABLE `pizzas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabores`
--

DROP TABLE IF EXISTS `sabores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sabores` (
  `idSabores` int(11) NOT NULL AUTO_INCREMENT,
  `sabor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSabores`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabores`
--

LOCK TABLES `sabores` WRITE;
/*!40000 ALTER TABLE `sabores` DISABLE KEYS */;
INSERT INTO `sabores` VALUES (1,'Pepperoni'),(2,'4 Queijos'),(3,'Calabresa'),(4,'Frango com Catupiry'),(5,'Milho com Bacon');
/*!40000 ALTER TABLE `sabores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabores_pizza`
--

DROP TABLE IF EXISTS `sabores_pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sabores_pizza` (
  `idSaborPizza` int(11) NOT NULL AUTO_INCREMENT,
  `idPizza` int(11) NOT NULL,
  `idSabores` int(11) NOT NULL,
  PRIMARY KEY (`idSaborPizza`),
  KEY `idPizza` (`idPizza`),
  KEY `idSabores` (`idSabores`),
  CONSTRAINT `sabores_pizza_ibfk_1` FOREIGN KEY (`idPizza`) REFERENCES `pizzas` (`idPizza`),
  CONSTRAINT `sabores_pizza_ibfk_2` FOREIGN KEY (`idSabores`) REFERENCES `sabores` (`idSabores`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabores_pizza`
--

LOCK TABLES `sabores_pizza` WRITE;
/*!40000 ALTER TABLE `sabores_pizza` DISABLE KEYS */;
INSERT INTO `sabores_pizza` VALUES (8,9,1),(9,10,4),(10,10,5),(11,11,3),(12,11,4),(13,12,1),(14,12,4);
/*!40000 ALTER TABLE `sabores_pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Em produção'),(2,'Em entrega'),(3,'Concluido');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-26 22:12:58
