-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `cover_buku`, `judul`, `penulis`, `sinopsis`, `tahun_terbit`, `stok`, `kategori_id`, `penerbit_id`, `isbn`) VALUES
(1, '16483432051.jpg', 'Cloud Computing Security Foundations and Challanger', 'John R Vacca', 'This handbook offers a comprehensive overview of cloud computing security technology and implementation, while exploring practical solutions to a wide range of cloud computing security issues. With more organizations using cloud computing and cloud providers for data operations, proper security in these and other potentially vulnerable areas have become a priority for organizations of all sizes across the globe. Research efforts from both academia and industry in all security aspects related to cloud computing are gathered within one reference guide.', '2014', 100, 1, 1, '1230910132'),
(2, '16483432872.jpg', 'Smart City beserta Cloud Computing Dan Teknologi - Teknologi Pendukung Lainnya', 'I Putu Agus Eka Pratama', 'Memahami teknologi-teknologi pendukung Smart City dan beberapa teknologi yang mengawali Cloud Computing: Grid Computing, Cluster Computing, Green Computing, Augmented Reality, RFID, Near Field Communication, Internet Of Things/Machine To Machine. Cloud Computing adalah salah satu kunci utama penerapan Smart City. Maka disediakan praktek langsung pada buku ini tentang Cloud Computing sederhana di komputer anda memanfaatkan sistem operasi Linux dan aplikasi-aplikasi open source, seperti: Eye OS, Owncloud, Sugar CRM, dan Phreedom. Bonus DVD memuat file iso Linux IGOS Nusantara, XAMPP Linux, Eye OS, Owncloud, Sugar CRM, dan Phreedom. Materi yang dibahas : Mengenal Cloud Computing Mengenal Smart City Teknologi Pendukung Cloud Computing dan Smart City Hubungan Antara Cloud Computing dan Smart City Praktek: Cloud Computing Praktek: Install XAMPP Linux Beberapa Perintah Dasar di Linux (Pelengkap Praktek) Instalasi Linux IGOS Nusantara (Pelengkap Praktek) Koneksi Internet di Linux (Pelengkap Praktek http://katalogbiobses.com/buku-smart_city_beserta_cloud_computing_dan_teknologi_teknologi_pendukung_lainnya_+dvd-7479.html', '2009', 60, 1, 2, '2189319237912'),
(3, '16483433953.jpg', 'Cloud Computing and ROI', 'Sanjay Mohaprata dan Laxmikant Lokhande', 'Many businesses have addressed emerging trends through actions to drive cost reduction and leverage IT service providers’ adoption of cloud-style services. Many industry organizations and leading IT suppliers of software, hardware, and services, seeking to address their customer needs, have vigorously evaluated and followed a cloud-style strategy. The challenges and issues are in the transition from the current traditional IT to the new potential capabilities of cloud computing. They must be expressed in a language that end users can understand, and relate to investment, cost improvements, or business performance.\r\n\r\nReturn on Investment (ROI) is perhaps the most widely used measure of financial success in business. If you have a proposal to use cloud computing in place of in-house IT, this is how you and others will want to assess it. How do you do this? What are the qualities of cloud computing that affect ROI?\r\n\r\nROI is the proportionate increase in the value of an investment over a period of time. It can be measured in a variety of different ways, but there are just four basic ways to improve it: decrease the investment, increase revenue, decrease costs, and make the return faster. Using cloud computing, you can achieve any of these; but you cannot achieve them all at the same time.\r\n\r\nIt is the relationship between the factors that counts, rather than the absolute values. If you move to public cloud, you generally decrease investment but increase cost. With private cloud, it is the other way round. You can improve or worsen ROI either way, depending on your revenue and speed of return. Revenue can be increased by improving the delivered features and quality – which enable a higher price to be charged – or by operating on a larger scale. But improvements in features, quality, and scale generally also mean higher costs. You must get the balance right.\r\n\r\nJust looking at cloud computing from a technical infrastructure point of view is potentially missing the wider picture of the impact of technology on the business. Overall, what matters is defining the value to business. Value can be defined in many ways. It does not just mean the financial values, but can also mean customer value, seller value, broker value, market brand value, and corporate value. These aspects should not be neglected.\r\n\r\nHow does cloud computing contribute to ROI? There are a number of fundamental drivers that impact on investment, revenue, cost, and timing that can be positively influenced by using cloud services. They relate to productivity, speed, size, and quality. This chapter describes how each of these drivers contributes to ROI, and shows how to use them to compare cloud and traditional IT solutions, and how to monitor them to maintain and build ROI from cloud computing.', '2012', 100, 1, 3, '1289317239'),
(4, '16483434674.jpg', 'Cloud Computing for Optimization: Foundations, Applications, and Challanges', 'Bhabani Shankar Prasad Mishra', 'Bhabani Shankar Prasad MishraHimansu DasSatchidananda DehuriAlok Kumar Jagadev\r\n    Includes recent research on cloud computing for optimization\r\n    Presents the state-of-the-art computing paradigms and advances in applications\r\n\r\n    Proposes future directions for both the theories and applications of optimization techniques in cloud computing in various fields\r\n\r\n    Highlights the methodologies for optimizing resource utilization, make-span, and energy consumption in cloud environment', '2015', 90, 3, 2, '82348762842'),
(5, '16483435635.jpg', 'Auditing Cloud Computing', 'Ben Halpert', 'Many organizations are reporting or projecting a significant cost savings through the use of cloud computing—utilizing shared computing resources to provide ubiquitous access for organizations and end users. Just as many organizations, however, are expressing concern with security and privacy issues for their organization\'s data in the \"cloud.\" Auditing Cloud Computing provides necessary guidance to build a proper audit to ensure operational integrity and customer data protection, among other aspects, are addressed for cloud based resources.\r\n\r\n    Provides necessary guidance to ensure auditors address security and privacy aspects that through a proper audit can provide a specified level of assurance for an organization\'s resources\r\n    Reveals effective methods for evaluating the security and privacy practices of cloud services\r\n    A cloud computing reference for auditors and IT security professionals, as well as those preparing for certification credentials, such as Certified Information Systems Auditor (CISA)\r\n\r\nTimely and practical, Auditing Cloud Computing expertly provides information to assist in preparing for an audit addressing cloud computing security and privacy for both businesses and cloud based service providers.', '2017', 120, 2, 2, '89123791232'),
(6, '16483436306.jpg', 'Advances in Mobile Cloud Computing Systems', 'F. Richard Yu', 'With recent advances in mobile communication technologies, more and more people are accessing cloud computing systems using mobile devices, such as smartphones and tablets. Unlike traditional mobile computing systems with limited capabilities, mobile cloud computing uses the powerful computing and storage resources available in the cloud to provide cutting-edge multimedia and information services. This book discusses the major research advances in mobile cloud computing systems. Contributed chapters from leading experts in this field cover different aspects of modeling, analysis, design, optimization, and architecture of mobile cloud computing systems.', '2019', 20, 3, 3, '90234927823');

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Cloud'),
(2, 'Security'),
(3, 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota_peminjaman` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `kode_member`, `nama`, `alamat`, `no`, `kuota_peminjaman`, `created_at`, `updated_at`) VALUES
(1, 'MK204', 'Tsaqif', 'Nganjuk', '082133473078', 3, '2022-03-26 18:14:02', '2022-03-26 18:14:02'),
(2, 'MK15931', 'Wifqo', 'Bani Umar', '2131023802', 3, '2022-03-26 18:14:13', '2022-03-26 18:14:13'),
(3, 'MK21344', 'Sabda', 'Jombang', '123193123132', 3, '2022-03-26 18:14:22', '2022-03-26 18:14:22');

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
(5, '2022_02_16_002637_create_member_table', 1),
(6, '2022_02_16_004501_create_kategori_table', 1),
(7, '2022_02_16_004511_create_penerbit_table', 1),
(8, '2022_02_16_005259_create_buku_table', 1),
(9, '2022_02_16_005557_create_peminjaman_buku_table', 1),
(10, '2022_03_27_011824_add_isbn_to_buku', 2);

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
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `tgl_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kembali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `lokasi`) VALUES
(1, 'Suka Terbit', 'Malang'),
(2, 'Buku Buku', 'Jakarta'),
(3, 'Duta Buku', 'Yogyakarta');

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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `isAdmin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.org', NULL, '$2y$10$mYdPdImR085BuZNdGZB5VOCkz9GDcpinUqEsQQizgk/HFcx5RXkzO', NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_kategori_id_index` (`kategori_id`),
  ADD KEY `buku_penerbit_id_index` (`penerbit_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_kode_member_unique` (`kode_member`);

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
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_buku_member_id_index` (`member_id`),
  ADD KEY `peminjaman_buku_buku_id_index` (`buku_id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_penerbit_id_foreign` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_buku_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
