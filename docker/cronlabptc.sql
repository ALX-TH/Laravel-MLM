-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Ноя 01 2018 г., 10:57
-- Версия сервера: 5.7.23-log
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hyipcms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adverts`
--

CREATE TABLE `adverts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ptc_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `adverts`
--

INSERT INTO `adverts` (`id`, `user_id`, `ptc_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-17', 0, '2018-10-17 11:32:22', '2018-10-17 11:32:22'),
(2, 1, 2, '2018-10-17', 0, '2018-10-17 11:32:22', '2018-10-17 11:32:22'),
(3, 1, 3, '2018-10-17', 1, '2018-10-17 11:32:22', '2018-10-17 11:45:40'),
(4, 1, 1, '2018-10-30', 1, '2018-10-30 13:10:38', '2018-10-30 13:40:04'),
(5, 1, 2, '2018-10-30', 1, '2018-10-30 13:10:38', '2018-10-30 14:54:34'),
(6, 1, 3, '2018-10-30', 0, '2018-10-30 13:10:38', '2018-10-30 13:10:38'),
(7, 1, 4, '2018-10-30', 1, '2018-10-30 13:10:38', '2018-10-30 13:13:59'),
(8, 1, 1, '2018-10-31', 0, '2018-10-31 11:56:07', '2018-10-31 11:56:07'),
(9, 1, 2, '2018-10-31', 0, '2018-10-31 11:56:07', '2018-10-31 11:56:07'),
(10, 1, 3, '2018-10-31', 0, '2018-10-31 11:56:07', '2018-10-31 11:56:07'),
(11, 1, 4, '2018-10-31', 0, '2018-10-31 11:56:07', '2018-10-31 11:56:07');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) UNSIGNED NOT NULL,
  `charge` decimal(15,2) UNSIGNED NOT NULL,
  `net_amount` decimal(15,2) UNSIGNED NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `deposits`
--

INSERT INTO `deposits` (`id`, `transaction_id`, `user_id`, `gateway_name`, `amount`, `charge`, `net_amount`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'lu1xiwPOTG', 1, 'PerfectMoney', '800.00', '29.00', '771.00', 'No Details are Provided', 1, '2018-10-09 08:45:16', '2018-10-30 13:36:09'),
(2, 'jqMEkr5id6', 1, 'Perfect Money', '200.00', '8.00', '192.00', 'No Details are Provided', 1, '2018-10-31 10:27:28', '2018-10-31 13:42:02'),
(3, 'WVyK9V1cT58ob', 1, 'PayPal', '100.00', '4.50', '95.50', 'PayPal Instant Deposit', 1, '2018-10-31 14:53:45', '2018-10-31 14:53:45'),
(4, 'Bf67H817xVztl', 1, 'PayPal', '100.00', '4.50', '95.50', 'PayPal Instant Deposit', 1, '2018-10-31 15:35:49', '2018-10-31 15:35:49'),
(5, 'HNEGCm1UKnbR9', 1, 'PayPal', '150.00', '5.75', '144.25', 'PayPal Instant Deposit', 1, '2018-10-31 15:44:18', '2018-10-31 15:44:18'),
(6, 'K1ypgX1tUF3LF', 1, 'PayPal', '50.00', '3.25', '46.75', 'PayPal Instant Deposit', 1, '2018-10-31 16:00:28', '2018-10-31 16:00:28'),
(7, '0y9tg01VBszm8', 1, 'PayPal', '50.00', '3.25', '46.75', 'PayPal Instant Deposit', 1, '2018-11-01 07:29:08', '2018-11-01 07:29:08');

-- --------------------------------------------------------

--
-- Структура таблицы `discussions`
--

CREATE TABLE `discussions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `support_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `percent` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `ex_percent` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `image`, `account`, `fixed`, `percent`, `ex_percent`, `val1`, `val2`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 'uploads/gateways/PayPal.png', 'therion.kiev-facilitator@gmail.com', '2.00', '2.50', '3.50', 'Af2ulxt-_guMTZOTpRE1yPo2ukG6Ksj_vifI5ZxxHAKgjDoiu21Lhm9NaSb1-rN9tXc_Qt3ZeSQSxQSF', 'EBq1kDhQbgxKRYOcbLZMcp-avmtFcx52c9VSCbkuN45l7RG-2ZCAkJXSuV47A3Zr1cOh-mQibwu_FYjW', NULL, 1, '2018-02-14 05:55:52', '2018-02-14 05:55:52');

-- --------------------------------------------------------

--
-- Структура таблицы `inboxes`
--

CREATE TABLE `inboxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `interests`
--

CREATE TABLE `interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invest_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `made_time` datetime DEFAULT NULL,
  `total_repeat` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `interests`
--

INSERT INTO `interests` (`id`, `reference_id`, `user_id`, `invest_id`, `start_time`, `made_time`, `total_repeat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'oSOqY3PdZKOv', 1, 1, '2018-11-01 13:00:34', '2018-10-31 13:00:34', 2, 0, '2018-10-17 11:47:16', '2018-10-31 13:00:34'),
(2, 'wadKzyrafpDB', 1, 2, '2018-11-01 13:00:34', '2018-10-31 13:00:34', 2, 0, '2018-10-17 11:47:38', '2018-10-31 13:00:34'),
(3, 'SiywhQN32CFI', 1, 3, '2018-10-31 07:10:48', '2018-10-31 06:10:48', 14, 1, '2018-10-30 13:10:30', '2018-10-31 06:10:49'),
(4, 'fkDnKlZZe02a', 1, 4, '2018-11-01 13:40:43', '2018-10-31 13:40:43', 1, 0, '2018-10-31 09:40:42', '2018-10-31 13:40:43');

-- --------------------------------------------------------

--
-- Структура таблицы `interest_logs`
--

