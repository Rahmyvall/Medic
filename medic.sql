-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2025 at 12:46 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medic`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tentang Rumah Sakit',
  `description` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `history` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `vision`, `mission`, `history`, `address`, `phone`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Rumah Sakit', 'Rumah Sakit Kasih Sayang Ibu berdiri dengan komitmen untuk memberikan pelayanan kesehatan terbaik bagi masyarakat dengan tenaga medis profesional dan fasilitas modern.', 'Menjadi rumah sakit unggulan yang memberikan pelayanan kesehatan berkualitas dan berorientasi pada kepuasan pasien.', '1. Memberikan pelayanan kesehatan yang ramah dan profesional. \r\n2. Meningkatkan kualitas SDM dan fasilitas rumah sakit. \r\n3. Berperan aktif dalam kegiatan sosial dan edukasi kesehatan masyarakat.', 'Didirikan pada tahun 1995, Rumah Sakit Sehat Sentosa telah berkembang dari klinik kecil menjadi rumah sakit dengan lebih dari 200 tenaga medis dan fasilitas lengkap.', 'Jl. Kesehatan No. 10, Jakarta Pusat', '(021) 555-1234', 'info@rssehat.com', '[\"about_us\\/lHZpP8dtVR92bYXz5mNsJu2OIZS34AVnnXyVqjqJ.jpg\"]', '2025-10-17 12:26:10', '2025-10-17 07:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `detailreseps`
--

CREATE TABLE `detailreseps` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `resep_id` bigint UNSIGNED NOT NULL,
  `obat_id` bigint UNSIGNED NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailreseps`
--

