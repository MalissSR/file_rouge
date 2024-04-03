-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: district
-- ------------------------------------------------------
-- Server version	10.6.16-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (4,'Pizza','images_the_district/categorie/pizza_cat.png','Yes'),(5,'Burger','images_the_district/categorie/burger_cat.png','Yes'),(9,'Wraps','images_the_district/categorie/wrap_cat.png','Yes'),(10,'Pasta','images_the_district/categorie/pasta_cat.png','Yes'),(11,'Sandwich','images_the_district/categorie/sandwich_cat.png','No'),(12,'Asian Food','images_the_district/categorie/asian_food_cat.png','Yes'),(13,'Salade','images_the_district/categorie/salade_cat.png','Yes'),(14,'Veggie','images_the_district/categorie/veggie_cat.png','Yes');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plat` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `nom_client` varchar(150) NOT NULL,
  `telephone_client` varchar(20) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plat` (`id_plat`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (2,4,4,16.00,'2020-11-30 03:52:43','Livrée','Kelly Dillard','7896547800','kelly@gmail.com','308 Post Avenue'),(3,5,2,20.00,'2020-11-30 04:07:17','Livrée','Thomas Gilchrist','7410001450','thom@gmail.com','1277 Sunburst Drive'),(4,5,1,10.00,'2021-05-04 01:35:34','Livrée','Martha Woods','78540001200','marthagmail.com','478 Avenue Street'),(6,9,1,7.00,'2021-07-20 06:10:37','Livrée','Charlie','7458965550','charlie@gmail.com','3140 Bartlett Avenue'),(7,10,2,8.00,'2021-07-20 06:40:21','En cours de livraison','Claudia Hedley','7451114400','hedley@gmail.com','1119 Kinney Street'),(8,14,1,6.00,'2021-07-20 06:40:57','En préparation','Vernon Vargas','7414744440','venno@gmail.com','1234 Hazelwood Avenue'),(9,9,4,20.00,'2021-07-20 07:06:06','Annulée','Carlos Grayson','7401456980','carlos@gmail.com','2969 Hartland Avenue'),(10,16,4,12.00,'2021-07-20 07:11:06','Livrée','Jonathan Caudill','7410256996','jonathan@gmail.com','1959 Limer Street');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandes`
--

LOCK TABLES `commandes` WRITE;
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
INSERT INTO `commandes` VALUES (1,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:18:32'),(2,'Cruz','Margot','0123456789','AJHFEZOHFEZO','teste@teste.com','2024-03-21 14:19:59'),(3,'Cruz','Margot','0123456789','AJHFEZOHFEZO','teste@teste.com','2024-03-21 14:21:31'),(4,'Cruz','Margot','0123456789','AJHFEZOHFEZO','teste@teste.com','2024-03-21 14:21:54'),(5,'Bellanger','Andy','0123456789','a','teste@teste.com','2024-03-21 14:22:06'),(6,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:31:01'),(7,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:31:23'),(8,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:34:07'),(9,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:42:38'),(10,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:49:57'),(11,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:52:10'),(12,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:53:20'),(13,'a','a','0123456789','a','teste@teste.com','2024-03-21 14:57:42'),(14,'a','a','0123456789','a','andybellanger80200@gmail.com','2024-03-21 15:06:41'),(15,'a','a','0123456789','a','teste@teste.com','2024-03-21 15:09:36'),(16,'AAA','AAA','0123456789','AAA','teste@teste.com','2024-03-22 09:06:01'),(17,'AAA','é','0123456789','a','teste@teste.com','2024-03-22 09:53:34'),(18,'AAA','é','0123456789','a','teste@teste.com','2024-03-22 09:54:05'),(19,'AAA','Andy','0123456789','teste','teste@teste.com','2024-03-25 13:57:06'),(20,'a','a','0123456789','a','teste@teste.com','2024-03-26 12:40:49'),(21,'AAA','é','0123456789','AAAA','teste@teste.com','2024-03-26 12:46:22'),(22,'A','A','0123456789','AAAAA','teste@teste.com','2024-03-26 13:44:56'),(23,'AAA','AAA','0123456789','AAAA','teste@teste.com','2024-03-28 07:45:09'),(24,'TEste','teste','0123456789','teste','teste@teste.com','2024-03-28 13:44:22'),(25,'TEste','AAA','0123456789','Teste','teste@teste.com','2024-03-28 13:46:46'),(26,'Exemple','Exemple','0123456789','Exemple','teste@teste.com','2024-04-03 11:34:47'),(27,'Exemple','Exemple','0123456789','Exemple','teste@teste.com','2024-04-03 11:54:32'),(28,'Exemple','Exemple','0123456789','Exemple','teste@teste.com','2024-04-03 11:58:03'),(29,'Bellanger','Andy','exemple','Noi','teste@teste.com','2024-04-03 11:59:12'),(30,'AAAAAA','AAAAA','AAAAA','AAAAAA','teste@teste.com','2024-04-03 12:04:48'),(31,'burger','burger','0123456789','teste','teste@teste.com','2024-04-03 12:07:00'),(32,'burger','burger','0123456789','burger','teste@teste.com','2024-04-03 12:07:34'),(33,'BURGER','BURGER','0123456789','BURGER','teste@teste.com','2024-04-03 12:15:19'),(34,'burger','burger','0123456789','burgeeer','teste@teste.com','2024-04-03 12:16:27'),(35,'burger','burger','0123456789','burgeeer','teste@teste.com','2024-04-03 12:17:21'),(36,'burger','burger','0123456789','burgeeer','teste@teste.com','2024-04-03 12:17:27'),(37,'burger','burger','0123456789','teste','teste@teste.com','2024-04-03 12:17:48'),(38,'wraps','wraps','0123456789','wraps','teste@teste.com','2024-04-03 12:18:37'),(39,'Exemple','Andy','0123456789','teste','teste@teste.com','2024-04-03 12:19:23');
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plat`
--

DROP TABLE IF EXISTS `plat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plat`
--

LOCK TABLES `plat` WRITE;
/*!40000 ALTER TABLE `plat` DISABLE KEYS */;
INSERT INTO `plat` VALUES (4,'District Burger','Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .',8.00,'images_the_district/plat/plat_hors_categorie/burger.png',5,'Yes'),(5,'Pizza Bianca','Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.',15.40,'images_the_district/plat/plat_hors_categorie/pizza_chorizo.png',4,'Yes'),(9,'Buffalo Chicken Wrap','Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.',5.00,'images_the_district/plat/plat_hors_categorie/buffalo_wraps.png',9,'Yes'),(10,'Cheeseburger','Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.',8.00,'images_the_district/plat/plat_hors_categorie/cheeser_burger.png',5,'Yes'),(12,'Spaghetti aux légumes','Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide',10.00,'images_the_district/plat/plat_hors_categorie/spaghetti_legumes.png',10,'Yes'),(13,'Salade César','Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.',7.00,'images_the_district/plat/plat_hors_categorie/salade_cesar.png',13,'Yes'),(14,'Pizza Margherita','Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...',15.40,'images_the_district/plat/plat_hors_categorie/pizza.png',4,'Yes'),(15,'Courgettes farcies au quinoa et duxelles de champignons','Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!',8.00,'images_the_district/plat/plat_hors_categorie/courgette_farcies.png',14,'Yes'),(16,'Lasagnes','Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.',12.00,'images_the_district/plat/plat_hors_categorie/lasagnes.png',10,'Yes'),(17,'Tagliatelles au saumon','Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!  ',12.00,'images_the_district/plat/plat_hors_categorie/tagliatelles_saumon.png',10,'Yes');
/*!40000 ALTER TABLE `plat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-03 14:35:58
