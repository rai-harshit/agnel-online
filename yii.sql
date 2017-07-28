-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 04:54 PM
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
('creg00101', 'Veg Roll', 30, 'Available'),
('creg00102', 'Chicken Roll', 30, 'Available'),
('creg00103', 'Omlet Pav', 30, 'Available'),
('creg00104', 'Chinese Dosa', 45, 'Available'),
('creg00105', 'Masala Dosa', 35, 'Available'),
('creg00106', 'Sada Dosa', 25, 'Available'),
('creg00107', 'Sada Uttapa', 30, 'Available'),
('creg00108', 'Onion Uttapa', 35, 'Available'),
('creg00109', 'Tomato Uttapa', 35, 'Available'),
('creg00110', 'Cheese Uttapa', 50, 'Available'),
('creg00111', 'Butter Cheese Dosa', 50, 'Available'),
('creg001117', 'Misal Pav', 35, 'Available'),
('creg001118', 'Pav Bhaji', 40, 'Available'),
('creg001119', 'Vada Usal/Sambar', 30, 'Available'),
('creg00112', 'Tomato Soup', 30, 'Available'),
('creg001120', 'Samosa Usal/Sambar', 30, 'Available'),
('creg001121', 'Omlet', 25, 'Available'),
('creg001122', 'Sez Chutney', 5, 'Available'),
('creg001123', 'Tea', 12, 'Available'),
('creg00113', 'Veg.M.Soup', 40, 'Available'),
('creg00114', 'Veg.Clear.Soup', 35, 'Available'),
('creg00115', 'Chicken.M.Soup', 50, 'Available'),
('creg00116', 'Chicken.Clear.Soup', 45, 'Available');

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
('c.3dd43d09', 123, 99, 'Samosa', 'Pending'),
('c.2ff3d4bc', 124, 100, 'Samosa', 'Pending'),
('c.2ff3d4bc', 125, 100, 'Samosa', 'Pending'),
('c.2ff3d4bc', 126, 100, 'Samosa', 'Pending'),
('c.1c963470', 127, 101, 'Onion Uttapa', 'Pending'),
('c.d99ffbec', 128, 102, 'Butter Cheese Dosa', 'Pending'),
('c.2487622e', 129, 103, 'Veg Roll', 'Pending'),
('c.2487622e', 130, 103, 'Chicken Roll', 'Pending'),
('c.2487622e', 131, 103, 'Omlet Pav', 'Pending'),
('c.2487622e', 132, 103, 'Chicken Roll', 'Pending'),
('c.2487622e', 133, 103, 'Chinese Dosa', 'Pending'),
('c.2487622e', 134, 103, 'Sez Chutney', 'Pending'),
('c.1a4dad62', 135, 104, 'Chicken Roll', 'Pending'),
('c.1a4dad62', 136, 104, 'Masala Dosa', 'Pending'),
('c.1a4dad62', 137, 104, 'Misal Pav', 'Pending'),
('c.1a4dad62', 138, 104, 'Vada Usal/Sambar', 'Pending'),
('c.1a4dad62', 139, 104, 'Veg.M.Soup', 'Pending'),
('c.d805776', 140, 105, 'Omlet Pav', 'Pending'),
('c.d805776', 141, 105, 'Sada Uttapa', 'Pending'),
('c.d805776', 142, 105, 'Tea', 'Pending'),
('c.d805776', 143, 105, 'Veg.M.Soup', 'Pending'),
('c.d805776', 144, 105, 'Chicken.Clear.Soup', 'Pending'),
('c.fefc702', 145, 106, 'Veg Roll', 'Pending'),
('c.32b4b3d4', 146, 107, 'Veg Roll', 'Pending'),
('c.3f98a8bd', 147, 108, 'Chicken Roll', 'Pending'),
('c.a728f04', 148, 109, 'Chicken Roll', 'Pending'),
('c.e0e4568a', 149, 110, 'Veg Roll', 'Pending'),
('s.2f9b950', 150, 111, 'ED Sheets (x1)', 'Pending'),
('c.25bcd6db', 151, 112, 'Veg Roll', 'Pending'),
('c.25bcd6db', 152, 112, 'Chicken Roll', 'Pending'),
('c.14afe25e', 153, 113, 'Pasta', 'Pending'),
('c.d4c0352f', 154, 114, 'Chicken Roll', 'Pending'),
('c.d4c0352f', 155, 114, 'Pav Bhaji', 'Pending'),
('c.d4c0352f', 156, 114, 'Tomato Soup', 'Pending'),
('c.d59c158f', 157, 115, 'Onion Uttapa', 'Pending'),
('c.d59c158f', 158, 115, 'Samosa Usal/Sambar', 'Pending'),
('c.12a31384', 159, 116, 'Sada Dosa', 'Pending'),
('c.12a31384', 160, 116, 'Omlet', 'Pending'),
('c.453af9f2', 161, 117, 'Chicken Roll', 'Pending'),
('c.453af9f2', 162, 117, 'Hakka Noodles', 'Pending'),
('c.da49307e', 163, 118, 'Veg Roll', 'Pending'),
('c.da49307e', 164, 118, 'Chicken Roll', 'Pending'),
('c.1b6e525a', 165, 119, 'Sada Dosa', 'Pending'),
('c.1b6e525a', 166, 119, 'Samosa Usal/Sambar', 'Pending'),
('c.ea236738', 167, 120, 'Hakka Noodles', 'Pending'),
('c.ea236738', 168, 120, 'Chinese Dosa', 'Pending');

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
  `orderStatus` enum('Processing','Completed') NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `dateTime`, `rollNo`, `itemsCount`, `grandTotal`, `uniqueID`, `orderStatus`) VALUES
