-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 02:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webiner`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_sertifikat`
--

CREATE TABLE `detail_sertifikat` (
  `id_detail_sertifikat` int(11) NOT NULL,
  `top_title` int(11) DEFAULT NULL,
  `top_nama` int(11) DEFAULT NULL,
  `top_body` int(11) DEFAULT NULL,
  `top_title_ttd` int(11) DEFAULT NULL,
  `top_nama_ttd` int(11) DEFAULT NULL,
  `padding_left` int(11) DEFAULT NULL,
  `padding_right` int(11) DEFAULT NULL,
  `id_sertifikat` int(11) DEFAULT NULL,
  `nama_ttd` varchar(200) DEFAULT NULL,
  `gambar_ttd` varchar(255) DEFAULT NULL,
  `no_sertifikat` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_sertifikat`
--

INSERT INTO `detail_sertifikat` (`id_detail_sertifikat`, `top_title`, `top_nama`, `top_body`, `top_title_ttd`, `top_nama_ttd`, `padding_left`, `padding_right`, `id_sertifikat`, `nama_ttd`, `gambar_ttd`, `no_sertifikat`, `created_at`, `updated_at`) VALUES
(1, 40, 40, 40, 150, 50, 100, 100, 3, 'Atas nama', '1673280593_ttd.png', '32423432423', '2023-01-09 16:09:53', '2023-01-09 16:09:53'),
(2, 40, -20, 40, 150, 50, 100, 100, 4, 'Fauzan', '1673532618_ttd (2).png', '34923784892', '2023-01-12 14:10:18', '2023-01-12 14:10:18');

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
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `id_institusi` int(11) NOT NULL,
  `nama_institusi` varchar(200) NOT NULL,
  `email_institusi` varchar(100) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `phone_number_institusi` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institusi`
--

INSERT INTO `institusi` (`id_institusi`, `nama_institusi`, `email_institusi`, `tgl_berdiri`, `phone_number_institusi`, `created_at`, `id_users`) VALUES
(1, 'PT Gokil', 'gokil@gmail.com', '2022-12-14', '0234238432', '2022-12-18 04:14:44', 12),
(2, 'PT ABC', 'ptabc@gmail.com', '2022-12-17', '32432432', '2022-12-18 15:17:24', 14);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Webiner', NULL, NULL),
(2, 'Politik', NULL, NULL),
(3, 'dvdsfgdsf', '2023-01-13 13:26:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_webiner` int(11) NOT NULL,
  `nama_materi` varchar(200) NOT NULL,
  `file_materi` varchar(200) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_webiner`, `nama_materi`, `file_materi`, `deskripsi_materi`, `created_at`, `updated_at`) VALUES
(1, 3, 'materi aku', '1671806961_download.docx', 'test update test', '2022-12-23 14:49:21', '2022-12-23 14:56:28'),
(2, 4, 'materi gatau', '1671941221_1671806961_download.docx', 'ttes', '2022-12-25 04:07:01', '0000-00-00 00:00:00'),
(3, 5, 'materi ketiga', '1671941253_1671806961_download.docx', 'tes', '2022-12-25 04:07:33', '0000-00-00 00:00:00'),
(4, 6, 'keempat', '1671941281_bayi_tengkurap.jpg', 'test', '2022-12-25 04:08:01', '0000-00-00 00:00:00');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_01_102329_create_posts_table', 1);

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
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_webiner` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_absensi` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_users`, `id_webiner`, `tgl_pendaftaran`, `tgl_absensi`, `created_at`, `updated_at`) VALUES
(6, 11, 5, '2022-12-25', '2022-12-25 08:26:51', '2022-12-25 08:24:15', '2022-12-25 08:26:51'),
(7, 11, 6, '2022-12-25', NULL, '2022-12-25 08:25:07', '0000-00-00 00:00:00'),
(8, 11, 3, '2022-12-25', '2023-01-14 12:51:36', '2022-12-25 08:30:21', '2023-01-14 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_webiner` int(11) NOT NULL,
  `nama_sertifikat` varchar(200) DEFAULT NULL,
  `gambar_sertifikat` varchar(255) NOT NULL,
  `deskripsi_sertifikat` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_webiner`, `nama_sertifikat`, `gambar_sertifikat`, `deskripsi_sertifikat`, `created_at`, `updated_at`) VALUES
(3, 3, 'testest', '1673277668_1672899708_a142e1be76b4d3ef3145.jpg', 'sdfdsfdsfsf', '2023-01-09 15:21:08', '2023-01-09 15:21:08'),
(4, 5, 'sertifikat', '1673531972_1672899708_a142e1be76b4d3ef3145.jpg', 'testse', '2023-01-12 13:59:32', '2023-01-12 13:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `profesi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `aktiv` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hak_akses` enum('institusi','pengguna','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `jenis_kelamin`, `tgl_lahir`, `profesi`, `id_kategori`, `aktiv`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat`, `hak_akses`) VALUES
(8, 'saya', 'saya@gmail.com', '839247329', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8xgy/H8RBuRj0tKRjzfqUO5uV1B6AZamdtu61FAesFjtqZZKptPLS', NULL, '2022-12-08 16:34:25', NULL, 'saya', 'pengguna'),
(9, 'admin', 'admin@gmail.com', '37492379', 'laki-laki', NULL, NULL, NULL, NULL, NULL, '$2y$10$/LjXlGmtLpjF8Q8DLrXIJ.LC9mqjOUs0VJ7Rw.QEuYkBTqcMcNALy', NULL, '2022-12-08 16:53:00', NULL, 'admin', 'admin'),
(11, 'pengguna', 'pengguna@gmail.com', '30294823', 'laki-laki', '2022-12-19', 'pengguna', NULL, 1, NULL, '$2y$10$AEST08u76vTjGNF4NyWyOuWQTapP5Jx1FEc2zC8FLet7woBvS37.y', NULL, '2022-12-18 03:09:01', NULL, 'pengguna', 'pengguna'),
(12, 'institusi', 'institusi@gmail.com', '2343242', 'laki-laki', '2022-12-25', 'institusi', NULL, 1, NULL, '$2y$10$Wn.q4cNwPN9OwiRSXuXPMuYo/HcWkd7bH280ZIs1WsbDIYLfWYYZS', NULL, '2022-12-18 03:17:02', NULL, 'yogyakarta', 'institusi'),
(13, 'derren', 'derren@gmail.com', '5435345', 'laki-laki', '2022-12-19', 'pengguna', NULL, 1, NULL, '$2y$10$ztP6WCXzQs8GKDg2fi.Niu5QwB8EFESsCXoW5CMWAjODYQTpwaPoW', NULL, '2022-12-18 15:08:24', NULL, 'tes', 'pengguna'),
(14, 'ptabc', 'ptabc@gmail.com', '324903240', 'perempuan', '2022-12-18', NULL, NULL, 1, NULL, '$2y$10$2yTCmx8jik6VNGbl0a.Qb.I3PmBE2fzswRt8RHThyyHfaX.qICzgm', NULL, '2022-12-18 15:09:28', NULL, 'test', 'institusi'),
(16, 'admin2', 'admin2@gmail.com', '08732423423', 'laki-laki', '2022-11-27', NULL, NULL, NULL, NULL, '$2y$10$fTE9nKU./YfMVYyNmPrDrOAqkE5s/7ywJGyp8BZzqFzOLo0FR1oZq', NULL, '2022-12-28 07:07:09', '2022-12-28 07:07:34', 'purwosari', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_institusi`
-- (See below for the actual view)
--
CREATE TABLE `vw_institusi` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`tgl_lahir` date
,`profesi` varchar(100)
,`alamat` varchar(255)
,`id_institusi` int(11)
,`nama_institusi` varchar(200)
,`email_institusi` varchar(100)
,`tgl_berdiri` date
,`phone_number_institusi` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_materi`
-- (See below for the actual view)
--
CREATE TABLE `vw_materi` (
`id_materi` int(11)
,`nama_materi` varchar(200)
,`file_materi` varchar(200)
,`deskripsi_materi` text
,`created_at` datetime
,`updated_at` datetime
,`id_webiner` int(11)
,`nama_webiner` varchar(200)
,`slot_peserta` int(11)
,`gambar_webiner` varchar(200)
,`id_users` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`nama_institusi` varchar(200)
,`email_institusi` varchar(100)
,`tgl_berdiri` date
,`phone_number_institusi` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pendaftaran`
-- (See below for the actual view)
--
CREATE TABLE `vw_pendaftaran` (
`id_pendaftaran` int(11)
,`id_users` int(11)
,`tgl_pendaftaran` date
,`tgl_absensi` datetime
,`created_at` datetime
,`updated_at` datetime
,`id_webiner` int(11)
,`nama_webiner` varchar(200)
,`tgl_webiner` date
,`jam_mulai` time
,`jam_selesai` time
,`slot_peserta` int(11)
,`sisa_slot_peserta` int(11)
,`deskripsi_webiner` text
,`gambar_webiner` varchar(200)
,`link_webiner` text
,`id_kategori` int(11)
,`id_institusi` int(11)
,`name` varchar(255)
,`email` varchar(255)
,`phone_number` varchar(255)
,`tgl_lahir` date
,`nama_institusi` varchar(200)
,`email_institusi` varchar(100)
,`phone_number_institusi` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sertifikat`
-- (See below for the actual view)
--
CREATE TABLE `vw_sertifikat` (
`id_sertifikat` int(11)
,`id_webiner` int(11)
,`nama_sertifikat` varchar(200)
,`gambar_sertifikat` varchar(255)
,`deskripsi_sertifikat` varchar(255)
,`nama_webiner` varchar(200)
,`tgl_webiner` date
,`id_institusi` int(11)
,`id_detail_sertifikat` int(11)
,`top_title` int(11)
,`top_nama` int(11)
,`top_body` int(11)
,`top_title_ttd` int(11)
,`top_nama_ttd` int(11)
,`padding_left` int(11)
,`padding_right` int(11)
,`nama_ttd` varchar(200)
,`gambar_ttd` varchar(255)
,`no_sertifikat` varchar(100)
,`created_at` datetime
,`updated_at` datetime
,`nama_institusi` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_webiner`
-- (See below for the actual view)
--
CREATE TABLE `vw_webiner` (
`id_webiner` int(11)
,`nama_webiner` varchar(200)
,`tgl_webiner` date
,`jam_mulai` time
,`jam_selesai` time
,`slot_peserta` int(11)
,`sisa_slot_peserta` int(11)
,`deskripsi_webiner` text
,`gambar_webiner` varchar(200)
,`link_webiner` text
,`id_kategori` int(11)
,`created_at` datetime
,`id_users` bigint(20) unsigned
,`kategori` varchar(200)
,`name` varchar(255)
,`id_institusi` int(11)
,`nama_institusi` varchar(200)
,`email_institusi` varchar(100)
,`tgl_berdiri` date
,`phone_number_institusi` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_webiner_materi`
-- (See below for the actual view)
--
CREATE TABLE `vw_webiner_materi` (
`id_webiner` int(11)
,`id_institusi` int(11)
,`nama_webiner` varchar(200)
,`tgl_webiner` date
,`jam_mulai` time
,`jam_selesai` time
,`slot_peserta` int(11)
,`jumlah_materi` bigint(21)
,`jumlah_sertifikat` bigint(21)
,`id_users` bigint(20) unsigned
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `webiner`
--

CREATE TABLE `webiner` (
  `id_webiner` int(11) NOT NULL,
  `nama_webiner` varchar(200) NOT NULL,
  `tgl_webiner` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `slot_peserta` int(11) DEFAULT NULL,
  `sisa_slot_peserta` int(11) DEFAULT NULL,
  `deskripsi_webiner` text DEFAULT NULL,
  `gambar_webiner` varchar(200) NOT NULL,
  `link_webiner` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webiner`
--

INSERT INTO `webiner` (`id_webiner`, `nama_webiner`, `tgl_webiner`, `jam_mulai`, `jam_selesai`, `slot_peserta`, `sisa_slot_peserta`, `deskripsi_webiner`, `gambar_webiner`, `link_webiner`, `id_kategori`, `created_at`, `id_institusi`, `updated_at`) VALUES
(3, 'webiner pertama', '2023-01-14', '18:23:00', '23:23:00', 10, 8, 'test', '1671805410_back.jpg', 'https://www.figma.com/file/3UbxErn6jtHvSpNHjkyD3b/Skripsi-Wireframe?node-id=0%3A1', 1, '2022-12-23 14:23:30', 1, '2022-12-25 08:30:21'),
(4, 'webiner kedua', '2023-11-08', '08:32:00', '09:33:00', 30, 29, 'test', '1671939208_bayi_makan.jpg', 'https://www.figma.com/file/3UbxErn6jtHvSpNHjkyD3b/Skripsi-Wireframe?node-id=0%3A1', 1, '2022-12-25 03:33:28', 1, '2022-12-25 03:36:01'),
(5, 'test', '2023-01-14', '10:33:00', '16:33:00', 20, 18, 'tes', '1671939245_bayi_tengkurap.jpg', 'https://www.figma.com/file/3UbxErn6jtHvSpNHjkyD3b/Skripsi-Wireframe?node-id=0%3A1', 1, '2022-12-25 03:34:05', 1, '2022-12-25 08:24:15'),
(6, 'webiner kelima', '2022-12-29', '12:52:00', '13:52:00', 20, 18, 'tes', '1671940382_bc.jpg', 'https://www.figma.com/file/3UbxErn6jtHvSpNHjkyD3b/Skripsi-Wireframe?node-id=0%3A1', 2, '2022-12-25 03:53:02', 1, '2022-12-25 08:25:07');

-- --------------------------------------------------------

--
-- Structure for view `vw_institusi`
--
DROP TABLE IF EXISTS `vw_institusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_institusi`  AS SELECT `u`.`id` AS `id`, `u`.`name` AS `name`, `u`.`email` AS `email`, `u`.`tgl_lahir` AS `tgl_lahir`, `u`.`profesi` AS `profesi`, `u`.`alamat` AS `alamat`, `i`.`id_institusi` AS `id_institusi`, `i`.`nama_institusi` AS `nama_institusi`, `i`.`email_institusi` AS `email_institusi`, `i`.`tgl_berdiri` AS `tgl_berdiri`, `i`.`phone_number_institusi` AS `phone_number_institusi` FROM (`users` `u` join `institusi` `i` on(`i`.`id_users` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_materi`
--
DROP TABLE IF EXISTS `vw_materi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_materi`  AS SELECT `m`.`id_materi` AS `id_materi`, `m`.`nama_materi` AS `nama_materi`, `m`.`file_materi` AS `file_materi`, `m`.`deskripsi_materi` AS `deskripsi_materi`, `m`.`created_at` AS `created_at`, `m`.`updated_at` AS `updated_at`, `m`.`id_webiner` AS `id_webiner`, `w`.`nama_webiner` AS `nama_webiner`, `w`.`slot_peserta` AS `slot_peserta`, `w`.`gambar_webiner` AS `gambar_webiner`, `u`.`id` AS `id_users`, `u`.`name` AS `name`, `u`.`email` AS `email`, `i`.`nama_institusi` AS `nama_institusi`, `i`.`email_institusi` AS `email_institusi`, `i`.`tgl_berdiri` AS `tgl_berdiri`, `i`.`phone_number_institusi` AS `phone_number_institusi` FROM (((`materi` `m` join `webiner` `w` on(`w`.`id_webiner` = `m`.`id_webiner`)) join `institusi` `i` on(`i`.`id_institusi` = `w`.`id_institusi`)) join `users` `u` on(`i`.`id_users` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pendaftaran`
--
DROP TABLE IF EXISTS `vw_pendaftaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pendaftaran`  AS SELECT `p`.`id_pendaftaran` AS `id_pendaftaran`, `p`.`id_users` AS `id_users`, `p`.`tgl_pendaftaran` AS `tgl_pendaftaran`, `p`.`tgl_absensi` AS `tgl_absensi`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `w`.`id_webiner` AS `id_webiner`, `w`.`nama_webiner` AS `nama_webiner`, `w`.`tgl_webiner` AS `tgl_webiner`, `w`.`jam_mulai` AS `jam_mulai`, `w`.`jam_selesai` AS `jam_selesai`, `w`.`slot_peserta` AS `slot_peserta`, `w`.`sisa_slot_peserta` AS `sisa_slot_peserta`, `w`.`deskripsi_webiner` AS `deskripsi_webiner`, `w`.`gambar_webiner` AS `gambar_webiner`, `w`.`link_webiner` AS `link_webiner`, `w`.`id_kategori` AS `id_kategori`, `w`.`id_institusi` AS `id_institusi`, `u`.`name` AS `name`, `u`.`email` AS `email`, `u`.`phone_number` AS `phone_number`, `u`.`tgl_lahir` AS `tgl_lahir`, `i`.`nama_institusi` AS `nama_institusi`, `i`.`email_institusi` AS `email_institusi`, `i`.`phone_number_institusi` AS `phone_number_institusi` FROM ((((`pendaftaran` `p` join `webiner` `w` on(`w`.`id_webiner` = `p`.`id_webiner`)) join `users` `u` on(`u`.`id` = `p`.`id_users`)) join `institusi` `i` on(`i`.`id_institusi` = `w`.`id_institusi`)) join `kategori` `k` on(`k`.`id_kategori` = `w`.`id_kategori`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sertifikat`
--
DROP TABLE IF EXISTS `vw_sertifikat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sertifikat`  AS SELECT `s`.`id_sertifikat` AS `id_sertifikat`, `s`.`id_webiner` AS `id_webiner`, `s`.`nama_sertifikat` AS `nama_sertifikat`, `s`.`gambar_sertifikat` AS `gambar_sertifikat`, `s`.`deskripsi_sertifikat` AS `deskripsi_sertifikat`, `w`.`nama_webiner` AS `nama_webiner`, `w`.`tgl_webiner` AS `tgl_webiner`, `w`.`id_institusi` AS `id_institusi`, `ds`.`id_detail_sertifikat` AS `id_detail_sertifikat`, `ds`.`top_title` AS `top_title`, `ds`.`top_nama` AS `top_nama`, `ds`.`top_body` AS `top_body`, `ds`.`top_title_ttd` AS `top_title_ttd`, `ds`.`top_nama_ttd` AS `top_nama_ttd`, `ds`.`padding_left` AS `padding_left`, `ds`.`padding_right` AS `padding_right`, `ds`.`nama_ttd` AS `nama_ttd`, `ds`.`gambar_ttd` AS `gambar_ttd`, `ds`.`no_sertifikat` AS `no_sertifikat`, `ds`.`created_at` AS `created_at`, `ds`.`updated_at` AS `updated_at`, `i`.`nama_institusi` AS `nama_institusi` FROM (((`sertifikat` `s` join `webiner` `w` on(`w`.`id_webiner` = `s`.`id_webiner`)) join `detail_sertifikat` `ds` on(`ds`.`id_sertifikat` = `s`.`id_sertifikat`)) join `institusi` `i` on(`i`.`id_institusi` = `w`.`id_institusi`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_webiner`
--
DROP TABLE IF EXISTS `vw_webiner`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_webiner`  AS SELECT `w`.`id_webiner` AS `id_webiner`, `w`.`nama_webiner` AS `nama_webiner`, `w`.`tgl_webiner` AS `tgl_webiner`, `w`.`jam_mulai` AS `jam_mulai`, `w`.`jam_selesai` AS `jam_selesai`, `w`.`slot_peserta` AS `slot_peserta`, `w`.`sisa_slot_peserta` AS `sisa_slot_peserta`, `w`.`deskripsi_webiner` AS `deskripsi_webiner`, `w`.`gambar_webiner` AS `gambar_webiner`, `w`.`link_webiner` AS `link_webiner`, `w`.`id_kategori` AS `id_kategori`, `w`.`created_at` AS `created_at`, `u`.`id` AS `id_users`, `k`.`kategori` AS `kategori`, `u`.`name` AS `name`, `i`.`id_institusi` AS `id_institusi`, `i`.`nama_institusi` AS `nama_institusi`, `i`.`email_institusi` AS `email_institusi`, `i`.`tgl_berdiri` AS `tgl_berdiri`, `i`.`phone_number_institusi` AS `phone_number_institusi` FROM (((`webiner` `w` join `kategori` `k` on(`k`.`id_kategori` = `w`.`id_kategori`)) join `institusi` `i` on(`i`.`id_institusi` = `w`.`id_institusi`)) join `users` `u` on(`u`.`id` = `i`.`id_users`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_webiner_materi`
--
DROP TABLE IF EXISTS `vw_webiner_materi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_webiner_materi`  AS SELECT `w`.`id_webiner` AS `id_webiner`, `w`.`id_institusi` AS `id_institusi`, `w`.`nama_webiner` AS `nama_webiner`, `w`.`tgl_webiner` AS `tgl_webiner`, `w`.`jam_mulai` AS `jam_mulai`, `w`.`jam_selesai` AS `jam_selesai`, `w`.`slot_peserta` AS `slot_peserta`, count(`m`.`id_materi`) AS `jumlah_materi`, count(`s`.`id_sertifikat`) AS `jumlah_sertifikat`, `u`.`id` AS `id_users`, `u`.`name` AS `name` FROM ((((`webiner` `w` left join `materi` `m` on(`m`.`id_webiner` = `w`.`id_webiner`)) left join `sertifikat` `s` on(`w`.`id_webiner` = `s`.`id_webiner`)) join `institusi` `i` on(`i`.`id_institusi` = `w`.`id_institusi`)) join `users` `u` on(`u`.`id` = `i`.`id_users`)) GROUP BY `w`.`id_webiner``id_webiner`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_sertifikat`
--
ALTER TABLE `detail_sertifikat`
  ADD PRIMARY KEY (`id_detail_sertifikat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id_institusi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

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
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webiner`
--
ALTER TABLE `webiner`
  ADD PRIMARY KEY (`id_webiner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_sertifikat`
--
ALTER TABLE `detail_sertifikat`
  MODIFY `id_detail_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institusi`
--
ALTER TABLE `institusi`
  MODIFY `id_institusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `webiner`
--
ALTER TABLE `webiner`
  MODIFY `id_webiner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
