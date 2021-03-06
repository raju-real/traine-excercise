-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2022 at 07:52 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traine-excercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'English', '2022-05-22 07:30:24', '2022-05-22 07:30:24'),
(3, 'Bangla', '2022-05-22 07:45:33', '2022-05-22 07:45:33'),
(4, 'Hindi', '2022-05-22 07:45:39', '2022-05-22 07:45:39'),
(5, 'Spanish', '2022-05-22 07:45:45', '2022-05-22 07:45:45');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_21_154728_create_languages_table', 2),
(5, '2022_05_22_134910_create_trainers_table', 3),
(9, '2022_05_22_135110_create_trainer_tutorials_table', 4),
(10, '2022_05_27_174226_create_subscribers_table', 5);

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
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'subscriber1@gmail.com', '2022-05-27 11:52:53', '2022-05-27 11:52:53'),
(5, 'subscriber2@gmail.com', '2022-05-27 12:24:09', '2022-05-27 12:24:09'),
(6, 'subscriber3@gmail.com', '2022-05-27 12:24:15', '2022-05-27 12:24:15'),
(7, 'subscriber4@gmail.com', '2022-05-27 12:24:19', '2022-05-27 12:24:19'),
(8, 'nurse2@gmail.com', '2022-05-27 13:30:07', '2022-05-27 13:30:07'),
(9, 'caregiver1@gmail.com', '2022-05-27 13:32:21', '2022-05-27 13:32:21'),
(10, 'BrendaJMatthews@armyspy.com', '2022-05-27 13:40:29', '2022-05-27 13:40:29'),
(13, 'nurse1@gmail.com', '2022-05-27 13:46:56', '2022-05-27 13:46:56'),
(14, 'sfdfdf@mail.com', '2022-05-27 13:50:38', '2022-05-27 13:50:38'),
(15, 'subscriber5@gmail.com', '2022-05-27 13:51:46', '2022-05-27 13:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `email`, `mobile`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Dostie', 'daniel@mail.com', '+??????????????????????????????', 'assets/images/1653499710download (1).jpg', '2022-05-25 11:28:30', '2022-05-25 11:28:30'),
(2, 'Loyal Verreau', 'loyal@mail.com', '+??????????????????????????????', 'assets/images/1653669748download (2).png', '2022-05-27 02:32:54', '2022-05-27 10:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_tutorials`
--

CREATE TABLE `trainer_tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_tutorials`
--

INSERT INTO `trainer_tutorials` (`id`, `trainer_id`, `language_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Part one', 'assets/audios/1653671114_3.mp3', '2022-05-27 02:32:54', '2022-05-27 11:05:14'),
(2, 2, 2, 'Part two', 'assets/audios/1653668808_4.mp3', '2022-05-27 02:32:54', '2022-05-27 10:26:48'),
(3, 2, 5, 'Part Three', 'assets/audios/1653671189_5.mp3', '2022-05-27 11:06:29', '2022-05-27 11:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_status` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `mobile`, `gender`, `age`, `image`, `email_verified_at`, `password`, `online_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Super Admin', 'admin@admin.com', '123456789', NULL, NULL, NULL, NULL, '$2y$10$lXvXg4gHx0/7db27rybskO4Go1A3hC7HP4URb1rU83PbSNurwk1Ee', 2, NULL, NULL, NULL),
(2, 'user', 'User One', 'urser1@gmail.com', '01889967514', 'Male', '29', 'assets/images/1653140563photo_2022-03-15_16-38-04.jpg', NULL, '$2y$10$6i2gzIIIB5SeAvwY.8wGs.4ej2stlVKJEyVRQIugfIuUy2cOPkzHK', 1, NULL, NULL, '2022-05-21 08:05:02'),
(3, 'user', 'User Two', 'user2@gmail.com', '245678912', NULL, NULL, NULL, NULL, '$2y$10$l.kkTgCKftTapzMAH05di.WD63blBLiFSsCVlBc0YRR/1B3KrW3hG', 2, NULL, '2022-05-21 07:12:47', '2022-05-21 07:12:47'),
(4, 'user', 'User Three', 'user3@gmail.com', '561815619', NULL, NULL, NULL, NULL, '$2y$10$APxZXERvT7TvcERq6rHYcO.p9T5.fK2U9hr.BCA1kXiaVECCGPhQi', 1, NULL, '2022-05-27 12:00:38', '2022-05-27 12:36:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_tutorials`
--
ALTER TABLE `trainer_tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_tutorials`
--
ALTER TABLE `trainer_tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
