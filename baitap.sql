-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 03:55 PM
-- Phiên bản máy phục vụ: 8.1.0
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maCTDH` int NOT NULL,
  `maDH` int NOT NULL,
  `maSP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soLuong` int NOT NULL,
  `thanhTien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `id` int NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` int NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`id`, `user`, `pass`, `role`) VALUES
(1, 'admin', 1, 'admin'),
(2, 'tadaboh', 1, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int NOT NULL,
  `maKH` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phuongThucGiaoHang` varchar(50) NOT NULL,
  `trangThaiGiaoHang` varchar(50) NOT NULL,
  `maNV` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phuongThucThanhToan` varchar(50) NOT NULL,
  `kichHoat` tinyint(1) DEFAULT '1',
  `tongTien` decimal(10,2) NOT NULL,
  `ngayTao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int NOT NULL,
  `maKH` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `maSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlkhachhang`
--

CREATE TABLE `qlkhachhang` (
  `maKH` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenKH` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sdtKH` int NOT NULL,
  `gioiTinhKH` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlkhachhang`
--

INSERT INTO `qlkhachhang` (`maKH`, `tenKH`, `sdtKH`, `gioiTinhKH`) VALUES
('KH01', 'Nguyễn Thị hạ', 12154567, 'Nữ'),
('KH03', 'Hồng', 1234567, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlkho`
--

CREATE TABLE `qlkho` (
  `maKho` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tenKho` varchar(100) NOT NULL,
  `maNV` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `qlkho`
--

INSERT INTO `qlkho` (`maKho`, `tenKho`, `maNV`) VALUES
('K001', 'Kho đồ gia dụng', 'Nguyễn Văn A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlkhuyenmai`
--

CREATE TABLE `qlkhuyenmai` (
  `maKhuyenMai` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenKhuyenMai` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mucUuDai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlkhuyenmai`
--

INSERT INTO `qlkhuyenmai` (`maKhuyenMai`, `tenKhuyenMai`, `mucUuDai`) VALUES
('KM00', 'Không áp dụng', 0),
('KM01', 'Siêu sinh nhật 11/11', 20),
('KM02', 'Flash sale', 5),
('KM03', 'Cơn lốc giá trị', 8),
('KM04', 'Ưu đãi khủng', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlnhacungcap`
--

CREATE TABLE `qlnhacungcap` (
  `maNCC` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenNCC` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `diachiNCC` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sdtNCC` int NOT NULL,
  `emailNCC` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlnhacungcap`
--

INSERT INTO `qlnhacungcap` (`maNCC`, `tenNCC`, `diachiNCC`, `sdtNCC`, `emailNCC`) VALUES
('NCC01', 'Nông trại THTRUEMILK', 'Ba Vì', 123454, 'nguyenthihong27022003@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlnhanvien`
--

CREATE TABLE `qlnhanvien` (
  `maNV` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenNV` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `diaChi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `chucVu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `luongNV` int NOT NULL,
  `sdtNV` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlnhanvien`
--

INSERT INTO `qlnhanvien` (`maNV`, `tenNV`, `ngaySinh`, `gioiTinh`, `diaChi`, `chucVu`, `luongNV`, `sdtNV`) VALUES
('NV02', 'Nguyễn Thị Hạ', '2003-04-27', 'Nữ', 'Chương Mỹ', 'Quản lý', 1234567, 357478966),
('NV004', 'Nguyễn Văn A', '2003-01-09', 'Nam', 'Hà Nội', 'Quản lý', 7000000, 986566325);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlnhomsp`
--

CREATE TABLE `qlnhomsp` (
  `maNSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenNSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `thuTu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlnhomsp`
--

INSERT INTO `qlnhomsp` (`maNSP`, `tenNSP`, `thuTu`) VALUES
('1', 'Rau củ, hoa quả', 1),
('2', 'Thực phẩm và hàng đông lạnh', 2),
('3', 'Bánh kẹo', 3),
('4', 'Mỹ Phẩm', 4),
('5', 'Hàng gia dụng cơ bản', 5),
('6', 'Văn phòng phẩm', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlsanpham`
--

CREATE TABLE `qlsanpham` (
  `maSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tenSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hinhAnh` text COLLATE utf8mb4_general_ci NOT NULL,
  `giaSP` int NOT NULL,
  `NSX` date NOT NULL,
  `maNSP` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `soLuong` int NOT NULL,
  `maNCC` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `maKho` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlsanpham`
--

INSERT INTO `qlsanpham` (`maSP`, `tenSP`, `hinhAnh`, `giaSP`, `NSX`, `maNSP`, `soLuong`, `maNCC`, `maKho`) VALUES
('G001', 'Ghế văn phòng', '1729592593_banner3.jpg', 1200000, '2024-10-06', '5', 11, 'NCC01', 'K001');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maCTDH`),
  ADD KEY `fk_chitietdonhang_masp1` (`maSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`),
  ADD KEY `fk_donhang_makh1` (`maKH`);

--
-- Chỉ mục cho bảng `qlkhachhang`
--
ALTER TABLE `qlkhachhang`
  ADD KEY `maKH` (`maKH`);

--
-- Chỉ mục cho bảng `qlkho`
--
ALTER TABLE `qlkho`
  ADD PRIMARY KEY (`maKho`),
  ADD KEY `maNV` (`maNV`);

--
-- Chỉ mục cho bảng `qlsanpham`
--
ALTER TABLE `qlsanpham`
  ADD KEY `maNCC` (`maNCC`),
  ADD KEY `maSP` (`maSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `maCTDH` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chitietdonhang_masp1` FOREIGN KEY (`maSP`) REFERENCES `qlsanpham` (`maSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_makh1` FOREIGN KEY (`maKH`) REFERENCES `qlkhachhang` (`maKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
