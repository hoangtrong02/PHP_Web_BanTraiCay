-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 16, 2022 lúc 09:41 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitaplonphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`userid`, `username`, `email`, `password`) VALUES
(1, 'hoangtrong', 'hoangtrong@gmail.com', '123'),
(2, 'xuantrong', 'xuantrong@gmail.com', '123'),
(3, 'trong', 'trong@gmail.com', '123'),
(7, 'nam', 'nam@gmail.com', '123'),
(13, 'minh', 'minh@gmail.com', '12345'),
(14, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `cusname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  `total_price` float NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderid`, `cusname`, `address`, `phone`, `note`, `total_price`, `created_time`) VALUES
(4, 'xuan trong', 'hanoi', 9887123, 'note', 129000, 1663300287),
(19, 'trong', 'hanoi', 9887123, 'note', 106000, 1663313757),
(20, 'minh', 'hanoi', 9887123, 'note', 140000, 1663313894);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderid`, `proid`, `quantity`, `price`) VALUES
(1, 4, 10, 2, 300000),
(2, 4, 11, 3, 50500),
(3, 4, 21, 7, 120000),
(4, 19, 4, 2, 15000),
(5, 19, 10, 2, 15000),
(6, 19, 12, 2, 23000),
(7, 20, 4, 2, 15000),
(8, 20, 10, 2, 15000),
(9, 20, 12, 2, 23000),
(10, 20, 21, 2, 17000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `proid` int(11) NOT NULL,
  `proname` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `mota` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`proid`, `proname`, `image`, `price`, `mota`, `userid`) VALUES
(4, 'chuối', 'chuoi.jpg', 15000, 'chuối tiêu', 1),
(10, 'dâu tây', 'dau.jpg', 15000, 'dâu tây', 1),
(11, 'Khế', 'khe.jpg', 10000, 'Khế', 1),
(12, 'xoai', 'xoai.png', 23000, 'xoai', 1),
(20, 'táo', 'tao.jpg', 30000, 'táo', 2),
(21, 'nhãn', 'nhan.jfif', 17000, 'nhan nuoc', 2),
(24, 'Táo', 'tao.jpg', 28000, 'táo', 1),
(26, 'Ớt chuông', 'lp-2.jpg', 32000, 'Ớt chuông', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proid` (`proid`),
  ADD KEY `fk_orderid` (`orderid`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `fk_proid` FOREIGN KEY (`proid`) REFERENCES `products` (`proid`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `accounts` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
