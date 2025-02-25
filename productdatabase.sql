-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 06:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 7, '2025-02-20 19:16:14', '2025-02-20 19:16:14'),
(5, 1, '2025-02-20 19:17:38', '2025-02-20 19:17:38'),
(6, 6, '2025-02-20 19:18:58', '2025-02-20 19:18:58'),
(8, 16, '2025-02-22 12:37:29', '2025-02-22 12:37:29'),
(9, 3, '2025-02-22 18:24:45', '2025-02-22 18:24:45'),
(10, 4, '2025-02-22 18:28:11', '2025-02-22 18:28:11'),
(11, 18, '2025-02-23 01:24:23', '2025-02-23 01:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'unpaid',
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `cart_id`, `product_id`, `quantity`, `price`, `payment_status`, `added_at`) VALUES
(1, 4, 1, 4, 11999.96, 'paid', '2025-02-20 19:16:14'),
(2, 4, 2, 4, 9999.96, 'paid', '2025-02-20 19:16:18'),
(3, 4, 3, 5, 7499.95, 'unpaid', '2025-02-20 19:16:23'),
(13, 4, 4, 1, 5999.99, 'unpaid', '2025-02-21 09:06:23'),
(14, 4, 5, 1, 2999.99, 'unpaid', '2025-02-21 09:06:32'),
(15, 4, 6, 1, 1499.99, 'unpaid', '2025-02-21 09:06:33'),
(16, 4, 7, 1, 1999.99, 'unpaid', '2025-02-21 09:06:37'),
(17, 4, 8, 1, 2599.99, 'unpaid', '2025-02-21 09:06:39'),
(66, 6, 1, 2, 5999.98, 'paid', '2025-02-22 18:11:20'),
(68, 6, 5, 3, 8999.97, 'paid', '2025-02-22 18:11:27'),
(69, 6, 6, 3, 4499.97, 'paid', '2025-02-22 18:11:30'),
(72, 9, 6, 2, 2999.98, 'paid', '2025-02-22 18:24:45'),
(73, 8, 5, 3, 8999.97, 'unpaid', '2025-02-22 18:25:09'),
(76, 11, 1, 1, 2999.99, 'unpaid', '2025-02-23 01:24:23'),
(77, 11, 2, 3, 7499.97, 'paid', '2025-02-23 01:24:29'),
(81, 5, 8, 3, 7799.97, 'paid', '2025-02-25 16:27:50'),
(82, 5, 7, 4, 7999.96, 'paid', '2025-02-25 16:27:52'),
(83, 5, 6, 4, 5999.96, 'paid', '2025-02-25 16:27:55'),
(84, 5, 5, 3, 8999.97, 'paid', '2025-02-25 16:28:00'),
(85, 5, 4, 4, 23999.96, 'paid', '2025-02-25 16:28:03'),
(86, 5, 3, 4, 5999.96, 'paid', '2025-02-25 16:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `msg_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`msg_id`, `fullname`, `email`, `subject`, `message`) VALUES
(1, 'Roman Reigns', 'roman@gmail.com', 'bye world', 'i am here to say bye world my friends.'),
(2, 'Rohan Shakya', 'rohan@gmail.com', 'this is the title', 'this is the content of the message.'),
(4, 'Kamal Thakur', 'kamal@gmail.com', 'kamal problem', 'this is kamal problem.'),
(5, 'Prashanna Mhrjn', 'prashanna@example.com', 'prashanna problem', 'prashanna is the problem of the name.'),
(6, 'not loggedin', 'notloggedin@gmial.com', 'notlogged in problem', 'this is not loggedin problem.'),
(7, 'Rohan Shakya', 'rohan@gmail.com', 'this is the problem of rohan', 'this is called the rohan problem.'),
(8, 'meisuser', 'user@gmial.com', 'user error', 'this is user error.'),
(9, 'Ramu Lal', 'ramu@gmail.com', 'Ramu ko Problem', 'Ramu is the problem.'),
(10, 'Roman Reigns', 'roman@gmail.com', 'Roman Reigns Problem Section.', 'This is Roman reigns Problem section description. ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `email`, `password`, `cpassword`, `usertype`) VALUES
(1, 'Roman', 'roman@gmail.com', 'Roman111!!!', 'Roman111!!!', 'User'),
(2, 'Rohan', 'rohan@gmail.com', 'Rohan111!!!', 'Rohan111!!!', 'User'),
(3, 'Kamal', 'kamal.thakur@gmail.com', 'Qwe123@#$', 'Qwe123@#$', 'User'),
(4, 'Kerala', 'kerala@gmail.com', 'Kerala111!!!', 'Kerala111!!!', 'User'),
(6, 'Nikesh', 'nikesh@example.com', 'Nikesh111!!!', 'Nikesh111!!!', 'User'),
(7, 'Prashanna', 'prashanna@gmail.com', 'Prashanna111!!!', 'Prashanna111!!!', 'User'),
(16, 'Ramu', 'ramu@gmail.com', 'Ramu111!!!2', 'Ramu111!!!2', 'User'),
(17, 'Joseph', 'joseph@gmail.com', 'Joseph111!!!', 'Joseph111!!!', 'Admin'),
(18, 'John', 'john@gmail.com', 'John111!!!', 'John111!!!', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `brand`, `price`, `stock`, `description`, `image_path`) VALUES
(1, 'SB DUNK Low', 'Sneakers', 'Nike', 2999.99, 20, 'Comfortable Sneaker making Attractive.', 'http://localhost/E-commerce/images/image1-preview.png'),
(2, 'Sweatshirt', 'Hoodies', 'H&M', 2499.99, 100, 'Warm and Comfy.', 'http://localhost/E-commerce/images/image2-preview.png'),
(3, 'Printed T-Shirt', 'T-Shirts', 'Represent', 1499.99, 30, 'One of the finest quality T-Shirt.', 'http://localhost/E-commerce/images/image3-preview.png'),
(4, 'Jordan 1 Chichago', 'Sneakers', 'Nike', 5999.99, 50, 'Comfortable Sneaker with Greater Design', 'http://localhost/E-commerce/images/image4-preview.png'),
(5, 'Plain Black Hoodie', 'Hoodies', 'Represent', 2999.99, 30, 'This Sweatshirt is perfect for winter season.', 'http://localhost/E-commerce/images/image5.png'),
(6, 'Porsche T-Shirt', 'T-Shirts', 'Porsche', 1499.99, 20, 'Stylish and Thick Design T-shirt for Gentleness.', 'http://localhost/E-commerce/images/image7-preview.png'),
(7, 'Never Give Up T-Shirt', 'T-Shirts', 'LovePik', 1999.99, 25, 'Empower the Never Give Up Attitude.', 'http://localhost/E-commerce/images/image6-preview.png'),
(8, 'Bloodline T-Shirt', 'T-Shirts', 'WWE', 2599.99, 20, 'The OTC Roman Reigns', 'http://localhost/E-commerce/images/image6.avif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `carts_ibfk_1` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_items_ibfk_2` (`product_id`),
  ADD KEY `cart_items_ibfk_1` (`cart_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
