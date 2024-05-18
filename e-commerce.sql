-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '11:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(520) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `firstname`, `lastname`, `email`, `message`, `created_at`) VALUES
(1, 'Hriday', 'Kumar', 'hridaykumar186@gmail.com', 'Hloo this side Hriday kumar', '04-03-2024 10:09:21 AM');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `user_id` varchar(555) NOT NULL,
  `upiid` mediumtext NOT NULL,
  `creayted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `user_id`, `upiid`, `creayted_at`) VALUES
(1, '1', '1234567894@paytm', '2024-03-12 11:40:57'),
(2, '1', '1234567894@paytm', '2024-03-12 11:42:25'),
(3, '1', '1234567894@paytm', '2024-03-12 11:44:16'),
(4, '1', '1234567894@paytm', '2024-03-12 11:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `image` varchar(555) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `product_id`, `image`, `created_at`) VALUES
(1, '1', '6.png', '2024-03-05'),
(2, '2', '3.png', ''),
(3, '3', 'image2.jpg', '05-03-2024 06:23:41 PM'),
(5, '4', '', '06-03-2024 09:34:53 AM'),
(7, '6', 'product-1.png', '07-03-2024 10:18:56 AM'),
(8, '7', 'product-2.png', '07-03-2024 11:01:23 AM'),
(10, '9', 'image-4.png', '07-03-2024 11:05:07 AM');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` varchar(525) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `address_id` varchar(200) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `payment_method` varchar(250) NOT NULL,
  `order_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `product_id`, `address_id`, `status`, `payment_method`, `order_at`) VALUES
(1, '1', '3d2f8900f2e49c02b481c2f717aa9020', '2', 'pending', 'COD', '20-03-2024 03:21:09 PM'),
(2, '1', '7', '2', 'pending', 'COD', '20-03-2024 03:23:12 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `image` varchar(800) DEFAULT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `amount`, `image`, `created_at`) VALUES
(3, 'Chair', ' Click to open expanded view   VIDEO      HOME PERFECT Executive Ergonomic Home Office Desk Chair with Height Adjustable Seat, Push Back Tilt Feature, Adjustable Armrests & Headrest, Heavy Duty Metal Base (Black and Silver', '5499', NULL, '05-03-2024 06:23:41 PM'),
(6, 'Nordic - Chair', 'This Nordic design chair is designed to keep your kids alert. It comes with a cushioned seat and a slightly tilted back re-enforcing ribbing in for strength. Also features sturdy wooden legs for durability and protection on carpeted floors. Ideal for kids who are still growing, are fidgety and cannot sit still. Available in various colours to match the décor of your kid’s room. This chair is also good for adult seating. Easy to stack still chair. Cushioned seat. Perfect back support. Very sturdy and durable. Made from PVC and Wood. Meets European safety standards for children. No toxic materials used in manufacturing. Seating Height – 46 cms. Dimensions :42(W) x 42(D) x 84(H)cms.', '5750.00', NULL, '07-03-2024 10:18:56 AM'),
(7, 'KRUZO Aero Classic Crystal Ghost Chair Wooden Legs Chair', 'Product details of KRUZO Aero Classic Crystal Ghost Chair Wooden Legs Chair A Classic Piece of Lightweight mid-century furniture. crafted from the best quality material. The Classic Side Chair is made of molded plastic in white color, with Wood Dowel Base, and its shape is reminiscent of mid-century design. The molded plastic seats are produced of ecologically friendly, recyclable polypropylene. Rubber mount flex washers. Chrome plated steel Eiffel frame. Some assembly required. Comes complete parts Full Height 32.3/8” Height Until seat 18 1/8 Seat debt 16 ½” Back rest height 16 ¼” Width 18 ½”', '11698.00', NULL, '07-03-2024 11:01:23 AM'),
(9, 'Vergo Transform Ergonomic High Back Mesh Office Chair | Headrest, Lumbar Support, Adjustable 2D PU Armrests, Multi Lock Synchro Mechanism, Metal Base | Home Office Desk Chair (Teal White)', 'About this item ✅ Invest in Comfort - Say goodbye to discomfort and hello to productivity with our Transform Ergonomic Chair. Designed with your comfort and health in mind, our ergonomic chair is the perfect solution for those who spend long hours sitting at a desk. ✅ Ergonomic Design - Experience the Comfort of Ergonomics with our S-Shaped backrest chair designed for your health. It helps to improve posture, protects your cervical spine and relieve back pain & waist pressure. The advance features of the chair provide support for your body, helping to reduce discomfort and prevent long-term damage and allowing you to focus on your work and be more productive. ✅ Stay Cool & Focused - Are you tired of sitting in a chair that leaves you feeling hot and bothered? Look no further then our chair, the premium breathable mesh allows air to circulate freely, preventing you from overheating and leaving you feeling fresh and energized. The high density moulded foam seat will provide an optimal su', '8,990', NULL, '07-03-2024 11:05:07 AM');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscriber_id` int(11) NOT NULL,
  `name` varchar(550) NOT NULL,
  `email` varchar(555) NOT NULL,
  `send_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscriber_id`, `name`, `email`, `send_time`) VALUES
