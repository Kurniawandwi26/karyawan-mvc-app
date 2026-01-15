-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: db_karyawan
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `tabel_jabatan`
--

DROP TABLE IF EXISTS `tabel_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabel_jabatan` (
  `id_jabatan` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`),
  UNIQUE KEY `nama_jabatan` (`nama_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jabatan`
--

LOCK TABLES `tabel_jabatan` WRITE;
/*!40000 ALTER TABLE `tabel_jabatan` DISABLE KEYS */;
INSERT INTO `tabel_jabatan` VALUES (2,'Accounting'),(3,'Direktur'),(1,'HRD'),(4,'Sales');
/*!40000 ALTER TABLE `tabel_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_karyawan`
--

DROP TABLE IF EXISTS `tabel_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabel_karyawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jabatan` int NOT NULL,
  `id_kota` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_kota` (`id_kota`),
  CONSTRAINT `tabel_karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tabel_karyawan_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `tabel_kota` (`id_kota`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_karyawan`
--

LOCK TABLES `tabel_karyawan` WRITE;
/*!40000 ALTER TABLE `tabel_karyawan` DISABLE KEYS */;
INSERT INTO `tabel_karyawan` VALUES (1,'Andi','1980-01-13',1,1),(2,'Budi','1987-05-28',2,2),(3,'Dewi','1974-12-04',3,3),(4,'Sari','1990-03-31',4,2);
/*!40000 ALTER TABLE `tabel_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kota`
--

DROP TABLE IF EXISTS `tabel_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tabel_kota` (
  `id_kota` int NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kota`),
  UNIQUE KEY `nama_kota` (`nama_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kota`
--

LOCK TABLES `tabel_kota` WRITE;
/*!40000 ALTER TABLE `tabel_kota` DISABLE KEYS */;
INSERT INTO `tabel_kota` VALUES (2,'Jakarta'),(1,'Manado'),(3,'Surabaya');
/*!40000 ALTER TABLE `tabel_kota` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-15 13:12:10
