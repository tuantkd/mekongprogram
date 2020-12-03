-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 08:59 AM
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
(7, 1, 2020, 1, 1, 2020, 17, 1, 2020, 4000000, 15000000, 25000000, 'gsdgqehytrhrtjhwtyhjtyhj', 'fghywtjyjhytjtyuwtyj', 'FSDFSDFDSF', 'vsdfĐSF', 'trutwttwtuwryuyu', 'ytrytrutrjeytjfjnfgjwfjwgfhbwtrhwtr', '2020-11-14 08:14:08', '2020-11-14 08:20:49'),
(10, 2, 2020, 1, 2, 2020, 10, 2, 2020, 5000000, 15000000, 25000000, '200 thành viên hoàn thành xuất sắc lắm', 'Đây là kết quả đạt được trong tháng', 'DSAFSDFSD', 'DÀ', 'kldsjfkljkljklhrhwthth', 'Mô tả demo thôi công cụ giúp xác định hướng tốt, hướng xấu, hướng hợp tuổi hay mệnh của chủ nhà. Khác với la bàn thông thường, la bàn phong thủy với nhiều ứng dụng, nhiều chi tiết giúp bạn chọn hướng tốt, hướng xấu một cách chính xác.  Vì có nhiều chi tiết phức tạp, có nhiều loại và nhiều tầng khác nhau nên không phải ai cũng biết cách sử dụng. Hãy để Invert hướng dẫn bạn cách dùng la bàn phong thủy xem hướng nhà ngay trong bài viết này nhé!', '2020-12-02 16:23:37', '2020-12-03 03:49:44');

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

--
-- Dumping data for table `deployment_time_histories`
--

