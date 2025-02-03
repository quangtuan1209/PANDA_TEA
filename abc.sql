-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2020 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `abc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `Ma_DanhMuc` int(11) NOT NULL,
  `Ten_DanhMuc` varchar(250) NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`Ma_DanhMuc`, `Ten_DanhMuc`, `TrangThai`) VALUES
(1, 'Cà Phê', b'1'),
(2, 'Nước Ép - Trà', b'1'),
(3, 'Chính Sách', b'1'),
(4, 'Liên Hệ', b'1'),
(6, 'Sản Phẩm', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `Ma_SanPham` int(11) NOT NULL,
  `Ma_DanhMuc` int(11) NOT NULL,
  `Ten_SanPham` varchar(250) NOT NULL,
  `AnhSP` varchar(250) NOT NULL,
  `Gia` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`Ma_SanPham`, `Ma_DanhMuc`, `Ten_SanPham`, `AnhSP`, `Gia`, `MoTa`, `SoLuong`, `TrangThai`) VALUES
(1, 1, 'Cà Phê Sữa Đá/Nóng', 'uploads/cf1.jpg', 18000, '', 20, b'0'),
(2, 2, 'Trà Xanh Đá Xay', 'uploads/tra-chanh-da-xay.jpg', 30000, '', 30, b'0'),
(3, 1, 'Cà Phê Đen Đá/Nóng', 'uploads/Cfden.jpg', 18000, '', 50, b'0'),
(4, 1, 'CACAO Đá/Nóng', 'uploads/CACAO.jpg', 20000, '', 30, b'0'),
(5, 1, 'Bạc Xỉu', 'uploads/Bacxiu.jpg', 20000, '', 40, b'0'),
(6, 2, 'ORION Đá Xay', 'uploads/orion da xay.jpg', 30000, '', 10, b'0'),
(7, 2, 'LATTE', 'uploads/Latte.jpg', 20000, '', 40, b'0'),
(8, 2, 'Sữa Tươi Đường Đen', 'uploads/stuoi.jpg', 30000, '', 30, b'0'),
(9, 2, 'YAOURT Trái Cây', 'uploads/st1.jpg', 35000, '', 30, b'0'),
(10, 2, 'YAOURT Đá', 'uploads/st2.jpg', 35000, '', 70, b'0'),
(11, 2, 'Sinh Tố Xoài', 'uploads/st3.jpg', 35000, '', 33, b'0'),
(12, 2, 'Sinh Tố Bơ', 'uploads/st4.jpg', 35000, '', 50, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Ma_Login` int(11) NOT NULL,
  `us` varchar(250) NOT NULL,
  `pa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`Ma_Login`, `us`, `pa`) VALUES
(1, 'admin', '123456'),
(2, 'my', '020900');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`Ma_DanhMuc`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`Ma_SanPham`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Ma_Login`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `Ma_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `Ma_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Ma_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
