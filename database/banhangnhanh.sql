-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2021 lúc 03:23 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhangnhanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_ctdh` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `total_donhang` int(11) NOT NULL DEFAULT 0,
  `status_donhang` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `total_donhang`, `status_donhang`, `created_at`, `updated_at`, `id_khachhang`) VALUES
(77, 2330000, 1, '2021-04-05 16:03:09', '2021-04-05 16:15:22', 40),
(78, 2345000, 1, '2021-04-05 20:39:41', '2021-04-07 08:41:51', 41),
(79, 0, 0, '2021-04-06 09:49:15', '2021-04-06 09:49:15', 42),
(80, 3132300, 1, '2021-04-07 08:42:35', '2021-04-07 08:43:05', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `name_khachhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_khachhang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_khachhang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_khachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `name_khachhang`, `phone_khachhang`, `email_khachhang`, `address_khachhang`) VALUES
(40, 'tri tri tri fffff', '12365478965', 'wqweqweq@ecvgbjkjkm', 'hjhg gfdg sh dhs dghhdsghs dg'),
(41, 'tri hfbvhbfhgbf', '2132123121321', 'qweeretrte@evgvgvfgfgf', 'vgfg fgvfg fgvfg gfvgfg gfvgf'),
(42, 'eqweqwq', '441414252111', 'fvggvgfvggf@ewewew', 'wewecwewvwvvewvew'),
(43, 'dasda', '313231231231', 'weqweqw@eqweqwe', 'wqweqweqweqweqw');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loaisanpham` int(11) NOT NULL,
  `name_loaisanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loaisanpham`, `name_loaisanpham`) VALUES
(39, 'Quạt bàn'),
(40, 'Quạt trần'),
(41, 'Quạt treo tường'),
(42, 'Quạt đứng'),
(43, 'Quạt hơi nước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `name_sanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_sanpham` text COLLATE utf8_unicode_ci NOT NULL,
  `price_sanpham` int(9) NOT NULL DEFAULT 0,
  `discount_sanpham` int(9) DEFAULT 0,
  `image_sanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount_sanpham` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_loaisanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `name_sanpham`, `description_sanpham`, `price_sanpham`, `discount_sanpham`, `image_sanpham`, `amount_sanpham`, `created_at`, `updated_at`, `id_loaisanpham`) VALUES
(93, 'Quạt Treo YANFAN TC408', 'Số Cánh Quạt	Tốc Độ Gió	Chất Liệu	Kích thước Cánh Quạt. Công Suất Thực 7 cánh. 3 tốc độ.Nhựa	400 mm	47w', 410000, NULL, 'tdjKWWpnO8Hab5TVOPDphQdfPI97Z7GoXYkADLkv.png', 60, '2021-03-12 12:08:28', '2021-03-12 12:08:28', 41),
(94, 'Quạt Treo ASIA L16022-GREY', 'Công suất : 55W  Đường kính cánh quạt : 40cm  Sản xuất tại Việt Nam  Loại motor : bạc thau', 949000, NULL, '04G9dUWbZPdQNL2MWcgExPwBooc72dE0rSafUI9N.png', 25, '2021-03-12 12:11:32', '2021-04-06 09:21:48', 39),
(95, 'QUẠT TRẦN KDK M60XG', 'Điều chỉnh 5 chế độ gió.  Thiết kế sang trọng.  Hệ thống  dây an toàn.  Bảo hành 12 tháng', 1510000, NULL, 'wJUlnZKtvZ8Bh47W5FKBNMRHwl2GgqSLhrcmLCYM.png', 10, '2021-03-12 12:13:57', '2021-03-12 12:14:37', 39),
(96, 'Quạt Bàn YANFAN B302', 'Công suất 36w  Kích thước cánh 300mm  Thiết kế nhỏ gọn, phong cánh  3 chế độ gió  Hàng Việt Nam chất lượng cao', 335000, NULL, 'RI7K8pR45jFXRYskKU5G0y2PxFBP7Aw4zIMvmLrA.png', 27, '2021-03-12 12:17:16', '2021-03-12 12:17:16', 39),
(97, 'Quạt Bàn TEFAL VF3617O1', 'Công suất : 55w  3 mức tốc độ gió  Lồng quạt đan khít  Sử dụng động cơ bạc thau', 835000, NULL, 'gAlwXNdQzrJa6RKnzQBxMKY9cN1EmbzL76euTR16.png', 20, '2021-03-12 12:20:05', '2021-03-12 12:20:05', 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `name_slider` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_slider` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id_slider`, `name_slider`, `image_slider`) VALUES
(25, 'hihi', 'd53IAMAdXvlLGyGqbhXbNeTitWLdeNAyWahe5Vgz.jpg'),
(26, 'a', '0Cbqf2OIXNi0yIyspXO46glbZLEAVpen2cyYw351.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'heroes@gmail.com', NULL, '$2y$10$3xp001ICqv/gvIx9wcXCHeou.V4Xl8OK/V3r28NQjOq8kifEMVwjC', NULL, NULL, '2021-04-04 06:38:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_ctdh`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_loaisanpham` (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loaisanpham`) REFERENCES `loaisanpham` (`id_loaisanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
