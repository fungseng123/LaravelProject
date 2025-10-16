-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2025 at 03:36 PM
-- Server version: 8.2.0
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  `viewed_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `question`, `admin_reply`, `viewed_by_admin`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', 'Do you offer international shipping for your phones?', 'Yes, we offer worldwide shipping. Shipping costs vary by location.', 1, '2025-04-14 07:34:34', '2025-04-15 07:34:34'),
(2, 'Alice Johnson', 'alice@example.com', 'What is the warranty period for iPhone 15 Pro?', NULL, 0, '2025-04-17 07:34:34', '2025-04-17 07:34:34'),
(3, 'Mike Wilson', 'mike@example.com', 'Do you accept trade-ins for old phones?', NULL, 0, '2025-04-18 07:34:34', '2025-04-18 07:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_04_18_112842_create_products_table', 1),
(6, '2025_04_18_112935_create_products_variants_table', 1),
(7, '2025_04_19_070311_add_roles_to_users_table', 1),
(8, '2025_04_19_072441_create_enquiries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 15 Pro', 'The latest iPhone with advanced features.', '15pro.webp', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(2, 'Samsung Galaxy S24', 'The latest Samsung Galaxy with cutting-edge technology and sleek design.', 'glxys24.webp', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(3, 'Google Pixel 8 Pro', 'Google\'s flagship phone with AI-powered features and exceptional camera quality.', 'pixel8pro.jpg', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(4, 'iPhone 14', 'Powerful A15 Bionic chip, amazing camera system, and all-day battery life.', 'iphone14.jpg', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(5, 'iPhone 15 Pro Max', 'The most powerful iPhone ever with A17 Pro chip and revolutionary camera system.', 'iphone15promax.jpg', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(6, 'Samsung Galaxy S23', 'Feature-packed Android phone with exceptional camera capabilities.', 'galaxy-s23.jpg', '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(7, 'Samsung Galaxy S24 Ultra', 'Ultimate Android flagship with S Pen and advanced AI features.', 'galaxy-s24U.jpg', '2025-04-19 07:34:34', '2025-04-19 07:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `storage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variants_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `storage`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '128GB', 999.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(2, 1, '256GB', 1099.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(3, 1, '512GB', 1199.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(4, 2, '128GB', 899.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(5, 2, '256GB', 999.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(6, 2, '512GB', 1099.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(7, 3, '128GB', 899.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(8, 3, '256GB', 999.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(9, 3, '512GB', 1099.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(10, 4, '128GB', 799.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(11, 4, '256GB', 899.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(12, 4, '512GB', 999.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(13, 5, '256GB', 1199.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(14, 5, '512GB', 1399.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(15, 5, '1TB', 1599.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(16, 6, '128GB', 799.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(17, 6, '256GB', 859.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(18, 6, '512GB', 959.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(19, 7, '256GB', 1299.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(20, 7, '512GB', 1419.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(21, 7, '1TB', 1619.99, '2025-04-19 07:34:34', '2025-04-19 07:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$10$gzQf7kRKOZLEHP6YkiLPE.NnZws3E1O4gBJOgWfAEI7bdUXsezLZu', 'admin', NULL, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(2, 'John Doe', 'john@example.com', NULL, '$2y$10$WOjMBVx4T8yhm3652d1.OueJ.LsKwj8qS4JnkEmEPhUrwELOdpp3m', 'user', NULL, '2025-04-19 07:34:34', '2025-04-19 07:34:34'),
(3, 'Jane Smith', 'jane@example.com', NULL, '$2y$10$MfbiJ.qs3V/zKEFcOLHCBeDANpgGUq4eQ1ldQnEWaSe/u7I4PwO8G', 'user', NULL, '2025-04-19 07:34:34', '2025-04-19 07:34:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