INSERT INTO `detailreseps` (`detail_id`, `resep_id`, `obat_id`, `dosis`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '1 tablet setiap 8 jam', 15, '2025-10-12 10:30:28', '2025-10-12 03:59:59'),
(2, 1, 2, '2 kapsul setiap 12 jam', 5, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(3, 2, 1, '1 tablet setiap 6 jam', 12, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(4, 2, 3, '5 ml setiap 4 jam', 20, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(5, 3, 2, '1 kapsul setiap 8 jam', 15, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(6, 3, 4, '10 ml setiap 6 jam', 30, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(7, 4, 1, '1 tablet sebelum makan', 7, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(8, 4, 5, '2 kapsul setelah makan', 10, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(9, 5, 3, '5 ml setiap 8 jam', 18, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(10, 5, 4, '10 ml setiap 12 jam', 25, '2025-10-12 10:30:28', '2025-10-12 10:30:28'),
(11, 3, 1, '2 kapsul setiap 12 jam', 2, '2025-10-12 03:45:51', '2025-10-12 03:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint UNSIGNED NOT NULL,
  `nm_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_dokter` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint UNSIGNED NOT NULL,
  `dokter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_praktek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_str` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `dokter_id`, `nama`, `photo_dokter`, `spesialisasi`, `jadwal_praktek`, `no_str`, `created_at`, `updated_at`) VALUES
(1, 'DOK001', 'Dr. Ahmad Fauzi', 'dokters/Mbpo771KO4D5X5wnXVgS7ONKwvw4r3i7FWrL4Yep.webp', 'Anak', 'Senin - Jumat 08:00-12:00', 'STR202510120001', '2025-10-11 23:41:22', '2025-10-11 16:44:29'),
(2, 'DOK002', 'Dr. Siti Aminah', 'dokters/dokter2.jpg', 'Bedah', 'Senin - Jumat 10:00-14:00', 'STR202510120002', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(3, 'DOK003', 'Dr. Budi Santoso', 'dokters/gIrOP0jUpwUfxdtoT0FyoYUyzKP0a2PXWMJVBUm0.png', 'THT', 'Selasa - Sabtu 08:00-12:00', 'STR202510120003', '2025-10-11 23:41:22', '2025-10-11 16:50:09'),
(4, 'DOK004', 'Dr. Rina Wijaya', 'dokters/dokter4.jpg', 'Gigi', 'Senin - Kamis 09:00-13:00', 'STR202510120004', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(5, 'DOK005', 'Dr. Andi Pratama', 'dokters/igtJhnvMIU0ORHt8pBPOJXYgGXmqHFlMspRzBMUH.png', 'Kulit', 'Rabu - Sabtu 08:00-12:00', 'STR202510120005', '2025-10-11 23:41:22', '2025-10-11 16:49:05'),
(6, 'DOK006', 'Dr. Maya Lestari', 'dokters/dokter6.jpg', 'Mata', 'Senin - Jumat 14:00-18:00', 'STR202510120006', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(7, 'DOK007', 'Dr. Hendra Kurnia', 'dokters/dokter7.jpg', 'Saraf', 'Selasa - Jumat 08:00-12:00', 'STR202510120007', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(8, 'DOK008', 'Dr. Fitri Ramadhani', 'dokters/dokter8.jpg', 'Jantung', 'Senin - Kamis 09:00-13:00', 'STR202510120008', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(9, 'DOK009', 'Dr. Agus Setiawan', 'dokters/K2enlSCdk9qvMZzTT70umANVEq8c86uF91PABi7W.webp', 'Umum', 'Senin - Jumat 08:00-12:00', 'STR202510120009', '2025-10-11 23:41:22', '2025-10-11 16:43:56'),
(10, 'DOK010', 'Dr. Lili Hartati', 'dokters/dokter10.jpg', 'Anak', 'Selasa - Sabtu 10:00-14:00', 'STR202510120010', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(11, 'DOK011', 'Dr. Teguh Prasetyo', 'dokters/dokter11.jpg', 'Bedah', 'Senin - Kamis 08:00-12:00', 'STR202510120011', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(12, 'DOK012', 'Dr. Nia Kurniawati', 'dokters/dokter12.jpg', 'THT', 'Rabu - Jumat 09:00-13:00', 'STR202510120012', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(13, 'DOK013', 'Dr. Yoga Pradipta', 'dokters/dokter13.jpg', 'Gigi', 'Senin - Sabtu 08:00-12:00', 'STR202510120013', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(14, 'DOK014', 'Dr. Siska Paramita', 'dokters/dokter14.jpg', 'Kulit', 'Selasa - Jumat 14:00-18:00', 'STR202510120014', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(15, 'DOK015', 'Dr. Rizky Hidayat', 'dokters/dokter15.jpg', 'Mata', 'Senin - Kamis 08:00-12:00', 'STR202510120015', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(16, 'DOK016', 'Dr. Fajar Pratama', 'dokters/dokter16.jpg', 'Saraf', 'Rabu - Sabtu 09:00-13:00', 'STR202510120016', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(17, 'DOK017', 'Dr. Indah Sari', 'dokters/dokter17.jpg', 'Jantung', 'Senin - Jumat 08:00-12:00', 'STR202510120017', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(18, 'DOK018', 'Dr. Wawan Sutanto', 'dokters/dokter18.jpg', 'Umum', 'Selasa - Kamis 10:00-14:00', 'STR202510120018', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(19, 'DOK019', 'Dr. Rina Puspita', 'dokters/dokter19.jpg', 'Anak', 'Senin - Jumat 08:00-12:00', 'STR202510120019', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(20, 'DOK020', 'Dr. Dedi Setiawan', 'dokters/c0m5CGaRa59unOmtwP0ma5BiImDyP9FtrWs3fXIU.jpg', 'Bedah', 'Rabu - Sabtu 09:00-13:00', 'STR202510120020', '2025-10-11 23:41:22', '2025-10-11 16:50:56'),
(21, 'DOK021', 'Dr. Lina Marlina', 'dokters/dokter21.jpg', 'THT', 'Senin - Kamis 08:00-12:00', 'STR202510120021', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(22, 'DOK022', 'Dr. Arifin Nugroho', 'dokters/EnQctx8cX9kBNF3CYWq85Z624OLXdbBoRDV53lLg.webp', 'Gigi', 'Selasa - Jumat 09:00-13:00', 'STR202510120022', '2025-10-11 23:41:22', '2025-10-11 16:49:34'),
(23, 'DOK023', 'Dr. Sari Dewi', 'dokters/dokter23.jpg', 'Kulit', 'Senin - Jumat 08:00-12:00', 'STR202510120023', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(24, 'DOK024', 'Dr. Bayu Prasetyo', 'dokters/EiR0P9RpiUtLoHAutZQsEtIs3uyITZ0zTWa0Ge7p.jpg', 'Mata', 'Rabu - Sabtu 10:00-14:00', 'STR202510120024', '2025-10-11 23:41:22', '2025-10-11 16:50:45'),
(25, 'DOK025', 'Dr. Dwi Hartono', 'dokters/dokter25.jpg', 'Saraf', 'Senin - Kamis 08:00-12:00', 'STR202510120025', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(26, 'DOK026', 'Dr. Wulan Sari', 'dokters/dokter26.jpg', 'Jantung', 'Selasa - Jumat 09:00-13:00', 'STR202510120026', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(27, 'DOK027', 'Dr. Agung Prasetyo', 'dokters/1Tz0LgJbMkIjnxuOAOZNph1mXKQERv9TzwVN3UgD.webp', 'Umum', 'Senin - Jumat 08:00-12:00', 'STR202510120027', '2025-10-11 23:41:22', '2025-10-11 16:41:59'),
(28, 'DOK028', 'Dr. Fitri Handayani', 'dokters/2qaxur9Sc3ayb01JWW0T4fG0E1GEXjnJmNsnhDdc.webp', 'Anak', 'Rabu - Sabtu 10:00-14:00', 'STR202510120028', '2025-10-11 23:41:22', '2025-10-11 16:48:39'),
(29, 'DOK029', 'Dr. Hendri Saputra', 'dokters/dokter29.jpg', 'Bedah', 'Senin - Kamis 08:00-12:00', 'STR202510120029', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(30, 'DOK030', 'Dr. Sinta Marlina', 'dokters/dokter30.jpg', 'THT', 'Selasa - Jumat 09:00-13:00', 'STR202510120030', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(31, 'DOK031', 'Dr. Iwan Kurniawan', 'dokters/dokter31.jpg', 'Gigi', 'Senin - Jumat 08:00-12:00', 'STR202510120031', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(32, 'DOK032', 'Dr. Nining Susanti', 'dokters/dokter32.jpg', 'Kulit', 'Rabu - Sabtu 09:00-13:00', 'STR202510120032', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(33, 'DOK033', 'Dr. Rudi Santoso', 'dokters/dokter33.jpg', 'Mata', 'Senin - Kamis 08:00-12:00', 'STR202510120033', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(34, 'DOK034', 'Dr. Tika Pratiwi', 'dokters/dokter34.jpg', 'Saraf', 'Selasa - Jumat 10:00-14:00', 'STR202510120034', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(35, 'DOK035', 'Dr. Arini Lestari', 'dokters/VIvhF7HjuTuxLCgmv7uEC5ufjiH69u7M1MuJETQk.jpg', 'Jantung', 'Senin - Jumat 08:00-12:00', 'STR202510120035', '2025-10-11 23:41:22', '2025-10-11 16:48:06'),
(36, 'DOK036', 'Dr. Yoga Prasetyo', 'dokters/dokter36.jpg', 'Umum', 'Rabu - Sabtu 09:00-13:00', 'STR202510120036', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(37, 'DOK037', 'Dr. Nabila Sari', 'dokters/dokter37.jpg', 'Anak', 'Senin - Kamis 08:00-12:00', 'STR202510120037', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(38, 'DOK038', 'Dr. Ardi Nugroho', 'dokters/aA671VRbPpL3YBCZnXkQG7EeGZ0yAO8SfExIijTN.webp', 'Bedah', 'Selasa - Jumat 09:00-13:00', 'STR202510120038', '2025-10-11 23:41:22', '2025-10-11 16:47:21'),
(39, 'DOK039', 'Dr. Yuni Hartati', 'dokters/dokter39.jpg', 'THT', 'Senin - Jumat 08:00-12:00', 'STR202510120039', '2025-10-11 23:41:22', '2025-10-11 23:41:22'),
(40, 'DOK040', 'Dr. Fajar Wicaksono', 'dokters/dokter40.jpg', 'Gigi', 'Rabu - Sabtu 10:00-14:00', 'STR202510120040', '2025-10-11 23:41:22', '2025-10-11 23:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungans`
--

CREATE TABLE `kunjungans` (
  `id` bigint UNSIGNED NOT NULL,
  `pasien_id` bigint UNSIGNED NOT NULL,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL,
  `jenis_kunjungan` enum('rawat_jalan','rawat_inap','IGD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('terjadwal','selesai','batal','proses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'terjadwal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kunjungans`
--

INSERT INTO `kunjungans` (`id`, `pasien_id`, `dokter_id`, `tanggal_kunjungan`, `jenis_kunjungan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-10-01 08:00:00', 'rawat_jalan', 'selesai', NULL, NULL),
(2, 2, 2, '2025-10-01 09:00:00', 'rawat_inap', 'terjadwal', NULL, NULL),
(3, 3, 1, '2025-10-01 10:00:00', 'IGD', 'proses', NULL, NULL),
(4, 4, 3, '2025-10-02 08:30:00', 'rawat_jalan', 'selesai', NULL, NULL),
(5, 5, 2, '2025-10-02 09:15:00', 'rawat_jalan', 'batal', NULL, NULL),
(6, 6, 3, '2025-10-02 10:45:00', 'rawat_inap', 'terjadwal', NULL, NULL),
(7, 7, 1, '2025-10-03 08:20:00', 'IGD', 'selesai', NULL, NULL),
(8, 8, 2, '2025-10-03 09:10:00', 'rawat_jalan', 'proses', NULL, NULL),
(9, 9, 3, '2025-10-03 10:50:00', 'rawat_inap', 'selesai', NULL, NULL),
(10, 10, 1, '2025-10-04 08:05:00', 'rawat_jalan', 'terjadwal', NULL, NULL),
(11, 11, 2, '2025-10-04 09:25:00', 'IGD', 'batal', NULL, NULL),
(12, 12, 3, '2025-10-04 10:30:00', 'rawat_jalan', 'selesai', NULL, NULL),
(13, 13, 1, '2025-10-05 08:15:00', 'rawat_inap', 'proses', NULL, NULL),
(14, 14, 2, '2025-10-05 09:40:00', 'rawat_jalan', 'selesai', NULL, NULL),
(15, 15, 3, '2025-10-05 10:55:00', 'IGD', 'terjadwal', NULL, NULL),
(16, 16, 1, '2025-10-06 08:00:00', 'rawat_jalan', 'selesai', NULL, NULL),
(17, 17, 2, '2025-10-06 09:10:00', 'rawat_inap', 'proses', NULL, NULL),
(18, 18, 3, '2025-10-06 10:20:00', 'IGD', 'selesai', NULL, NULL),
(19, 19, 1, '2025-10-07 08:30:00', 'rawat_jalan', 'batal', NULL, NULL),
(20, 20, 2, '2025-10-07 09:45:00', 'rawat_jalan', 'selesai', NULL, NULL),
(21, 21, 3, '2025-10-07 10:50:00', 'rawat_inap', 'terjadwal', NULL, NULL),
(22, 22, 1, '2025-10-08 08:10:00', 'IGD', 'proses', NULL, NULL),
(23, 23, 2, '2025-10-08 09:20:00', 'rawat_jalan', 'selesai', NULL, NULL),
(24, 24, 3, '2025-10-08 10:30:00', 'rawat_inap', 'batal', NULL, NULL),
(25, 25, 1, '2025-10-09 08:05:00', 'rawat_jalan', 'selesai', NULL, NULL),
(26, 26, 2, '2025-10-09 09:15:00', 'IGD', 'terjadwal', NULL, NULL),
(27, 27, 3, '2025-10-09 10:25:00', 'rawat_inap', 'selesai', NULL, NULL),
(28, 28, 1, '2025-10-10 08:35:00', 'rawat_jalan', 'proses', NULL, NULL),
(29, 29, 2, '2025-10-10 09:45:00', 'rawat_jalan', 'selesai', NULL, NULL),
(30, 30, 3, '2025-10-10 10:55:00', 'IGD', 'terjadwal', NULL, NULL),
(31, 31, 1, '2025-10-11 08:10:00', 'rawat_inap', 'selesai', NULL, NULL),
(32, 32, 2, '2025-10-11 09:25:00', 'rawat_jalan', 'batal', NULL, NULL),
(33, 33, 3, '2025-10-11 10:35:00', 'IGD', 'selesai', NULL, NULL),
(34, 34, 1, '2025-10-12 08:00:00', 'rawat_jalan', 'proses', NULL, NULL),
(35, 35, 2, '2025-10-12 09:15:00', 'rawat_inap', 'selesai', NULL, NULL),
(36, 36, 3, '2025-10-12 10:40:00', 'IGD', 'proses', NULL, '2025-10-12 02:53:51'),
(37, 37, 1, '2025-10-13 08:20:00', 'rawat_jalan', 'selesai', NULL, NULL),
(38, 38, 2, '2025-10-13 09:30:00', 'rawat_jalan', 'proses', NULL, NULL),
(39, 39, 3, '2025-10-13 10:50:00', 'rawat_inap', 'proses', NULL, '2025-10-11 17:24:45'),
(40, 40, 1, '2025-10-14 08:05:00', 'IGD', 'selesai', NULL, '2025-10-11 17:24:22'),
(41, 61, 2, '2025-10-12 07:27:00', 'rawat_jalan', 'proses', '2025-10-11 17:27:31', '2025-10-11 17:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_09_125507_create_dokter_table', 1),
(7, '2024_06_04_124952_create_dokters_table', 1),
(8, '2025_10_11_235212_create_pasiens_table', 2),
(9, '2025_10_12_000828_create_kunjungans_table', 3),
(10, '2025_10_12_003057_create_rekam_medis_table', 4),
(11, '2025_10_12_011526_create_reseps_table', 5),
(12, '2025_10_12_082154_create_obats_table', 6),
(13, '2025_10_12_084305_create_obats_table', 7),
(14, '2025_10_12_100406_create_detailreseps_table', 8),
(15, '2025_10_12_102923_create_detailreseps_table', 9),
(16, '2025_10_12_113240_create_pembayarans_table', 10),
(17, '2025_10_12_120756_create_pembayarans_table', 11),
(18, '2025_10_12_123613_remove_pasien_dan_dokter_from_pembayarans_table', 12),
(19, '2025_10_12_143014_create_laboratoria_table', 13),
(20, '2025_10_17_112514_create_abouts_table', 14),
(21, '2025_10_17_120839_create_about_us_table', 15),
(22, '2025_10_17_122356_create_about_us_table', 16),
(23, '2025_10_17_232902_create_dokter_us_table', 17),
(24, '2025_10_19_050643_create_doctors_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `obat_id` bigint UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `harga` int NOT NULL DEFAULT '0',
  `harga_beli` int NOT NULL DEFAULT '0',
  `harga_promo` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`obat_id`, `nama_obat`, `kategori`, `stok`, `harga`, `harga_beli`, `harga_promo`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', 100, 2000, 1500, 1800, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(2, 'Amoxicillin', 'Kapsul', 50, 5000, 3500, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(3, 'Vitamin C', 'Tablet', 200, 3000, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(4, 'Ibuprofen', 'Tablet', 80, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(5, 'Cefadroxil', 'Kapsul', 60, 6000, 4000, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(6, 'Cetirizine', 'Tablet', 120, 2500, 1800, 2200, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(7, 'Loratadine', 'Tablet', 150, 2800, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(8, 'Metformin', 'Tablet', 90, 4500, 3500, 4000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(9, 'Omeprazole', 'Kapsul', 70, 5500, 4000, 5000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(10, 'Simvastatin', 'Tablet', 40, 6000, 4500, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(11, 'Aspirin', 'Tablet', 100, 2000, 1500, 1800, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(12, 'Captopril', 'Tablet', 80, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(13, 'Amiodarone', 'Kapsul', 60, 7000, 5000, 1500, '2025-10-12 08:47:06', '2025-10-12 02:17:16'),
(14, 'Clarithromycin', 'Kapsul', 90, 6000, 4500, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(15, 'Ranitidine', 'Tablet', 50, 3000, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(16, 'Salbutamol', 'Sirup', 70, 3500, 2500, 3000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(17, 'Dextromethorphan', 'Sirup', 80, 3200, 2200, 2800, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(18, 'Fexofenadine', 'Tablet', 100, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(19, 'Metoclopramide', 'Tablet', 90, 2500, 1800, 2200, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(20, 'Hydrochlorothiazide', 'Tablet', 70, 3000, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(21, 'Prednisone', 'Tablet', 50, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(22, 'Clindamycin', 'Kapsul', 60, 5500, 4000, 5000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(23, 'Azithromycin', 'Kapsul', 80, 6000, 4500, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(24, 'Levocetirizine', 'Tablet', 100, 3000, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(25, 'Diclofenac', 'Tablet', 70, 3500, 2500, 3000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(26, 'Naproxen', 'Tablet', 60, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(27, 'Risperidone', 'Tablet', 40, 5000, 3500, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(28, 'Metoprolol', 'Tablet', 90, 4500, 3500, 4000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(29, 'Losartan', 'Tablet', 70, 5000, 4000, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(30, 'Furosemide', 'Tablet', 80, 3000, 2000, 2500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(31, 'Captopril', 'Tablet', 60, 3500, 2500, 3000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(32, 'Levothyroxine', 'Tablet', 50, 4500, 3500, 4000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(33, 'Pantoprazole', 'Kapsul', 70, 5000, 4000, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(34, 'Esomeprazole', 'Kapsul', 60, 5500, 4000, 5000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(35, 'Omeprazole', 'Kapsul', 80, 5000, 4000, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(36, 'Cefixime', 'Kapsul', 90, 6000, 4500, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(37, 'Cefuroxime', 'Kapsul', 70, 6500, 5000, 6000, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(38, 'Amlodipine', 'Tablet', 100, 4000, 3000, 3500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(39, 'Losartan', 'Tablet', 80, 5000, 4000, 4500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(40, 'Simvastatin', 'Tablet', 50, 6000, 4500, 5500, '2025-10-12 08:47:06', '2025-10-12 08:47:06'),
(41, 'Atorvastatin', 'Tablet', 60, 6500, 5000, 6000, '2025-10-12 08:47:06', '2025-10-12 08:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint UNSIGNED NOT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `no_rm`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `penanggung_jawab`, `created_at`, `updated_at`) VALUES
(1, 'RM001', 'Ahmad Fauzi', '1990-01-15', 'L', 'Jl. Merdeka 1, Jakarta', '081234567890', 'Siti Fauzi', NULL, NULL),
(2, 'RM002', 'Siti Aminah', '1985-03-22', 'P', 'Jl. Sudirman 12, Bandung', '081298765432', 'Budi Santoso', NULL, NULL),
(3, 'RM003', 'Budi Santoso', '1992-07-10', 'L', 'Jl. Mawar 5, Surabaya', '081234123456', 'Sari Santoso', NULL, NULL),
(4, 'RM004', 'Dewi Lestari', '1988-11-30', 'P', 'Jl. Melati 9, Yogyakarta', '081234987654', 'Agus Lestari', NULL, NULL),
(5, 'RM005', 'Agus Wijaya', '1995-02-18', 'L', 'Jl. Kenanga 3, Semarang', '081212345678', 'Dewi Wijaya', NULL, NULL),
(6, 'RM006', 'Rina Permata', '1991-06-25', 'P', 'Jl. Flamboyan 7, Malang', '081223344556', 'Hendra Permata', NULL, NULL),
(7, 'RM007', 'Hendra Saputra', '1989-12-12', 'L', 'Jl. Cempaka 8, Medan', '081234667788', 'Rina Saputra', NULL, NULL),
(8, 'RM008', 'Tina Marlina', '1993-04-05', 'P', 'Jl. Anggrek 2, Palembang', '081212366554', 'Adi Marlina', NULL, NULL),
(9, 'RM009', 'Adi Prasetyo', '1987-09-19', 'L', 'Jl. Bougenville 10, Makassar', '081234556677', 'Tina Prasetyo', NULL, NULL),
(10, 'RM010', 'Lia Novita', '1994-08-14', 'P', 'Jl. Dahlia 11, Bali', '081223344778', 'Joko Novita', NULL, NULL),
(11, 'RM011', 'Joko Susanto', '1986-05-20', 'L', 'Jl. Angsana 4, Solo', '081212345899', 'Lia Susanto', NULL, NULL),
(12, 'RM012', 'Rudi Hartono', '1990-10-01', 'L', 'Jl. Kenanga 6, Bandung', '081234112233', 'Maya Hartono', NULL, NULL),
(13, 'RM013', 'Maya Sari', '1989-03-15', 'P', 'Jl. Mawar 9, Jakarta', '081245566778', 'Rudi Sari', NULL, NULL),
(14, 'RM014', 'Eko Prabowo', '1992-12-22', 'L', 'Jl. Melati 14, Semarang', '081234778899', 'Fitri Prabowo', NULL, NULL),
(15, 'RM015', 'Fitri Anggraeni', '1991-07-30', 'P', 'Jl. Flamboyan 18, Surabaya', '081223399887', 'Eko Anggraeni', NULL, NULL),
(16, 'RM016', 'Rizki Adi', '1988-02-05', 'L', 'Jl. Cempaka 15, Medan', '081234556899', 'Nina Adi', NULL, NULL),
(17, 'RM017', 'Nina Safitri', '1993-09-10', 'P', 'Jl. Anggrek 20, Palembang', '081212477889', 'Rizki Safitri', NULL, NULL),
(18, 'RM018', 'Andi Setiawan', '1987-01-25', 'L', 'Jl. Bougenville 21, Makassar', '081234667700', 'Lina Setiawan', NULL, NULL),
(19, 'RM019', 'Lina Marlina', '1994-05-18', 'P', 'Jl. Dahlia 23, Bali', '081223344900', 'Andi Marlina', NULL, NULL),
(20, 'RM020', 'Doni Pratama', '1990-08-22', 'L', 'Jl. Angsana 25, Solo', '081212355566', 'Rina Pratama', NULL, NULL),
(21, 'RM021', 'Rina Kartika', '1992-11-12', 'P', 'Jl. Kenanga 27, Bandung', '081234445566', 'Doni Kartika', NULL, NULL),
(22, 'RM022', 'Fajar Nugroho', '1989-04-02', 'L', 'Jl. Mawar 29, Jakarta', '081223344112', 'Sari Nugroho', NULL, NULL),
(23, 'RM023', 'Sari Putri', '1991-09-05', 'P', 'Jl. Melati 31, Semarang', '081234556611', 'Fajar Putri', NULL, NULL),
(24, 'RM024', 'Hadi Susanto', '1988-06-14', 'L', 'Jl. Flamboyan 33, Surabaya', '081212366677', 'Tina Susanto', NULL, NULL),
(25, 'RM025', 'Tina Permata', '1993-12-21', 'P', 'Jl. Cempaka 35, Medan', '081234567788', 'Hadi Permata', NULL, NULL),
(26, 'RM026', 'Bayu Santoso', '1990-03-18', 'L', 'Jl. Anggrek 37, Palembang', '081223355566', 'Lia Santoso', NULL, NULL),
(27, 'RM027', 'Lia Novita', '1987-10-25', 'P', 'Jl. Bougenville 39, Makassar', '081234446677', 'Bayu Novita', NULL, NULL),
(28, 'RM028', 'Arif Hidayat', '1992-08-09', 'L', 'Jl. Dahlia 41, Bali', '081212377889', 'Maya Hidayat', NULL, NULL),
(29, 'RM029', 'Maya Sari', '1991-01-14', 'P', 'Jl. Angsana 43, Solo', '081234556677', 'Arif Sari', NULL, NULL),
(30, 'RM030', 'Wawan Prasetyo', '1988-05-20', 'L', 'Jl. Kenanga 45, Bandung', '081223344556', 'Dewi Prasetyo', NULL, NULL),
(31, 'RM031', 'Dewi Lestari', '1993-09-30', 'P', 'Jl. Mawar 47, Jakarta', '081234778899', 'Wawan Lestari', NULL, NULL),
(32, 'RM032', 'Rian Nugroho', '1990-12-12', 'L', 'Jl. Melati 49, Semarang', '081212399887', 'Nina Nugroho', NULL, NULL),
(33, 'RM033', 'Nina Anggraeni', '1989-06-18', 'P', 'Jl. Flamboyan 51, Surabaya', '081234556611', 'Rian Anggraeni', NULL, NULL),
(34, 'RM034', 'Fahmi Adi', '1992-03-22', 'L', 'Jl. Cempaka 53, Medan', '081223344778', 'Siti Adi', NULL, NULL),
(35, 'RM035', 'Siti Marlina', '1991-07-15', 'P', 'Jl. Anggrek 55, Palembang', '081234445599', 'Fahmi Marlina', NULL, NULL),
(36, 'RM036', 'Bima Santoso', '1988-11-08', 'L', 'Jl. Bougenville 57, Makassar', '081212344556', 'Rina Santoso', NULL, NULL),
(37, 'RM037', 'Rina Permata', '1993-02-25', 'P', 'Jl. Dahlia 59, Bali', '081234667788', 'Bima Permata', NULL, NULL),
(38, 'RM038', 'Taufik Hidayat', '1990-09-18', 'L', 'Jl. Angsana 61, Solo', '081223344899', 'Lia Hidayat', NULL, NULL),
(39, 'RM039', 'Lia Sari', '1987-01-30', 'P', 'Jl. Kenanga 63, Bandung', '081234556700', 'Taufik Sari', NULL, NULL),
(40, 'RM040', 'Andika Nugroho', '1992-06-14', 'L', 'Jl. Mawar 65, Jakarta', '081212355577', 'Dewi Nugroho', NULL, NULL),
(41, 'RM041', 'Dewi Anggraeni', '1991-10-10', 'P', 'Jl. Melati 67, Semarang', '081234445566', 'Andika Anggraeni', NULL, NULL),
(42, 'RM042', 'Rio Prasetyo', '1988-03-25', 'L', 'Jl. Flamboyan 69, Surabaya', '081223344788', 'Maya Prasetyo', NULL, NULL),
(43, 'RM043', 'Maya Lestari', '1993-08-05', 'P', 'Jl. Cempaka 71, Medan', '081234556899', 'Rio Lestari', NULL, NULL),
(44, 'RM044', 'Ardi Santoso', '1990-12-18', 'L', 'Jl. Anggrek 73, Palembang', '081212344899', 'Lina Santoso', NULL, NULL),
(45, 'RM045', 'Lina Permata', '1989-05-12', 'P', 'Jl. Bougenville 75, Makassar', '081234556611', 'Ardi Permata', NULL, NULL),
(46, 'RM046', 'Hendra Nugroho', '1992-07-30', 'L', 'Jl. Dahlia 77, Bali', '081223344900', 'Sari Nugroho', NULL, NULL),
(47, 'RM047', 'Sari Anggraeni', '1991-02-14', 'P', 'Jl. Angsana 79, Solo', '081234667788', 'Hendra Anggraeni', NULL, NULL),
(48, 'RM048', 'Fikri Adi', '1988-09-25', 'L', 'Jl. Kenanga 81, Bandung', '081212355566', 'Nina Adi', NULL, NULL),
(49, 'RM049', 'Nina Sari', '1993-04-18', 'P', 'Jl. Mawar 83, Jakarta', '081234445599', 'Fikri Sari', NULL, NULL),
(50, 'RM050', 'Dedi Prasetyo', '1990-01-05', 'L', 'Jl. Melati 85, Semarang', '081223344556', 'Lia Prasetyo', NULL, NULL),
(51, 'RM051', 'Lia Hidayat', '1989-08-14', 'P', 'Jl. Flamboyan 87, Surabaya', '081234667700', 'Dedi Hidayat', NULL, NULL),
(52, 'RM052', 'Riko Nugroho', '1992-11-20', 'L', 'Jl. Cempaka 89, Medan', '081212344778', 'Maya Nugroho', NULL, NULL),
(53, 'RM053', 'Maya Anggraeni', '1991-03-12', 'P', 'Jl. Anggrek 91, Palembang', '081234556677', 'Riko Anggraeni', NULL, NULL),
(54, 'RM054', 'Bayu Adi', '1988-07-05', 'L', 'Jl. Bougenville 93, Makassar', '081223344889', 'Siti Adi', NULL, NULL),
(55, 'RM055', 'Siti Lestari', '1993-10-18', 'P', 'Jl. Dahlia 95, Bali', '081234445566', 'Bayu Lestari', NULL, NULL),
(56, 'RM056', 'Reza Santoso', '1990-05-22', 'L', 'Jl. Angsana 97, Solo', '081212355577', 'Dewi Santoso', NULL, NULL),
(57, 'RM057', 'Dewi Permata', '1989-12-30', 'P', 'Jl. Kenanga 99, Bandung', '081234556688', 'Reza Permata', NULL, NULL),
(58, 'RM058', 'Fadli Hidayat', '1992-06-15', 'L', 'Jl. Mawar 101, Jakarta', '081223344899', 'Lina Hidayat', NULL, NULL),
(59, 'RM059', 'Lina Sari', '1991-09-25', 'P', 'Jl. Melati 103, Semarang', '081234556700', 'Fadli Sari', NULL, NULL),
(60, 'RM060', 'Rizky Nugroho', '1988-02-18', 'L', 'Jl. Flamboyan 105, Surabaya', '081212344899', 'Maya Nugroho', NULL, NULL),
(61, 'RM061', 'Unnikke Rahmawati', '1998-08-10', 'P', 'Tambun Selatan', '083456543454', 'Amidah', '2025-10-11 17:06:07', '2025-10-11 17:06:07');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `pembayaran_id` bigint UNSIGNED NOT NULL,
  `kunjungan_id` bigint UNSIGNED NOT NULL,
  `total_tagihan` decimal(12,2) NOT NULL,
  `metode_bayar` enum('cash','BPJS','asuransi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','lunas','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `tanggal_bayar` datetime DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`pembayaran_id`, `kunjungan_id`, `total_tagihan`, `metode_bayar`, `status`, `tanggal_bayar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '150000.00', 'cash', 'lunas', '2025-10-01 08:30:00', 'Pembayaran pertama', NULL, NULL),
(2, 2, '200000.00', 'BPJS', 'pending', NULL, 'Belum dibayar', NULL, NULL),
(3, 3, '175000.00', 'asuransi', 'lunas', '2025-10-01 10:30:00', 'Sudah dibayar', NULL, NULL),
(4, 4, '250000.00', 'cash', 'dibatalkan', '2025-10-01 11:45:00', 'Dibatalkan pasien', NULL, NULL),
(5, 5, '300000.00', 'BPJS', 'lunas', '2025-10-01 12:30:00', 'Pembayaran lunas', NULL, NULL),
(6, 1, '180000.00', 'asuransi', 'pending', NULL, 'Belum dibayar', NULL, NULL),
(7, 2, '220000.00', 'cash', 'lunas', '2025-10-02 09:15:00', 'Pembayaran diterima', NULL, NULL),
(8, 3, '160000.00', 'BPJS', 'lunas', '2025-10-02 10:20:00', 'Pembayaran lunas', NULL, NULL),
(9, 4, '210000.00', 'cash', 'pending', NULL, 'Belum dibayar', NULL, NULL),
(10, 5, '230000.00', 'asuransi', 'lunas', '2025-10-02 12:00:00', 'Pembayaran selesai', NULL, NULL),
(11, 1, '190000.00', 'BPJS', 'lunas', '2025-10-03 08:45:00', 'Lunas', NULL, NULL),
(12, 2, '200000.00', 'cash', 'pending', NULL, 'Menunggu pembayaran', NULL, NULL),
(13, 3, '175000.00', 'asuransi', 'dibatalkan', '2025-10-03 10:50:00', 'Pasien membatalkan', NULL, NULL),
(14, 4, '250000.00', 'cash', 'lunas', '2025-10-03 11:55:00', 'Sudah dibayar', NULL, NULL),
(15, 5, '300000.00', 'BPJS', 'pending', NULL, 'Belum dibayar', NULL, NULL),
(16, 1, '150000.00', 'cash', 'lunas', '2025-10-04 08:10:00', 'Pembayaran diterima', NULL, NULL),
(17, 2, '200000.00', 'BPJS', 'lunas', '2025-10-04 09:25:00', 'Lunas', NULL, NULL),
(18, 3, '175000.00', 'asuransi', 'pending', NULL, 'Belum dibayar', NULL, NULL),
(19, 4, '250000.00', 'cash', 'lunas', '2025-10-04 11:40:00', 'Pembayaran lunas', NULL, NULL),
(20, 5, '300000.00', 'BPJS', 'dibatalkan', '2025-10-04 12:50:00', 'Dibatalkan pasien', NULL, NULL),
(21, 1, '230000.00', 'asuransi', 'pending', '2025-10-12 19:35:00', 'Pembayaran', '2025-10-12 05:36:46', '2025-10-12 05:36:46'),
(22, 1, '4300000.00', 'BPJS', 'pending', '2025-10-12 19:56:00', 'pembayaran', '2025-10-12 05:56:19', '2025-10-12 05:56:19'),
(23, 2, '240000.00', 'cash', 'pending', NULL, 'lunas', '2025-10-12 06:01:42', '2025-10-12 06:09:59'),
(24, 6, '120000.00', 'cash', 'pending', NULL, 'Lunas', '2025-10-12 06:04:40', '2025-10-15 06:22:54'),
(25, 11, '500000.00', 'BPJS', 'lunas', '2025-10-13 20:41:00', 'Pembayaran BPJS', '2025-10-12 06:17:11', '2025-10-12 06:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `rekam_id` bigint UNSIGNED NOT NULL,
  `kunjungan_id` bigint UNSIGNED NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_dokter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`rekam_id`, `kunjungan_id`, `diagnosa`, `tindakan`, `catatan_dokter`, `created_at`, `updated_at`) VALUES
(1, 1, 'Flu Ringan Berat', 'Pemberian obat flu', 'Pasien disarankan istirahat', '2025-10-12 00:38:38', '2025-10-11 17:51:09'),
(2, 2, 'Demam tinggi', 'Pemberian parasetamol', 'Pantau suhu pasien', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(3, 3, 'Batuk kronis', 'Terapi inhalasi', 'Pasien harus kontrol 1 minggu', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(4, 4, 'Sakit kepala', 'Pemberian analgesik', 'Hindari stres berlebihan', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(5, 5, 'Nyeri lambung', 'Pemberian antasida', 'Makan teratur', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(6, 6, 'Hipertensi', 'Pemberian obat tekanan darah', 'Kontrol rutin setiap bulan', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(7, 7, 'Diabetes tipe 2', 'Pemberian insulin', 'Pantau gula darah', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(8, 8, 'Asma ringan', 'Inhaler', 'Hindari pemicu alergi', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(9, 9, 'Infeksi saluran kemih', 'Antibiotik', 'Minum air putih cukup', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(10, 10, 'Alergi kulit', 'Salep antihistamin', 'Hindari kontak dengan alergen', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(11, 11, 'Sakit gigi', 'Pemberian obat pereda nyeri', 'Kontrol ke dokter gigi', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(12, 12, 'Mata merah', 'Tetes mata antibiotik', 'Hindari mengucek mata', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(13, 13, 'Infeksi telinga', 'Antibiotik oral', 'Pantau demam pasien', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(14, 14, 'Flu berat', 'Obat flu dan vitamin', 'Istirahat cukup', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(15, 15, 'Radang tenggorokan', 'Obat kumur antiseptik', 'Minum air hangat', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(16, 16, 'Nyeri punggung', 'Terapi fisik', 'Hindari angkat berat', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(17, 17, 'Sakit perut', 'Pemberian antasida', 'Pantau gejala', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(18, 18, 'Infeksi kulit', 'Salep antibiotik', 'Jaga kebersihan kulit', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(19, 19, 'Migrain', 'Obat pereda nyeri', 'Istirahat di ruangan gelap', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(20, 20, 'Cacar air', 'Obat gatal', 'Hindari menggaruk', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(21, 21, 'Flu ringan', 'Obat flu', 'Istirahat cukup', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(22, 22, 'Demam tinggi', 'Paracetamol', 'Kontrol jika demam > 3 hari', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(23, 23, 'Batuk', 'Sirup batuk', 'Minum air hangat', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(24, 24, 'Sakit kepala', 'Obat pereda nyeri', 'Hindari stres', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(25, 25, 'Nyeri lambung', 'Antasida', 'Hindari makanan pedas', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(26, 26, 'Hipertensi', 'Obat darah tinggi', 'Kontrol rutin', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(27, 27, 'Diabetes tipe 2', 'Obat diabetes', 'Pantau gula darah', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(28, 28, 'Asma ringan', 'Inhaler', 'Hindari alergi', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(29, 29, 'Infeksi saluran kemih', 'Antibiotik', 'Minum air banyak', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(30, 30, 'Alergi kulit', 'Salep', 'Hindari alergen', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(31, 31, 'Sakit gigi', 'Obat nyeri', 'Kontrol gigi', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(32, 32, 'Mata merah', 'Tetes mata', 'Hindari mengucek', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(33, 33, 'Infeksi telinga', 'Antibiotik', 'Pantau demam', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(34, 34, 'Flu berat', 'Obat flu', 'Istirahat cukup', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(35, 35, 'Radang tenggorokan', 'Obat kumur', 'Minum air hangat', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(36, 36, 'Nyeri punggung', 'Terapi fisik', 'Hindari angkat berat', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(37, 37, 'Sakit perut', 'Antasida', 'Pantau gejala', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(38, 38, 'Infeksi kulit', 'Salep antibiotik', 'Jaga kebersihan', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(39, 39, 'Migrain', 'Obat nyeri', 'Istirahat di ruangan gelap', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(40, 40, 'Cacar air', 'Obat gatal', 'Hindari menggaruk', '2025-10-12 00:38:38', '2025-10-12 00:38:38'),
(41, 41, 'Flu Ringan', 'Pemberian obat flu Ringan', 'Pasien disarankan istirahat', '2025-10-11 17:52:30', '2025-10-11 17:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `reseps`
--

CREATE TABLE `reseps` (
  `resep_id` bigint UNSIGNED NOT NULL,
  `rekam_id` bigint UNSIGNED NOT NULL,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `tanggal_resep` date NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseps`
--

INSERT INTO `reseps` (`resep_id`, `rekam_id`, `dokter_id`, `tanggal_resep`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-10-01', 'Periksa tekanan darah setiap hari', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(2, 2, 2, '2025-10-02', 'Minum obat X 2 kali sehari', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(3, 3, 3, '2025-10-03', 'Istirahat cukup dan hindari stres', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(4, 4, 4, '2025-10-04', 'Konsumsi makanan rendah garam', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(5, 5, 5, '2025-10-05', 'Rutin kontrol mingguan', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(6, 6, 1, '2025-10-06', 'Minum vitamin C 500mg', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(7, 7, 2, '2025-10-07', 'Hindari makanan pedas', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(8, 8, 3, '2025-10-08', 'Cuci tangan sebelum makan', '2025-10-12 01:54:32', '2025-10-12 01:54:32'),
(9, 9, 4, '2025-10-09', 'Lakukan senam ringan 1 jm 30 menit', '2025-10-12 01:54:32', '2025-10-12 01:05:40'),
(10, 1, 5, '2025-10-10', 'Catat gejala harian', '2025-10-12 01:54:32', '2025-10-11 23:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$Y3LAU/Rrqn8SFwlSe04CFejitTsGhkLs2b/8fzf5h5jvJYOaKi.1m', 'admin', NULL, '2025-10-11 16:34:08', '2025-10-11 16:34:08'),
(2, 'User', 'user@gmail.com', NULL, '$2y$12$/3AI3yWUlCsKwRzDCKf6J.OOl10kb/F50QawBo09tt5IfhONFy14G', 'user', NULL, '2025-10-11 16:34:08', '2025-10-11 16:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailreseps`
--
ALTER TABLE `detailreseps`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detailreseps_resep_id_foreign` (`resep_id`),
  ADD KEY `detailreseps_obat_id_foreign` (`obat_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokters_dokter_id_unique` (`dokter_id`),
  ADD UNIQUE KEY `dokters_no_str_unique` (`no_str`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kunjungans`
--
ALTER TABLE `kunjungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kunjungans_pasien_id_foreign` (`pasien_id`),
  ADD KEY `kunjungans_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasiens_no_rm_unique` (`no_rm`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayarans_kunjungan_id_foreign` (`kunjungan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`rekam_id`),
  ADD KEY `rekam_medis_kunjungan_id_foreign` (`kunjungan_id`);

--
-- Indexes for table `reseps`
--
ALTER TABLE `reseps`
  ADD PRIMARY KEY (`resep_id`),
  ADD KEY `reseps_rekam_id_foreign` (`rekam_id`),
  ADD KEY `reseps_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detailreseps`
--
ALTER TABLE `detailreseps`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kunjungans`
--
ALTER TABLE `kunjungans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `obat_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `pembayaran_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `rekam_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reseps`
--
ALTER TABLE `reseps`
  MODIFY `resep_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailreseps`
--
ALTER TABLE `detailreseps`
  ADD CONSTRAINT `detailreseps_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`obat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailreseps_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`resep_id`) ON DELETE CASCADE;

--
-- Constraints for table `kunjungans`
--
ALTER TABLE `kunjungans`
  ADD CONSTRAINT `kunjungans_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungans_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_kunjungan_id_foreign` FOREIGN KEY (`kunjungan_id`) REFERENCES `kunjungans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_kunjungan_id_foreign` FOREIGN KEY (`kunjungan_id`) REFERENCES `kunjungans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reseps`
--
ALTER TABLE `reseps`
  ADD CONSTRAINT `reseps_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reseps_rekam_id_foreign` FOREIGN KEY (`rekam_id`) REFERENCES `rekam_medis` (`rekam_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
