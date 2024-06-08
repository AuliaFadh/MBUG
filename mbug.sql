-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 06:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbug`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `id_beasiswa` int(3) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tahun_penerimaan` varchar(4) NOT NULL,
  `status_beasiswa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`id_beasiswa`, `jenis`, `asal`, `tahun_penerimaan`, `status_beasiswa`) VALUES
(1, 'KARTU INDONESIA PINTAR KULIAH(KIPK)', 'KEMENDIKBUD', '2021', 1),
(17, 'Beasiswa LIPI', 'Pemerintah', '2022', 1),
(18, '-', '-', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akademik`
--

CREATE TABLE `laporan_akademik` (
  `id_akademik` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun_ajaran` varchar(13) NOT NULL,
  `ipk` float NOT NULL,
  `ipk_lokal` float NOT NULL,
  `ipk_uu` float NOT NULL,
  `rangkuman_nilai` varchar(255) DEFAULT NULL,
  `konf_ket_akademik` varchar(200) DEFAULT NULL,
  `konfirmasi_akademik` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_akademik`
--

INSERT INTO `laporan_akademik` (`id_akademik`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `ipk`, `ipk_lokal`, `ipk_uu`, `rangkuman_nilai`, `konf_ket_akademik`, `konfirmasi_akademik`) VALUES
(1, 1, 1, 6, 'ATA 2022/2023', 3.93, 3.91, 4, '1692897903_910b004fd3c8d3d0a589.pdf', NULL, 0),
(2, 1, 1, 5, 'ATA 2023/2024', 4, 4, 4, '1717600725_64e67d3716770ed67774.pdf', NULL, 2),
(4, 1, 4, 4, 'ATA 2021/2022', 3.5, 3, 4, '1692847785_07f8b275b22cd39df515.pdf', NULL, 2),
(5, 17, 1, 8, 'PTA 2023/2024', 4, 4, 4, '1717598173_c3bb8583207ead478b0f.pdf', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keaktifan`
--

CREATE TABLE `laporan_keaktifan` (
  `id_keaktifan` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun_ajaran` varchar(13) NOT NULL,
  `krs` varchar(255) DEFAULT NULL,
  `jumlah_ditagihkan` int(11) NOT NULL,
  `jumlah_potongan` int(11) NOT NULL,
  `blanko_pembayaran` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_keaktifan` tinyint(1) NOT NULL,
  `konf_ket_keaktifan` varchar(200) DEFAULT NULL,
  `konfirmasi_keaktifan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_keaktifan`
--

INSERT INTO `laporan_keaktifan` (`id_keaktifan`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `krs`, `jumlah_ditagihkan`, `jumlah_potongan`, `blanko_pembayaran`, `bukti_pembayaran`, `status_keaktifan`, `konf_ket_keaktifan`, `konfirmasi_keaktifan`) VALUES
(1, 1, 1, 6, 'PTA 2023/2024', '1717601345_d86a9b78658c5572f041.pdf', 11000000, 10000000, '1717601345_6f4dbb06af31b8be4ee1.pdf', '1717601345_4e47edf8aa5281dd078f.pdf', 1, NULL, 2),
(2, 17, 4, 6, 'PTA 2022/2023', 'ATA.pdf', 8000000, 4000000, 'ATA.pdf', 'ATA.pdf', 1, NULL, 2),
(3, 17, 1, 4, 'ATA 2021/2022', '1692865568_151a7909860328b5c7a2.pdf', 10000000, 6000000, '1692865568_4084607a77ac6a271e42.pdf', '1692865568_aabdcf12683eaa66a763.pdf', 1, NULL, 1),
(4, 1, 1, 3, 'PTA 2021/2022', '1692865896_e80f30f80d2447665486.pdf', 11680000, 0, '1692865896_3859679e8a0f73abed92.pdf', '1692865896_1c7b18eca5bcf197aac8.pdf', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_mbkm`
--

CREATE TABLE `laporan_mbkm` (
  `id_mbkm` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `nama_mbkm` varchar(100) NOT NULL,
  `jenis_mbkm` varchar(100) NOT NULL,
  `periode` int(4) NOT NULL,
  `keterangan_mbkm` varchar(255) DEFAULT NULL,
  `konf_ket_mbkm` varchar(200) DEFAULT NULL,
  `konfirmasi_mbkm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_mbkm`
--

INSERT INTO `laporan_mbkm` (`id_mbkm`, `id_beasiswa`, `id_penerima`, `nama_mbkm`, `jenis_mbkm`, `periode`, `keterangan_mbkm`, `konf_ket_mbkm`, `konfirmasi_mbkm`) VALUES
(1, 1, 1, 'Bangkit Academy 2023', 'Studi/Proyek Independen', 2023, 'Lulus Machine learning Path', NULL, 0),
(2, 17, 1, 'Bangkit Academy 2023', 'Studi/Proyek Independen', 2021, '--', NULL, 1),
(3, 18, 1, 'Bangkit Academy 2024', 'Studi/Proyek Independen', 2024, 'Lulus Mobile Development Path', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_prestasi`
--

CREATE TABLE `laporan_prestasi` (
  `id_prestasi` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `jenis_prestasi` tinyint(1) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `capaian` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `bukti_prestasi` varchar(255) DEFAULT NULL,
  `publikasi` varchar(255) NOT NULL,
  `konf_ket_prestasi` varchar(200) DEFAULT NULL,
  `konfirmasi_prestasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_prestasi`
--

INSERT INTO `laporan_prestasi` (`id_prestasi`, `id_beasiswa`, `id_penerima`, `tingkat`, `jenis_prestasi`, `nama_kegiatan`, `capaian`, `tempat`, `tanggal_mulai`, `tanggal_selesai`, `penyelenggara`, `bukti_prestasi`, `publikasi`, `konf_ket_prestasi`, `konfirmasi_prestasi`) VALUES
(1, 18, 1, 'Internasional', 0, 'Bangkit Academy 2023', 'Finalis', 'Rumah', '2024-06-07', '2024-06-09', 'Google, GoTo, Traveloka', '1717597260_b94feee346ed4657f456.pdf', 'https://www.google.com/', NULL, 2),
(4, 1, 1, 'Nasional', 0, 'Bangkit Academy 2023', 'Partisipatif', 'Rumah', '2023-08-20', '2023-08-20', 'Traveloka', '-', 'https://www.google.com/', NULL, 1),
(5, 1, 4, 'Provinsi', 0, 'Magang Mandiri', 'Lainnya', 'Rumah', '2023-08-18', '2023-08-19', 'Isa', '-', 'https://www.google.com/', NULL, 1),
(6, 18, 1, 'Nasional', 0, 'Bangkit Academy 2024', 'Partisipatif', 'Gedung D', '2023-08-23', '2023-08-24', 'Traveloka', '-', 'https://www.google.com/', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `link_gform`
--

CREATE TABLE `link_gform` (
  `id_lgf` int(10) NOT NULL,
  `nama_form` varchar(100) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `tautan` varchar(100) NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_gform`
--

INSERT INTO `link_gform` (`id_lgf`, `nama_form`, `id_beasiswa`, `tautan`, `tanggal_pembuatan`) VALUES
(1, 'Pendataan Peserta KIPK', 1, 'https://docs.google.com/forms', '2023-07-20'),
(2, 'Feedback Peserta KIPK', 17, 'https://www.google.com/', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(15) NOT NULL,
  `log_last_login` datetime NOT NULL,
  `log_username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `log_last_login`, `log_username`) VALUES
(1, '2023-08-20 11:44:45', '10120698'),
(2, '2023-08-20 10:44:45', '10120700'),
(4, '2023-08-22 10:56:06', '10120700'),
(5, '2023-08-23 04:58:17', '10120700'),
(6, '2023-08-23 05:04:07', '10120699'),
(7, '2023-08-23 05:04:33', '10120699'),
(8, '2023-08-23 05:17:48', '10120699'),
(9, '2023-08-23 05:19:26', '10120699'),
(10, '2023-08-23 05:57:49', '10120698'),
(11, '2023-08-23 05:48:13', '10120698'),
(12, '2023-08-23 09:29:37', '10120698'),
(13, '2023-08-24 02:11:35', '10120698'),
(14, '2023-08-24 02:38:29', '10120698'),
(15, '2023-08-24 02:52:36', '10120700'),
(16, '2023-08-24 03:10:35', '10120700'),
(17, '2023-08-24 03:11:07', '10120698'),
(18, '2023-08-24 09:54:37', '10120700'),
(19, '2023-08-24 03:23:05', '10120700'),
(20, '2023-08-24 03:55:45', '10120700'),
(21, '2023-08-24 03:56:33', '10120700'),
(22, '2023-08-24 16:02:23', '10120700'),
(23, '2023-08-24 16:12:26', '10120698'),
(24, '2023-08-24 16:12:56', '10120700'),
(25, '2023-08-24 16:18:15', '10120698'),
(26, '2023-08-25 00:17:05', '10120698'),
(27, '2023-08-25 02:12:52', '10120700'),
(28, '2023-08-25 14:31:46', '10120700'),
(29, '2023-08-25 19:41:35', '10120700'),
(30, '2023-08-25 22:42:30', '10120698'),
(31, '2023-08-25 23:03:39', '10120700'),
(32, '2023-08-26 11:38:20', '10120700'),
(33, '2023-08-26 23:53:49', '10120700'),
(34, '2023-08-27 01:16:05', '10120700'),
(35, '2023-08-27 01:19:43', '10120698'),
(36, '2023-08-27 01:24:09', '10120698'),
(37, '2023-08-27 13:45:59', '10120700'),
(38, '2023-08-27 16:15:01', '10120700'),
(39, '2023-08-27 18:05:21', '10120698'),
(40, '2023-08-27 22:19:47', '10120698'),
(41, '2023-08-27 22:19:58', '10120700'),
(42, '2023-08-27 22:20:08', '10120698'),
(43, '2023-08-27 23:16:42', '10120700'),
(44, '2023-08-28 16:44:30', '10120700'),
(45, '2023-08-28 17:03:29', '10120698'),
(46, '2023-09-04 11:42:32', '10120700'),
(47, '2023-09-14 22:07:06', '10120700'),
(48, '2023-09-15 01:34:24', '10120700'),
(49, '2023-09-20 12:18:22', '10120700'),
(50, '2024-05-15 12:06:05', '10120698'),
(51, '2024-05-15 13:34:35', '10120698'),
(52, '2024-05-15 13:34:59', '10120700'),
(53, '2024-06-03 11:32:51', '10120700'),
(54, '2024-06-03 11:33:17', '10120698'),
(55, '2024-06-05 10:07:11', '10120700'),
(56, '2024-06-05 10:07:26', '10120698'),
(57, '2024-06-05 10:46:52', '10120698'),
(58, '2024-06-05 11:09:25', '10120698'),
(59, '2024-06-05 11:34:39', '10120699'),
(60, '2024-06-05 11:43:50', '10120698'),
(61, '2024-06-05 11:44:17', '10120699'),
(62, '2024-06-05 12:04:38', '10120700'),
(63, '2024-06-05 17:18:19', '10120700'),
(64, '2024-06-05 17:41:01', '10120701'),
(65, '2024-06-05 17:41:53', '10120701'),
(66, '2024-06-05 20:22:53', '10120698');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_beasiswa`
--

CREATE TABLE `penerima_beasiswa` (
  `id_penerima` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `ppicture` varchar(255) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tahun_diterima` int(4) NOT NULL,
  `status_penerima` tinyint(1) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima_beasiswa`
--

INSERT INTO `penerima_beasiswa` (`id_penerima`, `nama`, `npm`, `prodi`, `alamat`, `no_hp`, `ppicture`, `jenis_kelamin`, `tahun_diterima`, `status_penerima`, `keterangan`) VALUES
(1, 'Muhammad Aulia Nur Fadhillah', '10120698', 'Sistem Informasi', 'Depok Tiga', '081237275191', '1717562024_824cb48a5c1ba1c1720a.png', 1, 2022, 2, ''),
(4, 'Isa Tarmana Mustopa', '10120699', 'Teknik Informatika', 'sddasfasdas', '081288889999', '1717562096_50311d87853dd230e5ac.jpg', 1, 1981, 2, '-'),
(13, 'Naufal Nur', '10120701', 'Teknik Informatika', 'bandung', '081266778899', '1717584089_23c9e5d6df3e5657233d.jpeg', 1, 2024, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(8) NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `penulis` varchar(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `tanggal_terbit`, `tanggal_tarik`, `penulis`, `deskripsi`) VALUES
(1, 'Batas Akhir pengumpulan SR dan SPTJM', '2023-08-18', '2024-06-04', '10120700', 'Batas Akhir Pengumpulan SR dan SPTJM untuk Kampus Merdeka Batch 6'),
(2, 'Jadwal UAS Penyetaraan MBKM', '2023-08-20', '2024-06-19', '-', 'UAS Penyetaraan untuk mahasiswa yang mengikuti MBKM akan dilaksanakan mulai 22 Agustus 2023 - 29 Agustus 2023.'),
(5, 'Staycation 01', '2024-06-05', '2024-06-13', '10120700', 'Staycation lagi lah');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `fakultas_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_prodi`, `nama_prodi`, `fakultas_prodi`) VALUES
(101, 'S1-Sistem Informasi', 'Fakultas Ilmu Komputer dan Teknologi Informasi'),
(102, 'S1-Manajemen', 'Fakultas Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hak_akses` tinyint(1) NOT NULL,
  `last_login` date DEFAULT NULL,
  `status_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`, `last_login`, `status_user`) VALUES
(1, '10120698', 'owlowl', 0, '2024-06-05', 1),
(2, '10120699', 'isaisaisa', 0, '2024-06-05', 1),
(3, '10120700', 'umul', 1, '2024-06-05', 1),
(8, 'bebek_an_u', 'kwekkwek', 1, '2023-08-23', 1),
(9, '10120701', '10120701.beasiswa', 0, '2024-06-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  ADD PRIMARY KEY (`id_keaktifan`);

--
-- Indexes for table `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  ADD PRIMARY KEY (`id_mbkm`);

--
-- Indexes for table `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `link_gform`
--
ALTER TABLE `link_gform`
  ADD PRIMARY KEY (`id_lgf`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_username` (`log_username`) USING BTREE;

--
-- Indexes for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  ADD PRIMARY KEY (`id_penerima`),
  ADD UNIQUE KEY `np` (`npm`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `penulis` (`penulis`) USING BTREE;

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `nama_prodi` (`nama_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uname` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `id_beasiswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  MODIFY `id_akademik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  MODIFY `id_keaktifan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  MODIFY `id_mbkm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `link_gform`
--
ALTER TABLE `link_gform`
  MODIFY `id_lgf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  MODIFY `id_penerima` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
