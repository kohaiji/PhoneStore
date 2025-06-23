-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 06:46 PM
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
-- Database: `project_phone_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo_url`) VALUES
(1, 'Apple', 'Apple_logo_black.svg'),
(2, 'Samsung', 'Samsung_Logo.svg.png'),
(12, 'Xiaomi', 'xiaomi.png'),
(13, 'Oppo', 'oppo.png'),
(14, 'Vivo', 'vivo.png'),
(15, 'Realme', 'realme.png'),
(16, 'OnePlus', 'oneplus.png'),
(17, 'Nokia', 'nokia.png'),
(18, 'Huawei', 'huawei.png'),
(19, 'Motorola', 'motorola.png'),
(20, 'Sony', 'sony.png'),
(21, 'Google', 'google_logo.png'),
(22, 'Nothing', 'nothing_logo.png'),
(23, 'Tecno', 'tecno_logo.png'),
(24, 'Infinix', 'infinix_logo.png'),
(25, 'Honor', 'honor_logo.png'),
(26, 'Poco', 'poco_logo.png'),
(27, 'iQOO', 'iqoo_logo.png'),
(28, 'ROG', 'rog_logo.png'),
(29, 'Black Shark', 'blackshark_logo.png'),
(30, 'Fairphone', 'fairphone_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `status` enum('Paid','Pending','Confirmed','Shipping','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `payment_method` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `address`, `phone`, `total`, `status`, `payment_method`, `order_date`) VALUES
(1, 2, 'giang', 'hbtewwqeeqw', '0123012313', 79950000, 'Shipping', 'cod', '2025-05-07 22:09:51'),
(2, 2, 'giang', 'hbtewwqeeqw', '0123012313', 81930000, 'Confirmed', 'cod', '2025-03-08 21:26:34'),
(3, 2, 'giang123', 'hbtewwqeeqw', '0987654321', 414458738, 'Pending', 'cod', '2025-02-09 21:47:45'),
(4, 2, 'giang', 'hanoi', '0123012313', 52960000, 'Completed', 'cod', '2025-04-10 13:55:48'),
(5, 2, 'giang', 'hanoi', '0123012313', 18990000, 'Completed', 'cod', '2025-06-10 22:38:30'),
(6, 2, 'giang', 'hanoi', '0123012313', 23980000, 'Completed', 'cod', '2025-06-10 22:39:14'),
(9, 2, 'giang', 'hanoi123456', '0123012313', 18990000, 'Cancelled', 'cod', '2025-06-16 20:41:54'),
(71, 2, 'giang', 'hanoi2', '0123012313', 18990000, 'Pending', 'cod', '2025-06-17 19:53:29'),
(76, 2, 'giang', 'hanoi1', '0123012313', 177860000, 'Cancelled', 'payos', '2025-06-18 03:26:39'),
(77, 2, 'giang', 'hanoi1', '0123012313', 177860000, 'Cancelled', 'cod', '2025-06-18 03:27:07'),
(80, 2, 'giang', 'hanoi1', '0123012313', 15990000, 'Pending', 'cod', '2025-06-18 21:04:44'),
(81, 2, 'giang', 'hanoi1', '0123012313', 18990000, 'Paid', 'payos', '2025-06-18 21:05:05'),
(88, 2, 'lam', 'Lao Cai', '0123012313', 25982000, 'Pending', 'cod', '2025-06-20 14:17:51'),
(89, 1, 'a', 'hanoi', '0943294293', 47970000, 'Pending', 'cod', '2025-06-20 14:30:34'),
(90, 1, 'a', 'hanoi', '0943294293', 31980000, 'Pending', 'cod', '2025-06-20 14:30:55'),
(93, 20, 'Bằng Cổ Tay', 'Mua hộ tùng béo', '0123456789', 11990000, 'Pending', 'cod', '2025-06-22 00:17:09'),
(96, 1, 'a', 'hanoi', '0943294293', 13990000, 'Pending', 'payos', '2025-06-23 14:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variants_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(20,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_variants_id`, `order_id`, `price`, `quantity`, `order_date`) VALUES
(1, 1, 1, 15990000, 5, '2025-06-07 22:09:51'),
(2, 3, 2, 11990000, 2, '2025-06-08 21:26:34'),
(3, 4, 2, 13990000, 1, '2025-06-08 21:26:34'),
(4, 6, 2, 11990000, 2, '2025-06-08 21:26:34'),
(5, 5, 2, 9990000, 2, '2025-06-08 21:26:34'),
(6, 2, 3, 18990000, 8, '2025-06-09 21:47:45'),
(7, 41, 3, 14113123, 6, '2025-06-09 21:47:45'),
(8, 1, 3, 15990000, 5, '2025-06-09 21:47:45'),
(9, 5, 3, 9990000, 5, '2025-06-09 21:47:45'),
(10, 6, 3, 11990000, 4, '2025-06-09 21:47:45'),
(11, 3, 4, 11990000, 1, '2025-06-10 13:55:48'),
(12, 2, 4, 18990000, 1, '2025-06-10 13:55:48'),
(13, 6, 4, 11990000, 1, '2025-06-10 13:55:48'),
(14, 5, 4, 9990000, 1, '2025-06-10 13:55:48'),
(15, 2, 5, 18990000, 1, '2025-06-10 22:38:30'),
(16, 3, 6, 11990000, 2, '2025-06-10 22:39:14'),
(19, 2, 9, 18990000, 1, '2025-06-16 20:41:54'),
(144, 2, 71, 18990000, 1, '2025-06-17 19:53:29'),
(149, 2, 76, 18990000, 2, '2025-06-18 03:26:39'),
(150, 4, 76, 13990000, 4, '2025-06-18 03:26:39'),
(151, 7, 76, 8990000, 4, '2025-06-18 03:26:39'),
(152, 12, 76, 11990000, 4, '2025-06-18 03:26:39'),
(153, 2, 77, 18990000, 2, '2025-06-18 03:27:07'),
(154, 4, 77, 13990000, 4, '2025-06-18 03:27:07'),
(155, 7, 77, 8990000, 4, '2025-06-18 03:27:07'),
(156, 12, 77, 11990000, 4, '2025-06-18 03:27:07'),
(159, 1, 80, 15990000, 1, '2025-06-18 21:04:44'),
(160, 2, 81, 18990000, 1, '2025-06-18 21:05:05'),
(167, 41, 88, 13992000, 1, '2025-06-20 14:17:51'),
(168, 6, 88, 11990000, 1, '2025-06-20 14:17:51'),
(169, 1, 89, 15990000, 3, '2025-06-20 14:30:34'),
(170, 1, 90, 15990000, 2, '2025-06-20 14:30:55'),
(173, 6, 93, 11990000, 1, '2025-06-22 00:17:09'),
(176, 4, 96, 13990000, 1, '2025-06-23 14:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(20,0) NOT NULL,
  `screen_size` decimal(3,1) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `battery_cap` int(11) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `chipset` varchar(255) DEFAULT NULL,
  `sim` varchar(255) DEFAULT NULL,
  `camera` text DEFAULT NULL,
  `refresh_rate` varchar(50) DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_name`, `description`, `price`, `screen_size`, `resolution`, `ram`, `battery_cap`, `os`, `chipset`, `sim`, `camera`, `refresh_rate`, `release_date`) VALUES
(1, 1, 'iPhone 16 Pro Max', 'Flagship iPhone with advanced camera system', 13990000, 6.7, '2796x1290', '8GB', 4422, 'iOS 18', 'A18 Pro', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide, 12MP telephoto', '120Hz', '2024-09-20'),
(2, 1, 'iPhone 16 Pro', 'Premium iPhone with pro features', 11990000, 6.1, '2556x1179', '8GB', 3274, 'iOS 18', 'A18 Pro', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide, 12MP telephoto', '120Hz', '2024-09-20'),
(3, 1, 'iPhone 16 Plus', 'Large display iPhone', 9990000, 6.7, '2778x1284', '6GB', 4323, 'iOS 18', 'A17', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide', '60Hz', '2024-09-20'),
(4, 1, 'iPhone 16', 'Standard iPhone model', 8990000, 6.1, '2532x1170', '6GB', 3349, 'iOS 18', 'A17', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide', '60Hz', '2024-09-20'),
(5, 1, 'iPhone 15 Pro Max', 'Previous flagship model', 10990000, 6.7, '2796x1290', '8GB', 4422, 'iOS 17', 'A17 Pro', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide, 12MP telephoto', '120Hz', '2023-09-22'),
(6, 1, 'iPhone 15 Pro', 'Previous pro model', 9990000, 6.1, '2556x1179', '8GB', 3274, 'iOS 17', 'A17 Pro', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide, 12MP telephoto', '120Hz', '2023-09-22'),
(7, 1, 'iPhone 15 Plus', 'Previous large display model', 8990000, 6.7, '2778x1284', '6GB', 4323, 'iOS 17', 'A16', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide', '60Hz', '2023-09-22'),
(8, 1, 'iPhone 15', 'Previous standard model', 7990000, 6.1, '2532x1170', '6GB', 3349, 'iOS 17', 'A16', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide', '60Hz', '2023-09-22'),
(9, 1, 'iPhone SE (4th gen)', 'Compact budget iPhone', 5990000, 6.1, '2532x1170', '4GB', 3279, 'iOS 17', 'A16', 'Single SIM (nano-SIM)', '48MP main', '60Hz', '2025-03-01'),
(10, 1, 'iPhone 14 Pro Max', 'Older flagship model', 8990000, 6.7, '2796x1290', '6GB', 4323, 'iOS 16', 'A16', 'Dual SIM (nano-SIM and eSIM)', '48MP main, 12MP ultra-wide, 12MP telephoto', '120Hz', '2022-09-16'),
(11, 2, 'Galaxy S24 Ultra', 'Flagship Samsung with S Pen', 24990000, 6.8, '3120x1440', '12GB', 5000, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM (nano-SIM and eSIM)', '200MP main, 12MP ultra-wide, 50MP telephoto x2', '120Hz', '2024-01-31'),
(12, 2, 'Galaxy S24+', 'Large premium Samsung', 19990000, 6.7, '3120x1440', '12GB', 4900, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM (nano-SIM and eSIM)', '50MP main, 12MP ultra-wide, 10MP telephoto', '120Hz', '2024-01-31'),
(13, 2, 'Galaxy S24', 'Standard flagship Samsung', 14990000, 6.2, '2340x1080', '8GB', 4000, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM (nano-SIM and eSIM)', '50MP main, 12MP ultra-wide, 10MP telephoto', '120Hz', '2024-01-31'),
(14, 2, 'Galaxy Z Fold 6', 'Foldable premium phone', 34990000, 7.6, '2176x1812', '12GB', 4400, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM (nano-SIM and eSIM)', '50MP main, 12MP ultra-wide, 10MP telephoto', '120Hz', '2024-07-10'),
(15, 2, 'Galaxy Z Flip 6', 'Compact foldable phone', 17990000, 6.7, '2640x1080', '8GB', 3700, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM (nano-SIM and eSIM)', '50MP main, 12MP ultra-wide', '120Hz', '2024-07-10'),
(16, 2, 'Galaxy A55', 'Premium mid-range phone', 9990000, 6.6, '2340x1080', '8GB', 5000, 'Android 14', 'Exynos 1480', 'Dual SIM (nano-SIM)', '50MP main, 12MP ultra-wide, 5MP macro', '120Hz', '2024-03-11'),
(17, 2, 'Galaxy A35', 'Mid-range phone', 7990000, 6.6, '2340x1080', '6GB', 5000, 'Android 14', 'Exynos 1380', 'Dual SIM (nano-SIM)', '50MP main, 8MP ultra-wide, 5MP macro', '120Hz', '2024-03-11'),
(18, 2, 'Galaxy A15', 'Budget phone', 4990000, 6.5, '2400x1080', '4GB', 5000, 'Android 14', 'Helio G99', 'Dual SIM (nano-SIM)', '50MP main, 5MP ultra-wide, 2MP macro', '90Hz', '2023-12-16'),
(19, 2, 'Galaxy M54', 'Large battery phone', 8990000, 6.7, '2400x1080', '8GB', 6000, 'Android 14', 'Exynos 1380', 'Dual SIM (nano-SIM)', '108MP main, 8MP ultra-wide, 2MP macro', '120Hz', '2023-04-03'),
(20, 2, 'Galaxy S23 FE', 'Fan edition flagship', 12990000, 6.7, '2340x1080', '8GB', 4500, 'Android 14', 'Exynos 2200', 'Dual SIM (nano-SIM and eSIM)', '50MP main, 12MP ultra-wide, 8MP telephoto', '120Hz', '2023-10-26'),
(21, 1, 'testt123', 'fasdf', 5000, 5.2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 21, 'Pixel 8 Pro', 'Flagship Google phone with advanced AI camera', 21990000, 6.7, '3120x1440', '12GB', 5050, 'Android 14', 'Google Tensor G3', 'Dual SIM', '50MP main + 48MP telephoto + 48MP ultra-wide', '120Hz', '2023-10-12'),
(24, 21, 'Pixel 8', 'Compact Google flagship', 15990000, 6.2, '2400x1080', '8GB', 4575, 'Android 14', 'Google Tensor G3', 'Dual SIM', '50MP main + 12MP ultra-wide', '120Hz', '2023-10-12'),
(25, 22, 'Nothing Phone (2)', 'Transparent design with Glyph Interface', 14990000, 6.7, '2412x1080', '12GB', 4700, 'Android 13', 'Snapdragon 8+ Gen 1', 'Dual SIM', '50MP main + 50MP ultra-wide', '120Hz', '2023-07-17'),
(26, 22, 'Nothing Phone (1)', 'Iconic transparent design', 9990000, 6.6, '2400x1080', '8GB', 4500, 'Android 12', 'Snapdragon 778G+', 'Dual SIM', '50MP main + 50MP ultra-wide', '120Hz', '2022-07-21'),
(27, 23, 'Tecno Camon 20 Pro', 'Camera-focused mid-ranger', 6990000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Helio G99', 'Dual SIM', '108MP main + 2MP depth + 2MP macro', '120Hz', '2023-05-22'),
(28, 23, 'Tecno Phantom X2 Pro', 'First retractable portrait camera', 12990000, 6.8, '2400x1080', '12GB', 5160, 'Android 12', 'Dimensity 9000', 'Dual SIM', '50MP main + 50MP retractable portrait + 13MP ultra-wide', '120Hz', '2022-12-07'),
(29, 24, 'Infinix Zero 30 5G', 'Premium design with curved display', 8990000, 6.8, '2400x1080', '12GB', 5000, 'Android 13', 'Dimensity 8020', 'Dual SIM', '108MP main + 13MP ultra-wide + 2MP depth', '144Hz', '2023-08-31'),
(30, 24, 'Infinix Note 30 VIP', 'Fast charging champion', 7490000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Helio G99', 'Dual SIM', '108MP main + 2MP depth + 2MP macro', '120Hz', '2023-06-14'),
(31, 25, 'Honor Magic 5 Pro', 'Triple flagship cameras', 21990000, 6.8, '2848x1312', '12GB', 5100, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 50MP ultra-wide + 50MP periscope', '120Hz', '2023-02-27'),
(32, 25, 'Honor X9a', 'Ultra-durable design', 5990000, 6.7, '2400x1080', '8GB', 5100, 'Android 12', 'Snapdragon 695', 'Dual SIM', '64MP main + 5MP ultra-wide + 2MP macro', '120Hz', '2022-12-28'),
(33, 26, 'Poco F5 Pro', 'Performance beast', 10990000, 6.7, '3200x1440', '12GB', 5160, 'Android 13', 'Snapdragon 8+ Gen 1', 'Dual SIM', '64MP main + 8MP ultra-wide + 2MP macro', '120Hz', '2023-05-09'),
(34, 26, 'Poco X5 Pro', 'Balanced mid-ranger', 7990000, 6.7, '2400x1080', '8GB', 5000, 'Android 12', 'Snapdragon 778G', 'Dual SIM', '108MP main + 8MP ultra-wide + 2MP macro', '120Hz', '2023-02-06'),
(35, 27, 'iQOO 11 5G', 'Gaming performance', 16990000, 6.8, '3200x1440', '16GB', 5000, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 13MP portrait + 8MP ultra-wide', '144Hz', '2022-12-08'),
(36, 27, 'iQOO Z7 Pro', 'Slim gaming phone', 9990000, 6.8, '2400x1080', '8GB', 4600, 'Android 13', 'Dimensity 7200', 'Dual SIM', '64MP main + 2MP depth', '120Hz', '2023-08-31'),
(37, 28, 'ROG Phone 7 Ultimate', 'Ultimate gaming phone', 29990000, 6.8, '2448x1080', '16GB', 6000, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 13MP ultra-wide + 5MP macro', '165Hz', '2023-04-13'),
(38, 28, 'ROG Phone 6D', 'AeroActive Cooler included', 19990000, 6.8, '2448x1080', '12GB', 6000, 'Android 12', 'Dimensity 9000+', 'Dual SIM', '50MP main + 13MP ultra-wide + 5MP macro', '165Hz', '2022-09-19'),
(39, 29, 'Black Shark 5 Pro', 'Magnetic pop-up triggers', 17990000, 6.7, '2400x1080', '16GB', 4650, 'Android 12', 'Snapdragon 8 Gen 1', 'Dual SIM', '108MP main + 13MP ultra-wide + 5MP macro', '144Hz', '2022-03-30'),
(40, 29, 'Black Shark 4S', 'Physical shoulder buttons', 12990000, 6.7, '2400x1080', '12GB', 4500, 'Android 11', 'Snapdragon 870', 'Dual SIM', '48MP main + 8MP ultra-wide + 5MP macro', '144Hz', '2021-10-13'),
(41, 30, 'FairPhone 5', 'Modular ethical phone', 14990000, 6.5, '2400x1080', '8GB', 4200, 'Android 13', 'Snapdragon 778G', 'Dual SIM', '50MP main + 50MP ultra-wide', '90Hz', '2023-08-30'),
(42, 30, 'FairPhone 4', 'Sustainable smartphone', 9990000, 6.3, '2340x1080', '6GB', 3900, 'Android 11', 'Snapdragon 750G', 'Dual SIM', '48MP main + 48MP ultra-wide', '60Hz', '2021-09-30'),
(43, 1, 'iPhone SE 2025', 'Compact powerhouse', 6990000, 4.7, '1334x750', '4GB', 1821, 'iOS 18', 'A17 Bionic', 'Single SIM', '12MP single', '60Hz', '2025-03-01'),
(44, 2, 'Galaxy S24 FE', 'Fan edition flagship', 11990000, 6.4, '2340x1080', '8GB', 4500, 'Android 14', 'Exynos 2200', 'Dual SIM', '50MP main + 12MP ultra-wide + 8MP telephoto', '120Hz', '2024-10-15'),
(45, 12, 'Redmi Note 13 Pro+', '200MP camera beast', 8990000, 6.7, '2712x1220', '12GB', 5000, 'Android 13', 'Dimensity 7200 Ultra', 'Dual SIM', '200MP main + 8MP ultra-wide + 2MP macro', '120Hz', '2023-09-21'),
(46, 13, 'Reno10 Pro+', 'Premium portrait expert', 14990000, 6.7, '2772x1240', '16GB', 4700, 'Android 13', 'Snapdragon 8+ Gen 1', 'Dual SIM', '50MP main + 64MP periscope + 8MP ultra-wide', '120Hz', '2023-07-08'),
(47, 14, 'Vivo X100', 'Zeiss co-engineered cameras', 19990000, 6.8, '2800x1260', '12GB', 5000, 'Android 14', 'Dimensity 9300', 'Dual SIM', '50MP main + 50MP ultra-wide + 64MP telephoto', '120Hz', '2023-11-13'),
(48, 15, 'Realme GT5', '240W fast charging', 12990000, 6.7, '2772x1240', '16GB', 4600, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 8MP ultra-wide + 2MP macro', '144Hz', '2023-08-28'),
(49, 16, 'OnePlus 12', 'Hasselblad camera system', 21990000, 6.8, '3168x1440', '16GB', 5400, 'OxygenOS 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 48MP ultra-wide + 64MP periscope', '120Hz', '2023-12-05'),
(50, 17, 'Nokia X30', 'Sustainable design', 8990000, 6.4, '2400x1080', '8GB', 4200, 'Android 12', 'Snapdragon 695', 'Dual SIM', '50MP main + 13MP ultra-wide', '90Hz', '2022-09-01'),
(51, 18, 'Mate 60 Pro', 'Satellite calling', 24990000, 6.8, '2720x1260', '12GB', 5000, 'HarmonyOS 4.0', 'Kirin 9000S', 'Dual SIM', '50MP main + 48MP periscope + 12MP ultra-wide', '120Hz', '2023-08-29'),
(52, 19, 'Edge 40 Neo', 'Slim curved display', 7990000, 6.6, '2400x1080', '12GB', 5000, 'Android 13', 'Dimensity 7030', 'Dual SIM', '50MP main + 13MP ultra-wide', '144Hz', '2023-09-14'),
(53, 20, 'Xperia 5 V', 'Compact flagship', 15990000, 6.1, '2520x1080', '8GB', 5000, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '52MP main + 12MP ultra-wide', '120Hz', '2023-09-01'),
(54, 21, 'Pixel 8a', 'Affordable Google flagship', 10990000, 6.1, '2400x1080', '8GB', 4494, 'Android 14', 'Google Tensor G3', 'Dual SIM', '64MP main + 13MP ultra-wide', '90Hz', '2024-05-14'),
(55, 22, 'Nothing Phone (2a)', 'Budget Glyph interface', 7990000, 6.7, '2412x1080', '8GB', 5000, 'Android 14', 'Dimensity 7200 Pro', 'Dual SIM', '50MP main + 50MP ultra-wide', '120Hz', '2024-03-05'),
(56, 23, 'Spark 20 Pro', '108MP budget phone', 5490000, 6.8, '2460x1080', '8GB', 5000, 'Android 13', 'Helio G99', 'Dual SIM', '108MP main + 2MP depth + 2MP macro', '120Hz', '2023-12-15'),
(57, 24, 'Infinix Hot 40i', 'Budget gaming', 3990000, 6.6, '1612x720', '8GB', 5000, 'Android 13', 'Helio G88', 'Dual SIM', '50MP main + 0.3MP depth', '90Hz', '2023-11-30'),
(58, 25, 'Magic6 Pro', 'AI-powered flagship', 24990000, 6.8, '2800x1280', '16GB', 5600, 'MagicOS 8.0', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 180MP periscope + 50MP ultra-wide', '120Hz', '2024-01-11'),
(59, 26, 'Poco C65', 'Durability focus', 3490000, 6.7, '1600x720', '6GB', 5000, 'Android 13', 'Helio G85', 'Dual SIM', '50MP main + 2MP depth', '90Hz', '2023-11-06'),
(60, 27, 'iQOO 12', 'Gaming flagship', 19990000, 6.8, '2800x1260', '16GB', 5000, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 64MP periscope + 50MP ultra-wide', '144Hz', '2023-11-07'),
(61, 28, 'Zenfone 11 Ultra', 'Large ROG sibling', 17990000, 6.8, '2400x1080', '16GB', 5500, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 32MP telephoto + 13MP ultra-wide', '144Hz', '2024-03-14'),
(62, 29, 'Helo 5G', 'Budget gaming', 5990000, 6.7, '2400x1080', '8GB', 4650, 'Android 13', 'Dimensity 6100+', 'Dual SIM', '64MP main + 8MP ultra-wide', '120Hz', '2023-08-01'),
(63, 30, 'Fairbuds Phone', 'Sustainable audio-focused', 12990000, 6.5, '2340x1080', '8GB', 4200, 'Android 14', 'Snapdragon 7 Gen 3', 'Dual SIM', '50MP main + 50MP ultra-wide', '90Hz', '2024-04-22'),
(64, 1, 'iPhone 15 Mini', 'Compact flagship', 12990000, 5.4, '2340x1080', '6GB', 3279, 'iOS 17', 'A16 Bionic', 'Dual SIM', '48MP main + 12MP ultra-wide', '60Hz', '2023-09-22'),
(65, 2, 'Galaxy Z Flip 5', 'Compact foldable', 19990000, 6.7, '2640x1080', '8GB', 3700, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '12MP main + 12MP ultra-wide', '120Hz', '2023-08-11'),
(66, 12, 'Xiaomi 14', 'Leica photography', 17990000, 6.4, '2670x1200', '12GB', 4610, 'HyperOS', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 50MP telephoto + 50MP ultra-wide', '120Hz', '2023-10-26'),
(67, 13, 'Find N3 Flip', 'Foldable with cover screen', 18990000, 6.8, '2520x1080', '12GB', 4300, 'Android 13', 'Dimensity 9200+', 'Dual SIM', '50MP main + 48MP ultra-wide + 32MP telephoto', '120Hz', '2023-08-29'),
(68, 14, 'iQOO Neo 9 Pro', 'Performance beast', 14990000, 6.8, '2800x1260', '16GB', 5160, 'Android 14', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 50MP ultra-wide', '144Hz', '2023-12-27'),
(69, 15, 'Narzo 60 Pro', 'Curved AMOLED display', 9990000, 6.7, '2412x1080', '12GB', 5000, 'Android 13', 'Dimensity 7050', 'Dual SIM', '100MP main + 8MP ultra-wide', '120Hz', '2023-07-06'),
(70, 16, 'Nord CE 3 Lite', 'Budget all-rounder', 5990000, 6.7, '2400x1080', '8GB', 5000, 'OxygenOS 13', 'Snapdragon 695', 'Dual SIM', '108MP main + 2MP macro + 2MP depth', '120Hz', '2023-04-04'),
(71, 17, 'Nokia G42 5G', 'Long software support', 4990000, 6.6, '1612x720', '6GB', 5000, 'Android 12', 'Snapdragon 480+', 'Dual SIM', '50MP main + 2MP macro + 2MP depth', '90Hz', '2023-04-25'),
(72, 18, 'Nova 12 Pro', 'Selfie expert', 12990000, 6.8, '2652x1200', '12GB', 4600, 'HarmonyOS 4.0', 'Kirin 830', 'Dual SIM', '50MP main + 8MP ultra-wide + 2MP macro', '120Hz', '2023-12-26'),
(73, 19, 'Razr 40 Ultra', 'Large cover display', 16990000, 6.9, '2640x1080', '12GB', 3800, 'Android 13', 'Snapdragon 8+ Gen 1', 'Dual SIM', '12MP main + 13MP ultra-wide', '165Hz', '2023-06-01'),
(74, 20, 'Xperia 1 VI', '4K cinematic display', 24990000, 6.5, '3840x1644', '12GB', 5000, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '52MP main + 12MP telephoto + 12MP ultra-wide', '120Hz', '2024-05-17'),
(75, 21, 'Pixel Fold', 'Google foldable', 34990000, 7.6, '2208x1840', '12GB', 4821, 'Android 14', 'Google Tensor G2', 'Dual SIM', '48MP main + 10.8MP telephoto + 10.8MP ultra-wide', '120Hz', '2023-06-27'),
(76, 22, 'Nothing CMF Phone 1', 'Modular design', 7990000, 6.7, '2400x1080', '8GB', 5000, 'Android 14', 'Dimensity 7300', 'Dual SIM', '50MP main', '120Hz', '2024-06-18'),
(77, 23, 'Pova 6 Pro', 'Gaming beast', 8990000, 6.8, '2436x1080', '16GB', 6000, 'Android 14', 'Dimensity 6080', 'Dual SIM', '108MP main + 2MP depth', '120Hz', '2024-02-28'),
(78, 24, 'Infinix Smart 8', 'Entry-level king', 2490000, 6.6, '1612x720', '4GB', 5000, 'Android 13', 'Helio G36', 'Dual SIM', '13MP main', '90Hz', '2023-11-30'),
(79, 25, 'Honor X50 GT', 'Gaming focus', 12990000, 6.8, '2800x1260', '16GB', 5800, 'MagicOS 7.2', 'Snapdragon 8+ Gen 1', 'Dual SIM', '50MP main + 8MP ultra-wide + 2MP macro', '144Hz', '2023-06-15'),
(80, 26, 'Poco M6 Pro', '210W charging', 10990000, 6.7, '2712x1220', '12GB', 5000, 'Android 14', 'Snapdragon 8s Gen 3', 'Dual SIM', '50MP main + 50MP telephoto + 12MP ultra-wide', '120Hz', '2024-05-22'),
(81, 27, 'IQOO Z9', 'Slim flagship', 17990000, 6.8, '2800x1260', '16GB', 6000, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 50MP ultra-wide + 64MP periscope', '144Hz', '2024-04-10'),
(82, 28, 'ROG 8', 'Gaming beast', 22990000, 6.8, '2448x1080', '24GB', 5500, 'Android 14', 'Snapdragon 8 Gen 3', 'Dual SIM', '50MP main + 13MP ultra-wide + 32MP telephoto', '165Hz', '2024-01-16'),
(83, 29, 'Black Shark 5 Pro', 'Magnetic triggers', 14990000, 6.7, '2400x1080', '16GB', 4650, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '64MP main + 8MP ultra-wide', '144Hz', '2023-03-30'),
(84, 30, 'FairPhone 4 Plus', 'Sustainable mid-ranger', 8990000, 6.5, '2340x1080', '8GB', 4200, 'Android 14', 'Snapdragon 6 Gen 1', 'Dual SIM', '48MP main + 50MP ultra-wide', '90Hz', '2024-02-15'),
(85, 1, 'iPhone 14 Plus', 'Large battery iPhone', 12990000, 6.7, '2778x1284', '6GB', 4323, 'iOS 16', 'A15 Bionic', 'Dual SIM', '12MP main + 12MP ultra-wide', '60Hz', '2022-09-16'),
(86, 2, 'Galaxy A25', 'Budget 5G', 5490000, 6.5, '2340x1080', '6GB', 5000, 'Android 14', 'Exynos 1280', 'Dual SIM', '50MP main + 8MP ultra-wide + 2MP macro', '120Hz', '2023-12-11'),
(87, 12, 'Redmi 13C', 'Entry-level king', 3490000, 6.7, '1600x720', '4GB', 5000, 'Android 13', 'Helio G85', 'Dual SIM', '50MP main + 2MP macro', '90Hz', '2023-11-10'),
(88, 13, 'Oppo A98 5G', 'Mid-range all-rounder', 7990000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Snapdragon 695', 'Dual SIM', '108MP main + 2MP depth + 2MP macro', '120Hz', '2023-04-18'),
(89, 14, 'Vivo Y36', 'Long battery life', 4990000, 6.6, '2388x1080', '8GB', 5000, 'Android 13', 'Snapdragon 680', 'Dual SIM', '50MP main + 2MP depth', '90Hz', '2023-06-14'),
(90, 15, 'Realme C55', 'Premium design', 5990000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Helio G88', 'Dual SIM', '64MP main + 8MP ultra-wide', '90Hz', '2023-03-07'),
(91, 16, 'OnePlus Nord N30', 'Large display', 6990000, 6.7, '2400x1080', '8GB', 5000, 'OxygenOS 13', 'Snapdragon 695', 'Dual SIM', '108MP main + 2MP macro + 2MP depth', '120Hz', '2023-06-05'),
(92, 17, 'Nokia C32', 'Entry-level', 2990000, 6.5, '1600x720', '4GB', 5000, 'Android 13', 'Unisoc T606', 'Dual SIM', '50MP main', '60Hz', '2023-02-25'),
(93, 18, 'Huawei Enjoy 70', 'Long battery', 4990000, 6.8, '1600x720', '8GB', 6000, 'HarmonyOS 4.0', 'Kirin 710A', 'Dual SIM', '50MP main + 2MP depth', '90Hz', '2023-11-28'),
(94, 19, 'Motorola G54', 'Stock Android', 5990000, 6.5, '2400x1080', '8GB', 5000, 'Android 13', 'Dimensity 7020', 'Dual SIM', '50MP main + 8MP ultra-wide', '120Hz', '2023-09-05'),
(95, 20, 'Xperia 10 VI', 'Mid-range compact', 8990000, 6.1, '2520x1080', '6GB', 5000, 'Android 14', 'Snapdragon 6 Gen 1', 'Dual SIM', '48MP main + 8MP telephoto', '120Hz', '2024-05-15'),
(96, 21, 'Pixel 7a', 'Camera-focused mid-ranger', 9990000, 6.1, '2400x1080', '8GB', 4385, 'Android 13', 'Google Tensor G2', 'Dual SIM', '64MP main + 13MP ultra-wide', '90Hz', '2023-05-11'),
(97, 22, 'Nothing Ear Phone', 'Audio-focused', 5990000, 6.6, '2340x1080', '8GB', 4500, 'Android 13', 'Snapdragon 695', 'Dual SIM', '50MP main', '90Hz', '2023-11-08'),
(98, 23, 'Tecno Pop 8', 'Entry-level', 2490000, 6.6, '1612x720', '4GB', 5000, 'Android 13', 'Unisoc T606', 'Dual SIM', '13MP main', '90Hz', '2023-09-18'),
(99, 24, 'Infinix InBook Y1', 'Productivity focus', 12990000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Helio G99', 'Dual SIM', '50MP main + 2MP depth', '90Hz', '2023-07-25'),
(100, 25, 'Honor Play 7T', 'Gaming budget', 4990000, 6.6, '2408x1080', '8GB', 6000, 'Android 13', 'Dimensity 6020', 'Dual SIM', '50MP main', '90Hz', '2023-10-10'),
(101, 26, 'Poco C65', '108MP camera', 6990000, 6.7, '2400x1080', '8GB', 5000, 'Android 13', 'Helio G99', 'Dual SIM', '108MP main + 2MP depth', '120Hz', '2023-11-06'),
(102, 27, 'IQOO Z8x', 'Performance focus', 12990000, 6.6, '2388x1080', '12GB', 6000, 'Android 14', 'Snapdragon 8 Gen 2', 'Dual SIM', '50MP main + 8MP ultra-wide', '144Hz', '2023-09-20'),
(103, 28, 'Zenfone 10D', 'Compact flagship', 14990000, 5.9, '2400x1080', '16GB', 4300, 'Android 13', 'Snapdragon 8 Gen 2', 'Dual SIM', '200MP main + 13MP ultra-wide', '144Hz', '2023-10-25'),
(104, 29, 'Black Shark 5S', 'Cooling system', 10990000, 6.7, '2400x1080', '12GB', 4650, 'Android 13', 'Snapdragon 870', 'Dual SIM', '64MP main + 8MP ultra-wide', '144Hz', '2022-07-15'),
(105, 30, 'FairPhone 3+', 'Modular entry-level', 6000000, 6.3, '2340x1080', '6GB', 3900, 'Android 13', 'Snapdragon 480', 'Dual SIM', '48MP main', '60Hz', '2023-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`) VALUES
(1, 1, 'apple-iphone-16-pro-max-1.jpg'),
(2, 2, 'apple-iphone-16-pro-1.jpg'),
(3, 3, 'apple-iphone-16-plus-1.jpg'),
(4, 4, 'apple-iphone-16-1.jpg'),
(5, 5, 'apple-iphone-15-pro-max-1.jpg'),
(6, 6, 'apple-iphone-15-pro-1.jpg'),
(7, 7, 'apple-iphone-15-plus-1.jpg'),
(8, 8, 'apple-iphone-15-1.jpg'),
(9, 10, 'apple-iphone-14-pro-max-1.jpg'),
(10, 11, '313271374.jpeg'),
(11, 12, '313271374.jpeg'),
(12, 14, 'samsung-galaxy-z-fold-6-xanh_5_.webp'),
(13, 19, 'samsung-galaxy-m54-bac-thumb-600x600.jpg'),
(14, 16, 'samsung-galaxy-a55_4_.webp'),
(30, 21, '473447941_947759744125433_8401259627079035354_n.jpg'),
(31, 23, '23.png'),
(32, 24, '24.png'),
(33, 25, '25.png'),
(34, 26, '26.png'),
(35, 27, '27.png'),
(36, 28, '28.png'),
(37, 29, '29.png'),
(38, 30, '30.png'),
(39, 31, '31.png'),
(40, 32, '32.png'),
(41, 33, '33.png'),
(42, 34, '34.png'),
(43, 35, '35.png'),
(44, 36, '36.png'),
(45, 37, '37.png'),
(46, 38, '38.png'),
(47, 39, '39.png'),
(48, 40, '40.png'),
(49, 41, '41.png'),
(50, 42, '42.png'),
(51, 43, '43.png'),
(52, 44, '44.png'),
(53, 45, '45.png'),
(54, 46, '46.png'),
(55, 47, '47.png'),
(56, 48, '48.png'),
(57, 49, '49.png'),
(58, 50, '50.png'),
(59, 51, '51.png'),
(60, 52, '52.png'),
(61, 53, '53.png'),
(62, 54, '54.png'),
(63, 55, '55.png'),
(64, 56, '56.png'),
(65, 57, '57.png'),
(66, 58, '58.png'),
(67, 59, '59.png'),
(68, 60, '60.png'),
(69, 61, '61.png'),
(70, 62, '62.png'),
(71, 63, '63.png'),
(72, 64, '64.png'),
(73, 65, '65.png'),
(74, 66, '66.png'),
(75, 67, '67.png'),
(76, 68, '68.png'),
(77, 69, '69.png'),
(78, 70, '70.png'),
(79, 71, '71.png'),
(80, 72, '72.png'),
(81, 73, '73.png'),
(82, 74, '74.png'),
(83, 75, '75.png'),
(84, 76, '76.png'),
(85, 77, '77.png'),
(86, 78, '78.png'),
(87, 79, '79.png'),
(88, 80, '80.png'),
(89, 81, '81.png'),
(90, 82, '82.png'),
(91, 83, '83.png'),
(92, 84, '84.png'),
(93, 85, '85.png'),
(94, 86, '86.png'),
(95, 87, '87.png'),
(96, 88, '88.png'),
(97, 89, '89.png'),
(98, 90, '90.png'),
(99, 91, '91.png'),
(100, 92, '92.png'),
(101, 93, '93.png'),
(102, 94, '94.png'),
(103, 95, '95.png'),
(104, 96, '96.png'),
(105, 97, '97.png'),
(106, 98, '98.png'),
(107, 99, '99.png'),
(108, 100, '100.png'),
(109, 101, '101.png'),
(110, 102, '102.png'),
(111, 103, '103.png'),
(112, 104, '104.png'),
(113, 105, '105.png'),
(115, 13, 'galaxys24.png'),
(116, 15, 'zflip6.png'),
(117, 17, 'a35.png'),
(118, 18, 'a15.png'),
(119, 20, 's23fe.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `price_adjustment` decimal(20,0) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color`, `storage`, `price_adjustment`, `stock`) VALUES
(1, 1, 'Titanium Black', '256GB', 2000000, 60),
(2, 1, 'Titanium White', '512GB', 5000000, 50),
(3, 2, 'Space Black', '128GB', 0, 33),
(4, 2, 'Gold', '256GB', 2000000, 36),
(5, 3, 'Midnight', '128GB', 0, 48),
(6, 3, 'Starlight', '256GB', 2000000, 30),
(7, 4, 'Blue', '128GB', 0, 59),
(8, 4, 'Purple', '256GB', 2000000, 45),
(9, 5, 'Deep Purple', '256GB', 0, 30),
(10, 5, 'Silver', '512GB', 5000000, 20),
(11, 6, 'Graphite', '128GB', 0, 35),
(12, 6, 'Sierra Blue', '256GB', 2000000, 29),
(13, 7, 'Product Red', '128GB', 0, 38),
(14, 7, 'Green', '256GB', 2000000, 28),
(15, 8, 'Pink', '128GB', 0, 50),
(16, 8, 'Yellow', '256GB', 2000000, 40),
(17, 9, 'Black', '64GB', 0, 60),
(18, 9, 'White', '128GB', 1000000, 50),
(19, 10, 'Space Black', '128GB', 0, 25),
(20, 10, 'Gold', '256GB', 2000000, 15),
(21, 11, 'Titanium Black', '256GB', 0, 40),
(22, 11, 'Titanium Violet', '512GB', 5000000, 30),
(23, 12, 'Marble Gray', '256GB', 0, 35),
(24, 12, 'Cobalt Violet', '512GB', 4000000, 25),
(25, 13, 'Onyx Black', '128GB', 0, 50),
(26, 13, 'Amber Yellow', '256GB', 2000000, 40),
(27, 14, 'Phantom Black', '256GB', 0, 20),
(28, 14, 'Cream', '512GB', 5000000, 15),
(29, 15, 'Mint', '256GB', 0, 30),
(30, 15, 'Graphite', '512GB', 3000000, 20),
(31, 16, 'Iceblue', '128GB', 0, 45),
(32, 16, 'Lemon', '256GB', 2000000, 35),
(33, 17, 'Navy', '128GB', 0, 50),
(34, 17, 'Lilac', '256GB', 2000000, 40),
(35, 18, 'Black', '64GB', 0, 60),
(36, 18, 'Light Blue', '128GB', 1000000, 50),
(37, 19, 'Dark Blue', '128GB', 0, 35),
(38, 19, 'Silver', '256GB', 2000000, 25),
(39, 20, 'Mint', '128GB', 0, 30),
(40, 20, 'Graphite', '256GB', 2000000, 20),
(41, 1, 'White', '1TB', 6000000, 50),
(42, 1, 'Pink', '512GB', 1000000, 50),
(45, 21, 'Black', '256GB', 1000, 22),
(46, 21, 'White', '512GB', 1000, 22),
(47, 23, 'Obsidian', '128GB', 0, 25),
(48, 23, 'Porcelain', '256GB', 2000000, 30),
(49, 24, 'Snow', '128GB', 0, 28),
(50, 24, 'Hazel', '256GB', 2000000, 22),
(51, 25, 'Dark Steel', '128GB', 0, 32),
(52, 25, 'White', '256GB', 2000000, 18),
(53, 26, 'Black', '128GB', 0, 35),
(54, 26, 'White', '256GB', 2000000, 25),
(55, 27, 'Stellar Black', '128GB', 0, 40),
(56, 27, 'Moonlight Silver', '256GB', 2000000, 30),
(57, 28, 'Starlight Black', '128GB', 0, 22),
(58, 28, 'Aurora Purple', '256GB', 2000000, 18),
(59, 29, 'Golden Hour', '128GB', 0, 27),
(60, 29, 'Crystal Blue', '256GB', 2000000, 23),
(61, 30, 'Meadow Green', '128GB', 0, 31),
(62, 30, 'Sunset Gold', '256GB', 2000000, 29),
(63, 31, 'Arctic Silver', '128GB', 0, 26),
(64, 31, 'Emerald Green', '256GB', 2000000, 24),
(65, 32, 'Midnight Black', '128GB', 0, 33),
(66, 32, 'Coral Pink', '256GB', 2000000, 22),
(67, 33, 'Carbon Black', '128GB', 0, 38),
(68, 33, 'Electric Blue', '256GB', 2000000, 22),
(69, 34, 'Phantom Black', '128GB', 0, 29),
(70, 34, 'Glacier Blue', '256GB', 2000000, 21),
(71, 35, 'Alpha Black', '128GB', 0, 31),
(72, 35, 'Beta White', '256GB', 2000000, 19),
(73, 36, 'Cyber Silver', '128GB', 0, 34),
(74, 36, 'Neon Green', '256GB', 2000000, 16),
(75, 37, 'Matte Black', '128GB', 0, 23),
(76, 37, 'Racing Red', '256GB', 2000000, 17),
(77, 38, 'Stealth Black', '128GB', 0, 28),
(78, 38, 'Mecha Gray', '256GB', 2000000, 22),
(79, 39, 'Shadow Black', '128GB', 0, 26),
(80, 39, 'Lightning Yellow', '256GB', 2000000, 24),
(81, 40, 'Deep Sea Blue', '128GB', 0, 32),
(82, 40, 'Lava Red', '256GB', 2000000, 28),
(83, 41, 'Eco Black', '128GB', 0, 35),
(84, 41, 'Ocean Blue', '256GB', 2000000, 25),
(85, 42, 'Forest Green', '128GB', 0, 30),
(86, 42, 'Sandstone', '256GB', 2000000, 20),
(87, 43, 'Classic Black', '64GB', 0, 40),
(88, 43, 'Pure White', '128GB', 1000000, 30),
(89, 44, 'Phantom Black', '128GB', 0, 33),
(90, 44, 'Mystic Silver', '256GB', 2000000, 27),
(91, 45, 'Aurora Purple', '128GB', 0, 37),
(92, 45, 'Glacier Blue', '256GB', 2000000, 23),
(93, 46, 'Starry Black', '128GB', 0, 29),
(94, 46, 'Sunrise Gold', '256GB', 2000000, 21),
(95, 47, 'Cosmic Black', '128GB', 0, 31),
(96, 47, 'Nebula Blue', '256GB', 2000000, 19),
(97, 48, 'Racing Silver', '128GB', 0, 35),
(98, 48, 'Thunder Black', '256GB', 2000000, 25),
(99, 49, 'Emerald Forest', '128GB', 0, 28),
(100, 49, 'Volcanic Gray', '256GB', 2000000, 22),
(101, 50, 'Ice Blue', '128GB', 0, 34),
(102, 50, 'Charcoal Black', '256GB', 2000000, 26),
(103, 51, 'Moonlight Silver', '128GB', 0, 27),
(104, 51, 'Starlight Gold', '256GB', 2000000, 23),
(105, 52, 'Crystal Pink', '128GB', 0, 32),
(106, 52, 'Midnight Blue', '256GB', 2000000, 28),
(107, 53, 'Frost White', '128GB', 0, 29),
(108, 53, 'Graphite Black', '256GB', 2000000, 21),
(109, 54, 'Coral Reef', '128GB', 0, 36),
(110, 54, 'Sage Green', '256GB', 2000000, 24),
(111, 55, 'Obsidian', '128GB', 0, 31),
(112, 55, 'Pearl', '256GB', 2000000, 29),
(113, 56, 'Meteor Black', '128GB', 0, 38),
(114, 56, 'Comet White', '256GB', 2000000, 22),
(115, 57, 'Lunar Rock', '128GB', 0, 33),
(116, 57, 'Solar Flare', '256GB', 2000000, 27),
(117, 58, 'Galaxy Black', '128GB', 0, 30),
(118, 58, 'Nebula Silver', '256GB', 2000000, 20),
(119, 59, 'Deep Black', '128GB', 0, 35),
(120, 59, 'Sky Blue', '256GB', 2000000, 25),
(121, 60, 'Cyber Yellow', '128GB', 0, 28),
(122, 60, 'Stealth Gray', '256GB', 2000000, 22),
(123, 61, 'Phantom Silver', '128GB', 0, 32),
(124, 61, 'Inferno Red', '256GB', 2000000, 18),
(125, 62, 'Ocean Wave', '128GB', 0, 29),
(126, 62, 'Desert Sand', '256GB', 2000000, 21),
(127, 63, 'Moss Green', '128GB', 0, 34),
(128, 63, 'Stone Gray', '256GB', 2000000, 26),
(129, 64, 'Midnight', '128GB', 0, 37),
(130, 64, 'Starlight', '256GB', 2000000, 23),
(131, 65, 'Mystic Bronze', '128GB', 0, 31),
(132, 65, 'Phantom Black', '256GB', 2000000, 29),
(133, 66, 'Aurora Pink', '128GB', 0, 28),
(134, 66, 'Thunder Gray', '256GB', 2000000, 22),
(135, 67, 'Moonlight Mist', '128GB', 0, 33),
(136, 67, 'Sunset Glow', '256GB', 2000000, 27),
(137, 68, 'Cyber Black', '128GB', 0, 35),
(138, 68, 'Electric Blue', '256GB', 2000000, 25),
(139, 69, 'Sunrise Orange', '128GB', 0, 30),
(140, 69, 'Midnight Blue', '256GB', 2000000, 20),
(141, 70, 'Arctic White', '128GB', 0, 38),
(142, 70, 'Lunar Gray', '256GB', 2000000, 22),
(143, 71, 'Deep Blue', '128GB', 0, 32),
(144, 71, 'Coral Red', '256GB', 2000000, 28),
(145, 72, 'Blush Gold', '128GB', 0, 29),
(146, 72, 'Emerald Green', '256GB', 2000000, 21),
(147, 73, 'Infinite Black', '128GB', 0, 34),
(148, 73, 'Eternal Silver', '256GB', 2000000, 26),
(149, 74, 'Frosted Black', '128GB', 0, 27),
(150, 74, 'Icy Blue', '256GB', 2000000, 23),
(151, 75, 'Stormy Black', '128GB', 0, 31),
(152, 75, 'Cloud White', '256GB', 2000000, 19),
(153, 76, 'Graphite', '128GB', 0, 35),
(154, 76, 'Sapphire', '256GB', 2000000, 25),
(155, 77, 'Lava Orange', '128GB', 0, 28),
(156, 77, 'Volcano Black', '256GB', 2000000, 22),
(157, 78, 'Sky Blue', '64GB', 0, 42),
(158, 78, 'Meadow Green', '128GB', 1000000, 38),
(159, 79, 'Racing Green', '128GB', 0, 33),
(160, 79, 'Carbon Fiber', '256GB', 2000000, 27),
(161, 80, 'Thunder Purple', '128GB', 0, 31),
(162, 80, 'Lightning Yellow', '256GB', 2000000, 29),
(163, 81, 'Aurora White', '128GB', 0, 34),
(164, 81, 'Midnight Black', '256GB', 2000000, 26),
(165, 82, 'Cyber Metal', '128GB', 0, 27),
(166, 82, 'Neon Pink', '256GB', 2000000, 23),
(167, 83, 'Steel Gray', '128GB', 0, 32),
(168, 83, 'Blood Red', '256GB', 2000000, 28),
(169, 84, 'Ocean Depth', '128GB', 0, 30),
(170, 84, 'Desert Rose', '256GB', 2000000, 20),
(171, 85, 'Space Gray', '128GB', 0, 36),
(172, 85, 'Gold', '256GB', 2000000, 24),
(173, 86, 'Arctic Blue', '128GB', 0, 33),
(174, 86, 'Lava Red', '256GB', 2000000, 27),
(175, 87, 'Charcoal', '64GB', 0, 40),
(176, 87, 'Cyan', '128GB', 1000000, 30),
(177, 88, 'Prism Black', '128GB', 0, 35),
(178, 88, 'Rainbow Silver', '256GB', 2000000, 25),
(179, 89, 'Mint Green', '128GB', 0, 31),
(180, 89, 'Lemon Yellow', '256GB', 2000000, 29),
(181, 90, 'Rose Gold', '128GB', 0, 34),
(182, 90, 'Matte Black', '256GB', 2000000, 26),
(183, 91, 'Polar White', '128GB', 0, 32),
(184, 91, 'Abyss Black', '256GB', 2000000, 28),
(185, 92, 'Cobalt', '64GB', 0, 45),
(186, 92, 'Ruby', '128GB', 1000000, 35),
(187, 93, 'Moss', '128GB', 0, 38),
(188, 93, 'Sand', '256GB', 2000000, 22),
(189, 94, 'Slate', '128GB', 0, 33),
(190, 94, 'Marble', '256GB', 2000000, 27),
(191, 95, 'Frost Blue', '128GB', 0, 29),
(192, 95, 'Ember Red', '256GB', 2000000, 21),
(193, 96, 'Basalt Black', '128GB', 0, 36),
(194, 96, 'Chalk White', '256GB', 2000000, 24),
(195, 97, 'Crimson', '128GB', 0, 30),
(196, 97, 'Navy', '256GB', 2000000, 20),
(197, 98, 'Lilac', '64GB', 0, 42),
(198, 98, 'Tangerine', '128GB', 1000000, 38),
(199, 99, 'Obsidian', '128GB', 0, 31),
(200, 99, 'Pearl', '256GB', 2000000, 29),
(201, 100, 'Lime', '128GB', 0, 35),
(202, 100, 'Cobalt', '256GB', 2000000, 25),
(203, 101, 'Amber', '128GB', 0, 33),
(204, 101, 'Onyx', '256GB', 2000000, 27),
(205, 102, 'Magma', '128GB', 0, 34),
(206, 102, 'Glacier', '256GB', 2000000, 26),
(207, 103, 'Carbon', '128GB', 0, 28),
(208, 103, 'Platinum', '256GB', 2000000, 22),
(209, 104, 'Mist Gray', '128GB', 0, 32),
(210, 104, 'Sunset Red', '256GB', 2000000, 28),
(211, 105, 'Forest', '128GB', 0, 22),
(212, 105, 'Sky', '256GB', 2000000, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `gender`, `role`, `avatar`, `status`) VALUES
(1, 'a', 'a@gmail.com', '0943294293', 'hanoi', '$2y$12$otAvNi5ciCJWaP6nGRvqpuulRJ4wIA6JrbkXTYbXyF2La8BmytS8O', 'Male', 0, '482226709_1149400006563502_7036947741314145713_n.jpg', 'active'),
(2, 'giang', 'giang@gmail.com', '0123012313', 'Lao Cai', '$2y$12$tR5KTG75ugsaVjrySD4Q5.bZVlBa4n5ZwEbgcoKxzP8TwJXjnDBvW', 'Male', 1, '1750685813_482226709_1149400006563502_7036947741314145713_n.jpg', 'active'),
(3, 'b', 'b@gmail.com', '0932419192', 'fasfsasd', '$2y$12$r566KTkoNrqKBFxFINuWtOxwpHK/kCuxKYP4p76YswNBUluP54pCy', 'Male', 0, '1750404303_424769553_345040938368971_716198605625399795_n.jpg', 'active'),
(13, 'c', 'c@gmail.com', '0432941824', 'hanoi2', '$2y$12$LaTiMnIa/vuvXMN/T9MkbOs/vdMajzQCybUQXuDe0eJD15Lwy2E1O', 'Female', 0, NULL, 'active'),
(14, 'd', 'd@gmail.com', '0123321312', NULL, '$2y$12$8UqS4/4vgyP.EDA2cE7RHefsSiTjr6LAzlS3iVKpHIcMO6HkCeWMe', 'Other', 1, NULL, 'active'),
(15, 'nguyen giang', 'ntg1611@gmail.com', '0319231232', 'tran khat chan', '$2y$12$jGHq5y3jl20cDn40Ab/ZyeTbdeLHUBrwbyYJjShZRInWNsZOxNDiO', 'Male', 1, '1750166696_456751289_122165999366221589_6816299981743055759_n.jpg', 'active'),
(16, 'e', 'e@gmail.com', '0354453545', NULL, '$2y$12$Hx/b96o0kigV.K/Ks4rDNugCHgJ1xTel1US4XdUTx2T0/pUy621B6', 'Other', 0, NULL, 'active'),
(17, 'thanh', 'thanh789@ghmai.com', '0987654321', NULL, '$2y$12$F.TIYJ9gIWCMhLj5bF.56.mNl9IwBX7xYFP7M562i1ezjEoopCa2y', 'Male', 0, NULL, 'active'),
(18, 'MeThangGiang', 'a$1zdsdads@gmail.com', '2233508001', 'My Tho', '$2y$12$nlB3NXR6bfpsaymfu039Ge8k4rMk5L.baADP0wIgfr8QrYmEySNre', 'Other', 0, NULL, 'active'),
(19, 'hihi', 'hihi@gmail.com', '0931291232', 'Ha noi', '$2y$12$9kA3UGQt/R2/hiNVukAb/ebZiBKHmMXmkhBsOu2DrgFGpSPdCTNhG', 'Other', 0, '1750426174_473447941_947759744125433_8401259627079035354_n.jpg', 'active'),
(20, 'Bằng Cổ Tay', 'bangcotay@gmail.com', '0123456789', 'Mua hộ tùng béo', '$2y$12$qTThTPKWGhg9kS.JZrSooeWSUz1zje0XQGae0z0cTvuFJXuDEEam.', 'Male', 0, NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_users` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `FK_order_details_product_variants` (`product_variants_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_brands` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_images_products` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_variants_products` (`product_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_order_details_product_variants` FOREIGN KEY (`product_variants_id`) REFERENCES `product_variants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `FK_product_images_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `FK_product_variants_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
