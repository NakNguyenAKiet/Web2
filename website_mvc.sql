-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2023 lúc 07:51 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'nak', 'nak@gmail.com', 'nak', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
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
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
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
-- Cấu trúc bảng cho bảng `tbl_customer`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(3, 'NAK123', '183/36 Nguyễn Hữu Cảnh', 'Quận Bình Thạnh', 'VN', '28', '+84835973152', 'anhkietdepcmntrai@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'DD', 'dsa', 'HCM', 'null', 'dsa', 'das', 'asd', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'DD123', 'sda', 'HCM', 'VN', '21', '1234567890', 'sda', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'DD', 'Aas', 'HCM', 'VN', '21', 'aerw', 'as', '5d153c645b182f24f3c0c06df9523622'),
(7, 'anh', '1', '1', 'VN', '1', '1', 'anh', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customerId`, `productId`, `productName`, `quantity`, `image`, `price`, `date_order`, `status`) VALUES
(15, 5, 27, 'Macbook Pro 13 M2', 2, '7be8be82b5.jpg', '59380000', '2023-05-10 08:48:16', 1),
(16, 5, 22, 'Iphone 13 258Gb', 1, '443c0934de.jpg', '34299000', '2023-05-10 08:48:25', 1),
(17, 5, 26, 'Camera Canon R7', 1, '6514a3cfa2.jpg', '7990000', '2023-05-10 08:49:26', 1),
(18, 5, 25, 'Oppo A16K', 1, 'eab44affb6.jpg', '2799000', '2023-05-10 08:49:35', 1),
(19, 7, 31, 'Dell Gaming', 1, 'c5dba85152.jpg', '26990000', '2023-05-10 10:12:44', 0),
(20, 7, 30, 'Macbook Air M2', 1, '45abb2c783.jpg', '39690000', '2023-05-10 10:12:44', 0),
(21, 7, 22, 'Iphone 13 258Gb', 1, '443c0934de.jpg', '34299000', '2023-05-10 10:14:13', 0),
(22, 7, 30, 'Macbook Air M2', 1, '45abb2c783.jpg', '39690000', '2023-05-10 10:14:51', 0),
(23, 7, 24, 'SamSum Galaxy Z Flip4 5G', 1, 'b47c703cea.jpg', '27990000', '2023-05-10 10:14:51', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `productDesc`, `type`, `price`, `image`) VALUES
(16, 'Galaxy S23 Ultra', 14, 3, '<p><span>Samsung Galaxy S23&nbsp;</span><span>l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</span></p>\r\n<div class=\"ddict_btn\" style=\"top: 10px; left: 529.318px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" alt=\"\" /></div>', 1, '4', '13245e95d6.jpg'),
(20, 'Samsung Galaxy Z Fold 3', 14, 3, '<p>Samsung Galaxy Z Fold 3 l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 1, '19.700.000', '438fac706e.jpg'),
(21, 'Iphone 14 Pro Max', 14, 8, '<p>Iphone 14 Pro Max l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 0, '27990000', '9e3d4d4de6.jpg'),
(22, 'Iphone 13 258Gb', 14, 8, '<p>Iphone 14 Pro Max l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 0, '34299000', '443c0934de.jpg'),
(23, 'Samsung Galaxy Z Fold 3', 14, 3, '<p>Samsung Galaxy Z Fold 3</p>', 1, '18.700.000', '628fd6e18b.jpg'),
(24, 'SamSum Galaxy Z Flip4 5G', 14, 3, '<p>SamSum Galaxy Z Flip4 5G</p>', 0, '27990000', 'b47c703cea.jpg'),
(25, 'Oppo A16K', 14, 6, '<p>The Oppo family was initially housed in designs similar to the iBook and PowerBook lines which preceded them, now making use of a unibody&nbsp;<a title=\"Aluminium\" href=\"https://en.wikipedia.org/wiki/Aluminium\">aluminum</a>&nbsp;construction first introduced with the MacBook Air. This new construction also has a black plastic keyboard that was first used on the MacBook Air, which itself was inspired by the sunken keyboard of the original polycarbonate MacBooks. The now standardized keyboard brings congruity to the MacBook line, with black keys on a metallic aluminum body.</p>', 0, '2799000', 'eab44affb6.jpg'),
(26, 'Camera Canon R7', 19, 7, '<p>The Canon R7&nbsp;now making use of a unibody&nbsp;<a title=\"Aluminium\" href=\"https://en.wikipedia.org/wiki/Aluminium\">aluminum</a>&nbsp;construction first introduced with the MacBook Air. This new construction also has a black plastic keyboard that was first used on the MacBook Air, which itself was inspired by the sunken keyboard of the original polycarbonate MacBooks. The now standardized keyboard brings congruity to the MacBook line, with black keys on a metallic aluminum body.</p>', 0, '7990000', '6514a3cfa2.jpg'),
(27, 'Macbook Pro 13 M2', 16, 4, '<p>Macbook Pro 13 M2&nbsp;l&agrave; phi&ecirc;n bản tiếp theo sắp được Macbook cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 0, '29690000', '7be8be82b5.jpg'),
(30, 'Macbook Air M2', 16, 4, '<p>MacBook m2 l&agrave; phi&ecirc;n bản tiếp theo sắp được cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 1, '39690000', '45abb2c783.jpg'),
(31, 'Dell Gaming', 16, 1, '<p>Dell l&agrave; phi&ecirc;n bản tiếp theo sắp được Dell cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 1, '26990000', 'c5dba85152.jpg'),
(33, 'Dell XPS 17 9710', 16, 1, '<p>Dell XPS 17 9710 / Core i7-11800H-16GBl&agrave; phi&ecirc;n bản tiếp theo sắp được dell cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</p>', 1, '39690000', '848ece94eb.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`, `type`) VALUES
(6, 'test 1', 'e2fc13a250.jpg', 0),
(8, 'nak market', '8b3f7b32bf.png', 0),
(9, 'Nak', 'b110ad2426.png', 0),
(10, 'Nak', '8958dc6d98.jpg', 0),
(11, 'Slide1', '3493d534c7.jpg', 1),
(12, 'Slide', '9cf1cdc18d.jpg', 1),
(13, 'Slide3', '3e25dbb7b0.jpg', 1),
(14, 'Silde4', '9c8a725860.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistic`
--

CREATE TABLE `tbl_statistic` (
  `id` int(11) NOT NULL,
  `customerId` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistic`
--

INSERT INTO `tbl_statistic` (`id`, `customerId`, `productId`, `productName`, `quantity`, `image`, `price`, `date_order`) VALUES
(11, 5, 27, 'Macbook Pro 13 M2', 2, '7be8be82b5.jpg', '59380000', '2023-05-10 08:48:16'),
(12, 5, 22, 'Iphone 13 258Gb', 1, '443c0934de.jpg', '34299000', '2023-04-10 08:48:25'),
(13, 5, 26, 'Camera Canon R7', 1, '6514a3cfa2.jpg', '7990000', '2023-05-10 08:49:26'),
(14, 5, 25, 'Oppo A16K', 1, 'eab44affb6.jpg', '2799000', '2023-04-10 08:49:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_statistic`
--
ALTER TABLE `tbl_statistic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_statistic`
--
ALTER TABLE `tbl_statistic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
