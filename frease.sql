-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 14.54
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frease`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `advantage_service`
--

CREATE TABLE `advantage_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `advantage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `advantage_service`
--

INSERT INTO `advantage_service` (`id`, `service_id`, `advantage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'murah', NULL, '2022-06-24 08:36:26', '2022-06-24 08:36:26'),
(2, 1, 'Fixing inconsistency in data', NULL, '2022-06-24 08:36:26', '2022-06-24 08:36:26'),
(3, 1, 'WEWEQ', NULL, '2022-06-24 08:36:26', '2022-06-24 08:36:26'),
(4, 2, 'murah', NULL, '2022-06-24 22:15:27', '2022-06-24 22:15:27'),
(5, 2, 'Fixing inconsistency in data', NULL, '2022-06-24 22:15:27', '2022-06-24 22:15:27'),
(6, 2, 'WEWEQ', NULL, '2022-06-24 22:15:27', '2022-06-24 22:15:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advantage_user`
--

CREATE TABLE `advantage_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `advantage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `advantage_user`
--

INSERT INTO `advantage_user` (`id`, `service_id`, `advantage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'nyaman', NULL, '2022-06-24 08:36:26', '2022-06-24 08:36:26'),
(2, 1, 'nyaman', NULL, '2022-06-24 08:36:26', '2022-06-24 08:36:26'),
(3, 1, 'Clean data Copy paste Convert data Fix format', NULL, '2022-06-24 08:36:27', '2022-06-24 08:36:27'),
(4, 2, 'nyaman', NULL, '2022-06-24 22:15:27', '2022-06-24 22:15:27'),
(5, 2, 'nyaman', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28'),
(6, 2, 'nyaman', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id`, `users_id`, `photo`, `role`, `contact_number`, `biography`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Website Developer', '', '', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(2, 2, '', 'UI Designer', '', '', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(3, 3, 'assets/photo/pd79DbgsWeYWWH7qcGQTaZLVxtmrBo1ZYnda0Cdt.jpg', 'It support', '628123456789', 'hhlaxzhlhxzlhdilzhidlzl', NULL, '2022-06-24 08:04:48', '2022-06-25 20:49:06'),
(4, 4, 'assets/photo/n4eGqvEaXKocgAJCI97AqAbgIyrgZbQywKbZOl6a.jpg', 'it', '089321595549', 'aku adalahhdsohdalkhlfsahlfsahlkfsahklfhklsfah', NULL, '2022-06-24 21:24:45', '2022-06-24 21:52:32'),
(5, 5, NULL, NULL, NULL, NULL, NULL, '2022-06-25 20:59:59', '2022-06-25 20:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `experience_user`
--

CREATE TABLE `experience_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `experience_user`
--

INSERT INTO `experience_user` (`id`, `detail_user_id`, `experience`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'aku', NULL, '2022-06-24 08:06:28', '2022-06-24 08:06:28'),
(2, 3, 'aku', NULL, '2022-06-24 08:06:28', '2022-06-24 08:06:28'),
(3, 3, 'aku', NULL, '2022-06-24 08:06:28', '2022-06-25 20:49:06'),
(4, 4, 'hakhkdajhkjad', NULL, '2022-06-24 21:52:32', '2022-06-24 21:52:32'),
(5, 4, 'asdklhasdlkhlkdsahldsa', NULL, '2022-06-24 21:52:32', '2022-06-24 21:52:32'),
(6, 4, 'adsjbj,safbsfbaljbfsa', NULL, '2022-06-24 21:52:32', '2022-06-24 21:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_06_03_033845_create_sessions_table', 1),
(10, '2022_06_03_040128_create_detail_user_table', 1),
(11, '2022_06_03_041204_create_experience_user_table', 1),
(12, '2022_06_03_042114_create_service_table', 1),
(13, '2022_06_03_042145_create_advantage_user_table', 1),
(14, '2022_06_03_042217_create_tagline_table', 1),
(15, '2022_06_03_042239_create_advantage_service_table', 1),
(16, '2022_06_03_042302_create_thumbnail_service_table', 1),
(17, '2022_06_03_044414_create_order_table', 1),
(18, '2022_06_03_044450_create_order_status_table', 1),
(19, '2022_06_03_053721_add_foreign_keys_detail_user', 1),
(20, '2022_06_03_053931_add_foreign_keys_experience_user', 1),
(21, '2022_06_03_055448_add_foreign_keys_service', 1),
(22, '2022_06_03_061646_add_foreign_keys_advantage_user', 1),
(23, '2022_06_03_061707_add_foreign_keys_tagline', 1),
(24, '2022_06_03_061928_add_foreign_keys_advantage_service', 1),
(25, '2022_06_03_062002_add_foreign_keys_thumbnail_service', 1),
(26, '2022_06_03_062804_add_foreign_keys_order', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `freelancer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `order_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `buyer_id`, `freelancer_id`, `service_id`, `file`, `note`, `expired`, `order_status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 1, 'assets/order/attachment/VcOwC20FGOUclmDvWeNmM4hqjgfCNjvvHlOcvjFY.zip', 'bismilah', '2022-06-28', 1, NULL, '2022-06-24 21:24:52', '2022-06-24 22:17:23'),
(2, 3, 4, 2, 'assets/order/attachment/pmwO9voAllghPqv0JLMURSqgCM1JskNfAP2rlKaj.zip', 'dp 50%', '2022-06-28', 1, NULL, '2022-06-24 22:16:23', '2022-06-25 20:40:32'),
(3, 3, 4, 2, 'assets/order/attachment/N4GWUlUB2Y81COGH13gKUfMfQbYb3DqRpq6Df7yf.zip', 'dp 50%', '2022-06-29', 2, NULL, '2022-06-25 20:41:38', '2022-06-26 20:22:14'),
(4, 5, 3, 1, NULL, NULL, '2022-06-29', 4, NULL, '2022-06-25 21:01:08', '2022-06-25 21:01:08'),
(5, 5, 3, 1, NULL, NULL, '2022-06-29', 4, NULL, '2022-06-25 21:06:18', '2022-06-25 21:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Approved', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(2, 'Progress', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(3, 'Rejected', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(4, 'Waiting', NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `revision_limit` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `users_id`, `title`, `description`, `delivery_time`, `revision_limit`, `price`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'jual beli domba hahahaha', 'jual website jual websitejual websitejual websitejual websitejual websitejual websitejual websitejual websitejual websitejual website', 17, 10, '100000', 'bismilah', NULL, '2022-06-24 08:36:26', '2022-06-24 09:08:04'),
(2, 4, 'jual aneka unta', 'asddjasljd;j;ds', 10, 19, '17', 'dp 50%', NULL, '2022-06-24 22:15:27', '2022-06-24 22:15:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('euZTALdQLf9pLDJbKTz4kOkxwuS7h8ibbwbIl8RK', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamNlTm55VlFOcVFqdFFuR2Iwd0JpSzNBZG5na0ZITVhXMHRwUHVMMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXIvb3JkZXIvMy9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjU6ImFsZXJ0IjthOjA6e319', 1656306164),
('vp06vgumUU1uM2cGSQ9TNDQb4BKxYjH2RVpQ2V9q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieFpibmV0czNTS1gwYVRlU1hWalJHNzlmdlFQZFlzaFc5OW5JbVpLcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1656299196);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagline`
--

CREATE TABLE `tagline` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagline`
--

INSERT INTO `tagline` (`id`, `service_id`, `tagline`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'aku bisa', NULL, '2022-06-24 08:36:27', '2022-06-24 09:08:04'),
(2, 2, 'wow', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 3, 'faishol\'s Team', 1, '2022-06-24 08:04:47', '2022-06-24 08:04:47'),
(2, 4, 'borni\'s Team', 1, '2022-06-24 21:24:45', '2022-06-24 21:24:45'),
(3, 5, 'najib\'s Team', 1, '2022-06-25 20:59:59', '2022-06-25 20:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `thumbnail_service`
--

CREATE TABLE `thumbnail_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thumbnail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `thumbnail_service`
--

INSERT INTO `thumbnail_service` (`id`, `service_id`, `thumbnail`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/service/thumbnail/Ce87ikdRb8AwrDzChMUqzHcz7ACFnU2CvFBIMEwB.jpg', NULL, '2022-06-24 08:36:27', '2022-06-24 08:36:27'),
(2, 1, 'assets/service/thumbnail/V5oECbu3NsvNhY1PTha3QkQ0ztsx943cm9Bhza9f.jpg', NULL, '2022-06-24 08:36:27', '2022-06-24 08:36:27'),
(3, 1, 'assets/service/thumbnail/UpzlUSkGwGCPmfKWFhFQfOpbUZ5YPUJjYOh0KyvK.jpg', NULL, '2022-06-24 08:36:27', '2022-06-24 08:36:27'),
(4, 2, 'assets/service/thumbnail/eeH9lCrKjww4GIsVzUQJtufu6KnHBNS4AB16BV0N.png', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28'),
(5, 2, 'assets/service/thumbnail/rWvgnry3tFJ2vnoUKIbk6GuE7MYThQMJVlmSIcFb.jpg', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28'),
(6, 2, 'assets/service/thumbnail/SPcgMNHMZq1TjAAkBsdUK8xC5AEjm5Wc6drRFXGy.jpg', NULL, '2022-06-24 22:15:28', '2022-06-24 22:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@mail.com', NULL, '$2y$10$gZeyXweahKtWZGd7MWKC3eXYD5Oqo4pMc77UUIEYsgUoTCYM/QLVq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(2, 'Jane Doe', 'jane@mail.com', NULL, '$2y$10$IxqccibeDAb/tvBNM2seMOvspd5HDRb43ZS39ngz2yfnvcrmDCXU2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-05 19:04:30', '2022-06-05 19:04:30'),
(3, 'faishol', 'isol@gmail.com', NULL, '$2y$10$5TSTpY9K5gjDkW0e0wWHhe1DjQErPs3htQXgoKv7WKtPizidxkNXq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-24 08:04:47', '2022-06-24 08:04:47'),
(4, 'borni', 'udin@gmail.com', NULL, '$2y$10$LPkh.FcvXbIsFuFHb0m9QuXPP66IL1gQkEDeaPNygKqac1hTbVMAa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-24 21:24:45', '2022-06-24 21:24:45'),
(5, 'najib lakmana', 'bornis@gmail.com', NULL, '$2y$10$EK8ZuoAN.CWIHiwTxFZUjuKKhUlaEil6XCnV0eUFFu6cuybWzV52.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-25 20:59:59', '2022-06-25 20:59:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `advantage_service`
--
ALTER TABLE `advantage_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_advantage_service_to_service` (`service_id`);

--
-- Indeks untuk tabel `advantage_user`
--
ALTER TABLE `advantage_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_advantage_user_to_service` (`service_id`);

--
-- Indeks untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_user_to_users` (`users_id`);

--
-- Indeks untuk tabel `experience_user`
--
ALTER TABLE `experience_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_experience_user_to_detail_user` (`detail_user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_buyer_to_users` (`buyer_id`),
  ADD KEY `fk_order_freelancer_to_users` (`freelancer_id`),
  ADD KEY `fk_order_to_service` (`service_id`),
  ADD KEY `fk_order_to_order_status` (`order_status_id`);

--
-- Indeks untuk tabel `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_to_users` (`users_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tagline`
--
ALTER TABLE `tagline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tagline_to_service` (`service_id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indeks untuk tabel `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indeks untuk tabel `thumbnail_service`
--
ALTER TABLE `thumbnail_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thumbnail_service_to_service` (`service_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `advantage_service`
--
ALTER TABLE `advantage_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `advantage_user`
--
ALTER TABLE `advantage_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `experience_user`
--
ALTER TABLE `experience_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tagline`
--
ALTER TABLE `tagline`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `thumbnail_service`
--
ALTER TABLE `thumbnail_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `advantage_service`
--
ALTER TABLE `advantage_service`
  ADD CONSTRAINT `fk_advantage_service_to_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `advantage_user`
--
ALTER TABLE `advantage_user`
  ADD CONSTRAINT `fk_advantage_user_to_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `fk_detail_user_to_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `experience_user`
--
ALTER TABLE `experience_user`
  ADD CONSTRAINT `fk_experience_user_to_detail_user` FOREIGN KEY (`detail_user_id`) REFERENCES `detail_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_buyer_to_users` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_freelancer_to_users` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_to_order_status` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_to_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_to_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tagline`
--
ALTER TABLE `tagline`
  ADD CONSTRAINT `fk_tagline_to_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `thumbnail_service`
--
ALTER TABLE `thumbnail_service`
  ADD CONSTRAINT `fk_thumbnail_service_to_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
