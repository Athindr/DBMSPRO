-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: DBMSPRO
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `branch_details`
--

DROP TABLE IF EXISTS `branch_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_details` (
  `bno` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`bno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_details`
--

LOCK TABLES `branch_details` WRITE;
/*!40000 ALTER TABLE `branch_details` DISABLE KEYS */;
INSERT INTO `branch_details` VALUES (1,'Indiranagar','9803028485'),(2,'Koramangla','9833592911'),(3,'Marathahalli','9405923000'),(4,'JP Nagar','8173949299'),(5,'BTM Layout','9650062311');
/*!40000 ALTER TABLE `branch_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_items`
--

DROP TABLE IF EXISTS `branch_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_items` (
  `bno` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`bno`,`Iid`),
  KEY `Iid` (`Iid`),
  CONSTRAINT `branch_items_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`),
  CONSTRAINT `branch_items_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_items`
--

LOCK TABLES `branch_items` WRITE;
/*!40000 ALTER TABLE `branch_items` DISABLE KEYS */;
INSERT INTO `branch_items` VALUES (1,2,100),(2,2,70),(4,3,150),(4,4,275),(5,1,120);
/*!40000 ALTER TABLE `branch_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_details` (
  `Iid` int(11) NOT NULL,
  `item_name` varchar(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`Iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_details`
--

LOCK TABLES `item_details` WRITE;
/*!40000 ALTER TABLE `item_details` DISABLE KEYS */;
INSERT INTO `item_details` VALUES (1,'Shampoo',180),(2,'Maggie',60.5),(3,'Biscuits',30.25),(4,'Chips',15.75),(5,'Soap',40.75);
/*!40000 ALTER TABLE `item_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `order_no` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_no`,`Iid`),
  KEY `Iid` (`Iid`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,2),(1,3,2),(1,5,1),(2,2,2),(2,4,1),(3,1,1),(3,5,5),(4,1,1),(4,2,1),(4,5,3),(5,1,6),(5,2,2),(6,3,1),(6,4,4),(7,1,1),(7,2,1),(7,5,1);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_no` int(11) NOT NULL,
  `bno` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_no`),
  KEY `bno` (`bno`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,1),(6,1),(4,2),(1,3),(5,3),(7,4),(3,5);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_branch`
--

DROP TABLE IF EXISTS `supplier_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_branch` (
  `sid` varchar(10) NOT NULL DEFAULT '',
  `bno` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`,`bno`,`Iid`),
  KEY `bno` (`bno`),
  KEY `Iid` (`Iid`),
  CONSTRAINT `supplier_branch_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`),
  CONSTRAINT `supplier_branch_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_branch`
--

LOCK TABLES `supplier_branch` WRITE;
/*!40000 ALTER TABLE `supplier_branch` DISABLE KEYS */;
INSERT INTO `supplier_branch` VALUES ('S1',1,2),('S1',2,2),('S2',4,3),('S3',4,4),('S4',5,1);
/*!40000 ALTER TABLE `supplier_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_stock`
--

DROP TABLE IF EXISTS `supplier_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_stock` (
  `sid` varchar(10) NOT NULL DEFAULT '',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`,`Iid`),
  KEY `Iid` (`Iid`),
  CONSTRAINT `supplier_stock_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `suppliers` (`sid`),
  CONSTRAINT `supplier_stock_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_stock`
--

LOCK TABLES `supplier_stock` WRITE;
/*!40000 ALTER TABLE `supplier_stock` DISABLE KEYS */;
INSERT INTO `supplier_stock` VALUES ('S1',2,100),('S2',2,150),('S2',3,300),('S2',4,100),('S3',2,1000),('S4',1,500),('S5',1,600),('S5',5,1000);
/*!40000 ALTER TABLE `supplier_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `sid` varchar(10) NOT NULL,
  `sname` varchar(10) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES ('S1','Smith','JP Nagar','9923854529'),('S2','Ankit','Indiranagar','9827100394'),('S3','Sandeep','Marathahalli','8240244928'),('S4','Amit','Koramangla','9205829244'),('S5','Aisha','BTM Layout','9584882846');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-17 22:41:05
