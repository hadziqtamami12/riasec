-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 04:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbti`
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

--
-- Dumping data for table `dimensis`
--

INSERT INTO `dimensis` (`id`, `code`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 're', 'realis', '2022-06-01 13:11:56', '2022-06-01 13:11:56'),
(2, 'im', 'imajin', '2022-06-01 13:11:56', '2022-06-01 13:11:56');

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

--
-- Dumping data for table `dimensi_pasangans`
--

INSERT INTO `dimensi_pasangans` (`id`, `dimensiA`, `dimensiB`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '#000', '2022-06-01 13:11:56', '2022-06-01 13:11:56'),
(2, 2, 1, '#000', '2022-06-01 13:11:56', '2022-06-01 13:11:56');

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
-- Table structure for table `jawabs`
--

CREATE TABLE `jawabs` (
  `id` int(11) NOT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Berinteraksi dengan beberapa orang yang Anda kenal', 2, NULL, NULL, NULL);

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
(1, 'Teknik Informatika', '/ti', '#000', '#000', '#000', 1, NULL, NULL, NULL),
(2, 'Teknik Mesin', 'teknik-mesin', 'rgba(0,0,0,0.5)', 'rgba(0,0,0,1)', 'rgba(0,0,0,1)', 0, '2022-06-03 13:59:05', '2022-06-03 13:59:05', NULL);

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
  `kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `soal`, `kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Saya bisa bekerja di dalam mobil box', 'Konvensional', NULL, '2022-06-03 14:01:25', NULL),
(2, 'Saya suka mengerjakan teka-teki', 'Investigasi', NULL, NULL, NULL),
(3, 'Saya mampu bekerja secara mandiri', 'Artistik', NULL, NULL, NULL),
(4, 'Saya suka bekerja dalam tim hore', 'Konvensional', NULL, '2022-06-03 12:47:38', '2022-06-03 12:47:38'),
(5, 'Saya orang yang ambisius, saya menetapkan tujuan untuk diri saya sendiri', 'Gigih', NULL, NULL, NULL),
(6, 'Saya suka mengatur (file,meja/ kantor)', 'Konvensional', NULL, NULL, NULL),
(7, 'Saya suka membangun hal baru', 'Realistis', NULL, NULL, NULL),
(8, 'Saya suka membaca tentang seni dan musik', 'Artistik', NULL, NULL, NULL),
(9, 'Saya suka dengan instruksi yang jelas untuk diikuti', 'Konvensional', NULL, NULL, NULL),
(10, 'Saya suka mencoba mempengaruhi atau membujuk orang', 'Gigih', NULL, NULL, NULL),
(11, 'Saya suka melakukan eksperimen', 'Investigasi', NULL, NULL, NULL),
(12, 'Saya suka mengajar atau melatih orang', 'Sosial', NULL, NULL, NULL),
(13, 'Saya suka mencoba membantu orang untuk memecahkan masalah mereka', 'Sosial', NULL, NULL, NULL),
(14, 'Saya suka merawat hewan', 'Realistis', NULL, NULL, NULL),
(15, 'Saya tidak keberatan bekerja 8 jam per hari di kantor', 'Konvensional', NULL, NULL, NULL),
(16, 'Saya suka menjual barang', 'Gigih', NULL, NULL, NULL),
(17, 'Saya menikmati tulisan yang kreatif', 'Artistik', NULL, NULL, NULL),
(18, 'Saya menikmati sains', 'Investigasi', NULL, NULL, NULL),
(19, 'Saya cepat mengambil tanggung jawab dalam hal baru', 'Gigih', NULL, NULL, NULL),
(20, 'Saya tertarik untuk membantu menyembuhkan orang', 'Sosial', NULL, NULL, NULL),
(21, 'Saya menikmati mencoba mencari tahu bagaimana segala sesuatunya bekerja', 'Investigasi', NULL, NULL, NULL),
(22, 'Saya suka menyatukan atau merakit sesuatu', 'Realistis', NULL, NULL, NULL),
(23, 'Saya orang yang kreatif', 'Artistik', NULL, NULL, NULL),
(24, 'Saya memperhatikan detail', 'Konvensional', NULL, NULL, NULL),
(25, 'Saya suka melakukan pengarsipan atau pengetikan', 'Konvensional', NULL, NULL, NULL),
(26, 'Saya suka menganalisis berbagai hal (masalah / situasi)', 'Investigasi', NULL, NULL, NULL),
(27, 'Saya suka memainkan alat musik atau bernyanyi', 'Artistik', NULL, NULL, NULL),
(28, 'Saya senang belajar tentang budaya lain', 'Sosial', NULL, NULL, NULL),
(29, 'Saya ingin memulai bisnis saya sendiri', 'Gigih', NULL, NULL, NULL),
(30, 'Saya suka memasak', 'Realistis', NULL, NULL, NULL),
(31, 'Saya suka berakting dalam drama', 'Artistik', NULL, NULL, NULL),
(32, 'Saya orang yang praktis', 'Realistis', NULL, NULL, NULL),
(33, 'Saya suka bekerja dengan angka atau grafik', 'Investigasi', NULL, NULL, NULL),
(34, 'Saya suka berdiskusi tentang berbagai masalah', 'Sosial', NULL, NULL, NULL),
(35, 'Saya suka menyimpan catatan pekerjaan saya', 'Konvensional', NULL, NULL, NULL),
(36, 'Saya suka memimpin', 'Gigih', NULL, NULL, NULL),
(37, 'Saya suka bekerja di luar ruangan', 'Realistis', NULL, NULL, NULL),
(38, 'Saya ingin bekerja dikantor', 'Konvensional', NULL, NULL, NULL),
(39, 'Saya pandai matematika', 'Investigasi', NULL, NULL, NULL),
(40, 'Saya suka menolong orang', 'Sosial', NULL, NULL, NULL),
(41, 'Saya suka menggambar', 'Artistik', NULL, NULL, NULL),
(42, 'Saya suka memberikan pidato', 'Gigih', NULL, '2022-06-03 12:38:59', '2022-06-03 12:38:59'),
(43, 'Ya Bansos lah', 'Sosial', '2022-06-03 14:09:10', '2022-06-03 14:09:10', NULL);

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
(1, 2, 1, '2022-06-02 10:01:50', '2022-06-03 11:39:34', NULL, NULL),
(2, 2, 2, '2022-06-02 10:01:50', '2022-06-03 11:39:34', NULL, NULL),
(3, 2, 1, '2022-06-02 10:01:50', '2022-06-03 11:39:34', NULL, NULL);

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
(1, 1, '- rajin\r\n- gigih', NULL, NULL),
(2, 2, 'bbbbbbbbbb', '2022-06-01 12:34:40', '2022-06-01 12:34:40');

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

--
-- Dumping data for table `tipekep_kekurangans`
--

INSERT INTO `tipekep_kekurangans` (`id`, `tipekep_id`, `kekurangan_tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaaaaaaaaaa', '2022-06-01 13:43:18', '2022-06-01 13:43:18'),
(2, 2, 'bbbbbbbbbbbbb', '2022-06-01 13:43:25', '2022-06-01 13:43:25');

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

