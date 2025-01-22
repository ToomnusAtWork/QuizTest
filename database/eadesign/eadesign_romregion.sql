-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sgb_live_db_new
-- ------------------------------------------------------
-- Server version	10.6.16-MariaDB-0ubuntu0.22.04.1-log

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
-- Table structure for table `eadesign_romregion`
--

DROP TABLE IF EXISTS `eadesign_romregion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eadesign_romregion` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Entity ID',
  `region_id` text NOT NULL COMMENT 'Region id',
  `region` text NOT NULL COMMENT 'Region name',
  `region_en` text NOT NULL COMMENT 'Region name eng',
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Regions data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eadesign_romregion`
--

LOCK TABLES `eadesign_romregion` WRITE;
/*!40000 ALTER TABLE `eadesign_romregion` DISABLE KEYS */;
INSERT INTO `eadesign_romregion` VALUES (1,'613','กรุงเทพมหานคร','Bangkok'),(2,'614','สมุทรปราการ','Samut Prakan'),(3,'615','นนทบุรี','Nonthaburi'),(4,'616','ปทุมธานี','Pathum Thani'),(5,'617','พระนครศรีอยุธยา','Phra Nakhon Si Ayutthaya'),(6,'618','อ่างทอง','Ang Thong'),(7,'619','ลพบุรี','Loburi'),(8,'620','สิงห์บุรี','Sing Buri'),(9,'621','ชัยนาท','Chai Nat'),(10,'622','สระบุรี','Saraburi'),(11,'623','ชลบุรี','Chon Buri'),(12,'624','ระยอง','Rayong'),(13,'625','จันทบุรี','Chanthaburi'),(14,'626','ตราด','Trat'),(15,'627','ฉะเชิงเทรา','Chachoengsao'),(16,'628','ปราจีนบุรี','Prachin Buri'),(17,'629','นครนายก','Nakhon Nayok'),(18,'630','สระแก้ว','Sa Kaeo'),(19,'631','นครราชสีมา','Nakhon Ratchasima'),(20,'632','บุรีรัมย์','Buri Ram'),(21,'633','สุรินทร์','Surin'),(22,'634','ศรีสะเกษ','Si Sa Ket'),(23,'635','อุบลราชธานี','Ubon Ratchathani'),(24,'636','ยโสธร','Yasothon'),(25,'637','ชัยภูมิ','Chaiyaphum'),(26,'638','อำนาจเจริญ','Amnat Charoen'),(27,'639','หนองบัวลำภู','Nong Bua Lam Phu'),(28,'640','ขอนแก่น','Khon Kaen'),(29,'641','อุดรธานี','Udon Thani'),(30,'642','เลย','Loei'),(31,'643','หนองคาย','Nong Khai'),(32,'644','มหาสารคาม','Maha Sarakham'),(33,'645','ร้อยเอ็ด','Roi Et'),(34,'646','กาฬสินธุ์','Kalasin'),(35,'647','สกลนคร','Sakon Nakhon'),(36,'648','นครพนม','Nakhon Phanom'),(37,'649','มุกดาหาร','Mukdahan'),(38,'650','เชียงใหม่','Chiang Mai'),(39,'651','ลำพูน','Lamphun'),(40,'652','ลำปาง','Lampang'),(41,'653','อุตรดิตถ์','Uttaradit'),(42,'654','แพร่','Phrae'),(43,'655','น่าน','Nan'),(44,'656','พะเยา','Phayao'),(45,'657','เชียงราย','Chiang Rai'),(46,'658','แม่ฮ่องสอน','Mae Hong Son'),(47,'659','นครสวรรค์','Nakhon Sawan'),(48,'660','อุทัยธานี','Uthai Thani'),(49,'661','กำแพงเพชร','Kamphaeng Phet'),(50,'662','ตาก','Tak'),(51,'663','สุโขทัย','Sukhothai'),(52,'664','พิษณุโลก','Phitsanulok'),(53,'665','พิจิตร','Phichit'),(54,'666','เพชรบูรณ์','Phetchabun'),(55,'667','ราชบุรี','Ratchaburi'),(56,'668','กาญจนบุรี','Kanchanaburi'),(57,'669','สุพรรณบุรี','Suphan Buri'),(58,'670','นครปฐม','Nakhon Pathom'),(59,'671','สมุทรสาคร','Samut Sakhon'),(60,'672','สมุทรสงคราม','Samut Songkhram'),(61,'673','เพชรบุรี','Phetchaburi'),(62,'674','ประจวบคีรีขันธ์','Prachuap Khiri Khan'),(63,'675','นครศรีธรรมราช','Nakhon Si Thammarat'),(64,'676','กระบี่','Krabi'),(65,'677','พังงา','Phangnga'),(66,'678','ภูเก็ต','Phuket'),(67,'679','สุราษฎร์ธานี','Surat Thani'),(68,'680','ระนอง','Ranong'),(69,'681','ชุมพร','Chumphon'),(70,'682','สงขลา','Songkhla'),(71,'683','สตูล','Satun'),(72,'684','ตรัง','Trang'),(73,'685','พัทลุง','Phatthalung'),(74,'686','ปัตตานี','Pattani'),(75,'687','ยะลา','Yala'),(76,'688','นราธิวาส','Narathiwat'),(77,'689','บึงกาฬ','buogkan');
/*!40000 ALTER TABLE `eadesign_romregion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-11 13:29:01
