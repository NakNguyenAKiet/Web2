-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 09:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'nak', 'nak@gmail.com', 'nak', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Dell'),
(3, 'Samsung'),
(4, 'Macbook'),
(6, 'Oppo'),
(7, 'Canon'),
(8, 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `productName`, `sId`, `price`, `image`, `quantity`) VALUES
(30, 19, 'camera hidden', 'o03l0fg57ituhinf6nu1bqcebf', '2000', '58c71baba8.jpg', 1),
(31, 19, 'camera hidden', 'fc86mma5s9eiqh7goqpte8677j', '2000', '58c71baba8.jpg', 1),
(33, 13, 'Cannon 5DHS', 'fc86mma5s9eiqh7goqpte8677j', '4000000', '171e8a1875.jpg', 1),
(34, 18, 'Macbook M10 pro', 'ceqqasj8rdjgjs7l4re08560l5', '1', 'a46dfec5f6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(7, 'Desktop'),
(14, 'phone'),
(15, 'screen'),
(16, 'PC'),
(17, 'ScreenCard'),
(18, 'test'),
(19, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(3, 'NAK123', '183/36 Nguyễn Hữu Cảnh', 'Quận Bình Thạnh', 'VN', '28', '+84835973152', 'anhkietdepcmntrai@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customerId` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customerId`, `productId`, `productName`, `quantity`, `image`, `price`, `date_order`, `status`) VALUES
(3, 3, 17, 'Camera', 5, 'db76baa730.jpg', '2500', '2023-02-28 03:02:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `productDesc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `productDesc`, `type`, `price`, `image`) VALUES
(9, 'Macbook Mk14', 16, 4, '<p>s</p>', 1, '2000', '5826bda646.jpg'),
(12, 'Iphone 6s', 14, 8, '<p>ihponge sjfon hshnfe sde</p>', 1, '30000000', '4622cdb5b3.png'),
(13, 'Cannon 5DHS', 19, 3, '<p>Cameracannonnonon mofras fjusaf</p>', 0, '4000000', '171e8a1875.jpg'),
(14, 'Macbook M1 pro', 16, 4, '<p><span>The MacBook family was initially housed in designs similar to the iBook and PowerBook lines which preceded them, now making use of a unibody&nbsp;</span><a title=\"Aluminium\" href=\"https://en.wikipedia.org/wiki/Aluminium\">aluminum</a><span>&nbsp;construction first introduced with the MacBook Air. This new construction also has a black plastic keyboard that was first used on the MacBook Air, which itself was inspired by the sunken keyboard of the original polycarbonate MacBooks. The now standardized keyboard brings congruity to the MacBook line, with black keys on a metallic aluminum body.</span></p>', 1, '4000', 'd3d08bb439.jpg'),
(15, 'pro test 3', 18, 1, '<p><span>&copy;Copyright fgighou t chois jjsioch</span><span>. All Rights Reserved.</span></p>', 1, '3', 'c8d2743a1b.jpg'),
(16, 'Galaxy S23 Ultra', 14, 3, '<p><span>Samsung Galaxy S23&nbsp;</span><span>l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</span></p>\r\n<div class=\"ddict_btn\" style=\"top: 10px; left: 529.318px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" alt=\"\" /></div>', 1, '4', '6fd9ac0f3c.png'),
(17, 'Camera', 19, 7, '<p>Camera canon B650 full xlm white B extra</p>', 1, '500', 'db76baa730.jpg'),
(18, 'Macbook M10 pro', 16, 4, '<p>macbook m10 pro macbook m10 pro macbook m10 promacbook m10 pro</p>', 1, '1', 'a46dfec5f6.jpg'),
(19, 'camera hidden', 19, 7, '<p>camera hiddencamera hiddencamera hiddencamera hiddencamera hiddencamera hidden</p>', 1, '2000', '58c71baba8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`, `type`) VALUES
(6, 'test 1', 'e2fc13a250.jpg', 0),
(8, 'nak market', '8b3f7b32bf.png', 0),
(9, 'Nak', 'b110ad2426.png', 1),
(10, 'Nak', '8958dc6d98.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
