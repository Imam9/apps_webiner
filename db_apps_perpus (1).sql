-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 02:54 PM
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
-- Database: `db_apps_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penulis` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `gambar_buku`, `created_at`, `updated_at`, `penulis`, `penerbit`, `deskripsi`, `stok_buku`) VALUES
(1, 'test update', '1670408459_background.jpeg', '2022-12-07 03:11:55', '2022-12-09 06:23:34', 'test update', 'test update', 'test update', 12),
(3, 'buku ini', '1670409389_back.jpg', '2022-12-07 03:36:29', '2022-12-07 08:42:32', 'penulis nya ini', 'testing penerbit', 'testing dan lain sebagainya', 20),
(4, 'test buku', '1670411718_bc.jpg', '2022-12-07 04:15:18', NULL, 'buku tets', 'hei buku', 'test', 25);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_peminjaman` datetime NOT NULL,
  `jml_peminjaman` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `status_peminjaman` enum('pengajuan pinjaman','dipinjam','ditolak','dikembalikan','belum dikembalikan') DEFAULT NULL,
  `batas_pengembalian` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `jml_pengembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `jml_peminjaman`, `id_anggota`, `id_petugas`, `id_buku`, `tgl_pengembalian`, `status_peminjaman`, `batas_pengembalian`, `created_at`, `updated_at`, `jml_pengembalian`) VALUES
(1, '2022-12-07 22:41:04', 2, 1, 4, 1, '2022-12-08 14:32:07', 'dikembalikan', '2022-12-08', '2022-12-07 15:41:20', '2022-12-08 14:32:07', 2),
(2, '2022-12-07 22:42:19', 2, 3, NULL, 3, NULL, 'pengajuan pinjaman', NULL, '2022-12-07 15:42:32', NULL, NULL),
(3, '2022-12-08 14:52:18', 3, 1, NULL, 1, NULL, 'pengajuan pinjaman', NULL, '2022-12-08 14:40:24', '2022-12-08 14:52:27', NULL),
(5, '2022-12-09 20:20:04', 1, 1, 4, 1, '2022-12-09 13:23:34', 'dikembalikan', '2022-12-12', '2022-12-09 13:20:18', '2022-12-09 13:23:34', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hak_akses` enum('anggota','petugas','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat`, `hak_akses`) VALUES
(1, 'anggota', 'anggota@gmail.com', '93274238', NULL, '$2y$10$0uttcSvJ1uzSDLr1h.J3UuQEK/Lt1qQW/7xoRcEt6caaRsjOATSAS', NULL, '2022-12-05 06:55:19', NULL, 'anggota sana', 'anggota'),
(3, 'user', 'user@gmail.com', '320948239', NULL, '$2y$10$tVt.G7UqfFa5ncK3kDNa..OiqyOMgN.kioGvoP5cMsRhYLE4mEK96', NULL, '2022-12-05 07:17:43', NULL, 'sanas sna', 'anggota'),
(4, 'petugas', 'petugas@gmail.com', '348204239', NULL, '$2y$10$lPu8zXzXaMLH7/CVj5piCumrArjSV8tilPPRguVpAvQKi3b2.hU0m', NULL, '2022-12-05 08:48:31', NULL, 'petugas', 'petugas'),
(8, 'saya', 'saya@gmail.com', '839247329', NULL, '$2y$10$8xgy/H8RBuRj0tKRjzfqUO5uV1B6AZamdtu61FAesFjtqZZKptPLS', NULL, '2022-12-08 09:34:25', NULL, 'saya', 'anggota'),
(9, 'admin', 'admin@gmail.com', '37492379', NULL, '$2y$10$/LjXlGmtLpjF8Q8DLrXIJ.LC9mqjOUs0VJ7Rw.QEuYkBTqcMcNALy', NULL, '2022-12-08 09:53:00', NULL, 'admin', 'admin'),
(10, 'ergi', 'ergi@gmail.com', '9348320', NULL, '$2y$10$N7.83fP1MQ5jwRfA.G3EXeupeBdwfffg8HFAqeBFCzy6aGxBTAzu2', NULL, '2022-12-09 06:18:16', NULL, 'yogyakarta', 'petugas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_peminjam`
-- (See below for the actual view)
--
CREATE TABLE `vw_peminjam` (
`id_peminjaman` int(11)
,`tgl_peminjaman` datetime
,`jml_peminjaman` int(11)
,`id_anggota` int(11)
,`id_petugas` int(11)
,`id_buku` int(11)
,`tgl_pengembalian` datetime
,`status_peminjaman` enum('pengajuan pinjaman','dipinjam','ditolak','dikembalikan','belum dikembalikan')
,`batas_pengembalian` date
,`created_at` datetime
,`updated_at` datetime
,`jml_pengembalian` int(11)
,`nama_buku` varchar(255)
,`gambar_buku` varchar(255)
,`penulis` varchar(200)
,`penerbit` varchar(200)
,`stok_buku` int(11)
,`id_peminjam` bigint(20) unsigned
,`nama_peminjam` varchar(255)
,`email_peminjam` varchar(255)
,`no_hp_peminjam` varchar(255)
,`alamat_peminjam` varchar(255)
,`nama_petugas` varchar(255)
,`email_petugas` varchar(255)
,`no_hp_petugas` varchar(255)
,`alama_petugas` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_peminjam`
--
DROP TABLE IF EXISTS `vw_peminjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_peminjam`  AS SELECT `p`.`id_peminjaman` AS `id_peminjaman`, `p`.`tgl_peminjaman` AS `tgl_peminjaman`, `p`.`jml_peminjaman` AS `jml_peminjaman`, `p`.`id_anggota` AS `id_anggota`, `p`.`id_petugas` AS `id_petugas`, `p`.`id_buku` AS `id_buku`, `p`.`tgl_pengembalian` AS `tgl_pengembalian`, `p`.`status_peminjaman` AS `status_peminjaman`, `p`.`batas_pengembalian` AS `batas_pengembalian`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `p`.`jml_pengembalian` AS `jml_pengembalian`, `b`.`nama_buku` AS `nama_buku`, `b`.`gambar_buku` AS `gambar_buku`, `b`.`penulis` AS `penulis`, `b`.`penerbit` AS `penerbit`, `b`.`stok_buku` AS `stok_buku`, `u`.`id` AS `id_peminjam`, `u`.`name` AS `nama_peminjam`, `u`.`email` AS `email_peminjam`, `u`.`phone_number` AS `no_hp_peminjam`, `u`.`alamat` AS `alamat_peminjam`, `us`.`name` AS `nama_petugas`, `us`.`email` AS `email_petugas`, `us`.`phone_number` AS `no_hp_petugas`, `us`.`alamat` AS `alama_petugas` FROM (((`peminjaman` `p` join `buku` `b` on(`b`.`id_buku` = `p`.`id_buku`)) join `users` `u` on(`u`.`id` = `p`.`id_anggota`)) left join `users` `us` on(`us`.`id` = `p`.`id_petugas`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
