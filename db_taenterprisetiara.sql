-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jul 2024 pada 13.47
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taenterprisetiara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `foto`, `judul`, `deskripsi`, `alamat`, `nomor_hp`, `email`, `link_youtube`, `link_facebook`, `link_instagram`, `link_email`, `link_twitter`, `created_at`, `updated_at`) VALUES
(1, '8b1XI6QoM3E9JXaHULfKWHohD4iSeNcVgEuOExhM.jpg', 'Make Your Tour Memorable and Safe With Us Shandi', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', 'Singkarak, Kec. X Koto Singkarak, Kabupaten Solok, Sumatera Barat 27356', '082287615300', 'wisatacinangkiak@gmail.com', 'https://youtu.be/WcsYxIFMg3I?si=LR1L2tgFSb0Wngz-', 'https://www.instagram.com/krn_shandi03/', 'https://www.instagram.com/krn_shandi03/', 'https://www.instagram.com/krn_shandi03/', 'https://www.instagram.com/krn_shandi03/', '2024-06-02 19:22:23', '2024-06-02 19:33:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint UNSIGNED NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `stock` int NOT NULL,
  `hari_operasional` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wahana_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `waktu_mulai`, `waktu_selesai`, `stock`, `hari_operasional`, `wahana_id`, `created_at`, `updated_at`) VALUES
