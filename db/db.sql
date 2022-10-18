-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'poomin', '1aab26d999c1fac2a0356afc3a89df60');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `promotion` varchar(1000) NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `img`, `name`, `details`, `type`, `price`, `promotion`, `stock`) VALUES
(40, '2021-10-20_Tyson_Pack-shot1024x1024_35_1024x1024.webp', 'ไก่ทอด KFC', 'กรอบนอก นุ่มใน ในราคาที่ย่อมเยาว์', 'ของทอด', 65, '-', 100),
(41, 'hy62-min_0_3.jpg', 'ซูชิรวม', 'มีหลายแบบให้เลือก', 'อาหารทานเล่น', 199, '5ชิ้นแถม2ชิ้น', 22),
(42, '0771623d4064f04a15b89a4a57b1b9a5.jpg', 'ต้มแซ่บปลาหมึก', '-', 'ต้มยำ', 89, '-', 10),
(51, '1371606069504.jpeg', 'แฮม', '-', 'เนื้อสัตว์', 290, 'ลดราคา20%', 5),
(52, 'menueditor_item_59831260fdea4ea881d611868f11731a_1629443993801852972.webp', 'ก๋วยเตี๋ยวเรือ', '-', 'กินเส้น', 50, '1 แถม 1', 50),
(53, '102216_MP.webp', 'พิซซ่า ชี่ซี่', '-', 'อาหารทานเล่น', 50, '1 แถม 1', 50),
(55, '102208_MP.webp', 'พิซซ่า ปูอัด', '-', 'อาหารทานเล่น', 210, '1 แถม 1', 10),
(56, '102212_MP.png', 'พิซซ่า เห็ดหอม', '-', 'อาหารทานเล่น', 200, '1 แถม 1', 5),
(57, 'Bread-Slices-Transparent-PNG.png', 'ขนมปัง', 'แป้งหนานุ่ม พร้อมสารอาหารมากมาย', 'เบเกอรี่', 39, '-', 10),
(59, 'f3bcaeec102a41c3825080028f7d9538.webp', 'ผัดไทย', 'อร่อย', 'อาหารจานเดียว', 45, 'ลด10%', 5);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idfood` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `sub_district` varchar(100) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `recore` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `address`, `district`, `sub_district`, `zip_code`, `phone`, `recore`) VALUES
(1, 'poo', 'poo@gmail.com', 'dfedee13821086cdde056e757592e2ac', '556/85', 'awdawd', 'gbgbb', 0, '554455', ''),
(2, 'name', 'nameza@gmail.com', '9b00db4ad24791d2ba2c2976b952457b', '', '', '', 0, '', ''),
(3, 'admin', 'admin@hotmail.com', 'b9d11b3be25f5a1a7dc8ca04cd310b28', '', '', '', 0, '', ''),
(4, 'kill', 'kill@gmail.com', 'b78259982bd10074b822b6246b781eff', '', '', '', 0, '', ''),
(5, 'guy2544', 'onebird867@gmail.com', 'a8fb247e5ed27e5b2b88b17806255862', '', '', '', 0, '', ''),
(6, 'tinnapat2544', 'onebird867@gmail.com', 'a60876cc75170329382808cf66718924', '', '', '', 0, '', ''),
(7, 'poominzaza', 'onebird867@gmail.com', 'c9a3f620cdc82f3ba8b37a43d138ab95', '', '', '', 0, '', ''),
(8, 'ืnameza', 'name@gmail.com', 'ca62958923ce3704599d6481ad545766', '', '', '', 0, '', ''),
(9, 'namezaza', 'namekub@gmail.com', 'b96df5c7754462a02f2552ea9b30c700', 'sdv', 'sdv', 'sd', 0, '0962429101', ''),
(10, 'muzaka', 'muzaka@gmail.com', '7db4f3924ed05ccde282b2042fe09bb3', '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
