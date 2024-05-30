-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 16.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appinventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpeminjaman` int(11) NOT NULL,
  `idinventaris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjams`
--

CREATE TABLE `detail_pinjams` (
  `iddetailpinjam` int(10) UNSIGNED NOT NULL,
  `idinventaris` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `tanggalpeminjaman` date NOT NULL,
  `tanggalkembali` date NOT NULL,
  `statuspeminjaman` tinytext NOT NULL DEFAULT 'Dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `idinventaris` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kondisi` enum('Bagus','Buruk') NOT NULL DEFAULT 'Bagus',
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `tanggalregister` date NOT NULL,
  `idruang` int(11) NOT NULL,
  `kodeinventaris` varchar(255) NOT NULL,
  `idpetugas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`idinventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `idjenis`, `tanggalregister`, `idruang`, `kodeinventaris`, `idpetugas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Surat Untuk Raiden', '', 'Sini kukasih the catch', 0, 7, '2024-04-18', 5, 'TR.1740000', 18, '2024-04-17 15:22:14', '2024-05-29 13:01:15', '2024-05-29'),
(7, 'The Villain', '', 'aawdawdaw', 0, 8, '1222-12-12', 3, '212eq', 15, '2024-04-29 00:41:33', '2024-05-20 06:13:12', '2024-05-20'),
(9, 'adwddaw', '', 'dwada', 0, 7, '2024-05-19', 4, '123213', 26, '2024-05-20 01:48:48', '2024-05-20 01:51:06', '2024-05-20'),
(10, 'dasd', '', 'wdad', 0, 5, '2024-05-22', 3, 'ewqeqw', 24, '2024-05-20 17:31:03', '2024-05-20 17:31:11', '2024-05-21'),
(11, 'khvjblk', '', 'hgvjkb', 56, 8, '2024-06-04', 3, 'gh687i', 21, '2024-05-20 22:46:29', '2024-05-29 13:01:10', '2024-05-29'),
(12, 'The Catch R5', 'Bagus', 'Ya lumayan', 2, 7, '2024-05-30', 5, 'TC.001', 16, '2024-05-29 13:02:45', '2024-05-29 13:02:45', NULL),
(13, 'asdsa', 'Bagus', 'dasd', 1, 7, '2024-05-15', 5, 'asd', 11, '2024-05-29 13:10:18', '2024-05-29 13:10:18', NULL),
(14, 'Anjay', 'Bagus', 'sdad', 1, 9, '2024-05-14', 5, 'asd', 29, '2024-05-29 13:13:01', '2024-05-29 13:13:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int(10) UNSIGNED NOT NULL,
  `namajenis` varchar(225) NOT NULL,
  `kodejenis` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`idjenis`, `namajenis`, `kodejenis`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Kursi', 'K.30', 'Ya kursi', NULL, '2024-05-20 17:14:45', '2024-05-21'),
(7, 'The Catch', 'TC.05', 'WAJIB MANCING GESS SYULIT\"', NULL, NULL, NULL),
(8, 'Sapwood Blade', 'SB.01', 'Ayo kita jalani quest Sumeru dengan SABAR!!!', NULL, NULL, NULL),
(9, 'Iron Sting', 'Ir.165', 'Wahh OP\"\", Kuki auto Stonks', NULL, NULL, NULL),
(10, 'Shadow Scyte', 'SSR.01', 'Dark Element', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `idlevel` int(10) UNSIGNED NOT NULL,
  `namalevel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`idlevel`, `namalevel`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Kepala Gudang', NULL, NULL),
