-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2023 lúc 10:04 AM
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

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `productName`, `sId`, `price`, `image`, `quantity`) VALUES
(30, 19, 'camera hidden', 'o03l0fg57ituhinf6nu1bqcebf', '2000', '58c71baba8.jpg', 1),
(31, 19, 'camera hidden', 'fc86mma5s9eiqh7goqpte8677j', '2000', '58c71baba8.jpg', 1),
(33, 13, 'Cannon 5DHS', 'fc86mma5s9eiqh7goqpte8677j', '4000000', '171e8a1875.jpg', 1),
(34, 18, 'Macbook M10 pro', 'ceqqasj8rdjgjs7l4re08560l5', '1', 'a46dfec5f6.jpg', 1);

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
(4, 'Ngô Minh Hoàng', '101/19 Nguyễn Chí Thanh', 'TP. Hồ Chí Minh', 'VN', '76500', '0935437599', 'hoanglikeaboss@gmail.com', '25f9e794323b453885f5181f1b624d0b');

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
(3, 3, 17, 'Camera', 5, 'db76baa730.jpg', '2500', '2023-02-28 03:02:12', 1);

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
(9, 'Macbook Mk14', 16, 4, '<p>This is the Description of Macbook Mk14</p>', 1, '2000', '5826bda646.jpg'),
(12, 'Iphone 6s', 14, 8, '<p>iPhone 6s xứng đáng là phiên bản nâng cấp hoàn hảo từ chiếc điện thoại thông minh iPhone 6 với nhiều tính năng mới hấp dẫn.</p>', 1, '300', '4622cdb5b3.png'),
(13, 'Cannon 5DHS', 19, 3, '<p>Canon 5DHS ra mắt đánh dấu trào lưu của một thế hệ máy ảnh kỹ thuật số SLR full - frame chất lượng cao, tính năng tiện dụng trên thị trường. Một thế hệ máy ảnh kỹ thuật số SLR mới? Canon 5DHS dòng máy ảnh kỹ thuật số SLR full-frame thứ hai của Canon với Thiết kế hộp gương mở rộng, kính ngắm, nhẹ nhất, cảm biến và giá cả rẻ nhất. Cảm biến ảnh cỡ full-frame của Canon 5D với độ phân giải 12,8 megapixel cung cấp chất lượng hình ảnh tuyệt vời ở một mức giá tuyệt vời.</p>', 0, '1600', '171e8a1875.jpg'),
(14, 'Macbook M1 pro', 16, 4, '<p><span>The MacBook family was initially housed in designs similar to the iBook and PowerBook lines which preceded them, now making use of a unibody&nbsp;</span><a title=\"Aluminium\" href=\"https://en.wikipedia.org/wiki/Aluminium\">aluminum</a><span>&nbsp;construction first introduced with the MacBook Air. This new construction also has a black plastic keyboard that was first used on the MacBook Air, which itself was inspired by the sunken keyboard of the original polycarbonate MacBooks. The now standardized keyboard brings congruity to the MacBook line, with black keys on a metallic aluminum body.</span></p>', 1, '4000', 'd3d08bb439.jpg'),
(15, 'Pro Test 3', 18, 1, '<p><span>This is the description of Pro Test 3</span></p>', 1, '500', 'c8d2743a1b.jpg'),
(16, 'Galaxy S23 Ultra', 14, 3, '<p><span>Samsung Galaxy S23&nbsp;</span><span>l&agrave; phi&ecirc;n bản tiếp theo sắp được Samsung cho ra mắt thị trường. Sở hữu diện mạo tinh tế mới mẻ đi đầu xu hướng, b&ecirc;n cạnh đ&oacute; l&agrave; m&agrave;n h&igrave;nh chất lượng, hiệu năng mạnh mẽ v&agrave; cụm camera si&ecirc;u chất sẽ mang tới những trải nghiệm ấn tượng cho người d&ugrave;ng ngay từ lần chạm đầu ti&ecirc;n.</span></p>\r\n<div class=\"ddict_btn\" style=\"top: 10px; left: 529.318px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" alt=\"\" /></div>', 1, '1300', '6fd9ac0f3c.png'),
(17, 'Camera', 19, 7, '<p>Camera canon B650 full xlm white B extra</p>', 1, '500', 'db76baa730.jpg'),
(18, 'Macbook M10 pro', 16, 4, '<p>mThis is the description of Macbook M10 Pro</p>', 1, '2000', 'a46dfec5f6.jpg'),
(19, 'camera hidden', 19, 7, '<p>camera hiddencamera hiddencamera hiddencamera hiddencamera hiddencamera hidden</p>', 1, '2000', '58c71baba8.jpg');

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
(9, 'Nak', 'b110ad2426.png', 1),
(10, 'Nak', '8958dc6d98.jpg', 1);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
