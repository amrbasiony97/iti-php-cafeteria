-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2023 at 06:52 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Creola'),
(2, 'Chaz'),
(3, 'Gilda'),
(4, 'Savannah'),
(5, 'Prince'),
(6, 'Nyasia'),
(7, 'Nestor'),
(8, 'Ken'),
(9, 'Bette'),
(10, 'Laurianne');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--


--
-- Dumping data for table `migrations`
--



-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_date` date NOT NULL DEFAULT '2023-04-28',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
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
(7, '2023-04-28', '83.00', 'processing', 2),
(8, '2023-04-28', '7.00', 'done', 9),
(9, '2023-04-28', '86.00', 'done', 6),
(10, '2023-04-28', '69.00', 'processing', 6);

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
(1, 128, 3, 3),
(2, 151, 10, 8),
(3, 106, 2, 7),
(4, 177, 2, 2),
(5, 151, 3, 8),
(6, 108, 6, 10),
(7, 169, 2, 4),
(8, 196, 8, 10),
(9, 109, 3, 5),
(10, 125, 2, 8),
(11, 146, 3, 4),
(12, 150, 4, 4),
(13, 144, 1, 9),
(14, 175, 7, 7),
(15, 173, 5, 7),
(16, 131, 7, 8),
(17, 133, 2, 8),
(18, 197, 5, 9),
(19, 108, 1, 10),
(20, 104, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Nigel', '37.00', '1.jpg'),
(2, 'Zachery', '16.00', '1.jpg'),
(3, 'Yvette', '66.00', '1.jpg'),
(4, 'Lucius', '86.00', '1.jpg'),
(5, 'Shanon', '54.00', '1.jpg'),
(6, 'Moriah', '48.00', '1.jpg'),
(7, 'Maximus', '63.00', '1.jpg'),
(8, 'Tressa', '74.00', '1.jpg'),
(9, 'Albertha', '56.00', '1.jpg'),
(10, 'Gerhard', '50.00', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` int DEFAULT NULL,
  `ext` int DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `room_number`, `ext`, `role`, `password`) VALUES
(1, 'Christiana Bauch Jr.', 'cadams@example.net', '1.jpg', 6, 2, 'customer', '123456'),
(2, 'Herminia Dickinson', 'kirlin.andres@example.com', '1.jpg', 2, 6, 'admin', '123456'),
(3, 'Selmer Bartell', 'ashlee18@example.org', '1.jpg', 6, 6, 'admin', '123456'),
(4, 'Erick Grant', 'magali07@example.com', '1.jpg', 3, 2, 'admin', '123456'),
(5, 'Houston Spinka', 'helene.quitzon@example.net', '1.jpg', 2, 5, 'customer', '123456'),
(6, 'Prof. Otho Stehr', 'torrey.morar@example.org', '1.jpg', 3, 6, 'customer', '123456'),
(7, 'Dr. Carolyn Beer', 'maximillian56@example.com', '1.jpg', 5, 1, 'admin', '123456'),
(8, 'Nico Bayer', 'stiedemann.estrella@example.net', '1.jpg', 3, 1, 'customer', '123456'),
(9, 'Vladimir OConner', 'gcrona@example.com', '1.jpg', 6, 5, 'customer', '123456'),
(10, 'Mr. Amari Schneider IV', 'leannon.napoleon@example.com', '1.jpg', 4, 2, 'customer', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--


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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--


--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
