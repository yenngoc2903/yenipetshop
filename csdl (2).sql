-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 09, 2023 lúc 05:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'yenipetshop', 'yeni123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maCTDH` int(11) NOT NULL,
  `codeDH` varchar(10) NOT NULL,
  `maTC` int(255) NOT NULL,
  `luotMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maCTDH`, `codeDH`, `maTC`, `luotMua`) VALUES
(73, '396376', 20, 1),
(76, '820513', 26, 1),
(77, '820513', 19, 1),
(78, '820513', 32, 1),
(90, '835498', 30, 1),
(91, '804519', 19, 1),
(93, '402488', 28, 1),
(94, '902387', 35, 1),
(96, '108788', 20, 1),
(105, '938522', 19, 1),
(106, '841234', 22, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int(11) NOT NULL,
  `codeDH` varchar(10) NOT NULL,
  `maKH` int(11) NOT NULL,
  `ngayDat` varchar(255) NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDH`, `codeDH`, `maKH`, `ngayDat`, `trangThai`) VALUES
(47, '396376', 16, '2023-11-14 14:45:00', 0),
(49, '820513', 16, '2023-11-14 22:03:20', 0),
(58, '835498', 8, '2023-11-25 21:44:01', 0),
(59, '804519', 13, '2023-11-27 20:41:30', 0),
(61, '402488', 13, '2023-11-28 01:24:29', 0),
(62, '902387', 13, '2023-11-28 01:25:25', 0),
(64, '108788', 13, '2023-11-28 01:39:06', 0),
(71, '938522', 20, '2023-11-30 22:14:28', 0),
(72, '841234', 8, '2023-12-01 08:51:50', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giongloai`
--

CREATE TABLE `giongloai` (
  `maGiong` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `tenGiong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giongloai`
--

INSERT INTO `giongloai` (`maGiong`, `maLoai`, `tenGiong`) VALUES
(1, 1, 'Corgi'),
(7, 1, 'Shiba Inu'),
(9, 1, 'Golden'),
(10, 1, 'Akita Inu'),
(11, 1, 'Chó Phốc'),
(12, 1, 'Poodle'),
(13, 1, 'Bichon Frise'),
(14, 1, 'Chihuahua'),
(15, 1, 'Chó Đốm'),
(16, 1, 'Lạp Xưởng'),
(17, 2, 'Mèo Anh lông ngắn'),
(18, 2, 'Mèo Munchkin chân ngắn'),
(19, 2, 'Mèo tai cụp'),
(20, 2, 'Mèo Anh lông dài'),
(21, 2, 'Mèo Mỹ lông dài'),
(22, 2, 'Mèo không lông'),
(23, 2, 'Mèo tam thể'),
(24, 2, 'Mèo Ragdoll '),
(25, 1, 'Husky');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `SDT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `email`, `diaChi`, `matkhau`, `SDT`) VALUES
(8, 'Trần Lê Yến Ngọc ', 'yenngoc29032k1@gmail.com', 'Hẻm 132 Đường 3/2,  Ninh Kiều - Cần Thơ', 'yenngoc123', '0367279411'),
(10, 'Đinh Thị Hồng Yến', 'hongyen123@gmail.com', 'Hẻm 51, đường 3/2, Ninh Kiều, Cần Thơ', 'hongyen123', '0989123123'),
(13, 'Hồ Huỳnh Hiếu Nghi', 'hieunghi123@gmail.com', 'Long Xuyên - An Giang', 'hieunghi123', '0989546783'),
(15, 'Lê Thị Thuỳ Oanh', 'thuyoanh123@gmail.com', 'Hẻm 19, Đ.Trần Hoàng Na, Ninh Kiều, Cần Thơ', 'thuyoanh123', '0989 112 113'),
(16, 'Nguyễn Thị Mỹ Trinh', 'mytrinh123@gmail.com', 'KTX B , Trường ĐHCT, Đ. 3/2, Ninh Kiều, Cần Thơ', 'mytrinh123', '0345990555'),
(20, 'Lê Thị Thuỳ Oanh', 'oanhb2005020@student.ctu.edu.vn', 'Hưng Lợi - Ninh Kiều - Cần Thơ', 'thuyoanh123', '0932835574');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithucung`
--

CREATE TABLE `loaithucung` (
  `maLoai` int(255) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaithucung`
--

INSERT INTO `loaithucung` (`maLoai`, `tenLoai`) VALUES
(1, 'Chó'),
(2, 'Mèo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `id_thongke` int(11) NOT NULL,
  `ngayDat` varchar(255) NOT NULL,
  `donHang` int(11) NOT NULL,
  `doanhThu` varchar(255) NOT NULL,
  `luotBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`id_thongke`, `ngayDat`, `donHang`, `doanhThu`, `luotBan`) VALUES
(20, '2023-11-14', 2, '28500000', 1),
(25, '2023-11-25', 1, '8000000', 1),
(26, '2023-11-27', 1, '7000000', 1),
(27, '2023-11-28', 3, '36000000', 1),
(29, '2023-11-30', 1, '7000000', 1),
(30, '2023-12-01', 1, '10000000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucung`
--

CREATE TABLE `thucung` (
  `maTC` int(255) NOT NULL,
  `maLoai` char(255) NOT NULL,
  `maGiong` int(11) NOT NULL,
  `tenTC` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhAnh` varchar(255) NOT NULL,
  `hinhAnhs` varchar(255) NOT NULL,
  `moTa` varchar(255) NOT NULL,
  `ngaySinh` date NOT NULL,
  `giong` varchar(255) NOT NULL,
  `mau` varchar(255) NOT NULL,
  `vacxin` int(255) NOT NULL,
  `giayTo` varchar(255) NOT NULL,
  `baoHanh` int(255) NOT NULL,
  `ngayVeNha` date NOT NULL,
  `tinhTrang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thucung`
--

INSERT INTO `thucung` (`maTC`, `maLoai`, `maGiong`, `tenTC`, `gia`, `hinhAnh`, `hinhAnhs`, `moTa`, `ngaySinh`, `giong`, `mau`, `vacxin`, `giayTo`, `baoHanh`, `ngayVeNha`, `tinhTrang`) VALUES
(19, '1', 7, 'Bé Snow - Shiba Inu', 7000000, 'product3.1.jpg', '', '           Bé Snow có bộ lông màu trắng tuyết khá đặc biệt đối với giống Shiba Inu. Không những thế Snow còn rất thân thiện với nụ cười trên môi.', '2023-08-04', 'Bé Gái', 'Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-04', 'Hết Hàng'),
(20, '1', 13, 'Bé Sora - Bichon Frise', 8500000, 'product4.jpg', '', '   Sora có nghĩa là bầu trời. Bộ lông trắng bồng bềnh, đôi mắt tròn trong vắt, em bé “Sora” thuộc giống Bichon là một bé gái xinh đẹp, rạng rỡ như cái tên của mình.', '2023-08-01', 'Bé Gái', 'Trắng Bông', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-01', 'Hết Hàng'),
(21, '1', 1, 'Bé Pors –  Corgi mông to', 10000000, 'product5.jpg', '', '       Pors là một bé trai năng động, siêu nghịch với khuôn mặt “khá tinh ranh”. Pors mũm mĩm, chân tay to ú, thân thiện, thích chơi với người và các anh em chung đàn.', '2023-04-05', 'Bé Trai', 'Vàng Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-06-05', 'Còn Hàng'),
(22, '1', 11, 'Bé Nhoi – Phốc sóc', 10000000, 'product6.jpg', '', '   Đúng với tên gọi, bé Nhoi là một bé trai cực kỳ năng động và tinh nghịch nhưng cũng không kém phần đáng yêu.', '2023-03-09', 'Bé Trai', 'Nâu Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-05-09', 'Hết Hàng'),
(23, '1', 10, 'Bé Chaien – Akita', 12000000, 'product7.jpg', '', '   Chaien là bé trai thuộc giống Akita. Mang đặc trưng năng động, nhí nhảnh, hay cười. Chaien dễ dàng làm các Sen yêu thích ngay từ lần gặp đầu tiên.', '2023-03-11', 'Bé Trai', 'Vàng trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-05-11', 'Còn Hàng'),
(24, '1', 12, 'Bé Bông - Poodle size teacup', 4500000, 'product8.jpg', '', ' Bé Bông sở hữu một màu lông bò xám nhỏ nhắn xinh xắn, siêu thu hút ánh nhìn. Tuy có hơi nhút nhát nhưng bông cũng cực kỳ ngoan hiền.', '2023-09-13', 'Bé Gái', 'Trắng Xám', 2, 'Giấy VKA đầy đủ', 10, '2023-11-13', 'Hết Hàng'),
(25, '1', 9, 'Bé Kem - Golden', 11000000, 'product2.jpg', '', '  Một em Golden siêu phẩm, với bộ lông mềm mượt làm tan chảy bao con sen. Kem vô cùng năng động cần được chơi đùa mỗi ngày.', '2023-08-18', 'Bé Trai', 'Vàng Kem', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-18', 'Còn Hàng'),
(26, '1', 14, 'Bé Socola - Chihuahua', 4000000, 'product32.jpg', '', '  Bé Socola thuộc giống Chihuahua thuần chủng, với đôi mắt to tròn lấp lánh ánh kim cương. Socola rất tinh nghịch và quấn người.', '2023-08-20', 'Bé Gái', 'Nâu Kem', 2, 'Giấy VKA đầy đủ', 10, '2023-10-20', 'Còn Hàng'),
(27, '2', 17, 'Bé Nâu - Mèo lông ngắn Anh', 7000000, 'product9.jpg', '', '     Bé Nâu thuộc giống mèo Anh lông ngắn, bé hiền lành, lười vận động và không thích nơi ồn ào tuy vậy bé Nâu rất hiền lành và gần gũi.', '2023-02-01', 'Bé Gái', 'Nâu Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-04-01', 'Còn Hàng'),
(28, '2', 18, 'Bé Cam - Mèo Munchkin', 10500000, 'product10.jpg', '', '      Bé Cam là giống mèo hướng ngoại, rất nhanh nhẹn, tinh nghịch. Cam có xu hướng tò mò, khám phá mọi thứ xung quanh, đôi khi chúng còn đứng bằng 2 chân sau để cao hơn quan sát tốt hơn.', '2023-08-19', 'Bé Gái', 'Cam Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-19', 'Còn Hàng'),
(29, '2', 19, 'Bé Vol - Mèo tai cụp', 9500000, 'product11.jpg', '', '   Bé Vol là giống mèo tai cụp có tính cách dễ thương, hiền lành nhưng cũng khá tinh nghịch.Vol rất thích tương tác với con người, rất hào hứng khi chơi các trò chơi với con người hoặc nằm yên hưởng thụ khi được vuốt ve cưng nựng.', '2023-06-27', 'Bé Trai', 'Xám Tro', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-08-27', 'Hết Hàng'),
(30, '2', 20, 'Bé Koro - Mèo lông dài Anh', 8000000, 'product12.jpg', '', '     Bé Koro là những chú mèo điềm tĩnh với bộ lông dài. Trong có vẻ như Koro rất sang chảnh, khó gần nhưng thực tế chúng khá hiền lành và quấn chủ, Koro rất thích cuộn tròn nằm bên cạnh chủ hoặc được vuốt ve cưng nựng, nhưng chúng thường không thích bị b', '2023-07-23', 'Bé Gái', 'Cam Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-09-23', 'Còn Hàng'),
(31, '2', 21, 'Bé Roll - Mèo lông dài Mỹ', 13000000, 'product13.jpg', '', '  Trái ngược với vẻ ngoài “hổ báo”,Roll là mèo Mỹ lông dài hiền lành, thân thiện và rất tình cảm.Roll rất thích “lởn vởn” bên cạnh để thu hút sự chú ý, muốn được quan tâm.', '2023-10-12', 'Bé Trai', 'Nâu Xám Đen', 2, 'Giấy VKA / Microchip', 10, '2023-12-12', 'Còn Hàng'),
(32, '2', 22, 'Bé Trụi - Mèo không lông', 19000000, 'product14.jpg', '', '   	Ngoại hình của Trụi có thể không “vừa mắt” với nhiều người nhưng tính cách thì cực kỳ đáng yêu, ngọt ngào. Trụi rất quấn chủ, chúng luôn thể hiện sự vui mừng mỗi khi được chủ âu yếm, chơi đùa cùng. Bé Trụi hoạt bát, nhanh nhẹn, rất hoà đồng, thân thiệ', '2023-08-25', 'Bé Gái', '', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-25', 'Còn Hàng'),
(33, '2', 17, 'Bé Jun - Mèo lông ngắn Anh', 5000000, 'product33.jpg', '', '  Bé Jun là giống mèo Anh lông ngắn mi nhon, với tính cách ổn định là người bạn lý tưởng cho trẻ em, chấp nhận các va chạm thay vì cào, cắn. Jun cũng rất biết nghe lời, được đánh giá là thông minh dễ huấn luyện.', '2023-10-02', 'Bé Gái', 'Xám Trắng', 2, 'Giấy VKA / Microchip', 10, '2023-11-02', 'Còn Hàng'),
(34, '2', 20, 'Bé Seto - Mèo Anh lông dài ', 9000000, 'product34.jpg', '', ' Seto có đôi mắt 2 màu khá đặt biệt, bé cũng rất hiền lành ít quậy phá , thân thiện với mọi người. Bé khá lười vận động, thường dành thời gian để nằm ngủ. Nếu bạn không có thời gian thì nên sắm cho Seto đồ chơi để bé có thể tự giải trí nhé.', '2023-10-14', 'Bé Trai', 'Trắng', 2, 'Giấy VKA / Microchip', 10, '2023-11-14', 'Hết Hàng'),
(35, '2', 18, 'Bé Lùn - Mèo Munchkin', 8000000, 'product35.jpg', '', 'Mèo Munchkin là giống mèo rất tình cảm và quấn chủ, và bé Lùn cũng vậy, thích được chơi đùa tương tác với các thành viên thông gia đình. Hoạt bát, năng động, thân thiện với trẻ em và các động vật khác.', '2023-10-23', 'Bé Gái', 'Kem Nâu', 2, 'Giấy VKA / Microchip', 10, '2023-11-23', 'Hết Hàng'),
(36, '2', 23, 'Bé Vàng - Mèo tam thể', 4500000, 'product36.jpg', '', 'Bé Vàng có tính cách đa dạng cho di truyền từ 3 giống mèo khác nhau, bé thân thiện và thích tương tác xã hội, mèo Tam Thể là giống mèo đang được chuộng hiện nay, vì chúng thích ứng tốt với môi trường và thành viên trong gia đình.', '2023-10-10', 'Bé Gái', 'Tam Thể', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-12-10', 'Còn Hàng'),
(37, '2', 24, 'Bé Xù - Mèo Ragdoll mắt xanh', 9500000, 'product37.jpg', '', 'Bé Xù là một bé gái thân thiện và tình cảm với con người, có thể trở thành người bạn đồng hành lý tưởng. Xù mạnh mẽ và tự tin không thích xung đột và đặc biệt bé rất thích nước, có thể tận hưởng việc tắm hoặc là chơi đùa với nước.', '2023-09-30', 'Bé Gái', 'Trắng Xám', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-11-30', 'Còn Hàng'),
(38, '1', 15, 'Bé Đốm - Chó đốm Dalmatian', 7500000, 'product38.jpg', '', 'Bé Đốm là một bé trai năng động, thích vận động, có trí thông minh và dễ học hỏi. Đốm rất dũng cảm và tự tin, có khả năng bảo vệ thành viên trong gia đình. Bé rất thân thiện với trẻ em và là bạn đồng hành tốt cho gia đình có trẻ nhỏ', '2023-10-11', 'Bé Trai', 'Trắng Đen', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-12-11', 'Còn Hàng'),
(47, '1', 16, 'Bé Đậu - Lạp Xưởng', 6000000, 'product1.jpg', '', '    Đậu là giống chó lai giữa Labrador Retriever và Beagle, rất năng động và hiếu động, thân thiện, dễ gần. Vì thế Đậu sẽ là bạn đồng hành tốt cho gia đình và cả trẻ em', '2023-09-10', 'Bé Trai', 'Nâu - Đen', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-11-10', 'Hết Hàng'),
(48, '1', 1, 'Bé Mập - Chó Corgi', 8500000, 'product39.jpg', '', 'Bé Mập có sự nhạy bén cao với môi trường và nhạy cảm với tâm trạng của chủ nhân. Thích tham gai hoạt động chơi đùa, chạy nhảy. Bé thông minh, dễ đào tạo thích thú việc học hỏi', '2023-09-12', 'Bé Trai', 'Vàng Trắng', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-11-12', 'Còn Hàng'),
(49, '1', 25, 'Bé Bư - Chó Husky', 12000000, 'product40.jpg', '', ' Bé Bư có tính cách năng động, hoạt bát, và yêu thích hoạt động vận động như chạy và đua. Có tính độc lập và tự lập, nhưng cũng rất tình cảm và tận tụy với gia đình. Thông minh, khéo léo, và có tinh thần phiêu lưu', '2023-08-11', 'Bé Trai', 'Hồng Phấn', 3, 'Giấy VKA / Microchip đầy đủ', 10, '2023-10-11', 'Còn Hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maCTDH`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`),
  ADD KEY `codeDH` (`codeDH`);

--
-- Chỉ mục cho bảng `giongloai`
--
ALTER TABLE `giongloai`
  ADD PRIMARY KEY (`maGiong`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `loaithucung`
--
ALTER TABLE `loaithucung`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id_thongke`),
  ADD KEY `ngayDat` (`ngayDat`);

--
-- Chỉ mục cho bảng `thucung`
--
ALTER TABLE `thucung`
  ADD PRIMARY KEY (`maTC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `maCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `giongloai`
--
ALTER TABLE `giongloai`
  MODIFY `maGiong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `loaithucung`
--
ALTER TABLE `loaithucung`
  MODIFY `maLoai` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id_thongke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `thucung`
--
ALTER TABLE `thucung`
  MODIFY `maTC` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
