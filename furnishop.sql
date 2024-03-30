-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 02:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 3, '2022-03-14 22:53:58', '2022-03-14 22:54:03'),
(3, 3, 12, 1, '2022-03-15 01:07:20', '2022-03-15 01:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bedroom', NULL, 'bed.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Dining Room', NULL, 'coffee_table.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Living Room', NULL, 'sofa.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Kitchen', NULL, 'kitchen.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Bathroom', NULL, 'bathroom.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 'Outdoor Spaces', NULL, 'armchair.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 'Decor', NULL, 'vase-flower.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 'Lighting', NULL, 'floor_lamp.png', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 'Nightstands', 1, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, 'Dressers', 1, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, 'Beds', 1, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 'Tables', 2, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(13, 'Chairs', 2, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(14, 'Bar Stools', 2, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(15, 'Sofa Accessories', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(16, 'Armchairs', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(17, 'Shelving Units', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(18, 'Sofas', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(19, 'Sofa Beds', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(20, 'Side Tables', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(21, 'Rugs', 3, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(22, 'Tableware', 4, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(23, 'Drinkware', 4, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(24, 'Utensils', 4, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(25, 'Laundry Baskets', 5, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(26, 'Soap Dispensers', 5, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(27, 'Outdoor Sofas', 6, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(28, 'Coffee Tables', 6, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(29, 'Vases', 7, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(30, 'Gallery', 7, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(31, 'Floor Lamps', 8, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(32, 'Pendants', 8, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 2, 9, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 3, 18, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 4, 16, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 5, 20, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 5, 28, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 6, 30, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 7, 21, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 8, 27, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, 9, 27, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, 10, 28, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 11, 28, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(13, 12, 11, NULL, NULL),
(14, 13, 30, NULL, NULL),
(15, 14, 14, NULL, NULL),
(16, 15, 12, NULL, NULL),
(17, 16, 32, NULL, NULL),
(18, 17, 13, NULL, NULL),
(19, 18, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bergamo', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Charlotte', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Lugano', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Madrid', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Kingston', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 'Princeton', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 'Rome', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 'Sydney', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 'Houston', '2022-03-15 01:04:58', '2022-03-15 01:04:58'),
(10, 'Vienna', '2022-03-15 11:39:46', '2022-03-15 11:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gray', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'White', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Black', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Navy Blue', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Beige', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 'Brown', '2022-03-15 11:44:15', '2022-03-15 11:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 2, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 3, 2, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 4, 5, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 5, 3, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 6, 5, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 7, 5, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 8, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 9, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, 10, 3, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, 11, 3, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 12, 2, NULL, NULL),
(13, 12, 5, NULL, NULL),
(14, 13, 5, NULL, NULL),
(15, 14, 5, NULL, NULL),
(16, 15, 6, NULL, NULL),
(17, 16, 3, NULL, NULL),
(18, 17, 5, NULL, NULL),
(19, 18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `thumbnail_filename`, `created_at`, `updated_at`) VALUES
(1, '1640903.jpg', '1640903.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, '1640904.jpg', '1640904.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, '1640739.jpg', '1640739.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, '1640740.jpg', '1640740.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, '1682829.jpg', '1682829.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, '1682830.jpg', '1682830.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, '1682832.jpg', '1682832.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, '1096851.jpg', '1096851.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, '1096849.jpg', '1096849.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, '1096855.jpg', '1096855.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, '856671.jpg', '856671.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, '1588087.jpg', '1588087.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(13, '1711612.jpg', '1711612.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(14, '1106858.jpg', '1106858.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(15, '563155.jpg', '563155.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(16, '563157.jpg', '563157.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(17, '802248.jpg', '802248.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(18, '563132.jpg', '563132.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(19, '563131.jpg', '563131.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(20, '563119.jpg', '563119.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(21, '563120.jpg', '563120.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(22, '660512.jpg', '660512.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(23, '660514.jpg', '660514.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(24, 'x2eVxTgAg7SqJeulhr3NflkzsYDNBRoLi9StsVUt.jpg', 'x2eVxTgAg7SqJeulhr3NflkzsYDNBRoLi9StsVUt.jpg', '2022-03-15 01:06:59', '2022-03-15 01:06:59'),
(25, 'qOdyUhb4HXXYtM4EOI4qTFXiiLzPxPZ5ui1MMgrv.jpg', 'qOdyUhb4HXXYtM4EOI4qTFXiiLzPxPZ5ui1MMgrv.jpg', '2022-03-15 01:06:59', '2022-03-15 01:06:59'),
(26, 'cfkUGtGW0xJgEEi6jkX8trz4oY5iITdtDvoI0XlD.jpg', 'cfkUGtGW0xJgEEi6jkX8trz4oY5iITdtDvoI0XlD.jpg', '2022-03-15 11:42:00', '2022-03-15 11:42:00'),
(27, 'IJy8U33JTEiRapnoHh5z3d1JIPvqHcA9A6LyEfYi.jpg', 'IJy8U33JTEiRapnoHh5z3d1JIPvqHcA9A6LyEfYi.jpg', '2022-03-15 11:42:00', '2022-03-15 11:42:00'),
(28, 'uMOslw5EdpnpPVxkqn8UbY7km1vKxxJYUKB3Kdl7.jpg', 'uMOslw5EdpnpPVxkqn8UbY7km1vKxxJYUKB3Kdl7.jpg', '2022-03-15 11:43:27', '2022-03-15 11:43:27'),
(29, 'Yj7kR2pgzxq3wPWb67NRj4Vfas30eqz0OF1YYA2G.jpg', 'Yj7kR2pgzxq3wPWb67NRj4Vfas30eqz0OF1YYA2G.jpg', '2022-03-15 11:43:27', '2022-03-15 11:43:27'),
(30, 'SgGEDYPUJj99fktljukQA957lgPP3nADl3hvBkyR.jpg', 'SgGEDYPUJj99fktljukQA957lgPP3nADl3hvBkyR.jpg', '2022-03-15 11:45:15', '2022-03-15 11:45:15'),
(31, '4jmbfRKPY8n8BYgCb4a3Ez7drI2d8oAyhVldSb7j.jpg', '4jmbfRKPY8n8BYgCb4a3Ez7drI2d8oAyhVldSb7j.jpg', '2022-03-15 11:45:15', '2022-03-15 11:45:15'),
(32, 'RRmPn6rHs7nGe1cOSaZ4Lj13IAvFx0krVedbjCXs.jpg', 'RRmPn6rHs7nGe1cOSaZ4Lj13IAvFx0krVedbjCXs.jpg', '2022-03-15 11:48:05', '2022-03-15 11:48:05'),
(33, 'u3icNLKWsOp4nS0ZRCOV4Ypy8xnUr2g8e1NJlY59.jpg', 'u3icNLKWsOp4nS0ZRCOV4Ypy8xnUr2g8e1NJlY59.jpg', '2022-03-15 11:48:05', '2022-03-15 11:48:05'),
(34, 'yaiOXj3cHCt087xDoDdEw9UlFegKJIqTXK3oAQHY.jpg', 'yaiOXj3cHCt087xDoDdEw9UlFegKJIqTXK3oAQHY.jpg', '2022-03-15 11:49:17', '2022-03-15 11:49:17'),
(35, 'Q5NltoKZ7Z9Ui4aB09DhDaCeH4ECo5oj9txgbotB.jpg', 'Q5NltoKZ7Z9Ui4aB09DhDaCeH4ECo5oj9txgbotB.jpg', '2022-03-15 11:49:17', '2022-03-15 11:49:17'),
(36, '3AKrpe1VNS2w3yKD4whQT2eN1Rvy4Kflcgv3L9AN.jpg', '3AKrpe1VNS2w3yKD4whQT2eN1Rvy4Kflcgv3L9AN.jpg', '2022-03-15 11:50:44', '2022-03-15 11:50:44'),
(37, 'kvKotECSPMMPxHzaO0PkLNTBW4kgt88AuKVn8yiK.jpg', 'kvKotECSPMMPxHzaO0PkLNTBW4kgt88AuKVn8yiK.jpg', '2022-03-15 11:50:44', '2022-03-15 11:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_category_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `message`, `log_category_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com has logged in.', 2, NULL, '2022-03-14 22:46:11', '2022-03-14 22:46:11'),
(2, 'admin@mail.com has logged out.', 3, '127.0.0.1', '2022-03-14 22:50:48', '2022-03-14 22:50:48'),
(3, 'admin@mail.com has logged in.', 2, '127.0.0.1', '2022-03-14 22:50:53', '2022-03-14 22:50:53'),
(4, 'admin@mail.com has logged out.', 3, '127.0.0.1', '2022-03-14 22:53:43', '2022-03-14 22:53:43'),
(5, 'admin@mail.com has logged in.', 2, '127.0.0.1', '2022-03-14 22:53:51', '2022-03-14 22:53:51'),
(6, 'admin@mail.com has added\n            product ID 2 to cart.', 4, '127.0.0.1', '2022-03-14 22:53:58', '2022-03-14 22:53:58'),
(7, 'admin@mail.com has added\n            product ID 2 to cart.', 4, '127.0.0.1', '2022-03-14 22:53:59', '2022-03-14 22:53:59'),
(8, 'admin@mail.com has added\n            product ID 3 to cart.', 4, '127.0.0.1', '2022-03-14 23:29:39', '2022-03-14 23:29:39'),
(9, 'admin@mail.com has logged out.', 3, '127.0.0.1', '2022-03-14 23:59:10', '2022-03-14 23:59:10'),
(10, 'admin@mail.com has logged in.', 2, '127.0.0.1', '2022-03-15 00:22:02', '2022-03-15 00:22:02'),
(11, 'admin@mail.com has logged out.', 3, '127.0.0.1', '2022-03-15 00:22:07', '2022-03-15 00:22:07'),
(12, 'novi@mail.com has registered.', 1, '127.0.0.1', '2022-03-15 00:27:46', '2022-03-15 00:27:46'),
(13, 'admin@mail.com has logged in.', 2, '127.0.0.1', '2022-03-15 00:38:50', '2022-03-15 00:38:50'),
(14, 'admin@mail.com has added\n            product ID 12 to cart.', 4, '127.0.0.1', '2022-03-15 01:07:20', '2022-03-15 01:07:20'),
(15, 'Failed to authenticate on SMTP server with username \"furnishopinfo@gmail.com\" using 3 possible authenticators. Authenticator LOGIN returned Expected response code 235 but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. Lea', 5, '127.0.0.1', '2022-03-15 11:01:03', '2022-03-15 11:01:03'),
(16, 'Failed to authenticate on SMTP server with username \"furnishopinfo@gmail.com\" using 3 possible authenticators. Authenticator LOGIN returned Expected response code 235 but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. Lea', 5, '127.0.0.1', '2022-03-15 11:02:23', '2022-03-15 11:02:23'),
(17, 'admin@mail.com has logged in.', 2, '127.0.0.1', '2022-03-15 11:36:35', '2022-03-15 11:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `log_categories`
--

CREATE TABLE `log_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_categories`
--

INSERT INTO `log_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User Registration', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'User Login', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'User Logout', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Item Added To Cart', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Error', '2022-03-14 19:49:52', '2022-03-14 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `lookbooks`
--

CREATE TABLE `lookbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookbooks`
--

INSERT INTO `lookbooks` (`id`, `name`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Scandinavian Style Living Room', 3, '1685500.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Garden Living', 6, '629622.jpg', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Nude Bedroom Oasis', 1, 'wv6VXlrGlohIZA9dKxh16PCHs4PCqgK5r5Mxirpg.jpg', '2022-03-15 01:02:30', '2022-03-15 01:02:30'),
(4, 'Open-plan Dining Room', 2, 'lFY6Xqqw58HIy3H7Gi43DsKA9tvHs5IxVcq93ImE.jpg', '2022-03-15 11:51:59', '2022-03-15 11:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `lookbook_items`
--

CREATE TABLE `lookbook_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lookbook_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `position_x` int(11) NOT NULL,
  `position_y` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookbook_items`
--

INSERT INTO `lookbook_items` (`id`, `lookbook_id`, `product_id`, `position_x`, `position_y`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 60, 50, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 1, 4, 10, 70, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 1, 5, 40, 60, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 1, 6, 60, 10, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 1, 7, 40, 85, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 2, 8, 70, 65, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 2, 9, 58, 55, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 2, 10, 50, 70, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 2, 11, 40, 60, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 3, 1, 57, 35, '2022-03-15 01:09:05', '2022-03-15 01:09:05'),
(13, 3, 2, 15, 80, '2022-03-15 01:09:05', '2022-03-15 01:09:05'),
(14, 3, 12, 50, 70, '2022-03-15 01:09:05', '2022-03-15 01:09:05'),
(15, 4, 18, 65, 90, '2022-03-15 11:54:07', '2022-03-15 11:54:07'),
(16, 4, 17, 55, 60, '2022-03-15 11:54:07', '2022-03-15 11:54:07'),
(17, 4, 16, 50, 20, '2022-03-15 11:54:07', '2022-03-15 11:54:07'),
(18, 4, 15, 50, 45, '2022-03-15 11:54:07', '2022-03-15 11:54:07'),
(19, 4, 14, 23, 33, '2022-03-15 11:54:07', '2022-03-15 11:54:07'),
(20, 4, 13, 40, 20, '2022-03-15 11:54:07', '2022-03-15 11:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Shop', 'shop', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Lookbook', 'lookbook', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'More', NULL, NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Contact us', 'contact', 4, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 'About author', 'author', 4, '2022-03-14 19:49:52', '2022-03-14 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_03_08_153938_create_menus_table', 1),
(3, '2022_03_08_174154_create_roles_table', 1),
(4, '2022_03_08_180000_create_users_table', 1),
(5, '2022_03_08_213537_create_categories_table', 1),
(6, '2022_03_09_193945_create-collections-table', 1),
(7, '2022_03_09_194009_create-colors-table', 1),
(8, '2022_03_09_194056_create-products-table', 1),
(9, '2022_03_09_194127_create-category_product-table', 1),
(10, '2022_03_09_195154_create-color_product-table', 1),
(11, '2022_03_09_195504_create-images-table', 1),
(12, '2022_03_09_195525_create-product_image-table', 1),
(13, '2022_03_11_182752_create_carts_table', 1),
(14, '2022_03_12_131642_create_lookbooks_table', 1),
(15, '2022_03_12_131730_create_lookbook_items_table', 1),
(16, '2022_03_12_170801_create_slider_images_table', 1),
(17, '2022_03_13_105300_create_log_categories_table', 1),
(18, '2022_03_13_105315_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `collection_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `collection_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Lugano Double Dresser', 'The design is completed with beveled edges. This fine detail ensures harmony and brings an elegance and exclusivity to the expression. Close the doors and/or drawers with ease. With a built in soft close mechanism, the furniture is protected and will stay beautiful over time.', 599.00, 3, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Lugano Nightstand', 'Looking sleek, elegant and exclusive, Lugano will solve all your storage needs without breaking a sweat. Keep your books, chargers and bedroom knick-knacks neatly hidden in this nifty little nightstand that will put the finishing touch on your bedroom décor.', 299.00, 3, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Bergamo sofa with round lounging unit', 'Bergamo by Morten Georgsen is organic luxury made comfortable. Bergamo elegantly combines extraordinary individual comfort with an elegant esthetic. The result is a contemporary sofa with all-day comfort.', 3499.00, 1, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Charlotte armchair', 'Feel the warm embrace of the Charlotte armchair. Charlotte’s comfort, durability, and beautiful design allow it to easily finds its place in any room.', 799.00, 2, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 'Madrid Coffee Table', 'Clean lines and organic shapes come together in a floating design to make the Madrid table a sensory, vibrant piece for your interior. ', 199.00, 4, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 'Silent Art Gallery', 'A great piece of art can help give a room extra personality. This is your chance to balance your design, infuse it with colour and add personal flair.', 299.00, NULL, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 'Simple Rug', 'Front: 50% wool/50% tencel - Back: 70% cotton/30% fibre', 499.00, NULL, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 'Rome Ourdoor Sofa 2 seater', 'Get a comfortable place to enjoy the open air and transform your terrace into a contemporary living space with Rome.', 1599.00, 7, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 'Rome Ourdoor Sofa', 'Get a comfortable place to enjoy the open air and transform your terrace into a contemporary living space with Rome', 899.00, 7, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, 'Rome Coffee Table', 'Add an elegant centerpiece to your outdoor setting and keep food and drinks conveniently at hand.', 499.00, 7, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, 'Sydney Trolley', 'Much more than just a place to put down a bottle, the Sydney trolley is a statement in your home.', 799.00, 8, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 'Houston Bed with Storage', 'Relax and enjoy the comfort of Houston. The soft headboard and its elegant design details give your bed a welcoming look and great support whether you are sitting up or lounging with a book.', 1199.00, 9, 1, '2022-03-15 01:06:59', '2022-03-15 01:06:59'),
(13, 'Hana No Ma II Gallery', 'A great piece of art can help give a room extra personality. This is your chance to balance your design, infuse it with colour and add personal flair.', 499.00, NULL, 1, '2022-03-15 11:42:00', '2022-03-15 11:42:00'),
(14, 'Princeton Barstool', 'Elegance and comfort beautifully combine in the Princeton bar stool. The visual appeal of the bar stool invites you to explore how every curve adds both comfort and looks.', 299.00, 6, 1, '2022-03-15 11:43:27', '2022-03-15 11:43:27'),
(15, 'Augusta Table', 'The Augusta dining table presents a clear and undisguised play with shapes. The visible construction adds an air of lightness to the exclusive dining table with room for all.', 799.00, NULL, 1, '2022-03-15 11:45:15', '2022-03-15 11:45:15'),
(16, 'Aerial Pendant', 'Matt black metal; By Frandsen design studio', 299.00, NULL, 1, '2022-03-15 11:48:05', '2022-03-15 11:48:05'),
(17, 'Vienna Chair', 'Character, attitude and versatility united in a beautiful design expression. The Vienna chair distinctively combines creased lines, soft shapes and emphasised edges to ensure a comfortable and beautiful expression in you dining or working area.', 599.00, 10, 1, '2022-03-15 11:49:17', '2022-03-15 11:49:17'),
(18, 'Shangahi Rug', 'The handwoven Shanghai rug is the epitome of craftsmanship. In the weaving process, every pile of the rug has been manually dyed and cut to create a beautiful shimmering effect and stunning shades.', 999.00, NULL, 1, '2022-03-15 11:50:44', '2022-03-15 11:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 1, 2, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 2, 3, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 2, 4, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(5, 3, 5, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(6, 3, 6, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(7, 3, 7, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(8, 4, 8, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(9, 4, 9, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(10, 4, 10, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(11, 5, 11, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(12, 6, 12, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(13, 7, 13, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(14, 7, 14, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(15, 8, 15, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(16, 8, 16, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(17, 8, 17, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(18, 9, 18, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(19, 9, 19, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(20, 10, 20, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(21, 10, 21, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(22, 11, 22, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(23, 11, 23, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(24, 12, 24, '2022-03-15 01:06:59', '2022-03-15 01:06:59'),
(25, 12, 25, '2022-03-15 01:06:59', '2022-03-15 01:06:59'),
(26, 13, 26, '2022-03-15 11:42:00', '2022-03-15 11:42:00'),
(27, 13, 27, '2022-03-15 11:42:00', '2022-03-15 11:42:00'),
(28, 14, 28, '2022-03-15 11:43:27', '2022-03-15 11:43:27'),
(29, 14, 29, '2022-03-15 11:43:27', '2022-03-15 11:43:27'),
(30, 15, 30, '2022-03-15 11:45:15', '2022-03-15 11:45:15'),
(31, 15, 31, '2022-03-15 11:45:15', '2022-03-15 11:45:15'),
(32, 16, 32, '2022-03-15 11:48:05', '2022-03-15 11:48:05'),
(33, 16, 33, '2022-03-15 11:48:05', '2022-03-15 11:48:05'),
(34, 17, 34, '2022-03-15 11:49:17', '2022-03-15 11:49:17'),
(35, 17, 35, '2022-03-15 11:49:17', '2022-03-15 11:49:17'),
(36, 18, 36, '2022-03-15 11:50:44', '2022-03-15 11:50:44'),
(37, 18, 37, '2022-03-15 11:50:44', '2022-03-15 11:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Administrator', '2022-03-14 19:49:52', '2022-03-14 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `route`, `created_at`, `updated_at`) VALUES
(1, 'img1.jpg', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'img2.jpg', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'img3.jpg', NULL, '2022-03-14 19:49:52', '2022-03-14 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Korisnik', 'korisnik@mail.com', 'f5ebb11c65ce6bf63d43b88d1129c8ca', 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(2, 'Mihailo', 'Ilic', 'mihailo@mail.com', 'f5ebb11c65ce6bf63d43b88d1129c8ca', 1, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(3, 'Admin', 'Account', 'admin@mail.com', '2e33a9b0b06aa0a01ede70995674ee23', 2, '2022-03-14 19:49:52', '2022-03-14 19:49:52'),
(4, 'Novi', 'Korisnik', 'novi@mail.com', '7131df8fb707dd279161b9510235b645', 1, '2022-03-15 00:27:46', '2022-03-15 00:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_log_category_id_foreign` (`log_category_id`);

--
-- Indexes for table `log_categories`
--
ALTER TABLE `log_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookbooks`
--
ALTER TABLE `lookbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lookbooks_category_id_foreign` (`category_id`);

--
-- Indexes for table `lookbook_items`
--
ALTER TABLE `lookbook_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lookbook_items_lookbook_id_foreign` (`lookbook_id`),
  ADD KEY `lookbook_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_foreign` (`parent`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `products_collection_id_foreign` (`collection_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`),
  ADD KEY `product_image_image_id_foreign` (`image_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log_categories`
--
ALTER TABLE `log_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lookbooks`
--
ALTER TABLE `lookbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lookbook_items`
--
ALTER TABLE `lookbook_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_log_category_id_foreign` FOREIGN KEY (`log_category_id`) REFERENCES `log_categories` (`id`);

--
-- Constraints for table `lookbooks`
--
ALTER TABLE `lookbooks`
  ADD CONSTRAINT `lookbooks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `lookbook_items`
--
ALTER TABLE `lookbook_items`
  ADD CONSTRAINT `lookbook_items_lookbook_id_foreign` FOREIGN KEY (`lookbook_id`) REFERENCES `lookbooks` (`id`),
  ADD CONSTRAINT `lookbook_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
