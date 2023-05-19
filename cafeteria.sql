-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2023 at 03:02 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `userId` bigint UNSIGNED DEFAULT NULL,
  `totalPrice` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `totalPrice`) VALUES
(8, 11, 8880);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `cartId` int DEFAULT NULL,
  `productId` bigint UNSIGNED DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cartId`, `productId`, `quantity`) VALUES
(33, 8, 8, 40),
(34, 8, 8, 40),
(35, 8, 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Hot Drinks'),
(2, 'Cold Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_date` date NOT NULL DEFAULT '2023-04-28',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `total_price`, `status`, `user_id`) VALUES
(1, '2023-04-28', '66.00', 'done', 4),
(2, '2023-04-28', '36.00', 'out for delivery', 5),
(3, '2023-04-28', '75.00', 'done', 4),
(4, '2023-04-28', '22.00', 'out for delivery', 9),
(5, '2023-04-28', '53.00', 'out for delivery', 5),
(6, '2023-04-28', '35.00', 'done', 2),
(8, '2023-04-28', '7.00', 'done', 9),
(9, '2023-04-28', '86.00', 'done', 6),
(10, '2023-04-28', '69.00', 'processing', 6),
(55, '2023-04-28', '6720.00', 'processing', 11),
(56, '2023-04-28', '48512.00', 'processing', 11),
(57, '2023-04-28', '8880.00', 'processing', 11),
(58, '2023-04-28', '11840.00', 'processing', 11);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_count` int NOT NULL DEFAULT '1',
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_count`, `order_id`, `product_id`) VALUES
(2, 20, 3, 8),
(27, 624, 1, 8),
(28, 624, 1, 8),
(29, 624, 1, 8),
(43, 40, 55, 8),
(44, 40, 55, 8),
(45, 40, 55, 8),
(46, 40, 55, 8),
(47, 40, 55, 8),
(48, 40, 55, 8),
(49, 40, 55, 8),
(50, 40, 55, 8),
(51, 40, 55, 8),
(52, 40, 55, 8),
(53, 40, 55, 8);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `category_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `quantity`, `category_id`) VALUES
(1, 'Nigel', '37.00', '1.jpeg', 10, 1),
(2, 'Zachery', '16.00', '1.jpeg', 10, 1),
(3, 'Yvette', '66.00', '1.jpeg', 10, 1),
(4, 'Lucius', '86.00', '1.jpeg', 10, 1),
(5, 'Shanon', '54.00', '1.jpeg', 10, 1),
(6, 'Moriah', '48.00', '1.jpeg', 10, 1),
(7, 'Maximus', '63.00', '1.jpeg', 10, 1),
(8, 'Tressa', '74.00', '1.jpeg', 10, 1),
(9, 'Albertha', '56.00', '1.jpeg', 10, 1),
(10, 'Gerhard', '50.00', '1.jpeg', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` int DEFAULT NULL,
  `ext` int DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `room_number`, `ext`, `role`, `password`, `secret`) VALUES
(1, 'Christiana Bauch Jr.', 'user@example.net', 'default.jpg', 6, 2, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(2, 'Herminia Dickinson', 'kirlin.andres@example.com', 'default.jpg', 2, 6, 'admin', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(3, 'Selmer Bartell', 'ashlee18@example.org', 'default.jpg', 6, 6, 'admin', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(4, 'Erick Grant', 'magali07@example.com', 'default.jpg', 3, 2, 'admin', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(5, 'Houston Spinka', 'helene.quitzon@example.net', 'default.jpg', 2, 5, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(6, 'Prof. Otho Stehr', 'torrey.morar@example.org', 'default.jpg', 3, 6, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(7, 'Dr. Carolyn Beer', 'maximillian56@example.com', 'default.jpg', 5, 1, 'admin', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(8, 'Nico Bayer', 'stiedemann.estrella@example.net', '1.jpg', 3, 1, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(9, 'Vladimir OConner', 'gcrona@example.com', '1.jpg', 6, 5, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(10, 'Mr. Amari Schneider IV', 'leannon.napoleon@example.com', '1.jpg', 4, 2, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL),
(11, 'Youssef', 'youssef@admin.com', 'default.jpg', 1, 15, 'customer', '$2y$10$YT67ZEaqK8rAnZHeflcmweNcvVRBm.iPmUDMvQ2u1sQJQuIZWB3ty', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartId` (`cartId`),
  ADD KEY `productId` (`productId`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
