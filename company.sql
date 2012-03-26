-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2012 at 06:09 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `person_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`person_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`person_id`, `username`, `password`) VALUES
(1, 'warex03', 'nok');

-- --------------------------------------------------------

--
-- Table structure for table `category_item`
--

CREATE TABLE IF NOT EXISTS `category_item` (
  `category_id` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category_item`
--

INSERT INTO `category_item` (`category_id`, `category`) VALUES
(1, 'Electric Fan'),
(3, 'Others'),
(2, 'Washing Machine');

-- --------------------------------------------------------

--
-- Table structure for table `category_service`
--

CREATE TABLE IF NOT EXISTS `category_service` (
  `category_id` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category` (`category`),
  UNIQUE KEY `category_2` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category_service`
--

INSERT INTO `category_service` (`category_id`, `category`) VALUES
(1, 'Aircon'),
(5, 'Electric Fan'),
(3, 'Others'),
(2, 'Refrigerator'),
(4, 'Washing Machine');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `person_id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  UNIQUE KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`person_id`, `username`, `password`) VALUES
(13, 'nrmorales', 'abc123'),
(14, 'warex', 'yeye');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(8) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `name`, `info`, `price`, `stock`) VALUES
(1, 2, 'Blade (Washing Machine)', '  ', '120.00', 23),
(2, 1, 'Baguiofan blade', '  ', '450.00', 0),
(3, 1, 'Blade(Electric fan)', '  ', '123.00', 0),
(4, 1, 'Electric Fan bushing', '', '120.00', 0),
(5, 1, 'Electric Fan gearbox', '', '440.00', 0),
(6, 1, 'Electric Fan metal spring', '', '450.00', 0),
(7, 1, 'Electric Fan motor', '', '200.00', 0),
(8, 1, 'Electric Fan neck', '', '50.00', 0),
(9, 1, 'Electric Fan shafting', '', '350.00', 0),
(10, 1, 'Electric Fan cap', '', '250.00', 0),
(11, 2, 'Fan motor(Washing machine)', '', '220.00', 0),
(12, 3, 'Motor Oil', '  ', '45.00', 0),
(13, 2, 'Washing machine belt', '', '120.00', 0),
(14, 2, 'Timer(Washing machine)', '', '350.00', 0),
(15, 2, 'Washing machine drain motor', '  ', '100.00', 0),
(16, 2, 'Washing machine gear case', '  ', '120.00', 0),
(17, 2, 'Washing machine hose', '', '100.00', 0),
(18, 2, 'Washing machine pulsator', '  ', '100.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` char(15) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `address`, `email`, `mobile_no`) VALUES
(1, 'Arvin Dino', 'Quezon City', 'warex03@gmail.com', '09094805114'),
(12, 'mike ross', 'S3Lab', 'mikeross@gmail.com', '09544566667676'),
(13, 'Noelyn Morales', 'Fairview', 'noelyn34@gmail.com', '09178231231'),
(14, 'arvin', 'dino', 'warex@yeye.com', '09159744093'),
(15, 'ore tachi wa', 'koko made kitaze', 'warex@yehey.com', '09876676767676'),
(16, 'charles palima', 'dito', 'charles@yeye.com', '123456789876543'),
(17, 'arvin dino', 'S3', 'warex@yehey.com', '12345678900');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `category_id`, `name`, `info`, `price`) VALUES
(1, 1, 'Aircon(split type) Cleaning', '            ', '1000.00'),
(2, 1, 'Aircon Cleaning/Maintenance', '    ', '1000.00'),
(3, 1, 'Aircon Frion Charging', '', '1800.00'),
(4, 1, 'Aircon installation', '                            ', '350.00'),
(5, 1, 'Aircon Repair', '                              ', '1000.00'),
(6, 3, 'Appliance Checkup', '', '0.00'),
(7, 3, 'Compressor Repair', '', '200.00'),
(8, 3, 'Dispenser Repair', '', '1200.00'),
(9, 5, 'Electric Fan Repair', '', '100.00'),
(10, 3, 'Motor Rewinding', '', '800.00'),
(11, 2, 'Refrigerator Repainting', '', '1800.00'),
(12, 4, 'Refrigerator Repair', '  ', '2000.00'),
(13, 3, 'Television Repair', '', '800.00'),
(14, 4, 'Washing Machine Repair', '', '350.00'),
(15, 4, 'Washing Machine Cleaning', '  ', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Completed'),
(2, 'On-going'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `temp_item`
--

CREATE TABLE IF NOT EXISTS `temp_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_service`
--

CREATE TABLE IF NOT EXISTS `temp_service` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_service`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `person_id` int(255) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `date`, `person_id`) VALUES
(26, '2012-03-22', 12),
(27, '2012-03-22', 13),
(28, '2012-02-22', 13),
(29, '2012-04-23', 14),
(30, '2012-03-24', 14),
(31, '2012-03-25', 15),
(32, '2012-03-25', 16),
(33, '2012-03-26', 17);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE IF NOT EXISTS `transaction_items` (
  `transaction_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  KEY `transaction_id` (`transaction_id`,`item_id`),
  KEY `transaction_id_2` (`transaction_id`),
  KEY `item_id` (`item_id`),
  KEY `transaction_id_3` (`transaction_id`),
  KEY `transaction_id_4` (`transaction_id`),
  KEY `transaction_id_5` (`transaction_id`),
  KEY `transaction_id_6` (`transaction_id`),
  KEY `transaction_id_7` (`transaction_id`),
  KEY `transaction_id_8` (`transaction_id`),
  KEY `transaction_id_9` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`transaction_id`, `item_id`, `quantity`) VALUES
(26, 2, 5),
(28, 1, 1),
(28, 3, 1),
(29, 1, 1),
(29, 2, 2),
(29, 3, 3),
(31, 2, 2),
(31, 7, 4),
(31, 8, 3),
(32, 2, 2),
(32, 7, 4),
(33, 1, 1),
(33, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_service`
--

CREATE TABLE IF NOT EXISTS `transaction_service` (
  `transaction_id` int(255) NOT NULL,
  `service_id` int(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_started` date NOT NULL,
  `date_completed` date NOT NULL,
  UNIQUE KEY `transaction_id` (`transaction_id`,`service_id`),
  KEY `service_id` (`service_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_service`
--

INSERT INTO `transaction_service` (`transaction_id`, `service_id`, `quantity`, `status_id`, `date_started`, `date_completed`) VALUES
(26, 1, 2, 1, '2012-03-22', '2012-03-22'),
(27, 1, 1, 1, '2012-03-22', '2012-03-22'),
(27, 2, 1, 1, '2012-03-22', '2012-03-22'),
(28, 3, 1, 1, '2012-03-22', '2012-03-22'),
(28, 5, 1, 1, '2012-03-22', '2012-03-22'),
(30, 1, 3, 3, '0000-00-00', '0000-00-00'),
(30, 2, 2, 3, '0000-00-00', '0000-00-00'),
(30, 3, 1, 3, '0000-00-00', '0000-00-00'),
(31, 1, 1, 3, '0000-00-00', '0000-00-00'),
(31, 7, 3, 3, '0000-00-00', '0000-00-00'),
(31, 8, 2, 3, '0000-00-00', '0000-00-00'),
(32, 1, 1, 1, '2012-03-25', '2012-03-25'),
(32, 2, 2, 3, '0000-00-00', '0000-00-00'),
(32, 3, 2, 3, '0000-00-00', '0000-00-00'),
(32, 7, 3, 3, '0000-00-00', '0000-00-00'),
(32, 8, 2, 3, '0000-00-00', '0000-00-00'),
(33, 1, 1, 3, '0000-00-00', '0000-00-00'),
(33, 2, 2, 3, '0000-00-00', '0000-00-00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_item` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_service` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_service`
--
ALTER TABLE `transaction_service`
  ADD CONSTRAINT `transaction_service_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_service_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
