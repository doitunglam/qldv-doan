-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qldv`
--

-- --------------------------------------------------------

--
-- Table structure for table `chidoan`
--

CREATE TABLE `chidoan` (
  `MaCD` varchar(10) NOT NULL,
  `TenCD` varchar(100) NOT NULL,
  `DiaChi` text NOT NULL,
  `SDT` varchar(13) NOT NULL,
  `MaKhoa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chidoan`
--

INSERT INTO `chidoan` (`MaCD`, `TenCD`, `DiaChi`, `SDT`, `MaKhoa`) VALUES
('1', 'Công Nghệ Phần Mềm', '02 - Nguyễn Đình Chiểu - Nha Trang', '0771350000', 'CNTT'),
('2', 'Mạng Máy Tính', '03 - Nguyễn Đình Chiểu - Nha Trang', '0771351111', 'CNTT'),
('3', 'Cơ Điện Tử 1', '05 - Nguyễn Đình Chiểu - Nha Trang', '0771356666', 'CDT'),
('4', 'Kinh Tế 1', '03 - Nguyễn Đình Chiểu - Nha Trang', '0771354444', 'KT'),
('5', 'Kinh Tế 2', '04 - Nguyễn Đình Chiểu - Nha Trang', '0771353333', 'KT');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` varchar(10) NOT NULL,
  `TenChucVu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`) VALUES
('1', 'Đoàn viên'),
('2', 'Bí thư Chi đoàn'),
('3', 'Phó Bí thư Chi đoàn'),
('4', 'Ủy viên Ban Chấp hành');

-- --------------------------------------------------------

--
-- Table structure for table `doanphi`
--

