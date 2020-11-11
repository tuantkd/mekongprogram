-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 08:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mekongprogram_edit`
--

-- --------------------------------------------------------

--
-- Table structure for table `deployment_times`
--

CREATE TABLE `deployment_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deployment_month_initialize` int(11) DEFAULT NULL,
  `deployment_year_initialize` int(11) DEFAULT NULL,
  `deployment_day_start` int(11) DEFAULT NULL,
  `deployment_month_start` int(11) DEFAULT NULL,
  `deployment_year_start` int(11) DEFAULT NULL,
  `deployment_day_end` int(11) DEFAULT NULL,
  `deployment_month_end` int(11) DEFAULT NULL,
  `deployment_year_end` int(11) DEFAULT NULL,
  `deployment_number_money_initial` double DEFAULT NULL,
  `deployment_number_money_operating` double DEFAULT NULL,
  `deployment_number_money_real` double DEFAULT NULL,
  `deployment_index_achieved` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_result_achieved` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_partner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_method_implementation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deployment_times`
--

INSERT INTO `deployment_times` (`id`, `deployment_month_initialize`, `deployment_year_initialize`, `deployment_day_start`, `deployment_month_start`, `deployment_year_start`, `deployment_day_end`, `deployment_month_end`, `deployment_year_end`, `deployment_number_money_initial`, `deployment_number_money_operating`, `deployment_number_money_real`, `deployment_index_achieved`, `deployment_result_achieved`, `deployment_address`, `deployment_partner`, `deployment_method_implementation`, `deployment_description`, `created_at`, `updated_at`) VALUES
(3, 1, 2020, 1, 1, 2020, 8, 1, 2020, 5000000, 2000000, 15000000, 'cewrrrrrrrrrrr', 'fsaddddddd', 'dfbadfbfdb', 'bfdadfb', 'rrrr', 'vbdffđf', '2020-11-11 07:32:51', '2020-11-11 07:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `deployment_time_histories`
--

CREATE TABLE `deployment_time_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deployment_time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_month_initialize` int(11) DEFAULT NULL,
  `deployment_year_initialize` int(11) DEFAULT NULL,
  `deployment_number_money_initial` double DEFAULT NULL,
  `deployment_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_partner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deployment_time_plan_histories`
--

CREATE TABLE `deployment_time_plan_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deployment_time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_day_start` int(11) DEFAULT NULL,
  `deployment_month_start` int(11) DEFAULT NULL,
  `deployment_year_start` int(11) DEFAULT NULL,
  `deployment_day_end` int(11) DEFAULT NULL,
  `deployment_month_end` int(11) DEFAULT NULL,
  `deployment_year_end` int(11) DEFAULT NULL,
  `deployment_number_money_operating` double DEFAULT NULL,
  `deployment_method_implementation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deployment_time_plan_histories`
--

INSERT INTO `deployment_time_plan_histories` (`id`, `deployment_time_id`, `user_id`, `deployment_day_start`, `deployment_month_start`, `deployment_year_start`, `deployment_day_end`, `deployment_month_end`, `deployment_year_end`, `deployment_number_money_operating`, `deployment_method_implementation`, `created_at`, `updated_at`) VALUES
(7, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:36:25', '2020-11-11 07:36:25'),
(8, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:36:59', '2020-11-11 07:36:59'),
(9, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:38:18', '2020-11-11 07:38:18'),
(10, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:38:49', '2020-11-11 07:38:49'),
(11, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:38:51', '2020-11-11 07:38:51'),
(12, 3, 2, 1, 1, 2020, 31, 1, 2020, 8000000, 'vxfvfdagrfger', '2020-11-11 07:38:58', '2020-11-11 07:38:58');

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
(8, '2020_10_30_195912_create_project_and_users_table', 1),
(9, '2020_11_01_161043_create_project_parent_histories_table', 1),
(10, '2020_11_02_135704_create_project_level_one_histories_table', 1),
(11, '2020_11_04_154414_create_project_level_two_histories_table', 1),
(12, '2020_11_05_154833_create_project_level_three_histories_table', 1),
(13, '2020_11_05_165350_create_project_three_and_deployment_times_table', 1),
(14, '2020_11_06_121435_create_deployment_time_histories_table', 1),
(15, '2014_10_12_000000_create_users_table', 2),
(16, '2020_11_10_162422_create_deployment_time_plan_histories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project_and_users`
--

CREATE TABLE `project_and_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_and_users`
--

