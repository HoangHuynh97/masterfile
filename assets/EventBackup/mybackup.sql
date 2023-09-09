#
# TABLE STRUCTURE FOR: tbl_file
#

DROP TABLE IF EXISTS `tbl_file`;

CREATE TABLE `tbl_file` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `date_create` date NOT NULL,
  `game` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `count` int NOT NULL,
  `link_ads` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `link_noads` text COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (1, '2023-08-29', 'HSR', 'Cheat HSR', 'assets/images/i-honkai.jpg', 95, 'https://web1s.io/HSRCheat', 'https://drive.google.com/file/d/1qdF4jtDJyQ9rAnfWQMOkrED0BfpW5NUb/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (2, '2023-08-29', 'Genshin Impact', 'Teleport 4.0', 'assets/images/i-genshin.jpg', 138, 'https://web1s.io/tele40', 'https://drive.google.com/file/d/1Y_zVMpBAPrxPDjDj8fTHPRHcJFBLSSqs/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (3, '2023-08-29', 'Genshin Impact', 'Teleport điểm dịch chuyển', 'assets/images/i-genshin.jpg', 70, 'https://web1s.io/telethantuong', 'https://drive.google.com/file/d/1XqoaJftS3_GQSPDfEBmie78f1R765Xw6/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (4, '2023-08-29', 'Genshin Impact', 'Teleport gỗ', 'assets/images/i-genshin.jpg', 17, 'https://web1s.io/telego', 'https://drive.google.com/file/d/1jloupQncgNu9BC0dwkj7Wuc-0ciY8X9u/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (5, '2023-08-29', 'Genshin Impact', 'Teleport khác', 'assets/images/i-genshin.jpg', 120, 'https://web1s.io/telekhac', 'https://drive.google.com/file/d/1UiFBe9FOKgUIP7_54ukkbQHvx-XyTff2/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (6, '2023-08-29', 'Genshin Impact', 'Teleport khoáng sản', 'assets/images/i-genshin.jpg', 64, 'https://web1s.io/telekhoangsan', 'https://drive.google.com/file/d/1sNqObPw05LOIdQz9aosBRT4DFdFRc6U5/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (7, '2023-08-29', 'Genshin Impact', 'Teleport nhiệm vụ', 'assets/images/i-genshin.jpg', 65, 'https://web1s.io/telequest', 'https://drive.google.com/file/d/17_94Td52CaKxnXfIQ8B3VDV7aZDAncX5/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (8, '2023-08-29', 'Genshin Impact', 'Teleport quái vật', 'assets/images/i-genshin.jpg', 69, 'https://web1s.io/telequai', 'https://drive.google.com/file/d/1wuJOd3D2xO9QrIvOVuLHJi1Xn1PPiz1b/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (9, '2023-08-29', 'Genshin Impact', 'Teleport kho báu', 'assets/images/i-genshin.jpg', 395, 'https://web1s.io/teleruong', 'https://drive.google.com/file/d/1gTAHk7ipLeMFiBoEy1GpcGLPYkoO-sxz/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (10, '2023-08-29', 'Genshin Impact', 'Tool lỏ', 'assets/images/i-genshin.jpg', 134, 'https://web1s.io/toollo-v2', 'https://mega.nz/file/f6xBlCwB#j7d5UDDgfIZObTURM0W83I5QTsHzuDuiUoBfAM2FaIg');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (11, '2023-08-30', 'Genshin Impact', 'Data 4.0.1', 'assets/images/i-genshin.jpg', 51, 'https://web1s.io/data401', 'https://mega.nz/file/y7BAmaKR#_ed4ycmZ2ETq-N8NvDVjJoqJuaPx3yq8EdzIZ2Wqmvo');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (12, '2023-08-30', 'Genshin Impact', 'Korepi F8', 'assets/images/i-genshin.jpg', 512, 'https://web1s.io/korepif8', 'https://mega.nz/file/vigHjBYB#gyHgd9jyqNvPTUJh54sqKW-s5AeSeGFDFi2L1jdeTuA');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (13, '2023-08-31', 'Genshin Inpact', 'Teleport thần đồng', 'assets/images/i-genshin.jpg', 156, 'https://web1s.io/thandong', 'https://drive.google.com/file/d/1zbVM_RFlMKsknTYbiu78GXe6VjucIp4y/view?usp=sharing');
INSERT INTO `tbl_file` (`ID`, `date_create`, `game`, `name`, `image`, `count`, `link_ads`, `link_noads`) VALUES (14, '2023-09-01', 'HSR', 'Cheat StarRail 1.3', 'assets/images/i-honkai.jpg', 67, 'https://web1s.io/chearhsr13', 'https://mega.nz/file/7rQC3LBQ#OtF-bYmLTjkspAQMz_aHrqDJFaLx1o1k2iAreCbF1qY');


