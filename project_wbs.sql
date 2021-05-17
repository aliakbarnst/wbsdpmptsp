-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2021 pada 09.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_wbs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faqs`
--

INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. Apakah nomor pengaduan itu dan apa yang harus saya lakukan terhadap nomor register ini ?', 'Nomor register adalah nomor yang digunakan sebagai identitas pelapor dalam melakukan komunikasi tidak langsung antara pihak pelapor dengan penerima laporan yang didapatkan setelah pelapor menyampaikan laporan pelanggaran melalui aplikasi WBS ini. Simpan dengan baik nomor register yang Anda peroleh, jangan sampai tercecer dan diketahui oleh pihak yang tidak berhak karena pelayanan untuk mengetahui status tindak lanjut pengaduan yang disampaikan hanya dapat diberikan melalui nomor register tersebut.', '2021-05-09 02:16:15', '2021-05-09 02:16:15', NULL),
(2, '2. Apakah bentuk respon yang diberikan kepada pelapor atas pengaduan yang disampaikan ?', 'Respon yang diberikan kepada pelapor berupa respon awal (ucapan terima kasih telah melakukan pengaduan) dan status/tindak lanjut pengaduan paling akhir sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Respon terkait dengan status/tindak lanjut pengaduan dapat dilihat dalam history pengaduan aplikasi WBS.', '2021-05-09 02:16:36', '2021-05-09 02:16:36', NULL),
(3, '3. Apakah pengaduan yang saya berikan akan selalu mendapatkan respon ?', 'Pengaduan yang Anda berikan akan direspon dan tercantum dalam aplikasi WBS ini dan akan diperbaharui secara otomatis sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Untuk dapat melihat respon yang diberikan, Anda harus login terlebih dahulu dengan username yang telah Anda registrasikan di aplikasi ini dan Anda dapat melihat status pengaduan dalam history pengaduan sesuai dengan nomor pengaduan yang didapatkan. Sebagai catatan, pengaduan Anda akan lebih mudah ditindaklanjuti apabila memenuhi unsur pengaduan.', '2021-05-09 02:16:48', '2021-05-09 02:16:48', NULL),
(4, '4. Apakah setiap melakukan pengaduan harus membuat dan register username baru ?', 'Hal tersebut tidak perlu dilakukan. Satu username dapat melakukan pengaduan lebih dari satu. Ketika telah selesai membuat satu pengaduan, Anda dapat membuat pengaduan terkait dengan dugaan pelanggaran dan/atau ketidakpuasan terhadap pelayanan yang diberikan lainnya dengan memilih “tambah pengaduan”. Masing-masing pengaduan akan mendapatkan nomor pengaduan yang berbeda.', '2021-05-09 02:17:12', '2021-05-09 02:17:12', NULL),
(5, '5. Saya sudah mengirimkan pengaduan namun di kemudian hari saya ingin mengubah/menambahkan data terkait pengaduan yang saya lakukan, apa yang harus saya lakukan? Apakah harus membuat pengaduan baru ?', 'Data yang sudah dilaporkan sebelumnya tidak dapat dilakukan perubahan namun Anda bisa menambahkan data lain terkait pengaduan dengan mengunggah data dalam bentuk dokumen, foto, video, dan lain sebagainya masing-masing dengan ukuran maksimum 10 MB. Untuk melakukan hal tersebut di atas tidak perlu membuat pengaduan baru. Mengunggah data tambahan baru dapat dilakukan dengan login username yang telah diregistrasikan sebelumnya di aplikasi ini lalu masuk ke halaman pengaduan. Dalam halaman pengaduan, Anda memilih pengaduan yang ingin ditambahkan data tambahan kemudian memilih (klik kotak kecil “tambah lampiran pengaduan”) di bagian bawah rincian pengaduan.', '2021-05-09 02:18:08', '2021-05-09 02:18:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelanggarans`
--

CREATE TABLE `jenis_pelanggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pelanggarans`
--

