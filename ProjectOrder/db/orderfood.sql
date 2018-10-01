-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 03:15 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `of_admin`
--

CREATE TABLE `of_admin` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cate` tinyint(4) NOT NULL COMMENT '1: Admin, 2: Statistic, 3: Food&Cate, 4: Manager, 5: User',
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_admin`
--

INSERT INTO `of_admin` (`id`, `account`, `password`, `name`, `cate`, `active`) VALUES
(3, 'admin', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Trị Viên (Admin)', 1, 1),
(4, 'thongke', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Thống Kê Viên', 2, 1),
(5, 'catefood', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Lý Loại & Sản Phẩm', 3, 1),
(6, 'quanly', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Lý ', 4, 1),
(7, 'quanlyban', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Lý Bàn', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_bill`
--

CREATE TABLE `of_bill` (
  `id` int(11) NOT NULL,
  `code_order` varchar(500) NOT NULL,
  `order_id` int(11) NOT NULL,
  `num_table` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(11) NOT NULL COMMENT '0: chưa, 1: xong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_bill`
--

INSERT INTO `of_bill` (`id`, `code_order`, `order_id`, `num_table`, `total`, `date`, `active`) VALUES
(6, '2018091', 4, 2, 150000, '2018-09-25 11:06:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_category`
--

CREATE TABLE `of_category` (
  `id` int(11) NOT NULL,
  `vi_name` varchar(255) NOT NULL,
  `en_name` varchar(1000) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_category`
--

INSERT INTO `of_category` (`id`, `vi_name`, `en_name`, `img_url`, `order`, `active`) VALUES
(1, 'Đồ Ăn', 'Food', 'bar-beverage-cocktail-109275.jpg', 1, 1),
(2, 'Thức Uống', 'Drink', 'food-eating-potatoes-beer-8313.jpg', 2, 1),
(3, 'Các Món Khác', 'Others', 'pexels-photo-132694.jpeg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_food`
--

CREATE TABLE `of_food` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `vi_name` varchar(255) NOT NULL,
  `en_name` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `vi_desc` text NOT NULL,
  `en_desc` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_url2` varchar(255) NOT NULL,
  `img_url3` varchar(255) NOT NULL,
  `img_url4` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_food`
--

INSERT INTO `of_food` (`id`, `category_id`, `vi_name`, `en_name`, `price`, `discount`, `vi_desc`, `en_desc`, `img_url`, `img_url2`, `img_url3`, `img_url4`, `order`, `active`) VALUES
(1, 1, 'Ốc Sào Rang Me', 'Fried Escargot With Tamarind Sauce', 120000, 0, 'Ốc bưu kết hợp với trai me tạo nên món Ốc sào rang me siêu ngon và hấp dẫn.', 'This text is in English', ' ', '', '', '', 1, 2),
(2, 1, 'Cơm Chiên Dương Châu', 'Fried Rice ', 30000, 0, 'Cơm chiên màu vàng và có cà rốt nên được gọi là cơm chiên Dương Châu.', 'This text is in English', '', '', '', '', 2, 1),
(3, 1, 'Cơm Cá Lóc Canh Chua', 'Rice And Sour Fish Broth', 35000, 0, 'Cơm gồm cá lóc và canh chua nên được gọi là \"Cá lóc canh chua\".', '', '', '', '', '', 3, 1),
(4, 1, 'Ốc Móng Tay Xào Rau Muống', 'Solenidae With Fried Blinweed', 55000, 5, 'Ốc sạch và rau sạch tạo nên 1 món ăn sạch và đảm bảo sẽ ngon miệng.', '', '', '', '', '', 4, 1),
(5, 1, 'Nấm Mèo Rang Ớt', 'Fired Jelly Ear With Chilly', 45000, 0, 'Nấm mèo được pha trộn với ớt tạo nên 1 món ăn vừa ngon vừa cay. Phù hợp với lứa tuổi trung niên và người có thể ăn cay.', '', '', '', '', '', 5, 1),
(6, 1, 'Cải Xanh Xào Ớt Chuông', 'Fried Chinese Mustard With Bell Chilly', 22000, 0, 'Lá cải xanh đồng hành cùng những miếng lát ớt cắt nhỏ vô cùng hấp dẫn.', '', '', '', '', '', 6, 1),
(7, 1, 'Cơm Hải Sản', 'Fried Rice With Sea Foods', 32000, 0, 'Cơm hải sản thơm ngon đặc biệt.', '', '', '', '', '', 7, 1),
(8, 1, 'Lẩu Dê Nướng Vú Bò', 'Goat Meat Hotspot', 120000, 10, 'Thịt dê xé hòa quyện cùng mùi vị của bò tạo nên món lẩu LẠ, ĐỘC và NGON.', '', '', '', '', '', 8, 1),
(9, 1, 'Bánh Kem Táo', 'Apple Pie', 250000, 10, 'Kem và táo tạo nên một chiếc bánh vô cùng lạ miệng và háp dẫn. Chắc chắn sẽ thu hút bạn khi bạn nếm miếng bánh đầu tiên.', '', '', '', '', '', 9, 1),
(10, 1, 'Lẩu Thái', 'Tom Yum', 150000, 0, 'Quá quen thuộc với người Việt. Đó chính là lẩu Thái.', '', '', '', '', '', 10, 1),
(11, 2, 'Cocacola', 'Coke', 10000, 0, 'Nước giải khát Cocacola.', '', '', '', '', '', 1, 1),
(12, 2, 'Pepsi', 'Pepsi', 10000, 0, 'Nước giải khát Pepsi.', '', '', '', '', '', 2, 1),
(13, 2, '7up', '7up', 10000, 0, 'Nước giải khát 7up.', '', '', '', '', '', 3, 1),
(14, 2, 'Mirinda Cam', 'Orange Mirinda ', 10000, 0, 'Nước giải khát Mirinda.', '', '', '', '', '', 4, 1),
(15, 2, 'Mirinda', 'Mirinda', 10000, 0, 'Nước giải khát Midinra.', '', '', '', '', '', 5, 1),
(16, 2, 'Đá Me', 'Tamarind Juice', 0, 0, 'Nước giải khát chua ngọt.', '', '', '', '', '', 6, 1),
(17, 2, 'Trà Tắc', 'Cumquat Tea', 15000, 0, 'Nước giải khát Trà hòa quyện cùng Tắt.', '', '', '', '', '', 7, 1),
(18, 2, 'Sinh Tố Dâu', 'Strawberry Juice', 20000, 0, 'Nước giải khát.', '', '', '', '', '', 8, 1),
(19, 2, 'Sinh Tố Mãng Cầu', 'Soursop Juice', 22000, 0, 'Nước giải khát.', '', '', '', '', '', 9, 1),
(20, 2, 'Sinh Tố Cà Rốt', 'Carrot Juice', 18000, 0, 'Nước giải khát.', '', '', '', '', '', 10, 1),
(21, 3, 'Nho Mỹ Ướp Lạnh', 'Iced Grape', 30000, 0, 'Nho xanh rượm ngọt như mía lụi.', '', '', '', '', '', 1, 1),
(22, 3, 'Bánh Plan Ánh Hồng', '', 10000, 0, 'Bánh Plan gồm cà phê đen và được tô thêm màu Hồng..', '', '', '', '', '', 2, 1),
(23, 3, 'Bò Bía', 'Popiah', 30000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 3, 1),
(24, 3, 'Bánh Bèo', 'Beo Cake', 25000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 4, 1),
(25, 3, 'Bánh Khọt', 'Khot Cake', 35000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 5, 1),
(26, 3, 'Gỏi Cuốn', '', 30000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 6, 1),
(27, 3, 'Bánh Bột Lọc', '', 30000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 7, 1),
(28, 3, 'Cá Viên Chiên', '', 10000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 8, 1),
(29, 3, 'Bắp Rang Bơ', '', 15000, 0, 'Ăn chơi xã xì trét và thư giãn.', '', '', '', '', '', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_manage`
--

CREATE TABLE `of_manage` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cate` tinyint(4) NOT NULL COMMENT '1: Bếp, 2: Thanh toán',
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_manage`
--

INSERT INTO `of_manage` (`id`, `account`, `password`, `name`, `cate`, `active`) VALUES
(1, 'bep', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Lý Danh Sách Món Ăn', 1, 1),
(2, 'thanhtoan', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Quản Lý Thanh Toán', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_note_order`
--

CREATE TABLE `of_note_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_note_order`
--

INSERT INTO `of_note_order` (`id`, `order_id`, `note`, `active`) VALUES
(1, 4, '', 1),
(2, 4, '', 1),
(3, 4, '', 1),
(4, 4, '', 1),
(5, 5, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `of_order`
--

CREATE TABLE `of_order` (
  `id` int(11) NOT NULL,
  `num_table` int(11) NOT NULL,
  `active` int(11) NOT NULL COMMENT '0: đang chờ, 1: xong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_order`
--

INSERT INTO `of_order` (`id`, `num_table`, `active`) VALUES
(4, 2, 1),
(5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `of_order_detail`
--

CREATE TABLE `of_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(25) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL COMMENT '0: Bếp chưa xử lý, 1: Bếp đã xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_order_detail`
--

INSERT INTO `of_order_detail` (`id`, `order_id`, `food_id`, `price`, `qty`, `active`) VALUES
(1, 4, 1, 120000, 3, 1),
(2, 4, 2, 30000, 3, 1),
(3, 4, 3, 35000, 1, 1),
(7, 5, 11, 10000, 1, 0),
(8, 5, 12, 10000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `of_rate`
--

CREATE TABLE `of_rate` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `star` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_rate`
--

INSERT INTO `of_rate` (`id`, `desc`, `star`, `date`, `active`) VALUES
(4, '', 5, '2018-09-25 12:40:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_solve_pay`
--

CREATE TABLE `of_solve_pay` (
  `id` int(11) NOT NULL,
  `num_table` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_solve_pay`
--

INSERT INTO `of_solve_pay` (`id`, `num_table`, `active`) VALUES
(5, 2, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `of_user`
--

CREATE TABLE `of_user` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `of_user`
--

INSERT INTO `of_user` (`id`, `account`, `password`, `name`, `active`) VALUES
(1, 'ban1', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '1', 1),
(2, 'ban2', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `of_admin`
--
ALTER TABLE `of_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_bill`
--
ALTER TABLE `of_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_category`
--
ALTER TABLE `of_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_food`
--
ALTER TABLE `of_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_manage`
--
ALTER TABLE `of_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_note_order`
--
ALTER TABLE `of_note_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_order`
--
ALTER TABLE `of_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_order_detail`
--
ALTER TABLE `of_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_rate`
--
ALTER TABLE `of_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_solve_pay`
--
ALTER TABLE `of_solve_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_user`
--
ALTER TABLE `of_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `of_admin`
--
ALTER TABLE `of_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `of_bill`
--
ALTER TABLE `of_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `of_category`
--
ALTER TABLE `of_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `of_food`
--
ALTER TABLE `of_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `of_manage`
--
ALTER TABLE `of_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `of_note_order`
--
ALTER TABLE `of_note_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `of_order`
--
ALTER TABLE `of_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `of_order_detail`
--
ALTER TABLE `of_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `of_rate`
--
ALTER TABLE `of_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `of_solve_pay`
--
ALTER TABLE `of_solve_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `of_user`
--
ALTER TABLE `of_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
