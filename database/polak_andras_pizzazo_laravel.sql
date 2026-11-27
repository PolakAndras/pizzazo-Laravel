-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: polak_andras_pizzazo_laravel
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Current Database: `polak_andras_pizzazo_laravel`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `polak_andras_pizzazo_laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `polak_andras_pizzazo_laravel`;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Pizzák','2026-11-27 16:13:06','2026-11-27 16:13:06'),(2,'Gyrosok','2026-11-27 16:13:06','2026-11-27 16:13:06'),(3,'Hot-Dog','2026-11-27 16:13:06','2026-11-27 16:13:06'),(4,'Saláta','2026-11-27 16:13:06','2026-11-27 16:13:06'),(5,'Hamburger','2026-11-27 16:13:06','2026-11-27 16:13:06'),(6,'Üdítő','2026-11-27 16:13:06','2026-11-27 16:13:06'),(7,'Jégkrém','2026-11-27 16:13:06','2026-11-27 16:13:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2026_08_07_084319_create_categories_table',1),(6,'2026_08_07_084353_create_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Margherita pizza',2000,'Paradicsomszósz, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kukorica\":250,\"gomba\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(2,1,'Prosciutto pizza',2300,'Paradicsomszósz, sonka, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kukorica\":250,\"gomba\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(3,1,'Cardinale pizza',2400,'Paradicsomszósz, sonka, kukorica, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"gomba\":250,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(4,1,'Songoku pizza',2500,'Paradicsomszósz, sonka, gomba, kukorica, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"olajbogyo\":250,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(5,1,'Szalámis pizza',2400,'Paradicsomszósz, szalámi, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"eros paprika\":200,\"hagyma\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(6,1,'Magyaros pizza',2600,'Paradicsomszósz, kolbász, bacon, lila hagyma, erős paprika, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"tojas\":250,\"fokhagyma\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(7,1,'Négysajtos pizza',2500,'Paradicsomszósz, mozzarella, trappista, füstölt sajt, márványsajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"diotoret\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(8,1,'Hawaii pizza',2400,'Paradicsomszósz, sonka, ananász, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kukorica\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(9,1,'Bolognai pizza',2600,'Bolognai ragu, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"gomba\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(10,1,'Húsimádó pizza',2700,'Paradicsomszósz, sonka, szalámi, kolbász, bacon, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"eros paprika\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(11,1,'Gombás pizza',2200,'Paradicsomszósz, gomba, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kukorica\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(12,1,'Kukoricás pizza',2200,'Paradicsomszósz, kukorica, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"sonka\":350}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(13,1,'Vegetáriánus pizza',2400,'Paradicsomszósz, gomba, kukorica, borsó, paradicsomkarika, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"olajbogyo\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(14,1,'Tüzes pizza',2500,'Paradicsomszósz, csípős szalámi, lila hagyma, jalapeno, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kolbasz\":350}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(15,1,'Piedone pizza',2600,'Paradicsomszósz, bacon, bab, hagyma, kolbász, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"eros paprika\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(16,1,'BBQ Csirke pizza',2600,'BBQ alap, csirkemellcsíkok, kukorica, lila hagyma, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(17,1,'Görög csirkés pizza',2600,'Fokhagymás-tejfölös alap, csirkehús, lila hagyma, feta, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"olajbogyo\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(18,1,'Mexikói pizza',2500,'Chilis alap, darált hús, bab, kukorica, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"jalapeno\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(19,1,'Tonhalas pizza',2600,'Paradicsomszósz, tonhal, lila hagyma, olajbogyó, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"citrom\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(20,1,'Tarjás pizza',2500,'Paradicsomszósz, füstölt tarja, lila hagyma, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"fott tojas\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(21,1,'Sajtkrémes pizza',2400,'Sajtkrémes alap, sonka, kukorica, mozzarella',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(22,1,'Juhtúrós pizza',2600,'Tejfölös alap, juhtúró, szalonna, lila hagyma, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kolbasz\":350}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(23,1,'Bianco pizza',2300,'Fokhagymás-tejfölös alap, sonka, mozzarella sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"kukorica\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(24,1,'Provance pizza',2500,'Paradicsomszósz, sonka, bacon, gomba, tojás, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"hagyma\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(25,1,'Fitness pizza',2500,'Paradicsomszósz, csirkemell, brokkoli, kukorica, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"paradicsom\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(26,1,'Calzone (Töltött) pizza',2500,'Paradicsomszósz, sonka, gomba, kukorica, sajt (összehajtva)',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(27,1,'Falusi pizza',2600,'Paradicsomszósz, tarja, kolbász, lila hagyma, hegyes erős, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"tojas\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(28,1,'Spinaci pizza',2400,'Fokhagymás-tejfölös alap, spenót, feta, mozzarella',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"csirkemell\":400}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(29,1,'Caprese pizza',2400,'Paradicsomszósz, friss paradicsom, bivalymozaarella, bazsalikom',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"olajbogyo\":250,\"rukkola\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(30,1,'Séf kedvence pizza',2700,'Tejfölös-mustáros alap, tarja, bacon, hagyma, gomba, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"jalapeno\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(31,1,'Maffiózó pizza',2600,'Chilis alap, szalámi, bacon, fokhagyma, lila hagyma, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"bab\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(32,1,'Kívánság pizza',2800,'Alapszósz + 4 szabadon választott feltét, sajt',NULL,'{\"sizes\":{\"kicsi\":-400,\"normal\":0,\"csaladi\":1500,\"party\":2800},\"extras\":{\"extra sajt\":400,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(33,2,'Gyros Pitában',1500,'Gyros hús, saláta, paradicsom, lila hagyma, öntet, pita',NULL,'{\"extras\":{\"extra hus\":600,\"feta sajt\":350,\"extra ontet\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(34,2,'Gyros Tál hasábburgonyával',2400,'Gyros hús, saláta, hasábburgonya, öntet',NULL,'{\"extras\":{\"extra hus\":600,\"feta sajt\":350,\"extra ontet\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(35,2,'Gyros Tál rizzsel',2400,'Gyros hús, saláta, rizs, öntet',NULL,'{\"extras\":{\"extra hus\":600,\"feta sajt\":350,\"extra ontet\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(36,2,'Gyros Tál vegyes körettel',2500,'Gyros hús, saláta, rizs, hasábburgonya, öntet',NULL,'{\"extras\":{\"extra hus\":600,\"feta sajt\":350,\"extra ontet\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(37,2,'Sajttal sütött Gyros Tál',2700,'Gyros hús, köret, öntet, sajttal összesütve',NULL,'{\"extras\":{\"extra hus\":600,\"extra sajt\":400}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(38,2,'Csípős Gyros Pitában',1500,'Csípős gyros hús, saláta, csípős öntet, pita',NULL,'{\"extras\":{\"extra hus\":600,\"jalapeno\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(39,2,'Gyros Box',1700,'Gyros hús, hasábburgonya, öntet pohárban',NULL,'{\"extras\":{\"extra hus\":400,\"extra ontet\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(40,2,'Vegetáriánus Gyros Pitában',1300,'Feta sajt, saláta, paradicsom, lila hagyma, öntet',NULL,'{\"extras\":{\"extra sajt\":350,\"olajbogyo\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(41,3,'Klasszikus Hot-Dog',800,'Kifli, virsli, ketchup, mustár, majonéz',NULL,'{\"extras\":{\"extra virsli\":300,\"sajt\":250,\"piritott hagyma\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(42,3,'Sajtos Hot-Dog',950,'Kifli, virsli, szószok, reszelt sajt',NULL,'{\"extras\":{\"extra virsli\":300,\"piritott hagyma\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(43,3,'Francia Hot-Dog',900,'Lyukasztott kifli, virsli, francia szósz',NULL,'{\"extras\":{\"extra virsli\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(44,3,'Chilis Hot-Dog',1050,'Kifli, virsli, chilis ragu, jalapeno',NULL,'{\"extras\":{\"extra virsli\":300,\"sajt\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(45,4,'Görög saláta',1600,'Paradicsom, uborka, lila hagyma, olajbogyó, feta sajt',NULL,'{\"extras\":{\"extra feta\":350,\"piritott kruton\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(46,4,'Cézár saláta csirkével',1900,'Jégsaláta, csirkemellcsíkok, cézár öntet, kruton, parmezán',NULL,'{\"extras\":{\"extra csirke\":500,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(47,4,'Tonhalsaláta',1800,'Friss salátaágy, tonhal, lila hagyma, citrom, tojás',NULL,'{\"extras\":{\"olajbogyo\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(48,4,'Fitnesz saláta',1700,'Zöldsaláta mix, uborka, paradicsom, grill csirke, joghurtos öntet',NULL,'{\"extras\":{\"magvak\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(49,4,'Kerti saláta',1300,'Szezonális friss zöldségek, olívaolaj',NULL,'{\"extras\":{\"feta sajt\":350}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(50,4,'Amerikai káposztasaláta',900,'Gyalult káposzta, répa, majonézes-tejfölös szósz',NULL,'{\"extras\":{\"extra ontet\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(51,5,'Sima Burger',1500,'Húspogácsa, saláta, paradicsom, burgerszósz',NULL,'{\"extras\":{\"extra hus\":600,\"bacon\":300,\"sajt\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(52,5,'Sajtos Burger',1700,'Húspogácsa, cheddar sajt, saláta, csemegeuborka, szósz',NULL,'{\"extras\":{\"extra hus\":600,\"bacon\":300,\"extra sajt\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(53,5,'Dupla Sajtburger',2300,'Két húspogácsa, dupla cheddar, saláta, szósz',NULL,'{\"extras\":{\"bacon\":300,\"jalapeno\":200,\"extra szosz\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(54,5,'Bacon Burger',1900,'Húspogácsa, ropogós bacon, saláta, paradicsom, szósz',NULL,'{\"extras\":{\"extra hus\":600,\"sajt\":250,\"tukortojas\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(55,5,'Retro Burger',1600,'Húspogácsa, csalamádé, mustár, ketchup, lila hagyma',NULL,'{\"extras\":{\"extra hus\":600,\"tojas\":250,\"reszelt sajt\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(56,5,'BBQ Burger',1850,'Húspogácsa, BBQ szósz, pirított hagyma, bacon, sajt',NULL,'{\"extras\":{\"extra hus\":600,\"hagymakarika\":200}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(57,5,'Chili Burger',1800,'Húspogácsa, csípős szósz, jalapeno, saláta',NULL,'{\"extras\":{\"extra hus\":600,\"sajt\":250,\"extra chili\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(58,5,'Csirke Burger',1700,'Rántott csirkemellfilé, saláta, majonéz',NULL,'{\"extras\":{\"sajt\":250,\"bacon\":300,\"csemegeuborka\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(59,5,'Vega Burger',1600,'Grillezett camembert sajt, áfonyalekvár, rukkola',NULL,'{\"extras\":{\"dio\":200,\"extra sajt\":250}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(60,5,'Gombás Burger',1800,'Húspogácsa, pirított gomba, füstölt sajt, majonéz',NULL,'{\"extras\":{\"extra hus\":600,\"bacon\":300}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(61,5,'Tojásos Burger',1850,'Húspogácsa, tükörtojás, bacon, saláta, szósz',NULL,'{\"extras\":{\"sajt\":250,\"extra hagyma\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(62,5,'Monster Burger',2800,'Három húspogácsa, tripla bacon, tripla cheddar, hagymakarika',NULL,'{\"extras\":{\"jalapeno\":200,\"extra szosz\":150}}','2026-11-27 16:13:06','2026-11-27 16:13:06'),(63,6,'Coca-Cola 0.5l',600,'Eredeti íz',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(64,6,'Coca-Cola Zero 0.5l',600,'Cukormentes verzió',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(65,6,'Fanta Narancs 0.5l',600,'Gyümölcsös narancsíz',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(66,6,'Sprite 0.5l',600,'Citrom-lime íz',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(67,6,'Kinley Tonic 0.5l',600,'Frissítő kesernyés íz',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(68,6,'Naturaqua Szénsavas 0.5l',450,'Természetes ásványvíz',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(69,7,'Magnum Mandula',900,'Vanília jégkrém tejcsokoládéval és manduladarabokkal',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(70,7,'Magnum Classic',900,'Vanília jégkrém roppanós tejcsokoládéval',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(71,7,'Magnum Fehér Csoki',900,'Vanília jégkrém fehér csokoládé bevonattal',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(72,7,'Cornetto Csokoládé',750,'Csokis tölcséres jégkrém csokiöntettel',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(73,7,'Cornetto Eper',750,'Epres-vaníliás tölcséres jégkrém',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(74,7,'Ben & Jerry’s Cookie Dough 465ml',2600,'Vanília jégkrém süteménydarabkákkal',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(75,7,'Ben & Jerry’s Chocolate Fudge 465ml',2600,'Csokoládé jégkrém szaftos brownie darabokkal',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06'),(76,7,'Calippo Citrom',500,'Frissítő citromos vizes jégkrém',NULL,NULL,'2026-11-27 16:13:06','2026-11-27 16:13:06');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `houseNumber` varchar(255) NOT NULL,
  `floor_door` varchar(255) DEFAULT NULL,
  `doorbell` varchar(255) DEFAULT NULL,
  `elseData` varchar(255) DEFAULT NULL,
  `accepted_terms` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Proba1','proba1@gmail.com',NULL,'$2y$10$XxV8TujQifKk7eBmgM.L6ewgISHVVj8kXJ.pX.wmMjluzXNjsRI4i','+36301111111','4400','Nyíregyháza','Bocskai út','10','10101','010101','010101',1,NULL,'2026-11-27 16:13:07','2026-11-27 16:13:07');
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

-- Dump completed
