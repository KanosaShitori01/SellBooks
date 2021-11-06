-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 06:08 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `librarydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `address`) VALUES
(1, '90C Đường 297, P. Phước Long B, Q9 Thành phố Hồ Chí Minh 70023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `another`
--

CREATE TABLE `another` (
  `id` int(11) NOT NULL,
  `introduce` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `QaA` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `another`
--

INSERT INTO `another` (`id`, `introduce`, `QaA`, `contact`) VALUES
(2, 'ASVAB', 'ASDASd', 'ASDSd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(3, 'Chu An Sĩ'),
(4, 'Tác Phu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `orderU` tinyint(1) NOT NULL,
  `error` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `image`, `price`, `quantity`, `id_products`, `id_user`, `orderU`, `error`) VALUES
(77, 'Phật Giáo và Cuộc Sống\r\n', 'Public/img/phatgiaovacuocsong.jpg', 60000, 3, 2, 32, 0, ''),
(78, 'Thiền Tông Toàn Thư - Trọn bộ 101 cuốn (Sách chữ Hán)', 'Public/img/TTTT.jpg', 100000, 4, 3, 32, 0, ''),
(124, 'Monika', 'Images/241449593_299004655377157_3372930438670435707_n.jpg', 10000000000000, 1, 10, 31, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Kinh\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `myorder`
--

CREATE TABLE `myorder` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalmoney` float NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `myorder`
--

INSERT INTO `myorder` (`id`, `id_user`, `id_product`, `name_user`, `quantity`, `totalmoney`, `address`, `tel`, `gmail`, `received`) VALUES
(41, 31, 7, 'Su Văn Lu', 3, 2700000, 'Đường Trần Duy Hưng', '0337294740', 'surushitoriqn1@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_day` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `translator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `id_category`, `id_author`, `discount`, `created_day`, `quantity`, `translator`, `error`) VALUES
(4, 'Thơm Ngát Hương Lan', 115000, 'Images/backg_slider.jpg', 'ABC', 2, 2, 0, '2021-10-27', 7, NULL, ''),
(7, 'Phật giáo và cuộc sống', 900000, 'Images/phatgiaovacuocsong.jpg', 'Tác phẩm “Đạo Phật và cuộc sống”  là tuyển tập những bài viết của Hòa Thượng Ấn Thuận, được trích dịch từ hai bộ sách 《佛在人間》 “Phật ở nhân gian” (quyển thứ 14) trong bộ “Diệu Vân tập”. Phần còn lại trích dịch từ bộ “Hoa Vũ Tập”. Đây là những bài nói chuyện có nội dung tư tưởng rất hay, đáng cho chúng ta học tập. Cách lý giải những vấn đề trong Phật học rất trong sáng, phù họp với thời đại chúng ta, nhất là quan điểm của giới trẻ hiện nay. Người dịch cho rằng, nó rất cần thiết cho người Phật tử Việt nam chúng ta, dù ở trong nước hay ở nước ngoài, có thể nói nó là một ý kiến tích cực cho việc hoằng dương Phật pháp trong thời hiện đại, lấy con người và xã hội con người làm chủ đề chính cho cả hai việc tu và học..', 2, 2, 0, '2021-11-06', 10, NULL, ''),
(10, 'Monika', 10000000000000, 'Images/241449593_299004655377157_3372930438670435707_n.jpg', 'Just Monika, Love you forever ~', 2, 2, 0, '2021-11-06', 1, NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_gmail` mediumint(9) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `checkU` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gmail`, `code_gmail`, `tel`, `admin`, `checkU`) VALUES
(30, 'KanosaShitori0011', '17225f2346a7f6eaa6d6d92876d1cd72', 'openniceqn0@gmail.com', 611299, '0337294740', 0, 1),
(31, 'Kanosa', '17225f2346a7f6eaa6d6d92876d1cd72', 'surushitoriqn1@gmail.com', 448885, '0337294740', 0, 1),
(33, 'admin25', '17225f2346a7f6eaa6d6d92876d1cd72', 'dangtong0412@gmail.com', 963180, '097 110 94', 1, 1),
(34, 'Test11', '17225f2346a7f6eaa6d6d92876d1cd72', 'openniceqn009@gmail.com', 893195, '0152626598', 0, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `another`
--
ALTER TABLE `another`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `another`
--
ALTER TABLE `another`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `myorder`
--
ALTER TABLE `myorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