INSERT INTO `project_and_users` (`id`, `user_id`, `project_parent_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-11-10 02:57:03', '2020-11-10 02:57:03');

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

--
-- Dumping data for table `project_level_ones`
--

INSERT INTO `project_level_ones` (`id`, `project_parent_id`, `project_one_code`, `project_one_name_operation`, `project_one_total_money`, `project_one_result_need_reach`, `project_one_index_need_reach`, `project_one_note`, `created_at`, `updated_at`) VALUES
(1, 1, '1.1', 'dsfd', NULL, 'dfvfv', 'dvdfv', 'fdvfd', '2020-11-10 02:57:14', '2020-11-10 02:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_level_one_histories`
--

CREATE TABLE `project_level_one_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_one_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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

--
-- Dumping data for table `project_level_threes`
--

INSERT INTO `project_level_threes` (`id`, `project_two_id`, `project_three_code`, `project_three_name_operation`, `project_three_total_money`, `project_three_result_need_reach`, `project_three_index_need_reach`, `project_three_note`, `created_at`, `updated_at`) VALUES
(1, 1, '1.1.1.1', 'FDGFDSGDFG', NULL, 'GREGQREG', 'DFAGRGRA', 'REGEG', '2020-11-10 02:58:02', '2020-11-10 02:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `project_level_three_histories`
--

CREATE TABLE `project_level_three_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_three_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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

--
-- Dumping data for table `project_level_twos`
--

INSERT INTO `project_level_twos` (`id`, `project_one_id`, `project_two_code`, `project_two_name_operation`, `project_two_total_money`, `project_two_result_need_reach`, `project_two_index_need_reach`, `project_two_note`, `created_at`, `updated_at`) VALUES
(1, 1, '1.1.1', 'sdfSF', NULL, 'FSEFEF', 'SAFSDF', 'SDFSD', '2020-11-10 02:57:51', '2020-11-10 02:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `project_level_two_histories`
--

CREATE TABLE `project_level_two_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_two_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_parents`
--

INSERT INTO `project_parents` (`id`, `project_code`, `project_name`, `project_description`, `created_at`, `updated_at`) VALUES
(1, 'VN-0078', 'Logfram original-Bánh Mỳ', 'csdafghgdfgbf', '2020-11-10 02:57:03', '2020-11-10 02:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `project_parent_histories`
--

CREATE TABLE `project_parent_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_three_and_deployment_times`
--

CREATE TABLE `project_three_and_deployment_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_three_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_three_and_deployment_times`
--

INSERT INTO `project_three_and_deployment_times` (`id`, `project_three_id`, `deployment_time_id`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2020-11-11 07:32:51', '2020-11-11 07:32:51');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 'Quản trị toàn quyền', '2020-10-30 05:45:10', '2020-10-30 05:45:10'),
(2, 'Điều phối viên', 'Nhận làm nhiệm vụ của admin', '2020-10-30 07:04:37', '2020-10-30 07:04:37');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fullname`, `username`, `password`, `email`, `sex`, `birthday`, `phone`, `address`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Phạm Ngọc Nhàn', 'ngocnhan', '$2y$10$Q86rrzG3EvBmbXGhzILdGeIKLVQ76H.Ck3vVJ/V4VHl3Yzta/DFtK', NULL, 'Nam', NULL, NULL, NULL, 'avatar5.png', NULL, '2020-10-30 05:45:28', '2020-10-30 05:45:28'),
(5, 2, 'Trần Thị Xíu', 'xiucute', '$2y$10$SG2Jkq8ElQ8b9y5mmF7/WOz2ySO5VUG3uQyJ3Py9gIREFr3z2XY3S', NULL, 'Nữ', NULL, NULL, NULL, 'nguyen-van-dui-05.jpg', NULL, '2020-11-01 00:19:01', '2020-11-01 00:19:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deployment_times`
--
ALTER TABLE `deployment_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deployment_time_histories`
--
ALTER TABLE `deployment_time_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deployment_time_histories_deployment_time_id_foreign` (`deployment_time_id`),
  ADD KEY `deployment_time_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `deployment_time_plan_histories`
--
ALTER TABLE `deployment_time_plan_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deployment_time_plan_histories_deployment_time_id_foreign` (`deployment_time_id`),
  ADD KEY `deployment_time_plan_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_and_users`
--
ALTER TABLE `project_and_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_and_users_user_id_foreign` (`user_id`),
  ADD KEY `project_and_users_project_parent_id_foreign` (`project_parent_id`);

--
-- Indexes for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_level_ones_project_parent_id_foreign` (`project_parent_id`);

--
-- Indexes for table `project_level_one_histories`
--
ALTER TABLE `project_level_one_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_level_one_histories_project_one_id_foreign` (`project_one_id`),
  ADD KEY `project_level_one_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_level_threes_project_three_code_unique` (`project_three_code`),
  ADD KEY `project_level_threes_project_two_id_foreign` (`project_two_id`);

--
-- Indexes for table `project_level_three_histories`
--
ALTER TABLE `project_level_three_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_level_three_histories_project_three_id_foreign` (`project_three_id`),
  ADD KEY `project_level_three_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_level_twos_project_two_code_unique` (`project_two_code`),
  ADD KEY `project_level_twos_project_one_id_foreign` (`project_one_id`);

--
-- Indexes for table `project_level_two_histories`
--
ALTER TABLE `project_level_two_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_level_two_histories_project_two_id_foreign` (`project_two_id`),
  ADD KEY `project_level_two_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_parents`
--
ALTER TABLE `project_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_parent_histories`
--
ALTER TABLE `project_parent_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_parent_histories_user_id_foreign` (`user_id`),
  ADD KEY `project_parent_histories_project_parent_id_foreign` (`project_parent_id`);

--
-- Indexes for table `project_three_and_deployment_times`
--
ALTER TABLE `project_three_and_deployment_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_three_and_deployment_times_project_three_id_foreign` (`project_three_id`),
  ADD KEY `project_three_and_deployment_times_deployment_time_id_foreign` (`deployment_time_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deployment_time_histories`
--
ALTER TABLE `deployment_time_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deployment_time_plan_histories`
--
ALTER TABLE `deployment_time_plan_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_and_users`
--
ALTER TABLE `project_and_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_level_one_histories`
--
ALTER TABLE `project_level_one_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_level_three_histories`
--
ALTER TABLE `project_level_three_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_level_two_histories`
--
ALTER TABLE `project_level_two_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_parents`
--
ALTER TABLE `project_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_parent_histories`
--
ALTER TABLE `project_parent_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_three_and_deployment_times`
--
ALTER TABLE `project_three_and_deployment_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deployment_time_histories`
--
ALTER TABLE `deployment_time_histories`
  ADD CONSTRAINT `deployment_time_histories_deployment_time_id_foreign` FOREIGN KEY (`deployment_time_id`) REFERENCES `deployment_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deployment_time_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deployment_time_plan_histories`
--
ALTER TABLE `deployment_time_plan_histories`
  ADD CONSTRAINT `deployment_time_plan_histories_deployment_time_id_foreign` FOREIGN KEY (`deployment_time_id`) REFERENCES `deployment_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deployment_time_plan_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_and_users`
--
ALTER TABLE `project_and_users`
  ADD CONSTRAINT `project_and_users_project_parent_id_foreign` FOREIGN KEY (`project_parent_id`) REFERENCES `project_parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_and_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  ADD CONSTRAINT `project_level_ones_project_parent_id_foreign` FOREIGN KEY (`project_parent_id`) REFERENCES `project_parents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_one_histories`
--
ALTER TABLE `project_level_one_histories`
  ADD CONSTRAINT `project_level_one_histories_project_one_id_foreign` FOREIGN KEY (`project_one_id`) REFERENCES `project_level_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_level_one_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  ADD CONSTRAINT `project_level_threes_project_two_id_foreign` FOREIGN KEY (`project_two_id`) REFERENCES `project_level_twos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_three_histories`
--
ALTER TABLE `project_level_three_histories`
  ADD CONSTRAINT `project_level_three_histories_project_three_id_foreign` FOREIGN KEY (`project_three_id`) REFERENCES `project_level_threes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_level_three_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  ADD CONSTRAINT `project_level_twos_project_one_id_foreign` FOREIGN KEY (`project_one_id`) REFERENCES `project_level_ones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_level_two_histories`
--
ALTER TABLE `project_level_two_histories`
  ADD CONSTRAINT `project_level_two_histories_project_two_id_foreign` FOREIGN KEY (`project_two_id`) REFERENCES `project_level_twos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_level_two_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_parent_histories`
--
ALTER TABLE `project_parent_histories`
  ADD CONSTRAINT `project_parent_histories_project_parent_id_foreign` FOREIGN KEY (`project_parent_id`) REFERENCES `project_parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_parent_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_three_and_deployment_times`
--
ALTER TABLE `project_three_and_deployment_times`
  ADD CONSTRAINT `project_three_and_deployment_times_deployment_time_id_foreign` FOREIGN KEY (`deployment_time_id`) REFERENCES `deployment_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_three_and_deployment_times_project_three_id_foreign` FOREIGN KEY (`project_three_id`) REFERENCES `project_level_threes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