(3, 'Operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_18_052431_create_ruangs_table', 2),
(6, '2024_03_18_053348_create_petugas_table', 3),
(12, '2024_03_18_053811_create_detail_pinjams_table', 4),
(13, '2024_03_18_054051_create_levels_table', 4),
(14, '2024_03_18_054453_create_peminjamen_table', 4),
(15, '2024_03_18_055850_create_pegawais_table', 4),
(16, '2024_03_18_060443_create_jenis_table', 4),
(17, '2024_04_08_071828_inventaris', 5),
(18, '2024_04_09_222638_peminjaman', 6),
(19, '2024_04_17_110736_create_pengembalians_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `idpegawai` int(10) UNSIGNED NOT NULL,
  `namapegawai` varchar(225) NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`idpegawai`, `namapegawai`, `nip`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Barbara', 19240, 'Mondo', NULL, NULL, NULL),
(4, 'Xiangling', 26690, 'Mondo', NULL, NULL, NULL),
(5, 'Hu Tao', 1000000, 'Liyue', NULL, NULL, NULL),
(6, 'Yelan', 16340, 'Liyue', NULL, NULL, NULL),
(7, 'Kujou Sara', 4540, 'Inazuma', NULL, '2024-05-20 16:57:19', '2024-05-20'),
(8, 'Xingqiu', 33069, 'Liyue', NULL, '2024-05-20 14:55:56', '2024-05-20'),
(9, 'Kimchul', 2515123, 'Shadow World', NULL, '2024-05-20 06:19:14', '2024-05-20'),
(11, 'dawdaw', 121, 'awdwa', NULL, '2024-05-20 17:10:25', '2024-05-21'),
(12, 'dwad', 212, 'dawda', NULL, '2024-05-20 17:12:56', '2024-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `idpeminjaman` int(10) UNSIGNED NOT NULL,
  `idinventaris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggalpeminjaman` date DEFAULT NULL,
  `tanggalkembali` date DEFAULT NULL,
  `statuspeminjaman` enum('Diproses','Dipinjam','Dikembalikan','ProsesKembali','Peminjaman Ditolak','Pengembalian Ditolak') NOT NULL DEFAULT 'Diproses',
  `idpegawai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `jumlahkembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`idpeminjaman`, `idinventaris`, `jumlah`, `tanggalpeminjaman`, `tanggalkembali`, `statuspeminjaman`, `idpegawai`, `created_at`, `updated_at`, `deleted_at`, `jumlahkembali`) VALUES
(57, 7, 11, '2024-05-29', '2024-05-29', 'Dikembalikan', 3, '2024-06-12 10:42:10', '2024-05-29 10:43:08', NULL, NULL),
(58, 6, 11, '2024-05-29', NULL, 'Dipinjam', 5, '2024-05-29 10:42:21', '2024-05-29 10:42:57', NULL, NULL),
(59, 9, 112, NULL, NULL, 'Diproses', 7, '2024-05-29 10:42:49', '2024-05-29 10:42:49', NULL, NULL),
(60, 10, 14, '2024-05-29', NULL, 'ProsesKembali', 11, '2024-05-15 10:43:23', '2024-05-16 10:43:37', NULL, NULL),
(61, 7, 111, '2024-05-29', NULL, 'Dipinjam', 4, '2024-05-29 11:06:19', '2024-05-29 12:53:42', NULL, NULL),
(62, 6, 12, NULL, NULL, 'Diproses', 9, '2024-05-01 11:33:06', '2024-05-02 11:33:06', NULL, NULL),
(63, 7, 14, NULL, NULL, 'Diproses', 4, '2024-05-29 18:21:23', '2024-05-30 11:39:23', NULL, NULL);

--
-- Trigger `peminjamen`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER INSERT ON `peminjamen` FOR EACH ROW BEGIN 
	UPDATE inventaris set jumlah = jumlah + NEW.jumlahkembali
    WHERE idinventaris = new.idinventaris;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `peminjamen` FOR EACH ROW BEGIN 
	UPDATE inventaris set jumlah = jumlah - NEW.jumlah
    WHERE idinventaris = new.idinventaris;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalians`
--

CREATE TABLE `pengembalians` (
  `idpengembalian` int(10) UNSIGNED NOT NULL,
  `idpeminjaman` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(10) UNSIGNED NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namapetugas` varchar(225) NOT NULL,
  `idlevel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `username`, `password`, `namapetugas`, `idlevel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Hokage ke-7', '$2y$10$9LcLAy1GTxysvXbiJvFyuunKR.t3RD9u42pGGxxCMsDkMwT9/4fdK', 'Naruto Uzumaki', 3, NULL, '2024-05-20 01:50:24', '2024-05-20'),
(12, 'Maou Rimuru', '$2y$10$u/PFQcMKaOWx4z2dp6PGkOkOx0HcVMZC0vaGPGXOKvHdjbJJJaYR6', 'Rimuru Tempest', 3, NULL, NULL, NULL),
(13, 'Platinum', '$2y$10$TgKVejR90hHIHyBDLUsECe2OG/PW0WdSFCQsOUHYBREwZvLAjlVoy', 'Jotaro Kujo', 3, NULL, '2024-05-21 02:52:12', '2024-05-21'),
(14, 'Si Botak', '$2y$10$fJeA6sTLnqSFvZxHcllbPuQw1M/Mb1IixN3y6dvxcPmk7clmUFWey', 'Saitama', 3, NULL, '2024-05-20 01:22:53', '2024-05-20'),
(15, 'Nahida', '$2y$10$FkMQ840suxXi1VmBmgETZ.tRKC9M2YLJDaNxS96mDkF0AztGhSJhC', 'Lesser Lord Kusanali', 2, NULL, NULL, NULL),
(16, 'Raiden Shougun', '$2y$10$qpeTUr7vn2YEUh7bxPQMuO60CO5Zy1eeXf2Ja/ZOc56HhiwcJgp.K', 'Baal', 2, NULL, NULL, NULL),
(17, 'Morax', '$2y$10$FXuris8TkOKQ2UHOCz87aeZu5zIZ1Hp/ufb/OZXwJ9.4FOcK8alE2', 'Rex Lapis', 2, NULL, NULL, NULL),
(18, 'Venti', '$2y$10$bbcuUmmT.PUutUvNTBgX8u.Tt6ys2.55vHZfAB/8t4zAfcw04SbTa', 'Barbatos', 2, NULL, '2024-05-20 01:22:02', '2024-05-20'),
(19, 'Furina', '$2y$10$.fVCHZ6S8Ntl6VxsCVK8luEkER/fYELvrrvt0FmG45H0eKB2GGDR6', 'Focalors', 2, NULL, NULL, NULL),
(20, 'Admin', '$2y$10$nbgyBctFDLHZqlk2fGkmTeI3Qz1VlEYy31yudWaZwYsPIJviwhSWi', 'First Admin', 1, '2024-04-26 23:04:09', '2024-04-26 23:04:09', NULL),
(21, 'KepalaG', '$2y$10$4LFbhKMLae/Qpjk08uQzUuW2lqM50k5exAOhl6rz4Ig/yZvVrOmA6', 'First KepalaG', 2, '2024-04-26 23:04:09', '2024-04-26 23:04:09', NULL),
(22, 'Operator', '$2y$10$i4bfHcHTHvx.ypBUfNcJ0.hROmuHMdO68FZA9TBlJYLrO.s7xMqrm', 'First Operator', 3, '2024-04-26 23:04:09', '2024-04-26 23:04:09', NULL),
(23, 'Sang Penari', '$2y$10$YFiZlv/8FDZZr6m3vvXyrOIJGfxhvJw385I4cJWIWX7DbJE2TML/u', 'Cha He In', 2, NULL, '2024-05-29 18:54:56', '2024-05-30'),
(24, 'Real Admin', '$2y$10$FwGYWGHkaaWWC8j59qhlp.XY2xwQEQTZJr4LJaJ0W5Zclpx9OV9s2', 'Asa', 1, NULL, '2024-05-20 17:45:13', '2024-05-21'),
(25, 'EBEW', '$2y$10$vtU5N2bPTFhBewaOY1sS4eVpMQHcpYkq94mqBr2/Z5ppLQo7oR1CC', 'HANUM', 2, NULL, '2024-05-29 12:49:16', '2024-05-29'),
(26, 'Ovan1763', '$2y$10$g.ZCKztCIb1/Ac3rVRHQVOV1fIAMqyd63NT2inN/xaeyMdOEjZjPK', 'Ovan', 1, NULL, '2024-05-20 17:42:04', '2024-05-21'),
(29, 'awdawd', '$2y$10$vbAhGmjJUNl7LVlsG6wp9.roq5lTjmV5tVolYWuLlVCWXHLeB0FBO', 'adawd', 2, NULL, '2024-05-20 01:21:27', '2024-05-20'),
(30, 'asavancom', '$2y$10$auzQHISWuCqKukbDmZQQZO13djzk6KfZRulkK9tiI3ie/AJaMj3pO', '\'Adn Asa Giovanni Budiarso', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangs`
--

CREATE TABLE `ruangs` (
  `idruang` int(10) UNSIGNED NOT NULL,
  `namaruang` varchar(100) NOT NULL,
  `koderuang` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangs`
--

INSERT INTO `ruangs` (`idruang`, `namaruang`, `koderuang`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Liyue', '02', 'Yaaa lumayan terbang\"', NULL, NULL, NULL),
(5, 'Inazuma', '03', 'ARGHH FARMING\"\"\"\"\", KERJA!!!!', NULL, NULL, NULL),
(6, 'Sumeru', '04', 'Memusingkan', NULL, NULL, NULL),
(7, 'Fontaine', '05', 'Seru new vibe', NULL, NULL, NULL),
(8, 'Red Gate Rank-S', 'RGD.01', 'Berbahaya', NULL, NULL, NULL),
(11, 'ad', 'da', 'da', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pinjams`
--
ALTER TABLE `detail_pinjams`
  ADD PRIMARY KEY (`iddetailpinjam`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`idinventaris`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`idpeminjaman`);

--
-- Indeks untuk tabel `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`idpengembalian`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indeks untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`idruang`);

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
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pinjams`
--
ALTER TABLE `detail_pinjams`
  MODIFY `iddetailpinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `idinventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `idlevel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `idpegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `idpeminjaman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `idpengembalian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `idruang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
