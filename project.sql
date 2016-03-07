-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2016 at 04:35 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `justdel`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_auth`
--

CREATE TABLE IF NOT EXISTS `branch_auth` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_auth`
--

INSERT INTO `branch_auth` (`user`, `pass`) VALUES
('Athindr', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `branch_details`
--

CREATE TABLE IF NOT EXISTS `branch_details` (
  `bno` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_details`
--

INSERT INTO `branch_details` (`bno`, `location`, `contact`) VALUES
(1, 'Indiranagar', '9803028485'),
(2, 'Koramangla', '9833592911'),
(3, 'Marathahalli', '9405923000'),
(4, 'JP Nagar', '8173949299'),
(5, 'BTM Layout', '9650062311'),
(7, 'HSR Layout', '9108256432'),
(8, 'Koromangala', '9234032251'),
(9, 'Hosur', '8978675330');

-- --------------------------------------------------------

--
-- Table structure for table `branch_items`
--

CREATE TABLE IF NOT EXISTS `branch_items` (
  `bno` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_items`
--

INSERT INTO `branch_items` (`bno`, `Iid`, `quantity`) VALUES
(1, 2, 387),
(2, 2, 86),
(4, 3, 193),
(4, 4, 275),
(5, 1, 232);

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE IF NOT EXISTS `item_details` (
  `Iid` int(11) NOT NULL,
  `item_name` varchar(10) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`Iid`, `item_name`, `price`) VALUES
(1, 'Shampoo', 180),
(2, 'Maggie', 60.5),
(3, 'Biscuits', 30.25),
(4, 'Chips', 15.75),
(5, 'Soap', 40.75);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_no` int(11) NOT NULL,
  `bno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `bno`) VALUES
(2, 1),
(6, 1),
(8, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(47, 1),
(48, 1),
(49, 1),
(52, 1),
(53, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(90, 1),
(91, 1),
(4, 2),
(13, 2),
(1, 3),
(5, 3),
(7, 4),
(10, 4),
(50, 4),
(51, 4),
(54, 4),
(55, 4),
(66, 4),
(67, 4),
(68, 4),
(69, 4),
(70, 4),
(77, 4),
(78, 4),
(87, 4),
(88, 4),
(89, 4),
(3, 5),
(9, 5),
(46, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_no` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_no`, `Iid`, `quantity`) VALUES
(1, 1, 2),
(1, 3, 2),
(1, 5, 1),
(2, 2, 2),
(2, 4, 1),
(3, 1, 1),
(3, 5, 5),
(4, 1, 1),
(4, 2, 1),
(4, 5, 3),
(5, 1, 6),
(5, 2, 2),
(6, 3, 1),
(6, 4, 4),
(7, 1, 1),
(7, 2, 1),
(7, 5, 1),
(8, 2, 10),
(9, 1, 110),
(10, 3, 20),
(11, 2, 30),
(12, 2, 10),
(13, 2, 16),
(14, 2, 4),
(15, 2, 1),
(16, 2, 2),
(17, 2, 4),
(18, 2, 1),
(19, 2, 1),
(20, 2, 1),
(21, 2, 2),
(22, 2, 2),
(23, 2, 3),
(24, 2, 1),
(25, 2, 1),
(26, 2, 1),
(27, 2, 1),
(28, 2, 1),
(29, 2, 2),
(30, 2, 2),
(31, 2, 1),
(32, 2, 4),
(33, 2, 4),
(34, 2, 2),
(35, 2, 2),
(36, 2, 3),
(37, 2, 1),
(38, 2, 10),
(39, 2, 2),
(40, 2, 2),
(41, 2, 2),
(42, 2, 2),
(43, 2, 1),
(44, 2, 3),
(45, 2, 2),
(46, 1, 2),
(47, 2, 4),
(48, 2, 3),
(49, 2, 100),
(50, 2, 12),
(51, 3, 11),
(52, 2, 2),
(53, 2, 3),
(54, 2, 1),
(55, 3, 2),
(56, 2, 2),
(57, 2, 2),
(58, 2, 2),
(59, 2, 2),
(60, 2, 1),
(61, 2, 2),
(62, 2, 2),
(63, 2, 2),
(64, 2, 2),
(65, 2, 1),
(66, 2, 6),
(67, 2, 5),
(68, 3, 6),
(69, 2, 1),
(70, 3, 2),
(71, 2, 4),
(72, 2, 2),
(73, 2, 2),
(74, 2, 1),
(75, 2, 1),
(76, 2, 1),
(77, 2, 2),
(78, 3, 2),
(79, 2, 2),
(80, 2, 2),
(81, 2, 2),
(82, 2, 3),
(83, 2, 1),
(84, 2, 3),
(85, 2, 2),
(86, 1, 15),
(87, 2, 100),
(88, 5, 2),
(89, 1, 2),
(90, 2, 2),
(91, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `sid` varchar(10) NOT NULL,
  `sname` varchar(10) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sid`, `sname`, `location`, `contact`) VALUES
('S1', 'Smith', 'JP Nagar', '9923854529'),
('S2', 'Ankit', 'Indiranagar', '9827100394'),
('S3', 'Sandeep', 'Marathahalli', '8240244928'),
('S4', 'Amit', 'Koramangla', '9205829244'),
('S5', 'Aisha', 'BTM Layout', '9584882846');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_auth`
--

CREATE TABLE IF NOT EXISTS `supplier_auth` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_auth`
--

INSERT INTO `supplier_auth` (`user`, `pass`) VALUES
('ankith', 'ankith');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_branch`
--

CREATE TABLE IF NOT EXISTS `supplier_branch` (
  `sid` varchar(10) NOT NULL DEFAULT '',
  `bno` int(11) NOT NULL DEFAULT '0',
  `Iid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_branch`
--

INSERT INTO `supplier_branch` (`sid`, `bno`, `Iid`) VALUES
('S1', 1, 2),
('S5', 1, 1),
('S1', 2, 2),
('S2', 4, 2),
('S2', 4, 3),
('S3', 4, 4),
('S4', 4, 1),
('S5', 4, 5),
('S4', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_sid_auth`
--

CREATE TABLE IF NOT EXISTS `supplier_sid_auth` (
  `sid` varchar(10) NOT NULL,
  `user` char(20) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_sid_auth`
--

INSERT INTO `supplier_sid_auth` (`sid`, `user`, `pass`) VALUES
('S1', 'sindhura', 'pass'),
('S2', 'Aqsa', 'password'),
('S3', 'Ankith', 'pass'),
('S4', 'Athindr', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_stock`
--

CREATE TABLE IF NOT EXISTS `supplier_stock` (
  `sid` varchar(10) NOT NULL DEFAULT '',
  `Iid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_stock`
--

INSERT INTO `supplier_stock` (`sid`, `Iid`, `quantity`) VALUES
('S1', 2, 791),
('S2', 2, 873),
('S2', 3, 977),
('S2', 4, 1000),
('S3', 2, 1000),
('S4', 1, 996),
('S5', 1, 985),
('S5', 5, 998);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_auth`
--
ALTER TABLE `branch_auth`
 ADD PRIMARY KEY (`user`);

--
-- Indexes for table `branch_details`
--
ALTER TABLE `branch_details`
 ADD PRIMARY KEY (`bno`);

--
-- Indexes for table `branch_items`
--
ALTER TABLE `branch_items`
 ADD PRIMARY KEY (`bno`,`Iid`), ADD KEY `Iid` (`Iid`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
 ADD PRIMARY KEY (`Iid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_no`), ADD KEY `bno` (`bno`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`order_no`,`Iid`), ADD KEY `Iid` (`Iid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `supplier_auth`
--
ALTER TABLE `supplier_auth`
 ADD PRIMARY KEY (`user`);

--
-- Indexes for table `supplier_branch`
--
ALTER TABLE `supplier_branch`
 ADD PRIMARY KEY (`sid`,`bno`,`Iid`), ADD KEY `bno` (`bno`), ADD KEY `Iid` (`Iid`);

--
-- Indexes for table `supplier_sid_auth`
--
ALTER TABLE `supplier_sid_auth`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `supplier_stock`
--
ALTER TABLE `supplier_stock`
 ADD PRIMARY KEY (`sid`,`Iid`), ADD KEY `Iid` (`Iid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch_items`
--
ALTER TABLE `branch_items`
ADD CONSTRAINT `branch_items_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`),
ADD CONSTRAINT `branch_items_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`),
ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`);

--
-- Constraints for table `supplier_branch`
--
ALTER TABLE `supplier_branch`
ADD CONSTRAINT `supplier_branch_ibfk_1` FOREIGN KEY (`bno`) REFERENCES `branch_details` (`bno`),
ADD CONSTRAINT `supplier_branch_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`);

--
-- Constraints for table `supplier_sid_auth`
--
ALTER TABLE `supplier_sid_auth`
ADD CONSTRAINT `supplier_sid_auth_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `suppliers` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_stock`
--
ALTER TABLE `supplier_stock`
ADD CONSTRAINT `supplier_stock_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `suppliers` (`sid`),
ADD CONSTRAINT `supplier_stock_ibfk_2` FOREIGN KEY (`Iid`) REFERENCES `item_details` (`Iid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
