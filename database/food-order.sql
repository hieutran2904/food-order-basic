-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(15, 'Tran Trung Hieu', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(24, '123', 'test', '202cb962ac59075b964b07152d234b70'),
(25, 'hieutt', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(21, 'Phở', 'Food_Category_791.jpg', 'Yes', 'Yes'),
(22, 'Bún', 'Food_Category_636.jpg', 'Yes', 'Yes'),
(23, 'Bánh Mì', 'Food_Category_724.jpg', 'Yes', 'Yes'),
(24, 'Đồ Ăn Vặt', 'Food_Category_118.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(12, 'Phở Bò Nguyên Bản', 'Phở bò nạm nguyên bản', '30', 'Food-Name-8205.jpg', 21, 'Yes', 'Yes'),
(13, 'Phở Bò Tái', 'Phở bò thịt tái nguyên bản', '30', 'Food-Name-3346.jpg', 21, 'Yes', 'Yes'),
(14, 'Phở Gà', 'Phở gà truyền thống', '30', 'Food-Name-8016.jpg', 21, 'Yes', 'Yes'),
(15, 'Phở Dê Bát Đá', 'Phở dễ đặc biệt 300 độ C', '69', 'Food-Name-6350.jpg', 21, 'Yes', 'Yes'),
(16, 'Phở Bò Bát Đá', 'Phở bò bát đá đặc biệt: Tái, nạm, gầu, tủy, mọc, gân', '99', 'Food-Name-2719.jpg', 21, 'Yes', 'Yes'),
(17, 'Bún Riêu Cua', 'Bún riêu cua vị nguyên bản', '35', 'Food-Name-738.jpg', 22, 'Yes', 'Yes'),
(18, 'Bún Bò Huế', 'Bún bò Huế chuẩn vị nguyên bản', '55', 'Food-Name-6761.jpg', 22, 'Yes', 'Yes'),
(19, 'Bún Đậu Mắm Tôm', 'Bún đậu mắm tôm thập cẩm chuẩn vị nguyên bản', '35', 'Food-Name-6209.jpg', 22, 'Yes', 'Yes'),
(20, 'Bún Cá', 'Bún cá Hà Nội hương thơm đặc biệt', '30', 'Food-Name-8903.jpg', 22, 'Yes', 'Yes'),
(21, 'Bánh Mì Trứng Pate', 'Bánh mì gồm trứng và pate', '20', 'Food-Name-3532.jpg', 23, 'Yes', 'Yes'),
(22, 'Bánh Mì Trứng', 'Bánh mì trứng vị nguyên bản', '12', 'Food-Name-866.jpg', 23, 'Yes', 'Yes'),
(23, 'Bánh Mì Trứng Xúc Xích', 'Bánh mì gồm trứng và xúc xích', '18', 'Food-Name-2464.jpg', 23, 'Yes', 'Yes'),
(24, 'Bánh Tráng Trộn', 'Bánh tráng trộn vị nguyên bản', '20', 'Food-Name-6919.jpg', 24, 'Yes', 'Yes'),
(25, 'Bánh Tráng Nướng', 'Bánh tráng nướng Nha Trang', '20', 'Food-Name-3959.jpg', 24, 'Yes', 'Yes'),
(26, 'Bánh Phở Cuốn', 'Bánh phở cuốn thịt bò', '55', 'Food-Name-6502.jpg', 24, 'Yes', 'Yes'),
(27, 'Nem Nướng Nha Trang', 'Nem nướng nha trang Tâm Việt', '38', 'Food-Name-103.jpg', 24, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Phở Bò Nguyên Bản', '30', 1, '30', '2023-03-20 04:14:29', 'Ordered', 'Tran Trung Hieu', '0394531526', 'hieu29dhxd@gmail.com', '16/18 Minh Khai'),
(2, 'Phở Bò Tái', '30', 2, '60', '2023-03-20 04:18:37', 'Cancelled', 'Tran Trung Hieu', '0394531526', 'hieu29dhxd@gmail.com', '16/18 Minh Khai'),
(3, 'Bún Riêu Cua', '35', 4, '140', '2023-03-20 04:20:41', 'Delivered', 'Tran Trung Hieu', '0394531526', 'hieu29dhxd@gmail.com', 'test'),
(4, 'Phở Bò Bát Đá', '99', 3, '297', '2023-03-20 04:22:22', 'On Delivery', 'Tran Trung Hieu', '0394531526', 'hieu29dhxd@gmail.com', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