CREATE TABLE `interest_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invest_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(15,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `interest_logs`
--

INSERT INTO `interest_logs` (`id`, `reference_id`, `user_id`, `invest_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'PjRzGdrthcUG', 1, 1, '0.2083', '2018-10-30 13:00:34', '2018-10-30 13:00:34'),
(2, '7BEG2o46cn3Z', 1, 2, '0.9722', '2018-10-30 13:00:34', '2018-10-30 13:00:34'),
(3, 'dh6897gpz3Up', 1, 3, '0.0143', '2018-10-30 17:10:31', '2018-10-30 17:10:31'),
(4, 'tUNVhMNDqvJk', 1, 3, '0.0143', '2018-10-30 18:10:33', '2018-10-30 18:10:33'),
(5, 'xmHYeoyISHUy', 1, 3, '0.0143', '2018-10-30 19:10:36', '2018-10-30 19:10:36'),
(6, 'psuzJyskpA2G', 1, 3, '0.0143', '2018-10-30 20:10:38', '2018-10-30 20:10:38'),
(7, 'kpWcqeEn9FG8', 1, 3, '0.0143', '2018-10-30 21:10:38', '2018-10-30 21:10:38'),
(8, 'L9FwNydZ5mAa', 1, 3, '0.0143', '2018-10-30 22:10:38', '2018-10-30 22:10:38'),
(9, 'BNGSymYbtfw8', 1, 3, '0.0143', '2018-10-30 23:10:41', '2018-10-30 23:10:41'),
(10, '6n3a2fM9mBt1', 1, 3, '0.0143', '2018-10-31 00:10:41', '2018-10-31 00:10:41'),
(11, 'jYQlh3OSFimO', 1, 3, '0.0143', '2018-10-31 01:10:42', '2018-10-31 01:10:42'),
(12, 'mVopFQjsx3rO', 1, 3, '0.0143', '2018-10-31 02:10:45', '2018-10-31 02:10:45'),
(13, '3dwyhIi0FMEl', 1, 3, '0.0143', '2018-10-31 03:10:45', '2018-10-31 03:10:45'),
(14, 'C4N9IpUdZzzr', 1, 3, '0.0143', '2018-10-31 04:10:46', '2018-10-31 04:10:46'),
(15, 'VxU5llvmcCQT', 1, 3, '0.0143', '2018-10-31 05:10:48', '2018-10-31 05:10:48'),
(16, 'ouowJNI4CJyt', 1, 3, '0.0143', '2018-10-31 06:10:48', '2018-10-31 06:10:48'),
(17, 'ELjlGYNfdgXS', 1, 1, '0.2083', '2018-10-31 13:00:34', '2018-10-31 13:00:34'),
(18, 'C9cdGH0a4C7U', 1, 2, '0.9722', '2018-10-31 13:00:34', '2018-10-31 13:00:34'),
(19, 'LGaGs2rOSKTx', 1, 4, '0.1944', '2018-10-31 13:40:43', '2018-10-31 13:40:43');

-- --------------------------------------------------------

--
-- Структура таблицы `invests`
--

CREATE TABLE `invests` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(15,2) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `invests`
--

