-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 04:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimensis`
--

CREATE TABLE `dimensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dimensi_pasangans`
--

CREATE TABLE `dimensi_pasangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimensiA` int(11) NOT NULL,
  `dimensiB` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_19_095114_create_roles_table', 1),
(5, '2021_06_19_095216_create_role_users_table', 1),
(6, '2021_06_20_092007_create_users_verify_table', 1),
(7, '2021_06_26_112856_create_program_studis_table', 1),
(8, '2021_06_26_125859_create_tipe_kepribadians_table', 1),
(9, '2021_06_26_141229_create_tipekep_ciris_table', 1),
(10, '2021_06_26_142111_create_tipekep_kelebihans_table', 1),
(11, '2021_06_26_142137_create_tipekep_kekurangans_table', 1),
(12, '2021_06_26_151822_create_tipekep_partners_table', 1),
(13, '2021_06_26_151857_create_tipekep_profesis_table', 1),
(14, '2021_06_26_184432_create_dimensis_table', 1),
(15, '2021_06_26_184526_create_dimensi_pasangans_table', 1),
(16, '2021_06_26_191950_create_pernyataans_table', 1),
(17, '2021_06_26_191959_create_soals_table', 1),
(18, '2021_06_26_192611_create_presentases_table', 1),
(19, '2021_06_26_193004_create_test_kepribadians_table', 1),
(20, '2021_07_03_114311_alter_prodi_conducted_test', 1),
(21, '2021_07_03_114435_create_statistics_table', 1),
(22, '2021_09_11_180731_add_tahun_to_statistics', 1),
(23, '2021_09_11_203340_lock_dimensi_and_test_on_presentases', 1),
(24, '2021_09_21_131721_create_tahuns_table', 1),
(25, '2021_09_21_131835_add_tahun_to_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pernyataans`
--

CREATE TABLE `pernyataans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pernyataan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pernyataans`
--

