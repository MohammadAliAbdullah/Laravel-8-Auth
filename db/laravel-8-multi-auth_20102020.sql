-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 03:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-8-multi-auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_code` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_type_id` int(10) UNSIGNED NOT NULL,
  `parent_code` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephoe` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_start` date NOT NULL,
  `branch_end` date DEFAULT NULL,
  `area_code` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `organization_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `name`, `branch_type_id`, `parent_code`, `address`, `telephoe`, `email`, `website`, `branch_start`, `branch_end`, `area_code`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `organization_id`) VALUES
(1, NULL, 'Akota Enterprise', 1, 1, 'Motalab Plaza, Hatirpool, Dhanmondi, Dhaka', 1849378511, 'akotaentp@gmail.com', 'www.akotaentp.com', '2020-01-01', NULL, NULL, 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_types`
--

CREATE TABLE `branch_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_types`
--

INSERT INTO `branch_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'head_office', 'Head Office', 1, NULL, NULL, 1, 1, NULL),
(2, 'branch_office', 'Branch Office', 1, NULL, NULL, 1, 1, NULL),
(3, 'project_office', 'Project Office', 1, NULL, NULL, 1, 1, NULL),
(4, 'wear_house', 'Wear Office', 1, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(26, '2020_10_15_030023_create_sessions_table', 2),
(36, '2020_10_18_143639_create_roles_table', 3),
(37, '2020_10_19_063314_create_permissions_table', 3),
(40, '2020_10_19_153449_create_branch_types_table', 5),
(42, '2020_10_19_141036_create_organizations_table', 6),
(43, '2020_10_19_135352_create_branches_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_code` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephoe` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_month` date NOT NULL,
  `financial_year` year(4) NOT NULL,
  `current_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_code`, `name`, `address`, `telephoe`, `email`, `website`, `meto`, `logo`, `financial_month`, `financial_year`, `current_date`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, NULL, 'Akota Enterprise', 'Motalab Plaza, Hatirpool, Dhanmondi, Dhaka', 1849378511, 'akotaentp@gmail.com', 'www.akotaentp.com', NULL, NULL, '2020-01-01', 2020, '2020-01-01', 1, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `branch_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `branch_id`, `organization_id`, `deleted_at`) VALUES
(1, 'read-admin-panel', 'Read Admin Panel', 'Read Admin Panel', 1, '2020-10-16 19:33:33', '2020-10-16 19:33:33', 1, 1, 10000, 10000, NULL),
(2, 'read-api', 'Read Api', 'Read Api', 1, '2020-10-16 19:33:34', '2020-10-16 19:33:34', 1, 1, 10000, 10000, NULL),
(3, 'create-auth-permissions', 'Create Auth Permissions', 'Create Auth Permissions', 1, '2020-10-16 19:33:34', '2020-10-16 19:33:34', 1, 1, 10000, 10000, NULL),
(4, 'read-auth-permissions', 'Read Auth Permissions', 'Read Auth Permissions', 1, '2020-10-16 19:33:34', '2020-10-16 19:33:34', 1, 1, 10000, 10000, NULL),
(5, 'update-auth-permissions', 'Update Auth Permissions', 'Update Auth Permissions', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(6, 'delete-auth-permissions', 'Delete Auth Permissions', 'Delete Auth Permissions', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(7, 'read-auth-profile', 'Read Auth Profile', 'Read Auth Profile', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(8, 'update-auth-profile', 'Update Auth Profile', 'Update Auth Profile', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(9, 'create-auth-roles', 'Create Auth Roles', 'Create Auth Roles', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(10, 'read-auth-roles', 'Read Auth Roles', 'Read Auth Roles', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(11, 'update-auth-roles', 'Update Auth Roles', 'Update Auth Roles', 1, '2020-10-16 19:33:35', '2020-10-16 19:33:35', 1, 1, 10000, 10000, NULL),
(12, 'delete-auth-roles', 'Delete Auth Roles', 'Delete Auth Roles', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(13, 'create-auth-users', 'Create Auth Users', 'Create Auth Users', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(14, 'read-auth-users', 'Read Auth Users', 'Read Auth Users', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(15, 'update-auth-users', 'Update Auth Users', 'Update Auth Users', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(16, 'delete-auth-users', 'Delete Auth Users', 'Delete Auth Users', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(17, 'create-banking-accounts', 'Create Banking Accounts', 'Create Banking Accounts', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(18, 'read-banking-accounts', 'Read Banking Accounts', 'Read Banking Accounts', 1, '2020-10-16 19:33:36', '2020-10-16 19:33:36', 1, 1, 10000, 10000, NULL),
(19, 'update-banking-accounts', 'Update Banking Accounts', 'Update Banking Accounts', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(20, 'delete-banking-accounts', 'Delete Banking Accounts', 'Delete Banking Accounts', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(21, 'create-banking-reconciliations', 'Create Banking Reconciliations', 'Create Banking Reconciliations', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(22, 'read-banking-reconciliations', 'Read Banking Reconciliations', 'Read Banking Reconciliations', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(23, 'update-banking-reconciliations', 'Update Banking Reconciliations', 'Update Banking Reconciliations', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(24, 'delete-banking-reconciliations', 'Delete Banking Reconciliations', 'Delete Banking Reconciliations', 1, '2020-10-16 19:33:37', '2020-10-16 19:33:37', 1, 1, 10000, 10000, NULL),
(25, 'create-banking-transactions', 'Create Banking Transactions', 'Create Banking Transactions', 1, '2020-10-16 19:33:38', '2020-10-16 19:33:38', 1, 1, 10000, 10000, NULL),
(26, 'read-banking-transactions', 'Read Banking Transactions', 'Read Banking Transactions', 1, '2020-10-16 19:33:38', '2020-10-16 19:33:38', 1, 1, 10000, 10000, NULL),
(27, 'update-banking-transactions', 'Update Banking Transactions', 'Update Banking Transactions', 1, '2020-10-16 19:33:38', '2020-10-16 19:33:38', 1, 1, 10000, 10000, NULL),
(28, 'delete-banking-transactions', 'Delete Banking Transactions', 'Delete Banking Transactions', 1, '2020-10-16 19:33:38', '2020-10-16 19:33:38', 1, 1, 10000, 10000, NULL),
(29, 'create-banking-transfers', 'Create Banking Transfers', 'Create Banking Transfers', 1, '2020-10-16 19:33:38', '2020-10-16 19:33:38', 1, 1, 10000, 10000, NULL),
(30, 'read-banking-transfers', 'Read Banking Transfers', 'Read Banking Transfers', 1, '2020-10-16 19:33:39', '2020-10-16 19:33:39', 1, 1, 10000, 10000, NULL),
(31, 'update-banking-transfers', 'Update Banking Transfers', 'Update Banking Transfers', 1, '2020-10-16 19:33:39', '2020-10-16 19:33:39', 1, 1, 10000, 10000, NULL),
(32, 'delete-banking-transfers', 'Delete Banking Transfers', 'Delete Banking Transfers', 1, '2020-10-16 19:33:39', '2020-10-16 19:33:39', 1, 1, 10000, 10000, NULL),
(33, 'create-common-companies', 'Create Common Companies', 'Create Common Companies', 1, '2020-10-16 19:33:39', '2020-10-16 19:33:39', 1, 1, 10000, 10000, NULL),
(34, 'read-common-companies', 'Read Common Companies', 'Read Common Companies', 1, '2020-10-16 19:33:39', '2020-10-16 19:33:39', 1, 1, 10000, 10000, NULL),
(35, 'update-common-companies', 'Update Common Companies', 'Update Common Companies', 1, '2020-10-16 19:33:40', '2020-10-16 19:33:40', 1, 1, 10000, 10000, NULL),
(36, 'delete-common-companies', 'Delete Common Companies', 'Delete Common Companies', 1, '2020-10-16 19:33:40', '2020-10-16 19:33:40', 1, 1, 10000, 10000, NULL),
(37, 'create-common-dashboards', 'Create Common Dashboards', 'Create Common Dashboards', 1, '2020-10-16 19:33:40', '2020-10-16 19:33:40', 1, 1, 10000, 10000, NULL),
(38, 'read-common-dashboards', 'Read Common Dashboards', 'Read Common Dashboards', 1, '2020-10-16 19:33:40', '2020-10-16 19:33:40', 1, 1, 10000, 10000, NULL),
(39, 'update-common-dashboards', 'Update Common Dashboards', 'Update Common Dashboards', 1, '2020-10-16 19:33:41', '2020-10-16 19:33:41', 1, 1, 10000, 10000, NULL),
(40, 'delete-common-dashboards', 'Delete Common Dashboards', 'Delete Common Dashboards', 1, '2020-10-16 19:33:41', '2020-10-16 19:33:41', 1, 1, 10000, 10000, NULL),
(41, 'create-common-import', 'Create Common Import', 'Create Common Import', 1, '2020-10-16 19:33:41', '2020-10-16 19:33:41', 1, 1, 10000, 10000, NULL),
(42, 'create-common-items', 'Create Common Items', 'Create Common Items', 1, '2020-10-16 19:33:41', '2020-10-16 19:33:41', 1, 1, 10000, 10000, NULL),
(43, 'read-common-items', 'Read Common Items', 'Read Common Items', 1, '2020-10-16 19:33:41', '2020-10-16 19:33:41', 1, 1, 10000, 10000, NULL),
(44, 'update-common-items', 'Update Common Items', 'Update Common Items', 1, '2020-10-16 19:33:42', '2020-10-16 19:33:42', 1, 1, 10000, 10000, NULL),
(45, 'delete-common-items', 'Delete Common Items', 'Delete Common Items', 1, '2020-10-16 19:33:42', '2020-10-16 19:33:42', 1, 1, 10000, 10000, NULL),
(46, 'create-common-notifications', 'Create Common Notifications', 'Create Common Notifications', 1, '2020-10-16 19:33:42', '2020-10-16 19:33:42', 1, 1, 10000, 10000, NULL),
(47, 'read-common-notifications', 'Read Common Notifications', 'Read Common Notifications', 1, '2020-10-16 19:33:42', '2020-10-16 19:33:42', 1, 1, 10000, 10000, NULL),
(48, 'update-common-notifications', 'Update Common Notifications', 'Update Common Notifications', 1, '2020-10-16 19:33:42', '2020-10-16 19:33:42', 1, 1, 10000, 10000, NULL),
(49, 'delete-common-notifications', 'Delete Common Notifications', 'Delete Common Notifications', 1, '2020-10-16 19:33:43', '2020-10-16 19:33:43', 1, 1, 10000, 10000, NULL),
(50, 'create-common-reports', 'Create Common Reports', 'Create Common Reports', 1, '2020-10-16 19:33:43', '2020-10-16 19:33:43', 1, 1, 10000, 10000, NULL),
(51, 'read-common-reports', 'Read Common Reports', 'Read Common Reports', 1, '2020-10-16 19:33:43', '2020-10-16 19:33:43', 1, 1, 10000, 10000, NULL),
(52, 'update-common-reports', 'Update Common Reports', 'Update Common Reports', 1, '2020-10-16 19:33:43', '2020-10-16 19:33:43', 1, 1, 10000, 10000, NULL),
(53, 'delete-common-reports', 'Delete Common Reports', 'Delete Common Reports', 1, '2020-10-16 19:33:44', '2020-10-16 19:33:44', 1, 1, 10000, 10000, NULL),
(54, 'read-common-search', 'Read Common Search', 'Read Common Search', 1, '2020-10-16 19:33:44', '2020-10-16 19:33:44', 1, 1, 10000, 10000, NULL),
(55, 'read-common-uploads', 'Read Common Uploads', 'Read Common Uploads', 1, '2020-10-16 19:33:44', '2020-10-16 19:33:44', 1, 1, 10000, 10000, NULL),
(56, 'delete-common-uploads', 'Delete Common Uploads', 'Delete Common Uploads', 1, '2020-10-16 19:33:45', '2020-10-16 19:33:45', 1, 1, 10000, 10000, NULL),
(57, 'create-common-widgets', 'Create Common Widgets', 'Create Common Widgets', 1, '2020-10-16 19:33:45', '2020-10-16 19:33:45', 1, 1, 10000, 10000, NULL),
(58, 'read-common-widgets', 'Read Common Widgets', 'Read Common Widgets', 1, '2020-10-16 19:33:45', '2020-10-16 19:33:45', 1, 1, 10000, 10000, NULL),
(59, 'update-common-widgets', 'Update Common Widgets', 'Update Common Widgets', 1, '2020-10-16 19:33:45', '2020-10-16 19:33:45', 1, 1, 10000, 10000, NULL),
(60, 'delete-common-widgets', 'Delete Common Widgets', 'Delete Common Widgets', 1, '2020-10-16 19:33:46', '2020-10-16 19:33:46', 1, 1, 10000, 10000, NULL),
(61, 'create-purchases-bills', 'Create Purchases Bills', 'Create Purchases Bills', 1, '2020-10-16 19:33:46', '2020-10-16 19:33:46', 1, 1, 10000, 10000, NULL),
(62, 'read-purchases-bills', 'Read Purchases Bills', 'Read Purchases Bills', 1, '2020-10-16 19:33:46', '2020-10-16 19:33:46', 1, 1, 10000, 10000, NULL),
(63, 'update-purchases-bills', 'Update Purchases Bills', 'Update Purchases Bills', 1, '2020-10-16 19:33:46', '2020-10-16 19:33:46', 1, 1, 10000, 10000, NULL),
(64, 'delete-purchases-bills', 'Delete Purchases Bills', 'Delete Purchases Bills', 1, '2020-10-16 19:33:47', '2020-10-16 19:33:47', 1, 1, 10000, 10000, NULL),
(65, 'create-purchases-payments', 'Create Purchases Payments', 'Create Purchases Payments', 1, '2020-10-16 19:33:47', '2020-10-16 19:33:47', 1, 1, 10000, 10000, NULL),
(66, 'read-purchases-payments', 'Read Purchases Payments', 'Read Purchases Payments', 1, '2020-10-16 19:33:47', '2020-10-16 19:33:47', 1, 1, 10000, 10000, NULL),
(67, 'update-purchases-payments', 'Update Purchases Payments', 'Update Purchases Payments', 1, '2020-10-16 19:33:47', '2020-10-16 19:33:47', 1, 1, 10000, 10000, NULL),
(68, 'delete-purchases-payments', 'Delete Purchases Payments', 'Delete Purchases Payments', 1, '2020-10-16 19:33:48', '2020-10-16 19:33:48', 1, 1, 10000, 10000, NULL),
(69, 'create-purchases-vendors', 'Create Purchases Vendors', 'Create Purchases Vendors', 1, '2020-10-16 19:33:48', '2020-10-16 19:33:48', 1, 1, 10000, 10000, NULL),
(70, 'read-purchases-vendors', 'Read Purchases Vendors', 'Read Purchases Vendors', 1, '2020-10-16 19:33:48', '2020-10-16 19:33:48', 1, 1, 10000, 10000, NULL),
(71, 'update-purchases-vendors', 'Update Purchases Vendors', 'Update Purchases Vendors', 1, '2020-10-16 19:33:49', '2020-10-16 19:33:49', 1, 1, 10000, 10000, NULL),
(72, 'delete-purchases-vendors', 'Delete Purchases Vendors', 'Delete Purchases Vendors', 1, '2020-10-16 19:33:49', '2020-10-16 19:33:49', 1, 1, 10000, 10000, NULL),
(73, 'create-sales-customers', 'Create Sales Customers', 'Create Sales Customers', 1, '2020-10-16 19:33:49', '2020-10-16 19:33:49', 1, 1, 10000, 10000, NULL),
(74, 'read-sales-customers', 'Read Sales Customers', 'Read Sales Customers', 1, '2020-10-16 19:33:49', '2020-10-16 19:33:49', 1, 1, 10000, 10000, NULL),
(75, 'update-sales-customers', 'Update Sales Customers', 'Update Sales Customers', 1, '2020-10-16 19:33:50', '2020-10-16 19:33:50', 1, 1, 10000, 10000, NULL),
(76, 'delete-sales-customers', 'Delete Sales Customers', 'Delete Sales Customers', 1, '2020-10-16 19:33:50', '2020-10-16 19:33:50', 1, 1, 10000, 10000, NULL),
(77, 'create-sales-invoices', 'Create Sales Invoices', 'Create Sales Invoices', 1, '2020-10-16 19:33:50', '2020-10-16 19:33:50', 1, 1, 10000, 10000, NULL),
(78, 'read-sales-invoices', 'Read Sales Invoices', 'Read Sales Invoices', 1, '2020-10-16 19:33:51', '2020-10-16 19:33:51', 1, 1, 10000, 10000, NULL),
(79, 'update-sales-invoices', 'Update Sales Invoices', 'Update Sales Invoices', 1, '2020-10-16 19:33:51', '2020-10-16 19:33:51', 1, 1, 10000, 10000, NULL),
(80, 'delete-sales-invoices', 'Delete Sales Invoices', 'Delete Sales Invoices', 1, '2020-10-16 19:33:51', '2020-10-16 19:33:51', 1, 1, 10000, 10000, NULL),
(81, 'create-sales-revenues', 'Create Sales Revenues', 'Create Sales Revenues', 1, '2020-10-16 19:33:51', '2020-10-16 19:33:51', 1, 1, 10000, 10000, NULL),
(82, 'read-sales-revenues', 'Read Sales Revenues', 'Read Sales Revenues', 1, '2020-10-16 19:33:52', '2020-10-16 19:33:52', 1, 1, 10000, 10000, NULL),
(83, 'update-sales-revenues', 'Update Sales Revenues', 'Update Sales Revenues', 1, '2020-10-16 19:33:52', '2020-10-16 19:33:52', 1, 1, 10000, 10000, NULL),
(84, 'delete-sales-revenues', 'Delete Sales Revenues', 'Delete Sales Revenues', 1, '2020-10-16 19:33:52', '2020-10-16 19:33:52', 1, 1, 10000, 10000, NULL),
(85, 'read-install-updates', 'Read Install Updates', 'Read Install Updates', 1, '2020-10-16 19:33:53', '2020-10-16 19:33:53', 1, 1, 10000, 10000, NULL),
(86, 'update-install-updates', 'Update Install Updates', 'Update Install Updates', 1, '2020-10-16 19:33:53', '2020-10-16 19:33:53', 1, 1, 10000, 10000, NULL),
(87, 'create-modules-api-key', 'Create Modules Api Key', 'Create Modules Api Key', 1, '2020-10-16 19:33:53', '2020-10-16 19:33:53', 1, 1, 10000, 10000, NULL),
(88, 'update-modules-api-key', 'Update Modules Api Key', 'Update Modules Api Key', 1, '2020-10-16 19:33:54', '2020-10-16 19:33:54', 1, 1, 10000, 10000, NULL),
(89, 'read-modules-home', 'Read Modules Home', 'Read Modules Home', 1, '2020-10-16 19:33:54', '2020-10-16 19:33:54', 1, 1, 10000, 10000, NULL),
(90, 'create-modules-item', 'Create Modules Item', 'Create Modules Item', 1, '2020-10-16 19:33:54', '2020-10-16 19:33:54', 1, 1, 10000, 10000, NULL),
(91, 'read-modules-item', 'Read Modules Item', 'Read Modules Item', 1, '2020-10-16 19:33:55', '2020-10-16 19:33:55', 1, 1, 10000, 10000, NULL),
(92, 'update-modules-item', 'Update Modules Item', 'Update Modules Item', 1, '2020-10-16 19:33:55', '2020-10-16 19:33:55', 1, 1, 10000, 10000, NULL),
(93, 'delete-modules-item', 'Delete Modules Item', 'Delete Modules Item', 1, '2020-10-16 19:33:55', '2020-10-16 19:33:55', 1, 1, 10000, 10000, NULL),
(94, 'read-modules-my', 'Read Modules My', 'Read Modules My', 1, '2020-10-16 19:33:56', '2020-10-16 19:33:56', 1, 1, 10000, 10000, NULL),
(95, 'read-modules-tiles', 'Read Modules Tiles', 'Read Modules Tiles', 1, '2020-10-16 19:33:56', '2020-10-16 19:33:56', 1, 1, 10000, 10000, NULL),
(96, 'read-notifications', 'Read Notifications', 'Read Notifications', 1, '2020-10-16 19:33:57', '2020-10-16 19:33:57', 1, 1, 10000, 10000, NULL),
(97, 'update-notifications', 'Update Notifications', 'Update Notifications', 1, '2020-10-16 19:33:57', '2020-10-16 19:33:57', 1, 1, 10000, 10000, NULL),
(98, 'read-reports-expense-summary', 'Read Reports Expense Summary', 'Read Reports Expense Summary', 1, '2020-10-16 19:33:57', '2020-10-16 19:33:57', 1, 1, 10000, 10000, NULL),
(99, 'read-reports-income-summary', 'Read Reports Income Summary', 'Read Reports Income Summary', 1, '2020-10-16 19:33:57', '2020-10-16 19:33:57', 1, 1, 10000, 10000, NULL),
(100, 'read-reports-income-expense-summary', 'Read Reports Income Expense Summary', 'Read Reports Income Expense Summary', 1, '2020-10-16 19:33:57', '2020-10-16 19:33:57', 1, 1, 10000, 10000, NULL),
(101, 'read-reports-profit-loss', 'Read Reports Profit Loss', 'Read Reports Profit Loss', 1, '2020-10-16 19:33:58', '2020-10-16 19:33:58', 1, 1, 10000, 10000, NULL),
(102, 'read-reports-tax-summary', 'Read Reports Tax Summary', 'Read Reports Tax Summary', 1, '2020-10-16 19:33:58', '2020-10-16 19:33:58', 1, 1, 10000, 10000, NULL),
(103, 'create-settings-categories', 'Create Settings Categories', 'Create Settings Categories', 1, '2020-10-16 19:33:58', '2020-10-16 19:33:58', 1, 1, 10000, 10000, NULL),
(104, 'read-settings-categories', 'Read Settings Categories', 'Read Settings Categories', 1, '2020-10-16 19:33:59', '2020-10-16 19:33:59', 1, 1, 10000, 10000, NULL),
(105, 'update-settings-categories', 'Update Settings Categories', 'Update Settings Categories', 1, '2020-10-16 19:33:59', '2020-10-16 19:33:59', 1, 1, 10000, 10000, NULL),
(106, 'delete-settings-categories', 'Delete Settings Categories', 'Delete Settings Categories', 1, '2020-10-16 19:33:59', '2020-10-16 19:33:59', 1, 1, 10000, 10000, NULL),
(107, 'read-settings-company', 'Read Settings Company', 'Read Settings Company', 1, '2020-10-16 19:33:59', '2020-10-16 19:33:59', 1, 1, 10000, 10000, NULL),
(108, 'create-settings-currencies', 'Create Settings Currencies', 'Create Settings Currencies', 1, '2020-10-16 19:33:59', '2020-10-16 19:33:59', 1, 1, 10000, 10000, NULL),
(109, 'read-settings-currencies', 'Read Settings Currencies', 'Read Settings Currencies', 1, '2020-10-16 19:34:00', '2020-10-16 19:34:00', 1, 1, 10000, 10000, NULL),
(110, 'update-settings-currencies', 'Update Settings Currencies', 'Update Settings Currencies', 1, '2020-10-16 19:34:00', '2020-10-16 19:34:00', 1, 1, 10000, 10000, NULL),
(111, 'delete-settings-currencies', 'Delete Settings Currencies', 'Delete Settings Currencies', 1, '2020-10-16 19:34:00', '2020-10-16 19:34:00', 1, 1, 10000, 10000, NULL),
(112, 'read-settings-defaults', 'Read Settings Defaults', 'Read Settings Defaults', 1, '2020-10-16 19:34:00', '2020-10-16 19:34:00', 1, 1, 10000, 10000, NULL),
(113, 'read-settings-email', 'Read Settings Email', 'Read Settings Email', 1, '2020-10-16 19:34:01', '2020-10-16 19:34:01', 1, 1, 10000, 10000, NULL),
(114, 'read-settings-invoice', 'Read Settings Invoice', 'Read Settings Invoice', 1, '2020-10-16 19:34:01', '2020-10-16 19:34:01', 1, 1, 10000, 10000, NULL),
(115, 'read-settings-localisation', 'Read Settings Localisation', 'Read Settings Localisation', 1, '2020-10-16 19:34:01', '2020-10-16 19:34:01', 1, 1, 10000, 10000, NULL),
(116, 'read-settings-modules', 'Read Settings Modules', 'Read Settings Modules', 1, '2020-10-16 19:34:01', '2020-10-16 19:34:01', 1, 1, 10000, 10000, NULL),
(117, 'update-settings-modules', 'Update Settings Modules', 'Update Settings Modules', 1, '2020-10-16 19:34:02', '2020-10-16 19:34:02', 1, 1, 10000, 10000, NULL),
(118, 'read-settings-settings', 'Read Settings Settings', 'Read Settings Settings', 1, '2020-10-16 19:34:02', '2020-10-16 19:34:02', 1, 1, 10000, 10000, NULL),
(119, 'update-settings-settings', 'Update Settings Settings', 'Update Settings Settings', 1, '2020-10-16 19:34:02', '2020-10-16 19:34:02', 1, 1, 10000, 10000, NULL),
(120, 'read-settings-schedule', 'Read Settings Schedule', 'Read Settings Schedule', 1, '2020-10-16 19:34:02', '2020-10-16 19:34:02', 1, 1, 10000, 10000, NULL),
(121, 'create-settings-taxes', 'Create Settings Taxes', 'Create Settings Taxes', 1, '2020-10-16 19:34:03', '2020-10-16 19:34:03', 1, 1, 10000, 10000, NULL),
(122, 'read-settings-taxes', 'Read Settings Taxes', 'Read Settings Taxes', 1, '2020-10-16 19:34:03', '2020-10-16 19:34:03', 1, 1, 10000, 10000, NULL),
(123, 'update-settings-taxes', 'Update Settings Taxes', 'Update Settings Taxes', 1, '2020-10-16 19:34:03', '2020-10-16 19:34:03', 1, 1, 10000, 10000, NULL),
(124, 'delete-settings-taxes', 'Delete Settings Taxes', 'Delete Settings Taxes', 1, '2020-10-16 19:34:03', '2020-10-16 19:34:03', 1, 1, 10000, 10000, NULL),
(125, 'read-widgets-account-balance', 'Read Widgets Account Balance', 'Read Widgets Account Balance', 1, '2020-10-16 19:34:04', '2020-10-16 19:34:04', 1, 1, 10000, 10000, NULL),
(126, 'read-widgets-cash-flow', 'Read Widgets Cash Flow', 'Read Widgets Cash Flow', 1, '2020-10-16 19:34:04', '2020-10-16 19:34:04', 1, 1, 10000, 10000, NULL),
(127, 'read-widgets-expenses-by-category', 'Read Widgets Expenses By Category', 'Read Widgets Expenses By Category', 1, '2020-10-16 19:34:04', '2020-10-16 19:34:04', 1, 1, 10000, 10000, NULL),
(128, 'read-widgets-income-by-category', 'Read Widgets Income By Category', 'Read Widgets Income By Category', 1, '2020-10-16 19:34:05', '2020-10-16 19:34:05', 1, 1, 10000, 10000, NULL),
(129, 'read-widgets-latest-expenses', 'Read Widgets Latest Expenses', 'Read Widgets Latest Expenses', 1, '2020-10-16 19:34:05', '2020-10-16 19:34:05', 1, 1, 10000, 10000, NULL),
(130, 'read-widgets-latest-income', 'Read Widgets Latest Income', 'Read Widgets Latest Income', 1, '2020-10-16 19:34:05', '2020-10-16 19:34:05', 1, 1, 10000, 10000, NULL),
(131, 'read-widgets-total-expenses', 'Read Widgets Total Expenses', 'Read Widgets Total Expenses', 1, '2020-10-16 19:34:06', '2020-10-16 19:34:06', 1, 1, 10000, 10000, NULL),
(132, 'read-widgets-total-income', 'Read Widgets Total Income', 'Read Widgets Total Income', 1, '2020-10-16 19:34:06', '2020-10-16 19:34:06', 1, 1, 10000, 10000, NULL),
(133, 'read-widgets-total-profit', 'Read Widgets Total Profit', 'Read Widgets Total Profit', 1, '2020-10-16 19:34:06', '2020-10-16 19:34:06', 1, 1, 10000, 10000, NULL),
(134, 'read-client-portal', 'Read Client Portal', 'Read Client Portal', 1, '2020-10-16 19:34:22', '2020-10-16 19:34:22', 1, 1, 10000, 10000, NULL),
(135, 'read-portal-invoices', 'Read Portal Invoices', 'Read Portal Invoices', 1, '2020-10-16 19:34:22', '2020-10-16 19:34:22', 1, 1, 10000, 10000, NULL),
(136, 'update-portal-invoices', 'Update Portal Invoices', 'Update Portal Invoices', 1, '2020-10-16 19:34:23', '2020-10-16 19:34:23', 1, 1, 10000, 10000, NULL),
(137, 'read-portal-payments', 'Read Portal Payments', 'Read Portal Payments', 1, '2020-10-16 19:34:23', '2020-10-16 19:34:23', 1, 1, 10000, 10000, NULL),
(138, 'update-portal-payments', 'Update Portal Payments', 'Update Portal Payments', 1, '2020-10-16 19:34:23', '2020-10-16 19:34:23', 1, 1, 10000, 10000, NULL),
(139, 'read-portal-profile', 'Read Portal Profile', 'Read Portal Profile', 1, '2020-10-16 19:34:23', '2020-10-16 19:34:23', 1, 1, 10000, 10000, NULL),
(140, 'update-portal-profile', 'Update Portal Profile', 'Update Portal Profile', 1, '2020-10-16 19:34:23', '2020-10-16 19:34:23', 1, 1, 10000, 10000, NULL),
(141, 'read-offline-payments-settings', 'Read Offline Payments Settings', 'Read Offline Payments Settings', 1, '2020-10-16 19:36:36', '2020-10-16 19:36:36', 1, 1, 10000, 10000, NULL),
(142, 'update-offline-payments-settings', 'Update Offline Payments Settings', 'Update Offline Payments Settings', 1, '2020-10-16 19:36:36', '2020-10-16 19:36:36', 1, 1, 10000, 10000, NULL),
(143, 'delete-offline-payments-settings', 'Delete Offline Payments Settings', 'Delete Offline Payments Settings', 1, '2020-10-16 19:36:36', '2020-10-16 19:36:36', 1, 1, 10000, 10000, NULL),
(144, 'read-paypal-standard-settings', 'Read PayPal Standard Settings', 'Read PayPal Standard Settings', 1, '2020-10-16 19:36:37', '2020-10-16 19:36:37', 1, 1, 10000, 10000, NULL),
(145, 'update-paypal-standard-settings', 'Update PayPal Standard Settings', 'Update PayPal Standard Settings', 1, '2020-10-16 19:36:37', '2020-10-16 19:36:37', 1, 1, 10000, 10000, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `branch_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `branch_id`, `organization_id`, `deleted_at`) VALUES
(1, 'admin', 'Admin', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(2, 'manager', 'Manager', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(3, 'superadmin', 'Super admin', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(4, 'student', 'Student', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(5, 'parents', 'Parents', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(6, 'teacher', 'Teacher', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(7, 'accountant', 'Accountant', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(8, 'receptionist', 'Receptionist', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(9, 'librarian', 'Librarian', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(10, 'driver', 'Driver', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(11, 'customer', 'Customer', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(12, 'supplier', 'Supplier', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(13, 'member', 'Member', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(14, 'transport_officer', 'Transport officer', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(15, 'bill_collector', 'Bill Collector', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL),
(16, 'supervisor', 'Supervisor', 'System', 1, NULL, NULL, 1, 1, 10000, 10000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4WjocUdgeSviCY1tmCg2PRzwHxHTsT02LzXYscFV', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4292.2 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZWx6U21QbFp3Q2V4T2ZkWG92RjBmYWJUMjVyOUJraUIxcmJyOFpoMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbC9MYXJhdmVsLTgtTXVsdGktQXV0aGVudGljYXRpb24vcHVibGljL3VzZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkd0FWQi5xU1EySmUxVVRNRE9uSzgzdUk3UWJPelpPUy44UmlwS2x3TkpySDY0Z05Xa3haVHkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHdBVkIucVNRMkplMVVUTURPbks4M3VJN1FiT3paT1MuOFJpcEtsd05Kckg2NGdOV2t4WlR5Ijt9', 1603132932),
('aw27dCEvs2lVYQwzOSvJNw8bZpblhfho6gpNkhOB', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4292.2 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSXVrUmN5WWk5V0tPZ0lBd2J4MThaM0ZIZGxSUXBma0ExVWZISGtrbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjY3OiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWwvTGFyYXZlbC04LU11bHRpLUF1dGhlbnRpY2F0aW9uL3B1YmxpYy91c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHdBVkIucVNRMkplMVVUTURPbks4M3VJN1FiT3paT1MuOFJpcEtsd05Kckg2NGdOV2t4WlR5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR3QVZCLnFTUTJKZTFVVE1ET25LODN1STdRYk96Wk9TLjhSaXBLbHdOSnJINjRnTldreFpUeSI7fQ==', 1603180053);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Ali Abdullah', 'mdalibd511@gmail.com', NULL, '$2y$10$wAVB.qSQ2Je1UTMDOnK83uI7QbOzZOS.8RipKlwNJrH64gNWkxZTy', NULL, NULL, 'bGTkJhsn2xv8eRdCqLTXIxEXTf35V93cAzqqGguQtB9d0ewyFZmT8vsawtdB', '2020-10-14 21:02:08', '2020-10-14 21:02:08'),
(2, 'Abdullah', 'maabdullahbd511@gmail.com', NULL, '$2y$10$EX6cHxKG8zyrqIcrQEl6oOJqlBVjqY68mKo9h/2Bs/Jul6KhmzkYS', NULL, NULL, NULL, '2020-10-14 22:43:44', '2020-10-14 22:43:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_name_unique` (`name`),
  ADD UNIQUE KEY `branches_email_unique` (`email`),
  ADD KEY `branches_branch_type_id_foreign` (`branch_type_id`),
  ADD KEY `branches_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `branch_types`
--
ALTER TABLE `branch_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`),
  ADD UNIQUE KEY `organizations_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch_types`
--
ALTER TABLE `branch_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_branch_type_id_foreign` FOREIGN KEY (`branch_type_id`) REFERENCES `branch_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `branches_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