(1, 'Hriday Kumar', 'hridaykumar186@gmail.com', '04-03-2024 11:51:26 AM'),
(2, '', '', '11-03-2024 03:56:39 PM'),
(3, 'abc def', 'test@test.com', '14-03-2024 10:36:37 AM'),
(4, 'Ajay singh', 'ajaysingh45@gmail.com', '19-03-2024 02:55:57 PM'),
(5, 'Hriday Kumar', 'hridaykumar818@gmail.com', '19-03-2024 05:27:32 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `password` varchar(250) NOT NULL,
  `created_at` varchar(250) NOT NULL,
  `token` varchar(753) DEFAULT NULL,
  `exp_date` varchar(369) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`, `birthday`, `gender`, `status`, `password`, `created_at`, `token`, `exp_date`) VALUES
(1, 'Hriday', 'Kumar', 'HRIDAY_2722S', 'hridaykumar186@gmail.com', '9865327410', '15/11/2003', 'Male', 1, 'e10adc3949ba59abbe56e057f20f883e', '29-02-2024 03:43:53 PM', '', ''),
(5, 'Ajay', 'singh', 'Ajay', 'ajaysingh45@gmail.com', '8235708100', '15/11/2003', 'Male', 0, 'e10adc3949ba59abbe56e057f20f883e', '04-03-2024 11:02:58 AM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `firstname` varchar(11) NOT NULL,
  `lastname` varchar(11) NOT NULL,
  `country` varchar(110) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `sub_division` varchar(357) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `address_lan_1` varchar(951) NOT NULL,
  `address_lan_2` varchar(753) DEFAULT NULL,
  `email` varchar(555) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `note` varchar(1500) DEFAULT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `firstname`, `lastname`, `country`, `state`, `district`, `sub_division`, `postal_code`, `address_lan_1`, `address_lan_2`, `email`, `phone`, `note`, `created_at`) VALUES
(2, '1', 'Hriday', 'Kumar', 'Bharat(India)', 'Punjab', 'Mohali', 'SAS-Nagar', '160071', 'chandigarh , Punjab', '', 'hridaykumar186@gmail.com', '9865327410', 'id=2', '07-03-2024 06:14:14 PM'),
(3, '1', 'Hriday', 'Kumar', 'Bharat(India)', 'Punjab', 'Mohali', 'SAS-Nagar', '160071', 'chandigarh , Punjab', '', 'hridaykumar186@gmail.com', '9865327410', 'id=3', '07-03-2024 06:15:00 PM'),
(4, '1', 'Hriday', 'Kumar', 'Bharat(India)', 'Punjab', 'Mohali', 'SAS-Nagar', '160071', 'chandigarh , Punjab', 'SAS-Nagar', 'hridaykumar186@gmail.com', '9865327410', 'id=4', '07-03-2024 06:19:38 PM'),
(6, '5', 'Ajay', 'singh', 'Bharat(India)', 'Punjab', 'abc', 'abc', '160071', 'chandigarh , Punjab', 'SAS-Nagar', 'ajaysingh45@gmail.com', '8235708100', 'HLO', '11-03-2024 10:30:24 AM'),
(7, '5', 'ABC', 'ABC', 'Bharat(India)', 'Punjab', 'Mohali', 'abc', '160071', 'chandigarh , Punjab', 'SAS-Nagar', 'hridaykumar186@gmail.com', '9865327410', 'id = 7', '12-03-2024 01:01:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `quantity` varchar(120) NOT NULL DEFAULT '1',
  `total_amount` varchar(250) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `created_at`) VALUES
(62, '1', '7', '5', '58490', '19-03-2024 05:16:56 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_details`
--

CREATE TABLE `user_payment_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `card_number` varchar(250) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(263) DEFAULT NULL,
  `cvv` varchar(250) DEFAULT NULL,
  `upi_id` varchar(440) DEFAULT NULL,
  `saved_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment_details`
--

INSERT INTO `user_payment_details` (`id`, `user_id`, `card_number`, `month`, `year`, `cvv`, `upi_id`, `saved_at`) VALUES
(1, '', '159874563215', '0', '1256', '1234', NULL, ''),
(2, '', '159874563215', '0', '1256', '1234', NULL, ''),
(3, '', '159874563215', '2', '1256', '1234', NULL, ''),
(4, '', '159874563210', '1', '1256', '124', NULL, ''),
(5, '1', NULL, NULL, NULL, NULL, '1234567894@paytm', '20-03-2024 03:10:07 PM'),
(6, '', '123456789654', '8', '1231', '1234', NULL, ''),
(7, '1', '123456789654', '8', '1231', '1234', NULL, '20-03-2024 03:10:42 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment_details`
--
ALTER TABLE `user_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_payment_details`
--
ALTER TABLE `user_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
