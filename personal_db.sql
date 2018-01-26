-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 03:54 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `category` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `category`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, '2018-01-02', 'Fare', 'home to office', 19, '2018-01-05 16:00:00', '2018-01-05 16:00:00'),
(2, '2018-01-02', 'Food', 'Dinner', 99, '2018-01-05 16:00:00', '2018-01-05 16:00:00'),
(3, '2018-01-06', 'Fare', 'adsfsda', 20, '2018-01-06 05:00:30', '2018-01-06 05:00:30'),
(6, '2018-01-01', 'asdfghjkl', 'sdfsdfds', 44, '2018-01-10 01:46:26', '2018-01-10 01:46:26'),
(7, '2018-01-01', 'asdfghjkl', 'sadsa', 55, '2018-01-10 01:50:56', '2018-01-10 01:50:56'),
(8, '2018-01-10', 'dsfsdfds', 'Food', 60, '2018-01-10 01:56:10', '2018-01-10 01:56:10'),
(9, '2018-01-10', 'asdfghjkl', 'dsfds', 44, '2018-01-10 01:58:00', '2018-01-10 01:58:00'),
(10, '2018-01-14', 'asdfghjkl', 'sdfsdfsd', 44, '2018-01-14 06:54:06', '2018-01-14 06:54:06'),
(11, '2018-01-06', 'asdfghjkl', 'food', 20, '2018-01-14 06:59:48', '2018-01-14 06:59:48'),
(12, '2018-01-16', 'asdfghjkl', 'rgrg', 55, '2018-01-14 07:10:31', '2018-01-14 07:10:31'),
(13, '2018-01-30', 'asdfghjkl', 'dsfdsfsd', 66, '2018-01-14 07:12:23', '2018-01-14 07:12:23'),
(14, '2018-01-22', 'asdfghjkl', 's', 33, '2018-01-14 07:13:16', '2018-01-14 07:13:16'),
(15, '2018-01-31', 'asdfghjkl', 'asdas', 44, '2018-01-14 07:14:07', '2018-01-14 07:14:07'),
(16, '2018-01-19', 'asdsadsa', 'Personal', 100, '2018-01-14 07:14:55', '2018-01-14 07:14:55'),
(17, '2018-01-14', 'asdfghjkl', 'ghbvj', 50, '2018-01-14 07:46:33', '2018-01-14 07:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

CREATE TABLE `expenses_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(26, 'asdfghjkl', '2018-01-01 15:04:11', '2018-01-01 15:04:11'),
(27, 'dsfsdfds', '2018-01-01 15:20:00', '2018-01-01 16:06:13'),
(28, 'asdsadsa', '2018-01-12 01:25:30', '2018-01-12 01:25:30');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2015_10_27_141258_create_tasks_table', 1),
(6, '2017_12_30_023400_create_expenses_categories_table', 1),
(7, '2018_01_06_124127_create_expenses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
