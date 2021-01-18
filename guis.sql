-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 08:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guis`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'openhour', '7', NULL, NULL),
(2, 'openminute', '30', NULL, NULL),
(3, 'closehour', '17', NULL, NULL),
(4, 'closeminute', '00', NULL, NULL),
(5, 'timeround', '0', NULL, NULL),
(6, 'lunchopenhour', '11', NULL, NULL),
(7, 'lunchopenminute', '30', NULL, NULL),
(8, 'lunchclosehour', '13', NULL, NULL),
(9, 'lunchcloseminute', '0', NULL, NULL),
(10, 'intervalround', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_02_22_071312_create_permission_tables', 1),
(9, '2020_12_16_040641_create_notifies_table', 1),
(10, '2020_12_16_040810_create_roll_call_table', 1),
(11, '2020_12_23_010849_add_avatar_to_users_table', 2),
(12, '2020_12_25_011916_create_roll_calls_table', 3),
(14, '2021_01_05_073438_create_config_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 7),
(1, 'App\\User', 15),
(2, 'App\\User', 2),
(2, 'App\\User', 4),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 11),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(2, 'App\\User', 16),
(2, 'App\\User', 19),
(2, 'App\\User', 20),
(2, 'App\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `notifies`
--

CREATE TABLE `notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifies`
--

INSERT INTO `notifies` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Khám sức khỏe định kỳ 2018', '<p><strong><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 18pt;\">TH&Ocirc;NG B&Aacute;O:</span></strong><br /><strong><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 18pt;\">V/v KH&Aacute;M SỨC KHỎE ĐỊNH KỲ NĂM 2018</span></strong></p>\r\n<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Thời gian kh&aacute;m v&agrave; x&eacute;t nghiệm: 7h00 &ndash; 11h00 ng&agrave;y 25/08/2018</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Địa điểm: Bệnh viện Đa khoa Vạn Hạnh, 781/B1-B3-B5 L&ecirc; Hồng Phong (nối d&agrave;i), P.12, Q.10.</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">*Lưu &yacute;*:</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">- Phụ nữ c&oacute; thai hay nghi ngờ c&oacute; thai : kh&ocirc;ng chụp X Quang.</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">- Kh&ocirc;ng ăn s&aacute;ng trước khi kh&aacute;m</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">- Kh&ocirc;ng uống cafe, rượu bia, chất k&iacute;ch th&iacute;ch trong 10 tiếng trước khi kh&aacute;m.</span></p>\r\n<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">C/c: c&aacute;c bạn c&ograve;n đang thử việc th&igrave; kh&ocirc;ng kh&aacute;m trong đợt n&agrave;y.</span><br /><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Tr&acirc;n trọng!</span></p>\r\n<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ch&uacute;c c&aacute;c bạn ng&agrave;y mới tốt l&agrave;nh</span></p>', '2020-12-17 19:19:37', '2020-12-17 19:36:00'),
(2, 'Thông báo nghỉ lễ Quốc Khánh', '<p><strong><span style=\"font-size: 24pt;\">TH&Ocirc;NG B&Aacute;O:</span></strong><br /><span style=\"font-size: 14pt;\">Tổng vụ xin th&ocirc;ng b&aacute;o ng&agrave;y nghỉ lễ Quốc Kh&aacute;nh như sau：</span><br /><span style=\"font-size: 14pt;\">■ Ng&agrave;y 2/9 (Chủ nhật)</span><br /><span style=\"font-size: 14pt;\">■ Ng&agrave;y 3/9 (Thứ 2) nghỉ b&ugrave; 2/9</span><br /><span style=\"font-size: 14pt;\">Cụ thể nghỉ từ：</span><br /><span style=\"font-size: 14pt;\">1/9 （thứ 7）～ 3/9（thứ 2）</span><br /><span style=\"font-size: 14pt;\">Ch&uacute; &yacute;：</span><br /><span style=\"font-size: 14pt;\">◇　Trước ng&agrave;y nghỉ phải thực hiện li&ecirc;n lạc kh&aacute;ch h&agrave;ng, điều chỉnh c&ocirc;ng việc cho kịp tiến độ.</span><br /><span style=\"font-size: 14pt;\">◇　Trong ng&agrave;y nghỉ nếu phải đi l&agrave;m vui l&ograve;ng li&ecirc;n lạc trước với Bp.Tổng vụ (Ms. Trang) để l&agrave;m thủ tục cần thiết.</span><br /><span style=\"font-size: 14pt;\">◇　Để đảm bảo an to&agrave;n PCCC y&ecirc;u cầu tắt c&aacute;c thiết bị điện.</span><br /><span style=\"font-size: 14pt;\">Ch&uacute;c c&aacute;c bạn c&oacute; kỳ nghỉ an to&agrave;n v&agrave; vui vẻ!</span></p>', '2020-12-17 19:41:40', '2020-12-17 19:41:40'),
(4, 'Khám sức khỏe định kỳ 2020', '<h2><strong>Kh&aacute;m sức khỏe định kỳ 2020</strong></h2>', '2020-12-20 17:59:21', '2020-12-20 17:59:21'),
(5, 'Thông báo nghỉ tết dương lịch', '<h2><strong>Th&ocirc;ng b&aacute;o nghỉ tết dương lịch</strong></h2>', '2020-12-20 18:00:00', '2020-12-20 18:00:21'),
(6, 'Thông báo nghỉ tết Nguyên Đán', '<h2><strong>Th&ocirc;ng b&aacute;o nghỉ tết Nguy&ecirc;n Đ&aacute;n</strong></h2>\r\n<p><span style=\"font-size: 14pt;\">Từ ng&agrave;y 02/10 đ&ecirc;n ng&agrave;y 02/16</span></p>', '2020-12-20 18:01:19', '2020-12-21 01:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission_post', 'web', '2020-12-16 19:33:40', '2020-12-16 19:33:40'),
(2, 'permission_edit', 'web', '2020-12-16 19:34:32', '2020-12-16 19:34:32'),
(3, 'permission_delete', 'web', '2020-12-16 19:34:52', '2020-12-16 19:34:52'),
(4, 'permission_view', 'web', '2020-12-16 19:35:04', '2020-12-16 19:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-12-16 20:20:43', '2020-12-16 20:20:43'),
(2, 'user', 'web', '2020-12-16 20:20:57', '2020-12-21 01:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roll_calls`
--

