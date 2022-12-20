-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 03:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `prod_id` int(4) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_image` varchar(200) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_quantity` int(10) NOT NULL,
  `user_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `image`, `created_at`) VALUES
(3, 'Clothing', 'This is the clothing section. New Text      ', 'dress.jpg', '2022-12-11 17:37:04'),
(4, 'Mobile Phones', 'This is for mobile phones', 'iphone.jpg', '2022-12-11 17:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `email` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `user_id` int(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `uname`, `fname`, `lname`, `address`, `token`, `price`, `user_id`, `status`, `created_at`) VALUES
(2, 'kritilama@gmai.com', 'kriti', 'Kriti', 'Lama', 'USA', 'tok_1MDrQ0EQVwxKPes2vT5Y0Lam', 120000, 8, 1, '2022-12-11 15:26:26'),
(4, 'krisha@gmail.com', 'krisha', 'Krisha', 'Lama', 'Canada', 'tok_1MDsAVEQVwxKPes2imbrhN5x', 100000, 9, 1, '2022-12-11 16:14:28'),
(6, 'krisha@gmail.com', 'krisha', 'Krisha', 'Lama', 'Canada', 'tok_1MDsTWEQVwxKPes2SkUcfkk4', 100000, 9, 1, '2022-12-11 16:34:07'),
(7, 'krisha@gmail.com', 'krisha', 'Krisha', 'Lama', 'Canada', 'tok_1MDsdPEQVwxKPes2uqe4svtN', 1000, 9, 1, '2022-12-11 16:44:20'),
(8, 'kritilama@gmai.com', 'kriti', 'Kriti', 'Lama', 'USA', 'tok_1ME4kzEQVwxKPes2tBcLcBKK', 1100, 8, 1, '2022-12-12 05:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `excerpt` text NOT NULL,
  `user_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `price`, `description`, `status`, `created_date`, `excerpt`, `user_id`, `category_id`) VALUES
(4, 'Fancy clothes', 'clothing.jpg', 500, 'This is the test for clothing.', 1, '2022-12-11 17:39:31', 'This is excerpt for clothing', 1, 3),
(7, 'HP Laptop', 'iphone.jpg', 2000, 'cdacadcadcvfcv', 1, '2022-12-14 19:11:26', 'asdcaefcaddscvdc', 1, 4),
(8, 'Fancy Dress', 'dress.jpg', 200, ' njbuyhuhjn', 1, '2022-12-14 19:15:40', 'nkjhiunjnmn ', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `user_id`) VALUES
(1, 'admin', 1),
(2, 'seller', 1),
(3, 'customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'completed'),
(2, 'pending'),
(3, 'refunded');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `phoneno`, `address`, `role_id`, `status`, `created_time`) VALUES
(1, 'Ritee Lama', 'riteelama', 'riteelama@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '9823370835', 'Canada', 2, 1, '2022-12-08 18:31:25'),
(2, 'Admin', 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1234567890', 'USA', 1, 1, '2022-12-08 18:52:42'),
(7, 'Aakriti K.C.', 'aakriti', 'aakriti@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '7891654313', 'USA', 3, 1, '2022-12-09 17:29:10'),
(8, 'Kriti Lama', 'kriti', 'kritilama@gmai.com', '1a1dc91c907325c69271ddf0c944bc72', '7891654313', 'USA', 3, 1, '2022-12-10 10:48:23'),
(9, 'Krisha Lama', 'krisha', 'krisha@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '6265653265544', 'USA', 3, 1, '2022-12-10 11:49:30'),
(11, 'Itisha Pandey', 'itisha', 'itisha@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '1234567890', 'Nepal', 2, 1, '2022-12-12 17:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`prod_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