INSERT INTO `invests` (`id`, `reference_id`, `user_id`, `plan_id`, `amount`, `start_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jgY0m3YfTtqb', 1, 13, '100.00', '2018-10-17 13:47:16', 1, '2018-10-17 11:47:16', '2018-10-30 13:00:34'),
(2, 'J88skZJhqaow', 1, 14, '500.00', '2018-10-17 13:47:38', 1, '2018-10-17 11:47:38', '2018-10-30 13:00:34'),
(3, 'oicBSp9GXo6J', 1, 12, '10.00', '2018-10-30 15:10:30', 3, '2018-10-30 13:10:30', '2018-10-31 06:10:49'),
(4, 'VGn5NuBmqo02', 1, 14, '100.00', '2018-10-31 11:40:42', 1, '2018-10-31 09:40:42', '2018-10-31 13:40:43');

-- --------------------------------------------------------

--
-- Структура таблицы `kyc2s`
--

CREATE TABLE `kyc2s` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kyc2s`
--

INSERT INTO `kyc2s` (`id`, `user_id`, `name`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank Statement', 'uploads/verifications/1540906548t_1_vaa.jpg', 1, '2018-10-30 13:35:48', '2018-10-30 13:37:46');

-- --------------------------------------------------------

--
-- Структура таблицы `kycs`
--

CREATE TABLE `kycs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kycs`
--

INSERT INTO `kycs` (`id`, `user_id`, `name`, `number`, `front`, `back`, `dob`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'International Passport', '20000120-00272', 'uploads/verifications/1540906512t_1_vaa.jpg', 'uploads/verifications/1540906512t_1_vaa.jpg', '2000-01-02 00:00:00', 1, '2018-10-30 13:35:12', '2018-10-30 13:37:34');

-- --------------------------------------------------------

--
-- Структура таблицы `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_limit` int(11) NOT NULL,
  `price` decimal(10,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `duration` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `details`, `ad_limit`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'This a free membership. Your Daily Earn up to 0.01$', 2, '0.0000', 10000, '2018-02-14 05:55:51', '2018-02-14 05:55:51'),
(2, 'Gold', 'This a Gold membership. Your Daily Earn up to 1.01$', 5, '20.0000', 12, '2018-02-14 05:55:51', '2018-02-14 05:55:51'),
(3, 'Diamond', 'This a Diamond membership. Your Daily Earn up to 2.01$', 10, '40.0000', 24, '2018-02-14 05:55:52', '2018-02-14 05:55:52'),
(4, 'Vip', 'This a Vip membership. Your Daily Earn up to 5.51$', 20, '50.6000', 30, '2018-02-14 05:55:52', '2018-02-14 05:55:52');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(375, '2014_10_12_000000_create_users_table', 1),
(376, '2014_10_12_100000_create_password_resets_table', 1),
(377, '2017_12_18_124540_create_posts_table', 1),
(378, '2017_12_18_125025_create_categories_table', 1),
(379, '2017_12_19_200820_create_tags_table', 1),
(380, '2017_12_19_201926_create_post_tag_table', 1),
(381, '2017_12_20_162035_create_profiles_table', 1),
(382, '2017_12_22_163903_create_settings_table', 1),
(383, '2017_12_23_125216_create_testimonials_table', 1),
(384, '2017_12_24_195423_create_memberships_table', 1),
(385, '2017_12_26_221210_create_ptcs_table', 1),
(386, '2017_12_27_113252_create_ppvs_table', 1),
(387, '2017_12_30_195057_create_gateways_table', 1),
(388, '2018_01_02_023228_create_deposits_table', 1),
(389, '2018_01_03_143034_create_withdraws_table', 1),
(390, '2018_01_06_193246_create_adverts_table', 1),
(391, '2018_01_06_220134_create_videos_table', 1),
(392, '2018_01_08_203835_create_oauth_identities_table', 1),
(393, '2018_01_10_040132_create_reflinks_table', 1),
(394, '2018_01_10_041048_create_referrals_table', 1),
(395, '2018_01_10_101234_create_pages_table', 1),
(396, '2018_01_10_200226_create_kycs_table', 1),
(397, '2018_01_10_204110_create_kyc2s_table', 1),
(398, '2018_01_12_180141_create_supports_table', 1),
(399, '2018_01_13_102411_create_faqs_table', 1),
(400, '2018_01_13_175523_create_discussions_table', 1),
(401, '2018_01_14_112850_create_plans_table', 1),
(402, '2018_01_14_125846_create_styles_table', 1),
(403, '2018_01_15_111027_create_user_logs_table', 1),
(404, '2018_01_16_221146_create_invests_table', 1),
(405, '2018_01_16_231341_create_interests_table', 1),
(406, '2018_01_18_043130_create_interest_logs_table', 1),
(407, '2018_01_18_200832_create_offlines_table', 1),
(408, '2018_01_20_061439_create_inboxes_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_identities`
--

CREATE TABLE `oauth_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `offlines`
--

CREATE TABLE `offlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `percent` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `ex_percent` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offlines`
--

INSERT INTO `offlines` (`id`, `name`, `image`, `account`, `fixed`, `percent`, `ex_percent`, `val1`, `val2`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Perfect Money', 'uploads/gateways/PerfectMoney.png', 'U18582922', '1.00', '3.50', '5.00', 'reg4e54h1grt1j', NULL, 'Russian payment system', 1, '2018-02-14 05:55:52', '2018-10-30 14:51:38'),
(2, 'Bank Transfer', 'uploads/gateways/BankTransfer.png', '2114554420203', '50.00', '1.50', '3.50', NULL, NULL, '<p>Our Bank Name:&nbsp;<b>BarClays</b></p><p>Account Holders Name: <b>Sherlock Holmes</b><br></p><p>Account Number:&nbsp;<b>5262 0216 3566 5746 </b></p><p>Sort Code:&nbsp;<b>66693861</b></p><p> SWIFT Code: <b>TD11 1XZ </b></p><p>IBAN&nbsp;Code:&nbsp;<b>3130752327</b></p>', 0, '2018-02-14 05:55:52', '2018-10-30 15:17:36'),
(3, 'bKash', 'uploads/gateways/bKash.png', '01744236585', '0.00', '2.00', '3.50', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:52', '2018-10-30 15:17:57'),
(4, 'Payza', 'uploads/gateways/Payza.png', 'cronlabin@gmail.com', '1.00', '1.50', '1.50', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:05'),
(5, 'BitCoin', 'uploads/gateways/BitCoin.png', '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', '7.00', '2.50', '3.50', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:13'),
(6, 'BitCoin Cash', 'uploads/gateways/BitCoinCash.png', '35qL43qYwLdKtnR7yMfGNDvzv6WyZ8yT2n', '5.00', '0.50', '5.50', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:20'),
(7, 'Cash On Delivery', 'uploads/gateways/CashOnDelevery.png', 'Direct Deposit', '1.00', '0.00', '0.00', NULL, NULL, 'Come Our Office & Pay Money', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:29'),
(8, 'Ethereum', 'uploads/gateways/Ethereum.png', '0x123f681646d4a755815f9cb19e1acc8565a0c2ac', '2.00', '10.00', '2.00', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:37'),
(9, 'Lite Coin', 'uploads/gateways/LiteCoin.png', '3CDJNfdWX8m2NwuGUV3nhXHXEeLygMXoAj', '3.00', '5.00', '10.00', NULL, NULL, 'Please Send Money With Fee', 0, '2018-02-14 05:55:53', '2018-10-30 15:18:45');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deletable` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `name_h1`, `meta_title`, `meta_description`, `meta_keywords`, `content`, `status`, `is_deletable`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', 'Terms and Conditions', 'Terms & Conditions', 'Terms and Conditions', 'terms, conditions', '<p>Please read these Terms of Use (\"Terms\", \"Terms of Use\") carefully before using the<br />http://localhost.com website and the My Mobile App (change this) mobile<br />application (the \"Service\") operated by My Company (change this) (\"us\", \"we\", or \"our\").<br />Your access to and use of the Service is conditioned on your acceptance of and compliance with<br />these Terms. These Terms apply to all visitors, users and others who access or use the Service.<br />By accessing or using the Service you agree to be bound by these Terms. If you disagree<br />with any part of the terms then you may not access the Service.</p>\r\n<p><strong>Purchases</strong></p>\r\n<p>If you wish to purchase any product or service made available through the Service (\"Purchase\"),<br />you may be asked to supply certain information relevant to your Purchase including, without<br />limitation, your &hellip;<br />The Purchases section is for businesses that sell online (physical or digital). For the full<br />disclosure section or for a \"SaaS\" section, create your own Terms of Use.</p>\r\n<p><strong>Termination</strong></p>\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for<br />any reason whatsoever, including without limitation if you breach the Terms.<br />All provisions of the Terms which by their nature should survive termination shall survive<br />termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and<br />limitations of liability.</p>\r\n<p><strong>Content</strong></p>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information,<br />text, graphics, videos, or other material (\"Content\"). You are responsible for the &hellip;<br />The Content section is for businesses that allow users to create, edit, share, make content on<br />their websites or apps. For the full disclosure section, create your own Terms of Use.</p>\r\n<p><strong>Links To Other Web Sites</strong></p>\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled<br />by our Company LaravelDev.</p>\r\n<p>LaravelDev has no control over, and assumes no responsibility for, the content,<br />privacy policies, or practices of any third party web sites or services. You further acknowledge and<br />agree that LaravelDev shall not be responsible or liable, directly or indirectly, for any<br />damage or loss caused or alleged to be caused by or in connection with use of or reliance on any<br />such content, goods or services available on or through any such web sites or services.</p>\r\n<p><strong>Changes</strong></p>\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a<br />revision is material we will try to provide at least 60 days\' notice prior to any new terms<br />taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<p><strong>Contact Us</strong></p>\r\n<p>If you have any questions about these Terms, please contact us.</p>', 1, 0, 'terms-and-conditions', '2018-10-09 14:40:01', '2018-10-10 07:34:56'),
(2, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'privacy, policy', '<p>This website is operated by&nbsp;LaravelDev and whose registered address is&nbsp;UK,London (\"We\") are committed to protecting and preserving the privacy of our visitors when visiting our site or communicating electronically with us.</p>\r\n<p>This policy sets out how we process any personal data we collect from you or that you provide to us through our website. We confirm that we will keep your information secure and that we will comply fully with all applicable UK Data Protection legislation and regulations. Please read the following carefully to understand what happens to personal data that you choose to provide to us, or that we collect from you when you visit this site. By visiting&nbsp;localhost.com (our website) you are accepting and consenting to the practices described in this policy.</p>\r\n<p>Types of information we may collect from you<br />We may collect, store and use the following kinds of personal information about individuals who visit and use our website:</p>\r\n<p>Information you supply to us. You may supply us with information about you by filling in forms on our website. This includes information you provide when you submit a contact/enquiry form [list any other active forms on your website (ie. Request a Prospectus Form, Application Form, Report and Absence Form, etc.]. The information you give us may include your name, address, e-mail address and phone number, [list any other types of information you collect via other active forms on your website (ie. child&rsquo;s name, child&rsquo;s date of birth, etc.)].</p>\r\n<p>Information our website automatically collects about you. With regard to each of your visits to our website we may automatically collect information including the following:</p>\r\n<p>technical information, including a truncated and anonymised version of your Internet protocol (IP) address, browser type and version, operating system and platform;<br />information about your visit, including what pages you visit, how long you are on the site, how you got to the site (including date and time); page response times, length of visit, what you click on, documents downloaded and download errors.<br />[Describe any other types of information you may collect through third party services you may have enabled on your website not linked to Cleverbox (ie. other tracking, marketing or SEO services)]</p>\r\n<p><strong>Cookies</strong></p>\r\n<p>Our website uses cookies to distinguish you from other users of our website. This helps us to provide you with a good experience when you browse our website and also allows us to improve our site. For detailed information on the cookies we use and the purposes for which we use them see our Cookie Policy [Make this link to the cookie policy page on your website that will be automatically updated by Cleverbox].</p>\r\n<p>How we may use the information we collect<br />We use the information in the following ways:</p>\r\n<p>Information you supply to us. We will use this information:</p>\r\n<p>to provide you with information and/or services that you request from us;<br />[Describe any other uses of the information you collect (ie. other marketing communications to individuals who have requested a prospectus)]</p>\r\n<p>Information we automatically collect about you. We will use this information:</p>\r\n<p>to administer our site including troubleshooting and statistical purposes;<br />to improve our site to ensure that content is presented in the most effective manner for you and for your computer;<br />security and debugging as part of our efforts to keep our site safe and secure.<br />This information is collected anonymously and is not linked to information that identifies you as an individual. We use Google Analytics to track this information. Find out how Google uses your data at <a title=\"GoogleAnalytics link\" href=\"https://support.google.com/analytics/answer/6004245\" target=\"_blank\" rel=\"noopener noreferrer\">GoogleAnalytics&nbsp;</a>.</p>\r\n<p><strong>Disclosure of your information</strong><br />Any information you provide to us will either be emailed directly to us or may be stored on a secure server located near Dublin within the Republic of Ireland. We use a trusted third party website and hosting provider (Cleverbox) to facilitate the running and management of this website. Cleverbox meet high data protection and security standards and are bound by contract to keep any information they process on our behalf confidential. Any data that may be collected through this website that Cleverbox process, is kept secure and only processed in the manner we instruct them to. Cleverbox cannot access, provide, rectify or delete any data that they store on our behalf without permission.</p>\r\n<p>We do not rent, sell or share personal information about you with other people or non-affiliated companies. [Check this statement is in accordance with your internal data processing activities and outline any other storage of information inline with your internal data policy (ie. Do you have a database of personal data stored on third party platforms such as MailChimp?)]</p>\r\n<p>We will use all reasonable efforts to ensure that your personal data is not disclosed to regional/national institutions and authorities, unless required by law or other regulations.</p>\r\n<p>Unfortunately, the transmission of information via the internet is not completely secure. Although we will do our best to protect your personal data, we cannot guarantee the security of your data transmitted to our site; any transmission is at your own risk. Once we have received your information, we will use strict procedures and security features to try to prevent unauthorised access.</p>\r\n<p><strong>Third party links</strong><br />Our site may, from time to time, contain links to and from the third party websites. If you follow a link to any of these websites, please note that these websites have their own privacy policies and that we do not accept any responsibility or liability for these policies. Please check these policies before you submit any personal data to these websites.</p>\r\n<p><strong>Your rights &ndash; access to your personal data</strong><br />You have the right to ensure that your personal data is being processed lawfully (&ldquo;Subject Access Right&rdquo;). Your subject access right can be exercised in accordance with data protection laws and regulations. Any subject access request must be made in writing to [insert school/Trust Data Controller contact details]. We will provide your personal data to you within the statutory time frames. To enable us to trace any of your personal data that we may be holding, we may need to request further information from you. If you have a complaint about how we have used your information, you have the right to complain to the Information Commissioner&rsquo;s Office (ICO).</p>\r\n<p><strong>Changes to our privacy policy</strong><br />Any changes we may make to our privacy policy in the future will be posted on this page and, where appropriate, notified to you by e-mail. Please check back frequently to see any updates or changes to our privacy policy.</p>\r\n<p><strong>Contact</strong><br />Questions, comments and requests regarding this privacy policy are welcomed and should be addressed to support@example.com.</p>', 1, 0, 'privacy-policy', '2018-10-09 14:40:01', '2018-10-10 07:25:56'),
(3, 'Know Your Customer (KYC) Policy', 'Know Your Customer (KYC) Policy', 'Know Your Customer (KYC) Policy', 'Know Your Customer (KYC) Policy', 'customer, policy, kyc', '<p>Although the phrase &ldquo;know your customer&rdquo; may seem insignificant to most people, it has a very important meaning in the business world. The process of knowing your customer, otherwise referred to as KYC, is what businesses do in order to verify the identity of their clients either before or during the time that they start doing business with them. The term KYC can also reference the regulated bank practices that are similarly used to verify clients&rsquo; identities.</p>\r\n<p>Banks and companies of all sizes have become big supporters of KYC. It is increasingly common for banking institutions, credit companies, and insurance agencies to require that their customers provide them with detailed information in order to ensure that they are not involved with corruption, bribery, or money laundering.</p>\r\n<p>KYC policies have been expanding for some time and they have become very important globally. With issues pertaining to corruption, terrorist financing, and money laundering becoming so prevalent, KYC policies have now evolved into an important tool to combat illegal transactions in the international finance field. KYC allows companies to protect themselves by ensuring that they are doing business legally and with legitimate entities, and it also protects the individuals who might otherwise be harmed by financial crime.</p>\r\n<p>Many financial institutions begin their KYC procedures by simply collecting basic data and information about their customers, ideally using electronic identity verification. Some countries call this a &ldquo;Customer Identification Program&rdquo;. Pieces of information such as names, social security numbers, birthdays, and addresses can be very useful when determining whether or not an individual is involved in a financial crime.</p>\r\n<p>Once this basic data is collected, banks generally compare it to lists of individuals that are known for corruption, on a list of sanctions, suspected of being involved with a crime, or at a high risk of partaking in bribery or money laundering. Financial institutions also look at lists of Politically Exposed Persons, or PEPs.</p>\r\n<p>From there, the bank then quantifies how much of a risk their client appears to be and how likely they are to become involved in corrupt or illegal activity. Once this calculation has been made, the bank can make a theoretical outline of what that client&rsquo;s account should look like in the near future. Once the expected trajectory of the account is in place, the bank can then consistently monitor the client&rsquo;s account activity and make sure that nothing appears to be out of place or suspicious.</p>\r\n<p>Doing this for one individual also enables financial institutions to compare that client&rsquo;s profile to those of his or her peers. If a bank has two clients that have very similar occupations and backgrounds, and they are known for interacting in their respective field, it is assumed that their accounts will look rather similar.</p>', 1, 0, 'know-your-customer-kyc-policy', '2018-10-09 14:40:01', '2018-10-10 07:08:21'),
(4, 'Anti Money Laundering Policy', 'Anti Money Laundering Policy', 'Anti Money Laundering Policy', 'Anti Money Laundering Policy', 'kewords, anti, money, laundering', '<p>With financial crime more prevalent than ever, it is important that both companies and governments develop tactics to curb it. Probably the most common way of doing so is to implement anti-money laundering policies that prevent the smuggling of illegally-obtained funds. Most countries now have their own anti-money laundering policies, and many require that all financial institutions strictly abide by these policies in order to support efforts against financial crime.</p>\r\n<p>Anti-money laundering policies typically require most entities that complete financial transactions to keep thorough records of their clients&rsquo; accounts and activities. If they come across any information that appears to be suspicious, they are required to report it to the government for further investigation. Financial institutions are crucial for the collection of financial intelligence, and the public sector greatly depends on them in order to compile data.</p>\r\n<p>Additionally, anti-money laundering policies require financial institutions to periodically file reports regarding their clients and completed transactions. These reports vary by country, but many of them are quite similar. For instance, in the United States, certain paperwork must be completed for transactions that involve over $10,000. Similarly, if a transaction appears to be otherwise suspicious&mdash;even if it is not over $10,000&mdash;a bank employee must file a suspicious activity report (SAR).</p>\r\n<p>Almost all countries with anti-money laundering policies have suspicious activity reports, and many of them also have certain pieces of legislation that protect banks as well.</p>\r\n<p>Previously, banks had been wary about providing the government with clients&rsquo; personal information as they feared potential liability for doing so. Now, however, a majority of states have passed laws that allow banks to forward on client information without facing any backlash or legal repercussions. This has greatly simplified governments&rsquo; efforts to implement effective anti-money laundering policies and acquire financial intelligence.</p>\r\n<p>It is important to note that banks are not the only financial institutions required to follow anti-money laundering policies and fill out SARs. Other institutions such as currency exchange firms, casinos, insurance agencies, and accountants must also follow certain anti-money laundering regulations. This is because they often complete large transactions and are likely to have direct contact with the individuals or companies that are responsible for financial crime. By gathering financial intelligence from these entities as well, the public sector is able to track down criminals more efficiently and, ideally, uncover legal violations before they reach a large scale.</p>\r\n<p>Technology has become a critical part of anti-money laundering policies, because it has made it much easier for institutions to comply with regulations. By using special compliance platforms, such as ComplyAdvantage, companies are now able to easily research their clients and ensure that they are not doing business with criminals. This major advancement is becoming an essential tool for fighting financial crime.</p>', 1, 1, 'anti-money-laundering-policy', '2018-10-09 14:40:01', '2018-10-30 15:09:34'),
(5, 'About us', 'About us', 'About us', 'About us', 'About us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porta sapien ut consectetur blandit. Nam consequat quis justo at luctus. Quisque euismod urna vitae massa lacinia, vitae tristique quam aliquet. Aliquam at porttitor justo, non elementum felis. Sed blandit gravida rhoncus. Maecenas scelerisque eu libero non molestie. Vivamus facilisis sapien in augue luctus sodales. Donec diam turpis, scelerisque eget dignissim sed, consectetur quis mauris. Maecenas eu cursus risus, id ultricies lorem. In hac habitasse platea dictumst. Praesent massa diam, volutpat in tellus vehicula, congue imperdiet mi. In in placerat risus, vitae pellentesque enim. Donec quis tempus enim. Vivamus lobortis risus sapien, cursus faucibus dolor posuere ac. Integer gravida congue dui in tincidunt.</p>\r\n<p>Nam blandit dolor sed metus rutrum elementum. Cras non mauris sem. Sed at magna sit amet ipsum vulputate condimentum nec nec nibh. Phasellus tincidunt placerat enim, a fermentum felis pulvinar vitae. Mauris a tellus at purus ultrices vestibulum eu vitae magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac malesuada ipsum. Integer nec consectetur leo, eu sollicitudin mi. Pellentesque a urna elementum, ornare tortor sit amet, fermentum augue. Fusce lorem nisl, pharetra eu vehicula at, molestie rutrum nisl. Nam pellentesque orci eu elementum pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum eu neque quis eros imperdiet convallis. Nulla facilisi. Maecenas nec bibendum eros, ultricies gravida eros. Pellentesque vehicula eros enim, sit amet hendrerit diam condimentum et.</p>\r\n<p>Pellentesque rutrum libero et mauris porttitor cursus. Etiam feugiat nisl sed faucibus luctus. Curabitur quis vulputate ex. Aliquam sagittis, nisl vel volutpat pretium, nunc ligula facilisis dui, eget iaculis dolor sapien vel est. Fusce vel dapibus est. Ut sed sem eget ante facilisis ultricies. Mauris dignissim ante id purus blandit varius. Proin at nibh vitae urna interdum sodales sit amet vel est. Nulla consectetur felis vitae velit luctus tristique. Etiam nulla erat, tincidunt vel semper nec, bibendum sed nunc. Sed lobortis leo ac turpis blandit consectetur. Morbi id sapien ac metus sodales vestibulum a sit amet nisi. Pellentesque semper dictum metus id molestie. Duis iaculis, dolor nec tincidunt fermentum, sem urna scelerisque arcu, eget efficitur massa ex in sapien. Cras a urna nisi. Duis vulputate velit vitae sapien malesuada, nec aliquam nisl finibus.</p>\r\n<p>Vestibulum sed pretium magna, ac blandit odio. Proin lacinia efficitur metus a elementum. Vivamus blandit magna libero, nec malesuada arcu malesuada vel. Ut vel est risus. Proin ipsum nulla, tristique sollicitudin est non, bibendum porttitor nisl. Maecenas laoreet consequat felis id aliquet. Praesent commodo, lorem ornare condimentum molestie, mi felis efficitur nunc, a varius velit magna at sem. Sed molestie diam dui, sit amet ultrices ex hendrerit eu. Nam posuere eget eros sit amet tincidunt. Phasellus sagittis, lacus et consectetur hendrerit, dolor dolor dictum dui, ac accumsan orci ex non eros. Aenean dolor massa, faucibus id faucibus at, tempor et enim. Aliquam erat volutpat.</p>\r\n<p>Etiam ultrices tempus velit vitae blandit. Nam id ornare turpis. Vestibulum egestas molestie arcu, ac lobortis purus lobortis condimentum. Pellentesque in facilisis urna. Sed sit amet lobortis ligula. Pellentesque iaculis nunc quis dolor egestas tempus a et purus. Maecenas sapien ligula, sollicitudin ut dolor in, euismod aliquam odio. Pellentesque finibus tincidunt risus, a feugiat felis mollis scelerisque. Donec ut nulla eros. Nunc sodales, urna in vulputate maximus, urna ante feugiat justo, ut consectetur risus mi ac elit. Integer sodales tellus tristique interdum luctus. Curabitur auctor lacus euismod, cursus nunc ac, aliquet tortor. Morbi commodo commodo sollicitudin. Aenean vitae dolor molestie, ultricies nibh et, pellentesque nunc.</p>', 1, 0, 'about-us', '2018-10-09 14:40:01', '2018-10-10 06:58:15');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `style_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` decimal(15,2) UNSIGNED NOT NULL,
  `maximum` decimal(15,2) UNSIGNED NOT NULL,
  `percentage` decimal(15,2) UNSIGNED NOT NULL,
  `start_duration` int(10) UNSIGNED NOT NULL,
  `repeat` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `plans`
--

INSERT INTO `plans` (`id`, `style_id`, `name`, `minimum`, `maximum`, `percentage`, `start_duration`, `repeat`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, 'Starter invest', '5.00', '25.00', '2.00', 2, 14, 1, '2018-10-09 08:35:42', '2018-10-09 08:35:42'),
(13, 2, 'Beginner invest', '50.00', '800.00', '2.50', 2, 12, 1, '2018-10-09 08:35:42', '2018-10-09 08:35:42'),
(14, 2, 'Silver invest', '100.00', '10000.00', '3.50', 2, 18, 1, '2018-10-09 08:35:42', '2018-10-09 08:35:42'),
(15, 3, 'Bronze invest', '500.00', '100000.00', '5.25', 2, 10, 1, '2018-10-09 08:35:42', '2018-10-09 08:35:42'),
(16, 4, 'Gold invest', '1000.00', '1000000.00', '7.50', 2, 7, 1, '2018-10-09 08:35:42', '2018-10-09 08:35:42');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ppvs`
--

CREATE TABLE `ppvs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rewards` decimal(10,4) UNSIGNED NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_balance` decimal(15,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `deposit_balance` decimal(15,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `referral_balance` decimal(15,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `main_balance`, `deposit_balance`, `referral_balance`, `occupation`, `mobile`, `address`, `address2`, `city`, `state`, `postcode`, `country`, `about`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/avatars/1539008074Без названия.jpg', '399.8056', '831.2000', '50.0500', 'Full-Stack Web Developer', '880-1744-236585', 'Zero Point', 'Shaheb Bazaar', 'Kiev', 'Ukraine', '6520', 'Ukraine', 'My Name is Robi. I am Web Developer.', 'https://www.facebook.com', '2018-02-14 05:55:52', '2018-11-01 07:29:08');

-- --------------------------------------------------------

--
-- Структура таблицы `ptcs`
--

CREATE TABLE `ptcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rewards` decimal(10,4) UNSIGNED NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ptcs`
--

INSERT INTO `ptcs` (`id`, `title`, `details`, `ad_link`, `membership_id`, `status`, `rewards`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'HYIP monitor', 'Best HYIP projects monitor', 'https://radargold.com/', 4, 1, '1.0000', 120, '2018-10-17 11:28:49', '2018-10-17 11:28:49'),
(2, 'VK HYIPS', 'Subscribe to RadarGold', 'https://vk.com/radargold_official', 4, 1, '1.0000', 180, '2018-10-17 11:31:14', '2018-10-17 11:31:14'),
(3, 'LV Trading', 'Best Forex trading platform', 'https://gatfin.com', 4, 1, '1.0000', 180, '2018-10-17 11:32:16', '2018-10-17 11:32:16'),
(4, 'HyipSearch CO', 'New HYIPS monitoring', 'https://hyipsearch.co/', 4, 1, '1.0000', 190, '2018-10-30 13:09:33', '2018-10-30 13:09:33');

-- --------------------------------------------------------

--
-- Структура таблицы `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `reflink_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reflinks`
--

CREATE TABLE `reflinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reflinks`
--

INSERT INTO `reflinks` (`id`, `user_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'ltmW1F3Tv', '2018-02-14 05:55:52', '2018-02-14 05:55:52');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disqus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_deposit` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `minimum_withdraw` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `self_transfer` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `other_transfer` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `signup_bonus` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `link_share` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `referral_signup` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `referral_deposit` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `referral_advert` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `referral_upgrade` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `ptc` tinyint(1) NOT NULL,
  `membership_upgrade` tinyint(1) NOT NULL,
  `ppv` tinyint(1) NOT NULL,
  `payment_proof` tinyint(1) NOT NULL,
  `latest_deposit` tinyint(1) NOT NULL,
  `transfer` tinyint(1) NOT NULL,
  `invest` tinyint(1) NOT NULL,
  `live_chat` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `company_name`, `contact_email`, `contact_number`, `app_contact`, `address`, `disqus`, `chat_code`, `minimum_deposit`, `minimum_withdraw`, `self_transfer`, `other_transfer`, `signup_bonus`, `link_share`, `referral_signup`, `referral_deposit`, `referral_advert`, `referral_upgrade`, `ptc`, `membership_upgrade`, `ppv`, `payment_proof`, `latest_deposit`, `transfer`, `invest`, `live_chat`, `created_at`, `updated_at`) VALUES
(1, 'HyipCMS', 'No. 1 PTC Script In The Market', 'HYIPCms', 'admin@localhost.com', '+880-1744-236585', 'admin@localhost.com', '6 Finch House, <br> Cowkhali Road, <br>Rajshahi, <br>Bangladesh, <br>6520', 'LocalHost', '5a25377bd0795768aaf8d39c', '50.00', '20.00', '10.00', '20.00', '5.50', '20.50', '10.50', '40.00', '50.00', '10.00', 1, 1, 1, 1, 1, 1, 1, 0, '2018-02-14 05:55:51', '2018-10-30 13:37:01');

-- --------------------------------------------------------

--
-- Структура таблицы `styles`
--

CREATE TABLE `styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `styles`
--

INSERT INTO `styles` (`id`, `name`, `compound`, `created_at`, `updated_at`) VALUES
(1, 'Hourly', 1, '2018-02-14 05:55:53', '2018-02-14 05:55:53'),
(2, 'Daily', 24, '2018-02-14 05:55:53', '2018-02-14 05:55:53'),
(3, 'Weekly', 168, '2018-02-14 05:55:53', '2018-02-14 05:55:53'),
(4, 'Monthly', 720, '2018-02-14 05:55:53', '2018-02-14 05:55:53'),
(5, 'Yearly', 8760, '2018-02-14 05:55:53', '2018-02-14 05:55:53');

-- --------------------------------------------------------

--
-- Структура таблицы `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `membership_started` date NOT NULL,
  `membership_expired` date NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `password`, `membership_id`, `membership_started`, `membership_expired`, `token`, `d_code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hyip Developer', 1, 'admin@localhost.com', '$2y$12$naUfG0TRaEJ538g0A4HJ/eXZQeTrbcP3yIA/kOBN7iiFY5i.OL8kC', 4, '2018-10-08', '2018-11-07', NULL, NULL, 1, 'Zw6A9vdLV0fq9h4QmQJHe5Ipvg7mszoGlmDP73gdXu18w9VftjcULjLgQclF', '2018-02-14 05:55:52', '2018-10-08 14:15:41');

-- --------------------------------------------------------

--
-- Структура таблицы `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `reference`, `for`, `from`, `details`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '0pgYnUicyHJq', 'Cash Links', 'Self', 'You Have Been Received Rewards for Cash Links View', '1.0000', '2018-10-17 11:45:40', '2018-10-17 11:45:40'),
(2, 1, 'juLR0hMVumWT', 'Cash Links', 'Self', 'You Have Been Received Rewards for Cash Links View', '1.0000', '2018-10-30 13:13:59', '2018-10-30 13:13:59'),
(3, 1, 'iWRWEb5X0gKr', 'Cash Links', 'Self', 'You Have Been Received Rewards for Cash Links View', '1.0000', '2018-10-30 13:40:04', '2018-10-30 13:40:04'),
(4, 1, 'gSOd2OtmWZ9x', 'Cash Links', 'Self', 'You Have Been Received Rewards for Cash Links View', '1.0000', '2018-10-30 14:54:34', '2018-10-30 14:54:34');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ppv_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) UNSIGNED NOT NULL,
  `charge` decimal(15,2) UNSIGNED NOT NULL,
  `net_amount` decimal(15,2) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `withdraws`
--

INSERT INTO `withdraws` (`id`, `transaction_id`, `user_id`, `gateway_name`, `account`, `amount`, `charge`, `net_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '2NNFY61vMoGqn', 1, 'bKash', '3423423', '42.00', '0.84', '41.16', 1, '2018-10-30 14:39:47', '2018-10-30 14:40:54'),
(2, 'ozmgtp1AktjFH', 1, 'PayPal', '2342342', '55.00', '3.38', '51.63', 1, '2018-10-30 14:40:22', '2018-10-30 14:40:51'),
(3, 'bwRFIt1HpL7xq', 1, 'Perfect Money', 'u3537354747', '20.00', '1.70', '18.30', 1, '2018-10-31 09:53:38', '2018-10-31 10:12:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adverts_user_id_index` (`user_id`),
  ADD KEY `adverts_ptc_id_index` (`ptc_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposits_user_id_index` (`user_id`);

--
-- Индексы таблицы `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_index` (`user_id`),
  ADD KEY `discussions_support_id_index` (`support_id`);

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interests_user_id_index` (`user_id`),
  ADD KEY `interests_invest_id_index` (`invest_id`);

--
-- Индексы таблицы `interest_logs`
--
ALTER TABLE `interest_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_logs_user_id_index` (`user_id`),
  ADD KEY `interest_logs_invest_id_index` (`invest_id`);

--
-- Индексы таблицы `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invests_user_id_index` (`user_id`),
  ADD KEY `invests_plan_id_index` (`plan_id`);

--
-- Индексы таблицы `kyc2s`
--
ALTER TABLE `kyc2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kyc2s_user_id_index` (`user_id`);

--
-- Индексы таблицы `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kycs_user_id_index` (`user_id`);

--
-- Индексы таблицы `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_identities`
--
ALTER TABLE `oauth_identities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_identities_user_id_index` (`user_id`);

--
-- Индексы таблицы `offlines`
--
ALTER TABLE `offlines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_index` (`category_id`);

--
-- Индексы таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ppvs`
--
ALTER TABLE `ppvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppvs_membership_id_index` (`membership_id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Индексы таблицы `ptcs`
--
ALTER TABLE `ptcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ptcs_membership_id_index` (`membership_id`);

--
-- Индексы таблицы `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_reflink_id_index` (`reflink_id`),
  ADD KEY `referrals_user_id_index` (`user_id`);

--
-- Индексы таблицы `reflinks`
--
ALTER TABLE `reflinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reflinks_user_id_index` (`user_id`),
  ADD KEY `reflinks_link_index` (`link`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supports_user_id_index` (`user_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_index` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_user_id_index` (`user_id`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_index` (`user_id`),
  ADD KEY `videos_ppv_id_index` (`ppv_id`);

--
-- Индексы таблицы `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `interest_logs`
--
ALTER TABLE `interest_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `kyc2s`
--
ALTER TABLE `kyc2s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `kycs`
--
ALTER TABLE `kycs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT для таблицы `oauth_identities`
--
ALTER TABLE `oauth_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `offlines`
--
ALTER TABLE `offlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ppvs`
--
ALTER TABLE `ppvs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ptcs`
--
ALTER TABLE `ptcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reflinks`
--
ALTER TABLE `reflinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `adverts`
--
ALTER TABLE `adverts`
  ADD CONSTRAINT `adverts_ptc_id_foreign` FOREIGN KEY (`ptc_id`) REFERENCES `ptcs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adverts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_support_id_foreign` FOREIGN KEY (`support_id`) REFERENCES `supports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_invest_id_foreign` FOREIGN KEY (`invest_id`) REFERENCES `invests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `interest_logs`
--
ALTER TABLE `interest_logs`
  ADD CONSTRAINT `interest_logs_invest_id_foreign` FOREIGN KEY (`invest_id`) REFERENCES `invests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interest_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `invests`
--
ALTER TABLE `invests`
  ADD CONSTRAINT `invests_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kyc2s`
--
ALTER TABLE `kyc2s`
  ADD CONSTRAINT `kyc2s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kycs`
--
ALTER TABLE `kycs`
  ADD CONSTRAINT `kycs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `oauth_identities`
--
ALTER TABLE `oauth_identities`
  ADD CONSTRAINT `oauth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ppvs`
--
ALTER TABLE `ppvs`
  ADD CONSTRAINT `ppvs_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ptcs`
--
ALTER TABLE `ptcs`
  ADD CONSTRAINT `ptcs_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_reflink_id_foreign` FOREIGN KEY (`reflink_id`) REFERENCES `reflinks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `referrals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reflinks`
--
ALTER TABLE `reflinks`
  ADD CONSTRAINT `reflinks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `supports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ppv_id_foreign` FOREIGN KEY (`ppv_id`) REFERENCES `ppvs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
