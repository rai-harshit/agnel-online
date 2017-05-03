-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 11:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `canteenitems`
--

CREATE TABLE `canteenitems` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `status` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canteenitems`
--

INSERT INTO `canteenitems` (`id`, `name`, `price`, `status`) VALUES
('creg00101', 'Samosa', 12, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `dateTime` datetime NOT NULL,
  `rollNo` int(20) NOT NULL,
  `itemId` varchar(20) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemPrice` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1491657147),
('m130524_201442_init', 1491657186);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `uniqueID` varchar(20) NOT NULL,
  `id` int(20) NOT NULL,
  `orderNo` int(20) NOT NULL,
  `ordered_item` varchar(50) NOT NULL,
  `prepStatus` enum('Pending','Processing') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`uniqueID`, `id`, `orderNo`, `ordered_item`, `prepStatus`) VALUES
('c.41b155fd', 1, 1, 'Samosa', 'Pending'),
('c.40a3b657', 2, 2, 'Samosa', 'Pending'),
('c.3c0ae0ad', 3, 3, 'Samosa', 'Pending'),
('c.3ed445d4', 4, 4, 'Samosa', 'Pending'),
('c.3ed445d4', 5, 4, 'Hakka Noodles', 'Pending'),
('s.4d1b46ee', 6, 5, 'Assignment Sheets', 'Pending'),
('c.48619949', 7, 6, 'Hakka Noodles', 'Pending'),
('c.4bfbb438', 8, 7, 'Samosa', 'Pending'),
('c.45af7fef', 9, 8, 'Samosa', 'Pending'),
('c.3cafdc1c', 10, 9, 'Samosa', 'Pending'),
('s.3e639c80', 11, 10, 'Assignment Sheets', 'Pending'),
('c.4b207dd7', 12, 11, 'Samosa', 'Pending'),
('c.44179e0f', 13, 12, 'Samosa', 'Pending'),
('c.f21a02cc', 14, 13, 'Samosa', 'Pending'),
('s.35f52815', 15, 14, 'Assignment Sheets', 'Pending'),
('c.2f6fb961', 16, 15, 'Samosa', 'Pending'),
('c.ece27709', 17, 16, 'Samosa', 'Pending'),
('c.3d77f1d1', 18, 17, 'Samosa', 'Pending'),
('c.dcb07b49', 19, 18, 'Hakka Noodles', 'Pending'),
('c.e6045bad', 20, 19, 'Samosa', 'Pending'),
('c.db6d7405', 21, 20, 'Samosa', 'Pending'),
('c.ed18c167', 22, 21, 'Samosa', 'Pending'),
('c.e0685ff0', 23, 22, 'Samosa', 'Pending'),
('c.d9d0d873', 24, 23, 'Samosa', 'Pending'),
('c.f06a66cd', 25, 24, 'Samosa', 'Pending'),
('c.19aa539', 26, 25, 'Samosa', 'Pending'),
('c.113f793a', 27, 26, 'Hakka Noodles', 'Pending'),
('c.488c24a', 28, 27, 'Samosa', 'Pending'),
('c.d6d18a3c', 29, 28, 'Samosa', 'Pending'),
('c.faee4e07', 30, 29, 'Samosa', 'Pending'),
('c.186d34dc', 31, 30, 'Hakka Noodles', 'Pending'),
('c.41d82366', 32, 31, 'Samosa', 'Pending'),
('c.33e2eb64', 33, 32, 'Samosa', 'Pending'),
('c.153b3ad6', 34, 33, 'Samosa', 'Pending'),
('s.44efdfe0', 35, 34, 'Assignment Sheets', 'Pending'),
('c.2c75d900', 36, 35, 'Samosa', 'Pending'),
('c.23a27569', 37, 36, 'Samosa', 'Pending'),
('c.18b3c8bb', 38, 37, 'Samosa', 'Pending'),
('c.d8586e75', 39, 38, 'Samosa', 'Pending'),
('s.430e7fb7', 40, 39, 'Assignment Sheets', 'Pending'),
('c.45115a89', 41, 40, 'Samosa', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(20) NOT NULL,
  `dateTime` datetime NOT NULL,
  `rollNo` int(20) NOT NULL,
  `itemsCount` int(11) NOT NULL,
  `grandTotal` int(20) NOT NULL,
  `uniqueID` varchar(10) NOT NULL,
  `orderStatus` enum('Pending','Completed') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `dateTime`, `rollNo`, `itemsCount`, `grandTotal`, `uniqueID`, `orderStatus`) VALUES