(107, '2017-07-14 13:43:07', 501550, 1, 30, 'c.32b4b3d4', 'Completed'),
(108, '2017-07-14 16:14:09', 501550, 1, 30, 'c.3f98a8bd', 'Processing'),
(109, '2017-07-14 17:15:51', 501550, 1, 30, 'c.a728f04', 'Processing'),
(110, '2017-07-14 17:19:07', 501550, 1, 30, 'c.e0e4568a', 'Processing'),
(111, '2017-07-15 10:59:14', 501550, 1, 10, 's.2f9b950', 'Processing'),
(112, '2017-07-15 11:37:08', 501540, 2, 60, 'c.25bcd6db', 'Processing'),
(113, '2017-07-15 12:05:05', 501550, 1, 35, 'c.14afe25e', 'Processing'),
(115, '2017-07-15 13:00:49', 501550, 2, 65, 'c.d59c158f', 'Processing'),
(116, '2017-07-15 13:18:00', 501550, 2, 50, 'c.12a31384', 'Processing'),
(117, '2017-07-15 14:08:41', 501550, 2, 105, 'c.453af9f2', 'Processing'),
(118, '2017-07-15 14:33:29', 501550, 2, 60, 'c.da49307e', 'Processing'),
(119, '2017-07-15 14:38:51', 501550, 2, 55, 'c.1b6e525a', 'Processing'),
(120, '2017-07-15 14:52:04', 501550, 2, 120, 'c.ea236738', 'Processing');

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
('cspe00101', 'Puri Bhaji', 45, 'Available'),
('cspe00102', 'Pasta', 35, 'Available'),
('cspe00103', 'Hakka Noodles', 75, 'Available');

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
('csto00101', 'ED Sheets (x1)', 20, 'Available'),
('csto00102', 'Assignment Sheets', 190, 'Available'),
('csto00103', 'Hard-Bound Cover (x1 pair)', 11, 'Available'),
('csto00104', 'Graph Paper (x5)', 5, 'Available'),
('csto00105', 'Index Sheets (x5)', 5, 'Available');

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
(2, 501550, 'Harshit Rai', 'IT', '8452904404', 'U4mEYf7Rt9vbHlX0SnzzQbUJcbeI-P_J', '$2y$13$ZyEegmmLesAcxUZbblp0FePdrg81Ky6qwP41RT0toQx4f6Vvvvep.', NULL, 'harshitrai68@gmail.com', 10, 1491667256, 1500109643),
(4, 501525, 'Azhar Khan', 'IT', '9028989869', 'Qi_MZ2Gr68KTtiO4RY7Xn-4xS2VtUgwn', '$2y$13$zYZ27/7ILTcwyycHZsOJfuO0qd4p177qgSn5mKnLttXJ9aQT7x3Za', NULL, 'khanazharj@gmail.com', 10, 1500098208, 1500098208),
(5, 501540, 'Nathan Nunes', 'IT', '8806174079', 'Fpph8a8fsmrk_hfyd66Ao3ut-lQEpnAl', '$2y$13$R/dH4Ed6d61PF0iIdHBqq.hTpRF14SgZyCmbqK.n65tMhEcO5REWy', NULL, 'nathan-nunes@hotmail.com', 10, 1500098275, 1500098275),
(6, 501501, 'Vineet Abr', 'IT', '1234567890', '-oxFDy02D4L7tY9R2GFn32NVfcR1x0u4', '$2y$13$AFg6Ogj8Qaz51aRwHhgbNOS..XYWpmFKd4NFiMlB0DKNBV3myelr.', NULL, 'abr123@gmail.com', 10, 1500100800, 1500100800);

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
(501525, '10000'),
(501540, '11940'),
(501550, '43710');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
