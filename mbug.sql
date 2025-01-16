-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2025 pada 04.35
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
-- Database: `mbug`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `id_beasiswa` int(3) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tahun_penerimaan` varchar(4) NOT NULL,
  `status_beasiswa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`id_beasiswa`, `jenis`, `asal`, `tahun_penerimaan`, `status_beasiswa`) VALUES
(1, 'KARTU INDONESIA PINTAR KULIAH(KIPK)', 'KEMENDIKBUD', '2021', 1),
(17, 'Beasiswa LIPI', 'Pemerintah', '2022', 1),
(18, 'XXXX', 'Indo', '2002', 0),
(19, 'Beasiswa Sukabumi Sawangan', 'Universitas Sukabumi', '2020', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_akademik`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporan_akademik`
--

INSERT INTO `laporan_akademik` (`id_akademik`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `ipk`, `ipk_lokal`, `ipk_uu`, `rangkuman_nilai`, `konf_ket_akademik`, `konfirmasi_akademik`) VALUES
(1, 1, 1, 6, 'ATA 2001/2002', 3.93, 3.91, 4, '1731672840_c53bb3bbf080b6f1bdca.pdf', 'tes', 2),
(2, 1, 1, 5, 'PTA 2000/2001', 4, 4, 4, '1717600725_64e67d3716770ed67774.pdf', '', 1),
(4, 1, 4, 4, 'PTA 2004/2005', 3.5, 3, 4, '1731465578_d52cd7bd1f06d3a64220.pdf', 'oke  bener', 1),
(5, 17, 1, 8, 'ATA 2004/2005', 4, 4, 4, '1731672949_2ced6f01916e848540d7.pdf', 'salah cok', 0),
(6, 17, 4, 6, 'PTA 2000/2001', 3, 3, 1, '1731499673_6372792a1e52e776dcf9.pdf', '', 2),
(7, 1, 1, 3, 'PTA 2002/2003', 4, 4, 4, '1731672878_026e6bc3f40ad74eb3e3.pdf', 'coba laho', 2),
(8, 1, 4, 4, 'PTA 2000/2001', 3, 3, 3, '1731453408_b9d1cd0fa86d1a1b2dc3.pdf', 'd', 1),
(9, 1, 1, 2, 'PTA 2000/2001', 2, 2, 2, '1731464027_7091cfdcb0f292e1dd39.pdf', 'dsada', 1),
(10, 17, 4, 4, 'PTA 2000/2001', 4, 4, 4, '1731486369_fe52038b409e8f9b98ff.pdf', NULL, 2),
(11, 1, 4, 4, 'PTA 2000/2001', 4, 4, 4, '1731488655_55398c93c019a5b996f5.pdf', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keaktifan`
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
  `konf_ket_keaktifan` varchar(200) DEFAULT NULL,
  `konfirmasi_keaktifan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporan_keaktifan`
--

INSERT INTO `laporan_keaktifan` (`id_keaktifan`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `krs`, `jumlah_ditagihkan`, `jumlah_potongan`, `blanko_pembayaran`, `bukti_pembayaran`, `konf_ket_keaktifan`, `konfirmasi_keaktifan`) VALUES
(1, 1, 1, 6, 'PTA 2023/2024', '1717601345_d86a9b78658c5572f041.pdf', 11000000, 10000000, '1717601345_6f4dbb06af31b8be4ee1.pdf', '1717601345_4e47edf8aa5281dd078f.pdf', '', 1),
(2, 17, 4, 6, 'PTA 2022/2023', '1731466031_0480b9458012a3a70f3f.pdf', 8000000, 4000000, '1731466031_6fe12efe7f2e00b2f4f0.pdf', '1731466031_ec2701aee6a54fa1aefe.pdf', '', 2),
(3, 17, 1, 4, 'ATA 2021/2022', '1692865568_151a7909860328b5c7a2.pdf', 10000000, 6000000, '1692865568_4084607a77ac6a271e42.pdf', '1692865568_aabdcf12683eaa66a763.pdf', NULL, 1),
(4, 1, 1, 3, 'PTA 2021/2022', '1692865896_e80f30f80d2447665486.pdf', 11680000, 0, '1692865896_3859679e8a0f73abed92.pdf', '1692865896_1c7b18eca5bcf197aac8.pdf', NULL, 2),
(5, 1, 13, 5, 'PTA 2000/2001', '1731460429_a3c07cdb1bd2eee32725.pdf', 222222, 3333344, '1731460429_d65e4dd1f81832be1d3e.pdf', '1731460429_738b3b68c165150d8f9a.pdf', NULL, 2),
(6, 1, 4, 2, 'PTA 2000/2001', '1731491870_2860ad2919232c9116bf.pdf', 222222, 12123121, '1731491870_ff40b7363bc0191467c5.pdf', '1731491870_ab593189480b4a7e79a2.pdf', NULL, 2),
(7, 1, 4, 2, 'PTA 2000/2001', '1731492636_90ce296f72b98cbbf66f.pdf', 22, 222, '1731492636_9d6d1860d414533b737e.pdf', '1731492636_430942d5414a6c54b213.pdf', NULL, 2),
(8, 17, 1, 2, 'ATA 2001/2002', '1731904233_1a1c168fb124cbc634c4.pdf', 20000, 939218, '1731904233_fda50713b3fedc337e38.pdf', '1731904233_81bd187feb53a990e145.pdf', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_mbkm`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporan_mbkm`
--

INSERT INTO `laporan_mbkm` (`id_mbkm`, `id_beasiswa`, `id_penerima`, `nama_mbkm`, `jenis_mbkm`, `periode`, `keterangan_mbkm`, `konf_ket_mbkm`, `konfirmasi_mbkm`) VALUES
(1, 1, 1, 'Bangkit Academy 2023', 'Studi/Proyek Independen', 2023, 'cek', '', 2),
(2, 17, 1, 'Bangkit Academy 2023', 'Studi/Proyek Independen', 2021, '--', NULL, 1),
(3, 18, 1, 'Bangkit Academy 2024', 'Studi/Proyek Independen', 2024, 'Lulus Mobile Development Path', '', 1),
(4, 18, 4, 'VV', 'Studi/Proyek Independen', 2023, 'xxx', 'test', 0),
(5, 18, 4, 'dddd', 'Pengabdian Mahasiswa kepada Masyarakat', 222, 'dsada', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_prestasi`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporan_prestasi`
--

INSERT INTO `laporan_prestasi` (`id_prestasi`, `id_beasiswa`, `id_penerima`, `tingkat`, `jenis_prestasi`, `nama_kegiatan`, `capaian`, `tempat`, `tanggal_mulai`, `tanggal_selesai`, `penyelenggara`, `bukti_prestasi`, `publikasi`, `konf_ket_prestasi`, `konfirmasi_prestasi`) VALUES
(1, 18, 1, 'Internasional', 0, 'Bangkit Academy 2023', 'Partisipatif', 'Rumah', '2024-10-08', '2024-10-28', 'Google, GoTo, Traveloka', '1731494790_478c9446956c60007b61.pdf', 'https://www.google.com/', 'tes', 2),
(4, 1, 1, 'Nasional', 0, 'Bangkit Academy 2023', 'Good', 'Rumah', '2024-08-20', '2024-08-31', 'Traveloka', '1731470552_043567d7df0dce02bccf.pdf', 'https://www.google.com/', '', 1),
(5, 18, 4, 'Provinsi', 0, 'Magang Mandiri', 'Lainnya', 'Rumah', '2024-08-18', '2024-08-19', 'Isa', '1731469872_e99aa155119fbd7ec249.pdf', 'https://www.google.com/', NULL, 2),
(6, 18, 1, 'Nasional', 0, 'Bangkit Academy 2024', 'Partisipatif', 'Gedung D', '2023-08-23', '2023-08-24', 'Traveloka', '-', 'https://www.google.com/', NULL, 2),
(7, 1, 1, 'Wilayah', 0, 'd', 'xxx', 'ddd', '2024-11-12', '2024-11-13', 'dd', '1731471014_5bc6c5481f4c0cd12b2e.pdf', 'http://localhost:8080/admin/prestasi/add', NULL, 0),
(8, 18, 4, 'Internasional', 1, 'dddd', 'Partisipatif', 'dddd', '2024-11-12', '2024-11-14', 'dddd', '1731488741_1f685c1c7f2002607a33.pdf', 'http://localhost:8080/user/prestasi/add', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_gform`
--

CREATE TABLE `link_gform` (
  `id_lgf` int(10) NOT NULL,
  `nama_form` varchar(100) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `tautan` varchar(100) NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `link_gform`
--

INSERT INTO `link_gform` (`id_lgf`, `nama_form`, `id_beasiswa`, `tautan`, `tanggal_pembuatan`) VALUES
(1, 'Pendataan Peserta KIPK', 1, 'https://docs.google.com/forms', '2023-07-20'),
(2, 'Feedback Peserta KIPK', 17, 'https://www.google.com/', '2023-08-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(15) NOT NULL,
  `log_last_login` datetime NOT NULL,
  `log_username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
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
(66, '2024-06-05 20:22:53', '10120698'),
(67, '2024-10-06 16:26:48', '10120698'),
(68, '2024-10-07 12:49:48', '10120698'),
(69, '2024-10-07 12:58:55', '10120700'),
(70, '2024-10-07 13:02:37', '10120698'),
(71, '2024-10-10 15:13:31', '10120698'),
(72, '2024-10-10 17:56:11', '10120700'),
(73, '2024-10-10 18:13:45', '10120698'),
(74, '2024-10-10 18:50:55', '10120700'),
(75, '2024-10-10 18:51:41', '10120698'),
(76, '2024-10-10 18:54:15', '10120700'),
(77, '2024-10-11 08:08:31', '10120698'),
(78, '2024-10-11 08:09:24', '10120698'),
(79, '2024-10-11 17:30:06', '10120698'),
(80, '2024-10-11 17:32:49', '10120700'),
(81, '2024-10-11 19:51:39', '10120698'),
(82, '2024-10-11 19:58:47', '10120700'),
(83, '2024-10-11 20:09:46', '10120698'),
(84, '2024-10-11 20:12:29', '10120700'),
(85, '2024-10-15 13:25:36', '10120699'),
(86, '2024-10-15 13:26:22', '10120700'),
(87, '2024-10-15 14:31:32', '10120700'),
(88, '2024-10-16 07:15:10', '10120700'),
(89, '2024-10-16 07:33:19', '10120700'),
(90, '2024-10-16 11:05:28', '10120700'),
(91, '2024-10-23 23:38:56', '10120700'),
(92, '2024-10-23 23:53:20', '10120700'),
(93, '2024-10-24 05:02:10', '10120699'),
(94, '2024-11-12 08:33:30', '10120700'),
(95, '2024-11-12 16:49:44', '10120700'),
(96, '2024-11-13 05:49:24', '10120700'),
(97, '2024-11-13 08:42:43', '10120699'),
(98, '2024-11-13 15:13:13', '10120699'),
(99, '2024-11-13 15:43:10', '10120700'),
(100, '2024-11-13 16:58:40', '10120699'),
(101, '2024-11-13 17:05:34', '10120699'),
(102, '2024-11-13 17:17:33', '10120700'),
(103, '2024-11-13 19:07:30', '10120699'),
(104, '2024-11-14 14:17:02', '10120700'),
(105, '2024-11-14 19:32:29', '10120700'),
(106, '2024-11-15 16:05:13', '10120700'),
(107, '2024-11-15 19:04:34', '10120700'),
(108, '2024-11-16 06:59:49', '10120700'),
(109, '2024-11-16 09:17:50', '10120700'),
(110, '2024-11-16 12:11:35', '10120700'),
(111, '2024-11-17 16:26:31', '10120700'),
(112, '2024-11-18 11:25:12', '10120700'),
(113, '2024-11-18 16:25:53', '10120700'),
(114, '2024-11-19 07:11:50', '10120700'),
(115, '2024-11-19 09:36:35', '10120700'),
(116, '2024-11-19 15:34:21', '10120700'),
(117, '2024-11-19 18:57:16', '10120700'),
(118, '2024-12-24 21:36:27', '10120700'),
(119, '2025-01-09 14:21:40', '10120700'),
(120, '2025-01-16 08:53:56', '10120700');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_beasiswa`
--

CREATE TABLE `penerima_beasiswa` (
  `id_penerima` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `id_prodi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `ppicture` varchar(255) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tahun_diterima` int(4) NOT NULL,
  `status_penerima` tinyint(1) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penerima_beasiswa`
--

INSERT INTO `penerima_beasiswa` (`id_penerima`, `nama`, `npm`, `id_prodi`, `alamat`, `no_hp`, `ppicture`, `jenis_kelamin`, `tahun_diterima`, `status_penerima`, `keterangan`) VALUES
(1, 'Muhammad Aulia Nur Fadhillah', '10120698', '57201', 'Depok Tiga', '081237275191', '1728608942_6bd2594155544f735ce1.png', 1, 2022, 2, ''),
(4, 'Isa Tarmana Mustopa', '10120699', '55201', 'sddasfasdas', '081288889999', '1717562096_50311d87853dd230e5ac.jpg', 1, 1981, 1, '-'),
(13, 'Naufal Nur', '10120701', '20201', 'bandung', '081266778899', NULL, 1, 2024, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(8) NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `penulis` varchar(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `tanggal_terbit`, `tanggal_tarik`, `penulis`, `deskripsi`) VALUES
(1, 'Batas Akhir pengumpulan SR dan SPTJM', '2023-08-18', '2024-07-09', '10120700', 'Batas Akhir Pengumpulan SR dan SPTJM untuk Kampus Merdeka Batch 6'),
(2, 'Jadwal UAS Penyetaraan MBKM', '2023-08-20', '2024-06-19', '-', 'UAS Penyetaraan untuk mahasiswa yang mengikuti MBKM akan dilaksanakan mulai 22 Agustus 2023 - 29 Agustus 2023.'),
(5, 'Staycation 01', '2024-06-05', '2024-06-13', '10120700', 'Staycation lagi lah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `fakultas_prodi` varchar(100) NOT NULL,
  `akreditasi_prodi` varchar(50) NOT NULL,
  `jenjang_prodi` varchar(10) NOT NULL,
  `status_prodi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id_prodi`, `nama_prodi`, `fakultas_prodi`, `akreditasi_prodi`, `jenjang_prodi`, `status_prodi`) VALUES
(11201, 'S1-Kedokteran', 'Fakultas Kedokteran', 'B', 'S1', 1),
(11901, 'PR-Pendidikan Profesi Dokter', 'Fakultas Kedokteran', 'C', 'PR', 1),
(15201, 'S1-Kebidanan', 'Fakultas Ilmu Kesehatan dan Farmasi', 'Baik', 'S1', 1),
(15901, 'PR-Pendidikan Profesi Bidan', 'Fakultas Ilmu Kesehatan dan Farmasi', 'Baik', 'PR', 1),
(20201, 'S1-Teknik Elektro', 'Fakultas Teknologi Industri', 'Unggul', 'S1', 1),
(21201, 'S1-Teknik Mesin', 'Fakultas Teknologi Industri', 'A', 'S1', 1),
(22201, 'S1-Teknik Sipil', 'Fakultas Teknik Sipil dan Perencanaan', 'Unggul', 'S1', 1),
(22204, 'S1-Teknik Sipil (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(23201, 'S1-Arsitektur', 'Fakultas Teknik Sipil dan Perencanaan', 'Unggul', 'S1', 1),
(23202, 'S1-Arsitektur (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(26201, 'S1-Teknik Industri', 'Fakultas Teknologi Industri', 'Unggul', 'S1', 1),
(48201, 'S1-Farmasi', 'Fakultas Ilmu Kesehatan dan Farmasi', 'Baik Sekali', 'S1', 1),
(54211, 'S1-Agroteknologi', 'Fakultas Teknologi Industri', 'B', 'S1', 1),
(55201, 'S1-Informatika', 'Fakultas Teknologi Industri', 'Unggul', 'S1', 1),
(55210, 'S1-Informatika (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(56201, 'S1-Sistem Komputer', 'Fakultas Ilmu Komputer dan Teknologi Informasi', 'Unggul', 'S1', 1),
(56401, 'D3-Teknik Komputer', 'Program Diploma', 'Unggul', 'D3', 1),
(57201, 'S1-Sistem Informasi', 'Fakultas Ilmu Komputer dan Teknologi Informasi', 'Unggul', 'S1', 1),
(57208, 'S1-Sistem Informasi (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(57401, 'D3-Manajemen Informatika', 'Program Diploma', 'Unggul', 'D3', 1),
(60202, 'S1-Ekonomi Syariah', 'Fakultas Ekonomi', 'Baik Sekali', 'S1', 1),
(61201, 'S1-Manajemen', 'Fakultas Ekonomi', 'Unggul', 'S1', 1),
(61217, 'S1-Manajemen (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(61404, 'D3-Manajemen Pemasaran', 'Program Diploma', 'Baik Sekali', 'D3', 1),
(61406, 'D3-Manajemen Keuangan', 'Program Diploma', 'Baik Sekali', 'D3', 1),
(62201, 'S1-Akuntansi', 'Fakultas Ekonomi', 'Unggul', 'S1', 1),
(62208, 'S1-Akuntansi (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(62401, 'D3-Akuntansi', 'Program Diploma', 'Baik Sekali', 'D3', 1),
(70201, 'S1-Ilmu Komunikasi', 'Fakultas Ilmu Komunikasi', 'A', 'S1', 1),
(70206, 'S1-Ilmu Komunikasi (KPPU)', 'Progra Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(73201, 'S1-Psikologi', 'Fakultas Psikologi', 'A', 'S1', 1),
(73203, 'S1-Psikologi (KPPU)', 'Program Studi Diluar Kampus Utama', 'Baik', 'S1', 1),
(79202, 'S1-Sastra Inggris', 'Fakultas Sastra dan Budaya', 'Unggul', 'S1', 1),
(79209, 'S1-Sastra Tiongkok', 'Fakultas Sastra dan Budaya', 'B', 'S1', 1),
(90221, 'S1-Desain Interior', 'Fakultas Teknik Sipil dan Perencanaan', 'B', 'S1', 1),
(93202, 'S1-Pariwisata', 'Fakultas Sastra dan Budaya', 'B', 'S1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `nama_tahun` varchar(50) NOT NULL,
  `semester_tahun` tinyint(1) NOT NULL,
  `mulai_tahun_ajaran` int(4) NOT NULL,
  `selesai_tahun_ajaran` int(4) NOT NULL,
  `queue_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `nama_tahun`, `semester_tahun`, `mulai_tahun_ajaran`, `selesai_tahun_ajaran`, `queue_tahun`) VALUES
(1, 'ATA 2000/2001', 1, 2000, 2001, 2000200101),
(2, 'PTA 2001/2002', 0, 2001, 2002, 2001200200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hak_akses` tinyint(1) NOT NULL,
  `last_login` date DEFAULT NULL,
  `status_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`, `last_login`, `status_user`) VALUES
(1, '10120698', 'owlowl', 0, '2024-10-11', 1),
(2, '10120699', '12345678', 0, '2024-11-13', 1),
(3, '10120700', 'umul', 1, '2025-01-16', 1),
(8, '19120701', 'kwekkwek', 1, '2023-08-23', 1),
(9, '10120701', '10120701.beasiswa', 0, '2024-06-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indeks untuk tabel `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  ADD PRIMARY KEY (`id_keaktifan`);

--
-- Indeks untuk tabel `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  ADD PRIMARY KEY (`id_mbkm`);

--
-- Indeks untuk tabel `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `link_gform`
--
ALTER TABLE `link_gform`
  ADD PRIMARY KEY (`id_lgf`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_username` (`log_username`) USING BTREE;

--
-- Indeks untuk tabel `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  ADD PRIMARY KEY (`id_penerima`),
  ADD UNIQUE KEY `np` (`npm`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `penulis` (`penulis`) USING BTREE;

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `nama_prodi` (`nama_prodi`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `nama_tahun` (`nama_tahun`),
  ADD UNIQUE KEY `queue_tahun` (`queue_tahun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uname` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `id_beasiswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  MODIFY `id_akademik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  MODIFY `id_keaktifan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  MODIFY `id_mbkm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `link_gform`
--
ALTER TABLE `link_gform`
  MODIFY `id_lgf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  MODIFY `id_penerima` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