CREATE TABLE `doanphi` (
  `MaDV` varchar(8) NOT NULL,
  `HK1` int(10) NOT NULL DEFAULT 0,
  `HK2` int(10) NOT NULL DEFAULT 0,
  `HK3` int(10) NOT NULL DEFAULT 0,
  `HK4` int(10) NOT NULL DEFAULT 0,
  `HK5` int(11) NOT NULL DEFAULT 0,
  `HK6` int(11) NOT NULL DEFAULT 0,
  `HK7` int(11) NOT NULL DEFAULT 0,
  `HK8` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doanphi`
--

INSERT INTO `doanphi` (`MaDV`, `HK1`, `HK2`, `HK3`, `HK4`, `HK5`, `HK6`, `HK7`, `HK8`) VALUES
('61134111', 1, 1, 1, 1, 1, 1, 1, 1),
('61134112', 0, 1, 0, 0, 0, 0, 0, 0),
('61136110', 0, 1, 0, 0, 0, 0, 0, 0),
('61136111', 0, 1, 0, 0, 0, 0, 0, 0),
('61136112', 0, 1, 0, 0, 0, 0, 0, 0),
('61136113', 0, 1, 0, 0, 0, 0, 0, 0),
('61136114', 0, 1, 0, 0, 0, 0, 0, 0),
('61136115', 0, 1, 0, 0, 0, 0, 0, 0),
('61136116', 0, 1, 0, 0, 0, 0, 0, 0),
('61136117', 1, 1, 0, 0, 0, 0, 0, 0),
('61136118', 1, 1, 0, 0, 0, 0, 0, 0),
('61136119', 0, 1, 0, 0, 0, 0, 0, 0),
('61136401', 0, 1, 0, 0, 0, 0, 0, 0),
('61136481', 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doanvien`
--

CREATE TABLE `doanvien` (
  `MaDV` varchar(8) NOT NULL,
  `HoDV` varchar(100) NOT NULL,
  `TenDV` varchar(100) NOT NULL,
  `GioiTinh` smallint(6) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(13) NOT NULL,
  `QueQuan` text NOT NULL,
  `MaCD` varchar(10) NOT NULL,
  `NgayVaoDoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doanvien`
--

INSERT INTO `doanvien` (`MaDV`, `HoDV`, `TenDV`, `GioiTinh`, `NgaySinh`, `Email`, `SDT`, `QueQuan`, `MaCD`, `NgayVaoDoan`) VALUES
('123213', '1', '1', 1, '2024-02-16', 'doitunglam1@gmail.com', '1', '1', '1', '2024-02-21'),
('20203443', 'Do', 'Lam', 1, '2024-02-01', 'dolam@gmail.com', '0993328492', 'HN', '4', '2024-02-13'),
('61134111', 'Phạm Hữu', 'Danh', 1, '2001-11-02', 'huynguyen7111@gmail.com', '0775409509', 'Phú Yên', '1', '2020-06-20'),
('61134112', 'Huỳnh Quốc', 'Đạt', 1, '2001-01-02', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136110', 'Huỳnh Diệp', 'Phụng', 0, '2001-06-05', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136111', 'Ngọc', 'Huy', 1, '2001-06-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '1', '2020-06-12'),
('61136112', 'Lê Thị', 'Hiền', 0, '2001-06-28', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136113', 'Vũ Ngọc', 'An', 1, '2001-11-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '1', '2020-06-12'),
('61136114', 'Huỳnh Diệp', 'Phụng', 0, '2001-06-05', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136115', 'Phạm Hữu', 'Danh', 1, '2001-11-02', 'huynguyen7111@gmail.com', '0775409509', 'Phú Yên', '1', '2020-06-20'),
('61136116', 'Huỳnh Quốc', 'Đạt', 1, '2001-01-02', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136117', 'Ngọc', 'Huy', 1, '2001-06-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '1', '2020-06-12'),
('61136118', 'Lê Thị', 'Hiền', 0, '2001-06-28', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '1', '2020-06-20'),
('61136119', 'Vũ Ngọc', 'An', 1, '2001-11-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '1', '2020-06-12'),
('61136401', 'Ngọc', 'Huy', 0, '2022-06-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '1', '2022-06-12'),
('61136412', 'Nguyễn Văn', 'Minh', 1, '2001-06-28', 'huynguyen1101@gmail.com', '0775409509', 'Phú Yên', '5', '2023-06-05'),
('61136481', 'Nguyễn Văn', 'Hùng', 1, '2023-06-28', 'huynguyen7111@gmail.com', '0775409509', 'Phú Yên', '1', '2023-06-20'),
('71136111', 'Triệu Nam', 'Dương', 1, '2001-06-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '2', '2020-06-12'),
('71136112', 'Dương Thanh ', 'Dung', 0, '2001-06-28', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '2', '2020-06-20'),
('71136113', 'Trương Ngọc', 'Hào', 1, '2001-11-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '3', '2020-06-12'),
('71136114', 'Hồ Văn', 'Hiếu', 1, '2001-06-05', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '3', '2020-06-20'),
('71136115', 'Trần Trung', 'Hiếu', 1, '2001-11-02', 'huynguyen7111@gmail.com', '0775409509', 'Phú Yên', '4', '2020-06-20'),
('71136116', 'Đàm Thuyết', 'Hòa', 0, '2001-01-02', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '4', '2020-06-20'),
('71136117', 'Hồ Nhật', 'Hoàng', 1, '2001-06-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '2', '2020-06-12'),
('71136118', 'Phan Thị', 'Dung', 0, '2001-06-28', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '2', '2020-06-20'),
('71136119', 'Nguyễn Đăng', 'Khoa', 1, '2001-11-12', 'huynguyen71101@gmail.com', '0771350000', 'Phú Yên', '3', '2020-06-12'),
('71136133', 'Hoàng Công', 'Kiên', 1, '2001-06-05', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '3', '2020-06-20'),
('71136144', 'Tạ Bảo', 'Minh', 1, '2001-11-02', 'huynguyen7111@gmail.com', '0775409509', 'Phú Yên', '4', '2020-06-20'),
('71136155', 'Trịnh Minh', 'Phúc', 0, '2001-01-02', 'huynguyen7111@gmail.com', '0775409509', 'Khánh Hòa', '4', '2020-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giu`
--

CREATE TABLE `giu` (
  `MaDV` varchar(8) NOT NULL,
  `MaChucVu` varchar(10) NOT NULL,
  `NgayNhanChuc` date NOT NULL DEFAULT current_timestamp(),
  `NgayHetNhiemKy` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giu`
--

INSERT INTO `giu` (`MaDV`, `MaChucVu`, `NgayNhanChuc`, `NgayHetNhiemKy`) VALUES
('123213', '1', '2024-02-23', '2024-02-23'),
('20203443', '3', '2024-02-23', '2024-02-23'),
('61134111', '2', '2021-06-19', '2024-06-19'),
('61134112', '3', '2021-06-19', '2024-06-19'),
('61136110', '4', '2021-06-19', '2024-06-19'),
('61136111', '4', '2023-06-19', '2023-06-19'),
('61136112', '4', '2023-06-19', '2023-06-19'),
('61136113', '1', '2023-06-19', '2023-06-19'),
('61136114', '1', '2023-06-19', '2023-06-19'),
('61136115', '1', '2023-06-19', '2023-06-19'),
('61136116', '1', '2023-06-19', '2023-06-19'),
('61136117', '1', '2023-06-19', '2023-06-19'),
('61136118', '1', '2023-06-19', '2023-06-19'),
('61136119', '1', '2023-06-19', '2023-06-19'),
('61136401', '2', '2023-06-19', '2023-06-19'),
('61136412', '1', '2023-06-20', '2023-06-20'),
('61136481', '1', '2023-06-19', '2023-06-19'),
('71136111', '1', '2023-06-19', '2023-06-19'),
('71136112', '1', '2023-06-19', '2023-06-19'),
('71136113', '1', '2023-06-19', '2023-06-19'),
('71136114', '1', '2023-06-19', '2023-06-19'),
('71136115', '1', '2023-06-19', '2023-06-19'),
('71136116', '1', '2023-06-19', '2023-06-19'),
('71136117', '1', '2023-06-19', '2023-06-19'),
('71136118', '1', '2023-06-19', '2023-06-19'),
('71136119', '1', '2023-06-19', '2023-06-19'),
('71136133', '1', '2023-06-19', '2023-06-19'),
('71136144', '1', '2023-06-19', '2023-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

CREATE TABLE `hoatdong` (
  `MaHD` varchar(10) NOT NULL,
  `TenHD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`MaHD`, `TenHD`) VALUES
('4', 'abc xyz lmao lmao');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` varchar(10) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL,
  `SDT` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`, `SDT`) VALUES
('CDT', 'Cơ Điện Tử', '0134546555'),
('CNTT', 'Công Nghệ Thông Tin', '0121243132'),
('DL', 'Du Lịch', '0134546666'),
('KT', 'Kinh Tế', '0123454777');

-- --------------------------------------------------------

--
-- Table structure for table `lich`
--

CREATE TABLE `lich` (
  `MaLich` int(11) NOT NULL,
  `MaCD` varchar(10) NOT NULL,
  `HocKy` varchar(4) NOT NULL,
  `ThoiDiem` date NOT NULL,
  `TrangThai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lich`
--

INSERT INTO `lich` (`MaLich`, `MaCD`, `HocKy`, `ThoiDiem`, `TrangThai`) VALUES
(3, '1', 'HK2', '2024-02-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2021_01_02_103255_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', 'cf08826fccde5aafebbf1ca5fbe12e2357c386822724ca5ca0c49ba60458b55f', '[\"*\"]', NULL, NULL, '2023-06-11 17:54:44', '2023-06-11 17:54:44'),
(2, 'App\\Models\\User', 2, 'MyApp', 'f0259945e72e9d462c532d49f337395366367d60bce9f805cb60a936493f0993', '[\"*\"]', NULL, NULL, '2023-06-11 18:17:13', '2023-06-11 18:17:13'),
(3, 'App\\Models\\User', 2, 'MyApp', '518a935be21e08f8679c978fede5c128e344c3241dc0b196620f0db2f2bde643', '[\"*\"]', NULL, NULL, '2023-06-11 18:27:28', '2023-06-11 18:27:28'),
(4, 'App\\Models\\User', 2, 'MyApp', '733f804b22038df0ffd2b8cf576a125f477bdfbed1af524f7164c0b6e00c3a13', '[\"*\"]', NULL, NULL, '2023-06-11 18:29:42', '2023-06-11 18:29:42'),
(5, 'App\\Models\\User', 2, 'MyApp', '0c12a588c9d8a56d263e5c24c285a6d545d860bd677cd9244b3dfd915b50724e', '[\"*\"]', NULL, NULL, '2023-06-11 18:30:35', '2023-06-11 18:30:35'),
(6, 'App\\Models\\User', 2, 'MyApp', 'c46fe856e537040111d77a25285ade9a872337941ec04ae1e3db0fa1bcb0f297', '[\"*\"]', '2023-06-11 18:48:48', NULL, '2023-06-11 18:41:25', '2023-06-11 18:48:48'),
(7, 'App\\Models\\User', 2, 'MyApp', 'fb1bf863390a08cca9186e5c29e9bd7cea268fbc4dbdba4bf40e16b425de5906', '[\"*\"]', NULL, NULL, '2023-06-11 18:44:39', '2023-06-11 18:44:39'),
(8, 'App\\Models\\User', 2, 'MyApp', 'e28d36030fae03b45af2d48c0dd2eae7f7551450c971bf0015db89b2f5dd52f4', '[\"*\"]', NULL, NULL, '2023-06-11 18:46:27', '2023-06-11 18:46:27'),
(9, 'App\\Models\\User', 2, 'MyApp', 'bc46125a5255a7b4b2b0c79b78d08f1249ea9943498dde6440e624b919269ebb', '[\"*\"]', NULL, NULL, '2023-06-11 18:47:20', '2023-06-11 18:47:20'),
(10, 'App\\Models\\User', 2, 'MyApp', 'c599a687c90e5eb0d6783d8eb60572b2b5d8ebd5fd9513d94313388759035df9', '[\"*\"]', NULL, NULL, '2023-06-11 18:48:44', '2023-06-11 18:48:44'),
(11, 'App\\Models\\User', 2, 'MyApp', '101667b3d066c9e9cea4f1e74082af75157bf2805198044b8277ed97b6d93cbe', '[\"*\"]', '2023-06-13 01:36:02', NULL, '2023-06-11 18:50:30', '2023-06-13 01:36:02'),
(12, 'App\\Models\\User', 2, 'MyApp', 'b27487aa659b8147b85a7dbbb8059adb74540401502b5c9ac05686bc3a1ca81f', '[\"*\"]', NULL, NULL, '2023-06-11 18:57:28', '2023-06-11 18:57:28'),
(13, 'App\\Models\\User', 2, 'MyApp', '95853959558df3dd0cab2cb03790b0f7bc06a4583b98b26f4b43b5542b1d9fec', '[\"*\"]', NULL, NULL, '2023-06-12 19:42:27', '2023-06-12 19:42:27'),
(14, 'App\\Models\\User', 3, 'MyApp', '067b200d4d765d57c21b4ff8d46b3aad3033e0df12657b1757cf56b4f5c97625', '[\"*\"]', NULL, NULL, '2023-06-12 19:42:41', '2023-06-12 19:42:41'),
(15, 'App\\Models\\User', 4, 'MyApp', 'ce6e2b25e51fd97ed3db99ec24b1009b8f059dc2b5b2d8fcfc7b087128c83030', '[\"*\"]', NULL, NULL, '2023-06-12 20:10:50', '2023-06-12 20:10:50'),
(16, 'App\\Models\\User', 5, 'MyApp', '4c89b036ae8473f3f916f2cd93d835ff38db622194935d857cd65f7a4a1295ae', '[\"*\"]', NULL, NULL, '2023-06-12 20:11:14', '2023-06-12 20:11:14'),
(17, 'App\\Models\\User', 2, 'MyApp', 'abfc368512378cc987fad09fe161ef1ba49fafc0b6ee6ab20dbeda9c450b3b19', '[\"*\"]', NULL, NULL, '2023-06-12 23:06:44', '2023-06-12 23:06:44'),
(18, 'App\\Models\\User', 5, 'MyApp', '56588a68b3043f0405c4a0fe85e7ff30de8bf9823e4e674af77a242e6ebb256f', '[\"*\"]', '2023-06-13 05:06:08', NULL, '2023-06-12 23:07:07', '2023-06-13 05:06:08'),
(19, 'App\\Models\\User', 5, 'MyApp', '67afd6ab93cafa62a9cb89b91f17033f1854c8f74d865752f648a6ca364be584', '[\"*\"]', NULL, NULL, '2023-06-12 23:15:14', '2023-06-12 23:15:14'),
(20, 'App\\Models\\User', 1, 'MyApp', '3c31ba6880a32f44cb13b5239193261e296b88aa990fe4ebf8b741e91b294dff', '[\"*\"]', '2023-06-13 01:44:17', NULL, '2023-06-13 01:37:21', '2023-06-13 01:44:17'),
(21, 'App\\Models\\User', 1, 'MyApp', '422786389a8ad99aef188f8c62a9f5a70b150e42f9ce99d765b533f9e525c4f6', '[\"*\"]', NULL, NULL, '2023-06-13 04:05:53', '2023-06-13 04:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `renluyen`
--

CREATE TABLE `renluyen` (
  `MaDV` varchar(8) NOT NULL,
  `HocKy` varchar(11) NOT NULL,
  `Diem` int(11) NOT NULL,
  `XepLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renluyen`
--

INSERT INTO `renluyen` (`MaDV`, `HocKy`, `Diem`, `XepLoai`) VALUES
('61134111', 'HK1', 10, 'Trung bình'),
('61134112', 'HK1', 10, 'Trung bình'),
('61136110', 'HK1', 10, 'Trung bình'),
('61136111', 'HK1', 10, 'Trung bình'),
('61136112', 'HK1', 10, 'Trung bình'),
('61136113', 'HK1', 10, 'Trung bình'),
('61136114', 'HK1', 10, 'Trung bình'),
('61136115', 'HK1', 10, 'Trung bình'),
('61136116', 'HK1', 10, 'Trung bình'),
('61136117', 'HK1', 10, 'Trung bình'),
('61136118', 'HK1', 10, 'Trung bình'),
('61136119', 'HK1', 10, 'Trung bình'),
('61136401', 'HK1', 10, 'Trung bình'),
('61136481', 'HK1', 10, 'Trung bình');

-- --------------------------------------------------------

--
-- Table structure for table `sinhhoat`
--

CREATE TABLE `sinhhoat` (
  `MaDV` varchar(8) NOT NULL,
  `MaHD` varchar(10) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `DiaDiem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sodoan`
--

CREATE TABLE `sodoan` (
  `MaSD` varchar(10) NOT NULL,
  `MaDV` varchar(8) NOT NULL,
  `SoLanKhenThuong` tinyint(4) NOT NULL,
  `SoLanKyLuat` tinyint(4) NOT NULL,
  `NangKhieu` text NOT NULL,
  `XepLoai` varchar(30) NOT NULL,
  `NhanXet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Quyen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Quyen`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$TfHqzR6vQBcjx4vS1QsJe.mqbys/I3RJP8Qj6BL79ahtJ1RzOl./u', NULL, '2023-06-11 17:54:44', '2023-06-11 17:54:44', 10),
(2, 'admin2', 'ad2min@admin.com', NULL, '$2y$10$QiBr/ua/edfGBY027eMrXupmASk46QzVRzn996KrgYrG1hAfxGOvK', NULL, '2023-06-11 18:17:13', '2023-06-11 18:17:13', 0),
(3, 'admin22', 'admin1@admin.com', NULL, '$2y$10$RcacQDGfq8BXexIkzTe4aOk.alOEiYEtUHz6N9u.TuHp.NGHMpmjm', NULL, '2023-06-12 19:42:41', '2023-06-12 19:42:41', 0),
(4, 'admin222', 'admin11@admin.com', NULL, '$2y$10$vBHvyl9koHMa2jXUM2wD9eZi7w/dj.o.on3CgOXF0NSMw.QNWcp86', NULL, '2023-06-12 20:10:50', '2023-06-12 20:10:50', 0),
(5, 'admin2222222', 'admin111@admin.com', NULL, '$2y$10$.eX2qd4xKmUT2M1quyvC1OdXizpDgbIfZEzJ0jbSPpG4btGtMSfB6', NULL, '2023-06-12 20:11:14', '2023-06-12 20:11:14', 10),
(7, 'doitunglam1@gmail.com', 'doitunglam1@gmail.com', NULL, '$2y$10$TEprjnF6ptF4GGSHouOQ1.zrHuxKFfOeJ2YnsMqBWyUfAnGZv16Ia', NULL, '2023-06-16 05:45:41', '2023-06-16 05:45:41', 0),
(8, 'huynguyen71101@gmail.com', 'huynguyen71101@gmail.com', NULL, '$2y$10$nCAXphEccoxHpHvXZOjpM.BKk0oUgpGMz83EGgCRLkQSFgQDSYUyy', NULL, '2023-06-16 09:04:02', '2023-06-16 09:04:02', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chidoan`
--
ALTER TABLE `chidoan`
  ADD PRIMARY KEY (`MaCD`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaChucVu`);

--
-- Indexes for table `doanphi`
--
ALTER TABLE `doanphi`
  ADD UNIQUE KEY `MaDV_2` (`MaDV`),
  ADD UNIQUE KEY `MaDV_6` (`MaDV`),
  ADD KEY `MaDV` (`MaDV`),
  ADD KEY `MaDV_3` (`MaDV`),
  ADD KEY `MaDV_4` (`MaDV`),
  ADD KEY `MaDV_5` (`MaDV`);

--
-- Indexes for table `doanvien`
--
ALTER TABLE `doanvien`
  ADD PRIMARY KEY (`MaDV`),
  ADD KEY `MaCD` (`MaCD`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giu`
--
ALTER TABLE `giu`
  ADD PRIMARY KEY (`MaDV`,`MaChucVu`),
  ADD KEY `MaChucVu` (`MaChucVu`);

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`MaHD`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`MaLich`),
  ADD KEY `MaCD` (`MaCD`),
  ADD KEY `HocKy` (`HocKy`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sinhhoat`
--
ALTER TABLE `sinhhoat`
  ADD PRIMARY KEY (`MaDV`,`MaHD`),
  ADD KEY `MaHD` (`MaHD`);

--
-- Indexes for table `sodoan`
--
ALTER TABLE `sodoan`
  ADD PRIMARY KEY (`MaSD`,`MaDV`),
  ADD KEY `MaDV` (`MaDV`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lich`
--
ALTER TABLE `lich`
  MODIFY `MaLich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chidoan`
--
ALTER TABLE `chidoan`
  ADD CONSTRAINT `chidoan_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Constraints for table `doanphi`
--
ALTER TABLE `doanphi`
  ADD CONSTRAINT `doanphi_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `doanvien` (`MaDV`);

--
-- Constraints for table `doanvien`
--
ALTER TABLE `doanvien`
  ADD CONSTRAINT `doanvien_ibfk_1` FOREIGN KEY (`MaCD`) REFERENCES `chidoan` (`MaCD`);

--
-- Constraints for table `giu`
--
ALTER TABLE `giu`
  ADD CONSTRAINT `giu_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `doanvien` (`MaDV`),
  ADD CONSTRAINT `giu_ibfk_2` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`);

--
-- Constraints for table `sinhhoat`
--
ALTER TABLE `sinhhoat`
  ADD CONSTRAINT `sinhhoat_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `doanvien` (`MaDV`),
  ADD CONSTRAINT `sinhhoat_ibfk_2` FOREIGN KEY (`MaHD`) REFERENCES `hoatdong` (`MaHD`);

--
-- Constraints for table `sodoan`
--
ALTER TABLE `sodoan`
  ADD CONSTRAINT `sodoan_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `doanvien` (`MaDV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
