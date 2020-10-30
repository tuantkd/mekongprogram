-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 07:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mekongprogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `deployment_times`
--

CREATE TABLE `deployment_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_three_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_number_money` double DEFAULT NULL,
  `deployment_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_partner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2020_10_13_025615_create_roles_table', 1),
(3, '2020_10_13_031420_create_project_parents_table', 1),
(4, '2020_10_13_031709_create_project_level_ones_table', 1),
(5, '2020_10_13_032521_create_project_level_twos_table', 1),
(6, '2020_10_13_032721_create_project_level_threes_table', 1),
(7, '2020_10_13_032939_create_deployment_times_table', 1),
(8, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_level_ones`
--

CREATE TABLE `project_level_ones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_one_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_one_name_operation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_one_total_money` double DEFAULT NULL,
  `project_one_result_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_one_index_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_one_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_level_threes`
--

CREATE TABLE `project_level_threes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_two_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_three_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_three_name_operation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_three_total_money` double DEFAULT NULL,
  `project_three_result_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_three_index_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_three_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_level_twos`
--

CREATE TABLE `project_level_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_one_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_two_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_two_name_operation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_two_total_money` double DEFAULT NULL,
  `project_two_result_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_two_index_need_reach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_two_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_parents`
--

CREATE TABLE `project_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deployment_times`
--
ALTER TABLE `deployment_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deployment_times_deployment_month_unique` (`deployment_month`),
  ADD KEY `deployment_times_project_three_id_foreign` (`project_three_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_level_ones_project_one_code_unique` (`project_one_code`),
  ADD KEY `project_level_ones_project_parent_id_foreign` (`project_parent_id`);

--
-- Indexes for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_level_threes_project_three_code_unique` (`project_three_code`),
  ADD KEY `project_level_threes_project_two_id_foreign` (`project_two_id`);

--
-- Indexes for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_level_twos_project_two_code_unique` (`project_two_code`),
  ADD KEY `project_level_twos_project_one_id_foreign` (`project_one_id`);

--
-- Indexes for table `project_parents`
--
ALTER TABLE `project_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_parents_project_code_unique` (`project_code`),
  ADD KEY `project_parents_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deployment_times`
--
ALTER TABLE `deployment_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_parents`
--
ALTER TABLE `project_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deployment_times`
--
ALTER TABLE `deployment_times`
  ADD CONSTRAINT `deployment_times_project_three_id_foreign` FOREIGN KEY (`project_three_id`) REFERENCES `project_level_threes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  ADD CONSTRAINT `project_level_ones_project_parent_id_foreign` FOREIGN KEY (`project_parent_id`) REFERENCES `project_parents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  ADD CONSTRAINT `project_level_threes_project_two_id_foreign` FOREIGN KEY (`project_two_id`) REFERENCES `project_level_twos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  ADD CONSTRAINT `project_level_twos_project_one_id_foreign` FOREIGN KEY (`project_one_id`) REFERENCES `project_level_ones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_parents`
--
ALTER TABLE `project_parents`
  ADD CONSTRAINT `project_parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
