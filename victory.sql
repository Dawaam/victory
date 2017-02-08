-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 03:55 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','manager','sales') NOT NULL,
  `address` text,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `outlet_id` int(11) NOT NULL,
  `sales_point` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `code`, `name`, `username`, `password`, `role`, `address`, `email`, `phone`, `photo`, `outlet_id`, `sales_point`) VALUES
(1, NULL, 'admin', 'admin', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'admin', NULL, 'admin@k-signature.xyz', '081316878995', '', 0, 0),
(2, NULL, 'Vano', 'kemenangan', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', 'uploads/photo/sales/jos//sales-Jos.jpg', 1, 0),
(3, NULL, 'Felita', 'asia', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', '', 2, 0),
(7, NULL, 'Reyner', 'gethassee', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', NULL, 4, 0),
(8, 'JOS', 'Josua Reynaldo', 'jos', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'sales', 'GGL', '', '08132148129', 'uploads/photo/sales/jos//sales-Jos.jpg', 4, 0),
(9, 'JOH', 'John Doe', 'john', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'sales', '', '', '08123910232', 'uploads/photo/sales/john//sales-Joh.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `amount_limit`
--

CREATE TABLE `amount_limit` (
  `id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `amount_id` int(11) NOT NULL,
  `amount_limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount_limit`
--

INSERT INTO `amount_limit` (`id`, `outlet_id`, `amount_id`, `amount_limit`) VALUES
(1, 1, 1, 75),
(2, 1, 2, 80),
(3, 2, 1, 78),
(4, 2, 2, 85),
(5, 1, 4, 45),
(6, 2, 4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` char(1) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `type_id`) VALUES
(1, 'Cincin', 'C', 1),
(2, 'Kalung', 'K', 2),
(3, 'Kalung MK', 'K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`, `count`) VALUES
(1, 'KMK1', 6),
(2, 'KMC1', 4),
(3, 'KMK2', 6),
(4, 'KMMUT', 6),
(5, 'ASC1', 2),
(6, 'ASMUT', 5),
(7, 'MKM', 4),
(11, 'KMJU', 8),
(12, 'C1', 1),
(13, 'K1', 1),
(14, 'HAK1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `primary_color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `primary_color`) VALUES
(1, '#2e2e2e');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `value`, `last_update`) VALUES
(1, 'US Dollar', 13300, '2016-12-23 16:05:03'),
(2, 'Emas Cukim', 533500, '2016-12-23 11:25:33'),
(5, 'Euro', 15000, '2016-12-23 11:27:40'),
(6, 'Pounds', 17000, '2016-12-23 11:27:53'),
(7, 'MYR', 3300, '2016-12-23 11:28:03'),
(8, 'SGD', 9300, '2016-12-23 11:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `currency_history`
--

CREATE TABLE `currency_history` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_history`
--

INSERT INTO `currency_history` (`id`, `currency_id`, `value`, `date`) VALUES
(1, 1, 13000, '2016-11-29 02:36:03'),
(2, 2, 533500, '2016-12-23 11:25:33'),
(3, 4, 300, '2016-12-23 11:27:17'),
(4, 5, 15000, '2016-12-23 11:27:40'),
(5, 6, 17000, '2016-12-23 11:27:53'),
(6, 7, 3300, '2016-12-23 11:28:03'),
(7, 8, 9300, '2016-12-23 11:28:10'),
(8, 9, 2200, '2016-12-23 11:28:42'),
(9, 10, 400, '2016-12-23 11:28:51'),
(10, 1, 13300, '2016-12-23 16:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `type` enum('Member','Regular') NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `member_point` int(11) DEFAULT '0',
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `phone`, `email`, `address`, `type`, `outlet_id`, `member_point`, `birthday`) VALUES
(3, 'MKM0000001', 'Setyawan', '081316361519', 'setyawansusanto99@outlook.com', 'Apartemen Puri ParkView\r\n', 'Regular', 1, 0, '0000-00-00'),
(4, 'MKM0000002', 'Felita', '081316361514', 'felita_31895@gmail.com', 'Gading Kirana', 'Member', 2, 0, '0000-00-00'),
(5, 'MKM0000003', 'Sally', '08127312', '', '', 'Member', 1, 8, '0000-00-00'),
(6, 'MKM0000004', 'Gabriella', '019830123', '', 'Gandaria', 'Regular', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `diamond_type`
--

CREATE TABLE `diamond_type` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diamond_type`
--

INSERT INTO `diamond_type` (`id`, `code`, `name`) VALUES
(1, 'Rd', 'Round Diamond'),
(2, 'Sd', 'Square Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `gold_amount`
--

CREATE TABLE `gold_amount` (
  `id` int(11) NOT NULL,
  `type` enum('K','P') NOT NULL,
  `original` double NOT NULL,
  `marked_up` double NOT NULL,
  `amount_limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gold_amount`
--

INSERT INTO `gold_amount` (`id`, `type`, `original`, `marked_up`, `amount_limit`) VALUES
(1, 'K', 70, 80, 75),
(2, 'P', 75, 90, 85),
(4, 'K', 420, 55, 50);

-- --------------------------------------------------------

--
-- Table structure for table `member_point`
--

CREATE TABLE `member_point` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `target` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_point`
--

INSERT INTO `member_point` (`id`, `name`, `target`, `point`, `active`) VALUES
(1, 'Normal', 550000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutation`
--

CREATE TABLE `mutation` (
  `id` int(11) NOT NULL,
  `mutation_code` varchar(200) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `from_outlet` int(11) NOT NULL,
  `to_outlet` int(11) NOT NULL,
  `status` enum('Pending','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutation`
--

INSERT INTO `mutation` (`id`, `mutation_code`, `product_qty`, `date`, `from_outlet`, `to_outlet`, `status`) VALUES
(2, 'KMMUT00001', 2, '2016-12-14 11:12:25', 1, 2, 'Diterima'),
(4, 'KMMUT00003', 1, '2016-12-14 11:23:05', 1, 4, 'Pending'),
(7, 'ASMUT00002', 1, '2016-12-15 08:39:38', 2, 1, 'Diterima'),
(9, 'KMMUT00005', 1, '2016-12-15 08:45:36', 1, 2, 'Diterima'),
(10, 'ASMUT00004', 2, '2016-12-15 17:34:12', 2, 1, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `mutation_product`
--

CREATE TABLE `mutation_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `mutation_code` varchar(200) NOT NULL,
  `status` enum('OK','Rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutation_product`
--

INSERT INTO `mutation_product` (`id`, `product_code`, `mutation_code`, `status`) VALUES
(1, 'KMK100001', 'KMMUT00001', 'OK'),
(2, 'KMC100001', 'KMMUT00001', 'OK'),
(3, 'KMK100002', 'KMMUT00001', 'OK'),
(4, 'KMC100002', 'KMMUT00003', 'OK'),
(7, 'ASC100001', 'ASMUT00002', 'OK'),
(9, 'KMK200001', 'KMMUT00005', 'OK'),
(10, 'KMK100001', 'ASMUT00004', 'OK'),
(11, 'KMK100002', 'ASMUT00004', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` text,
  `store_manager` varchar(200) NOT NULL,
  `margin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `code`, `name`, `phone`, `address`, `store_manager`, `margin`) VALUES
(1, 'KM', 'Kemenangan', '081316283912', 'Cijantung', 'Vano', 20),
(2, 'AS', 'Toko Asia', '081316283912', 'Cijantung', 'Felita', 30),
(4, 'HA', 'Hassee', '081316283912', 'Gading', 'Reyner', 70);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` enum('Emas','Berlian') NOT NULL,
  `category` varchar(30) NOT NULL,
  `real_weight` double NOT NULL,
  `rounded_weight` double NOT NULL,
  `purchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `buyback` int(11) NOT NULL,
  `gold_amount` int(11) NOT NULL,
  `tray_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `status` enum('available','pending','terjual','rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `type`, `category`, `real_weight`, `rounded_weight`, `purchase_price`, `selling_price`, `buyback`, `gold_amount`, `tray_id`, `photo`, `outlet_id`, `status`) VALUES
(2, 'KMK100001', 'Kalung MK Hello Kitty', 'Emas', 'Kalung MK', 2.67, 2.7, 0, 829440, 0, 1, 1, 'uploads/photo/product/1/KMK100001.jpg', 1, 'terjual'),
(3, 'KMK100002', 'Kalung MK Merah', 'Emas', 'Kalung MK', 2.89, 2.9, 0, 890880, 0, 1, 1, 'uploads/photo/product/1/KMK100002.jpg', 1, 'terjual'),
(4, 'KMK100003', 'Kalung MK', 'Emas', 'Kalung MK', 4.87, 4.9, 0, 1505280, 0, 1, 1, 'uploads/photo/product/1/KMK100003.jpg', 1, 'pending'),
(5, 'KMC100001', 'Cincin Emas Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 4, 'uploads/photo/product/2/KMC100001.jpg', 2, 'available'),
(6, 'KMC100002', 'Cincin Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 2, 'uploads/photo/product/2/KMC100002.jpg', 1, 'pending'),
(7, 'KMK200001', 'Kalung Elora', 'Berlian', 'Kalung', 5.21, 5.25, 0, 1701000, 0, 2, 5, 'uploads/photo/product/3/KMK200001.jpg', 2, 'available'),
(8, 'ASC100001', 'Cincin Kawin', 'Emas', 'Cincin', 1.36, 1.4, 0, 598080, 0, 1, 2, 'uploads/photo/product/4/ASC100001.jpg', 1, 'terjual'),
(9, 'KMC100003', 'Cincin', 'Emas', 'Cincin', 2.34, 2.35, 0, 1002980, 0, 1, 2, 'uploads/photo/product/2/KMC100003.jpg', 1, 'terjual'),
(11, 'KMK200003', 'Kalung Elora 2', 'Berlian', 'Kalung', 6.78, 6.8, 0, 3265020, 0, 2, 3, '', 1, 'terjual'),
(12, 'KMK200004', 'Kalung Delta', 'Berlian', 'Kalung', 7.87, 7.9, 0, 3793185, 0, 2, 3, 'uploads/photo/product/3/KMK200004.jpg', 1, 'terjual'),
(13, 'KMK100004', 'Kalung MK 333', 'Emas', 'Kalung MK', 9.56, 9.6, 0, 4097280, 0, 1, 1, 'uploads/photo/product/1/KMK100004.jpg', 1, 'terjual'),
(14, 'KMK100005', 'Kalung MK doraemon', 'Emas', 'Kalung MK', 4.77, 4.8, 0, 2048640, 0, 1, 1, 'uploads/photo/product/1/KMK100005.jpg', 1, 'available'),
(15, 'KMK200005', 'Kalung Berlian Elora', 'Berlian', 'Kalung', 6.87, 6.9, 0, 3313035, 0, 2, 3, 'uploads/photo/product/3/KMK200005.jpg', 1, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `sale_code` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `customer_code` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `sale_code`, `date`, `outlet_id`, `sales_id`, `cashier_id`, `customer_code`, `qty`, `total_price`) VALUES
(2, 'KMJU00002', '2016-12-20 07:42:00', 1, 9, 2, 'MKM0000003', 2, 1600000),
(3, 'KMJU00003', '2017-01-06 00:00:00', 1, 0, 0, 'MKM0000001', 1, 570000),
(4, 'KMJU00004', '2017-01-06 00:00:00', 1, 9, 0, 'MKM0000003', 1, 980000),
(5, 'KMJU00005', '2017-01-06 00:00:00', 1, 9, 0, 'MKM0000003', 1, 3000000),
(6, 'KMJU00006', '2017-01-06 00:00:00', 1, 9, 0, 'MKM0000003', 1, 3700000),
(7, 'KMJU00007', '2017-01-06 00:00:00', 1, 9, 0, 'MKM0000003', 1, 3900000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_point`
--

CREATE TABLE `sales_point` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `target` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_point`
--

INSERT INTO `sales_point` (`id`, `name`, `target`, `point`) VALUES
(1, 'Target 1', 500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `sale_code` varchar(10) NOT NULL,
  `selling_price` double NOT NULL,
  `discount` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`id`, `product_code`, `sale_code`, `selling_price`, `discount`, `total_price`) VALUES
(3, 'KMK100001', 'KMJU00002', 829440, 29440, 800000),
(4, 'KMK100002', 'KMJU00002', 890880, 90880, 800000),
(5, 'ASC100001', 'KMJU00003', 598.08, 570000, 570000),
(6, 'KMC100003', 'KMJU00004', 1.002, 980000, 980000),
(7, 'KMK200003', 'KMJU00005', 3.265, 3000000, 3000000),
(8, 'KMK200004', 'KMJU00006', 3.793, 3700000, 3700000),
(9, 'KMK100004', 'KMJU00007', 4.097, 3900000, 3900000);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `stone_type` varchar(5) NOT NULL,
  `stone_amount` int(11) NOT NULL,
  `stone_ct` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`id`, `product_code`, `stone_type`, `stone_amount`, `stone_ct`) VALUES
(1, 'KMK200003', '1', 2, 0.2),
(2, 'KMK200003', '1', 12, 0.11),
(3, 'KMK200004', '1', 3, 2.3),
(4, 'KMK200005', '1', 2, 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tray`
--

CREATE TABLE `tray` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tray`
--

INSERT INTO `tray` (`id`, `code`, `outlet_id`, `name`, `category_id`) VALUES
(1, 'K1', 1, 'Baki Kalung', 3),
(2, 'C1', 1, 'Baki Cincin', 1),
(3, 'K2', 1, 'Kalung Berlian', 2),
(4, 'C1', 2, 'Cincin Emas', 1),
(5, 'K1', 2, 'Kalung Panjang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `code`) VALUES
(1, 'Emas', 'G'),
(2, 'Berlian', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amount_limit`
--
ALTER TABLE `amount_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_history`
--
ALTER TABLE `currency_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `diamond_type`
--
ALTER TABLE `diamond_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gold_amount`
--
ALTER TABLE `gold_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_point`
--
ALTER TABLE `member_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutation_product`
--
ALTER TABLE `mutation_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_point`
--
ALTER TABLE `sales_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tray`
--
ALTER TABLE `tray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `amount_limit`
--
ALTER TABLE `amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `currency_history`
--
ALTER TABLE `currency_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `diamond_type`
--
ALTER TABLE `diamond_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gold_amount`
--
ALTER TABLE `gold_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member_point`
--
ALTER TABLE `member_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mutation`
--
ALTER TABLE `mutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mutation_product`
--
ALTER TABLE `mutation_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sales_point`
--
ALTER TABLE `sales_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tray`
--
ALTER TABLE `tray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