(3, '10:15:00', '01:09:00', 88, 'Senin', 2, '2024-06-02 08:09:50', '2024-06-02 17:10:27'),
(4, '00:29:00', '01:30:00', 88, 'Senin', 3, '2024-06-02 08:28:04', '2024-06-02 08:49:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_05_16_131911_create_payments_table', 1),
(4, '2024_05_16_131958_create_wahanas_table', 1),
(5, '2024_05_16_132222_create_ulasans_table', 1),
(6, '2024_06_02_051350_create_jadwals_table', 1),
(7, '2024_06_02_051849_create_transaksis_table', 1),
(8, '2024_06_02_093131_create_transaksis_table', 2),
(9, '2024_06_02_093217_create_transaksis_table', 3),
(10, '2024_06_02_094420_create_transaksis_table', 4),
(11, '2024_06_02_094612_create_transaksis_table', 5),
(12, '2024_06_02_095009_create_transaksis_table', 6),
(13, '2024_06_02_095232_create_transaksis_table', 7),
(14, '2024_06_02_095320_create_transaksis_table', 8),
(15, '2024_06_03_004057_create_abouts_table', 9),
(16, '2024_06_03_010804_create_carousels_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rekening` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `nama_rekening`, `nomor_rekening`, `created_at`, `updated_at`) VALUES
(1, 'Dana', '1234567890', '2024-06-01 22:57:08', '2024-06-01 22:57:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tiket` int NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_bayar` decimal(15,2) NOT NULL,
  `status` enum('pending','sukses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `wahana_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `kode_pemesanan`, `bukti_pembayaran`, `kode_tiket`, `jumlah_tiket`, `tanggal_transaksi`, `total_bayar`, `status`, `jadwal_id`, `user_id`, `wahana_id`, `payment_id`, `created_at`, `updated_at`) VALUES
(7, 'LI7V8G0', 'pU4mQWfn9SslBaHFTzqwINNEagvGtTU6xlew7eAP.png', 'B43O0R1,UF26GJX,X3C47ZD', 3, '2024-06-02', 30000.00, 'sukses', 3, 3, 2, 1, '2024-06-02 09:32:54', '2024-06-02 10:08:41'),
(10, 'UQR8TV1', 'j2u2P03Z7mynCXyZsps5q5EP81LbQSy8Lcxmzn38.jpg', 'ZITHXEN,C761IEB,X6GTYBS', 3, '2024-06-02', 30000.00, 'sukses', 3, 3, 2, 1, '2024-06-02 10:19:05', '2024-06-02 10:26:06'),
(11, 'ISDOG8Z', 'j00EnhyxA5Rp3GvmBrexgNz1oBAS9n4OLxaJN1xd.jpg', 'QDK0MWT,WXD492V', 2, '2024-06-03', 20000.00, 'pending', 3, 3, 2, 1, '2024-06-02 17:10:27', '2024-06-02 17:10:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint UNSIGNED NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `wahana_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ulasans`
--

INSERT INTO `ulasans` (`id`, `komentar`, `user_id`, `wahana_id`, `created_at`, `updated_at`) VALUES
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, 3, '2024-06-02 09:00:05', '2024-06-02 09:04:02'),
(3, 'ksjsjds', 3, 6, '2024-06-02 17:20:34', '2024-06-02 17:20:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('pengunjung','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `foto`, `provinsi`, `kabupaten`, `alamat`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Kurnia Shandi', 'dXhhrP1vq0ZnhRgyYMjiICb7xEoCq94FitIGPYLP.png', '', '', '', 'shandikurnia26', '$2y$12$Dsp0kKOR6APlVSbSBdmAceUGF74X.waWh/0VJiNkcJO3ZV6rFSbJ2', 'pengunjung', '2024-06-01 22:56:55', '2024-06-01 22:56:55'),
(3, 'Arif', 'GYuqVWenYKdxYk1W1fU4DmiWsdDGjQdgsScdSpsR.jpg', '', '', '', 'arif123', '$2y$12$Uuw5wFvlrK68lgvvoEWpOeYjdkR8MKyrsSV0mQYAM0cSv.l9yOTV.', 'pengunjung', '2024-06-02 07:33:28', '2024-06-02 07:33:28'),
(4, 'Tiara Heliyan Ningsih', 'O6MwXW6pUkbW9oDf0UI1JknIapi8TI1Co9T6Mqp0.png', '', '', '', 'admin', '$2y$12$SMZ8RNUswNER60S6u34AkeWBetD0cZI.wDGQ0eOsRi/.clHMH9Bh2', 'admin', '2024-06-02 09:22:33', '2024-06-02 09:22:33'),
(5, 'Melani', 'NplZqR63PYIEqr1KwWY24J0tGUqfOqSFxMcQxO8F.jpg', '15', 'KAB. MUARO JAMBI', 'Serambi', 'mel_adila23', '$2y$12$n6QMyFkLt6k7MYhHt.VO4O7JR19cH6jOgiLfZEdUh4OyHIt29JBBS', 'pengunjung', '2024-06-02 17:33:06', '2024-06-02 17:33:06'),
(6, 'agil', '9F00GvahypVvlqucEi9p75Lk2JjeD7yct7v9xTNC.jpg', '15', 'KAB. KERINCI', 'Mungka, Kecamatan Mungka', 'agil1234', '$2y$12$Vg8aT9qfhhZhmvTQaLGv4.muplnWUkHBblT0MjvLgF0LSkZRQexpi', 'pengunjung', '2024-06-02 17:39:05', '2024-06-02 17:39:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wahanas`
--

CREATE TABLE `wahanas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_wahana` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wahanas`
--

INSERT INTO `wahanas` (`id`, `nama_wahana`, `deskripsi`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Jembatan Gantung', 'Bagi kamu yang suka  wahana seru dan menantang, kamu bisa coba untuk  melintasi jembatan gantung yang ada Bukit Chinangkiek Solok.\r\nWahana ini terbuat dari deretan papan yang terikat dengan tali, hingga membentuk  jembatan gantung.\r\nJika mencoba untuk melewatinya, jembatan akan bergoyang-goyang, hingga kamu dapat merasakan sensasi yang mendebarkan.', 10000.00, 'IBhq2VkXASjoOZP5SXzgsU6JldUfZ7bRBLvNLP7v.jpg', '2024-06-02 06:44:02', '2024-06-02 07:08:12'),
(3, 'Rumah Pohon Keren', 'Wahana ini sangat populer sebagai salah satu spot foto yang lagi hits, karena bentuknya yang unik. Kamu dapat berfoto dengan latar perbukitan yang elok, dan juga Instagramable. Cocoklah buat memperkaya halaman media sosial kamu!\r\n\r\nSelain berfungsi sebagai spot foto yang unik, rumah pohon ini juga dapat digunakan sebagai tempat menginap dan beristirahat.', 10000.00, '6jgbSata5DHxMriqLYbBPdzrCdssNuZoj53Y3Rkn.jpg', '2024-06-02 06:44:43', '2024-06-02 06:44:43'),
(4, 'Paralayang', 'Destinasi wisata ini juga menyediakan fasilitas Olahraga Paralayang. Jika kamu seorang adrenalin junkie, dapat mencoba uji nyali dengan wahana yang satu ini. \r\n\r\nDari atas ketinggian, kamu dapat menikmati keindahan Danau Singkarak dan hijaunya pedesaan.\r\n\r\nKeindahan pemandangan tersebut, pasti tidak akan ada duanya. Dan sembari terbang, kamu juga dapat berselfie loh!. Pasti keren hasilnya!', 10000.00, 'hcUYJx9iU04Y0hn6LwGesAb28LQypZr7CSNGUG8p.jpg', '2024-06-02 06:45:17', '2024-06-02 07:08:19'),
(5, 'Perosotan Warna-Warni', 'Wahana berupa perosotan ini, merupakan kain warna warni seperti layaknya pelangi yang cukup kuat dan  kokoh.\r\n\r\nKamu dapat mencoba untuk merasakan sensasi meluncur, dari atas papan yang tersedia.', 10000.00, 'kSl9U2bH9JAIe64Os4ngkyX34Ny5Ozay9Y0Pp3qv.jpg', '2024-06-02 06:45:48', '2024-06-02 06:45:48'),
(6, 'Waterboom', 'Bukit Chinangkiek juga memiliki wahana waterboom unik, dengan tujuh spot permainan yang seru dan menyenangkan.\r\n\r\nBeberapa diantaranya seperti Tower Slide, Racer Slide, Kiddy Pool, Lazy River, dan juga Kolam Renang.\r\n\r\n\r\nSelain berukuran cukup besar, kolam renang itu juga memiliki air mancur di tengahnya.\r\n\r\nNamun yang paling unik, kolam tersebut seolah berada  di pinggir tebing yang curam.', 10000.00, 'AL4TAMzHmNahcAl6EhYOLyDdA2jtIUNDKsL4kWJu.jpg', '2024-06-02 06:46:20', '2024-06-02 06:46:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_wahana_id_foreign` (`wahana_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_pemesanan_unique` (`kode_pemesanan`),
  ADD KEY `transaksis_jadwal_id_foreign` (`jadwal_id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_wahana_id_foreign` (`wahana_id`),
  ADD KEY `transaksis_payment_id_foreign` (`payment_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_user_id_foreign` (`user_id`),
  ADD KEY `ulasans_wahana_id_foreign` (`wahana_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `wahanas`
--
ALTER TABLE `wahanas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wahanas`
--
ALTER TABLE `wahanas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_wahana_id_foreign` FOREIGN KEY (`wahana_id`) REFERENCES `wahanas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_wahana_id_foreign` FOREIGN KEY (`wahana_id`) REFERENCES `wahanas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_wahana_id_foreign` FOREIGN KEY (`wahana_id`) REFERENCES `wahanas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