INSERT INTO `pernyataans` (`id`, `pernyataan`, `dimensi_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Berinteraksi dengan \r\nbanyak orang, \r\ntermasuk orang \r\nasing', 1, NULL, NULL, NULL),
(3, 'Berinteraksi dengan beberapa orang yang Anda kenal', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presentases`
--

CREATE TABLE `presentases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimensi_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `totalpresent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studis`
--

CREATE TABLE `program_studis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_studi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backgroundColor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borderColor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pointBorderColor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tes` int(11) NOT NULL DEFAULT 0 COMMENT 'Tes dilakukan oleh pengguna dalam prodi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studis`
--

INSERT INTO `program_studis` (`id`, `program_studi`, `slug`, `backgroundColor`, `borderColor`, `pointBorderColor`, `jumlah_tes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Teknik Informatika', '/ti', '#000', '#000', '#000', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', NULL, NULL),
(2, 'admin', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernyataanA` int(11) NOT NULL,
  `pernyataanB` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `soal`, `pernyataanA`, `pernyataanB`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Di sebuah pesta apakah Anda: ', 1, 0, NULL, NULL, NULL),
(2, 'Apakah Anda lebih: ', 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_studi_id` bigint(20) UNSIGNED NOT NULL,
  `dimensi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` tinyint(4) NOT NULL,
  `presentase` int(11) NOT NULL,
  `total_used` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahuns`
--

CREATE TABLE `tahuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahuns`
--

INSERT INTO `tahuns` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 16, NULL, NULL),
(2, 17, NULL, NULL),
(3, 18, NULL, NULL),
(4, 19, NULL, NULL),
(5, 20, NULL, NULL),
(6, 21, NULL, NULL),
(7, 22, NULL, NULL),
(8, 23, NULL, NULL),
(9, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_kepribadians`
--

CREATE TABLE `test_kepribadians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_kepribadians`
--

INSERT INTO `test_kepribadians` (`id`, `user_id`, `tipekep_id`, `created_at`, `updated_at`, `finished_at`, `deleted_at`) VALUES
(1, 2, NULL, '2022-05-27 13:08:36', '2022-05-27 13:08:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipekep_ciris`
--

CREATE TABLE `tipekep_ciris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED NOT NULL,
  `ciri_kepribadian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipekep_ciris`
--

INSERT INTO `tipekep_ciris` (`id`, `tipekep_id`, `ciri_kepribadian`, `created_at`, `updated_at`) VALUES
(1, 1, '- rajin\r\n- gigih', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipekep_kekurangans`
--

CREATE TABLE `tipekep_kekurangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED NOT NULL,
  `kekurangan_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipekep_kelebihans`
--

CREATE TABLE `tipekep_kelebihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED NOT NULL,
  `kelebihan_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipekep_partners`
--

CREATE TABLE `tipekep_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED NOT NULL,
  `partner_tipe` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipekep_profesis`
--

CREATE TABLE `tipekep_profesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipekep_id` bigint(20) UNSIGNED NOT NULL,
  `profesi_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kepribadians`
--

CREATE TABLE `tipe_kepribadians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namatipe` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_tipe` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `julukan_tipe` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `arti_sukses` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `saran_pengembangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebahagiaan_tipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_kepribadians`
--

INSERT INTO `tipe_kepribadians` (`id`, `namatipe`, `slug`, `keterangan_tipe`, `julukan_tipe`, `deskripsi_tipe`, `arti_sukses`, `saran_pengembangan`, `kebahagiaan_tipe`, `image_tipe`, `created_at`, `updated_at`) VALUES
(1, 'Realistik', '/r', 'tipe kepribadian ini suka menghasilkan sesuatu yang nyata', 'Realistiss', 'suka bekerja dengn kegiatan fisik', 'merasa bahagia', 'terus belajar skill-skill baru', 'hal sederhana', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programstudi_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `slug`, `nim`, `programstudi_id`, `email`, `tahun_id`, `email_verified_at`, `password`, `profile_image`, `phone`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `is_email_verified`) VALUES
(1, 'tamim', 'tamim', 'tamim', '361955401126', 1, 'tamimzen@gmail.com', 4, NULL, '$2y$10$zqZ02s0IcBKUGZKsgpZwEuN1mESocz2TmjG/8damQukD6PJjzYBvq', NULL, '085335108638', NULL, '2022-05-27 12:27:10', '2022-05-27 12:27:10', NULL, 0),
(2, 'zain', 'zain', 'zain', '361955401127', 1, 'zain@gmail.com', 3, NULL, '$2y$10$qNUC0UwpTzNrmYpJ9xLd9.CF5TR/JtQe9WHSEzxztUulRkJEhIcj6', NULL, '085335108888', NULL, '2022-05-27 13:08:03', '2022-05-27 13:08:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dimensis`
--
ALTER TABLE `dimensis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dimensi_pasangans`
--
ALTER TABLE `dimensi_pasangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pernyataans`
--
ALTER TABLE `pernyataans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentases`
--
ALTER TABLE `presentases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `presentases_dimensi_id_test_id_unique` (`dimensi_id`,`test_id`);

--
-- Indexes for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_kepribadians`
--
ALTER TABLE `test_kepribadians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipekep_ciris`
--
ALTER TABLE `tipekep_ciris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipekep_kekurangans`
--
ALTER TABLE `tipekep_kekurangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipekep_kelebihans`
--
ALTER TABLE `tipekep_kelebihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipekep_partners`
--
ALTER TABLE `tipekep_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipekep_profesis`
--
ALTER TABLE `tipekep_profesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_kepribadians`
--
ALTER TABLE `tipe_kepribadians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dimensis`
--
ALTER TABLE `dimensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dimensi_pasangans`
--
ALTER TABLE `dimensi_pasangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pernyataans`
--
ALTER TABLE `pernyataans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presentases`
--
ALTER TABLE `presentases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studis`
--
ALTER TABLE `program_studis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_kepribadians`
--
ALTER TABLE `test_kepribadians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipekep_ciris`
--
ALTER TABLE `tipekep_ciris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipekep_kekurangans`
--
ALTER TABLE `tipekep_kekurangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipekep_kelebihans`
--
ALTER TABLE `tipekep_kelebihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipekep_partners`
--
ALTER TABLE `tipekep_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipekep_profesis`
--
ALTER TABLE `tipekep_profesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_kepribadians`
--
ALTER TABLE `tipe_kepribadians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
