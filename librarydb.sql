-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 06:03 PM
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
(2, 'KINH SÁCH KIM QUY<br />\r\n-Phát Hành Kinh Sách Phật Giáo Nguyên Thủy-Theravada<br />\r\n-Kính Chúc Tất Cả Mọi Người An Vui, Tiên Hóa...<br />\r\n-Sādhu Sādhu Sādhu!<br />\r\nNibbānassa paccayo hotu! ', 'GIẢI THÍCH 12 CHI PHÁP CỦA THẬP-NHỊ-DUYÊN-SINH<br />\r\n1- Vô-minh (avijjā) đó là si tâm-sở (moha- cetasika) đồng sinh với 12 bất-thiện-tâm.<br />\r\n  * Vô-minh phát sinh không biết 8 pháp đó là:<br />\r\n- Dukkhe añāṇaṃ: Không biết ngũ-uẩn chấp-<br />\r\nthủ là khổ-đế.<br />\r\n- Dukkhasamudaye añāṇaṃ: Không biết tham-ái là nhân sinh khổ-đế.<br />\r\n- Dukkhanirodhe añāṇaṃ: Không biết Niết- bàn là pháp diệt khổ-đế.<br />\r\n- Dukkhanirodhagāminīpaṭipadāya añāṇaṃ: Không biết bát-chánh-đạo là pháp-hành dẫn đến diệt khổ-đế.<br />\r\n- Pubbante añāṇaṃ: Không biết ngũ-uẩn, sắc-pháp, danh-pháp trong quá-khứ.<br />\r\n- Aparante añāṇaṃ: Không biết ngũ-uẩn, sắc- pháp, danh-pháp trong vị lai.<br />\r\n- Pubbantāparante añāṇaṃ: Không biết ngũ- uẩn, sắc-pháp, danh-pháp trong quá-khứ và vị lai.<br />\r\n- Idappaccayatā paṭiccasamuppannesu dham- mesu añāṇaṃ: Không biết nhân-duyên phát sinh các pháp trong thập-nhị-duyên-sinh.<br />\r\nVô-minh không biết 8 pháp này làm duyên, nên các hành phát sinh.<br />\r\n2- Hành (saṅkhārā) đó là tác-ý tâm-sở (cetanā- cetasika) đồng sinh với 29 tâm, là quả của vô-minh:<br />\r\n- Tác-ý tâm-sở đồng sinh với 12 bất-thiện-tâm.<br />\r\n- Tác-ý tâm-sở đồng sinh với 8 dục-giới thiện- tâm.<br />\r\n- Tác-ý tâm-sở đồng sinh với 5 sắc-giới thiện-tâm.<br />\r\n- Tác-ý tâm-sở đồng sinh với 4 vô-sắc-giới thiện-tâm.<br />\r\nTác-ý tâm-sở đồng sinh với 29 tâm này là quả của vô-minh, được phát sinh do vô-minh làm duyên.<br />\r\n“Quả-tâm-thức phát sinh do các hành làm duyên.”<br />\r\n3- Quả-tâm-thức (viññāṇa) đó là tam-giới quả-tâm-thức gồm có 32 quả-tâm là quả của các hành đó là:<br />\r\n- Dục-giới quả-tâm-thức có 23 tâm.<br />\r\n- Sắc-giới quả-tâm-thức có 5 tâm.<br />\r\n- Vô-sắc-giới quả-tâm-thức có 4 tâm.<br />\r\n32 tam-giới quả-tâm-thức có 2 phận sự:<br />\r\n   3.1-Paṭisandhiviññāṇa: Tam-giới tái-sinh-tâm gồm có 19 quả-tâm làm phận sự tái-sinh kiếp sau trong 11 cõi dục-giới, 15 tầng trời sắc-giới phạm-thiên, 4 tầng trời vô-sắc-giới phạm-thiên:<br />\r\n- 1 suy-xét-tâm đồng sinh với thọ xả là quả c', '*Địa chỉ: Phòng phát hành Kinh Sách Kim Quy<br />\r\nSố 90C Đường 297, P. Phước Long B, Q9, TPHCM<br />\r\n*Lh: 0971.109.458 (zalo)');

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
(7, 'BB');

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
(129, 'BBB', 'Images/51732458_349799595866584_7385372397785841664_n.jpg', 588888, 2, 19, 33, 0, ''),
(130, 'AHAH', 'Images/51654161_2285612815051709_6172019225855524864_n.jpg', 333333, 1, 18, 33, 0, ''),
(131, 'BBB', 'Images/51732458_349799595866584_7385372397785841664_n.jpg', 588888, 1, 19, 31, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indexp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `image`, `description`, `indexp`) VALUES
(38, 'NEWS 23', 'Images/250928483_1067779637366395_4580250912211510585_n.jpg', 'SVVV <br />\r\nVMVVMVV <br />\r\nVV', 0);

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
(18, 'AHAH', 333333, 'Images/51654161_2285612815051709_6172019225855524864_n.jpg', 'VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV VVVV    VV', 0, 7, 0, '2021-11-08', 44, NULL, ''),
(19, 'BBB', 588888, 'Images/51732458_349799595866584_7385372397785841664_n.jpg', 'VVVVV', 20, 7, 0, '2021-11-08', 3, NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sumconnect`
--

CREATE TABLE `sumconnect` (
  `id` int(11) NOT NULL,
  `res` int(11) NOT NULL,
  `sess` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sumconnect`
--

INSERT INTO `sumconnect` (`id`, `res`, `sess`) VALUES
(1, 1636278031, '9lal1s4it8fjkhbfsdq48r1g80'),
(2, 1636278031, '9lal1s4it8fjkhbfsdq48r1g80'),
(3, 1636283277, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(4, 1636283277, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(5, 1636295620, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(6, 1636295626, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(7, 1636295628, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(8, 1636295629, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(9, 1636295629, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(10, 1636295629, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(11, 1636295635, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(12, 1636295637, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(13, 1636295640, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(14, 1636295642, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(15, 1636295659, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(16, 1636295659, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(17, 1636295781, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(18, 1636295792, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(19, 1636295799, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(20, 1636295830, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(21, 1636295851, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(22, 1636295856, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(23, 1636295871, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(24, 1636295871, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(25, 1636295875, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(26, 1636295888, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(27, 1636295889, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(28, 1636295992, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(29, 1636295999, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(30, 1636296003, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(31, 1636296004, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(32, 1636296004, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(33, 1636296005, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(34, 1636296005, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(35, 1636296005, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(36, 1636296005, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(37, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(38, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(39, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(40, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(41, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(42, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(43, 1636296014, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(44, 1636296015, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(45, 1636296015, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(46, 1636296016, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(47, 1636296046, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(48, 1636296050, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(49, 1636296050, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(50, 1636296051, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(51, 1636296054, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(52, 1636296290, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(53, 1636296335, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(54, 1636296765, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(55, 1636296858, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(56, 1636296870, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(57, 1636296871, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(58, 1636296873, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(59, 1636296877, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(60, 1636296879, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(61, 1636296893, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(62, 1636296893, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(63, 1636296895, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(64, 1636298371, 'q2q8lu8t1utp64e00dcrr8dfaf'),
(65, 1636340037, 'iotd00s4qotbulrrpp7bphhbnu'),
(66, 1636340037, 'iotd00s4qotbulrrpp7bphhbnu'),
(67, 1636340063, 'iotd00s4qotbulrrpp7bphhbnu'),
(68, 1636340065, 'iotd00s4qotbulrrpp7bphhbnu'),
(69, 1636340067, 'iotd00s4qotbulrrpp7bphhbnu'),
(70, 1636340068, 'iotd00s4qotbulrrpp7bphhbnu'),
(71, 1636340071, 'iotd00s4qotbulrrpp7bphhbnu'),
(72, 1636340071, 'iotd00s4qotbulrrpp7bphhbnu'),
(73, 1636340083, 'iotd00s4qotbulrrpp7bphhbnu'),
(74, 1636340092, 'iotd00s4qotbulrrpp7bphhbnu'),
(75, 1636340093, 'iotd00s4qotbulrrpp7bphhbnu'),
(76, 1636340095, 'iotd00s4qotbulrrpp7bphhbnu'),
(77, 1636340104, 'iotd00s4qotbulrrpp7bphhbnu'),
(78, 1636340106, 'iotd00s4qotbulrrpp7bphhbnu'),
(79, 1636340108, 'iotd00s4qotbulrrpp7bphhbnu'),
(80, 1636340110, 'iotd00s4qotbulrrpp7bphhbnu'),
(81, 1636340114, 'iotd00s4qotbulrrpp7bphhbnu'),
(82, 1636340114, 'iotd00s4qotbulrrpp7bphhbnu'),
(83, 1636340116, 'iotd00s4qotbulrrpp7bphhbnu'),
(84, 1636340116, 'iotd00s4qotbulrrpp7bphhbnu'),
(85, 1636340118, 'iotd00s4qotbulrrpp7bphhbnu'),
(86, 1636340118, 'iotd00s4qotbulrrpp7bphhbnu'),
(87, 1636340119, 'iotd00s4qotbulrrpp7bphhbnu'),
(88, 1636340119, 'iotd00s4qotbulrrpp7bphhbnu'),
(89, 1636340121, 'iotd00s4qotbulrrpp7bphhbnu'),
(90, 1636340125, 'iotd00s4qotbulrrpp7bphhbnu'),
(91, 1636340126, 'iotd00s4qotbulrrpp7bphhbnu'),
(92, 1636340133, 'iotd00s4qotbulrrpp7bphhbnu'),
(93, 1636340144, 'iotd00s4qotbulrrpp7bphhbnu'),
(94, 1636340146, 'iotd00s4qotbulrrpp7bphhbnu'),
(95, 1636340148, 'iotd00s4qotbulrrpp7bphhbnu'),
(96, 1636340149, 'iotd00s4qotbulrrpp7bphhbnu'),
(97, 1636340152, 'iotd00s4qotbulrrpp7bphhbnu'),
(98, 1636340308, 'iotd00s4qotbulrrpp7bphhbnu'),
(99, 1636340675, 'iotd00s4qotbulrrpp7bphhbnu'),
(100, 1636340689, 'iotd00s4qotbulrrpp7bphhbnu'),
(101, 1636340703, 'iotd00s4qotbulrrpp7bphhbnu'),
(102, 1636340713, 'iotd00s4qotbulrrpp7bphhbnu'),
(103, 1636340761, 'iotd00s4qotbulrrpp7bphhbnu'),
(104, 1636340769, 'iotd00s4qotbulrrpp7bphhbnu'),
(105, 1636340788, 'iotd00s4qotbulrrpp7bphhbnu'),
(106, 1636340794, 'iotd00s4qotbulrrpp7bphhbnu'),
(107, 1636340836, 'iotd00s4qotbulrrpp7bphhbnu'),
(108, 1636340864, 'iotd00s4qotbulrrpp7bphhbnu'),
(109, 1636340877, 'iotd00s4qotbulrrpp7bphhbnu'),
(110, 1636340967, 'iotd00s4qotbulrrpp7bphhbnu'),
(111, 1636340994, 'iotd00s4qotbulrrpp7bphhbnu'),
(112, 1636341008, 'iotd00s4qotbulrrpp7bphhbnu'),
(113, 1636341020, 'iotd00s4qotbulrrpp7bphhbnu'),
(114, 1636341027, 'iotd00s4qotbulrrpp7bphhbnu'),
(115, 1636341073, 'iotd00s4qotbulrrpp7bphhbnu'),
(116, 1636341316, 'iotd00s4qotbulrrpp7bphhbnu'),
(117, 1636341342, 'iotd00s4qotbulrrpp7bphhbnu'),
(118, 1636341359, 'iotd00s4qotbulrrpp7bphhbnu'),
(119, 1636341359, 'iotd00s4qotbulrrpp7bphhbnu'),
(120, 1636341405, 'iotd00s4qotbulrrpp7bphhbnu'),
(121, 1636341427, 'iotd00s4qotbulrrpp7bphhbnu'),
(122, 1636341485, 'iotd00s4qotbulrrpp7bphhbnu'),
(123, 1636341507, 'iotd00s4qotbulrrpp7bphhbnu'),
(124, 1636341573, 'iotd00s4qotbulrrpp7bphhbnu'),
(125, 1636341573, 'iotd00s4qotbulrrpp7bphhbnu'),
(126, 1636341599, 'iotd00s4qotbulrrpp7bphhbnu'),
(127, 1636341605, 'iotd00s4qotbulrrpp7bphhbnu'),
(128, 1636341613, 'iotd00s4qotbulrrpp7bphhbnu'),
(129, 1636341632, 'iotd00s4qotbulrrpp7bphhbnu'),
(130, 1636341646, 'iotd00s4qotbulrrpp7bphhbnu'),
(131, 1636341650, 'iotd00s4qotbulrrpp7bphhbnu'),
(132, 1636343239, 'iotd00s4qotbulrrpp7bphhbnu'),
(133, 1636343704, 'iotd00s4qotbulrrpp7bphhbnu'),
(134, 1636343739, 'iotd00s4qotbulrrpp7bphhbnu'),
(135, 1636343993, 'iotd00s4qotbulrrpp7bphhbnu'),
(136, 1636344000, 'iotd00s4qotbulrrpp7bphhbnu'),
(137, 1636344007, 'iotd00s4qotbulrrpp7bphhbnu'),
(138, 1636344069, 'iotd00s4qotbulrrpp7bphhbnu'),
(139, 1636344214, 'iotd00s4qotbulrrpp7bphhbnu'),
(140, 1636344249, 'iotd00s4qotbulrrpp7bphhbnu'),
(141, 1636344256, 'iotd00s4qotbulrrpp7bphhbnu'),
(142, 1636344308, 'iotd00s4qotbulrrpp7bphhbnu'),
(143, 1636344317, 'iotd00s4qotbulrrpp7bphhbnu'),
(144, 1636344320, 'iotd00s4qotbulrrpp7bphhbnu'),
(145, 1636344350, 'iotd00s4qotbulrrpp7bphhbnu'),
(146, 1636344365, 'iotd00s4qotbulrrpp7bphhbnu'),
(147, 1636344381, 'iotd00s4qotbulrrpp7bphhbnu'),
(148, 1636344397, 'iotd00s4qotbulrrpp7bphhbnu'),
(149, 1636344406, 'iotd00s4qotbulrrpp7bphhbnu'),
(150, 1636344420, 'iotd00s4qotbulrrpp7bphhbnu'),
(151, 1636344432, 'iotd00s4qotbulrrpp7bphhbnu'),
(152, 1636344443, 'iotd00s4qotbulrrpp7bphhbnu'),
(153, 1636344468, 'iotd00s4qotbulrrpp7bphhbnu'),
(154, 1636344476, 'iotd00s4qotbulrrpp7bphhbnu'),
(155, 1636344480, 'iotd00s4qotbulrrpp7bphhbnu'),
(156, 1636344534, 'iotd00s4qotbulrrpp7bphhbnu'),
(157, 1636344566, 'iotd00s4qotbulrrpp7bphhbnu'),
(158, 1636344569, 'iotd00s4qotbulrrpp7bphhbnu'),
(159, 1636344574, 'iotd00s4qotbulrrpp7bphhbnu'),
(160, 1636344578, 'iotd00s4qotbulrrpp7bphhbnu'),
(161, 1636344590, 'iotd00s4qotbulrrpp7bphhbnu'),
(162, 1636344593, 'iotd00s4qotbulrrpp7bphhbnu'),
(163, 1636344623, 'iotd00s4qotbulrrpp7bphhbnu'),
(164, 1636344629, 'iotd00s4qotbulrrpp7bphhbnu'),
(165, 1636345547, 'iotd00s4qotbulrrpp7bphhbnu'),
(166, 1636345930, 'iotd00s4qotbulrrpp7bphhbnu'),
(167, 1636348682, 'iotd00s4qotbulrrpp7bphhbnu'),
(168, 1636355958, '4o1jugj8rcaf35cc9phrtvlf0p'),
(169, 1636355958, '4o1jugj8rcaf35cc9phrtvlf0p'),
(170, 1636355960, '4o1jugj8rcaf35cc9phrtvlf0p'),
(171, 1636355971, '4o1jugj8rcaf35cc9phrtvlf0p'),
(172, 1636355985, '4o1jugj8rcaf35cc9phrtvlf0p'),
(173, 1636355987, '4o1jugj8rcaf35cc9phrtvlf0p'),
(174, 1636355990, '4o1jugj8rcaf35cc9phrtvlf0p'),
(175, 1636355992, '4o1jugj8rcaf35cc9phrtvlf0p'),
(176, 1636355994, '4o1jugj8rcaf35cc9phrtvlf0p'),
(177, 1636355995, '4o1jugj8rcaf35cc9phrtvlf0p'),
(178, 1636355998, '4o1jugj8rcaf35cc9phrtvlf0p'),
(179, 1636355999, '4o1jugj8rcaf35cc9phrtvlf0p'),
(180, 1636356002, '4o1jugj8rcaf35cc9phrtvlf0p'),
(181, 1636356004, '4o1jugj8rcaf35cc9phrtvlf0p'),
(182, 1636356006, '4o1jugj8rcaf35cc9phrtvlf0p'),
(183, 1636356032, '4o1jugj8rcaf35cc9phrtvlf0p'),
(184, 1636356032, '4o1jugj8rcaf35cc9phrtvlf0p'),
(185, 1636356036, '4o1jugj8rcaf35cc9phrtvlf0p'),
(186, 1636356041, '4o1jugj8rcaf35cc9phrtvlf0p'),
(187, 1636356045, '4o1jugj8rcaf35cc9phrtvlf0p'),
(188, 1636356049, '4o1jugj8rcaf35cc9phrtvlf0p'),
(189, 1636356058, '4o1jugj8rcaf35cc9phrtvlf0p'),
(190, 1636356058, '4o1jugj8rcaf35cc9phrtvlf0p'),
(191, 1636356066, '4o1jugj8rcaf35cc9phrtvlf0p'),
(192, 1636356071, '4o1jugj8rcaf35cc9phrtvlf0p'),
(193, 1636356090, '4o1jugj8rcaf35cc9phrtvlf0p'),
(194, 1636356094, '4o1jugj8rcaf35cc9phrtvlf0p'),
(195, 1636356095, '4o1jugj8rcaf35cc9phrtvlf0p'),
(196, 1636357310, '4o1jugj8rcaf35cc9phrtvlf0p'),
(197, 1636357312, '4o1jugj8rcaf35cc9phrtvlf0p'),
(198, 1636357314, '4o1jugj8rcaf35cc9phrtvlf0p'),
(199, 1636357318, '4o1jugj8rcaf35cc9phrtvlf0p'),
(200, 1636357321, '4o1jugj8rcaf35cc9phrtvlf0p'),
(201, 1636357322, '4o1jugj8rcaf35cc9phrtvlf0p'),
(202, 1636357322, '4o1jugj8rcaf35cc9phrtvlf0p'),
(203, 1636357322, '4o1jugj8rcaf35cc9phrtvlf0p'),
(204, 1636357324, '4o1jugj8rcaf35cc9phrtvlf0p'),
(205, 1636357333, '4o1jugj8rcaf35cc9phrtvlf0p'),
(206, 1636357334, '4o1jugj8rcaf35cc9phrtvlf0p'),
(207, 1636357336, '4o1jugj8rcaf35cc9phrtvlf0p'),
(208, 1636357338, '4o1jugj8rcaf35cc9phrtvlf0p'),
(209, 1636357340, '4o1jugj8rcaf35cc9phrtvlf0p'),
(210, 1636357391, '4o1jugj8rcaf35cc9phrtvlf0p'),
(211, 1636357394, '4o1jugj8rcaf35cc9phrtvlf0p'),
(212, 1636357397, '4o1jugj8rcaf35cc9phrtvlf0p'),
(213, 1636357399, '4o1jugj8rcaf35cc9phrtvlf0p'),
(214, 1636357400, '4o1jugj8rcaf35cc9phrtvlf0p'),
(215, 1636357401, '4o1jugj8rcaf35cc9phrtvlf0p'),
(216, 1636357401, '4o1jugj8rcaf35cc9phrtvlf0p'),
(217, 1636357401, '4o1jugj8rcaf35cc9phrtvlf0p'),
(218, 1636357404, '4o1jugj8rcaf35cc9phrtvlf0p'),
(219, 1636357407, '4o1jugj8rcaf35cc9phrtvlf0p'),
(220, 1636357409, '4o1jugj8rcaf35cc9phrtvlf0p'),
(221, 1636357409, '4o1jugj8rcaf35cc9phrtvlf0p'),
(222, 1636357440, '4o1jugj8rcaf35cc9phrtvlf0p'),
(223, 1636357909, '4o1jugj8rcaf35cc9phrtvlf0p'),
(224, 1636357910, '4o1jugj8rcaf35cc9phrtvlf0p'),
(225, 1636357985, '4o1jugj8rcaf35cc9phrtvlf0p'),
(226, 1636357986, '4o1jugj8rcaf35cc9phrtvlf0p'),
(227, 1636358057, '4o1jugj8rcaf35cc9phrtvlf0p'),
(228, 1636358058, '4o1jugj8rcaf35cc9phrtvlf0p'),
(229, 1636358070, '4o1jugj8rcaf35cc9phrtvlf0p'),
(230, 1636358070, '4o1jugj8rcaf35cc9phrtvlf0p'),
(231, 1636358072, '4o1jugj8rcaf35cc9phrtvlf0p'),
(232, 1636358074, '4o1jugj8rcaf35cc9phrtvlf0p'),
(233, 1636358076, '4o1jugj8rcaf35cc9phrtvlf0p'),
(234, 1636358079, '4o1jugj8rcaf35cc9phrtvlf0p'),
(235, 1636358079, '4o1jugj8rcaf35cc9phrtvlf0p'),
(236, 1636358079, '4o1jugj8rcaf35cc9phrtvlf0p'),
(237, 1636358086, '4o1jugj8rcaf35cc9phrtvlf0p'),
(238, 1636358086, '4o1jugj8rcaf35cc9phrtvlf0p'),
(239, 1636358088, '4o1jugj8rcaf35cc9phrtvlf0p'),
(240, 1636358090, '4o1jugj8rcaf35cc9phrtvlf0p'),
(241, 1636358092, '4o1jugj8rcaf35cc9phrtvlf0p'),
(242, 1636358104, '4o1jugj8rcaf35cc9phrtvlf0p'),
(243, 1636358104, '4o1jugj8rcaf35cc9phrtvlf0p'),
(244, 1636358110, '4o1jugj8rcaf35cc9phrtvlf0p'),
(245, 1636358112, '4o1jugj8rcaf35cc9phrtvlf0p'),
(246, 1636358116, '4o1jugj8rcaf35cc9phrtvlf0p'),
(247, 1636358116, '4o1jugj8rcaf35cc9phrtvlf0p'),
(248, 1636358118, '4o1jugj8rcaf35cc9phrtvlf0p'),
(249, 1636358120, '4o1jugj8rcaf35cc9phrtvlf0p'),
(250, 1636358120, '4o1jugj8rcaf35cc9phrtvlf0p'),
(251, 1636358124, '4o1jugj8rcaf35cc9phrtvlf0p'),
(252, 1636358126, '4o1jugj8rcaf35cc9phrtvlf0p'),
(253, 1636358128, '4o1jugj8rcaf35cc9phrtvlf0p'),
(254, 1636358129, '4o1jugj8rcaf35cc9phrtvlf0p'),
(255, 1636358131, '4o1jugj8rcaf35cc9phrtvlf0p'),
(256, 1636358134, '4o1jugj8rcaf35cc9phrtvlf0p'),
(257, 1636358134, '4o1jugj8rcaf35cc9phrtvlf0p'),
(258, 1636358137, '4o1jugj8rcaf35cc9phrtvlf0p'),
(259, 1636358138, '4o1jugj8rcaf35cc9phrtvlf0p'),
(260, 1636358140, '4o1jugj8rcaf35cc9phrtvlf0p'),
(261, 1636358140, '4o1jugj8rcaf35cc9phrtvlf0p'),
(262, 1636358140, '4o1jugj8rcaf35cc9phrtvlf0p'),
(263, 1636358143, '4o1jugj8rcaf35cc9phrtvlf0p'),
(264, 1636358144, '4o1jugj8rcaf35cc9phrtvlf0p'),
(265, 1636358146, '4o1jugj8rcaf35cc9phrtvlf0p'),
(266, 1636358146, '4o1jugj8rcaf35cc9phrtvlf0p'),
(267, 1636358146, '4o1jugj8rcaf35cc9phrtvlf0p'),
(268, 1636358158, '4o1jugj8rcaf35cc9phrtvlf0p'),
(269, 1636358160, '4o1jugj8rcaf35cc9phrtvlf0p'),
(270, 1636358163, '4o1jugj8rcaf35cc9phrtvlf0p'),
(271, 1636358165, '4o1jugj8rcaf35cc9phrtvlf0p'),
(272, 1636358165, '4o1jugj8rcaf35cc9phrtvlf0p'),
(273, 1636358167, '4o1jugj8rcaf35cc9phrtvlf0p'),
(274, 1636358172, '4o1jugj8rcaf35cc9phrtvlf0p'),
(275, 1636358176, '4o1jugj8rcaf35cc9phrtvlf0p'),
(276, 1636358178, '4o1jugj8rcaf35cc9phrtvlf0p'),
(277, 1636358181, '4o1jugj8rcaf35cc9phrtvlf0p'),
(278, 1636358183, '4o1jugj8rcaf35cc9phrtvlf0p'),
(279, 1636358186, '4o1jugj8rcaf35cc9phrtvlf0p'),
(280, 1636358313, '4o1jugj8rcaf35cc9phrtvlf0p'),
(281, 1636359732, '4o1jugj8rcaf35cc9phrtvlf0p'),
(282, 1636359734, '4o1jugj8rcaf35cc9phrtvlf0p'),
(283, 1636359737, '4o1jugj8rcaf35cc9phrtvlf0p'),
(284, 1636359739, '4o1jugj8rcaf35cc9phrtvlf0p'),
(285, 1636359741, '4o1jugj8rcaf35cc9phrtvlf0p'),
(286, 1636359746, '4o1jugj8rcaf35cc9phrtvlf0p'),
(287, 1636359748, '4o1jugj8rcaf35cc9phrtvlf0p'),
(288, 1636359748, '4o1jugj8rcaf35cc9phrtvlf0p'),
(289, 1636359756, '4o1jugj8rcaf35cc9phrtvlf0p'),
(290, 1636359762, '4o1jugj8rcaf35cc9phrtvlf0p'),
(291, 1636359763, '4o1jugj8rcaf35cc9phrtvlf0p'),
(292, 1636359765, '4o1jugj8rcaf35cc9phrtvlf0p'),
(293, 1636359767, '4o1jugj8rcaf35cc9phrtvlf0p'),
(294, 1636359770, '4o1jugj8rcaf35cc9phrtvlf0p'),
(295, 1636359771, '4o1jugj8rcaf35cc9phrtvlf0p'),
(296, 1636359895, '4o1jugj8rcaf35cc9phrtvlf0p'),
(297, 1636359897, '4o1jugj8rcaf35cc9phrtvlf0p'),
(298, 1636359898, '4o1jugj8rcaf35cc9phrtvlf0p'),
(299, 1636359984, '4o1jugj8rcaf35cc9phrtvlf0p'),
(300, 1636359999, '4o1jugj8rcaf35cc9phrtvlf0p'),
(301, 1636359999, '4o1jugj8rcaf35cc9phrtvlf0p'),
(302, 1636360013, '4o1jugj8rcaf35cc9phrtvlf0p'),
(303, 1636360015, '4o1jugj8rcaf35cc9phrtvlf0p'),
(304, 1636360017, '4o1jugj8rcaf35cc9phrtvlf0p'),
(305, 1636360085, '4o1jugj8rcaf35cc9phrtvlf0p'),
(306, 1636360103, 'mt73a69tsf65f2jn74jf927s5i'),
(307, 1636360103, 'mt73a69tsf65f2jn74jf927s5i'),
(308, 1636360107, 'mt73a69tsf65f2jn74jf927s5i'),
(309, 1636360111, 'mt73a69tsf65f2jn74jf927s5i'),
(310, 1636360113, 'mt73a69tsf65f2jn74jf927s5i'),
(311, 1636360136, 'mt73a69tsf65f2jn74jf927s5i'),
(312, 1636360144, 'mt73a69tsf65f2jn74jf927s5i'),
(313, 1636360149, 'mt73a69tsf65f2jn74jf927s5i'),
(314, 1636360161, 'mt73a69tsf65f2jn74jf927s5i'),
(315, 1636360167, 'mt73a69tsf65f2jn74jf927s5i'),
(316, 1636360172, 'mt73a69tsf65f2jn74jf927s5i'),
(317, 1636360178, 'mt73a69tsf65f2jn74jf927s5i'),
(318, 1636360185, 'mt73a69tsf65f2jn74jf927s5i'),
(319, 1636360754, '4o1jugj8rcaf35cc9phrtvlf0p'),
(320, 1636360758, '4o1jugj8rcaf35cc9phrtvlf0p'),
(321, 1636362022, 'mt73a69tsf65f2jn74jf927s5i'),
(322, 1636362025, 'mt73a69tsf65f2jn74jf927s5i'),
(323, 1636362111, 'mt73a69tsf65f2jn74jf927s5i'),
(324, 1636362515, 'mt73a69tsf65f2jn74jf927s5i'),
(325, 1636362588, 'mt73a69tsf65f2jn74jf927s5i'),
(326, 1636363239, 'mt73a69tsf65f2jn74jf927s5i'),
(327, 1636363769, 'mt73a69tsf65f2jn74jf927s5i'),
(328, 1636363800, 'mt73a69tsf65f2jn74jf927s5i'),
(329, 1636363844, 'mt73a69tsf65f2jn74jf927s5i'),
(330, 1636363849, 'mt73a69tsf65f2jn74jf927s5i'),
(331, 1636364348, 'mt73a69tsf65f2jn74jf927s5i'),
(332, 1636364356, 'mt73a69tsf65f2jn74jf927s5i'),
(333, 1636364399, '4o1jugj8rcaf35cc9phrtvlf0p'),
(334, 1636364713, 'mt73a69tsf65f2jn74jf927s5i'),
(335, 1636364725, 'mt73a69tsf65f2jn74jf927s5i'),
(336, 1636364732, 'mt73a69tsf65f2jn74jf927s5i'),
(337, 1636364737, 'mt73a69tsf65f2jn74jf927s5i'),
(338, 1636364740, 'mt73a69tsf65f2jn74jf927s5i'),
(339, 1636364744, 'mt73a69tsf65f2jn74jf927s5i'),
(340, 1636364762, 'mt73a69tsf65f2jn74jf927s5i'),
(341, 1636364765, 'mt73a69tsf65f2jn74jf927s5i'),
(342, 1636364771, 'mt73a69tsf65f2jn74jf927s5i'),
(343, 1636364798, 'mt73a69tsf65f2jn74jf927s5i'),
(344, 1636364806, 'mt73a69tsf65f2jn74jf927s5i'),
(345, 1636364813, 'mt73a69tsf65f2jn74jf927s5i'),
(346, 1636364836, 'mt73a69tsf65f2jn74jf927s5i'),
(347, 1636364838, 'mt73a69tsf65f2jn74jf927s5i'),
(348, 1636364843, 'mt73a69tsf65f2jn74jf927s5i'),
(349, 1636364862, 'mt73a69tsf65f2jn74jf927s5i'),
(350, 1636364875, 'mt73a69tsf65f2jn74jf927s5i'),
(351, 1636364883, 'mt73a69tsf65f2jn74jf927s5i'),
(352, 1636364888, 'mt73a69tsf65f2jn74jf927s5i'),
(353, 1636364903, 'mt73a69tsf65f2jn74jf927s5i'),
(354, 1636364909, 'mt73a69tsf65f2jn74jf927s5i'),
(355, 1636364912, 'mt73a69tsf65f2jn74jf927s5i'),
(356, 1636364918, 'mt73a69tsf65f2jn74jf927s5i'),
(357, 1636364935, 'mt73a69tsf65f2jn74jf927s5i'),
(358, 1636364953, 'mt73a69tsf65f2jn74jf927s5i'),
(359, 1636364970, 'mt73a69tsf65f2jn74jf927s5i'),
(360, 1636364982, 'mt73a69tsf65f2jn74jf927s5i'),
(361, 1636365106, 'mt73a69tsf65f2jn74jf927s5i'),
(362, 1636365114, 'mt73a69tsf65f2jn74jf927s5i'),
(363, 1636365118, 'mt73a69tsf65f2jn74jf927s5i'),
(364, 1636365129, 'mt73a69tsf65f2jn74jf927s5i'),
(365, 1636365134, 'mt73a69tsf65f2jn74jf927s5i'),
(366, 1636365142, 'mt73a69tsf65f2jn74jf927s5i'),
(367, 1636365174, 'mt73a69tsf65f2jn74jf927s5i'),
(368, 1636365276, 'mt73a69tsf65f2jn74jf927s5i'),
(369, 1636365291, 'mt73a69tsf65f2jn74jf927s5i'),
(370, 1636365295, 'mt73a69tsf65f2jn74jf927s5i'),
(371, 1636365303, 'mt73a69tsf65f2jn74jf927s5i'),
(372, 1636365331, 'mt73a69tsf65f2jn74jf927s5i'),
(373, 1636365352, 'mt73a69tsf65f2jn74jf927s5i'),
(374, 1636365378, 'mt73a69tsf65f2jn74jf927s5i'),
(375, 1636365451, 'mt73a69tsf65f2jn74jf927s5i'),
(376, 1636365474, 'mt73a69tsf65f2jn74jf927s5i'),
(377, 1636365495, 'mt73a69tsf65f2jn74jf927s5i'),
(378, 1636365657, 'mt73a69tsf65f2jn74jf927s5i'),
(379, 1636365696, 'mt73a69tsf65f2jn74jf927s5i'),
(380, 1636365793, 'mt73a69tsf65f2jn74jf927s5i'),
(381, 1636366256, 'mt73a69tsf65f2jn74jf927s5i'),
(382, 1636366263, 'mt73a69tsf65f2jn74jf927s5i'),
(383, 1636366266, 'mt73a69tsf65f2jn74jf927s5i'),
(384, 1636366267, 'mt73a69tsf65f2jn74jf927s5i'),
(385, 1636366269, 'mt73a69tsf65f2jn74jf927s5i'),
(386, 1636366274, 'mt73a69tsf65f2jn74jf927s5i'),
(387, 1636366274, 'mt73a69tsf65f2jn74jf927s5i'),
(388, 1636366276, 'mt73a69tsf65f2jn74jf927s5i'),
(389, 1636366870, 'mt73a69tsf65f2jn74jf927s5i'),
(390, 1636366873, 'mt73a69tsf65f2jn74jf927s5i'),
(391, 1636366876, 'mt73a69tsf65f2jn74jf927s5i'),
(392, 1636366876, 'mt73a69tsf65f2jn74jf927s5i'),
(393, 1636366877, 'mt73a69tsf65f2jn74jf927s5i'),
(394, 1636367155, 'mt73a69tsf65f2jn74jf927s5i'),
(395, 1636367162, 'mt73a69tsf65f2jn74jf927s5i'),
(396, 1636367190, 'mt73a69tsf65f2jn74jf927s5i'),
(397, 1636367212, 'mt73a69tsf65f2jn74jf927s5i'),
(398, 1636368047, 'mt73a69tsf65f2jn74jf927s5i'),
(399, 1636370403, 'mt73a69tsf65f2jn74jf927s5i'),
(400, 1636370423, 'mt73a69tsf65f2jn74jf927s5i'),
(401, 1636370428, 'mt73a69tsf65f2jn74jf927s5i'),
(402, 1636370441, 'mt73a69tsf65f2jn74jf927s5i'),
(403, 1636370469, 'mt73a69tsf65f2jn74jf927s5i'),
(404, 1636370496, 'mt73a69tsf65f2jn74jf927s5i'),
(405, 1636370502, 'mt73a69tsf65f2jn74jf927s5i'),
(406, 1636370516, 'mt73a69tsf65f2jn74jf927s5i'),
(407, 1636370535, 'mt73a69tsf65f2jn74jf927s5i'),
(408, 1636370543, 'mt73a69tsf65f2jn74jf927s5i'),
(409, 1636370574, 'mt73a69tsf65f2jn74jf927s5i'),
(410, 1636370580, 'mt73a69tsf65f2jn74jf927s5i'),
(411, 1636370588, 'mt73a69tsf65f2jn74jf927s5i'),
(412, 1636370603, 'mt73a69tsf65f2jn74jf927s5i'),
(413, 1636370638, 'mt73a69tsf65f2jn74jf927s5i'),
(414, 1636370659, 'mt73a69tsf65f2jn74jf927s5i'),
(415, 1636370675, 'mt73a69tsf65f2jn74jf927s5i'),
(416, 1636370691, 'mt73a69tsf65f2jn74jf927s5i'),
(417, 1636370707, 'mt73a69tsf65f2jn74jf927s5i'),
(418, 1636370722, 'mt73a69tsf65f2jn74jf927s5i'),
(419, 1636370734, 'mt73a69tsf65f2jn74jf927s5i'),
(420, 1636370871, 'mt73a69tsf65f2jn74jf927s5i'),
(421, 1636370873, 'mt73a69tsf65f2jn74jf927s5i'),
(422, 1636370893, 'mt73a69tsf65f2jn74jf927s5i'),
(423, 1636370898, 'mt73a69tsf65f2jn74jf927s5i'),
(424, 1636370971, 'mt73a69tsf65f2jn74jf927s5i'),
(425, 1636370976, 'mt73a69tsf65f2jn74jf927s5i'),
(426, 1636370985, 'mt73a69tsf65f2jn74jf927s5i'),
(427, 1636370994, 'mt73a69tsf65f2jn74jf927s5i'),
(428, 1636371152, 'mt73a69tsf65f2jn74jf927s5i'),
(429, 1636371154, 'mt73a69tsf65f2jn74jf927s5i'),
(430, 1636371167, 'mt73a69tsf65f2jn74jf927s5i'),
(431, 1636371171, 'mt73a69tsf65f2jn74jf927s5i'),
(432, 1636371174, 'mt73a69tsf65f2jn74jf927s5i'),
(433, 1636371176, 'mt73a69tsf65f2jn74jf927s5i'),
(434, 1636371177, 'mt73a69tsf65f2jn74jf927s5i'),
(435, 1636371177, 'mt73a69tsf65f2jn74jf927s5i'),
(436, 1636371183, 'mt73a69tsf65f2jn74jf927s5i'),
(437, 1636371185, 'mt73a69tsf65f2jn74jf927s5i'),
(438, 1636371187, 'mt73a69tsf65f2jn74jf927s5i'),
(439, 1636371187, 'mt73a69tsf65f2jn74jf927s5i'),
(440, 1636371187, 'mt73a69tsf65f2jn74jf927s5i'),
(441, 1636371190, 'mt73a69tsf65f2jn74jf927s5i'),
(442, 1636371190, 'mt73a69tsf65f2jn74jf927s5i'),
(443, 1636371203, 'mt73a69tsf65f2jn74jf927s5i'),
(444, 1636371220, 'mt73a69tsf65f2jn74jf927s5i'),
(445, 1636371257, 'mt73a69tsf65f2jn74jf927s5i'),
(446, 1636371271, 'mt73a69tsf65f2jn74jf927s5i'),
(447, 1636371274, 'mt73a69tsf65f2jn74jf927s5i'),
(448, 1636371276, 'mt73a69tsf65f2jn74jf927s5i'),
(449, 1636371278, 'mt73a69tsf65f2jn74jf927s5i'),
(450, 1636371464, 'mt73a69tsf65f2jn74jf927s5i'),
(451, 1636371467, 'mt73a69tsf65f2jn74jf927s5i'),
(452, 1636371470, 'mt73a69tsf65f2jn74jf927s5i'),
(453, 1636371767, 'mt73a69tsf65f2jn74jf927s5i'),
(454, 1636371780, 'mt73a69tsf65f2jn74jf927s5i'),
(455, 1636371796, 'mt73a69tsf65f2jn74jf927s5i'),
(456, 1636382020, 'mt73a69tsf65f2jn74jf927s5i'),
(457, 1636382030, 'mt73a69tsf65f2jn74jf927s5i'),
(458, 1636382039, 'mt73a69tsf65f2jn74jf927s5i'),
(459, 1636382043, 'mt73a69tsf65f2jn74jf927s5i'),
(460, 1636382086, 'mt73a69tsf65f2jn74jf927s5i'),
(461, 1636382093, 'mt73a69tsf65f2jn74jf927s5i'),
(462, 1636382105, 'mt73a69tsf65f2jn74jf927s5i'),
(463, 1636382113, 'mt73a69tsf65f2jn74jf927s5i'),
(464, 1636382123, 'mt73a69tsf65f2jn74jf927s5i'),
(465, 1636382128, 'mt73a69tsf65f2jn74jf927s5i'),
(466, 1636382135, 'mt73a69tsf65f2jn74jf927s5i'),
(467, 1636382141, 'mt73a69tsf65f2jn74jf927s5i'),
(468, 1636382144, 'mt73a69tsf65f2jn74jf927s5i'),
(469, 1636382152, 'mt73a69tsf65f2jn74jf927s5i'),
(470, 1636382168, 'mt73a69tsf65f2jn74jf927s5i'),
(471, 1636382175, 'mt73a69tsf65f2jn74jf927s5i'),
(472, 1636382204, 'mt73a69tsf65f2jn74jf927s5i'),
(473, 1636382208, 'mt73a69tsf65f2jn74jf927s5i'),
(474, 1636382220, 'mt73a69tsf65f2jn74jf927s5i'),
(475, 1636382226, 'mt73a69tsf65f2jn74jf927s5i'),
(476, 1636382234, 'mt73a69tsf65f2jn74jf927s5i'),
(477, 1636382243, 'mt73a69tsf65f2jn74jf927s5i'),
(478, 1636382247, 'mt73a69tsf65f2jn74jf927s5i'),
(479, 1636382251, 'mt73a69tsf65f2jn74jf927s5i'),
(480, 1636382254, 'mt73a69tsf65f2jn74jf927s5i'),
(481, 1636382257, 'mt73a69tsf65f2jn74jf927s5i'),
(482, 1636382306, 'mt73a69tsf65f2jn74jf927s5i'),
(483, 1636382312, 'mt73a69tsf65f2jn74jf927s5i'),
(484, 1636382435, 'mt73a69tsf65f2jn74jf927s5i'),
(485, 1636382435, 'mt73a69tsf65f2jn74jf927s5i'),
(486, 1636382436, 'mt73a69tsf65f2jn74jf927s5i'),
(487, 1636382437, 'mt73a69tsf65f2jn74jf927s5i'),
(488, 1636382444, 'mt73a69tsf65f2jn74jf927s5i'),
(489, 1636382449, 'mt73a69tsf65f2jn74jf927s5i'),
(490, 1636382452, 'mt73a69tsf65f2jn74jf927s5i'),
(491, 1636382456, 'mt73a69tsf65f2jn74jf927s5i'),
(492, 1636382458, 'mt73a69tsf65f2jn74jf927s5i'),
(493, 1636382463, 'mt73a69tsf65f2jn74jf927s5i'),
(494, 1636382481, 'mt73a69tsf65f2jn74jf927s5i'),
(495, 1636382536, 'mt73a69tsf65f2jn74jf927s5i'),
(496, 1636382546, 'mt73a69tsf65f2jn74jf927s5i'),
(497, 1636382557, 'mt73a69tsf65f2jn74jf927s5i'),
(498, 1636382647, 'mt73a69tsf65f2jn74jf927s5i'),
(499, 1636382648, 'mt73a69tsf65f2jn74jf927s5i'),
(500, 1636382667, 'mt73a69tsf65f2jn74jf927s5i'),
(501, 1636382680, 'mt73a69tsf65f2jn74jf927s5i'),
(502, 1636382699, 'mt73a69tsf65f2jn74jf927s5i'),
(503, 1636382729, 'mt73a69tsf65f2jn74jf927s5i'),
(504, 1636382741, 'mt73a69tsf65f2jn74jf927s5i'),
(505, 1636382745, 'mt73a69tsf65f2jn74jf927s5i'),
(506, 1636382752, 'mt73a69tsf65f2jn74jf927s5i'),
(507, 1636382762, 'mt73a69tsf65f2jn74jf927s5i'),
(508, 1636382802, 'mt73a69tsf65f2jn74jf927s5i'),
(509, 1636382824, 'mt73a69tsf65f2jn74jf927s5i'),
(510, 1636382846, 'mt73a69tsf65f2jn74jf927s5i'),
(511, 1636382891, 'mt73a69tsf65f2jn74jf927s5i'),
(512, 1636382930, 'mt73a69tsf65f2jn74jf927s5i'),
(513, 1636382941, 'mt73a69tsf65f2jn74jf927s5i'),
(514, 1636382941, 'mt73a69tsf65f2jn74jf927s5i'),
(515, 1636382969, 'mt73a69tsf65f2jn74jf927s5i'),
(516, 1636382978, 'mt73a69tsf65f2jn74jf927s5i'),
(517, 1636382986, 'mt73a69tsf65f2jn74jf927s5i'),
(518, 1636382993, 'mt73a69tsf65f2jn74jf927s5i'),
(519, 1636382999, 'mt73a69tsf65f2jn74jf927s5i'),
(520, 1636383002, 'mt73a69tsf65f2jn74jf927s5i'),
(521, 1636383002, 'mt73a69tsf65f2jn74jf927s5i'),
(522, 1636383013, 'mt73a69tsf65f2jn74jf927s5i'),
(523, 1636383023, 'mt73a69tsf65f2jn74jf927s5i'),
(524, 1636383037, 'mt73a69tsf65f2jn74jf927s5i'),
(525, 1636383089, 'mt73a69tsf65f2jn74jf927s5i'),
(526, 1636383099, 'mt73a69tsf65f2jn74jf927s5i'),
(527, 1636383283, 'mt73a69tsf65f2jn74jf927s5i'),
(528, 1636383323, 'mt73a69tsf65f2jn74jf927s5i'),
(529, 1636383329, 'mt73a69tsf65f2jn74jf927s5i'),
(530, 1636383335, 'mt73a69tsf65f2jn74jf927s5i'),
(531, 1636383351, 'mt73a69tsf65f2jn74jf927s5i'),
(532, 1636383380, 'mt73a69tsf65f2jn74jf927s5i'),
(533, 1636383394, 'mt73a69tsf65f2jn74jf927s5i'),
(534, 1636383409, 'mt73a69tsf65f2jn74jf927s5i'),
(535, 1636383415, 'mt73a69tsf65f2jn74jf927s5i'),
(536, 1636383460, 'mt73a69tsf65f2jn74jf927s5i'),
(537, 1636383493, 'mt73a69tsf65f2jn74jf927s5i'),
(538, 1636383512, 'mt73a69tsf65f2jn74jf927s5i'),
(539, 1636383670, 'mt73a69tsf65f2jn74jf927s5i'),
(540, 1636383728, 'mt73a69tsf65f2jn74jf927s5i'),
(541, 1636383776, 'mt73a69tsf65f2jn74jf927s5i'),
(542, 1636383858, 'mt73a69tsf65f2jn74jf927s5i'),
(543, 1636383858, 'mt73a69tsf65f2jn74jf927s5i'),
(544, 1636383878, 'mt73a69tsf65f2jn74jf927s5i'),
(545, 1636383895, 'mt73a69tsf65f2jn74jf927s5i'),
(546, 1636383909, 'mt73a69tsf65f2jn74jf927s5i'),
(547, 1636383924, 'mt73a69tsf65f2jn74jf927s5i'),
(548, 1636383924, 'mt73a69tsf65f2jn74jf927s5i'),
(549, 1636383930, 'mt73a69tsf65f2jn74jf927s5i'),
(550, 1636383935, 'mt73a69tsf65f2jn74jf927s5i'),
(551, 1636383942, 'mt73a69tsf65f2jn74jf927s5i'),
(552, 1636383952, 'mt73a69tsf65f2jn74jf927s5i'),
(553, 1636383967, 'mt73a69tsf65f2jn74jf927s5i'),
(554, 1636383973, 'mt73a69tsf65f2jn74jf927s5i'),
(555, 1636383982, 'mt73a69tsf65f2jn74jf927s5i'),
(556, 1636383991, 'mt73a69tsf65f2jn74jf927s5i'),
(557, 1636383997, 'mt73a69tsf65f2jn74jf927s5i'),
(558, 1636384001, 'mt73a69tsf65f2jn74jf927s5i'),
(559, 1636384004, 'mt73a69tsf65f2jn74jf927s5i'),
(560, 1636384015, 'mt73a69tsf65f2jn74jf927s5i'),
(561, 1636384025, 'mt73a69tsf65f2jn74jf927s5i'),
(562, 1636384061, 'mt73a69tsf65f2jn74jf927s5i'),
(563, 1636384127, 'mt73a69tsf65f2jn74jf927s5i'),
(564, 1636384138, 'mt73a69tsf65f2jn74jf927s5i'),
(565, 1636384157, 'mt73a69tsf65f2jn74jf927s5i'),
(566, 1636384172, 'mt73a69tsf65f2jn74jf927s5i'),
(567, 1636384343, 'mt73a69tsf65f2jn74jf927s5i'),
(568, 1636384343, 'mt73a69tsf65f2jn74jf927s5i'),
(569, 1636384360, 'mt73a69tsf65f2jn74jf927s5i'),
(570, 1636384380, 'mt73a69tsf65f2jn74jf927s5i'),
(571, 1636384386, 'mt73a69tsf65f2jn74jf927s5i'),
(572, 1636384391, 'mt73a69tsf65f2jn74jf927s5i'),
(573, 1636384450, 'mt73a69tsf65f2jn74jf927s5i'),
(574, 1636384451, 'mt73a69tsf65f2jn74jf927s5i'),
(575, 1636384484, 'mt73a69tsf65f2jn74jf927s5i'),
(576, 1636384499, 'mt73a69tsf65f2jn74jf927s5i'),
(577, 1636384522, 'mt73a69tsf65f2jn74jf927s5i'),
(578, 1636384536, 'mt73a69tsf65f2jn74jf927s5i'),
(579, 1636384553, 'mt73a69tsf65f2jn74jf927s5i'),
(580, 1636384563, 'mt73a69tsf65f2jn74jf927s5i'),
(581, 1636384592, 'mt73a69tsf65f2jn74jf927s5i'),
(582, 1636384624, 'mt73a69tsf65f2jn74jf927s5i'),
(583, 1636384691, 'mt73a69tsf65f2jn74jf927s5i'),
(584, 1636384740, 'mt73a69tsf65f2jn74jf927s5i'),
(585, 1636384752, 'mt73a69tsf65f2jn74jf927s5i'),
(586, 1636385147, 'mt73a69tsf65f2jn74jf927s5i'),
(587, 1636385220, 'mt73a69tsf65f2jn74jf927s5i'),
(588, 1636385234, 'mt73a69tsf65f2jn74jf927s5i'),
(589, 1636385273, 'mt73a69tsf65f2jn74jf927s5i'),
(590, 1636385284, 'mt73a69tsf65f2jn74jf927s5i'),
(591, 1636385288, 'mt73a69tsf65f2jn74jf927s5i'),
(592, 1636385327, 'mt73a69tsf65f2jn74jf927s5i'),
(593, 1636385337, 'mt73a69tsf65f2jn74jf927s5i'),
(594, 1636385472, 'mt73a69tsf65f2jn74jf927s5i'),
(595, 1636385492, 'mt73a69tsf65f2jn74jf927s5i'),
(596, 1636385504, 'mt73a69tsf65f2jn74jf927s5i'),
(597, 1636385516, 'mt73a69tsf65f2jn74jf927s5i'),
(598, 1636385516, 'mt73a69tsf65f2jn74jf927s5i'),
(599, 1636385526, 'mt73a69tsf65f2jn74jf927s5i'),
(600, 1636385570, 'mt73a69tsf65f2jn74jf927s5i'),
(601, 1636385593, 'mt73a69tsf65f2jn74jf927s5i'),
(602, 1636385617, 'mt73a69tsf65f2jn74jf927s5i'),
(603, 1636385628, 'mt73a69tsf65f2jn74jf927s5i'),
(604, 1636385707, 'mt73a69tsf65f2jn74jf927s5i'),
(605, 1636385763, 'mt73a69tsf65f2jn74jf927s5i'),
(606, 1636385763, 'mt73a69tsf65f2jn74jf927s5i'),
(607, 1636385806, 'mt73a69tsf65f2jn74jf927s5i'),
(608, 1636385806, 'mt73a69tsf65f2jn74jf927s5i'),
(609, 1636385807, 'mt73a69tsf65f2jn74jf927s5i'),
(610, 1636385812, 'mt73a69tsf65f2jn74jf927s5i'),
(611, 1636385868, 'mt73a69tsf65f2jn74jf927s5i'),
(612, 1636385869, 'mt73a69tsf65f2jn74jf927s5i'),
(613, 1636385875, 'mt73a69tsf65f2jn74jf927s5i'),
(614, 1636385876, 'mt73a69tsf65f2jn74jf927s5i'),
(615, 1636385881, 'mt73a69tsf65f2jn74jf927s5i'),
(616, 1636385889, 'mt73a69tsf65f2jn74jf927s5i'),
(617, 1636385957, 'mt73a69tsf65f2jn74jf927s5i'),
(618, 1636385963, 'mt73a69tsf65f2jn74jf927s5i'),
(619, 1636385968, 'mt73a69tsf65f2jn74jf927s5i'),
(620, 1636386000, 'mt73a69tsf65f2jn74jf927s5i'),
(621, 1636386008, 'mt73a69tsf65f2jn74jf927s5i'),
(622, 1636386009, 'mt73a69tsf65f2jn74jf927s5i'),
(623, 1636386018, 'mt73a69tsf65f2jn74jf927s5i'),
(624, 1636386018, 'mt73a69tsf65f2jn74jf927s5i'),
(625, 1636386020, 'mt73a69tsf65f2jn74jf927s5i'),
(626, 1636386043, 'mt73a69tsf65f2jn74jf927s5i'),
(627, 1636386046, 'mt73a69tsf65f2jn74jf927s5i'),
(628, 1636386051, 'mt73a69tsf65f2jn74jf927s5i'),
(629, 1636386051, 'mt73a69tsf65f2jn74jf927s5i'),
(630, 1636386051, 'mt73a69tsf65f2jn74jf927s5i'),
(631, 1636386062, 'mt73a69tsf65f2jn74jf927s5i'),
(632, 1636386065, 'mt73a69tsf65f2jn74jf927s5i'),
(633, 1636386105, 'mt73a69tsf65f2jn74jf927s5i'),
(634, 1636386523, 'mt73a69tsf65f2jn74jf927s5i'),
(635, 1636386614, 'mt73a69tsf65f2jn74jf927s5i'),
(636, 1636386623, 'mt73a69tsf65f2jn74jf927s5i'),
(637, 1636386708, 'mt73a69tsf65f2jn74jf927s5i'),
(638, 1636386718, 'mt73a69tsf65f2jn74jf927s5i'),
(639, 1636386792, 'mt73a69tsf65f2jn74jf927s5i'),
(640, 1636388045, 'mt73a69tsf65f2jn74jf927s5i'),
(641, 1636388049, 'mt73a69tsf65f2jn74jf927s5i'),
(642, 1636388055, 'mt73a69tsf65f2jn74jf927s5i'),
(643, 1636388055, 'mt73a69tsf65f2jn74jf927s5i'),
(644, 1636388055, 'mt73a69tsf65f2jn74jf927s5i'),
(645, 1636388061, 'mt73a69tsf65f2jn74jf927s5i'),
(646, 1636388065, 'mt73a69tsf65f2jn74jf927s5i'),
(647, 1636388066, 'mt73a69tsf65f2jn74jf927s5i'),
(648, 1636388070, 'mt73a69tsf65f2jn74jf927s5i'),
(649, 1636388072, 'mt73a69tsf65f2jn74jf927s5i'),
(650, 1636388176, 'mt73a69tsf65f2jn74jf927s5i'),
(651, 1636388178, 'mt73a69tsf65f2jn74jf927s5i'),
(652, 1636388180, 'mt73a69tsf65f2jn74jf927s5i'),
(653, 1636388183, 'mt73a69tsf65f2jn74jf927s5i'),
(654, 1636388184, 'mt73a69tsf65f2jn74jf927s5i'),
(655, 1636388214, 'mt73a69tsf65f2jn74jf927s5i'),
(656, 1636388379, 'mt73a69tsf65f2jn74jf927s5i'),
(657, 1636388382, 'mt73a69tsf65f2jn74jf927s5i'),
(658, 1636388396, 'mt73a69tsf65f2jn74jf927s5i'),
(659, 1636388399, 'mt73a69tsf65f2jn74jf927s5i'),
(660, 1636388400, 'mt73a69tsf65f2jn74jf927s5i'),
(661, 1636388402, 'mt73a69tsf65f2jn74jf927s5i'),
(662, 1636388404, 'mt73a69tsf65f2jn74jf927s5i'),
(663, 1636388406, 'mt73a69tsf65f2jn74jf927s5i'),
(664, 1636388734, '4o1jugj8rcaf35cc9phrtvlf0p'),
(665, 1636388739, '4o1jugj8rcaf35cc9phrtvlf0p'),
(666, 1636388778, '4o1jugj8rcaf35cc9phrtvlf0p'),
(667, 1636388781, '4o1jugj8rcaf35cc9phrtvlf0p'),
(668, 1636388786, '4o1jugj8rcaf35cc9phrtvlf0p'),
(669, 1636388788, '4o1jugj8rcaf35cc9phrtvlf0p'),
(670, 1636388789, '4o1jugj8rcaf35cc9phrtvlf0p'),
(671, 1636388791, '4o1jugj8rcaf35cc9phrtvlf0p'),
(672, 1636388821, '4o1jugj8rcaf35cc9phrtvlf0p'),
(673, 1636388823, '4o1jugj8rcaf35cc9phrtvlf0p'),
(674, 1636388824, '4o1jugj8rcaf35cc9phrtvlf0p'),
(675, 1636388826, '4o1jugj8rcaf35cc9phrtvlf0p'),
(676, 1636388827, '4o1jugj8rcaf35cc9phrtvlf0p'),
(677, 1636388828, '4o1jugj8rcaf35cc9phrtvlf0p'),
(678, 1636388830, '4o1jugj8rcaf35cc9phrtvlf0p'),
(679, 1636388831, '4o1jugj8rcaf35cc9phrtvlf0p'),
(680, 1636388832, '4o1jugj8rcaf35cc9phrtvlf0p'),
(681, 1636388835, '4o1jugj8rcaf35cc9phrtvlf0p'),
(682, 1636388836, '4o1jugj8rcaf35cc9phrtvlf0p'),
(683, 1636388837, '4o1jugj8rcaf35cc9phrtvlf0p'),
(684, 1636388858, 'mt73a69tsf65f2jn74jf927s5i'),
(685, 1636388866, 'mt73a69tsf65f2jn74jf927s5i'),
(686, 1636388870, 'mt73a69tsf65f2jn74jf927s5i'),
(687, 1636388871, 'mt73a69tsf65f2jn74jf927s5i'),
(688, 1636388873, 'mt73a69tsf65f2jn74jf927s5i'),
(689, 1636388874, 'mt73a69tsf65f2jn74jf927s5i'),
(690, 1636388875, 'mt73a69tsf65f2jn74jf927s5i'),
(691, 1636388876, 'mt73a69tsf65f2jn74jf927s5i'),
(692, 1636388877, 'mt73a69tsf65f2jn74jf927s5i'),
(693, 1636388909, 'mt73a69tsf65f2jn74jf927s5i'),
(694, 1636388914, 'mt73a69tsf65f2jn74jf927s5i'),
(695, 1636388927, 'mt73a69tsf65f2jn74jf927s5i'),
(696, 1636388931, 'mt73a69tsf65f2jn74jf927s5i'),
(697, 1636388937, 'mt73a69tsf65f2jn74jf927s5i'),
(698, 1636388938, 'mt73a69tsf65f2jn74jf927s5i'),
(699, 1636388943, 'mt73a69tsf65f2jn74jf927s5i'),
(700, 1636388964, 'mt73a69tsf65f2jn74jf927s5i'),
(701, 1636388967, 'mt73a69tsf65f2jn74jf927s5i'),
(702, 1636388968, 'mt73a69tsf65f2jn74jf927s5i'),
(703, 1636388970, 'mt73a69tsf65f2jn74jf927s5i'),
(704, 1636388972, 'mt73a69tsf65f2jn74jf927s5i'),
(705, 1636388983, 'mt73a69tsf65f2jn74jf927s5i'),
(706, 1636388983, 'mt73a69tsf65f2jn74jf927s5i'),
(707, 1636388985, 'mt73a69tsf65f2jn74jf927s5i'),
(708, 1636388987, 'mt73a69tsf65f2jn74jf927s5i'),
(709, 1636388989, 'mt73a69tsf65f2jn74jf927s5i'),
(710, 1636388991, 'mt73a69tsf65f2jn74jf927s5i'),
(711, 1636388993, 'mt73a69tsf65f2jn74jf927s5i'),
(712, 1636388996, 'mt73a69tsf65f2jn74jf927s5i'),
(713, 1636388997, 'mt73a69tsf65f2jn74jf927s5i'),
(714, 1636388998, 'mt73a69tsf65f2jn74jf927s5i'),
(715, 1636389000, 'mt73a69tsf65f2jn74jf927s5i'),
(716, 1636389002, 'mt73a69tsf65f2jn74jf927s5i'),
(717, 1636389011, 'mt73a69tsf65f2jn74jf927s5i'),
(718, 1636389013, 'mt73a69tsf65f2jn74jf927s5i'),
(719, 1636389015, 'mt73a69tsf65f2jn74jf927s5i'),
(720, 1636389020, 'mt73a69tsf65f2jn74jf927s5i'),
(721, 1636389020, 'mt73a69tsf65f2jn74jf927s5i'),
(722, 1636389025, 'mt73a69tsf65f2jn74jf927s5i'),
(723, 1636389030, 'mt73a69tsf65f2jn74jf927s5i'),
(724, 1636389036, 'mt73a69tsf65f2jn74jf927s5i'),
(725, 1636389038, 'mt73a69tsf65f2jn74jf927s5i'),
(726, 1636389040, 'mt73a69tsf65f2jn74jf927s5i'),
(727, 1636389046, 'mt73a69tsf65f2jn74jf927s5i'),
(728, 1636389046, 'mt73a69tsf65f2jn74jf927s5i'),
(729, 1636389049, 'mt73a69tsf65f2jn74jf927s5i'),
(730, 1636389055, 'mt73a69tsf65f2jn74jf927s5i'),
(731, 1636389055, 'mt73a69tsf65f2jn74jf927s5i'),
(732, 1636389225, 'mt73a69tsf65f2jn74jf927s5i'),
(733, 1636389403, 'mt73a69tsf65f2jn74jf927s5i'),
(734, 1636389407, 'mt73a69tsf65f2jn74jf927s5i'),
(735, 1636389407, 'mt73a69tsf65f2jn74jf927s5i'),
(736, 1636389409, 'mt73a69tsf65f2jn74jf927s5i'),
(737, 1636389412, 'mt73a69tsf65f2jn74jf927s5i'),
(738, 1636389414, 'mt73a69tsf65f2jn74jf927s5i'),
(739, 1636389423, 'mt73a69tsf65f2jn74jf927s5i'),
(740, 1636389496, 'mt73a69tsf65f2jn74jf927s5i'),
(741, 1636389546, 'mt73a69tsf65f2jn74jf927s5i'),
(742, 1636389550, 'mt73a69tsf65f2jn74jf927s5i'),
(743, 1636389567, 'mt73a69tsf65f2jn74jf927s5i'),
(744, 1636389604, 'mt73a69tsf65f2jn74jf927s5i'),
(745, 1636389686, 'mt73a69tsf65f2jn74jf927s5i'),
(746, 1636389688, 'mt73a69tsf65f2jn74jf927s5i'),
(747, 1636389690, 'mt73a69tsf65f2jn74jf927s5i'),
(748, 1636389692, 'mt73a69tsf65f2jn74jf927s5i');

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
(33, 'admin25', '17225f2346a7f6eaa6d6d92876d1cd72', 'dangtong0412@gmail.com', 963180, '0971109458', 1, 1),
(34, 'Test11', '17225f2346a7f6eaa6d6d92876d1cd72', 'openniceqn009@gmail.com', 893195, '0152626598', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usonline`
--

CREATE TABLE `usonline` (
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `usonline`
--

INSERT INTO `usonline` (`session`, `time`) VALUES
('mt73a69tsf65f2jn74jf927s5i', 1636389686),
('mt73a69tsf65f2jn74jf927s5i', 1636389688),
('mt73a69tsf65f2jn74jf927s5i', 1636389690),
('mt73a69tsf65f2jn74jf927s5i', 1636389692);

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
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sumconnect`
--
ALTER TABLE `sumconnect`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `myorder`
--
ALTER TABLE `myorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sumconnect`
--
ALTER TABLE `sumconnect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=749;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