INSERT INTO `deployment_time_histories` (`id`, `deployment_time_id`, `user_id`, `deployment_month_initialize`, `deployment_year_initialize`, `deployment_number_money_initial`, `deployment_address`, `deployment_partner`, `deployment_description`, `created_at`, `updated_at`) VALUES
(5, 10, 2, 2, 2020, 4626, 'DSAFSDFSD', 'DÀ', 'DSAFF', '2020-12-03 03:36:00', '2020-12-03 03:36:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `deployment_time_report_histories`
--

CREATE TABLE `deployment_time_report_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deployment_time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_number_money_real` double DEFAULT NULL,
  `deployment_index_achieved` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deployment_result_achieved` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deployment_time_report_histories`
--

INSERT INTO `deployment_time_report_histories` (`id`, `deployment_time_id`, `user_id`, `deployment_number_money_real`, `deployment_index_achieved`, `deployment_result_achieved`, `created_at`, `updated_at`) VALUES
(15, 10, 2, 25000000, 'htwuuthtjt', 'rjtrjtrjtrjyjytitykjwrt4kilo9oiul', '2020-12-03 03:36:55', '2020-12-03 03:36:55'),
(16, 10, 2, 25000000, 'htwuuthtjt', 'rjtrjtrjtrjyjytitykjwrt4kilo9oiul', '2020-12-03 03:49:03', '2020-12-03 03:49:03');

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
(16, '2020_11_10_162422_create_deployment_time_plan_histories_table', 3),
(17, '2020_11_11_145723_create_deployment_time_report_histories_table', 4);

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
(5, 2, 4, '2020-12-02 13:57:37', '2020-12-02 13:57:37'),
(6, 8, 4, '2020-12-02 14:10:35', '2020-12-02 14:10:35');

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
(3, 4, '1.1', 'djcsdfjdf', NULL, 'fdgfg', 'fdgfg', 'dfgd', '2020-12-02 13:58:12', '2020-12-02 13:58:12');

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
(7, 3, '1.1.2.1', 'Hoạt động nói về người dân sử dụng năng lượng mặt trời', NULL, '200 người phải thực hiện đúng tiến độ quy trình hoạt động', '50 người dân hiểu được quy trình', 'Phát sinh thì báo ngay', '2020-12-02 13:59:36', '2020-12-03 07:53:40'),
(8, 3, '1.1.2.3', 'Hoạt động về các quy trình tái tạo năng lượng sạch', NULL, '100 thành viên phải hoàn thành công việc', '20 người tiếp thu được', 'Nếu có phát sinh thì báo cho quản trị biết', '2020-12-03 03:47:36', '2020-12-03 07:53:33');

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

--
-- Dumping data for table `project_level_three_histories`
--

INSERT INTO `project_level_three_histories` (`id`, `project_three_id`, `user_id`, `project_three_code`, `project_three_name_operation`, `project_three_total_money`, `project_three_result_need_reach`, `project_three_index_need_reach`, `project_three_note`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '1.1.2.3', 'grgregtruytjytihgfhetyuy', NULL, 'hrtyrytrhtru', 'mỵthnghjytueyth', 'thtryuw6y', '2020-12-03 03:50:21', '2020-12-03 03:50:21'),
(2, 7, 2, '1.1.2.1', 'vsdvdsf', NULL, 'sdcds', 'sd', 'vdsfdf', '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(3, 8, 2, '1.1.2.3', 'Hoạt động 1.1.2.3 về các quy trình tái tạo năng lượng sạch', NULL, '100 thành viên phải hoàn thành công việc', '20 người tiếp thu được', 'Nếu có phát sinh thì báo cho quản trị biết', '2020-12-03 07:53:27', '2020-12-03 07:53:27'),
(4, 7, 2, '1.1.2.1', 'Hoạt động 1.1.2.1 nói về người dân sử dụng năng lượng mặt trời', NULL, '200 người phải thực hiện đúng tiến độ quy trình hoạt động', '50 người dân hiểu được quy trình', 'Phát sinh thì báo ngay', '2020-12-03 07:53:36', '2020-12-03 07:53:36');

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
(3, 3, '1.1.2', 'vfdvfd', NULL, 'vdsvdff', 'vsdvd', 'vsdvdsf', '2020-12-02 13:58:57', '2020-12-02 13:58:57');

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
(4, 'VN-0078', 'Logfram original', 'sdhsjkdafjkdvjvjkvjk', '2020-12-02 13:57:37', '2020-12-02 13:57:37');

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
(14, 7, 10, '2020-12-02 16:23:37', '2020-12-02 16:23:37'),
(16, 8, 10, '2020-12-03 03:47:48', '2020-12-03 03:47:48');

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
(2, 1, 'Phạm Ngọc Nhàn', 'ngocnhan', '$2y$10$Q86rrzG3EvBmbXGhzILdGeIKLVQ76H.Ck3vVJ/V4VHl3Yzta/DFtK', NULL, 'Nam', NULL, NULL, NULL, 'avatar5.png', 'f5bvG0jGVV0BPBjoasv4aBNe3vDpoHbPmiphBliUc8V5fDYICHXAfE0pMR6J', '2020-10-30 05:45:28', '2020-10-30 05:45:28'),
(6, 2, 'Đỗ Hồng Anh', 'MyMy', '$2y$10$oKh4LjEaivG7LSdg0TWTF.Ysd7D.nUtSacqQU7/Qx0EqIc5hfXvii', NULL, 'Nữ', NULL, NULL, NULL, 'logo-beer.png', NULL, '2020-11-14 07:44:38', '2020-11-14 07:44:38'),
(7, 1, 'Nguyễn Văn A', 'vana', '$2y$10$UtJr8rw4W8divsBjO3EVLOJ81vfssGTvEvAkFgYLzJ.VrpMCFtDwG', 'vana@gmail.com', 'Nam', '2020-12-02', NULL, 'Hậu Giang', 'CV_tuan_nguyen.png', NULL, '2020-12-02 13:54:49', '2020-12-02 13:54:49'),
(8, 2, 'Trần Thị Hạnh', 'thinhanh', '$2y$10$QS36NrMfuBkD84jdkDOcdezLp.jAyHCuN0tBwj0XOYW7Kice5NlAq', 'thihanh@gmail.com', 'Nữ', '2020-12-30', NULL, 'Sóc Trăng', 'be_cung_2.png', NULL, '2020-12-02 13:56:59', '2020-12-02 13:56:59');

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
-- Indexes for table `deployment_time_report_histories`
--
ALTER TABLE `deployment_time_report_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deployment_time_report_histories_deployment_time_id_foreign` (`deployment_time_id`),
  ADD KEY `deployment_time_report_histories_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deployment_time_histories`
--
ALTER TABLE `deployment_time_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deployment_time_plan_histories`
--
ALTER TABLE `deployment_time_plan_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deployment_time_report_histories`
--
ALTER TABLE `deployment_time_report_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project_and_users`
--
ALTER TABLE `project_and_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_level_ones`
--
ALTER TABLE `project_level_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_level_one_histories`
--
ALTER TABLE `project_level_one_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_level_threes`
--
ALTER TABLE `project_level_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_level_three_histories`
--
ALTER TABLE `project_level_three_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_level_twos`
--
ALTER TABLE `project_level_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_level_two_histories`
--
ALTER TABLE `project_level_two_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_parents`
--
ALTER TABLE `project_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_parent_histories`
--
ALTER TABLE `project_parent_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_three_and_deployment_times`
--
ALTER TABLE `project_three_and_deployment_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `deployment_time_report_histories`
--
ALTER TABLE `deployment_time_report_histories`
  ADD CONSTRAINT `deployment_time_report_histories_deployment_time_id_foreign` FOREIGN KEY (`deployment_time_id`) REFERENCES `deployment_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deployment_time_report_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
