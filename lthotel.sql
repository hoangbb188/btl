-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 02:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lthotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `Anh` varchar(255) NOT NULL,
  `LienKet` varchar(255) NOT NULL,
  `Mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `email` varchar(64) NOT NULL,
  `MKs` int(11) NOT NULL,
  `ViTri` tinyint(3) NOT NULL,
  `PhucVu` tinyint(3) NOT NULL,
  `TienNghi` tinyint(3) NOT NULL,
  `Gia` tinyint(3) NOT NULL,
  `VeSinh` tinyint(3) NOT NULL,
  `NhanXet` varchar(500) NOT NULL,
  `Ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`email`, `MKs`, `ViTri`, `PhucVu`, `TienNghi`, `Gia`, `VeSinh`, `NhanXet`, `Ngay`) VALUES
('clonetrasua1@gmail.com', 2, 1, 1, 2, 2, 2, '<p>web site nay lua dao, hoi te</p>\n', '2019-06-13'),
('clonetrasua2@gmail.com', 2, 9, 8, 7, 8, 8, '<p>ừm cũng <em><strong><s>đc</s></strong></em></p>\n', '2019-06-13'),
('clonetrasua3@gmail.com', 2, 7, 6, 4, 9, 6, '<p>vẫn cứ l&agrave; ok&nbsp;</p>\n', '2019-06-13'),
('clonetrasua4@gmail.com', 2, 9, 8, 7, 7, 8, '<p><strong>ok lu&ocirc;n em ei&nbsp;</strong></p>\n', '2019-06-13'),
('clonetrasua5@gmail.com', 2, 9, 9, 8, 7, 7, '<p>tuyệt vời qu&aacute;, <em><strong>hjhj</strong></em></p>\n', '2019-06-13'),
('clonetrasua9@gmail.com', 2, 10, 10, 10, 10, 10, '<p>veri g&uacute;t&nbsp;</p>\n', '2019-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `id` int(11) NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `binhluan` varchar(500) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`id`, `rate`, `binhluan`, `contact`, `ThoiGian`, `trangthai`) VALUES
(1, 0, '<p>&aacute;dasda</p>\n', 'tan@gmail.com', '2019-06-12 02:51:54', 0),
(2, 0, '<p>sdadassd</p>\n', '21313@gmail.com', '2019-06-12 02:53:18', 0),
(3, 0, '<p>&aacute;dasda</p>\r\n', 'tan@gmail.com', '2019-06-12 02:51:54', 0),
(4, 0, '<p>sdadassd</p>\r\n', '21313@gmail.com', '2019-06-12 02:53:18', 0),
(5, 0, '<p>sdadassd</p>\r\n', '21313@gmail.com', '2019-06-12 02:53:18', 0),
(6, 1, '<p>&aacute;dasd</p>\n', 'nhoctargunn@gmail.com', '2019-06-12 03:27:13', 0),
(8, 3, '<p>&nbsp;t&ocirc;i l&agrave; t&ocirc;i rất th&iacute;ch web n&agrave;y đấy ahihi&nbsp;t&ocirc;i l&agrave; t&ocirc;i rất th&iacute;ch web n&agrave;y đấy ahihi&nbsp;t&ocirc;i l&agrave; t&ocirc;i rất th&iacute;ch web n&agrave;y đấy ahihi&nbsp;t&ocirc;i l&agrave; t&ocirc;i rất th&iacute;ch web n&agrave;y đấy ahihi&nbsp;t&ocirc;i l&agrave; t&ocirc;i rất th&iacute;ch web n&agrave;y đấy ahihi</p>\n', '123@gmail.com', '2019-06-12 03:47:41', 0),
(9, 0, '<p>aloo aloo test 12334</p>\n', 'doanxem@gmail.com', '2019-06-13 06:16:51', 0),
(10, 0, '<p>t&ocirc;i kh&ocirc;ng cảm thấy an to&agrave;n ở đ&acirc;y</p>\n', 'clonetrasua1@gmail.com', '2019-06-13 19:15:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MHd` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `Ten` varchar(64) NOT NULL,
  `TP` int(11) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `MKs` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `SL` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `NgayTra` date NOT NULL,
  `TGDat` datetime NOT NULL,
  `Tien` int(11) NOT NULL,
  `GiamGia` int(11) NOT NULL,
  `MaBaoMat` varchar(255) NOT NULL,
  `TrangThai` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MHd`, `email`, `Ten`, `TP`, `SDT`, `MKs`, `MP`, `SL`, `NgayDat`, `NgayTra`, `TGDat`, `Tien`, `GiamGia`, `MaBaoMat`, `TrangThai`) VALUES
(1, 'clonetrasua1@gmail.com', 'đoán xem', 2, '03587713651', 1, 1, 10, '2019-06-14', '2019-06-15', '2019-06-13 06:00:03', 7730000, 0, '6UDT6Ndb6s', 0),
(2, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 2, 4, 10, '2019-06-12', '2019-06-18', '2019-06-13 06:15:46', 44100000, 8820000, 'bwOHKgmBix', 1),
(3, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 1, 2, '2019-06-14', '2019-06-15', '2019-06-13 07:25:11', 1546000, 0, '4QheMTsHZG', 0),
(4, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 3, 8, '2019-06-14', '2019-06-15', '2019-06-13 07:25:21', 8656000, 0, 'DD8Z3uffS2', 0),
(5, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 3, 1, '2019-05-01', '2019-06-01', '2019-05-01 07:28:04', 1082000, 324600, 'hWlbntB5xp', 0),
(6, 'clonetrasua2@gmail.com', 'Lê Tan', 1, '0123456', 2, 4, 1, '2019-06-14', '2019-06-15', '2019-06-13 07:35:50', 735000, 0, 'N8KVuqjBSo', 1),
(7, 'clonetrasua3@gmail.com', 'Le Van Loc', 31, '0123456789', 1, 2, 1, '2019-06-14', '2019-06-15', '2019-06-13 07:44:52', 773000, 0, '8KjEiLiH8S', 1),
(8, 'clonetrasua3@gmail.com', 'Le Van Loc', 31, '0123456789', 2, 4, 1, '2019-06-14', '2019-06-15', '2019-06-13 07:50:23', 735000, 0, '7jQAYVOZbP', 1),
(9, 'clonetrasua4@gmail.com', 'Le Thi', 1, '0123415456', 2, 4, 1, '2019-06-14', '2019-06-15', '2019-06-13 07:53:59', 735000, 0, '7wu3aUYi9t', 1),
(10, 'clonetrasua5@gmail.com', 'Le Van Bi', 1, '0123456789', 2, 4, 1, '2019-06-14', '2019-06-15', '2019-06-13 07:57:22', 735000, 0, 'BzWP6NYpRf', 1),
(11, 'clonetrasua9@gmail.com', 'Le Kim', 1, '0123456789', 2, 4, 1, '2019-06-14', '2019-06-15', '2019-06-13 08:01:36', 735000, 0, '3KUfMfLe3p', 1),
(12, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 2, 1, '2019-06-14', '2019-06-15', '2019-06-13 09:04:41', 773000, 0, 'QgbU0f3itr', 0),
(13, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 1, 1, '2019-06-14', '2019-06-15', '2019-06-13 09:06:30', 773000, 231900, 'aDuf3zb3Ld', 0),
(14, 'clonetrasua1@gmail.com', 'đoán xem', 93, '03587713651', 1, 1, 1, '2019-06-14', '2019-06-15', '2019-06-13 09:11:40', 773000, 231900, 'VXE91nrjuo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachsan`
--

CREATE TABLE `khachsan` (
  `MKs` int(11) NOT NULL,
  `TenKs` varchar(255) NOT NULL,
  `TenKhongDau` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Huyen` int(11) NOT NULL,
  `TP` int(11) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Mota` varchar(500) NOT NULL,
  `GioiThieu` text NOT NULL,
  `sao` tinyint(1) NOT NULL,
  `TienIch` varchar(50) NOT NULL,
  `PhongCach` varchar(5) NOT NULL,
  `Loai` tinyint(3) NOT NULL,
  `TrangThai` smallint(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Xoa` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachsan`
--

INSERT INTO `khachsan` (`MKs`, `TenKs`, `TenKhongDau`, `DiaChi`, `Huyen`, `TP`, `Avatar`, `Mota`, `GioiThieu`, `sao`, `TienIch`, `PhongCach`, `Loai`, `TrangThai`, `email`, `Xoa`) VALUES
(1, 'Khách Sạn Dana Marina', 'Khach San Dana Marina', ' So 47-49 Duong Vo Van Kiet', 493, 48, 'assets/uploads/ks-1/avt-ks-1.webp', '<p>Kh&aacute;ch sạn Dana Marina</p>\r\n', '', 4, ':1:2:3:4:5:6:7:8:9:10:11:12', '1', 0, 1, 'clone@gmail.com', 0),
(2, 'Khách Sạn Salem Riverside Đà Nẵng', 'Khach San Salem Riverside Da Nang', '323 Tran Hung Dao', 490, 48, 'assets/uploads/ks-2/avt-ks-2.jpg', '<p>Kh&aacute;ch Sạn Salem Riverside Đ&agrave; Nẵng</p>\r\n', '', 3, ':1:2:3:9:11', '1', 0, 1, 'clone@gmail.com', 0),
(3, 'Khách Sạn Grand Gold', 'Khach San Grand Gold', 'Lo1- A2.2 Hoang Sa, Tho Quang', 490, 48, 'assets/uploads/ks-3/avt-ks-3.webp', '<p>Kh&aacute;ch Sạn Grand Gold</p>\r\n', '', 4, ':5:6:8:9:11:12', '1', 0, 1, 'clone@gmail.com', 0),
(4, 'Khách Sạn Sofitel Saigon Plaza', 'Khach San Sofitel Saigon Plaza', '17 Dai lo Le Duan', 760, 79, 'assets/uploads/ks-4/avt-ks-4.jpg', '<p>Kh&aacute;ch Sạn Sofitel Saigon Plaza&nbsp;</p>\r\n', '', 5, '', '1', 0, 1, 'clonetrasua2@gmail.com', 0),
(5, 'Khách Sạn Equatorial', 'Khach San Equatorial', ' 242 Tran Binh Trong', 760, 79, 'assets/uploads/ks-5/avt-ks-5.jpg', '<p>Kh&aacute;ch Sạn Equatorial</p>\r\n', '', 5, '', '1', 0, 0, 'clonetrasua2@gmail.com', 0),
(6, 'Alagon Central Hotel &amp; Spa', 'Alagon Central Hotel & Spa', ' 52B -62-64 Pham Hong Thai, Phuong Ben Thanh', 760, 79, '', '<p>Alagon Central Hotel &amp; Spa</p>\n', '', 3, '', '1', 0, 1, 'clonetrasua2@gmail.com', 0),
(7, 'khách sạn 69', 'khach san 69', '123 Tran Duy Hung', 1, 1, '', '<p>v&ocirc; thử chuối</p>\n', '', 4, '', '1', 0, 0, 'clone@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lichsugd`
--

CREATE TABLE `lichsugd` (
  `MGd` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `MHd` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `Noidung` varchar(255) NOT NULL,
  `ThayDoi` int(11) NOT NULL,
  `Loai` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichsugd`
--

INSERT INTO `lichsugd` (`MGd`, `email`, `MHd`, `ThoiGian`, `Noidung`, `ThayDoi`, `Loai`) VALUES
(1, 'clone@gmail.com', 1, '2019-06-13 06:00:03', 'Được thanh toán tiền phòng', 7343500, 2),
(2, 'clonetrasua1@gmail.com', 1, '2019-06-13 06:00:03', 'Thanh toán tiền phòng', -7730000, 1),
(3, 'admin@LTW.com', 1, '2019-06-13 06:00:03', 'Được nhận hoa hồng 5%', 386500, 3),
(4, 'clonetrasua1@gmail.com', 0, '2019-06-13 06:09:49', 'Nạp tiền vào tài khoản', 1000000000, 0),
(5, 'admin@LTW.com', 0, '2019-06-13 06:09:49', 'Nạp tiền vào tài khoản clonetrasua1@gmail.com', 1000000000, 4),
(6, 'clone@gmail.com', 2, '2019-06-12 06:15:46', 'Được thanh toán tiền phòng', 33516000, 2),
(7, 'clonetrasua1@gmail.com', 2, '2019-06-12 06:15:46', 'Thanh toán tiền phòng', -35280000, 1),
(8, 'admin@LTW.com', 2, '2019-06-12 06:15:46', 'Được nhận hoa hồng 5%', 1764000, 3),
(9, 'clone@gmail.com', 3, '2019-06-13 07:25:11', 'Được thanh toán tiền phòng', 1468700, 2),
(10, 'clonetrasua1@gmail.com', 3, '2019-06-13 07:25:11', 'Thanh toán tiền phòng', -1546000, 1),
(11, 'admin@LTW.com', 3, '2019-06-13 07:25:11', 'Được nhận hoa hồng 5%', 77300, 3),
(12, 'clone@gmail.com', 4, '2019-06-13 07:25:21', 'Được thanh toán tiền phòng', 8223200, 2),
(13, 'clonetrasua1@gmail.com', 4, '2019-06-13 07:25:21', 'Thanh toán tiền phòng', -8656000, 1),
(14, 'admin@LTW.com', 4, '2019-06-13 07:25:22', 'Được nhận hoa hồng 5%', 432800, 3),
(15, 'clone@gmail.com', 5, '2019-05-01 07:28:04', 'Được thanh toán tiền phòng', 719530, 2),
(16, 'clonetrasua1@gmail.com', 5, '2019-05-01 07:28:04', 'Thanh toán tiền phòng', -757400, 1),
(17, 'admin@LTW.com', 5, '2019-05-01 07:28:04', 'Được nhận hoa hồng 5%', 37870, 3),
(18, 'clonetrasua2@gmail.com', 0, '2019-06-13 07:35:43', 'Nạp tiền vào tài khoản', 500000000, 0),
(19, 'admin@LTW.com', 0, '2019-06-13 07:35:43', 'Nạp tiền vào tài khoản clonetrasua2@gmail.com', 500000000, 4),
(20, 'clone@gmail.com', 6, '2019-06-13 07:35:50', 'Được thanh toán tiền phòng', 698250, 2),
(21, 'clonetrasua2@gmail.com', 6, '2019-06-13 07:35:50', 'Thanh toán tiền phòng', -735000, 1),
(22, 'admin@LTW.com', 6, '2019-06-13 07:35:50', 'Được nhận hoa hồng 5%', 36750, 3),
(23, 'clonetrasua3@gmail.com', 0, '2019-06-13 07:43:44', 'Nạp tiền vào tài khoản', 1000000, 0),
(24, 'admin@LTW.com', 0, '2019-06-13 07:43:44', 'Nạp tiền vào tài khoản clonetrasua3@gmail.com', 1000000, 4),
(25, 'clone@gmail.com', 7, '2019-06-13 07:44:52', 'Được thanh toán tiền phòng', 734350, 2),
(26, 'clonetrasua3@gmail.com', 7, '2019-06-13 07:44:52', 'Thanh toán tiền phòng', -773000, 1),
(27, 'admin@LTW.com', 7, '2019-06-13 07:44:52', 'Được nhận hoa hồng 5%', 38650, 3),
(28, 'clonetrasua3@gmail.com', 0, '2019-06-13 07:49:50', 'Nạp tiền vào tài khoản', 1000000000, 0),
(29, 'admin@LTW.com', 0, '2019-06-13 07:49:50', 'Nạp tiền vào tài khoản clonetrasua3@gmail.com', 1000000000, 4),
(30, 'clone@gmail.com', 8, '2019-06-13 07:50:23', 'Được thanh toán tiền phòng', 698250, 2),
(31, 'clonetrasua3@gmail.com', 8, '2019-06-13 07:50:23', 'Thanh toán tiền phòng', -735000, 1),
(32, 'admin@LTW.com', 8, '2019-06-13 07:50:23', 'Được nhận hoa hồng 5%', 36750, 3),
(33, 'clonetrasua4@gmail.com', 0, '2019-06-13 07:53:00', 'Nạp tiền vào tài khoản', 1000000000, 0),
(34, 'admin@LTW.com', 0, '2019-06-13 07:53:00', 'Nạp tiền vào tài khoản clonetrasua4@gmail.com', 1000000000, 4),
(35, 'clone@gmail.com', 9, '2019-06-13 07:53:59', 'Được thanh toán tiền phòng', 698250, 2),
(36, 'clonetrasua4@gmail.com', 9, '2019-06-13 07:53:59', 'Thanh toán tiền phòng', -735000, 1),
(37, 'admin@LTW.com', 9, '2019-06-13 07:53:59', 'Được nhận hoa hồng 5%', 36750, 3),
(38, 'clonetrasua5@gmail.com', 0, '2019-06-13 07:57:00', 'Nạp tiền vào tài khoản', 2147483647, 0),
(39, 'admin@LTW.com', 0, '2019-06-13 07:57:00', 'Nạp tiền vào tài khoản clonetrasua5@gmail.com', 2147483647, 4),
(40, 'clone@gmail.com', 10, '2019-06-13 07:57:22', 'Được thanh toán tiền phòng', 698250, 2),
(41, 'clonetrasua5@gmail.com', 10, '2019-06-13 07:57:22', 'Thanh toán tiền phòng', -735000, 1),
(42, 'admin@LTW.com', 10, '2019-06-13 07:57:22', 'Được nhận hoa hồng 5%', 36750, 3),
(43, 'clonetrasua9@gmail.com', 0, '2019-06-13 08:01:07', 'Nạp tiền vào tài khoản', 100000000, 0),
(44, 'admin@LTW.com', 0, '2019-06-13 08:01:07', 'Nạp tiền vào tài khoản clonetrasua9@gmail.com', 100000000, 4),
(45, 'clone@gmail.com', 11, '2019-06-13 08:01:36', 'Được thanh toán tiền phòng', 698250, 2),
(46, 'clonetrasua9@gmail.com', 11, '2019-06-13 08:01:36', 'Thanh toán tiền phòng', -735000, 1),
(47, 'admin@LTW.com', 11, '2019-06-13 08:01:36', 'Được nhận hoa hồng 5%', 36750, 3),
(48, 'clone@gmail.com', 12, '2019-06-13 09:04:41', 'Được thanh toán tiền phòng', 734350, 2),
(49, 'clonetrasua1@gmail.com', 12, '2019-06-13 09:04:41', 'Thanh toán tiền phòng', -773000, 1),
(50, 'admin@LTW.com', 12, '2019-06-13 09:04:41', 'Được nhận hoa hồng 5%', 38650, 3),
(51, 'clone@gmail.com', 13, '2019-06-13 09:06:30', 'Được thanh toán tiền phòng', 514045, 2),
(52, 'clonetrasua1@gmail.com', 13, '2019-06-13 09:06:30', 'Thanh toán tiền phòng', -541100, 1),
(53, 'admin@LTW.com', 13, '2019-06-13 09:06:30', 'Được nhận hoa hồng 5%', 27055, 3),
(54, 'clone@gmail.com', 14, '2019-06-13 09:11:40', 'Được thanh toán tiền phòng', 514045, 2),
(55, 'clonetrasua1@gmail.com', 14, '2019-06-13 09:11:40', 'Thanh toán tiền phòng', -541100, 1),
(56, 'admin@LTW.com', 14, '2019-06-13 09:11:40', 'Được nhận hoa hồng 5%', 27055, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mgg`
--

CREATE TABLE `mgg` (
  `IdMgg` int(11) NOT NULL,
  `Ma` varchar(50) NOT NULL,
  `Giam` int(11) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayHetHan` date NOT NULL,
  `Loai` tinyint(3) NOT NULL,
  `SL` int(11) NOT NULL,
  `MKs` int(11) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mgg`
--

INSERT INTO `mgg` (`IdMgg`, `Ma`, `Giam`, `NgayBatDau`, `NgayHetHan`, `Loai`, `SL`, `MKs`, `email`) VALUES
(17, 'Riverside20', 20, '2019-06-13', '2019-06-30', 0, 99, 2, 'clone@gmail.com'),
(18, 'HANA-MARINA-30', 30, '2019-06-13', '2019-06-29', 0, 0, 1, 'clone@gmail.com'),
(19, 'Riverside20-123', 1, '2019-06-14', '2019-06-15', 0, 1, 1, 'clone@gmail.com'),
(25, 'XIXI20', 20, '2019-06-13', '2019-06-15', 1, 10, 0, 'admin@LTW.com'),
(26, 'KS69-20', 20, '2019-06-14', '2019-06-15', 0, 2, 7, 'clone@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MP` int(11) NOT NULL,
  `LoaiP` varchar(50) NOT NULL,
  `TienIch` varchar(50) NOT NULL,
  `Dientich` float NOT NULL,
  `View` tinyint(3) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `SoNguoi` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `MKs` int(11) NOT NULL,
  `Xoa` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MP`, `LoaiP`, `TienIch`, `Dientich`, `View`, `Avatar`, `SoLuong`, `SoNguoi`, `Gia`, `MKs`, `Xoa`) VALUES
(1, 'Superior King', '18:19:20:23:25:27:29:30', 26, 3, 'assets/uploads/ks-1/avt-p-1.webp', 100, 2, 773000, 1, 0),
(2, 'Superior Twin', '19:20:22:27:30:31:32:33', 26, 0, 'assets/uploads/ks-1/avt-p-2.webp', 100, 2, 773000, 1, 0),
(3, 'Deluxe King', '18:19:20:21:22:23:24:25:26:27:29:30:31:32:33', 32, 1, 'assets/uploads/ks-1/avt-p-3.webp', 100, 3, 1082000, 1, 0),
(4, 'Deluxe Double', '18:19:20', 26, 2, 'assets/uploads/ks-2/avt-p-4.webp', 100, 2, 735000, 2, 0),
(5, 'Grand Ocean Suite', '18:19:20:21:22', 40, 1, 'assets/uploads/ks-3/avt-p-5.jpg', 100, 2, 1700000, 3, 0),
(6, 'Superior No Window', '18:19:20:21:22:23', 23, 0, 'assets/uploads/ks-5/avt-p-6.jpg', 100, 2, 1000000, 5, 0),
(7, 'Premier Deluxe Room', '18:19:21:22:24:27:29:31:32', 30, 0, 'assets/uploads/ks-5/avt-p-7.jpg', 100, 3, 1500000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `maqh` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `TenKhongDau` varchar(64) NOT NULL,
  `type` varchar(30) NOT NULL,
  `matp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`maqh`, `name`, `TenKhongDau`, `type`, `matp`) VALUES
(1, 'Quận Ba Đình', 'Quan Ba Dinh', 'Quận', '01'),
(2, 'Quận Hoàn Kiếm', 'Quan Hoan Kiem', 'Quận', '01'),
(3, 'Quận Tây Hồ', 'Quan Tay Ho', 'Quận', '01'),
(4, 'Quận Long Biên', 'Quan Long Bien', 'Quận', '01'),
(5, 'Quận Cầu Giấy', 'Quan Cau Giay', 'Quận', '01'),
(6, 'Quận Đống Đa', 'Quan Dong Da', 'Quận', '01'),
(7, 'Quận Hai Bà Trưng', 'Quan Hai Ba Trung', 'Quận', '01'),
(8, 'Quận Hoàng Mai', 'Quan Hoang Mai', 'Quận', '01'),
(9, 'Quận Thanh Xuân', 'Quan Thanh Xuan', 'Quận', '01'),
(16, 'Huyện Sóc Sơn', 'Huyen Soc Son', 'Huyện', '01'),
(17, 'Huyện Đông Anh', 'Huyen Dong Anh', 'Huyện', '01'),
(18, 'Huyện Gia Lâm', 'Huyen Gia Lam', 'Huyện', '01'),
(19, 'Quận Nam Từ Liêm', 'Quan Nam Tu Liem', 'Quận', '01'),
(20, 'Huyện Thanh Trì', 'Huyen Thanh Tri', 'Huyện', '01'),
(21, 'Quận Bắc Từ Liêm', 'Quan Bac Tu Liem', 'Quận', '01'),
(24, 'Thành phố Hà Giang', 'Thanh pho Ha Giang', 'Thành phố', '02'),
(26, 'Huyện Đồng Văn', 'Huyen Dong Van', 'Huyện', '02'),
(27, 'Huyện Mèo Vạc', 'Huyen Meo Vac', 'Huyện', '02'),
(28, 'Huyện Yên Minh', 'Huyen Yen Minh', 'Huyện', '02'),
(29, 'Huyện Quản Bạ', 'Huyen Quan Ba', 'Huyện', '02'),
(30, 'Huyện Vị Xuyên', 'Huyen Vi Xuyen', 'Huyện', '02'),
(31, 'Huyện Bắc Mê', 'Huyen Bac Me', 'Huyện', '02'),
(32, 'Huyện Hoàng Su Phì', 'Huyen Hoang Su Phi', 'Huyện', '02'),
(33, 'Huyện Xín Mần', 'Huyen Xin Man', 'Huyện', '02'),
(34, 'Huyện Bắc Quang', 'Huyen Bac Quang', 'Huyện', '02'),
(35, 'Huyện Quang Bình', 'Huyen Quang Binh', 'Huyện', '02'),
(40, 'Thành phố Cao Bằng', 'Thanh pho Cao Bang', 'Thành phố', '04'),
(42, 'Huyện Bảo Lâm', 'Huyen Bao Lam', 'Huyện', '04'),
(43, 'Huyện Bảo Lạc', 'Huyen Bao Lac', 'Huyện', '04'),
(44, 'Huyện Thông Nông', 'Huyen Thong Nong', 'Huyện', '04'),
(45, 'Huyện Hà Quảng', 'Huyen Ha Quang', 'Huyện', '04'),
(46, 'Huyện Trà Lĩnh', 'Huyen Tra Linh', 'Huyện', '04'),
(47, 'Huyện Trùng Khánh', 'Huyen Trung Khanh', 'Huyện', '04'),
(48, 'Huyện Hạ Lang', 'Huyen Ha Lang', 'Huyện', '04'),
(49, 'Huyện Quảng Uyên', 'Huyen Quang Uyen', 'Huyện', '04'),
(50, 'Huyện Phục Hoà', 'Huyen Phuc Hoa', 'Huyện', '04'),
(51, 'Huyện Hoà An', 'Huyen Hoa An', 'Huyện', '04'),
(52, 'Huyện Nguyên Bình', 'Huyen Nguyen Binh', 'Huyện', '04'),
(53, 'Huyện Thạch An', 'Huyen Thach An', 'Huyện', '04'),
(58, 'Thành Phố Bắc Kạn', 'Thanh Pho Bac Kan', 'Thành phố', '06'),
(60, 'Huyện Pác Nặm', 'Huyen Pac Nam', 'Huyện', '06'),
(61, 'Huyện Ba Bể', 'Huyen Ba Be', 'Huyện', '06'),
(62, 'Huyện Ngân Sơn', 'Huyen Ngan Son', 'Huyện', '06'),
(63, 'Huyện Bạch Thông', 'Huyen Bach Thong', 'Huyện', '06'),
(64, 'Huyện Chợ Đồn', 'Huyen Cho Don', 'Huyện', '06'),
(65, 'Huyện Chợ Mới', 'Huyen Cho Moi', 'Huyện', '06'),
(66, 'Huyện Na Rì', 'Huyen Na Ri', 'Huyện', '06'),
(70, 'Thành phố Tuyên Quang', 'Thanh pho Tuyen Quang', 'Thành phố', '08'),
(71, 'Huyện Lâm Bình', 'Huyen Lam Binh', 'Huyện', '08'),
(72, 'Huyện Nà Hang', 'Huyen Na Hang', 'Huyện', '08'),
(73, 'Huyện Chiêm Hóa', 'Huyen Chiem Hoa', 'Huyện', '08'),
(74, 'Huyện Hàm Yên', 'Huyen Ham Yen', 'Huyện', '08'),
(75, 'Huyện Yên Sơn', 'Huyen Yen Son', 'Huyện', '08'),
(76, 'Huyện Sơn Dương', 'Huyen Son Duong', 'Huyện', '08'),
(80, 'Thành phố Lào Cai', 'Thanh pho Lao Cai', 'Thành phố', '10'),
(82, 'Huyện Bát Xát', 'Huyen Bat Xat', 'Huyện', '10'),
(83, 'Huyện Mường Khương', 'Huyen Muong Khuong', 'Huyện', '10'),
(84, 'Huyện Si Ma Cai', 'Huyen Si Ma Cai', 'Huyện', '10'),
(85, 'Huyện Bắc Hà', 'Huyen Bac Ha', 'Huyện', '10'),
(86, 'Huyện Bảo Thắng', 'Huyen Bao Thang', 'Huyện', '10'),
(87, 'Huyện Bảo Yên', 'Huyen Bao Yen', 'Huyện', '10'),
(88, 'Huyện Sa Pa', 'Huyen Sa Pa', 'Huyện', '10'),
(89, 'Huyện Văn Bàn', 'Huyen Van Ban', 'Huyện', '10'),
(94, 'Thành phố Điện Biên Phủ', 'Thanh pho Dien Bien Phu', 'Thành phố', '11'),
(95, 'Thị Xã Mường Lay', 'Thi Xa Muong Lay', 'Thị xã', '11'),
(96, 'Huyện Mường Nhé', 'Huyen Muong Nhe', 'Huyện', '11'),
(97, 'Huyện Mường Chà', 'Huyen Muong Cha', 'Huyện', '11'),
(98, 'Huyện Tủa Chùa', 'Huyen Tua Chua', 'Huyện', '11'),
(99, 'Huyện Tuần Giáo', 'Huyen Tuan Giao', 'Huyện', '11'),
(100, 'Huyện Điện Biên', 'Huyen Dien Bien', 'Huyện', '11'),
(101, 'Huyện Điện Biên Đông', 'Huyen Dien Bien Dong', 'Huyện', '11'),
(102, 'Huyện Mường Ảng', 'Huyen Muong Ang', 'Huyện', '11'),
(103, 'Huyện Nậm Pồ', 'Huyen Nam Po', 'Huyện', '11'),
(105, 'Thành phố Lai Châu', 'Thanh pho Lai Chau', 'Thành phố', '12'),
(106, 'Huyện Tam Đường', 'Huyen Tam Duong', 'Huyện', '12'),
(107, 'Huyện Mường Tè', 'Huyen Muong Te', 'Huyện', '12'),
(108, 'Huyện Sìn Hồ', 'Huyen Sin Ho', 'Huyện', '12'),
(109, 'Huyện Phong Thổ', 'Huyen Phong Tho', 'Huyện', '12'),
(110, 'Huyện Than Uyên', 'Huyen Than Uyen', 'Huyện', '12'),
(111, 'Huyện Tân Uyên', 'Huyen Tan Uyen', 'Huyện', '12'),
(112, 'Huyện Nậm Nhùn', 'Huyen Nam Nhun', 'Huyện', '12'),
(116, 'Thành phố Sơn La', 'Thanh pho Son La', 'Thành phố', '14'),
(118, 'Huyện Quỳnh Nhai', 'Huyen Quynh Nhai', 'Huyện', '14'),
(119, 'Huyện Thuận Châu', 'Huyen Thuan Chau', 'Huyện', '14'),
(120, 'Huyện Mường La', 'Huyen Muong La', 'Huyện', '14'),
(121, 'Huyện Bắc Yên', 'Huyen Bac Yen', 'Huyện', '14'),
(122, 'Huyện Phù Yên', 'Huyen Phu Yen', 'Huyện', '14'),
(123, 'Huyện Mộc Châu', 'Huyen Moc Chau', 'Huyện', '14'),
(124, 'Huyện Yên Châu', 'Huyen Yen Chau', 'Huyện', '14'),
(125, 'Huyện Mai Sơn', 'Huyen Mai Son', 'Huyện', '14'),
(126, 'Huyện Sông Mã', 'Huyen Song Ma', 'Huyện', '14'),
(127, 'Huyện Sốp Cộp', 'Huyen Sop Cop', 'Huyện', '14'),
(128, 'Huyện Vân Hồ', 'Huyen Van Ho', 'Huyện', '14'),
(132, 'Thành phố Yên Bái', 'Thanh pho Yen Bai', 'Thành phố', '15'),
(133, 'Thị xã Nghĩa Lộ', 'Thi xa Nghia Lo', 'Thị xã', '15'),
(135, 'Huyện Lục Yên', 'Huyen Luc Yen', 'Huyện', '15'),
(136, 'Huyện Văn Yên', 'Huyen Van Yen', 'Huyện', '15'),
(137, 'Huyện Mù Căng Chải', 'Huyen Mu Cang Chai', 'Huyện', '15'),
(138, 'Huyện Trấn Yên', 'Huyen Tran Yen', 'Huyện', '15'),
(139, 'Huyện Trạm Tấu', 'Huyen Tram Tau', 'Huyện', '15'),
(140, 'Huyện Văn Chấn', 'Huyen Van Chan', 'Huyện', '15'),
(141, 'Huyện Yên Bình', 'Huyen Yen Binh', 'Huyện', '15'),
(148, 'Thành phố Hòa Bình', 'Thanh pho Hoa Binh', 'Thành phố', '17'),
(150, 'Huyện Đà Bắc', 'Huyen Da Bac', 'Huyện', '17'),
(151, 'Huyện Kỳ Sơn', 'Huyen Ky Son', 'Huyện', '17'),
(152, 'Huyện Lương Sơn', 'Huyen Luong Son', 'Huyện', '17'),
(153, 'Huyện Kim Bôi', 'Huyen Kim Boi', 'Huyện', '17'),
(154, 'Huyện Cao Phong', 'Huyen Cao Phong', 'Huyện', '17'),
(155, 'Huyện Tân Lạc', 'Huyen Tan Lac', 'Huyện', '17'),
(156, 'Huyện Mai Châu', 'Huyen Mai Chau', 'Huyện', '17'),
(157, 'Huyện Lạc Sơn', 'Huyen Lac Son', 'Huyện', '17'),
(158, 'Huyện Yên Thủy', 'Huyen Yen Thuy', 'Huyện', '17'),
(159, 'Huyện Lạc Thủy', 'Huyen Lac Thuy', 'Huyện', '17'),
(164, 'Thành phố Thái Nguyên', 'Thanh pho Thai Nguyen', 'Thành phố', '19'),
(165, 'Thành phố Sông Công', 'Thanh pho Song Cong', 'Thành phố', '19'),
(167, 'Huyện Định Hóa', 'Huyen Dinh Hoa', 'Huyện', '19'),
(168, 'Huyện Phú Lương', 'Huyen Phu Luong', 'Huyện', '19'),
(169, 'Huyện Đồng Hỷ', 'Huyen Dong Hy', 'Huyện', '19'),
(170, 'Huyện Võ Nhai', 'Huyen Vo Nhai', 'Huyện', '19'),
(171, 'Huyện Đại Từ', 'Huyen Dai Tu', 'Huyện', '19'),
(172, 'Thị xã Phổ Yên', 'Thi xa Pho Yen', 'Thị xã', '19'),
(173, 'Huyện Phú Bình', 'Huyen Phu Binh', 'Huyện', '19'),
(178, 'Thành phố Lạng Sơn', 'Thanh pho Lang Son', 'Thành phố', '20'),
(180, 'Huyện Tràng Định', 'Huyen Trang Dinh', 'Huyện', '20'),
(181, 'Huyện Bình Gia', 'Huyen Binh Gia', 'Huyện', '20'),
(182, 'Huyện Văn Lãng', 'Huyen Van Lang', 'Huyện', '20'),
(183, 'Huyện Cao Lộc', 'Huyen Cao Loc', 'Huyện', '20'),
(184, 'Huyện Văn Quan', 'Huyen Van Quan', 'Huyện', '20'),
(185, 'Huyện Bắc Sơn', 'Huyen Bac Son', 'Huyện', '20'),
(186, 'Huyện Hữu Lũng', 'Huyen Huu Lung', 'Huyện', '20'),
(187, 'Huyện Chi Lăng', 'Huyen Chi Lang', 'Huyện', '20'),
(188, 'Huyện Lộc Bình', 'Huyen Loc Binh', 'Huyện', '20'),
(189, 'Huyện Đình Lập', 'Huyen Dinh Lap', 'Huyện', '20'),
(193, 'Thành phố Hạ Long', 'Thanh pho Ha Long', 'Thành phố', '22'),
(194, 'Thành phố Móng Cái', 'Thanh pho Mong Cai', 'Thành phố', '22'),
(195, 'Thành phố Cẩm Phả', 'Thanh pho Cam Pha', 'Thành phố', '22'),
(196, 'Thành phố Uông Bí', 'Thanh pho Uong Bi', 'Thành phố', '22'),
(198, 'Huyện Bình Liêu', 'Huyen Binh Lieu', 'Huyện', '22'),
(199, 'Huyện Tiên Yên', 'Huyen Tien Yen', 'Huyện', '22'),
(200, 'Huyện Đầm Hà', 'Huyen Dam Ha', 'Huyện', '22'),
(201, 'Huyện Hải Hà', 'Huyen Hai Ha', 'Huyện', '22'),
(202, 'Huyện Ba Chẽ', 'Huyen Ba Che', 'Huyện', '22'),
(203, 'Huyện Vân Đồn', 'Huyen Van Don', 'Huyện', '22'),
(204, 'Huyện Hoành Bồ', 'Huyen Hoanh Bo', 'Huyện', '22'),
(205, 'Thị xã Đông Triều', 'Thi xa Dong Trieu', 'Thị xã', '22'),
(206, 'Thị xã Quảng Yên', 'Thi xa Quang Yen', 'Thị xã', '22'),
(207, 'Huyện Cô Tô', 'Huyen Co To', 'Huyện', '22'),
(213, 'Thành phố Bắc Giang', 'Thanh pho Bac Giang', 'Thành phố', '24'),
(215, 'Huyện Yên Thế', 'Huyen Yen The', 'Huyện', '24'),
(216, 'Huyện Tân Yên', 'Huyen Tan Yen', 'Huyện', '24'),
(217, 'Huyện Lạng Giang', 'Huyen Lang Giang', 'Huyện', '24'),
(218, 'Huyện Lục Nam', 'Huyen Luc Nam', 'Huyện', '24'),
(219, 'Huyện Lục Ngạn', 'Huyen Luc Ngan', 'Huyện', '24'),
(220, 'Huyện Sơn Động', 'Huyen Son Dong', 'Huyện', '24'),
(221, 'Huyện Yên Dũng', 'Huyen Yen Dung', 'Huyện', '24'),
(222, 'Huyện Việt Yên', 'Huyen Viet Yen', 'Huyện', '24'),
(223, 'Huyện Hiệp Hòa', 'Huyen Hiep Hoa', 'Huyện', '24'),
(227, 'Thành phố Việt Trì', 'Thanh pho Viet Tri', 'Thành phố', '25'),
(228, 'Thị xã Phú Thọ', 'Thi xa Phu Tho', 'Thị xã', '25'),
(230, 'Huyện Đoan Hùng', 'Huyen Doan Hung', 'Huyện', '25'),
(231, 'Huyện Hạ Hoà', 'Huyen Ha Hoa', 'Huyện', '25'),
(232, 'Huyện Thanh Ba', 'Huyen Thanh Ba', 'Huyện', '25'),
(233, 'Huyện Phù Ninh', 'Huyen Phu Ninh', 'Huyện', '25'),
(234, 'Huyện Yên Lập', 'Huyen Yen Lap', 'Huyện', '25'),
(235, 'Huyện Cẩm Khê', 'Huyen Cam Khe', 'Huyện', '25'),
(236, 'Huyện Tam Nông', 'Huyen Tam Nong', 'Huyện', '25'),
(237, 'Huyện Lâm Thao', 'Huyen Lam Thao', 'Huyện', '25'),
(238, 'Huyện Thanh Sơn', 'Huyen Thanh Son', 'Huyện', '25'),
(239, 'Huyện Thanh Thuỷ', 'Huyen Thanh Thuy', 'Huyện', '25'),
(240, 'Huyện Tân Sơn', 'Huyen Tan Son', 'Huyện', '25'),
(243, 'Thành phố Vĩnh Yên', 'Thanh pho Vinh Yen', 'Thành phố', '26'),
(244, 'Thị xã Phúc Yên', 'Thi xa Phuc Yen', 'Thị xã', '26'),
(246, 'Huyện Lập Thạch', 'Huyen Lap Thach', 'Huyện', '26'),
(247, 'Huyện Tam Dương', 'Huyen Tam Duong', 'Huyện', '26'),
(248, 'Huyện Tam Đảo', 'Huyen Tam Dao', 'Huyện', '26'),
(249, 'Huyện Bình Xuyên', 'Huyen Binh Xuyen', 'Huyện', '26'),
(250, 'Huyện Mê Linh', 'Huyen Me Linh', 'Huyện', '01'),
(251, 'Huyện Yên Lạc', 'Huyen Yen Lac', 'Huyện', '26'),
(252, 'Huyện Vĩnh Tường', 'Huyen Vinh Tuong', 'Huyện', '26'),
(253, 'Huyện Sông Lô', 'Huyen Song Lo', 'Huyện', '26'),
(256, 'Thành phố Bắc Ninh', 'Thanh pho Bac Ninh', 'Thành phố', '27'),
(258, 'Huyện Yên Phong', 'Huyen Yen Phong', 'Huyện', '27'),
(259, 'Huyện Quế Võ', 'Huyen Que Vo', 'Huyện', '27'),
(260, 'Huyện Tiên Du', 'Huyen Tien Du', 'Huyện', '27'),
(261, 'Thị xã Từ Sơn', 'Thi xa Tu Son', 'Thị xã', '27'),
(262, 'Huyện Thuận Thành', 'Huyen Thuan Thanh', 'Huyện', '27'),
(263, 'Huyện Gia Bình', 'Huyen Gia Binh', 'Huyện', '27'),
(264, 'Huyện Lương Tài', 'Huyen Luong Tai', 'Huyện', '27'),
(268, 'Quận Hà Đông', 'Quan Ha Dong', 'Quận', '01'),
(269, 'Thị xã Sơn Tây', 'Thi xa Son Tay', 'Thị xã', '01'),
(271, 'Huyện Ba Vì', 'Huyen Ba Vi', 'Huyện', '01'),
(272, 'Huyện Phúc Thọ', 'Huyen Phuc Tho', 'Huyện', '01'),
(273, 'Huyện Đan Phượng', 'Huyen Dan Phuong', 'Huyện', '01'),
(274, 'Huyện Hoài Đức', 'Huyen Hoai Duc', 'Huyện', '01'),
(275, 'Huyện Quốc Oai', 'Huyen Quoc Oai', 'Huyện', '01'),
(276, 'Huyện Thạch Thất', 'Huyen Thach That', 'Huyện', '01'),
(277, 'Huyện Chương Mỹ', 'Huyen Chuong My', 'Huyện', '01'),
(278, 'Huyện Thanh Oai', 'Huyen Thanh Oai', 'Huyện', '01'),
(279, 'Huyện Thường Tín', 'Huyen Thuong Tin', 'Huyện', '01'),
(280, 'Huyện Phú Xuyên', 'Huyen Phu Xuyen', 'Huyện', '01'),
(281, 'Huyện Ứng Hòa', 'Huyen Ung Hoa', 'Huyện', '01'),
(282, 'Huyện Mỹ Đức', 'Huyen My Duc', 'Huyện', '01'),
(288, 'Thành phố Hải Dương', 'Thanh pho Hai Duong', 'Thành phố', '30'),
(290, 'Thị xã Chí Linh', 'Thi xa Chi Linh', 'Thị xã', '30'),
(291, 'Huyện Nam Sách', 'Huyen Nam Sach', 'Huyện', '30'),
(292, 'Huyện Kinh Môn', 'Huyen Kinh Mon', 'Huyện', '30'),
(293, 'Huyện Kim Thành', 'Huyen Kim Thanh', 'Huyện', '30'),
(294, 'Huyện Thanh Hà', 'Huyen Thanh Ha', 'Huyện', '30'),
(295, 'Huyện Cẩm Giàng', 'Huyen Cam Giang', 'Huyện', '30'),
(296, 'Huyện Bình Giang', 'Huyen Binh Giang', 'Huyện', '30'),
(297, 'Huyện Gia Lộc', 'Huyen Gia Loc', 'Huyện', '30'),
(298, 'Huyện Tứ Kỳ', 'Huyen Tu Ky', 'Huyện', '30'),
(299, 'Huyện Ninh Giang', 'Huyen Ninh Giang', 'Huyện', '30'),
(300, 'Huyện Thanh Miện', 'Huyen Thanh Mien', 'Huyện', '30'),
(303, 'Quận Hồng Bàng', 'Quan Hong Bang', 'Quận', '31'),
(304, 'Quận Ngô Quyền', 'Quan Ngo Quyen', 'Quận', '31'),
(305, 'Quận Lê Chân', 'Quan Le Chan', 'Quận', '31'),
(306, 'Quận Hải An', 'Quan Hai An', 'Quận', '31'),
(307, 'Quận Kiến An', 'Quan Kien An', 'Quận', '31'),
(308, 'Quận Đồ Sơn', 'Quan Do Son', 'Quận', '31'),
(309, 'Quận Dương Kinh', 'Quan Duong Kinh', 'Quận', '31'),
(311, 'Huyện Thuỷ Nguyên', 'Huyen Thuy Nguyen', 'Huyện', '31'),
(312, 'Huyện An Dương', 'Huyen An Duong', 'Huyện', '31'),
(313, 'Huyện An Lão', 'Huyen An Lao', 'Huyện', '31'),
(314, 'Huyện Kiến Thuỵ', 'Huyen Kien Thuy', 'Huyện', '31'),
(315, 'Huyện Tiên Lãng', 'Huyen Tien Lang', 'Huyện', '31'),
(316, 'Huyện Vĩnh Bảo', 'Huyen Vinh Bao', 'Huyện', '31'),
(317, 'Huyện Cát Hải', 'Huyen Cat Hai', 'Huyện', '31'),
(318, 'Huyện Bạch Long Vĩ', 'Huyen Bach Long Vi', 'Huyện', '31'),
(323, 'Thành phố Hưng Yên', 'Thanh pho Hung Yen', 'Thành phố', '33'),
(325, 'Huyện Văn Lâm', 'Huyen Van Lam', 'Huyện', '33'),
(326, 'Huyện Văn Giang', 'Huyen Van Giang', 'Huyện', '33'),
(327, 'Huyện Yên Mỹ', 'Huyen Yen My', 'Huyện', '33'),
(328, 'Huyện Mỹ Hào', 'Huyen My Hao', 'Huyện', '33'),
(329, 'Huyện Ân Thi', 'Huyen An Thi', 'Huyện', '33'),
(330, 'Huyện Khoái Châu', 'Huyen Khoai Chau', 'Huyện', '33'),
(331, 'Huyện Kim Động', 'Huyen Kim Dong', 'Huyện', '33'),
(332, 'Huyện Tiên Lữ', 'Huyen Tien Lu', 'Huyện', '33'),
(333, 'Huyện Phù Cừ', 'Huyen Phu Cu', 'Huyện', '33'),
(336, 'Thành phố Thái Bình', 'Thanh pho Thai Binh', 'Thành phố', '34'),
(338, 'Huyện Quỳnh Phụ', 'Huyen Quynh Phu', 'Huyện', '34'),
(339, 'Huyện Hưng Hà', 'Huyen Hung Ha', 'Huyện', '34'),
(340, 'Huyện Đông Hưng', 'Huyen Dong Hung', 'Huyện', '34'),
(341, 'Huyện Thái Thụy', 'Huyen Thai Thuy', 'Huyện', '34'),
(342, 'Huyện Tiền Hải', 'Huyen Tien Hai', 'Huyện', '34'),
(343, 'Huyện Kiến Xương', 'Huyen Kien Xuong', 'Huyện', '34'),
(344, 'Huyện Vũ Thư', 'Huyen Vu Thu', 'Huyện', '34'),
(347, 'Thành phố Phủ Lý', 'Thanh pho Phu Ly', 'Thành phố', '35'),
(349, 'Huyện Duy Tiên', 'Huyen Duy Tien', 'Huyện', '35'),
(350, 'Huyện Kim Bảng', 'Huyen Kim Bang', 'Huyện', '35'),
(351, 'Huyện Thanh Liêm', 'Huyen Thanh Liem', 'Huyện', '35'),
(352, 'Huyện Bình Lục', 'Huyen Binh Luc', 'Huyện', '35'),
(353, 'Huyện Lý Nhân', 'Huyen Ly Nhan', 'Huyện', '35'),
(356, 'Thành phố Nam Định', 'Thanh pho Nam Dinh', 'Thành phố', '36'),
(358, 'Huyện Mỹ Lộc', 'Huyen My Loc', 'Huyện', '36'),
(359, 'Huyện Vụ Bản', 'Huyen Vu Ban', 'Huyện', '36'),
(360, 'Huyện Ý Yên', 'Huyen Y Yen', 'Huyện', '36'),
(361, 'Huyện Nghĩa Hưng', 'Huyen Nghia Hung', 'Huyện', '36'),
(362, 'Huyện Nam Trực', 'Huyen Nam Truc', 'Huyện', '36'),
(363, 'Huyện Trực Ninh', 'Huyen Truc Ninh', 'Huyện', '36'),
(364, 'Huyện Xuân Trường', 'Huyen Xuan Truong', 'Huyện', '36'),
(365, 'Huyện Giao Thủy', 'Huyen Giao Thuy', 'Huyện', '36'),
(366, 'Huyện Hải Hậu', 'Huyen Hai Hau', 'Huyện', '36'),
(369, 'Thành phố Ninh Bình', 'Thanh pho Ninh Binh', 'Thành phố', '37'),
(370, 'Thành phố Tam Điệp', 'Thanh pho Tam Diep', 'Thành phố', '37'),
(372, 'Huyện Nho Quan', 'Huyen Nho Quan', 'Huyện', '37'),
(373, 'Huyện Gia Viễn', 'Huyen Gia Vien', 'Huyện', '37'),
(374, 'Huyện Hoa Lư', 'Huyen Hoa Lu', 'Huyện', '37'),
(375, 'Huyện Yên Khánh', 'Huyen Yen Khanh', 'Huyện', '37'),
(376, 'Huyện Kim Sơn', 'Huyen Kim Son', 'Huyện', '37'),
(377, 'Huyện Yên Mô', 'Huyen Yen Mo', 'Huyện', '37'),
(380, 'Thành phố Thanh Hóa', 'Thanh pho Thanh Hoa', 'Thành phố', '38'),
(381, 'Thị xã Bỉm Sơn', 'Thi xa Bim Son', 'Thị xã', '38'),
(382, 'Thị xã Sầm Sơn', 'Thi xa Sam Son', 'Thị xã', '38'),
(384, 'Huyện Mường Lát', 'Huyen Muong Lat', 'Huyện', '38'),
(385, 'Huyện Quan Hóa', 'Huyen Quan Hoa', 'Huyện', '38'),
(386, 'Huyện Bá Thước', 'Huyen Ba Thuoc', 'Huyện', '38'),
(387, 'Huyện Quan Sơn', 'Huyen Quan Son', 'Huyện', '38'),
(388, 'Huyện Lang Chánh', 'Huyen Lang Chanh', 'Huyện', '38'),
(389, 'Huyện Ngọc Lặc', 'Huyen Ngoc Lac', 'Huyện', '38'),
(390, 'Huyện Cẩm Thủy', 'Huyen Cam Thuy', 'Huyện', '38'),
(391, 'Huyện Thạch Thành', 'Huyen Thach Thanh', 'Huyện', '38'),
(392, 'Huyện Hà Trung', 'Huyen Ha Trung', 'Huyện', '38'),
(393, 'Huyện Vĩnh Lộc', 'Huyen Vinh Loc', 'Huyện', '38'),
(394, 'Huyện Yên Định', 'Huyen Yen Dinh', 'Huyện', '38'),
(395, 'Huyện Thọ Xuân', 'Huyen Tho Xuan', 'Huyện', '38'),
(396, 'Huyện Thường Xuân', 'Huyen Thuong Xuan', 'Huyện', '38'),
(397, 'Huyện Triệu Sơn', 'Huyen Trieu Son', 'Huyện', '38'),
(398, 'Huyện Thiệu Hóa', 'Huyen Thieu Hoa', 'Huyện', '38'),
(399, 'Huyện Hoằng Hóa', 'Huyen Hoang Hoa', 'Huyện', '38'),
(400, 'Huyện Hậu Lộc', 'Huyen Hau Loc', 'Huyện', '38'),
(401, 'Huyện Nga Sơn', 'Huyen Nga Son', 'Huyện', '38'),
(402, 'Huyện Như Xuân', 'Huyen Nhu Xuan', 'Huyện', '38'),
(403, 'Huyện Như Thanh', 'Huyen Nhu Thanh', 'Huyện', '38'),
(404, 'Huyện Nông Cống', 'Huyen Nong Cong', 'Huyện', '38'),
(405, 'Huyện Đông Sơn', 'Huyen Dong Son', 'Huyện', '38'),
(406, 'Huyện Quảng Xương', 'Huyen Quang Xuong', 'Huyện', '38'),
(407, 'Huyện Tĩnh Gia', 'Huyen Tinh Gia', 'Huyện', '38'),
(412, 'Thành phố Vinh', 'Thanh pho Vinh', 'Thành phố', '40'),
(413, 'Thị xã Cửa Lò', 'Thi xa Cua Lo', 'Thị xã', '40'),
(414, 'Thị xã Thái Hoà', 'Thi xa Thai Hoa', 'Thị xã', '40'),
(415, 'Huyện Quế Phong', 'Huyen Que Phong', 'Huyện', '40'),
(416, 'Huyện Quỳ Châu', 'Huyen Quy Chau', 'Huyện', '40'),
(417, 'Huyện Kỳ Sơn', 'Huyen Ky Son', 'Huyện', '40'),
(418, 'Huyện Tương Dương', 'Huyen Tuong Duong', 'Huyện', '40'),
(419, 'Huyện Nghĩa Đàn', 'Huyen Nghia Dan', 'Huyện', '40'),
(420, 'Huyện Quỳ Hợp', 'Huyen Quy Hop', 'Huyện', '40'),
(421, 'Huyện Quỳnh Lưu', 'Huyen Quynh Luu', 'Huyện', '40'),
(422, 'Huyện Con Cuông', 'Huyen Con Cuong', 'Huyện', '40'),
(423, 'Huyện Tân Kỳ', 'Huyen Tan Ky', 'Huyện', '40'),
(424, 'Huyện Anh Sơn', 'Huyen Anh Son', 'Huyện', '40'),
(425, 'Huyện Diễn Châu', 'Huyen Dien Chau', 'Huyện', '40'),
(426, 'Huyện Yên Thành', 'Huyen Yen Thanh', 'Huyện', '40'),
(427, 'Huyện Đô Lương', 'Huyen Do Luong', 'Huyện', '40'),
(428, 'Huyện Thanh Chương', 'Huyen Thanh Chuong', 'Huyện', '40'),
(429, 'Huyện Nghi Lộc', 'Huyen Nghi Loc', 'Huyện', '40'),
(430, 'Huyện Nam Đàn', 'Huyen Nam Dan', 'Huyện', '40'),
(431, 'Huyện Hưng Nguyên', 'Huyen Hung Nguyen', 'Huyện', '40'),
(432, 'Thị xã Hoàng Mai', 'Thi xa Hoang Mai', 'Thị xã', '40'),
(436, 'Thành phố Hà Tĩnh', 'Thanh pho Ha Tinh', 'Thành phố', '42'),
(437, 'Thị xã Hồng Lĩnh', 'Thi xa Hong Linh', 'Thị xã', '42'),
(439, 'Huyện Hương Sơn', 'Huyen Huong Son', 'Huyện', '42'),
(440, 'Huyện Đức Thọ', 'Huyen Duc Tho', 'Huyện', '42'),
(441, 'Huyện Vũ Quang', 'Huyen Vu Quang', 'Huyện', '42'),
(442, 'Huyện Nghi Xuân', 'Huyen Nghi Xuan', 'Huyện', '42'),
(443, 'Huyện Can Lộc', 'Huyen Can Loc', 'Huyện', '42'),
(444, 'Huyện Hương Khê', 'Huyen Huong Khe', 'Huyện', '42'),
(445, 'Huyện Thạch Hà', 'Huyen Thach Ha', 'Huyện', '42'),
(446, 'Huyện Cẩm Xuyên', 'Huyen Cam Xuyen', 'Huyện', '42'),
(447, 'Huyện Kỳ Anh', 'Huyen Ky Anh', 'Huyện', '42'),
(448, 'Huyện Lộc Hà', 'Huyen Loc Ha', 'Huyện', '42'),
(449, 'Thị xã Kỳ Anh', 'Thi xa Ky Anh', 'Thị xã', '42'),
(450, 'Thành Phố Đồng Hới', 'Thanh Pho Dong Hoi', 'Thành phố', '44'),
(452, 'Huyện Minh Hóa', 'Huyen Minh Hoa', 'Huyện', '44'),
(453, 'Huyện Tuyên Hóa', 'Huyen Tuyen Hoa', 'Huyện', '44'),
(454, 'Huyện Quảng Trạch', 'Huyen Quang Trach', 'Thị xã', '44'),
(455, 'Huyện Bố Trạch', 'Huyen Bo Trach', 'Huyện', '44'),
(456, 'Huyện Quảng Ninh', 'Huyen Quang Ninh', 'Huyện', '44'),
(457, 'Huyện Lệ Thủy', 'Huyen Le Thuy', 'Huyện', '44'),
(458, 'Thị xã Ba Đồn', 'Thi xa Ba Don', 'Huyện', '44'),
(461, 'Thành phố Đông Hà', 'Thanh pho Dong Ha', 'Thành phố', '45'),
(462, 'Thị xã Quảng Trị', 'Thi xa Quang Tri', 'Thị xã', '45'),
(464, 'Huyện Vĩnh Linh', 'Huyen Vinh Linh', 'Huyện', '45'),
(465, 'Huyện Hướng Hóa', 'Huyen Huong Hoa', 'Huyện', '45'),
(466, 'Huyện Gio Linh', 'Huyen Gio Linh', 'Huyện', '45'),
(467, 'Huyện Đa Krông', 'Huyen Da Krong', 'Huyện', '45'),
(468, 'Huyện Cam Lộ', 'Huyen Cam Lo', 'Huyện', '45'),
(469, 'Huyện Triệu Phong', 'Huyen Trieu Phong', 'Huyện', '45'),
(470, 'Huyện Hải Lăng', 'Huyen Hai Lang', 'Huyện', '45'),
(471, 'Huyện Cồn Cỏ', 'Huyen Con Co', 'Huyện', '45'),
(474, 'Thành phố Huế', 'Thanh pho Hue', 'Thành phố', '46'),
(476, 'Huyện Phong Điền', 'Huyen Phong Dien', 'Huyện', '46'),
(477, 'Huyện Quảng Điền', 'Huyen Quang Dien', 'Huyện', '46'),
(478, 'Huyện Phú Vang', 'Huyen Phu Vang', 'Huyện', '46'),
(479, 'Thị xã Hương Thủy', 'Thi xa Huong Thuy', 'Thị xã', '46'),
(480, 'Thị xã Hương Trà', 'Thi xa Huong Tra', 'Thị xã', '46'),
(481, 'Huyện A Lưới', 'Huyen A Luoi', 'Huyện', '46'),
(482, 'Huyện Phú Lộc', 'Huyen Phu Loc', 'Huyện', '46'),
(483, 'Huyện Nam Đông', 'Huyen Nam Dong', 'Huyện', '46'),
(490, 'Quận Liên Chiểu', 'Quan Lien Chieu', 'Quận', '48'),
(491, 'Quận Thanh Khê', 'Quan Thanh Khe', 'Quận', '48'),
(492, 'Quận Hải Châu', 'Quan Hai Chau', 'Quận', '48'),
(493, 'Quận Sơn Trà', 'Quan Son Tra', 'Quận', '48'),
(494, 'Quận Ngũ Hành Sơn', 'Quan Ngu Hanh Son', 'Quận', '48'),
(495, 'Quận Cẩm Lệ', 'Quan Cam Le', 'Quận', '48'),
(497, 'Huyện Hòa Vang', 'Huyen Hoa Vang', 'Huyện', '48'),
(498, 'Huyện Hoàng Sa', 'Huyen Hoang Sa', 'Huyện', '48'),
(502, 'Thành phố Tam Kỳ', 'Thanh pho Tam Ky', 'Thành phố', '49'),
(503, 'Thành phố Hội An', 'Thanh pho Hoi An', 'Thành phố', '49'),
(504, 'Huyện Tây Giang', 'Huyen Tay Giang', 'Huyện', '49'),
(505, 'Huyện Đông Giang', 'Huyen Dong Giang', 'Huyện', '49'),
(506, 'Huyện Đại Lộc', 'Huyen Dai Loc', 'Huyện', '49'),
(507, 'Thị xã Điện Bàn', 'Thi xa Dien Ban', 'Thị xã', '49'),
(508, 'Huyện Duy Xuyên', 'Huyen Duy Xuyen', 'Huyện', '49'),
(509, 'Huyện Quế Sơn', 'Huyen Que Son', 'Huyện', '49'),
(510, 'Huyện Nam Giang', 'Huyen Nam Giang', 'Huyện', '49'),
(511, 'Huyện Phước Sơn', 'Huyen Phuoc Son', 'Huyện', '49'),
(512, 'Huyện Hiệp Đức', 'Huyen Hiep Duc', 'Huyện', '49'),
(513, 'Huyện Thăng Bình', 'Huyen Thang Binh', 'Huyện', '49'),
(514, 'Huyện Tiên Phước', 'Huyen Tien Phuoc', 'Huyện', '49'),
(515, 'Huyện Bắc Trà My', 'Huyen Bac Tra My', 'Huyện', '49'),
(516, 'Huyện Nam Trà My', 'Huyen Nam Tra My', 'Huyện', '49'),
(517, 'Huyện Núi Thành', 'Huyen Nui Thanh', 'Huyện', '49'),
(518, 'Huyện Phú Ninh', 'Huyen Phu Ninh', 'Huyện', '49'),
(519, 'Huyện Nông Sơn', 'Huyen Nong Son', 'Huyện', '49'),
(522, 'Thành phố Quảng Ngãi', 'Thanh pho Quang Ngai', 'Thành phố', '51'),
(524, 'Huyện Bình Sơn', 'Huyen Binh Son', 'Huyện', '51'),
(525, 'Huyện Trà Bồng', 'Huyen Tra Bong', 'Huyện', '51'),
(526, 'Huyện Tây Trà', 'Huyen Tay Tra', 'Huyện', '51'),
(527, 'Huyện Sơn Tịnh', 'Huyen Son Tinh', 'Huyện', '51'),
(528, 'Huyện Tư Nghĩa', 'Huyen Tu Nghia', 'Huyện', '51'),
(529, 'Huyện Sơn Hà', 'Huyen Son Ha', 'Huyện', '51'),
(530, 'Huyện Sơn Tây', 'Huyen Son Tay', 'Huyện', '51'),
(531, 'Huyện Minh Long', 'Huyen Minh Long', 'Huyện', '51'),
(532, 'Huyện Nghĩa Hành', 'Huyen Nghia Hanh', 'Huyện', '51'),
(533, 'Huyện Mộ Đức', 'Huyen Mo Duc', 'Huyện', '51'),
(534, 'Huyện Đức Phổ', 'Huyen Duc Pho', 'Huyện', '51'),
(535, 'Huyện Ba Tơ', 'Huyen Ba To', 'Huyện', '51'),
(536, 'Huyện Lý Sơn', 'Huyen Ly Son', 'Huyện', '51'),
(540, 'Thành phố Qui Nhơn', 'Thanh pho Qui Nhon', 'Thành phố', '52'),
(542, 'Huyện An Lão', 'Huyen An Lao', 'Huyện', '52'),
(543, 'Huyện Hoài Nhơn', 'Huyen Hoai Nhon', 'Huyện', '52'),
(544, 'Huyện Hoài Ân', 'Huyen Hoai An', 'Huyện', '52'),
(545, 'Huyện Phù Mỹ', 'Huyen Phu My', 'Huyện', '52'),
(546, 'Huyện Vĩnh Thạnh', 'Huyen Vinh Thanh', 'Huyện', '52'),
(547, 'Huyện Tây Sơn', 'Huyen Tay Son', 'Huyện', '52'),
(548, 'Huyện Phù Cát', 'Huyen Phu Cat', 'Huyện', '52'),
(549, 'Thị xã An Nhơn', 'Thi xa An Nhon', 'Thị xã', '52'),
(550, 'Huyện Tuy Phước', 'Huyen Tuy Phuoc', 'Huyện', '52'),
(551, 'Huyện Vân Canh', 'Huyen Van Canh', 'Huyện', '52'),
(555, 'Thành phố Tuy Hoà', 'Thanh pho Tuy Hoa', 'Thành phố', '54'),
(557, 'Thị xã Sông Cầu', 'Thi xa Song Cau', 'Thị xã', '54'),
(558, 'Huyện Đồng Xuân', 'Huyen Dong Xuan', 'Huyện', '54'),
(559, 'Huyện Tuy An', 'Huyen Tuy An', 'Huyện', '54'),
(560, 'Huyện Sơn Hòa', 'Huyen Son Hoa', 'Huyện', '54'),
(561, 'Huyện Sông Hinh', 'Huyen Song Hinh', 'Huyện', '54'),
(562, 'Huyện Tây Hoà', 'Huyen Tay Hoa', 'Huyện', '54'),
(563, 'Huyện Phú Hoà', 'Huyen Phu Hoa', 'Huyện', '54'),
(564, 'Huyện Đông Hòa', 'Huyen Dong Hoa', 'Huyện', '54'),
(568, 'Thành phố Nha Trang', 'Thanh pho Nha Trang', 'Thành phố', '56'),
(569, 'Thành phố Cam Ranh', 'Thanh pho Cam Ranh', 'Thành phố', '56'),
(570, 'Huyện Cam Lâm', 'Huyen Cam Lam', 'Huyện', '56'),
(571, 'Huyện Vạn Ninh', 'Huyen Van Ninh', 'Huyện', '56'),
(572, 'Thị xã Ninh Hòa', 'Thi xa Ninh Hoa', 'Thị xã', '56'),
(573, 'Huyện Khánh Vĩnh', 'Huyen Khanh Vinh', 'Huyện', '56'),
(574, 'Huyện Diên Khánh', 'Huyen Dien Khanh', 'Huyện', '56'),
(575, 'Huyện Khánh Sơn', 'Huyen Khanh Son', 'Huyện', '56'),
(576, 'Huyện Trường Sa', 'Huyen Truong Sa', 'Huyện', '56'),
(582, 'Thành phố Phan Rang-Tháp Chàm', 'Thanh pho Phan Rang-Thap Cham', 'Thành phố', '58'),
(584, 'Huyện Bác Ái', 'Huyen Bac Ai', 'Huyện', '58'),
(585, 'Huyện Ninh Sơn', 'Huyen Ninh Son', 'Huyện', '58'),
(586, 'Huyện Ninh Hải', 'Huyen Ninh Hai', 'Huyện', '58'),
(587, 'Huyện Ninh Phước', 'Huyen Ninh Phuoc', 'Huyện', '58'),
(588, 'Huyện Thuận Bắc', 'Huyen Thuan Bac', 'Huyện', '58'),
(589, 'Huyện Thuận Nam', 'Huyen Thuan Nam', 'Huyện', '58'),
(593, 'Thành phố Phan Thiết', 'Thanh pho Phan Thiet', 'Thành phố', '60'),
(594, 'Thị xã La Gi', 'Thi xa La Gi', 'Thị xã', '60'),
(595, 'Huyện Tuy Phong', 'Huyen Tuy Phong', 'Huyện', '60'),
(596, 'Huyện Bắc Bình', 'Huyen Bac Binh', 'Huyện', '60'),
(597, 'Huyện Hàm Thuận Bắc', 'Huyen Ham Thuan Bac', 'Huyện', '60'),
(598, 'Huyện Hàm Thuận Nam', 'Huyen Ham Thuan Nam', 'Huyện', '60'),
(599, 'Huyện Tánh Linh', 'Huyen Tanh Linh', 'Huyện', '60'),
(600, 'Huyện Đức Linh', 'Huyen Duc Linh', 'Huyện', '60'),
(601, 'Huyện Hàm Tân', 'Huyen Ham Tan', 'Huyện', '60'),
(602, 'Huyện Phú Quí', 'Huyen Phu Qui', 'Huyện', '60'),
(608, 'Thành phố Kon Tum', 'Thanh pho Kon Tum', 'Thành phố', '62'),
(610, 'Huyện Đắk Glei', 'Huyen Dak Glei', 'Huyện', '62'),
(611, 'Huyện Ngọc Hồi', 'Huyen Ngoc Hoi', 'Huyện', '62'),
(612, 'Huyện Đắk Tô', 'Huyen Dak To', 'Huyện', '62'),
(613, 'Huyện Kon Plông', 'Huyen Kon Plong', 'Huyện', '62'),
(614, 'Huyện Kon Rẫy', 'Huyen Kon Ray', 'Huyện', '62'),
(615, 'Huyện Đắk Hà', 'Huyen Dak Ha', 'Huyện', '62'),
(616, 'Huyện Sa Thầy', 'Huyen Sa Thay', 'Huyện', '62'),
(617, 'Huyện Tu Mơ Rông', 'Huyen Tu Mo Rong', 'Huyện', '62'),
(618, 'Huyện Ia H\' Drai', '', 'Huyện', '62'),
(622, 'Thành phố Pleiku', 'Thanh pho Pleiku', 'Thành phố', '64'),
(623, 'Thị xã An Khê', 'Thi xa An Khe', 'Thị xã', '64'),
(624, 'Thị xã Ayun Pa', 'Thi xa Ayun Pa', 'Thị xã', '64'),
(625, 'Huyện KBang', 'Huyen KBang', 'Huyện', '64'),
(626, 'Huyện Đăk Đoa', 'Huyen Dak Doa', 'Huyện', '64'),
(627, 'Huyện Chư Păh', 'Huyen Chu Pah', 'Huyện', '64'),
(628, 'Huyện Ia Grai', 'Huyen Ia Grai', 'Huyện', '64'),
(629, 'Huyện Mang Yang', 'Huyen Mang Yang', 'Huyện', '64'),
(630, 'Huyện Kông Chro', 'Huyen Kong Chro', 'Huyện', '64'),
(631, 'Huyện Đức Cơ', 'Huyen Duc Co', 'Huyện', '64'),
(632, 'Huyện Chư Prông', 'Huyen Chu Prong', 'Huyện', '64'),
(633, 'Huyện Chư Sê', 'Huyen Chu Se', 'Huyện', '64'),
(634, 'Huyện Đăk Pơ', 'Huyen Dak Po', 'Huyện', '64'),
(635, 'Huyện Ia Pa', 'Huyen Ia Pa', 'Huyện', '64'),
(637, 'Huyện Krông Pa', 'Huyen Krong Pa', 'Huyện', '64'),
(638, 'Huyện Phú Thiện', 'Huyen Phu Thien', 'Huyện', '64'),
(639, 'Huyện Chư Pưh', 'Huyen Chu Puh', 'Huyện', '64'),
(643, 'Thành phố Buôn Ma Thuột', 'Thanh pho Buon Ma Thuot', 'Thành phố', '66'),
(644, 'Thị Xã Buôn Hồ', 'Thi Xa Buon Ho', 'Thị xã', '66'),
(645, 'Huyện Ea H\'leo', '', 'Huyện', '66'),
(646, 'Huyện Ea Súp', 'Huyen Ea Sup', 'Huyện', '66'),
(647, 'Huyện Buôn Đôn', 'Huyen Buon Don', 'Huyện', '66'),
(648, 'Huyện Cư M\'gar', '', 'Huyện', '66'),
(649, 'Huyện Krông Búk', 'Huyen Krong Buk', 'Huyện', '66'),
(650, 'Huyện Krông Năng', 'Huyen Krong Nang', 'Huyện', '66'),
(651, 'Huyện Ea Kar', 'Huyen Ea Kar', 'Huyện', '66'),
(652, 'Huyện M\'Đrắk', '', 'Huyện', '66'),
(653, 'Huyện Krông Bông', 'Huyen Krong Bong', 'Huyện', '66'),
(654, 'Huyện Krông Pắc', 'Huyen Krong Pac', 'Huyện', '66'),
(655, 'Huyện Krông A Na', 'Huyen Krong A Na', 'Huyện', '66'),
(656, 'Huyện Lắk', 'Huyen Lak', 'Huyện', '66'),
(657, 'Huyện Cư Kuin', 'Huyen Cu Kuin', 'Huyện', '66'),
(660, 'Thị xã Gia Nghĩa', 'Thi xa Gia Nghia', 'Thị xã', '67'),
(661, 'Huyện Đăk Glong', 'Huyen Dak Glong', 'Huyện', '67'),
(662, 'Huyện Cư Jút', 'Huyen Cu Jut', 'Huyện', '67'),
(663, 'Huyện Đắk Mil', 'Huyen Dak Mil', 'Huyện', '67'),
(664, 'Huyện Krông Nô', 'Huyen Krong No', 'Huyện', '67'),
(665, 'Huyện Đắk Song', 'Huyen Dak Song', 'Huyện', '67'),
(666, 'Huyện Đắk R\'Lấp', '', 'Huyện', '67'),
(667, 'Huyện Tuy Đức', 'Huyen Tuy Duc', 'Huyện', '67'),
(672, 'Thành phố Đà Lạt', 'Thanh pho Da Lat', 'Thành phố', '68'),
(673, 'Thành phố Bảo Lộc', 'Thanh pho Bao Loc', 'Thành phố', '68'),
(674, 'Huyện Đam Rông', 'Huyen Dam Rong', 'Huyện', '68'),
(675, 'Huyện Lạc Dương', 'Huyen Lac Duong', 'Huyện', '68'),
(676, 'Huyện Lâm Hà', 'Huyen Lam Ha', 'Huyện', '68'),
(677, 'Huyện Đơn Dương', 'Huyen Don Duong', 'Huyện', '68'),
(678, 'Huyện Đức Trọng', 'Huyen Duc Trong', 'Huyện', '68'),
(679, 'Huyện Di Linh', 'Huyen Di Linh', 'Huyện', '68'),
(680, 'Huyện Bảo Lâm', 'Huyen Bao Lam', 'Huyện', '68'),
(681, 'Huyện Đạ Huoai', 'Huyen Da Huoai', 'Huyện', '68'),
(682, 'Huyện Đạ Tẻh', 'Huyen Da Teh', 'Huyện', '68'),
(683, 'Huyện Cát Tiên', 'Huyen Cat Tien', 'Huyện', '68'),
(688, 'Thị xã Phước Long', 'Thi xa Phuoc Long', 'Thị xã', '70'),
(689, 'Thị xã Đồng Xoài', 'Thi xa Dong Xoai', 'Thị xã', '70'),
(690, 'Thị xã Bình Long', 'Thi xa Binh Long', 'Thị xã', '70'),
(691, 'Huyện Bù Gia Mập', 'Huyen Bu Gia Map', 'Huyện', '70'),
(692, 'Huyện Lộc Ninh', 'Huyen Loc Ninh', 'Huyện', '70'),
(693, 'Huyện Bù Đốp', 'Huyen Bu Dop', 'Huyện', '70'),
(694, 'Huyện Hớn Quản', 'Huyen Hon Quan', 'Huyện', '70'),
(695, 'Huyện Đồng Phú', 'Huyen Dong Phu', 'Huyện', '70'),
(696, 'Huyện Bù Đăng', 'Huyen Bu Dang', 'Huyện', '70'),
(697, 'Huyện Chơn Thành', 'Huyen Chon Thanh', 'Huyện', '70'),
(698, 'Huyện Phú Riềng', 'Huyen Phu Rieng', 'Huyện', '70'),
(703, 'Thành phố Tây Ninh', 'Thanh pho Tay Ninh', 'Thành phố', '72'),
(705, 'Huyện Tân Biên', 'Huyen Tan Bien', 'Huyện', '72'),
(706, 'Huyện Tân Châu', 'Huyen Tan Chau', 'Huyện', '72'),
(707, 'Huyện Dương Minh Châu', 'Huyen Duong Minh Chau', 'Huyện', '72'),
(708, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '72'),
(709, 'Huyện Hòa Thành', 'Huyen Hoa Thanh', 'Huyện', '72'),
(710, 'Huyện Gò Dầu', 'Huyen Go Dau', 'Huyện', '72'),
(711, 'Huyện Bến Cầu', 'Huyen Ben Cau', 'Huyện', '72'),
(712, 'Huyện Trảng Bàng', 'Huyen Trang Bang', 'Huyện', '72'),
(718, 'Thành phố Thủ Dầu Một', 'Thanh pho Thu Dau Mot', 'Thành phố', '74'),
(719, 'Huyện Bàu Bàng', 'Huyen Bau Bang', 'Huyện', '74'),
(720, 'Huyện Dầu Tiếng', 'Huyen Dau Tieng', 'Huyện', '74'),
(721, 'Thị xã Bến Cát', 'Thi xa Ben Cat', 'Thị xã', '74'),
(722, 'Huyện Phú Giáo', 'Huyen Phu Giao', 'Huyện', '74'),
(723, 'Thị xã Tân Uyên', 'Thi xa Tan Uyen', 'Thị xã', '74'),
(724, 'Thị xã Dĩ An', 'Thi xa Di An', 'Thị xã', '74'),
(725, 'Thị xã Thuận An', 'Thi xa Thuan An', 'Thị xã', '74'),
(726, 'Huyện Bắc Tân Uyên', 'Huyen Bac Tan Uyen', 'Huyện', '74'),
(731, 'Thành phố Biên Hòa', 'Thanh pho Bien Hoa', 'Thành phố', '75'),
(732, 'Thị xã Long Khánh', 'Thi xa Long Khanh', 'Thị xã', '75'),
(734, 'Huyện Tân Phú', 'Huyen Tan Phu', 'Huyện', '75'),
(735, 'Huyện Vĩnh Cửu', 'Huyen Vinh Cuu', 'Huyện', '75'),
(736, 'Huyện Định Quán', 'Huyen Dinh Quan', 'Huyện', '75'),
(737, 'Huyện Trảng Bom', 'Huyen Trang Bom', 'Huyện', '75'),
(738, 'Huyện Thống Nhất', 'Huyen Thong Nhat', 'Huyện', '75'),
(739, 'Huyện Cẩm Mỹ', 'Huyen Cam My', 'Huyện', '75'),
(740, 'Huyện Long Thành', 'Huyen Long Thanh', 'Huyện', '75'),
(741, 'Huyện Xuân Lộc', 'Huyen Xuan Loc', 'Huyện', '75'),
(742, 'Huyện Nhơn Trạch', 'Huyen Nhon Trach', 'Huyện', '75'),
(747, 'Thành phố Vũng Tàu', 'Thanh pho Vung Tau', 'Thành phố', '77'),
(748, 'Thành phố Bà Rịa', 'Thanh pho Ba Ria', 'Thành phố', '77'),
(750, 'Huyện Châu Đức', 'Huyen Chau Duc', 'Huyện', '77'),
(751, 'Huyện Xuyên Mộc', 'Huyen Xuyen Moc', 'Huyện', '77'),
(752, 'Huyện Long Điền', 'Huyen Long Dien', 'Huyện', '77'),
(753, 'Huyện Đất Đỏ', 'Huyen Dat Do', 'Huyện', '77'),
(754, 'Huyện Tân Thành', 'Huyen Tan Thanh', 'Huyện', '77'),
(755, 'Huyện Côn Đảo', 'Huyen Con Dao', 'Huyện', '77'),
(760, 'Quận 1', 'Quan 1', 'Quận', '79'),
(761, 'Quận 12', 'Quan 12', 'Quận', '79'),
(762, 'Quận Thủ Đức', 'Quan Thu Duc', 'Quận', '79'),
(763, 'Quận 9', 'Quan 9', 'Quận', '79'),
(764, 'Quận Gò Vấp', 'Quan Go Vap', 'Quận', '79'),
(765, 'Quận Bình Thạnh', 'Quan Binh Thanh', 'Quận', '79'),
(766, 'Quận Tân Bình', 'Quan Tan Binh', 'Quận', '79'),
(767, 'Quận Tân Phú', 'Quan Tan Phu', 'Quận', '79'),
(768, 'Quận Phú Nhuận', 'Quan Phu Nhuan', 'Quận', '79'),
(769, 'Quận 2', 'Quan 2', 'Quận', '79'),
(770, 'Quận 3', 'Quan 3', 'Quận', '79'),
(771, 'Quận 10', 'Quan 10', 'Quận', '79'),
(772, 'Quận 11', 'Quan 11', 'Quận', '79'),
(773, 'Quận 4', 'Quan 4', 'Quận', '79'),
(774, 'Quận 5', 'Quan 5', 'Quận', '79'),
(775, 'Quận 6', 'Quan 6', 'Quận', '79'),
(776, 'Quận 8', 'Quan 8', 'Quận', '79'),
(777, 'Quận Bình Tân', 'Quan Binh Tan', 'Quận', '79'),
(778, 'Quận 7', 'Quan 7', 'Quận', '79'),
(783, 'Huyện Củ Chi', 'Huyen Cu Chi', 'Huyện', '79'),
(784, 'Huyện Hóc Môn', 'Huyen Hoc Mon', 'Huyện', '79'),
(785, 'Huyện Bình Chánh', 'Huyen Binh Chanh', 'Huyện', '79'),
(786, 'Huyện Nhà Bè', 'Huyen Nha Be', 'Huyện', '79'),
(787, 'Huyện Cần Giờ', 'Huyen Can Gio', 'Huyện', '79'),
(794, 'Thành phố Tân An', 'Thanh pho Tan An', 'Thành phố', '80'),
(795, 'Thị xã Kiến Tường', 'Thi xa Kien Tuong', 'Thị xã', '80'),
(796, 'Huyện Tân Hưng', 'Huyen Tan Hung', 'Huyện', '80'),
(797, 'Huyện Vĩnh Hưng', 'Huyen Vinh Hung', 'Huyện', '80'),
(798, 'Huyện Mộc Hóa', 'Huyen Moc Hoa', 'Huyện', '80'),
(799, 'Huyện Tân Thạnh', 'Huyen Tan Thanh', 'Huyện', '80'),
(800, 'Huyện Thạnh Hóa', 'Huyen Thanh Hoa', 'Huyện', '80'),
(801, 'Huyện Đức Huệ', 'Huyen Duc Hue', 'Huyện', '80'),
(802, 'Huyện Đức Hòa', 'Huyen Duc Hoa', 'Huyện', '80'),
(803, 'Huyện Bến Lức', 'Huyen Ben Luc', 'Huyện', '80'),
(804, 'Huyện Thủ Thừa', 'Huyen Thu Thua', 'Huyện', '80'),
(805, 'Huyện Tân Trụ', 'Huyen Tan Tru', 'Huyện', '80'),
(806, 'Huyện Cần Đước', 'Huyen Can Duoc', 'Huyện', '80'),
(807, 'Huyện Cần Giuộc', 'Huyen Can Giuoc', 'Huyện', '80'),
(808, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '80'),
(815, 'Thành phố Mỹ Tho', 'Thanh pho My Tho', 'Thành phố', '82'),
(816, 'Thị xã Gò Công', 'Thi xa Go Cong', 'Thị xã', '82'),
(817, 'Thị xã Cai Lậy', 'Thi xa Cai Lay', 'Huyện', '82'),
(818, 'Huyện Tân Phước', 'Huyen Tan Phuoc', 'Huyện', '82'),
(819, 'Huyện Cái Bè', 'Huyen Cai Be', 'Huyện', '82'),
(820, 'Huyện Cai Lậy', 'Huyen Cai Lay', 'Thị xã', '82'),
(821, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '82'),
(822, 'Huyện Chợ Gạo', 'Huyen Cho Gao', 'Huyện', '82'),
(823, 'Huyện Gò Công Tây', 'Huyen Go Cong Tay', 'Huyện', '82'),
(824, 'Huyện Gò Công Đông', 'Huyen Go Cong Dong', 'Huyện', '82'),
(825, 'Huyện Tân Phú Đông', 'Huyen Tan Phu Dong', 'Huyện', '82'),
(829, 'Thành phố Bến Tre', 'Thanh pho Ben Tre', 'Thành phố', '83'),
(831, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '83'),
(832, 'Huyện Chợ Lách', 'Huyen Cho Lach', 'Huyện', '83'),
(833, 'Huyện Mỏ Cày Nam', 'Huyen Mo Cay Nam', 'Huyện', '83'),
(834, 'Huyện Giồng Trôm', 'Huyen Giong Trom', 'Huyện', '83'),
(835, 'Huyện Bình Đại', 'Huyen Binh Dai', 'Huyện', '83'),
(836, 'Huyện Ba Tri', 'Huyen Ba Tri', 'Huyện', '83'),
(837, 'Huyện Thạnh Phú', 'Huyen Thanh Phu', 'Huyện', '83'),
(838, 'Huyện Mỏ Cày Bắc', 'Huyen Mo Cay Bac', 'Huyện', '83'),
(842, 'Thành phố Trà Vinh', 'Thanh pho Tra Vinh', 'Thành phố', '84'),
(844, 'Huyện Càng Long', 'Huyen Cang Long', 'Huyện', '84'),
(845, 'Huyện Cầu Kè', 'Huyen Cau Ke', 'Huyện', '84'),
(846, 'Huyện Tiểu Cần', 'Huyen Tieu Can', 'Huyện', '84'),
(847, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '84'),
(848, 'Huyện Cầu Ngang', 'Huyen Cau Ngang', 'Huyện', '84'),
(849, 'Huyện Trà Cú', 'Huyen Tra Cu', 'Huyện', '84'),
(850, 'Huyện Duyên Hải', 'Huyen Duyen Hai', 'Huyện', '84'),
(851, 'Thị xã Duyên Hải', 'Thi xa Duyen Hai', 'Thị xã', '84'),
(855, 'Thành phố Vĩnh Long', 'Thanh pho Vinh Long', 'Thành phố', '86'),
(857, 'Huyện Long Hồ', 'Huyen Long Ho', 'Huyện', '86'),
(858, 'Huyện Mang Thít', 'Huyen Mang Thit', 'Huyện', '86'),
(859, 'Huyện  Vũng Liêm', 'Huyen  Vung Liem', 'Huyện', '86'),
(860, 'Huyện Tam Bình', 'Huyen Tam Binh', 'Huyện', '86'),
(861, 'Thị xã Bình Minh', 'Thi xa Binh Minh', 'Thị xã', '86'),
(862, 'Huyện Trà Ôn', 'Huyen Tra On', 'Huyện', '86'),
(863, 'Huyện Bình Tân', 'Huyen Binh Tan', 'Huyện', '86'),
(866, 'Thành phố Cao Lãnh', 'Thanh pho Cao Lanh', 'Thành phố', '87'),
(867, 'Thành phố Sa Đéc', 'Thanh pho Sa Dec', 'Thành phố', '87'),
(868, 'Thị xã Hồng Ngự', 'Thi xa Hong Ngu', 'Thị xã', '87'),
(869, 'Huyện Tân Hồng', 'Huyen Tan Hong', 'Huyện', '87'),
(870, 'Huyện Hồng Ngự', 'Huyen Hong Ngu', 'Huyện', '87'),
(871, 'Huyện Tam Nông', 'Huyen Tam Nong', 'Huyện', '87'),
(872, 'Huyện Tháp Mười', 'Huyen Thap Muoi', 'Huyện', '87'),
(873, 'Huyện Cao Lãnh', 'Huyen Cao Lanh', 'Huyện', '87'),
(874, 'Huyện Thanh Bình', 'Huyen Thanh Binh', 'Huyện', '87'),
(875, 'Huyện Lấp Vò', 'Huyen Lap Vo', 'Huyện', '87'),
(876, 'Huyện Lai Vung', 'Huyen Lai Vung', 'Huyện', '87'),
(877, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '87'),
(883, 'Thành phố Long Xuyên', 'Thanh pho Long Xuyen', 'Thành phố', '89'),
(884, 'Thành phố Châu Đốc', 'Thanh pho Chau Doc', 'Thành phố', '89'),
(886, 'Huyện An Phú', 'Huyen An Phu', 'Huyện', '89'),
(887, 'Thị xã Tân Châu', 'Thi xa Tan Chau', 'Thị xã', '89'),
(888, 'Huyện Phú Tân', 'Huyen Phu Tan', 'Huyện', '89'),
(889, 'Huyện Châu Phú', 'Huyen Chau Phu', 'Huyện', '89'),
(890, 'Huyện Tịnh Biên', 'Huyen Tinh Bien', 'Huyện', '89'),
(891, 'Huyện Tri Tôn', 'Huyen Tri Ton', 'Huyện', '89'),
(892, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '89'),
(893, 'Huyện Chợ Mới', 'Huyen Cho Moi', 'Huyện', '89'),
(894, 'Huyện Thoại Sơn', 'Huyen Thoai Son', 'Huyện', '89'),
(899, 'Thành phố Rạch Giá', 'Thanh pho Rach Gia', 'Thành phố', '91'),
(900, 'Thị xã Hà Tiên', 'Thi xa Ha Tien', 'Thị xã', '91'),
(902, 'Huyện Kiên Lương', 'Huyen Kien Luong', 'Huyện', '91'),
(903, 'Huyện Hòn Đất', 'Huyen Hon Dat', 'Huyện', '91'),
(904, 'Huyện Tân Hiệp', 'Huyen Tan Hiep', 'Huyện', '91'),
(905, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '91'),
(906, 'Huyện Giồng Riềng', 'Huyen Giong Rieng', 'Huyện', '91'),
(907, 'Huyện Gò Quao', 'Huyen Go Quao', 'Huyện', '91'),
(908, 'Huyện An Biên', 'Huyen An Bien', 'Huyện', '91'),
(909, 'Huyện An Minh', 'Huyen An Minh', 'Huyện', '91'),
(910, 'Huyện Vĩnh Thuận', 'Huyen Vinh Thuan', 'Huyện', '91'),
(911, 'Huyện Phú Quốc', 'Huyen Phu Quoc', 'Huyện', '91'),
(912, 'Huyện Kiên Hải', 'Huyen Kien Hai', 'Huyện', '91'),
(913, 'Huyện U Minh Thượng', 'Huyen U Minh Thuong', 'Huyện', '91'),
(914, 'Huyện Giang Thành', 'Huyen Giang Thanh', 'Huyện', '91'),
(916, 'Quận Ninh Kiều', 'Quan Ninh Kieu', 'Quận', '92'),
(917, 'Quận Ô Môn', 'Quan O Mon', 'Quận', '92'),
(918, 'Quận Bình Thuỷ', 'Quan Binh Thuy', 'Quận', '92'),
(919, 'Quận Cái Răng', 'Quan Cai Rang', 'Quận', '92'),
(923, 'Quận Thốt Nốt', 'Quan Thot Not', 'Quận', '92'),
(924, 'Huyện Vĩnh Thạnh', 'Huyen Vinh Thanh', 'Huyện', '92'),
(925, 'Huyện Cờ Đỏ', 'Huyen Co Do', 'Huyện', '92'),
(926, 'Huyện Phong Điền', 'Huyen Phong Dien', 'Huyện', '92'),
(927, 'Huyện Thới Lai', 'Huyen Thoi Lai', 'Huyện', '92'),
(930, 'Thành phố Vị Thanh', 'Thanh pho Vi Thanh', 'Thành phố', '93'),
(931, 'Thị xã Ngã Bảy', 'Thi xa Nga Bay', 'Thị xã', '93'),
(932, 'Huyện Châu Thành A', 'Huyen Chau Thanh A', 'Huyện', '93'),
(933, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '93'),
(934, 'Huyện Phụng Hiệp', 'Huyen Phung Hiep', 'Huyện', '93'),
(935, 'Huyện Vị Thuỷ', 'Huyen Vi Thuy', 'Huyện', '93'),
(936, 'Huyện Long Mỹ', 'Huyen Long My', 'Huyện', '93'),
(937, 'Thị xã Long Mỹ', 'Thi xa Long My', 'Thị xã', '93'),
(941, 'Thành phố Sóc Trăng', 'Thanh pho Soc Trang', 'Thành phố', '94'),
(942, 'Huyện Châu Thành', 'Huyen Chau Thanh', 'Huyện', '94'),
(943, 'Huyện Kế Sách', 'Huyen Ke Sach', 'Huyện', '94'),
(944, 'Huyện Mỹ Tú', 'Huyen My Tu', 'Huyện', '94'),
(945, 'Huyện Cù Lao Dung', 'Huyen Cu Lao Dung', 'Huyện', '94'),
(946, 'Huyện Long Phú', 'Huyen Long Phu', 'Huyện', '94'),
(947, 'Huyện Mỹ Xuyên', 'Huyen My Xuyen', 'Huyện', '94'),
(948, 'Thị xã Ngã Năm', 'Thi xa Nga Nam', 'Thị xã', '94'),
(949, 'Huyện Thạnh Trị', 'Huyen Thanh Tri', 'Huyện', '94'),
(950, 'Thị xã Vĩnh Châu', 'Thi xa Vinh Chau', 'Thị xã', '94'),
(951, 'Huyện Trần Đề', 'Huyen Tran De', 'Huyện', '94'),
(954, 'Thành phố Bạc Liêu', 'Thanh pho Bac Lieu', 'Thành phố', '95'),
(956, 'Huyện Hồng Dân', 'Huyen Hong Dan', 'Huyện', '95'),
(957, 'Huyện Phước Long', 'Huyen Phuoc Long', 'Huyện', '95'),
(958, 'Huyện Vĩnh Lợi', 'Huyen Vinh Loi', 'Huyện', '95'),
(959, 'Thị xã Giá Rai', 'Thi xa Gia Rai', 'Thị xã', '95'),
(960, 'Huyện Đông Hải', 'Huyen Dong Hai', 'Huyện', '95'),
(961, 'Huyện Hoà Bình', 'Huyen Hoa Binh', 'Huyện', '95'),
(964, 'Thành phố Cà Mau', 'Thanh pho Ca Mau', 'Thành phố', '96'),
(966, 'Huyện U Minh', 'Huyen U Minh', 'Huyện', '96'),
(967, 'Huyện Thới Bình', 'Huyen Thoi Binh', 'Huyện', '96'),
(968, 'Huyện Trần Văn Thời', 'Huyen Tran Van Thoi', 'Huyện', '96'),
(969, 'Huyện Cái Nước', 'Huyen Cai Nuoc', 'Huyện', '96'),
(970, 'Huyện Đầm Dơi', 'Huyen Dam Doi', 'Huyện', '96'),
(971, 'Huyện Năm Căn', 'Huyen Nam Can', 'Huyện', '96'),
(972, 'Huyện Phú Tân', 'Huyen Phu Tan', 'Huyện', '96'),
(973, 'Huyện Ngọc Hiển', 'Huyen Ngoc Hien', 'Huyện', '96');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Id` int(11) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Huyen` int(11) NOT NULL,
  `TP` int(11) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `SoDu` int(11) NOT NULL,
  `Loai` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Id`, `TaiKhoan`, `MatKhau`, `Ten`, `DiaChi`, `Huyen`, `TP`, `SDT`, `SoDu`, `Loai`) VALUES
(1, 'clonetrasua1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'đoán xem', 'lô tô tố tô hic', 0, 93, '03587713651', 951905400, 1),
(2, 'clonetrasua2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Tan', 'hjhj', 0, 1, '0123456', 499265000, 1),
(3, 'clonetrasua3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Le Van Chi', 'cs', 0, 31, '0123456789', 999492000, 0),
(5, 'clonetrasua4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Le Thi', '123456', 0, 1, '0123415456', 999265000, 0),
(6, 'clonetrasua5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Le Van Bi', 'Đoán xem', 0, 1, '0123456789', 2146748647, 1),
(7, 'clonetrasua9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Le Kim', '123 con gà', 0, 1, '0123456789', 99265000, 1),
(10, 'admin@LTW.com', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', '70/10 Tô Ký', 2, 79, '1234567891', 386500, 2),
(11, 'clone@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sdfsdfsd', 'fsdfsdf', 0, 1, 'sdfsdfsdf', 57258970, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thuvienanh`
--

CREATE TABLE `thuvienanh` (
  `id` int(11) NOT NULL,
  `TenAnh` varchar(255) NOT NULL,
  `UrlAnh` varchar(255) NOT NULL,
  `Loai` int(11) NOT NULL,
  `MKs` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuvienanh`
--

INSERT INTO `thuvienanh` (`id`, `TenAnh`, `UrlAnh`, `Loai`, `MKs`, `MP`, `email`) VALUES
(1, 'azi1516096618_khach_san_dana_marina.webp', 'assets/uploads/ks-1/azi1516096618_khach_san_dana_marina.webp', 1, 1, 0, 'clone@gmail.com'),
(2, 'cgq1516096152_khach_san_dana_marina.webp', 'assets/uploads/ks-1/cgq1516096152_khach_san_dana_marina.webp', 1, 1, 0, 'clone@gmail.com'),
(3, 'ghp1516096194_khach_san_dana_marina.webp', 'assets/uploads/ks-1/ghp1516096194_khach_san_dana_marina.webp', 1, 1, 0, 'clone@gmail.com'),
(4, 'ky81516096340_khach_san_dana_marina.webp', 'assets/uploads/ks-1/ky81516096340_khach_san_dana_marina.webp', 1, 1, 0, 'clone@gmail.com'),
(5, 'xxe1516096158_khach_san_dana_marina.webp', 'assets/uploads/ks-1/xxe1516096158_khach_san_dana_marina.webp', 1, 1, 0, 'clone@gmail.com'),
(6, '4kv1516094774_khach_san_dana_marina.webp', 'assets/uploads/ks-1/4kv1516094774_khach_san_dana_marina.webp', 2, 1, 1, 'clone@gmail.com'),
(7, 's4h1516094709_khach_san_dana_marina.webp', 'assets/uploads/ks-1/s4h1516094709_khach_san_dana_marina.webp', 2, 1, 1, 'clone@gmail.com'),
(8, 'ssl1516094716_khach_san_dana_marina.webp', 'assets/uploads/ks-1/ssl1516094716_khach_san_dana_marina.webp', 2, 1, 1, 'clone@gmail.com'),
(9, 'eea1516094969_khach_san_dana_marina.webp', 'assets/uploads/ks-1/eea1516094969_khach_san_dana_marina.webp', 2, 1, 2, 'clone@gmail.com'),
(10, 'lnw1521173014_khach_san_dana_marina.webp', 'assets/uploads/ks-1/lnw1521173014_khach_san_dana_marina.webp', 2, 1, 2, 'clone@gmail.com'),
(11, 'v2b1516094975_khach_san_dana_marina.webp', 'assets/uploads/ks-1/v2b1516094975_khach_san_dana_marina.webp', 2, 1, 2, 'clone@gmail.com'),
(12, 'z2v1516094981_khach_san_dana_marina.webp', 'assets/uploads/ks-1/z2v1516094981_khach_san_dana_marina.webp', 2, 1, 2, 'clone@gmail.com'),
(13, 'tig1516094600_khach_san_dana_marina.webp', 'assets/uploads/ks-1/tig1516094600_khach_san_dana_marina.webp', 2, 1, 3, 'clone@gmail.com'),
(16, 'c351516094514_khach_san_dana_marina.webp', 'assets/uploads/ks-1/c351516094514_khach_san_dana_marina.webp', 2, 1, 3, 'clone@gmail.com'),
(17, 'd6v1516094593_khach_san_dana_marina.webp', 'assets/uploads/ks-1/d6v1516094593_khach_san_dana_marina.webp', 2, 1, 3, 'clone@gmail.com'),
(18, 'cie1516269733_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/cie1516269733_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(19, 'hnd1516269736_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/hnd1516269736_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(20, 'o6e1516269906_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/o6e1516269906_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(21, 'vlj1516269735_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/vlj1516269735_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(22, 'vz71516269907_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/vz71516269907_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(23, 'xbo1545796828_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/xbo1545796828_khach_san_salem_riverside_da_nang.webp', 1, 2, 0, 'clone@gmail.com'),
(24, '61j1516270013_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/61j1516270013_khach_san_salem_riverside_da_nang.webp', 2, 2, 4, 'clone@gmail.com'),
(25, 'kbq1516270013_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/kbq1516270013_khach_san_salem_riverside_da_nang.webp', 2, 2, 4, 'clone@gmail.com'),
(26, 'mmy1516270012_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/mmy1516270012_khach_san_salem_riverside_da_nang.webp', 2, 2, 4, 'clone@gmail.com'),
(27, 'nmq1516270012_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/nmq1516270012_khach_san_salem_riverside_da_nang.webp', 2, 2, 4, 'clone@gmail.com'),
(28, 'vqd1516270014_khach_san_salem_riverside_da_nang.webp', 'assets/uploads/ks-2/vqd1516270014_khach_san_salem_riverside_da_nang.webp', 2, 2, 4, 'clone@gmail.com'),
(29, '3c21546854197_khach_san_grand_gold.webp', 'assets/uploads/ks-3/3c21546854197_khach_san_grand_gold.webp', 1, 3, 0, 'clone@gmail.com'),
(30, 'ftt1546653433_khach_san_grand_gold.webp', 'assets/uploads/ks-3/ftt1546653433_khach_san_grand_gold.webp', 1, 3, 0, 'clone@gmail.com'),
(31, 'hqm1546488503_khach_san_grand_gold.webp', 'assets/uploads/ks-3/hqm1546488503_khach_san_grand_gold.webp', 1, 3, 0, 'clone@gmail.com'),
(32, 'ju61546487638_khach_san_grand_gold.webp', 'assets/uploads/ks-3/ju61546487638_khach_san_grand_gold.webp', 1, 3, 0, 'clone@gmail.com'),
(33, 'ltb1546500446_khach_san_grand_gold.webp', 'assets/uploads/ks-3/ltb1546500446_khach_san_grand_gold.webp', 1, 3, 0, 'clone@gmail.com'),
(34, '5g41546488237_khach_san_grand_gold.webp', 'assets/uploads/ks-3/5g41546488237_khach_san_grand_gold.webp', 2, 3, 5, 'clone@gmail.com'),
(35, 'boz1546488237_khach_san_grand_gold.jpg', 'assets/uploads/ks-3/boz1546488237_khach_san_grand_gold.jpg', 2, 3, 5, 'clone@gmail.com'),
(36, 'ovy1546488239_khach_san_grand_gold.jpg', 'assets/uploads/ks-3/ovy1546488239_khach_san_grand_gold.jpg', 2, 3, 5, 'clone@gmail.com'),
(37, 'pat1546488238_khach_san_grand_gold.jpg', 'assets/uploads/ks-3/pat1546488238_khach_san_grand_gold.jpg', 2, 3, 5, 'clone@gmail.com'),
(38, 'ytw1546488238_khach_san_grand_gold.jpg', 'assets/uploads/ks-3/ytw1546488238_khach_san_grand_gold.jpg', 2, 3, 5, 'clone@gmail.com'),
(39, 'ora1397036209_khach-san-sofitel-saigon-plaza.webp', 'assets/uploads/ks-4/ora1397036209_khach-san-sofitel-saigon-plaza.webp', 1, 4, 0, 'clonetrasua2@gmail.com'),
(40, 'ovg1397036210_khach-san-sofitel-saigon-plaza.jpg', 'assets/uploads/ks-4/ovg1397036210_khach-san-sofitel-saigon-plaza.jpg', 1, 4, 0, 'clonetrasua2@gmail.com'),
(41, 'pyj1397036209_khach-san-sofitel-saigon-plaza.jpg', 'assets/uploads/ks-4/pyj1397036209_khach-san-sofitel-saigon-plaza.jpg', 1, 4, 0, 'clonetrasua2@gmail.com'),
(42, 'ubm1397036193_khach-san-sofitel-saigon-plaza.jpg', 'assets/uploads/ks-4/ubm1397036193_khach-san-sofitel-saigon-plaza.jpg', 1, 4, 0, 'clonetrasua2@gmail.com'),
(43, 'uem1397036210_khach-san-sofitel-saigon-plaza.jpg', 'assets/uploads/ks-4/uem1397036210_khach-san-sofitel-saigon-plaza.jpg', 1, 4, 0, 'clonetrasua2@gmail.com'),
(44, 'xme1397036209_khach-san-sofitel-saigon-plaza.jpg', 'assets/uploads/ks-4/xme1397036209_khach-san-sofitel-saigon-plaza.jpg', 1, 4, 0, 'clonetrasua2@gmail.com'),
(45, '4fr1522315206_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/4fr1522315206_khach_san_alagon_central_hotel_spa.jpg', 1, 5, 0, 'clonetrasua2@gmail.com'),
(46, 'eiw1522314976_khach_san_alagon_central_hotel_spa.webp', 'assets/uploads/ks-5/eiw1522314976_khach_san_alagon_central_hotel_spa.webp', 1, 5, 0, 'clonetrasua2@gmail.com'),
(47, 'gjy1522314975_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/gjy1522314975_khach_san_alagon_central_hotel_spa.jpg', 1, 5, 0, 'clonetrasua2@gmail.com'),
(48, 'pos1522314943_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/pos1522314943_khach_san_alagon_central_hotel_spa.jpg', 1, 5, 0, 'clonetrasua2@gmail.com'),
(49, 'roh1522315208_khach_san_alagon_central_hotel_spa.webp', 'assets/uploads/ks-5/roh1522315208_khach_san_alagon_central_hotel_spa.webp', 1, 5, 0, 'clonetrasua2@gmail.com'),
(50, 'swi1522314976_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/swi1522314976_khach_san_alagon_central_hotel_spa.jpg', 1, 5, 0, 'clonetrasua2@gmail.com'),
(51, '0oz1522315911_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/0oz1522315911_khach_san_alagon_central_hotel_spa.jpg', 2, 5, 6, 'clonetrasua2@gmail.com'),
(52, 'eyz1522315909_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/eyz1522315909_khach_san_alagon_central_hotel_spa.jpg', 2, 5, 6, 'clonetrasua2@gmail.com'),
(53, 'h0y1522315909_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/h0y1522315909_khach_san_alagon_central_hotel_spa.jpg', 2, 5, 6, 'clonetrasua2@gmail.com'),
(54, 'tsh1522315910_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/tsh1522315910_khach_san_alagon_central_hotel_spa.jpg', 2, 5, 6, 'clonetrasua2@gmail.com'),
(55, 'xht1522315910_khach_san_alagon_central_hotel_spa.jpg', 'assets/uploads/ks-5/xht1522315910_khach_san_alagon_central_hotel_spa.jpg', 2, 5, 6, 'clonetrasua2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tiennghi`
--

CREATE TABLE `tiennghi` (
  `id` int(11) NOT NULL,
  `tentn` varchar(64) NOT NULL,
  `icon` varchar(64) NOT NULL,
  `loai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiennghi`
--

INSERT INTO `tiennghi` (`id`, `tentn`, `icon`, `loai`) VALUES
(1, 'Hồ bơi', 'fas fa-swimming-pool', 0),
(2, 'Massage / Spa', 'fas fa-diagnoses', 0),
(3, 'Wifi miễn phí', 'fas fa-wifi', 0),
(4, 'Bãi đỗ xe', 'fas fa-parking', 0),
(5, 'Cho thuê xe máy', 'fas fa-motorcycle', 0),
(6, 'Đưa đón sân bay', 'fas fa-plane-departure', 0),
(7, 'Phòng gym', 'fas fa-dumbbell', 0),
(8, 'Phục vụ đồ ăn tại phòng', 'fas fa-drumstick-bite', 0),
(9, 'Nhà hàng', 'fas fa-utensils', 0),
(10, 'Giặt là', 'fas fa-recycle', 0),
(11, 'Chấp nhận thú cưng', 'fas fa-paw', 0),
(12, 'Hỗ trợ đặt tour', 'fas fa-question', 0),
(13, 'Lễ tân 24/24', 'fas fa-phone', 0),
(14, 'Thang máy', 'fas fa-caret-square-left', 0),
(15, 'Máy ATM trong khách sạn', 'fas fa-university', 0),
(16, 'Phòng họp', 'fas fa-briefcase', 0),
(17, 'Tổ chức sự kiện', 'fas fa-glass-cheers', 0),
(18, 'Bàn ủi', 'fas fa-tshirt', 1),
(19, 'Điều hòa nhiệt độ', 'fas fa-temperature-high', 1),
(20, 'Quạt', 'fas fa-wind', 1),
(21, 'Két sắt trong phòng', 'fas fa-fingerprint', 1),
(22, 'Máy giặt', 'fas fa-recycle', 1),
(23, 'Lò sưởi', 'fas fa-dumpster-fire', 1),
(24, 'Ghế sofa', 'fas fa-couch', 1),
(25, 'Ban công/Sân thượng', 'fas fa-biohazard', 1),
(26, 'Sàn lát gạch/ đá cẩm thạch', 'fas fa-shoe-prints', 1),
(27, 'Sàn lát gỗ', 'fas fa-pallet', 1),
(28, 'Đồ vệ sinh cá nhân miễn phí', 'fas fa-person-booth', 0),
(29, 'Toilet cho người khuyết tật', 'fas fa-toilet', 1),
(30, 'Nước đóng chai miễn phí', 'fas fa-wine-bottle', 1),
(31, 'Tủ lạnh', 'fas fa-snowflake', 1),
(32, 'Truyền hình vệ tinh/cáp', 'fas fa-tv', 1),
(33, 'Thiết bị chơi game', 'fas fa-gamepad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtp`
--

CREATE TABLE `tinhtp` (
  `matp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `TenKhongDau` varchar(32) NOT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tinhtp`
--

INSERT INTO `tinhtp` (`matp`, `name`, `TenKhongDau`, `anh`, `type`) VALUES
(1, 'Thành phố Hà Nội', 'Thanh pho Ha Noi', 'country1552983635.jpg', 'Thành phố Trung ương'),
(2, 'Tỉnh Hà Giang', 'Tinh Ha Giang', '', 'Tỉnh'),
(4, 'Tỉnh Cao Bằng', 'Tinh Cao Bang', '', 'Tỉnh'),
(6, 'Tỉnh Bắc Kạn', 'Tinh Bac Kan', '', 'Tỉnh'),
(8, 'Tỉnh Tuyên Quang', 'Tinh Tuyen Quang', '', 'Tỉnh'),
(10, 'Tỉnh Lào Cai', 'Tinh Lao Cai', '', 'Tỉnh'),
(11, 'Tỉnh Điện Biên', 'Tinh Dien Bien', '', 'Tỉnh'),
(12, 'Tỉnh Lai Châu', 'Tinh Lai Chau', '', 'Tỉnh'),
(14, 'Tỉnh Sơn La', 'Tinh Son La', '', 'Tỉnh'),
(15, 'Tỉnh Yên Bái', 'Tinh Yen Bai', '', 'Tỉnh'),
(17, 'Tỉnh Hoà Bình', 'Tinh Hoa Binh', '', 'Tỉnh'),
(19, 'Tỉnh Thái Nguyên', 'Tinh Thai Nguyen', '', 'Tỉnh'),
(20, 'Tỉnh Lạng Sơn', 'Tinh Lang Son', '', 'Tỉnh'),
(22, 'Tỉnh Quảng Ninh', 'Tinh Quang Ninh', 'country1541585274.jpg', 'Tỉnh'),
(24, 'Tỉnh Bắc Giang', 'Tinh Bac Giang', '', 'Tỉnh'),
(25, 'Tỉnh Phú Thọ', 'Tinh Phu Tho', '', 'Tỉnh'),
(26, 'Tỉnh Vĩnh Phúc', 'Tinh Vinh Phuc', '', 'Tỉnh'),
(27, 'Tỉnh Bắc Ninh', 'Tinh Bac Ninh', '', 'Tỉnh'),
(30, 'Tỉnh Hải Dương', 'Tinh Hai Duong', '', 'Tỉnh'),
(31, 'Thành phố Hải Phòng', 'Thanh pho Hai Phong', '', 'Thành phố Trung ương'),
(33, 'Tỉnh Hưng Yên', 'Tinh Hung Yen', '', 'Tỉnh'),
(34, 'Tỉnh Thái Bình', 'Tinh Thai Binh', '', 'Tỉnh'),
(35, 'Tỉnh Hà Nam', 'Tinh Ha Nam', '', 'Tỉnh'),
(36, 'Tỉnh Nam Định', 'Tinh Nam Dinh', '', 'Tỉnh'),
(37, 'Tỉnh Ninh Bình', 'Tinh Ninh Binh', '', 'Tỉnh'),
(38, 'Tỉnh Thanh Hóa', 'Tinh Thanh Hoa', '', 'Tỉnh'),
(40, 'Tỉnh Nghệ An', 'Tinh Nghe An', '', 'Tỉnh'),
(42, 'Tỉnh Hà Tĩnh', 'Tinh Ha Tinh', '', 'Tỉnh'),
(44, 'Tỉnh Quảng Bình', 'Tinh Quang Binh', '', 'Tỉnh'),
(45, 'Tỉnh Quảng Trị', 'Tinh Quang Tri', '', 'Tỉnh'),
(46, 'Tỉnh Thừa Thiên Huế', 'Tinh Thua Thien Hue', 'country1541584938.jpg', 'Tỉnh'),
(48, 'Thành phố Đà Nẵng', 'Thanh pho Da Nang', 'country1552989374.jpg', 'Thành phố Trung ương'),
(49, 'Tỉnh Quảng Nam', 'Tinh Quang Nam', 'country1552989261.jpg', 'Tỉnh'),
(51, 'Tỉnh Quảng Ngãi', 'Tinh Quang Ngai', '', 'Tỉnh'),
(52, 'Tỉnh Bình Định', 'Tinh Binh Dinh', '', 'Tỉnh'),
(54, 'Tỉnh Phú Yên', 'Tinh Phu Yen', '', 'Tỉnh'),
(56, 'Tỉnh Khánh Hòa', 'Tinh Khanh Hoa', 'country1552984054.jpeg', 'Tỉnh'),
(58, 'Tỉnh Ninh Thuận', 'Tinh Ninh Thuan', '', 'Tỉnh'),
(60, 'Tỉnh Bình Thuận', 'Tinh Binh Thuan', 'country1552989338.jpg', 'Tỉnh'),
(62, 'Tỉnh Kon Tum', 'Tinh Kon Tum', '', 'Tỉnh'),
(64, 'Tỉnh Gia Lai', 'Tinh Gia Lai', '', 'Tỉnh'),
(66, 'Tỉnh Đắk Lắk', 'Tinh Dak Lak', '', 'Tỉnh'),
(67, 'Tỉnh Đắk Nông', 'Tinh Dak Nong', '', 'Tỉnh'),
(68, 'Tỉnh Lâm Đồng', 'Tinh Lam Dong', 'country1552989220.jpg', 'Tỉnh'),
(70, 'Tỉnh Bình Phước', 'Tinh Binh Phuoc', '', 'Tỉnh'),
(72, 'Tỉnh Tây Ninh', 'Tinh Tay Ninh', '', 'Tỉnh'),
(74, 'Tỉnh Bình Dương', 'Tinh Binh Duong', '', 'Tỉnh'),
(75, 'Tỉnh Đồng Nai', 'Tinh Dong Nai', '', 'Tỉnh'),
(77, 'Tỉnh Bà Rịa - Vũng Tàu', 'Tinh Ba Ria - Vung Tau', 'country1552984418.jpg', 'Tỉnh'),
(79, 'Thành phố Hồ Chí Minh', 'Thanh pho Ho Chi Minh', 'country1552983788.jpg', 'Thành phố Trung ương'),
(80, 'Tỉnh Long An', 'Tinh Long An', '', 'Tỉnh'),
(82, 'Tỉnh Tiền Giang', 'Tinh Tien Giang', '', 'Tỉnh'),
(83, 'Tỉnh Bến Tre', 'Tinh Ben Tre', '', 'Tỉnh'),
(84, 'Tỉnh Trà Vinh', 'Tinh Tra Vinh', '', 'Tỉnh'),
(86, 'Tỉnh Vĩnh Long', 'Tinh Vinh Long', '', 'Tỉnh'),
(87, 'Tỉnh Đồng Tháp', 'Tinh Dong Thap', '', 'Tỉnh'),
(89, 'Tỉnh An Giang', 'Tinh An Giang', '', 'Tỉnh'),
(91, 'Tỉnh Kiên Giang', 'Tinh Kien Giang', 'country1552989304.jpg', 'Tỉnh'),
(92, 'Thành phố Cần Thơ', 'Thanh pho Can Tho', '', 'Thành phố Trung ương'),
(93, 'Tỉnh Hậu Giang', 'Tinh Hau Giang', '', 'Tỉnh'),
(94, 'Tỉnh Sóc Trăng', 'Tinh Soc Trang', '', 'Tỉnh'),
(95, 'Tỉnh Bạc Liêu', 'Tinh Bac Lieu', '', 'Tỉnh'),
(96, 'Tỉnh Cà Mau', 'Tinh Ca Mau', '', 'Tỉnh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`email`,`MKs`);

--
-- Indexes for table `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MHd`);

--
-- Indexes for table `khachsan`
--
ALTER TABLE `khachsan`
  ADD PRIMARY KEY (`MKs`);

--
-- Indexes for table `lichsugd`
--
ALTER TABLE `lichsugd`
  ADD PRIMARY KEY (`MGd`);

--
-- Indexes for table `mgg`
--
ALTER TABLE `mgg`
  ADD PRIMARY KEY (`IdMgg`),
  ADD UNIQUE KEY `Ma` (`Ma`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MP`);

--
-- Indexes for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`maqh`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `thuvienanh`
--
ALTER TABLE `thuvienanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiennghi`
--
ALTER TABLE `tiennghi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtp`
--
ALTER TABLE `tinhtp`
  ADD PRIMARY KEY (`matp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gopy`
--
ALTER TABLE `gopy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MHd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khachsan`
--
ALTER TABLE `khachsan`
  MODIFY `MKs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lichsugd`
--
ALTER TABLE `lichsugd`
  MODIFY `MGd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `mgg`
--
ALTER TABLE `mgg`
  MODIFY `IdMgg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thuvienanh`
--
ALTER TABLE `thuvienanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tiennghi`
--
ALTER TABLE `tiennghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
