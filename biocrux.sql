-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2025 at 04:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biocrux`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin_qr`
--

CREATE TABLE `bin_qr` (
  `id` bigint UNSIGNED NOT NULL,
  `bottler_id` int DEFAULT NULL,
  `machine_id` int DEFAULT NULL,
  `uniq_id` longtext COLLATE utf8mb4_unicode_ci,
  `bin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_images` longtext COLLATE utf8mb4_unicode_ci,
  `bin_qr_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bin_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bin_otp` int DEFAULT NULL,
  `store_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bin_status` tinyint DEFAULT '0' COMMENT '0=Inactive, 1=Active',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bin_qr`
--

INSERT INTO `bin_qr` (`id`, `bottler_id`, `machine_id`, `uniq_id`, `bin_name`, `qr_images`, `bin_qr_url`, `bin_mobile`, `other_mobile`, `bin_otp`, `store_code`, `store_manager`, `format`, `bin_status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 2000335, NULL, 'aryan', NULL, NULL, '7495387853', '9853765387', NULL, 'snv sfjhfs', 'Sachin', 'snhjs sfhjfs', 1, NULL, NULL, NULL, NULL, '2025-05-23 17:54:17', '2025-05-23 17:54:17'),
(2, 6, 2000335, NULL, 'aryan', NULL, NULL, '7495387853', '9853765387', NULL, 'snv sfjhfs', 'Sachin', 'snhjs sfhjfs', 1, NULL, NULL, NULL, NULL, '2025-05-23 17:57:50', '2025-05-23 17:57:50'),
(3, 6, 2000335, NULL, 'aryan', NULL, NULL, '7495387853', '9853765387', NULL, 'snv sfjhfs', 'Sachin', 'snhjs sfhjfs', 1, NULL, NULL, NULL, NULL, '2025-05-23 18:14:25', '2025-05-23 18:14:25'),
(4, 9, 2000335, NULL, 'hfds sjgfs', NULL, NULL, '9875376737', '6968657774', NULL, 'fdsf fssfd', 'Fssf Vx', 'sfsfs fsfs', 1, NULL, NULL, NULL, NULL, '2025-05-24 02:25:49', '2025-05-24 02:25:49'),
(5, 9, 2000335, NULL, 'hfds sjgfs', NULL, NULL, '9875376737', '6968657774', NULL, 'fdsf fssfd', 'Fssf Vx', 'sfsfs fsfs', 1, NULL, NULL, NULL, NULL, '2025-05-24 02:56:31', '2025-05-24 02:56:31'),
(6, 9, 2000335, NULL, 'hfds sjgfs', NULL, NULL, '9875376737', '6968657774', NULL, 'fdsf fssfd', 'Fssf Vx', 'sfsfs fsfs', 1, NULL, NULL, NULL, NULL, '2025-05-24 02:58:59', '2025-05-24 02:58:59'),
(7, 7, 2000335, NULL, 'nbfhgfnj', NULL, NULL, '7987965876', '9898787687', NULL, 'gfghf jghjg', 'Hgyfhgn', 'hgfhgf jgg', 1, NULL, NULL, NULL, NULL, '2025-05-24 14:12:14', '2025-05-24 14:12:14'),
(8, 7, 2000335, NULL, 'nbfhgfnj', NULL, NULL, '7987965876', '9898787687', NULL, 'gfghf jghjg', 'Hgyfhgn', 'hgfhgf jgg', 1, NULL, NULL, NULL, NULL, '2025-05-24 14:14:09', '2025-05-24 14:14:09'),
(9, 7, 2000335, NULL, 'nbfhgfnj', NULL, NULL, '7987965876', '9898787687', NULL, 'gfghf jghjg', 'Hgyfhgn', 'hgfhgf jgg', 1, NULL, NULL, NULL, NULL, '2025-05-24 14:16:39', '2025-05-24 14:16:39'),
(10, 7, 2000335, NULL, 'nbfhgfnj', NULL, NULL, '7987965876', '9898787687', NULL, 'gfghf jghjg', 'Hgyfhgn', 'hgfhgf jgg', 1, NULL, NULL, NULL, NULL, '2025-05-24 14:18:45', '2025-05-24 14:18:45'),
(11, 4, 2000335, NULL, 'archana', NULL, NULL, '9875398753', '8875376985', NULL, 'nfsbfs', 'Vdnbfs', 'DNMBD', 1, NULL, NULL, NULL, NULL, '2025-05-27 01:50:50', '2025-05-27 01:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `bottler_masters`
--

CREATE TABLE `bottler_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `bottler_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` longtext COLLATE utf8mb4_unicode_ci,
  `machine_logo` longtext COLLATE utf8mb4_unicode_ci,
  `bottle_logo` longtext COLLATE utf8mb4_unicode_ci,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottler_detail_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Enable, 0=Disable',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bottler_masters`
--

INSERT INTO `bottler_masters` (`id`, `bottler_name`, `company_logo`, `machine_logo`, `bottle_logo`, `color_code`, `company_url`, `company_name`, `bottler_detail_type`, `created_by`, `updated_by`, `deleted_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola', './uploads/Naran/03-2023/vecteezy_co.jpg', './uploads/machine_logo/01-2023/machine.png', './uploads/bottle_logo/01-2023/cola_bottle.png', '#cb1515', 'coca-cola-dashboard', 'Coca Cola', 'machine', '1', '1', NULL, 1, NULL, '2022-12-07 11:32:24', '2025-05-13 13:02:30'),
(4, 'Bisleri', './uploads/Naran/01-2023/about-main_.png', '', '', '#e2f109', 'bisleri-dashboard', 'Bisleri', NULL, '1', '1', NULL, 1, NULL, '2023-01-18 04:50:21', '2025-05-13 06:33:49'),
(5, 'Pepsi', '', '', '', '#101dd5', 'pepsi-dashboard', 'Pepsi', 'machine', '1', '0', NULL, 1, NULL, '2023-01-18 04:37:15', '2025-05-19 08:48:33'),
(6, 'test bottler', './uploads/Naran/01-2023/blog-img5.jpg', '', '', '#382c63', 'test-bottler-dashboard', 'Test bottler', NULL, '1', '0', NULL, 0, NULL, '2023-01-24 05:01:07', NULL),
(7, 'tester', './uploads/Naran/01-2023/bottle_mach.png', '', '', '#a28181', 'tester-dashboard', 'tester', NULL, '1', '0', NULL, 0, NULL, '2023-01-27 03:49:22', '2025-05-13 06:30:38'),
(9, 'fanta', './uploads/Naran/02-2023/cola_bottle.png', './uploads/machine_logo/02-2023/default_mac.png', './uploads/bottle_logo/02-2023/default_bot.png', '#d51010', 'fanta-dashboard', 'fanta', NULL, '1', '0', NULL, 0, NULL, '2023-02-04 03:51:01', '2025-05-13 06:29:30'),
(10, 'Loreal India Pvt Ltd', './uploads/Naran/03-2023/Garnier-Log.png', './uploads/machine_logo/03-2023/Garnier-2.jpg', '', '#4e7a27', 'loreal-india-pvt-ltd-dashboard', 'Loreal India Pvt Ltd', 'sub_botler', '1', '1', NULL, 1, NULL, '2023-03-04 05:41:40', '2025-05-14 12:36:39'),
(11, 'D-Mart', '', './uploads/machine_logo/04-2023/VPM.png', '', '#31d510', 'avenue-super-market-ltd--dashboard', 'Avenue Super Market LTD', 'sub_botler', '1', '1', NULL, 1, NULL, '2023-04-10 07:24:51', '2025-05-13 06:28:59'),
(13, 'My Coca Water', '/uploads/1747050248-company_logo-pdffile.pdf', '/uploads/1747050248-machine_logo-solo-leveling-game-3840x2160-17908.jpeg', '/uploads/1747050248-bottle_logo-solo-leveling-game-3840x2160-17908 (1).jpeg', '#550738', 'my-coca-water', 'My Coca Water', 'machine', '1', NULL, NULL, 1, NULL, '2025-05-12 11:44:08', '2025-05-13 06:27:00'),
(14, 'My Pepsi Water', '/uploads/1747050568-company_logo-pdffile.pdf', '/uploads/1747050568-machine_logo-solo-leveling-game-3840x2160-17908.jpeg', '/uploads/1747050568-bottle_logo-2017.png', '#3c083f', 'my-pepsi-water', 'My Pepsi Water', 'sub_botler', '1', NULL, NULL, 1, NULL, '2025-05-12 11:49:28', '2025-05-13 06:32:10'),
(15, 'Fatima Co-oparetive', 'uploads/1747115071_6822dc3f03c30.jpeg', 'uploads/1747115071_machine_6822dc3f04175.png', 'uploads/1747115071_bottle_6822dc3f046d0.pdf', '#08164f', 'fatima-ltd-dashboard', 'Fatima Ltd', 'machine', '1', NULL, NULL, 1, NULL, '2025-05-13 04:34:35', '2025-05-13 11:42:36'),
(16, 'Tehshin Bano', 'uploads/1747390040-company_logo-pdffile.pdf', 'uploads/1747390040-machine_logo-solo-leveling-game-3840x2160-17908.jpeg', 'uploads/1747390040-bottle_logo-2022.png', '#1452a3', 'tehshin-org-dashboard', 'Tehshin Org', NULL, '1', NULL, NULL, 1, NULL, '2025-05-16 10:07:20', '2025-05-16 10:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `userId` int DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `userId`, `action`, `function`, `data`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 05:15:52', '2025-05-07 05:15:52'),
(2, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 05:32:05', '2025-05-07 05:32:05'),
(3, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 05:51:36', '2025-05-07 05:51:36'),
(4, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 05:51:50', '2025-05-07 05:51:50'),
(5, 2, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 05:52:21', '2025-05-07 05:52:21'),
(6, 2, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 05:54:14', '2025-05-07 05:54:14'),
(7, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 05:54:48', '2025-05-07 05:54:48'),
(8, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 05:55:03', '2025-05-07 05:55:03'),
(9, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 06:04:46', '2025-05-07 06:04:46'),
(10, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 06:42:02', '2025-05-07 06:42:02'),
(11, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 07:02:28', '2025-05-07 07:02:28'),
(12, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 08:11:11', '2025-05-07 08:11:11'),
(13, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 08:13:07', '2025-05-07 08:13:07'),
(14, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 09:25:32', '2025-05-07 09:25:32'),
(15, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 09:25:48', '2025-05-07 09:25:48'),
(16, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-07 09:25:55', '2025-05-07 09:25:55'),
(17, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-07 09:26:12', '2025-05-07 09:26:12'),
(18, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-08 05:46:59', '2025-05-08 05:46:59'),
(19, 1, 'Logout', 'logout', 'Logout', '127.0.0.1', '2025-05-08 05:49:00', '2025-05-08 05:49:00'),
(20, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-08 05:49:07', '2025-05-08 05:49:07'),
(21, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-08 13:17:34', '2025-05-08 13:17:34'),
(22, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-10 01:31:12', '2025-05-10 01:31:12'),
(23, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-12 04:16:59', '2025-05-12 04:16:59'),
(24, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-12 07:11:54', '2025-05-12 07:11:54'),
(25, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-12 10:09:35', '2025-05-12 10:09:35'),
(26, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-13 04:12:53', '2025-05-13 04:12:53'),
(27, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-13 05:34:20', '2025-05-13 05:34:20'),
(28, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-13 09:33:20', '2025-05-13 09:33:20'),
(29, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-13 11:30:43', '2025-05-13 11:30:43'),
(30, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-13 12:58:03', '2025-05-13 12:58:03'),
(31, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-14 04:35:26', '2025-05-14 04:35:26'),
(32, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-14 06:24:46', '2025-05-14 06:24:46'),
(33, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-14 09:25:21', '2025-05-14 09:25:21'),
(34, 4, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-14 09:51:04', '2025-05-14 09:51:04'),
(35, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-14 13:00:30', '2025-05-14 13:00:30'),
(36, 1, 'Login', 'login', 'Login', '127.0.0.1', '2025-05-16 04:28:33', '2025-05-16 04:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `machine_assign_bottler`
--

CREATE TABLE `machine_assign_bottler` (
  `id` bigint UNSIGNED NOT NULL,
  `bottler_id` bigint DEFAULT NULL COMMENT 'Foreign key from botler_master table',
  `machine_id` bigint DEFAULT NULL COMMENT 'Foreign key from machine_master table',
  `assigned_by` bigint DEFAULT NULL COMMENT 'Foreign key from users table',
  `assigned` tinyint NOT NULL DEFAULT '1' COMMENT '1=Assigned, 0=Not Assigned',
  `assign_to_sub_machine` tinyint NOT NULL DEFAULT '0' COMMENT '0=Not Assigned, 1=Assigned',
  `created_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `updated_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `deleted_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_assign_bottler`
--

INSERT INTO `machine_assign_bottler` (`id`, `bottler_id`, `machine_id`, `assigned_by`, `assigned`, `assign_to_sub_machine`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 1, 1, 1, 1, NULL, NULL, NULL, '2025-05-17 12:58:19', '2025-05-19 07:34:41'),
(5, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, '2025-05-17 12:58:31', '2025-05-19 07:35:08'),
(6, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, '2025-05-17 12:58:43', '2025-05-19 05:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `machine_assign_sub_bottler`
--

CREATE TABLE `machine_assign_sub_bottler` (
  `id` bigint UNSIGNED NOT NULL,
  `bottler_id` bigint DEFAULT NULL COMMENT 'Foreign key from botler_master table',
  `sub_bottler_id` bigint DEFAULT NULL COMMENT 'Foreign key from sub_bottler_master table',
  `machine_id` bigint DEFAULT NULL COMMENT 'Foreign key from machine_master table',
  `assigned_by` bigint DEFAULT NULL COMMENT 'Foreign key from users table',
  `created_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `updated_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `deleted_by` tinyint DEFAULT NULL COMMENT 'Foreign key from users table',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_assign_sub_bottler`
--

INSERT INTO `machine_assign_sub_bottler` (`id`, `bottler_id`, `sub_bottler_id`, `machine_id`, `assigned_by`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 1, 1, NULL, NULL, NULL, '2025-05-19 05:22:38', NULL),
(4, 1, 3, 3, 1, 1, NULL, NULL, NULL, '2025-05-19 07:34:41', NULL),
(5, 1, 4, 1, 1, 1, NULL, NULL, NULL, '2025-05-19 07:35:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machine_masters`
--

CREATE TABLE `machine_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `machine_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Machine name',
  `machine_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Machine number',
  `machine_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Machine code',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'state name',
  `installed` tinyint DEFAULT NULL COMMENT '	0=not installed, 1=installed',
  `assigned_to_botler` tinyint DEFAULT '0' COMMENT '0=Not Assigned, 1=Assigned',
  `machine_image` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` tinyint DEFAULT NULL COMMENT 'User ID who created the record',
  `updated_by` tinyint DEFAULT NULL COMMENT 'User ID who updated the record',
  `deleted_by` tinyint DEFAULT NULL COMMENT 'User ID who deleted the record',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'Soft delete column',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_masters`
--

INSERT INTO `machine_masters` (`id`, `machine_name`, `machine_number`, `machine_code`, `address`, `latitude`, `longitude`, `pincode`, `city`, `state`, `installed`, `assigned_to_botler`, `machine_image`, `created_by`, `updated_by`, `deleted_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bio Machine', '2000334', '2000334', 'Silliguri Railway Station NJP', '88.3953° E', '26.7271° N', '110018', 'Silliguri', 'WEST BENGAL', 0, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-05-17 12:58:31'),
(2, 'Bio Chemical', '2000335', '2000335', 'Lucknow Railway Station NJP', '57.3953° E', '19.7271° N', '226006', 'Lucknow', 'U.P', 0, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-05-17 12:58:43'),
(3, 'Machine Chemical', '2000385', '2000385', 'Delhi Railway Station NJP', '57.3953° E', '19.7271° N', '226006', 'New Delhi', 'Delhi', 0, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-05-17 12:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_04_07_104846_create_roles_table', 1),
(3, '2022_06_27_065933_create_users_table', 1),
(4, '2023_12_07_115925_create_logs_table', 1),
(5, '2023_12_08_071751_create_permissions_table', 1),
(6, '2023_12_08_071803_create_rolepermissions_table', 1),
(7, '2023_12_08_071812_create_userpermissions_table', 1),
(11, '2025_05_10_130552_create_bottler_masters_table', 2),
(12, '2025_05_12_120755_create_sub_bottler_master_table', 3),
(13, '2025_05_12_180503_add_bottler_detail_type', 4),
(14, '2025_05_12_125106_create_machine_assign_bottler_table', 5),
(15, '2025_05_12_125039_create_machine_assign_sub_bottler_table', 6),
(16, '2025_05_16_131150_create_machine_masters_table', 7),
(17, '2025_05_16_170414_create_logs_table', 8),
(18, '2025_05_21_160350_create_bin_qr_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `panel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `query_perform`
--

CREATE TABLE `query_perform` (
  `id` bigint UNSIGNED NOT NULL,
  `model_id` bigint NOT NULL COMMENT 'The ID of the model instance',
  `user_id` bigint NOT NULL COMMENT 'The ID of the user who performed the action',
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The model on which the action was performed',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The action performed',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The IP address of the user',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'create, update, delete',
  `changes` text COLLATE utf8mb4_unicode_ci COMMENT 'The changes made during the action',
  `old_values` text COLLATE utf8mb4_unicode_ci COMMENT 'The old values before the action',
  `new_values` text COLLATE utf8mb4_unicode_ci COMMENT 'The new values after the action',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, success, failed',
  `error_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Any error message if the action failed',
  `error_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Any error code if the action failed',
  `error_trace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The error trace if the action failed',
  `context` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Additional context for the log entry',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The user who created the log entry',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The user who updated the log entry',
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'The user who deleted the log entry',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE `rolepermissions` (
  `id` bigint UNSIGNED NOT NULL,
  `roleSlug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panelFlag` tinyint(1) NOT NULL DEFAULT '0',
  `appFlag` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `panelFlag`, `appFlag`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'GOPL', 'gopl', 1, 1, 1, NULL, '2025-05-07 05:15:18', NULL),
(2, 'Biocrux', 'biocrux', 1, 1, 1, NULL, '2025-05-07 05:15:18', NULL),
(3, 'Report Manager', 'report_manager', 1, 1, 1, NULL, '2025-05-07 05:15:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_bottler_master`
--

CREATE TABLE `sub_bottler_master` (
  `id` bigint UNSIGNED NOT NULL,
  `bottler_id` bigint DEFAULT NULL COMMENT 'Foreign key from botler_master table',
  `group_id` bigint DEFAULT NULL COMMENT 'Foreign key from group id table',
  `sub_bottler_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` longtext COLLATE utf8mb4_unicode_ci,
  `machine_logo` longtext COLLATE utf8mb4_unicode_ci,
  `bottle_logo` longtext COLLATE utf8mb4_unicode_ci,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Enable, 0=Disable',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_bottler_master`
--

INSERT INTO `sub_bottler_master` (`id`, `bottler_id`, `group_id`, `sub_bottler_name`, `company_logo`, `machine_logo`, `bottle_logo`, `color_code`, `company_url`, `company_name`, `created_by`, `updated_by`, `deleted_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Bengal Beverage', 'http://127.0.0.1:9000/storage/http://127.0.0.1:9000/storage/http://127.0.0.1:9000/storage/./uploads/Coca cola/01-2023/image.jpg', NULL, NULL, '#240641', 'bengal-beverage-head-dashboard', 'Bengal Beverage Head', '6', '1', NULL, 1, NULL, '2023-01-18 05:57:43', '2025-05-17 08:10:51'),
(2, 1, NULL, 'CocaCola India', './uploads/Coca cola/01-2023/slide-img3.jpg', NULL, NULL, '#d82222', 'cocacola-india-dashboard', 'CocaCola India', '6', NULL, NULL, 1, NULL, '2023-01-18 06:07:33', NULL),
(3, 1, NULL, 'HCCB', '', NULL, NULL, '#23cd83', 'hccb-dashboard', 'HCCB', '6', '1', NULL, 1, NULL, '2023-01-18 06:08:03', '2023-02-21 11:50:00'),
(4, 1, NULL, 'Enrich', './uploads/Coca cola/01-2023/inorbit_mal.jpg', NULL, NULL, '#8c1818', 'enrich-dashboard', 'Enrich', '6', NULL, NULL, 1, NULL, '2023-01-18 06:08:31', NULL),
(5, 1, NULL, 'SLMG', './uploads/Coca cola/01-2023/arrey_milk_.jpg', NULL, NULL, '#26e5f2', 'slmg-dashboard', 'SLMG', '6', NULL, NULL, 1, NULL, '2023-01-18 06:09:04', NULL),
(6, 4, NULL, 'Bisleri India', './uploads/Bisleri/01-2023/blue-bag.png', NULL, NULL, '#10e059', 'bisleri-india-dashboard', 'Bisleri India', '7', NULL, NULL, 1, NULL, '2023-01-24 00:05:57', NULL),
(7, 1, NULL, 'CocaCola test', './uploads/Naran/02-2023/2023-01-27_.png', NULL, NULL, '#d51010', 'coca-test-dashboard', 'coca test', '1', '1', NULL, 0, NULL, '2023-02-03 03:51:51', '2023-02-03 05:07:28'),
(8, 4, NULL, 'Bisleri test', './uploads/Naran/02-2023/inorbit_mal.jpg', NULL, NULL, '#d51010', 'bisleri-test-dashboard', 'bisleri test', '1', NULL, NULL, 1, NULL, '2023-02-03 04:46:40', NULL),
(12, 9, NULL, 'fanta india', './uploads/Naran/02-2023/default_mac.png', NULL, NULL, '#603939', 'fanta-india-dashboard', 'fanta india', '1', NULL, NULL, 1, NULL, '2023-02-04 03:56:05', NULL),
(13, 9, NULL, 'fanta india2', '', NULL, NULL, '#523232', 'fanta-india2-dashboard', 'fanta india2', '1', NULL, NULL, 1, NULL, '2023-02-04 03:56:57', NULL),
(16, 1, NULL, 'Abhi', 'http://127.0.0.1:9000/storage/uploads/1747231097-company_logo-solo-leveling-game-3840x2160-17908.jpeg', 'uploads/1747231098-machine_logo-about-paw-desktop-new.png', 'uploads/1747231098-bottle_logo-pdffile.pdf', '#480a2b', 'company-data-dashboard', 'Company Data', '1', '1', NULL, 1, NULL, '2025-05-14 13:58:18', '2025-05-16 06:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `userpermissions`
--

CREATE TABLE `userpermissions` (
  `id` bigint UNSIGNED NOT NULL,
  `userId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottler_id` int DEFAULT NULL,
  `sub_bottler_id` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgot_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profileImage`, `name`, `phone`, `email`, `password`, `default_password`, `username`, `temp_password`, `bottler_id`, `sub_bottler_id`, `address`, `dob`, `contact_no`, `personal_no`, `user_about`, `forgot_token`, `created_by`, `updated_by`, `deleted_by`, `role`, `api_token`, `login_status`, `status`, `deleted_at`, `created_at`, `updated_at`, `last_activity`) VALUES
(1, NULL, 'GOPL', '9415058209', 'gopl@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'GOPL', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GOPL', '24caa0f60871a9d6e7b8bc4163c15cb3', 0, 1, NULL, '2025-05-07 05:15:18', '2025-06-14 17:21:55', NULL),
(2, NULL, 'Biocrux', '9882724572', 'biocrux@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'Biocrux', NULL, 1, 2, 'Dajyda', NULL, '9882724572', '8538753975', '', NULL, NULL, 1, NULL, 'Biocrux', '11853fac22fa9b8193b92d10b4d74e85', 0, 1, NULL, '2025-05-07 05:15:18', '2025-06-14 17:35:14', '2025-06-17 19:01:42'),
(9, NULL, 'Aryan Mishra', '9864798776', 'aryan@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'Aryan Mishra', NULL, 1, 3, 'New Delhi', NULL, '9864798776', '9874846753', 'Vsfsfs Fs', NULL, 1, NULL, NULL, 'Biocrux', NULL, 0, 1, NULL, '2025-05-14 10:10:33', NULL, NULL),
(10, NULL, 'Tabassum Fatima', '9537875387', 'tabassum.ahmed@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'Tabassum Fatima', NULL, 1, 5, 'Lucknow', NULL, '9537875387', '9853753753', 'Fsfs Fsfs', NULL, 1, 1, NULL, 'Report Manager', NULL, 0, 1, NULL, '2025-05-14 10:12:42', '2025-05-16 07:04:52', NULL),
(11, NULL, 'Sabia Hussain', '9354675837', 'sabia.hussain@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'Sabia Hussain', NULL, 1, 5, 'Fsfs Fshsfhfs', NULL, '9354675837', '9898739759', 'Fshgfs Fsjgfs', NULL, 1, NULL, NULL, 'Report Manager', NULL, 0, 1, NULL, '2025-05-17 07:22:09', NULL, NULL),
(12, NULL, 'Shamrin Ahmed', '9245724657', 'shamrin.hussain@gmail.com', '$2y$10$A7lifRMqyxiaCH7q/4vZaOU4fWI9zkcomjrZRcVnTf9uCsSBHKUoe', 'admin', 'Shamrin Ahmed', NULL, 1, 3, 'Fdsnhgs Fdyuw', NULL, '9245724657', '9484974764', 'Fsfshg Fshjgfn Eqyugeq Eqjygtfd', NULL, 1, 1, NULL, 'Report Manager', NULL, 0, 1, NULL, '2025-05-17 08:05:46', '2025-05-17 08:06:32', NULL),
(13, NULL, 'Shamrin', '9864767665', 'fatima@gmail.com', '$2y$10$3NceeKWEXqPi1xiiEtEAAuJ.fq6vQwnyz7mds29ZVb3uMBFLNb1ke', 'admin', 'Shamrin', NULL, 1, 3, 'Dada', NULL, '9864767665', '9874846753', 'Dada', NULL, 1, NULL, NULL, 'Biocrux', 'bafbf80037452be7f84f7f483f62cda4', 0, 1, NULL, '2025-05-19 15:06:32', '2025-05-19 15:12:10', NULL),
(14, NULL, 'Fatima Ahmed Sub', '9987763878', 'fatima.ahmed.sub@gmail.com', '$2y$10$8HZvlefyZhM2YouJgWzY..lpUYRZoEDIp2dEfHuQDdO3WCPw2Uw56', 'admin', 'Fatima Ahmed Sub', NULL, 1, 3, 'Fsgdsgds', NULL, '9987763878', '9875387775', 'Fsfs', NULL, 1, NULL, NULL, 'Report Manager', NULL, 0, 1, NULL, '2025-05-19 15:11:37', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bin_qr`
--
ALTER TABLE `bin_qr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bottler_masters`
--
ALTER TABLE `bottler_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_assign_bottler`
--
ALTER TABLE `machine_assign_bottler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_assign_sub_bottler`
--
ALTER TABLE `machine_assign_sub_bottler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_masters`
--
ALTER TABLE `machine_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `query_perform`
--
ALTER TABLE `query_perform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `sub_bottler_master`
--
ALTER TABLE `sub_bottler_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpermissions`
--
ALTER TABLE `userpermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bin_qr`
--
ALTER TABLE `bin_qr`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bottler_masters`
--
ALTER TABLE `bottler_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `machine_assign_bottler`
--
ALTER TABLE `machine_assign_bottler`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `machine_assign_sub_bottler`
--
ALTER TABLE `machine_assign_sub_bottler`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `machine_masters`
--
ALTER TABLE `machine_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `query_perform`
--
ALTER TABLE `query_perform`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_bottler_master`
--
ALTER TABLE `sub_bottler_master`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userpermissions`
--
ALTER TABLE `userpermissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
