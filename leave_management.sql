-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2018 at 12:55 PM
-- Server version: 5.5.61-0ubuntu0.14.04.1
-- PHP Version: 5.6.37-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leave_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE IF NOT EXISTS `leave_applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `backup_employee_id` int(11) NOT NULL,
  `approved` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `user_id`, `start_date`, `end_date`, `reason`, `backup_employee_id`, `approved`, `created_at`, `updated_at`) VALUES
(1, 4, '2018-12-01', '2018-12-01', 'Filing not well', 0, 0, '2018-11-28 00:33:46', '2018-11-28 00:33:46'),
(2, 4, '2018-12-01', '2018-12-01', 'sadfasdf', 0, 0, '2018-11-28 00:57:20', '2018-11-28 00:57:20'),
(3, 6, '2018-12-01', '2018-12-01', 'Have some work at my home', 4, 1, '2018-11-28 01:11:10', '2018-11-28 01:17:37'),
(4, 6, '2018-12-10', '2018-12-10', 'asdfasd', 4, 1, '2018-11-28 01:11:37', '2018-11-28 01:17:33'),
(5, 6, '2018-12-01', '2018-12-01', 'asdfasdfasd', 4, 1, '2018-11-28 01:15:45', '2018-11-28 01:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_27_061245_create_leave_applications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `designation`, `department`, `mobile`, `address`, `city`, `state`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James', 'james@gmail.com', '$2y$10$.yGxPEr1QKbFWw2NtkarNu92I2wgr9BqWSZ.TDoaQe3M1BL.vR/my', 'super_admin', 'SE', 'SOFTWARE', '9829098220', '1, new param', 'karela', 'kerala', 'mmSDyPHMKVaevbVcScnprC7fqSvmIZOEsF1KCMxYC93bLNj8TkV5EO5tYhzC', '2018-11-27 02:11:43', '2018-11-27 06:20:18'),
(4, 'john', 'john@gmail.com', '$2y$10$eAA5Zcg0uNm5uE7CVcbx3eZ.h2QSy.9k.RC7hKH59Z6POvBw7q2Be', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, '1k2pxqhIRNEVkXdFOMP1t4Da57G8RWFgGfQXsffE2NqKBDHpDf650pYUdBU9', '2018-11-27 23:26:35', '2018-11-27 23:26:35'),
(5, 'Mario Speedwagon', 'mario.speedwagon@gmail.com', '$2y$10$fldfGa78HAZaNQcbYstpk.BldQccS6xgwPrt6v176hGW51/OpJBPa', 'employee', 'SE', 'SO', NULL, NULL, NULL, NULL, NULL, '2018-11-28 00:59:27', '2018-11-28 00:59:27'),
(6, 'Petey Cruiser', 'petey.cruiser@gmail.com', '$2y$10$9FEdcAWIi6sK5eKR4dt.m.q.DtAy8uRYR/oj/Nf4vwoyFczidFR8C', 'employee', 'SE', 'SO', NULL, NULL, NULL, NULL, NULL, '2018-11-28 01:00:16', '2018-11-28 01:00:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
