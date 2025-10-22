-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: proj_490
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.2

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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` char(64) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `expires` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,'0fcfdbf2d8e48e0a6cb574d5593ccad5e8d43a75d37d65b1d29da26bd8dabda7','ddd@njit.edu','Dylan','DiPalma',1760320944),(5,'bf26ca4503bbb4a578cc249bd702641387ca6e9323ab965dfa055e1732e5e960','test@test.com','test','test2',1760322158),(6,'24cb8f08d0cc4011e1126cd6baf89b1ce0ccc371638fb23656b0780381184f94','test@test.com','test','test2',1760322173),(7,'b65e7b17aa00ce73e7f70ca0107f5d1036af566d07a06fe80fa2ffc6eaa85281','test@test.com','test','test2',1760322183),(8,'b61002fa138b98af25d8fcf5d31a0f4f44b8bd4a4fc6d2fc388da6ab7684b943','ddd@njit.edu','Dylan','DiPalma',1760322202),(10,'aae6df3308edff34b3e1c70826a9eb07015f10495b94457a5adeb5ab0ee73b3c','ddd@njit.edu','Dylan','DiPalma',1760323120),(19,'724f78eb814067567cd00a91d5388d4d45445cf74f5a487720803e5dcd698100','ddd@njit.edu','Dylan','DiPalma',1760371903),(24,'89b628148f78af54e6075dba909b3e9ae697d7181de1dbf19f2e6b57d0b8bc98','mh82@njit.edu','Meek','Hadi',1760371915),(27,'931fa7f57ef3a8ceec59c97d79a7fd51b4c38127446bfc76834aa1b6a64fe3c8','test@njit.edu','Test','User',1760544125),(28,'154f7621927ca7d296946b60fec4c961dde529c1c978a06fbb2ef18a905035a3','mh82@njit.edu','Meek','Hadi',1760833513),(29,'6c864ae6b9c11697a116ec4a688eb4daf116b6b87345fc6398e347bc099a87f3','mh82@njit.edu','Meek','Hadi',1760833513),(30,'9cee8dd969ce2e1d7fa84685de42b541040fb0580796ce74292c5ca7a5da3826','mh82@njit.edu','Meek','Hadi',1760833513),(31,'2ea112d45988f77f86aa0e2fda91c417d99dac7cd8ac603c66088da146719404','mh82@njit.edu','Meek','Hadi',1760833514),(32,'e88f0a86c652aa130919d4b736cc585f8b8ac51531d8663da6bca1046b46b725','mh82@njit.edu','Meek','Hadi',1760833514),(33,'38b367e2093070e32043ab7421c31ae7ba7db0e1e730ca28ac7f2ccf1420576c','mh82@njit.edu','Meek','Hadi',1760833514),(34,'a8cc0556e5b1a65b8362aef44efa49d3a1b87774a3e1d9ab69565afd0b673d3e','mh82@njit.edu','Meek','Hadi',1760833514),(35,'4260871fbc602810ae6205a0515fa05530801e827ad0c423b8cbe490608013f1','mh82@njit.edu','Meek','Hadi',1760833516),(36,'606fd0dd01ed491c847928e1610b8fc303b5abe68b95023b43755bbc3df20707','mh82@njit.edu','Meek','Hadi',1760833516),(37,'96c7457b022a8083779bcc043cd8239d40bbbe89beaabefb68f0a686da9aee9b','mh82@njit.edu','Meek','Hadi',1760833516),(38,'35ff06398aeee26ae7c15f6796386b7b80961f26e018fefa5e2f07a118e5132c','mh82@njit.edu','Meek','Hadi',1760833516),(39,'8108e99099ed786915179ea726d69e6057cd52e38615471b43e72a62a088b12b','mh82@njit.edu','Meek','Hadi',1760833516);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ddd@njit.edu','passw0rd','Dylan','DiPalma'),(2,'sks245@njit.edu','password','Shamary','Shirley'),(3,'mh82@njit.edu','123456','Meek','Hadi'),(7,'test@njit.edu','password','Test','User'),(8,'guest@gmail.com','123456','M','H');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-20 22:10:58
