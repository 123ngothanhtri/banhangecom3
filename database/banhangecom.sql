-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2021 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhangecom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ngô Thanh Trí', 'triadmin@gmail.com', '$2y$10$dchU45xW.nzp9U9Wmv5XzOfxaW03VnUbBvapaYpsAULDPSfKAJvTW', NULL, NULL, '2021-04-17 13:21:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_ctdh` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_users` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_ctdh`, `id_donhang`, `id_sanpham`, `quantity`, `id_users`) VALUES
(37, 98, 95, 2, 13),
(38, 99, 96, 1, 14);

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
  `id_users` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `total_donhang`, `status_donhang`, `created_at`, `updated_at`, `id_users`) VALUES
(98, 40, 1, '2021-04-29 18:46:13', '2021-04-29 19:05:37', 13),
(99, 10, 0, '2021-04-29 19:12:48', '2021-04-29 19:12:48', 14);

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
(44, 'Quạt điều hòa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `name_sanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_sanpham` text COLLATE utf8_unicode_ci NOT NULL,
  `price_sanpham` int(11) NOT NULL DEFAULT 0,
  `discount_sanpham` int(9) DEFAULT 0,
  `image_sanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount_sanpham` int(11) DEFAULT 0,
  `id_loaisanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `name_sanpham`, `description_sanpham`, `price_sanpham`, `discount_sanpham`, `image_sanpham`, `amount_sanpham`, `id_loaisanpham`) VALUES
