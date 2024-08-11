-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2024 at 01:21 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelboot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `phone_number`, `created_at`, `updated_at`, `email_verified_at`, `remember_token`) VALUES
(1, 'dkessler', 'fbeahan@example.net', 'quas', '+1.240.296.9884', '2024-08-04 07:55:13', '2024-08-04 07:55:13', '1996-08-12 20:02:59', 'aut'),
(2, 'brain.ryan', 'rupert.beier@example.org', 'ea', '617.596.2088', '2024-08-04 07:55:13', '2024-08-04 07:55:13', '2009-09-18 12:03:15', 'unde'),
(3, 'imelda83', 'orn.alayna@example.org', 'quam', '1-309-351-2325', '2024-08-04 07:55:13', '2024-08-04 07:55:13', '1998-04-29 06:23:04', 'sint'),
(5, 'GeriosSarkis', 'geriossarkis3@gmail.com', 'Thenewhello1200', '71801351', '2024-08-04 09:29:29', '2024-08-04 09:29:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1722769223;', 1722769223),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:2;', 1722769223),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1722775198;', 1722775198),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1722775198);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'et', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(2, 'error', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(3, 'culpa', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(4, 'at', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(5, 'optio', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(6, 'سياسة', '2024-08-04 08:48:36', '2024-08-04 08:48:36'),
(7, 'اقتصاد', '2024-08-04 08:48:51', '2024-08-04 08:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `created_at`, `updated_at`, `url`) VALUES
(1, '2024-08-04 07:55:13', '2024-08-04 07:55:13', 'https://via.placeholder.com/640x480.png/00ee22?text=iste'),
(2, '2024-08-04 07:55:13', '2024-08-04 07:55:13', 'https://via.placeholder.com/640x480.png/007700?text=exercitationem'),
(3, '2024-08-04 07:55:13', '2024-08-04 07:55:13', 'https://via.placeholder.com/640x480.png/00dd77?text=autem'),
(4, '2024-08-04 07:55:13', '2024-08-04 07:55:13', 'https://via.placeholder.com/640x480.png/0033cc?text=eos'),
(5, '2024-08-04 07:55:13', '2024-08-04 07:55:13', 'https://via.placeholder.com/640x480.png/00ee33?text=delectus'),
(6, '2024-08-04 09:39:00', '2024-08-04 09:39:00', 'postsimage/01J4EPCY435A354WJ0XFVZ2DRM.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_28_175251_create_table_post', 1),
(5, '2024_06_28_175528_create_table_admin', 1),
(6, '2024_06_28_175539_create_table_category', 1),
(7, '2024_06_28_175547_create_table_post_type', 1),
(8, '2024_06_28_175742_create_table_roles_admin', 1),
(9, '2024_07_06_153404_create_personal_access_tokens_table', 1),
(10, '2024_07_07_085443_create_table_media', 1),
(11, '2024_07_07_085552_create_table_posts_medias', 1),
(12, '2024_07_07_093227_create_table_posts_category', 1),
(13, '2024_07_13_074020_create_posts_admins_table', 1),
(14, '2024_07_20_075151_create_tag_table', 1),
(15, '2024_07_20_075240_create_poststags_table', 1),
(16, '2024_07_20_105214_add_column_to_table_admin', 1),
(17, '2024_07_20_152225_update_column_admin_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Ms.', 'Hic aut sequi tempore id sed qui. Maxime officiis dolorem veritatis natus voluptas delectus exercitationem et. Voluptates similique sit qui velit.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(2, 'Prof.', 'Fuga veritatis quis debitis fugiat eaque. Quasi unde quam unde officiis ex quas. Et ratione quasi facilis. Commodi magnam quo et ea enim vero.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(3, 'Mr.', 'Sit amet sed quia aut voluptatem. Eligendi nulla animi commodi et. Et dignissimos vitae impedit ea laboriosam et animi.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(4, 'Mr.', 'Delectus sit corrupti saepe aperiam explicabo ut nulla rem. Optio odio molestiae porro quae tenetur est. Modi quis eveniet sunt ut eligendi temporibus molestiae est. Occaecati laborum ut nemo nihil deserunt rerum.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(5, 'Dr.', 'Debitis aut aut enim exercitationem sit consequuntur doloribus. Temporibus et delectus omnis fugiat earum veritatis aut. Et ut dolor deleniti. Eius error et architecto.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(6, 'Ms.', 'Doloribus amet possimus possimus molestias. Molestiae non quaerat inventore ut quisquam nobis laboriosam. Mollitia modi pariatur delectus unde sequi consequuntur repellat pariatur. Aliquam in itaque amet.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(7, 'Prof.', 'Ut assumenda itaque voluptatem aut. Voluptas deserunt et exercitationem rem ea et alias. Illum quae incidunt exercitationem et illum.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(8, 'Mrs.', 'Unde amet eum quibusdam autem modi doloribus amet fuga. Quia voluptas esse placeat dolor necessitatibus sequi sunt. Qui consequatur et sint tempore enim aut qui.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(9, 'Miss', 'Architecto ab repellat eos placeat qui voluptatibus magni pariatur. Laudantium incidunt a quibusdam et occaecati et voluptatem. Molestiae qui quaerat autem assumenda autem.', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(10, 'Mr.', 'Excepturi eos repellat consequatur ea modi labore. In blanditiis non voluptatum quo consequuntur. Sint recusandae ab odit explicabo doloremque doloremque autem. Commodi quia dolore excepturi facilis impedit rerum.', '2024-08-04 07:55:13', '2024-08-04 07:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `post_admin`
--

DROP TABLE IF EXISTS `post_admin`;
CREATE TABLE IF NOT EXISTS `post_admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_admin`
--

INSERT INTO `post_admin` (`id`, `post_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 4, 2, NULL, NULL),
(8, 4, 3, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 5, 2, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 3, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 7, 2, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 8, 2, NULL, NULL),
(17, 9, 2, NULL, NULL),
(18, 9, 3, NULL, NULL),
(19, 10, 1, NULL, NULL),
(20, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE IF NOT EXISTS `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 4, 4, NULL, NULL),
(8, 4, 5, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 5, NULL, NULL),
(13, 7, 4, NULL, NULL),
(14, 7, 5, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 8, 2, NULL, NULL),
(17, 9, 1, NULL, NULL),
(18, 9, 2, NULL, NULL),
(19, 10, 4, NULL, NULL),
(20, 10, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

DROP TABLE IF EXISTS `post_media`;
CREATE TABLE IF NOT EXISTS `post_media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_media`
--

INSERT INTO `post_media` (`id`, `post_id`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 3, NULL, NULL),
(6, 3, 5, NULL, NULL),
(7, 4, 2, NULL, NULL),
(8, 4, 4, NULL, NULL),
(9, 5, 4, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 4, NULL, NULL),
(13, 7, 3, NULL, NULL),
(14, 7, 5, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 8, 4, NULL, NULL),
(17, 9, 1, NULL, NULL),
(18, 9, 5, NULL, NULL),
(19, 10, 1, NULL, NULL),
(20, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 2, 5, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 4, NULL, NULL),
(7, 4, 1, NULL, NULL),
(8, 4, 5, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 7, 4, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 8, 4, NULL, NULL),
(17, 9, 4, NULL, NULL),
(18, 9, 5, NULL, NULL),
(19, 10, 2, NULL, NULL),
(20, 10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

DROP TABLE IF EXISTS `post_type`;
CREATE TABLE IF NOT EXISTS `post_type` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_admin`
--

DROP TABLE IF EXISTS `roles_admin`;
CREATE TABLE IF NOT EXISTS `roles_admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priv` int(11) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XHNz7jZzvd5vyeX6wHkV7VjVdK4iOTpOm6PPZ3Cp', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTUkxRERTeUg5TjdJNlp3NjJDYlVsd3JiOTVaT1UzcGJhYkJHMGVZOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYWRtaW5zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJHNXWEIwMGIxL0JuUVlpNlVLSC8zdy4zcWpIeWxCUzR3Vm4zd2tldXhsUWd5eU4zWWc5RklPIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1722777651);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'nostrum', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(2, 'repellat', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(3, 'consequatur', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(4, 'id', '2024-08-04 07:55:13', '2024-08-04 07:55:13'),
(5, 'pariatur', '2024-08-04 07:55:13', '2024-08-04 07:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Gerios', 'geriossarkis3@gmail.com', NULL, '$2y$12$sWXB00b1/BnQYi6UKH/3w.3qjHylBS4wVn3wkeuxlQgyyN3Yg9FIO', NULL, '2024-08-04 07:59:01', '2024-08-04 07:59:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
