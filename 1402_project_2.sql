-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 08:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1402_project_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `author_name`, `created_at`, `updated_at`) VALUES
(1, 'aoso goyama', NULL, NULL),
(2, 'gege', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'kinh di', NULL, NULL),
(2, 'trinh tham', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_06_210152_create_publisher_table', 1),
(6, '2023_06_06_210230_create_author_table', 1),
(7, '2024_02_24_043347_create_category_table', 1),
(9, '2024_05_25_024526_create_orders_table', 1),
(10, '2024_05_25_043007_create_order_details_table', 1),
(11, '2024_03_02_024154_create_product_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `full_name`, `address`, `phone`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a', 'hanoi', '01239012', 32, 'RECEIVED', '2024-06-20 14:04:46', NULL),
(2, 'a', 'hanoi', '01239012', 3413, 'RECEIVED', '2024-06-20 14:08:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 32, 1, '2024-06-20 14:04:46', NULL),
(2, 2, 5, 3413, 1, '2024-06-20 14:08:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `isbn_code` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `publisher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `description`, `image`, `stock`, `isbn_code`, `category_id`, `publisher_id`, `author_id`) VALUES
(1, 'doremon', 999, '132312', '345440751_3088126504816082_4711185347096017822_n.jpg', 68, 'fasdfd123', 1, 1, 1),
(2, 'mon leo', 123, 'rat tuyet', '339743299_230858436261323_7829605278858466647_n.jpg', 0, 'abc123', 2, 2, 2),
(4, 'abca1231', 32, 'asdfas', '343615114_3452365885019894_672008157185419511_n.jpg', 1226, 'dfsa', 1, 1, 2),
(5, 'gsdsgsdf', 3413, 'fasdfs', '411058317_923056399174256_3313736224078398565_n.jpg', 3197, 'fasd', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `publisher_name`, `created_at`, `updated_at`) VALUES
(1, 'kim đồng', NULL, NULL),
(2, 'nxb trẻ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `address`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'giang', 'giang@gmail.com', NULL, '0903123912', 'hanoi', '$2y$12$kok9SyDaA9gFlu/VPeqEo.UPqnba8wmGVIVn4A9lSTWTC0CSqTjai', 1, NULL, NULL, NULL),
(2, 'a', 'a@gmail.com', NULL, '01239012', 'hanoi', '$2y$12$ZcuoZ7C3i8m8CCtwKZSboe1IaYubX/Ekls.rcqo4WUtG7XR3yNDHW', 0, NULL, NULL, NULL),
(3, 'b', 'b@gmail.com', NULL, '093210132', 'vietlam', '$2y$12$S8XKBfP1T/vMDAkrCJnnC.yPk0WsR.qXFxEi6L8hekzZ9rUtdsrmy', 0, NULL, NULL, NULL),
(4, 'a123', 'a123@gmail.com', NULL, '0912319129', NULL, '$2y$12$2dMppz7RnVEsAj8mHIl58Oe5N9FOJVV2HXGeyj0W8tVIK.sI0162W', 0, NULL, NULL, NULL),
(5, 'c', 'c@gmail.com', NULL, '0903131891', 'vietlam123', '$2y$12$l3IWE48MqgBQQ/qnN0t2pOZhazCfiLNxOjcwaBb6dFQlQeVYsw9GS', 1, NULL, NULL, NULL),
(6, 'd', 'd@gmail.com', NULL, '0904239449', 'ha noi', '$2y$12$nENUAbmyEmpDGMnDoVxCZ.A.h6ccaeKwd.OAdgbPvJ3u/7UTZnJ/C', 0, NULL, NULL, NULL),
(7, 'e', 'e@gmail.com', NULL, '0492349234', 'ha noi', '$2y$12$lqWwS7uINRahYP33er4Ub.P27U6i66QHNjSm7ATK5BC9v4I9cFfqq', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_publisher_id_foreign` (`publisher_id`),
  ADD KEY `product_author_id_foreign` (`author_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
