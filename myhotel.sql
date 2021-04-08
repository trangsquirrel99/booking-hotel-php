-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2020 at 01:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouthotel`
--

CREATE TABLE `abouthotel` (
  `id` int(1) NOT NULL,
  `Shortabout` text NOT NULL,
  `Longabout` mediumtext NOT NULL,
  `Quydinh` longtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouthotel`
--

INSERT INTO `abouthotel` (`id`, `Shortabout`, `Longabout`, `Quydinh`, `image1`, `image2`, `image3`, `image4`) VALUES
(0, 'Khách sạn Capital là khách sạn sang trọng, đẳng cấp hàng đầu trong Tập đoàn Luxury Việt Nam. Đến với Khách sạn Thủ đô, bạn không chỉ được hòa mình vào một cuộc sống vương giả với đầy đủ tiện nghi, dịch vụ chuyên nghiệp, chất lượng hàng đầu mà còn cảm nhận được bầu không khí ấm cúng, thoải mái, dễ chịu như gia đình ngay tại nhà. Khách sạn Capital là một nơi an toàn, thân thiện cho tất cả mọi người khi ở Hà Nội. Tọa lạc tại vị trí đắc địa, ngay trung tâm thành phố, dễ dàng tiếp cận các địa điểm du lịch nổi tiếng, đây là một nơi lưu trú tuyệt vời. Nó cũng là một điểm đến lý tưởng nhờ vào dịch vụ cao cấp của khách sạn.', 'Khách sạn Capital là khách sạn sang trọng, đẳng cấp hàng đầu trong Tập đoàn Luxury Việt Nam. Đến với Khách sạn Thủ đô, bạn không chỉ được hòa mình vào một cuộc sống vương giả với đầy đủ tiện nghi, dịch vụ chuyên nghiệp, chất lượng hàng đầu mà còn cảm nhận được bầu không khí ấm cúng, thoải mái, dễ chịu như gia đình ngay tại nhà. Khách sạn Capital là một nơi an toàn, thân thiện cho tất cả mọi người khi ở Hà Nội. Tọa lạc tại vị trí đắc địa, ngay trung tâm thành phố, dễ dàng tiếp cận các địa điểm du lịch nổi tiếng, đây là một nơi lưu trú tuyệt vời. Nó cũng là một điểm đến lý tưởng nhờ vào dịch vụ cao cấp của khách sạn. Tất cả các phòng đều được thiết kế theo phong cách hiện đại xen lẫn cổ điển, kiến ​​trúc độc đáo, hài hòa giữa nét đẹp truyền thống của người Việt và nét tinh tế của phương Tây. Đội ngũ nhân viên khách sạn giàu kinh nghiệm, đội ngũ nhân viên chuyên nghiệp, nhiệt tình, không ngừng nâng cao trình độ chuyên môn và chất lượng, luôn sẵn sàng phục vụ khách hàng với phương châm “mang lại giá trị cốt lõi cho khách hàng”.<br><br>\r\n\r\nĐiểm nổi bật của Khách sạn Thủ đô chúng tôi là hệ thống dịch vụ nhà hàng mang đậm phong cách Châu Âu mang thương hiệu Khách sạn Thủ đô. Ngay tại đây, bạn có thể thưởng thức những món ăn đặc sắc với hương vị ngon nhất theo phong cách Châu Á, được chế biến từ những nguyên liệu tươi ngon nhất dưới sự kiểm tra nghiêm ngặt đảm bảo an toàn vệ sinh thực phẩm. Sản phẩm dưới bàn tay khéo léo của đội ngũ đầu bếp giàu kinh nghiệm.<br>\r\n\r\nNgoài ra, trong thời gian lưu trú tại khách sạn, bạn còn được tận hưởng các tiện ích miễn phí ngay trong khuôn viên như phòng tập thể dục, spa, hồ bơi, ... Những thói quen hàng ngày, thói quen hàng ngày, sức khỏe và tinh thần của bạn. bảo trì tại nhà.<br><br>\r\n\r\nTuyệt vời, thoải mái và ấn tượng là những cảm nhận mà du khách nhận xét về Capital Hotel sau khoảng thời gian này và đó cũng là những gì chúng tôi - những người có duyên phục vụ quý khách cảm nhận được. tự hào nhất. Với những dịch vụ uy tín và chất lượng nhất được xây dựng từ những nỗ lực bền bỉ nhất, Khách sạn Thủ đô cam kết mang đến cho Quý khách những gì mới nhất, đẹp nhất, Kỳ nghỉ của Quý khách là một kỷ niệm mãi mãi không bao giờ phai mờ.', 'Chưa cập nhật', '1.1.jpg', '1.2.jpg', '1.3.jpg', '1.3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `admin`, `password`) VALUES
(1, 'NhanDinh', '$2y$10$EK.v3d.5fIR/2wZ/RYloou1Rr8BF96jFd92wmWWBswztk93Y7MkCS');

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieu`
--

CREATE TABLE `chitietphieu` (
  `MAPHIEU` int(11) NOT NULL,
  `MALP` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietphieu`
--

INSERT INTO `chitietphieu` (`MAPHIEU`, `MALP`, `Soluong`) VALUES
(38, 1, 1),
(38, 8, 2),
(39, 3, 1),
(41, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `confirmorders`
--

CREATE TABLE `confirmorders` (
  `cf_id` int(11) NOT NULL,
  `cf_username` text NOT NULL,
  `cf_khoitao` text NOT NULL,
  `cf_token` longtext NOT NULL,
  `cf_expires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirmorders`
--

INSERT INTO `confirmorders` (`cf_id`, `cf_username`, `cf_khoitao`, `cf_token`, `cf_expires`) VALUES
(51, 'xuyendinh1710@gmail.com', '643f5dc7bccbc5c2', '$2y$10$6LWNQ2bb3i7Rh.0zpQmZ9uUJSQ7LlLqmdgwPdy98NZGJ0vmV1EEgK', '1599791195');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `MADV` int(11) NOT NULL,
  `TenDv` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `des` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`MADV`, `TenDv`, `image1`, `image2`, `image3`, `des`) VALUES
(1, 'Spa', 'spa1.jpg', 'spa2.jpg', 'spa3.jpg', 'Capital Spa sẽ mang đến cho bạn những liệu pháp đặc biệt cho cả thể chất và tinh thần. Chúng tôi mang đến cho bạn những trải nghiệm hoàn hảo, khiến bạn cảm thấy tươi trẻ, tràn đầy năng lượng và hơn hết chúng tôi sẽ mang đến cho bạn cảm giác thư giãn tuyệt vời.<br>\r\n\r\nCapital Spa là một dịch vụ trị liệu và trị liệu độc đáo, cung cấp một loạt các liệu pháp massage để đáp ứng nhu cầu và lòng hiếu khách của chúng tôi. Đặc biệt, các bác sĩ điều trị lành nghề luôn gây ấn tượng với khách hàng bằng nụ cười thân thiện và sự tận tâm.<br>\r\n\r\nPhương pháp điều trị tập trung vào việc chăm sóc năm giác quan của con người: thị giác, vị giác, khứu giác, thính giác và xúc giác, những điểm mấu chốt mang lại cảm giác sảng khoái nhất cho khách hàng.<br>\r\n\r\nCapital Spa sẽ mang đến cho bạn một thiên đường bình yên và thư giãn để trẻ hóa cơ thể và phục hồi các giác quan trước cảnh quan tuyệt đẹp của Đảo Phú Quốc. Các liệu pháp spa được cung cấp bởi đội ngũ chuyên gia trị liệu chuyên nghiệp giúp chăm sóc cơ thể, thư giãn tinh thần và nuôi dưỡng tâm hồn bạn.<br>\r\n\r\nCapital Spa - Hân hạnh được phục vụ quý khách!\r\n'),
(2, 'Restaurant', 'res1.jpg', 'res2.jpg', 'res3.jpg', 'Nhà hàng Capital sẽ mang đến cho bạn một trải nghiệm ẩm thực Việt khó quên, khi thưởng thức những món ăn hòa quyện giữa vẻ đẹp của thiên nhiên và không khí trong lành của miền nhiệt đới. Từ đơn giản đến tinh tế, những món ăn được trang trí bắt mắt sẽ kích thích vị giác của bạn.<br><br>\r\n\r\nẨm thực Việt Nam nổi tiếng thanh đạm nhưng vẫn giữ được hương vị tinh tế. Không chỉ vậy, món ăn có thể khiến bạn bất ngờ với những sự kết hợp đặc biệt\r\nthành phần. Đại diện cho sự kết hợp tinh tế đó phải kể đến nền ẩm thực truyền thống Việt Nam. Nhờ khí hậu nhiệt đới, thảm thực vật phong phú đã cung cấp cho các món ăn Việt Nam sự lựa chọn các loại thảo mộc tốt cho sức khỏe. Ngoài ra, những cách nấu nguyên bản được truyền lại từ các thế hệ trước cũng góp phần tạo nên hương vị cho từng món ăn.<br><br>\r\n\r\nHãy đến với chúng tôi để tận hưởng hương vị đậm đà hương vị Việt! Chắc chắn bạn sẽ không quên!');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` mediumtext NOT NULL,
  `Trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Ten`, `Phone`, `Email`, `Message`, `Trangthai`) VALUES
(1, 'Lê Mai', '0874893876', 'mai@gmail.com', 'Thức ăn rất tuyệt !', 0),
(2, 'Huy Hoàng', '0674847588', 'huyhoang@gmail.com', 'Dịch vụ rất tốt', 0),
(4, 'Xuyến Đinh', '0636748483', 'xuyendinh1710@gmail.com', 'Khách sạn có thái độ phục vụ rất tệ! Tôi rất không hài lòng.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TenKH`, `SĐT`, `Email`) VALUES
(1, 'Phan Thị Quỳnh', '0837465746', 'quynh@gmail.com'),
(2, 'Nguyễn Quang Khải', '0957484738', 'khai23@gmail.com'),
(3, 'Phạm Nhật Quang', '0857363736', 'quangpham@gmail.com'),
(36, 'Kim Xuyến', '0937364748', 'xuyendinh1710@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE `loaiphong` (
  `MALP` int(11) NOT NULL,
  `TenLoaiPhong` varchar(255) NOT NULL,
  `Dientich` varchar(50) NOT NULL,
  `TienNghi` longtext NOT NULL,
  `NuMaxAdult` int(11) NOT NULL,
  `NuMaxChild` int(11) NOT NULL,
  `GiaPhong` bigint(20) NOT NULL,
  `Sum_rooms` tinyint(4) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`MALP`, `TenLoaiPhong`, `Dientich`, `TienNghi`, `NuMaxAdult`, `NuMaxChild`, `GiaPhong`, `Sum_rooms`, `image1`, `image2`, `image3`) VALUES
(1, 'Phòng Deluxe một giường đôi', '45m<sup>2</sup>', 'Tầm nhìn ra thành phố <br>\r\n\r\nPhòng máy lạnh được trang bị truyền hình cáp màn hình phẳng với phòng tắm tiện nghi vòi sen, dịch vụ dọn phòng 24h.<br>\r\n\r\n<br>\r\n\r\nTiện nghi phòng: <br><br>\r\n\r\n1.Giường Kingsize với chăn, ga, gối lông vũ 100% cotton<br>\r\n\r\n2.TV LCD Sony 40 inch<br>\r\n\r\n3.Wifi và internet miễn phí<br>\r\n\r\n4.Bàn<br>\r\n\r\n5.Điều hòa hai chiều công suất lớn<br>\r\n\r\n6.Bàn trà với trà và cà phê miễn phí<br>\r\n\r\n8.Điện thoại quay số trực tiếp quốc tế<br>\r\n\r\n9.Bồn tắm có vòi hoa sen và hệ thống nước nóng lạnh', 2, 2, 1500000, 10, 'deluxe_single1.jpg', '', ''),
(2, 'Phòng Deluxe hai giường đôi', '50m<sup>2</sup>', 'Tầm nhìn ra thành phố<br>\r\n\r\nPhòng máy lạnh được trang bị truyền hình cáp màn hình phẳng với phòng tắm tiện nghi vòi sen, dịch vụ dọn phòng 24h.<br>\r\n\r\n<br>\r\n\r\nTiện nghi phòng: <br><br>\r\n\r\n1.Giường Kingsize với chăn, ga, gối lông vũ 100% cotton<br>\r\n\r\n2.TV LCD Sony 40 inch<br>\r\n\r\n3.Wifi và internet miễn phí<br>\r\n\r\n4.Bàn<br>\r\n\r\n5.Điều hòa hai chiều công suất lớn<br>\r\n\r\n6.Bàn trà với trà và cà phê miễn phí<br>\r\n\r\n8.Điện thoại quay số trực tiếp quốc tế<br>\r\n\r\n9.Bồn tắm có vòi hoa sen và hệ thống nước nóng lạnh', 4, 2, 1600000, 10, 'deluxe_double1.jpg', '', ''),
(3, 'Phòng Superior một giường đôi', '40m<sup>2</sup>', 'Tầm nhìn ra thành phố <br>\r\n\r\nPhòng máy lạnh được trang bị truyền hình cáp màn hình phẳng với phòng tắm tiện nghi vòi sen, dịch vụ dọn phòng 24h.<br>\r\n\r\n<br>\r\n\r\nTiện nghi phòng: <br><br>\r\n\r\n1.Giường Kingsize với chăn, ga, gối lông vũ 100% cotton<br>\r\n\r\n2.TV LCD Sony 40 inch<br>\r\n\r\n3.Wifi và internet miễn phí<br>\r\n\r\n4.Bàn<br>\r\n\r\n5.Điều hòa hai chiều công suất lớn<br>\r\n\r\n6.Bàn trà với trà và cà phê miễn phí<br>\r\n\r\n8.Điện thoại quay số trực tiếp quốc tế<br>\r\n\r\n9.Bồn tắm có vòi hoa sen và hệ thống nước nóng lạnh', 2, 1, 1200000, 15, '5f534552bc9069.54512310.jpg', '', ''),
(8, 'Phòng Standard một giường đơn', '30m<sup>2</sup>', 'Tầm nhìn ra thành phố<br>\r\n\r\nPhòng máy lạnh được trang bị truyền hình cáp màn hình phẳng với phòng tắm tiện nghi vòi sen, dịch vụ dọn phòng 24h.<br>\r\n\r\n<br>\r\n\r\nTiện nghi phòng: <br><br>\r\n\r\n1.Giường Kingsize với chăn, ga, gối lông vũ 100% cotton<br>\r\n\r\n2.TV LCD Sony 40 inch<br>\r\n\r\n3.Wifi và internet miễn phí<br>\r\n\r\n4.Bàn<br>\r\n\r\n5.Điều hòa hai chiều công suất lớn<br>\r\n\r\n6.Bàn trà với trà và cà phê miễn phí<br>\r\n\r\n8.Điện thoại quay số trực tiếp quốc tế<br>\r\n\r\n9.Bồn tắm có vòi hoa sen và hệ thống nước nóng lạnh', 1, 0, 650000, 10, '5f5597a5df3020.75784253.jpg', '', ''),
(9, 'Phòng Superior hai giường đôi', '40m<sup>2</sup>', 'Tầm nhìn ra thành phố<br>\r\n\r\nPhòng máy lạnh được trang bị truyền hình cáp màn hình phẳng với phòng tắm tiện nghi vòi sen, dịch vụ dọn phòng 24h.<br>\r\n\r\n<br>\r\n\r\nTiện nghi phòng: <br><br>\r\n\r\n1.Giường Kingsize với chăn, ga, gối lông vũ 100% cotton<br>\r\n\r\n2.TV LCD Sony 40 inch<br>\r\n\r\n3.Wifi và internet miễn phí<br>\r\n\r\n4.Bàn<br>\r\n\r\n5.Điều hòa hai chiều công suất lớn<br>\r\n\r\n6.Bàn trà với trà và cà phê miễn phí<br>\r\n\r\n8.Điện thoại quay số trực tiếp quốc tế<br>\r\n\r\n9.Bồn tắm có vòi hoa sen và hệ thống nước nóng lạnh', 4, 2, 1350000, 10, '5f5c8a3c32aa65.71348503.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `phieudatphong`
--

CREATE TABLE `phieudatphong` (
  `MAPHIEU` int(11) NOT NULL,
  `MAKH` int(11) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `NuAdults` tinyint(4) NOT NULL,
  `NuChildren` tinyint(4) NOT NULL,
  `Ngaylapphieu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieudatphong`
--

INSERT INTO `phieudatphong` (`MAPHIEU`, `MAKH`, `CheckIn`, `CheckOut`, `NuAdults`, `NuChildren`, `Ngaylapphieu`) VALUES
(38, 36, '2020-09-15', '2020-09-23', 3, 1, '2020-09-10 12:22:09'),
(39, 36, '2020-09-23', '2020-09-24', 1, 0, '2020-09-10 14:04:52'),
(41, 36, '2020-09-18', '2020-09-24', 1, 0, '2020-09-11 05:21:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouthotel`
--
ALTER TABLE `abouthotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietphieu`
--
ALTER TABLE `chitietphieu`
  ADD PRIMARY KEY (`MAPHIEU`,`MALP`),
  ADD KEY `fv_LP` (`MALP`);

--
-- Indexes for table `confirmorders`
--
ALTER TABLE `confirmorders`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MADV`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`MALP`);

--
-- Indexes for table `phieudatphong`
--
ALTER TABLE `phieudatphong`
  ADD PRIMARY KEY (`MAPHIEU`),
  ADD KEY `fk_kh` (`MAKH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `confirmorders`
--
ALTER TABLE `confirmorders`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MADV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `MALP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phieudatphong`
--
ALTER TABLE `phieudatphong`
  MODIFY `MAPHIEU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietphieu`
--
ALTER TABLE `chitietphieu`
  ADD CONSTRAINT `fv_LP` FOREIGN KEY (`MALP`) REFERENCES `loaiphong` (`MALP`),
  ADD CONSTRAINT `fv_PDP` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieudatphong` (`MAPHIEU`);

--
-- Constraints for table `phieudatphong`
--
ALTER TABLE `phieudatphong`
  ADD CONSTRAINT `fk_kh` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
