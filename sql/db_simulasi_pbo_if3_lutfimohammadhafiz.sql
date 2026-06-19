-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:36 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_if3_lutfimohammadhafiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMA Negeri 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Jakarta', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMA Negeri 2 Bandung', 78.00, 250000.00, 'Reguler', 'Sistem Informasi', 'Bandung', NULL, NULL, NULL, NULL),
(3, 'Citra Dewi', 'SMA Negeri 3 Surabaya', 92.30, 250000.00, 'Reguler', 'Teknik Elektro', 'Surabaya', NULL, NULL, NULL, NULL),
(4, 'Dian Pratama', 'SMA Negeri 1 Medan', 70.50, 250000.00, 'Reguler', 'Manajemen', 'Medan', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMA Negeri 2 Yogyakarta', 88.70, 250000.00, 'Reguler', 'Psikologi', 'Yogyakarta', NULL, NULL, NULL, NULL),
(6, 'Farhan Ramadhan', 'SMA Negeri 1 Makassar', 75.20, 250000.00, 'Reguler', 'Teknik Sipil', 'Makassar', NULL, NULL, NULL, NULL),
(7, 'Gita Rahayu', 'SMA Negeri 3 Semarang', 81.90, 250000.00, 'Reguler', 'Akuntansi', 'Semarang', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMA Negeri 1 Jakarta', 95.00, 250000.00, 'Prestasi', 'Teknik Informatika', 'Jakarta', 'Olimpiade Komputer', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMA Negeri 2 Bandung', 93.50, 250000.00, 'Prestasi', 'Matematika', 'Bandung', 'Olimpiade Matematika', 'Provinsi', NULL, NULL),
(10, 'Joko Susilo', 'SMA Negeri 3 Surabaya', 97.20, 250000.00, 'Prestasi', 'Fisika', 'Surabaya', 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMA Negeri 1 Medan', 90.80, 250000.00, 'Prestasi', 'Kimia', 'Medan', 'Olimpiade Kimia', 'Provinsi', NULL, NULL),
(12, 'Lukman Hakim', 'SMA Negeri 2 Yogyakarta', 89.30, 250000.00, 'Prestasi', 'Biologi', 'Yogyakarta', 'Olimpiade Biologi', 'Nasional', NULL, NULL),
(13, 'Maya Anggraini', 'SMA Negeri 1 Makassar', 86.70, 250000.00, 'Prestasi', 'Ekonomi', 'Makassar', 'Olimpiade Ekonomi', 'Provinsi', NULL, NULL),
(14, 'Nanda Pratama', 'SMA Negeri 3 Semarang', 94.10, 250000.00, 'Prestasi', 'Teknik Elektro', 'Semarang', 'Olimpiade Elektro', 'Nasional', NULL, NULL),
(15, 'Oscar Simanjuntak', 'SMA Negeri 1 Jakarta', 82.00, 250000.00, 'Kedinasan', 'Administrasi Publik', 'Jakarta', NULL, NULL, 'SK-001/2024', 'Kementerian Dalam Negeri'),
(16, 'Putri Nabila', 'SMA Negeri 2 Bandung', 79.50, 250000.00, 'Kedinasan', 'Hubungan Internasional', 'Bandung', NULL, NULL, 'SK-002/2024', 'Kementerian Luar Negeri'),
(17, 'Rizky Fadillah', 'SMA Negeri 3 Surabaya', 84.30, 250000.00, 'Kedinasan', 'Ilmu Hukum', 'Surabaya', NULL, NULL, 'SK-003/2024', 'Kementerian Hukum'),
(18, 'Siti Aisyah', 'SMA Negeri 1 Medan', 76.80, 250000.00, 'Kedinasan', 'Ekonomi Pembangunan', 'Medan', NULL, NULL, 'SK-004/2024', 'Kementerian Keuangan'),
(19, 'Taufik Hidayat', 'SMA Negeri 2 Yogyakarta', 80.20, 250000.00, 'Kedinasan', 'Ilmu Politik', 'Yogyakarta', NULL, NULL, 'SK-005/2024', 'Kementerian Koordinator Politik'),
(20, 'Umi Kalsum', 'SMA Negeri 1 Makassar', 77.50, 250000.00, 'Kedinasan', 'Sosiologi', 'Makassar', NULL, NULL, 'SK-006/2024', 'Kementerian Sosial');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