(1, '2017-05-01 13:02:45', 501550, 1, 12, 'c.41b155', 'Pending'),
(2, '2017-05-01 23:29:36', 501550, 1, 12, 'c.40a3b6', 'Pending'),
(3, '2017-05-01 23:32:43', 501550, 1, 12, 'c.3c0ae0', 'Pending'),
(4, '2017-05-01 23:33:45', 501550, 2, 92, 'c.3ed445', 'Pending'),
(5, '2017-05-01 23:40:49', 501550, 1, 190, 's.4d1b46', 'Pending'),
(6, '2017-05-01 23:41:51', 501550, 1, 80, 'c.486199', 'Pending'),
(7, '2017-05-01 23:43:01', 501550, 1, 12, 'c.4bfbb4', 'Pending'),
(8, '2017-05-01 23:43:34', 501550, 1, 12, 'c.45af7f', 'Pending'),
(9, '2017-05-01 23:53:29', 501550, 1, 12, 'c.3cafdc', 'Pending'),
(10, '2017-05-02 13:00:08', 501550, 1, 190, 's.3e639c', 'Pending'),
(11, '2017-05-02 20:05:13', 501550, 1, 12, 'c.4b207d', 'Pending'),
(12, '2017-05-02 20:42:12', 501550, 1, 12, 'c.44179e', 'Pending'),
(13, '2017-05-02 20:42:51', 501550, 1, 12, 'c.f21a02', 'Pending'),
(14, '2017-05-02 20:44:04', 501550, 1, 190, 's.35f528', 'Pending'),
(15, '2017-05-02 20:45:08', 501550, 1, 12, 'c.2f6fb9', 'Pending'),
(16, '2017-05-02 20:46:08', 501550, 1, 12, 'c.ece277', 'Pending'),
(17, '2017-05-02 20:58:20', 501550, 1, 12, 'c.3d77f1', 'Pending'),
(18, '2017-05-02 20:59:05', 501550, 1, 80, 'c.dcb07b', 'Pending'),
(19, '2017-05-02 20:59:35', 501550, 1, 12, 'c.e6045b', 'Pending'),
(20, '2017-05-02 21:00:53', 501550, 1, 12, 'c.db6d74', 'Pending'),
(21, '2017-05-02 21:02:05', 501550, 1, 12, 'c.ed18c1', 'Pending'),
(22, '2017-05-02 21:03:26', 501550, 1, 12, 'c.e0685f', 'Pending'),
(23, '2017-05-02 21:05:09', 501550, 1, 12, 'c.d9d0d8', 'Pending'),
(24, '2017-05-02 21:31:02', 501550, 1, 12, 'c.f06a66', 'Pending'),
(25, '2017-05-02 21:31:59', 501550, 1, 12, 'c.19aa53', 'Pending'),
(26, '2017-05-02 21:46:39', 501550, 1, 80, 'c.113f79', 'Pending'),
(27, '2017-05-02 21:59:01', 501550, 1, 12, 'c.488c24', 'Pending'),
(28, '2017-05-02 22:00:00', 501550, 1, 12, 'c.d6d18a', 'Pending'),
(29, '2017-05-02 22:04:11', 501550, 1, 12, 'c.faee4e', 'Pending'),
(30, '2017-05-02 22:04:39', 501550, 1, 80, 'c.186d34', 'Pending'),
(31, '2017-05-02 22:10:24', 501550, 1, 12, 'c.41d823', 'Pending'),
(32, '2017-05-02 22:10:59', 501550, 1, 12, 'c.33e2eb', 'Pending'),
(33, '2017-05-02 22:14:57', 501550, 1, 12, 'c.153b3a', 'Pending'),
(34, '2017-05-02 22:18:57', 501550, 1, 190, 's.44efdfe0', 'Pending'),
(35, '2017-05-03 01:25:22', 501550, 1, 12, 'c.2c75d900', 'Pending'),
(36, '2017-05-03 01:36:40', 501550, 1, 12, 'c.23a27569', 'Pending'),
(37, '2017-05-03 01:49:51', 501550, 1, 12, 'c.18b3c8bb', 'Pending'),
(38, '2017-05-03 01:54:26', 501550, 1, 12, 'c.d8586e75', 'Pending'),
(39, '2017-05-03 02:18:01', 501550, 1, 190, 's.430e7fb7', 'Pending'),
(40, '2017-05-03 02:22:54', 501550, 1, 12, 'c.45115a89', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `spcanteenitems`
--

CREATE TABLE `spcanteenitems` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `status` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spcanteenitems`
--

INSERT INTO `spcanteenitems` (`id`, `name`, `price`, `status`) VALUES
('cspe0010', 'Hakka Noodles', 80, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `storeitems`
--

CREATE TABLE `storeitems` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `status` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storeitems`
--

INSERT INTO `storeitems` (`id`, `name`, `price`, `status`) VALUES
('sto0010', 'Assignment Sheets', 190, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `roll_no` int(20) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `roll_no`, `name`, `branch`, `contact`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 501550, 'Harshit Rai', 'IT', '8452904404', 'U4mEYf7Rt9vbHlX0SnzzQbUJcbeI-P_J', '$2y$13$hFszlayEtni5QkSKjw3JH.Ld1EefEA.bJ9hycReesZxpAmA5gtB0u', 'PwBNGPrymEmxzATZU0U2sRzxPvJMTvb8_1492516980', 'harshitrai68@gmail.com', 10, 1491667256, 1492516980),
(3, 501599, 'Geralt of Rivia', 'Witcher', '0909090909', '1IeYaJXd1yfake0wXTpxCqcwvsPFl0Oo', '$2y$13$.NJ1JZW73i9ITFs4C3aePebklw3ZbCnEFXiVo5M3K4D6yGdEx83DS', NULL, 'witcher3@gmail.com', 10, 1493005718, 1493005718);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `rollNo` int(20) NOT NULL,
  `balance` decimal(30,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`rollNo`, `balance`) VALUES
(501550, '48498'),
(501599, '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canteenitems`
--
ALTER TABLE `canteenitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cart_User` (`rollNo`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderitems_orders` (`orderNo`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD UNIQUE KEY `uniqueID` (`uniqueID`),
  ADD KEY `fk_orders_user` (`rollNo`);

--
-- Indexes for table `spcanteenitems`
--
ALTER TABLE `spcanteenitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storeitems`
--
ALTER TABLE `storeitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `roll_no_2` (`roll_no`,`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`rollNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`rollNo`) REFERENCES `user` (`roll_no`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`rollNo`) REFERENCES `user` (`roll_no`) ON DELETE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `fk_user_wallet` FOREIGN KEY (`rollNo`) REFERENCES `user` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
