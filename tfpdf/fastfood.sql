-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 09:27 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fastfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(8, 5, 3011, 'ngon', '2023-11-21 08:47:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `CodeOrder` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_DonHang`, `ID_SanPham`, `SoLuong`, `CodeOrder`, `GiaMua`) VALUES
(107, 3011, 8, 4746, 49000),
(107, 3015, 3, 4746, 25000),
(108, 3010, 1, 4306, 85000),
(109, 3011, 1, 40, 49000),
(110, 3010, 1, 6422, 85000),
(110, 3011, 1, 6422, 49000),
(111, 3011, 1, 4865, 49000),
(112, 3015, 6, 9299, 25000),
(113, 3015, 5, 450, 25000),
(114, 3003, 1, 7224, 100000),
(114, 3010, 0, 7224, 85000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `ID_GioHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`ID_GioHang`, `ID_SanPham`, `SoLuong`) VALUES
(5, 3011, 1),
(5, 3015, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(30) NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `Mota`) VALUES
(1, 'Gà rán', 'Được làm từ nguyên liệu tươi ngon nhất'),
(2, 'Đồ uống', 'Các loại đồ uống'),
(3, 'Combo', 'Các combo với giá ưu đãi'),
(13, 'Sản phẩm khác', 'Các loại sản phẩm khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `GiaTien` float NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `XuLy` tinyint(1) NOT NULL,
  `NguoiNhan` varchar(50) DEFAULT NULL,
  `HinhThucThanhToan` varchar(20) DEFAULT NULL,
  `CodeOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_DonHang`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`, `NguoiNhan`, `HinhThucThanhToan`, `CodeOrder`) VALUES
(107, 5, '2023-11-20 21:32:33', 'Hải Dương', '', 467000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'vnpay', 4746),
(108, 5, '2023-11-20 21:33:00', 'Hải Dương', '', 85000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'bank', 4306),
(109, 5, '2023-11-21 08:48:23', 'Hải Dương', '', 49000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'cod', 40),
(110, 5, '2023-11-21 09:54:19', 'Hải Dương', '', 134000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'bank', 6422),
(111, 5, '2023-11-21 10:16:44', 'Hải Dương', '', 49000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'bank', 4865),
(112, 5, '2023-11-21 10:19:06', 'Hải Dương', '', 150000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'cod', 9299),
(113, 5, '2023-11-21 10:19:57', 'Hải Dương', '', 125000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'cod', 450),
(114, 5, '2023-11-22 10:31:24', 'Hải Dương', '', 100000, '0899274244', 1, 'Nguyễn Minh Hoàng', 'cod', 7224);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID_GioHang` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID_GioHang`, `ID_ThanhVien`) VALUES
(5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `ID_MoMo` int(11) NOT NULL,
  `PartnerCode` varchar(50) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Amount` varchar(50) NOT NULL,
  `OrderInfo` varchar(100) NOT NULL,
  `OrderType` varchar(50) NOT NULL,
  `TransId` int(11) NOT NULL,
  `payType` varchar(50) NOT NULL,
  `CodeOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `momo`
--

INSERT INTO `momo` (`ID_MoMo`, `PartnerCode`, `OrderId`, `Amount`, `OrderInfo`, `OrderType`, `TransId`, `payType`, `CodeOrder`) VALUES
(5, 'MOMOBKUN20180529', 1692868853, '31500', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2045),
(6, 'MOMOBKUN20180529', 1692882873, '342000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7592),
(7, 'MOMOBKUN20180529', 1693055000, '47500', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 3287),
(8, 'MOMOBKUN20180529', 1693232468, '171000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 5646),
(9, 'MOMOBKUN20180529', 1693275093, '152000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7176),
(10, 'MOMOBKUN20180529', 1693306862, '422750', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 6235),
(11, 'MOMOBKUN20180529', 1693312567, '1140000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7859),
(12, 'MOMOBKUN20180529', 1693360388, '14250', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2624),
(13, 'MOMOBKUN20180529', 1694306029, '380000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2823),
(14, 'MOMOBKUN20180529', 1694311095, '1078250', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 8404);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `Id` int(10) NOT NULL,
  `Hoten` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sdt` varchar(20) NOT NULL,
  `Chude` varchar(255) NOT NULL,
  `Noidung` varchar(255) NOT NULL,
  `Trangthai` int(2) NOT NULL,
  `Ngaytao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`Id`, `Hoten`, `Email`, `Sdt`, `Chude`, `Noidung`, `Trangthai`, `Ngaytao`) VALUES
(1, 'Minh Hoang', 'nguyenminhhoang.utt@gmail.com', '899274244', 'haha', '123', 1, '2023-11-22 06:52:20'),
(2, 'Minh Hoang', 'nguyenminhhoang.utt@gmail.com', '899274244', 'haha', '123', 1, '2023-11-22 06:53:48'),
(3, 'Minh Hoang', 'kiubakass@gmail.com', '0899274244', 'hahaha', '123', 1, '2023-11-22 06:55:42'),
(4, 'Minh Hoang', 'kiubakass@gmail.com', '0899274244', 'haha', '121232', 1, '2023-11-22 08:55:28'),
(5, 'Minh Hoang', 'kiubakass@gmail.com', '0899274244', 'haha', '121232', 0, '2023-11-22 09:00:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `ID_QuanLy` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`ID_QuanLy`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `ID_NhaCungCap` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` float NOT NULL,
  `Img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `ID_DanhMuc`, `ID_NhaCungCap`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `Img`) VALUES
(1001, 13, 1, 'Gà viên R', '1 Gà viên size R', 50000, 99, 'POP-R.jpg'),
(1002, 13, 1, 'Gà viên L', '1 Gà viên size L', 35000, 100, 'POP-L.jpg'),
(1003, 13, 2, 'Bánh trứng nướng', '1 Bánh trứng', 36000, 100, '1-eggtart.jpg'),
(2001, 2, 1, 'Nước ', '1 Nước', 10000, 99, 'water.png'),
(2002, 2, 2, 'Sprite', '1 Sprite', 18000, 100, 'sprite.png'),
(2003, 2, 1, 'Fanta', '1 Fanta', 20000, 100, 'fanta.png'),
(2004, 2, 1, 'Coca Cola', '1 Coca Cola', 20000, 100, 'cola.png'),
(2005, 3, 3, 'Combo Tưng Bừng', '6 Miếng gà + 3 Pepsi', 300000, 100, 'combo-tung-bung.jpg'),
(3001, 3, 1, 'Combo Hân Hoan', '5 Miếng gà + 2 Pepsi', 220000, 99, 'combo-han-hoan.jpg'),
(3002, 3, 1, 'Combo Vui Vẻ', '3 Miếng gà + 1 Pepsi', 150000, 100, 'combo-vui-ve.jpg'),
(3003, 3, 1, 'Combo Happy Meal', '2 Miếng gà + 1 Khoai tây chiên + 2 Pepsi', 100000, 92, 'happy_meal.jpg'),
(3004, 1, 1, 'Gà Phi Lê Quay', '1 Gà phi lê', 70000, 99, 'phile.jpg'),
(3005, 1, 1, 'Gà Sốt Tiêu Đen', '1 Má đùi gà ', 100000, 100, 'BJ.jpg'),
(3008, 1, 3, 'Cánh Gà Rán 3 Miếng', '3 Miếng gà', 120000, 100, '3-HW.jpg'),
(3010, 1, 3, 'Gà Rán KFC 3 Miếng', '3 Miếng gà', 85000, 8, '3-Fried-Chicken.jpg'),
(3011, 1, 1, 'Gà Rán KFC 2 Miếng', '2 Miếng gà', 49000, 89, '2-Fried-Chicken.jpg'),
(3015, 1, 0, 'Gà Rán KFC 1 Miếng', '1 Miếng gà', 25000, 100, '1-Fried-Chicken.jpg'),
(3016, 13, 0, 'Salad', '1 Salad', 40000, 100, 'SALAD-HAT.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HoVaTen` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES
(5, 'hoang', '202cb962ac59075b964b07152d234b70', 'kiubakass@gmail.com', 'Nguyễn Minh Hoàng', 'Hải Dương', '0899274244', '2023-11-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `Amount` varchar(50) NOT NULL,
  `BankCode` varchar(50) NOT NULL,
  `BankTranNo` varchar(50) NOT NULL,
  `CardType` varchar(50) NOT NULL,
  `OrderInfo` varchar(100) NOT NULL,
  `PayDate` varchar(50) NOT NULL,
  `TmnCode` varchar(50) NOT NULL,
  `TransactionNo` varchar(50) NOT NULL,
  `ID_VNPay` int(11) NOT NULL,
  `CodeOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vnpay`
--

INSERT INTO `vnpay` (`Amount`, `BankCode`, `BankTranNo`, `CardType`, `OrderInfo`, `PayDate`, `TmnCode`, `TransactionNo`, `ID_VNPay`, `CodeOrder`) VALUES
('20910000', 'NCB', 'VNP14100978', 'ATM', 'Thanh toan GD:5970', '20230824202533', '6448J9KM', '14100978', 10, 5970),
('4750000', 'NCB', 'VNP14102267', 'ATM', 'Thanh toan GD:4409', '20230827113508', '6448J9KM', '14102267', 11, 4409),
('1425000', 'NCB', 'VNP14104554', 'ATM', 'Thanh toan GD:2606', '20230830085601', '6448J9KM', '14104554', 12, 2606);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID_BinhLuan`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID_DonHang`,`ID_SanPham`),
  ADD KEY `ID_DonHang` (`ID_DonHang`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`ID_GioHang`,`ID_SanPham`),
  ADD KEY `ID_GioHang` (`ID_GioHang`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID_GioHang`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`ID_MoMo`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_QuanLy`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`ID_VNPay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_DonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID_GioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE `momo`
  MODIFY `ID_MoMo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `ID_QuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3017;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `ID_VNPay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`ID_DonHang`) REFERENCES `donhang` (`ID_DonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`ID_GioHang`) REFERENCES `giohang` (`ID_GioHang`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
