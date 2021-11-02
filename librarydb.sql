-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2021 lúc 05:41 AM
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
-- Cấu trúc bảng cho bảng `another`
--

CREATE TABLE `another` (
  `introduce` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `howtobuy` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `QaA` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Hòa Thượng Ấn Thuận'),
(2, 'Thích Hạnh Bình'),
(3, 'Chu An Sĩ');

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
  `quantity_max` int(11) NOT NULL,
  `received` tinyint(1) NOT NULL,
  `id_products` int(11) NOT NULL,
  `error` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `image`, `price`, `quantity`, `quantity_max`, `received`, `id_products`, `error`) VALUES
(52, 'Thiền Tông Toàn Thư - Trọn bộ 101 cuốn (Sách chữ Hán)', 'Public/img/TTTT.jpg', 100000, 1, 4, 0, 3, '');

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
(1, 'Đại tạng kinh'),
(2, 'Kinh'),
(3, 'Sách Phật Giáo'),
(4, 'Từ Điển Phật Giáo');

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
(2, 'Phật Giáo và Cuộc Sống\r\n', 60000, 'Public/img/phatgiaovacuocsong.jpg', 'Tác phẩm “Đạo Phật và cuộc sống”  là tuyển tập những bài viết của Hòa Thượng Ấn Thuận, được trích dịch từ hai bộ sách 《佛在人間》 “Phật ở nhân gian” (quyển thứ 14) trong bộ “Diệu Vân tập”. Phần còn lại trích dịch từ bộ “Hoa Vũ Tập”. Đây là những bài nói chuyện có nội dung tư tưởng rất hay, đáng cho chúng ta học tập. Cách lý giải những vấn đề trong Phật học rất trong sáng, phù họp với thời đại chúng ta, nhất là quan điểm của giới trẻ hiện nay. Người dịch cho rằng, nó rất cần thiết cho người Phật tử Việt nam chúng ta, dù ở trong nước hay ở nước ngoài, có thể nói nó là một ý kiến tích cực cho việc hoằng dương Phật pháp trong thời hiện đại, lấy con người và xã hội con người làm chủ đề chính cho cả hai việc tu và học..', 2, 1, 0, '2021-10-26', 5, NULL, ''),
(3, 'Thiền Tông Toàn Thư - Trọn bộ 101 cuốn (Sách chữ Hán)', 100000, 'Public/img/TTTT.jpg', '', 1, 1, 0, '2021-10-27', 4, NULL, ''),
(4, 'Thơm Ngát Hương Lan\r\n', 115000, 'Public/img/thomngathuonglan.jpg', '', 3, 2, 0, '2021-10-27', 2, NULL, ''),
(5, 'SA', 250000, 'Public/img/book1.jpg', 'SASCCC', 4, 2, 0, '2021-10-27', 1, NULL, '');

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
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gmail`, `code_gmail`, `admin`) VALUES
(1, 'admin', '93c674bbea62adf2a5d70252e612cccd', 'openniceqn9@gmail.com', 53975, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
