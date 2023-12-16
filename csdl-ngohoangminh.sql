-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 03:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdl-ngohoangminh`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `NGAY_HD` datetime NOT NULL,
  `HOTEN_NGUOINHAN` varchar(100) NOT NULL,
  `DIACHI_NGUOINHAN` varchar(50) NOT NULL,
  `NGAY_GIAO_HANG` datetime NOT NULL,
  `TRANG_THAI` tinyint(4) NOT NULL,
  `MAKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_nhanvien`
--

CREATE TABLE `ql_nhanvien` (
  `ID_NV` int(11) NOT NULL,
  `HO_VA_TEN` varchar(100) NOT NULL,
  `ANH_THE` text NOT NULL,
  `DIA_CHI` varchar(200) NOT NULL,
  `NGAY_SINH` datetime NOT NULL,
  `GIOI_TINH` tinyint(4) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `CHUC_VU` varchar(50) NOT NULL,
  `TINH_NANG` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_sanpham`
--

CREATE TABLE `ql_sanpham` (
  `MA_SP` int(11) NOT NULL,
  `TEN_SP` varchar(100) NOT NULL,
  `ANH` tinyint(4) NOT NULL,
  `SL` varchar(50) NOT NULL,
  `TINH_TRANG` tinyint(4) NOT NULL,
  `GIA_TIEN` varchar(50) NOT NULL,
  `DANH_MUC` varchar(30) NOT NULL,
  `CHUC_NANG` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`,`MAKH`);

--
-- Indexes for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indexes for table `ql_sanpham`
--
ALTER TABLE `ql_sanpham`
  ADD PRIMARY KEY (`MA_SP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