--
-- Dumping data for table `tipekep_kelebihans`
--

INSERT INTO `tipekep_kelebihans` (`id`, `tipekep_id`, `kelebihan_tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 'gatau', '2022-06-01 12:10:19', '2022-06-01 12:10:19'),
(2, 2, 'ssssssssssssssss', '2022-06-01 13:43:00', '2022-06-01 13:43:00');

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

--
-- Dumping data for table `tipekep_profesis`
--

INSERT INTO `tipekep_profesis` (`id`, `tipekep_id`, `profesi_tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaaaaaaaaaa', '2022-06-01 13:44:32', '2022-06-01 13:44:32'),
(2, 2, 'aaaaaaaaaaaaa', '2022-06-01 13:44:40', '2022-06-01 13:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kepribadians`
--

CREATE TABLE `tipe_kepribadians` (
  `id` int(20) NOT NULL,
  `namatipe` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` text NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kepribadians`
--

INSERT INTO `tipe_kepribadians` (`id`, `namatipe`, `deskripsi`, `bidang`, `gambar`) VALUES
(1, 'Artistik', 'Orang-orang ini suka bekerja dalam situasi tidak terstruktur dimana mereka dapat menggunakan kreativitas mereka. Bidang yang baik untuk orang Artistik adalah ...\r\n- Komunikasi\r\n- Seni Rupa dan Pertunjukkan\r\n- Fotografi\r\n- Radio dan TV\r\n- Desain Interior\r\n- Arsitektur', 'Bidang Terkait \r\n\r\n- Sumber Daya Alam\r\n- Pelayanan kesehatan\r\n- Teknologi Industri dan Rekayasa\r\n- Seni dan Komunikasi\r\n', 'artistic.png'),
(2, 'Gigih', 'Orang-orang ini suka bekerja dengan orang\r\n lain dan menikmati membujuk dan tampil. \r\nbidang yang baik untuk orang-orang yang giat \r\nadalah ... \r\n- Fashion Merchandising \r\n- Perumahan \r\n- Pemasaran / Penjualan \r\n- Hukum \r\n- Ilmu Politik \r\n- Perdagangan Internasional \r\n- Perbankan / Keuangan', 'Bidang Terkait\r\n\r\n- Bisnis \r\n- Layanan Publik dan Manusia \r\n- Seni dan Komunikasi ', 'enterprising.png'),
(3, 'Investigasi', 'Orang-orang ini suka menonton, belajar, menganalisis, dan memecahkan masalah. Bidang yang bagus untuk orang Investigatif adalah ... \r\n- Biologi kelautan \r\n- Rekayasa \r\n- Kimia \r\n- Pengobatan / Bedah \r\n- Ekonomi Konsumen \r\n- Psikologi \r\n', 'Bidang Terkait\r\n\r\n- Pelayanan Kesehatan \r\n- Bisnis \r\n- Layanan Publik dan Manusia\r\n- Teknologi Industri dan Rekayasa \r\n', 'investigative.png'),
(4, 'Konvensional', 'Orang-orang ini sangat berorientasi pada detail, terorganisir dan suka bekerja dengan data. bidang yang bagus untuk orang Konvensional adalah ... \r\n- Akuntansi \r\n- Pelaporan Pengadilan \r\n- Pertanggungan \r\n- Administrasi\r\n- Rekam Medis \r\n- Perbankan \r\n- Pengolahan Data ', 'Bidang Terkait\r\n\r\n- Pelayanan Kesehatan \r\n- Bisnis \r\n- Teknologi Industri dan Rekayasa ', 'convensional.png'),
(5, 'Realistis', 'Orang-orang ini sering pandai dalam pekerjaan mekanik atau atletik yang bagus untuk orang Realistis adalah ... \r\n- Pertanian \r\n- Asisten Kesehatan \r\n- Komputer\r\n- Konstruksi \r\n- Mekanik / Masinis\r\n- Rekayasa\r\n- Makanan dan Perhotelan ', 'Bidang Terkait\r\n\r\n- Sumber daya alam \r\n- Pelayanan Kesehatan \r\n- Teknologi Industri dan Rekayasa \r\n- Seni dan Komunikasi ', 'realistic.png'),
(6, 'Sosial', 'Orang-orang ini lebih suka bekerja dengan\r\n orang lain, daripada barang. Jurusan \r\nkuliah yang baik untuk orang Sosial\r\n adalah ... \r\n- Penyuluhan \r\n- Perawatan \r\n- Terapi Fisik \r\n- Perjalanan\r\n- Periklanan\r\n- Hubungan Masyarakat \r\n- Pendidikan ', 'Bidang Terkait \r\n\r\n- Pelayanan kesehatan \r\n- Layanan Publik dan Manusia ', 'social.png');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kepribadianssssss`
--

CREATE TABLE `tipe_kepribadianssssss` (
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
-- Dumping data for table `tipe_kepribadianssssss`
--

INSERT INTO `tipe_kepribadianssssss` (`id`, `namatipe`, `slug`, `keterangan_tipe`, `julukan_tipe`, `deskripsi_tipe`, `arti_sukses`, `saran_pengembangan`, `kebahagiaan_tipe`, `image_tipe`, `created_at`, `updated_at`) VALUES
(1, 'Realistik', '/r', 'tipe kepribadian ini suka menghasilkan sesuatu yang nyata', 'Realistiss', 'suka bekerja dengn kegiatan fisik', 'merasa bahagia', 'terus belajar skill-skill baru', 'hal sederhana', NULL, NULL, NULL),
(2, 'Investigasi', '/i', 'aaaaaaaaaaaaaaa', 'Investigasi', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', NULL, '2022-06-01 12:34:09', '2022-06-01 12:34:09');

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
-- Indexes for table `jawabs`
--
ALTER TABLE `jawabs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `JAWAB_PK` (`id`),
  ADD KEY `RELATIONSHIP_2_FK` (`NIM`);

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
-- Indexes for table `tipe_kepribadianssssss`
--
ALTER TABLE `tipe_kepribadianssssss`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dimensi_pasangans`
--
ALTER TABLE `dimensi_pasangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawabs`
--
ALTER TABLE `jawabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_kepribadians`
--
ALTER TABLE `test_kepribadians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipekep_ciris`
--
ALTER TABLE `tipekep_ciris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipekep_kekurangans`
--
ALTER TABLE `tipekep_kekurangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipekep_kelebihans`
--
ALTER TABLE `tipekep_kelebihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipekep_partners`
--
ALTER TABLE `tipekep_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipekep_profesis`
--
ALTER TABLE `tipekep_profesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_kepribadians`
--
ALTER TABLE `tipe_kepribadians`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipe_kepribadianssssss`
--
ALTER TABLE `tipe_kepribadianssssss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
