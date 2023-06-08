-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2023 lúc 06:46 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobilestore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`idBanner`, `name`, `url`, `visible`) VALUES
(3, 'thangoppo.jpeg', 'static/image/banner/thangoppo.jpeg', 1),
(4, 'redminote8.png', 'static/image/banner/redminote8.png', 1),
(5, 'banner-20-11.png', 'static/image/banner/banner-20-11.png', 1),
(15, 'banner111.jpeg', 'static/image/banner/banner111.jpeg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idBinhLuan` int(11) NOT NULL,
  `ngayTao` date DEFAULT '1990-01-01',
  `noiDung` varchar(100) DEFAULT NULL,
  `soSao` float UNSIGNED DEFAULT 0,
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmuahang`
--

CREATE TABLE `chitietmuahang` (
  `idChiTiet` int(11) NOT NULL,
  `soLuong` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `soLuongTraLai` int(10) UNSIGNED DEFAULT 0,
  `thanhTien` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ghiChu` varchar(200) DEFAULT NULL,
  `donmuahang_idDonHang` int(11) NOT NULL,
  `mobile_idMobile` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietmuahang`
--

INSERT INTO `chitietmuahang` (`idChiTiet`, `soLuong`, `soLuongTraLai`, `thanhTien`, `ghiChu`, `donmuahang_idDonHang`, `mobile_idMobile`) VALUES
(6, 2, 0, 12980000, NULL, 13, 13),
(7, 3, 0, 63570000, NULL, 13, 11),
(8, 2, 0, 65980000, NULL, 14, 8),
(9, 1, 0, 21190000, NULL, 15, 11),
(10, 1, 0, 42990000, NULL, 16, 3),
(11, 1, 0, 36990000, NULL, 16, 4),
(12, 1, 0, 30490000, NULL, 16, 10),
(13, 2, 0, 12980000, NULL, 17, 13),
(14, 1, 0, 21190000, NULL, 18, 11),
(15, 1, 0, 36990000, NULL, 19, 4),
(16, 1, 0, 30490000, NULL, 20, 10),
(17, 1, 0, 6490000, NULL, 21, 13),
(18, 2, 0, 12980000, NULL, 22, 13),
(19, 1, 0, 42990000, NULL, 22, 3),
(20, 1, 0, 43990000, NULL, 23, 2),
(21, 1, 0, 39990000, NULL, 23, 6),
(22, 1, 0, 30490000, NULL, 23, 10),
(23, 1, 0, 16990000, NULL, 24, 12),
(24, 1, 0, 6490000, NULL, 24, 13),
(25, 2, 0, 73980000, NULL, 25, 4),
(26, 1, 0, 21190000, NULL, 26, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donmuahang`
--

CREATE TABLE `donmuahang` (
  `idDonHang` int(11) NOT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `ngayThanhToan` datetime DEFAULT NULL,
  `diaChiNhanHang` varchar(100) NOT NULL,
  `trangThaiDonHang` varchar(30) NOT NULL,
  `loaiDonHang` varchar(45) NOT NULL,
  `tongTien` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `biHuy` varchar(45) DEFAULT NULL,
  `ghiChu` varchar(200) DEFAULT NULL,
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL,
  `nhanvien_idNhanVien` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donmuahang`
--

INSERT INTO `donmuahang` (`idDonHang`, `ngayTao`, `ngayThanhToan`, `diaChiNhanHang`, `trangThaiDonHang`, `loaiDonHang`, `tongTien`, `biHuy`, `ghiChu`, `khachhang_idKhachHang`, `nhanvien_idNhanVien`) VALUES
(13, '2019-12-08 23:28:42', NULL, '112 Goc De, Minh Khai, Ha Noi', 'chưa phê duyệt', 'xuất hàng', 76550000, '0', NULL, 35, NULL),
(14, '2019-12-08 23:38:06', NULL, 'Minh Khai, Hai Bà Trưng, Hà Nội', 'đã phê duyệt', 'xuất hàng', 65980000, '0', NULL, 35, NULL),
(15, '2019-12-08 23:44:26', NULL, 'Dũng Nghĩa, Vũ Thư, Thái Bình ', 'chưa phê duyệt', 'xuất hàng', 21190000, '0', NULL, 35, NULL),
(16, '2019-12-08 23:49:50', NULL, 'Cổng ký túc xá Đại học Bách Khoa Hà Nội', 'chưa phê duyệt', 'xuất hàng', 110470000, '0', NULL, 38, NULL),
(17, '2019-12-08 23:58:30', NULL, '204 Đê La Thành, Thổ Quan, Hà Nội', 'đang giao hàng', 'xuất hàng', 12980000, '0', NULL, 38, 34),
(18, '2019-12-09 00:00:00', NULL, 'Đại học xây dựng Hà Nội ', 'đã phê duyệt', 'xuất hàng', 21190000, '0', NULL, 38, NULL),
(19, '2019-12-09 00:02:46', '2019-12-26 01:10:18', 'Cầu vượt Đại học Kinh Tế Quốc Dân, Hà Nội ', 'đã thanh toán', 'xuất hàng', 36990000, '0', NULL, 38, 35),
(20, '2019-12-09 00:13:06', NULL, '112 Đội Cấn, Vĩnh Phúc', 'đang giao hàng', 'xuất hàng', 30490000, '0', NULL, 40, 35),
(21, '2019-12-26 04:28:57', NULL, '322 Lê Trong Tấn, Hoàng Mai, Hà Nội', 'đã phê duyệt', 'xuất hàng', 6490000, '0', NULL, 42, NULL),
(22, '2019-12-26 13:07:34', NULL, '322 Lê Trong Tấn, Hoàng Mai, Hà Nội', 'chưa phê duyệt', 'xuất hàng', 55970000, '0', NULL, 42, NULL),
(23, '2019-12-26 13:18:16', NULL, 'Thanh Hóa', 'chưa phê duyệt', 'xuất hàng', 114470000, '0', NULL, 45, NULL),
(24, '2019-12-26 13:19:07', NULL, 'Đại học Bách khoa Hà Nội', 'đã phê duyệt', 'xuất hàng', 23480000, '0', NULL, 45, NULL),
(25, '2019-12-26 13:22:45', NULL, 'Nam Trực-Nam Định', 'đang giao hàng', 'xuất hàng', 73980000, '0', NULL, 46, 34),
(26, '2019-12-26 13:23:54', NULL, 'Nam Định', 'chưa phê duyệt', 'xuất hàng', 21190000, '0', NULL, 46, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL,
  `ngaytao` date DEFAULT '1990-01-01',
  `soLuongSP` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`khachhang_idKhachHang`, `ngaytao`, `soLuongSP`) VALUES
(35, '2019-12-07', 0),
(38, '2019-12-08', 0),
(39, '2019-12-08', 0),
(40, '2019-12-09', 0),
(41, '2019-12-15', 0),
(42, '2019-12-26', 0),
(45, '2019-12-26', 0),
(46, '2019-12-26', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang_has_mobile`
--

CREATE TABLE `giohang_has_mobile` (
  `id` int(11) NOT NULL,
  `soLuong` int(10) UNSIGNED DEFAULT 0,
  `ngayThem` datetime NOT NULL DEFAULT '1990-01-01 00:00:00',
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `giohang_khachhang_idKhachHang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang_has_mobile`
--

INSERT INTO `giohang_has_mobile` (`id`, `soLuong`, `ngayThem`, `mobile_idMobile`, `giohang_khachhang_idKhachHang`) VALUES
(45, 3, '2019-12-08 12:00:17', 11, 39),
(48, 1, '2019-12-09 20:40:51', 13, 35),
(49, 1, '2019-12-15 15:44:35', 7, 35),
(50, 1, '2019-12-15 18:29:37', 10, 35),
(51, 1, '2019-12-15 18:39:55', 3, 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `idHinhAnh` int(11) NOT NULL,
  `tenAnh` varchar(50) DEFAULT NULL,
  `url` varchar(300) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL,
  `logo` int(11) DEFAULT 0,
  `Mobile_idMobile` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`idHinhAnh`, `tenAnh`, `url`, `moTa`, `logo`, `Mobile_idMobile`) VALUES
(4, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 1),
(5, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 1),
(6, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 1),
(7, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 1),
(8, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 1),
(14, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 2),
(15, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 2),
(16, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 2),
(17, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 2),
(18, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 2),
(19, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 3),
(20, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 3),
(21, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 3),
(22, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 3),
(23, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 3),
(24, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 4),
(25, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 4),
(26, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 4),
(27, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 4),
(28, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 4),
(29, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 5),
(30, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 5),
(31, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 5),
(32, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 5),
(33, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 5),
(34, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 6),
(35, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 6),
(36, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 6),
(37, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 6),
(38, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 6),
(39, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 7),
(40, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 7),
(41, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 7),
(42, 'iphone-11-pro-max-xam-6-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-6-org.jpg', '', 0, 7),
(43, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 7),
(44, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 8),
(45, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 8),
(46, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 8),
(47, 'iphone-11-pro-max-xam-8-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-8-org.jpg', '', 0, 8),
(48, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 8),
(49, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 9),
(50, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 9),
(51, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 9),
(52, 'iphone-11-pro-max-xam-8-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-8-org.jpg', '', 0, 9),
(53, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 9),
(54, 'iphone-xs-max-256gb.jpg', 'static/image/mobile/iphone-xs-max-256gb.jpg', '', 1, 10),
(55, 'iphone-xs-max-256gb-mau-bac-1-1-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-1-1-org.jpg', '', 0, 10),
(56, 'iphone-xs-max-256gb-mau-bac-4-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-4-org.jpg', '', 0, 10),
(57, 'iphone-xs-max-256gb-mau-bac-9-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-9-org.jpg', '', 0, 10),
(58, 'iphone-xs-max-256gb-mau-bac-10-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-10-org.jpg', '', 0, 10),
(59, 'sieu-pham-galaxy-s-moi-2-512gb-black-600x600.jpg', 'static/image/mobile/sieu-pham-galaxy-s-moi-2-512gb-black-600x600.jpg', '', 1, 11),
(60, 'samsung-galaxy-s10-plus-512gb-den-1-1-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-1-1-org.jpg', '', 0, 11),
(61, 'samsung-galaxy-s10-plus-512gb-den-4-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-4-org.jpg', '', 0, 11),
(62, 'samsung-galaxy-s10-plus-512gb-den-10-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-10-org.jpg', '', 0, 11),
(63, 'samsung-galaxy-s10-plus-512gb-den-12-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-12-org.jpg', '', 0, 11),
(64, 'oppo-reno-10x-zoom-edition.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition.jpg', '', 1, 12),
(65, 'oppo-reno-10x-zoom-edition-den-1-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-1-org.jpg', '', 0, 12),
(66, 'oppo-reno-10x-zoom-edition-den-4-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-4-org.jpg', '', 0, 12),
(67, 'oppo-reno-10x-zoom-edition-den-13-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-13-org.jpg', '', 0, 12),
(68, 'oppo-reno-10x-zoom-edition-den-11-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-11-org.jpg', '', 0, 12),
(69, 'xiaomi-mi-9-se.jpg', 'static/image/mobile/xiaomi-mi-9-se.jpg', '', 1, 13),
(70, 'xiaomi-mi-9-se-xanh-1-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-1-org.jpg', '', 0, 13),
(71, 'xiaomi-mi-9-se-xanh-4-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-4-org.jpg', '', 0, 13),
(72, 'xiaomi-mi-9-se-xanh-9-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-9-org.jpg', '', 0, 13),
(73, 'xiaomi-mi-9-se-xanh-11-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-11-org.jpg', '', 0, 13),
(84, 'oppo-a5-2020-128gb-black-600x600.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-black-600x600.jpg', NULL, 1, 16),
(85, 'oppo-a5-2020-128gb-den-1-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-1-org.jpg', NULL, 0, 16),
(86, 'oppo-a5-2020-128gb-den-4-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-4-org.jpg', NULL, 0, 16),
(87, 'oppo-a5-2020-128gb-den-5-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-5-org.jpg', NULL, 0, 16),
(88, 'oppo-a5-2020-128gb-den-12-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-12-org.jpg', NULL, 0, 16),
(89, 'anh-chinh-Oppo-Reno2-Z-1-600x600.png', 'static/image/mobile/OPPOReno2/anh-chinh-Oppo-Reno2-Z-1-600x600.png', NULL, 1, 17),
(90, 'anh-phu2_2oppo-reno2.jpg', 'static/image/mobile/OPPOReno2/anh-phu2_2oppo-reno2.jpg', NULL, 0, 17),
(91, 'anh-phu4_1oppo-reno2.jpg', 'static/image/mobile/OPPOReno2/anh-phu4_1oppo-reno2.jpg', NULL, 0, 17),
(92, 'anh-phu3_oppo-reno-2.jpg', 'static/image/mobile/OPPOReno2/anh-phu3_oppo-reno-2.jpg', NULL, 0, 17),
(93, 'rsz_1anh_phu_1-_oppo-_reno2.jpg', 'static/image/mobile/OPPOReno2/rsz_1anh_phu_1-_oppo-_reno2.jpg', NULL, 0, 17),
(94, 'anh-chinh-oppo-a9.png', 'static/image/mobile/OppoA92020/anh-chinh-oppo-a9.png', NULL, 1, 18),
(95, 'oppo-a9-tim-1-org_4ddf578a63564969a3fd4c52cb18e9ec', 'static/image/mobile/OppoA92020/oppo-a9-tim-1-org_4ddf578a63564969a3fd4c52cb18e9ec_master.jpg', NULL, 0, 18),
(96, 'oppo-a9-tim-5-org_6ec846dd6ba4467982bc46e455598fb8', 'static/image/mobile/OppoA92020/oppo-a9-tim-5-org_6ec846dd6ba4467982bc46e455598fb8_master.jpg', NULL, 0, 18),
(97, 'oppo-a9-tim-8-org_d3dd9133a8da41b487f614258b58968a', 'static/image/mobile/OppoA92020/oppo-a9-tim-8-org_d3dd9133a8da41b487f614258b58968a_master.jpg', NULL, 0, 18),
(98, 'oppo-a9-xanh-la-10-org_dad8404d37444f9cb140da1bdcb', 'static/image/mobile/OppoA92020/oppo-a9-xanh-la-10-org_dad8404d37444f9cb140da1bdcb16843_master.jpg', NULL, 0, 18),
(99, 'anh-chinh-samsung-galaxy-a50-black-600x600.jpg', 'static/image/mobile/SamsungGalaxyA50S/anh-chinh-samsung-galaxy-a50-black-600x600.jpg', NULL, 1, 19),
(100, 'samsung-galaxy-a50s-xanh-5-org_9e2e0114922c42839ae', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-5-org_9e2e0114922c42839aea6ee63af6a2af_master.jpg', NULL, 0, 19),
(101, 'samsung-galaxy-a50s-xanh-6-org_ef5476cb316b40acbe0', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-6-org_ef5476cb316b40acbe0e6ef9b7b87981_master.jpg', NULL, 0, 19),
(102, 'samsung-galaxy-a50s-xanh-8-org_9c15fd09d88d454687f', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-8-org_9c15fd09d88d454687f58fc48a84a028_master.jpg', NULL, 0, 19),
(103, 'samsung-galaxy-a50s-xanh-9-org_0eee9b99156748d28ee', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-9-org_0eee9b99156748d28eef76ec1fd63460_master.jpg', NULL, 0, 19),
(104, 'anh-chinh-samsung-galaxy-note-10-plus-bac-1.jpg', 'static/image/mobile/SamsungGalaxyNote10+/anh-chinh-samsung-galaxy-note-10-plus-bac-1.jpg', NULL, 1, 20),
(105, 'samsung-galaxy-note-10-plus-bac-4-org_099f1a4ef854', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-bac-4-org_099f1a4ef854418d89619bb9d8ddcd46_master.jpg', NULL, 0, 20),
(106, 'samsung-galaxy-note-10-plus-bac-12-org_cec8b656ad5', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-bac-12-org_cec8b656ad5546ab9512d8008b07c0b0_master.jpg', NULL, 0, 20),
(107, 'samsung-galaxy-note-10-plus-den-5-org_51be61b35f0d', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-den-5-org_51be61b35f0d4a49b58f3e52c3af3196_master.jpg', NULL, 0, 20),
(108, 'samsung-galaxy-note-10-plus-den-10-org_50dfc0ff5a0', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-den-10-org_50dfc0ff5a0e4bcb94988a2b60f6b37f_master.jpg', NULL, 0, 20),
(109, 'anh-chinh-samsung-galaxy-a20-red-600x600.jpg', 'static/image/mobile/SamsungGalaxyA20/anh-chinh-samsung-galaxy-a20-red-600x600.jpg', NULL, 1, 21),
(110, 'samsung_galaxy_a20_den_4_org_a25d95a88b93466e9cf90', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_4_org_a25d95a88b93466e9cf906c313116431_master.jpg', NULL, 0, 21),
(111, 'samsung_galaxy_a20_den_8_org_6f15d567ad6b4e458080d', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_8_org_6f15d567ad6b4e458080d554cc078693_master.jpg', NULL, 0, 21),
(112, 'samsung_galaxy_a20_den_9_org_93cccec2b7344a8d9d06d', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_9_org_93cccec2b7344a8d9d06d0484d38c617_master.jpg', NULL, 0, 21),
(113, 'samsung_galaxy_a20_den_10_org_2f59771612aa4056bbf6', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_10_org_2f59771612aa4056bbf6f167c8be5300_master.jpg', NULL, 0, 21),
(139, 'anh-chinh-samsung-galaxy-a80-gold-600x600.jpg', 'static/image/mobile/SamsungGalaxyA80/anh-chinh-samsung-galaxy-a80-gold-600x600.jpg', NULL, 1, 23),
(140, 'samsung-galaxy-a80-vang-hong-6-org_4d31a021dd1c42f', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-6-org_4d31a021dd1c42f9af3164df5b29a3f0_master.jpg', NULL, 0, 23),
(141, 'samsung-galaxy-a80-vang-hong-8-org_8af89a3681eb45a', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-8-org_8af89a3681eb45a9bf4c34dc766c9ddb_master.jpg', NULL, 0, 23),
(142, 'samsung-galaxy-a80-vang-hong-9-org_b404cd6d9963415', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-9-org_b404cd6d9963415e920d1e50329f2755_master.jpg', NULL, 0, 23),
(143, 'samsung-galaxy-a80-vang-hong-13-org_a417a105ee5941', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-13-org_a417a105ee5941dfbabf71ba7b99a5ba_master.jpg', NULL, 0, 23),
(144, 'anh-chinh-samsung-note8-den.png', 'static/image/mobile/SamsungGalaxyNote8/anh-chinh-samsung-note8-den.png', NULL, 1, 24),
(145, 'samsung-galaxy-note8-den-4-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-4-1-org_master.jpg', NULL, 0, 24),
(146, 'samsung-galaxy-note8-den-6-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-6-1-org_master.jpg', NULL, 0, 24),
(147, 'samsung-galaxy-note8-den-7-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-7-1-org_master.jpg', NULL, 0, 24),
(148, 'samsung-galaxy-note8-den-8-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-8-1-org_master.jpg', NULL, 0, 24),
(149, 'anhchinh7psilver_2.jpg', 'static/image/mobile/Iphone7plus32GB/anhchinh7psilver_2.jpg', NULL, 1, 25),
(150, 'iphone-7-plus-bac1-2-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-2-1-org_master.jpg', NULL, 0, 25),
(151, 'iphone-7-plus-bac1-3-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-3-1-org_master.jpg', NULL, 0, 25),
(152, 'iphone-7-plus-bac1-7-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-7-1-org_master.jpg', NULL, 0, 25),
(153, 'iphone-7-plus-bac1-8-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-8-1-org_master.jpg', NULL, 0, 25),
(154, 'anh-chinh-huawei-p30-lite-1-600x600.jpg', 'static/image/mobile/HuaweiP30Lite/anh-chinh-huawei-p30-lite-1-600x600.jpg', NULL, 1, 26),
(155, 'huawei_p30_lite_xanh_duong_5_org_0de79c9e37964c7bb', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_5_org_0de79c9e37964c7bb88b94b1c85e2cd2_master.jpg', NULL, 0, 26),
(156, 'huawei_p30_lite_xanh_duong_7_org_a92d252fd5454c3c8', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_7_org_a92d252fd5454c3c8f05588d0b5363b9_master.jpg', NULL, 0, 26),
(157, 'huawei_p30_lite_xanh_duong_8_org_22bc4e4c45734f1d8', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_8_org_22bc4e4c45734f1d809925fff1808efe_master.jpg', NULL, 0, 26),
(158, 'huawei_p30_lite_xanh_duong_10_org_e91f012b3db84b0e', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_10_org_e91f012b3db84b0e8fea9562ad490e36_master.jpg', NULL, 0, 26),
(159, 'anh-chinh-huawei-y9-2019-1-600x600.jpg', 'static/image/mobile/HuaweiY92019/anh-chinh-huawei-y9-2019-1-600x600.jpg', NULL, 1, 27),
(160, 'huawei-y9-2019-den-7-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-7-org_master.jpg', NULL, 0, 27),
(161, 'huawei-y9-2019-den-8-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-8-org_master.jpg', NULL, 0, 27),
(162, 'huawei-y9-2019-den-10-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-10-org_master.jpg', NULL, 0, 27),
(163, 'huawei-y9-2019-den-11-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-11-org_master.jpg', NULL, 0, 27),
(164, 'hinh-chinh-huawei-y7-pro-2019-1-600x600.jpg', 'static/image/mobile/HuaweiY7Pro2019/hinh-chinh-huawei-y7-pro-2019-1-600x600.jpg', NULL, 1, 28),
(165, 'huawei-y7-pro-2019-xanh-duong-6-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-6-org_master.jpg', NULL, 0, 28),
(166, 'huawei-y7-pro-2019-xanh-duong-7-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-7-org_master.jpg', NULL, 0, 28),
(167, 'huawei-y7-pro-2019-xanh-duong-8-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-8-org_master.jpg', NULL, 0, 28),
(168, 'huawei-y7-pro-2019-xanh-duong-9-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-9-org_master.jpg', NULL, 0, 28),
(169, 'hinh-chinh-vivo-1610-y55s-hh-600x600.jpg', 'static/image/mobile/VivoY55S/hinh-chinh-vivo-1610-y55s-hh-600x600.jpg', NULL, 1, 29),
(170, 'vivo-y55s-vangdong-4-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-4-org_master.jpg', NULL, 0, 29),
(171, 'vivo-y55s-vangdong-5-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-5-org_master.jpg', NULL, 0, 29),
(172, 'vivo-y55s-vangdong-7-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-7-org_master.jpg', NULL, 0, 29),
(173, 'vivo-y55s-vangdong-8-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-8-org_master.jpg', NULL, 0, 29),
(174, 'hinh-chinh-vivo-y69-hh-600x600.jpg', 'static/image/mobile/VivoY69/hinh-chinh-vivo-y69-hh-600x600.jpg', NULL, 1, 30),
(175, 'vivo-y69-vangdong-4-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-4-1-org_master.jpg', NULL, 0, 30),
(176, 'vivo-y69-vangdong-5-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-5-1-org_master.jpg', NULL, 0, 30),
(177, 'vivo-y69-vangdong-6-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-6-1-org_master.jpg', NULL, 0, 30),
(178, 'vivo-y69-vangdong-7-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-7-1-org_master.jpg', NULL, 0, 30),
(179, 'hinh-chinh-P_setting_fff_1_90_end_600.jpg', 'static/image/mobile/AsusZenfone4MaxPro/hinh-chinh-P_setting_fff_1_90_end_600.jpg', NULL, 1, 31),
(180, 'asus-zenfone-4-max-pro-zc554kl-vangdong-4-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-4-1-org_master.jpg', NULL, 0, 31),
(181, 'asus-zenfone-4-max-pro-zc554kl-vangdong-6-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-6-1-org_master.jpg', NULL, 0, 31),
(182, 'asus-zenfone-4-max-pro-zc554kl-vangdong-7-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-7-1-org_master.jpg', NULL, 0, 31),
(183, 'asus-zenfone-4-max-pro-zc554kl-vangdong-8-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-8-1-org_master.jpg', NULL, 0, 31),
(184, 'hinh-chinh-2710-p2-1536114690.jpg', 'static/image/mobile/Nokia6.1Plus/hinh-chinh-2710-p2-1536114690.jpg', NULL, 1, 32),
(185, 'nokia-23-xanh-la-6-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-6-org.jpg', NULL, 0, 32),
(186, 'nokia-23-xanh-la-8-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-8-org.jpg', NULL, 0, 32),
(187, 'nokia-23-xanh-la-10-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-10-org.jpg', NULL, 0, 32),
(188, 'nokia-23-xanh-la-11-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-11-org.jpg', NULL, 0, 32),
(189, 'hinh-chinh-op-lung-nokia-8.1-chong-soc-likgus-armo', 'static/image/mobile/Nokia8.1/hinh-chinh-op-lung-nokia-8.1-chong-soc-likgus-armor-6.jpg', NULL, 1, 33),
(190, 'hinh-phu1-nokia-81-xanh-duong-1-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu1-nokia-81-xanh-duong-1-org.jpg', NULL, 0, 33),
(191, 'hinh-phu2-nokia-81-xanh-duong-9-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu2-nokia-81-xanh-duong-9-org.jpg', NULL, 0, 33),
(192, 'hinh-phu3-nokia-81-xanh-duong-8-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu3-nokia-81-xanh-duong-8-org.jpg', NULL, 0, 33),
(193, 'hinh-phu4-nokia-81-xanh-duong-7-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu4-nokia-81-xanh-duong-7-org.jpg', NULL, 0, 33),
(194, 'v17-pro-5_600x600.jpg', 'static/image/mobile/VivoV17Pro/v17-pro-5_600x600.jpg', NULL, 1, 34),
(195, 'vivo-v17-pro-trang-4-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-4-org.jpg', NULL, 0, 34),
(196, 'vivo-v17-pro-trang-5-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-5-org.jpg', NULL, 0, 34),
(197, 'vivo-v17-pro-trang-7-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-7-org.jpg', NULL, 0, 34),
(198, 'vivo-v17-pro-trang-8-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-8-org.jpg', NULL, 0, 34),
(199, 'vivo-y91-black-600x600.jpg', 'static/image/mobile/VivoY91C/vivo-y91-black-600x600.jpg', NULL, 1, 35),
(200, 'vivo-y91c-den-4-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-4-org.jpg', NULL, 0, 35),
(201, 'vivo-y91c-den-5-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-5-org.jpg', NULL, 0, 35),
(202, 'vivo-y91c-den-9-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-9-org.jpg', NULL, 0, 35),
(203, 'vivo-y91c-den-10-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-10-org.jpg', NULL, 0, 35),
(209, 'samsung-galaxy-a70-white-600x600.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-white-600x600.jpg', NULL, 1, 37),
(210, 'samsung-galaxy-a70-trang-5-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-5-org.jpg', NULL, 0, 37),
(211, 'samsung-galaxy-a70-trang-8-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-8-org.jpg', NULL, 0, 37),
(212, 'samsung-galaxy-a70-trang-9-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-9-org.jpg', NULL, 0, 37),
(213, 'samsung-galaxy-a70-trang-10-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-10-org.jpg', NULL, 0, 37),
(214, 'anh-chinh_oppo-a1k.jpeg', 'static/image/mobile/OPPOA1K/anh-chinh_oppo-a1k.jpeg', NULL, 1, 38),
(215, 'oppo-a1k-do-5-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-5-org.jpg', NULL, 0, 38),
(216, 'oppo-a1k-do-10-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-10-org.jpg', NULL, 0, 38),
(217, 'oppo-a1k-do-8-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-8-org.jpg', NULL, 0, 38),
(218, 'oppo-a1k-do-9-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-9-org.jpg', NULL, 0, 38),
(219, 'anh-chinh-Xiaomi-Redmi-Note-10-Pro-White.jpg', 'static/image/mobile/XiaomiMiNote10Pro/anh-chinh-Xiaomi-Redmi-Note-10-Pro-White.jpg', NULL, 1, 39),
(220, 'xiaomi-mi-note-10-pro-den-8-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-8-org.jpg', NULL, 0, 39),
(221, 'xiaomi-mi-note-10-pro-den-9-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-9-org.jpg', NULL, 0, 39),
(222, 'xiaomi-mi-note-10-pro-den-10-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-10-org.jpg', NULL, 0, 39),
(223, 'xiaomi-mi-note-10-pro-den-11-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-11-org.jpg', NULL, 0, 39),
(224, 'xiaomi-mi-9t-red-600x600.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-red-600x600.jpg', NULL, 1, 40),
(225, 'xiaomi-mi-9t-do-8-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-8-1-org.jpg', NULL, 0, 40),
(226, 'xiaomi-mi-9t-do-10-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-10-1-org.jpg', NULL, 0, 40),
(227, 'xiaomi-mi-9t-do-11-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-11-1-org.jpg', NULL, 0, 40),
(228, 'xiaomi-mi-9t-do-13-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-13-1-org.jpg', NULL, 0, 40),
(229, 'xiaomi-redmi-8a-1-600x600.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-1-600x600.jpg', NULL, 1, 41),
(230, 'xiaomi-redmi-8a-do-5-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-5-org.jpg', NULL, 0, 41),
(231, 'xiaomi-redmi-8a-do-7-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-7-org.jpg', NULL, 0, 41),
(232, 'xiaomi-redmi-8a-do-9-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-9-org.jpg', NULL, 0, 41),
(233, 'xiaomi-redmi-8a-do-10-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-10-org.jpg', NULL, 0, 41),
(234, 'nokia-23-green-600x600.jpg', 'static/image/mobile/Nokia2.3/nokia-23-green-600x600.jpg', NULL, 1, 42),
(235, 'nokia-23-xanh-la-6-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-6-org.jpg', NULL, 0, 42),
(236, 'nokia-23-xanh-la-8-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-8-org.jpg', NULL, 0, 42),
(237, 'nokia-23-xanh-la-10-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-10-org.jpg', NULL, 0, 42),
(238, 'nokia-23-xanh-la-11-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-11-org.jpg', NULL, 0, 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idKhachHang` int(10) UNSIGNED NOT NULL,
  `tenKhachHang` varchar(45) NOT NULL,
  `soDienThoai` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `matKhau` varchar(100) NOT NULL,
  `activation` varchar(300) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 0,
  `ngayTao` date DEFAULT '1990-01-01',
  `diaChi` varchar(45) DEFAULT NULL,
  `wishlist` varchar(200) NOT NULL,
  `codeChangePass` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idKhachHang`, `tenKhachHang`, `soDienThoai`, `email`, `matKhau`, `activation`, `status`, `ngayTao`, `diaChi`, `wishlist`, `codeChangePass`) VALUES
(35, 'Hoang Van Nam', '0965351741', 'nitb.stone@gmail.com', '$2y$10$9CpP7dYbdPIeBYQYieJiguCfXoUvnWXm8gW4GuTKPfryTR5pp9trG', 'dd7651f1a23963c3b6713d479ce82016', 1, '2023-06-01', 'Sài Gòn', ',7,4', '$2y$10$7vt8UhNT.d9DZ9AMJ2YEEu8AGNrTDyUWyGrS48ReSmN8TaK4U73w2'),
(38, 'Mr. Nam', '0929619622', 'nam@simicart.com', '$2y$10$duhd4cbY.XK.yLc5xgaKFeAA8Dyo7L88YvqOjHKB/JTPXOH1ROkri', '05764c70d58a851b02f72e7c31a0a514', 1, '2023-06-01', 'Sơn La', ',3,11', NULL),
(39, 'Hi Mai', '123123', 'maiphambkhn@gmail.com', 'Nghia.2002', '72d8b7846dce461cd8b0aad792fe5ee9', 1, '2023-06-01', 'hihi', ',10', NULL),
(40, 'anh Nam', '0973951247', 'nam.hv143022@sis.hust.edu.vn', '$2y$10$uLx9C02CIk6WP9/S.78RaeWWJV1gegNBmN78W.d1KX7t1V2OwP6AC', '7eccb803e73eba42e4ff6bccff2f8d66', 1, '2023-06-01', 'Hà Nội', ',12,3', NULL),
(41, 'Ngô Mạnh Nam', '0912773182', 'shopnamhoang@gmail.com', '$2y$10$FSsB/8zHc5P.t6epIyodbu1Uqicwh/oRhQnFdrxVAqAdeTvwjbE2i', 'ffabdc3a16cd89d40ea6ab13a70316c2', 1, '2023-06-01', 'Hải Phòng', ',7,4', NULL),
(42, 'Thang', '0344213030', 'thangbao2698@gmail.com', '$2y$10$clx/EPrHsLsWdvwnDsGkHORyJyA1CGmD/YUnq5TxSrYd8O5QsCxF.', '201157d476b2ad0263758e7a1256ba09', 1, '2023-06-01', 'Hà Tĩnh', ',13', NULL),
(43, 'Thang', '0344213030', 'thangbao2698@gmail.com', '$2y$10$qrOcRWuQk3w4wWMvN87c4OwpW0eoy3RULfDt8CRHtYU4feALGV9mW', '72974ec4229bae39c81d285599dfc7f7', 0, '2023-06-01', 'Hà Tĩnh', '', NULL),
(44, 'Lê Trọng Tùng', '0344213030', 'trongtung442@gmail.com', '$2y$10$NKz9.hnfZsT4dNekEfjCjuU8WbJawJRCLgk6/LaaFRAGQjW9IjCcS', '3de0d076066be712d92726d6a9028768', 0, '2023-06-01', 'Thanh Hóa', '', NULL),
(45, 'Lê Trọng Tùng', '0344213030', 'trongtung422@gmail.com', '$2y$10$JYVdYBFTIGi2dfjEcniNQ.dWTbyk8hlLPypTZgNby6ytGUSyuy5T.', '2b02165a1153ab25ee15793267586a1e', 1, '2023-06-01', 'Thanh Hóa', '', NULL),
(46, 'Nguyễn Văn Đạt', '0344213030', 'datnv.vnist@gmail.com', '$2y$10$/85z.7LVCB2qgNzGjoRUregXmUeR1/VxK/KPPyWQpUkeAdH6MQ.xa', '0bf61c34653734d573adb85572b09a8b', 1, '2023-06-01', 'Hà Nội', '', NULL),
(47, 'Vũ Ngọc Nghĩa', '245643564', 'nghiaabc@gmail.com', '12345678', '1', 0, '2023-06-01', 'Thái Nguyên', '', NULL),
(48, 'nghĩa', '02333333', 'nghia.02@gmail.com', '$2y$10$.YfgsUycwt5uz8GF2U2kyuVMUAFwiCMju7KuthHzNTCoofdvAmLji', '74c3997f1b320285bbceaca0adfd4e69', 0, '2023-06-07', 'Thái Nguyên', '', NULL),
(49, 'Nghĩa', '022222222', 'vn.nghia.02@gmail.com', '$2y$10$pITTyW/ly.t9up.0yNVgiO2M2X8fIxjORUOeNYwNPkuyJqjz3ApZG', '25496e69e4e65897ff25e1cffbf9edb0', 0, '2023-06-07', 'Thái Nguyên', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mobile`
--

CREATE TABLE `mobile` (
  `idMobile` int(10) UNSIGNED NOT NULL,
  `tenDienThoai` varchar(100) NOT NULL,
  `giaNhap` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `giaBan` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `giamGia` int(10) UNSIGNED DEFAULT 0,
  `moTa` varchar(1000) DEFAULT NULL,
  `ngayNhapKho` datetime DEFAULT '1990-01-01 00:00:00',
  `soLuongTrongKho` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mauSac` varchar(45) NOT NULL,
  `CPU` varchar(100) NOT NULL,
  `gpu` varchar(100) DEFAULT NULL,
  `RAM` varchar(45) NOT NULL,
  `boNhoTrong` varchar(100) DEFAULT NULL,
  `heDieuHanh` varchar(100) NOT NULL,
  `manHinh` varchar(100) NOT NULL,
  `cameraSau` varchar(100) NOT NULL,
  `cameraTruoc` varchar(100) NOT NULL,
  `dungLuongPin` varchar(100) NOT NULL,
  `sacNhanh` varchar(100) DEFAULT NULL,
  `SIM` varchar(100) NOT NULL,
  `4G` int(11) DEFAULT NULL,
  `soLuotXem` int(11) NOT NULL DEFAULT 0,
  `soSao` float DEFAULT 0,
  `mucDichSuDung` varchar(4) DEFAULT NULL,
  `visibleOnHome` int(1) DEFAULT 0,
  `NhaCungCap_idNhaCungCap` int(10) UNSIGNED DEFAULT NULL,
  `NhaSanXuat_idNhaSanXuat` int(10) UNSIGNED NOT NULL,
  `theloai_idTheloai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mobile`
--

INSERT INTO `mobile` (`idMobile`, `tenDienThoai`, `giaNhap`, `giaBan`, `giamGia`, `moTa`, `ngayNhapKho`, `soLuongTrongKho`, `mauSac`, `CPU`, `gpu`, `RAM`, `boNhoTrong`, `heDieuHanh`, `manHinh`, `cameraSau`, `cameraTruoc`, `dungLuongPin`, `sacNhanh`, `SIM`, `4G`, `soLuotXem`, `soSao`, `mucDichSuDung`, `visibleOnHome`, `NhaCungCap_idNhaCungCap`, `NhaSanXuat_idNhaSanXuat`, `theloai_idTheloai`) VALUES
(1, 'iPhone 11 Pro Max 512GB', 40000000, 42990000, 0, 'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.', '2019-11-20 00:00:00', 20, 'Xanh lá', 'Apple A13 Bionic 6 nhân, 2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '	512', '	iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(2, 'iPhone 11 Pro Max 512GB', 40500000, 43990000, 0, 'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.', '2019-11-20 00:00:00', 30, 'Bạc', 'Apple A13 Bionic 6 nhân, 2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '512', 'iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(3, 'iPhone 11 Pro Max 512GB', 42500000, 45990000, 3000000, 'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.', '2019-11-20 00:00:00', 40, 'Đen', 'Apple A13 Bionic 6 nhân, 2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '512', 'iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(4, 'iPhone 11 Pro Max 256GB', 35000000, 36990000, 0, 'iPhone 11 Pro Max 256GB là chiếc iPhone cao cấp nhất trong bộ 3 iPhone Apple giới thiệu trong năm 2019 và quả thực chiếc smartphone này mang trong mình nhiều trang bị xứng đáng với tên gọi \"Pro\".', '2019-11-25 00:00:00', 30, 'Xanh lá', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(5, 'iPhone 11 Pro Max 256GB', 36000000, 37990000, 0, 'iPhone 11 Pro Max 256GB là chiếc iPhone cao cấp nhất trong bộ 3 iPhone Apple giới thiệu trong năm 2019 và quả thực chiếc smartphone này mang trong mình nhiều trang bị xứng đáng với tên gọi \"Pro\".', '2019-11-25 00:00:00', 40, 'Bạc', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(6, 'iPhone 11 Pro Max 256GB', 38000000, 39990000, 0, 'iPhone 11 Pro Max 256GB là chiếc iPhone cao cấp nhất trong bộ 3 iPhone Apple giới thiệu trong năm 2019 và quả thực chiếc smartphone này mang trong mình nhiều trang bị xứng đáng với tên gọi \"Pro\".', '2019-11-25 00:00:00', 45, 'Đen', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(7, 'iPhone 11 Pro Max 64GB', 30000000, 31990000, 1500000, 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.', '2019-11-16 00:00:00', 30, 'Xanh lá', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(8, 'iPhone 11 Pro Max 64GB', 31000000, 32990000, 0, 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.', '2019-11-16 00:00:00', 35, 'Bạc', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 6),
(9, 'iPhone 11 Pro Max 64GB', 32000000, 33990000, 0, 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.', '2019-11-16 00:00:00', 40, 'Đen', '	Apple A13 Bionic 6 nhân, 	2 nhân 2.65 GHz & 4 nhân 1.8 GHz', '	Apple GPU 4 nhân', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(10, 'iPhone Xs Max 256GB', 28000000, 30490000, 0, 'Sau 1 năm mong chờ, chiếc smartphone cao cấp nhất của Apple đã chính thức ra mắt mang tên iPhone Xs Max 256 GB. Máy các trang bị các tính năng cao cấp nhất từ chip A12 Bionic, dàn loa đa chiều cho tới camera kép tích hợp trí tuệ nhân tạo.', '2019-11-16 00:00:00', 20, 'Vàng đồng', '	Apple A12 Bionic 6 nhân, 2 nhân 2.5 GHz Vortex & 4 nhân 1.6 GHz Tempest', 'Apple GPU 4 nhân', '4', '256', '	iOS 12', '	6.5\", OLED, 1242 x 2688 Pixels', 'Chính 12 MP & Phụ 12 MP', '	7 MP', '3174', '	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 6),
(11, 'Samsung Galaxy S10+ (512GB)', 21000000, 22990000, 1800000, 'Samsung Galaxy S10+ 512GB - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.', '2019-11-16 00:00:00', 20, 'Đen', '	Exynos 9820 8 nhân 64-bit, 2 nhân 2.7 GHz, 2 nhân 2.3 GHz và 4 nhân 1.9 GHz', '	Mali-G76 MP12', '8', '512', '	Android 9.0 (Pie)', '	6.4\", 	2K+ (1440 x 3040 Pixels), 	Dynamic AMOLED', 'Chính 12 MP & Phụ 12 MP, 16 MP', 'Chính 10 MP & Phụ 8 MP', '4100', 'Tiết kiệm pin, Siêu tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây, Sạc ngược không dây', '	2 SIM Nano (SIM 2 chung khe thẻ nhớ)', 1, 0, 0, '1111', 0, 2, 2, 2),
(12, 'OPPO Reno 10x Zoom Edition', 15000000, 16990000, 0, 'Những chiếc flagship trong năm 2019 không chỉ có một camera chụp ảnh đẹp, chụp xóa phông ảo diệu mà còn phải \"chụp thật xa\" và với chiếc OPPO Reno 10x Zoom Edition chính thức gia nhập thị trường \"smartphone có camera siêu zoom\".', '2019-11-16 00:00:00', 30, 'Xanh rêu', '	Snapdragon 855 8 nhân 64-bit, 1 nhân 2.84 GHz, 3 nhân 2.42 GHz & 4 nhân 1.8 GHz', '	Adreno 640', '8', '256', '	Android 9.0 (Pie)', '	6.6\", 	Full HD+ (1080 x 2340 Pixels), 	AMOLED', 'Chính 48 MP & Phụ 13 MP, 8 MP', '	16 MP', '	4065', '	Tiết kiệm pin, Sạc nhanh VOOC', '	2 SIM Nano (SIM 2 chung khe thẻ nhớ)', 1, 0, 0, '1111', 1, 3, 3, 6),
(13, 'Xiaomi Mi 9 SE', 6000000, 7490000, 1000000, 'Vẫn như thường lệ thì bên cạnh chiếc flagship Xiaomi Mi 9 cao cấp của mình thì Xiaomi cũng giới thiệu thêm phiên bản rút gọn là chiếc Xiaomi Mi 9 SE. Máy vẫn sở hữu cho mình nhiều trang bị cao cấp tương tự đàn anh.', '2019-11-16 00:00:00', 40, 'Xanh dương', '	Snapdragon 712 8 nhân 64-bit, 2.3 GHz', '	Adreno 616', '6', '64', '	Android 9.0 (Pie)', '	5.97\", Full HD+ (1080 x 2340 Pixels), 	Super AMOLED', '	Chính 48 MP & Phụ 13 MP, 8 MP', '	20 MP', '3070 ', '	Tiết kiệm pin, Sạc pin nhanh', '	2 Nano SIM', 1, 0, 0, '1111', 1, 4, 4, 6),
(16, 'OPPO A5 (2020) 128GB', 5000000, 5290000, 0, 'OPPO A5 (2020) 128GB là chiếc smartphone mới ra mắt của thương hiệu OPPO nhận nhiệm vụ đánh chiếm phân khúc giá rẻ/tầm trung với rất nhiều điểm nhấn đáng giá.', NULL, 15, 'Đen', 'Snapdragon 665 8 nhân, 4 nhân 2.0 GHz & 4 nhân 1.8 GHz', 'Adreno 610', '4', '128', 'Android 9.0 (Pie)', '6.5\", HD+ (720 x 1600 Pixels)', 'Chính 12 MP & Phụ 8 MP, 2 MP, 2 MP', '8 MP', '5000', 'Tiết kiệm pin', '2 Nano SIM', 1, 0, 0, '1111', 1, 3, 3, 2),
(17, 'OPPO Reno2', 14990000, 15500000, 10, 'Sản phẩm mới', NULL, 20, 'Đen', 'Snapdragon 730G 8 nhân', 'Adreno 618', '8', '256', 'Android 9.0', 'Sunlight AMOLED, Full HD+ (1080 x 2400 Pixels), 6.55\"', 'chính 48MP &phụ 13 MP', '16 MP', '4000', 'Sạc nhanh VOOC', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 3, 1),
(18, 'Oppo A9 2020', 5990000, 6500000, 500000, 'Sản phẩm mới', NULL, 30, 'Xanh', 'Snapdragon 665 8 nhân', 'Adreno 610', '8', '128', 'Android 9.0', '\"Công nghệ màn hình: TFT Độ phân giải:	HD+ (720 x 1600 Pixels) Màn hình rộng:	6.5\"\" Mặt kính cảm ứng', 'chính 48MP &phụ 13 MP', '16 MP', '5000', 'Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 3, 1),
(19, 'Samsung Galaxy A50S', 5990000, 6500000, 1000000, 'Sản phẩm mới', NULL, 10, 'Đen', 'Exynos 9610 8 nhân', 'Mali-G72 MP3', '4', '64', 'Android 9.0', '\"Công nghệ màn hình: Super AMOLED Độ phân giải: Full HD+ (1080 x 2340 Pixels) Màn hình rộng: 6.4\"\" M', 'chính 48MP &phụ 8 MP', '32 MP', '4000', 'Sạc pin nhanh, tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 1, 5, 2, 3),
(20, 'Samsung Galaxy Note 10+', 25500000, 26990000, 1000000, 'Sản phẩm mới', NULL, 30, 'Trắng', 'Exynos 9825 8 nhân ', 'Mali-G76 MP12', '12', '256', 'Android 9.0', '\"Công nghệ màn hình: Dynamic AMOLED Độ phân giải:WHQD+ (1.440 x 3.040 Pixels) Màn hình rộng:	6.8\"\" M', 'chính 12MP & phụ 12MP', '10 MP', '4300', 'Sạc pin nhanh, tiết kiệm pin, sạc pin không dây', '2 Sim Nano', 1, 0, 0, '1111', 1, 2, 2, 3),
(21, 'Samsung Galaxy A20', 3400000, 4190000, 0, 'Sản phẩm mới', NULL, 10, 'Đỏ', 'Exynos 7884 8 nhân', 'Mali™ G71', '3', '32', 'Android 9.0', '\"Công nghệ màn hình:Super AMOLED Độ phân giải:HD+ (720 x 1560 Pixels) Màn hình rộng:	6.4\"\" Mặt kính ', 'chính 13Mp& phụ 5MP', '8 MP', '4000', 'Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 2, 3),
(23, 'Samsung Galaxy A80', 13500000, 14990000, 0, 'Sản phẩm mới', NULL, 19, 'Đen hồng', 'Snapdragon 730 8 nhân', 'Adreno 618', '8', '128', 'Android 9.0', 'Công nghệ màn hình: Dynamic AMOLED Độ phân giải:Full HD+ (1080 x 2400 Pixels) Màn hình rộng:	6.7\"\" M', 'Chính 48 MP & Phụ 8 MP,', 'Chính 48 MP & Phụ 8 MP', '4500', 'Chính 48 MP & Phụ 8 MP', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 2, 5),
(24, 'Samsung Galaxy Note 8', 16000000, 17490000, 0, 'Sản phẩm mới', NULL, 30, 'Đen', 'Exynos 8895 8', 'Mali-G71 MP20', '6', '64', 'Android 7.1', 'Công nghệ màn hình:Super AMOLED Độ phân giải2K (1440 x 2960 Pixels) Màn hình rộng:	6.3\"\" Mặt kính cả', '2 camera 12 MP', '8 MP', '4300', 'Sạc pin nhanh, tiết kiệm pin, sạc pin không dây', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 2, 5),
(25, ' Iphone 7 plus 32GB', 13000000, 14990000, 1000000, 'Sản phẩm mới', NULL, 20, 'Trắng', 'Apple A10 Fusion 4 nhân 64-bit', 'PowerVR Series7XT Plus', '3', '32', 'iOS 10', '\"Công nghệ màn hình:LED-backlit IPS LCD Độ phân giải:Full HD (1080 x 1920 pixels) Màn hình rộng:5.5\"', '2 camera 12 MP', '7 MP', '1990', 'Tiết kiệm pin', '1 Sim Nano', 1, 0, 0, '1111', 0, 2, 1, 5),
(26, 'Huawei P30 Lite', 3500000, 5490000, 0, 'Sản phẩm tốt', NULL, 20, 'Xanh', 'HiSilicon Kirin 710', 'Mali-G51 MP4', '6', '128', 'Android 9.0', '\"Công nghệ màn hình:IPS LCD Độ phân giải:Full HD+ (1080 x 2340 Pixels) Màn hình rộng:6.15\"\" Mặt kính', 'Chính 24 MP & Phụ 8 MP', '32 MP', '5000', 'Sạc pin nhanh, Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 7, 1),
(27, 'Huawei Y9 2019', 3500000, 4990000, 0, 'Sản phẩm tốt', NULL, 1, 'Đen', 'HiSilicon Kirin 710', 'Mali-G51 MP4', '4', '64', 'Android 8.1', '\"Công nghệ màn hình:LTPS LCD Độ phân giải:Full HD+ (1080 x 2340 Pixels) Màn hình rộng:6.5\"\" Mặt kính', 'chính 13Mp& phụ 5MP', '16 MP và 2 MP ', '4000', 'Sạc pin nhanh, Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 7, 5),
(28, 'Huawei Y7 Pro 2019', 2000000, 2790000, 0, 'Sản phẩm mới', NULL, 15, 'Xanh trắng', 'Snapdragon 450 8 nhân', 'Adreno 506', '3', '32', 'Android 8.1', '\"Công nghệ màn hình:IPS LCD Độ phân giải:HD+ (720 x 1520 Pixels) Màn hình rộng:6.26\"\" Mặt kính cảm ứ', '13 MP và 2 MP', '16 MP', '4000', 'Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 7, 5),
(29, 'Vivo Y55S', 2500000, 3990000, 0, 'Sản phẩm mới', NULL, 2, 'Trắng', 'Snapdragon 425 4 nhân', 'Adreno 308', '2', '16', 'Android 6.0', '\"Công nghệ màn hình:TFT Độ phân giải:HD (720 x 1280 pixels) Màn hình rộng:5.2\"\" Mặt kính cảm ứng:Kín', '13 MP', '5 MP', '2730', 'Không có', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 5, 2),
(30, 'Vivo Y69', 4000000, 5490000, 0, 'Sản phẩm tốt', NULL, 15, 'Vàng', 'Mediatek MT6750 8 nhân', 'Mali-T860', '3', '32', 'Android 7.0', '\"Công nghệ màn hình:IPS LCD Độ phân giải:HD (720 x 1280 pixels) Màn hình rộng:5.5\"\" Mặt kính cảm ứng', '13 MP', '16 MP', '3000', 'Không có', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 5, 4),
(31, 'Asus Zenfone 4 Max Pro', 3500000, 4990000, 200000, 'Sản phẩm mới', NULL, 25, 'Vàng', 'Snapdragon 430 8 nhân', 'Adreno 505', '3', '32', 'Android 7.0', '\"Công nghệ màn hình:IPS LCD Độ phân giải:HD (720 x 1280 pixels) Màn hình rộng:5.5\"\" Mặt kính cảm ứng', '16 MP và 5 MP', '16 MP', '5000', 'Tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 8, 4),
(32, 'Nokia 6.1 Plus', 3500000, 4790000, 0, 'Sản phẩm mới', NULL, 20, 'Đen', 'Snapdragon 636, 8 nhân', 'Adreno 506', '4', '64', 'Android 8.1', '\"Công nghệ màn hình:IPS LCD Độ phân giải:Full HD+ 1080 x 2280 pixels Màn hình rộng:5.8\"\" Mặt kính cả', '16 MP và 5 MP', '16 MP', '3060', 'Tiết kiệm pin, sạc nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 8, 6),
(33, 'Nokia 8.1', 5000000, 6590000, 0, 'Sản phẩm mới', NULL, 30, 'Đen', 'Snapdragon 710 8 nhân', 'Adreno 616', '4', '64', 'Android 9.0', '\"Công nghệ màn hình	IPS LCD Độ phân giải	Full HD+ (1080 x 2280 Pixels) Màn hình rộng	6.18” Mặt kính ', 'Chính 12 MP & Phụ 13 MP', '20 MP', '3500', 'Tiết kiệm pin, sạc nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 8, 6),
(34, 'Vivo V17 Pro', 8000000, 9990000, 300000, 'Sản phẩm mới', NULL, 19, 'Trắng', 'Snapdragon 675 8 nhân', 'Adreno 612', '8', '128', 'Android 9.0', '\"Công nghệ màn hình	Super AMOLED Độ phân giải	Full HD+ (1080 x 2400 Pixels) Màn hình rộng	6.44\"\" Mặt', '\"	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\"', 'Chính 32 MP & Phụ 8 MP', '3500', 'Tiết kiệm pin, sạc nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 5, 6),
(35, 'Vivo Y91C', 1500000, 2500000, 0, 'Sản phẩm mới', NULL, 30, 'Xanh', 'MediaTek MT6762R 8 nhân', 'PowerVR GE8320', '2', '32', 'Android 8.1', '\"Công nghệ màn hình	IPS LCD Độ phân giải	HD+ (720 x 1520 Pixels) Màn hình rộng	6.22\"\" Mặt kính cảm ứ', '13 MP', '5 MP', '4030', 'tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 5, 3),
(37, 'Samsung Galaxy A70', 7000000, 8790000, 1000000, 'Sản phẩm mới', NULL, 20, 'Trắng', 'Snapdragon 675 8 nhân', 'Adreno 612', '6', '128', 'Android 9.0', '\"Công nghệ màn hình	Super AMOLED Độ phân giải	Full HD+ (1080 x 2400 Pixels) Màn hình rộng	6.7\"\" Mặt ', 'Chính 32 MP & Phụ 8 MP, 5 MP', '32 MP', '4500', 'Tiết kiệm pin, Sạc pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 2, 6),
(38, ' OPPO A1K', 1500000, 2990000, 0, 'Sản phẩm mới', NULL, 30, 'Đỏ', 'MediaTek MT6762R 8 nhân', 'PowerVR GE8320', '2', '32', 'Android 9.0', '\"Công nghệ màn hình	IPS LCD Độ phân giải	HD+ (720 x 1560 Pixels) Màn hình rộng	6.1\"\" Mặt kính cảm ứn', '8 MP', '5 MP', '4000', 'tiết kiệm pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 3, 6),
(39, 'Xiaomi Mi Note 10 Pro', 13000000, 14590000, 300000, 'Sản phẩm mới', NULL, 25, 'Trắng', 'Snapdragon 730G 8 nhân', 'Adreno 618', '8', '256', 'Android 9.0', '\"Công nghệ màn hình	AMOLED Độ phân giải	Full HD+ (1080 x 2340 Pixels) Màn hình rộng	6.47\"\" Mặt kính ', 'Chính 108 MP & Phụ 20 MP, 12 MP, 5 MP, 2 MP', '32 MP', '5260', 'Tiết kiệm pin, Sạc pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 4, 3),
(40, ' Xiaomi Mi 9T', 6000000, 7990000, 500000, 'sản phẩm mới', NULL, 28, 'Đỏ đen', 'Snapdragon 730 8 nhân', 'Adreno 618', '6', '64', 'Android 9.0', '\"Công nghệ màn hình	AMOLED Độ phân giải	Full HD+ (1080 x 2340 Pixels) Màn hình rộng	6.39\"\" Mặt kính ', 'Chính 48 MP & Phụ 13 MP, 8 MP', '20 MP', '4000', 'Tiết kiệm pin, Sạc pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 4, 3),
(41, 'Xiaomi Redmi 8A', 1500000, 2590000, 0, 'Sản phẩm mới', NULL, 10, 'Đỏ đen', 'Snapdragon 439 8 nhân', 'Adreno 505', '2', '32', 'Android 9.0', '\"Công nghệ màn hình	IPS LCD Độ phân giải	HD+ (720 x 1520 Pixels) Màn hình rộng	6.22\"\" Mặt kính cảm ứ', '12 MP', '8 MP', '5000', 'Tiết kiệm pin, Sạc pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 4, 3),
(42, 'Nokia 2.3', 1500000, 2590000, 0, 'Sản phẩm mới', NULL, 26, 'Xanh', 'Mediatek MT6761 4 nhân (Helio A22)', 'PowerVR GE8320', '2', '32', 'Android 9.0', '\"Công nghệ màn hình	TFT Độ phân giải	HD+ (720 x 1520 Pixels) Màn hình rộng	6.2\"\" Mặt kính cảm ứng	Đa', 'Chính 13 MP & Phụ 2 MP', '5 MP', '4000', 'không có', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 8, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mobile_has_sukiengiamgia`
--

CREATE TABLE `mobile_has_sukiengiamgia` (
  `id` int(11) NOT NULL,
  `ngayBatDau` date DEFAULT '1990-01-01',
  `ngayKetThuc` date DEFAULT '1990-01-01',
  `giamGia` int(10) UNSIGNED DEFAULT 0,
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `sukiengiamgia_idSuKienGiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `idNhaCungCap` int(10) UNSIGNED NOT NULL,
  `tenNhaCC` varchar(100) NOT NULL,
  `diaChi` varchar(45) NOT NULL,
  `dienThoai` varchar(45) NOT NULL,
  `moTa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`idNhaCungCap`, `tenNhaCC`, `diaChi`, `dienThoai`, `moTa`) VALUES
(1, 'Công ty TNHH FPT Shop', 'Bến Nghé, Tp. Hồ Chí Minh', '(028)38236894', 'Nhà cung cấp điện thoại FPT Shop'),
(2, 'Công ty TNHH Thế Giới Di Động', 'Tân Bình, Tp. Hồ Chí Minh', '(028)35100100', 'Nhà cung cấp điện thoại Thế Giới Di Động'),
(3, 'Công ty CP XNK USCOM', 'Số 12 Yên Lãng, Láng Hạ, Đống Đa, Hà Nội', '(024)0936218888', 'Nhà phân phối thiết bị di động USCOM  tại Hà Nội'),
(4, 'Công ty TNHH TSMobile', '64 Ngõ 39 Hào Nam, Đống Đa, Hà Nội', '(024)22413776', 'Nhà phân phối điện thoại di động  TSMobile tại Hà Nội'),
(5, 'Trung tâm VietPhones', '412 Tây Sơn, Đống Đa, Hà Nội', '(024)66803104', 'Nhà phân phối điện thoại di động  Vietphones tại Hà Nội'),
(6, 'Nhật Cường Mobile', '42 Thái Hà, Hà Nội', '0986522617', 'Nhà phân phối điện thoại Nhật Cường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idNhanVien` int(10) UNSIGNED NOT NULL,
  `tenNhanVien` varchar(45) NOT NULL,
  `gioiTinh` varchar(45) DEFAULT NULL,
  `ngaySinh` date DEFAULT '1990-01-01',
  `queQuan` varchar(45) NOT NULL,
  `cmnd` varchar(45) NOT NULL,
  `soDienThoai` varchar(20) NOT NULL,
  `chucvu` varchar(45) NOT NULL,
  `ghiChu` varchar(100) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `matKhau` varchar(300) NOT NULL,
  `status` int(1) DEFAULT 1,
  `codeChangePass` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idNhanVien`, `tenNhanVien`, `gioiTinh`, `ngaySinh`, `queQuan`, `cmnd`, `soDienThoai`, `chucvu`, `ghiChu`, `email`, `matKhau`, `status`, `codeChangePass`) VALUES
(25, 'Hoàng Văn Nam', 'Nam', '1995-11-30', 'Dũng Nghĩa, Vũ Thư, Thái Bình', '152067394', '0965351741', 'Quản trị viên', 'Admin tổng', 'nitb.stone@gmail.com', '$2y$10$5g8boGaDeOFighvhQurIY.a5vEUpUZBDau/keOSUBru5UO5OTBFxa', 1, '$2y$10$s7YhfYcqd5Z4G1lIXuWw5.oy3FIU7oJcGS7FLo.dDcgFQYv9b6dS.'),
(30, 'Phạm Mai', 'Nữ', '1996-04-11', 'Vĩnh Phúc', '152099112', '0929619622', 'Nhân viên bán hàng', 'Nhân viên bán hàng 1', 'maipham@gmail.com', '$2y$10$mQ3CQqcvYhe9jIvwZdnd0eyu.HZ/9iBKcEVpkC8LJ3j7E3wIEvnKW', 1, NULL),
(31, 'Nguyễn Mạnh Thắng', 'Nam', '1997-06-18', 'Can Lộc - Hà Tĩnh', '138222712', '0932817216', 'Nhân viên bán hàng', 'Nhân viên bán hàng 2', 'manhthang@gmail.com', '$2y$10$e83NWcErFVOAk9TiDFSRCOI5dq3ZQBUpgHfOmPi2KkE6SE/mylmB6', 1, NULL),
(32, 'Nguyễn Văn Tú', 'Nam', '1997-11-20', 'Cẩm Vân - Cẩm Thủy - Thanh Hóa', '127192012', '0988126133', 'Nhân viên thủ kho', 'Nhân viên thủ kho 1', 'vantu@gmail.com', '$2y$10$hVRmO8ctNgsvSvV/.fPG/O2BbPmepe2Ryc/e2EJaKxjp7diNtt9FW', 1, NULL),
(33, 'Hoàng Tuấn Anh', 'Nam', '1998-02-02', 'Đan Phượng - Hà Nội', '122718229', '0361172281', 'Nhân viên thủ kho', 'Nhân viên thủ kho 2', 'anhtuan@gmail.com', '$2y$10$5EzybsiPpdD/HRIP1EE2euoG/acT2Nytx2aQePonxeysBrx35M38K', 1, NULL),
(34, 'Phan Văn Long', 'Nam', '1994-12-11', 'Hoàng Cầu - Đống Đa - Hà Nội', '122910224', '0912888212', 'Nhân viên giao hàng', 'Nhân viên giao hàng 1', 'vanlong@gmail.com', '$2y$10$Qf0/i5MGHpm2x3acgOH1N.NcV.GKhAweH519USTWzQCFwNM7toStW', 1, NULL),
(35, 'Nguyễn Quang Hải', 'Nam', '1996-12-08', 'Giao Thủy - Nam Định', '133291821', '035812112', 'Nhân viên giao hàng', 'Nhân viên giao hàng 2', 'quanghai@gmail.com', '$2y$10$mqYvNVtFITRjtZadNJCqFOb19msmfAtgzPdJL.pqYhjLgZaHc51qK', 1, NULL),
(36, 'Nam Hoàng', 'Nam', '1996-04-10', 'Vũ Thư, Thái Bình', '152067394', '0929619622', 'Quản trị viên', 'Quản trị viên 2', 'shopnamhoang@gmail.com', '$2y$10$V5g/zw8jMgtheX8WF14/HOtnjdVm.HNug5MKRwCbmiCg3GV9RwgoG', 1, NULL),
(37, 'nam', 'Nam', '2019-12-20', 'De La Thanh', '1211111111', '11111111', 'Quản trị viên', 'qtv', 'nam@simicart.com', '$2y$10$HdZNv43Tpf.YQm/WmIXuouX7LpbcnJXXYcH7bTnGYpLTkRdB3GMKm', 2, NULL),
(38, 'admin', 'Nam', '2019-12-16', 'Ha Noi', '111222333', '0911222333', 'Quản trị viên', 'Quan tri vien', 'admin@gmail.com', '$2y$10$P12454QiolfQz/BPYN3vqu1XqtviCEe9zS/WNEJCLt4.a8XL/nhRC', 1, NULL),
(39, 'Nguyễn Văn Thắng', 'Nam', '1998-02-06', 'Hà Tĩnh', '184291338', '0344213030', 'Nhân viên bán hàng', 'Bán hàng', 'thangbao2698@gmail.com', '$2y$10$slVUWtc4sEUAciSulGErGe04DkPecA15dBDdqzILvrxNDG57d/Myq', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `idNhaSanXuat` int(10) UNSIGNED NOT NULL,
  `tenNhaSX` varchar(100) NOT NULL,
  `diaChi` varchar(45) NOT NULL,
  `dienThoai` varchar(45) NOT NULL,
  `moTa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`idNhaSanXuat`, `tenNhaSX`, `diaChi`, `dienThoai`, `moTa`) VALUES
(1, 'Apple', 'Hoa Kỳ', '0912213428', 'Nhà sản xuất điện thoại Iphone.'),
(2, 'Samsung', 'Hàn Quốc', '0958234123', 'Nhà sản xuất điện thoại Samsung.'),
(3, 'Oppo', 'Trung Quốc', '0908098298', 'Nhà sản xuất điện thoại Oppo.'),
(4, 'Xiaomi', 'Bắc Kinh, Trung Quốc', '0948219201', 'Nhà sản xuất điện thoại Xiaomi.'),
(5, 'Vivo', 'Trung Quốc', '0968226882', 'Nhà sản xuất điện thoại Vivo.'),
(6, 'Realme', 'Trung Quốc', '0998223090', 'Nhà sản xuất điện thoại Realmel.'),
(7, 'Huawei', 'Trung Quốc', '0928293021', 'Nhà sản xuất điện thoại Huawei.'),
(8, 'Vingroup', 'Việt Nam', '0938339220', 'Nhà sản xuất điện thoại Vingroup.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukiengiamgia`
--

CREATE TABLE `sukiengiamgia` (
  `idSuKienGiamGia` int(11) NOT NULL,
  `tenSuKien` varchar(45) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `idTheloai` int(10) UNSIGNED NOT NULL,
  `tentheloai` varchar(45) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`idTheloai`, `tentheloai`, `moTa`) VALUES
(1, 'Mặt hàng bình thường', NULL),
(2, 'Mặt hàng mới', NULL),
(3, 'Mặt hàng được yêu thích', NULL),
(4, 'Mặt hàng bán chạy', NULL),
(5, 'Mặt hàng ế ẩm', NULL),
(6, 'Nổi bật', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idBinhLuan`),
  ADD KEY `fk_binhluan_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_binhluan_khachhang1_idx` (`khachhang_idKhachHang`);

--
-- Chỉ mục cho bảng `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD PRIMARY KEY (`idChiTiet`),
  ADD KEY `fk_chitietmuahang_donmuahang1_idx` (`donmuahang_idDonHang`),
  ADD KEY `fk_chitietmuahang_mobile1_idx` (`mobile_idMobile`);

--
-- Chỉ mục cho bảng `donmuahang`
--
ALTER TABLE `donmuahang`
  ADD PRIMARY KEY (`idDonHang`),
  ADD KEY `fk_donmuahang_khachhang1_idx` (`khachhang_idKhachHang`),
  ADD KEY `fk_donmuahang_nhanvien1_idx` (`nhanvien_idNhanVien`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`khachhang_idKhachHang`);

--
-- Chỉ mục cho bảng `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giohang_has_mobile_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_giohang_has_mobile_giohang1_idx` (`giohang_khachhang_idKhachHang`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`idHinhAnh`),
  ADD KEY `fk_HinhAnh_Mobile1_idx` (`Mobile_idMobile`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKhachHang`);

--
-- Chỉ mục cho bảng `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`idMobile`),
  ADD KEY `fk_Mobile_NhaCungCap1_idx` (`NhaCungCap_idNhaCungCap`),
  ADD KEY `fk_Mobile_NhaSanXuat1_idx` (`NhaSanXuat_idNhaSanXuat`),
  ADD KEY `fk_mobile_theloai1_idx` (`theloai_idTheloai`);

--
-- Chỉ mục cho bảng `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mobile_has_sukiengiamgia_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_mobile_has_sukiengiamgia_sukiengiamgia1_idx` (`sukiengiamgia_idSuKienGiamGia`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`idNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idNhanVien`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`idNhaSanXuat`);

--
-- Chỉ mục cho bảng `sukiengiamgia`
--
ALTER TABLE `sukiengiamgia`
  ADD PRIMARY KEY (`idSuKienGiamGia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`idTheloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idBinhLuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  MODIFY `idChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `donmuahang`
--
ALTER TABLE `donmuahang`
  MODIFY `idDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `idHinhAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idKhachHang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `mobile`
--
ALTER TABLE `mobile`
  MODIFY `idMobile` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `idNhaCungCap` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idNhanVien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `idNhaSanXuat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sukiengiamgia`
--
ALTER TABLE `sukiengiamgia`
  MODIFY `idSuKienGiamGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `idTheloai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`),
  ADD CONSTRAINT `fk_binhluan_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Các ràng buộc cho bảng `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD CONSTRAINT `fk_chitietmuahang_donmuahang1` FOREIGN KEY (`donmuahang_idDonHang`) REFERENCES `donmuahang` (`idDonHang`),
  ADD CONSTRAINT `fk_chitietmuahang_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Các ràng buộc cho bảng `donmuahang`
--
ALTER TABLE `donmuahang`
  ADD CONSTRAINT `fk_donmuahang_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`),
  ADD CONSTRAINT `fk_donmuahang_nhanvien1` FOREIGN KEY (`nhanvien_idNhanVien`) REFERENCES `nhanvien` (`idNhanVien`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`);

--
-- Các ràng buộc cho bảng `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  ADD CONSTRAINT `fk_giohang_has_mobile_giohang1` FOREIGN KEY (`giohang_khachhang_idKhachHang`) REFERENCES `giohang` (`khachhang_idKhachHang`),
  ADD CONSTRAINT `fk_giohang_has_mobile_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_HinhAnh_Mobile1` FOREIGN KEY (`Mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Các ràng buộc cho bảng `mobile`
--
ALTER TABLE `mobile`
  ADD CONSTRAINT `fk_Mobile_NhaCungCap1` FOREIGN KEY (`NhaCungCap_idNhaCungCap`) REFERENCES `nhacungcap` (`idNhaCungCap`),
  ADD CONSTRAINT `fk_Mobile_NhaSanXuat1` FOREIGN KEY (`NhaSanXuat_idNhaSanXuat`) REFERENCES `nhasanxuat` (`idNhaSanXuat`),
  ADD CONSTRAINT `fk_mobile_theloai1` FOREIGN KEY (`theloai_idTheloai`) REFERENCES `theloai` (`idTheloai`);

--
-- Các ràng buộc cho bảng `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  ADD CONSTRAINT `fk_mobile_has_sukiengiamgia_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`),
  ADD CONSTRAINT `fk_mobile_has_sukiengiamgia_sukiengiamgia1` FOREIGN KEY (`sukiengiamgia_idSuKienGiamGia`) REFERENCES `sukiengiamgia` (`idSuKienGiamGia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
