CREATE TABLE `aktivitas` (
  `aktivitas_id` int(11) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`aktivitas_id`, `jurusan`, `judul`, `start_date`, `end_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'AE', 'ta_1', '2024-11-20', '2024-12-18', 'aktif', 1, '2024-11-20 11:21:32', '2024-11-20 11:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_mahasiswa`
--

CREATE TABLE `aktivitas_mahasiswa` (
  `aktivitas_mahasiswa_id` int(11) NOT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `status_daftar` enum('terdaftar','tidak terdaftar') NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas_mahasiswa`
--

INSERT INTO `aktivitas_mahasiswa` (`aktivitas_mahasiswa_id`, `aktivitas_id`, `mahasiswa_id`, `status_daftar`, `tanggal_daftar`) VALUES
(1, 2, 1, 'tidak terdaftar', '2024-11-20 11:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `bimbingan_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `status` enum('selesai','menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `dokumen_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `tipe_dokumen` enum('proposal','laporan','revisi') NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('disetujui','ditolak','menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `tanggal_penugasan` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('pembimbing utama','pembimbing pendamping') NOT NULL,
  `is_reviewer` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `type` enum('seminar','sidang') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `status` enum('dijadwalkan','selesai','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `NIM` varchar(20) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `aktif_semester` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `user_id`, `NIM`, `jurusan`, `aktif_semester`, `created_at`, `updated_at`) VALUES
(1, 2, '3086', 'AE', '3', '2024-11-20 11:22:37', '2024-11-20 11:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '0001_01_01_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `penguji_id` int(11) DEFAULT NULL,
  `jumlah` decimal(5,2) NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `penguji_id` int(11) NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `is_primary_dosen` tinyint(1) DEFAULT 0,
  `role` enum('penguji utama','penguji pendamping') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `proposal_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `abstract` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` enum('disetujui','ditolak','menunggu') NOT NULL,
  `tanggal_penyerahan` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewed_by` int(11) DEFAULT NULL,
  `review_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `registrasi_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tanggal_registrasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('disetujui','ditolak') NOT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PeIymz7ERXSgybINMbvdNH5FzqAVp7wd0uo8EM9u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3BHM3JtWFA4N1VtSXFES1YxY3BjSnhoWHRFUzNXMEJMVmdlSkp4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvYWt0aXZpdGFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732103379);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','koordinator','dosen','mahasiswa','panel_penguji') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ulwan', '1234', 'email', 'admin', '2024-11-20 11:20:41', '2024-11-20 11:20:41'),
(2, 'shacio', '1234', 'dirgam@gmail.com', 'mahasiswa', '2024-11-20 11:22:05', '2024-11-20 11:22:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`aktivitas_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `aktivitas_mahasiswa`
--
ALTER TABLE `aktivitas_mahasiswa`
  ADD PRIMARY KEY (`aktivitas_mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`bimbingan_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`dokumen_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `penguji_id` (`penguji_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`penguji_id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`),
  ADD KEY `reviewed_by` (`reviewed_by`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`registrasi_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`),
  ADD KEY `verified_by` (`verified_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `aktivitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aktivitas_mahasiswa`
--
ALTER TABLE `aktivitas_mahasiswa`
  MODIFY `aktivitas_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `bimbingan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `dokumen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `penguji_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `registrasi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `aktivitas_mahasiswa`
--
ALTER TABLE `aktivitas_mahasiswa`
  ADD CONSTRAINT `aktivitas_mahasiswa_ibfk_1` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`),
  ADD CONSTRAINT `aktivitas_mahasiswa_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`);

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `bimbingan_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`),
  ADD CONSTRAINT `bimbingan_ibfk_3` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `dokumen_ibfk_2` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`),
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`penguji_id`) REFERENCES `penguji` (`penguji_id`);

--
-- Constraints for table `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `penguji_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `proposals_ibfk_2` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`),
  ADD CONSTRAINT `proposals_ibfk_3` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`),
  ADD CONSTRAINT `registrasi_ibfk_2` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`aktivitas_id`),
  ADD CONSTRAINT `registrasi_ibfk_3` FOREIGN KEY (`verified_by`) REFERENCES `users` (`user_id`);
COMMIT;
