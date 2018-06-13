-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2018 at 02:33 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_list`
--

DROP TABLE IF EXISTS `books_list`;
CREATE TABLE IF NOT EXISTS `books_list` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogues_list`
--

DROP TABLE IF EXISTS `catalogues_list`;
CREATE TABLE IF NOT EXISTS `catalogues_list` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogues_list`
--

INSERT INTO `catalogues_list` (`id`, `title`, `description`, `isbn`, `icon`, `user_id`, `book_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science 1', 'Relevant to Computer Science 1', 'CS001JUN18', 'b1.jfif', '2', '1', '1', '2018-06-13 07:28:03', '2018-06-13 07:28:03'),
(2, 'Computer Science 2', 'This is relevant to CS2', 'CS002JUN18', 'b2.jpg', '2', '2', '1', '2018-06-13 08:06:14', '2018-06-13 08:06:14'),
(3, 'Biography 3', 'Relavent to Biography 3', 'BIO003JUN18', 'bio3.jpg', '2', '9', '1', '2018-06-13 08:06:34', '2018-06-13 08:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

DROP TABLE IF EXISTS `cruds`;
CREATE TABLE IF NOT EXISTS `cruds` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `user_id`, `title`, `description`, `isbn`, `icon`, `created_at`, `updated_at`) VALUES
(1, '1', 'Computer Science 1', 'Relevant to Computer Science 1', 'CS001JUN18', 'b1.jfif', '2018-06-13 04:45:23', '2018-06-13 05:39:39'),
(2, '1', 'Computer Science 2', 'This is relevant to CS2', 'CS002JUN18', 'b2.jpg', '2018-06-13 04:46:33', '2018-06-13 04:46:33'),
(3, '1', 'Computer Science 3', 'This is relevant to CS3', 'CS003JUN18', 'b3.jpg', '2018-06-13 04:47:05', '2018-06-13 04:47:05'),
(4, '1', 'Life Science 1', 'This is relevant to Life Science 1', 'LS001JUN18', 'life1.jfif', '2018-06-13 04:47:48', '2018-06-13 04:47:48'),
(5, '1', 'Life Science 2', 'Relevant to Life Science 2', 'LS002JUN18', 'life2.jfif', '2018-06-13 04:48:29', '2018-06-13 04:48:29'),
(6, '1', 'Life Science 3', 'Relevant to Life Science 3', 'LS003JUN18', 'life3.jfif', '2018-06-13 04:48:52', '2018-06-13 04:48:52'),
(7, '1', 'Biography 1', 'Relavent to Biography 1', 'BIO001JUN18', 'bio1.png', '2018-06-13 04:49:25', '2018-06-13 04:49:25'),
(8, '1', 'Biography 2', 'Relavent to Biography 2', 'BIO002JUN18', 'bio2.jfif', '2018-06-13 04:49:47', '2018-06-13 04:49:47'),
(9, '1', 'Biography 3', 'Relavent to Biography 3', 'BIO003JUN18', 'bio3.jpg', '2018-06-13 04:50:09', '2018-06-13 04:50:09'),
(10, '1', 'Epic 1', 'Relevant to Epic 1', 'EP001JUN18', 'ep1.jfif', '2018-06-13 04:50:54', '2018-06-13 04:50:54'),
(11, '1', 'Epic 2', 'Relevant to Epic 2', 'EP002JUN18', 'ep2.jpg', '2018-06-13 04:51:15', '2018-06-13 04:51:15'),
(12, '1', 'Epic 3', 'Relevant to Epic 3', 'EP003JUN18', 'ep3.png', '2018-06-13 04:51:51', '2018-06-13 04:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_02_022957_create_cruds_table', 1),
(4, '2018_06_13_050357_create_books_list_table', 1),
(5, '2018_06_13_050807_create_catalogue_table', 1),
(7, '2018_06_13_131658_add_new_fields_catalogue', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Govindaraj', 'govindarajk@sensiple.com', '$2y$10$qRhVaElktGqjcCYoUylRzOiPHLb4TTgo8Jiy2wfpval6xe.TYTF4O', NULL, NULL, '2018-06-13 01:23:35', '2018-06-13 01:23:35'),
(2, 'Test', 'test@test.com', '$2y$10$.HujstXyxFFxDJ94X8pIj.P3OfRFcJ2.1FFAScpKPjWs0mNLLIHMC', NULL, NULL, '2018-06-13 05:49:26', '2018-06-13 05:49:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
