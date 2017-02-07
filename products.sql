-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 04:27 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
  `supplier_id` int(11) DEFAULT NULL,
  `status` enum('available','pending','terjual','rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `type`, `category`, `real_weight`, `rounded_weight`, `purchase_price`, `selling_price`, `buyback`, `gold_amount`, `tray_id`, `photo`, `outlet_id`, `supplier_id`, `status`) VALUES
(2, 'KMK100001', 'Kalung MK Hello Kitty', 'Emas', 'Kalung MK', 2.67, 2.7, 0, 829440, 0, 1, 1, 'uploads/photo/product/1/KMK100001.jpg', 1, 0, 'terjual'),
(3, 'KMK100002', 'Kalung MK Merah', 'Emas', 'Kalung MK', 2.89, 2.9, 0, 890880, 0, 1, 1, 'uploads/photo/product/1/KMK100002.jpg', 1, 0, 'terjual'),
(4, 'KMK100003', 'Kalung MK', 'Emas', 'Kalung MK', 4.87, 4.9, 0, 1505280, 0, 1, 1, 'uploads/photo/product/1/KMK100003.jpg', 1, 0, 'pending'),
(5, 'KMC100001', 'Cincin Emas Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 4, 'uploads/photo/product/2/KMC100001.jpg', 2, 0, 'available'),
(6, 'KMC100002', 'Cincin Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 2, 'uploads/photo/product/2/KMC100002.jpg', 1, 0, 'pending'),
(7, 'KMK200001', 'Kalung Elora', 'Berlian', 'Kalung', 5.21, 5.25, 0, 1701000, 0, 2, 5, 'uploads/photo/product/3/KMK200001.jpg', 2, 0, 'available'),
(8, 'ASC100001', 'Cincin Kawin', 'Emas', 'Cincin', 1.36, 1.4, 0, 598080, 0, 1, 2, 'uploads/photo/product/4/ASC100001.jpg', 1, 0, 'terjual'),
(9, 'KMC100003', 'Cincin', 'Emas', 'Cincin', 2.34, 2.35, 0, 1002980, 0, 1, 2, 'uploads/photo/product/2/KMC100003.jpg', 1, 0, 'terjual'),
(11, 'KMK200003', 'Kalung Elora 2', 'Berlian', 'Kalung', 6.78, 6.8, 0, 3265020, 0, 2, 3, '', 1, 0, 'terjual'),
(12, 'KMK200004', 'Kalung Delta', 'Berlian', 'Kalung', 7.87, 7.9, 0, 3793185, 0, 2, 3, 'uploads/photo/product/3/KMK200004.jpg', 1, 0, 'terjual'),
(13, 'KMK100004', 'Kalung MK 333', 'Emas', 'Kalung MK', 9.56, 9.6, 0, 4097280, 0, 1, 1, 'uploads/photo/product/1/KMK100004.jpg', 1, 0, 'terjual'),
(14, 'KMK100005', 'Kalung MK doraemon', 'Emas', 'Kalung MK', 4.77, 4.8, 0, 2048640, 0, 1, 1, 'uploads/photo/product/1/KMK100005.jpg', 1, 0, 'available'),
(15, 'KMK200005', 'Kalung Berlian Elora', 'Berlian', 'Kalung', 6.87, 6.9, 0, 3313035, 0, 2, 3, 'uploads/photo/product/3/KMK200005.jpg', 1, 0, 'available'),
(16, 'ASC100002', 'Cincin Emas Hello Kitty', 'Emas', 'Cincin', 3.32, 3.35, 0, 1429780, 0, 1, 4, '', 2, 1, 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