INSERT INTO `jenis_pelanggarans` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pelanggaran Disiplin Pegawai', NULL, NULL, NULL),
(2, 'Penyalahgunaan Wewenang, Mal Administrasi dan Pemerasan/Penganiayaan', NULL, NULL, NULL),
(3, 'Korupsi', NULL, NULL, NULL),
(4, 'Pengadaan Barang dan Jasa/BAMA', NULL, NULL, NULL),
(5, 'Narkoba', NULL, NULL, NULL),
(6, 'Pungutan Liar, Percaloan, dan Pengurusan Dokumen', NULL, NULL, NULL),
(7, 'Pelayanan Public', NULL, NULL, NULL),
(8, 'Laporan dan Klarifikasi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampirans`
--

CREATE TABLE `lampirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lampirans`
--

INSERT INTO `lampirans` (`id`, `pengaduan_id`, `nama`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'absense', 'absense-09-05-2021-19-21-03.pdf', '2021-05-09 12:21:03', '2021-05-09 12:21:03', NULL),
(2, 2, 'Hajaja', 'hajaja-09-05-2021-20-22-31.pdf', '2021-05-09 13:22:31', '2021-05-09 13:22:31', NULL),
(3, 3, 'Hajaja', 'hajaja-09-05-2021-20-23-29.pdf', '2021-05-09 13:23:29', '2021-05-09 13:23:29', NULL),
(4, 4, 'Ghhh', 'ghhh-09-05-2021-20-24-42.pdf', '2021-05-09 13:24:42', '2021-05-09 13:24:42', NULL),
(5, 5, 'absense', 'absense-09-05-2021-21-04-04.pdf', '2021-05-09 14:04:04', '2021-05-09 14:04:04', NULL),
(6, 6, 'ass', 'ass-09-05-2021-21-06-22.pdf', '2021-05-09 14:06:22', '2021-05-09 14:06:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_users`
--

CREATE TABLE `level_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `level_users`
--

INSERT INTO `level_users` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin', NULL, NULL, NULL),
(2, 'Admin', '2020-12-29 16:19:08', '2021-05-09 02:21:44', NULL),
(3, 'User', '2021-04-16 11:42:18', '2021-05-09 02:21:57', NULL);

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
(1, '2019_12_10_082338_create_level_users_table', 1),
(2, '2019_12_10_082457_create_bidangs_table', 1),
(3, '2019_12_10_082618_create_kategori_beritas_table', 1),
(4, '2020_12_10_082321_create_users_table', 1),
(5, '2020_12_10_082355_create_beritas_table', 1),
(6, '2020_12_10_082413_create_galeri_gambars_table', 1),
(7, '2020_12_10_082429_create_detail_galeris_table', 1),
(8, '2020_12_10_082445_create_unduhs_table', 1),
(9, '2020_12_10_082508_create_sub_bidangs_table', 1),
(10, '2020_12_10_082520_create_tupoksis_table', 1),
(11, '2020_12_10_082531_create_galeri_videos_table', 1),
(14, '2020_12_10_082626_create_profils_table', 1),
(15, '2020_12_10_082636_create_pegawais_table', 1),
(17, '2020_12_10_082658_create_pertanyaans_table', 1),
(19, '2020_12_10_082718_create_kontaks_table', 1),
(20, '2020_12_10_082736_create_pengaturans_table', 1),
(21, '2020_12_16_151345_create_kategori_unduhans_table', 2),
(22, '2020_12_16_151358_create_sliders_table', 2),
(23, '2020_12_10_082545_create_link_terkaits_table', 3),
(24, '2020_12_10_082604_create_aplikasis_table', 3),
(25, '2020_12_10_082709_create_konsultasis_table', 4),
(26, '2021_03_12_195313_create_kategori_peraturans_table', 5),
(27, '2021_03_12_195615_create_peraturans_table', 6),
(28, '2021_03_12_205201_create_kategori_pelayanans_table', 7),
(30, '2021_03_12_204921_create_pelayanans_table', 8),
(33, '2021_03_17_112452_create_pertanyaan_ikms_table', 9),
(35, '2021_03_17_161312_create_surveys_table', 10),
(37, '2021_04_15_065408_create_statuses_table', 11),
(38, '2021_04_15_065419_create_subbags_table', 11),
(39, '2021_04_15_065433_create_kabupatens_table', 11),
(43, '2021_04_15_065445_create_jenis_rancangans_table', 12),
(47, '2021_04_17_023423_create_detail_rancangans_table', 13),
(48, '2021_05_08_150306_create_jenis_pelanggarans_table', 14),
(49, '2021_05_08_150443_create_pengaduans_table', 14),
(50, '2021_05_08_150500_create_lampirans_table', 14),
(51, '2020_12_10_082648_create_faqs_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_pelanggaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perlingungan` int(11) DEFAULT NULL,
  `nama_terduga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_terduga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_terduga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `user_id`, `jenis_pelanggaran_id`, `kode_ticket`, `deskripsi`, `perlingungan`, `nama_terduga`, `nip_terduga`, `jabatan_terduga`, `status_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 1, 'tgWw0XpBnyz6', 'ssss', 1, 'sasa', '1901829018', 'THL', 2, '2021-05-09 12:21:03', '2021-05-09 12:21:46', NULL),
(2, 21, 1, '67dPXpPUBI2B', 'Gak mau masuk', 1, 'Try Mersianto', '1244', 'Eks THL', 1, '2021-05-09 13:22:31', '2021-05-09 13:22:31', NULL),
(3, 21, 1, 'hYKcYMicsE1E', 'Gak mau masuk', 1, 'TryMersianto', '1244', 'Eks THL', 1, '2021-05-09 13:23:29', '2021-05-09 13:23:29', NULL),
(4, 21, 1, 'NFAF6w7guB9s', 'Cvhj', 1, 'TryMersianto', '5567', 'Eks THL', 1, '2021-05-09 13:24:42', '2021-05-09 13:24:42', NULL),
(5, 17, 1, 'tgVPRjqgcrby', 'asas', 1, 'asas', 'asas', 'THL', 1, '2021-05-09 14:04:04', '2021-05-09 14:04:04', NULL),
(6, 17, 1, 'qCcnw8cNnFFG', 'aaaa', 1, 'Yanda Nooryuda', '1901829018', 'THL', 1, '2021-05-09 14:06:22', '2021-05-09 14:06:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `nama`, `alamat`, `telpon`, `email`, `latitude`, `longitude`, `logo`, `facebook`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Riau', 'Jl. Jend. Sudirman No.460, Jadirejo, Kec. Sukajadi, Kota Pekanbaru, Riau 28121', '(0761) 33073', 'dpmptsp@riau.go.id', '0.5013504', '101.43334399999999', 'biro-hukum-setda-provinsi-riau.png', 'https://www.facebook.com/BKDProvRiau', 'https://www.youtube.com/channel/UCWM0cHvcqtToBX44tB-Scwg', 'https://www.instagram.com/bkdprovriau_/', 'https://twitter.com/BKD_Prov_Riau', '2021-03-17 16:57:46', '2021-05-09 00:08:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rancanganproduks`
--

CREATE TABLE `rancanganproduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_rancangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subbag_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_ula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `file_surat_permintaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_dokumen_perancangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_hasil_harmonisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_berita_acara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_matrix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kedua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `nama`, `nama_kedua`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Whistleblowing System', 'DPMPTSP PROVINSI RIAU', 'whistleblowing-system712919768.jpg', '2021-05-08 01:44:41', '2021-05-08 01:44:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', NULL, NULL, NULL),
(2, 'Proses Disposisi', NULL, NULL, NULL),
(3, 'Proses Telaah', NULL, NULL, NULL),
(4, 'Terbukti', NULL, NULL, NULL),
(5, 'Tidak Terbukti', NULL, NULL, NULL),
(6, 'Selesai', NULL, NULL, NULL),
(7, 'Bukan Kewenangan DPMPTSP Riau', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nama_belakang`, `username`, `email`, `email_verified_at`, `password`, `level_user_id`, `nope`, `id_telegram`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin', NULL, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$BGCYkXRdTwdbZ.O2b2eBO.LbnsqXiugV1mQ.akV46ZNVHbe/TI3zi', 1, NULL, '206724137', NULL, '2021-04-17 23:48:07', '2021-04-17 23:48:07', NULL),
(17, 'Ali', 'Akbar', 'aliakbar', 'admin@gmail.com', NULL, '$2y$10$BGCYkXRdTwdbZ.O2b2eBO.LbnsqXiugV1mQ.akV46ZNVHbe/TI3zi', 3, '6281275592449', NULL, NULL, '2021-05-08 05:28:28', '2021-05-08 05:28:28', NULL),
(18, 'Ali Admin 1', NULL, 'sugar', 'sugar@gmail.com', NULL, '$2y$10$Xe8ro7MzABp6ZNTsz4do7OBt.PqfjIEvTu94D6rwseYafE2Hgn9d.', 2, NULL, '206724137', NULL, '2021-05-09 02:26:59', '2021-05-09 02:27:10', NULL),
(21, 'Ade', 'Gesty', 'ade', 'adegestyr@gmail.com', NULL, '$2y$10$eZ4T0dn3fb9xjudEfgUAwO34IsMg3.JA.H2sNYcEn8adMkz51R76K', 3, '6285261540566', NULL, NULL, '2021-05-09 13:20:34', '2021-05-09 13:20:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pelanggarans`
--
ALTER TABLE `jenis_pelanggarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lampirans`
--
ALTER TABLE `lampirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampirans_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indeks untuk tabel `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_user_id_foreign` (`user_id`),
  ADD KEY `pengaduans_jenis_pelanggaran_id_foreign` (`jenis_pelanggaran_id`),
  ADD KEY `pengaduans_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rancanganproduks`
--
ALTER TABLE `rancanganproduks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rancanganproduks_user_id_foreign` (`user_id`),
  ADD KEY `rancanganproduks_jenis_rancangan_id_foreign` (`jenis_rancangan_id`),
  ADD KEY `rancanganproduks_status_id_foreign` (`status_id`),
  ADD KEY `rancanganproduks_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_level_user_id_foreign` (`level_user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelanggarans`
--
ALTER TABLE `jenis_pelanggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lampirans`
--
ALTER TABLE `lampirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rancanganproduks`
--
ALTER TABLE `rancanganproduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lampirans`
--
ALTER TABLE `lampirans`
  ADD CONSTRAINT `lampirans_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