CREATE TABLE `roll_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `begin` time NOT NULL,
  `end` time DEFAULT NULL,
  `worktime` time DEFAULT NULL,
  `overtime` time DEFAULT NULL,
  `break` time DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roll_calls`
--

INSERT INTO `roll_calls` (`id`, `date`, `begin`, `end`, `worktime`, `overtime`, `break`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(9, '2020-12-25', '10:02:58', '10:12:45', NULL, NULL, NULL, '<p>Ms.Takasaki</p>', 1, '2020-12-24 20:02:58', '2020-12-24 21:15:51'),
(11, '2020-12-25', '10:45:00', '17:45:00', '06:00:00', NULL, NULL, NULL, 4, '2020-12-24 20:45:31', '2020-12-30 02:17:42'),
(12, '2020-12-23', '13:00:00', '17:00:00', '02:30:00', NULL, NULL, '<p>Ms.Takasaki</p>', 2, '2020-12-24 21:17:58', '2020-12-31 02:33:31'),
(13, '2020-12-24', '07:29:00', '17:29:00', '08:00:00', '00:29:00', NULL, NULL, 2, '2020-12-24 23:53:02', '2021-01-07 01:26:36'),
(14, '2020-12-25', '07:30:00', '20:00:00', '08:00:00', '03:00:00', NULL, '<p>Ms.Takasaki</p>', 2, '2020-12-25 00:12:36', '2020-12-31 00:40:29'),
(18, '2020-12-28', '15:30:00', '17:00:00', '08:00:00', NULL, NULL, NULL, 2, '2020-12-27 18:07:51', '2020-12-31 00:40:49'),
(19, '2020-12-28', '07:18:00', '17:15:00', '08:00:00', NULL, NULL, NULL, 4, '2020-12-27 19:17:32', '2020-12-30 02:17:22'),
(20, '2020-12-29', '07:10:00', '16:30:00', '08:00:00', NULL, NULL, NULL, 2, '2020-12-28 17:38:06', '2020-12-31 00:29:17'),
(21, '2020-12-29', '07:15:00', '17:03:00', '08:00:00', NULL, NULL, NULL, 4, '2020-12-28 20:31:44', '2020-12-30 02:17:02'),
(22, '2020-10-30', '06:30:00', '08:32:12', '01:02:00', '00:00:00', NULL, NULL, 2, '2020-12-29 17:39:53', '2021-01-05 18:32:13'),
(24, '2020-11-12', '13:30:00', '17:00:00', '03:30:00', NULL, NULL, NULL, 2, NULL, '2020-12-30 02:20:25'),
(25, '2020-12-30', '07:15:00', NULL, NULL, NULL, NULL, NULL, 4, '2020-12-29 19:44:12', '2020-12-30 02:16:48'),
(26, '2020-12-30', '07:30:00', '00:00:00', NULL, NULL, NULL, NULL, 1, '2020-12-29 19:49:31', '2020-12-29 19:49:41'),
(27, '2020-12-30', '07:30:00', '17:00:00', '04:00:00', NULL, NULL, NULL, 7, '2020-12-29 19:50:56', '2020-12-30 02:29:43'),
(28, '2020-12-31', '07:30:00', '17:30:00', '08:00:00', '00:30:00', NULL, NULL, 2, '2020-12-30 17:36:57', '2020-12-31 00:41:40'),
(29, '2020-12-31', '11:25:00', '17:00:00', '08:00:00', NULL, NULL, NULL, 4, '2020-12-30 21:26:00', '2020-12-31 00:48:00'),
(30, '2021-01-04', '06:00:00', '13:01:00', '04:01:00', '00:00:00', NULL, NULL, 2, '2021-01-03 17:52:41', '2021-01-06 01:36:42'),
(31, '2021-01-05', '07:00:00', '12:00:00', '04:30:00', '00:00:00', NULL, NULL, 2, '2021-01-04 17:53:45', '2021-01-05 18:02:12'),
(32, '2021-01-06', '07:00:00', '17:30:00', '08:00:00', '00:30:00', NULL, NULL, 2, '2021-01-05 17:53:43', '2021-01-06 01:44:21'),
(33, '2021-01-06', '07:00:00', '08:43:00', '01:13:00', '00:00:00', NULL, NULL, 1, '2021-01-05 18:41:49', '2021-01-05 18:44:07'),
(34, '2021-01-07', '07:30:00', '15:20:00', '06:20:00', '00:00:00', NULL, NULL, 2, '2021-01-06 18:02:56', '2021-01-07 01:20:32'),
(35, '2021-01-08', '07:43:00', '17:00:00', '07:47:00', '00:00:00', NULL, NULL, 2, '2021-01-07 17:43:38', '2021-01-13 17:42:40'),
(36, '2021-01-14', '07:42:31', NULL, NULL, NULL, NULL, NULL, 2, '2021-01-13 17:42:33', '2021-01-13 17:42:33'),
(37, '2021-01-15', '07:55:55', NULL, NULL, NULL, NULL, NULL, 2, '2021-01-14 17:55:56', '2021-01-14 17:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar-s-12.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Guis', 'admin@guis3.sakura.ne.jp', NULL, '$2y$10$jhzPKOvt.vwXz69F29Gad.nZRGVNk4QJOjCxLpwIg6zkRX/n8CCF.', NULL, '2020-12-16 17:51:03', '2020-12-23 02:11:47', '1608693889.jpg'),
(2, 'Tu', 'tu@guis3.sakura.ne.jp', NULL, '$2y$10$NkJ76cIGAUuQbWUT5isw8e8cq3ZvR7LDeA0xvBppAl.xDTRF21sTm', NULL, '2020-12-16 18:16:46', '2020-12-24 01:28:21', '1608692868.jpg'),
(4, 'Thanh', 'thanh@guis3.sakura.ne.jp', NULL, '$2y$10$bFWzvpdBYhuhOAn5LDTNJuL8E0/JFIsgUqkMa2Uh/tJzlgX9eGeIW', NULL, '2020-12-16 18:25:01', '2020-12-24 00:30:27', '1608693149.jpg'),
(7, 'Ai', 'ai@guis3.sakura.ne.jp', NULL, '$2y$10$7Z5LBDHoO3gvpsY.Wq.u1.I8EnaLvdZ9p1zgzUp4aa/4RTEKdQqTe', NULL, '2020-12-17 02:02:21', '2020-12-22 20:11:20', '1608693000.jpg'),
(8, 'Thinh', 'thinh@guis3.sakura.ne.jp', NULL, '$2y$10$.I.XHNOwEyG2NVRF/CDOaO5J.bVSxKE/ln9IxYUduIObnxRlJqIQe', NULL, '2020-12-17 02:10:05', '2020-12-22 20:26:15', '1608693975.jpg'),
(9, 'Phuc', 'phuc@guis3.sakura.ne.jp', NULL, '$2y$10$XmKTZkhRyY.Ix0qvEs3.gekb.QenyGhRsdYQ1ccVVKkKFEsfilCxO', NULL, '2020-12-17 02:48:44', '2020-12-21 01:47:32', 'avatar-s-12.jpg'),
(11, 'Tuan', 'tuan@guis3.sakura.ne.jp', NULL, '$2y$10$QwEWMdz8vlegeKb0/dgIJ.ZTM7VSLOq8zDyQxX2RkjxiY42mshqa.', NULL, '2020-12-20 20:31:19', '2020-12-22 20:17:58', '1608693478.jpg'),
(12, 'Cuong', 'cuong@guis3.sakura.ne.jp', NULL, '$2y$10$35B6nTeiVHZyhOcGHNixwuo7p/s7pHkOq7fpYgtZcN5v85r0np5wS', NULL, '2020-12-20 20:47:18', '2020-12-21 00:35:43', 'avatar-s-12.jpg'),
(13, 'Thuy', 'thuy@guis3.sakura.ne.jp', NULL, '$2y$10$0o3UKtyS5rWqLqH2R.YweOwLXeFyETy5whMsTPlDjzHFB2PDPyQWq', NULL, '2020-12-20 21:14:55', '2020-12-20 21:14:55', 'avatar-s-12.jpg'),
(15, 'My Tam', 'tam@guis3.sakura.ne.jp', NULL, '$2y$10$S7t37065rsIrpTrfq7laVOHIToMmBuxMsw.bqV4Kyfho82eXprfVi', NULL, '2020-12-20 21:20:33', '2020-12-21 17:35:52', 'avatar-s-12.jpg'),
(16, 'Bao My', 'my@guis3.sakura.ne.jp', NULL, '$2y$10$QeUNRqyB/erZ8i1eirMMG.IgMlMwkE622sT8vehcPM3CnTJXNNgmK', NULL, '2020-12-20 21:23:25', '2020-12-20 21:23:25', 'avatar-s-12.jpg'),
(19, 'Phan Tai', 'tai@guis3.sakura.ne.jp', NULL, '$2y$10$Z6EyBqtL9jGXqlIdsYqTtOdwx0AeCu1DXnRY5I/g9m9VOzwdn40ri', NULL, '2020-12-20 23:18:11', '2020-12-22 21:07:03', '1608696423.jpg'),
(20, 'Quynh', 'quynh@guis3.sakura.ne.jp', NULL, '$2y$10$hut4KSbU76t57itDxX4vYOrLZs3xmVQI1RHfYtc.zsc/Mq/9eJ77i', NULL, '2020-12-20 23:31:21', '2020-12-20 23:31:55', 'avatar-s-12.jpg'),
(21, 'Ha Lan', 'lan@guis3.sakura.ne.jp', NULL, '$2y$10$r0eIaD.qhYyRIc6z5WrZQO8c5onCCGCLphh5wu6focSZfPkwU0zi2', NULL, '2020-12-21 01:39:07', '2021-01-05 18:42:29', '1608693937.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `roll_calls`
--
ALTER TABLE `roll_calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roll_calls_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifies`
--
ALTER TABLE `notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roll_calls`
--
ALTER TABLE `roll_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roll_calls`
--
ALTER TABLE `roll_calls`
  ADD CONSTRAINT `roll_calls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