(93, 'Quạt Treo YANFAN TC408', 'Số Cánh Quạt	Tốc Độ Gió	Chất Liệu	Kích thước Cánh Quạt. Công Suất Thực 7 cánh. 3 tốc độ.Nhựa	400 mm	47w', 40, NULL, 'tdjKWWpnO8Hab5TVOPDphQdfPI97Z7GoXYkADLkv.png', 600, 41),
(94, 'Quạt Treo ASIA L16022-GREY', 'Công suất : 55W  Đường kính cánh quạt : 40cm  Sản xuất tại Việt Nam  Loại motor : bạc thau', 90, NULL, '04G9dUWbZPdQNL2MWcgExPwBooc72dE0rSafUI9N.png', 250, 41),
(95, 'QUẠT TRẦN KDK M60XG', 'Điều chỉnh 5 chế độ gió.  Thiết kế sang trọng.  Hệ thống  dây an toàn.  Bảo hành 12 tháng', 20, NULL, 'wJUlnZKtvZ8Bh47W5FKBNMRHwl2GgqSLhrcmLCYM.png', 100, 40),
(96, 'Quạt Bàn YANFAN B302', 'Công suất 36w  Kích thước cánh 300mm  Thiết kế nhỏ gọn, phong cánh  3 chế độ gió  Hàng Việt Nam chất lượng cao', 10, NULL, 'RI7K8pR45jFXRYskKU5G0y2PxFBP7Aw4zIMvmLrA.png', 270, 39),
(97, 'Quạt Bàn TEFAL VF3617O1', 'Công suất : 55w  3 mức tốc độ gió  Lồng quạt đan khít  Sử dụng động cơ bạc thau', 80, NULL, 'gAlwXNdQzrJa6RKnzQBxMKY9cN1EmbzL76euTR16.png', 200, 39),
(114, 'Quạt đứng Asia D16018-BV0', 'Quạt hoạt động với công suất lớn 45 W, tiết kiệm điện. Thiết lập 3 tốc độ gió dễ tùy chỉnh với điều khiển nút nhấn. Chiều cao thay đổi linh hoạt, phù hợp với nhiều không gian sử dụng khác nhau. Thương hiệu Asia của Việt Nam, sản xuất tại Việt Nam.', 50, NULL, 'p5E8FyMgMLqagFTS90Qm9OFNF0liwXXyUZLCF84X.jpg', 230, 42),
(115, 'Quạt đứng Midea FS40-18CB', 'Công suất 50 W làm mát hiệu quả không gian gia đình. 3 cánh quạt đường kính 40 cm tạo luồng gió mạnh. Hoạt động êm ái, dễ chịu cho người sử dụng. Chiều cao thân quạt dễ dàng điều chỉnh. Điều khiển nút nhấn với 3 tốc độ gió dễ dùng.', 100, NULL, 'FNRnMWxFbA0omns7ktfdMqPboaeOR26VZ7CjbN1d.jpg', 90, 42),
(116, ' Daikiosan DKA-05000I', 'Máy có công suất làm mát 180W, miệng gió lớn nên lưu lượng gió lên đến 5.000 M³/H, làm mát cho không gian từ 35 - 40 M². Máy có 4 bánh xe, bạn có thể di chuyển máy', 200, NULL, 'rRMroPanOLInq8E1GYe4tl1UaJkU0GjqjnSXQ8pp.png', 60, 44);

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
(26, 'a', '0Cbqf2OIXNi0yIyspXO46glbZLEAVpen2cyYw351.jpg'),
(28, 'qw', 'eYh0f24ptSuJ7hIrgX05EsleSMpFFflzmBuZuWcx.jpg'),
(29, 'zd', '8Z7ovn1DsUMsDRQdKyDsVayZXwLA6Fnj42Jojs1T.jpg'),
(30, 'zc', 'O4iNeLSXlI0VruFJWR7TY7j99khglOzaoy9e4KQY.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lever` int(11) DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `email_verified_at`, `password`, `remember_token`, `lever`, `updated_at`) VALUES
(4, 'Trần Thần Thánh', 'zxc@zxc', '01234567899', 'Nam', '2000-04-07', 'Quốc lộ 1A, Quận cam, Sài gòn', NULL, '$2y$10$Vp0pTef5GtKY1sf/.fn1Ye4IqDyLE9shfATSuRY2FBq.WEpz4Tozm', 'Q0Kh4dHICOUAQM6gDoHDgUu7UJzvkhbtJFTmLM5vJI6SzepSNGlfp0CNB6jL', 1, '2021-04-16 13:32:16'),
(5, 'Sơn Tùng', 'tri@tri', '03698521477', 'Nam', '2000-01-01', '237 trung văn từ liêm hà nội, Huyện Ba Vì, Hà Nội', NULL, '$2y$10$7sGq1lAMMA5qr6/od4k1muZ6wZw3Ph8av2pujXBv1T1PD1w2/7QfK', 'zNVcZIGBNtFonM61prutx89vVwGbZ259rOM2GE0g', 1, '2021-04-16 13:45:15'),
(7, 'Nguyễn Hằng Nga', 'xxx@xxx', '02136985472', 'Nữ', '2003-09-01', 'Đường Trần Duy Hưng, Huyện Thần Thánh, Tp.Avenger', NULL, '$2y$10$YM1ADOkbnoNOV0GPHJOqduEIXLqHAA6H0BEc/NpD5Sud/K0drgf8a', 'KO1IkERpS9piVR9nCRjOnq1ZhSRLdGxCrBJBXlMO07FGpgM04Afhw5F1RTuw', 1, '2021-04-17 03:59:53'),
(9, 'Bùi Trân Nhân', 'tri@tri.com', '09658321145', 'Nam', '1991-01-12', 'New York', NULL, '$2y$10$dDeygnO3D0B3UwRuH2btO.l7EGzEthk0/WxnBejH5VrgysLnUFFDG', 'AHIJbKmoXGoHDuOMg6iQlWXzfeOGDWAN2PksELYA', 1, '2021-04-28 04:54:10'),
(11, 'qwqwqwqwqw', '123ngotzzhanhtri@gmail.com', '11212131221', 'Nam', '2021-04-17', 'aaaaaaaaaaaaaaaaaaaaaaaa', NULL, '$2y$10$cYLf3YMoXfeH5rgDxZfXyu4MT7TLgSxe3T4Wt/CEqp/sXaY6h9qfK', '5d0ZCQxYnSBQUrgne3MzolFI2chq3cMDCuJCtBgW', 1, '2021-04-29 10:45:52'),
(12, 'qwqwqwqwqw', '12zzhanhtri@gmail.com', '11212131221', 'Nữ', '2021-04-17', 'aaaaaaaaaaaaaaaaaaaaaaaa', NULL, '$2y$10$erqc4t4lHmgWHSPUFr8bmuf3sA2gL8hrOMtUGTOQGj4osjKLU2TXu', '5d0ZCQxYnSBQUrgne3MzolFI2chq3cMDCuJCtBgW', 1, '2021-04-29 10:47:26'),
(13, 'Nghi', 'ghi@tri.com', '01202365852', 'Nữ', '2021-04-17', 'Tp.Hôcm', NULL, '$2y$10$V/cFhxZmKmcYGXslTR5cTulNrbV6lHccgh.IjLSUon/BiCzKFED7K', 'c09dRe0A51Y1EIsBfIsfalPmN1dnkXuqBb27Ogt6sbXuCfg2MATi26YHwkXo', 1, '2021-04-29 10:49:13'),
(14, 'qwqwqwqwqw', '123ngothanhtri@gmail.comz', '1221232212121', 'Nam', '2021-04-01', 'wqwqwqwqwqwqwqwwqwq', NULL, '$2y$10$X8gBeGsDtNTEj3miWxOS7.E4C9Kk1lpxrKv8sK0sm11HSunX7Di3e', '5d0ZCQxYnSBQUrgne3MzolFI2chq3cMDCuJCtBgW', 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_ctdh`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_users` (`id_users`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_users` (`id_users`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emai` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `chitietdonhang_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loaisanpham`) REFERENCES `loaisanpham` (`id_loaisanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
