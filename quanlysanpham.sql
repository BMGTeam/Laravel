-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 04:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysanpham`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idDonHang` int(11) UNSIGNED NOT NULL,
  `idSanPham` int(11) UNSIGNED NOT NULL,
  `SoLuong` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ctdh`
--

CREATE TABLE `ctdh` (
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_SanPham` int(11) UNSIGNED NOT NULL,
  `Gia` double NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `ngaydathang` date NOT NULL,
  `ngaygiaohang` date NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `tinhtrangdonhang` int(11) NOT NULL,
  `tonggiatri` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `ngaydathang`, `ngaygiaohang`, `id_khachhang`, `tinhtrangdonhang`, `tonggiatri`, `created_at`, `updated_at`) VALUES
(1, '2017-03-03', '2017-03-03', 2, 4, 1223, '2017-03-03 07:20:53', '2017-03-03 08:02:16'),
(2, '2017-04-03', '2017-03-31', 1, 1, 1223, '2017-03-03 07:21:22', '2017-03-03 07:21:22'),
(3, '2017-03-03', '2017-03-03', 2, 4, 1223, '2017-03-03 08:02:06', '2017-03-03 08:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `TenKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `TenKH`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'Đức Thụ', 'Thủ Đức - TP HCM', '0969245459', 'ducthu@gmail.com'),
(2, 'Mỹ Thương', 'Linh Trung - Thủ Đức', '01678411346', 'thuonglun33@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoai` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CapDo` tinyint(2) NOT NULL,
  `MoTa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_Parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `TenLoai`, `Alias`, `CapDo`, `MoTa`, `id_Parent`) VALUES
(1, 'ÁO ĐẸP ĐỦ KIỂU222', 'chua-thuc-hien', 1, 'Áo các loại: Áo thun, áo sơ mi..v.v.', 0),
(2, 'QUẦN CHẤT22', 'chua-thuc-hien', 1, 'Quần hàng hiệu các loại: Quần jeans, quần tây...v.v', 0),
(3, 'GIÀY DÉP', 'giay-dep', 1, 'Giày dép chất lượng cao giá hợp lý: Giày thể thao, giày tây, dép tông.v.v..', 0),
(5, 'Quần Tây', 'quan-tay', 2, 'Quần Tây nhập khẩu chất lượng Việt Kiều', 2),
(6, 'Quần Short Kaki', 'quan-short-kaki', 2, 'Quần Short nhập khẩu chất lượng Việt Kiều', 2),
(9, 'Giày Thể Thao', 'giay-the-thao', 2, 'Giày Thể Thao China', 3),
(10, 'Giày Tây', 'giay-tay', 2, 'Giày Tây nhập khẩu Mỹ Tho', 3),
(13, 'Giày Tây Dr.Martinggggg', 'giay-tay-drmartin', 3, 'Giá không hề rẻ', 10),
(21, 'Quan short Kaki Adidas', 'chua-thuc-hien', 2, 'Giá không hề rẻ', 1),
(22, 'Giày The Thao Neptune', 'giay-tay-ecko', 3, 'Giá không hề bèo', 9),
(23, 'Quần Jeans Prada', 'chua-thuc-hien', 3, 'Nhập khẩu Pháp giá trên trời', 24),
(24, 'Quần Tây 3 số', 'chua-thuc-hien', 2, 'Nhập khẩu Pháp giá trên trời', 1),
(32, 'KÍNH', 'chua-thuc-hien', 1, 'áđá', 0),
(33, 'Kính râm', 'chua-thuc-hien', 2, 'Hehe', 32),
(34, 'Quần short chính hãng BG', 'chua-thuc-hien', 3, 'Giá bèo', 6),
(37, 'Áo Thun 269', 'chua-thuc-hien', 3, 'Áo Thu giá rẻ', 5),
(42, 'áđâsd', 'chua-thuc-hien', 3, NULL, 7),
(46, 'ÁO ĐẸP ĐỦ KIỂU222', 'chua-thuc-hien', 2, 'Áo các loại: Áo thun, áo sơ mi..v.v.', 1),
(47, 'ÁO ĐẸP ĐỦ KIỂU222', 'chua-thuc-hien', 3, 'Áo các loại: Áo thun, áo sơ mi..v.v.', 46),
(48, 'Kính râm 1', 'chua-thuc-hien', 3, 'Hehe', 33),
(49, 'Quan short Kaki Adidas', 'chua-thuc-hien', 3, 'Giá không hề rẻ 333', 21);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_02_19_033451_sanpham', 2),
(3, '2017_02_19_033559_loaisanpham', 3),
(4, '2017_02_19_033700_edit_loaisanpham', 4),
(5, '2017_02_19_034957_loaihang', 5),
(6, '2017_02_19_035349_edit_loaisp', 6),
(7, '2017_02_19_052119_edit_tt_sp', 7),
(8, '2014_10_12_100000_create_password_resets_table', 8),
(9, '2017_02_21_135000_DucThu_TaoBang_DonHang', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenSanPham` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhongDau` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `MaSanPham` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaLoaiSP` int(10) UNSIGNED NOT NULL,
  `GiaVon` double NOT NULL,
  `GiaBan` double NOT NULL,
  `id_TinhTrang` int(11) UNSIGNED NOT NULL,
  `SoLuongHienCo` int(11) NOT NULL,
  `AnhDaiDien` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSanPham`, `TenKhongDau`, `MaSanPham`, `NgayNhap`, `MaLoaiSP`, `GiaVon`, `GiaBan`, `id_TinhTrang`, `SoLuongHienCo`, `AnhDaiDien`) VALUES
(1, 'Quan dep 0001', 'quan-dep-0001', 'QD0001', '2017-02-16', 21, 2000, 3000, 2, 50, 'quan-dep-0001.jpg'),
(2, 'Giày nike', 'giay-nike', 'QD0001', '2017-02-16', 9, 2000, 3000, 1, 50, 'giay-nike.jpg'),
(3, 'Váy dạ hội', 'vay-da-hoi', 'VDH004', '2017-02-16', 37, 2000, 3000, 3, 50, 'vay-da-hoi.jpg'),
(4, 'Giày cao gót', 'giay-cao-got', 'GC0001', '2017-02-16', 3, 2000, 3000, 3, 50, 'giay-cao-got.jpg'),
(5, 'Giày adidas', 'giay-adidas', 'G0001', '2017-02-16', 3, 2000, 3000, 1, 50, NULL),
(6, 'fffffffff', 'fffffffff', 'g', '2017-03-02', 1, 12333, 12222, 1, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_img`
--

CREATE TABLE `sanpham_img` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `anh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham_img`
--

INSERT INTO `sanpham_img` (`id`, `id_sanpham`, `anh`, `updated_at`, `created_at`) VALUES
(1, 1, '13856532041006142471_927012526-600x600.jpg', '2017-03-02 08:13:24', '2017-03-02 08:13:24'),
(2, 1, '8204553190fb76078b.jpg', '2017-03-02 08:13:44', '2017-03-02 08:13:44'),
(3, 1, '273335-ao-thun-nu-co-v-phoi-vien-de-thuong.jpg', '2017-03-02 08:30:12', '2017-03-02 08:30:12'),
(4, 1, '2015812135927825965.jpg', '2017-03-02 08:30:21', '2017-03-02 08:30:21'),
(5, 1, 'aothunnu.jpg', '2017-03-02 08:30:31', '2017-03-02 08:30:31'),
(6, 1, '22-quan-ao01.jpg', '2017-03-02 08:31:24', '2017-03-02 08:31:24'),
(7, 1, '8204553190fb76078b.jpg', '2017-03-02 08:31:45', '2017-03-02 08:31:45'),
(8, 1, '8204553190fb76078b.jpg', '2017-03-02 08:39:58', '2017-03-02 08:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenTT` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TinhTrang';

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`id`, `TenTT`) VALUES
(1, 'Còn'),
(2, 'Hết'),
(3, 'Chờ nhập'),
(4, 'Chờ duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `id` int(11) NOT NULL,
  `TenTinhTrang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`id`, `TenTinhTrang`) VALUES
(1, 'Đã đặt'),
(2, 'Xác nhận'),
(3, 'Chờ giao'),
(4, 'Đã giao'),
(5, 'Thanh toán'),
(6, 'Hoàn tất');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sodienthoai` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capdo` int(11) NOT NULL,
  `chucvu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` int(11) NOT NULL,
  `chitiet` text COLLATE utf8mb4_unicode_ci,
  `anh` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `sodienthoai`, `email`, `password`, `capdo`, `chucvu`, `gioitinh`, `namsinh`, `chitiet`, `anh`, `remember_token`, `updated_at`, `created_at`) VALUES
(10, '000', NULL, NULL, 'thuong@gmail.com', '$2y$10$UZoCvWUSf4/zjmT.I.TG6uZP2iBUoSwNkG.cncxF9.YWj99E86klO', 0, NULL, 'Nữ', 1977, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(11, 'test', NULL, NULL, 'thuong@gmail.com', '$2y$10$SBcgePbluEa2x.lsbPAyIunVzfh67X/hWFkfNEAAbYDYeOD5n4peW', 0, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(12, 'thuong', NULL, NULL, 'thuong@gmail.com', '$2y$10$G3Q5ey01c2z/PVB7T91U/uBR8.LgeIl22fMXoxfNZH5kW02Vx7ZoC', 1, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(13, 'thuong', NULL, NULL, 'thuong@gmail.com', '$2y$10$cQMr3wgMFSqoRMwVhxNZrOA0CxB.ifHnFojejvshmqY6pQ23XqyUK', 1, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(15, '109', NULL, NULL, '1234@gmail.com', '$2y$10$41qKFrMzQE6W8.5kfZY7PesjVkPdOyauQATOzbqgCK.KqEjOLFNfO', 1, NULL, 'Chưabiết', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(16, '109999', NULL, NULL, '1234@gmail.com', '$2y$10$GIIapd.jum1.kZQUgvC0YOV8Zw39RS1D4/iVM4tpVoY41DL9RnhJu', 1, NULL, 'Chưabiết', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(17, '14520928888', NULL, NULL, '1234@gmail.com', '$2y$10$Yz7MOyE3a4DND3af7y5iQeHSlb.R7Y9VxRX76bGQzrjwaMQklKXam', 0, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(18, '10999', NULL, NULL, 'thuong@gmail.com', '$2y$10$luL40vE/bcvfwa7Bsk7L9uexrkyr793Fkr1ShgwQ2KWpYIIscAnC.', 1, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(19, 'mmmmm', NULL, NULL, 'thuong@gmail.com', '$2y$10$bNslFyrZRfxne3hEr85CS.aG/sG/vVQrWH/sLWYeqZRa3lK3VeNpW', 5, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(20, '12222', NULL, NULL, '222@gmail.com', '$2y$10$F3vHLtKZQ8YxDxV/48wnFePBtiXhh6LLx4CsMtgI.MshEJdFxpKIO', 1, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(21, '000', NULL, NULL, 'thuong@gmail.com', '$2y$10$88ssAjVCELBq/TT2p9L3Ae9B55.zCEmFdO6vlcYib7mzUTcfq2W4K', 0, NULL, 'Nữ', 1977, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(23, '123', 'Mỹ Thương', 102292, '123@gmail.com', '$2y$10$RZpeR.7XKQmeOU1rzXQPsu9lM3P5MiTPkkNpTMKL4C1yU.yS7zu5u', 1, 'manager', 'Nữ', 2002, 'hihi ăn ăn ăn', NULL, '', '2017-03-02 15:18:28', '2017-03-02 15:17:35'),
(24, 'thuong0000', NULL, NULL, 'thuong@gmail.com', '$2y$10$o6xgyJfmIVhVzpdAul5mP.7TNN2NWsdJW0YpzQKXQrtL.dT6amlSu', 1, NULL, 'Chưabiết', 1988, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(25, 'thuong0000', NULL, NULL, 'thuong@gmail.com', '$2y$10$YiIHqS0WlhQP2Pw55sXTnut2bYfJZX28lqJWvjlemlsEbgPHGELj6', 1, NULL, 'Chưabiết', 1988, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(27, '109999', NULL, NULL, '1234@gmail.com', '$2y$10$J61FIVvEfdcyU3B4D2xua.Mo/g2f9BynPmSyeiNxrxx5VhJYpE/XW', 1, NULL, 'Nữ', 1979, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(28, '22211', NULL, NULL, 'aasasd@g', '$2y$10$T0J2vtnHDC/us0jBgvAL0.bY1cnn.MCQMezmhZVDrZoU7MAHffTDa', 3, NULL, 'Nữ', 1968, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35'),
(29, 'thu22333', NULL, NULL, 'thuong@gmail.com', '$2y$10$Pgm85.57OTgV.WEb2xGESeKG17mgI5WE.UJ8VEfngpUCHfruPaPXK', 1, NULL, 'Nam', 1978, NULL, NULL, '', '2017-03-02 15:16:56', '2017-03-02 15:17:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idDonHang`,`idSanPham`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Indexes for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD KEY `ctdh_ibfk_2` (`id_SanPham`),
  ADD KEY `FK_DH` (`id_donhang`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_idkhachhang_foreign` (`id_khachhang`),
  ADD KEY `donhang_tinhtrangdonhang_foreign` (`tinhtrangdonhang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_maloaisp_foreign` (`MaLoaiSP`),
  ADD KEY `sanpham_id_tinhtrang_foreign` (`id_TinhTrang`);

--
-- Indexes for table `sanpham_img`
--
ALTER TABLE `sanpham_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_sanpham` (`id_sanpham`);

--
-- Indexes for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sanpham_img`
--
ALTER TABLE `sanpham_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `FK_DH` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_idkhachhang_foreign` FOREIGN KEY (`id_KhachHang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `donhang_tinhtrangdonhang_foreign` FOREIGN KEY (`tinhtrangdonhang`) REFERENCES `tinhtrangdonhang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_tinhtrang_foreign` FOREIGN KEY (`id_TinhTrang`) REFERENCES `tinhtrang` (`id`),
  ADD CONSTRAINT `sanpham_maloaisp_foreign` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisanpham` (`id`);

--
-- Constraints for table `sanpham_img`
--
ALTER TABLE `sanpham_img`
  ADD CONSTRAINT `FK_id_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
