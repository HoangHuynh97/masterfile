-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2023 lúc 05:52 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mastergame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_file`
--

CREATE TABLE `tbl_file` (
  `ID` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `game` text NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `count` int(11) NOT NULL,
  `link_ads` text NOT NULL,
  `link_noads` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_file`
--

INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES
(1, '2023-08-29', 'HSR', 'Cheat HSR', 'assets/images/i-honkai.jpg', 13, 'https://web1s.io/HSRCheat', 'https://drive.google.com/file/d/1qdF4jtDJyQ9rAnfWQMOkrED0BfpW5NUb/view?usp=sharing'),
(2, '2023-08-29', 'Genshin Impact', 'Teleport 4.0', 'assets/images/i-genshin.jpg', 21, 'https://web1s.io/tele40', 'https://drive.google.com/file/d/1Y_zVMpBAPrxPDjDj8fTHPRHcJFBLSSqs/view?usp=sharing'),
(3, '2023-08-29', 'Genshin Impact', 'Teleport điểm dịch chuyển', 'assets/images/i-genshin.jpg', 1, 'https://web1s.io/telethantuong', 'https://drive.google.com/file/d/1XqoaJftS3_GQSPDfEBmie78f1R765Xw6/view?usp=sharing'),
(4, '2023-08-29', 'Genshin Impact', 'Teleport gỗ', 'assets/images/i-genshin.jpg', 1, 'https://web1s.io/telego', 'https://drive.google.com/file/d/1jloupQncgNu9BC0dwkj7Wuc-0ciY8X9u/view?usp=sharing'),
(5, '2023-08-29', 'Genshin Impact', 'Teleport khác', 'assets/images/i-genshin.jpg', 5, 'https://web1s.io/telekhac', 'https://drive.google.com/file/d/1UiFBe9FOKgUIP7_54ukkbQHvx-XyTff2/view?usp=sharing'),
(6, '2023-08-29', 'Genshin Impact', 'Teleport khoáng sản', 'assets/images/i-genshin.jpg', 0, 'https://web1s.io/telekhoangsan', 'https://drive.google.com/file/d/1sNqObPw05LOIdQz9aosBRT4DFdFRc6U5/view?usp=sharing'),
(7, '2023-08-29', 'Genshin Impact', 'Teleport nhiệm vụ', 'assets/images/i-genshin.jpg', 2, 'https://web1s.io/telequest', 'https://drive.google.com/file/d/17_94Td52CaKxnXfIQ8B3VDV7aZDAncX5/view?usp=sharing'),
(8, '2023-08-29', 'Genshin Impact', 'Teleport quái vật', 'assets/images/i-genshin.jpg', 16, 'https://web1s.io/telequai', 'https://drive.google.com/file/d/1wuJOd3D2xO9QrIvOVuLHJi1Xn1PPiz1b/view?usp=sharing'),
(9, '2023-08-29', 'Genshin Impact', 'Teleport kho báu', 'assets/images/i-genshin.jpg', 35, 'https://web1s.io/teleruong', 'https://drive.google.com/file/d/1gTAHk7ipLeMFiBoEy1GpcGLPYkoO-sxz/view?usp=sharing'),
(10, '2023-08-29', 'Genshin Impact', 'Tool lỏ', 'assets/images/i-genshin.jpg', 27, 'https://web1s.io/toollo-v2', 'https://mega.nz/file/f6xBlCwB#j7d5UDDgfIZObTURM0W83I5QTsHzuDuiUoBfAM2FaIg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
