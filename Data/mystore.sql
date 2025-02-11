-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2024 lúc 03:37 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` varchar(100) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
('acer', 'Acer'),
('apple', 'Apple'),
('asus', 'Asus'),
('dell', 'Dell'),
('havit', 'Havit'),
('hp', 'HP'),
('lenovo', 'Lenovo'),
('msi', 'MSI'),
('nokia', 'Nokia'),
('oppo', 'Oppo'),
('samsung', 'Samsung'),
('sony', 'Sony'),
('xiaomi', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(100) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
('headphone', 'Headphone'),
('laptop', 'Laptop'),
('phone', 'Phone'),
('tivi', 'Tivi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `SOHD` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SL` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`SOHD`, `MASP`, `SL`) VALUES
(1, 1, 2),
(2, 5, 1),
(3, 8, 1),
(3, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctsp`
--

CREATE TABLE `ctsp` (
  `MASP` int(11) NOT NULL,
  `KichThuoc` text DEFAULT NULL,
  `CongNgheManHinh` text DEFAULT NULL,
  `DoPhanGiai` text DEFAULT NULL,
  `GPU` text DEFAULT NULL,
  `RAM` text DEFAULT NULL,
  `BoNhoTrong` text DEFAULT NULL,
  `Pin` text DEFAULT NULL,
  `OS` text DEFAULT NULL,
  `CPU` text DEFAULT NULL,
  `TrongLuong` text DEFAULT NULL,
  `ChatLieu` text DEFAULT NULL,
  `TDRaMat` text DEFAULT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctsp`
--

INSERT INTO `ctsp` (`MASP`, `KichThuoc`, `CongNgheManHinh`, `DoPhanGiai`, `GPU`, `RAM`, `BoNhoTrong`, `Pin`, `OS`, `CPU`, `TrongLuong`, `ChatLieu`, `TDRaMat`, `MoTa`) VALUES
(1, '6.9 inches', 'Super Retina XDR OLED', '2868 x 1320 pixels', 'GPU 6 lõi mới', '256 GB', '256 GB', NULL, 'iOS 18', 'CPU 6 lõi mới với 2 lõi hiệu năng và 4 lõi hiệu suất', '227 gram', 'Titanium', '09/2024', 'iPhone 16 Pro Max có màn hình OLED 6.9 inch, với công nghệ màn hình Super Retina XDR, camera gồm: ống kính Fusion 48MP và Ultra Wide 48MP và camera Telephoto 5x 12MP, kết hợp camera trước 12MP chụp hình sắc nét đến từng chi tiết nhỏ, ghi lại những khoảnh khắc bên gia đình. Chiếc điện thoại iPhone 16 mới này được trang bị chip A18 Pro với 6 lõi CPU và 6 lõi GPU cùng với Neural Engine 16 lõi.'),
(2, '6.8 inches', 'Dynamic AMOLED 2X', '1440 x 3088 pixels (QHD+)', 'Adreno 740', '12 GB', '512 GB', '5000 mAh', 'Android', '1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510', '233 g', 'Nhôm', '02/2023', 'Samsung Galaxy S23 Ultra 12GB 512GB tạo nên đột phá mạnh mẽ về mặt hiệu năng khi được trang bị vi xử lý Snapdragon 8 Gen 2 vượt trội cùng 12GB bộ nhớ RAM. Chất lượng hiển thị siêu sắc nét trên S23 Ultra tới từ tầm nền Dynamic AMOLED 2X 120Hz thế hệ mới. Bên cạnh đó, smartphone này còn sở hữu cụm camera cao cấp với độ rõ nét đạt tới 200MP. Viên pin 5000mAh cùng sạc nhanh 45W giúp nâng cao thời lượng sử dụng lên một tầm cao mới.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `SOHD` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NGHD` timestamp NOT NULL DEFAULT current_timestamp(),
  `TRIGIA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`SOHD`, `user_id`, `NGHD`, `TRIGIA`) VALUES
(1, 3, '2024-12-10 17:00:00', '68.580.000đ'),
(2, 3, '2024-12-10 17:00:00', '16.990.000đ'),
(3, 3, '2024-12-10 17:00:00', '11.080.000đ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `MASP` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `brand_id` varchar(100) NOT NULL,
  `TENSP` varchar(100) NOT NULL,
  `GIA` int(11) DEFAULT NULL,
  `DUNGLUONG` enum('128GB','32GB','64GB','256GB','None') NOT NULL,
  `DVT` enum('Cai','vnd') NOT NULL,
  `NUOCSX` enum('Vietnam','Japan','America','China','Korean') NOT NULL,
  `HINHANH` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`MASP`, `category_id`, `brand_id`, `TENSP`, `GIA`, `DUNGLUONG`, `DVT`, `NUOCSX`, `HINHANH`, `status`) VALUES
(1, 'phone', 'apple', 'iPhone 16 Pro Max', 34290000, '128GB', 'vnd', 'China', 'images/iphone-16-pro-max.png', 1),
(2, 'phone', 'samsung', 'Samsung Galaxy S24 Ultra', 27990000, '128GB', 'vnd', 'China', 'images/ss-s24-ultra222.png', 1),
(3, 'phone', 'apple', 'iPhone 13', 13450000, '128GB', 'Cai', 'China', 'images/iphone-13.png', 1),
(4, 'laptop', 'msi', 'Laptop MSI Modern 14 C13M-607VN', 14990000, '128GB', 'vnd', 'China', 'images/laptop-msi-modern14c13m.png', 1),
(5, 'laptop', 'msi', 'Laptop MSI Gaming GF63 Thin 11UC-1228VN', 16990000, '128GB', 'vnd', 'China', 'images/laptop-msi-gf63.png', 1),
(6, 'laptop', 'msi', 'Laptop MSI Prestige 14 AI Studio C1VEG-056VN', 32990000, '128GB', 'vnd', 'China', 'images/laptop-msi-prestige14.png', 1),
(7, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit TW948', 190000, 'None', 'vnd', 'China', 'images/headphone-havit-tw948.png', 1),
(8, 'phone', 'samsung', 'Samsung Galaxy A16 5G', 6090000, '128GB', 'Cai', 'China', 'images/samsung-a16-5g_2_.png', 1),
(9, 'phone', 'samsung', 'Samsung Galaxy A15', 4990000, '128GB', 'Cai', 'China', 'images/galaxy-a15-xanh-01.png', 1),
(10, 'phone', 'samsung', 'Samsung Galaxy Z Fold6', 43990000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-z-fold-6-xanh_5_.png', 1),
(11, 'phone', 'samsung', 'Samsung Galaxy S24 FE', 16990000, '128GB', 'Cai', 'China', 'images/dien-thoai-samsung-galaxy-s24-fe_3__4.png', 1),
(12, 'phone', 'samsung', 'Samsung Galaxy S23 Ultra', 36990000, '128GB', 'Cai', 'China', 'images/samsung-s23-ulatra_2_.png', 1),
(13, 'phone', 'samsung', 'Samsung Galaxy Z Flip6', 28990000, '128GB', 'Cai', 'China', 'images/ss_galaxy_zflip6.png', 1),
(14, 'phone', 'samsung', 'Samsung Galaxy S24 Plus', 26990000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-s24-plus.png', 1),
(15, 'phone', 'samsung', 'Samsung Galaxy M55', 11190000, '128GB', 'Cai', 'China', 'images/dien-thoai-samsung-galaxy-m55.png', 1),
(16, 'phone', 'samsung', 'Samsung Galaxy A55 5G', 9990000, '128GB', 'Cai', 'China', 'images/sm-a556_galaxy_a55.png', 1),
(17, 'phone', 'samsung', 'Samsung Galaxy S23', 22990000, '128GB', 'Cai', 'China', 'images/samsung-s23_1.png', 1),
(18, 'phone', 'samsung', 'Samsung Galaxy A25 5G', 6590000, '128GB', 'Cai', 'China', 'images/galaxy-a25-xanh-vang.png', 1),
(19, 'phone', 'samsung', 'Samsung Galaxy S23 FE', 14890000, '128GB', 'Cai', 'China', 'images/samsung-s23-fe.png', 1),
(20, 'phone', 'samsung', 'Samsung Galaxy A35', 8290000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-a35_8_.png', 1),
(21, 'phone', 'samsung', 'Samsung Galaxy A06', 3490000, '128GB', 'Cai', 'China', 'images/dien-thoai-samsung-galaxy-a06_1_.png', 1),
(22, 'phone', 'samsung', 'Samsung Galaxy A05S', 3990000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-a05sl.png', 1),
(23, 'phone', 'samsung', 'Samsung Galaxy Z Flip5', 29990000, '128GB', 'Cai', 'China', 'images/samsung-z-lip5_1__1.png', 1),
(24, 'phone', 'samsung', 'Samsung Galaxy S24', 22990000, '128GB', 'Cai', 'China', 'images/s24-p-thumb.png', 1),
(25, 'phone', 'samsung', 'Samsung Galaxy M14', 5290000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-m14.png', 1),
(26, 'phone', 'samsung', 'Samsung Galaxy Z Flip4', 23990000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-z-flip-4.png', 1),
(27, 'phone', 'samsung', 'Samsung Galaxy S22 Ultra', 30990000, '128GB', 'Cai', 'China', 'images/samsung-galaxy-s22-ultra_1.png', 1),
(28, 'phone', 'samsung', 'Samsung Galaxy A73', 12990000, '128GB', 'Cai', 'China', 'images/galaxy-a73-grey-001.png', 1),
(29, 'phone', 'samsung', 'Samsung Galaxy M34', 7990000, '128GB', 'Cai', 'China', 'images/ss-galaxy-m34.png', 1),
(30, 'phone', 'apple', 'iPhone 15 Pro Max', 29290000, '128GB', 'Cai', 'China', 'images/iphone-15-pro-max_3.png', 1),
(31, 'phone', 'apple', 'iPhone 14 Pro Max', 25590000, '128GB', 'Cai', 'China', 'images/iphone-14-pro_2__5.png', 1),
(32, 'phone', 'apple', 'iPhone 12 Pro Max', 23490000, '128GB', 'Cai', 'China', 'images/iphone-12.png', 1),
(33, 'phone', 'apple', 'iPhone 11', 10290000, '128GB', 'Cai', 'China', 'images/iphone-11.png', 1),
(34, 'phone', 'xiaomi', 'Xiaomi Redmi 14C', 3290000, '128GB', 'Cai', 'China', 'images/xiaomi_redmi_14c_5_.png', 1),
(35, 'phone', 'xiaomi', 'Xiaomi 14T', 13990000, '128GB', 'Cai', 'China', 'images/xiaomi_14t_2_.png', 1),
(36, 'phone', 'xiaomi', 'Xiaomi POCO X6 Pro', 9990000, '128GB', 'Cai', 'China', 'images/xiaomi_poco_x6_pro.png', 1),
(37, 'phone', 'xiaomi', 'Xiaomi Redmi Note 13 Pro Plus', 10990000, '128GB', 'Cai', 'China', 'images/xiaomi-redmi-note-13-pro-plus_9_.png', 1),
(38, 'phone', 'xiaomi', 'Xiaomi POCO M6', 4290000, '128GB', 'Cai', 'China', 'images/poco-m6_1_.png', 1),
(39, 'phone', 'xiaomi', 'Xiaomi 14 Ultra 5G', 32990000, '128GB', 'Cai', 'China', 'images/xiaomi-14-ultra_3.png', 1),
(40, 'phone', 'xiaomi', 'Xiaomi 13T Pro 5G', 16990000, '128GB', 'Cai', 'China', 'images/xiaomi-13-pro-thumb-xanh-la9.png', 1),
(41, 'phone', 'xiaomi', 'Xiaomi Redmi A3', 2990000, '128GB', 'Cai', 'China', 'images/xiaomi-redmi-a3-xanh-1.png', 1),
(42, 'phone', 'xiaomi', 'Xiaomi 12T Pro', 16990000, '128GB', 'Cai', 'China', 'images/xiaomi-12t-xanh_2.png', 1),
(43, 'phone', 'xiaomi', 'Xiaomi Redmi Note 11 Pro Plus 5G', 9990000, '128GB', 'Cai', 'China', 'images/11-pro-plus-blue.png', 1),
(44, 'phone', 'xiaomi', 'Xiaomi POCO M5', 4690000, '128GB', 'Cai', 'China', 'images/xiaomi-poco-m5.png', 1),
(45, 'phone', 'xiaomi', 'Xiaomi Redmi 10', 3650000, '128GB', 'Cai', 'China', 'images/xiaomi-10.png', 1),
(46, 'phone', 'xiaomi', 'Xiaomi Redmi 9A', 2490000, '128GB', 'Cai', 'China', 'images/redmi_9a.png', 1),
(47, 'phone', 'xiaomi', 'Xiaomi Redmi Note 13 Pro', 6390000, '128GB', 'Cai', 'China', 'images/xiaomi-redmi-note-13-pro-4g_13__1_3.png', 1),
(48, 'phone', 'oppo', 'OPPO Find X8', 22990000, '128GB', 'Cai', 'China', 'images/dien-thoai-oppo-find-x8-xam-1.png', 1),
(49, 'phone', 'oppo', 'OPPO A3', 4990000, '128GB', 'Cai', 'China', 'images/oppo-a3.png', 1),
(50, 'phone', 'oppo', 'OPPO Reno12 5G', 12990000, '128GB', 'Cai', 'China', 'images/oppo-reno12-5g.png', 1),
(51, 'phone', 'oppo', 'OPPO Reno12 F 5G', 9490000, '128GB', 'Cai', 'China', 'images/oppo-reno12-f-5g.png', 1),
(52, 'phone', 'oppo', 'OPPO Reno10 Pro+ 5G', 19990000, '128GB', 'Cai', 'China', 'images/oppo-reno10-pro-plus-tim.png', 1),
(53, 'phone', 'oppo', 'OPPO Reno10 5G', 10990000, '128GB', 'Cai', 'China', 'images/oppo-reno10.png', 1),
(54, 'phone', 'oppo', 'OPPO Find X5 Pro', 19990000, '128GB', 'Cai', 'China', 'images/oppo-find-x5-pro.png', 1),
(55, 'phone', 'oppo', 'OPPO A79 5G', 7490000, '128GB', 'Cai', 'China', 'images/oppo-a79-tim.png', 1),
(56, 'phone', 'oppo', 'OPPO A18', 3990000, '128GB', 'Cai', 'China', 'images/oppo-a18-den.png', 1),
(57, 'phone', 'oppo', 'OPPO Find N3', 44990000, '128GB', 'Cai', 'China', 'images/oppo-find-n3.png', 1),
(58, 'phone', 'oppo', 'OPPO A38', 4490000, '128GB', 'Cai', 'China', 'images/oppo-a38.png', 1),
(59, 'phone', 'oppo', 'OPPO Find X3 Pro 5G', 26990000, '128GB', 'Cai', 'China', 'images/oppo-find-x3-pro_1_1.png', 1),
(60, 'phone', 'oppo', 'OPPO Reno6 Z 5G', 9490000, '128GB', 'Cai', 'China', 'images/oppo_reno6.png', 1),
(61, 'phone', 'oppo', 'OPPO A17K', 3290000, '128GB', 'Cai', 'China', 'images/oppo-a17k.png', 1),
(62, 'phone', 'nokia', 'Nokia 110 4G Pro', 750000, '128GB', 'Cai', 'China', 'images/nokia-110-4g-pro_1__1.png', 1),
(63, 'phone', 'nokia', 'Nokia 220 4G', 990000, '128GB', 'Cai', 'China', 'images/nokia-220-4g_6_.png', 1),
(64, 'phone', 'nokia', 'Nokia HMD 105 4G', 650000, '128GB', 'Cai', 'China', 'images/nokia-hmd-105-4g_3_.png', 1),
(65, 'phone', 'nokia', 'Nokia 3210 4G', 1550000, '128GB', 'Cai', 'China', 'images/nokia-3210-4g.png', 1),
(66, 'phone', 'nokia', 'Nokia G22', 3990000, '128GB', 'Cai', 'China', 'images/nokia-g22.png', 1),
(67, 'laptop', 'acer', 'Laptop Acer Aspire 3 Spin 14', 14990000, '128GB', 'Cai', 'China', 'images/laptop-acer-aspire-3-spin-14.png', 1),
(68, 'laptop', 'acer', 'Laptop Gaming Acer Nitro 5 Tiger', 27990000, '128GB', 'Cai', 'China', 'images/laptop-acer-nitro-5-tiger.png', 1),
(69, 'laptop', 'acer', 'Laptop Acer Gaming Aspire 7', 23990000, '128GB', 'Cai', 'China', 'images/laptop-acer-aspire-7.png', 1),
(70, 'laptop', 'acer', 'Laptop Acer Gaming Aspire 5', 20490000, '128GB', 'Cai', 'China', 'images/laptop-acer-aspire-5.png', 1),
(71, 'laptop', 'acer', 'Laptop Gaming Acer Nitro 5', 23990000, '128GB', 'Cai', 'China', 'images/laptop-acer-nitro-5.png', 1),
(72, 'laptop', 'acer', 'Laptop Gaming Acer Nitro V', 21490000, '128GB', 'Cai', 'China', 'images/laptop-acer-nitro-V.png', 1),
(73, 'laptop', 'acer', 'Laptop Acer Aspire 3', 11990000, '128GB', 'Cai', 'China', 'images/laptop-acer-aspire-3.png', 1),
(74, 'laptop', 'acer', 'Laptop Acer Swift Lite 14 AI', 19990000, '128GB', 'Cai', 'China', 'images/laptop-acer-swift-lite-14-ai.png', 1),
(75, 'laptop', 'acer', 'Laptop Acer Aspire Lite', 14990000, '128GB', 'Cai', 'China', 'images/laptop-acer-aspire-lite.png', 1),
(76, 'laptop', 'apple', 'Apple MacBook Air M2 2024 8CPU', 24990000, '128GB', 'Cai', 'China', 'images/macbook-air-m2-2022.png', 1),
(77, 'laptop', 'apple', 'Apple MacBook Air M1', 22990000, '128GB', 'Cai', 'China', 'images/macbook-air-m1-2020.png', 1),
(78, 'laptop', 'apple', 'MacBook Air M3 13 inch 2024', 27990000, '128GB', 'Cai', 'China', 'images/macbook-air-m3-13-inch-2024.png', 1),
(79, 'laptop', 'apple', 'MacBook Pro 14 M3', 39990000, '128GB', 'Cai', 'China', 'images/macbook-pro-14-inch-m3-2023.png', 1),
(80, 'laptop', 'apple', 'MacBook Pro 14 M4 Pro', 49990000, '128GB', 'Cai', 'China', 'images/macbook-pro-14-inch-m4-pro.png', 1),
(81, 'laptop', 'apple', 'MacBook Pro 16 M3 Max', 102490000, '128GB', 'Cai', 'China', 'images/macbook-pro-16-inch-m3-max-2023.png', 1),
(82, 'laptop', 'apple', 'MacBook Air 15 inch M2 2023', 27990000, '128GB', 'Cai', 'China', 'images/macbook-air-15-inch-m2-2023.png', 1),
(83, 'laptop', 'apple', 'Apple MacBook Pro 13 Touch Bar M1', 41990000, '128GB', 'Cai', 'China', 'images/macbook-pro-13-inch-touch-bar-m1-2020.png', 1),
(84, 'laptop', 'asus', 'Laptop ASUS Vivobook 15', 16490000, '128GB', 'Cai', 'China', 'images/laptop-asus-vivobook-15.png', 1),
(85, 'laptop', 'asus', 'Laptop ASUS Vivobook 14', 20490000, '128GB', 'Cai', 'China', 'images/laptop-asus-vivobook-14.png', 1),
(86, 'laptop', 'asus', 'Laptop ASUS Vivobook GO 15', 14490000, '128GB', 'Cai', 'China', 'images/laptop-asus-vivobook-go-15.png', 1),
(87, 'laptop', 'asus', 'Laptop ASUS Gaming VivoBook', 25290000, '128GB', 'Cai', 'China', 'images/laptop-asus-gaming-vivobook.png', 1),
(88, 'laptop', 'asus', 'Laptop ASUS TUF Gaming F15', 25990000, '128GB', 'Cai', 'China', 'images/laptop-asus-tuf-gaming.png', 1),
(89, 'laptop', 'asus', 'Laptop ASUS TUF Gaming A15', 23490000, '128GB', 'Cai', 'China', 'images/laptop-asus-tuf-gaming-a15.png', 1),
(90, 'laptop', 'asus', 'Laptop ASUS Zenbook 14 Oled', 28990000, '128GB', 'Cai', 'China', 'images/laptop-asus-zenbook-14-oled.png', 1),
(91, 'laptop', 'asus', 'Laptop ASUS Vivobook S 15', 26990000, '128GB', 'Cai', 'China', 'images/laptop-asus-vivobook-s-15.png', 1),
(92, 'laptop', 'asus', 'Laptop ASUS ROG Strix G16', 38990000, '128GB', 'Cai', 'China', 'images/laptop-asus-rog-strix-g16.png', 1),
(93, 'laptop', 'dell', 'Laptop Dell Inspiron 15 3520', 13990000, '128GB', 'Cai', 'China', 'images/laptop-dell-inspiron-15.png', 1),
(94, 'laptop', 'dell', 'Laptop Dell Vostro 3520', 11990000, '128GB', 'Cai', 'China', 'images/laptop-dell-vostro-3520.png', 1),
(95, 'laptop', 'dell', 'Laptop Dell Latitude 3540', 18990000, '128GB', 'Cai', 'China', 'images/laptop-dell-latitude-3540.png', 1),
(96, 'laptop', 'dell', 'Laptop Dell Inspiron 15 3530', 22990000, '128GB', 'Cai', 'China', 'images/laptop-dell-inspiron-15-3530.png', 1),
(97, 'laptop', 'dell', 'Laptop Dell Latitude 5550', 32490000, '128GB', 'Cai', 'China', 'images/laptop-dell-latitude-5550.png', 1),
(98, 'laptop', 'dell', 'Laptop Dell Inspiron 14 5440', 28990000, '128GB', 'Cai', 'China', 'images/laptop-dell-inspiron-14-5440.png', 1),
(99, 'laptop', 'dell', 'Laptop Dell Inspiron 15 3525', 13990000, '128GB', 'Cai', 'China', 'images/laptop-dell-inspiron-15-3525.png', 1),
(100, 'laptop', 'hp', 'Laptop HP 15S-FQ5231TU', 11990000, '128GB', 'Cai', 'China', 'images/laptop-hp-15s-fq5231tu.png', 1),
(101, 'laptop', 'hp', 'Laptop HP Pavilion 15-EG2083TU', 19790000, '128GB', 'Cai', 'China', 'images/laptop-hp-15-EG2083TU.png', 1),
(102, 'laptop', 'hp', 'Laptop HP Pavilion X360 14-EK2017TU', 24990000, '128GB', 'Cai', 'China', 'images/laptop-hp-pavilion-x360-14-ek2017tu.png', 1),
(103, 'laptop', 'hp', 'Laptop HP Envy X360 2IN1 14-FC0162TU', 29890000, '128GB', 'Cai', 'China', 'images/laptop-hp-envy-x360-2in1-14-fc0162tu.png', 1),
(104, 'laptop', 'hp', 'Laptop HP 240 G9 9E5W3PT', 16990000, '128GB', 'Cai', 'China', 'images/laptop-hp-240-g9-9e5w3pt.png', 1),
(105, 'laptop', 'hp', 'Laptop HP Elitebook 630 G9 6M142PA', 19990000, '128GB', 'Cai', 'China', 'images/laptop-hp-elitebook-630-g9-6m142pa.png', 1),
(106, 'laptop', 'hp', 'Laptop HP 15 250 G8 85C69EA', 12990000, '128GB', 'Cai', 'China', 'images/laptop-hp-15-250-g8-85c69ea.png', 1),
(107, 'laptop', 'hp', 'Laptop HP Gaming Victus 15-FB1023AX 94F20PA', 24490000, '128GB', 'Cai', 'China', 'images/laptop-hp-gaming-victus-15-fb1023ax-94f20pa.png', 1),
(108, 'laptop', 'hp', 'Laptop HP Pavilion 15-EG3093TU 8C5L4PA', 21290000, '128GB', 'Cai', 'China', 'images/laptop-hp-pavilion-15-eg3093tu-8c5l4pa.png', 1),
(109, 'laptop', 'lenovo', 'Laptop Lenovo LOQ 15IAX9', 23990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-loq-15iax9.png', 1),
(110, 'laptop', 'lenovo', 'Laptop Lenovo IdeaPad Slim 5 14Q8X9', 24990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-ideapad-slim-5-14q8x9.png', 1),
(111, 'laptop', 'lenovo', 'Laptop Lenovo IdeaPad Slim 3 14IAH8', 15490000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-ideapad-slim-3-14iah8.png', 1),
(112, 'laptop', 'lenovo', 'Laptop Lenovo Legion 5 15IRX9', 37990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-legion-5-15irx9.png', 1),
(113, 'laptop', 'lenovo', 'Laptop Lenovo ThinkPad E14 GEN 5', 22990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-thinkpad-e14-gen-5.png', 1),
(114, 'laptop', 'lenovo', 'Laptop Lenovo IdeaPad 1 14ALC7', 11990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-ideapad-1-14alc7.png', 1),
(115, 'laptop', 'lenovo', 'Laptop Lenovo ThinkBook 16 G6 IRL', 20490000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-thinkbook-16-g6-irl.png', 1),
(116, 'laptop', 'lenovo', 'Laptop Lenovo Yoga Slim 7 15ILL9', 42990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-yoga-slim-7-15ill9.png', 1),
(117, 'laptop', 'lenovo', 'Laptop Lenovo Yoga Slim 7 14IMH9', 30990000, '128GB', 'Cai', 'China', 'images/laptop-lenovo-yoga-slim-7-14imh9.png', 1),
(118, 'laptop', 'msi', 'Laptop MSI Gaming Thin 15 B12UCX', 17990000, '128GB', 'Cai', 'China', 'images/laptop-msi-gaming-thin-15-b12ucx.png', 1),
(119, 'laptop', 'msi', 'Laptop MSI Gaming GF63 Thin 11UC', 20990000, '128GB', 'Cai', 'China', 'images/laptop-msi-gaming-gf63-thin-11uc.png', 1),
(120, 'laptop', 'msi', 'Laptop MSI Katana 15 B13VFK', 36990000, '128GB', 'Cai', 'China', 'images/laptop-msi-katana-15-b13vfk.png', 1),
(121, 'laptop', 'msi', 'Laptop MSI Gaming Thin 15 B13UC', 21990000, '128GB', 'Cai', 'China', 'images/laptop-msi-gaming-thin-15-b13uc.png', 1),
(122, 'laptop', 'msi', 'Laptop gaming MSI Thin A15 B7UCX', 18990000, '128GB', 'Cai', 'China', 'images/laptop-msi-gaming-thin-a15-b7ucx.png', 1),
(123, 'laptop', 'msi', 'Laptop MSI Gaming Bravo 15 C7VFK', 28990000, '128GB', 'Cai', 'China', 'images/laptop-msi-gaming-bravo-15-c7vfk.png', 1),
(124, 'laptop', 'msi', 'Laptop MSI Cyborg 15 A12UCX', 19990000, '128GB', 'Cai', 'China', 'images/laptop-msi-cyborg-15-a12ucx.png', 1),
(125, 'headphone', 'sony', 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 7990000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-wh-1000xm5.png', 1),
(126, 'headphone', 'sony', 'Tai nghe Bluetooth chụp tai Sony WH-CH520', 1290000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-wh-ch520.png', 1),
(127, 'headphone', 'sony', 'Tai nghe Bluetooth chụp tai Sony WH-1000XM4', 6690000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-wh-1000xm4.png', 1),
(128, 'headphone', 'sony', 'Tai nghe Bluetooth chụp tai Sony WH-CH720N', 2990000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-wh-ch720n.png', 1),
(129, 'headphone', 'sony', 'Tai nghe chụp tai Sony WH-ULT900N', 4490000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-wh-ult900n.png', 1),
(130, 'headphone', 'sony', 'Tai nghe Gaming chụp tai Sony Inzone H9', 5850000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-gaming-sony-inzone-h9.png', 1),
(131, 'headphone', 'sony', 'Tai nghe chụp tai Gaming Sony Inzone H3', 2290000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-gaming-sony-inzone-h3.png', 1),
(132, 'headphone', 'sony', 'Tai nghe chụp tai Sony MDR-ZX110AP', 590000, '128GB', 'Cai', 'China', 'images/sony-mdr-zx110ap.png', 1),
(133, 'headphone', 'sony', 'Tai nghe Gaming chụp tai không dây Sony INZONE H5', 3790000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-inzone-h5.png', 1),
(134, 'headphone', 'sony', 'Tai nghe Gaming chụp tai không dây Sony INZONE H5', 3790000, '128GB', 'Cai', 'China', 'images/tai-nghe-chup-tai-sony-inzone-h5.png', 1),
(135, 'headphone', 'apple', 'Tai nghe Bluetooth Apple AirPods 4', 3350000, 'None', 'Cai', 'China', 'images/apple-airpods-4.png', 1),
(136, 'headphone', 'apple', 'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C', 5690000, 'None', 'Cai', 'China', 'images/apple-airpods-pro-2-usb-c_1_.png', 1),
(137, 'headphone', 'apple', 'Tai nghe Bluetooth Apple AirPods 2', 2990000, 'None', 'Cai', 'China', 'images/apple-airpods-2.png', 1),
(138, 'headphone', 'apple', 'Tai nghe Bluetooth Apple AirPods 3 2022', 3590000, 'None', 'Cai', 'China', 'images/apple-airpods-3-2022.png', 1),
(139, 'headphone', 'apple', 'Tai nghe Bluetooth Apple AirPods 3 MagSafe', 3890000, 'None', 'Cai', 'China', 'images/apple-airpods-3.png', 1),
(140, 'headphone', 'apple', 'Tai nghe chụp tai chống ồn Apple AirPods Max 2024', 12990000, 'None', 'Cai', 'China', 'images/apple-airpods-max-1_1.png', 1),
(141, 'headphone', 'apple', 'TAI NGHE APPLE EARPODS CỔNG LIGHTNING', 500000, 'None', 'Cai', 'China', 'images/apple-airpods-lightning.png', 1),
(142, 'headphone', 'apple', 'Tai nghe chụp tai chống ồn Apple AirPods Max', 11990000, 'None', 'Cai', 'China', 'images/apple-airpods-max-2021.png', 1),
(143, 'headphone', 'apple', 'Tai nghe Apple EarPods USB-C', 550000, 'None', 'Cai', 'China', 'images/tai-nghe-apple-earpods-usb-c_1_.png', 1),
(144, 'headphone', 'samsung', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds2 Pro', 2590000, 'None', 'Cai', 'China', 'images/samsung-galaxy-buds-2-pro.png', 1),
(145, 'headphone', 'samsung', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 3 Pro', 5090000, 'None', 'Cai', 'China', 'images/tai-nghe-samsung-galaxy-buds-3-pro.png', 1),
(146, 'headphone', 'samsung', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds FE', 1390000, 'None', 'Cai', 'China', 'images/samsung-galaxy-buds-fe.png', 1),
(147, 'headphone', 'samsung', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 3', 3590000, 'None', 'Cai', 'China', 'images/samsung-galaxy-buds-3.png', 1),
(148, 'headphone', 'samsung', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds2 Pro', 2590000, 'None', 'Cai', 'China', 'images/samsung-galaxy-buds-2-pro-da-kich-hoat.png', 1),
(149, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Xiaomi Redmi Buds 6 Active', 490000, 'None', 'Cai', 'China', 'images/tai-nghe-bluetooth-xiaomi-redmi-buds-6-active-spa.png', 1),
(150, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Redmi Buds 4 Lite', 390000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-xiaomi-redmi-buds-4-lite.png', 1),
(151, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Xiaomi Redmi Buds 5', 990000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-xiaomi-redmi-buds-5.png', 1),
(152, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Xiaomi Redmi Buds 5 Pro', 1790000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-xiaomi-redmi-buds-5-pro.png', 1),
(153, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Xiaomi Buds 5', 2190000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-xiaomi-buds-5.png', 1),
(154, 'headphone', 'xiaomi', 'Tai nghe Xiaomi Mi Basic Chính hãng', 140000, 'None', 'Cai', 'China', 'images/tai-nghe-xiaomi-mi-basic-chinh-hang.png', 1),
(155, 'headphone', 'xiaomi', 'Tai nghe có dây Xiaomi Type-C', 169000, 'None', 'Cai', 'China', 'images/tai-nghe-co-day-xiaomi-type-c.png', 1),
(156, 'headphone', 'xiaomi', 'Tai nghe thể thao Xiaomi Openwear Stereo', 2590000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-xiaomi-openwear-stereo.png', 1),
(157, 'headphone', 'xiaomi', 'Tai nghe Bluetooth True Wireless Xiaomi Buds 3T Pro', 1690000, 'None', 'Cai', 'China', 'images/buds_3t_pro_2.png', 1),
(158, 'headphone', 'asus', 'Tai nghe Bluetooth True Wireless Gaming ROG Cetra', 1590000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-rog-cetra.png', 1),
(159, 'headphone', 'asus', 'Tai nghe có dây Gaming ASUS ROG Cetra II Core', 840000, 'None', 'Cai', 'China', 'images/tai-nghe-rog-cetra-ii-core.png', 1),
(160, 'headphone', 'asus', 'Tai nghe chụp tai Gaming Asus TUF H1', 740000, 'None', 'Cai', 'China', 'images/tai-nghe-chup-tai-asus-tuf-h1.png', 1),
(161, 'headphone', 'asus', 'Tai nghe chụp tai ASUS TUF Gaming H3', 2290000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-asus-tuf-gaming-h3.png', 1),
(162, 'headphone', 'asus', 'Tai nghe chụp tai Gaming ASUS ROG Delta S Core', 1590000, 'None', 'Cai', 'China', 'images/tai-nghe-gaming-asus-rog-deltra-s-core.png', 1),
(163, 'headphone', 'asus', 'Tai nghe Bluetooth True Wireless Gaming Asus Rog Cetra SpeedNova', 4790000, 'None', 'Cai', 'China', 'images/tai-nghe-asus-rog-cetra-tws-speednova_10_.png', 1),
(164, 'headphone', 'havit', 'Tai nghe Bluetooth chụp tai Havit H630BT', 390000, 'None', 'Cai', 'China', 'images/tai-nghe-chup-tai-havit-h630bt.png', 1),
(165, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit TW981', 190000, 'None', 'Cai', 'China', 'images/tai-nghe-bluetooth-havit-tw981_1_.png', 1),
(166, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit TW969', 199000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-havit-tw969.png', 1),
(167, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit 982', 290000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-havit-tw982.png', 1),
(168, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit 931', 249000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-havit-tw-931_5_.png', 1),
(169, 'headphone', 'havit', 'Tai nghe chụp tai có dây Gaming Havit H2040D', 320000, 'None', 'Cai', 'China', 'images/tai-nghe-gaming-havit-h2040d_1_.png', 1),
(170, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit TW958 Pro', 550000, 'None', 'Cai', 'China', 'images/tai-nghe-khong-day-havit-tw958-pro_1_.png', 1),
(171, 'headphone', 'havit', 'Tai nghe Bluetooth chụp tai Havit H655BT', 730000, 'None', 'Cai', 'China', 'images/tai-nghe-chup-tai-havit-h665t_12_.png', 1),
(172, 'tivi', 'samsung', 'Smart Tivi Samsung QLED 4K 50 inch 2024 (50Q60D)', 11490000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-qled-50q60d-4k-50-inch-2024.1.png', 1),
(173, 'tivi', 'samsung', 'Smart Tivi Samsung UHD 4K 43 inch UA43AU7002', 6690000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-uhd-4k-43-inch-ua43au7002.png', 1),
(174, 'tivi', 'samsung', 'Smart Tivi Samsung UHD 4K 55 INCH 2024 (55DU8000)', 10490000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-uhd-55du8000-4k-55-inch-2024.png', 1),
(175, 'tivi', 'samsung', 'Smart Tivi Samsung UHD 4K 65 INCH 2024 (65DU8000)', 13190000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-uhd-65du8000-4k-65-inch-2024.png', 1),
(176, 'tivi', 'samsung', 'Smart Tivi Samsung Crystal UHD 55 Inch (55BU8000)', 10290000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-crystal-uhd-55-inch-55bu8000.png', 1),
(177, 'tivi', 'samsung', 'Smart Tivi Samsung khung tranh 4K 55 inch 2024 (55LS03D)', 21490000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-khung-tranh-55ls03d-4k-55-inch-2024.png', 1),
(178, 'tivi', 'samsung', 'Smart Tivi Samsung QLED 75 inch (75Q60BAK)', 18490000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-qled-75-inch-75q60bak.png', 1),
(179, 'tivi', 'samsung', 'Smart Tivi Samsung Crystal UHD 85 inch (85BU8000)', 26190000, 'None', 'Cai', 'China', 'images/smart-tivi-samsung-crystal-uhd-85-inch-85bu8000.png', 1),
(180, 'tivi', 'xiaomi', 'Tivi Xiaomi A Pro 4K 43 inch QLED 2025', 6490000, 'None', 'Cai', 'China', 'images/smart_tivi_qned_lg_4k_75_inch_75qned86sra.png', 1),
(181, 'tivi', 'xiaomi', 'Tivi Xiaomi A 4K 2025 55 inch', 8490000, 'None', 'Cai', 'China', 'images/tivi-xiaomi-a-55-inch-4k-2025.png', 1),
(182, 'tivi', 'xiaomi', 'Tivi Xiaomi A Pro 4K 55 inch QLED 2025', 9490000, 'None', 'Cai', 'China', 'images/tivi-xiaomi-qled-a-pro-55-inch-4k-2025.png', 1),
(183, 'tivi', 'xiaomi', 'Tivi Xiaomi A Pro 4K 65 inch QLED 2025', 12730000, 'None', 'Cai', 'China', 'images/tivi-xiaomi-qled-a-pro-65-inch-4k-2025.png', 1),
(184, 'tivi', 'xiaomi', 'Tivi Xiaomi A 32 inch HD', 3990000, 'None', 'Cai', 'China', 'images/tivi-xiaomi-a-32-inch-hd.png', 1),
(185, 'tivi', 'xiaomi', 'Tivi Xiaomi A FHD 43 inch 2025', 5490000, 'None', 'Cai', 'China', 'images/tivi-xiaomi-a-43-inch-fhd-2025.png', 1),
(186, 'tivi', 'xiaomi', 'Xiaomi Smart Display S Mini LED 55 inch 2025', 15990000, 'None', 'Cai', 'China', 'images/google-tivi-xiaomi-s-mini-led-55-inch-2025.png', 1),
(187, 'tivi', 'xiaomi', 'Xiaomi Max 2025 85 N36V', 31990000, 'None', 'Cai', 'China', 'images/google-tivi-xiaomi-max-85-inch-n36v-2025.png', 1),
(188, 'tivi', 'sony', 'Smart Tivi Sony 4K 55 inch KD-55X75K', 12890000, 'None', 'Cai', 'China', 'images/smart-tivi-sony-4k-55-inch-kd-55x75k.png', 1),
(189, 'tivi', 'sony', 'Smart Tivi Sony 4K 65 inch KD-65X75K', 15490000, 'None', 'Cai', 'China', 'images/smart_tivi_samsung_qled_55_inch_55q60bak_1_.png', 1),
(190, 'tivi', 'sony', 'Google Tivi Sony 4K 50 inch (K-50S30)', 15690000, 'None', 'Cai', 'China', 'images/google-tivi-sony-k-50s30-4k-50-inch.png', 1),
(191, 'tivi', 'sony', 'Google Tivi Sony 4K 65 inch KD-65X80L', 19790000, 'None', 'Cai', 'China', 'images/google-tivi-sony-kd-65x80l-4k-65-inch.png', 1),
(192, 'tivi', 'sony', 'Google Tivi Sony 4K 75 inch KD-75X80L', 27990000, 'None', 'Cai', 'China', 'images/google-tivi-sony-kd-75x80l-4k-75-inch_6_.png', 1),
(193, 'tivi', 'sony', 'Google Tivi OLED Sony 4K 48 inch XR-48A90K', 32900000, 'None', 'Cai', 'China', 'images/google-tivi-oled-sony-xr-48a90k-4k-48-inch_4_.png', 1),
(194, 'tivi', 'sony', 'Google Tivi OLED Sony 4K 55 inch XR-55A80L', 39990000, 'None', 'Cai', 'China', 'images/google-tivi-oled-sony-xr-55a80l-4k-55-inch_8_.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraccount`
--

CREATE TABLE `useraccount` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ngay_dk` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_perr` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `useraccount`
--

INSERT INTO `useraccount` (`user_id`, `user_name`, `user_password`, `ho_ten`, `sdt`, `ngay_dk`, `admin_perr`) VALUES
(2, 'dat02', 'dat02', 'leducdat', NULL, '2024-12-03 17:00:00', 1),
(3, 'dat03', 'dat03', '', '0987654321', '2024-12-05 09:08:12', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `MASP` (`MASP`),
  ADD KEY `SOHD` (`SOHD`);

--
-- Chỉ mục cho bảng `ctsp`
--
ALTER TABLE `ctsp`
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`SOHD`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `SOHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sp`
--
ALTER TABLE `sp`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sp` (`MASP`),
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`SOHD`) REFERENCES `hoadon` (`SOHD`);

--
-- Các ràng buộc cho bảng `ctsp`
--
ALTER TABLE `ctsp`
  ADD CONSTRAINT `ctsp_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sp` (`MASP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `useraccount` (`user_id`);

--
-- Các ràng buộc cho bảng `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `sp_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `sp_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
